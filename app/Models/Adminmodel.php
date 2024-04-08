<?php

namespace App\Models;

use CodeIgniter\Model;

class Adminmodel extends Model
{
    protected $table = 'employee_tbl';
    protected $primaryKey = 'Emp_id';
    protected $allowedFields = ['emp_email', 'password','emp_joiningdate','role','mobile_no','emp_department','emp_name','project_nam','access_level'];

    public function insertData($tableName, $data)
    {
        $this->table = $tableName;
        return $this->insert($data);
    }
    public function insertDatatoproject($data)
    {
        // print_r($data);die;
       
        $this->db->table('tbl_project')->insert($data);
    }
    public function getalldata($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getResult();
        // print_r($result);die;
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_single_data($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getRow();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
  
}