<?php

namespace App\Controllers;
use App\Models\Loginmodel;
class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    
    public function login()
    {
        $session = \CodeIgniter\Config\Services::session();
        $model = new Loginmodel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');  
        $sessiondata = $model->checkLogin($email, $password);
        // print_r($sessiondata);die;
       if ($sessiondata) {
        if ($sessiondata['role'] === 'Admin') {
            return redirect()->to('AdminDashboard');
        } else if ($sessiondata['role'] === 'Employee') {
            return redirect()->to('Employeedashboard');
        }
    } else {
        $session->setFlashdata('errormessage', 'Invalid .');       
        return redirect()->to('/');
    }
    }
    public function check_username_id()
    {
        $loginModel = new Loginmodel();
        $username = $this->request->getPost('username');

        if ($username) {
            $email = $loginModel->checkExist($username, 'emp_email', 'employee_tbl');
            // echo "<pre>";
            // print_r($email);exit();
            return json_encode($email);
        } else {
            return json_encode([]);
        }
    }
    
}
