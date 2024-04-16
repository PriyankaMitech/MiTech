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
public function leave_form()
{
    $session = session();
    $sessionData = $session->get('sessiondata');
    $Emp_id = $sessionData['Emp_id'];
    $model = new Adminmodel();
    $wherecond = array('role ' => 'Employee');
    $data['Employee'] =  $model->getalldata('employee_tbl', $wherecond);
    $wherecond = array('applicant_employee_id'=>$Emp_id  );
    $data['application'] =  $model->getalldata('tbl_leave_requests', $wherecond);

    // echo '<pre>' ; print_r($data['application']);die;
    echo view('Employee/leave_form',$data);
}
public function leave_request()
{
  
    $session = session();
    $sessionData = $session->get('sessiondata');
    $Emp_id = $sessionData['Emp_id'];
    $from_date = $this->request->getPost('from_date');
    $to_date = $this->request->getPost('to_date');
    $rejoining_date = $this->request->getPost('rejoining_date');
    $reason = $this->request->getPost('reason');
    $employee_name = $this->request->getPost('hand_emp_id');
    $project_manager =('1'); 
    $hr_director =('1'); 
    $data = [
        'from_date' => $from_date,
        'to_date' => $to_date,
        'applicant_employee_id' => $Emp_id, 
        'rejoining_date' => $rejoining_date,
        'reason' => $reason,
        'hand_emp_id' => $employee_name,
        'project_manager' => $project_manager,
        'hr_director' => $hr_director
    ];
    $db = db_connect(); 
    $builder = $db->table('tbl_leave_requests'); 
    $builder->insert($data);
    return redirect()->to('leave_form');
}
}





