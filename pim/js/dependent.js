$(document).ready(function () {

   $(".too").hide();
    //date picker fnction
    $(function () {
        $(".datepickers").datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true,
        });
    });

    //datable
    var table2;
    table2 = $('#employeeListTable').DataTable();
    $(".attachment-error").css("display", "none");
    //set current page to active
    $(".Dependents").addClass("active");

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
        if ($(this).text() == "Open") {
            $(this).text("Close");
            $(".table-container").show();
            return;
        } else {
            $(".table-container").hide();
            $(this).text("Open");
            return
        }



    });

    let id = $("#id").html(); //emp id

    /******************************************GET DATA************************************************* */
    getDependent()// Emergency Contact
    // get_all_employee();
    function getDependent() {
        table2.destroy();
        formData = {
            a: "employeeDetails",
            k: "getDependent",
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
                { "data": null },
                { "data": "name" },
                { "data": "relationship" },
                { "data": "birthdate" },
            ],

            //serial number
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + "</b>");
                return nRow;
            },

        });
    }
    /******************************************GET  DATA************************************************* */

    /******************************************UPLOAD ATTACHMENT************************************************* */
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
        fd.append("k", "dAttachment");
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
    // save emergency contact
    $(".save").click(function () {
        //get basic data
        let name = $("#name").val();
        let relationship = $("#relationship").val();
        let birthdate = $("#birthdate").val();

        //   formdata
        let fd = {
            a: "employeeDetails",
            b: name,
            c: relationship,
            d: birthdate,
            k: "dependent",
            l: id,
        };
        console.log(fd);
        addDependent(fd);
    });
    //register employee function
    function addDependent(fd) {
        // console.log(fd);
        $.ajax({
            url: "/olamhrm/model/EkirsApi.php",
            type: "POST",
            data: fd,
            encode: true,
            success: function (data) {
                alert(data);
                getDependent()// Emergency Contact
            },
            error: function (error) {
                /**on error function */
                console.log(error);
            },
        });
    }

    /******************************************SAVE DATA************************************************* */
}); //end of jquery
