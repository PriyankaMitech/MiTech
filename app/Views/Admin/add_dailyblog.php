<?php echo view('Admin/Adminsidebar.php'); ?>

<div class="content-wrapper">

    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="text-white">Add Daily Blog</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white">Add Daily Blog</li>
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
                            <h3 class="card-title">Add Daily Blog <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>set_dailyblog" method="post" id="dailyblog_form" enctype="multipart/form-data">
                    <div class="row card-body">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                        <div class="col-lg-6 col-md-6 col-12 form-group">
                            <label for="dailyblog_name">Daily Blog Name : </label>
                            <input type="text" name="dailyblog_name" class="form-control" id="dailyblog_name" placeholder="Enter name" value="<?php if(!empty($single_data)){ echo $single_data->dailyblog_name;} ?>">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 form-group">
                            <label for="photo">Attach Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                            <small id="fileError" class="text-danger" style="display:none;">Please select a Photo file.</small>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 form-group">
                            <label for="description">Description :</label><br>
                            <textarea id="description" name="description" rows="7" cols="100"><?php if(!empty($single_data)){ echo $single_data->description;} ?></textarea>
                            <span id="descriptionError" style="color: crimson;"></span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 form-group">
                            <label for="link">Link :</label>
                            <input type="text" name="link" class="form-control" id="link" placeholder="Enter link" value="<?php if(!empty($single_data)){ echo $single_data->link;} ?>">
                            <span id="linkError" style="color: crimson;"></span>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; } else { echo 'Submit'; } ?></button>
                    </div>
                </form>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
    
        </div>
    </section>
</div>
<?php echo view('Admin/Adminfooter.php');?>      
    

 
