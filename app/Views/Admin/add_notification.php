<?php echo view('Admin/Adminsidebar.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notification</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active text-white">Notifications</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Notifications</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form id="notificationForm" method="post" action="<?php echo base_url(); ?>set_notification">
              <div class="row">
                <div class="col-md-6">
                   
                </div>
               
                <div class="form-check col-md-12 fcheckl">
                    <label class="">Select Employee(s)</label> <br>
                </div>
                <div class="form-check col-md-12">
                    <input class="form-check-input " type="checkbox" value="all" id="selectAllEmployees">
                    <label class="form-check-label " for="selectAllEmployees"> Select All Employees </label>
                </div>
                <?php foreach ($emplist as $employee): ?>
                    <div class="form-check col-md-3">
                        <input class="form-check-input paddingti" name="selectedEmployees" type="checkbox" value="<?php echo $employee->Emp_id; ?>" id="employee_<?php echo $employee->Emp_id; ?>">
                        <label class="form-check-label paddingtl" for="employee_<?php echo $employee->Emp_id; ?>">
                        <?php echo $employee->emp_name; ?>
                        </label>
                    </div>
                <?php endforeach; ?>

                <input type="hidden" name="selectedEmployees" id="selectedEmployeesInput">
          
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="notification_date">Select Date</label>
                      <input type="date" id="notification_date" class="form-control" name="notification_date" value="<?php echo date('Y-m-d'); ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="notification_description">Create Notifications</label>
                    <textarea id="notification_description" class="form-control" rows="4" name="notification_description" required></textarea>
                  </div>
                </div>
                <!-- Other common form elements -->
               
              </div>   
              <div class="row">
              <div class="col-md-4">                   
                  <!-- Form Action -->
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> 
              </div>                

              
                <!-- <div class="col-md-12 text-right">
                    <button type="submit" name="submit" value="submit" class="submitButton btn btn-primary" >Submit</button>
                </div> -->
              
            </form>
          </div>
      </div>
      <!-- /.container-fluid -->

    </section>
    </div>
    <!-- /.content -->

    <?php echo view("Admin/Adminfooter.php"); ?> 

    <script>
$(document).ready(function() {
    $('#selectAllEmployees').change(function() {
        $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });

    $('input[type="checkbox"]').change(function() {
        if ($(this).prop('checked') == false) {
            $('#selectAllEmployees').prop('checked', false);
        }
    });

    $('form').submit(function() {
        var selectedEmployee = [];
        var allEmployeesChecked = $('#selectAllEmployees').is(':checked');
        if (allEmployeesChecked) {
            selectedEmployee.push('all');
        } else {
            $('input[type="checkbox"]:checked').each(function() {
                if ($(this).val() !== 'all') {
                    selectedEmployee.push($(this).val());
                }
            });
        }
        $('#selectedEmployeesInput').val(selectedEmployee.join(','));
    });
});
</script>



                                    