<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="text-white">User List</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white">User List</li>
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
                        <h3 class="card-title">User List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Email Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($user_data)){ $i=1;?>
                                <?php foreach($user_data as $data){  ?>
                                    <tr>
                                        <td><?=$i; ?></td>
                                        <td><?=$data->emp_name;?></td>
                                        <td><?=$data->mobile_no; ?></td>
                                        <td><?=$data->emp_email; ?></td>
                                        <td>
                                            <a href="edit_user/<?=$data->Emp_id; ?>"><i class="far fa-edit me-2"></i></a> 
                                            <!-- <a href="<?=base_url(); ?>delete/<?php echo base64_encode($data->Emp_id); ?>/register" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>  -->
                                            <a  href="<?= base_url(); ?>delete_data/<?php echo base64_encode($data->Emp_id); ?>/employee_tbl" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>

                                        </td>
                                    </tr>
                                <?php $i++;} ?>
                        <?php }else{ ?>
                            <tr>
                                        <td class="text-center" colspan= 6>No Data Available</td>  
                            </tr>
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
    

 
