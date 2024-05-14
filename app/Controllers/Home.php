<?php

namespace App\Controllers;
use App\Models\Loginmodel;
use App\Models\Adminmodel;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    
    public function login()
    {
        $adminModel = new Adminmodel();

        $session = \CodeIgniter\Config\Services::session();
        $model = new Loginmodel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');  
        $data['sessiondata'] = $model->checkLogin($email, $password);
        // print_r($data);die;
       if ($data['sessiondata']) {
        if ($data['sessiondata']['role'] === 'Admin') {
            $session->setFlashdata('success', 'Login Successfully.');       

            return redirect()->to('AdminDashboard');
            // return view('Admin/AdminDashboard',$data);

        } else if ($data['sessiondata']['role']=== 'Employee') {
            $wherecond = array('Emp_id' =>$data['sessiondata']['Emp_id']);


            $empdata = $adminModel->getsinglerow('employee_tbl', $wherecond);
        
            $session->setFlashdata('success', 'Login Successfully.');   
            if (!empty($empdata)) {
                if ($empdata->AadharFile == '') {
                    echo 'EmployeeDashboard';
                    return redirect()->to('EmployeeDashboard');

                } else {
                    echo 'saveSignupTime';
                    return redirect()->to('saveSignupTime');

                }
            }     
            // return redirect()->to('EmployeeDashboard');
            // return view('Employee/EmployeeDashboard',$data);

        }
        else if ($data['sessiondata']['role']=== 'sub_admin') {
            $session->setFlashdata('success', 'Login Successfully.');       

            echo "Sub AdminDashboard";
            // return redirect()->to('AdminDashboard');
            // return view('Employee/EmployeeDashboard',$data);

        }
    } else {
        $session->setFlashdata('error', 'Invalid Login Details');       
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

    public function logout()
    {
        $session = session();
        // session_destroy();
        $session->destroy();
        // print_r($_SESSION);die;
        return redirect()->to(base_url());
    }
    
}
