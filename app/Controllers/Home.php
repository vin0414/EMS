<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function newExpense()
    {
        $accountExpense = new \App\Models\accountExpenseModel();
        $account = $accountExpense->findAll();
        $data = ['account'=>$account];
        return view('new-expense',$data);
    }

    public function Upload()
    {
        return view('upload');
    }

    public function manageExpenses()
    {
        return view('manage-expenses');
    }

    public function listContracts()
    {
        $pager = \Config\Services::pager();
        $model = new \App\Models\contractsModel();
        $list = $model->paginate(6);
        $data = ['list'=>$list,'pager'=>$model->pager];
        return view('list-contracts',$data);
    }

    public function editContract($id)
    {
        $model = new \App\Models\contractsModel();
        $list = $model->WHERE('Title',$id)->first();
        $data = ['list'=>$list];
        return view('edit-contract',$data);
    }

    public function generateExpense()
    {
        return view('generate-expense');
    }

    public function Settings()
    {
        $expense = new \App\Models\accountExpenseModel();
        $list = $expense->findAll();
        $data = ['list'=>$list];
        return view('settings',$data);
    }

    //functions - BASIC CRUD
    public function saveExpense()
    {
        $utilityModel = new \App\Models\utilityModel();
        //data
        $expID = $this->request->getPost('expenses');
        $payee = $this->request->getPost('payee');
        $details = $this->request->getPost('details');
        $due_date = $this->request->getPost('due_date_selection');
        $day_month = $this->request->getPost('day_month');
        $mode_payment = $this->request->getPost('mode_payment');
        $amount = str_replace(',', '',$this->request->getPost('amount'));
        //add validation
        $validation = $this->validate([
            'expenses'=>'required',
            'payee'=>'required',
            'details'=>'required',
            'mode_payment'=>'required',
            'amount'=>'required'
        ]);

        if(!$validation)
        {
            echo "Invalid! Please fill in the form to continue";
        }
        else
        {
            if($due_date=="1")
            {
                $values = ['expID'=>$expID, 'Payee'=>$payee,'Details'=>$details,
                            'LastDay'=>$due_date,'Day'=>0,'ModePayment'=>$mode_payment,
                            'Amount'=>$amount,'DateCreated'=>date('Y-m-d'),'userID'=>0];
                $utilityModel->save($values);
                echo "success";
            }
            else
            {
                if(empty($day_month))
                {
                    echo "Invalid! Please select specific day for auto-generation of expenses";
                }
                else
                {
                    $values = ['expID'=>$expID, 'Payee'=>$payee,'Details'=>$details,
                            'LastDay'=>0,'Day'=>$day_month,'ModePayment'=>$mode_payment,
                            'Amount'=>$amount,'DateCreated'=>date('Y-m-d'),'userID'=>0];
                    $utilityModel->save($values);
                    echo "success";
                }
            }
        }
    }

    public function saveCode()
    {
        $accountExpense = new \App\Models\accountExpenseModel();
        //data
        $details = $this->request->getPost('details');
        $code = $this->request->getPost('glcode');
        $validation = $this->validate([
            'details'=>'required',
            'glcode'=>'required'
        ]);
        if(!$validation)
        {
            echo "Invalid! Please  fill in the form";
        }
        else
        {
            $values = ['Description'=>$details, 'GLCode'=>$code];
            $accountExpense->save($values);
            echo "success";
        }
    }

    public function modifyCode()
    {
        $accountExpense = new \App\Models\accountExpenseModel();
        //data
        $id = $this->request->getPost('expID');
        $details = $this->request->getPost('details');
        $code = $this->request->getPost('glcode');
        $validation = $this->validate([
            'details'=>'required',
            'glcode'=>'required'
        ]);
        if(!$validation)
        {
            echo "Invalid! Please  fill in the form";
        }
        else
        {
            $values = ['Description'=>$details, 'GLCode'=>$code];
            $accountExpense->update($id,$values);
            echo "success";
        }
    }

    public function removeCode()
    {
        $val = $this->request->getPost('value');
        $builder = $this->db->table('tblaccount_expense');
        $builder->WHERE('expID',$val);
        $builder->delete();
        echo "success";
    }

    public function viewDetails()
    {
        $val = $this->request->getGet('value');
        $builder = $this->db->table('tblaccount_expense');
        $builder->select('*');
        $builder->WHERE('expID',$val);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            ?>
            <form method="POST" class="row" id="editForm">
                <input type="hidden" name="expID" value="<?php echo $row->expID ?>"/>
                <div class="col-12 form-group">
                    <label>Details</label>
                    <textarea class="form-control" name="details" style="height:150px;"><?php echo $row->Description ?></textarea>
                </div>
                <div class="col-12 form-group">
                    <label>GL Code</label>
                    <input type="text" class="form-control" name="glcode" value="<?php echo $row->GLCode ?>"/>
                </div>
                <div class="col-12 form-group">
                    <button type="submit" class="btn btn-primary update">Save Changes</button>
                </div>
            </form>
            <?php
        }
    }

    public function searchContract()
    {
        $val = "%".$this->request->getGet('search')."%";
        $model = new \App\Models\contractsModel();
        $list = $model->LIKE('Title',$val)->paginate(6);
        $data = ['list'=>$list,'pager'=>$model->pager];
        return view('list-contracts',$data);
    }
    public function saveContract()
    {
        $contractsModel = new \App\Models\contractsModel();
        //get the data
        $title = $this->request->getPost('title_file');
        $details = $this->request->getPost('details');
        $from_date = $this->request->getPost('from_date');
        $expiration_date = $this->request->getPost('expiration_date');
        $file = $this->request->getFile('file');
        $originalName = $file->getClientName();
        $validation = $this->validate([
            'title_file'=>'required',
            'details'=>'required',
            'from_date'=>'required',
            'expiration_date'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form fields');
            return redirect()->to('/upload')->withInput();
        }
        else
        {
            $values = ['Title'=>$title, 'Details'=>$details,'Fromdate'=>$from_date,'Todate'=>$expiration_date,'Attachment'=>$originalName];
            $contractsModel->save($values);
            //move the file to Contracts Folder
            $file->move('Files/',$originalName);
            session()->setFlashdata('success','Great! Successfully uploaded.');
            return redirect()->to('/upload?success')->withInput();
        }
    }

    public function updateContract()
    {
        $contractsModel = new \App\Models\contractsModel();
        //get the data
        $id = $this->request->getPost('contractID');
        $title = $this->request->getPost('title_file');
        $details = $this->request->getPost('details');
        $from_date = $this->request->getPost('from_date');
        $expiration_date = $this->request->getPost('expiration_date');
        $file = $this->request->getFile('file');
        $originalName = $file->getClientName();
        $validation = $this->validate([
            'title_file'=>'required',
            'details'=>'required',
            'from_date'=>'required',
            'expiration_date'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form fields');
            return redirect()->to('/edit/'.$title)->withInput();
        }
        else
        {
            if(empty($originalName))
            {
                $values = ['Title'=>$title, 'Details'=>$details,'Fromdate'=>$from_date,'Todate'=>$expiration_date];
                $contractsModel->update($id,$values);
                //do nothing
            }
            else
            {
                $values = ['Title'=>$title, 'Details'=>$details,'Fromdate'=>$from_date,'Todate'=>$expiration_date,'Attachment'=>$originalName];
                $contractsModel->update($id,$values);
                //move the file to Contracts Folder
                $file->move('Files/',$originalName);
            }
            session()->setFlashdata('success','Great! Successfully updated.');
            return redirect()->to('/contracts')->withInput();
        }
    }

    public function expiredContracts()
    {
        $date = date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($date . ' + 3 days')); 
        $model = new \App\Models\contractsModel();
        $list = $model->WHERE('Todate<=',$newDate)->findAll();
        foreach($list as $row)
        {
            ?>
            <div class="row border-bottom pb-3 pt-4 align-items-center mx-0">
                <div class="col-12 pl-0">
                    <div class="d-flex">
                        <div class="pl-2">
                        <h6 class="m-0"><?php echo $row['Title'] ?></h6>
                        <div class="badge badge-inverse-success mt-3 mt-sm-0">Expiration : <?php echo $row['Todate'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
