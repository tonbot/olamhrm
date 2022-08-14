$(document).ready(function () {
  
    var table2;
    //display active page

    //datable
    table2 = $('#employeeListTable').DataTable();
    $(".attachment-error").css("display", "none");
    //set current page to active
    $(".Emergency-Contacts").addClass("active");
     
    // cancel edit
    $(".cancel").click(function () {
      $("input[type=text]").val("");
      $(".contact_form").css("display", "none");
      $(".add1").show();
    });
     //show contact form body
     $(".add1").click(function () {
        $(".contact_form").css("display", "block");
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
    $(".open").click(function () {
        if($(this).text() == "Open"){
            $(this).text("Close");
            $(".table-container").show();
            return;  
        }else{
            $(".table-container").hide();
            $(this).text("Open");
            return
        }
        
      

      });

    let id = $("#id").html(); //emp id
  
    get_emergency_contact()// Emergency Contact

    // get_all_employee();
      function get_emergency_contact(){
        table2.destroy();
        formData ={
            a : "employeeDetails",
            k: "getEmergencyContact",
            l: id,
        }
        return table2 = $('#employeeListTable').DataTable({
            "ajax": {
                url: "/olamhrm/model/EkirsApi.php",
                type: "POST",
                dataSrc: "",
                data: formData
            },
          columns: [
            { "data":  null },
            { "data": "name" },
            { "data": "relationship" },
            { "data": "home_tel" },
            { "data": "mobile" },
            { "data": "work_tel" },
           ] , 

            //serial number
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
              $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + "</b>");
             return nRow;
          },

        });
      }






    // save emergency contact
    $(".save").click(function () {
      //get basic data
      let name = $("#name").val();
      let relationship = $("#relationship").val();
      let home_tel = $("#home_tel").val();
      let mobile = $("#mobile").val();
      let work_tel = $("#work-tel").val();
     
      //   formdata
      let fd = {
        a: "employeeDetails",
        b: name,
        c: relationship,
        d: home_tel,
        e: mobile,
        f: work_tel,
        k: "emergencyContact",
        l: id,
      };
      console.log(fd);
     addEmergencyContact(fd);
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
      fd.append("k", "eAttachment");
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
    function addEmergencyContact(fd) {
      // console.log(fd);
      $.ajax({
        url: "/olamhrm/model/EkirsApi.php",
        type: "POST",
        data: fd,
        encode: true,
        success: function (data) {
          alert(data);
          get_emergency_contact()
        },
        error: function (error) {
          /**on error function */
          console.log(error);
        },
      });
    }
  }); //end of jquery
  