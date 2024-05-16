<?php echo view("Admin/Adminsidebar"); ?>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Menu List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Meeting Date</th>
                                        <th>Meeting Time</th>
                                        <th>Hostname</th>
                                        <th>Client Involve</th>
                                        <th>Meeting Link</th>
                                        <th>Copy Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Sort the meetings array in descending order by meeting_date
                                    usort($meetings, function($a, $b) {
                                        return strtotime($b->meeting_date) - strtotime($a->meeting_date);
                                    });

                                    $count = 1;
                                    $current_date = date('Y-m-d'); // Get today's date in 'Y-m-d' format
                                    ?>
                                    <?php foreach ($meetings as $meeting): ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $meeting->meeting_date; ?></td>
                                        <td><?php echo $meeting->meeting_time; ?></td>
                                        <td><?php echo $meeting->Hostname; ?></td>
                                        <td><?php echo $meeting->client_involve; ?></td>
                                        <td>
                                            <?php if (strtotime($meeting->meeting_date) >= strtotime($current_date)): ?>
                                                <a href="<?php echo $meeting->meeting_link; ?>" target="_blank"><?php echo $meeting->meeting_link; ?></a>
                                            <?php else: ?>
                                                <?php echo $meeting->meeting_link; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                        <?php if (strtotime($meeting->meeting_date) >= strtotime($current_date)): ?>
                                                <button class="btn btn-success" onclick="copyToClipboard('<?php echo $meeting->meeting_link; ?>')">Copy</button>
                                                <?php else: ?>
                                            <?php endif; ?>
                                        </td>
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

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Meeting link copied to clipboard');
    }, function(err) {
        alert('Failed to copy: ', err);
    });
}
</script>
