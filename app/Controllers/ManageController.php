<?php

namespace App\Controllers;

class ManageController extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function uploadReceipt()
    {
        $expenseModel = new \App\Models\expenseModel();
        //update the expenses
        $id = $this->request->getPost('expenseID');
        $file = $this->request->getFile('file');
        $originalName = $file->getClientName();
        if(empty($originalName))
        {
            echo "Invalid! Please upload the attachment";
        }
        else
        {
            //save the file
            $values = ['id'=>$id, 'Files'=>$originalName,'Date'=>date('Y-m-d')];
            $expenseModel->save($values);
            $file->move('Proof/',$originalName);
            echo "success";
        }
    }

    public function uploadProof()
    {
        $rentalPayment = new \App\Models\rentalPaymentModel();
        //update the rental payment
        $id = $this->request->getPost('rentalID');
        $file = $this->request->getFile('file');
        $originalName = $file->getClientName();
        //save the file
        if(empty($originalName))
        {
            echo "Invalid! Please upload the attachment";
        }
        else
        {
            $values = ['Status'=>1,'Attachment'=>$originalName];
            $file->move('Proof/',$originalName);
            $rentalPayment->update($id,$values);
            echo "success";
        }
    }

    public function generateRentExpense()
    {
        $rentalPayment = new \App\Models\rentalPaymentModel();
        $rentModel = new \App\Models\rentalModel();
        $month = $this->request->getPost('month');
        $year = $this->request->getPost('year');
        $item = $this->request->getPost('itemID');
        $count = count((array)$item);
        //apply validation
        $validation = $this->validate([
            'month'=>'required',
            'year'=>'required',
        ]);
        if(!$validation)
        {
            echo "Invalid! Please select month and year to generate";
        }
        else
        {
            if($count==0)
            {
                echo "Invalid! Please select item(s) to generate";
            }
            else
            {
                for($i=0;$i<$count;$i++)
                {
                    //get the information from rental payment
                    $info = $rentalPayment->WHERE('rpID',$item[$i])->first();
                    //get the amount to be paid monthly
                    $rent = $rentModel->WHERE('rentalID',$info['rentalID'])->first();
                    //get the new balance and apply deduction
                    $newBalance = $info['NewBalance']-$rent['Amount'];
                    //deduct the lifespan
                    $newLifeSpan = $info['LifeSpan']-1;
                    $newDate="";
                    //get the day
                    if($rent['LastDay']==1)
                    {
                        $dateToTest = $year."-".$month."-01";
                        $lastday = date('t',strtotime($dateToTest));
                        $newDate = $year."-".$month."-".$lastday;
                    }
                    else
                    {
                        $newDate = $year."-".$month."-".$rent['Day'];
                    }
                    //check if rental already exists
                    $builder = $this->db->table('tblrental_payment');
                    $builder->select('rentalID');
                    $builder->WHERE('rentalID',$info['rentalID']);
                    $builder->WHERE('Date',$newDate);
                    $data = $builder->get();
                    if($row = $data->getRow())
                    {
                        //do nothing
                    }
                    else
                    {
                        //insert the data
                        $values = ['rentalID'=>$info['rentalID'], 'LifeSpan'=>$newLifeSpan,'Balance'=>$info['NewBalance'],
                                    'Payment'=>$rent['Amount'],'NewBalance'=>$newBalance,'Date'=>$newDate,
                                    'Status'=>0,'Attachment'=>''];
                        $rentalPayment->save($values);
                    }
                    if($newLifeSpan==0)
                    {
                        //close the rental
                        $values = ['Status'=>2];
                        $rentModel->update($rent['rentalID'],$values);
                    }
                }
                echo "success";
            }
        }
    }

    public function getAllRentExpense()
    {
        $builder = $this->db->table('tblrental a');
        $builder->select('a.Payee,a.Details,a.TotalAmount,c.Payment,b.NewBalance,b.LifeSpan,b.rpID');
        $builder->join('(Select rpID,rentalID,NewBalance,LifeSpan from tblrental_payment ORDER BY rpID DESC) b','b.rentalID=a.rentalID','INNER');
        $builder->join('(Select rentalID, SUM(Payment)Payment from tblrental_payment GROUP BY rentalID) c','c.rentalID=b.rentalID','INNER');
        $builder->WHERE('a.Status',1)->WHERE('b.LifeSpan<>',0);
        $builder->groupBy('a.rentalID');
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <tr>
                <td><input type="checkbox" name="itemID[]" id="itemID" style="height:20px;width:18px;" value="<?php echo $row->rpID ?>" checked/></td>
                <td><?php echo $row->Payee ?></td>
                <td><?php echo $row->Details ?></td>
                <td><?php echo $row->LifeSpan ?></td>
                <td><?php echo number_format($row->TotalAmount,2) ?></td>
                <td><?php echo number_format($row->Payment,2) ?></td>
                <td><?php echo number_format($row->NewBalance,2) ?></td>
            </tr>
            <?php
        }
    }

    public function pendingRentExpense()
    {
        $builder = $this->db->table('tblrental_payment a');
        $builder->select('a.rpID,a.Payment,a.Date,a.Status,a.Attachment,b.Payee,b.Details,c.Description');
        $builder->join('tblrental b','b.rentalID=a.rentalID','LEFT');
        $builder->join('tblaccount_expense c','c.expID=b.expID','LEFT');
        $builder->WHERE('a.Status<>',3);
        $builder->orderBy('a.Status','ASC');
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <tr>
                <td><?php echo $row->Date ?></td>
                <td><?php echo $row->Description ?></td>
                <td><?php echo $row->Payee ?></td>
                <td><?php echo $row->Details ?></td>
                <td><?php echo number_format($row->Payment,2) ?></td>
                <td>
                    <?php if($row->Status==0){ ?>
                        <span class="badge bg-warning text-white">PENDING</span>
                    <?php }else if($row->Status==1){?>
                        <span class="badge bg-success text-white">DONE</span>
                    <?php }else if($row->Status==2){?>
                        <span class="badge bg-danger text-white">OVERDUE</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if($row->Status==1){ ?>
                    <a href="Proof/<?php echo $row->Attachment ?>" target="_BLANK"><span class="mdi mdi-file-find"></span>&nbsp;View</a>
                    <?php }else{ ?>
                        No File
                    <?php } ?>
                </td>
                <td>
                    <?php if($row->Status!=1){ ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More<span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <button type="button" class="dropdown-item upload" value="<?php echo $row->rpID ?>">Upload Proof</button>
                        </div>
                    </div>
                    <?php } ?>
                </td>
            </tr>
            <?php
        }
    }

    public function otherExpense()
    {
        $builder = $this->db->table('tblutilities a');
        $builder->select('a.*,b.Description');
        $builder->join('tblaccount_expense b','b.expID=a.expID','LEFT');
        $builder->WHERE('a.Status<>',0);
    }
}