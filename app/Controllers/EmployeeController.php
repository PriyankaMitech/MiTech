<?php

namespace App\Controllers;
use App\Models\Loginmodel;
use App\Models\Adminmodel;
use App\Models\Employeemodel;

class EmployeeController extends BaseController
{

    public function __construct()
    {
        // Load the session helper
        helper(['session']);
    }
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


   // Access session data
   $sessionData = session()->get('sessiondata');
   $emp_id = $sessionData['Emp_id'];
$db = \Config\Database::Connect();
    if ($emp_id  == "") {
        $add_data = $db->table('employee_tbl');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Employee details added successfully.');
    } else {
        $update_data = $db->table('employee_tbl')->where('Emp_id', $emp_id);
        $update_data->update($data);
        $session = session();
        if ($update_data) {
           // Update session data with new skill name
        $sessionData['skill_name'] = $skillName;
        $sessionData = session()->set('sessiondata', $sessionData);   
        // print_r($session->get('sessiondata'));die;    
        session()->setFlashdata('success', 'Employee details updated successfully.');
    }


return redirect()->to('');
}
}

public function saveSignupTime(){

    $model = new Adminmodel();
    // $data['session_id'] = $session_id;
    // Access session data
    $sessionData = session()->get('sessiondata');
    $emp_id = $sessionData['Emp_id'];
    $data['employeeTiming'] =$model->getEmployeeTiming($emp_id);
    // print_r($data);die;


    $wherecond = array('role' => 'Admin');
    $data['AdminData']= $model->getalldata('employee_tbl', $wherecond);
    return view('Employee/signUpTime',$data);
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

public function myTasks() {

    $session = session();
    $sessionData = $session->get('sessiondata');
    $emp_id = $sessionData['Emp_id'];

    $model = new Adminmodel();
    $wherecond = array('emp_id' => $emp_id);
    $data['TaskDetails'] =  $model->getalldata('tbl_allotTaskDetails', $wherecond);

    // Fetch main task names for each task
    foreach ($data['TaskDetails'] as $key => $task) {
        $mainTaskId = $task->mainTask_id;
        $mainTaskData = $model->get_single_data('tbl_mainTaskMaster', ['id' => $mainTaskId]);
        $data['TaskDetails'][$key]->mainTaskName = $mainTaskData->mainTaskName;
    }

    // Initialize an empty array to store the count of tasks for each project
    $projectTaskCounts = array();

    if (!empty($data['TaskDetails'])) {
        foreach ($data['TaskDetails'] as $task) {
            $projectId = $task->project_id;

            // Increment the count of tasks for the current project_id
            if (isset($projectTaskCounts[$projectId])) {
                $projectTaskCounts[$projectId]['taskCount']++;
            } else {
                // Retrieve project details
                $wherecond = array('p_id' => $projectId);
                $projectData = $model->get_single_data('tbl_project', $wherecond);
                $projectName = $projectData->projectName;

                // Store project details and initialize task count
                $projectTaskCounts[$projectId] = array(
                    'projectId' => $projectId,
                    'projectName' => $projectName,
                    'taskCount' => 1
                );
            }
        }
    }

    // Total tasks count
    $totalTasks = count($data['TaskDetails']);

    return view('Employee/myTaskDetails', compact('totalTasks', 'projectTaskCounts', 'data'));
}

// public function saveTimeOut()
// {
//     // print_r($_POST);die;
//      echo"Save time out";
//      $session = session();
//     $sessionData = $session->get('sessiondata');
//     // print_r($sessionData);die;
//     $emp_id = $sessionData['Emp_id'];
//     // Get form data from POST request
//     $date = $this->request->getPost('date');
//     $from = $this->request->getPost('from');
//     $to = $this->request->getPost('to');
//     $reason = $this->request->getPost('reason');

//     // Validate the form data if needed

//     // Create a new instance of the TimeOutModel
//     // $model = new Employeemodel();

//     // Insert data into the database
//     $data = [
//         'Date' => $date,
//         'from_time' => $from,
//         'to_time' => $to,
//         'reason' => $reason,
//         'emp_id' => $emp_id
//     ];
//     // print_r($data);die;

//     $db = db_connect(); 
//     $builder = $db->table('tbl_timeOut'); 
//     $builder->insert($data);
//     // $model->insert($data);

//     // Optionally, redirect to another page after saving
//     return redirect()->to('saveSignupTime')->with('success', 'Time Out saved successfully');
// }
public function saveTimeOut()
{
    // Your existing code to retrieve session data and form input
    // print_r($_POST);die;
     echo"Save time out";
     $session = session();
    $sessionData = $session->get('sessiondata');
    // print_r($sessionData);die;
    $emp_id = $sessionData['Emp_id'];
    // Get form data from POST request
    $date = $this->request->getPost('date');
    $from = $this->request->getPost('from');
    $to = $this->request->getPost('to');
    $reason = $this->request->getPost('reason');

    // Check the current working status of the employee from the database
    // $db = db_connect();
    // $builder = $db->table('tbl_employeeTiming');
    // $builder->where('emp_id', $emp_id);
    // $query = $builder->get();
    // $employeeTiming = $query->getRow();
    $model = new Adminmodel();
    $data['employeeTiming'] =$model->getEmployeeTiming($emp_id);
    // print_r($data);die;

    // Check if the employee is currently punched in
    // if ($employeeTiming && $employeeTiming->action === 'punchIn') {
    //     // If punched in, do not change the working status
    //     // You can optionally give a message here or handle it in JavaScript
    // } else {
    //     // If punched out, update the working status to "punchOut"
    //     $data = [
    //         'action' => 'punchOut'
    //     ];
    //     $builder->update($data);
    // }

    // Insert data into the timeout table
    // Your existing code to insert timeout data

    // Redirect to another page after saving
    // return redirect()->to('saveSignupTime')->with('success', 'Time Out saved successfully');
    return view('Employee/signUpTime',$data);
}




}





