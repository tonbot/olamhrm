$(document).ready(function () {
    $(".attachment-error").css("display", "none");
    //set current page to active
    $(".Contact-Details").addClass("active");
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

    let id = $("#id").html(); //emp id
  
    // save edited emloyee details
    $(".save").click(function () {
      //get basic data
      let street_1 = $("#street-1").val();
      let street_2 = $("#street-2").val();
      let city = $("#city").val();
      let province = $("#province").val();
      let zip = $("#zip").val();
      let home_tel = $("#home-tel").val();
      let mobile = $("#mobile").val();
      let work_tel = $("#work-tel").val();
      let work_email = $("#work-email").val();
      let other_email = $("#other-email").val();
  
      //   formdata
      let fd = {
        a: "employeeDetails",
        b: street_1,
        c: street_2,
        d: city,
        e: province,
        f: zip,
        g: home_tel,
        h: mobile,
        i: work_tel,
        j: work_email,
        k: "employeeContactDetails",
        l: id,
        m: other_email
      };
      console.log(fd);
     updateEmployeeContactDetails(fd);
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
      fd.append("k", "cAttachment");
  
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
    function updateEmployeeContactDetails(fd) {
      // console.log(fd);
      $.ajax({
        url: "/olamhrm/model/EkirsApi.php",
        type: "POST",
        data: fd,
        encode: true,
        success: function (data) {
        //   console.log(data);
          window.location.reload();
        },
        error: function (error) {
          /**on error function */
          console.log(error);
        },
      });
    }
  }); //end of jquery
  