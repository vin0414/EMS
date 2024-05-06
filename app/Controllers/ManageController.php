<?php

namespace App\Controllers;

class ManageController extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
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
        $builder = $this->db->table('tblrental_expense a');
    }
}