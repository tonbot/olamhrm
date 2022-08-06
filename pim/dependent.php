<?php
    include_once('../resources/include.php'); 
    if(isset($_GET["a"]) && trim($_GET["a"] !="")){
        $b = trim($_GET["a"]);
    }else{
        header('Location: addEmployee.php');
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
    <link rel="stylesheet" href="css/emergencyContact.css">
    <script src="js/dependent.js"></script>
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
                        <h6>Add Dependent</h6>
                    </div>
                    <!-- card-body for personal details -->
                    <div class="card-body ">
                        <button class="btn btn-success add1">Add</button>
                        <div class="contact_form">
                            <div class="row">
                                <div class="col-2">
                                    <span> Name <em>*</em> </span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <input type="text" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span> Relationship <em>*</em> </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <input type="text" id="relationship">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Date of Birth</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <input class="datepickers" type="text" id="birthdate" >
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <button class="btn btn-success save">Save</button>
                                <button class="btn btn-secondary cancel">Cancel</button>
                            </div>

                        </div><!-- contact_form ends here -->
                    </div> <!-- card-body for Contact details sends here -->
                </div><!-- card for personal details ends here-->

                <!-- record list of Emergency Contact -->
                <div class="card mt-5 shadow">
                    <!-- card header -->
                    <div class="card-header">
                        <h6>Assigned Dependents</h6>
                    </div>
                    <!-- card body -->
                    <div class="card-body">
                        <button class="btn btn-success open">Close</button>
                        <div class="table-container">
                            <table class="table table-bordered table-center  table-striped table-hover"
                                id="employeeListTable">
                                <thead>
                                    <tr>
                                        <th>s/n</th>
                                        <th>Name</th>
                                        <th>Relationship</th>
                                        <th>Birth Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- card body ends here -->
                    <!-- card footer -->
                </div>


                <!-- add attachment -->
                <?php include_once('addAttachment.php') ?>

            </div>
            <span id="id" hidden><?php echo $b ?></span>
        </div>
    </section>

</body>

</html>