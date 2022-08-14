$(document).ready(function () {
  var table;
  $(".contact_form").css("display", "none");
  table = $("#dataTable").DataTable(); //subordinate table

  //show contact form body
  $(".add").click(function () {
    $(".contact_form").css("display", "block");
    $(this).hide();
    $(".delete").hide();
    $(".save, .cancel").show();
  });

  // hide save and cancel button
  $(".save, .cancel").hide();

  // cancel add
  $(".cancel").click(function () {
    $("input[type=text]").val("");
    $(".contact_form").css("display", "none");
    $(".add").show();
    $(".delete").show();
    $(".save").hide();
    $(this).hide();
  });

  //focus out of save button
  $(".save").focusout(function () {
    $("input, select").css("border-color", "rgba(0, 0, 0, 0.3)");
    $('.pass-message').css("display", "none");
  });


  //save button click
  $(".save").click(function () {
    //get basic data
    let role = $("#role").val().trim(); //important
    let employee_name = $("#employee_name").val().trim();
    employee_name === "" ? $("#employee_name").css("border-color", "red") : "";
    let username = $("#username").val().trim(); //important
    username === "" ? $("#username").css("border-color", "red") : "";
    let password = $("#password").val().trim(); //important
    password === "" ? $("#password").css("border-color", "red") : "";
    let confirm_password = $("#confirm_password").val().trim(); //important
    confirm_password === "" ? $("#confirm_password").css("border-color", "red") : "";
    let status = $('#status').find(":selected").text().trim(); //important
    //password check
    if (password != confirm_password) {
      $('.pass-message').css("display", "block");
      $("#confirm_password").css("border-color", "red");
      $("#password").css("border-color", "red");
      return
    }

    //check important field
    if (employee_name === "" || username === "" || password === "" || confirm_password === "") {
      return;
    }

    //   formdata
    let fd = {
      a: "admin",
      b: role,
      c: employee_name,
      d: username,
      e: password,
      f: status,
      k: "usersManagement",
    };
    // console.log(fd);
    putData(fd);
  }); // end job data

  /******************************************GET DATA************************************************* */
  getData();
  function getData() {
    table.destroy();
    formData = {
      a: "admin",
      k: "getUsers",
    }
    return table = $('#dataTable').DataTable({
      searching: false,
      paging: false,
      info: false,
      ordering: false,
      "ajax": {
        url: "/olamhrm/model/EkirsApi.php",
        type: "POST",
        dataSrc: "",
        data: formData
      },
      columns: [
        { "data": null },
        { "data": "username" },
        { "data": "role" },
        { "data": "emp_name" },
        { "data": "status" },
        { "data": null },
      ],

      columnDefs: [{
        "targets": -1,
        "defaultContent": "<button class='btn-primary action' type='button'>Edit</button>"
      }],

      //serial number
      "fnRowCallback": function (nRow, aData, iDisplayIndex) {
        $("td:first", nRow).html("<input type=checkbox class=checkBoxAll name=checkBoxAllArr value=" + (aData["id"]) + " >");
        return nRow;
      },
    });
  }


  /**This  */
  $('#dataTable tbody').on('click', '.action', function () {
    var data = table.row($(this).parents('tr')).data();
    let id = data['id'];
    window.location.href = "/olamhrm/admin/editUser.php?a=" + id;
  });

  //SELECT ALL USER
  $("#selectAll").click(function () {
    $(".checkBoxAll").prop('checked', $(this).prop('checked'));
  });

  //DELETE SELECTED USER
  $(".delete").click(function () {
    var dataArray = [];
    $("input:checkbox[name=checkBoxAllArr]:checked").each(function () {
      dataArray.push($(this).val());
    });
    if (dataArray.length == 0) {
      return;
    }
    // console.log(supervisorSelectArray);
    let fd = {
      a: "admin",
      b: dataArray,
      k: "deleteUser",
    }
    putData(fd);
  });

/******************************************USER MESSAGE************************************************* */
  function message(message, icon) {
    Swal.fire({
      html:message,
      icon: icon,
    });
  }
 /******************************************USER MESSAGE************************************************* */

/******************************************PUT DATA FUNCTION************************************************* */
  function putData(fd) {
    // console.log(fd);
    $.ajax({
      url: "/olamhrm/model/EkirsApi.php",
      type: "POST",
      data: fd,
      encode: true,
      success: function (data) {
        try {
              switch (JSON.parse(data)) {
                case "true":
                  message("<b>RECORD SAVED</b>", "success");
                  break;
                case "deleted":
                  message("<b>SUCCESSFULLY DELETED</b>", "success");
                  break;
                case "failed":
                  message("<b>RECORD FAILED TO SAVED</b>", "error");
                  break;
                case "failed to delete":
                  message("<b>FAILED TO DELETE</b>", "error");
                  break;
                default:
                  break;
              }
      } catch(e) {
           message("<b>SOMETHING WENT WRONG</b>", "error");
           console.log(e);
      }
            
            getData();
    },
      error: function (error) {
        console.log(error);
      },
        });
      }
  /******************************************SAVE DATA************************************************* */
  }); //end of jquery
