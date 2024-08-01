
<footer class="main-footer">
<strong>2024 © All Rights are reserved | <a href="http://www.marketingintelligence.tech">MI Tech Solutions</a></strong>   
    
  </footer>
</div>
  <script src="<?=base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url(); ?>public/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url(); ?>public/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url(); ?>public/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url(); ?>public/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url(); ?>public/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url(); ?>public/assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url(); ?>public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url(); ?>public/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url(); ?>public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url(); ?>public/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=base_url(); ?>public/assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url(); ?>public/assets/dist/js/pages/dashboard.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/jquery/jquery.validate.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url(); ?>public/assets/dist/js/select2.full.min.js"></script>
<!-- E:\xampp\htdocs\miTech\public\assets\dist\js\select2.full.min.js -->
  <!-- E:\xampp\htdocs\miTech\public\assets\dist\css\select2-bootstrap4.min.css -->
  <script src="<?=base_url(); ?>public/assets/dist/js/custome.js"></script>



 <script src="<?=base_url(); ?>public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/pdfmake/pdfmake.min.js"></script>

<script src="<?=base_url(); ?>public/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




<script>
   $(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": [
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(.noExport)'  // Exclude columns with class 'noExport'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':not(.noExport)'  // Exclude columns with class 'noExport'
                },
                customize: function(doc) {
                    doc.defaultStyle.fontSize = 8; // Set font size to fit more content in PDF
                    doc.styles.tableHeader.fontSize = 10; // Adjust table header font size
                    // Other customization options as needed
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':not(.noExport)'  // Exclude columns with class 'noExport'
                }
            }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<script>
 
    $.validator.addMethod("mobile", function(value, element) {
        // Check if the input is a valid email or a valid mobile number
        return this.optional(element) || /^[0-9]{10}$/i.test(value);
    }, "Please enter a valid mobile number.");

    $.validator.addMethod('lettersOnly', function(value, element) {
        return /^[a-zA-Z\s]*$/.test(value); // This regex allows only letters and spaces
    }, 'Please enter letters only');

    $.validator.addMethod('customPassword', function(value, element) {
            // Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol. It should be at least 8 characters long.
            return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$/.test(value);
        },
        'Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol (!@#$%^&*) and be at least 8 characters long'
    );

    $.validator.addMethod("emailval", function(value, element) {
        // Check if the input is a valid email or a valid mobile number
        return this.optional(element) || /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/i.test(value);
    }, "Please enter a valid email address.");

    $(document).ready(function() {
        $('#adminForm').validate({
            rules: {
                full_name: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },
                email: {
                    required: true,
                    email: true,
                    emailval: true,
                },
                mobile_no: {
                    required: true,
                    mobile: true
                },
                password: {
                    required: true,
                    customPassword: true
                },
                // confirm_pass: {
                //     required: true,
                //     equalTo: '#password'
                // }
            },
            messages: {
                full_name: {
                    required: 'Please enter your name.',
                    lettersOnly: 'Please enter letters only.' // Custom error message
                },
                email: {
                    required: 'Please enter your email address.',
                    email: 'Please enter a valid email address.',
                    emailval: 'Please enter a valid email address.'
                },
                mobile_no: {
                    required: 'Please enter your mobile number.',
                    mobile: 'Please enter 10 digit mobile number.',
                },
                password: {
                    required: "Password is required.",
                    customPassword: "Password must contain at least one uppercase letter, one lowercase letter, one number, and be at least 8 characters long"
                },

                // confirm_pass: {
                //     required: 'Please confirm your password.',
                //     equalTo: 'Passwords do not match.'
                // }
            },


        });
    });
    $(document).ready(function() {
        $('#projectForm').validate({
            rules: {
                projectName: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },
                Client_name: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },
                Client_email: {
                    required: true,
                    email: true,
                    emailval: true,
                },
                Client_mobile_no: {
                    required: true,
                    mobile: true
                },
                POCname: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },
                POCemail: {
                    required: true,
                    email: true,
                    emailval: true,
                },
                POCmobileNo: {
                    required: true,
                    mobile: true
                },
             
            },
            messages: {
                projectName: {
                    required: 'Please enter Project name.',
                    lettersOnly: 'Please enter letters only.' // Custom error message
                },
                Client_name: {
                    required: 'Please enter Client name.',
                    lettersOnly: 'Please enter letters only.' // Custom error message
                },
                Client_email: {
                    required: 'Please enter Client email address.',
                    email: 'Please enter a valid email address.',
                    emailval: 'Please enter a valid email address.'
                },
                Client_mobile_no: {
                    required: 'Please enter Client mobile number.',
                    mobile: 'Please enter 10 digit mobile number.',
                },
                POCname: {
                    required: 'Please enter POC name.',
                    lettersOnly: 'Please enter letters only.' // Custom error message
                },
                POCemail: {
                    required: 'Please enter POC email address.',
                    email: 'Please enter a valid email address.',
                    emailval: 'Please enter a valid email address.'
                },
                POCmobileNo: {
                    required: 'Please enter POC mobile number.',
                    mobile: 'Please enter 10 digit mobile number.',
                },
            },
        });
    });

    $(document).ready(function() {

            
            $.validator.addMethod("validEmail", function(value, element) {
                // Use a regular expression for basic email validation
                return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value);
            }, "Please enter a valid email address.");
            //  Add custom method for mobile number validation
            $.validator.addMethod("validMobileNumber", function(value, element) {
                return this.optional(element) || /^[0-9]$/i.test(value);
            }, "Please enter a valid mobile number.");
          
    


       // Initialize form validation
            $('#createEmployeeForm').validate({
                rules: {
                    emp_name: {
                        required: true,
                        lettersOnly: true
                    },
                    emp_email: {
                        required: true,
                        validEmail: true // Use the custom method here
                    },
                    mobile_no: {
                        required: true,
                        validMobileNumber: true
                    },
                    emp_department: {
                        required: true
                    },
                    emp_joiningdate: {
                        required: true
                    },
                    password: {
                    required: true,
                    customPassword: true
                },
                },
                messages: {
                    emp_name: {
                        required: 'Please enter name.',
                        lettersOnly: 'Please enter letters only' // Custom error message
                    },
                    emp_email: {
                        required: 'Please enter email address',
                        validEmail: 'Please enter a valid email address' // Custom error message
                    },
                    mobile_no: {
                        required: 'Please enter Mobile number'
                    },
                    emp_department: {
                        required: 'Please enter department'
                    },
                    emp_joiningdate: {
                        required: 'Please enter Joining date'
                    },
                    password: {
                    required: "Password is required.",
                    customPassword: "Password must contain at least one uppercase letter, one lowercase letter, one number,  one symbol , and be at least 8 characters long"
                },
                }
            });
        });
</script>
<script>
    $(document).ready(function() {
        $('#email').on('input', function() {
            var username = $(this).val();
            // alert(username);

            $.ajax({
                type: 'POST',
                url: '<?= base_url(); ?>/ ',
                data: {
                    username: username
                },
                success: function(response) {
                    if (response == 'false') {
                        $('#emailError').text('');
                        $('.submitButton').prop('disabled', false);

                    } else if (response == 'true') {
                        $('#emailError').text('This email is already available.');
                        $('.submitButton').prop('disabled', true);
                    }
                }
            });
        });
    });

    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});


    $(".add-row").click(function() {
        var newRow = 
            '<div class="row">'+
            '<div class="col-md-2 col-12">'+
            '<div class="form-group">'+
            '<label for="task_name">Task Date</label>'+
            '<input type="date" class="form-control" name="task_name" id="task_name" placeholder="Select task date">'+
            '</div>'+
            '</div>'+
            '<div class="col-md-2 col-12">'+
            '<div class="form-group">'+
            '<label for="project_name">Project Name:</label>'+
            '<select class="form-control" name="project_name[]" id="project_name[]" required>'+
            '<option value="">Select Project</option>'+
            '<?php if (!empty($projectData)) { ?>'+
            '<?php foreach ($projectData as $data) { ?>'+
            '<option value="<?=$data->p_id; ?>"<?php if ((!empty($single_data)) && $single_data->project_name === $data->p_id) { echo 'selected'; } ?>><?= $data->projectName; ?></option>'+
            '<?php } ?>'+
            '<?php } ?>'+
            '</select>'+
            '</div>'+
            '</div>'+
            '<div class="col-md-3 col-12">'+
            '<div class="form-group">'+
            '<label for="task">Task</label>'+
            '<textarea id="task" name="task[]" class="form-control" rows="1" cols="2"  placeholder="Enter task">'+
            '</textarea>'+
            '</div>'+
            '</div>'+
            '<div class="col-md-2 col-12">'+
            '<div class="form-group">'+
            '<label for="use_hours">Hours for Task: </label>'+
            '<input type="number" class="form-control" name="use_hours[]" step="0.01"  id="use_hours" placeholder="Hours for the Task">'+
            '</div>'+
            '</div>'+
            '<div class="col-md-2 col-12">'+
            '<div class="form-group">'+
            '<label for="task_status">Task Status: </label>'+
            '<select id="task_status" class="form-control form-select "name="task_status[]" >'+
            '<option value="" selected>Select task status</option>'+
            '<option value="Complete" >Complete</option>'+
            '<option value="Work In Progress" > Work In Progress</option>'+
            '<option value="Pending" >Hold</option>'+
            '</select>'+
            '</div>'+
            '</div>'+
            
            '<div class="col-md-1 mt-2">' +
            '<div class="form-group mt-4">' +
            '<button type="button" class="btn btn-danger remove-row"><i class="fa fa-trash"aria-hidden="true"></i></button>' +
            '</div>' +
            '</div>' +
            '</div>';
        $("#dynamic-rows").append(newRow);
    });

    // Remove row dynamically
    $("body").on("click", ".remove-row", function() {
        $(this).closest(".row").remove();
    });
    

    $(document).ready(function() {
            // Hide flash messages after 10 seconds
            setTimeout(function() {
                $('.flash-message').fadeOut('slow');
            }, 5000); // 10000 milliseconds = 10 seconds
        });
</script>

<script>
    $(document).ready(function() {
        var base_url = "<?= base_url(); ?>";

        // Sidebar link smooth scroll
        $('.nav-link').on('click', function(e) {
            var target = $(this).attr('href');
            if (target && target.startsWith('#')) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $(target).offset().top
                }, 1000, function() {
                    window.location.hash = target;
                });
            } else if (target && !target.includes(base_url)) {
                // Prevent default action for links not starting with base_url
                e.preventDefault();
            } else {
                $('html, body').animate({ scrollTop: 0 }, 500, function() {
                    window.location.href = target;
                });
            }
        });

        // Flash message auto-hide
        setTimeout(function() {
            $('#flash-message-container .flash-error').fadeOut('slow');
            $('#flash-success-container .flash-success').fadeOut('slow');
        }, 3000);

        // Open the relevant dropdown menu based on the current URL
        var currentPage = window.location.href.split('/').pop(); // Get the current page from the URL

        // Iterate over each dropdown menu item
        $('.nav-item').each(function() {
            var $this = $(this);
            var $link = $this.find('> .nav-link'); // Direct link inside nav-item
            var $submenu = $this.find('.nav-treeview'); // Submenu

            if ($submenu.length) {
                // If the submenu exists, check for active link inside it
                $submenu.find('.nav-link').each(function() {
                    var href = $(this).attr('href').split('/').pop();
                    if (href === currentPage) {
                        // If the current page matches any submenu link
                        $this.addClass('menu-open'); // Add menu-open class to the parent nav-item
                        $this.find('.nav-treeview').show(); // Show the submenu
                    }
                });
            }
        });
    });
</script>

</body>
</html>