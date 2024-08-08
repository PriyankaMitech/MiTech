<?php echo view('Admin/Adminsidebar.php'); ?>

<?php
// Detect if URL contains '/edit_holiday'
$showForm = false;
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($current_url, 'edit_holiday') !== false) {
    $showForm = true;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewHolidayListCard">Holiday List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewHolidayListCard">Holiday List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if ($showForm) { ?>
                        <a id="viewCreateHolidayBtn" class="btn btn-info mt-2" href="<?= base_url(); ?>holidays">View Holiday List</a>
                    <?php } else { ?>
                        <button id="viewCreateHolidayBtn" class="btn btn-info mt-2">Add Holiday</button>
                    <?php } ?>
                    <div id="viewHolidayListCard" class="card mt-2" <?php if ($showForm) echo 'style="display: none;"'; ?>>
                        <div class="card-header">
                            <h3 class="card-title">Holiday List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Holiday Date</th>
                                        <th>Holiday Title</th>
                                        <th>Description</th>
                                        <th>Holiday Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($holidays_data)) {
                                        $i = 1;
                                        foreach ($holidays_data as $data) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data->holiday_date; ?></td>
                                                <td><?= $data->holiday_title; ?></td>
                                                <td><?= $data->holiday_description; ?></td>
                                                <td><?= $data->holiday_type; ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>edit_holiday/<?= $data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_holidays" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card card-primary mt-2" id="addHolidayFormCard" <?php if (!$showForm) echo 'style="display: none;"'; ?>>
                        <div class="card-header">
                            <h3 class="card-title">Add Holiday <small></small></h3>
                        </div>
                        <form action="<?php echo base_url(); ?>set_holiday" method="post" id="holiday_form">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if (!empty($single_data)) { echo $single_data->id; } ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12 form-group">
                                        <label for="holiday_date">Holiday Date</label>
                                        <input type="date" class="form-control" name="holiday_date" value="<?php if (!empty($single_data)) { echo $single_data->holiday_date; } ?>" required>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 form-group">
                                        <label for="holiday_title">Holiday Title</label>
                                        <input type="text" class="form-control" name="holiday_title" value="<?php if (!empty($single_data)) { echo $single_data->holiday_title; } ?>" required>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 form-group">
                                        <label for="holiday_description">Description</label>
                                        <input type="text" class="form-control" name="holiday_description" value="<?php if (!empty($single_data)) { echo $single_data->holiday_description; } ?>" required>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 form-group">
                                        <label for="holiday_type">Holiday Type</label>
                                        <input type="text" class="form-control" name="holiday_type" value="<?php if (!empty($single_data)) { echo $single_data->holiday_type; } ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" value="" name="submit" id="submit" class="btn btn-primary"><?php if (!empty($single_data)) { echo 'Update'; } else { echo 'Submit'; } ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo view('Admin/Adminfooter.php'); ?>
    <script>
        $(document).ready(function() {
            // Initialize DataTable only if it hasn't been initialized yet
            if (!$.fn.DataTable.isDataTable('#example1')) {
                $('#example1').DataTable();
            }

            $('#viewCreateHolidayBtn').on('click', function() {
                var $viewHolidayListCard = $('#viewHolidayListCard');
                var $addHolidayFormCard = $('#addHolidayFormCard');
                var $button = $('#viewCreateHolidayBtn');

                if ($viewHolidayListCard.is(':visible')) {
                    $viewHolidayListCard.hide();
                    $addHolidayFormCard.show();
                    $button.text('Holiday List');
                } else {
                    $viewHolidayListCard.show();
                    $addHolidayFormCard.hide();
                    $button.text('Add Holiday');
                }
            });
        });
    </script>
</div>
