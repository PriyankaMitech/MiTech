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

                <!-- <div class="card-body">
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
                </div> -->
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Leave requests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Leave Request List</a>
                            </li>
                          
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
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
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <div class="table-responsive">
                                    <?php if (empty($allLeaveRequests)): ?>
                                        <p>No leave requests received.</p>
                                    <?php else: 
                                        // print_r($allLeaveRequests);?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>From Date</th>
                                                    <th>To Date</th>
                                                    <th>Rejoining Date</th>
                                                    <th>Reason</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($allLeaveRequests as $request): ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td><?php echo $request->emp_name; ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->from_date)); ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->to_date)); ?></td>
                                                        <td><?php echo date('d F Y', strtotime($request->rejoining_date)); ?></td>
                                                        <td><?php echo $request->reason; ?></td>
                                                        <td>
                                                            <?php 
                                                                $statusLabel = '';
                                                                switch ($request->Status) {
                                                                    case 'A':
                                                                        $statusLabel = 'Approved'; ?>
                                                                        <small class="badge badge-success"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                    case 'P':
                                                                        $statusLabel = 'Pending';?>
                                                                        <small class="badge badge-warning"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                    case 'R':
                                                                        $statusLabel = 'Rejected'; ?>
                                                                        <small class="badge badge-danger"><?php echo $statusLabel; ?> </small>
                                                                       <?php break;
                                                                    // Add more cases if needed
                                                                }?>
                                                                <!-- <small class="badge badge-success"><?php// echo $statusLabel; ?> </small> -->
                                                             
                                                            
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

            </div>
        </div>
    </div>
</div>
    </section>
</div>
<?php echo view('Admin/Adminfooter.php');?>