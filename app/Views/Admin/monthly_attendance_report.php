<?php echo view("Admin/Adminsidebar.php"); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white"> Monthly Attendance Report </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white"> Monthly Attendance Report </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="<?= base_url(); ?>attendance"  class="btn btn-info mt-2 monthbtn">Current Month</a>
                    <!-- Month and Year Selection Form -->
                    <form action="<?= base_url('getallmonthdata') ?>" method="post" class="mt-2">
                        <div class="form-row align-items-center">
                            <div class="col-md-4">
                                <label class="sr-only" for="month">Month</label>
                                <select class="form-control" id="month" name="month">
                                    <?php
                                    $currentMonth = date('n'); // Get current month
                                    for ($m = 1; $m <= 12; $m++) {
                                        $month = date('F', mktime(0, 0, 0, $m, 1));
                                        $selected = (isset($selectedMonth) && $m == $selectedMonth) ? 'selected' : ''; // Check if $selectedMonth is set
                                        $selected = ($m == $currentMonth && !isset($selectedMonth)) ? 'selected' : $selected; // Set current month as selected if $selectedMonth is not set
                                        echo "<option value='$m' $selected>$month</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="sr-only" for="year">Year</label>
                                <input type="text" class="form-control" id="year" name="year" value="<?php echo $selectedYear ?? date('Y'); ?>"> <!-- Use selectedYear if set, otherwise use current year -->
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">View Attendance</button>
                            </div>
                        </div>
                    </form>

                    <!-- Attendance Report -->
                    <div id="viewPOListCard" class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Attendance Report for <?= date('F Y', strtotime($report['firstDayOfMonth'])) ?></h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Total Present Days</th>
                                        <th>Total Absent Days</th>
                                        <th>Total Weekend Days</th>
                                        <th>Total Working Days in Month</th>

                                        <th>Total Days in Month</th>
                                        <?php
                                        $date = $report['firstDayOfMonth'];
                                        while (strtotime($date) <= strtotime($report['lastDayOfMonth'])):
                                        ?>
                                            <th><?= date('d', strtotime($date)) ?></th>
                                        <?php
                                            $date = date('Y-m-d', strtotime($date . ' +1 day'));
                                        endwhile;
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($report['allEmployees'] as $employee): ?>
                                        <?php
                                            $totalPresent = 0;
                                            $totalAbsent = 0;
                                            $totalDaysOff = 0;
                                            $totalwdays = 0;

                                            $totalDaysInMonth = 0;
                                            $currentDate = date('Y-m-d');
                                            $date = $report['firstDayOfMonth'];
                                            while (strtotime($date) <= strtotime($report['lastDayOfMonth'])):
                                                $totalDaysInMonth++;
                                                $presentEmpIds = isset($report['attendanceData'][$date]) ? $report['attendanceData'][$date] : [];
                                                $dayOfWeek = date('N', strtotime($date)); // Get the day of the week (1 = Monday, 7 = Sunday)
                                                if ($dayOfWeek == 6 || $dayOfWeek == 7) {
                                                    // Saturday (6) or Sunday (7)
                                                    $totalDaysOff++;
                                                    $attendanceStatus = "Off";
                                                } elseif (strtotime($date) <= strtotime($currentDate)) {
                                                    if (in_array($employee->Emp_id, $presentEmpIds)) {
                                                        $totalPresent++;
                                                        $attendanceStatus = "P";
                                                    } else {
                                                        $totalAbsent++;
                                                        $attendanceStatus = "A";
                                                    }
                                                } else {
                                                    // Future dates get a blank cell
                                                    $attendanceStatus = "";
                                                }
                                                $date = date('Y-m-d', strtotime($date . ' +1 day'));
                                                $totalwdays =$totalDaysInMonth  - $totalDaysOff;

                                            endwhile;
                                        ?>
                                        <tr>
                                            <td><?= $employee->emp_name ?></td>
                                            <td><?= $totalPresent ?></td>
                                            <td><?= $totalAbsent ?></td>
                                            <td><?= $totalDaysOff ?></td>
                                            <td><?= $totalwdays ?></td>

                                            <td><?= $totalDaysInMonth ?></td>
                                            <?php
                                            $date = $report['firstDayOfMonth'];
                                            while (strtotime($date) <= strtotime($report['lastDayOfMonth'])):
                                                $presentEmpIds = isset($report['attendanceData'][$date]) ? $report['attendanceData'][$date] : [];
                                                $dayOfWeek = date('N', strtotime($date)); // Get the day of the week (1 = Monday, 7 = Sunday)
                                                if ($dayOfWeek == 6 || $dayOfWeek == 7) {
                                                    // Saturday (6) or Sunday (7)
                                            ?>
                                            <td style="background-color: #d3d3d3; color: #000; text-align: center; ">Off</td>
                                                <?php
                                                } elseif (strtotime($date) <= strtotime($currentDate)) {
                                                ?>
                                                <td style="<?= in_array($employee->Emp_id, $presentEmpIds) ? 'background-color: #c8e6c9; color: #000; text-align: center; font-weight: bold' : 'background-color: #ffcdd2; color: #000; text-align: center; font-weight: bold ' ?>">
                                                    <?= in_array($employee->Emp_id, $presentEmpIds) ? 'P' : 'A' ?>
                                                </td>

                                            <?php
                                                } else {
                                                    // Future dates get a blank cell
                                            ?>
                                                    <td></td>
                                            <?php
                                                }
                                                $date = date('Y-m-d', strtotime($date . ' +1 day'));
                                            endwhile;
                                            ?>
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

<?php echo view("Admin/Adminfooter.php"); ?>
