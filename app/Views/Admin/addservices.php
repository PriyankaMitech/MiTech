<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="text-white">Add Services</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white">Add Services</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Services<small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>add_Services" id="Services" method="post">
                            <div class="row card-body">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                <div class="col-lg-6 col-md-6 col-12 form-group">
                                    <label for="ServicesName">Services Name</label>
                                    <input type="text" name="ServicesName" class="form-control" id="ServicesName"  placeholder="Enter Service name" value="<?php if(!empty($single_data)){ echo $single_data->ServicesName; } ?>">
 

                                </div>

                                <div class="col-lg-6 col-md-6 col-12 form-group">
                                <label for="hsnno">HSN/ SAC No.</label>
                                    <input type="text" name="hsnno" class="form-control" id="hsnno"  placeholder="Enter HSN/SAC No." value="<?php if(!empty($single_data)){ echo $single_data->hsnno; } ?>">
 

                                </div>
                               
                            </div>
                            <div class="card-footer text-right">
                                <!-- <button type="submit" class="btn btn-primary submitButton">Submit</button> -->
                           
                                <button type="submit" value=""  name="submit" id="submit" class="btn btn-primary submitButton"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Submit';} ?></button>
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
    

 
