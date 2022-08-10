$(document).ready(function () {
    let id = $("#id").html(); //Employee id
    var titleCheck;
    var assignedType = '';
    var table2;
    var table3;

    table2 = $('#employeeListTable').DataTable({
        // "aoColumnDefs": [
        //     { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] }, 
        // ]
    }); //supervisor table
    table3 = $('#employeeListTable2').DataTable(); //subordinate table
      
    $(".attachment-error").css("display", "none");
    //set current page to active
    $(".Report-To").addClass("active");
    //hide specify container
    $(".specify_container").hide();

    // cancel edit
    $(".cancel").click(function () {
        assignedType = '';
        $("input[type=text]").val("");
        $(".contact_form").css("display", "none");
        $(".addSupervisor").show();
        $(".deleteSupervisor").show();
        $(".addSurbodinate").show();
        $(".deleteSurbodinate").show();
        $("#name").css("border-color", "rgba(0, 0, 0, 0.3)");
        $("#specify").css("border-color", "rgba(0, 0, 0, 0.3)");
        $(".changeTitle").html("Assigned Supervisor");
    });

    //show contact form body
    $(".addSupervisor").click(function () {
        assignedType = 'Supervisor'
        titleCheck = "1";
        $(".contact_form").css("display", "block");
        $(".deleteSupervisor").hide();
        $(this).css("display", "none");
    });

    $(".addSurbodinate").click(function () {
        assignedType = "Subordinate";
        $(".changeTitle").html("Assigned Surbordinate");
        titleCheck = "2";
        $(".contact_form").css("display", "block");
        $(".addSupervisor").hide();
        $(".deleteSupervisor").hide();
        $(".deleteSurbodinate").hide();
        $(this).css("display", "none");
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

    var is_visible = false;
    $('#reporting_method').on('change', function () {
        if ($(this).find(":selected").text() === "Other") {
            $(".specify_container").show();
            is_visible = true;
            return;
        }
        $(".specify_container").hide();
        $("#specify").css("border-color", "rgba(0, 0, 0, 0.3)");
        is_visible = false
    });
   
 //SELECT ALL ASSIGNED SUPERVISOR
    $("#selectAllSupervisor").click(function () {
        $(".checkBoxAll1").prop('checked', $(this).prop('checked'));
    });

 //SELECT ALL ASSIGNED SUBORDINATe
 $("#selectAllSubordinate").click(function () {
    $(".checkBoxAll").prop('checked', $(this).prop('checked'));
 });

 //DELETE SELECTED ASSIGNED SUPERVISOR
 $(".deleteSupervisor").click(function(){
      var dataArray =  [];
      $("input:checkbox[name=checkBoxAll1Arr]:checked").each(function() {
        dataArray.push($(this).val());
    });
    if (dataArray.length == 0){
        return;
      }
    // console.log(supervisorSelectArray);
  let fd = {
        a: "employeeDetails",
        b: dataArray,
        c: "Supervisor",
        z: 'deleteReportTo',
        k: "deleteCheckBoxSelected",
        l: id,
    }
    putReportTo(fd);
 });


 //DELETE SELECTED ASSIGNED SUBORDINATE
 $(".deleteSubordinate").click(function(){
    var dataArray =  [];
    $("input:checkbox[name=checkBoxAllArr]:checked").each(function() {
        dataArray.push($(this).val());
  });
  if (dataArray.length == 0){
    return;
  }
  // console.log(supervisorSelectArray);
let fd = {
      a: "employeeDetails",
      b:  dataArray,
      c: "Subordinate",
      z: 'deleteReportTo',
      k: "deleteCheckBoxSelected",
      l: id,
  }
  putReportTo(fd);
});


    //  table data
    getSupervisor();
    getSubordinate(); 
    

    /******************************************GET ASSIGNED SUPERVISOR DATA************************************************* */

    function getSupervisor() {
        table2.destroy();
        formData = {
            a: "employeeDetails",
            k: "getSupervisor",
            l: id,
        }
        return table2 = $('#employeeListTable').DataTable({
            "ordering": false,
            "ajax": {
                url: "/olamhrm/model/EkirsApi.php",
                type: "POST",
                dataSrc: "",
                data: formData
            },
            columns: [
                { "data": null },
                { "data": "name" },
                { "data": "reporting_method" },
            ],

               //serial number
               "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html("<input type=checkbox  class=checkboxAll1 name=checkBoxAll1Arr  value=" + (aData["id"]) + " >");
               return nRow;
            },

        });
    }
    /******************************************GET ASSIGNED SUPERVISOR DATA ENDS HERE************************************************* */

    /******************************************GET ASSIGNED SUBORDINATE DATA************************************************* */
    function getSubordinate() {
        table3.destroy();
        formData = {
            a: "employeeDetails",
            k: "getSubordinate",
            l: id,
        }
        return table3 = $('#employeeListTable2').DataTable({
            "ordering": false,
            "ajax": {
                url: "/olamhrm/model/EkirsApi.php",
                type: "POST",
                dataSrc: "",
                data: formData
            },
            columns: [
                { "data": null },
                { "data": "name" },
                { "data": "reporting_method" },
            ],

              //serial number
              "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html("<input type=checkbox class=checkboxAll name=checkBoxAllArr value=" + (aData["id"]) + " >");
               return nRow;
            },

        });
    }
    /******************************************GET ASSIGNED SUBORDINATE DATA ENDS HERE************************************************* */

    /******************************************UPLOAD ATTACHMENT************************************************* */

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
        fd.append("k", "rAttachment");
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

    /******************************************UPLOAD ATTACHMENT************************************************* */

    /******************************************SAVE  DATA************************************************* */

    $(".save").click(function () {
        addReportTo()
    });

    function addReportTo() {
        //get basic data
        let name = $("#name").val().trim();
        (name === "") ? $("#name").css("border-color", "red"):"";
        let reporting_method = (is_visible) ? $("#specify").val().trim() : $("#reporting_method").find(":selected").text().trim();
        (reporting_method === "-- Select --") ? "" : reporting_method.trim();

        //check if important field are empty
        if (name === "" || reporting_method === "") {
            if (is_visible && reporting_method === "") {
                $("#specify").css("border-color", "red");
            }
            return;
        }
        //console.log (name , reporting_method);
        //create form object
        let fd = {
            a: "employeeDetails",
            b: name,
            c: reporting_method,
            d: assignedType,
            k: "reportTo",
            l: id,
        }
        // console.log(fd)
        putReportTo(fd);
    }


    //register employee function
    function putReportTo(fd) {
        // console.log(fd);
        $.ajax({
            url: "/olamhrm/model/EkirsApi.php",
            type: "POST",
            data: fd,
            encode: true,
            success: function (data) {
                //  console.log(data);
                let response = JSON.parse(data);
                if (response.code == "200") {
                    alert(response.message);
                }
               //  table data
                getSupervisor();
                getSubordinate(); 
            },
            error: function (error) {
                /**on error function */
                console.log(error);
            },
        });
    }

    /******************************************SAVE DATA************************************************* */

}); //end of jquery
