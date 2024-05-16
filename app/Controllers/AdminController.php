<?php

namespace App\Controllers;
use App\Models\Loginmodel;
use App\Models\Adminmodel;
class AdminController extends BaseController
{

    public function AdminDashboard()
    {
        $model = new Adminmodel();
        $wherecond = array('is_deleted' => 'N');
        $data['Departments']= $model->getalldata('tbl_Department', $wherecond);
        $data['Projects'] = $model->getalldata('tbl_project', $wherecond);
        $wherecond = ['is_deleted' => 'N','role'=>'Employee'];
        $data['Employees'] = $model->getalldata('employee_tbl', $wherecond);
    
        // Sort the Employees array alphabetically by emp_name
        usort($data['Employees'], function($a, $b) {
            return strcmp($a->emp_name, $b->emp_name);
        });
    
        // Debugging purposes - print sorted Employees array
        // echo'<pre>'; print_r($data['Employees']); die;
    
        // Fetch attendance data
        $select = 'tbl_employeetiming.*, employee_tbl.*';
        $joinCond = 'tbl_employeetiming.emp_id  = employee_tbl.Emp_id ';
        $wherecond = [
            'tbl_employeetiming.is_deleted' => 'N',
            'DATE(tbl_employeetiming.start_time)' => date('Y-m-d')
        ];
        $data['attendance_list'] = $model->jointwotables($select, 'tbl_employeetiming ', 'employee_tbl ',  $joinCond,  $wherecond, 'DESC');
    
        return view('Admin/AdminDashboard', $data);
    }
    

    public function createemployee()
    {
        $result = session();
        // $session_id = $result->get('id');
        $model = new Adminmodel();
        // $data['session_id'] = $session_id;
        $wherecond = array('is_deleted' => 'N');
        $data['DepartmentData']= $model->getalldata('tbl_Department', $wherecond);


        $wherecond = array('is_deleted' => 'N');

        $data['menu_data'] = $model->getalldata('tbl_menu', $wherecond);


        $model = new Adminmodel();

        $user_id_segments = $this->request->uri->getSegments();
        $user_id = !empty($user_id_segments[1]) ? $user_id_segments[1] : null;
        
        $wherecond1 = [];
        if ($user_id !== null) {
            $wherecond1 = array('is_deleted' => 'N', 'Emp_id' => $user_id);
            $data['single_data'] = $model->get_single_data('employee_tbl', $wherecond1);
        }
   
        return view('Admin/create_emp',$data);
    }

   public function createemp()
   {
    // echo "<pre>";print_r($_POST);exit();
    $session = \CodeIgniter\Config\Services::session();

    $emp_name = $this->request->getPost('emp_name');
    $emp_email = $this->request->getPost('emp_email');
    $mobile_no = $this->request->getPost('mobile_no');
    $emp_joiningdate = $this->request->getPost('emp_joiningdate');
    $password = $this->request->getPost('password');

    $accessLevelString = '';
        $accessLevels = $this->request->getVar('access_level');
        // print_r($accessLevels);die;

        // Convert the array of selected checkboxes to a comma-separated string
        if(!empty($accessLevels)){
        $accessLevelString = implode(',', $accessLevels);
        // print_r($accessLevelString);die;
        }

    $model = new Adminmodel();
    $data = [
        'emp_name' => $emp_name,
        'emp_email' => $emp_email,
        'mobile_no' => $mobile_no,
        'role'=>'Employee',
        'emp_department' =>$this->request->getPost('emp_department'),

        'emp_joiningdate' => $emp_joiningdate,
        'password'=> $password,
        'access_level' => $accessLevelString,

    ];
    $db = \Config\Database::Connect();

    if($this->request->getPost('Emp_id') == ''){

    
    // print_r($data);die;
    $tableName='employee_tbl';
    $model->insertData($tableName, $data);
    $session->setFlashdata('success', 'Data added successfully.');  
    } else {
        $update_data = $db->table('employee_tbl')->where('Emp_id', $this->request->getVar('Emp_id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Project updated successfully.');
    }



    return redirect()->to('emp_list');
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

    public function listofproject()
    {
        $result = session();
        // $session_id = $result->get('id');
        $model = new Adminmodel();
        // $data['session_id'] = $session_id;
        $wherecond = array('is_deleted' => 'N');
        $data['projectData']= $model->getalldata('tbl_project', $wherecond);
        $data['DepartmentData']= $model->getalldata('tbl_Department', $wherecond);
    //    echo '<pre>';print_r($data);die;
       return view('Admin/listofproject',$data);
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
        $user_id_segments = $this->request->uri->getSegments();
        $user_id = !empty($user_id_segments[1]) ? $user_id_segments[1] : null;
        
        $wherecond1 = [];
        if ($user_id !== null) {
            $wherecond1 = array('is_deleted' => 'N', 'Emp_id' => $user_id);
            $data['single_data'] = $model->get_single_data('employee_tbl', $wherecond1);
        }
        
       

        // echo "<pre>";print_r($data['single']);exit();

        if (isset($sessionData)) {
            $email = $sessionData['emp_email'] ;
            $password = $sessionData['password'] ;

            if ($email !== null && $password !== null) {

                $wherecond = array('is_deleted' => 'N');

                // echo"Correct data";
                $data['project_data'] = $model->getalldata('tbl_project', $wherecond);

                $wherecond = array('is_deleted' => 'N');


        $data['menu_data'] = $model->getalldata('tbl_menu', $wherecond);
        // echo "<pre>";print_r($data['menu_data']);exit();
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
        $accessLevelString = '';
        $accessLevels = $this->request->getVar('access_level');
        // print_r($accessLevels);die;

        // Convert the array of selected checkboxes to a comma-separated string
        if(!empty($accessLevels)){
        $accessLevelString = implode(',', $accessLevels);
        // print_r($accessLevelString);die;
        }
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
        // print_r($data);die;

        $db = \Config\Database::Connect();
        if ($this->request->getVar('Emp_id') == "") {
            $add_data = $db->table('employee_tbl');
            $add_data->insert($data);
            session()->setFlashdata('success', 'User added successfully.');
            // Set success flash data
            // $session->setFlashdata('success', 'Action performed successfully.');
        } else {
            $update_data = $db->table('employee_tbl')->where('Emp_id', $this->request->getVar('Emp_id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'Data updated successfully.');
        }

        

        return redirect()->to('user_list');
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
public function get_tasklist()
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
public function taskList(){

    $model = new Adminmodel();
    $wherecond = array('is_deleted' => 'N');
    $data['task_data'] = $model->getalldata('tbl_taskDetails', $wherecond);
  
    $data['project_data'] = $model->get_single_data('tbl_project', $wherecond);
    $wherecond = array('is_deleted' => 'N');
    $data['projectData'] = $model->getalldata('tbl_project', $wherecond); 
    $data['mainTaskData'] = $model->getalldata('tbl_mainTaskMaster', $wherecond);
    $wherecond = array('is_deleted' => 'N');
    $data['taskDetails']= $model->getalldata('tbl_taskDetails', $wherecond); 
    $project_ids = array_column($data['taskDetails'], 'project_id'); 
    
    echo view('Admin/taskList',$data);
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
// $Description = $this->request->getPost('Description');
// $condition = $this->request->getPost('condition');
$Taskradio = $this->request->getPost('Taskradio');
// Instantiate your model
$model = new Adminmodel();

// Prepare data array
$data = [
    'project_id' => $projectId,
    'mainTask_id' => $mainTaskId,
    'subTaskName' => $subTaskName,
    'pageName' => $PageName,
    // 'subTaskDescription' => $Description,
    // 'condition' => $condition,
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
        

        $session = \CodeIgniter\Config\Services::session();
        $session->setFlashdata('success', 'Task alloated successfully.');       

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

    $select = 'tbl_leave_requests.*, employee_tbl.emp_name';
    $joinCond = 'tbl_leave_requests.applicant_employee_id  = employee_tbl.Emp_id ';
    $wherecond = [
        'tbl_leave_requests.is_deleted' => 'N',   
        ];
    $data['allLeaveRequests'] = $model->jointwotables($select, 'tbl_leave_requests ', 'employee_tbl ',  $joinCond,  $wherecond, 'DESC');
    

    // echo'<pre>';print_r($data['allLeaveRequests']);die;
     // $wherecond = (['is_deleted' =>'N' , ('Status' => 'A' || 'Status' => 'R')]);
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
    // print_r($_POST);die;
    $db = \Config\Database::connect();
    $leave_id = $_POST['leave_id'];
    $action = $_POST['action'];
    if ($action === 'A') {
        $data = ['Status' => 'A'];
    } elseif ($action === 'R') {
        $data = ['Status' => 'R'];
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
    $session = session();
    $sessionData = $session->get('sessiondata');
    echo view('Employee/Daily_Task',$sessionData);
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
        $session = \CodeIgniter\Config\Services::session();
        $session->setFlashdata('success', 'Daily work added successfully.');       

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
public function Create_meeting()
{
    $model = new AdminModel();
    $wherecond = array('role' => 'Admin', 'is_deleted' => 'N');
    $data['adminlist'] = $model->getalldata('employee_tbl', $wherecond);
    $wherecond = array('role' => 'Employee', 'is_deleted' => 'N');
    $data['emplist'] = $model->getalldata('employee_tbl', $wherecond);
    // print_r( $data['emplist']);die;
    echo view('Admin/Create_meeting',$data);
}


public function create_meetings()
{
    // print_r($_POST);die;
    $meetingLink = $this->request->getPost('meetingLink');
    $meetingDate = $this->request->getPost('meetingdate');
    $meetingTime = $this->request->getPost('meetingtime');
    $selectedEmployees = $this->request->getPost('selectedEmployees');
    $Hostname = $this->request->getPost('Hostname');
    $Subject = $this->request->getPost('Subject');
    $client_involve = $this->request->getPost('client_involve');
    // Parse the selected employees
    $employeeIds = explode(',', $selectedEmployees);

    // Connect to the database
    $db = \Config\Database::connect();
    $session = \CodeIgniter\Config\Services::session();

    // Insert data into the database table
    if ($selectedEmployees === 'all') {
        // Insert one row for all employees
        $data = [
            'meeting_link' => $meetingLink,
            'meeting_date' => $meetingDate,
            'meeting_time' => $meetingTime,
            'employee_id' => 'all', // Set to null for all employees
            'Hostname'=>$Hostname,
            'Subject'=>$Subject,
            'client_involve'=>$client_involve,
        ];
        $db->table('tbl_meetings')->insert($data);
        $session->setFlashdata('success', 'Meeting created successfully.');       

    } else {
        // Insert separate rows for each selected employee
        foreach ($employeeIds as $employeeId) {
            $data = [
                'meeting_link' => $meetingLink,
                'meeting_date' => $meetingDate,
                'meeting_time' => $meetingTime,
                'employee_id' => $employeeId,
                'Hostname'=>$Hostname,
                'Subject'=>$Subject,
                'client_involve'=>$client_involve,
            ];
            $db->table('tbl_meetings')->insert($data);
            $session->setFlashdata('success', 'Meeting created successfully.');       

        }
    }

    return redirect()->to('Create_meeting');
  

}
public function meetings()
{
    $model = new Loginmodel();
    $session = session();
    $sessionData =  $session->get('sessiondata');
    $Emp_id = $sessionData['Emp_id'];
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');  
    $data['sessiondata'] = $model->checkLogin($email, $password);
    $today = date('Y-m-d');
    $modelnew = new AdminModel();  
    $wherecond = [
        'meeting_date >=' => $today,
        '(employee_id = ' . $Emp_id . ' OR employee_id = "all")' => NULL,
    ];

    $data['meetings'] = $modelnew->getalldata('tbl_meetings', $wherecond);
    // echo '<pre>';  print_r($data['meetings']);die;
    echo view('Employee/meetings', $data);
}

public function Join_meeting()
{
    // $today = date('Y-m-d');
    $modelnew = new AdminModel();  
    $wherecond = [
        'is_deleted' =>'N',
    ];

    $data['meetings'] = $modelnew->getalldata('tbl_meetings', $wherecond);
//  echo '<pre>';  print_r($data['meetings']);die;
    echo view('Admin/Join_meeting',$data);
}
public function delete_data()
{

    $uri_data = $this->request->uri->getSegments(2);

    $id = base64_decode($uri_data[1]);
    $table = $uri_data[2];

    // echo "<pre>"; print_r($uri_data);
    // echo $table;
    // exit();

    // Update the database row with is_deleted = 1
    $data = ['is_deleted' => 'Y'];
    $db = \Config\Database::connect();


    $update_data = $db->table($table)->where('Emp_id', $id);
    $update_data->update($data);
    session()->setFlashdata('success', 'Data deleted successfully.');
    return redirect()->back();



    // Redirect or return a response as needed
}

public function deactive_data()
{

    $uri_data = $this->request->uri->getSegments(2);

    $id = base64_decode($uri_data[1]);
    $table = $uri_data[2];

    // echo "<pre>"; print_r($uri_data);
    // echo $table;
    // exit();

    // Update the database row with is_deleted = 1
    $data = ['status' => 'N'];
    $db = \Config\Database::connect();


    $update_data = $db->table($table)->where('Emp_id', $id);
    $update_data->update($data);
    session()->setFlashdata('success', 'Data deactived successfully.');
    return redirect()->back();



    // Redirect or return a response as needed
}




public function active_data()
{

    $uri_data = $this->request->uri->getSegments(2);

    $id = base64_decode($uri_data[1]);
    $table = $uri_data[2];

    // echo "<pre>"; print_r($uri_data);
    // echo $table;
    // exit();

    // Update the database row with is_deleted = 1
    $data = ['status' => 'Y'];
    $db = \Config\Database::connect();


    $update_data = $db->table($table)->where('Emp_id', $id);
    $update_data->update($data);
    session()->setFlashdata('success', 'Data deactived successfully.');
    return redirect()->back();



    // Redirect or return a response as needed
}


public function add_menu()
{
    echo view('add_menu');

}
public function addmaintask()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegment(2);
    $data = [];
    if (!empty($id)) {
        $wherecond1 = ['is_deleted' => 'N', 'id' => $id];
        $data['single_data'] = $model->get_single_data('tbl_maintaskmaster', $wherecond1);
    }
    

    echo view('Admin/addmaintask',$data);

}
public function add_department()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegment(2);
    $data = [];
    if (!empty($id)) {
        $wherecond1 = ['is_deleted' => 'N', 'id' => $id];
        $data['single_data'] = $model->get_single_data('tbl_department', $wherecond1);
    }
    
    // echo "<pre>";print_r($data['single_data']);exit();

    echo view('Admin/add_department',$data);

}

public function add_departments()
{
    $DepartmentName = $this->request->getPost('DepartmentName');
    $data = [
        'DepartmentName' => $DepartmentName
    ];
    
    $db = \Config\Database::connect();
    $departmentTable = $db->table('tbl_department');

    // Check if the DepartmentName already exists
    $existingDepartment = $departmentTable
        ->where('DepartmentName', $DepartmentName)
        ->get()
        ->getFirstRow();

    if ($existingDepartment && ($this->request->getVar('id') == "" || $existingDepartment->id != $this->request->getVar('id'))) {
        session()->setFlashdata('error', 'Department name already exists.');
        return redirect()->to('add_department');
    }

    if ($this->request->getVar('id') == "") {
        $departmentTable->insert($data);
        session()->setFlashdata('success', 'Department added successfully.');
    } else {
        $departmentTable->where('id', $this->request->getVar('id'))->update($data);
        session()->setFlashdata('success', 'Department updated successfully.');
    }

    return redirect()->to('add_department');
}

public function add_maintask()
{
    $mainTaskName = $this->request->getPost('mainTaskName');
    $data = [
        'mainTaskName' => $mainTaskName
    ];
    
    $db = \Config\Database::connect();
    $mainTaskTable = $db->table('tbl_maintaskmaster');

    // Check if the mainTaskName already exists
    $existingTask = $mainTaskTable->where('mainTaskName', $mainTaskName)->get()->getFirstRow();
// print_r($existingTask);die;
    if ($existingTask && ($this->request->getVar('id') == "" || $existingTask->id != $this->request->getVar('id'))) {
        // mainTaskName already exists and it's not the current task being updated
        session()->setFlashdata('success', 'Task name already exists.');
        return redirect()->to('addmaintask');
    }

    if ($this->request->getVar('id') == "") {
        $mainTaskTable->insert($data);
        session()->setFlashdata('success', 'Menu added successfully.');
    } else {
        $mainTaskTable->where('id', $this->request->getVar('id'))->update($data);
        session()->setFlashdata('success', 'Menu updated successfully.');
    }

    return redirect()->to('maintask_list');
}

public function maintask_list()
{
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');

    $data['menu_data'] = $model->getalldata('tbl_maintaskmaster', $wherecond);
    // echo '<pre>';print_r($data);die;
    echo view('Admin/maintask_list',$data);
}
public function department_list()
{
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');

    $data['menu_data'] = $model->getalldata('tbl_department', $wherecond);
    // echo '<pre>';print_r($data);die;
    echo view('Admin/department_list',$data);
}
// public function set_menu()
// {
//     $data = [
//         'menu_name' => $this->request->getVar('menu_name'),
//         'url_location' => $this->request->getVar('url_location'),
//         'created_on' => date('Y:m:d H:i:s'),
//     ];

//     $db = \Config\Database::Connect();
    
//     if ($this->request->getVar('id') ==     "") {
//         $add_data = $db->table('tbl_menu');
//         $add_data->insert($data);
//         session()->setFlashdata('success', 'Menu added successfully.');
//     } else {
//         $update_data = $db->table('tbl_menu')->where('id', $this->request->getVar('id'));
//         $update_data->update($data);
//         session()->setFlashdata('success', 'Menu updated successfully.');
//     }

//     return redirect()->to('menu_list');

// }

public function set_menu()
{
    $menu_name = $this->request->getVar('menu_name');
    $url_location = $this->request->getVar('url_location');
    $data = [
        'menu_name' => $menu_name,
        'url_location' => $url_location,
        'created_on' => date('Y:m:d H:i:s'),
    ];
    $db = \Config\Database::connect();
    $menuTable = $db->table('tbl_menu');
    $existingMenu = $menuTable
        ->where('menu_name', $menu_name)
        ->where('url_location', $url_location)
        ->get()
        ->getFirstRow();
    if ($existingMenu && ($this->request->getVar('id') == "" || $existingMenu->id != $this->request->getVar('id'))) {
        session()->setFlashdata('error', 'Menu name and URL location combination already exists.');
        return redirect()->to('add_menu'); 
    }

    if ($this->request->getVar('id') == "") {
        $menuTable->insert($data);
        session()->setFlashdata('success', 'Menu added successfully.');
    } else {
        $menuTable->where('id', $this->request->getVar('id'))->update($data);
        session()->setFlashdata('success', 'Menu updated successfully.');
    }

    return redirect()->to('menu_list');
}


public function menu_list()
{

    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');


    $data['menu_data'] = $model->getalldata('tbl_menu', $wherecond);
    // echo "<pre>";print_r($data['menu_data']);exit();
    echo view('menu_list', $data);

}
public function get_depart()
{
    $model = new AdminModel();

    $menu_id = $this->request->uri->getSegments(1);

    $wherecond1 = array('is_deleted' => 'N', 'id' => $menu_id[1]);

    $data['single_data'] = $model->get_single_data('tbl_department', $wherecond1);

    echo view('Admin/department_list', $data);
}
public function get_menu()
{
    $model = new AdminModel();

    $menu_id = $this->request->uri->getSegments(1);

    $wherecond1 = array('is_deleted' => 'N', 'id' => $menu_id[1]);

    $data['single_data'] = $model->get_single_data('tbl_menu', $wherecond1);

    echo view('add_menu', $data);
}



public function delete_compan()
{
    $uri_data = $this->request->uri->getSegments(2);

    $id = base64_decode($uri_data[1]);
    $table = $uri_data[2];

    // echo "<pre>"; print_r($uri_data);
    // echo $table;
    // exit();

    // Update the database row with is_deleted = 1
    $data = ['is_deleted' => 'Y'];
    $db = \Config\Database::connect();


    $update_data = $db->table($table)->where('id', $id);
    $update_data->update($data);
    session()->setFlashdata('success', 'Data deleted successfully.');
    return redirect()->back();



    // Redirect or return a response as needed
}

public function emp_list()
{
    $model = new AdminModel();
    $wherecond = array('is_deleted' => 'N' , 'role' => 'Employee');
    $data['emp_data'] = $model->getalldata('employee_tbl', $wherecond);
    // echo "<pre>";print_r($data['emp_data']);exit();
    echo view('emp_list', $data);

}

public function update_status()
    {
        $data = [
            'project_status' => $this->request->getVar('selectedValue'),
        ];

        $db = \Config\Database::Connect();
            $update_data = $db->table('tbl_project')->where('p_id ', $this->request->getVar('id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'status updated successfully.');
        return redirect()->to('Admindashboard');
    }

    public function update_task_status()
    {
        $data = [
            'task_status' => $this->request->getVar('selectedValue'),
        ];

        $db = \Config\Database::Connect();
            $update_data = $db->table('tbl_allotTaskDetails')->where('id ', $this->request->getVar('id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'status updated successfully.');
            return redirect()->to('EmployeeDashboard');
    }    
    public function checkEmailExistence()
{
    $email = $this->request->getPost('emp_email');
    $emp_id = $this->request->getPost('emp_id'); // This is optional for update cases

    $db = \Config\Database::connect();
    $employeeTable = $db->table('employee_tbl');

    // Check if the email already exists
    $existingEmail = $employeeTable
        ->where('emp_email', $email)
        ->get()
        ->getFirstRow();

    // If email exists and it's not the current employee being updated, return true
    if ($existingEmail && ($emp_id == "" || $existingEmail->Emp_id != $emp_id)) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}
}
