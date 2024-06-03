<?php echo view("Employee/employeeSidebar"); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button id="viewApplicationsBtn" class="btn btn-info mt-2 ">Apply For Leave</button>
                    <!-- View Applications Card -->
                    <div id="viewApplicationsCard" class="card mt-2" >
                        <div class="card-header">
                            <h3 class="card-title">View Applications</h3>
                        </div>
                        <div class="card-body">
                            <?php if (empty($application)): ?>
                            <p>No application found</p>
                            <?php else: ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Rejoining Date</th>
                                        <th>Status</th>
                                        <th>Application Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $counter = 1; // Initialize a counter variable

                                            if(!empty($application)){
                                            foreach ($application as $app): 

                                            ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td> <!-- Display and increment the counter -->
                                        <td><?php echo date('d F Y', strtotime($app->from_date)); ?></td>
                                        <td><?php echo date('d F Y', strtotime($app->to_date)); ?></td>
                                        <td><?php echo date('d F Y', strtotime($app->rejoining_date)); ?></td>
                                        <td>
                                            <?php 
                                            switch ($app->Status) {
                                                case 'P':
                                                    echo '<span class="badge badge-warning">Pending</span>';
                                                    break;
                                                case 'A':
                                                    echo '<span class="badge badge-success">Approved</span>';
                                                    break;
                                                case 'R':
                                                    echo '<span class="badge badge-danger">Rejected</span>';
                                                    break;
                                                default:
                                                    echo '';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo date('d F Y', strtotime($app->created_at)); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php }?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card mt-2" style="display: none;">
                        <div class="card-header" >
                            <h3 class="card-title">Leave Form</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= site_url('leave-request') ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="from_date">From Date</label>
                                            <input type="date" class="form-control" id="from_date" name="from_date"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="rejoining_date">Rejoining Date</label>
                                            <input type="date" class="form-control" id="rejoining_date"
                                                name="rejoining_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="reason">Reason</label>
                                            <textarea class="form-control" id="reason" name="reason" rows="3"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="to_date">To Date</label>
                                            <input type="date" class="form-control" id="to_date" name="to_date"
                                                required>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="employee_name">Task Handover To</label>
                                            <select class="form-control" id="employee_id" name="hand_emp_id" required>
                                                <option value="">Select Employee</option>
                                                <?php foreach ($Employee as $employee): ?>
                                                <option value="<?php echo $employee->Emp_id; ?>">
                                                    <?php echo $employee->emp_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo view("Employee/empfooter"); ?>
<script>
$(document).ready(function() {
    $('#viewApplicationsBtn').on('click', function() {
        var $viewApplicationsCard = $('#viewApplicationsCard');
        var $leaveForm = $('.card').not('#viewApplicationsCard');
        var $button = $('#viewApplicationsBtn');

        if ($viewApplicationsCard.is(':hidden')) {
            $viewApplicationsCard.show();
            $leaveForm.hide();
            $button.text('Apply for Leave'); // Change text when showing applications
        } else {
            $viewApplicationsCard.hide();
            $leaveForm.show();
            $button.text('View Leave Applications'); // Change text when showing leave form
        }
    });
});

</script>
<script>
var today = new Date().toISOString().split('T')[0];
document.getElementById('from_date').setAttribute('min', today);
document.getElementById('from_date').addEventListener('change', function() {
    var fromDate = this.value;
    document.getElementById('to_date').setAttribute('min', fromDate);
});
document.getElementById('to_date').addEventListener('change', function() {
    var toDate = this.value;
    document.getElementById('rejoining_date').setAttribute('min', toDate);
});
</script>