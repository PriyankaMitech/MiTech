<?php 
// echo view ("Admin/Adminsidebar.php"); 
?>

<?php
$file = __DIR__ . "/Adminsidebar.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-white">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active text-white">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Small box for Projects -->
          <a href="#" class=" more-info" data-target="project-table">
          <div class="col-lg-3 col-6">
                    <div class="small-box bg-info ">
                        <div class="inner p-2">
                            <h3> Projects</h3>
                            <p>Project Details</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer more-info" data-target="project-table">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
</a>
                <!-- Small box for Employees -->
                <a href="#" class="more-info" data-target="employee-table">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner p-2">
                            <h3>Employees</h3>
                            <p>Employee Details</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer more-info" data-target="employee-table">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                </a>
                <!-- Add more small boxes for other data as needed -->
            

                <a href="#" class="more-info" data-target="attendance-list-table">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner p-2">
                <h3><?php $count_attendance = 0; if(!empty($attendance_list)){ $count_attendance = count($attendance_list) ?> <?php echo $count_attendance; ?><?php }else{ echo $count_attendance;} ?></h3>

                <p>Attendance List</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer more-info" data-target="attendance-list-table">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </a>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
             <!-- Hidden table -->

             
            <!-- Hidden table for Projects -->
           
             <div class="row project-table p-2" style="display: none;">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Project List :</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                      <table class="table table-head-fixed text-nowrap  table-bordered">
                        <thead>
                          <tr>
                          <th>Sr. No.</th>
                            <th>Project Name</th>
                            <th>Project Status</th>

                            <th>Development Type</th>
                            <th>Client Name</th>
                            <th>Client Mobile No.</th>

                            <th>Client Email</th>
                            <th>Start Date</th>
                            <th>UAT Date</th>
                            <th>Delivery Date</th>
                            <th>POC Name</th>
                            <th>POC Mobile No.</th>
                            <th>POC Email ID</th>



                          </tr>
                        </thead>
                        <tbody>
                        <?php $count= 1;?>
                      <?php 
                        $completedProjects = [];
                        foreach ($Projects as $project): 
                            if($project->project_status == 'Completed') {
                                $completedProjects[] = $project;
                                continue; // Skip displaying completed projects in the loop
                            }
                      ?>
                      <tr>
                          <td><?php echo $count++; ?></td>
                          <td><?php echo $project->projectName; ?></td>
                          <td>
                              <?php if($project->project_status == 'WIP'): ?>
                                  <small class="badge badge-info"> WIP </small>
                              <?php elseif($project->project_status == 'ON Hold'): ?>
                                  <small class="badge badge-warning"> ON Hold </small>
                              <?php endif; ?>
                          </td>
                          <td><?php echo $project->Technology; ?></td>
                          <td><?php echo $project->Client_name; ?></td>
                          <td><?php echo $project->Client_mobile_no; ?></td>

                          <td><?php echo $project->Client_email; ?></td>
                          <td><?php echo date('j F Y', strtotime($project->Project_startdate)); ?></td>
                          <td><?php echo date('j F Y', strtotime($project->TargetedUAT_Date)); ?></td>

                          <td><?php echo date('j F Y', strtotime($project->Project_DeliveryDate)); ?></td>
                          <td><?php echo $project->POC_name; ?></td>
                          <td><?php echo $project->POC_mobile_no; ?></td>
                          <td><?php echo $project->POC_email; ?></td>

                      </tr>
                    <?php endforeach; ?>

                    <?php 
                    // Display completed projects after the loop
                    foreach ($completedProjects as $completedProject): 
                    ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $completedProject->projectName; ?></td>
                        <td><small class="badge badge-success"> Completed </small></td>
                        <td><?php echo $completedProject->Technology; ?></td>
                        <td><?php echo $completedProject->Client_name; ?></td>
                        <td><?php echo $completedProject->Client_mobile_no; ?></td>

                        <td><?php echo $completedProject->Client_email; ?></td>
                        <td><?php echo date('j F Y', strtotime($completedProject->Project_startdate)); ?></td>
                        <td><?php echo date('j F Y', strtotime($completedProject->Project_DeliveryDate)); ?></td>
                        <td><?php echo date('j F Y', strtotime($completedProject->TargetedUAT_Date)); ?></td>
                        <td><?php echo $completedProject->POC_name; ?></td>
                        <td><?php echo $completedProject->POC_mobile_no; ?></td>
                        <td><?php echo $project->POC_email; ?></td>

                    </tr>
                    <?php endforeach; ?>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            <!-- /.card -->
                </div>
            </div>

            
            <!-- Hidden table for Employees -->
            <div class="row employee-table p-2" style="display: none;">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Employee Details :</b></h3>
                        </div>
                        <div class="card-body" >
                            <table class="table table-bordered table-responsive">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                      <th>Employee Name</th>
                                      <th>Emaployee Email</th>
                                      <th>Employee Department</th>
                                      <th>Employee Joiningdate</th>
                                      <th>Mobile No.</th>
                                      <th>Current Address</th>
                                      <th>Photo File</th>
                                      <th>Resume File</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if(!empty($Employees)){ $count= 1;?>
                                  
                                  <?php foreach ($Employees as $employee): ?>
                                    <?php    $model = new \App\Models\AdminModel();
                                            $ids=  $employee->emp_department;
                                            $wherecond = array('id' => $ids);

                                            $departmentName = $model->getsinglerow('tbl_department', $wherecond);
                                             ?>  
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $employee->emp_name; ?></td>
                                    <td><?php echo $employee->emp_email; ?></td>
                                    <td><?php if(!empty($departmentName)){ echo $departmentName->DepartmentName; }?></td>
                                    <td><?php echo $employee->emp_joiningdate; ?></td>
                                    <td><?php echo $employee->mobile_no; ?></td>
                                    <td><?php echo $employee->current_address; ?></td>
                                    <td><?php echo $employee->PhotoFile; ?></td>
                                    <td><?php echo $employee->ResumeFile; ?></td> 
                                  </tr>
                                  <?php endforeach; ?>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="row attendance-list-table p-2" style="display: none;">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Attendance List:</b></h3>
                        </div>
                        <div class="card-body" >
                            <table class="table ">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                      <th>Employee Name</th>
                                      <th>Punch In</th>
                                      <th>Punch Out</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $count= 1;?>
                                  <?php if(!empty($attendance_list)){?>
                                  <?php foreach ($attendance_list as $data): ?>
                                    <?php //echo'<pre>'; print_r($employee); ?>  
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $data->emp_name; ?></td>
                                    <td><?php echo $data->start_time; ?></td>
                                    <td><?php echo $data->end_time; ?></td>
                                    
                                  </tr>
                                  <?php endforeach; ?>
                                  <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
      </div>
    </section>
  </div>






<?php 
// echo view("Admin/Adminfooter.php");
 ?>

<?php
$file = __DIR__ . "/Adminfooter.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
?>

<!-- JavaScript to toggle visibility of the hidden table -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const moreInfoLinks = document.querySelectorAll(".more-info");

        moreInfoLinks.forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const target = this.getAttribute("data-target");
                const targetTable = document.querySelector("." + target);

                if (targetTable) {
                  const allTables = document.querySelectorAll(".project-table, .employee-table, .attendance-list-table");
                    allTables.forEach(function(table) {
                        table.style.display = "none";
                    });
                    targetTable.style.display = "block";
                }
            });
        });
    });
</script>


