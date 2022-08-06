<?php
    include_once('../resources/include.php'); 
    include_once('../model/EkirsController.php'); 
    $controller=new Controller();
    $runData = new stdClass();
    $response = $controller -> getEmployeeLastId();
    $lastid = $response[0]["MAX(id)"];
    if($lastid == ""){
        $newEmpID = "0001";
    }
    else{
        $newEmpID = intval($lastid) + 1;
        $lastid = strlen(strval($lastid));
        $newEmpID = strval(substr("0000", -0, -$lastid )).strval($newEmpID);
        $newEmpID = strlen($newEmpID)  > strlen("0000") ? substr($newEmpID, 1) : $newEmpID ;
    }
    // print_r($lastid);
    
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
    <link rel="stylesheet" href="css/addEmployee.css">
    <script src="js/addEmployee.js"></script>
</head>

<body>
    <?php include_once "../header.php" ?>
    <section class="card-container">
        <div class="card">
            <div class="card-header">
                <h6>Add Employee</h6>
            </div>
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
                            <input type="text" id="first_name">
                            <input type="text" id="middle_name">
                            <input type="text" id="last_name">
                            <small class="form-text text-muted">First name, Middle name, and Last name Should not contain any digit </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <span> Employee Id </span>
                    </div>
                    <div class="col-10">
                        <div>
                            <input type="text" id="employee_Id" maxlength="10" value = "<?php echo $newEmpID; ?>" readonly>
                            <small class="form-text text-muted">Employee Id cannot be longer than 10 characters</small>
                        </div>
                    </div>
                </div>
                <div class="row" hidden>
                    <div class="col-2">
                        <span> Photograph </span>
                    </div>
                    <div class="col-10">
                        <div>
                            <input type="file">
                        </div>
                    </div>
                </div>

                <!-- toggle login details -->
                <div class="row">
                    <div class="col-2">
                        <span> Create Login Details </span>
                    </div>
                    <div class="col-10">
                        <div>
                            <input type="checkbox" name="" id="" class="createLogin">
                        </div>
                    </div>
                </div>

                <div class="login-details-container">
                    <!-- login details -->
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
                </div>
                <!-- create login details -->
            </div> <!--  end of card body -->

            <!-- card footer -->
            <div class="card-footer">
                <button class="btn btn-success save">Save</button>
            </div>
        </div>
    </section>
</body>
</html>