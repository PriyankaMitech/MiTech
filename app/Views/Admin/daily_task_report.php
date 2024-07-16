<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewApplicationsBtn"> Daily Task Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewApplicationsBtn">Daily Task Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <!-- Create Employee Card -->
            <div id="viewClientListCard" class="card mt-2" >
              <!-- <div class="card"> -->
              <div class="card-header">
                <h3 class="card-title viewApplicationsBtn"> Daily Task Report</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form id="searchForm" class="form-inline mb-3" method="post">
                  <div class="form-group mx-sm-3 mb-2">
                      <label for="searchName" class="sr-only">Employee Name:</label>
                      <select class="form-control" name="name" id="searchName">
                          <option value="">Select Employee Name</option>
                          <?php if (!empty($employeeData)) { ?>
                              <?php foreach ($employeeData as $data) { ?>
                                  <option value="<?=$data->Emp_id; ?>">
                                      <?= $data->emp_name; ?>
                                  </option>
                              <?php } ?>
                          <?php } ?>
                      </select>
                  </div>
                  <div class="form-group mx-sm-3 mb-2">
                      <label for="searchDate" class="sr-only">Date</label>
                      <input type="date" class="form-control" id="searchDate" name="date" value="<?= date('Y-m-d') ?>">
                  </div>
                  <button type="button" class="btn btn-primary mb-2" onclick="filterTasks()">Search</button>
              </form>
                <table id="tasksTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr.No</th>
                        <th>Employee Name</th>
                        <th>Project Name</th>
                        <th>Task</th>
                        <th>Worked Hours</th>
                        <th>Worked Minutes</th>
                        <th>Created At</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- Data will be populated via AJAX -->
                  </tbody>
                </table>
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
</div>

<?php echo view("Admin/Adminfooter.php"); ?>

<script>
function filterTasks() {
    var name = $('#searchName').val();
    var date = $('#searchDate').val();

    $.ajax({
        url: '<?= site_url('search_daily_task') ?>',
        type: 'POST',
        data: {
            name: name,
            date: date
        },
        success: function(response) {
            var tbody = $('#tasksTable tbody');
            tbody.empty();

            if (response.length > 0) {
                $.each(response, function(index, task) {
                    var row = '<tr>' +
                        '<td>' + task.id + '</td>' +
                        '<td>' + task.emp_name + '</td>' +
                        '<td>' + task.project_name + '</td>' +
                        '<td>' + task.task + '</td>' +
                        '<td>' + task.use_hours + '</td>' +
                        '<td>' + task.use_minutes + '</td>' +
                        '<td>' + task.created_at + '</td>' +
                        '</tr>';
                    tbody.append(row);
                });
            } else {
                tbody.append('<tr><td colspan="7">No tasks found.</td></tr>');
            }
        },
        error: function(xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}

$(document).ready(function() {
    // Trigger search on page load to show current date's tasks
    filterTasks();
});
</script>