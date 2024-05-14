<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 sectionHeading">
                    <h1 class="text-white">Allot Task</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">Allot Task</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <form action="<?php echo base_url()?>allotTask" method="post">
                        <input type="hidden" id="id" name="id" value="<?php if (isset($single_data)) { echo ($single_data->id); } ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Projectname">Project Name:</label>
                                        <select class="form-control" name="Projectname" id="Projectname" required>
                                            <option value="">Select Project</option>
                                            <?php if(!empty($projectData)){?>
                                                <?php foreach ($projectData as $data){ ?>
                                                    <option value="<?=$data->p_id; ?>"
                                                <?php if ((!empty($single_data)) && $single_data->project_id === $data->p_id ) { echo 'selected'; } ?>>
                                                    <?= $data->projectName; ?>
                                            </option>
                                                <?php } ?>
                                            <?php } ?>
                                        
                                        </select>
                                    </div>
                                </div>
                              
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="departmentName">Department name</label>
                                        <input type="text" class="form-control" name="departmentName" id="departmentName" required readonly>
                                        <!-- Use a hidden input field to store the technology data -->
                                        <input type="hidden" id="technologyData" value="<?= htmlspecialchars(json_encode($projectData)); ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- </div> -->
                            <button type="button" class="btn btn-primary add-more">Add more</button>

                            <div class="row main-task-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mainTaskName">Main Task name</label>
                                        <select class="form-control main-task-name" name="mainTaskName">
                                            <!-- Options will be populated dynamically -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="subTaskName">Sub Task name</label>
                                        <input type="text" class="form-control sub-task-name" name="subTaskName" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="employeeName">Employee name</label>
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-block dropdown-toggle" type="button" id="employeeSelectButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Select Employee
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="employeeSelectButton" id="employeeSelectMenu">
                                                <!-- Options will be populated dynamically using JavaScript -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="workingHours">Working Hours:</label>
                                        <input type="number" class="form-control working-hours" name="workingHours" min="0" max="23" value="0" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="workingMinutes">Minutes:</label>
                                        <input type="number" class="form-control working-minutes" name="workingMinutes" min="0" max="59" value="0" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <!-- Add delete button/icon here -->
                                        <button class="btn btn-danger delete-row">
                                            <i class="fa fa-trash"></i> <!-- Assuming you're using Font Awesome for icons -->
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 offset-5">
                                    <div class="form-group"> 
                                        <button type="submit" value=""  name="Save" id="saveTask" class="btn btn-primary"><?php if(!empty($single_data)){ echo 'Update'; }else{ echo 'Save';} ?></button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>    
            </div>
        </div>
    </section>

   <!-- Project Data Table -->
   <?php if(empty($single_data)) { ?>

                            <?php if(!empty($taskDetails)) { ?>
                               
                            <?php foreach ($taskDetails as $task): 
                                $adminModel = new \App\Models\AdminModel(); // Adjust the namespace and model name accordingly
                                $wherecond = array('p_id' => $task->project_id );
                                $project_data = $adminModel->get_single_data('tbl_project', $wherecond);
                            
                                $wherecond = array('id' => $task->mainTask_id );
                                $mainTask_data = $adminModel->get_single_data('tbl_mainTaskMaster', $wherecond);?>
                                <tr>
                                    <td><?php if(!empty($project_data)){ echo $project_data->projectName;  } ?></td>
                                    <td><?php if(!empty($mainTask_data)){echo $mainTask_data->mainTaskName; } ?></td>
                                    <td><?php echo $task->subTaskName; ?></td>
                                    <td><?php echo $task->subTaskDescription; ?></td>
                                    <td><?php echo $task->pageName; ?></td>
                                    <td><?php echo $task->condition; ?></td>
                                    <td><?php echo $task->taskPosition; ?></td>
                                   
                                    <td>
                                    
                                    <a href="edit_task/<?=$task->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                    <a href="<?=base_url(); ?>delete/<?php echo base64_encode($task->id); ?>/tbl_taskDetails" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                                </td>
                                   
                                </tr>
                            <?php endforeach; ?>
                            <?php 
                            } ?>
                          
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </section> 
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    const projectData = <?= json_encode($projectData) ?>;
    const employeeDetails = <?= json_encode($employeeDetails) ?>;

$(document).ready(function() {
    // Event handler for dropdown items
    $(document).on('click', '.dropdown-item', function() {
        const selectedEmployeeName = $(this).text(); // Extract the employee name from the clicked item
        $(this).closest('.main-task-row').find('#employeeSelectButton').text(selectedEmployeeName); // Update the employee name in the same row
    });
});


    $(document).ready(function() {
        $('#Projectname').change(function() {
            var projectId = $(this).val(); // Get the selected project ID
            var projectData = JSON.parse($('#technologyData').val()); // Parse the JSON data
            var technologyName = '';

            // Iterate through the project data to find the selected project
            $.each(projectData, function(index, project) {
                if(project.p_id == projectId) {
                    technologyName = project.Technology;
                    alert(technologyName);
                    return false; // Break the loop
                }
            });

            // Update the value of the technology input field
            $('#departmentName').val(technologyName);
        });
    });

    $('#Projectname').change(function() {
        // Get the selected project's technology
        const projectId = $(this).val();
        const selectedProject = projectData.find(project => project.p_id == projectId);
        const projectTechnology = selectedProject.Technology;

        // Filter employee data based on project technology
        const filteredEmployees = employeeDetails.filter(employee => employee.emp_department === projectTechnology);

        // Clear previous options
        employeeSelectMenu.innerHTML = '';

        // Iterate over the filtered employees and create dropdown items for each employee
        filteredEmployees.forEach(employee => {
            // Create a new dropdown item
            const dropdownItem = document.createElement('a');
            dropdownItem.classList.add('dropdown-item');
            dropdownItem.href = '#';
            dropdownItem.dataset.empid = employee.Emp_id;
            dropdownItem.textContent = employee.emp_name;

            // Append the dropdown item to the dropdown menu
            employeeSelectMenu.appendChild(dropdownItem);
        });
    });

    $('button.add-more').click(function() {
        var newRow = $('.main-task-row').first().clone(); // Clone the first row
        newRow.find('input, select').val(''); // Clear input/select values
        newRow.find('.employee-name').text('Select Employee'); // Reset the employee name text
        $('.main-task-row').last().after(newRow); // Append the cloned row
    });
});
</script>


<?php echo view("Admin/Adminfooter.php"); ?>