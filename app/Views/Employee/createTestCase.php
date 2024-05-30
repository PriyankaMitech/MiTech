<?php
$uri = new \CodeIgniter\HTTP\URI(current_url(true));
$pages = $uri->getSegments();
$page = $uri->getSegment(count($pages));

$role = ''; // Initialize role variable

// Check if the user is logged in and the role is set
if (isset($_SESSION['sessiondata']['role'])) {
    $role = $_SESSION['sessiondata']['role'];
    print_r($role);exit();

// Define the sidebar file based on the user's role
$sidebar_file = '';

if ($role === 'Admin') {
    $sidebar_file = 'Admin/Adminsidebar.php';
} elseif ($role === 'Employee') {
    $sidebar_file = 'Employee/employeeSidebar.php';
}

// Check if the sidebar file is defined
if ($sidebar_file !== '') {
    // Construct the full path to the sidebar file
    $full_path = __DIR__ . '/' . $sidebar_file;
    // print_r($full_path);exit();
    
    // Check if the sidebar file exists
    if (file_exists($full_path)) {
        // Include the sidebar file
        include $full_path;
    } else {
        // If the sidebar file doesn't exist, show an error message
        echo "Sidebar file not found: $sidebar_file";
    }
} 
}else {
    // If the role is not defined, show an error message
    echo "Role not defined";
}

?>



<?php
// $taskId = $_GET['taskId']; // Get the taskId from the URL parameter
//  print_r($taskId);
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
if (isset($_SESSION['sessiondata'])) {
  $role = $_SESSION['sessiondata']['role'];
  if ( $role == 'Admin') {
    echo view('Admin/Adminfooter');
  } elseif ($role == 'Employee') {
    echo view('Employee/empfooter');
  } 
}

if (isset($role)) {
    if ($role == 'Admin') {
      echo view('Admin/Adminfooter');
    } elseif ($role == 'Employee') {
      echo view('Employee/empfooter');
    }
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
