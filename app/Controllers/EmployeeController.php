<?php

namespace App\Controllers;
use App\Models\Loginmodel;
use App\Models\Adminmodel;
use App\Models\Employeemodel;

class EmployeeController extends BaseController
{
public function EmployeeDashboard()
    {
        return view('Employee/EmployeeDashboard');
    }
    public function saveProfile()
{
//    print_r($_POST);die;
$empName = $this->request->getPost('empName');
$empEmail = $this->request->getPost('empEmail');
$empMobile = $this->request->getPost('empMobile');
$empCurrentAddress = $this->request->getPost('empCurrentAddress');
$empPermanentAddress = $this->request->getPost('empPermanentAddress');
$skillName = $this->request->getPost('skillName');
$programmingOptions = $this->request->getPost('programmingOptions');
$PhotoFile = $this->request->getPost('PhotoFile');
$ResumeFile = $this->request->getPost('ResumeFile');
$PANFile = $this->request->getPost('PANFile');
$AadharFile = $this->request->getPost('AadharFile');



// Instantiate your model
$model = new Adminmodel();

// Prepare data array
$data = [
    'emp_name' => $empName,
    'emp_email' => $empEmail,
    'mobile_no' => $empMobile,
    'current_address' => $empCurrentAddress,
    'permanent_address' => $empPermanentAddress,
    'skill_name' => $skillName,
    'programming_language' => $programmingOptions,
    'PhotoFile' =>$PhotoFile,
    'ResumeFile'=>$ResumeFile,
    'PANFile'=>$PANFile,
    'AadharFile'=>$AadharFile
   
];
//    print_r($data);die;
// $tableName='tbl_project';
// $model->insertDatatoproject($data);
$db = \Config\Database::Connect();
    if ($this->request->getVar('id') ==     "") {
        $add_data = $db->table('employee_tbl');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Employee details added successfully.');
    } else {
        $update_data = $db->table('employee_tbl')->where('id', $this->request->getVar('id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Employee details updated successfully.');
    }


return redirect()->to('');
}

public function saveSignupTime(){
    return view('Employee/signUpTime');
}

public function punchAction(){
    // print_r($_POST);die;
    $db  = \Config\Database::Connect();
    $action = $this->request->getJSON()->action;
   
    $add_data = $db->table('employee_tbl');
    $add_data->insert($data);
    print_r($action);die;
    return $this->response->setJSON(['status' => 'success']);
}
}





