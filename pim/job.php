<?php
    include_once('../resources/include.php'); 
    include_once('../model/EkirsController.php'); 
    if(isset($_GET["a"]) && trim($_GET["a"] !="")){
        $b = trim($_GET["a"]);
        $controller=new Controller();
        $runData = new stdClass();
        $runData -> l =  $b;
        $query = "SELECT * FROM hr_job WHERE emp_id =:id"; 
        $resJob = $controller -> getData2($runData,$query);
        if ($resJob == ""){
            $data = array(
                'job_title' => "",
                'job_category' => "",
                'joined_date' => "",
                'sub_unit' => "",
                'location' => "",
                'employment_startDate' => "",
                'employment_endDate' => ""
               );
               $resJob=array($data);

        }
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
    <script src="js/job.js"></script>
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
                        <h6>Job Details</h6>
                    </div>
                    <!-- card-body for personal details -->
                    <div class="card-body ">
                        <div class="contact_form">
                            <div class="row">
                                <div class="col-2">
                                    <span> Job Title</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <select name="cars" id="jobTitle" disabled>
                                           <option value=""><?php  echo $resJob[0]['job_title']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span> Job Specification </span>
                                </div>
                                <div class="col-10">
                                    <div class="second-row">
                                        Not Specified
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Employment Status</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <select name="cars" id="employmentStatus" disabled>
                                            <option>Employed</option>
                                            <option>Terminated</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Job Category</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <select name="cars" id="jobCategory" disabled>
                                        <option value=""><?php  echo $resJob[0]['job_category']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Joined Date</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <input  type="text" class="datepickers" id="joinedDate" value="<?php  echo $resJob[0]['joined_date']; ?>" disabled><i class="fa fa-calendar pl-2 text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Sub Unit</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <select name="cars" id="subUnit" disabled>
                                        <option value=""><?php  echo $resJob[0]['sub_unit']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Location</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <select name="cars" id="location" disabled>
                                        <option value=""><?php  echo $resJob[0]['location']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h6>EMPLOYMENT CONTRACT</h6>
                            <div class="row">
                                <div class="col-2">
                                    <span>Start Date</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <input type="text" class="datepickers" id="startDate" value="<?php  echo $resJob[0]['employment_startDate']; ?>" disabled><i class="fa fa-calendar pl-2 text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>End Date</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                    <input type="text" class="datepickers" id="endDate" value="<?php  echo $resJob[0]['employment_endDate'];?>" disabled> <i class="fa fa-calendar pl-1 text-secondary" ></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <span>Contract Details</span>
                                </div>
                                <div class="col-10">
                                    <div>
                                        Not Defined
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <button class="btn btn-success edit">Edit</button>
                                <button class="btn btn-success save">Save</button>
                                <button class="btn btn-secondary cancel">Cancel</button>
                            </div>

                        </div><!-- contact_form ends here -->
                    </div> <!-- card-body for Contact details sends here -->
                </div><!-- card for personal details ends here-->


                <!-- add attachment -->
                <?php include_once('addAttachment.php') ?>

            </div>
            <span id="id" hidden><?php echo $b ?></span>
        </div>
    </section>
    <script>
    $(document).ready(function() {
        $(".cancel").click(function(){
            var res = '<?php echo json_encode($resJob) ?>';
            res = JSON.parse(res)
            put(res);
        })
        


        function put(res){
            //  clear all option in select
            $('#jobTitle').find('option').remove().end()
            $('#jobCategory').find('option').remove().end()
            $('#subUnit').find('option').remove().end()
            $('#location').find('option').remove().end()
            //  repopulate with initial data
            $('#jobTitle').append('<option value="">' +   res[0].job_title + '</option>');
            $('#jobCategory').append('<option value="">' + res[0].job_category + '</option>');
            $('#subUnit').append('<option value="">' + res[0].sub_unit + '</option>');
            $('#location').append('<option value="">' + res[0].location + '</option>');
        }
        
    });
    </script>

</body>

</html>