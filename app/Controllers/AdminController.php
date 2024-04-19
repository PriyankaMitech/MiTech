<?php

namespace App\Controllers;
use App\Models\Loginmodel;
use App\Models\Adminmodel;
class AdminController extends BaseController
{

    public function AdminDashboard()
    {
        return view('Admin/AdminDashboard');
    }

    public function createemployee()
    {
        $result = session();
        // $session_id = $result->get('id');
        $model = new Adminmodel();
        // $data['session_id'] = $session_id;
        $wherecond = array('is_deleted' => 'N');
        $data['DepartmentData']= $model->getalldata('tbl_Department', $wherecond);
        return view('Admin/create_emp',$data);
    }

   public function createemp()
   {
    $emp_name = $this->request->getPost('emp_name');
    $emp_email = $this->request->getPost('emp_email');
    $mobile_no = $this->request->getPost('mobile_no');
    $emp_department = $this->request->getPost('emp_department');
    $emp_joiningdate = $this->request->getPost('emp_joiningdate');
    $password = $this->request->getPost('password');

    $model = new Adminmodel();
    $data = [
        'emp_name' => $emp_name,
        'emp_email' => $emp_email,
        'mobile_no' => $mobile_no,
        'role'=>'Employee',
        'emp_department' => $emp_department,
        'emp_joiningdate' => $emp_joiningdate,
        'password'=> $password
    ];
    // print_r($data);die;
    $tableName='employee_tbl';
    $model->insertData($tableName, $data);
    return redirect()->to('create_emp');
   }

    public function createproject()
    {
        $result = session();
        // $session_id = $result->get('id');
        $model = new Adminmodel();
        // $data['session_id'] = $session_id;
        $wherecond = array('is_deleted' => 'N');
        $data['projectData']= $model->getalldata('tbl_project', $wherecond);
        $data['DepartmentData']= $model->getalldata('tbl_Department', $wherecond);
    //    echo '<pre>';print_r($data);die;
       return view('Admin/createproject',$data);
    }
    public function project()
    {
    //    print_r($_POST);die;
    $projectName = $this->request->getPost('projectName');
    $companyName = $this->request->getPost('companyName');
    $GSTIN = $this->request->getPost('GSTIN');
    $clientName = $this->request->getPost('Client_name');
    $clientEmail = $this->request->getPost('Client_email');
    $clientMobileNo = $this->request->getPost('Client_mobile_no');
    $technology = $this->request->getPost('Technology');
    $startDate = $this->request->getPost('Project_startdate');
    $deliveryDate = $this->request->getPost('Project_DeliveryDate');
    $TargetedUAT = $this->request->getPost('TargetedUAT');
    $POCname = $this->request->getPost('POCname');
    $POCemail = $this->request->getPost('POCemail');
    $POCmobileNo = $this->request->getPost('POCmobileNo');


    // Instantiate your model
    $model = new Adminmodel();

    // Prepare data array
    $data = [
        'projectName' => $projectName,
        'CompanyName' => $companyName,
        'GSTIN' => $GSTIN,
        'Client_name' => $clientName,
        'Client_email' => $clientEmail,
        'Client_mobile_no' => $clientMobileNo,
        'Technology' => $technology,
        'Project_startdate' => $startDate,
        'Project_DeliveryDate' => $deliveryDate,
        'TargetedUAT_Date' => $TargetedUAT,
        'POC_name'=> $POCname,
        'POC_email'=> $POCemail,
        'POC_mobile_no'=> $POCmobileNo
        
    ];
//    print_r($data);die;
    // $tableName='tbl_project';
    // $model->insertDatatoproject($data);
    $db = \Config\Database::Connect();
        if ($this->request->getVar('id') ==     "") {
            $add_data = $db->table('tbl_project');
            $add_data->insert($data);
            session()->setFlashdata('success', 'Project added successfully.');
        } else {
            $update_data = $db->table('tbl_project')->where('p_id', $this->request->getVar('id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'Project updated successfully.');
        }


    return redirect()->to('create_project');
    }
    public function addNewUser(){
        $session = session();
        $model = new Adminmodel();
        $sessionData =  $session->get('sessiondata');

        if (isset($sessionData)) {
            $email = $sessionData['emp_email'] ;
            $password = $sessionData['password'] ;

            if ($email !== null && $password !== null) {

                $wherecond = array('is_deleted' => 'N');

                // echo"Correct data";
                $data['project_data'] = $model->getalldata('tbl_project', $wherecond);
                // print_r($data['project_data']);
                return view('Admin/addUser', $data);
            } else {
                return redirect()->to(base_url());
            }
        } else {
            return redirect()->to(base_url());
        }
    }
    public function AdduserByadmin()
    {

        $accessLevels = $this->request->getVar('access_level');
        // print_r($accessLevels);die;

        // Convert the array of selected checkboxes to a comma-separated string
        $accessLevelString = implode(',', $accessLevels);
        // print_r($accessLevelString);die;
        $data = [
            'emp_name' => $this->request->getVar('full_name'),
            'emp_email' => $this->request->getPost('email'),
            'mobile_no' => $this->request->getPost('mobile_no'),
            'role' => 'sub_admin',
            'password' => $this->request->getPost('password'),
            'access_level' => $accessLevelString,
            // 'is_register_done' => 'Y',
            'created_at' => date('Y:m:d H:i:s'),
        ];

        $db = \Config\Database::Connect();
        if ($this->request->getVar('id') == "") {
            $add_data = $db->table('employee_tbl');
            $add_data->insert($data);
            session()->setFlashdata('success', 'Data added successfully.');
        } else {
            $update_data = $db->table('employee_tbl')->where('id', $this->request->getVar('id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'Data updated successfully.');
        }

        return redirect()->to('adminList');
    }
    public function adminList()
    {
        $model = new AdminModel();


        $wherecond = array('is_deleted' => 'N', 'role' => 'sub_admin');
        $data['user_data'] = $model->getalldata('employee_tbl', $wherecond);

        // echo "<pre>";print_r($data['menu_data']);exit();
        echo view('Admin/adminList', $data);
    }
    public function addTask()
    {
        $model = new Adminmodel();
        $wherecond = array('is_deleted' => 'N');
    
        // Fetch projects from the database
        $data['projectData'] = $model->getalldata('tbl_project', $wherecond); 
        $data['mainTaskData'] = $model->getalldata('tbl_mainTaskMaster', $wherecond);
        $wherecond = array('is_deleted' => 'N');
        $data['taskDetails']= $model->getalldata('tbl_taskDetails', $wherecond); 
        $project_ids = array_column($data['taskDetails'], 'project_id');

        // $project_id = $data['taskDetails']->project_id;
        // $wherecond1 = array('is_deleted' => 'N', 'p_id' => $project_id[1]);
        // $data['single_data'] = $model->get_single_data('tbl_project', $wherecond1);

        // echo'<pre>';print_r($data);die;
       return view('Admin/addTask',$data);
    }

    public function fetchProjects()
    {
        // Load the ProjectModel
        $model = new Adminmodel();
        $wherecond = array('is_deleted' => 'N');
    
        // Fetch projects from the database
        $projects = $model->getalldata('tbl_project', $wherecond); // Assuming you have a ProjectModel with appropriate methods
    // print_r($projects);die;
        // Encode projects array to JSON
        $projects_json = json_encode($projects);
    
        // Return JSON response
        return $this->response->setJSON($projects_json);
    }
    public function get_project()
    {

        $model = new Adminmodel();

        $project_id = $this->request->uri->getSegments(1);
        $wherecond1 = array('is_deleted' => 'N', 'p_id' => $project_id[1]);

        $wherecond = array('is_deleted' => 'N');

        $data['single_data'] = $model->get_single_data('tbl_project', $wherecond1);
        $data['project_data'] = $model->getalldata('tbl_project', $wherecond);
        // echo'<pre>';print_r($data);die;
        echo view('Admin/createproject', $data);
}
public function get_task()
{

    $model = new Adminmodel();

    $task_id = $this->request->uri->getSegments(1);
    $wherecond1 = array('is_deleted' => 'N', 'id' => $task_id[1]);

    $wherecond = array('is_deleted' => 'N');

    $data['single_data'] = $model->get_single_data('tbl_taskDetails', $wherecond1);
    $data['task_data'] = $model->getalldata('tbl_taskDetails', $wherecond);
    $project_id = $data['single_data']->project_id;
    // echo'<pre>';print_r($data);die;
    $wherecond = array('p_id' => $project_id );
    $data['project_data'] = $model->get_single_data('tbl_project', $wherecond);
    // echo'<pre>';print_r($data['project_data']);
    $mainTask_id = $data['single_data']->mainTask_id;
    $wherecond = array('id' => $mainTask_id );
    // $data['mainTask_data'] = $model->get_single_data('tbl_mainTaskMaster', $wherecond);
    // Assuming $data['mainTask_data'] contains the main task details
    // $data['mainTaskData'] = $data['mainTask_data']; // Renaming for consistency
    $wherecond = array('is_deleted' => 'N');
    $data['projectData'] = $model->getalldata('tbl_project', $wherecond);
    $data['mainTaskData'] = $model->getalldata('tbl_mainTaskMaster', $wherecond);

    // echo'<pre>';print_r($data['single_data']);die;
    echo view('Admin/addTask', $data);
}
public function set_project()
{

    $data = [
        'menu_name' => $this->request->getVar('menu_name'),
        'url_location' => $this->request->getVar('url_location'),
        'created_on' => date('Y:m:d H:i:s'),
    ];

    $db = \Config\Database::Connect();
    if ($this->request->getVar('id') ==     "") {
        $add_data = $db->table('tbl_project');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Project added successfully.');
    } else {
        $update_data = $db->table('tbl_project')->where('p_id', $this->request->getVar('id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Project updated successfully.');
    }

    return redirect()->to('createproject');
}
public function task()
{
//    print_r($_POST);die;
$projectId = $this->request->getPost('Projectname');
$mainTaskId = $this->request->getPost('mainTaskName');
$subTaskName = $this->request->getPost('subTaskName');
$PageName = $this->request->getPost('PageName');
$Description = $this->request->getPost('Description');
$condition = $this->request->getPost('condition');
$Taskradio = $this->request->getPost('Taskradio');



// Instantiate your model
$model = new Adminmodel();

// Prepare data array
$data = [
    'project_id' => $projectId,
    'mainTask_id' => $mainTaskId,
    'subTaskName' => $subTaskName,
    'pageName' => $PageName,
    'subTaskDescription' => $Description,
    'condition' => $condition,
    'taskPosition' => $Taskradio,
   
];
//    print_r($data);die;
// $tableName='tbl_project';
// $model->insertDatatoproject($data);
$db = \Config\Database::Connect();
    if ($this->request->getVar('id') ==     "") {
        $add_data = $db->table('tbl_taskDetails');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Task details added successfully.');
    } else {
        $update_data = $db->table('tbl_taskDetails')->where('id', $this->request->getVar('id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Task details updated successfully.');
    }


return redirect()->to('addTask');
}
public function delete()
{

    $uri_data = $this->request->uri->getSegments(2);

    $id = base64_decode($uri_data[1]);
    $table = $uri_data[2];

    // echo "<pre>"; print_r($uri_data);
    // echo $table;
    // echo $id;
    // exit();

    // Update the database row with is_deleted = 1
    $data = ['is_deleted' => 'Y'];
    $db = \Config\Database::connect();

if($table==='tbl_project'){
    $update_data = $db->table($table)->where('p_id', $id);
    $update_data->update($data); 
    session()->setFlashdata('success', 'Data deleted successfully.');
    return redirect()->back();
}else if($table==='tbl_taskDetails'){
    $update_data = $db->table($table)->where('id', $id);
    $update_data->update($data); 
    session()->setFlashdata('success', 'Data deleted successfully.');
    return redirect()->to('addTask');
}
}
public function allotTask(){

    $model = new Adminmodel();
    $wherecond = array('is_deleted' => 'N');
    // Fetch projects from the database
    $data['projectData'] = $model->getalldata('tbl_project', $wherecond);
    $data['DepartmentData'] = $model->getalldata('tbl_Department', $wherecond);  
    $data['mainTaskData'] = $model->getalldata('tbl_mainTaskMaster', $wherecond);
    $data['taskDetails']= $model->getalldata('tbl_taskDetails', $wherecond); 
    $wherecond1 = array('is_deleted' => 'N', 'role' => 'Employee');
    $data['employeeDetails']= $model->getalldata('employee_tbl', $wherecond1); 
    // echo'<pre>';print_r($data);die;
    
    return view('Admin/allotTask',$data);
}

public function allotTaskDetails() {
    // Retrieve form data
    $id = $this->request->getPost('id');
    $projectCount = $this->request->getPost('projectCount');
    $projectName = $this->request->getPost('Projectname');
    $departmentNames = $this->request->getPost('Departmentname[]');
    $mainTaskNames = $this->request->getPost('mainTaskName[]');
    $subTaskNames = $this->request->getPost('subTaskName[]');
    $employeeNames = $this->request->getPost('employeeName[]');
    $workingHours = $this->request->getPost('workingHours[]');
    $workingMinutes = $this->request->getPost('workingMinutes[]');
    // echo'<pre>';print_r($departmentNames);echo"\n";
    // print_r($mainTaskNames);
    // print_r($subTaskNames);
    // print_r($employeeNames);
    // print_r($workingHours);
    // print_r($workingMinutes);

    // Ensure all arrays have the same length
    $totalRows = count($mainTaskNames);
    // print_r($totalRows);

    $departmentNamesString = '';

    $departmentNamesArray = $this->request->getPost('Departmentname[]');
    // print_r($departmentNamesArray);die;
    if (!empty($departmentNamesArray)) {
        $departmentNamesString = implode(',', $departmentNamesArray);
    }
    // print_r($departmentNamesString);die;
    // Handle the data as needed, such as saving to database

    // Example: Saving to the database
    // Assuming you have a model named TaskModel
    $taskModel = new Adminmodel();

    // Iterate through the data to save multiple rows
    for ($i = 0; $i < $totalRows; $i++) {
        // Assuming you have a database table named tasks
        $data = [
            // 'id' => $id,
            // 'projectCount' => $projectCount,
            'project_id' => $projectName,
            'Department' => $departmentNamesString, // Use index to access department name for each row
            'mainTask_id' => isset($mainTaskNames[$i]) ? $mainTaskNames[$i] : null, // Check if index exists
            'sub_task_name' => isset($subTaskNames[$i]) ? $subTaskNames[$i] : null,
            'emp_id' => isset($employeeNames[$i]) ? $employeeNames[$i] : null,
            'working_hours' => isset($workingHours[$i]) ? $workingHours[$i] : null,
            'working_min' => isset($workingMinutes[$i]) ? $workingMinutes[$i] : null
        ];
        // echo'<pre>';print_r($data);
        
        // Save data to the database
      $result =  $taskModel->saveAllotTask($data);
    //   echo'<pre>';print_r($result);
    }
    // die;
    // echo'<pre>';print_r($data);die;

    // You can perform further actions here, such as redirecting
    return redirect()->to('AdminDashboard');
}

public function getEmployees()
{
    // Retrieve selected department IDs from the AJAX request
    $selectedDepartmentIds = $this->request->getPost('departments');

    // Instantiate the AdminModel
    $adminModel = new AdminModel();

    // Initialize an array to store employee data
    $employees = [];

    // Check if selected departments array is not empty
    if (is_array($selectedDepartmentIds) && !empty($selectedDepartmentIds)) {
        // Iterate through each selected department ID
        foreach ($selectedDepartmentIds as $selectedDepartmentId) {
            // Fetch employees for each department
            $employeesData = $adminModel->getEmployeesByDepartment($selectedDepartmentId);
            
            // Add employee data to the array
            foreach ($employeesData as $employee) {
                $employees[] = [
                    'emp_id' => $employee->Emp_id ,
                    'emp_name' => $employee->emp_name
                ];
            }
        }
    }

    // Return the array of employees as JSON
    return $this->response->setJSON(['employees' => $employees]);
}

public function leave_app()
{
    $session = session();
    $sessionData = $session->get('sessiondata');
    $model = new Adminmodel();
    $today = date('Y-m-d');
    $wherecond = array('from_date >=' => $today, 'Status' => 'P');
    $leave_requests = $model->getalldata('tbl_leave_requests', $wherecond);
    
    // Check if $leave_requests is not false
    if ($leave_requests !== false) {
        foreach ($leave_requests as $request) {
            $applicant_id = $request->applicant_employee_id;
            // Use getsinglerow only if $applicant_id is not empty
            if (!empty($applicant_id)) {
                $applicant = $model->getsinglerow('employee_tbl', ['Emp_id' => $applicant_id]);
                // Check if $applicant is not false before accessing properties
                if ($applicant !== false) {
                    $request->applicant_name = $applicant->emp_name; // Assuming the name field is 'name', modify as per your schema
                }
            }
        }
    }
    
    $data['leave_app'] = $leave_requests;
    echo view('Admin/leave_app', $data);
}
public function leave_result() {
    $db = \Config\Database::connect();
    $leave_id = $_POST['leave_id'];
    $action = $_POST['action'];
    if ($action === 'A') {
        $data = ['Status' => 'A'];
    } elseif ($action === 'D') {
        $data = ['Status' => 'D'];
    }
    $db->table('tbl_leave_requests')->where('id', $leave_id)->update($data);
    return redirect()->to('leave_app');

    
}
public function admin_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');
    $model = new Adminmodel();


    $wherecond = array('role' => 'Admin', 'is_deleted' => 'N');
    $data['adminlist'] = $model->getalldata('employee_tbl', $wherecond);
    // print_r($adminlist);die;
    echo view('Admin/admin_list',$data);
}

public function row_delete($emp_id)
{
   $model = new AdminModel();
   $delete = $model->where('Emp_id', $emp_id)->delete();
   if ($delete) {
       return redirect()->to('admin_list')->with('success', 'Employee deleted successfully.');
   } else {
       return redirect()->to('admin_list')->with('error', 'Failed to delete employee.');
   }
}
public function Daily_Task()
{
    echo view('Employee/Daily_Task');
}
public function daily_work() {
    // print_r($_POST);die;
    $session = session();
    $sessionData = $session->get('sessiondata');
    $Emp_id = $sessionData['Emp_id'];
    $projectNames = $this->request->getPost('project_name');
    $tasks = $this->request->getPost('task');
    $useHours = $this->request->getPost('use_hours');
    $use_minutes = $this->request->getPost('use_minutes');
    $db = \Config\Database::connect();

    foreach ($projectNames as $key => $projectName) {
        $data = [
            'project_name' => $projectName,
            'task' => $tasks[$key],
            'use_hours' => $useHours[$key],
            'use_minutes' =>$use_minutes[$key],
            'Emp_id' =>$Emp_id,
        ];

        $db->table('tbl_daily_work')->insert($data);
    }
    return redirect()->to('Daily_Task');
  
}
public function daily_report()
{
    $model = new AdminModel();
    $data['dailyreport'] =$model->getdailyreport();
   // print_r($data['dailyreport']);die;
    echo view('Admin/daily_report',$data);
}
}
