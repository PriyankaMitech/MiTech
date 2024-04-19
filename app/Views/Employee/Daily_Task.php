<?php echo view("Employee/employeeSidebar"); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daily Work</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('daily_work'); ?>" method="post" id="dailyWorkForm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="project_name">Project Name</label>
                                            <input type="text" class="form-control" name="project_name[]"
                                                id="project_name" placeholder="Enter project name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="task">Task</label>
                                            <input type="text" class="form-control" name="task[]" id="task"
                                                placeholder="Enter task">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="use_hours">Use Hours</label>
                                            <input type="number" class="form-control" name="use_hours[]" id="use_hours"
                                                placeholder="Enter use hours">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="use_minutes">Minutes</label>
                                            <input type="number" class="form-control" name="use_minutes[]"
                                                id="use_minutes" placeholder="Enter use minutes">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-2 ">
                                        <div class="form-group mt-4">
                                            <!-- <button type="button" class="btn btn-success add-row">Add</button> -->
                                            <button type="button" class="btn btn-primary add-row"><i class="fa fa-plus"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <!-- This div will be used to append new rows -->
                                <div id="dynamic-rows"></div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php echo view("Employee/empfooter"); ?>