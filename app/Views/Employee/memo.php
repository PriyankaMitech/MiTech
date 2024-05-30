<?php
$uri = new \CodeIgniter\HTTP\URI(current_url(true));
$pages = $uri->getSegments();
$page = $uri->getSegment(count($pages));


$file = __DIR__ . "/employeeSidebar.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Memo notification</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Memo notification</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Box Comment -->
          <div class="card card-widget">
            <!-- /.card-body -->
            <div class="card-body card-comments">
              <?php
              if ($memo_data) {

                foreach ($memo_data as $notification) {
                  if($notification){
                    //print_r($notification->id);exit();
                    $formattedDate = (new DateTime($notification->today_date))->format('d F Y');
                  ?>
                    <div class="card-comment">
                      <!-- User image -->
                      <img class="img-circle img-sm" src="<?php echo base_url() ?>public/Images/Admin.png" alt="User Image">
                    
                      <div class="comment-text">
                        <span class="username">
                          <?= $notification->admin_name   ?>

                          <span class="text-muted float-right" id="currentDate" ><?php echo $formattedDate; ?></span>
                        </span><!-- /.username -->
                        <?php echo  $notification->memo_subject; ?>
                        <span class="float-right">
                                <button type="button" class="btn btn-danger mt-3" data-toggle="modal" data-target="#modal-default">
                                    Reply
                                </button>
                    </span>
                      </div>
                      <!-- /.comment-text -->
                    </div>
                    <!-- /.card-comment -->
                   
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <form id="memo_reply_form" enctype="multipart/form-data" action="<?= site_url('save-memo-reply') ?>" method="post">
                            <input type="hidden" name="memo_id" value="<?php echo $notification->id; ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Please reply </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="date">Date:</label>
                                            <input type="date" name="date" class="form-control" id="date" required>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-12 form-group">
                                                <label for="to">Memo Subject</label>
                                                <input type="text" name="memo_subject" class="form-control" id="memo_subject" value="<?php if(!empty($notification)){ echo $notification->memo_subject;} ?>">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="memo_reply">Your reply : </label>
                                                <textarea name="memo_reply" class="form-control" id="memo_reply" required></textarea>
                                            </div>
                                            <div class=" col-md-12 form-group">
                                                <label for="exampleInputFile">File input</label>
                                                <div class="input-group">
                                                <div class="custom-file">
                                                    <!-- <input type="file" class="custom-file-input" id="exampleInputFile"> -->
                                                    <input type="file" class="custom-file-input" id="customFile" name="memo_file">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                  }
                }
              } else {
                ?>
                No new memo_data available

              <?php } ?>
            </div>
            <!-- /.card-footer -->

            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      <!-- /.row -->


    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  
</div>
<!-- /.content-wrapper -->

<?php
if (isset($_SESSION['sessiondata'])) {
  $role = $_SESSION['sessiondata']['role'];
  if ($role == 'Employee' || $role == 'Admin' ) {
    echo view('Employee/empfooter');
  } 
  }
  ?>
  <script>
  $(function () {
  bsCustomFileInput.init();
});
</script>
</script>
