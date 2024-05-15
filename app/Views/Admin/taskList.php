<?php echo view ("Admin/Adminsidebar.php"); ?>
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
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Create Task</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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
                                <!-- <th>Description</th> -->
                                <th>Page Name</th>
                                <!-- <th>Condition</th> -->
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
                                    <!-- <td><?php echo $task->subTaskDescription; ?></td> -->
                                    <td><?php echo $task->pageName; ?></td>
                                    <!-- <td><?php echo $task->condition; ?></td> -->
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
                        </div>
<?php echo view("Admin/Adminfooter.php"); ?>