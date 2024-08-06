<?php

namespace App\Models;

use CodeIgniter\Model;

class Loginmodel extends Model
{
    protected $table = 'employee_tbl';
    protected $primaryKey = 'Emp_id';
    protected $allowedFields = ['emp_email', 'password', 'role'];
    // protected $table = 'tbl_user';
    // protected $primaryKey = 'id';
    // protected $allowedFields = ['email', 'password', 'role'];

    public function checkLogin($email, $password)
    {
        // Fetch user details where email, password, and is_deleted='N'
        $result = $this->where('emp_email', $email)
                       ->where('password', $password)
                       ->where('is_deleted', 'N')
                       ->get()
                       ->getRow();
    
        // Initialize session
        $session = session();
    
        if ($result) {
            // User found, set session data
            $sessiondata = [
                'Emp_id'               => $result->Emp_id,
                'emp_name'             => $result->emp_name,
                'emp_email'            => $result->emp_email,
                'emp_department'       => $result->emp_department,
                'role'                 => $result->role,
                'password'             => $result->password,
                'mobile_no'            => $result->mobile_no,
                'emergency_number'     => $result->emergency_number,
                'status'               => $result->status,
            ];
    
            // Store session data
            $session->set('sessiondata', $sessiondata);
    
            // Return session data
            return $sessiondata;
        } else {
            // No user found or user is deleted
            return null;
        }
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