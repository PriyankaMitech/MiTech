<?php

namespace App\Models;

use CodeIgniter\Model;

class Loginmodel extends Model
{
    protected $table = 'employee_tbl';
    protected $primaryKey = 'Emp_id';
    protected $allowedFields = ['emp_email', 'password', 'role'];

    public function checkLogin($email, $password)
    {
        $result = $this->where('emp_email', $email)->where('password', $password)->get()->getRow();
        // $jsonResult = json_encode($result);
        $session = session();
        if ($result) {
            $sessiondata = [
                'Emp_id '               => $result->Emp_id,
                'emp_name'              => $result->emp_name,
                'emp_email'             => $result->emp_email,
                'emp_department'        => $result->emp_department,
                'role'                  => $result->role,
                'password'              => $result->password,
                'mobile_no'             => $result->mobile_no,
                'address'               => $result->address,
                'emergency_number'      => $result->emergency_number,
               
                // 'is_logged_in'       => 'Y',
                
            ];

            $session->set('sessiondata', $sessiondata);
            return $sessiondata;
        } else {
            return null;
        }

        // return $result;
    }

    public function checkExist($value, $column, $table)
    {
        $result = $this->db
        ->table($table)
        ->select('Emp_id')
        ->where("emp_email", $value)
        ->orWhere("mobile_no", $value)
        ->get()->getRow();

       return !empty($result);
    }



}