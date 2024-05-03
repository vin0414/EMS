<?php

namespace App\Controllers;

class ManageController extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getAllRentExpense()
    {
        $builder = $this->db->table('tblrental a');
        $builder->select('a.Payee,a.Details,b.Balance,b.Payment,b.NewBalance,b.LifeSpan,b.rpID');
        $builder->join('(Select rpID,rentalID,Balance,Payment,NewBalance,LifeSpan from tblrental_payment ORDER BY rpID DESC) b','b.rentalID=a.rentalID','LEFT');
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
                <td><?php echo number_format($row->Balance,2) ?></td>
                <td><?php echo number_format($row->Payment,2) ?></td>
                <td><?php echo number_format($row->NewBalance,2) ?></td>
            </tr>
            <?php
        }
    }
}