<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Small box for Projects -->
          <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> Projects</h3>
                            <p>Project Details</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer more-info" data-target="project-table">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- Small box for Employees -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Employees</h3>
                            <p>Employee Details</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer more-info" data-target="employee-table">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- Add more small boxes for other data as needed -->
            


          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
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
           
             <div class="row project-table" style="display: none;">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><b>Project Details :</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                      <table class="table table-head-fixed text-nowrap  table-bordered">
                        <thead>
                          <tr>
                          <th>Sr. No.</th>
                            <th>Project Name</th>
                            <th>Technology</th>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Project Start Date</th>
                            <th>Project Delivery Date</th>
                            <th>Targeted UAT Date</th>
                            <th>POC Name</th>
                            <th>POC Mobile No.</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $count= 1;?>
                        <?php foreach ($Projects as $project): ?>
                          
                          <tr>
                          <td><?php echo $count++; ?></td>
                            <td><?php echo $project->projectName; ?></td>
                            <td><?php echo $project->Technology; ?></td>
                            <td><?php echo $project->Client_name; ?></td>
                            <td><?php echo $project->Client_email; ?></td>
                            <td><?php echo $project->Project_startdate; ?></td>
                            <td><?php echo $project->Project_DeliveryDate; ?></td>
                            <td><?php echo $project->TargetedUAT_Date; ?></td>
                            <td><?php echo $project->POC_name; ?></td>
                            <td><?php echo $project->POC_mobile_no; ?></td>
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
            <div class="row employee-table" style="display: none;">
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
                                  <?php $count= 1;?>
                                  <?php foreach ($Employees as $employee): ?>
                                    <?php //echo'<pre>'; print_r($employee); ?>  
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $employee->emp_name; ?></td>
                                    <td><?php echo $employee->emp_email; ?></td>
                                    <td><?php echo $employee->emp_department; ?></td>
                                    <td><?php echo $employee->emp_joiningdate; ?></td>
                                    <td><?php echo $employee->mobile_no; ?></td>
                                    <td><?php echo $employee->current_address; ?></td>
                                    <td><?php echo $employee->PhotoFile; ?></td>
                                    <td><?php echo $employee->ResumeFile; ?></td> 
                                  </tr>
                                  <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
      </div>
    </section>
  </div>

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
                    const allTables = document.querySelectorAll(".project-table, .employee-table"); // Add more classes as needed
                    allTables.forEach(function(table) {
                        table.style.display = "none";
                    });
                    targetTable.style.display = "block";
                }
            });
        });
    });
</script>



<?php echo view("Admin/Adminfooter.php"); ?>