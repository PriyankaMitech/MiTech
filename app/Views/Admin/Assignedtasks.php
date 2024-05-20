<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Assigned Tasks</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Assigned Tasks</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Assigned Tasks List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Main Task name</th>
                                        <th>Sub Task Name</th>
                                        <th>Employee Name</th>
                                        <th>Developer Status</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                            <?php if(!empty($assignedTasksData)) { ?>
                            <?php foreach ($assignedTasksData as $task): ?>
                                <tr>
                                    <td><?php  echo $task->projectName;   ?></td>
                                    <td><?php echo $task->mainTaskName; ?></td>
                                    <td><?php echo $task->sub_task_name; ?></td>
                                    <td><?php echo $task->emp_name; ?></td>
                                  

                                    <td>  <small class="badge badge-success"><?php  echo $task->Developer_task_status; ?> </small></td>
                                    <!-- <td>
                                    <a href="edit_task/<?=$task->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                    <a href="<?=base_url(); ?>delete/<?php echo base64_encode($task->id); ?>/tbl_taskDetails" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                    </td> -->
                                    <!-- Add other table cells as needed -->
                                </tr>
                            <?php endforeach; ?>
                            <?php 
                            } ?>
                          
                        </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
                        
<?php echo view("Admin/Adminfooter.php"); ?>