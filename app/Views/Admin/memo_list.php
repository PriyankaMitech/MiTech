<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white viewMemoListCard">Memo List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewMemoListCard">Memo List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <button id="viewCreateMemoBtn" class="btn btn-info mt-2">Create Memo</button>
                    <!--  Service List Card -->
                    <div id="viewMemoListCard" class="card mt-2" >
                        <div class="card-header">
                            <h3 class="card-title">Memo List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Memo Issued Date</th>
                                        <th>Memo for the Date</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // echo "<pre>";print_r($emp_data);exit();
                                    if (!empty($memo_data)) {
                                        $i = 1; ?>
                                        <?php foreach ($memo_data as $data) {  
                                            // print_r($data);?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data->emp_name; ?></td>
                                                <td><?= $data->today_date; ?></td>
                                                <td><?= $data->memo_start_date; ?></td>
                                                <td><?= $data->memo_subject; ?></td>
                                                <td>
                                                    <a href="edit_memo/<?= $data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_memo" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    <?php } ?>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- Create Memo Form -->
                    <div class="card card-primary mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Add Memo <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>set_memo" method="post" id="memo_form">
                       
                            <div class="card-body">

                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                            <div class="row">
                            <div class="col-lg-3 col-md-3 col-12 form-group">
                                    <label for="emp_name">Employee Name:</label>
                                        <select class="form-control" name="emp_name" id="emp_name" required>
                                            <option value="" disabled selected>Select a Employee</option>
                                            <?php foreach ($emp_data as $emp): ?>
                                            <option value="<?= $emp->Emp_id ?>"
                                                <?= !empty($single_data) && $single_data->emp_id == $emp->Emp_id ? 'selected' : '' ?>>
                                                <?= $emp->emp_name ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <span id="emp_nameError" style="color: crimson;"></span>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                        <label for="current_date">Memo's Date : </label>
                                        <input type="date" name="current_date" class="form-control date-text" id="current_date" placeholder="Today's Date" value="<?php if(!empty($single_data)){ echo $single_data->today_date; }else { echo date('Y-m-d'); }?>"  id="currentDate">
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="memoStart_date">From : Memo for the date</label>
                                    <!-- <div class="d-flex">
                                        <span>From</span> -->
                                        <input type="date" name="memo_start_date" class="form-control date-text" id="memo_start_date" placeholder="Memo Start Date" value="<?php if(!empty($single_data)){ echo $single_data->memo_start_date; } ?>">
                                    <!-- </div> -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="memoEnd_date"> To :</label>
                                    <!-- <div class="d-flex">
                                        <span>To</span> -->
                                        <input type="date" name="memo_end_date" class="form-control date-text" id="memo_end_date" placeholder="Memo End Date" value="<?php if(!empty($single_data)){ echo $single_data->memo_end_date; } ?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-12 form-group">
                                    <label for="memo_subject">Subject for the Memo : </label>
                                    <textarea  name="memo_subject" class="form-control" id="memo_subject" placeholder="Subject of the memo" ><?php if(!empty($single_data)){ echo $single_data->memo_subject;} ?></textarea>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 form-group">
                                    <label for="admin_name">Admin Name :</label>
                                    <input type="text" name="admin_name" class="form-control" id="admin_name" placeholder="Admin name" value="<?php if(!empty($single_data)){ echo $single_data->admin_name;} ?>">
                                    <span id="admin_nameError" style="color: crimson;"></span>
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
<?php echo view('Admin/Adminfooter.php');?> 
<script>
$(document).ready(function() {
    $('#viewCreateMemoBtn').on('click', function() {
        var $viewMemoListCard = $('#viewMemoListCard');
        var $leaveForm = $('.card').not('#viewMemoListCard');
        var $button = $('#viewCreateMemoBtn');
        var $button1 = $('.viewMemoListCard');


        if ($viewMemoListCard.is(':hidden')) {
            $viewMemoListCard.show();
            $leaveForm.hide();
            $button.text('Create Memo'); // Change text when showing Memo List
            $button1.text('Memo List'); 
        } else {
            $viewMemoListCard.hide();
            $leaveForm.show();
            $button.text('View Memo List'); // Change text when showing Create Memo form
            $button1.text('Create Memo'); 
        }
    });
});
</script>      
