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
          <h1> Notification</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"> notification</li>
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
              if ($notification_data) {
                //echo'<pre>';print_r($notification_data);exit(); 
                foreach ($notification_data as $notification) {
                  if($notification){
                    //print_r($notification->id);exit();
                    $formattedDate = (new DateTime($notification->notification_date))->format('d F Y');
                  ?>
                    <div class="card-comment">
                      <!-- User image -->
                      <img class="img-circle img-sm" src="<?php echo base_url() ?>public/Images/Admin.png" alt="User Image">
                    
                      <div class="comment-text">
                        <span class="username">
                          <?= $notification->notification_subject ;   ?>

                          <span class="text-muted float-right" id="currentDate" ><?php echo $formattedDate; ?></span>
                        </span><!-- /.username -->
                        <?php echo  $notification->notification_desc; ?>
                      
                      </div>
                      <!-- /.comment-text -->
                    </div>
                    <!-- /.card-comment -->
                   
                    
                <?php
                  }
                }
              } else {
                ?>
                No new notification data available

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
