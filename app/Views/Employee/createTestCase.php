<?php
// define('BASE_VIEW_PATH', __DIR__ . '/../');

// $file = BASE_VIEW_PATH . "Admin/Adminsidebar.php";
// if (file_exists($file)) {
//     include $file;
// } else {
//     echo "File not found: $file";
// }

// echo "<pre>";print_r($_SESSION);exit();
$sessiondata = $_SESSION['sessiondata'];
$role = $sessiondata['role'];
// print_r($sessiondata);die;
if(!empty($role)){
    if($role == 'Employee'):
        echo view("Employee/employeeSidebar"); 
    elseif ($role === 'Admin'): 
        echo view("Admin/AdminSidebar"); 
endif; 
    }
?>



<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Test Description</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Create Test Description</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Task Description</h3>
                        </div>
                        <div class="card-body">
                        <form method="post" action="<?= site_url('save-test-case') ?>">
                        <!-- Hidden input for taskId -->
                        <input type="hidden" name="taskId" value="<?= htmlspecialchars($taskId) ?>">

                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                           
                                <div class="form-group row">
                                    <label for="testCaseId" class="col-sm-4 col-form-label">Test Case ID</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="testCaseId" placeholder="Enter Test Case ID" name="testCaseId" required value="<?php if(!empty($testCaseData)){ echo $testCaseData[0]->testCaseId; } ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="prerequisites" class="col-sm-4 col-form-label">Prerequisites</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="prerequisites" placeholder="Enter Prerequisites" name="prerequisites" required>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label for="steps" class="col-sm-4 col-form-label">Steps to Follow</label>
                                    <div class="col-sm-8">
                                        <div id="stepsContainer">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="steps[]" placeholder="Enter Step" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary addStepBtn" type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="expectedResult" class="col-sm-4 col-form-label">Expected Result</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="expectedResult" rows="3" placeholder="Enter Expected Result" name="expectedResult" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="comment" class="col-sm-4 col-form-label">Comments</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="comment" rows="3" placeholder="Enter Comments" name="comment" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php
// $file = BASE_VIEW_PATH . "Admin/Adminfooter.php";
// if (file_exists($file)) {
//     include $file;
// } else {
//     echo "File not found: $file";
// }

// $sessiondata = $_SESSION['sessiondata'];
// $role = $sessiondata['role'];
// print_r($sessiondata);die;
if(!empty($role)){
    if($role == 'Employee'):
        echo view("Employee/empfooter"); 
    elseif ($role === 'Admin'): 
        echo view("Admin/Adminfooter"); 
endif; 
}


?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector(".addStepBtn").addEventListener("click", function() {
            const stepsContainer = document.getElementById("stepsContainer");
            const inputGroup = document.createElement("div");
            inputGroup.classList.add("input-group", "mb-3");
            inputGroup.innerHTML = `
                <input type="text" class="form-control" name="steps[]" placeholder="Enter Step">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary removeStepBtn" type="button">-</button>
                </div>
            `;
            stepsContainer.appendChild(inputGroup);
            inputGroup.querySelector(".removeStepBtn").addEventListener("click", function() {
                inputGroup.remove();
            });
        });
    });
</script>
