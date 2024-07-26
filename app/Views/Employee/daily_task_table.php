<?php if (empty($DailyWorkData)): ?>
    <p>No Data found</p>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Date</th>
                <th>Project name</th>
                <th>Task</th>
                <th>Man hours for the task</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $counter = 1;
                // print_r($DailyWorkData);exit();
                foreach ($DailyWorkData as $dailyWork): 
                    
            ?>
            <tr>
                <td><?= $counter++; ?></td>
                <td><?= date('d F Y', strtotime($dailyWork->task_date)); ?></td>
                <td><?= $dailyWork->projectName; ?></td>
                <td><?= $dailyWork->task; ?></td>
                <td><?= $dailyWork->use_hours; ?></td>
                <td>
                <?php 
                    $statusLabel = '';
                    switch ($dailyWork->task_status) {
                    case 'Complete':
                        $statusLabel = 'Complete'; ?>
                        <small class="badge badge-success total-tasks"><?php echo $statusLabel; ?> </small>
                        <?php break;
                    case 'Pending':
                    $statusLabel = 'Pending';?>
                        <small class="badge badge-danger total-tasks"><?php echo $statusLabel; ?> </small>
                        <?php break;
                    case 'Work In Progress':
                    $statusLabel = 'Work In Progress'; ?>
                        <small class="badge badge-warning total-tasks"><?php echo $statusLabel; ?> </small>
                        <?php break;
                    // Add more cases if needed
                    }?>
                    <!-- <?= $dailyWork->task_status; ?>-->
                    </td> 
                    <td>
                        <a href="edit_dailyTask/<?= $dailyWork->id; ?>"><i class="far fa-edit me-2"></i></a>
                        <a href="<?= base_url(); ?>delete_compan/<?php echo base64_encode($dailyWork->id); ?>/tbl_daily_work" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                    </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
