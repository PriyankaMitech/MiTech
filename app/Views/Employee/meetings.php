<?php echo view("Employee/employeeSidebar"); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Meeting Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Meeting Link</th>
                                        <th>Meeting Date</th>
                                        <th>Meeting Time</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(!empty($meetings)){
                                    $count = 1; ?>
                                    
                                    <?php foreach ($meetings as $meeting): ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><a href="<?php echo $meeting->meeting_link; ?>"
                                                target="_blank"><?php echo $meeting->meeting_link; ?></a></td>
                                        <td><?php echo $meeting->meeting_date; ?></td>
                                        <td><?php echo $meeting->meeting_time; ?></td>


                                    </tr>
                                    <?php endforeach; ?>
                                    <?php }?>
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

<?php echo view("Employee/empfooter"); ?>