<?php echo view ("Admin/Adminsidebar"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Meetings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Meetings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Meeting Link</th>
                                        <th>Meeting Date</th>
                                        <th>Meeting Time</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach ($meetings as $meeting): ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><a href="<?php echo $meeting->meeting_link; ?>"
                                                target="_blank"><?php echo $meeting->meeting_link; ?></a></td>
                                        <td><?php echo $meeting->meeting_date; ?></td>
                                        <td><?php echo $meeting->meeting_time; ?></td>


                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo view("Admin/Adminfooter"); ?>
