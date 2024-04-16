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
public function punchAction()
{
    $db = \Config\Database::connect();
    $action = $this->request->getJSON()->action;

    // Access session data
    $sessionData = session()->get('sessiondata');
    $emp_id = $sessionData['Emp_id'];

    // Check if the action is punchIn or punchOut
    if ($action === 'punchIn') {
        $data = [
            'emp_id' => $emp_id,
            'action' => 'punchIn',
            // 'punch_in_time' => date('Y-m-d H:i:s')
        ];

        $table = 'tbl_employeeTiming';
        $result = $db->table($table)->insert($data);

        if ($result) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Punched in successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Error in data insertion']);
        }
    } elseif ($action === 'punchOut') {
        $data = [
            'action' => 'punchOut',
            // 'punch_out_time' => date('Y-m-d H:i:s')
        ];

        $table = 'tbl_employeeTiming';
        $result = $db->table($table)
            ->where('emp_id', $emp_id)
            ->where('action', 'punchIn')
            ->update($data);

        if ($result) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Punched out successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Error in updating data']);
        }
    } else {
        // Invalid action, handle accordingly (e.g., return an error response)
        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid action']);
    }
}





}





