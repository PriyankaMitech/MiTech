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
                     

                                     <h3><?php
                      //                 $recovery_C = 0;
                      // echo $recovery_C = count($invoice_dataall);
                  ?> <span style="font-size: 23px !important; "><?php 
                  $totalAmount = 0;

                  // Calculate the total amount
                  foreach ( $invoice_dataall as $invoice) {
                      $totalAmount += $invoice->final_total;  // Adjust 'final_amount' based on your actual field name
                  }
                  
                  // Output the total amount
                  echo 'Rs. ' . $totalAmount;
                  ?></span></h3>
                        <p>Turnover Details</p>
                    </div>
                    <div class="icon">

                    <i class="fas fa-file-invoice"></i>
                    
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
          <?php if(!empty($Projects)){ ?>

        <div class="col-lg-6 col-md-6 col-12 p-2">
          <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Project Status</h3>

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
        <?php } ?>

        <?php if(!empty($invoice)){ ?>

        <div class="col-lg-6 col-md-6 col-12 p-2">
          <div class="card card-success" >
                <div class="card-header" style="background-color:#2d28a7 !important">
                  <h3 class="card-title">Revenue Share</h3>

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
        <?php } ?>
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
                    <table  class="table-example1 table table-bordered table-striped">
                        <thead>
                          <tr>
                          <th>Sr. No.</th>
                            <th>Project Name</th>
                            <th>Project Status</th>

                            <th>Development Type</th>
                         
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
                                        <small class="badge wc badge-info"> WIP </small>
                                    <?php elseif($project->project_status == 'ON Hold'): ?>
                                        <small class="badge wc badge-warning"> ON Hold </small>

                                        <?php elseif($project->project_status == 'New Project'): ?>
                                        <small class="badge wc badge-primary"> New Project</small>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $project->DepartmentName; ?></td>
                               
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
                        <td><small class="badge wc badge-success"> Completed </small></td>
                        <td><?php echo $completedProject->DepartmentName; ?></td>
                
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
                        <table  class="table-example1 table table-bordered table-striped">
                            <thead>
                            <tr>
                                  <th>Sr.No</th>
                                  <th>Show Invoice</th>
                                  <th>Invoice Date</th>
                                  <th>Invoice NO.</th>

                                  <th>Client Name</th>
                              
                                  <th>Due Date</th>
                                  <th>Total Amount</th>
                                  <th>GST</th>
                                  <th>Final Total</th>  
                            </tr>
                            </thead>
                            <tbody>
                              <?php if(!empty($invoice_dataall)) {  $i=1;?>
                                  <?php foreach ($invoice_dataall as $data): 
                                    
                                    $adminModel = new \App\Models\Adminmodel();
                                    $wherecond1 = array('is_deleted' => 'N', 'id' => $data->po_no);
                                    $po_data = $adminModel->get_single_data('tbl_po', $wherecond1);
                                    ?>
                                      <tr>
                                      <td><?php echo $i; ?></td>

                                      
                                          <td> <a href="invoice/<?=$data->id ; ?>" target="_blank"><i class="fas fa-file-invoice"></i> Show Invocie</a></td>
                                          
                                          <td><?php echo $data->invoice_date; ?></td>

                                          <td><?php echo $data->po_no; ?></td>


                                        
                                          <td><?php echo $data->client_name; ?></td>
                                        

                                          <td><?php echo $data->due_date; ?></td>
                                          <td><?php echo $data->totalamounttotal; ?></td>

                                          <td><?php  $gst = 0; echo $gst = $data->cgst + $data->sgst; ?> %</td>

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

            <div class="row attendance-list-table p-2" style="display: none;">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Attendance List : </b></h3>
                            <h6 class="text-right"><b><?= date('F j, Y'); ?></b></h6>
                        </div>
                        <div class="card-body" >
                        <table  class="table-example1 table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                      <th>Employee Name</th>
                                      
                                      <th>Punch In</th>
                                      <th>Time Out</th>

                                      <th>Punch Out</th>
                                      <th>Total Time </th>

                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $count= 1;?>
                                  <?php if(!empty($attendance_list)){
                                    
                                    
                                    ?>

                                  <?php foreach ($attendance_list as $data):
                                    
                                    $adminModel = new \App\Models\Adminmodel();
                                    $wherecond = array('Emp_id' =>$data->Emp_id);
                                    $empdata = $adminModel->getsinglerow('tbl_timeout', $wherecond);
                                    ?>
                                    
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $data->emp_name; ?></td>
                                    <td>
                                      <?php 
                                      if (!empty($data->start_time)) { 
                                          echo date("H:i", strtotime($data->start_time)); 
                                      }
                                      ?>
                                  </td>
                                    <td>
                                    <?php 
                                      if (!empty($empdata)) { 
                                          echo $empdata->from_time . " - " . $empdata->to_time; 

                                          // Convert times to timestamps
                                          $from_time = strtotime($empdata->from_time);
                                          $to_time = strtotime($empdata->to_time);
                                          
                                          // Check if conversion was successful and calculate the time difference
                                          if ($from_time !== false && $to_time !== false && $to_time > $from_time) {
                                              $total_seconds = $to_time - $from_time;
                                              $hours = floor($total_seconds / 3600);
                                              $minutes = floor(($total_seconds % 3600) / 60);
                                              echo " (" . $hours . "h " . $minutes . "m)";
                                          } else {
                                              echo " (Invalid time)";
                                          }
                                      }
                                      ?>
                                  </td>                                    
                                  <td>
                                  <?php 
                                      if (!empty($data->end_time)) { 
                                          echo date("H:i", strtotime($data->end_time)); 
                                      }
                                      ?>
                                  </td>

                                  <td>
                                    <?php 
                                    if (!empty($data->start_time) && !empty($data->end_time)) { 
                                        $start_time = strtotime($data->start_time);
                                        $end_time = strtotime($data->end_time);
                                        $total_seconds = $end_time - $start_time;
                                        $hours = floor($total_seconds / 3600);
                                        $minutes = floor(($total_seconds % 3600) / 60);
                                        echo $hours . "h " . $minutes . "m";
                                    }
                                    ?>
                                </td>
                                    
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
                            <h3 class="card-title"><b>Pendding List:</b></h3>
                            <h6 class="text-right"><b><?= date('F j, Y'); ?></b></h6>
                        </div>
                        <div class="card-body" >
                        <table  class="table-example1 table table-bordered table-striped">
                            <thead>
                            <tr>
                                  <th>Sr.No</th>
                                  <th>Payment Status</th>
                                  <th>Show Invoice</th>
                                  <th>Invoice Date</th>
                                  <th>Invoice NO.</th>

                                  <th>Client Name</th>
                              
                                  <th>Due Date</th>
                                  <th>Total Amount</th>
                                  <th>GST</th>
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
                                                  <small class="badge wc badge-danger"> Pending </small>
                                            
                                              <?php endif; ?>
                                          </td>

                                          <td> <a href="invoice/<?=$data->id ; ?>" target="_blank"><i class="fas fa-file-invoice"></i> Show Invocie</a></td>
                                          
                                          <td><?php echo $data->invoice_date; ?></td>

                                          <td><?php echo $data->po_no; ?></td>


                                        
                                          <td><?php echo $data->client_name; ?></td>
                                        

                                          <td><?php echo $data->due_date; ?></td>
                                          <td><?php echo $data->totalamounttotal; ?></td>

                                          <td><?php  $gst = 0; echo $gst = $data->cgst + $data->sgst; ?> %</td>

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
      datasets: [{
        data: [<?=$project_f ?>, <?=$project_w ?>, <?=$project_o ?>, <?=$project_n ?>],
        backgroundColor: ['#00a65a', '#f39c12', '#f56954', '#00c0ef'],
      }]
    };
    
    var pieOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        position: 'right'
      }
    };

    console.log(pieData);  // Debug: Check data in the console
    
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    });
  });
</script>



<script>
  $(function () {
    // Extract labels and data from PHP variables
    var labels = <?php echo json_encode($serviceNames); ?>;
    var counts = <?php echo json_encode(array_values($counts)); ?>;
    var amounts = <?php echo json_encode(array_values($totalAmounts)); ?>;

    // Function to generate a random color
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Generate a distinct color for each label
    var backgroundColors = labels.map(function() {
        return getRandomColor();
    });

    var pieData = {
        labels: labels,
        datasets: [{
            data: counts,
            backgroundColor: backgroundColors,
        }]
    };

    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            position: 'right'
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var label = data.labels[tooltipItem.index] || '';
                    var count = data.datasets[0].data[tooltipItem.index] || 0;
                    var amount = amounts[tooltipItem.index] || 0;
                    return label + ': Count = ' + count + ', Amount = ' + amount;
                }
            }
        }
    };

    console.log(pieData);  // Debug: Check data in the console

    var pieChartCanvas = $('#recoveryChart').get(0).getContext('2d');
    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });
});
</script>





