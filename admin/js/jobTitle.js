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

  $(".save").click(function () {
    //get basic data
    let jobTitle = $("#job_title").val().trim();
    jobTitle === "" ? $("#job_title").css("border-color", "red") : "";
    //check if important field are empty
    if (jobTitle === "") {
      return;
    }
    //   formdata
    let fd = {
      a: "admin",
      b: jobTitle,
      c: $("#job_description").val().trim(),
      k: "jobTitle",
    };
    //console.log(fd);
    putData(fd);
  }); // end job data

  //register employee function
  function putData(fd) {
    // console.log(fd);
    $.ajax({
      url: "/olamhrm/model/EkirsApi.php",
      type: "POST",
      data: fd,
      encode: true,
      success: function (data) {
        alert(data);
        getData();
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
  

  /******************************************GET DATA************************************************* */
  getData();
  function getData() {
      table.destroy();
      formData = {
          a: "admin",
          k: "getJobTitle",
      }
      return table = $('#dataTable').DataTable({
           ordering: false,
          "ajax": {
              url: "/olamhrm/model/EkirsApi.php",
              type: "POST",
              dataSrc: "",
              data: formData
          },
          columns: [
              { "data": null },
              { "data": "job_title"},
              { "data": "job_description"},
          ],

           //serial number
           "fnRowCallback" : function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html("<input type=checkbox  class=checkboxAll name=checkBoxAllArr  value=" + (aData["id"]) + " >");
           return nRow;
        },

      });
  }

  /******************************************SAVE  DATA************************************************* */

 //SELECT ALL job title
 $("#selectAll").click(function () {
    $(".checkBoxAll").prop('checked', $(this).prop('checked'));
 });

 //DELETE SELECTED ASSIGNED SUPERVISOR
 $(".delete").click(function(){
      var dataArray =  [];
      $("input:checkbox[name=checkBoxAllArr]:checked").each(function() {
        dataArray.push($(this).val());
    });
    if (dataArray.length == 0){
        return;
      }
    // console.log(supervisorSelectArray);
  let fd = {
        a: "admin",
        b: dataArray,
        k: "deleteJobTitle",
    }
    putData(fd);
 });








  /******************************************SAVE DATA************************************************* */
}); //end of jquery
