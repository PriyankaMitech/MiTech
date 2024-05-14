<?php echo view("Employee/employeeSidebar"); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Task List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Main Task Name</th>
                                            <th>Sub Task Name</th>
                                            <th>Estimated Hours</th>
                                            <th>Status</th>
                                            <th>Findings</th>
                                            <th>Test Case</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample row, replace with dynamic data -->
                                        <tr>
                                            <td>Main Task 1</td>
                                            <td>Sub Task 1</td>
                                            <td>8</td>
                                            <td>
                                                <select class="form-control">
                                                    <option value="done">Done</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="approved">Approved</option>
                                                    <option value="rejected">Rejected</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control">
                                                    <option value="completed">Completed</option>
                                                    <option value="bug">Bug</option>
                                                    <option value="error">Error</option>
                                                    <option value="changes">Changes</option>
                                                </select>
                                            </td>
                                            <td>
                                            <a href="<?php echo base_url(); ?>createTestCase" class="btn btn-primary">Create</a> <!-- Link to new page with form -->
                                            </td>
                                        </tr>
                                        <!-- More rows here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php echo view("Employee/empfooter"); ?>
