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
          <h1 class="text-white"> Notification</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white"> notification</li>
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
            <div class="container">
    <div class="card-body card-comments">
        <?php
        if ($notification_data) {
            foreach ($notification_data as $notification) {
                if ($notification) {
                    $formattedDate = (new DateTime($notification->notification_date))->format('d F Y');
                    $likeCount = $notification->like_count ?? 0;
                    $thumbCount = $notification->thumb_count ?? 0;
        ?>
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="<?php echo base_url() ?>public/Images/Admin.png" alt="User Image">
                
                <div class="comment-text">
                    <span class="username">
                        <?= $notification->notification_subject; ?>

                        <span class="text-muted float-right"><?php echo $formattedDate; ?></span>
                    </span>
                    <!-- /.username -->
                    <?php echo $notification->notification_desc; ?>
                    
                    <div class="mt-2">
                        <button class="btn btn-danger btn-sm like-button" data-id="<?= $notification->id; ?>">
                            <i class="fas fa-heart"></i> Like <span class="like-count"><?= $likeCount; ?></span>
                        </button>
                        <button class="btn btn-secondary btn-sm thumb-button" data-id="<?= $notification->id; ?>">
                            <i class="fas fa-thumbs-up"></i> Thumb <span class="thumb-count"><?= $thumbCount; ?></span>
                        </button>
                    </div>
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
<script>
     $(document).ready(function() {
    $('.like-button').on('click', function() {
        var button = $(this);
        var notificationId = button.data('id');
        var likeCountSpan = button.find('.like-count');

        // Update the like count on the server side via AJAX
        $.ajax({
            url: '<?= base_url() ?>likeNotification',
            method: 'POST',
            data: { id: notificationId },
            success: function(response) {
                if (response.newLikeCount !== undefined) {
                    likeCountSpan.text(response.newLikeCount);
                } else if (response.error) {
                    alert(response.error);
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });

    $('.thumb-button').on('click', function() {
        var button = $(this);
        var notificationId = button.data('id');
        var thumbCountSpan = button.find('.thumb-count');

        // Update the thumb count on the server side via AJAX
        $.ajax({
            url: '<?= base_url(); ?>thumbNotification',
            method: 'POST',
            data: { id: notificationId },
            success: function(response) {
                if (response.newThumbCount !== undefined) {
                    thumbCountSpan.text(response.newThumbCount);
                } else if (response.error) {
                    alert(response.error);
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
});

    </script>