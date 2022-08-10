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
    <link rel="stylesheet" href="css/employeeList.css">
    <!-- employeeList js -->
    <script src="js/employeeList.js"></script>
</head>

<body>
    <!-- document header -->
    <?php include_once "../header.php" ?>
    <!-- body section -->
    <section class="mother-container">
        <div class="card">
            <!-- card header -->
            <div class="card-header">
                <h6>Employee List</h6>
            </div>
            <!-- card body -->
            <div class="card-body">
                <button class="btn btn-primary shadow addnew"><a href="/olamhrm/pim/addEmployee.php">Add New Employee</a></button>
                <button class="btn btn-danger shadow deleteEmployee">Delete Employee</button>
                <div class="table-container">
                <table class="table table-bordered table-center  table-striped table-hover" id="employeeListTable">
                        <thead>
                                <tr>
                                    <th><input type="checkbox" id='selectAllEmployee'></th>
                                    <th>id</th>
                                    <th>Fist Name </th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Job Tile</th>
                                    <th>Employment Status</th>
                                    <th>Supervisor</th>
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