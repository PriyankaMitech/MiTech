<?php echo view("Employee/employeeSidebar"); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Meeting Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th>Meeting Link</th>
                                        <th>Meeting Date</th>
                                        <th>Meeting Time</th>
                                        <th>Host Name</th>
                                        <th>Subject</th>
                                        <th>Client Involve </th>
                                        <th>Involve Employee Names</th>



                                        


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                     $adminModel = new \App\Models\Adminmodel();
                                    if(!empty($meetings)){
                                    $count = 1; ?>
                                    
                                    <?php foreach ($meetings as $meeting): 
                                        
                                        
                                        $employeeIds = explode(',', $meeting->employee_id); // Extract employee IDs
                                        $employeeNames = [];
                                
                                        foreach ($employeeIds as $id) {
                                            $wherecond1 = array('is_deleted' => 'N', 'Emp_id' => $id);
                                            $employee = $adminModel->get_single_data('employee_tbl', $wherecond1);
                                            
                                            if (!empty($employee)) {
                                                $employeeNames[] = $employee->emp_name; // Assuming 'Emp_name' is the field name for employee's name
                                            } else {
                                                $employeeNames[] = 'Unknown Employee';
                                            }
                                        }
                                
                                        $employeeNamesStr = implode(', ', $employeeNames); // Convert names array to a comma-separated string
                                       
                                    //    echo "<pre>";print_r($employeeIds);exit();
                                       ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                      

                                        <td><a  class="btn btn-primary" href="<?php echo $meeting->meeting_link; ?>"
                                                target="_blank">Join Now</a>
                                            
    
                                        </td>
                                        <td><?php echo $meeting->meeting_date; ?></td>
                                        <td><?php echo $meeting->meeting_time; ?></td>

                                        <td><?php echo $meeting->emp_name; ?></td>
                                        <td><?php echo $meeting->Subject; ?></td>
                                        <td><?php echo $meeting->client_involve; ?></td>

                                        <td><?php echo $employeeNamesStr; ?></td> <!-- Display employee names here -->

                                      

                                    </tr>
                                    <?php endforeach; ?>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

<?php echo view("Employee/empfooter"); ?>