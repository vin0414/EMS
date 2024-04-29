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
        return view('new-expense');
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
        return view('settings');
    }

    //functions
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
        $list = $model->WHERE('Todate',$newDate)->findAll();
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
