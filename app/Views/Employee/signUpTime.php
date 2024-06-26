
<?php
$file = __DIR__ . "/employeeSidebar.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
?>
<style>
    .signUp{
        background-color: #104d52 !important;

    }
    .currentTimeOut{
        background-color: #2d8386 !important; 
    }
    .timeoutbtn{
        background-color: #2ab462 !important;
        border-color: #2ab462 !important;
        color: #fff !important;
    }
    .dailyimg{
    margin: 17px 0px !important;
    }
</style>

<div class="content-wrapper ">

    <section class="content goodMorningImage">
        <div class="container-fluid">

            <div class="row mb-5">
                <!-- Memo Popup Modal -->
                <div class="modal fade" id="memoModal" tabindex="-1" role="dialog" aria-labelledby="memoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="memoModalLabel">Memo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Memo Content will be dynamically inserted here -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="card card-secondary">
                        <div class="card-header signUp">
                            <p class="card-title date-text" id="currentDate"><?= date('Y-m-d') ?></p>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"> Note: Click on the button to start work.<br><br></h6>
                            <div class="text-center">
                                <button id="punchButton" type="button" class="btn mt-3">Loading...</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-4 ">
                    <div class="card card-danger">
                        <div class="card-header currentTimeOut">
                            <p class="card-title date-text" id="currentTimeOut"><?= date('Y-m-d') ?></p>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"> Note: For urgent office exits, click "Time Out" to provide necessary details. </h6>
                            <div class="text-center">
                                <button type="button" class="btn btn-default mt-3 timeoutbtn" data-toggle="modal" data-target="#modal-default">
                                    Time Out
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($daily_blog->link)) { ?>
            <div class="row mt-5 ">
                <div class="col-lg-6 col-6 offset-6">
          
                    <div class="card card-widget">
                    
                        <!-- /.card-header -->
                        <div class="card-body">
                    

                            <div class="attachment-block clearfix">
                                <img class="attachment-img dailyimg" src="<?= base_url(); ?>/public/uploades/photo/<?php if (!empty($daily_blog)) {
                                    echo $daily_blog->photo;
                                } ?>" alt="Attachment Image">

                                <div class="attachment-pushed">
                                    <h4 class="attachment-heading"><a href="<?php if (!empty($daily_blog)) {
                                            echo $daily_blog->link;
                                        } ?>"><?php if (!empty($daily_blog)) {
                                            echo $daily_blog->dailyblog_name;
                                        } ?></a></h4>

                                    <div class="attachment-text">

                                        <?php
                                        if (!empty($daily_blog)) {
                                            // Get the full description
                                            $description = $daily_blog->description;

                                            // Tokenize the string
                                            $word_limit = 20; // Adjust the number of words as needed
                                            $words = strtok($description, " ");
                                            $word_count = 0;
                                            $short_description = '';

                                            while ($words !== false && $word_count < $word_limit) {
                                                $short_description .= $words . ' ';
                                                $words = strtok(" ");
                                                $word_count++;
                                            }

                                            // Trim any trailing space
                                            $short_description = trim($short_description);

                                            // Output the short description
                                            echo $short_description;

                                            // Output the "share" link for WhatsApp
                                        
                                            
                                        
                                        }
                                        ?>

                                    </div>
                                    <!-- /.attachment-text -->
                                </div>
                                <!-- /.attachment-pushed -->
                            </div>
                            <!-- /.attachment-block -->

                            <!-- Social sharing buttons -->
                           

                                <?php if (!empty($daily_blog->link)) {
    $whatsapp_message = $daily_blog->dailyblog_name . "\n" . $daily_blog->link;
    $whatsapp_url = "https://api.whatsapp.com/send?text=" . urlencode($whatsapp_message);
    ?>
    <a href="<?php echo $whatsapp_url ?>" target="_blank" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</a>
<?php } ?>

<?php if (!empty($daily_blog)) {
    $likeCount = $daily_blog->like_count ?? 0;
    ?>
    <button class="btn btn-default btn-sm like-button" data-id="<?= $daily_blog->id; ?>">
        <i class="far fa-thumbs-up"></i> Like <span class="like-count"><?= $likeCount; ?></span>
    </button>
    <span class="float-right text-muted">  <span class="like-count"><?= $likeCount; ?></span> likes 
    <!-- - 2 comments -->
</span>
<?php } ?>

                        </div>
      
                    </div>
       
                </div>
            </div>
            <?php } ?>

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <form id="TimeOut-form" action="<?= site_url('save-timeout') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Please fill the details</h4>
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
                                    <div class="col-md-6 form-group">
                                        <label for="from">From:</label>
                                        <input type="time" name="from" class="form-control" id="from" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="to">To:</label>
                                        <input type="time" name="to" class="form-control" id="to" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reason">Reason:</label>
                                    <textarea class="form-control" name="reason" id="reason" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Informed To:</label>
                                    <select class="form-control select2bs4" style="width: 100%;">
                                        <option selected="selected">Please informed to</option>
                                        <option>Admin 1</option>
                                        <option>Admin 2</option>
                                        <option>Admin 2</option>
                                       
                                    </select>
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
        </div>
    </section>
</div>

<?php echo view("Employee/empfooter"); ?>

<script>
   // Get current date
   var today = new Date();
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var currentDate = today.toLocaleDateString('en-US', options);

        // Update the date-text element with today's date
        document.getElementById("currentDate").innerText = currentDate;
        document.getElementById("currentTimeOut").innerText = currentDate;

        $(document).ready(function() {
            // Fetch current punch status
            $.ajax({
                url: '<?= base_url('getPunchStatus'); ?>',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var button = $('#punchButton');
                    if (data.length > 0 && data[0].action === 'punchIn') {
                        button.text('Punch Out');
                        button.attr('data-action', 'punchOut');
                        // button.addClass('btn-warning').removeClass('btn-success');
                        button.css({
                                        'color': '#ffffff !important',
                                        'background-color': '#f64c4c !important',
                                        'border-color': '#f64c4c !important'
                                    });
                    } else {
                        button.text('Punch In');
                        button.attr('data-action', 'punchIn');
                        // button.addClass('btn-success').removeClass('btn-warning');
                        button.css({
                                        'background-color': '#28a745 !important', // Success color
                                        'border-color': '#28a745 !important',
                                        'color': '#fff !important'
                                    });
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });

            // Handle punch button click
            $('#punchButton').on('click', function() {
                var action = $(this).attr('data-action');

                $.ajax({
                    url: '<?= base_url('punchAction'); ?>',
                    method: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    data: JSON.stringify({ action: action }),
                    success: function(data) {
                        if (data.status === 'success') {
                            if (action === 'punchIn') {
                                $('#punchButton').text('Punch Out')
                                    .attr('data-action', 'punchOut')
                                    .css({
                                        'color': '#ffffff !important',
                                        'background-color': '#f64c4c !important',
                                        'border-color': '#f64c4c !important'
                                    });
                                $('#statusText').text('You are punched in');
                            } else {
                                $('#punchButton').text('Punch In')
                                    .attr('data-action', 'punchIn')
                                    .css({
                                        'background-color': '#28a745', // Success color
                                        'border-color': '#28a745',
                                        'color': '#fff'
                                    });
                                $('#statusText').text('You are punched out');
                            }
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });

    document.getElementById('taskButton').addEventListener('click', function() {
        location.reload();
    });

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("TimeOut-form").addEventListener("submit", function(event) {
            var date = document.getElementById("date").value;
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            var reason = document.getElementById("reason").value;

            if (date.trim() === "" || from.trim() === "" || to.trim() === "" || reason.trim() === "") {
                alert("Please fill in all fields.");
                event.preventDefault();
            }
        });
    });



</script>
<script>
$(document).ready(function() {
    $('.like-button').on('click', function() {
        var button = $(this);
        var dailyblogId = button.data('id');
        var likeCountSpan = button.find('.like-count');
        
        $.ajax({
            url: '<?= base_url() ?>likeDailyblog',
            method: 'POST',
            data: { id: dailyblogId },
            success: function(response) {
                if (response.newLikeCount !== undefined) {
                    // Update all elements with the class 'like-count'
                    $('.like-count').each(function() {
                        $(this).text(response.newLikeCount);
                    });
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

