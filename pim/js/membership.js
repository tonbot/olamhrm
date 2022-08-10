

$(document).ready(function () {
    let id = $("#id").html(); //Employee id
    var table1;
   

    //date picker fnction
    $(function () {
        $(".datepickers").datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true,
        });
    });



    table1 = $('#WorkExperienceTable').DataTable(); //supervisor table
  

    $(".attachment-error").css("display", "none");
    //set current page to active
    $(".Memberships").addClass("active");

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




    /********************************* Work Experience************************************************ */
    //  cancelWorkExperience edit
    $(".cancelMembership").click(function () {
        assignedType = '';
        $("input[type=text]").val("");
        $(".contact_formMembership").css("display", "none");
        $(".addMembership").show();
        $("#membership").css("border-color", "rgba(0, 0, 0, 0.3)");
    });

    //show contact form body
    $(".addMembership").click(function () {
        $(".contact_formMembership").css("display", "block");
        $(this).css("display", "none");
    });
    
    //SAVE WORK EXPERIENCE
    $(".saveMembership").click(function () {
        //get basic data
        let membership = $("#membership").val();
         (membership === "") ? $("#membership").css("border-color", "red") : ""
        //check if important field are empty
        if(membership === '') {
            return;
        }
        // formData
        let fd = {
            a: "employeeDetails",
            b: membership,
            c: $("#sub_pay_by").find(":selected").text().trim(),
            d: $("#sub_amount").val().trim(),
            e: $("#currency").find(":selected").text().trim(),
            f: $("#sub_comm_date").val().trim(),
            g: $("#sub_renewal_date").val().trim(),
            k: "membership",
            l: id,
        }
         console.log(fd)
         putMemberhip(fd);
    });
    /********************************* Work Experience ends here************************************************ */

    /******************************************GET WORK Experience************************************************* */
    getMembership()
    function getMembership() {
        table1.destroy();
        formData = {
            a: "employeeDetails",
            k: "getMembership",
            l: id,
        }
        return table1 = $('#membershipTable').DataTable({
            "ajax": {
                url: "/olamhrm/model/EkirsApi.php",
                type: "POST",
                dataSrc: "",
                data: formData
            },
            columns: [
                { "data": null },
                { "data": "membership"},
                { "data": "sub_pay_by"},
                { "data": "sub_amount"},
                { "data": "currency"},
                { "data": "sub_comm_date"},   
                { "data": "sub_renewal_date"},
            ],

            //serial number
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + " </b>");
                return nRow;
            },

        });
    }
    /******************************************GET MEMBERSHIP DATA ENDS HERE************************************************* */


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
        fd.append("k", "mAttachment");
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

 




    //register employee function
    function putMemberhip(fd) {
        // console.log(fd);
        $.ajax({
            url: "/olamhrm/model/EkirsApi.php",
            type: "POST",
            data: fd,
            encode: true,
            success: function (data) {
           console.log(data);
                    let response = JSON.parse(data);
                    if (response.code == "200") {
                        alert(response.message);
                    }
                   //  table data
                    // getSupervisor();
                    // getSubordinate(); 
            },
            error: function (error) {
                /**on error function */
                console.log(error);
            },
        });
    }

    /******************************************SAVE DATA************************************************* */

}); //end of jquery
