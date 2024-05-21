<?php 
$session = session();
$sessionData = $session->get('sessiondata');
$role = $sessionData['role']; 

if (!empty($role)) {
    if ($role === 'Employee') {
        echo view("Employee/employeeSidebar"); 
    } else if ($role === 'Admin') {
        echo view("Admin/Adminsidebar.php"); 
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Add Task</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Create Task</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <form id="taskForm" action="<?php echo base_url()?>task" method="post">
                        <input type="hidden" id="id" name="id" value="<?php if (isset($single_data)) { echo ($single_data->id); } ?>">
                        <input type="hidden" id="actionType" name="actionType" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Projectname">Project Name:</label>
                                    <select class="form-control" name="Projectname" id="Projectname" required>
                                        <option value="">Select Project</option>
                                        <?php if (!empty($projectData)) { ?>
                                            <?php foreach ($projectData as $data) { ?>
                                                <option value="<?=$data->p_id; ?>"
                                                    <?php if ((!empty($single_data)) && $single_data->project_id === $data->p_id) { echo 'selected'; } ?>>
                                                    <?= $data->projectName; ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mainTaskName">Main Task name</label>
                                    <select class="form-control" id="mainTaskName" name="mainTaskName" required>
                                        <option value="">Please select main task</option>
                                        <?php if (!empty($mainTaskData)) { ?>
                                            <?php foreach ($mainTaskData as $data) { ?>
                                                <option value="<?=$data->id; ?>"
                                                    <?php if ((!empty($single_data)) && $single_data->mainTask_id === $data->id) { echo 'selected'; } ?>>
                                                    <?= $data->mainTaskName; ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subTaskName">Sub Task name</label>
                                    <input type="text" class="form-control" name="subTaskName" id="subTaskName" value="<?php if (!empty($single_data)) { echo $single_data->subTaskName; } ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="PageName">Page Name</label>
                                    <input type="text" class="form-control" name="PageName" id="PageName" value="<?php if (!empty($single_data)) { echo $single_data->pageName; } ?>" required>
                                </div>
                            </div>
                        </div> 
                        <div class="row">                                
                            <div class="col-md-12">                            
                                <h6><strong>Select section</strong></h6>
                                <div class="radiobuttons list-inline">
                                    <div class="rdio rdio-primary radio-inline list-inline-item"> 
                                        <input name="Taskradio" value="main body" id="radio1" type="radio" checked>
                                        <label for="radio1">Main Body</label>
                                    </div>
                                    <div class="rdio rdio-primary radio-inline list-inline-item">
                                        <input name="Taskradio" value="Sp.page" id="radio2" type="radio">
                                        <label for="radio2">Sp. Page</label>
                                    </div>
                                    <div class="rdio rdio-primary radio-inline list-inline-item">
                                        <input name="Taskradio" value="Pop up" id="radio3" type="radio">
                                        <label for="radio3">Pop up</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" value="" name="Save" id="saveTask" class="btn btn-lg btn-success" onclick="setActionType('save')">
                                        <?php if (!empty($single_data)) { echo 'Update'; } else { echo 'Save'; } ?>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="form-group">
                                    <button type="button" id="addTaskDescript" class="btn btn-lg btn-success" onclick="setActionType('addTaskDescription')">
                                        <?php if (!empty($single_data)) { echo 'Add Task Description'; } else { echo 'Add Task Description'; } ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </section>

<?php echo view("Admin/Adminfooter.php"); ?>

<script>

function setActionType(action) {
    document.getElementById('actionType').value = action;

    if (action === 'addTaskDescription') {
        event.preventDefault();  // Prevent the form from submitting immediately
        saveAndRedirect();
    }
}   
function saveAndRedirect() {
    const form = document.getElementById('taskForm');

    // Validate the form before submitting
    if (form.checkValidity() === false) {
        form.reportValidity();
        return;
    }
    
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const taskId = data.taskId;
            console.log(taskId)
            // Open createTestCase page with the taskId as a query parameter in a new tab
            window.open(`<?php echo base_url(); ?>createTestCase?taskId=${taskId}`, '_blank');
        } else {
            alert('Error saving task.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred.');
    });
}
</script>
