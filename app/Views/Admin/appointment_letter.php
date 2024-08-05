<?php echo view('Admin/Adminsidebar.php'); ?>


<?php
// Detect if URL contains '/editlocalbrand/1'
$showForm = false;
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($current_url, 'edit_appointment') !== false) {
    $showForm = true;
}
?>

<style>
    .memoreplybtn {
        color: #fff;
        background-color: #18949970 !important;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewAppointmentLetterListCard">Appointment LetterList</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewAppointmentLetterListCard">Appointment LetterList</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <?php if($showForm) { ?>
                        <a id="viewCreateAppointmentLetterBtn" class="btn btn-info mt-2" href="<?=base_url(); ?>appointment_letter">Appointment Letter List</a>

                    <?php }else{ ?>
                        <button id="viewCreateAppointmentLetterBtn" class="btn btn-info mt-2">+ Create Appointment Letter</button>

                        <?php } ?>

                    
                    <!-- Appointment LetterList Card -->
                    <div id="viewAppointmentLetterListCard" class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Appointment Letter List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Appointmentletter Date</th>
                                        <th>Candidate Name</th>
                                        <th>Position</th>
                                        <th>Salary Pay</th>
                                        <th>Variable Pay</th>
                                        <th>Joining Date</th>
                                        <th>Joining Time</th>
                                        <th>Notice Period</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($appointment_data)) {
                                        $i = 1;
                                        foreach ($appointment_data as $data) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data->appointmentletter_date; ?></td>
                                                <td><?= $data->candidate_name; ?></td>
                                                <td><?= $data->position; ?></td>
                                                <td><?= $data->salary_pay; ?></td>
                                                <td><?= $data->variable_pay; ?></td>
                                                <td><?= $data->joining_date; ?></td>
                                                <td><?= $data->joining_time; ?></td>
                                                <td><?= $data->notice_period; ?></td>
                                                <td>
                                                    <a href="edit_appointment/<?= $data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete_compan/<?= base64_encode($data->id); ?>/tbl_appointment" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Appointment LetterReply List Card -->
           
                    
                    <!-- Create Appointment LetterForm -->
                    <div id="addAppointmentLetterFormCard" class="card card-primary mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Add Appointment Letter<small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>set_appointment" method="post" id="appointment_form">
                       
                            <div class="card-body">

                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="appointmentletter_date">Appointment Letter Date : </label>
                                    <input type="date" name="appointmentletter_date" class="form-control date-text" id="appointmentletter_date" value="<?php if(!empty($single_data)){ echo $single_data->appointmentletter_date; }else { echo date('Y-m-d'); }?>"  id="appointmentletter_date">
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                        <label for="candidate_name">Candidate Name : </label>
                                        <input type="text" name="candidate_name" class="form-control date-text" id="candidate_name" placeholder="Candidate Name" value="<?php if(!empty($single_data)){ echo $single_data->candidate_name; }?>"  id="candidate_name">
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="position">Position</label>
                                        <input type="text" name="position" class="form-control date-text" id="position" placeholder="Position" value="<?php if(!empty($single_data)){ echo $single_data->position; } ?>">
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="salary_pay"> Salary Pay:</label>
                                        <input type="text" name="salary_pay" class="form-control date-text" id="salary_pay" placeholder="Salary Pay" value="<?php if(!empty($single_data)){ echo $single_data->salary_pay; } ?>">
                                </div>

                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="variable_pay"> Variable Pay :</label>
                                        <input type="text" name="variable_pay" class="form-control date-text" id="variable_pay" placeholder="Variable Pay" value="<?php if(!empty($single_data)){ echo $single_data->variable_pay; } ?>">
                                </div>

                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="joining_date">Joining Date : </label>
                                    <input type="date" name="joining_date" class="form-control date-text" id="joining_date" value="<?php if(!empty($single_data)){ echo $single_data->joining_date; }else { echo date('Y-m-d'); }?>"  id="joining_date">
                                </div>

                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="joining_time">Joining Time : </label>
                                    <input type="time" name="joining_time" class="form-control date-text" id="joining_time" value="<?php if(!empty($single_data)){ echo $single_data->joining_time; }?>"  id="joining_time">
                                </div>

                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="notice_period"> Notice Period :</label>
                                        <input type="text" name="notice_period" class="form-control date-text" id="notice_period" placeholder="Notice Period" value="<?php if(!empty($single_data)){ echo $single_data->notice_period; } ?>">
                                </div>


                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="select_signature"> Select Signature :</label>
                                        <input type="file" name="select_signature" class="form-control date-text" id="select_signature"  value="<?php if(!empty($single_data)){ echo $single_data->select_signature; } ?>">
                                </div>

                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="select_stamp"> Select Stamp :</label>
                                        <input type="file" name="select_stamp" class="form-control date-text" id="select_stamp"  value="<?php if(!empty($single_data)){ echo $single_data->select_stamp; } ?>">
                                </div>

                            </div>
                           
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button type="submit" value=""  name="submit" id="submit" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo view('Admin/Adminfooter.php'); ?>

<script>
$(document).ready(function() {
  


    $(document).ready(function() {
        $('#viewCreateAppointmentLetterBtn').on('click', function() {
            var $viewAppointmentLetterListCard = $('#viewAppointmentLetterListCard');
            var $addAppointmentLetterFormCard = $('#addAppointmentLetterFormCard');
            var $button = $('#viewCreateAppointmentLetterBtn');

            if ($viewAppointmentLetterListCard.is(':visible')) {
                $viewAppointmentLetterListCard.hide();
                $addAppointmentLetterFormCard.show();
                $button.text('Appointment Letter List');
            } else {
                $viewAppointmentLetterListCard.show();
                $addAppointmentLetterFormCard.hide();
                $button.text('Add Appointment Letter');
            }
        });
    });

    
});
</script>
