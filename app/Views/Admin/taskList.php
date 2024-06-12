<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn"> Task List</h1>

                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn">Create Task</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <button id="viewApplicationsBtn" class="btn btn-info m-2 ">+ Add Task</button>

                <a class="btn btn-info m-2 backbtn" href="<?=base_url();?>taskList" style="float: inline-end;">Back</a>


                    <div class="card " id="viewApplicationsCard" >
                        <div class="card-header">
                            <h3 class="card-title">Task List</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form method="post" action="<?=base_url(); ?>search_data">

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
                            <div class="col-md-6" style="padding: 27px 0px 0px 34px !important;">
                                <button class="btn btn-lg btn-success" type="submit" value="submit" name="submit" id="submit">Search</button>
                            </div>
                        </div>
                        </form>

                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SR.NO</th>
                                        <th>Project Name</th>
                                        <th>Main Task name</th>
                                        <th>Sub Task Name</th>
                                        <th>Page Name</th>
                                        <th>Task Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($taskDetails)) { $i=1;?>
                                    <?php foreach ($taskDetails as $task): 
                                        $adminModel = new \App\Models\AdminModel(); // Adjust the namespace and model name accordingly
                                        $wherecond = array('p_id' => $task->project_id );
                                        $project_data = $adminModel->get_single_data('tbl_project', $wherecond);
                                        // print_r($project_name);die;
                                        $wherecond = array('id' => $task->mainTask_id );
                                        $mainTask_data = $adminModel->get_single_data('tbl_mainTaskMaster', $wherecond);?>
                                        <tr>
                                            <td><?=$i; ?></td>
                                            <td><?php if(!empty($project_data)){ echo $project_data->projectName;  } ?></td>
                                            <td><?php if(!empty($mainTask_data)){echo $mainTask_data->mainTaskName; } ?></td>
                                            <td><?php echo $task->subTaskName; ?></td>
                                            <td><?php echo $task->pageName; ?></td>
                                            <td><?php echo $task->taskPosition; ?></td>
                                        
                                            <td>
                                            
                                            <a href="edit_task/<?=$task->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                            
                                            <a href="<?= base_url(); ?>delete_compan/<?php echo base64_encode($task->id); ?>/tbl_taskdetails" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>

                                        </td>
                                            <!-- Add other table cells as needed -->
                                        </tr>
                                    <?php $i++; endforeach; ?>
                                    <?php 
                                    } ?>
                                
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card card-default" style="display:none">
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
            </div>
        </div>
    </section>
                        
<?php echo view("Admin/Adminfooter.php"); ?>

<script>
$(document).ready(function() {
    $('#viewApplicationsBtn').on('click', function() {
        var $viewApplicationsCard = $('#viewApplicationsCard');
        var $leaveForm = $('.card').not('#viewApplicationsCard');
        var $button = $('#viewApplicationsBtn');

        var $button1 = $('.viewApplicationsBtn');


        if ($viewApplicationsCard.is(':hidden')) {
            $viewApplicationsCard.show();
            $leaveForm.hide();
            $button.text('+ Add Task'); // Change text when showing applications
            $button1.text('Task List'); // Change text when showing applications

        } else {
            $viewApplicationsCard.hide();
            $leaveForm.show();
            $button.text('Task List'); // Change text when showing leave form
            $button1.text('Add Task'); // Change text when showing applications

        }
    });
});

function setActionType(action) {
    document.getElementById('actionType').value = action;

    if (action === 'addTaskDescription') {
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
            // Redirect to createTestCase page with the taskId as a query parameter
            window.location.href = `<?php echo base_url(); ?>createTestCase?taskId=${taskId}`;
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