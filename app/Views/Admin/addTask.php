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

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <form action="<?php echo base_url()?>task" method="post">
                        <input type="hidden" id="id" name="id" value="<?php if (isset($single_data)) { echo ($single_data->id); } ?>">
                        <?php if(empty($single_data)) { ?>
                    <div class="text-right">
                        <!-- <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add task"> -->
                            
                        <!-- <i class="fa fa-plus" aria-hidden="true"></i> -->
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
                                    <div class="form-group">
                                        <label for="PageName">Page Name</label>
                                        <input type="text" class="form-control" name="PageName" id="PageName" value="<?php if(!empty($single_data)){ echo $single_data->pageName;} ?>" required>
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
 
                            <div class="row mt-3 ">
                                    <div class="form-group">
                                        <button type="submit" value=""  name="Save" id="saveTask" class="btn btn-lg btn-success"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?></button>
                                    </div>
                            </div>    
                    </form>
                </div>    
            </div>
        </div>
    </section>

  
<?php echo view("Admin/Adminfooter.php"); ?>