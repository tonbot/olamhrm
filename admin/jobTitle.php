<?php
    include_once('../resources/include.php'); 
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
    <!-- employeeList css -->
    <link rel="stylesheet" href="css/all.css">
    <!-- employeeList js -->
    <script src="js/jobTitle.js"></script>

    <style>

    </style>
</head>

<body>
    <!-- document header -->
    <?php include_once "../header.php" ?>
    <!-- body section -->
    <section class="mother-container">
        <div class="card">
            <!-- card header -->
            <div class="card-header">
                <h6>JOB TITLE</h6>
            </div>
            <!-- card body -->
            <div class="card-body">
                <button class="btn btn-primary add"> Add </a></button>
                <button class="btn btn-danger  delete">Delete</button>
                <div class="contact_form">
                    <div class="row">
                        <div class="col-2">
                            <span> Job Title <em>*</em> </span>
                        </div>
                        <div class="col-10">
                            <div class="second-row">
                                <input type="text" id="job_title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span>Job Description</span>
                        </div>
                        <div class="col-10">
                            <div class="second-row">
                                <textarea id="job_description" name="" rows="4" cols="35">
                                        </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-2">
                            <span>Job Specification</span>
                        </div>
                        <div class="col-10">
                            <div class="second-row">
                                <input type="file" id="job_title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span>Note</span>
                        </div>
                        <div class="col-10">
                            <div class="second-row">
                                <textarea id="note" name="" rows="4" cols="50">
                                        </textarea>
                            </div>
                        </div>
                    </div> -->

                    <hr />
                    <div>
                        <button class="btn btn-success save">Save</button>
                        <button class="btn btn-secondary cancel">Cancel</button>
                    </div>
                </div><!-- contact_form ends here -->



                <div class="table-container mt-3">
                    <table class="table table-bordered table-center  table-striped table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id='selectAll'></th>
                                <th>Job Title</th>
                                <th>Job Description</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
    </section>
    <!-- document footer -->
</body>

</html>