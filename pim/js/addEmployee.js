
$(document).ready(function () {
  //global variable
  var is_createLogin = false;
  var is_valid;
  var employee_Id = $("#employee_Id").val(); 

  $('.subnav').css("display","block");

  /** check if login details is checked */
  $(".createLogin").change(function () {
    if ($(this).is(':checked')) {
      is_createLogin = true;
      $(".login-details-container").css("display", "block"); // show login details 
      return
    }
    is_createLogin = false;
    $(".login-details-container").css("display", "none");  // hide login details 
  });

  //on click register employee
  $(".save").click(function () {
    addEmployee();
  });


  function addEmployee() {
    //variable declaration
    let username, password, confirm_password, statuss;
  
    //get basic data
    let first_name = validate($("#first_name").val(), true); //important
    first_name === "empty" ? $("#first_name").css("border-color", "red") : is_valid = "true";
    let middle_name = $("#middle_name").val();
    let last_name = validate($("#last_name").val(), true); //important
    last_name === "empty" ? $("#last_name").css("border-color", "red") : is_valid = "true";



    //if create login is true get details
    if ($(".createLogin").is(':checked')) {
      username = validate($("#username").val(), false); //important
      username === "empty" ? $("#username").css("border-color", "red") : is_valid = "true";
      password = validate($("#password").val(),false); //important
      password === "empty" ? $("#password").css("border-color", "red") : is_valid = "true";
      confirm_password = validate($("#confirm_password").val(),false); //important
      confirm_password === "empty" ? $("#confirm_password").css("border-color", "red") : is_valid = "true";
      statuss = $('#status').find(":selected").text(); //important
      //password check
      if (password != confirm_password) {
        $('.pass-message').css("display", "block");
        $("#confirm_password").css("border-color", "red");
        $("#password").css("border-color", "red");
        return
      }
    }


    if (first_name === "empty" || last_name === "empty"  || employee_Id === "empty" ) {
      is_pass = "failed"
      return;
    }


    //create login is true ? do
    if (is_createLogin === true) {
      if (username === "empty" || password === "empty" || confirm_password === "empty") {
        is_pass = "failed"
        return
      }

      let fd = {
        a :"addEmployee",
        b : is_createLogin,
        c : first_name,
        d : last_name,
        e : middle_name,
        f : employee_Id,
        g : username,
        h : password,
        i : statuss,
      }

      //call register employee function
      register_employee(fd);

    } else { //create login is false
      let fd = {
        a : "addEmployee",
        b : is_createLogin,
        c : first_name,
        d : last_name,
        e : middle_name,
        f : employee_Id,
      }
      //call register employee function
      register_employee(fd);
    }

  }//end of addEmployee





  //register employee function
  function register_employee(fd) {
    // console.log(fd);
    $.ajax({
      url: "/olamhrm/model/EkirsApi.php",
      type: "POST",
      data: fd,
      encode: true,
      success: function (data) {
        // console.log(data);
        if(data != null && data !=""){
           let response = JSON.parse(data); //parse response 
           setDefaultBorder(); 
           console.log(response.message)
           window.location.href="/olamhrm/pim/employeeDetails.php?a="+employee_Id;
        }
       
        
      },
      error: function (error) {
          /**on error function */
          console.log(error);
      },
  });
  }


  function setDefaultBorder(){
    $("#first_name, #last_name, #employee_Id, #username, #password, #confirm_password").css("border-color", "rgba(0, 0, 0, 0.3)");
    $('.pass-message').css("display", "none");

    //clear box
    $("#first_name, #last_name, #employee_Id, #username, #password, #confirm_password").val("");
  }

  //check if variable has number
  function hasNumber(data) {
    var hasNumber = /\d/;
    if (hasNumber.test(data)) {
      return "empty"
    };  //true
    return data;
  }


  /** data  validate function*/
  function validate(data, check) {
    if (data == null || data == "") {
      return "empty";
    } else {
      let data1 = data;
      data1 = data1.trim();

      switch (check) {
        case true:
          data1 = hasNumber(data1); //contains number
          return data1;
        case false:
          return data1; //does not contain number
        case "is_Number":
          data1 = isNaN(data1) ? "empty" : data1; //it is a number
            return data1; 
        default:
          break;
      }


    }
  }


});
