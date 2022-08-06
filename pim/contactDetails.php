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
    <link rel="stylesheet" href="css/contactDetails.css">
    <script src="js/contactDetails.js"></script>
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
                        <h6><?php ?></h6>
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
                        <h6>Contact Details</h6>
                    </div>
                    <!-- card-body for personal details -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <span> Address Street 1 </span>
                            </div>
                            <div class="col-10">
                                <div>
                                    <input type="text" id="street-1" value="<?php echo $response[0]['emp_street1'] ?>"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span> Address Street 2 </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="street-2" value="<?php echo $response[0]['emp_street2'] ?>"disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span> City </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="city" value="<?php echo $response[0]['city_code'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span> State/Province </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="province" value="<?php echo $response[0]['provin_code'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span> Zip/Postal Code </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="zip" value="<?php echo $response[0]['emp_zipcode'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-2">
                                <span> Home Telephone </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="home-tel" value="<?php echo $response[0]['emp_hm_telephone'] ?>"disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span> Mobile </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="mobile" value="<?php echo $response[0]['emp_mobile'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span> Work Telephone </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="work-tel" value="<?php echo $response[0]['emp_work_telephone'] ?>"disabled>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-2">
                                <span> Work Email </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="work-email" value="<?php echo $response[0]['emp_work_email'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <span> Other Email </span>
                            </div>
                            <div class="col-10">
                                <div class="second-row">
                                    <input type="text" id="other-email" value="<?php echo $response[0]['emp_oth_email'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div> <!-- card-body for Contact details sends here -->
                    <div class="card-footer">
                        <button class="btn btn-secondary edit">EDIT</button>
                        <button class="btn btn-success save">Save</button>
                        <button class="btn btn-danger cancel">Cancel</button>
                    </div>
                </div><!-- card for personal details ends here-->

                <!-- card for add attachments-->
                <?php include_once('addAttachment.php') ?>

            </div>
            <span id="id" hidden><?php echo $b ?></span>
        </div>
    </section>

    <script>
    $(document).ready(function() {
        var res = '<?php echo json_encode($response) ?>';
        res = JSON.parse(res)
        $(".cancel").click(function() {
            $("#street-1").val(res[0].emp_street1);
            $("#street-2").val(res[0].emp_street2);
            $("#city").val(res[0].city_code);
            $("#province").val(res[0].provin_code) 
            $("#zip").val(res[0].emp_zipcode);
            $("#home-tel").val(res[0].emp_hm_telephone);
            $("#mobile").val(res[0].emp_mobile);
            $("#work-tel").val(res[0].emp_work_telephone);
            $("#work-email").val(res[0].emp_work_email);
            $("#other-email").val(res[0].emp_oth_email);
        });
    });
    </script>
</body>

</html>