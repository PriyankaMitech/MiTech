<?php

namespace App\Models;

use CodeIgniter\Model;

class Employeemodel extends Model{

    protected $primaryKey = 'id'; // Set the primary key of the table
 
    public function saveTestCase($data)
{
   $result = $this->db->table('tbl_testcases')->insert($data);
//    print_r($result);die;
}


}