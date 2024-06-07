<?php

namespace App\Models;

use CodeIgniter\Model;

class Adminmodel extends Model
{
    protected $table = 'employee_tbl';
    protected $primaryKey = 'Emp_id';
    protected $allowedFields = ['emp_email', 'password','emp_joiningdate','role','mobile_no','WhatsApp_no','emp_department','emp_name','project_nam','access_level','department_id', 'emergency_number', 'relationship', 'emergency_name'];

    public function insertData($tableName, $data)
    {
        // echo $tableName;
        // echo "<pre>";print_r($data);exit();
        $this->table = $tableName;
        return $this->insert($data);
    }
    public function insertDatatoproject($data)
    {
        // print_r($data);die;
        $this->db->table('tbl_project')->insert($data);
    }
    public function getalldata($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getResult();
        // print_r($result);die;
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getallalottaskstatus($emp_id)
    {  
        $tbl_allottaskdetails = $this->db->table('tbl_allottaskdetails')
            ->where('emp_id', $emp_id)
            ->get()
            ->getResult();
    
        $workingTimeData = array();
    
        foreach ($tbl_allottaskdetails as $task) {
            // Fetch data from tbl_workingTime for each id
            $workingTime = $this->db->table('tbl_workingTime')
                ->where('allotTask_id', $task->id)
                ->where('emp_id', $emp_id)
                ->get()
                ->getResult();
            //   echo'<pre>';  print_r($workingTime);die;
    
            // Merge the working time data for each id
            $workingTimeData[$task->id] = $workingTime;
            // echo'<pre>';  print_r($workingTimeData[]);die;
        }
    
        $db = \Config\Database::connect();
        $pauseTimingData = array(); 
    
        foreach ($tbl_allottaskdetails as $task) {
            $builder = $db->table('tbl_pauseTiming');
            $pauseTiming = $builder->where('allotTask_id', $task->id)
                                   ->get()
                                   ->getResult();
    
            $pauseTimingData[$task->id] = $pauseTiming;
        }
        return [
            'workingTimeData' => $workingTimeData,
            'pauseTimingData' => $pauseTimingData
        ];
    }
    
    public function get_single_data($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getRow();
        //print_r($this->db->getLastQuery());die;
        //print_r($result);die;

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getEmployeesByDepartment($departmentId)
    {
        if (!isset($this->db)) {
            $this->db = \Config\Database::connect();
        }
    
        $query = $this->db->table('employee_tbl') // Replace 'your_table_name' with your actual table name
                          ->where('emp_department', $departmentId)
                          ->get();
    
        $result = $query->getResult();
    
        // Print the last executed query
        // echo $this->db->getLastQuery();die;
        // print_r($result);die;
    
        return $result;
    }
    public function saveAllotTask($data)
    {
        // print_r($data);die;
       
       $result = $this->db->table('tbl_allottaskdetails')->insert($data);
       if($result){
        return true;
       }
       else{
        return false;
       }
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        $session = session();
        
        $result = $this->db
            ->table('employee_tbl')
            ->where(["email" => $email, "password" => $password])
            ->get()
            ->getRow();

        if ($result) {
            $sessiondata = [
                'id'                 => $result->id,
                'role'               => $result->role,
                'email'              => $result->email,
                'password'           => $result->password,
                'cpassword'          => $result->confirm_pass,
                'user_name'          => $result->full_name,
                'mobile_no'          => $result->mobile_no,
                'country'            => $result->country,
                'Assign_Techer_id'   => $result->Assign_Techer_id,
                'SessionType'        => $result->SessionType,
                'Payment_status'     => $result->Payment_status,
                'access_level'       => $result->access_level,
                'is_logged_in'       => 'Y',
                'SessionsCount'      =>$result->SessionsCount,
                'mobileWithCode'     =>$result->mobileWithCode,
            ];

            $session->set('sessiondata', $sessiondata);
            return $sessiondata;
        } else {
            return null;
        }
    }
    public function getsinglerow($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getRow();
    
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
     public function getDailyReport()
        {
            return $this->db->table('tbl_daily_work')
                ->select('tbl_daily_work.*, employee_tbl.emp_name')
                ->join('employee_tbl', 'employee_tbl.Emp_id = tbl_daily_work.Emp_id')
                ->where('tbl_daily_work.is_deleted', 'N')
                ->get()
                ->getResult();
        }
        public function getAssignedTasks()
        {
            return $this->db->table('tbl_daily_work')
                ->select('tbl_daily_work.*, employee_tbl.emp_name')
                ->join('employee_tbl', 'employee_tbl.Emp_id = tbl_daily_work.Emp_id')
                ->where('tbl_daily_work.is_deleted', 'N')
                ->get()
                ->getResult();
        }
        public function getEmployeeTiming($emp_Id) {
            // Get today's date
            $todayDate = date('Y-m-d');
        
            // Fetch data from empdata table for the specified employee and today's date
            $todaysData = $this->db->table('tbl_employeetiming')
                                 ->where('emp_id', $emp_Id)
                                 ->where('created_on >=', $todayDate . ' 00:00:00')
                                 ->where('created_on <=', $todayDate . ' 23:59:59')
                                 ->get()
                                 ->getResultArray();
            // print_r($todaysData);die;                     
        
            return $todaysData;
        }
        public function checkStartTime($taskId)
{
        $query = $this->db->table('tbl_workingTime')
                      ->select('start_time')
                      ->where('allotTask_id', $taskId)
                      ->get();

        // Check if start time exists
        return $query->getRow() !== null;
}
// public function jointwotables($select, $table1, $table2,  $joinCond, $wherecond, $type)
// {
//     $result = $this->db->table($table1)  // Use $table1 variable here
//         ->select($select)
//         ->join($table2, $joinCond, $type)
//         ->where($wherecond)
//         ->get()
//         ->getResult();
//     //    echo $this->db->getLastQuery();die;
//     return $result;
// }
// Method to join two tables
public function jointwotables($select, $table1, $table2, $joinCond, $wherecond, $type)
{
    $builder = $this->db->table($table1)  // Use $table1 variable here
        ->select($select)
        ->join($table2, $joinCond, $type)
        ->where($wherecond);

    $result = $builder->get()->getResult();
    // echo $this->db->getLastQuery(); die;
    return $result;
}

// Method to join two tables


public function jointhreetables($select, $table1, $table2, $table3, $joinCond1, $joinCond2, $wherecond, $type = 'inner')
{
    $result = $this->db->table($table1)  // Use $table1 variable here
        ->select($select)
        ->join($table2, $joinCond1, $type)
        ->join($table3, $joinCond2, $type)
        ->where($wherecond)
        ->get()
        ->getResult();

    // Optionally, print the last query for debugging
    // echo $this->db->getLastQuery(); die;

    return $result;
}


public function joinfourtables($select, $table1, $table2, $table3, $table4, $joinCond, $joinCond2, $joinCond3, $wherecond, $type)
{
    $result = $this->db->table($table1)  // Use $table1 variable here
        ->select($select)
        ->join($table2, $joinCond, $type)
        ->join($table3, $joinCond2, $type)
        ->join($table4, $joinCond3, $type)
        ->where($wherecond) // Here is where you're trying to use $wherecond
        ->get()
        ->getResult();

    // echo $this->db->getLastQuery(); // Echoing the query for debugging purposes

    return $result;
}

public function getSubTasksByMainTaskId($mainTaskId)
{
    $result = $this->db->table('tbl_taskDetails')
                    ->where('mainTask_id', $mainTaskId)
                    ->get()
                    ->getResult();
    // print_r($result);die;
    return $result;
}

public function getTaskIdByMainTaskAndName($mainTaskId, $subTaskName)
{
    // print_r($mainTaskId);
    // print_r($subTaskName);die;
    $result = $this->db->table('tbl_taskDetails')
                    ->select('id')
                    ->where('mainTask_id', $mainTaskId)
                    ->where('subTaskName', $subTaskName)
                    ->get()
                    ->getRow()->id;
    // print_r($result);die;  
    return $result;              
}


public function get_po_details($client_id){

    $result = $this->db->table('tbl_po')->where('client_id', $client_id)->where('is_deleted', 'N')->get()->getResult();
    echo json_encode($result);
}


public function jointwotablesingal($select, $table1, $table2,  $joinCond, $wherecond, $type)
{
    $result = $this->db->table($table1)  // Use $table1 variable here
        ->select($select)
        ->join($table2, $joinCond, $type)
        ->where($wherecond)
        ->get()
        ->getRow();
    //    echo $this->db->getLastQuery();die;
    return $result;
}


public function joinThreeTablessingal($select, $table1, $table2, $table3, $joinCond1, $joinCond2, $wherecond, $type1 = 'inner', $type2 = 'inner')
{
    $result = $this->db->table($table1)
        ->select($select)
        ->join($table2, $joinCond1, $type1)
        ->join($table3, $joinCond2, $type2)
        ->where($wherecond)
        ->get()
        ->getRow();
    // echo $this->db->getLastQuery(); die;
    return $result;
}




public function joinfivetables($select, $table, $table1, $table2, $table3, $table4, $joinCond1, $joinCond2, $joinCond3, $joinCond4, $wherecond, $type)
{
    $result = $this->db->table($table)  // Use $table1 variable here
        ->select($select)
        ->join($table1, $joinCond1, $type)
        ->join($table2, $joinCond2, $type)
        ->join($table3, $joinCond3, $type)
        ->join($table4, $joinCond4, $type)

        ->where($wherecond) // Here is where you're trying to use $wherecond
        ->get()
        ->getResult();

    // echo $this->db->getLastQuery(); // Echoing the query for debugging purposes

    return $result;
}


public function getchat($tablechat, $sender, $receiver)
{
    // $chat = $this->db->query("SELECT * FROM " . $tablechat . " WHERE (sender_id = " . $sender . " AND receiver_id = " . $receiver . ") OR (sender_id = " . $receiver . " AND receiver_id = " . $sender . ") ORDER BY msg_id");


    $chat = $this->db->query("
    SELECT c.*, r1.emp_name AS sender_name, r2.emp_name AS receiver_name
    FROM " . $tablechat . " AS c
    LEFT JOIN employee_tbl AS r1 ON c.sender_id = r1.Emp_id 
    LEFT JOIN employee_tbl AS r2 ON c.receiver_id = r2.Emp_id 
    WHERE (c.sender_id = " . $sender . " AND c.receiver_id = " . $receiver . ") 
    OR (c.sender_id = " . $receiver . " AND c.receiver_id = " . $sender . ")
    ORDER BY c.msg_id
    ");

    // echo "<pre>";print_r($chat);exit();

    $user = $this->db->query("SELECT Emp_id , emp_name, role FROM employee_tbl WHERE Emp_id  = " . $receiver . " ");
    // echo '<pre>';print_r($this->getLastQuery());die;
    //$result = $this->db->table($table)->where($wherecond2.' OR ' .$wherecond3)->get()->getResult();

    // echo "<pre>";print_r($user);exit();

    if ($chat) {
        return $chat->getResultArray();
    } else {
        return false;
    }
}



public function insert_formdata($column, $table, $insertdata)
{
    // echo "<pre>";print_r($insertdata);exit();
    $result['insert'] = $this->db->table($table)->insert($insertdata);
    if ($result['insert']) {
        $insertedID = $this->db->insertID();
        $result['getdata'] = $this->db->table($table)->where($column, $insertedID)->get()->getRowArray();

        return $result;
    } else {
        return false;
    }
}

public function getMonthlyAttendanceData($table, $startDate, $endDate)
{
    return $this->db->table($table)
        ->where('is_deleted', 'N')
        ->where('start_time >=', $startDate)
        ->where('start_time <=', $endDate)
        ->get()
        ->getResult(); // Use getResult() to get the results as an array of objects
}





    
}