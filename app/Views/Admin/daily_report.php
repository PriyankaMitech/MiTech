<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Daily Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Daily Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="fromdate" class="text-secondary">From Date</label>
                    <input type="date" id="fromdate" name="fromdate" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="todate" class="text-secondary">To Date</label>
                    <input type="date" id="todate" name="todate" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="empname" class="text-secondary">Employee Name</label>
                    <input type="text" id="empname" name="empname" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>&nbsp;</label>
                    <button id="filterBtn" class="btn btn-primary form-control">Filter</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daily Work Report</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Employee Name</th>
                                        <th>Project Name</th>
                                        <th>Task</th>
                                        <th>Hours</th>
                                        <th>Minutes</th>
                                        <!-- <th>Date</th>
                                        <th>Time</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty(!empty($dailyreport))){ ?>
                                    <?php $count = 1; ?>
                                    <?php foreach ($dailyreport as $row): ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row->emp_name; ?></td>
                                        <td><?php echo $row->project_name; ?></td>
                                        <td><?php echo $row->task; ?></td>
                                        <td><?php echo $row->use_hours; ?></td>
                                        <td><?php echo $row->use_minutes; ?></td>
                                        <!-- <td><?php // echo date('Y-m-d',//strtotime($row->created_at)); ?></td>
                                        <td><?php //echo date('H:i:s', strtotime($row->created_at)); ?></td> -->
                                    </tr>
                                    <?php $count++; ?>
                                    <?php endforeach; ?>
                                    <?php }else{ ?>
                                        <tr>
                                        <td colspan="8">No Data Available</td>
                                      
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div id="noDataMessage" class="alert alert-warning mt-3" style="display: none;">
                                No data found.
                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo view('Admin/Adminfooter.php');?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#filterBtn').click(function() {
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        var empname = $('#empname').val();

        var anyRowVisible = false; // Flag to track if any row is visible

        $('#example1 tbody tr').each(function() {
            var row = $(this);
            var rowDate = new Date(row.find('td:eq(6)').text());
            var rowEmpName = row.find('td:eq(1)').text();

            var fromDateFilter = (fromdate === '') || (new Date(fromdate) <= rowDate);
            var toDateFilter = (todate === '') || (new Date(todate) >= rowDate);
            var empNameFilter = (empname === '') || (rowEmpName.toLowerCase().includes(empname.toLowerCase()));

            if (fromDateFilter && toDateFilter && empNameFilter) {
                row.show();
                anyRowVisible = true; // Set flag if any row is visible
            } else {
                row.hide();
            }
        });

        // If no rows are visible, show the message
        if (!anyRowVisible) {
            $('#noDataMessage').show();
        } else {
            $('#noDataMessage').hide();
        }
    });
});
</script>