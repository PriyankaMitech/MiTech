<?php echo view('Admin/Adminsidebar.php'); ?>

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
                    <h1 class="text-white viewMemoListCard">Memo List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white viewMemoListCard">Memo List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <button id="viewCreateMemoBtn" class="btn btn-info mt-2">Create Memo</button>
                    <button id="viewMemoReplyBtn" class="btn memoreplybtn mt-2">Memo Replies</button>
                    
                    <!-- Memo List Card -->
                    <div id="viewMemoListCard" class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Memo List</h3>
                        </div>
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
                                    <?php if (!empty($memo_data)) {
                                        $i = 1;
                                        foreach ($memo_data as $data) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data->emp_name; ?></td>
                                                <td><?= $data->today_date; ?></td>
                                                <td><?= $data->memo_start_date; ?></td>
                                                <td><?= $data->memo_subject; ?></td>
                                                <td>
                                                    <a href="edit_memo/<?= $data->id; ?>"><i class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete_compan/<?= base64_encode($data->id); ?>/tbl_memo" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Memo Reply List Card -->
                    <div id="viewMemoReplyCard" class="card mt-2" style="display: none;">
                        <div class="card-header">
                            <h3 class="card-title">Memo Replies</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Memo Subject</th>
                                        <th>Employee Name</th>
                                        <th>Reply Date</th>
                                        <th>Reply</th>
                                        <th>Attachment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($memo_data)) {
                                        $i = 1;
                                        foreach ($memo_data as $data) {
                                            if (!empty($data->memo_reply)) { ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $data->memo_subject; ?></td>
                                                    <td><?= $data->emp_name; ?></td>
                                                    <td><?= $data->memo_reply_date; ?></td>
                                                    <td><?= $data->memo_reply; ?></td>
                                                    <td>
                                                        <?php if (!empty($data->memo_file)) { ?>
                                                            <a href="<?= base_url(); ?>uploads/memo_files/<?= $data->memo_file; ?>" target="_blank" class="btn btn-link">View File</a>
                                                        <?php } else { ?>
                                                            No Attachment
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php $i++;
                                            }
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
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
                                        <input type="date" name="memo_start_date" class="form-control date-text" id="memo_start_date" placeholder="Memo Start Date" value="<?php if(!empty($single_data)){ echo $single_data->memo_start_date; } ?>">
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 form-group">
                                    <label for="memoEnd_date"> To :</label>
                                        <input type="date" name="memo_end_date" class="form-control date-text" id="memo_end_date" placeholder="Memo End Date" value="<?php if(!empty($single_data)){ echo $single_data->memo_end_date; } ?>">
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
<?php echo view('Admin/Adminfooter.php'); ?>

<script>
$(document).ready(function() {
    $('#viewCreateMemoBtn').on('click', function() {
        var $viewMemoListCard = $('#viewMemoListCard');
        var $leaveForm = $('.card').not('#viewMemoListCard').not('#viewMemoReplyCard');
        var $viewMemoReplyCard = $('#viewMemoReplyCard');
        var $button = $('#viewCreateMemoBtn');
        var $button1 = $('.viewMemoListCard');

        if ($viewMemoListCard.is(':hidden')) {
            $viewMemoListCard.show();
            $viewMemoReplyCard.hide();
            $leaveForm.hide();
            $button.text('Create Memo');
            $button1.text('Memo List');
        } else {
            $viewMemoListCard.hide();
            $leaveForm.show();
            $viewMemoReplyCard.hide();
            $button.text('View Memo List');
            $button1.text('Create Memo');
        }
    });

    $('#viewMemoReplyBtn').on('click', function() {
        var $viewMemoListCard = $('#viewMemoListCard');
        var $viewMemoReplyCard = $('#viewMemoReplyCard');
        var $leaveForm = $('.card').not('#viewMemoListCard').not('#viewMemoReplyCard');
        var $button = $('#viewMemoReplyBtn');
        var $button1 = $('.viewMemoListCard');

        if ($viewMemoReplyCard.is(':hidden')) {
            $viewMemoReplyCard.show();
            $viewMemoListCard.hide();
            $leaveForm.hide();
            $button.text('Memo Replies');
            $button1.text('Memo Replies');
        } else {
            $viewMemoReplyCard.hide();
            $viewMemoListCard.show();
            $leaveForm.hide();
            $button.text('Memo Replies');
            $button1.text('Memo List');
        }
    });
});
</script>
