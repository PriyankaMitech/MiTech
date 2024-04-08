</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
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
<script src="<?=base_url(); ?>public/assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url(); ?>public/assets/dist/js/pages/dashboard.js"></script>
<script src="<?=base_url(); ?>public/assets/plugins/jquery/jquery.validate.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url(); ?>public/assets/dist/js/select2.full.min.js"></script>
<!-- E:\xampp\htdocs\miTech\public\assets\dist\js\select2.full.min.js -->
  <!-- E:\xampp\htdocs\miTech\public\assets\dist\css\select2-bootstrap4.min.css -->

<!-- E:\xampp\htdocs\miTech\public\assets\plugins\jquery\jquery.validate.min.js -->
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

</body>
</html>