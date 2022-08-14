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
    <script src="js/usersManagement.js"></script>

    <style>
       .pass-message{
            display:none;
       }
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
                <h6>USERS MANAGEMENT</h6>
            </div>
            <!-- card body -->
            <div class="card-body">
                <button class="btn btn-primary add"> Add </a></button>
                <button class="btn btn-danger  delete">Delete</button>
                <div class="contact_form">
                    <div class="row">
                        <div class="col-2">
                            <span> User Role <em>*</em> </span>
                        </div>
                        <div class="col-10">
                            <div class="second-row">
                                <select id="role">
                                    <option value="1">Admin</option>
                                    <option value="2">Director</option>
                                    <option value="3">Desk Officer</option>
                                    <!-- <option value="4">Employee</option> -->
                                    <option value="5">Supervisor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span> Employee Name <em>*</em> </span>
                        </div>
                        <div class="col-10">
                            <div>
                                <input type="text" id="employee_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span> Username <em>*</em> </span>
                        </div>
                        <div class="col-10">
                            <div>
                                <input type="text" id="username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span> Password <em>*</em> </span>
                        </div>
                        <div class="col-10">
                            <div>
                                <input type="password" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span> Confirm Password <em>*</em> </span>
                        </div>
                        <div class="col-10">
                            <div>
                                <input type="password" id="confirm_password">
                                <small class="form-text text-danger pass-message">Password Mismatch</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span> Status <em>*</em> </span>
                        </div>
                        <div class="col-10">
                            <div>
                                <select name="cars" id="status">
                                    <option>Enabled</option>
                                    <option>Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div>
                        <button class="btn btn-success save">Save</button>
                        <button class="btn btn-secondary cancel">Cancel</button>
                    </div>
                </div><!-- contact_form ends here -->



                <div class="table-container mt-3">
                    <table class="table table-sm table-bordered table-center  table-striped table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id='selectAll'></th>
                                <th>Username</th>
                                <th>User Role</th>
                                <th>Employee Name</th>
                                <th>Status</th>
                                <th>Action</th>
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