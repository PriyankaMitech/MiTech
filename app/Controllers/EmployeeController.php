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
        $session = \CodeIgniter\Config\Services::session();
        $model = new Loginmodel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');  
        $data['sessiondata'] = $model->checkLogin($email, $password);
        return view('Employee/Employeedashboard',$data);
    }
//     public function saveProfile()
// {
// //    print_r($_POST);die;
// $empName = $this->request->getPost('empName');
// $empEmail = $this->request->getPost('empEmail');
// $empMobile = $this->request->getPost('empMobile');
// $empCurrentAddress = $this->request->getPost('empCurrentAddress');
// $empPermanentAddress = $this->request->getPost('empPermanentAddress');
// $skillName = $this->request->getPost('skillName');
// $programmingOptions = $this->request->getPost('programmingOptions');
// $PhotoFile = $this->request->getPost('PhotoFile');
// $ResumeFile = $this->request->getPost('ResumeFile');
// $PANFile = $this->request->getPost('PANFile');
// $AadharFile = $this->request->getPost('AadharFile');

// // Instantiate your model
// $model = new Adminmodel();

// // Prepare data array
// $data = [
//     'emp_name' => $empName,
//     'emp_email' => $empEmail,
//     'mobile_no' => $empMobile,
//     'current_address' => $empCurrentAddress,
//     'permanent_address' => $empPermanentAddress,
//     'skill_name' => $skillName,
//     'programming_language' => $programmingOptions,
//     'PhotoFile' =>$PhotoFile,
//     'ResumeFile'=>$ResumeFile,
//     'PANFile'=>$PANFile,
//     'AadharFile'=>$AadharFile
   
// ];
// //    print_r($data);die;
// // $tableName='tbl_project';
// // $model->insertDatatoproject($data);


//    // Access session data
//    $sessionData = session()->get('sessiondata');
//    $emp_id = $sessionData['Emp_id'];
// $db = \Config\Database::Connect();
//     if ($emp_id  == "") {
//         $add_data = $db->table('employee_tbl');
//         $add_data->insert($data);
//         session()->setFlashdata('success', 'Employee details added successfully.');
//     } else {
//         $update_data = $db->table('employee_tbl')->where('Emp_id', $emp_id);
//         $update_data->update($data);
//         $session = session();
//         if ($update_data) {
//            // Update session data with new skill name
//         $sessionData['skill_name'] = $skillName;
//         $sessionData = session()->set('sessiondata', $sessionData);   
//         // print_r($session->get('sessiondata'));die;    
//         session()->setFlashdata('success', 'Employee details updated successfully.');
//     }


// return redirect()->to('');
// }
// }

public function saveProfile()
{
    $empName = $this->request->getPost('empName');
    $empEmail = $this->request->getPost('empEmail');
    $empMobile = $this->request->getPost('empMobile');
    $empCurrentAddress = $this->request->getPost('empCurrentAddress');
    $empPermanentAddress = $this->request->getPost('empPermanentAddress');
    $skillName = $this->request->getPost('skillName');
    $programmingOptions = $this->request->getPost('programmingOptions');

    $data = [
        'emp_name' => $empName,
        'emp_email' => $empEmail,
        'mobile_no' => $empMobile,
        'current_address' => $empCurrentAddress,
        'permanent_address' => $empPermanentAddress,
        'skill_name' => $skillName,
        'programming_language' => $programmingOptions,
    ];

    $uploads = ['PhotoFile', 'ResumeFile', 'PANFile', 'AadharFile'];
    $uploadPaths = [
        'PhotoFile' => 'public/uploads/photos/',
        'ResumeFile' => 'public/uploads/resumes/',
        'PANFile' => 'public/uploads/pan/',
        'AadharFile' => 'public/uploads/aadhar/'
    ];

    foreach ($uploads as $fileKey) {
        $file = $this->request->getFile($fileKey);
        if ($file->isValid() && !$file->hasMoved()) {
          
            $newName = $file->getName();
            // echo'<pre>';print_r($newName);
            $file->move($uploadPaths[$fileKey], $newName);
            $data[$fileKey] = $newName; // Store the new file name in the data array
        }
    }

    // Instantiate your model
    $model = new Adminmodel();
    $sessionData = session()->get('sessiondata');
    $emp_id = $sessionData['Emp_id'];

    $db = \Config\Database::connect();
    if ($emp_id == "") {
        $add_data = $db->table('employee_tbl');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Employee details added successfully.');
    } else {
        $update_data = $db->table('employee_tbl')->where('Emp_id', $emp_id);
        $update_data->update($data);
        if ($update_data) {
            $sessionData['skill_name'] = $skillName;
            session()->set('sessiondata', $sessionData);
            session()->setFlashdata('success', 'Employee details updated successfully.');
        }
    }
    return redirect()->to('saveSignupTime');
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
    $session = \CodeIgniter\Config\Services::session();
$session->setFlashdata('success', 'Leave application successfully submited.');       

    return redirect()->to('leave_form');
}

public function myTasks() {

    $session = session();
    $sessionData = $session->get('sessiondata');
    $emp_id = $sessionData['Emp_id'];

    $model = new Adminmodel();
    $wherecond = array('emp_id' => $emp_id);
    $data['TaskDetails'] =  $model->getalldata('tbl_allotTaskDetails', $wherecond);

    $data['alottask']= $model->getallalottaskstatus($emp_id);
    // echo'<pre>';print_r($data['TaskDetails']);die;

    // Fetch main task names for each task
    if(!empty($data['TaskDetails'])){
    foreach ($data['TaskDetails'] as $key => $task) {
        $allotTaskId = $task->id;
        $mainTaskId = $task->mainTask_id;
        $mainTaskData = $model->get_single_data('tbl_mainTaskMaster', ['id' => $mainTaskId]);
        $data['TaskDetails'][$key]->mainTaskName = $mainTaskData->mainTaskName;
    }
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
    if(!empty($data['TaskDetails'])){
   $data['totalTasks'] = count($data['TaskDetails']);
    $data['projectTaskCounts'] = $projectTaskCounts;
    // echo'<pre>';print_r($data);die;
}

    return view('Employee/myTaskDetails', $data);
}

public function startTask()
{
    // Handle start task action
    // Access POST data using $this->request->getPost('taskId')
    // print_r($this->request->getPost('taskId'));die;
     // print_r($_POST);die;
 
     $session = session();
     $sessionData = $session->get('sessiondata');
     $emp_id = $sessionData['Emp_id'];
     $task_id = $this->request->getPost('taskId');
 
     $db = \Config\Database::connect();
 
     // Check if the start time already exists for the task
     $startTimeExists = $db->table('tbl_workingTime')
                           ->where('allotTask_id', $task_id)
                           ->countAllResults() > 0;
 
     // If start time doesn't exist, insert it
     if (!$startTimeExists) {
         $data = [
             'allotTask_id' => $task_id,
             'emp_id' => $emp_id,
            //  'start_time' => date('Y-m-d H:i:s'),
             'working_status' => 'work_started',
         ];
 
         $db->table('tbl_workingTime')->insert($data);
     }
 
     return redirect()->to('myTasks');

}

public function pauseTask()
{
    // Handle pause task action
    // Access POST data using $this->request->getPost('taskId')
    // print_r($_POST);die;
    $db = \Config\Database::connect();
    $session = session();
    $sessionData = $session->get('sessiondata');
    // print_r($sessionData);die;
    $emp_id = $sessionData['Emp_id'];
    $task_id = $this->request->getpost('taskId'); // Adjust this according to your framework's method of accessing POST data
    
    // Insert current time into tbl_workingTime table
    $current_time = date('Y-m-d H:i:s'); // Get current time in the required format
    $data = array(
        'allotTask_id' => $task_id,
        'emp_id'=> $emp_id,
        // 'start_time' => $current_time,
        'working_status' => 'work_paused',   
    );

    $table = 'tbl_pauseTiming';
    $result = $db->table($table)->insert($data);
    
    return redirect()->to('myTasks');
}

public function unpauseTask()
{
    $db = \Config\Database::connect();
    $session = session();
    $sessionData = $session->get('sessiondata');
    $emp_id = $sessionData['Emp_id'];
    $task_id = $this->request->getpost('taskId');

    // Get the last inserted ID for the specific task
    $lastId = null;
    $lastRecord = $db->table('tbl_pauseTiming')
                    ->where('allotTask_id', $task_id)
                    ->orderBy('id', 'desc')
                    ->limit(1)
                    ->get()
                    ->getRow();
    if ($lastRecord !== null) {
        $lastId = $lastRecord->id;
    }
    // print_r($lastId);die;

    // Check if pause_time exists for the given task_id
    $pauseTimeExists = $db->table('tbl_pauseTiming')
        ->where('allotTask_id', $task_id)
        ->where('resume_time', NULL)
        ->where('id',$lastId)
        ->get()
        ->getRow();
        // echo'<pre>';print_r($db->getLastQuery());die;
        //  print_r($pauseTimeExists);die;



    // Check if resume_time exists for the given task_id
    $resumeTimeExists = $db->table('tbl_pauseTiming')
        ->where('allotTask_id', $task_id)
        ->where('id',$lastId)
        ->where('resume_time IS NOT NULL')
        ->countAllResults() > 0;
        // print_r($resumeTimeExists);die;


    // if ($pauseTimeExists && !$resumeTimeExists) {
    //     // Update the row where resume_time is NULL
    //    $result =  $db->table('tbl_pauseTiming')
    //         ->where('allotTask_id', $task_id)
    //         ->where('resume_time', NULL)
    //         ->update([
    //             // 'resume_time' => date('Y-m-d H:i:s'),
    //             'working_status' => 'work_resumed'
    //         ]);
    //         // print_r($result);die;
    // }
    
    if ($pauseTimeExists) {
        // Update the row where resume_time is NULL
       $result =  $db->table('tbl_pauseTiming')
            ->where('allotTask_id', $task_id)
            ->where('resume_time', NULL)
            ->update([
                // 'resume_time' => date('Y-m-d H:i:s'),
                'working_status' => 'work_resumed'
            ]);
            // print_r($result);die;
    }
    // print_r($result);die;

    // Pass the last inserted ID and task ID to the view
    $data['lastInsertedId'] = $lastId;
    $data['task_id'] = $task_id;
    // print_r($data);die;

    return redirect()->to('myTasks');
}



public function finishTask()
{
    // Handle finish task action
    // Access POST data using $this->request->getPost('taskId')
    $session = session();
     $sessionData = $session->get('sessiondata');
     $emp_id = $sessionData['Emp_id'];
     $task_id = $this->request->getPost('taskId');
 
     $db = \Config\Database::connect();
 
     // Check if the start time already exists for the task
     $startTimeExists = $db->table('tbl_workingTime')
                           ->where('allotTask_id', $task_id)
                           ->countAllResults() > 0;
 
     // If start time doesn't exist, insert it
     if ($startTimeExists) {
         
         $result1 =  $db->table('tbl_workingTime')
         ->where('allotTask_id', $task_id)
         ->where('emp_id', $emp_id)
         ->update([
             // 'resume_time' => date('Y-m-d H:i:s'),
             'working_status' => 'work_end'
         ]);

         $result2 =  $db->table('tbl_allotTaskDetails')
         ->where('id', $task_id)
         ->where('emp_id', $emp_id)
         ->update([
             // 'resume_time' => date('Y-m-d H:i:s'),
             'Developer_task_status' => 'complete'
         ]);
 
        //  echo" result1 :";print_r($result1);echo" result2 :";print_r($result2);die;
     }
 
     return redirect()->to('myTasks');
}

public function TaskTesting(){
    return view('Employee/TaskTesting'); 
}
public function TesterDashboard(){

}

public function createTestCase(){
    return view('Employee/createTestCase');
}

public function saveTestCase()
    { // Retrieve form data

        $steps = $this->request->getPost("steps");
        $stepsString = implode(", ", $steps); // Join the steps array into a string
        $data = [
            'testCaseId' => $this->request->getPost("testCaseId"),
            'objectives' => $this->request->getPost("objectives"),
            'prerequisites' => $this->request->getPost("prerequisites"),
            'expectedResult' => $this->request->getPost("expectedResult"),
            'actualResult' => $this->request->getPost("actualResult"),
            'testOption' => $this->request->getPost("option"),
            'requiredChanges' => $this->request->getPost("requiredChanges"),
            'comment' => $this->request->getPost("comment"),
            'steps' => $stepsString // Assign the steps string without brackets 
        ];
        // print_r($data);die;

        // Save the form data to the database
        $employeeModel = new Employeemodel();
        $employeeModel->saveTestCase($data);


        // Redirect back to the form with a success message or to another page
        return redirect()->to('createTestCase')->with('success', 'Test case created successfully');
    }

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

    $model = new Adminmodel();
    $data['employeeTiming'] =$model->getEmployeeTiming($emp_id);
    // print_r($data);die;


    return view('Employee/signUpTime',$data);
}

public function saveWorkingTime() {
    // print_r($_POST);die;
    $db = \Config\Database::connect();
    $session = session();
    $sessionData = $session->get('sessiondata');
    // print_r($sessionData);die;
    $emp_id = $sessionData['Emp_id'];
    $task_id = $this->request->getpost('task_id'); // Adjust this according to your framework's method of accessing POST data
    
    // Insert current time into tbl_workingTime table
    $current_time = date('Y-m-d H:i:s'); // Get current time in the required format
    $data = array(
        'allotTask_id' => $task_id,
        'emp_id'=> $emp_id,
        // 'start_time' => $current_time,
        'working_status' => 'work_started',   
    );

    $table = 'tbl_workingTime';
    $result = $db->table($table)->insert($data);
    // $db->insert('tbl_workingTime', $data); // Adjust this according to your framework's method of database interaction
// print_r($result);die;
    // Redirect or return response as needed
}
// public function recordAction()
// {
//     print_r($_POST);
//     // exit();
// }

public function recordAction()
{
    $db = \Config\Database::connect();
    $session = session();
    $sessionData = $session->get('sessiondata');
    $emp_id = $sessionData['Emp_id'];

    // Validate input data
    $validationRules = [
        'task_id' => 'required|numeric',
        'action' => 'required|in_list[start,pause_start,pause_end,finish]',
        'timestamp' => 'required|valid_date'
    ];

    if (!$this->validate($validationRules)) {
        return $this->response->setJSON(['error' => $this->validator->getErrors()])
                              ->setStatusCode(400);
    }

    // Retrieve input data
    $taskId = $this->request->getVar('task_id');
    $action = $this->request->getVar('action');
    $timestamp = $this->request->getVar('timestamp');

    // Initialize $lastInsertedId to null
    $lastInsertedId = null;

    // Handle different actions
    switch ($action) {
        case 'start':
            $data = [
                'allotTask_id' => $taskId,
                'emp_id' => $emp_id,
                'start_time' => $timestamp,
                'working_status' => 'work_started',   
            ];
            $table = 'tbl_workingTime';
            $result = $db->table($table)->insert($data);

            // Get the last inserted ID
            $lastInsertedId = $db->insertID();
            // print_r($lastInsertedId);die;
            // Set flag to indicate task has started

            break;

        case 'pause_start':
            // Update the working_status to 'paused'
            // Insert into tbl_pauseTiming with the last inserted ID from 'start' case
            if ($lastInsertedId !== null) {
                $data = [
                    'allotTask_id' => $taskId,
                    'tbl_WorkingTimeId' => $lastInsertedId,
                    'pause_time' => $timestamp,
                    'working_status' => 'work_paused',   
                ];
                $table = 'tbl_pauseTiming';
                $result = $db->table($table)->insert($data);
            } else {
                // Handle the case when $lastInsertedId is not set
                // You may want to log an error or handle it differently
                echo "in else";
            }
            break;

        case 'pause_end':
            // Update the working_status to 'resumed'
            $db->table('tbl_pauseTiming')
                ->where('allotTask_id', $taskId)
                ->where('resume_time', NULL)
                ->update([
                    'resume_time' => $timestamp,
                    'working_status' => 'work_resumed'
                ]);
            break;

        case 'finish':
            // Update the finish_time and working_status to 'finished'
            $db->table('tbl_workingTime')
                ->where('allotTask_id', $taskId)
                ->where('emp_id', $emp_id)
                ->update([
                    'end_time' => $timestamp,
                    'working_status' => 'finished'
                ]);
            break;

        default:
            // Handle unknown action
            return $this->response->setJSON(['error' => 'Invalid action'])
                                  ->setStatusCode(400);
            break;
    }

    // Return response
    return $this->response->setJSON(['message' => 'Action recorded successfully'])
                            ->setStatusCode(200);
}

public function checkStartTime()
{
    // Get task ID from AJAX request
    $taskId = $this->request->getPost('task_id');

    // Load the model
    $model = new Adminmodel();

    // Check if start time exists for the task ID
    $startTimeExists = $model->checkStartTime($taskId);

    // Return JSON response
    return $this->response->setJSON(['startTimeExists' => $startTimeExists]);
}









}





