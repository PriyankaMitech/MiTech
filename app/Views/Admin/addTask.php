<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Task</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Task</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <form action="<?php echo base_url()?>task" method="post">
                        <input type="hidden" id="id" name="id" value="<?php if (isset($single_data)) { echo ($single_data->id); } ?>">
                        <?php if(empty($single_data)) { ?>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add task">
                            
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                    <?php } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Projectname">Project Name:</label>
                                        <select class="form-control" name="Projectname" id="Projectname" required>
                                            <option value="">Select Project</option>
                                            <?php if(!empty($projectData)){?>
                                                <?php foreach ($projectData as $data){ ?>
                                                    <option value="<?=$data->p_id; ?>"
                                                <?php if ((!empty($single_data)) && $single_data->project_id === $data->p_id ) { echo 'selected'; } ?>>
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
                                            <select class="form-control" id="mainTaskName" name="mainTaskName">
                                                <option >Please select main task</option>
                                                    <?php if(!empty($mainTaskData)){?>
                                                        <?php foreach ($mainTaskData as $data){ ?>
                                                            <option value="<?=$data->id; ?>"
                                                                <?php if ((!empty($single_data)) && $single_data->mainTask_id === $data->id ) { echo 'selected'; } ?>>
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
                                            <!-- <select class="form-control" id="subTaskName">
                                                <option>Value 1</option>
                                                <option>Value 2</option>
                                                <option>Value 3</option>
                                            </select> -->
                                            <input type="text" class="form-control" name="subTaskName" id="subTaskName"  value="<?php if(!empty($single_data)){ echo $single_data->subTaskName;} ?>"required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Description for Subtask</label>
                                            <textarea class="form-control" name="Description" rows="3" placeholder="Enter ..." value="<?php if(!empty($single_data)){ echo $single_data->subTaskDescription;} ?>"></textarea>
                                    </div>
                                </div>
                            </div> 
                            <!-- </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="PageName">Page Name</label>
                                        <input type="text" class="form-control" name="PageName" id="PageName" value="<?php if(!empty($single_data)){ echo $single_data->pageName;} ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="Condition">Condition/Validation</label>
                                            <textarea class="form-control" name="condition" rows="3" placeholder="Enter ..." value="<?php if(!empty($single_data)){ echo $single_data->condition;} ?>"></textarea>
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
 
                            <div class="row mt-3 justify-content-center">
                                    <div class="form-group">
                                        <button type="submit" value=""  name="Save" id="saveTask" class="btn btn-lg btn-success"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?></button>
                                    </div>
                            </div>    
                    </form>
                </div>    
            </div>
        </div>
    </section>

   <!-- Project Data Table -->
   <?php if(empty($single_data)) { ?>
   <section class="content">
        <div class="container-fluid">
            <?php //if(empty($single_data)){ ?>
            <div class="card card-default">
                <div class="card-header">
                    
                    <h3 class="card-title">Task Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered" id="taskTable">
                        <thead>
                            <tr>
                                <th>Projectname</th>
                                <th>Main Task name</th>
                                <th>sub Task Name</th>
                                <th>Description</th>
                                <th>Page Name</th>
                                <th>Condition</th>
                                <th>Task Position</th>
                                <th>Action</th>
                               

                                <!-- Add other table headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($taskDetails)) { ?>
                                <?php //echo'<pre>';print_r($taskDetails);die; ?>
                            <?php foreach ($taskDetails as $task): 
                                $adminModel = new \App\Models\AdminModel(); // Adjust the namespace and model name accordingly
                                $wherecond = array('p_id' => $task->project_id );
                                $project_data = $adminModel->get_single_data('tbl_project', $wherecond);
                                // print_r($project_name);die;
                                $wherecond = array('id' => $task->mainTask_id );
                                $mainTask_data = $adminModel->get_single_data('tbl_mainTaskMaster', $wherecond);?>
                                <tr>
                                    <td><?php if(!empty($project_data)){ echo $project_data->projectName;  } ?></td>
                                    <td><?php if(!empty($mainTask_data)){echo $mainTask_data->mainTaskName; } ?></td>
                                    <td><?php echo $task->subTaskName; ?></td>
                                    <td><?php echo $task->subTaskDescription; ?></td>
                                    <td><?php echo $task->pageName; ?></td>
                                    <td><?php echo $task->condition; ?></td>
                                    <td><?php echo $task->taskPosition; ?></td>
                                   
                                    <td>
                                    
                                    <a href="edit_task/<?=$task->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                    <a href="<?=base_url(); ?>delete/<?php echo base64_encode($task->id); ?>/tbl_taskDetails" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                </td>
                                    <!-- Add other table cells as needed -->
                                </tr>
                            <?php endforeach; ?>
                            <?php 
                            } ?>
                          
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </section>
    <?php } ?>
<?php echo view("Admin/Adminfooter.php"); ?>