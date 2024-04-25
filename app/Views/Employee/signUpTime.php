<?php echo view("Employee/employeeSidebar"); ?>

<div class="content-wrapper">
    <div class="content-header">
        <!-- Header content here -->
    </div>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-5">
    <div class="col-lg-4 col-4">
        <div class="card card-secondary">
            <div class="card-header signUp">
                <!-- Display today's date here -->
                <p class="card-title date-text" id="currentDate"><?= date('Y-m-d') ?></p>
                <!-- <h3 class="card-title">Login Status</h3> -->
            </div>
            <div class="card-body">
                <!-- Note: Click on the button to start work. -->
                <h6 class="card-title"> Note: Click on the button to start work.</h6>
                <div class="text-center">
                    <?php if (!empty($employeeTiming) && $employeeTiming[0]['action'] == 'punchIn'): ?>
                        <!-- If start_time is present and action is punchIn, show punchOut button -->
                        <button id="punchButton" data-action="punchOut" type="button" class="btn btn-default mt-3">
                            Punch Out
                        </button>
                    <?php else: ?>
                        <!-- If start_time is not present or action is not punchIn, show punchIn button -->
                        <button id="punchButton" data-action="punchIn" type="button" class="btn btn-default mt-3">
                            Punch In
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


                <div class="row mt-5">
                    <div class="col-lg-4 col-4 offset-8">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h5 class="card-title m-0">Time out </h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title"> Note: For urgent office exits, click "Time Out" to provide necessary details. </h6>
                                <div class="text-center">
                                    <button type="button" class="btn btn-default mt-3" data-toggle="modal" data-target="#modal-default">
                                        Time Out
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <!-- Input fields for date, from, to, and reason -->
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
                                   
<!-- <div class="card card-default">
<div class="card-header"> -->
<!-- <h3 class="card-title">Select2 (Default Theme)</h3> -->
<!-- <div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button> -->
<!-- </div>
</div> -->

<!-- <div class="card-body">
<div class="row">
<div class="col-md-6"> -->
<!-- <div class="col-md-6"> -->
<div class="form-group">
<label>Informed To:</label>
<select class="form-control select2bs4" style="width: 100%;">
<option selected="selected">Please informed to</option>
<option>Alaska</option>
<option>California</option>
<option>Delaware</option>
<option>Tennessee</option>
<option>Texas</option>
<option>Washington</option>
</select>
</div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php echo view("Employee/empfooter"); ?>

<script>

  // Get current date
  var today = new Date();
    var options = { year: 'numeric', month: 'long', day: 'numeric' }; // Adjusted options to exclude the day
    var currentDate = today.toLocaleDateString('en-US', options);

    // Update the date-text element with today's date
    document.getElementById("currentDate").innerText = currentDate;

    document.getElementById('punchButton').addEventListener('click', function() {
        var action = this.getAttribute('data-action');
        
        // AJAX call to send punch-in/punch-out request to controller
        fetch('<?php echo base_url('punchAction'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ action: action }) // Include action parameter in JSON payload
        })
        .then(response => response.json())
        .then(data => {
            // Update button text and functionality based on response
            if (data.status === 'success') {
                // Toggle button text and action
                if (action === 'punchIn') {
                    document.getElementById('punchButton').innerText = 'Punch Out';
                    document.getElementById('punchButton').setAttribute('data-action', 'punchOut');
                } else {
                    document.getElementById('punchButton').innerText = 'Punch In';
                    document.getElementById('punchButton').setAttribute('data-action', 'punchIn');
                }
                // Show the task button after punching in
                document.getElementById('taskButton').style.display = action === 'punchIn' ? 'block' : 'none';
                // Toggle button class if needed
                document.getElementById('punchButton').classList.toggle('btn-primary');
                document.getElementById('punchButton').classList.toggle('btn-default');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Function to handle task button click
    document.getElementById('taskButton').addEventListener('click', function() {
        // Reload the page
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



</script>
