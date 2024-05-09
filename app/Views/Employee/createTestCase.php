<?php echo view("Employee/employeeSidebar"); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Test Case</h3>
                        </div>
                        <div class="card-body">
                            <form>
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                <div class="form-group row">
                                    <label for="testCaseId" class="col-sm-4 col-form-label">Test Case ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="testCaseId" placeholder="Enter Test Case ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="objectives" class="col-sm-4 col-form-label">Objectives</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="objectives" rows="3" placeholder="Enter Objectives"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prerequisites" class="col-sm-4 col-form-label">Prerequisites</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="prerequisites" placeholder="Enter Prerequisites">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="steps" class="col-sm-4 col-form-label">Steps to Follow</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="steps" rows="5" placeholder="Enter Steps to Follow"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="expectedResult" class="col-sm-4 col-form-label">Expected Result</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="expectedResult" rows="3" placeholder="Enter Expected Result"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="actualResult" class="col-sm-4 col-form-label">Actual Result</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="actualResult" rows="3" placeholder="Enter Actual Result"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="comment" class="col-sm-4 col-form-label">Comments</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="comment" rows="3" placeholder="Enter Comments"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php echo view("Employee/empfooter"); ?>
