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
                <th>Hours Worked</th>
                <th>Minutes Worked</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $counter = 1;
                foreach ($DailyWorkData as $dailyWork): 
            ?>
            <tr>
                <td><?= $counter++; ?></td>
                <td><?= date('d F Y', strtotime($dailyWork->created_at)); ?></td>
                <td><?= $dailyWork->project_name; ?></td>
                <td><?= $dailyWork->task; ?></td>
                <td><?= $dailyWork->use_hours; ?></td>
                <td><?= $dailyWork->use_minutes; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
