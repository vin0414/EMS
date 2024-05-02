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
        //rentals
        $builder = $this->db->table('tblrental a');
        $builder->select('a.*,b.Description');
        $builder->join('tblaccount_expense b','b.expID=a.expID','LEFT');
        $builder->WHERE('a.Status',1);
        $rental = $builder->get()->getResult();
        //utilities
        $builder = $this->db->table('tblutilities a');
        $builder->select('a.*,b.Description');
        $builder->join('tblaccount_expense b','b.expID=a.expID','LEFT');
        $utility = $builder->get()->getResult();
        $data = ['utility'=>$utility,'rental'=>$rental];
        return view('manage-expenses',$data);
    }

    public function editRental($id)
    {
        $accountExpense = new \App\Models\accountExpenseModel();
        $account = $accountExpense->findAll();
        //rental
        $rentalModel = new \App\Models\rentalModel();
        $rent = $rentalModel->WHERE('rentalID',$id)->first();
        $data = ['account'=>$account,'rent'=>$rent];
        return view('edit-rental',$data);
    }

    public function editUtility($id)
    {
        return view('edit-utility');
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
    public function updateRent()
    {
        $rentalModel = new \App\Models\rentalModel();
        //data
        $rentID = $this->request->getPost('rentID');
        $expID = $this->request->getPost('expenses');
        $payee = $this->request->getPost('payee');
        $details = $this->request->getPost('details');
        $lifespan = $this->request->getPost('lifespan');
        $day_month = $this->request->getPost('day_month');
        $mode_payment = $this->request->getPost('mode_payment');
        $amount = str_replace(',', '',$this->request->getPost('amount'));
        $totalamount = str_replace(',', '',$this->request->getPost('total_amount'));
        $expiration_date = $this->request->getPost('expiration_date');
        //add validation
        $validation = $this->validate([
            'expenses'=>'required',
            'payee'=>'required',
            'details'=>'required',
            'lifespan'=>'required',
            'mode_payment'=>'required',
            'amount'=>'required',
            'total_amount'=>'required',
            'expiration_date'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form fields');
            return redirect()->to('/edit-rental/'.$rentID)->withInput();
        }
        else
        {
            $values = ['expID'=>$expID, 'Payee'=>$payee,'Details'=>$details,
                'LifeSpan'=>$lifespan,'Day'=>$day_month,
                'ModePayment'=>$mode_payment,'Amount'=>$amount,'TotalAmount'=>$totalamount,
                'DateCreated'=>date('Y-m-d'),'DueDate'=>$expiration_date,'userID'=>0];
            $rentalModel->update($rentID,$values);
            session()->setFlashdata('success','Great! Successfully applied changes');
            return redirect()->to('/manage-expenses')->withInput();
        }
    }

    public function sendAll()
    {
        $rentalModel = new \App\Models\rentalModel();
        $val = $this->request->getPost('itemID');
        $count = count($val);
        $values = ['Status'=>1];
        for($i=0;$i<$count;$i++)
        {
            $rentalModel->update($val[$i],$values);
        }
        echo "success";
    }

    public function deleteAll()
    {
        $val = $this->request->getPost('itemID');
        $count = count($val);
        for($i=0;$i<$count;$i++)
        {
            $builder = $this->db->table('tblrental');
            $builder->WHERE('rentalID',$val[$i]);
            $builder->delete();
        }
        echo "success";
    }

    public function deleteItem()
    {
        $val = $this->request->getPost('value');
        $builder = $this->db->table('tblrental');
        $builder->WHERE('rentalID',$val);
        $builder->delete();
        echo "success";
    }

    public function sendItem()
    {
        $rentalModel = new \App\Models\rentalModel();
        $val = $this->request->getPost('value');
        $values = ['Status'=>1];
        $rentalModel->update($val,$values);
        echo "success";
    }

    public function saveEntry()
    {
        $rentalModel = new \App\Models\rentalModel();
        //data
        $expID = $this->request->getPost('expenses');
        $payee = $this->request->getPost('payee');
        $details = $this->request->getPost('details');
        $due_date = $this->request->getPost('due_date');
        $lifespan = $this->request->getPost('lifespan');
        $day_month = $this->request->getPost('day_month');
        $mode_payment = $this->request->getPost('mode_payment');
        $amount = str_replace(',', '',$this->request->getPost('amount'));
        $totalamount = str_replace(',', '',$this->request->getPost('total_amount'));
        $expiration_date = $this->request->getPost('expiration_date');
        //add validation
        $validation = $this->validate([
            'expenses'=>'required',
            'payee'=>'required',
            'details'=>'required',
            'lifespan'=>'required',
            'mode_payment'=>'required',
            'amount'=>'required',
            'total_amount'=>'required',
            'expiration_date'=>'required'
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
                'LifeSpan'=>$lifespan,'LastDay'=>$due_date,'Day'=>0,
                'ModePayment'=>$mode_payment,'Amount'=>$amount,'TotalAmount'=>$totalamount,
                'DateCreated'=>date('Y-m-d'),'DueDate'=>$expiration_date,'Status'=>0,'userID'=>0];
                $rentalModel->save($values);
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
                    'LifeSpan'=>$lifespan,'LastDay'=>0,'Day'=>$day_month,
                    'ModePayment'=>$mode_payment,'Amount'=>$amount,'TotalAmount'=>$totalamount,
                    'DateCreated'=>date('Y-m-d'),'DueDate'=>$expiration_date,'Status'=>0,'userID'=>0];
                    $rentalModel->save($values);
                    echo "success";
                }
            }
        }
    }

    public function listRentals()
    {
        $userID = 0;
        $builder = $this->db->table('tblrental a');
        $builder->select('a.*,b.Description');
        $builder->join('tblaccount_expense b','b.expID=a.expID','LEFT');
        $builder->WHERE('a.userID',$userID)->WHERE('a.Status',0);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <tr>
                <td>
                    <input type="checkbox" name="itemID[]" id="itemID" value="<?php echo $row->rentalID ?>" style="height:20px;width:18px;" checked/>
                </td>
                <td><?php echo $row->DateCreated ?></td>
                <td><?php echo $row->Description ?></td>
                <td><?php echo $row->Details ?></td>
                <td><?php echo number_format($row->TotalAmount,2) ?></td>
                <td><span class="badge btn-warning text-white">NOT SUBMITTED</span></td>
                <td>
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm">Select</button>
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Action</h6>
                        <button type="button" class="dropdown-item sendItem" value="<?php echo $row->rentalID ?>"><i class="mdi mdi-send"></i>&nbsp;Submit</button>
                        <button type="button" class="dropdown-item deleteItem" value="<?php echo $row->rentalID ?>"><i class="mdi mdi-delete"></i>&nbsp;Delete</button>
                    </div>
                    </div>
                </td>
            </tr>
            <?php
        }
    }

    public function cancelExpense()
    {
        $utilityModel = new \App\Models\utilityModel();
        $val = $this->request->getPost('value');
        $values = ['Status'=>0];
        $utilityModel->update($val,$values);
        echo "success";
    }

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
                            'Amount'=>$amount,'Status'=>1,'DateCreated'=>date('Y-m-d'),'userID'=>0];
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
