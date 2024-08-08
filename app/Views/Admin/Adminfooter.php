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

  <!-- <script src="<?=base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->

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
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':not(.noExport)'  // Exclude columns with class 'noExport'
                },
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var stylesheet = xlsx.xl['styles.xml'];

                    // Add new fills and fonts
                    var fills = stylesheet.getElementsByTagName('fills')[0];
                    var fonts = stylesheet.getElementsByTagName('fonts')[0];
                    var cellXfs = stylesheet.getElementsByTagName('cellXfs')[0];

                    var newFill = `
                        <fill>
                            <patternFill patternType="solid">
                                <fgColor rgb="FFB0C4DE"/>
                                <bgColor indexed="64"/>
                            </patternFill>
                        </fill>`;
                    var newFont = `
                        <font>
                            <sz val="12"/>
                            <color rgb="FF000000"/>
                            <name val="Calibri"/>
                            <family val="2"/>
                            <b/>
                        </font>`;

                    fills.innerHTML += newFill;
                    fonts.innerHTML += newFont;

                    // Add new cellXfs entries
                    var newCellXfs = `
                        <xf numFmtId="0" fontId="1" fillId="0" borderId="0" xfId="0"/>
                        <xf numFmtId="0" fontId="0" fillId="2" borderId="0" xfId="0"/>`;

                    cellXfs.innerHTML += newCellXfs;

                    // Apply the style to weekend days and attendance statuses
                    $('row', sheet).each(function () {
                        var row = $(this);
                        row.find('c').each(function (index) {
                            var cell = $(this);
                            if (index > 5) {  // Adjust this index based on the number of fixed columns before the dates
                                var dateText = cell.text();
                                var date = new Date(dateText);
                                
                                if (!isNaN(date.getTime())) {
                                    var dayOfWeek = date.getDay();
                                    if (dayOfWeek === 6 || dayOfWeek === 0) {
                                        cell.attr('s', '2');  // Use the appropriate style index for weekend days
                                    } else if (cell.text() === 'P' || cell.text() === 'A') {
                                        cell.attr('s', '1');  // Use the appropriate style index for 'P' and 'A'
                                    }
                                }
                            }
                        });
                    });

                    // Set the column widths
                    $('col', sheet).each(function(index) {
                        if (index === 0) {  // First column (e.g., Employee Name)
                            $(this).attr('width', 25);  // Set a wider width for the first column
                        } else if (index < 6) {  // Columns: Total Present Days, Total Absent Days, etc.
                            $(this).attr('width', 15);  // Set the desired width for these columns
                        } else {
                            $(this).attr('width', 8);  // Set the desired width for the rest of the columns
                        }
                    });
                }
            },
            {
                extend: 'pdfHtml5',
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
    return /^[a-zA-Z\s.,()]*$/.test(value); // Updated regex to allow letters, spaces, ., (), and ,
}, 'Please enter valid characters (letters, spaces, ., (), ,) only');

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
        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value);
    }, "Please enter a valid email address.");

    $.validator.addMethod("validMobileNumber", function(value, element) {
        return this.optional(element) || /^\d{10}$/i.test(value);
    }, "Please enter a valid 10-digit mobile number.");

    $.validator.addMethod('lettersOnly', function(value, element) {
    return /^[a-zA-Z\s.,()]*$/.test(value); // Updated regex to allow letters, spaces, ., (), and ,
}, 'Please enter valid characters (letters, spaces, ., (), ,) only');

    // Custom method for radio button validation
    $.validator.addMethod("validUserRole", function(value, element) {
        return $("input[name='user_role']:checked").length > 0;
    }, "Please select a user role.");

    // Initialize form validation
    $('#createEmployeeForm').validate({
        rules: {
            emp_name: {
                required: true,
                lettersOnly: true
            },
            emp_email: {
                required: true,
                validEmail: true
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
            emergency_name: {
                required: true,
                lettersOnly: true
            },
            relationship: {
                required: true,
                lettersOnly: true
            },
            emergency_no: {
                required: true,
                validMobileNumber: true
            },
            // Apply custom radio button validation
            user_role: {
                validUserRole: true
            }
        },
        messages: {
            emp_name: {
                required: 'Please enter name.',
                lettersOnly: 'Please enter letters only'
            },
            emp_email: {
                required: 'Please enter email address',
                validEmail: 'Please enter a valid email address'
            },
            mobile_no: {
                required: 'Please enter Mobile number.'
            },
            WhatsApp_no: {
                required: 'Please enter your WhatsApp number.',
                validMobileNumber: 'Please enter WhatsApp number.',
            },
            emp_department: {
                required: 'Please enter department.'
            },
            emp_joiningdate: {
                required: 'Please enter Joining date.'
            },
            password: {
                required: "Password is required.",
                customPassword: "Password must contain at least one uppercase letter, one lowercase letter, one number, one symbol, and be at least 8 characters long"
            },
            confirm_password: {
                required: 'Please confirm your password.',
                equalTo: 'Passwords do not match.'
            },
            emergency_name: {
                required: 'Please enter emergency contact name.',
                lettersOnly: 'Please enter letters only'
            },
            relationship: {
                required: 'Please enter relation with employee.',
                lettersOnly: 'Please enter letters only'
            },
            emergency_no: {
                required: 'Please enter emergency contact number.'
            },
            user_role: {
                validUserRole: 'Please select a user role.'
            }
        },
        // Error placement function to customize error display for radio buttons
        errorPlacement: function(error, element) {
            if (element.attr("name") === "user_role") {
                error.appendTo(element.closest(".form-group").parent());
            } else {
                error.insertAfter(element);
            }
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
                hsnno: {
                    required: true,
                },
                
            },
            messages: {
                ServicesName: {
                    required: 'Please enter Services name',
                },
                hsnno: {
                    required: 'Please enter HSN/ SAC No.',
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
$.validator.addMethod('lettersOnly', function(value, element) {
    return /^[a-zA-Z\s.,()]*$/.test(value); // Updated regex to allow letters, spaces, ., (), and ,
}, 'Please enter valid characters (letters, spaces, ., (), ,) only');

        $(document).ready(function() {
        $('#client_form').validate({
            rules: {
                client_name: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },
                company_name: {
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
                // pan_no: {
                //     panNumber: true,
                // },
            },
            messages: {
                client_name: {
                    required: 'Please enter client name.',
                    lettersOnly: 'Please enter valid characters (letters, spaces, ., (), ,) only' // Custom error message
                },
                company_name: {
                    required: 'Please enter company name.',
                    lettersOnly: 'Please enter valid characters (letters, spaces, ., (), ,) only' // Custom error message
                },

                email: {
                    required: 'Please enter email address',
                    validEmail: 'Please enter a valid email address' // Custom error message
                },
                mobile_no: {
                    required: 'Please enter Mobile number'
                },
                address: {
                    required: 'Please enter the address.',
                },
                // gst_no: {
          
                //     gstNumber: 'Please enter a valid GST number (e.g., 12ABCDE3456F)'
                // },
                // pan_no: {
                //     panNumber: 'Please enter a valid PAN number (e.g., ABCDE1234F)'
                // },
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
            }, 2500); // 10000 milliseconds = 10 seconds
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

$(document).ready(function() {
        // Initialize form validation
        $('#appointment_form').validate({
        rules: {
            appointmentletter_date: {
            required: true,
        },
        candidate_name: {
            required: true,
        },
        position: {
            required: true,
        },

        salary_pay: {
            required: true,
        },

        variable_pay: {
            required: true,
        },
        joining_date: {
            required: true,
        },
        joining_time: {
            required: true,
        },

        notice_period: {
            required: true,
        },
        select_signature: {
            required: true,
        },

        select_stamp: {
            required: true,
        },
      
    
    },
    messages: {
        appointmentletter_date: {
            required: 'Please enter notification date.',
        },
        candidate_name: {
            required: 'Please enter candidate name.',
        },
        position: {
            required: 'Please enter position.',
        },

        salary_pay: {
            required: 'Please enter salary pay.',
        },
        variable_pay: {
            required: 'Please enter variable pay.',
        },
        joining_date: {
            required: 'Please enter joining date.',
        },
        joining_time: {
            required: 'Please enter joining time.',
        },
        notice_period: {
            required: 'Please enter notice_period.',
        },
        select_signature: {
            required: 'Please select signature.',
        },
        select_stamp: {
            required: 'Please select stamp.',
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



$.validator.addMethod('validate_acc_number', function(value, element) {
    // PAN number format: 5 uppercase letters, 4 numbers, and 1 uppercase letter
    return /^[0-9]{9,18}$/.test(value);
}, 'Please enter a valid Account number (9 digits to 18 digits)');

$.validator.addMethod('validate_IFSC_number', function(value, element) {
    // PAN number format: 5 uppercase letters, 4 numbers, and 1 uppercase letter
    return /^[A-Z]{4}0[A-Z0-9]{6}$/.test(value);
}, 'Please enter a valid IFSC number (e.g. SBIN0125620)');

$.validator.addMethod('validate_upi_id', function(value, element) {
    // PAN number format: 5 uppercase letters, 4 numbers, and 1 uppercase letter
    return /^[0-9A-Za-z.-]{2,256}@[A-Za-z]{2,64}$/.test(value);
}, 'Please enter a valid UPI ID number (e.g. shubham@okaxis)');

$.validator.addMethod("mobile", function(value, element) {
        // Check if the input is a valid email or a valid mobile number
        return this.optional(element) || /^[0-9]{10}$/i.test(value);
    }, "Please enter a valid mobile number.");

    $.validator.addMethod('lettersOnly', function(value, element) {
    return /^[a-zA-Z\s.,()]*$/.test(value); // Updated regex to allow letters, spaces, ., (), and ,
}, 'Please enter valid characters (letters, spaces, ., (), ,) only');

        $(document).ready(function() {
        $('#bank_form').validate({
            rules: {
                bank_name: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },
                branch_name: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },
                account_holder_name: {
                    required: true,
                    lettersOnly: true // Use the custom method here
                },
                account_number: {
                    required: true,
                    validate_acc_number: true // Use the custom method here
                },
                upi_id: {
                    required: true,
                    validate_upi_id: true // Use the custom method here
                },
                ifsc_number: {
                    required: true,
                    validate_IFSC_number: true // Use the custom method here
                },
                mobile_no: {
                    required: true,
                    mobile: true
                },

               
            },
            messages: {
                bank_name: {
                    required: 'Please enter bank name.',
                    lettersOnly: 'Please enter letters only.' // Custom error message
                },
                branch_name: {
                    required: 'Please enter branch name.',
                    lettersOnly: 'Please enter letters only.' // Custom error message
                },
                account_holder_name: {
                    required: 'Please enter Account Holder name.',
                    lettersOnly: 'Please enter letters only.' // Custom error message
                },
                account_number: {
                    required: 'Please enter account number.',
                    validate_acc_number: 'Please enter valid account number (9 digits to 18 digits).' // Custom error message
                },
                upi_id: {
                    required: 'Please enter UPI ID.',
                    validate_acc_number: 'Please enter valid upi id number only (e.g. shubham@okaxis).' // Custom error message
                },
                ifsc_number: {
                    required: 'Please enter IFSC number.',
                    validate_IFSC_number: 'Please enter valid IFSC number(e.g. SBIN0125620).' // Custom error message
                },
                mobile_no: {
                    required: 'Please enter Mobile number',
                    mobile : 'Please enter a valid mobile number.'
                },
               
            }
            
        });
    });
});

$(document).ready(function() {
        // Initialize form validation
        $('#holiday_form').validate({
        rules: {
            holiday_date: {
            required: true,

        },
        holiday_title: {
            required: true,
        },
        holiday_description: {
            required: true
        },
        holiday_type: {
            required: true
        },
    
    },
    messages: {
        holiday_date: {
            required: 'Please enter holiday date.',
        },
        holiday_title: {
            required: 'Please enter holiday title.',
        },
        holiday_description: {
            required: 'Please enter holiday description.'
        },
        holiday_type: {
            required: 'Please enter holiday type.',
    },
    }
});
});


        $(document).ready(function() {
            $('#nonGstTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });

            $('#gstTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });


        
    




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