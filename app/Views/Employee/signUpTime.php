<?php echo view("Employee/employeeSidebar"); ?>

<div class="content-wrapper">
    <div class="content-header">
        <!-- Header content here -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-6 offset-3">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Working Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <button id="punchButton" data-action="punchIn" type="button" class="btn btn-default">
                                    Punch In
                                </button>
                            </div>
                            <div class="text-center">
                                <!-- Task button initially hidden -->
                                <button id="taskButton" style="display: none;" type="button" class="btn btn-primary">
                                    Task
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo view("Employee/empfooter"); ?>
</div>

<script>
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
                    // Show the task button after punching in
                    document.getElementById('taskButton').style.display = 'block';
                } else {
                    document.getElementById('punchButton').innerText = 'Punch In';
                    document.getElementById('punchButton').setAttribute('data-action', 'punchIn');
                }
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
</script>
