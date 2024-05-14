<?php

namespace App\Models;

use CodeIgniter\Model;

class Employeemodel extends Model{
 
    public function saveTestCase($data)
{
   $result = $this->db->table('tbl_testCases')->insert($data);
//    print_r($result);die;
}
}