<?php

namespace App\Controllers;
use App\Models\Loginmodel;
use App\Models\Adminmodel;
use Dompdf\Dompdf; // Import Dompdf class
class AdminController extends BaseController
{

    public function AdminDashboard()
    {
        $session = session();
        $sessionData = $session->get('sessiondata');

        if(!empty($sessionData)){
   
        $model = new Adminmodel();
        $wherecond = array('is_deleted' => 'N');
        $data['Departments']= $model->getalldata('tbl_department', $wherecond);

        $wherecond = array('is_deleted' => 'N', 'project_status' => 'Finish');

        $data['project_finish'] = $model->getalldata('tbl_project', $wherecond);

        if (is_array($data['project_finish'])) {
            $data['project_f'] = count($data['project_finish']);
        } else {
            $data['project_f'] = 0;
        }

        $wherecond = array('is_deleted' => 'N', 'project_status' => 'WIP');

        $data['project_wip'] = $model->getalldata('tbl_project', $wherecond);


        if (is_array($data['project_wip'])) {
            $data['project_w'] = count($data['project_wip']);
        } else {
            $data['project_w'] = 0;
        }
        

        $wherecond = array('is_deleted' => 'N', 'project_status' => 'ON Hold');

        $data['project_onhold'] = $model->getalldata('tbl_project', $wherecond);

        if (is_array($data['project_onhold'])) {
            $data['project_o'] = count($data['project_onhold']);
        } else {
            $data['project_o'] = 0;
        }

        $wherecond = array('is_deleted' => 'N', 'project_status' => 'New Project');

        $data['project_new'] = $model->getalldata('tbl_project', $wherecond);

        
        if (is_array($data['project_new'])) {
            $data['project_n'] = count($data['project_new']);
        } else {
            $data['project_n'] = 0;
        }
        $db = \Config\Database::connect();
        $wherecond = array('is_deleted' => 'N');
        $data['services'] = $model->getalldata('tbl_services', $wherecond);
        
        // Extracting IDs and service names from $data['services']
        $ids = array_column($data['services'], 'id');
        $serviceNames = array_column($data['services'], 'ServicesName');
        
        // Initialize arrays to store counts and total amounts
        $countById = array();
        $totalAmountById = array();
        
        foreach ($ids as $id) {
            // Perform a query to count occurrences of $id in tbl_iteam
            $count = $db->table('tbl_iteam')
                        ->where('iteam', $id)
                        ->countAllResults();
        
            // Perform a query to sum the amounts for each $id in tbl_iteam
            $amount = $db->table('tbl_iteam')
                         ->selectSum('total_amount')
                         ->where('iteam', $id)
                         ->get()
                         ->getRow()
                         ->total_amount;
            
            // Store the count and the total amount for the current ID
            $countById[$id] = $count;
            $totalAmountById[$id] = $amount;
        }
        
        $data['serviceNames'] = $serviceNames;
        $data['counts'] = $countById;
        $data['totalAmounts'] = $totalAmountById;
        
        $select = 'tbl_project.*, tbl_department.DepartmentName, tbl_client.client_name as clientname';
        $joinCond1 = 'tbl_project.Technology = tbl_department.id';
        $joinCond2 = 'tbl_project.Client_name = tbl_client.id';

        // Prepare the where condition
        $wherecond = [
            'tbl_project.is_deleted' => 'N',
        ];

        // Fetch the data using a three-table join
        $data['Projects'] = $model->jointhreetables($select, 'tbl_project', 'tbl_department', 'tbl_client', 
            $joinCond1, 
            $joinCond2, 
            $wherecond, 
            'inner'
        );

        $select = 'employee_tbl.*, tbl_department.DepartmentName';
        $joinCond = 'employee_tbl.emp_department  = tbl_department.id ';
        $wherecond = [
            'employee_tbl.is_deleted' => 'N',
            'employee_tbl.role'=>'Employee'
        ];
        $data['Employees'] = $model->jointwotables($select, 'employee_tbl ', 'tbl_department ',  $joinCond,  $wherecond, 'DESC');
    
        // Sort the Employees array alphabetically by emp_name
        usort($data['Employees'], function($a, $b) {
            return strcmp($a->emp_name, $b->emp_name);
        });
    
    
        $select = 'tbl_employeetiming.*, employee_tbl.*';
        $joinCond = 'tbl_employeetiming.emp_id  = employee_tbl.Emp_id ';
        $wherecond = [
            'tbl_employeetiming.is_deleted' => 'N',
            'DATE(tbl_employeetiming.start_time)' => date('Y-m-d')
        ];
        $data['attendance_list'] = $model->jointwotables($select, 'tbl_employeetiming', 'employee_tbl',  $joinCond,  $wherecond, 'DESC');
    
        // Absent List
        
       // Assuming you have the model loaded as $model

            // Fetch all employees from employee_tbl

            // Fetch all employees from employee_tbl where is_deleted = 'N' and role = 'Employee'
            $wherecond = array('is_deleted' => 'N', 'role' => 'Employee');
            $allEmployees = $model->getalldata('employee_tbl', $wherecond);

            // Check if $allEmployees is a valid array
            if ($allEmployees === false) {
                // Handle the error, e.g., log it or show an error message
                echo "Error fetching all employees.";
                return;
            }

            // Fetch employees with attendance for the current date from tbl_employeetiming
            $wherecond = array('is_deleted' => 'N');
            $attendanceEmployees = $model->db->table('tbl_employeetiming')
                ->where($wherecond)
                ->where('DATE(start_time)', date('Y-m-d'))
                ->get()
                ->getResult(); // Note: getResult() returns an array of objects

            // Check if $attendanceEmployees is a valid array
            if ($attendanceEmployees === false) {
                // Handle the error, e.g., log it or show an error message
                echo "Error fetching attendance employees.";
                return;
            }

            // Convert the attendance list to an array of IDs
            $attendanceEmpIds = array_map(function($item) {
                return $item->emp_id; // Accessing object property
            }, $attendanceEmployees);

            // Get absent employees by filtering out the ones in attendanceEmpIds
            $absentEmployees = array_filter($allEmployees, function($employee) use ($attendanceEmpIds) {
                return !in_array($employee->Emp_id, $attendanceEmpIds); // Accessing object property
            });

            // You can now use $absentEmployees to display in the absent list
            $data['absent_list'] = $absentEmployees;

            // Pass $data to the view
                        // echo "<pre>";print_r($data['absent_list']);exit();

        //  Absent List End

        $select = 'tbl_invoice.*, tbl_client.client_name';
        $joinCond = 'tbl_invoice.client_id  = tbl_client.id ';
        
        $wherecond = [
            'tbl_invoice.is_deleted' => 'N',
            'payment_status' => 'Pending'

        ];
        $data['invoice_data'] = $model->jointwotables($select, 'tbl_invoice ', 'tbl_client ',  $joinCond,  $wherecond, 'DESC');


        $select = 'tbl_invoice.*, tbl_client.client_name';
        $joinCond = 'tbl_invoice.client_id  = tbl_client.id ';
        
        $wherecond = [
            'tbl_invoice.is_deleted' => 'N',

        ];
        $data['invoice_dataall'] = $model->jointwotables($select, 'tbl_invoice ', 'tbl_client ',  $joinCond,  $wherecond, 'DESC');


       
        return view('Admin/AdminDashboard', $data);
    }else{
        return redirect()->to(base_url());

    }
    }
  
    public function createemployee()
    {
        $result = session();
        // $session_id = $result->get('id');
        $model = new Adminmodel();
        // $data['session_id'] = $session_id;
        $wherecond = array('is_deleted' => 'N');
        $data['DepartmentData']= $model->getalldata('tbl_department', $wherecond);
        $wherecond = array('is_deleted' => 'N');
        $data['menu_data'] = $model->getalldata('tbl_menu', $wherecond);
        
        $model = new Adminmodel();
        $user_id_segments = $this->request->uri->getSegments();
        // print_r($user_id_segments);die;
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
    $WhatsApp_no = $this->request->getPost('WhatsApp_no');
    $emp_joiningdate = $this->request->getPost('emp_joiningdate');
    $password = $this->request->getPost('password');
    $role = $this->request->getPost('user_role');


    // $accessLevels = $this->request->getVar('access_level');

        // Convert the array of selected checkboxes to a comma-separated string
        // $accessLevelString = implode(',', $accessLevels);
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
        'WhatsApp_no' => $WhatsApp_no,
        'role'=>'Employee',
        'emp_department' =>$this->request->getPost('emp_department'),
        'emergency_name' =>$this->request->getPost('emergency_name'),
        'emergency_no' => $this->request->getPost('emergency_no'),
        'relationship' =>$this->request->getPost('relationship'),
        'emergency_no' =>$this->request->getPost('emergency_no'),
        'emp_joiningdate' => $emp_joiningdate,
        'password'=> $password,
        'role'=> $role,
        'access_level' => $accessLevelString,

    ];
    $db = \Config\Database::Connect();


    $uploads = ['PhotoFile', 'ResumeFile', 'PANFile', 'AadharFile'];
    $uploadPaths = [
        'PhotoFile' => 'public/uploads/photos/',
        'ResumeFile' => 'public/uploads/resumes/',
        'PANFile' => 'public/uploads/pan/',
        'AadharFile' => 'public/uploads/aadhar/'
    ];

   
    foreach ($uploads as $fileKey) {
        $file = $this->request->getFile($fileKey);
        if(!empty($file)){
        if ($file->isValid() && !$file->hasMoved()) {
          
            $newName = $file->getName();
            // echo'<pre>';print_r($newName);
            $file->move($uploadPaths[$fileKey], $newName);
            $data[$fileKey] = $newName; // Store the new file name in the data array
        }
    }
}


    if($this->request->getPost('Emp_id') == ''){

    // print_r($data);die;
    $tableName='employee_tbl';
    $model->insertData($tableName, $data);
    $session->setFlashdata('success', 'Employee added successfully.');  
    } else {
        $update_data = $db->table('employee_tbl')->where('Emp_id', $this->request->getVar('Emp_id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Employee updated successfully.');
    }
    return redirect()->to('emp_list');
   }

    public function createproject()
    {
        $result = session();
        // $session_id = $result->get('id');
        $model = new Adminmodel();
        $id = $this->request->uri->getSegments(1);

        $wherecond = array('is_deleted' => 'N');
        $data['client_data'] = $model->getalldata('tbl_client', $wherecond);
    
    
        if(isset($id[1])) {
    
            $wherecond1 = array('is_deleted' => 'N', 'p_id ' => $id[1]);
    
            $data['single_data'] = $model->get_single_data('tbl_project', $wherecond1);
        }
        // $data['session_id'] = $session_id;
        $wherecond = array('is_deleted' => 'N');
        $data['projectData']= $model->getalldata('tbl_project', $wherecond);
        $data['DepartmentData']= $model->getalldata('tbl_department', $wherecond);
        $data['clientname']= $model->getalldata('tbl_client', $wherecond);

    //    echo '<pre>';print_r($data['clientname']);die;
       return view('Admin/createproject',$data);
    }

    public function listofproject()
    {

        $session = session();
        $sessionData = $session->get('sessiondata');

        if(!empty($sessionData)){
        $result = session();
        // $session_id = $result->get('id');
        $model = new Adminmodel();
        // $data['session_id'] = $session_id;
        // $wherecond = array('is_deleted' => 'N');
        // $data['projectData']= $model->getalldata('tbl_project', $wherecond);


        // $session_id = $result->get('id');

        $id = $this->request->uri->getSegments(1);

        $wherecond = array('is_deleted' => 'N');
        $data['client_data'] = $model->getalldata('tbl_client', $wherecond);


        $select = 'tbl_project.*, tbl_client.client_name as clientname';
        $joinCond = 'tbl_project.Client_name  = tbl_client.id ';
        $wherecond = [
            'tbl_project.is_deleted' => 'N',
        ];
        $data['projectData'] = $model->jointwotables($select, 'tbl_project ', 'tbl_client ',  $joinCond,  $wherecond, 'DESC');

        $wherecond = array('is_deleted' => 'N');

        $data['DepartmentData']= $model->getalldata('tbl_department', $wherecond);
    //    echo '<pre>';print_r($data);die;
       return view('Admin/listofproject',$data);
    }else{
        return redirect()->to(base_url());

    }
    }
    public function project()
    {
//  echo'<pre>';print_r($_POST);exit();
        $projectName = $this->request->getPost('projectName');
        // $companyName = $this->request->getPost('companyName');
        // $GSTIN = $this->request->getPost('GSTIN');
        $clientName = $this->request->getPost('Client_name');
        $clientEmail = $this->request->getPost('Client_email');
        $clientMobileNo = $this->request->getPost('Client_mobile_no');
        $technology = $this->request->getPost('department');
        $projectType = $this->request->getPost('projectType');
        $startDate = $this->request->getPost('Project_startdate');
        $deliveryDate = $this->request->getPost('Project_DeliveryDate');
        $TargetedUAT = $this->request->getPost('TargetedUAT');
        $POCname = $this->request->getPost('POCname');
        $POCemail = $this->request->getPost('POCemail');
        $POCmobileNo = $this->request->getPost('POCmobileNo');
        $attachmentFile = $this->request->getFile('attachment');
  
           
            $data = [
       
                'projectName' => $projectName,
                // 'CompanyName' => $companyName,
                // 'GSTIN' => $GSTIN,
                'Client_name' => $clientName,
                'Client_email' => $clientEmail,
                'Client_mobile_no' => $clientMobileNo,
                'Technology' => $technology,
                'projectType' => $projectType,
                'Project_startdate' => $startDate,
                'Project_DeliveryDate' => $deliveryDate,
                'TargetedUAT_Date' => $TargetedUAT,
                'POC_name' => $POCname,
                'POC_email' => $POCemail,
                'POC_mobile_no' => $POCmobileNo
            ];
    
            // Instantiate your model
            $model = new Adminmodel();
    
            $db = \Config\Database::Connect();
            if ($this->request->getVar('id') == "") {
                $add_data = $db->table('tbl_project');
                $add_data->insert($data);
                session()->setFlashdata('success', 'Project added successfully.');
            } else {
                $update_data = $db->table('tbl_project')->where('p_id', $this->request->getVar('id'));
                $update_data->update($data);
                session()->setFlashdata('success', 'Project updated successfully.');
            }
        
    
        return redirect()->to('listofproject');
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
        // print_r($_POST);die;
        $accessLevelString = '';
        $accessLevels = $this->request->getVar('access_level');

        // Convert the array of selected checkboxes to a comma-separated string
        if(!empty($accessLevels)){
        $accessLevelString = implode(',', $accessLevels);
        }
        $data = [
            'emp_name' => $this->request->getVar('full_name'),
            'emp_email' => $this->request->getPost('email'),
            'mobile_no' => $this->request->getPost('mobile_no'),
            'WhatsApp_no' => $this->request->getPost('WhatsApp_no'),
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
        } else {
            $update_data = $db->table('employee_tbl')->where('Emp_id', $this->request->getVar('Emp_id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'User updated successfully.');
        }
        return redirect()->to('user_list');
    }
    public function adminList()
    {
        $model = new AdminModel();
        $wherecond = array('is_deleted' => 'N', 'role' => 'Other');
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
        $data['mainTaskData'] = $model->getalldata('tbl_maintaskmaster', $wherecond);
        $wherecond = array('is_deleted' => 'N');
        $data['taskDetails']= $model->getalldata('tbl_taskdetails', $wherecond); 
        $project_ids = [];
        if(!empty($data['taskDetails'])){
        $project_ids = array_column($data['taskDetails'], 'project_id');
        }

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

    $data['single_data'] = $model->get_single_data('tbl_taskdetails', $wherecond1);
    $data['task_data'] = $model->getalldata('tbl_taskdetails', $wherecond);
    $project_id = $data['single_data']->project_id;
    // echo'<pre>';print_r($data);die;
    $wherecond = array('p_id' => $project_id );
    $data['project_data'] = $model->get_single_data('tbl_project', $wherecond);
    // echo'<pre>';print_r($data['project_data']);
    $mainTask_id = $data['single_data']->mainTask_id;
    $wherecond = array('id' => $mainTask_id );
    // $data['mainTask_data'] = $model->get_single_data('tbl_maintaskmaster', $wherecond);
    // Assuming $data['mainTask_data'] contains the main task details
    // $data['mainTaskData'] = $data['mainTask_data']; // Renaming for consistency
    $wherecond = array('is_deleted' => 'N');
    $data['projectData'] = $model->getalldata('tbl_project', $wherecond);
    $data['mainTaskData'] = $model->getalldata('tbl_maintaskmaster', $wherecond);

    // echo'<pre>';print_r($data['single_data']);die;
    echo view('Admin/addTask', $data);
}
public function get_tasklist()
{

    $model = new Adminmodel();

    $task_id = $this->request->uri->getSegments(1);
    $wherecond1 = array('is_deleted' => 'N', 'id' => $task_id[1]);

    $wherecond = array('is_deleted' => 'N');

    $data['single_data'] = $model->get_single_data('tbl_taskdetails', $wherecond1);
    $data['task_data'] = $model->getalldata('tbl_taskdetails', $wherecond);
    $project_id = $data['single_data']->project_id;
    // echo'<pre>';print_r($data);die;
    $wherecond = array('p_id' => $project_id );
    $data['project_data'] = $model->get_single_data('tbl_project', $wherecond);
    // echo'<pre>';print_r($data['project_data']);
    $mainTask_id = $data['single_data']->mainTask_id;
    $wherecond = array('id' => $mainTask_id );
    // $data['mainTask_data'] = $model->get_single_data('tbl_maintaskmaster', $wherecond);
    // Assuming $data['mainTask_data'] contains the main task details
    // $data['mainTaskData'] = $data['mainTask_data']; // Renaming for consistency
    $wherecond = array('is_deleted' => 'N');
    $data['projectData'] = $model->getalldata('tbl_project', $wherecond);
    $data['mainTaskData'] = $model->getalldata('tbl_maintaskmaster', $wherecond);

    // echo'<pre>';print_r($data['single_data']);die;
    echo view('Admin/addTask', $data);
}
public function taskList(){

    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){

    $model = new Adminmodel();

    // $wherecond = array('is_deleted' => 'N');

    // Fetch projects from the database

    $wherecond = array('is_deleted' => 'N');
    $data['task_data'] = $model->getalldata('tbl_taskdetails', $wherecond);
  
    $data['project_data'] = $model->get_single_data('tbl_project', $wherecond);
    // $wherecond = array('is_deleted' => 'N');
    $data['projectData'] = $model->getalldata('tbl_project', $wherecond); 
    $data['mainTaskData'] = $model->getalldata('tbl_maintaskmaster', $wherecond);
    // $wherecond = array('is_deleted' => 'N');
    $data['taskDetails']= $model->getalldata('tbl_taskdetails', $wherecond); 
    $project_ids = [];
    if(!empty($data['taskDetails'])){
    $project_ids = array_column($data['taskDetails'], 'project_id'); 
    }
    
    echo view('Admin/taskList',$data);
}else{
    return redirect()->to(base_url());

}
}

public function set_project()
{

    $data = [
        'menu_name' => $this->request->getVar('menu_name'),
        'url_location' => $this->request->getVar('url_location'),
        'created_on' => date('Y:m:d H:i:s'),
    ];

    $db = \Config\Database::Connect();
    if ($this->request->getVar('id') == "") {
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
// public function task()
// {
//     $projectId = $this->request->getPost('Projectname');
//     $mainTaskId = $this->request->getPost('mainTaskName');
//     $subTaskName = $this->request->getPost('subTaskName');
//     $PageName = $this->request->getPost('PageName');
//     $Taskradio = $this->request->getPost('Taskradio');

//     $data = [
//         'project_id' => $projectId,
//         'mainTask_id' => $mainTaskId,
//         'subTaskName' => $subTaskName,
//         'pageName' => $PageName,
//         'taskPosition' => $Taskradio,
//     ];

//     $db = \Config\Database::connect();

//     if ($this->request->getVar('id') == "") {
//         $add_data = $db->table('tbl_taskdetails');
//         $add_data->insert($data);

//         // Get the last inserted ID
//         $lastInsertedId = $db->insertID();

//         // Return a JSON response
//         return $this->response->setJSON(['success' => true, 'taskId' => $lastInsertedId]);
//     } else {
//         $update_data = $db->table('tbl_taskdetails')->where('id', $this->request->getVar('id'));
//         $update_data->update($data);
//         session()->setFlashdata('success', 'Task details updated successfully.');

//         // Return a JSON response with the updated task ID
//         return $this->response->setJSON(['success' => true, 'taskId' => $this->request->getVar('id')]);
//     }
// }
public function task()
{
    $projectId = $this->request->getPost('Projectname');
    $mainTaskId = $this->request->getPost('mainTaskName');
    $subTaskName = $this->request->getPost('subTaskName');
    $PageName = $this->request->getPost('PageName');
    $Taskradio = $this->request->getPost('Taskradio');
    $actionType = $this->request->getPost('actionType'); // Get the action type

    $data = [
        'project_id' => $projectId,
        'mainTask_id' => $mainTaskId,
        'subTaskName' => $subTaskName,
        'pageName' => $PageName,
        'taskPosition' => $Taskradio,
    ];

    $db = \Config\Database::connect();

    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_taskdetails');
        $add_data->insert($data);

        // Get the last inserted ID
        $lastInsertedId = $db->insertID();

        // Check the action type and respond accordingly
        if ($actionType == 'addTaskDescription') {
            return $this->response->setJSON(['success' => true, 'taskId' => $lastInsertedId]);
        } else {
            // Redirect to taskList if the action is not addTaskDescription
            return redirect()->to(base_url('taskList'));
        }
    } else {
        $update_data = $db->table('tbl_taskdetails')->where('id', $this->request->getVar('id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Task details updated successfully.');

        // Check the action type and respond accordingly
        if ($actionType == 'addTaskDescription') {
            return $this->response->setJSON(['success' => true, 'taskId' => $this->request->getVar('id')]);
        } else {
            // Redirect to taskList if the action is not addTaskDescription
            return redirect()->to(base_url('taskList'));
        }
    }
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
}else if($table==='tbl_taskdetails'){
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
    $data['DepartmentData'] = $model->getalldata('tbl_department', $wherecond);  
    $data['mainTaskData'] = $model->getalldata('tbl_maintaskmaster', $wherecond);
    $data['taskDetails']= $model->getalldata('tbl_taskdetails', $wherecond); 
    $wherecond1 = array('is_deleted' => 'N', 'role' => 'Employee');
    $data['employeeDetails']= $model->getalldata('employee_tbl', $wherecond1); 
    // echo'<pre>';print_r($data['taskDetails']);die;
    
    return view('Admin/allotTask',$data);
}

public function fetch_subtasks()
    {
        if ($this->request->isAJAX()) {
            $mainTaskId = $this->request->getJSON()->mainTaskId;

            $adminModel = new AdminModel();
            $subTasks = $adminModel->getSubTasksByMainTaskId($mainTaskId);

            return $this->response->setJSON($subTasks);
        }
    }

// public function allotTaskDetails() {
//     // Retrieve form data
//     $id = $this->request->getPost('id');
//     $projectCount = $this->request->getPost('projectCount');
//     $projectName = $this->request->getPost('Projectname');
//     $departmentNames = $this->request->getPost('Departmentname[]');
//     $mainTaskNames = $this->request->getPost('mainTaskName[]');
//     $subTaskNames = $this->request->getPost('subTaskName[]');
//     $employeeNames = $this->request->getPost('employeeName[]');
//     $workingHours = $this->request->getPost('workingHours[]');
//     $workingMinutes = $this->request->getPost('workingMinutes[]');
//     // echo'<pre>';print_r($departmentNames);echo"\n";
//     // print_r($mainTaskNames);
//     // print_r($subTaskNames);
//     // print_r($employeeNames);
//     // print_r($workingHours);
//     // print_r($workingMinutes);

//     // Ensure all arrays have the same length
//     $totalRows = count($mainTaskNames);
//     // print_r($totalRows);

//     $departmentNamesString = '';

//     $departmentNamesArray = $this->request->getPost('Departmentname[]');
//     // print_r($departmentNamesArray);die;
//     if (!empty($departmentNamesArray)) {
//         $departmentNamesString = implode(',', $departmentNamesArray);
//     }
//     // print_r($departmentNamesString);die;
//     // Handle the data as needed, such as saving to database

//     // Example: Saving to the database
//     // Assuming you have a model named TaskModel
//     $taskModel = new Adminmodel();

//     // Iterate through the data to save multiple rows
//     for ($i = 0; $i < $totalRows; $i++) {
//         // Assuming you have a database table named tasks
//         $data = [
//             // 'id' => $id,
//             // 'projectCount' => $projectCount,
//             'project_id' => $projectName,
//             'Department' => $departmentNamesString, // Use index to access department name for each row
//             'mainTask_id' => isset($mainTaskNames[$i]) ? $mainTaskNames[$i] : null, // Check if index exists
//             'sub_task_name' => isset($subTaskNames[$i]) ? $subTaskNames[$i] : null,
//             'emp_id' => isset($employeeNames[$i]) ? $employeeNames[$i] : null,
//             'working_hours' => isset($workingHours[$i]) ? $workingHours[$i] : null,
//             'working_min' => isset($workingMinutes[$i]) ? $workingMinutes[$i] : null
//         ];
//         // echo'<pre>';print_r($data);
        

//         $session = \CodeIgniter\Config\Services::session();
//         $session->setFlashdata('success', 'Task alloated successfully.');       

//         // Save data to the database
//       $result =  $taskModel->saveAllotTask($data);
//     //   echo'<pre>';print_r($result);
//     }
//     // die;
//     // echo'<pre>';print_r($data);die;

//     // You can perform further actions here, such as redirecting
//     return redirect()->to('AdminDashboard');
// }

public function allotTaskDetails()
{
    // Retrieve form data
    $projectName = $this->request->getPost('Projectname');
    $departmentNames = $this->request->getPost('Departmentname[]');
    $mainTaskNames = $this->request->getPost('mainTaskName[]');
    $subTaskNames = $this->request->getPost('subTaskName[]');
    $employeeNames = $this->request->getPost('employeeName[]');
    $workingHours = $this->request->getPost('workingHours[]');
    $workingMinutes = $this->request->getPost('workingMinutes[]');
    // print_r($subTaskNames);die;

    // Ensure all arrays have the same length
    $totalRows = count($mainTaskNames);

    $departmentNamesString = '';

    $departmentNamesArray = $this->request->getPost('Departmentname[]');
    if (!empty($departmentNamesArray)) {
        $departmentNamesString = implode(',', $departmentNamesArray);
    }

    // Load the model
    $taskModel = new Adminmodel();

    // Iterate through the data to save multiple rows
    for ($i = 0; $i < $totalRows; $i++) {
        // Fetch the ID of the selected  mainTask and subtask

        $taskId = $taskModel->getTaskIdByMainTaskAndName($mainTaskNames[$i], $subTaskNames[$i]);
        // print_r($taskId);die;

        // Prepare data for saving
        $data = [
            'project_id' => $projectName,
            'Department' => $departmentNamesString,
            'mainTask_id' => isset($mainTaskNames[$i]) ? $mainTaskNames[$i] : null,
            'sub_task_name' => isset($subTaskNames[$i]) ? $subTaskNames[$i] : null,
            'task_id' => $taskId, // Include the ID of the selected subtask
            'emp_id' => isset($employeeNames[$i]) ? $employeeNames[$i] : null,
            'working_hours' => isset($workingHours[$i]) ? $workingHours[$i] : null,
            'working_min' => isset($workingMinutes[$i]) ? $workingMinutes[$i] : null
        ];
        // print_r($data);die;

        // Save data to the database
        $result =  $taskModel->saveAllotTask($data);
    }

    // Set flash message
    $session = \CodeIgniter\Config\Services::session();
    $session->setFlashdata('success', 'Task allocated successfully.');

    // Redirect to admin dashboard
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

    if(!empty($sessionData)){
    $session = session();
    $sessionData = $session->get('sessiondata');
    $model = new Adminmodel();
    $today = date('Y-m-d');
    // $wherecond = array('from_date >=' => $today, 'Status' => 'P');
    // $leave_requests = $model->getalldata('tbl_leave_requests', $wherecond);

    $select = 'tbl_leave_requests.*, applicant.emp_name as applicant_name, handler.emp_name as handler_name';
    $joinCond1 = 'tbl_leave_requests.applicant_employee_id = applicant.Emp_id';
    $joinCond2 = 'tbl_leave_requests.hand_emp_id = handler.Emp_id';

    $wherecond = [
        'tbl_leave_requests.from_date >=' => $today, 'tbl_leave_requests.Status' => 'P'
    ];

    $data['leave_requests'] = $model->jointwotablesforleave($select, 'tbl_leave_requests', 
                                                    ['employee_tbl as applicant', 'employee_tbl as handler'], 
                                                    [$joinCond1, $joinCond2], $wherecond, 'DESC');

    $select = 'tbl_leave_requests.*, applicant.emp_name as applicant_name, handler.emp_name as handler_name';
    $joinCond1 = 'tbl_leave_requests.applicant_employee_id = applicant.Emp_id';
    $joinCond2 = 'tbl_leave_requests.hand_emp_id = handler.Emp_id';

    $wherecond = [
        'tbl_leave_requests.is_deleted' => 'N' // Additional condition
    ];

    $data['allLeaveRequests'] = $model->jointwotablesforleave($select, 'tbl_leave_requests', 
                                                    ['employee_tbl as applicant', 'employee_tbl as handler'], 
                                                    [$joinCond1, $joinCond2], $wherecond, 'DESC');

  
    echo view('Admin/leave_app', $data);
}else{
    return redirect()->to(base_url());

}
}
public function leave_result() {
    $db = \Config\Database::connect();
    $leave_id = $this->request->getPost('leave_id');
    $action = $this->request->getPost('action');

    if ($action === 'A') {
        $data = ['Status' => 'A'];
        $message = 'Leave request approved successfully.';
        $message_type = 'success';
    } elseif ($action === 'R') {
        $data = ['Status' => 'R'];
        $message = 'Leave request rejected successfully.';
        $message_type = 'error';
    } else {
        $message = 'Invalid action.';
        $message_type = 'warning';
    }

    $db->table('tbl_leave_requests')->where('id', $leave_id)->update($data);

    // Set flash data
    $session = \Config\Services::session();
    $session->setFlashdata($message_type, $message);

    return redirect()->to('leave_app');
}

public function admin_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $session = session();
    $sessionData = $session->get('sessiondata');
    $model = new Adminmodel();
    $wherecond = array('role' => 'Admin', 'is_deleted' => 'N');
    $data['adminlist'] = $model->getalldata('employee_tbl', $wherecond);
    // echo'<pre>';print_r($data);die;
    echo view('Admin/admin_list',$data);
}else{
    return redirect()->to(base_url());

}
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

// public function Daily_Task()
// {
//     $session = session();
//     $sessionData = $session->get('sessiondata');
//     $Emp_id = $sessionData['Emp_id'];

//     $model = new Adminmodel();

//     // echo'<pre>';print_r($_POST);

//     // Get the search date from the request, default to today
//     $searchDate = $this->request->getGet('searchDate');
//     // echo'<pre>';print_r($searchDate);die;

//     if ($searchDate) {
//         // Convert search date to Y-m-d format if it's in d-m-Y format
//         $searchDate = DateTime::createFromFormat('d-m-Y', $searchDate)->format('Y-m-d');
//     } else {
//         $searchDate = date('Y-m-d');
//     }

//     $wherecond = array('Emp_id' => $Emp_id);
//     $specialConditions = array('created_at' => $searchDate);

//     $data['DailyWorkData'] = $model->getalldata('tbl_daily_work', $wherecond, $specialConditions);
//     $data['searchDate'] = date('d-m-Y', strtotime($searchDate));

//     if ($this->request->isAJAX()) {
//         echo view('Employee/daily_task_table', $data);
//         return;
//     }

//     echo view('Employee/Daily_Task', $data);
// }
public function Daily_Task()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();


    // $uri = service('uri');
    // $user_id = $uri->getSegment(2);   // Assuming the ID is the second segment



    // if(!empty($user_id)){

    //     $wherecond1 = array('is_deleted' => 'N', 'id' => $user_id);

    //     $data['single_data'] = $model->get_single_data('tbl_user', $wherecond1);


    // }else{
    //     $wherecond = array('is_deleted' => 'N');
    //     $data['user_data'] = $model->getalldata('tbl_user', $wherecond);
    // }

    $session = session();
    $sessionData = $session->get('sessiondata');
    $Emp_id = $sessionData['Emp_id'];
    $model = new Adminmodel();
    $wherecond = array('Emp_id'=>$Emp_id);

    // Get the search date from the request, default to today
    $searchDate = $this->request->getGet('searchDate') ?: date('Y-m-d');

    $id = $this->request->uri->getSegment(2);
    // print_r($id);die;
    $data = [];
    if (!empty($id)) {
        $wherecond1 = ['is_deleted' => 'N', 'id' => $id,'task_date' => $searchDate,'Emp_id'=>$Emp_id];
        $data['single_data'] = $model->get_single_data('tbl_daily_work', $wherecond1);
    }

    //  echo'<pre>';print_r($data);die;

    // $data['DailyWorkData'] =  $model->getalldata('tbl_daily_work', $wherecond, ['task_date' => $searchDate]);

    $select = 'tbl_daily_work.*, tbl_project.projectName';
    $joinCond = 'tbl_daily_work.project_name  = tbl_project.p_id ';
    $wherecond = [
            'tbl_daily_work.is_deleted' => 'N',
            'tbl_project.is_deleted' => 'N',
            'task_date' => $searchDate,
            'Emp_id'=>$Emp_id
    ];

    $data['DailyWorkData'] = $model->jointwotables($select, 'tbl_daily_work', 'tbl_project',  $joinCond,  $wherecond, 'left');

    // echo'<pre>';print_r($data);die;

    $data['searchDate'] = $searchDate;

    $wherecond = array('is_deleted' => 'N');
    $data['projectData'] = $model->getalldata('tbl_project', $wherecond); 
    //  echo'<pre>';print_r($data);die;

    echo view('Employee/Daily_Task',$data);
}else{
    return redirect()->to(base_url());

}
}

public function daily_work() {
    //  print_r($_POST);die;
    $session = session();
    $sessionData = $session->get('sessiondata');
    $Emp_id = $sessionData['Emp_id'];
    $projectNames = $this->request->getPost('project_name');
    $tasks = $this->request->getPost('task');
    $useHours = $this->request->getPost('use_hours');
    $use_minutes = $this->request->getPost('use_minutes');
    $task_date = $this->request->getPost('task_date');
    $task_status = $this->request->getPost('task_status');
    $db = \Config\Database::connect();

    foreach ($projectNames as $key => $projectName) {
        $data = [
            'project_name' => $projectName,
            'task' => $tasks[$key],
            'use_hours' => $useHours[$key],
            // 'use_minutes' =>$use_minutes[$key],
            'Emp_id' =>$Emp_id,
            'task_date' =>$task_date,
            'task_status' => $task_status[$key]
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
public function completedTaskList(){
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');
    // Fetch projects from the database
    $data['projectData'] = $model->getalldata('tbl_project', $wherecond);
    $data['DepartmentData'] = $model->getalldata('tbl_department', $wherecond);  
    $data['mainTaskData'] = $model->getalldata('tbl_maintaskmaster', $wherecond);
    $data['taskDetails']= $model->getalldata('tbl_taskdetails', $wherecond); 
    $wherecond1 = array('is_deleted' => 'N', 'role' => 'Employee');
    $data['employeeDetails']= $model->getalldata('employee_tbl', $wherecond1); 
    // echo'<pre>';print_r($data['taskDetails']);die;

    $select1 = 'tbl_allottaskdetails.*, employee_tbl.emp_name, tbl_project.projectName, tbl_maintaskmaster.mainTaskName,';
    $joinCond4 = 'tbl_allottaskdetails.emp_id = employee_tbl.Emp_id';
    $joinCond5 = 'tbl_allottaskdetails.project_id = tbl_project.p_id';
    $joinCond6 = 'tbl_allottaskdetails.mainTask_id = tbl_maintaskmaster.id';
    $wherecond = [
        // 'tbl_allottaskdetails.Developer_task_status' => 'Complete',
        'tbl_allottaskdetails.is_deleted' => 'N',
    ];
    $data['assignedTasksData'] = $model->joinfourtables($select1, 'tbl_allottaskdetails',  'employee_tbl', 'tbl_project ', 'tbl_maintaskmaster ',  $joinCond4, $joinCond5, $joinCond6, $wherecond, 'DESC');
    //  echo'<pre>';print_r($data);die;
    // Fetch start_time and end_time from tbl_workingtime
    foreach ($data['assignedTasksData'] as $task) {
        $wherecond_workingTime = array('allotTask_id' => $task->id);
        $workingTimeData = $model->getalldata('tbl_workingtime', $wherecond_workingTime);
        if (!empty($workingTimeData)) {
            // Assuming there's only one record for each task, otherwise modify as needed
            $task->start_time = $workingTimeData[0]->start_time;
            $task->end_time = $workingTimeData[0]->end_time;
        } else {
            $task->start_time = null;
            $task->end_time = null;
        }
    }
    
    // echo'<pre>';print_r($data['assignedTasksData']);die;
    // print_r($data['dailyreport']);die;
    echo view('Admin/Assignedtasks',$data);

}else{
    return redirect()->to(base_url());

}
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

public function add_notifications(){
    $model = new AdminModel();
    $wherecond = array('role' => 'Admin', 'is_deleted' => 'N');
    $data['adminlist'] = $model->getalldata('employee_tbl', $wherecond);
    $wherecond = array('role' => 'Employee', 'is_deleted' => 'N');
    $data['emplist'] = $model->getalldata('employee_tbl', $wherecond);

     echo view('Admin/add_notification',$data); 
}

public function set_notification()
{
    $session = session();
    $sessionData = $session->get('sessiondata');
    $admin_id = $sessionData['Emp_id'];
// print_r($_POST);die;
    // Retrieve POST data
    $notification_description = $this->request->getPost('notification_description');
    $notification_date = $this->request->getPost('notification_date');
    $selectedEmployees = $this->request->getPost('selectedEmployees');
    $notification_subject = $this->request->getPost('notification_subject');

    // Parse the selected employees
        $employeeIds = explode(',', $selectedEmployees);

 

    // Convert employee IDs array to a comma-separated string
    $employeeIdsString = implode(',', $employeeIds);

    // Connect to the database
    $db = \Config\Database::connect();

    // Insert data into the database table
    $data = [
        // 'admin_id' => $admin_id,
        'emp_id' => $employeeIdsString, // Store as comma-separated string
        'notification_date' => $notification_date,
        'notification_desc' => $notification_description,
        'admin_id' => $admin_id,
        'notification_subject'=> $notification_subject
    ];

    // Print the data array for debugging
    print_r($data); // Remove or comment this line after debugging

    // Insert the data and handle the result
    $addNotification = $db->table('tbl_notification')->insert($data);

    if ($addNotification) {
        $session->setFlashdata('success', 'Notification sent successfully.');
    } else {
        $session->setFlashdata('errormessage', 'Error while sending notification.');
    }

    return redirect()->to('notification_list');
}

public function notification_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    // Fetch admin and employee lists
    $wherecond = ['role' => 'Admin', 'is_deleted' => 'N'];
    $data['adminlist'] = $model->getalldata('employee_tbl', $wherecond);
    
    $wherecond = ['role' => 'Employee', 'is_deleted' => 'N'];
    $data['emplist'] = $model->getalldata('employee_tbl', $wherecond);
    
    // Fetch notification list
    $wherecond = ['is_deleted' => 'N'];
    $notification_list = $model->getalldata('tbl_notification', $wherecond);

    // Process notifications
    $processed_notifications = [];
    if(!empty($notification_list)){
    foreach ($notification_list as $notification) {
        $employeeIds = explode(',', $notification->emp_id);

        foreach ($employeeIds as $emp_id) {
            if (!empty($emp_id)) {
                // Fetch employee name using a direct query
                $select = 'Emp_id, emp_name';
                $table = 'employee_tbl';
                $wherecond = ['Emp_id' => $emp_id];

                $employee = $model->getalldata($table, $wherecond);

                if (!empty($employee)) {
                    $employee_name = $employee[0]->emp_name;

                    $processed_notifications[] = (object) [
                        'id' => $notification->id,
                        'admin_id' => $notification->admin_id,
                        'emp_id' => $emp_id,
                        'emp_name' => $employee_name,
                        'notification_date' => $notification->notification_date,
                        'notification_subject' => $notification->notification_subject,
                        'notification_desc' => $notification->notification_desc,
                        'is_active' => $notification->is_active,
                        'is_deleted' => $notification->is_deleted,
                        'created_on' => $notification->created_on,
                        'updated_on' => $notification->updated_on
                    ];
                }
            }
        }
    }
}

    // Replace the original notification list with the processed one
    $data['notification_list'] = $processed_notifications;
    // echo'<pre>';print_r($data);die;

    echo view('Admin/notification_list', $data);
}else{
    return redirect()->to(base_url());

}
}












public function create_meetings()
{
    // Retrieve POST data
    $meetingLink = $this->request->getPost('meetingLink');
    $meetingDate = $this->request->getPost('meetingdate');
    $meetingTime = $this->request->getPost('meetingtime');
    $selectedEmployees = $this->request->getPost('selectedEmployees');
    $Hostname = $this->request->getPost('Hostname');
    $Subject = $this->request->getPost('Subject');
    $client_involve = $this->request->getPost('client_involve');
    
    // Parse the selected employees
    $employeeIds = explode(',', $selectedEmployees);

    // Convert employee IDs array to a comma-separated string
    $employeeIdsString = implode(',', $employeeIds);

    // Connect to the database
    $db = \Config\Database::connect();
    $session = \CodeIgniter\Config\Services::session();

    // Insert data into the database table
    $data = [
        'meeting_link' => $meetingLink,
        'meeting_date' => $meetingDate,
        'meeting_time' => $meetingTime,
        'employee_id' => $employeeIdsString, // Store as comma-separated string
        'Hostname' => $Hostname,
        'Subject' => $Subject,
        'client_involve' => $client_involve,
    ];
    $db->table('tbl_meetings')->insert($data);
    $session->setFlashdata('success', 'Meeting created successfully.');       

    return redirect()->to('Create_meeting');
}

public function meetings()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new Loginmodel();
    $session = session();
    $sessionData =  $session->get('sessiondata');
    $Emp_id = $sessionData['Emp_id'];
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');  
    $data['sessiondata'] = $model->checkLogin($email, $password);
   $today = date('Y-m-d'); 

    

    $modelnew = new AdminModel();  
    // $wherecond = [
    //     'meeting_date >=' => $today,
    //     '(employee_id = ' . $Emp_id . ' OR FIND_IN_SET(' . $Emp_id . ', employee_id) > 0 OR employee_id = "all")' => NULL,
    // ];
    
    // $data['meetings'] = $modelnew->getalldata('tbl_meetings', $wherecond);


    $select = 'tbl_meetings.*, employee_tbl.emp_name';
    $joinCond = 'tbl_meetings.Hostname  = employee_tbl.Emp_id';
    
    $wherecond = [
        'tbl_meetings.meeting_date >=' => $today,
    '(tbl_meetings.employee_id = ' . $Emp_id . ' OR FIND_IN_SET(' . $Emp_id . ', tbl_meetings.employee_id) > 0 OR tbl_meetings.employee_id = "all" OR FIND_IN_SET(' . $Emp_id . ', tbl_meetings.Hostname) > 0)' => NULL,
    ];
    $data['meetings'] = $modelnew->jointwotables($select, 'tbl_meetings ', 'employee_tbl ',  $joinCond,  $wherecond, 'DESC');





    
    // echo '<pre>';  print_r($data['meetings']);die;
    echo view('Employee/meetings', $data);
}else{
    return redirect()->to(base_url());

}
}

public function Join_meeting()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    // $today = date('Y-m-d');
    $modelnew = new AdminModel();
    
    $wherecond = array('role' => 'Admin', 'is_deleted' => 'N');
    $data['adminlist'] = $modelnew->getalldata('employee_tbl', $wherecond);
    $wherecond = array('role' => 'Employee', 'is_deleted' => 'N');
    $data['emplist'] = $modelnew->getalldata('employee_tbl', $wherecond);
    // $wherecond = [
    //     'is_deleted' =>'N',
    // ];

    // $data['meetings'] = $modelnew->getalldata('tbl_meetings', $wherecond);



    $select = 'tbl_meetings.*, employee_tbl.emp_name';
    $joinCond = 'tbl_meetings.Hostname  = employee_tbl.Emp_id';
    
    $wherecond = [
        'tbl_meetings.is_deleted' => 'N',
    ];
    $data['meetings'] = $modelnew->jointwotables($select, 'tbl_meetings ', 'employee_tbl ',  $joinCond,  $wherecond, 'DESC');
//  echo '<pre>';  print_r($data['meetings']);die;

    



    echo view('Admin/Join_meeting',$data);

}else{
    return redirect()->to(base_url());

}
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
public function addservices()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegment(2);
    $data = [];
    if (!empty($id)) {
        $wherecond1 = ['is_deleted' => 'N', 'id' => $id];
        $data['single_data'] = $model->get_single_data('tbl_services', $wherecond1);
    }

    echo view('Admin/addservices',$data);

}
public function add_Services()
{
    $ServicesName = $this->request->getPost('ServicesName');
    $hsnno = $this->request->getPost('hsnno');
    $data = [
        'ServicesName' => $ServicesName,
        'hsnno' => $hsnno,
    ];
    
    $db = \Config\Database::connect();
    $mainTaskTable = $db->table('tbl_services');

    $existingTask = $mainTaskTable->where('ServicesName', $ServicesName)
                              ->get()
                              ->getFirstRow();
    
    if ($existingTask && ($this->request->getVar('id') == "" || $existingTask->id != $this->request->getVar('id'))) {
        session()->setFlashdata('error', 'Task name already exists.');
        return redirect()->to('services_list');
    }

    if ($this->request->getVar('id') == "") {
        $mainTaskTable->insert($data);
        session()->setFlashdata('success', 'Menu added successfully.');
    } else {
        $mainTaskTable->where('id', $this->request->getVar('id'))->update($data);
        session()->setFlashdata('success', 'Menu updated successfully.');
    }

    return redirect()->to('services_list');
}
public function services_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');

    $data['menu_data'] = $model->getalldata('tbl_services', $wherecond);
    // echo '<pre>';print_r($data);die;
    echo view('Admin/serviceslist',$data);
}else{
    return redirect()->to(base_url());

}
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
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');

    $data['menu_data'] = $model->getalldata('tbl_maintaskmaster', $wherecond);
    // echo '<pre>';print_r($data);die;
    echo view('Admin/maintask_list',$data);
}else{
    return redirect()->to(base_url());

}
}
public function department_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');

    $data['menu_data'] = $model->getalldata('tbl_department', $wherecond);
    // echo '<pre>';print_r($data);die;
    echo view('Admin/department_list',$data);
}else{
    return redirect()->to(base_url());

}
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

    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');


    $data['menu_data'] = $model->getalldata('tbl_menu', $wherecond);
    // echo "<pre>";print_r($data['menu_data']);exit();
    echo view('menu_list', $data);
}else{
    return redirect()->to(base_url());

}

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
    // echo $id;
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
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();
    $wherecond = array('is_deleted' => 'N' , 'role' => 'Employee');
    $data['emp_data'] = $model->getalldata('employee_tbl', $wherecond);

    $result = session();
    // $session_id = $result->get('id');
    $model = new Adminmodel();
    // $data['session_id'] = $session_id;
    $wherecond = array('is_deleted' => 'N');
    $data['DepartmentData']= $model->getalldata('tbl_department', $wherecond);
    $wherecond = array('is_deleted' => 'N');
    $data['menu_data'] = $model->getalldata('tbl_menu', $wherecond);
    
    $model = new Adminmodel();
    $user_id_segments = $this->request->uri->getSegments();
    // print_r($user_id_segments);die;
    $user_id = !empty($user_id_segments[1]) ? $user_id_segments[1] : null;
    $wherecond1 = [];
    if ($user_id !== null) {
        $wherecond1 = array('is_deleted' => 'N', 'Emp_id' => $user_id);
        $data['single_data'] = $model->get_single_data('employee_tbl', $wherecond1);
    }

    // echo "<pre>";print_r($data['menu_data']);exit();
    echo view('emp_list', $data);
}else{
    return redirect()->to(base_url());

}

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


    public function update_payment_status()
    {
        $data = [
            'payment_status' => $this->request->getVar('selectedValue'),
        ];

        $db = \Config\Database::Connect();
            $update_data = $db->table('tbl_invoice')->where('id ', $this->request->getVar('id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'status updated successfully.');
        return redirect()->to('Admindashboard');
    }



    public function update_task_status()
    {
        $data = [
            'Developer_task_status' => $this->request->getVar('selectedValue'),
        ];

        $db = \Config\Database::Connect();
            $update_data = $db->table('tbl_allottaskdetails')->where('id ', $this->request->getVar('id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'status updated successfully.');
            return redirect()->to('EmployeeDashboard');

    }   
    
    
    public function add_client()
    {
        $model = new AdminModel();

        $id = $this->request->uri->getSegments(1);
        if(isset($id[1])) {

            $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

            $data['single_data'] = $model->get_single_data('tbl_client', $wherecond1);
            echo view('Admin/add_client',$data);
        } else {
            echo view('Admin/add_client');
        } 

    }


  
public function set_client()
{

    
    $data = [
        'client_name' => $this->request->getVar('client_name'),
        'company_name' => $this->request->getVar('company_name'),
        'email' => $this->request->getVar('email'),
        'mobile_no' => $this->request->getVar('mobile_no'),
        'pan_no' => $this->request->getVar('pan_no'),
        'gst_no' => $this->request->getVar('gst_no'),
        'address' => $this->request->getVar('address'),
        'vendor_code' => $this->request->getVar('vendor_code'),

        
    ];
    $db = \Config\Database::connect();
   
    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_client');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Client added successfully.');
    } else {
        $update_data = $db->table('tbl_client')->where('id', $this->request->getVar('id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Client updated successfully.');
            
    }

    return redirect()->to('client_list');
}


public function client_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');

    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);
    // echo "<pre>";print_r($data['client_data']);exit();
    echo view('Admin/client_list', $data);

}else{
    return redirect()->to(base_url());

}

}  

public function bank_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');

    $data['bank_data'] = $model->getalldata('tbl_bank', $wherecond);
    // echo "<pre>";print_r($data['bank_data']);exit();
    echo view('Admin/bank_list',$data);
}else{
    return redirect()->to(base_url());

}

} 

public function set_bank()
{
// print_r($_POST);die;
    
    $data = [
        'bank_name' => $this->request->getVar('bank_name'),
        'branch_name' => $this->request->getVar('branch_name'),
        'account_name' => $this->request->getVar('account_holder_name'),
        'account_number' => $this->request->getVar('account_number'),
        'ifsc_number' => $this->request->getVar('ifsc_number'),
        'upi_id' => $this->request->getVar('upi_id'),
        'mobile_no' => $this->request->getVar('mobile_no'),
        
    ];
    $db = \Config\Database::connect();
   
    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_bank');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Bank added successfully.');
    } else {
        $update_data = $db->table('tbl_bank')->where('id', $this->request->getVar('id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Bank updated successfully.');
            
    }

    return redirect()->to('bank_list');
}

public function add_bank()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);
    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_bank', $wherecond1);
        echo view('Admin/add_bank',$data);
    } else {
        echo view('Admin/add_bank');
    } 

}



public function invoice()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);
    if(isset($id[1])) {
        $select = 'tbl_invoice.*, tbl_invoice.id as invoiceid, tbl_client.*, tbl_client.id as clientid, tbl_client.vendor_code, tbl_currencies.symbol as currency_symbol';
        $table1 = 'tbl_invoice';
        $table2 = 'tbl_client';
        $table3 = 'tbl_currencies';
        $joinCond1 = 'tbl_invoice.client_id = tbl_client.id';
        $joinCond2 = 'tbl_invoice.currancy_id = tbl_currencies.id';  // Assuming this is the correct join condition
        $wherecond = [
            'tbl_invoice.is_deleted' => 'N',
            'tbl_invoice.id' => $id[1]
        ];

        $data['invoice_data'] = $model->joinThreeTablessingal($select, $table1, $table2, $table3, $joinCond1, $joinCond2, $wherecond);


        // echo "<pre>";print_r($data['invoice_data']);exit();
        echo view('Admin/invoice',$data);
    } else {
        echo view('Admin/invoice');


    } 

}

public function downloadInvoice($invoiceId)
{
    // Load the invoice data
    $adminModel = new \App\Models\Adminmodel();
    $select = 'tbl_invoice.*, tbl_invoice.id as invoiceid, tbl_client.*, tbl_client.id as clientid, tbl_currencies.symbol as currency_symbol';
        $table1 = 'tbl_invoice';
        $table2 = 'tbl_client';
        $table3 = 'tbl_currencies';
        $joinCond1 = 'tbl_invoice.client_id = tbl_client.id';
        $joinCond2 = 'tbl_invoice.currancy_id = tbl_currencies.id';  // Assuming this is the correct join condition
        $wherecond = [
            'tbl_invoice.is_deleted' => 'N',
            'tbl_invoice.id' =>$invoiceId
        ];

        $invoice_data = $adminModel->joinThreeTablessingal($select, $table1, $table2, $table3, $joinCond1, $joinCond2, $wherecond);

    //    echo'<pre>'; print_r($invoice_data);exit();
       $po_no = $invoice_data->po_no;
       $wherecond = array('is_deleted' => 'N', 'id' => $po_no);
       $wherecond1 = array('is_deleted' => 'N', 'invoice_id' => $invoiceId);
       $item_data = $adminModel->getalldata('tbl_iteam', $wherecond1);
       $po_data = $adminModel->get_single_data('tbl_po', $wherecond);
    

    // Render the view
    $html = view('Admin/invoice', compact('invoice_data', 'po_data', 'item_data'));

    // Load Dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Output the generated PDF
    $dompdf->stream("invoice_{$invoiceId}.pdf", array("Attachment" => 1));
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

public function add_invoice()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['currancy_data'] = $model->getalldata('tbl_currencies', $wherecond);
    
    $wherecond = array('is_deleted' => 'N');
    $data['tax_data'] = $model->getalldata('tbl_tax', $wherecond);

    // echo "<pre>";print_r($data['services_data']);exit();

    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_invoice', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N', 'invoice_id' => $id[1]);

        $data['iteam'] = $model->getalldata('tbl_iteam', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N');

        $data['po_data'] = $model->getalldata('tbl_po', $wherecond1);

                // echo "<pre>";print_r($data['single_data']);exit();

        
        echo view('Admin/add_invoice',$data);
    } else {
        echo view('Admin/add_invoice',$data);


    } 

}
public function set_invoice()
{
                    // echo "<pre>";print_r($_POST);exit();


                    $currentMonth = date('m');
                    $currentYear = date('Y');
                    if ($currentMonth > 3) {
                        $financialYear = $currentYear . '-' . substr($currentYear + 1, 2);
                    } else {
                        $financialYear = ($currentYear - 1) . '-' . substr($currentYear, 2);
                    }

                    // Determine the tax type
                    $taxType = $this->request->getVar('tax_id');
                    $taxCondition = '';
                    if ($taxType == 1 || $taxType == 2) {
                        $taxCondition = "WHERE tax_id IN (1, 2) AND is_deleted = 'N'";
                    } elseif ($taxType == 3) {
                        $taxCondition = "WHERE tax_id = 3 AND is_deleted = 'N'";
                    }
                    // Initialize database connection
                    $db = \Config\Database::connect();
                    // Count invoices based on the tax type
                    $query = $db->query("SELECT COUNT(*) as count FROM tbl_invoice $taxCondition");
                    $result = $query->getRow();
                    $invoiceCount = $result->count + 1; // Add 1 to the count
                    $invoiceNumber = str_pad($invoiceCount, 4, '0', STR_PAD_LEFT); // Pad the number with zeros to ensure it's 4 digits

                    // Generate the invoice number
                    $invoiceNo = "MIT-" . $financialYear . "-" . $invoiceNumber ;

    // print_r($_POST);exit();
    $data = [
        'invoice_date' => $this->request->getVar('invoice_date'),
        'client_id' => $this->request->getVar('client_id'),
        'currancy_id' => $this->request->getVar('currancy_id'),
        'tax_id' => $this->request->getVar('tax_id'),
        'invoiceNo' => $invoiceNo,
        'bank_id' => $this->request->getVar('bank_id'),

        'po_no' => $this->request->getVar('po_no'),
        'suppplier_code' => $this->request->getVar('suppplier_code'),
        'due_date' => $this->request->getVar('due_date'),

        'totalamounttotal' => $this->request->getVar('totalamounttotal'),
        'cgst' => $this->request->getVar('cgst'),
        'sgst' => $this->request->getVar('sgst'),
        'igst' => $this->request->getVar('igst'),
        'final_total' => $this->request->getVar('final_total'),
        'totalamount_in_words' => $this->request->getVar('totalamount_in_words'),
        
    ];
    $db = \Config\Database::connect();

    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_invoice');
        $add_data->insert($data);

        $last_id =  $db->insertID();

        $iteam = $this->request->getVar('iteam');
        $description = $this->request->getVar('description');

        $quantity = $this->request->getVar('quantity');
        $price = $this->request->getVar('price');
    
        $total_amount = $this->request->getVar('total_amount');

        for($k=0;$k<count($iteam);$k++){
            $product_data = array(
                'invoice_id' 	=> $last_id,
                'iteam' 		=> $iteam[$k],
                'description' 		=> $description[$k],

                'quantity' 		=> $quantity[$k],
                'price' 		=> $price[$k],
                'total_amount'  => $total_amount[$k],
                
            ); 
            // echo "<pre>";print_r($product_data);exit();
            $add_data = $db->table('tbl_iteam');
            $add_data->insert($product_data);
    
        }
        session()->setFlashdata('success', 'Invoice added successfully.');
    } else {


        $data1 = [
            'invoice_date' => $this->request->getVar('invoice_date'),
            'client_id' => $this->request->getVar('client_id'),
            'currancy_id' => $this->request->getVar('currancy_id'),
            'tax_id' => $this->request->getVar('tax_id'),
    
            'po_no' => $this->request->getVar('po_no'),
            'suppplier_code' => $this->request->getVar('suppplier_code'),
            'due_date' => $this->request->getVar('due_date'),
    
            'totalamounttotal' => $this->request->getVar('totalamounttotal'),
            'cgst' => $this->request->getVar('cgst'),
            'sgst' => $this->request->getVar('sgst'),
            'igst' => $this->request->getVar('igst'),
            'final_total' => $this->request->getVar('final_total'),
            'totalamount_in_words' => $this->request->getVar('totalamount_in_words'),
            
        ];
            $update_data = $db->table('tbl_invoice')->where('id', $this->request->getVar('id'));
        $update_data->update($data1);

        $last_id =  $this->request->getVar('id');

        $delete = $db->table('tbl_iteam')->where('invoice_id', $this->request->getVar('id'))->delete();

        $iteam = $this->request->getVar('iteam');
        $description = $this->request->getVar('description');


        $quantity = $this->request->getVar('quantity');
        $price = $this->request->getVar('price');
    
        $total_amount = $this->request->getVar('total_amount');

        for($k=0;$k<count($iteam);$k++){
            $product_data = array(
                'invoice_id' 	=> $last_id,
                'iteam' 		=> $iteam[$k],
                'description' 		=> $description[$k],

                'quantity' 		=> $quantity[$k],
                'price' 		=> $price[$k],
                'total_amount'  => $total_amount[$k],
                
            ); 
            $add_data = $db->table('tbl_iteam');
            $add_data->insert($product_data);
    
        }
        session()->setFlashdata('success', 'Invoice updated successfully.');
            
    }

    return redirect()->to('invoice_list');
}


public function invoice_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){

    $model = new AdminModel();

    // $wherecond = array('is_deleted' => 'N');
    // $data['invoice_data'] = $model->getalldata('tbl_invoice', $wherecond);

    $id = $this->request->uri->getSegments(1);

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    $data['currancy_data'] = $model->getalldata('tbl_currencies', $wherecond);
   
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);
    
    $data['tax_data'] = $model->getalldata('tbl_tax', $wherecond);

    $data['bank_data'] = $model->getalldata('tbl_bank', $wherecond);
    
    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_invoice', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N', 'invoice_id' => $id[1]);

        $data['iteam'] = $model->getalldata('tbl_iteam', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N');

        $data['po_data'] = $model->getalldata('tbl_po', $wherecond1);
        
    } 

    $select = 'tbl_invoice.*, tbl_client.client_name';
    $joinCond = 'tbl_invoice.client_id  = tbl_client.id ';
    
    $wherecond = [
        'tbl_invoice.is_deleted' => 'N',
    ];
    $data['invoice_data'] = $model->jointwotables($select, 'tbl_invoice ', 'tbl_client ',  $joinCond,  $wherecond, 'DESC');

    // echo "<pre>";print_r($data['invoice_data']);exit();
    echo view('Admin/invoice_list', $data);

}else{
    return redirect()->to(base_url());

}


}    

// Po Code

public function add_po()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);

    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_po', $wherecond1);
        // print_r($data['single_data']);exit();

        $wherecond1 = array('is_deleted' => 'N', 'po_id' => $id[1]);

        $data['services'] = $model->getalldata('tbl_services_details', $wherecond1);


        $wherecond1 = array('is_deleted' => 'N', 'po_id' => $id[1]);

        $data['custom_data'] = $model->getalldata('tbl_custom_data', $wherecond1);

        // echo "<pre>";print_r($data['custom_data']);exit();
        
        echo view('Admin/add_po',$data);
    } else {
        // echo "<pre>";print_r($data['client_data']);exit();
        echo view('Admin/add_po',$data);

    } 

}


public function renew_po()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);

    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_po', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N', 'po_id' => $id[1]);

        $data['services'] = $model->getalldata('tbl_services_details', $wherecond1);


        $wherecond1 = array('is_deleted' => 'N', 'po_id' => $id[1]);

        $data['custom_data'] = $model->getalldata('tbl_custom_data', $wherecond1);

        // echo "<pre>";print_r($data['custom_data']);exit();
        
        echo view('Admin/renew_po',$data);
    } else {
        // echo "<pre>";print_r($data['client_data']);exit();
        echo view('Admin/renew_po',$data);

    } 

}

public function continue_po()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);

    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_po', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N', 'po_id' => $id[1]);

        $data['services'] = $model->getalldata('tbl_services_details', $wherecond1);


        $wherecond1 = array('is_deleted' => 'N', 'po_id' => $id[1]);

        $data['custom_data'] = $model->getalldata('tbl_custom_data', $wherecond1);

        // echo "<pre>";print_r($data['custom_data']);exit();
        
        echo view('Admin/continue_po',$data);
    } else {
        // echo "<pre>";print_r($data['client_data']);exit();
        echo view('Admin/continue_po',$data);

    } 

}

public function set_po()
{
    // echo'<pre>';print_r($_POST);die;
        $newName = '';

        // Check if the file input is present
        if ($this->request->getFile('attachment')) {
            $attachmentFile = $this->request->getFile('attachment');
            
            // Check if the file is uploaded
            if ($attachmentFile->isValid() && !$attachmentFile->hasMoved()) {     
                $newName = $attachmentFile->getRandomName();
                $attachmentFile->move(ROOTPATH . 'public/uploades/PDF', $newName);
            }
        }

        // echo $newName;
        //         echo "<pre>";print_r($_POST);exit();


        $data = [
            'po_file' => $newName, 
            'client_id' => $this->request->getVar('client_id'),
            'select_type' => $this->request->getVar('select_type'),
            'doc_no' => $this->request->getVar('doc_no'),
            'POType' => $this->request->getVar('POType'),
            'doc_no' => $this->request->getVar('doc_no'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'paymentTerms' => $this->request->getVar('paymentTerms'),
            'half_yearly_start_month' => $this->request->getVar('half_yearly_start_month'),
            'half_yearly_start_date' => $this->request->getVar('half_yearly_start_date'),
            'half_yearly_end_date' => $this->request->getVar('half_yearly_end_date'),
            'half_yearly_start_month1' => $this->request->getVar('half_yearly_start_month1'),
            'half_yearly_start_date1' => $this->request->getVar('half_yearly_start_date1'),
            'half_yearly_end_date1' => $this->request->getVar('half_yearly_end_date1'),

            'quarterly_start_month' => $this->request->getVar('quarterly_start_month'),
            'quarterly_start_month_start_date' => $this->request->getVar('quarterly_start_month_start_date'),
            'quarterly_start_month_end_date' => $this->request->getVar('quarterly_start_month_end_date'),

            'quarterly_start_month1' => $this->request->getVar('quarterly_start_month1'),
            'quarterly_start_month_start_date1' => $this->request->getVar('quarterly_start_month_start_date1'),
            'quarterly_start_month_end_date1' => $this->request->getVar('quarterly_start_month_end_date1'),

            'quarterly_start_month2' => $this->request->getVar('quarterly_start_month2'),
            'quarterly_start_month_start_date2' => $this->request->getVar('quarterly_start_month_start_date2'),
            'quarterly_start_month_end_date2' => $this->request->getVar('quarterly_start_month_end_date2'),


            'quarterly_start_month3' => $this->request->getVar('quarterly_start_month3'),
            'quarterly_start_month_start_date3' => $this->request->getVar('quarterly_start_month_start_date3'),
            'quarterly_start_month_end_date3' => $this->request->getVar('quarterly_start_month_end_date3'),

            'yearly_start_date' => $this->request->getVar('yearly_start_date'),
            'yearly_end_date' => $this->request->getVar('yearly_end_date'),

            'monthly_start_date' => $this->request->getVar('monthly_start_number'),
            'monthly_end_date' => $this->request->getVar('monthly_end_number'),
            
        ];
        $db = \Config\Database::connect();

        if ($this->request->getVar('id') == "") {
            $add_data = $db->table('tbl_po');
            $add_data->insert($data);

            $last_id =  $db->insertID();

            $services = $this->request->getVar('services');

            $description = $this->request->getVar('description');

            $quantity = $this->request->getVar('quantity');
            $price = $this->request->getVar('price');
        
            $hsn_no = $this->request->getVar('hsn_no');


            for($k=0 ; $k < count($services) ; $k++){
                $product_data = array(
                    'po_id' 	=> $last_id,
                    'services' 		=> $services[$k],
                    'description' 		=> $description[$k],
                    'quantity' 		=> $quantity[$k],
                    'price' 		=> $price[$k],
                    'hsn_no'  => $hsn_no,
                    
                ); 
                // echo "<pre>";print_r($product_data);exit();
                $add_data = $db->table('tbl_services_details');
                $add_data->insert($product_data);
        
            }

            if($this->request->getVar('paymentTerms') == 'custom'){


            $custom_description = $this->request->getVar('custom_description');
            $custom_percentage = $this->request->getVar('custom_percentage');
        

            if (is_array($custom_description) && is_array($custom_percentage)) {
                for($k=0 ; $k < count($custom_description) ; $k++){
                $custom_data = array(
                    'po_id' 	=> $last_id,
                    'custom_description' 		=> $custom_description[$k],
                    'custom_percentage' 		=> $custom_percentage[$k],
                
                    
                ); 
                // echo "<pre>";print_r($product_data);exit();
                $add_data = $db->table('tbl_custom_data');
                $add_data->insert($custom_data);
        
                }
            }
        }
    
        session()->setFlashdata('success', 'PO added successfully.');
        } else {
            $update_data = $db->table('tbl_po')->where('id', $this->request->getVar('id'));
            $update_data->update($data);

            $last_id =  $this->request->getVar('id');

            $delete = $db->table('tbl_services_details')->where('po_id', $this->request->getVar('id'))->delete();

            $delete = $db->table('tbl_custom_data')->where('po_id', $this->request->getVar('id'))->delete();

            $services = $this->request->getVar('services');
            $description = $this->request->getVar('description');
            $quantity = $this->request->getVar('quantity');
            $price = $this->request->getVar('price');
            $hsn_no = $this->request->getVar('hsn_no');

            for($k=0 ; $k < count($services) ; $k++){
                $product_data = array(
                    'po_id' 	=> $last_id,
                    'services' 		=> $services[$k],
                    'description' 		=> $description[$k],
                    'quantity' 		=> $quantity[$k],
                    'price' 		=> $price[$k],
                    'hsn_no'  => $hsn_no,
                    
                ); 
                $add_data = $db->table('tbl_services_details');
                $add_data->insert($product_data);
        
            }

            $custom_description = $this->request->getVar('custom_description');
            $custom_percentage = $this->request->getVar('custom_percentage');
            if($this->request->getVar('paymentTerms') == 'custom'){


            if (is_array($custom_description) && is_array($custom_percentage)) {

                for($k=0;$k < count($custom_description) ; $k++){
                    $custom_data = array(
                        'po_id' 	=> $last_id,
                        'custom_description' 		=> $custom_description[$k],
                        'custom_percentage' 		=> $custom_percentage[$k],
                    ); 
                    // echo "<pre>";print_r($product_data);exit();
                    $add_data = $db->table('tbl_custom_data');
                    $add_data->insert($custom_data);
                }

            }
        }
        session()->setFlashdata('success', 'Invoice updated successfully.');
            
    }

    return redirect()->to('po_list');
}

public function set_renew_po()
{
        $newName = '';

        // Check if the file input is present
        if ($this->request->getFile('attachment')) {
            $attachmentFile = $this->request->getFile('attachment');
            
            // Check if the file is uploaded
            if ($attachmentFile->isValid() && !$attachmentFile->hasMoved()) {     
                $newName = $attachmentFile->getRandomName();
                $attachmentFile->move(ROOTPATH . 'public/uploades/PDF', $newName);
            }
        }

        // echo $newName;
        //         echo "<pre>";print_r($_POST);exit();


        $data = [
            'po_file' => $newName, 
            'client_id' => $this->request->getVar('client_id'),
            'select_type' => $this->request->getVar('select_type'),
            'doc_no' => $this->request->getVar('doc_no'),
            'doc_date' => $this->request->getVar('doc_date'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'paymentTerms' => $this->request->getVar('paymentTerms'),
            'half_yearly_start_month' => $this->request->getVar('half_yearly_start_month'),
            'half_yearly_start_date' => $this->request->getVar('half_yearly_start_date'),
            'half_yearly_end_date' => $this->request->getVar('half_yearly_end_date'),
            'half_yearly_start_month1' => $this->request->getVar('half_yearly_start_month1'),
            'half_yearly_start_date1' => $this->request->getVar('half_yearly_start_date1'),
            'half_yearly_end_date1' => $this->request->getVar('half_yearly_end_date1'),

            'quarterly_start_month' => $this->request->getVar('quarterly_start_month'),
            'quarterly_start_month_start_date' => $this->request->getVar('quarterly_start_month_start_date'),
            'quarterly_start_month_end_date' => $this->request->getVar('quarterly_start_month_end_date'),

            'quarterly_start_month1' => $this->request->getVar('quarterly_start_month1'),
            'quarterly_start_month_start_date1' => $this->request->getVar('quarterly_start_month_start_date1'),
            'quarterly_start_month_end_date1' => $this->request->getVar('quarterly_start_month_end_date1'),

            'quarterly_start_month2' => $this->request->getVar('quarterly_start_month2'),
            'quarterly_start_month_start_date2' => $this->request->getVar('quarterly_start_month_start_date2'),
            'quarterly_start_month_end_date2' => $this->request->getVar('quarterly_start_month_end_date2'),


            'quarterly_start_month3' => $this->request->getVar('quarterly_start_month3'),
            'quarterly_start_month_start_date3' => $this->request->getVar('quarterly_start_month_start_date3'),
            'quarterly_start_month_end_date3' => $this->request->getVar('quarterly_start_month_end_date3'),

            'yearly_start_date' => $this->request->getVar('yearly_start_date'),
            'yearly_end_date' => $this->request->getVar('yearly_end_date'),

            'monthly_start_date' => $this->request->getVar('monthly_start_number'),
            'monthly_end_date' => $this->request->getVar('monthly_end_number'),
            
        ];
        $db = \Config\Database::connect();

        if ( $this->request->getVar('id')) {
            $add_data = $db->table('tbl_po');
            $add_data->insert($data);

            $last_id =  $db->insertID();

            $services = $this->request->getVar('services');

            $description = $this->request->getVar('description');

            $quantity = $this->request->getVar('quantity');
            $price = $this->request->getVar('price');
        
            $period = $this->request->getVar('period');


            for($k=0 ; $k < count($services) ; $k++){
                $product_data = array(
                    'po_id' 	=> $last_id,
                    'services' 		=> $services[$k],
                    'description' 		=> $description[$k],
                    'quantity' 		=> $quantity[$k],
                    'price' 		=> $price[$k],
                    'period'  => $period[$k],
                    
                ); 
                // echo "<pre>";print_r($product_data);exit();
                $add_data = $db->table('tbl_services_details');
                $add_data->insert($product_data);
        
            }

            if($this->request->getVar('paymentTerms') == 'custom'){


            $custom_description = $this->request->getVar('custom_description');
            $custom_percentage = $this->request->getVar('custom_percentage');
        

            if (is_array($custom_description) && is_array($custom_percentage)) {
                for($k=0 ; $k < count($custom_description) ; $k++){
                $custom_data = array(
                    'po_id' 	=> $last_id,
                    'custom_description' 		=> $custom_description[$k],
                    'custom_percentage' 		=> $custom_percentage[$k],
                
                    
                ); 
                // echo "<pre>";print_r($product_data);exit();
                $add_data = $db->table('tbl_custom_data');
                $add_data->insert($custom_data);
        
                }
            }
        }
    
        session()->setFlashdata('success', 'PO added successfully.');
        } 

    return redirect()->to('po_list');
}

public function set_continue_po()
{
        $newName = '';

        // Check if the file input is present
        if ($this->request->getFile('attachment')) {
            $attachmentFile = $this->request->getFile('attachment');
            
            // Check if the file is uploaded
            if ($attachmentFile->isValid() && !$attachmentFile->hasMoved()) {     
                $newName = $attachmentFile->getRandomName();
                $attachmentFile->move(ROOTPATH . 'public/uploades/PDF', $newName);
            }
        }

        // echo $newName;
        //         echo "<pre>";print_r($_POST);exit();


        $data = [
            'po_file' => $newName, 
            'client_id' => $this->request->getVar('client_id'),
            'select_type' => $this->request->getVar('select_type'),
            'doc_no' => $this->request->getVar('doc_no'),
            'doc_date' => $this->request->getVar('doc_date'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'paymentTerms' => $this->request->getVar('paymentTerms'),
            'half_yearly_start_month' => $this->request->getVar('half_yearly_start_month'),
            'half_yearly_start_date' => $this->request->getVar('half_yearly_start_date'),
            'half_yearly_end_date' => $this->request->getVar('half_yearly_end_date'),
            'half_yearly_start_month1' => $this->request->getVar('half_yearly_start_month1'),
            'half_yearly_start_date1' => $this->request->getVar('half_yearly_start_date1'),
            'half_yearly_end_date1' => $this->request->getVar('half_yearly_end_date1'),

            'quarterly_start_month' => $this->request->getVar('quarterly_start_month'),
            'quarterly_start_month_start_date' => $this->request->getVar('quarterly_start_month_start_date'),
            'quarterly_start_month_end_date' => $this->request->getVar('quarterly_start_month_end_date'),

            'quarterly_start_month1' => $this->request->getVar('quarterly_start_month1'),
            'quarterly_start_month_start_date1' => $this->request->getVar('quarterly_start_month_start_date1'),
            'quarterly_start_month_end_date1' => $this->request->getVar('quarterly_start_month_end_date1'),

            'quarterly_start_month2' => $this->request->getVar('quarterly_start_month2'),
            'quarterly_start_month_start_date2' => $this->request->getVar('quarterly_start_month_start_date2'),
            'quarterly_start_month_end_date2' => $this->request->getVar('quarterly_start_month_end_date2'),


            'quarterly_start_month3' => $this->request->getVar('quarterly_start_month3'),
            'quarterly_start_month_start_date3' => $this->request->getVar('quarterly_start_month_start_date3'),
            'quarterly_start_month_end_date3' => $this->request->getVar('quarterly_start_month_end_date3'),

            'yearly_start_date' => $this->request->getVar('yearly_start_date'),
            'yearly_end_date' => $this->request->getVar('yearly_end_date'),

            'monthly_start_date' => $this->request->getVar('monthly_start_number'),
            'monthly_end_date' => $this->request->getVar('monthly_end_number'),
            
        ];
        $db = \Config\Database::connect();

        if ( $this->request->getVar('id')) {
            $add_data = $db->table('tbl_po');
            $add_data->insert($data);

            $last_id =  $db->insertID();

            $services = $this->request->getVar('services');

            $description = $this->request->getVar('description');

            $quantity = $this->request->getVar('quantity');
            $price = $this->request->getVar('price');
        
            $period = $this->request->getVar('period');


            for($k=0 ; $k < count($services) ; $k++){
                $product_data = array(
                    'po_id' 	=> $last_id,
                    'services' 		=> $services[$k],
                    'description' 		=> $description[$k],
                    'quantity' 		=> $quantity[$k],
                    'price' 		=> $price[$k],
                    'period'  => $period[$k],
                    
                ); 
                // echo "<pre>";print_r($product_data);exit();
                $add_data = $db->table('tbl_services_details');
                $add_data->insert($product_data);
        
            }

            if($this->request->getVar('paymentTerms') == 'custom'){


            $custom_description = $this->request->getVar('custom_description');
            $custom_percentage = $this->request->getVar('custom_percentage');
        

            if (is_array($custom_description) && is_array($custom_percentage)) {
                for($k=0 ; $k < count($custom_description) ; $k++){
                $custom_data = array(
                    'po_id' 	=> $last_id,
                    'custom_description' 		=> $custom_description[$k],
                    'custom_percentage' 		=> $custom_percentage[$k],
                
                    
                ); 
                // echo "<pre>";print_r($product_data);exit();
                $add_data = $db->table('tbl_custom_data');
                $add_data->insert($custom_data);
        
                }
            }
        }
    
        session()->setFlashdata('success', 'PO added successfully.');
        } 

    return redirect()->to('po_list');
}


public function po_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);

    if (isset($id[1])) {
        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);
        $data['single_data'] = $model->get_single_data('tbl_po', $wherecond1);
        // print_r($data['single_data']);exit();

        $wherecond1 = array('is_deleted' => 'N', 'po_id' => $id[1]);
        $data['services'] = $model->getalldata('tbl_services_details', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N', 'po_id' => $id[1]);
        $data['custom_data'] = $model->getalldata('tbl_custom_data', $wherecond1);
    }

    $select = 'tbl_po.*, tbl_client.client_name';
    $joinCond = 'tbl_po.client_id = tbl_client.id';
    $wherecond = [
        'tbl_po.is_deleted' => 'N',
    ];
    $data['po_data'] = $model->jointwotables($select, 'tbl_po', 'tbl_client', $joinCond, $wherecond, 'DESC');

    // Get current date and date after 30 days
    $current_date = date('Y-m-d');
    $date_after_30_days = date('Y-m-d', strtotime('+30 days'));

    // Filter POs where end_date is given and between current date and 30 days from the current date
    $filtered_po_data = array_filter($data['po_data'], function($po) use ($current_date, $date_after_30_days) {
        // If end_date is given
        if ($po->end_date != '0000-00-00' && $po->end_date != null) {
            return $po->end_date >= $current_date && $po->end_date <= $date_after_30_days;
        }
        // If end_date is not given, assume it is one year from start_date
        $assumed_end_date = date('Y-m-d', strtotime($po->start_date . ' +1 year'));
        return $assumed_end_date >= $current_date && $assumed_end_date <= $date_after_30_days;
    });

    $data['po_data_filtered'] = array_values($filtered_po_data);

    // echo "<pre>";print_r($data['po_data_filtered']);exit();
    echo view('Admin/po_list', $data);
}else{
    return redirect()->to(base_url());

}
}




// Proforma
public function add_proforma()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    // $wherecond = array('is_deleted' => 'N');
    $data['currancy_data'] = $model->getalldata('tbl_currencies', $wherecond);

    
    // $wherecond = array('is_deleted' => 'N');
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);

    // $wherecond = array('is_deleted' => 'N');
    $data['tax_data'] = $model->getalldata('tbl_tax', $wherecond);


    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_proforma', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N', 'proforma_id' => $id[1]);


        $data['proformaiteam'] = $model->getalldata('tbl_proformaiteam', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N');


        $data['po_data'] = $model->getalldata('tbl_po', $wherecond1);

        
        echo view('Admin/add_proforma',$data);
    } else {
        // echo "<pre>";print_r($data['client_data']);exit();
        echo view('Admin/add_proforma',$data);


    } 

}
public function set_proforma()
{
        // echo "<pre>";print_r($_POST);exit();

    $data = [
        'proforma_date' => $this->request->getVar('proforma_date'),
        'client_id' => $this->request->getVar('client_id'),
        'currancy_id' => $this->request->getVar('currancy_id'),
        'tax_id' => $this->request->getVar('tax_id'),


        'po_no' => $this->request->getVar('po_no'),
        'suppplier_code' => $this->request->getVar('suppplier_code'),
        'due_date' => $this->request->getVar('due_date'),

        'totalamounttotal' => $this->request->getVar('totalamounttotal'),
        'cgst' => $this->request->getVar('cgst'),
        'sgst' => $this->request->getVar('sgst'),
        'igst' => $this->request->getVar('igst'),

        'final_total' => $this->request->getVar('final_total'),
        'totalamount_in_words' => $this->request->getVar('totalamount_in_words'),

    ];
    $db = \Config\Database::connect();

    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_proforma');
        $add_data->insert($data);

        $last_id =  $db->insertID();

        $iteam = $this->request->getVar('iteam');

        $description = $this->request->getVar('description');

        $quantity = $this->request->getVar('quantity');
        $price = $this->request->getVar('price');
    
        $total_amount = $this->request->getVar('total_amount');

        for($k=0;$k<count($iteam);$k++){
            $product_data = array(
                'proforma_id' 	=> $last_id,
                'iteam' 		=> $iteam[$k],
                'description' 		=> $description[$k],

                'quantity' 		=> $quantity[$k],
                'price' 		=> $price[$k],
                'total_amount'  => $total_amount[$k],
                
            ); 
            // echo "<pre>";print_r($product_data);exit();
            $add_data = $db->table('tbl_proformaiteam');
            $add_data->insert($product_data);
    
        }
        session()->setFlashdata('success', 'Invoice added successfully.');
    } else {
        $update_data = $db->table('tbl_proforma')->where('id', $this->request->getVar('id'));
        $update_data->update($data);

        $last_id =  $this->request->getVar('id');

        $delete = $db->table('tbl_proformaiteam')->where('proforma_id', $this->request->getVar('id'))->delete();

        $iteam = $this->request->getVar('iteam');
        $description = $this->request->getVar('description');

        $quantity = $this->request->getVar('quantity');
        $price = $this->request->getVar('price');
    
        $total_amount = $this->request->getVar('total_amount');

        for($k=0;$k<count($iteam);$k++){
            $product_data = array(
                'proforma_id' 	=> $last_id,
                'iteam' 		=> $iteam[$k],
                'description' 		=> $description[$k],

                'quantity' 		=> $quantity[$k],
                'price' 		=> $price[$k],
                'total_amount'  => $total_amount[$k],
                
            ); 
            $add_data = $db->table('tbl_proformaiteam');
            $add_data->insert($product_data);
    
        }
        session()->setFlashdata('success', 'Invoice updated successfully.');
            
    }

    return redirect()->to('proforma_list');
}


public function proforma_list()
{  
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){

    $model = new AdminModel();

    // $wherecond = array('is_deleted' => 'N');
    // $data['proforma_data'] = $model->getalldata('tbl_proforma', $wherecond);
    $id = $this->request->uri->getSegments(1);

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    
    $wherecond = array('is_deleted' => 'N');
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);


    $wherecond = array('is_deleted' => 'N');
    $data['currancy_data'] = $model->getalldata('tbl_currencies', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['tax_data'] = $model->getalldata('tbl_tax', $wherecond);


    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_proforma', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N', 'proforma_id' => $id[1]);


        $data['proformaiteam'] = $model->getalldata('tbl_proformaiteam', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N');


        $data['po_data'] = $model->getalldata('tbl_po', $wherecond1);

        
    }

    $select = 'tbl_proforma.*, tbl_client.client_name';
    $joinCond = 'tbl_proforma.client_id  = tbl_client.id ';
    $wherecond = [
        'tbl_proforma.is_deleted' => 'N',
    ];
    $data['proforma_data'] = $model->jointwotables($select, 'tbl_proforma ', 'tbl_client ',  $joinCond,  $wherecond, 'DESC');

    // echo "<pre>";print_r($data['proforma_data']);exit();
    echo view('Admin/proforma_list', $data);
}else{
    return redirect()->to(base_url());

}
}    

public function proforma()
{
    $model = new AdminModel();

    $idSegments = $this->request->uri->getSegments();
    $id = isset($idSegments[1]) ? $idSegments[1] : null;

    if ($id !== null) {
        // Prepare the select statement
        $select = 'tbl_proforma.*, tbl_proforma.id as proformaid, tbl_client.*, tbl_client.id as clientid, tbl_client.vendor_code, tbl_currencies.symbol as currency_symbol';
        $table1 = 'tbl_proforma';

        $table2 = 'tbl_client';
        $table3 = 'tbl_currencies';
        $joinCond1 = 'tbl_proforma.client_id = tbl_client.id';
        $joinCond2 = 'tbl_proforma.currancy_id = tbl_currencies.id';  // Assuming this is the correct join 
        // Prepare the where condition
        $wherecond = [
            'tbl_proforma.is_deleted' => 'N',
            'tbl_proforma.id' => $id
        ];
        
        // Fetch the data using a join
        $data['proforma_data'] = $model->joinThreeTablessingal($select, $table1, $table2, $table3, $joinCond1, $joinCond2, $wherecond);
       
       

        
        // Load the view with data
        echo view('Admin/proforma', $data);
    } else {
        // Load the view without data
        echo view('Admin/proforma');
    }

}
// Proforma End



// Debit Note

public function add_debitnote()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['currancy_data'] = $model->getalldata('tbl_currencies', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);


    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_debitnote', $wherecond1);

        $wherecond1 = array('is_deleted' => 'N', 'debitnote_id' => $id[1]);


        $data['iteam'] = $model->getalldata('tbl_debitnoteitem', $wherecond1);

        
        echo view('Admin/add_debitnote',$data);
    } else {
        // echo "<pre>";print_r($data['client_data']);exit();
        echo view('Admin/add_debitnote',$data);


    } 

}
public function set_debitnote()
{
        // echo "<pre>";print_r($_POST);exit();

    $data = [
        'debitnote_date' => $this->request->getVar('debitnote_date'),
        'client_id' => $this->request->getVar('client_id'),
        'currancy_id' => $this->request->getVar('currancy_id'),

        'po_no' => $this->request->getVar('po_no'),
        'suppplier_code' => $this->request->getVar('suppplier_code'),

        'totalamounttotal' => $this->request->getVar('final_total'),
       
        'totalamount_in_words' => $this->request->getVar('totalamount_in_words'),



        
    ];
    $db = \Config\Database::connect();

    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_debitnote');
        $add_data->insert($data);

        $last_id =  $db->insertID();

        $iteam = $this->request->getVar('iteam');
        $description = $this->request->getVar('description');

        $quantity = $this->request->getVar('quantity');
        $price = $this->request->getVar('price');
    
        $total_amount = $this->request->getVar('total_amount');

        for($k=0;$k<count($iteam);$k++){
            $product_data = array(
                'debitnote_id' 	=> $last_id,
                'iteam' 		=> $iteam[$k],
                'description' 		=> $description[$k],

                'quantity' 		=> $quantity[$k],
                'price' 		=> $price[$k],
                'total_amount'  => $total_amount[$k],
                
            ); 
            // echo "<pre>";print_r($product_data);exit();
            $add_data = $db->table('tbl_debitnoteitem');
            $add_data->insert($product_data);
    
        }
        session()->setFlashdata('success', 'Invoice added successfully.');
    } else {
        $update_data = $db->table('tbl_debitnote')->where('id', $this->request->getVar('id'));
        $update_data->update($data);

        $last_id =  $this->request->getVar('id');

        $delete = $db->table('tbl_debitnoteitem')->where('debitnote_id', $this->request->getVar('id'))->delete();

        $iteam = $this->request->getVar('iteam');
        $description = $this->request->getVar('description');

        $quantity = $this->request->getVar('quantity');
        $price = $this->request->getVar('price');
    
        $total_amount = $this->request->getVar('total_amount');

        for($k=0;$k<count($iteam);$k++){
            $product_data = array(
                'debitnote_id' 	=> $last_id,
                'iteam' 		=> $iteam[$k],
                'description' 		=> $description[$k],

                'quantity' 		=> $quantity[$k],
                'price' 		=> $price[$k],
                'total_amount'  => $total_amount[$k],
                
            ); 
            $add_data = $db->table('tbl_debitnoteitem');
            $add_data->insert($product_data);
    
        }
        session()->setFlashdata('success', 'Invoice updated successfully.');
            
    }

    return redirect()->to('debitnote_list');
}


public function debitnote_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $wherecond = array('is_deleted' => 'N');
    $data['client_data'] = $model->getalldata('tbl_client', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['currancy_data'] = $model->getalldata('tbl_currencies', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['services_data'] = $model->getalldata('tbl_services', $wherecond);

    $model = new AdminModel();
    $select = 'tbl_debitnote.*, tbl_client.client_name';
    $joinCond = 'tbl_debitnote.client_id  = tbl_client.id ';
    $wherecond = [
        'tbl_debitnote.is_deleted' => 'N',
    ];
    $data['debitnote_data'] = $model->jointwotables($select, 'tbl_debitnote ', 'tbl_client ',  $joinCond,  $wherecond, 'DESC');

    // echo "<pre>";print_r($data['debitnote_data']);exit();
    echo view('Admin/debitnote_list', $data);
}else{
    return redirect()->to(base_url());

}


}   

public function debitnote()
{
    $model = new AdminModel();

    $idSegments = $this->request->uri->getSegments();
    $id = isset($idSegments[1]) ? $idSegments[1] : null;

    if ($id !== null) {
        // Prepare the select statement
        $select = 'tbl_debitnote.*, tbl_debitnote.id as debitnoteid, tbl_client.*, tbl_client.id as clientid, tbl_currencies.symbol as currency_symbol';
        $table1 = 'tbl_debitnote';
        $table2 = 'tbl_client';
        $table3 = 'tbl_currencies';
        $joinCond1 = 'tbl_debitnote.client_id = tbl_client.id';
        $joinCond2 = 'tbl_debitnote.currancy_id = tbl_currencies.id';  // Assuming this is the correct join condition
        $wherecond = [
            'tbl_debitnote.is_deleted' => 'N',
            'tbl_debitnote.id' => $id
        ];
        // Prepare the where condition
      
        


        $data['debitnote_data'] = $model->joinThreeTablessingal($select, $table1, $table2, $table3, $joinCond1, $joinCond2, $wherecond);

      
        echo view('Admin/debitnote', $data);
    } else {
        // Load the view without data
        echo view('Admin/debitnote');
    }


    

}
// Debit Note

public function add_memo(){
    $model = new AdminModel();
    $wherecond = [
        'is_deleted' => 'N',
        'role'=>'Employee'
    ];
    $data['emp_data'] = $model->getalldata('employee_tbl', $wherecond);
    $memo_id_segments = $this->request->uri->getSegments();
    // print_r($user_id_segments);die;
    $memo_id = !empty($memo_id_segments[1]) ? $memo_id_segments[1] : null;
    $wherecond1 = [];
    if ($memo_id !== null) {
        $wherecond1 = array('is_deleted' => 'N', 'id' => $memo_id);
        $data['single_data'] = $model->get_single_data('tbl_memo', $wherecond1);
    }
    // echo '<pre>'; print_r($data);die;
    echo view('Admin/add_memo',$data);

}
public function set_memo()
{
    // print_r($_POST);die;
    
    $data = [
        'emp_id' => $this->request->getVar('emp_name'),
        'today_date' => $this->request->getVar('current_date'),
        'memo_start_date' => $this->request->getVar('memo_start_date'),
        'memo_end_date' => $this->request->getVar('memo_end_date'),
        'memo_subject' => $this->request->getVar('memo_subject'),
        'admin_name' => $this->request->getVar('admin_name'),

    ];
    // print_r($data);die;

    $db = \Config\Database::connect();
   
    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_memo');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Memo added successfully.');
    } else {
        $update_data = $db->table('tbl_memo')->where('id', $this->request->getVar('id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Memo updated successfully.');

    }

    return redirect()->to('memo_list');
}
public function memo_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    $model = new AdminModel();

    $wherecond = [
        'is_deleted' => 'N',
        'role'=>'Employee'
    ];
    $data['emp_data'] = $model->getalldata('employee_tbl', $wherecond);
    $memo_id_segments = $this->request->uri->getSegments();
    // print_r($user_id_segments);die;
    $memo_id = !empty($memo_id_segments[1]) ? $memo_id_segments[1] : null;
    $wherecond1 = [];
    if ($memo_id !== null) {
        $wherecond1 = array('is_deleted' => 'N', 'id' => $memo_id);
        $data['single_data'] = $model->get_single_data('tbl_memo', $wherecond1);
    }

    $wherecond = array('is_deleted' => 'N');

    // Fetch attendance data
    $select = ' tbl_memo.*, employee_tbl.emp_name';
    $joinCond = 'tbl_memo.emp_id  = employee_tbl.Emp_id';
    $wherecond = [
        'tbl_memo.is_deleted' => 'N',
    ];
    $data['memo_data'] = $model->jointwotables($select, 'tbl_memo', 'employee_tbl',  $joinCond,  $wherecond, 'DESC');
   
        // echo "<pre>";print_r($data['memo_data']);exit();
    echo view('Admin/memo_list', $data);
}else{
    return redirect()->to(base_url());

}

    } 
    public function get_po_details(){
        $model = new Adminmodel();
        $client_id = $this->request->getVar('client_id');
        $model->get_po_details($client_id);
    }

    public function add_currency(){
        $model = new AdminModel();
        $db = \Config\Database::Connect();
       
     
        $currency_id_segments = $this->request->uri->getSegments();
        // print_r($currency_id_segments);die;
        $currency_id = !empty($currency_id_segments[1]) ? $currency_id_segments[1] : null;
        $wherecond1 = [];
        if ($currency_id !== null) {
            $wherecond1 = array('is_deleted' => 'N', 'id' => $currency_id);
            $data['single_data'] = $model->get_single_data('tbl_currencies', $wherecond1);

        }
        // echo '<pre>'; print_r($data);die;
        echo view('Admin/add_currency',$data);
    }

    public function currency_list(){
        $session = session();
        $sessionData = $session->get('sessiondata');

        if(!empty($sessionData)){
        $model = new AdminModel();
        $data = [];
        $wherecond = array('is_deleted' => 'N');
        $data['currency_data'] = $model->getalldata('tbl_currencies', $wherecond);
        // print_r($data);die;

        // $id = $this->request->uri->getSegment(2);
        $currency_id_segments = $this->request->uri->getSegments();
        // print_r($user_id_segments);die;
        $currency_id = !empty($currency_id_segments[1]) ? $currency_id_segments[1] : null;
        $wherecond1 = [];
        if ($currency_id !== null) {
            // print_r($currency_id);die;
            $wherecond1 = array('is_deleted' => 'N', 'id' => $currency_id);
            $data['single_data'] = $model->get_single_data('tbl_currencies', $wherecond1);
            echo view('Admin/currency_list',$data);
        }
        
        
      
        $result = session();
        // $session_id = $result->get('id');
        // $id = $this->request->uri->getSegments(2);
      
        // if(isset($currency_id)) {
        //     // print_r($id);die;
        //     $wherecond1 = array('is_deleted' => 'N', 'id' => $currency_id);
    
        //     $data['single_data'] = $model->get_single_data('tbl_currencies', $wherecond1);
        //     echo view('Admin/currency_list',$data);
        // }
        
       return view('Admin/currency_list',$data);
        // echo view('Admin/currency_list');

    }else{
        return redirect()->to(base_url());

    }

    }

    public function set_currency(){

        // print_r($_POST);die;
        $model = new Adminmodel();
        $id = $this->request->getVar('id');
        $data = [
            'currency_code' => $this->request->getVar('currency_code'),
            'currency_name' => $this->request->getVar('currency_name'),
            'symbol' => $this->request->getVar('symbol'),
            'exchange_rate' => $this->request->getVar('exchange_rate'),
        ];
    // print_r($data);die;
        $db = \Config\Database::Connect();
        if ($this->request->getVar('id') == "") {
            $add_data = $db->table('tbl_currencies');
            $add_data->insert($data);
            session()->setFlashdata('success', 'Currency added successfully.');
        } else {
            $update_data = $db->table('tbl_currencies')->where('id', $id);
            $update_data->update($data);
            session()->setFlashdata('success', 'Currency updated successfully.');
        }
        return redirect()->to('currency_list');
    }


    public function chatuser()
    {
        $session = \Config\Services::session();

        // Retrieve session data for 'sessiondata'
        $sessionData = $session->get('sessiondata');

        // Check if 'sessiondata' is set and has 'role'
        if (!empty($sessionData) && isset($sessionData['role'])) {
            $role = $sessionData['role'];
            $emp_id = $sessionData['Emp_id'];

            $model = new AdminModel();
            $result['getuser'] = [];

            if ($role == 'Admin') {
                // Admin specific logic
                $chatCountWhere = [
                    'receiver_id' => $emp_id,
                    'status' => 'N'
                ];
                $result['chat_count'] = $model->getalldata('online_chat', $chatCountWhere);

                $wherecondStudent = ['is_deleted' => 'N'];
                $result['getuser'] = $model->getalldata('employee_tbl', $wherecondStudent);

            } elseif ($role == 'Employee') {
                // Employee specific logic
                $chatCountWhere = [
                    'receiver_id' => $emp_id,
                    'status' => 'N'
                ];
                $result['chat_count'] = $model->getalldata('online_chat', $chatCountWhere);

                $wherecondStudent = ['is_deleted' => 'N'];
                $result['getuser'] = $model->getalldata('employee_tbl', $wherecondStudent); 
            } 

            // Pass emp_id to the view for comparison
            $result['emp_id'] = $emp_id;


            // Load the view with result data
            echo view('chatuser', $result);
        } else {
            // Redirect to base URL if no session data is set
            return redirect()->to(base_url());
        }
    }


    // public function chatuser()
    // {
    //     $session = \Config\Services::session();
    
    //     // Retrieve session data for 'sessiondata'
    //     $sessionData = $session->get('sessiondata');
    
    //     // Check if 'sessiondata' is set and has 'role'
    //     if (!empty($sessionData) && isset($sessionData['role'])) {
    //         $role = $sessionData['role'];
    //         $emp_id = $sessionData['Emp_id'];
    
    //         $model = new AdminModel();
    //         $result['getuser'] = [];
    
    //         if ($role == 'Admin' || $role == 'Employee') {
    //             // Logic for both Admin and Employee
    //             $chatCountWhere = [
    //                 'receiver_id' => $emp_id,
    //                 'status' => 'N'
    //             ];
    //             $result['chat_count'] = $model->getalldata('online_chat', $chatCountWhere);
    
    //             // Get all users sorted by the latest chat timestamp
    //             $result['getuser'] = $model->getAllUsersSortedByLatestChat();
    //         }
    
    //         // Pass emp_id to the view for comparison
    //         $result['emp_id'] = $emp_id;
    
    //         // Load the view with result data
    //         echo view('chatuser', $result);
    //     } else {
    //         // Redirect to base URL if no session data is set
    //         return redirect()->to(base_url());
    //     }
    // }
    
    


    public function search()
{
    $searchKeyword = $this->request->getPost('searchKeyword');

    // echo  $searchKeyword;


    $session = \Config\Services::session();

    // Retrieve session data for 'sessiondata'
    $sessionData = $session->get('sessiondata');

    // echo "<pre>";print_r($sessionData);exit();

    // Check if 'sessiondata' is set and has 'role'
    if (!empty($sessionData) && isset($sessionData['role'])) {
        $role = $sessionData['role'];
        
        $model = new AdminModel();
        $result['getuser'] = [];

        if ($role == 'Admin') {
            $chatCountWhere = array(
                'receiver_id' => $sessionData['Emp_id'],
                'status' => 'N'
            );
            $result['chat_count'] = $model->getalldata('online_chat', $chatCountWhere);

            $wherecondFaculty = array('is_deleted' => 'N', 'emp_name LIKE' => $searchKeyword . '%',);
            $result['getuser'] = $model->getalldata('employee_tbl', $wherecondFaculty);



            // For Student
          
        } else if ($sessionData['role'] == 'Employee') {
            $chatCountWhere = array(
                'receiver_id' => $sessionData['Emp_id'],
                'status' => 'N'
            );
            $result['chat_count'] = $model->getalldata('online_chat', $chatCountWhere);


            $wherecondFaculty = array('is_deleted' => 'N',  'emp_name LIKE' => $searchKeyword . '%',);
            $result['getuser'] = $model->getalldata('employee_tbl', $wherecondFaculty);

        } 

        echo view('chatuser', $result);
    } else {
        return redirect()->to(base_url());
    }


}

public function singlechat()
{
    $session = \Config\Services::session();

    // Retrieve session data for 'sessiondata'
    $sessionData = $session->get('sessiondata');

    // echo "<pre>";print_r($sessionData);exit();

    // Check if 'sessiondata' is set and has 'role'
    if (!empty($sessionData)) {

    // if (isset($_SESSION['sessiondata'])) {
        $model = new AdminModel();
        $receiverid = $this->request->uri->getSegments(1);
        // echo '<pre>';
        // print_r($receiverid);
        // die;
        if ($sessionData['role'] == 'Admin') {
            $wherecond = array('is_deleted' => 'N');
            $result['getuser'] = $model->getalldata('employee_tbl', $wherecond);
        } else if ($sessionData['role'] == 'Admin') {
            $wherecond = array('is_deleted' => 'N');
            $result['getuser'] = $model->getalldata('employee_tbl', $wherecond);
        } 
        $wherecond2 = array('sender_id' =>$sessionData['Emp_id'], 'receiver_id' => $receiverid[1]);
        $wherecond3 = array('sender_id' => $receiverid[1], 'receiver_id' => $sessionData['Emp_id']);
        $result['chatdata'] = $model->getchat('online_chat', $sessionData['Emp_id'], $receiverid[1]);

        $wherecond4 = ['Emp_id' => $receiverid[1]];
        $result['chat_user_data'] = $model->get_single_data('employee_tbl', $wherecond4);
        $result['receiverids'] =  ['receiverid' => $receiverid[1]];

        // echo "<pre>";print_r($result['chatdata']);exit();


        echo view('chatuser', $result);
    } else {
        return redirect()->to(base_url());
    }
}



// public function insertChat()
// {
   
//     $formdata = $_POST;
//     $wherecond = array('Emp_id' => $formdata['sender_id']);

//     $model = new Adminmodel();
//     $senderData = $model->getalldata('employee_tbl', $wherecond);
//     // print_r($senderData[0]->full_name);
//     // die;
//     $result = $model->insert_formdata('msg_id', 'online_chat', $formdata);
//     // print_r($result);
//     // die;
//     echo json_encode($result);

// }

public function insertChat()
{
    $formdata = $_POST;
        $wherecond = array('Emp_id' => $formdata['sender_id']);

    $model = new AdminModel();
    $senderData = $model->getalldata('employee_tbl', $wherecond);

    // Handle file upload
    $attachmentPath = '';
    if ($this->request->getFile('attachment')->isValid()) {
        $file = $this->request->getFile('attachment');
        $newName = $file->getRandomName();
        $file->move('public/uploads/attachment/', $newName);
        $attachmentPath = 'public/uploads/attachment/' . $newName;
        $formdata['attachment'] = $attachmentPath; // Add attachment path to form data
    }

    $result = $model->insert_formdata('msg_id', 'online_chat', $formdata);

    echo json_encode($result);
}





public function getChatCount()
{
    $model = new AdminModel();
    $count_data = 0;

    $session = \Config\Services::session();

    // Retrieve session data for 'sessiondata'
    $sessionData = $session->get('sessiondata');

    // echo "<pre>";print_r($sessionData);exit();

    // Check if 'sessiondata' is set and has 'role'
    if ((!empty($sessionData)) && $sessionData['role'] == 'Admin') {

        $chatCountWhere = array(
            'receiver_id' => $sessionData['Emp_id'],
            'status' => 'N'
        );
        $chat_count = $model->getalldata('online_chat', $chatCountWhere);
        if(!empty($chat_count)){
        $count_data = count($chat_count);
        }

        // Manually create and return a JSON response
        return $this->response->setJSON(['chat_count' => $count_data]);
    } else if (isset($sessionData['role']) && $sessionData['role'] == 'Employee') {
        $chatCountWhere = array(
            'receiver_id' => $sessionData['Emp_id'],
            'status' => 'N'
        );
        $chat_count = $model->getalldata('online_chat', $chatCountWhere);
        if(!empty($chat_count)){
         $count_data = count($chat_count);
        }
         return $this->response->setJSON(['chat_count' => $count_data]);

    } else {
        // Return an error message if the user is not authorized
        return $this->response->setStatusCode(403)->setJSON(['error' => 'Unauthorized access']);
    }
}


public function getnotificationchatCount(){

    $model = new AdminModel();
    $count_data = 0;


    $session = \Config\Services::session();

    // Retrieve session data for 'sessiondata'
    $sessionData = $session->get('sessiondata');

    // echo "<pre>";print_r($sessionData);exit();

    // Check if 'sessiondata' is set and has 'role'
    if ((!empty($sessionData)) && $sessionData['role'] == 'Admin') {
        $chatCountWhere = array(
            'receiver_id' => $sessionData['Emp_id'],
            'status' => 'N'
        );
        $chat_count = $model->getalldata('online_chat', $chatCountWhere);
        // $data = $model->getRecordsBefore7Days();

        // $notification_count = $data['totalCount'];

        // if(!empty($chat_count)){
        // $count_data = count($chat_count);
        // }

        $totalcount = $count_data;

        // Manually create and return a JSON response
        return $this->response->setJSON(['notificationchat_count' => $totalcount]);
    } else if ((!empty($sessionData)) && $sessionData['role'] == 'Employee') {
        $chatCountWhere = array(
            'receiver_id' => $sessionData['Emp_id'],
            'status' => 'N'
        );
       
        $chat_count = $model->getalldata('online_chat', $chatCountWhere);
       
        if(!empty($chat_count)){
         $count_data = count($chat_count);
        }
         return $this->response->setJSON(['notificationchat_count' => $count_data]);

    } else {
        // Return an error message if the user is not authorized
        return $this->response->setStatusCode(403)->setJSON(['error' => 'Unauthorized access']);
    }

}

public function update_seen_status()
{
    $id = $this->request->getVar('id');

    $data = [
        'status' => 'Y',
    ];

    $db = \Config\Database::Connect();
    if ($this->request->getVar('id') != "") {
        $update_data = $db->table('online_chat')->where('sender_id', $this->request->getVar('id'));
        $update_data->update($data);
        // session()->setFlashdata('success', 'Data updated successfully.');
    }
    return redirect()->to('chatuser/' . $id);
}

public function generateMonthlyAttendanceReport()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
    // Load your model
    $adminModel = new AdminModel();

    // Get the first and last day of the current month
    $firstDayOfMonth = date('Y-m-01');
    $lastDayOfMonth = date('Y-m-t');

    // Fetch all employees
    $wherecond = array('is_deleted' => 'N', 'role' => 'Employee');
    $allEmployees = $adminModel->getalldata('employee_tbl', $wherecond);

    // Fetch employees with attendance for the current month
    $attendanceEmployees = $adminModel->getMonthlyAttendanceData('tbl_employeetiming', $firstDayOfMonth, $lastDayOfMonth);

    // Convert the attendance list to a structured array
    $attendanceData = [];
    foreach ($attendanceEmployees as $record) {
        $date = date('Y-m-d', strtotime($record->start_time));
        if (!isset($attendanceData[$date])) {
            $attendanceData[$date] = [];
        }
        $attendanceData[$date][] = $record->emp_id;
    }

    // Prepare the report data
    $report = [
        'allEmployees' => $allEmployees,
        'attendanceData' => $attendanceData,
        'firstDayOfMonth' => $firstDayOfMonth,
        'lastDayOfMonth' => $lastDayOfMonth
    ];

    // Pass the report data to the view (assuming you have a view file for the report)
    return view('Admin/monthly_attendance_report', ['report' => $report]);
}else{
    return redirect()->to(base_url());

}
}

// public function generateDailyTaskReport()
// {
//     // Load your model
//     $adminModel = new AdminModel();
    
//     // Fetch search parameters
//     $date = $this->request->getGet('date') ?: date('Y-m-d');
//     $name = $this->request->getGet('name');
    
//     // Select fields and join condition
//     $select = 'tbl_daily_work.*, employee_tbl.emp_name';
//     $joinCond = 'tbl_daily_work.Emp_id = employee_tbl.Emp_id';
    
//     // Base where condition
//     $wherecond = [
//         'tbl_daily_work.is_deleted' => 'N',
//         'employee_tbl.is_deleted' => 'N'
//     ];
    
//     // Add search conditions
//     if (!empty($name)) {
//         $wherecond['employee_tbl.emp_name LIKE'] = '%' . $name . '%';
//     }
//     if (!empty($date)) {
//         $wherecond['DATE(tbl_daily_work.created_at)'] = $date;
//     }
    
//     // Fetch Daily Task with search filters
//     $data['DailyTaskReport'] = $adminModel->jointwotables($select, 'tbl_daily_work', 'employee_tbl', $joinCond, $wherecond, 'LEFT');
 
//     // echo'<pre>';print_r($data);die;
//     return view('Admin/daily_task_report', $data);
// }

public function generateDailyTaskReport()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
       // Load your model
    $adminModel = new AdminModel();
    $wherecond = array('is_deleted' => 'N');
    $data['employeeData'] = $adminModel->getalldata('employee_tbl', $wherecond); 
    // echo'<pre>';print_r($data);die;     
    return view('Admin/daily_task_report',$data);
}else{
    return redirect()->to(base_url());

}
}

public function searchDailyTaskReport()
{
    // Load your model
    $adminModel = new AdminModel();
    
    // Fetch search parameters
    $date = $this->request->getPost('date');
    $empId = $this->request->getPost('name');  // Renamed for clarity
    // print_r($name);die;
    
    // Select fields and join condition
    $select = 'tbl_daily_work.*, employee_tbl.emp_name,tbl_project.projectName';
    $joinCond1 = 'tbl_daily_work.Emp_id = employee_tbl.Emp_id';
    $joinCond2 = 'tbl_daily_work.project_name = tbl_project.p_id' ;
    
    // Base where condition
    $wherecond = [
        'tbl_daily_work.is_deleted' => 'N',
        'employee_tbl.is_deleted' => 'N',
        'tbl_project.is_deleted' => 'N'
    ];
    
   // Add search conditions
   if (!empty($empId)) {
    $wherecond['tbl_daily_work.Emp_id'] = $empId;
}
    if (!empty($date)) {
        $wherecond['DATE(tbl_daily_work.task_date)'] = $date;
    }
    
    // Fetch Daily Task with search filters
    $data['DailyTaskReport'] = $adminModel->jointhreetables($select, 'tbl_daily_work', 'employee_tbl','tbl_project', $joinCond1,$joinCond2, $wherecond, 'LEFT');

    // print_r($data);die;
    // Return the result as JSON
    return $this->response->setJSON($data['DailyTaskReport']);
}


public function getallmonthdata()
{
    // Fetch selected month and year from POST data
    $selectedMonth = $_POST['month'] ?? date('n'); // Default to current month if not set
    $selectedYear = $_POST['year'] ?? date('Y'); // Default to current year if not set

    // Load your model
    $adminModel = new AdminModel();

    // Get the first and last day of the selected month and year
    $firstDayOfMonth = date('Y-m-01', strtotime("$selectedYear-$selectedMonth-01"));
    $lastDayOfMonth = date('Y-m-t', strtotime("$selectedYear-$selectedMonth-01"));

    // Fetch all employees
    $wherecond = array('is_deleted' => 'N', 'role' => 'Employee');
    $allEmployees = $adminModel->getalldata('employee_tbl', $wherecond);

    // Fetch employees with attendance for the selected month and year
    $attendanceEmployees = $adminModel->getMonthlyAttendanceData('tbl_employeetiming', $firstDayOfMonth, $lastDayOfMonth);

    // Convert the attendance list to a structured array
    $attendanceData = [];
    foreach ($attendanceEmployees as $record) {
        $date = date('Y-m-d', strtotime($record->start_time));
        if (!isset($attendanceData[$date])) {
            $attendanceData[$date] = [];
        }
        $attendanceData[$date][] = $record->emp_id;
    }

    // Prepare the report data
    $report = [
        'allEmployees' => $allEmployees,
        'attendanceData' => $attendanceData,
        'firstDayOfMonth' => $firstDayOfMonth,
        'lastDayOfMonth' => $lastDayOfMonth
    ];

    // Pass the selected month, year, and report data to the view
    return view('Admin/monthly_attendance_report', [
        'selectedMonth' => $selectedMonth,
        'selectedYear' => $selectedYear,
        'report' => $report
    ]);
}

public function get_attendance_list()
{
    $adminModel = new AdminModel();

    $searchDate = $this->request->getGet('searchDate');
    if (!$searchDate) {
        $searchDate = date('Y-m-d');
    }

    $select = 'tbl_employeetiming.*, employee_tbl.*';
    $joinCond = 'tbl_employeetiming.emp_id = employee_tbl.Emp_id';
    $wherecond = [
        'tbl_employeetiming.is_deleted' => 'N',
        'DATE(tbl_employeetiming.start_time)' => $searchDate
    ];

    $data['attendance_list'] = $adminModel->jointwotables($select, 'tbl_employeetiming', 'employee_tbl', $joinCond, $wherecond, 'DESC');

    // Load the table view with the filtered data
    // echo'<pre>';print_r($data);die;
    echo view('Admin/attendance_table', $data);
}

public function get_dailyTask_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');
    $Emp_id = $sessionData['Emp_id'];

    $model = new Adminmodel();

    // Get the search date from the request, default to today
    $searchDate = $this->request->getGet('searchDate') ?: date('Y-m-d');

    $wherecond = array('Emp_id' => $Emp_id);
    // $DailyWorkData = $model->getalldata('tbl_daily_work', $wherecond, ['task_date' => $searchDate]);

    $select = 'tbl_daily_work.*, tbl_project.projectName';
    $joinCond = 'tbl_daily_work.project_name  = tbl_project.p_id ';
    $wherecond = [
            'tbl_daily_work.is_deleted' => 'N',
            'tbl_project.is_deleted' => 'N',
            'task_date' => $searchDate,
            'Emp_id' => $Emp_id
    ];

    $DailyWorkData = $model->jointwotables($select, 'tbl_daily_work', 'tbl_project',  $joinCond,  $wherecond, 'left');
    
// echo'<pre>';print_r($DailyWorkData);die;
    return view('Employee/daily_task_table', ['DailyWorkData' => $DailyWorkData]);
}





public function get_absent_list()
{
    $adminModel = new AdminModel();

    $searchDate = $this->request->getGet('absentSearchDate');
    if (!$searchDate) {
        $searchDate = date('Y-m-d');
    }

    // Fetch all employees from employee_tbl where is_deleted = 'N' and role = 'Employee'
    $wherecond = array('is_deleted' => 'N', 'role' => 'Employee');
    $allEmployees = $adminModel->getalldata('employee_tbl', $wherecond);

    // Check if $allEmployees is a valid array
    if ($allEmployees === false) {
        echo "Error fetching all employees.";
        return;
    }

    // Fetch employees with attendance for the specified date from tbl_employeetiming
    $wherecond = array('is_deleted' => 'N');
    $attendanceEmployees = $adminModel->db->table('tbl_employeetiming')
        ->where($wherecond)
        ->where('DATE(start_time)', $searchDate)
        ->get()
        ->getResult(); // getResult() returns an array of objects

    // Check if $attendanceEmployees is a valid array
    if ($attendanceEmployees === false) {
        echo "Error fetching attendance employees.";
        return;
    }

    // Convert the attendance list to an array of IDs
    $attendanceEmpIds = array_map(function($item) {
        return $item->emp_id; // Accessing object property
    }, $attendanceEmployees);

    // Get absent employees by filtering out the ones in attendanceEmpIds
    $absentEmployees = array_filter($allEmployees, function($employee) use ($attendanceEmpIds) {
        return !in_array($employee->Emp_id, $attendanceEmpIds); // Accessing object property
    });

    // Use $absentEmployees to display in the absent list
    $data['absent_list'] = $absentEmployees;

    // Load the view with the absent list data
    return view('Admin/absent_table', $data);
}

public function search_data(){
    $model = new Adminmodel();

    $wherecond = array('is_deleted' => 'N');

// Fetch projects from the database


    $wherecond = array('is_deleted' => 'N');
    $data['task_data'] = $model->getalldata('tbl_taskdetails', $wherecond);

    $data['project_data'] = $model->get_single_data('tbl_project', $wherecond);
    $wherecond = array('is_deleted' => 'N');
    $data['projectData'] = $model->getalldata('tbl_project', $wherecond);
    $data['mainTaskData'] = $model->getalldata('tbl_maintaskmaster', $wherecond);
    $wherecond = array('is_deleted' => 'N');

    // echo "<pre>";print_r($_POST);
    $wherecond = array('is_deleted' => 'N', 'project_id' => $this->request->getVar('Projectname'));
    $data['taskDetails']= $model->getalldata('tbl_taskdetails', $wherecond);
    // echo "<pre>";print_r($data['taskDetails']);exit();

    echo view('Admin/taskList',$data);

}



public function add_dailyblog()
{
    $model = new AdminModel();

    $id = $this->request->uri->getSegments(1);
    if(isset($id[1])) {

        $wherecond1 = array('is_deleted' => 'N', 'id' => $id[1]);

        $data['single_data'] = $model->get_single_data('tbl_dailyblog', $wherecond1);
        echo view('Admin/add_dailyblog',$data);
    } else {
        echo view('Admin/add_dailyblog');
    } 

}



public function set_dailyblog()
{
    $data = [
        'dailyblog_name' => $this->request->getVar('dailyblog_name'),
        'description' => $this->request->getVar('description'),
        'link' => $this->request->getVar('link'),
    ];

    $photo = $this->request->getFile('photo');
    if ($photo && $photo->isValid() && !$photo->hasMoved()) {
        $newName = $photo->getRandomName();
        $photo->move(ROOTPATH . 'public/uploades/photo', $newName);
        $data['photo'] = $newName; // Save the new file name in the database
    } else {
        // Handle the error if the file is not valid or has already moved
        session()->setFlashdata('error', 'There was a problem uploading the file.');
        return redirect()->back()->withInput();
    }

    $db = \Config\Database::connect();

    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_dailyblog');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Daily Blog added successfully.');
    } else {
        $update_data = $db->table('tbl_dailyblog')->where('id', $this->request->getVar('id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Daily Blog updated successfully.');
    }

    return redirect()->to('dailyblog_list');
}


public function dailyblog_list()
{
    $session = session();
    $sessionData = $session->get('sessiondata');

    if(!empty($sessionData)){
$model = new AdminModel();

$wherecond = array('is_deleted' => 'N');

$data['dailyblog_data'] = $model->getalldata('tbl_dailyblog', $wherecond);
// echo "<pre>";print_r($data['dailyblog_data']);exit();
echo view('Admin/dailyblog_list', $data);
}else{
    return redirect()->to(base_url());

}


}  

public function likeNotification()
{
    $session = \Config\Services::session();
    $db = \Config\Database::connect();
    $model = new Adminmodel();
    // print_r($_POST);die;
    // Retrieve session data for 'sessiondata'
    $sessionData = $session->get('sessiondata');

    // Retrieve the notification ID from the POST request
    $notificationId = $this->request->getPost('id');

    // Check if 'notificationId' is missing
    if (!$notificationId) {
        return $this->response->setJSON(['error' => 'Notification ID is missing']);
    }

    // Check if 'sessiondata' is set
    if (!empty($sessionData)) {
        $employeeId = $sessionData['Emp_id'];

        // Check if the user has already liked this notification
        $likeExists = $db->table('tbl_notification_like')
                         ->where('notification_id', $notificationId)
                         ->where('employee_id', $employeeId)
                         ->countAllResults();

        if ($likeExists > 0) {
            return $this->response->setJSON(['error' => 'You have already liked this notification']);
        }

        // Fetch the current like count
        $notification = $db->table('tbl_notification')
                           ->where('id', $notificationId)
                           ->get()
                           ->getRowArray();

        if ($notification) {
            $newLikeCount = $notification['like_count'] + 1;

            // Update like count
            $db->table('tbl_notification')
               ->where('id', $notificationId)
               ->update(['like_count' => $newLikeCount]);

            // Insert the like record
            $data = [
                'employee_id' => $employeeId,
                'notification_id' => $notificationId,
                'is_deleted' => 'N'
            ];
            $db->table('tbl_notification_like')->insert($data);

            // Return the new like count as JSON
            return $this->response->setJSON(['newLikeCount' => $newLikeCount]);
        } else {
            return $this->response->setJSON(['error' => 'Notification not found']);
        }
    } else {
        return $this->response->setJSON(['error' => 'User not logged in']);
    }
}

public function thumbNotification()
{
    $session = \Config\Services::session();
    $db = \Config\Database::connect();
    $model = new Adminmodel();

    // Retrieve session data for 'sessiondata'
    $sessionData = $session->get('sessiondata');

    // Retrieve the notification ID from the POST request
    $notificationId = $this->request->getPost('id');

    // Check if 'notificationId' is missing
    if (!$notificationId) {
        return $this->response->setJSON(['error' => 'Notification ID is missing']);
    }

    // Check if 'sessiondata' is set
    if (!empty($sessionData)) {
        $employeeId = $sessionData['Emp_id'];

        // Check if the user has already given a thumbs-up to this notification
        $thumbExists = $db->table('tbl_notification_thumb')
                          ->where('notification_id', $notificationId)
                          ->where('employee_id', $employeeId)
                          ->countAllResults();

        if ($thumbExists > 0) {
            return $this->response->setJSON(['error' => 'You have already given a thumbs-up to this notification']);
        }

        // Fetch the current thumb count
        $notification = $db->table('tbl_notification')
                           ->where('id', $notificationId)
                           ->get()
                           ->getRowArray();

        if ($notification) {
            $newThumbCount = $notification['thumb_count'] + 1;

            // Update thumb count
            $db->table('tbl_notification')
               ->where('id', $notificationId)
               ->update(['thumb_count' => $newThumbCount]);

            // Insert the thumb record
            $data = [
                'employee_id' => $employeeId,
                'notification_id' => $notificationId,
                'is_deleted' => 'N'
            ];
            $db->table('tbl_notification_thumb')->insert($data);

            // Return the new thumb count as JSON
            return $this->response->setJSON(['newThumbCount' => $newThumbCount]);
        } else {
            return $this->response->setJSON(['error' => 'Notification not found']);
        }
    } else {
        return $this->response->setJSON(['error' => 'User not logged in']);
    }
}


public function emp_list_data()
{
    $model = new AdminModel();
    $wherecond = array('is_deleted' => 'N' , 'role' => 'Employee');
    $data['emp_data'] = $model->getalldata('employee_tbl', $wherecond);

    $result = session();
    // $session_id = $result->get('id');
    $model = new Adminmodel();
    // $data['session_id'] = $session_id;
    $wherecond = array('is_deleted' => 'N');
    $data['DepartmentData']= $model->getalldata('tbl_department', $wherecond);
    $wherecond = array('is_deleted' => 'N');
    $data['menu_data'] = $model->getalldata('tbl_menu', $wherecond);
    
    $model = new Adminmodel();
    $user_id_segments = $this->request->uri->getSegments();
    // print_r($user_id_segments);die;
    $user_id = !empty($user_id_segments[1]) ? $user_id_segments[1] : null;
    $wherecond1 = [];
    if ($user_id !== null) {
        $wherecond1 = array('is_deleted' => 'N', 'Emp_id' => $user_id);
        $data['single_data'] = $model->get_single_data('employee_tbl', $wherecond1);
    }

    // echo "<pre>";print_r($data['emp_data']);exit();
    echo view('emp_list_data', $data);

}
public function get_employee_details($emp_id)
{
    $model = new \App\Models\AdminModel();

    $select = 'employee_tbl.*, tbl_department.DepartmentName';
    $joinCond = 'employee_tbl.emp_department = tbl_department.id';
    $wherecond = [
        'employee_tbl.is_deleted' => 'N',
        'employee_tbl.role' => 'Employee',
        'employee_tbl.Emp_id' => $emp_id
    ];
    $employee = $model->jointwotables($select, 'employee_tbl', 'tbl_department', $joinCond, $wherecond, 'DESC');

    if ($employee) {
        echo json_encode($employee[0]);
    } else {
        echo json_encode(['error' => 'Employee details not found.']);
    }
}

public function get_employee_attachments($emp_id)
{
    $model = new \App\Models\AdminModel();

    $wherecond = [
        'employee_tbl.is_deleted' => 'N',
        'employee_tbl.role' => 'Employee',
        'employee_tbl.Emp_id' => $emp_id
    ];
    $employee = $model->getsinglerow('employee_tbl', $wherecond);

    if ($employee) {
        $attachments = [
            ['file_name' => 'Photo', 'file_path' => !empty($employee->PhotoFile) ? 'photos/' . $employee->PhotoFile : null],
            ['file_name' => 'Resume', 'file_path' => !empty($employee->ResumeFile) ? 'resumes/' . $employee->ResumeFile : null],
            ['file_name' => 'PAN', 'file_path' => !empty($employee->PANFile) ? 'pan/' . $employee->PANFile : null],
            ['file_name' => 'Aadhar', 'file_path' => !empty($employee->AadharFile) ? 'aadhar/' . $employee->AadharFile : null]
        ];

        echo json_encode(array_filter($attachments, fn($attachment) => !is_null($attachment['file_path'])));
    } else {
        echo json_encode([]);
    }
}


















}


