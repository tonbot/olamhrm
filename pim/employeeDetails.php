<?php
    include_once('../resources/include.php'); 
    include_once('../model/EkirsController.php'); 
    $controller=new Controller();
    $runData = new stdClass();
    if(isset($_GET["a"]) && trim($_GET["a"] !="")){
        $a="employeeDetails";
        $b = trim($_GET["a"]);
        $runData -> a = $a;
        $runData -> b = $b;
        $runData -> k = "employeeById";
        $response = $controller -> runApp($runData);
        if($response == 0){
            header('Location: addEmployee.php');
        }
      
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKIRS-HRM</title>
    <!-- header css -->
    <link rel="stylesheet" href="/olamhrm/resources/customCss/header.css">
    <!-- addEmployee css -->
    <link rel="stylesheet" href="css/employeeDetails.css">
    <script src="js/employeeDetails.js"></script>
</head>

<body>

    <!-- including details -->
    <?php include_once "../header.php" ?>
    <section class="mother-container">
        <div class="row row-container">
            <!-- image and links -->
            <div class="col-2 col-container">
                <!-- image -->
                <div class="card">
                    <div class="card-header">
                        <h6><?php echo $response[0]['emp_lastname'] ?></h6>
                    </div>
                    <div class="card-body image-container">
                        <img src="images/persons.png" alt="PERSON">
                    </div>
                </div>
                <!-- links -->
                <?php include_once('empPageLinks.php') ?>
            </div>
            <!-- Personal info  -->
            <div class="col-10 col10-container">
                <div class="card">
                    <!-- card for personal details -->
                    <div class="card-header">
                        <h6>Personal Information</h6>
                    </div>
                    <!-- card-body for personal details -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <span> First Name </span>
                            </div>
                            <div class="col-10">
                                <div class="name-break">
                                    <label for=""><em>*</em> First Name</label>
                                    <label for="">Middle Name</label>
                                    <label for=""><em>*</em> Last Name</label>
                                </div>
                                <div>
                                    <input type="text" id="first_name"
                                        value="<?php echo $response[0]['emp_firstname'] ?>" disabled>
                                    <input type="text" id="middle_name"
                                        value="<?php echo $response[0]['emp_middle_name'] ?>" disabled>
                                    <input type="text" id="last_name" value="<?php echo $response[0]['emp_lastname'] ?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-2">
                                <span> Employee Id </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="employee_id"
                                        value="<?php echo $response[0]['employee_id'] ?>" disabled>
                                    <span> Other Id <input type="text" id="other_id"
                                            value="<?php echo $response[0]['emp_other_id'] ?>" disabled> </span>
                                    <small class="form-text text-muted">Employee Id can not be edited</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span>Driver's License Number </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="drivers_license_number"
                                        value="<?php echo $response[0]['emp_dri_lice_num'] ?>" disabled>
                                    <span> License Expiry Date <input class="datepicker" type="text"
                                            id="license_expiry_date"
                                            value="<?php echo $response[0]['emp_dri_lice_exp_date'] ?>" disabled>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-2">
                                <span>Gender</span>
                            </div>
                            <div class="col-10">
                                <div>
                                    <input type="radio" name="sex" value="male" disabled> <span class="mr-3">Male</span>
                                    <input type="radio" name="sex" value="female" disabled> <span>Female</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span>Nationality</span>
                            </div>
                            <div class="col-10">
                                <div>
                                    <select id="nationality" disabled>
                                        <option>Nigeria</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span>Date of Birth</span>
                            </div>
                            <div class="col-10">
                                <div>
                                    <input class="datepicker" id="birthdate"
                                        value="<?php echo $response[0]['emp_birthday'] ?> " disabled>
                                </div>
                            </div>
                        </div>

                    </div> <!-- card-body for personal detailsends here -->
                    <div class="card-footer">
                        <button class="btn btn-secondary edit">EDIT</button>
                        <button class="btn btn-success save">Save</button>
                        <button class="btn btn-danger cancel">Cancel</button>
                    </div>
                </div><!-- card for personal details ends here-->

               
                  <!-- add attachment -->
                  <?php include_once('addAttachment.php') ?>
                 <!-- card for add attachments ends here-->

            </div>
            <span id="id" hidden><?php echo $b ?></span>
        </div>
    </section>

    <script>
    $(document).ready(function() {
        var res = '<?php echo json_encode($response) ?>';
        res = JSON.parse(res)
        if (res[0].emp_gender == "male") {
            $("input[value='male']").attr("checked", "checked");
        }
        if (res[0].emp_gender == "female") {
            $("input[value='female']").attr("checked", "checked");
        }
        if(res[0].emp_dri_lice_exp_date == "0000-00-00"){
                $("#license_expiry_date").val("");
            }else{
                $("#license_expiry_date").val(res[0].emp_dri_lice_exp_date);
            }
            if(res[0].emp_birthday == "0000-00-00"){
             
             $("#birthdate").val("");
         }else{
             $("#birthdate").val(res[0].emp_birthday);
         }
        $(".cancel").click(function() {
            $("#first_name").val(res[0].emp_firstname);
            $("#middle_name").val(res[0].emp_middle_name);
            $("#last_name").val(res[0].emp_lastname);
            $("#other_id").val(res[0].emp_other_id);
            $("#drivers_license_number").val(res[0].emp_dri_lice_num);
            if(res[0].emp_dri_lice_exp_date == "0000-00-00"){
                $("#license_expiry_date").val("");
            }else{
                $("#license_expiry_date").val(res[0].emp_dri_lice_exp_date);
            }
           
            if (res[0].emp_gender == "male") {
                $("input[value='male']").attr("checked", "checked");
            }
            if (res[0].emp_gender == "female") {
                $("input[value='female']").attr("checked", "checked");
            }
            if(res[0].emp_birthday == "0000-00-00"){
             
                $("#birthdate").val("");
            }else{
                $("#birthdate").val(res[0].emp_birthday);
            }  
        });
    });
    </script>
</body>

</html>