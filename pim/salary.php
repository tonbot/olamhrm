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
    <script src="js/salary.js"></script>
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
                        <h6>Add Emergency Contact</h6>
                    </div>
                    <!-- card-body for personal details -->
                    <div class="card-body ">
                        <button class="btn btn-success add1">Add</button>
                        <div class="contact_form">
                            <div class="row">
                                <div class="col-2">
                                    <span> Pay Grade </span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        Not Defined
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span> Salary Component <em>*</em> </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <input type="text" id="salary_component">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span> Pay Frequency</span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <select id="salary_period">
                                            <option selected="selected">-- Select --</option>
                                            <option>Bi Weekly</option>
                                            <option>Hourly</option>
                                            <option>Monthly</option>
                                            <option>Monthly on first pay of month.</option>
                                            <option>Semi Monthly</option>
                                            <option>Weekly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Currency <em>*</em> </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <select id="currency">
                                            <option selected="selected">Naira</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Amount <em>*</em></span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <input type="text" id="amount">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span> Comment </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <textarea id="comment" name="" rows="4" cols="50">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <!-- toggle createDeposit container -->
                            <div class="row">
                                <div class="col-2">
                                    <span> Add Direct Deposit Details </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        <input type="checkbox" name="" id="" class="createDeposit">
                                    </div>
                                </div>
                            </div>

                            <div class="createDeposit-container">
                                <!-- createDeposit -->
                                <div class="row">
                                    <div class="col-2">
                                        <span> Account Number  <em>*</em> </span>
                                    </div>
                                    <div class="col-10">
                                        <div>
                                            <input type="text" id="account_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <span> Account Type <em>*</em> </span>
                                    </div>
                                    <div class="col-10">
                                        <div>
                                            <input type="text" id="account_type">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <span> Routing Number  <em>*</em> </span>
                                    </div>
                                    <div class="col-10">
                                        <div>
                                            <input type="text" id="routing_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <span> amount <em>*</em> </span>
                                    </div>
                                    <div class="col-10">
                                        <div>
                                           <input type="text" id="direct_amount">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- createDeposit -->
                            <hr>
                            <div>
                                <button class="btn btn-success save">Save</button>
                                <button class="btn btn-secondary cancel">Cancel</button>
                            </div>

                        </div><!-- contact_form ends here -->
                    </div> <!-- card-body for Contact details sends here -->
                </div><!-- card for personal details ends here-->

                <!-- record list of add salary -->
                <div class="card mt-5 shadow">
                    <!-- card header -->
                    <div class="card-header">
                        <h6>Assigned Salary</h6>
                    </div>
                    <!-- card body -->
                    <div class="card-body">
                        <button class="btn btn-success open">Close</button>
                        <div class="table-container">
                            <table class="table table-bordered table-center  table-striped table-hover"
                                id="employeeListTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Salary Component</th>
                                        <th>Pay Frequecy</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        <th>Account Number</th>
                                        <th>Account Type</th>
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