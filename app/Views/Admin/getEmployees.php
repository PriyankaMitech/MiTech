<?php
// Assuming $employeeDetails and $selectedDepartmentId are defined

$selectedDepartmentId = $_POST['departmentId'];
$employeeOptions = '<option value="">Select Employee</option>';

if (!empty($employeeDetails)) {
    foreach ($employeeDetails as $employee) {
        if ($employee->emp_department == $selectedDepartmentId) {
            $employeeOptions .= '<option value="' . $employee->Emp_id . '">' . $employee->emp_name . '</option>';
        }
    }
}

echo $employeeOptions;
?>
