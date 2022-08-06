$(document).ready(function () {
  $(".attachment-error").css("display", "none");
  //set current page to active
  $(".personal-info").addClass("active");
  //allow edit details
  $(".edit").click(function () {
    $(":disabled").removeAttr("disabled");
    $(".save, .cancel").show();
    $("#employee_id").attr("disabled", "disabled");
    $(this).hide();
  });
  // cancel edit
  $(".cancel").click(function () {
    $("input, select, radio").attr("disabled", "disabled");
    $("input[type=file]").removeAttr("disabled");
    $(".edit").show();
    $(".save").hide();
    $(this).hide();
  });
  //show attachment body
  $(".add").click(function () {
    $(".attachment-body").css("display", "block");
    $(this).css("display", "none");
  });
  //hide attachment body
  $(".cancel-upload").click(function () {
    $(".attachment-body").css("display", "none");
    $(".add").css("display", "block");
  });
  //date picker fnction
  $(function () {
    $(".datepicker").datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true,
    });
  });
  let id = $("#id").html(); //emp id

  // save edited emloyee details
  $(".save").click(function () {
    //get basic data
    let first_name = $("#first_name").val();
    let middle_name = $("#middle_name").val();
    let last_name = $("#last_name").val();
    let other_id = $("#other_id").val();
    let drivers_license_number = $("#drivers_license_number").val();
    let license_expiry_date = $("#license_expiry_date").val();
    let nationality = $("#nationality").val();
    let birthdate = $("#birthdate").val();
    let sex = $("input[name='sex']:checked").val();

    //   formdata
    let fd = {
      a: "employeeDetails",
      b: first_name,
      c: middle_name,
      d: last_name,
      e: other_id,
      f: drivers_license_number,
      g: license_expiry_date,
      h: nationality,
      i: birthdate,
      j: sex,
      k: "employeePersonalDetails",
      l: id,
    };
    console.log(fd);
    updateEmployeePersonalDetails(fd);
  });

  // save edited emloyee details
  $(".upload").click(function () {
    //get basic data
    let description = $("#description").val();
    description = description.trim();
    let attachment =
      $("#attachment")[0].files.length > 0 ? $("#attachment")[0].files[0] : "";
    console.log(attachment);
    if (attachment == "") {
      $(".attachment-error").css("display", "block");
      return;
    }
    if (attachment != "") {
      $(".attachment-error").css("display", "none");
    }

    //   formdata
    let fd = new FormData();
    fd.append("a", "employeeDetails");
    fd.append("b", attachment);
    fd.append("c", id);
    fd.append("d", description);
    fd.append("k", "pAttachment");

    // console.log(fd);
    uploadAttachment(fd);
  });

  //upload files
  function uploadAttachment(fd) {
    $.ajax(
      //ajax call
      {
        url: "/olamhrm/model/EkirsApi.php",
        type: "POST",
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          alert(data);
        },

        error: function (error) {
          alert("failed");
          console.log(error);
        },
      }
    ); //end of ajax
  }

  //register employee function
  function updateEmployeePersonalDetails(fd) {
    // console.log(fd);
    $.ajax({
      url: "/olamhrm/model/EkirsApi.php",
      type: "POST",
      data: fd,
      encode: true,
      success: function (data) {
        console.log(data);
        window.location.href = "/olamhrm/pim/employeeDetails.php?a=" + id;
      },
      error: function (error) {
        /**on error function */
        console.log(error);
      },
    });
  }
}); //end of jquery
