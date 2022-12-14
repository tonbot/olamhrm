<?php
    include_once('../resources/include.php'); 
    include_once('../model/EkirsController.php'); 
    if(isset($_GET["a"]) && trim($_GET["a"] !="")){
        $b = trim($_GET["a"]);
        // $controller=new Controller();
        // $runData = new stdClass();
        // $runData -> l =  $b;
        // $query = "SELECT * FROM hr_job WHERE emp_id =:id"; 
        // $resJob = $controller -> getData2($runData,$query);
        // if ($resJob == ""){
        //     $data = array(
        //         'job_title' => "",
        //         'job_category' => "",
        //         'joined_date' => "",
        //         'sub_unit' => "",
        //         'location' => "",
        //         'employment_startDate' => "",
        //         'employment_endDate' => ""
        //        );
        //        $resJob=array($data);

        // }
        // print_r($resJob);
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
    <script src="js/membership.js"></script>
</head>
<style>
.dataTables_filter,
.dataTables_info,
.dataTables_paginate {
    display: none !important;
}

table thead tr th:nth-child(1) {
    /* background-color: var(--nav-hover-background-color); */
    width: 2px !important;
}

.col-10 input[type="checkbox"] {
    width: 15px !important;
}

.contact_formEducation,
.contact_formSkill,
.contact_formLanguage,
.contact_formLicense,.contact_formMembership {
    display: none;
}
</style>

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
                <!-- col10-container -->
                <div class="card shadow">
                    <!-- card for Assigned Supervisors -->
                    <div class="card-header">
                        <h6 class="changeTitle">Membership</h6>
                    </div>
                    <div class="card-body ">
                        <button class="btn btn-success addMembership">Add</button>
                        <div class="contact_formMembership ">
                            <div class="row">
                                <div class="col-2">
                                    <span> Membership  <em>*</em> </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <input type="text" id="membership">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span> Subscription Paid By </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <select id="sub_pay_by">
                                            <option>Company</option>
                                            <option>Individual</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span> Subscription Amount   </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <input type="text" id="sub_amount">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span> Currency</span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <select id="currency">
                                            <option>Naira</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-2">
                                    <span> Subcription Commence Date </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <input type="text" id="sub_comm_date" class="datepickers" placeholder="yyyy-mm-dd"><i
                                            class="fa fa-calendar pl-1 text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Subcription Renewal Date </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <input type="text" id="sub_renewal_date" class="datepickers" placeholder="yyyy-mm-dd"><i
                                            class="fa fa-calendar pl-1 text-secondary"></i>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div>
                                <button class="btn btn-success saveMembership">Save</button>
                                <button class="btn btn-secondary cancelMembership">Cancel</button>
                            </div>
                        </div><!-- contact_form ends here -->
                        <div class="table-container mt-3">
                            <!-- record list container start here-->
                            <table class="table table-bordered table-center  table-striped table-hover"
                                id="membershipTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Membership</th>
                                        <th> Subscription Paid By </th>
                                        <th>Subscription Amount </th>
                                        <th>Currency</th>
                                        <th>Subcription Commence Date </th>
                                        <th>Subcription Renewal Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- record list container ends here-->
                    </div> <!-- card-body ends here -->
                </div><!-- card for Assigned Supervisors -->
                <!--Skill -->
                <?php include_once('addAttachment.php') ?>
                <!-- add attachment -->
            </div><!-- col 10 ends here -->
            <span id="id" hidden><?php echo $b ?></span> <!-- hidden span  -->
        </div>
    </section>
    <!-- <script>
    $(document).ready(function() {
        $(".cancel").click(function() {
            var res = '  <?php //echo json_encode($resJob) ?>';
            res = JSON.parse(res)
            put(res);
        })

      

        function put(res) {
            //  clear all option in select
            $('#jobTitle').find('option').remove().end()
            $('#jobCategory').find('option').remove().end()
            $('#subUnit').find('option').remove().end()
            $('#location').find('option').remove().end()
            //  repopulate with initial data
            $('#jobTitle').append('<option value="">' + res[0].job_title + '</option>');
            $('#jobCategory').append('<option value="">' + res[0].job_category + '</option>');
            $('#subUnit').append('<option value="">' + res[0].sub_unit + '</option>');
            $('#location').append('<option value="">' + res[0].location + '</option>');
        }

    });
    </script> -->

</body>

</html>