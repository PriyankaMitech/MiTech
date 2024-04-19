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
    public function getEmployeesByDepartment($departmentId)
    {
        if (!isset($this->db)) {
            $this->db = \Config\Database::connect();
        }
    
        $query = $this->db->table('employee_tbl') // Replace 'your_table_name' with your actual table name
                          ->where('	department_id', $departmentId)
                          ->get();
    
        $result = $query->getResult();
    
        // Print the last executed query
        // echo $this->db->getLastQuery();die;
        // print_r($result);die;
    
        return $result;
    }
    public function saveAllotTask($data)
    {
        // print_r($data);die;
       
       $result = $this->db->table('tbl_allotTaskDetails')->insert($data);
       if($result){
        return true;
       }
       else{
        return false;
       }
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        $session = session();
        
        $result = $this->db
            ->table('employee_tbl')
            ->where(["email" => $email, "password" => $password])
            ->get()
            ->getRow();

        if ($result) {
            $sessiondata = [
                'id'                 => $result->id,
                'role'               => $result->role,
                'email'              => $result->email,
                'password'           => $result->password,
                'cpassword'          => $result->confirm_pass,
                'user_name'          => $result->full_name,
                'mobile_no'          => $result->mobile_no,
                'country'            => $result->country,
                'Assign_Techer_id'   => $result->Assign_Techer_id,
                'SessionType'        => $result->SessionType,
                'Payment_status'     => $result->Payment_status,
                'access_level'       => $result->access_level,
                'is_logged_in'       => 'Y',
                'SessionsCount'      =>$result->SessionsCount,
                'mobileWithCode'     =>$result->mobileWithCode,
            ];

            $session->set('sessiondata', $sessiondata);
            return $sessiondata;
        } else {
            return null;
        }
    }
    public function getsinglerow($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getRow();
    
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
     public function getDailyReport()
        {
            return $this->db->table('tbl_daily_work')
                ->select('tbl_daily_work.*, employee_tbl.emp_name')
                ->join('employee_tbl', 'employee_tbl.Emp_id = tbl_daily_work.Emp_id')
                ->where('tbl_daily_work.is_deleted', 'N')
                ->get()
                ->getResult();
        }
    
}