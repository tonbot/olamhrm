<?php 
    include_once('model/EkirsController.php'); 
    $controller=new Controller();
    if(isset($_SESSION["a"]) && isset($_SESSION["b"]) && $_SESSION["a"] != "" && $_SESSION["b"] != "" ){
      $responseModule = $controller -> getModule();
    }else{
        header("Location:/olamhrm/index.php");
    }
?>
   

    <header class="header">
       <div class="header-container">
            <img src="/olamhrm/resources/images/ekirs.png" alt="" width="100">
            <span>Human Resources Management</span>
        </div>
       <!-- Load font awesome icons  -->
        <div class="header-navbar">
            <?php echo $responseModule;?>
        </div>
    </header>


    <!-- <header class="header">
        <div class="header-container">
            <img src="/olamhrm/resources/images/ekirs.png" alt="" width="100">
            <span>Human Resources Management</span>
        </div>
        Load font awesome icons 
        <div class="header-navbar">
            <div class="subnav">
                <button class="subnavbtn a admin_header">Admin <i class="fa fa-caret-down ml-2"></i></button>
                <div class="subnav-content">

                    <button class="second-level user_header">User Management <i class="fa fa-caret-down ml-2"></i>
                        <div class="third-level">
                            <a href='/olamhrm/admin/usersManagement.php'>Users</a>
                        </div>
                    </button>

                    <button class="second-level job_header">Job<i class="fa fa-caret-down ml-2"></i>
                        <div class="third-level">
                            <a href='/olamhrm/admin/jobTitle.php'>Job Titles</a>
                            <a href='/olamhrm/admin/payGrades.php'>Pay Grades</a>
                            <a href='/olamhrm/admin/subUnit.php'>Sub Unit</a>
                            <a href="/olamhrm/admin/categories.php">Job Categories</a>
                             <a href="http://">Work shift</a> 
                        </div>
                    </button>

                    <button class="second-level">Organization<i class="fa fa-caret-down ml-2"></i>
                        <div class="third-level">
                            <a href="http://" target="_blank" rel="noopener noreferrer">General Information</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Location</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Structure</a>
                        </div>
                    </button> -->

                    <!-- <button class="second-level">Qualifications<i class="fa fa-caret-down ml-2"></i>
                        <div class="third-level">
                            <a href="http://" target="_blank" rel="noopener noreferrer">Skills</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Education</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Licences</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Languages</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Memberships</a>
                        </div>
                    </button>

                    <button class="second-level">
                    <a href="#">Natonality</a>
                    </button>

                    <button class="second-level">
                    <a href="#">Corporate Branding</a>
                    </button>

                    <button class="second-level">Configuration<i class="fa fa-caret-down ml-2"></i>
                        <div class="third-level">
                            <a href="http://" target="_blank" rel="noopener noreferrer">playerww</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">boywww</a>
                        </div>
                    </button> -->

                <!-- </div>
            </div>

            <div class="subnav">
                <button class="subnavbtn pim b" >PIM <i class="fa fa-caret-down"></i></button>
                <div class="subnav-content" >
                    <button class="second-level">Configuration <i class="fa fa-caret-down ml-2"></i>
                        <div class="third-level">
                            <a href="http://" target="_blank" rel="noopener noreferrer">Optional Fields</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Custom Fields</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Data Import</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Reporting Methods</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Termination Reasons</a>

                        </div>
                    </button>
                    <button class="second-level employee-list">
                        <a href="/olamhrm/pim/employeeList.php">Employee list</a>
                    </button>
                    <button class="second-level add-employee">
                        <a href="/olamhrm/pim/addEmployee.php">Add Employee</a>
                    </button>
                </div>
            </div>

            <div class="subnav">
                <button class="subnavbtn c"><a href="#">Leave</a></button>
            </div>

            <div class="subnav"  hidden>
                <button class="subnavbtn"><a href="#" > Time</a></button>
            </div>

            <div class="subnav"  hidden>
                <button class="subnavbtn">Recruitment<i class="fa fa-caret-down ml-2"></i></button>
                <div class="subnav-content">
                    <button class="second-level">
                        <a href="#">Candidate</a>
                    </button>
                    <button class="second-level">
                        <a href="#">Vacancies</a>
                    </button>
                </div>
            </div>

            <div class="subnav"  hidden>
                <button class="subnavbtn"><a href="#">My Info</a></button>
            </div>

            <div class="subnav">
                <button class="subnavbtn d">Performance<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <button class="second-level">Configure<i class="fa fa-caret-down ml-2"></i>
                        <div class="third-level">
                            <a href="http://" target="_blank" rel="noopener noreferrer">KPIs</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Trackers</a>
                        </div>
                    </button>
                    <button class="second-level">Manage Reviews<i class="fa fa-caret-down ml-2"></i>
                        <div class="third-level">
                            <a href="http://" target="_blank" rel="noopener noreferrer">Manage Reviews</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">My Reviews</a>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Review List</a>
                        </div>
                    </button>
                    <button class="second-level">
                        <a href="#">My Trackers</a>
                    </button>
                    <button class="second-level">
                        <a href="#">Employee Trackers</a>
                    </button>
                </div>
            </div>

            <div class="subnav">
                <button class="subnavbtn e"><a href="#">Dashboard</a></button>
            </div>

            <div class="subnav"  hidden>
                <button class="subnavbtn"><a href="#">Directory</a></button>
            </div>

            <div class="subnav"  hidden>
                <button class="subnavbtn">Maintenance<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <a href="#link1">Link 1</a>
                    <a href="#link2">Link 2</a>
                    <a href="#link3">Link 3</a>
                    <a href="#link4">Link 4</a>
                </div>
            </div>
            <div class="subnav"  hidden>
                <button class="subnavbtn">Buzz<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <a href="#link1">Link 1</a>
                    <a href="#link2">Link 2</a>
                    <a href="#link3">Link 3</a>
                    <a href="#link4">Link 4</a>
                </div>
            </div>
            <a class="sub-links f" href="#contact">Contact</a>
        </div>
    </header> -->
