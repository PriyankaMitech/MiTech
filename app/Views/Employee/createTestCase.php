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
                        <form method="post" action="<?= site_url('save-test-case') ?>">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php if(!empty($single_data)){ echo $single_data->id;} ?>">
                                <div class="form-group row">
                                    <label for="testCaseId" class="col-sm-4 col-form-label">Test Case ID</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="testCaseId" placeholder="Enter Test Case ID" name="testCaseId" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="objectives" class="col-sm-4 col-form-label">Objectives</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="objectives" rows="3" placeholder="Enter Objectives" name="objectives" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prerequisites" class="col-sm-4 col-form-label">Prerequisites</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="prerequisites" placeholder="Enter Prerequisites" name="prerequisites" required>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label for="steps" class="col-sm-4 col-form-label">Steps to Follow</label>
                                    <div class="col-sm-8">
                                        <div id="stepsContainer">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="steps[]" placeholder="Enter Step" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary addStepBtn" type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="expectedResult" class="col-sm-4 col-form-label">Expected Result</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="expectedResult" rows="3" placeholder="Enter Expected Result" name="expectedResult" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="actualResult" class="col-sm-4 col-form-label">Actual Result</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="actualResult" rows="3" placeholder="Enter Actual Result" name="actualResult" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Option</label>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="option" id="option_errors" value="errors" checked>
                                            <label class="form-check-label" for="option_errors">
                                                Errors
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="option" id="option_change" value="change">
                                            <label class="form-check-label" for="option_change">
                                                Change
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="option" id="option_corrections" value="corrections">
                                            <label class="form-check-label" for="option_corrections">
                                                Corrections
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="requiredChanges" class="col-sm-4 col-form-label">Required Changes</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="requiredChanges" rows="3" placeholder="Enter Required Changes" name="requiredChanges" required></textarea>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label for="comment" class="col-sm-4 col-form-label">Comments</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="comment" rows="3" placeholder="Enter Comments" name="comment" required></textarea>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector(".addStepBtn").addEventListener("click", function() {
            const stepsContainer = document.getElementById("stepsContainer");
            const inputGroup = document.createElement("div");
            inputGroup.classList.add("input-group", "mb-3");
            inputGroup.innerHTML = `
                <input type="text" class="form-control" name="steps[]" placeholder="Enter Step">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary removeStepBtn" type="button">-</button>
                </div>
            `;
            stepsContainer.appendChild(inputGroup);
            inputGroup.querySelector(".removeStepBtn").addEventListener("click", function() {
                inputGroup.remove();
            });
        });
    });
</script>
