
<?php
$file = __DIR__ . "/employeeSidebar.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
?>

<div class="content-wrapper goodMorningImage">

    <section class="content">
        <div class="container-fluid ">

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
                            <h6 class="card-title"> Note: Click on the button to start work.</h6>
                            <div class="text-center">
                                <?php if (!empty($employeeTiming) && $employeeTiming[0]['action'] == 'punchIn'): ?>
                                    <button id="punchButton" data-action="punchOut" type="button" class="btn btn-default mt-3">
                                        Punch Out
                                    </button>
                                <?php else: ?>
                                    <button id="punchButton" data-action="punchIn" type="button" class="btn btn-default mt-3">
                                        Punch In
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 timeOutRow">
                <div class="col-lg-4 col-4 offset-8">
                    <div class="card card-danger">
                        <div class="card-header">
                            <p class="card-title date-text" id="currentTimeOut"><?= date('Y-m-d') ?></p>
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
            if (data.status === 'success') {
                if (action === 'punchIn') {
                    document.getElementById('punchButton').innerText = 'Punch Out';
                    document.getElementById('punchButton').setAttribute('data-action', 'punchOut');
                } else {
                    document.getElementById('punchButton').innerText = 'Punch In';
                    document.getElementById('punchButton').setAttribute('data-action', 'punchIn');
                }
                document.getElementById('taskButton').style.display = action === 'punchIn' ? 'block' : 'none';
                document.getElementById('punchButton').classList.toggle('btn-primary');
                document.getElementById('punchButton').classList.toggle('btn-default');
            }
        })
        .catch(error => console.error('Error:', error));
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

    // $(document).ready(function() {

    //     var memoData = <?php echo json_encode($memoData); ?>;
    //     console.log(memoData);

    //     if (memoData.length > 0) {
    //         var memo = memoData[0];
    //         var modalContent = `
    //             <h5>${memo.memo_subject}</h5>
    //             <p>${memo.memo_start_date} - ${memo.memo_end_date}</p>
    //             <p>${memo.memo_content}</p>
    //         `;

    //         $('.modal-body').html(modalContent);
    //         $('#memoModal').modal('show');
    //     }
    // });
</script>
