<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">Employee List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Employee List</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Employee List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Technology</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                                                // echo "<pre>";print_r($emp_data);exit();

                                    
                                    if (!empty($emp_data)) {
                                        $i = 1; ?>
                                        <?php foreach ($emp_data as $data) {  

                                            $model = new \App\Models\AdminModel();
                                            $ids=  $data->emp_department;
                                            $wherecond = array('id' => $ids);

                                            $departmentName = $model->getsinglerow('tbl_Department', $wherecond);

                                            // echo "<pre>";print_r($departmentName);exit();
                                            ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data->emp_name; ?></td>
                                                <td><?= $data->mobile_no; ?></td>
                                                <td><?= $data->emp_email; ?></td>
                                                <td><?php if(!empty($departmentName)){ echo $departmentName->DepartmentName; }?></td>
                                                <td>
                                                    <a href="edit_emp/<?= $data->Emp_id; ?>"><i class="far fa-edit me-2"></i></a>
                                                    <a href="<?= base_url(); ?>delete_data/<?php echo base64_encode($data->Emp_id); ?>/employee_tbl" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                                   
                                                   <?php if($data->status == 'Y'){?>
                                                    <a href="<?= base_url(); ?>deactive_data/<?php echo base64_encode($data->Emp_id); ?>/employee_tbl" onclick="return confirm('Are You Sure You Want To Deactive This Record?')"><i class="fas fa-user-times text-danger"></i></a>                                               
                                                     <?php }elseif($data->status == 'N'){ ?>
                                                        <a href="<?= base_url(); ?>active_data/<?php echo base64_encode($data->Emp_id); ?>/employee_tbl" onclick="return confirm('Are You Sure You Want To Active This Record?')"><i class="fas fa-user-check text-success"></i></a>
                                                        <?php } ?>

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
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo view('Admin/Adminfooter.php');?>      
