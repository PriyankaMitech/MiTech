<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Leave Requests</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Leave Requests</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Leave Requests</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (empty($leave_app)): ?>
                            <p>No leave requests received.</p>
                        <?php else: ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Rejoining Date</th>
                                        <th>Reason</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1; ?>
                                    <?php foreach ($leave_app as $request): ?>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo $request->applicant_name; ?></td>
                                            <td><?php echo date('d F Y', strtotime($request->from_date)); ?></td>
                                            <td><?php echo date('d F Y', strtotime($request->to_date)); ?></td>
                                            <td><?php echo date('d F Y', strtotime($request->rejoining_date)); ?></td>
                                            <td><?php echo $request->reason; ?></td>
                                            <td>
                                                <form action="<?php echo base_url('leave_result'); ?>" method="post">
                                                    <input type="hidden" name="leave_id"
                                                        value="<?php echo $request->id; ?>">
                                                    <button type="submit" class="btn btn-success" name="action"
                                                        value="A">Approve</button>
                                                    <button type="submit" class="btn btn-danger" name="action"
                                                        value="R">Decline</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $counter++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
</div>
<?php echo view('Admin/Adminfooter.php');?>