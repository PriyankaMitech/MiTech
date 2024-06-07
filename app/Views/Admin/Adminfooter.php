<style>
    /* Style for required field labels */
    label.error {
        color: red;
    }
</style>
</div>
<footer class="main-footer">
 

    <strong>2024 &copy; All Rights are reserved | <a href="http://www.marketingintelligence.tech">MI Tech Solutions</a></strong>

    
  
  </footer>

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
  <!-- DataTables  & Plugins -->
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


<script src="<?=base_url(); ?>public/assets/dist/js/custome.js"></script>


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

$(function() {
        // Initialize DataTable for the first table with class 'table-example1'
        $(".table-example1").DataTable({
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
            ],
            "dom": 'Bfrtip' // Ensure the buttons are shown in the correct place
        }).buttons().container().appendTo('.table-example1_wrapper .col-md-6:eq(0)');

        // Initialize DataTable for the second table with class 'table-example2'
        $(".table-example2").DataTable({
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
                WhatsApp_no: {
                    required: true,
                    mobile: true
                },
                password: {
                    required: true,
                    customPassword: true
                },
                confirm_pass: {
                    required: true,
                    equalTo: '#password'
                }
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
                WhatsApp_no: {
                    required: 'Please enter your WhatsApp number.',
                    mobile: 'Please enter WhatsApp number.',
                },
                password: {
                    required: "Password is required.",
                    customPassword: "Password must contain at least one uppercase letter, one lowercase letter, one number, and be at least 8 characters long"
                },

                confirm_pass: {
                    required: 'Please confirm your password.',
                    equalTo: 'Passwords do not match.'
                }
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
                    // lettersOnly: true // Use the custom method here
                },
                Client_email: {
                    required: true,
                    email: true,
                    emailval: true,
                },
                GSTIN: {
                    required: true,
                    gst: true
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
                POCemail: {
                    required: true,
                    email: true,
                    emailval: true
                },
                pono: {
                    required: true,
                },
                podate:{
                    required: true,
                    date: true
                },
                validTill:{
                    required: true,
                    date: true
                },
                vendorCode:{
                    required: true,
                },
                attachment:{
                    required: true,
                }
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
                GSTIN: {
                    required: 'Please enter GST number.',
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
                POCemail: {
                    required: 'Please enter POC email address.',
                    email: 'Please enter a valid email address.',
                    emailval: 'Please enter a valid email address.'
                },
                pono:{
                    required: 'Please enter Client PO number.',
                },
                podate:{
                    required: 'Please enter PO Date',
                    date: 'Please enter a valid date'
                },
                validTill:{
                    required: 'Please enter Valid Date',
                    date: 'Please enter a valid date'
                },
                vendorCode:{
                    required: 'Please enter Vendor Code number',
                },
                attachment:{
                    required: 'Please attach pdf file here',
                }
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
            return this.optional(element) || /^\d{10}$/i.test(value);
            }, "Please enter a valid 10-digit mobile number.");

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
                    WhatsApp_no: {
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
                confirm_password: {
                    required: true,
                    equalTo: '#password'
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
                    WhatsApp_no: {
                    required: 'Please enter your WhatsApp number.',
                    validMobileNumber: 'Please enter WhatsApp number.',
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
                confirm_password: {
                    required: 'Please confirm your password.',
                    equalTo: 'Passwords do not match.'
                },
                }
            });
        });
</script>
<script>
    $.validator.addMethod("gst", function(value, element) {
        // Check if the input is a valid GST number format
        return this.optional(element) || /^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[0-9]{1}[A-Za-z]{1}[0-9]{1}$/.test(value);
    }, "Please enter a valid GST number (e.g., 12ABCDE1234F1Z5).");
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
</script>
<script>
    // jQuery function to hide the success message after 5 seconds
    $(document).ready(function() {
      setTimeout(function() {
        $(".toast").fadeOut(1000);
      }, 5000); // 5000 milliseconds = 5 seconds
    });
  </script>

<script>
    $(document).ready(function() {
        $('#add_menu_form ').validate({
            rules: {
                menu_name: {
                    required: true,
                },
                url_location: {
                    required: true,

                },
            },
            messages: {
                menu_name: {
                    required: 'Please enter menu name.',
                },
                url_location: {
                    required: 'Please enter URL location.',
                },
            }
            
        });
    });
    $(document).ready(function() {
        $('#mainTaskName').validate({
            rules: {
                mainTaskName: {
                    required: true,
                },
                
            },
            messages: {
                mainTaskName: {
                    required: 'Please enter task.',
                },
               
            }
            
        });
    });
    $(document).ready(function() {
        $('#add_department').validate({
            rules: {
                DepartmentName: {
                    required: true,
                },
                
            },
            messages: {
                DepartmentName: {
                    required: 'Please enter Department name',
                },
               
            }
            
        });
    });
    $(document).ready(function() {
        $('#Services').validate({
            rules: {
                ServicesName: {
                    required: true,
                },
                
            },
            messages: {
                ServicesName: {
                    required: 'Please enter Services name',
                },
               
            }
            
        });
    });

    $.validator.addMethod('gstNumber', function(value, element) {
    // GST number format: 2 numeric digits followed by 10 alphanumeric characters
    return /^[0-9]{2}[A-Z0-9]{10}$/.test(value);
}, 'Please enter a valid GST number (e.g., 12ABCDE3456F)');

$.validator.addMethod('panNumber', function(value, element) {
    // PAN number format: 5 uppercase letters, 4 numbers, and 1 uppercase letter
    return /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(value);
}, 'Please enter a valid PAN number (e.g., ABCDE1234F)');

        $(document).ready(function() {
        $('#client_form').validate({
            rules: {
                client_name: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },

                email: {
                    required: true,
                    validEmail: true // Use the custom method here
                },
                mobile_no: {
                    required: true,
                    validMobileNumber: true
                },

                address: {
                    required:true,
                },

                // gst_no: {
                //     gstNumber:true,
                // },
                pan_no: {
                    panNumber: true,
                },
            },
            messages: {
                client_name: {
                    required: 'Please enter client name.',
                    lettersOnly: 'Please enter letters only.' // Custom error message
                },

                email: {
                    required: 'Please enter email address',
                    validEmail: 'Please enter a valid email address' // Custom error message
                },
                mobile_no: {
                    required: 'Please enter Mobile number'
                },
                address: {
                    required: 'Please enter your address.',
                },
                // gst_no: {
          
                //     gstNumber: 'Please enter a valid GST number (e.g., 12ABCDE3456F)'
                // },
                pan_no: {
                    panNumber: 'Please enter a valid PAN number (e.g., ABCDE1234F)'
                },
            }
            
        });

        $('#dailyblog_form').validate({
    rules: {
        dailyblog_name: {
            required: true,
            lettersOnly: true // Use the custom method here
        },

        description: {
            required: true,
        },
        link: {
            required: true,
            
        },

    },
    messages: {
        dailyblog_name: {
            required: 'Please enter dailyblog name.',
            lettersOnly: 'Please enter letters only.' // Custom error message
        },

        description: {
            required: 'Please enter description.',
        },
        link: {
            required: 'Please enter link'
        },
    
    }
    
});
    });
        $('#email').on('blur', function() {
                var email = $(this).val();
                var emp_id = $('#Emp_id').val();
                $.ajax({
                    url: '<?php echo base_url('checkEmailExistence'); ?>',
                    type: 'post',
                    data: {
                        emp_email: email,
                        emp_id: emp_id
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.exists) {
                            $('#emailError').show();
                            $('button[type="submit"]').prop('disabled', true);
                        } else {
                            $('#emailError').hide();
                            $('button[type="submit"]').prop('disabled', false);
                        }
                    }
                });
            });

    $(document).ready(function() {
        // Initialize form validation
        $('#memo_form').validate({
        rules: {
        memo_start_date: {
            required: true,
            date: true
        },
        memo_subject: {
            required: true,
        },
        admin_name: {
            required: true
        },
        emp_name: {
            required: true
        },
    
    },
    messages: {
        memo_start_date: {
            required: 'Please enter memo start date.',
            date: "Please enter a valid date (e.g. dd-mm-yyyy)"
        },
        memo_subject: {
            required: 'Please enter memo subject.',
        },
        admin_name: {
            required: 'Please enter Admin name.'
        },
        emp_name: {
            required: 'Please enter Employee name.',
    },
     
    }
});
});  

$(document).ready(function() {
            // Hide flash messages after 10 seconds
            setTimeout(function() {
                $('.flash-message').fadeOut('slow');
            }, 5000); // 10000 milliseconds = 10 seconds
        });


        $(document).ready(function() {
        // Initialize form validation
        $('#currency_form').validate({
        rules: {
            currency_code: {
            required: true,

        },
        currency_name: {
            required: true,
        },
        symbol: {
            required: true
        },
        exchange_rate: {
            required: true
        },
    
    },
    messages: {
        currency_code: {
            required: 'Please enter currency code.',
        },
        currency_name: {
            required: 'Please enter currency name.',
        },
        symbol: {
            required: 'Please enter symbol.'
        },
        exchange_rate: {
            required: 'Please enter Exchange rate.',
    },
     
    }
});
});

$(document).ready(function() {
        // Initialize form validation
        $('#notificationForm').validate({
        rules: {
            notification_date: {
            required: true,
        },
        notification_subject: {
            required: true,
        },
        notification_description: {
            required: true
        },
       
    
    },
    messages: {
        notification_date: {
            required: 'Please enter notification date.',
        },
        notification_subject: {
            required: 'Please enter notification subject.',
        },
        notification_description: {
            required: 'Please enter notification description.'
        },
    }
});
});

    $(document).ready(function() {
    // Toggle sidebar height on dropdown click
    $('.nav-item a').on('click', function() {
        if ($(this).next('.nav-treeview').length) {
            $('.sidebar').toggleClass('expanded');
        }
    });
});

</script>

</body>
</html>