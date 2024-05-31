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
                      <i class="ion ion-folder"></i>
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
                    <i class="icon ion-ios-people" style="top: -5px !important;"></i>
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
                <i class="icon ion-ios-list" style="top: 0px !important;"></i>
                </div>
                <a href="#" class="small-box-footer more-info" data-target="attendance-list-table">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </a>
          <a href="#" class="more-info" data-target="recovery-list-table">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner p-2">
                  <h3><?php $recovery_C = 0;
                      echo $recovery_C = count($invoice_data);
                  ?> <span style="font-size: 23px !important; padding-left: 44px;"><?php 
                  $totalAmount = 0;

                  // Calculate the total amount
                  foreach ( $invoice_data as $invoice) {
                      $totalAmount += $invoice->final_total;  // Adjust 'final_amount' based on your actual field name
                  }
                  
                  // Output the total amount
                  echo 'Rs. ' . $totalAmount;
                  ?></span></h3>
                 

                  <p>Pending List</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer" data-target="recovery-list-table">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </a>
        <div class="row charts" >

        <div class="col-lg-6 col-md-6 col-12 p-2">
          <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Project Chart</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
          </div>
        </div>


        <div class="col-lg-6 col-md-6 col-12 p-2">
          <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Project Chart</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="recoveryChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
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
                    <div class="card-body table-responsive p-0" style="height: auto; padding:20px !important">
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
                          if(!empty($Projects)){
                            $completedProjects = [];
                            foreach ($Projects as $project): 
                                if($project->project_status == 'Finish') {
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

                                        <?php elseif($project->project_status == 'New Project'): ?>
                                        <small class="badge badge-primary"> New Project</small>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $project->DepartmentName; ?></td>
                                <td><?php echo $project->clientname; ?></td>
                                <td><?php echo $project->Client_mobile_no; ?></td>

                                <td><?php echo $project->Client_email; ?></td>
                                <td><?php echo date('j F Y', strtotime($project->Project_startdate)); ?></td>
                                <td><?php echo date('j F Y', strtotime($project->TargetedUAT_Date)); ?></td>

                                <td><?php echo date('j F Y', strtotime($project->Project_DeliveryDate)); ?></td>
                                <td><?php echo $project->POC_name; ?></td>
                                <td><?php echo $project->POC_mobile_no; ?></td>
                                <td><?php echo $project->POC_email; ?></td>

                            </tr>
                          <?php endforeach; }?>

                    <?php 
                    // Display completed projects after the loop
                    if(!empty($completedProjects)){
                    foreach ($completedProjects as $completedProject): 
                    ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $completedProject->projectName; ?></td>
                        <td><small class="badge badge-success"> Completed </small></td>
                        <td><?php echo $completedProject->DepartmentName; ?></td>
                        <td><?php echo $completedProject->clientname; ?></td>
                        <td><?php echo $completedProject->Client_mobile_no; ?></td>

                        <td><?php echo $completedProject->Client_email; ?></td>
                        <td><?php echo date('j F Y', strtotime($completedProject->Project_startdate)); ?></td>
                        <td><?php echo date('j F Y', strtotime($completedProject->Project_DeliveryDate)); ?></td>
                        <td><?php echo date('j F Y', strtotime($completedProject->TargetedUAT_Date)); ?></td>
                        <td><?php echo $completedProject->POC_name; ?></td>
                        <td><?php echo $completedProject->POC_mobile_no; ?></td>
                        <td><?php echo $project->POC_email; ?></td>

                    </tr>
                    <?php endforeach; }?>

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
                                  <th>Name</th>
                                  <th>Mobile No.</th>
                                  <th>Email</th>
                                  <th>Technology</th>
                                  <th>Joining Date</th>
                                  <th>Permanent Address</th>
                                  <th>Current Address</th>
                                  <th>Photo File</th>
                                  <th>Resume File</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                              // echo "<pre>";print_r($Employees);exit();
                              if (!empty($Employees)) {
                                  // Sort the employees alphabetically by their names

                                  $departmentName = 
                                  usort($Employees, function($a, $b) {
                                      return strcmp(strtolower($a->emp_name), strtolower($b->emp_name));
                                  });

                                  $count = 1;
                                  foreach ($Employees as $employee): 
                                      // Fetch department name if needed
                              ?>
                                      <tr>
                                          <td><?php echo $count++; ?></td>
                                          <td><?php echo $employee->emp_name; ?></td>
                                          <td><?php echo $employee->mobile_no; ?></td>
                                          <td><?php echo $employee->emp_email; ?></td>

                                          <td><?php echo $employee->DepartmentName; ?></td>
                                          <td><?php echo $employee->emp_joiningdate; ?></td>
                                          <td><?php echo $employee->permanent_address; ?></td>
                                          <td><?php echo $employee->current_address; ?></td>
                                          <td>
                        <?php if (!empty($employee->PhotoFile)): ?>
                            <div class="text-center">
                                <a href="<?php echo base_url('public/uploads/photos/' . $employee->PhotoFile); ?>" target="_blank" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-image"></i>
                                </a>
                               
                            </div>
                        <?php else: ?>
                            No photo available
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($employee->ResumeFile)): ?>
                            <div class="d-flex align-items-center">
                                <a href="<?php echo base_url('public/uploads/resumes/' . $employee->ResumeFile); ?>" target="_blank" class="btn btn-primary btn-sm mr-1">
                                    <i class="far fa-file-alt"></i>
                                </a>
                                <a href="<?php echo base_url('public/uploads/resumes/' . $employee->ResumeFile); ?>" download class="btn btn-secondary btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        <?php else: ?>
                            No resume available
                        <?php endif; ?>
                    </td>
                                      </tr>
                              <?php 
                                  endforeach;
                              } 
                              ?>
                          </tbody>
                        </table>

<


                        </div>
                    </div>
                </div>
            </div> 

            <div class="row attendance-list-table p-2" style="display: none;">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Attendance List:</b></h3>
                            <h6 class="text-right"><b><?= date('F j, Y'); ?></b></h6>
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



            <div class="row recovery-list-table p-2" style="display: none;">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Recovery List:</b></h3>
                            <h6 class="text-right"><b><?= date('F j, Y'); ?></b></h6>
                        </div>
                        <div class="card-body" >
                        <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr.No</th>
                        <th>Payment Status</th>
                        <th>Invoice Date</th>
                        <th>Client Name</th>
                        <th>Po No.</th>
                        <th>Vendor Code</th>
                        <th>Due Date</th>
                        <th>Total Amount</th>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>Final Total</th>  
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($invoice_data)) {  $i=1;?>
                        <?php foreach ($invoice_data as $data): 
                          
                          $adminModel = new \App\Models\Adminmodel();
                          $wherecond1 = array('is_deleted' => 'N', 'id' => $data->po_no);
                          $po_data = $adminModel->get_single_data('tbl_po', $wherecond1);
                          ?>
                            <tr>
                            <td><?php echo $i; ?></td>

                            <td>
                                    <?php if($data->payment_status == 'Pending'): ?>
                                        <small class="badge badge-danger"> Pending </small>
                                  
                                    <?php endif; ?>
                                </td>
                                
                                <td><?php echo $data->invoice_date; ?></td>

                               
                                <td><?php echo $data->client_name; ?></td>
                                <td><?php if(!empty($po_data)){ echo $po_data->doc_no;}?></td>

                                <td><?php echo $data->suppplier_code; ?></td>
                              

                                <td><?php echo $data->due_date; ?></td>
                                <td><?php echo $data->totalamounttotal; ?></td>

                                <td><?php echo $data->cgst; ?></td>

                                <td><?php echo $data->sgst; ?></td>
                                <td><?php echo $data->final_total; ?></td>

                                

                               

                                <!-- Add other table cells as needed -->
                            </tr>
                        <?php $i++; endforeach; ?>
                        <?php 
                        } ?>
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
    $(document).ready(function() {
        $(".more-info").on("click", function(event) {
            event.preventDefault();
            var target = $(this).data("target");
            var targetTable = $("." + target);

            if (targetTable.length) {
                // Hide all tables and the .chart section
                $(".project-table, .employee-table, .attendance-list-table, .recovery-list-table").hide();
               
                
                $(".charts").hide();

                // Show the target table
                targetTable.show();


            }
        });
    });
</script>

<script>
function openResume(url) {
    window.open(url, '_blank', 'toolbar=0,location=0,menubar=0');
}
</script>




<script>



  $(function () {
    // Pie Chart
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    
    var pieData = {
      
        labels: [
            'Finish',
            'WIP',
            'ON Hold',
            'New Project',
           
        ],
        datasets: [
            {
             

                data: [<?=$project_f ?>, <?=$project_w ?>, <?=$project_o ?>, <?=$project_n ?>],


                backgroundColor: ['#00a65a', '#f39c12', '#f56954', '#00c0ef',],
            }
        ]
    };
    
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
    };

    console.log(pieData);  // Debug: Check data in the console
    
    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });
});




$(function () {
    // Pie Chart
    var pieChartCanvas = $('#recoveryChart').get(0).getContext('2d');
    
    var pieData = {
      
        labels: [
            'Finish',
            'WIP',
            'ON Hold',
            'New Project',
           
        ],
        datasets: [
            {
             

                data: [<?=$project_f ?>, <?=$project_w ?>, <?=$project_o ?>, <?=$project_n ?>],


                backgroundColor: ['#00a65a', '#f39c12', '#f56954', '#00c0ef',],
            }
        ]
    };
    
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
    };

    console.log(pieData);  // Debug: Check data in the console
    
    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });
});


   
   </script>




