<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Admin List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Admin List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Emp ID</th> -->
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach ($adminlist as $admin) { ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <!-- <td><?php echo $admin->Emp_id; ?></td> -->
                                        <td><?php echo $admin->emp_name; ?></td>
                                        <td><?php echo $admin->emp_email; ?></td>
                                        <td>
                                            <!-- <a href="<?php echo base_url('admin/edit/' . $admin->Emp_id); ?>"
                                                class="btn btn-primary btn-sm">Edit</a> -->
                                                <a href="<?php echo base_url('AdminController/row_delete/' . $admin->Emp_id); ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                    <?php } ?>
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
<?php echo view('Admin/Adminfooter.php');?>