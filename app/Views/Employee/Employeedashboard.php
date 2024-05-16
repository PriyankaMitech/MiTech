
<?php 
//echo view ("Employee/employeeSidebar.php"); 

?>
<?php
$file = __DIR__ . "/employeeSidebar.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
?>

<style>
      .input-group>.custom-file {
    /* display: -ms-flexbox; */
            display: block!important;
            }
            .list-group {
        list-style-type: none;
        }
        .list-group-item{
            border: none!important;
        }
    </style>
 <?php  
$session = session();
$sessionData = $session->get('sessiondata'); 
// print_r($sessionData);die;
?> 
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-6 offset-3">
        
<div class="card card-secondary">
    <?php 
    
    // echo "<pre>";print_r($sessionData);exit();
   
            // echo "<pre>";print_r($empdata);exit();
            if(!empty($empdata)){
                if($empdata->AadharFile == ''){

    ?>
  <div class="card-header">
    <h3 class="card-title"> Below documents keep ready to upload</h3>
  </div>

  <div class="card-body">
 
          <div class="row">
              <div class="col-sm-6">
                    <ul class="list-group">
                        <li class="list-group-item">Photo</li>
                        <li class="list-group-item">Resume</li>
                        <li class="list-group-item">PAN</li>
                        <li class="list-group-item">Aadhar</li>    
                    </ul>
              </div>
              </div>
              <div class="card-footer">
                <button type="button" class="btn btn-info" onclick="profileForm()" value="Proceed">Proceed</button>
                <!-- <button type="button" class="btn btn-default float-right" >Later</button> -->
                <a href="<?php echo base_url() ?>logout" class="btn btn-default float-right" role="button">Later</a>
            </div>
  </div>
          
</div>
       
</div>

<div class="container-fluid" id="profile" style="display:none">
<div class="">
<div class="row">

<div class="col-lg-6 offset-3">

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Profile Form</h3>
    </div>

    <form action="<?php echo base_url();?>profile" method="post" id="profileForm" enctype="multipart/form-data">
    <div class="card-body">

        <div class="form-group">
            <label for="empName">Name :</label>
            <input type="text" class="form-control" name="empName" id="empName" placeholder="Enter name" value="<?php if (!empty($sessionData)) {  echo $sessionData['emp_name']; }?>">
        </div>
        <div class="form-group">
            <label for="empEmail">Email address :</label>
            <input type="email" class="form-control" name="empEmail" id="empEmail" placeholder="Enter email" value="<?php if (!empty($sessionData)) {  echo $sessionData['emp_email']; }?>">
        </div>
        <div class="form-group">
            <label for="empMobile">Mobile Number :</label>
            <input type="text" class="form-control" name="empMobile" id="empMobile" placeholder="Enter mobile" pattern="\d{10}" maxlength="10" value="<?php if (!empty($sessionData)) {  echo $sessionData['mobile_no']; }?>">
        </div>
        <div class="form-group">
            <label for="empCurrentAddress">Address : Current</label>
            <textarea class="form-control" rows="3" placeholder="Current Address" name="empCurrentAddress" id="empCurrentAddress"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputAddress">Address : Permanent</label>
            <div class="form-group">
                <span class="form-check">
                    <input class="form-check-input" type="radio" name="addressType" id="radioCurrent">
                    <label class="form-check-label" for="radioCurrent">Same as above</label>
                </span>
            </div>
            <textarea class="form-control" rows="3" placeholder="Permanent Address" name="empPermanentAddress" id="empPermanentAddress"></textarea>
        </div>
        <div class="form-group">
            <label for="employeeName">Skills :</label>
            <div class="select2-purple">
                <select class="form-control" name="skillName" style="width: 100%;" id="skillName">
                    <option value="">Select the Skill</option>    
                    <option value="programming">Programming</option>
                    <option value="testing">Testing</option>
                    <option value="ui">UI</option>
                    <option value="networking">Networking</option>
                </select>
            </div>
        </div>

        <div id="secondSelect" class="form-group" style="display: none;">
            <label for="programmingOptions">Programming Languages :</label>
            <select class="form-control" name="programmingOptions" style="width: 100%;">
                <!-- Options for the second select -->
                <option value="">Select the Programming Language</option> 
                <option value="PHP">PHP</option>
                <option value="Dot Net">Dot Net </option>
                <option value="Java">Java</option>
                <option value="React">React</option>
                <option value="Python">Python</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Attach Documents :</label>
            <div class="form-group mb-4">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="PhotoFile" id="PhotoFile" accept="image/*" onchange="updateLabel('PhotoFile')">
                        <label class="custom-file-label" for="PhotoFile">Photo</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" value="Upload Photo">Upload</button>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="ResumeFile" id="ResumeFile" accept="application/pdf" onchange="updateLabel('ResumeFile')">
                        <label class="custom-file-label" for="ResumeFile">Resume</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" value="Upload Resume">Upload</button>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="PANFile" id="PANFile" accept="application/pdf,image/*" onchange="updateLabel('PANFile')">
                        <label class="custom-file-label" for="PANFile">PAN</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" value="Upload PAN">Upload</button>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="AadharFile" id="AadharFile" accept="application/pdf,image/*" onchange="updateLabel('AadharFile')">
                        <label class="custom-file-label" for="AadharFile">Aadhar</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" value="Upload Aadhar">Upload</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="card-footer">
        <div class="text-center">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
</form>

<script>
function updateLabel(inputId) {
    var input = document.getElementById(inputId);
    var label = input.nextElementSibling;
    var fileName = input.files[0] ? input.files[0].name : 'Choose file';
    label.textContent = fileName;
}
</script>

</div>



<?php }}?>
</div>
    </section>
  </div>
  <script src= "https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>



document.addEventListener('DOMContentLoaded', function () {
    $(document).ready(function() {
    // Add custom method for letters only validation
    $.validator.addMethod("lettersOnly", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    }, "Please enter letters only.");
    
    $.validator.addMethod("validEmail", function(value, element) {
        // Use a regular expression for basic email validation
        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value);
    }, "Please enter a valid email address.");
    
    // Add custom method for mobile number validation
    $.validator.addMethod("validMobileNumber", function(value, element) {
            return this.optional(element) || /^\d{10}$/i.test(value);
            }, "Please enter a valid 10-digit mobile number.");
        // Get the radio button and both address fields
        const radioCurrent = document.getElementById('radioCurrent');
        const currentAddress = document.getElementById('empCurrentAddress');
        const permanentAddress = document.getElementById('empPermanentAddress');

        // Initialize form validation
    const profileForm = $('#profileForm');
    
        // Validation rules and messages...
      

    // Initialize form validation
    $('#profileForm').validate({
        rules: {
            empName: {
                required: true,
                lettersOnly: true
            },
            empEmail: {
                required: true,
                validEmail: true // Use the custom method here
            },
            empMobile: {
                required: true,
                validMobileNumber: true
            },
            empCurrentAddress: {
                required: true
            },
            empPermanentAddress: {
                required: true
            },
            skillName: {
                required: true
            },
            programmingOptions: {
                required: true
            },
            PhotoFile: {
                required: true,
                filesize: 1048576 // 1MB max file size
            },
            ResumeFile: {
                required: true,
                filesize: 5242880 // 5MB max file size
            },
            PANFile: {
                required: true,
                filesize: 1048576 // 1MB max file size
            },
            AadharFile: {
                required: true,
                filesize: 1048576 // 1MB max file size
            }
        },
        messages: {
            empName: {
                required: 'Please enter your name.',
                lettersOnly: 'Please enter letters only.' // Custom error message
            },
            empEmail: {
                required: 'Please enter your email address.',
                validEmail: 'Please enter a valid email address.' // Custom error message
            },
            empMobile: {
                required: 'Please enter your Mobile number.'
            }, 
            empCurrentAddress: {
                required: 'Please enter your current address.'
            },  
            empPermanentAddress: {
                required: 'Please enter your permanent address.'
            },  
            skillName: {
                required: 'Please enter your skill.'
            },
            programmingOptions: {
                required: 'Please enter Programming Language.'
            },
            PhotoFile: {
                required: 'Please select a photo file.',
                filesize: 'File size must be less than 1MB.'
            },
            ResumeFile: {
                required: 'Please select a resume file.',
                filesize: 'File size must be less than 5MB.'
            },
            PANFile: {
                required: 'Please select a PAN file.',
                filesize: 'File size must be less than 1MB.'
            },
            AadharFile: {
                required: 'Please select an Aadhar file.',
                filesize: 'File size must be less than 1MB.'
            }
        }
    });
     // Add an event listener to the radio button
     radioCurrent.addEventListener('change', function () {
            // Check if the radio button is checked
            if (this.checked) {
                // Copy the value of current address to permanent address field
                permanentAddress.value = currentAddress.value;
                 // Trigger validation on the permanent address field
                profileForm.validate().element('#empPermanentAddress');
            }
        });
});

    

       

        const skillName = document.getElementById('skillName');
        const secondSelect = document.getElementById('secondSelect');

        // Function to show or hide the second select based on the selected option
        function toggleSecondSelect() {
            if (skillName.value === 'programming') {
                secondSelect.style.display = 'block'; // Show the second select
            } else {
                secondSelect.style.display = 'none'; // Hide the second select
            }
        }

        // Initial toggle based on the selected option when the page loads
        toggleSecondSelect();

        // Add an event listener to the skills dropdown
        skillName.addEventListener('change', function () {
            toggleSecondSelect(); // Toggle the second select based on the selected option
        });
    });

   
     function profileForm(){
            $('#profile').toggle();
          }

          

  </script>

<?php 
//echo view("Admin/Adminfooter.php"); 
?>

<?php
$file = __DIR__ . "/empfooter.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
?>