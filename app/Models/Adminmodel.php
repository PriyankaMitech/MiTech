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
        // Print table name and data for debugging purposes
        // echo $tableName;
        // echo "<pre>";
        // print_r($data);
        // exit();
    
        // Use query builder to insert data into the specified table
        $db = \Config\Database::connect();
        $builder = $db->table($tableName);
    
        $result = $builder->insert($data);
    
        if ($result) {
            // echo "Result inserted.";
            // die;
            return $result;
        } else {
            echo "Result not inserted.";
            die;
            return false;
        }
    }
    
    public function insertDatatoproject($data)
    {
        // print_r($data);die;
        $this->db->table('tbl_project')->insert($data);
    }
    public function getalldata($table, $wherecond, $specialConditions = [])
    {
        $builder = $this->db->table($table);
    
        foreach ($wherecond as $key => $value) {
            $builder->where($key, $value);
        }
    
        if (!empty($specialConditions)) {
            foreach ($specialConditions as $key => $value) {
                $builder->where("DATE($key)", $value);
            }
        }
    
        $result = $builder->get()->getResult();
        // echo $this->db->getLastQuery();exit();
    
        return $result ?: false;
    }
    
    public function getallalottaskstatus($emp_id)
    {  
        $tbl_allottaskdetails = $this->db->table('tbl_allottaskdetails')
            ->where('emp_id', $emp_id)
            ->get()
            ->getResult();
    
        $workingTimeData = array();
    
        foreach ($tbl_allottaskdetails as $task) {
            // Fetch data from tbl_workingtime for each id
            $workingTime = $this->db->table('tbl_workingtime')
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
            $builder = $db->table('tbl_pausetiming');
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

    public function get_corrections_alottaskstatus($emp_id)
    {  
        $tbl_allottaskdetails = $this->db->table('tbl_allottaskdetails')
            ->where('emp_id', $emp_id)
            ->where('Developer_task_status', 'complete')
            ->where('Tester_task_status IS NOT NULL')
            ->get()
            ->getResult();
        
            // echo '<pre>';print_r($tbl_allottaskdetails);die;
    
        $workingTimeData = array();
    
        foreach ($tbl_allottaskdetails as $task) {
            // Fetch data from tbl_workingtime for each id
            $workingTime = $this->db->table('tbl_corrections_workingtime')
                ->where('allot_task_id', $task->id)
                ->where('emp_id', $emp_id)
                ->get()
                ->getResult();
            //   echo'<pre>';  print_r($workingTime);die;
    
            // Merge the working time data for each id
            $workingTimeData[$task->id] = $workingTime;
            // echo'<pre>';  print_r($workingTimeData);die;
        }
    
        $db = \Config\Database::connect();
        $pauseTimingData = array(); 
    
        foreach ($tbl_allottaskdetails as $task) {
            $builder = $db->table('tbl_corrections_pausetiming');
            $pauseTiming = $builder->where('allot_task_id', $task->id)
                                   ->where('emp_id', $emp_id)
                                   ->get()
                                   ->getResult();
    
            $pauseTimingData[$task->id] = $pauseTiming;
            // echo'<pre>';  print_r($pauseTimingData);die;
        }
        return [
            'workingTimeData' => $workingTimeData,
            'pauseTimingData' => $pauseTimingData
        ];
    }
    
    public function get_single_data($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getRow();
        // echo'<pre>';print_r($this->db->getLastQuery());die;
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
        $query = $this->db->table($table)->where($wherecond)->get();
        $result = $query->getRow();
    
        return $result ? $result : false;
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
        $query = $this->db->table('tbl_workingtime')
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
public function jointwotables($select, $table1, $table2, $joinCond, $wherecond, $type = 'INNER')
{
    $builder = $this->db->table($table1)
        ->select($select)
        ->join($table2, $joinCond, $type);

    // Add conditions
    foreach ($wherecond as $key => $value) {
        if (strpos($key, ' LIKE') !== false) {
            $builder->like(str_replace(' LIKE', '', $key), $value);
        } elseif (strpos($key, ' DATE(') !== false) {
            $builder->where($key, $value);
        } else {
            $builder->where($key, $value);
        }
    }

    $result = $builder->get()->getResult();
    // echo $this->db->getLastQuery();die;
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

    // echo'<pre>';print_r($this->db->getLastQuery()); // Echoing the query for debugging purposes

    return $result;
}

public function getSubTasksByMainTaskId($mainTaskId)
{
    $result = $this->db->table('tbl_taskdetails')
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
    $result = $this->db->table('tbl_taskdetails')
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
    SELECT c.*, 
           r1.emp_name AS sender_name, 
           r2.emp_name AS receiver_name, 
           r1.PhotoFile AS sender_photo, 
           r2.PhotoFile AS receiver_photo
    FROM $tablechat AS c
    LEFT JOIN employee_tbl AS r1 ON c.sender_id = r1.Emp_id 
    LEFT JOIN employee_tbl AS r2 ON c.receiver_id = r2.Emp_id 
    WHERE (c.sender_id = $sender AND c.receiver_id = $receiver) 
    OR (c.sender_id = $receiver AND c.receiver_id = $sender) 
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



// public function insert_formdata($column, $table, $insertdata)
// {
//     // echo "<pre>";print_r($insertdata);exit();
//     $result['insert'] = $this->db->table($table)->insert($insertdata);
//     if ($result['insert']) {
//         $insertedID = $this->db->insertID();
//         $result['getdata'] = $this->db->table($table)->where($column, $insertedID)->get()->getRowArray();

//         return $result;
//     } else {
//         return false;
//     }
// }


public function insert_formdata($column, $table, $insertdata)
{
    // Insert data into the specified table
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

// Method to fetch notifications based on the table name
public function getNotifications($tableName, $emp_id, $date_5_days_ago, $current_date)
{
    $result =  $this->db->table($tableName)
                    ->where("FIND_IN_SET('$emp_id', emp_id) >", 0)
                    ->where('notification_date >=', $date_5_days_ago)
                    ->where('notification_date <=', $current_date)
                    ->get()
                    ->getResult(); // This will return an array of results

    // echo $this->db->getLastQuery();              
    // echo'<pre>';print_r($result);die;
    return $result;                
}

public function jointwotablesforleave($select, $table, $joins, $joinConds, $wherecond, $order)
{
    $builder = $this->db->table($table);
    $builder->select($select);
    
    if (is_array($joins) && is_array($joinConds)) {
        foreach ($joins as $index => $join) {
            $builder->join($join, $joinConds[$index]);
        }
    } else {
        $builder->join($joins, $joinConds);
    }
    
    $builder->where($wherecond);
    $builder->orderBy('tbl_leave_requests.id', $order);
    
    $query = $builder->get();
    return $query->getResult();
}

public function fetchTasksByStatus($table, $primaryKey, $emp_id) {
    // print_r($table);die;
    $result =   $this->db->table($table)
                ->select('*') // Select all columns
                ->where('emp_id', $emp_id)
                ->where('Developer_task_status', 'complete')
                ->where('Tester_task_status IS NOT NULL')
                ->get()
                ->getResult();
    
    $db = \Config\Database::connect();            
    // echo'<pre>';print_r($this->db->getLastQuery());exit();
                

    // echo'<pre>'; print_r($result);exit();            
    if($result){
        return $result;
    }else{
        return false;
    }
}

// public function getAllUsersSortedByLatestChat()
// {
//     $builder = $this->db->table('employee_tbl');
//     $builder->select('employee_tbl.*, MAX(online_chat.created_at) as latest_chat_timestamp');
//     $builder->join('online_chat', 'employee_tbl.Emp_id = online_chat.sender_id OR employee_tbl.Emp_id = online_chat.receiver_id', 'left');
//     $builder->where('employee_tbl.is_deleted', 'N');
//     $builder->groupBy('employee_tbl.Emp_id');
//     $builder->orderBy('latest_chat_timestamp', 'DESC');
//     $query = $builder->get();
    
//     return $query->getResult();  // Return as an array of objects

    
    
// }

public function getAllUsersSortedByLatestChat()
{
    $builder = $this->db->table('employee_tbl');
    $builder->select('employee_tbl.*, MAX(online_chat.created_at) as latest_chat_timestamp, online_chat.message as last_message, online_chat.*');
    $builder->join('online_chat', 'employee_tbl.Emp_id = online_chat.sender_id OR employee_tbl.Emp_id = online_chat.receiver_id', 'left');
    $builder->where('employee_tbl.is_deleted', 'N');
    $builder->groupBy('employee_tbl.Emp_id');
    $builder->orderBy('latest_chat_timestamp', 'DESC');
    $query = $builder->get();

    return $query->getResult(); // Return as an array of objects
}







    
}