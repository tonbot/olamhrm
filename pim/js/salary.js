$(document).ready(function () {

    //date picker fnction
    $(function () {
        $(".datepickers").datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true,
        });
    });

    /** check if createDeposit is checked */
    is_createDeposit = false;
    $(".createDeposit").change(function () {
        if ($(this).is(':checked')) {
            is_createDeposit = true;
            $(".createDeposit-container").css("display", "block"); // show createDeposit container
            return
        }
        is_createDeposit = false;
        $(".createDeposit-container").css("display", "none");  // hide createDeposit container 
    });



    //datable
    var table2;
    table2 = $('#employeeListTable').DataTable();
    $(".attachment-error").css("display", "none");
    //set current page to active
    $(".Salary").addClass("active");

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
     
   //toggle table container
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
    /******************************************GET SALARY DATA************************************************* */
    let id = $("#id").html(); //Employee id
    getSalary();
    function getSalary() {
        table2.destroy();
        formData = {
            a: "employeeDetails",
            k: "getSalary",
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
                { "data": "salary_component" },
                { "data": "salary_period" },
                { "data": "currency" },
                { "data": "amount" },
                { "data": "account_number" },
                { "data": "account_type" },
            ],

            //serial number
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + "</b>");
                return nRow;
            },

        });
    }
    /******************************************GET SALARY DATA ENDS HERE************************************************* */

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
        fd.append("k", "sAttachment");
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
        addSalary()
    });

    function addSalary() {
        //variable declaration
        let account_number, account_type, routing_number, direct_amount;

        //get basic data
        let salary_component = $("#salary_component").val().trim();
        salary_component = (salary_component === "") ? $("#salary_component").css("border-color", "red") : salary_component.trim();
        let salary_period = $("#salary_period").find(":selected").text().trim();
        salary_period = (salary_period === "-- Select --") ? "" : salary_period.trim();
        let currency = $("#currency").find(":selected").text();
        let amount = $("#amount").val().trim();
        amount = (amount === "") ? $("#amount").css("border-color", "red") : amount.trim();
        let comment = $("#comment").val().trim();

        //  console.log (salary_component , salary_period , currency, amount, comment);

        //if create Deposit details
        if ($(".createDeposit").is(':checked')) {   
            account_number = $("#account_number").val().trim();
            account_number = (account_number === "") ? $("#account_number").css("border-color", "red") : account_number;
            account_type = $("#account_type").val().trim();
            account_type = (account_type === "") ? $("#account_type").css("border-color", "red") : account_type;
            routing_number = $("#routing_number").val().trim();
            routing_number = (routing_number === "") ? $("#routing_number").css("border-color", "red") : routing_number;
            direct_amount =$("#direct_amount").val().trim();
            direct_amount = (direct_amount === "") ? $("#direct_amount").css("border-color", "red") : direct_amount;
        }
         
        //check if important field are empty
        if (salary_component === "" || currency === "" || amount === "") {
            return;
        }

        // 
        if (is_createDeposit === true) {
              //check if important field are empty in creat deposit
            if (account_number === "" || account_type === "" || routing_number === "" || direct_amount === "") {
                return
            }

           //create form object
            let fd = {
                a: "employeeDetails",
                b: is_createDeposit,
                c: salary_component,
                d: salary_period,
                e: currency,
                f: amount,
                g: comment,
                h: account_number,
                i: account_type,
                j: routing_number,
                m: direct_amount,
                k: "salary",
                l: id,
            }
            // console.log(fd)
            putSalary(fd);
        } else { //create Deposit is false
            let fd = {
                a: "employeeDetails",
                b: is_createDeposit,
                c: salary_component,
                d: salary_period,
                e: currency,
                f: amount,
                g: comment,
                k: "salary",
                l: id,
            }
            // console.log(fd)
            putSalary(fd);
        }

    }//end of addSalary












    //register employee function
    function putSalary(fd) {
        // console.log(fd);
        $.ajax({
            url: "/olamhrm/model/EkirsApi.php",
            type: "POST",
            data: fd,
            encode: true,
            success: function (data) {
                let response = JSON.parse(data);
                if (response.code == "200"){
                    alert(response.message);
                }    
                getSalary();
            },
            error: function (error) {
                /**on error function */
                console.log(error);
            },
        });
    }

    /******************************************SAVE DATA************************************************* */

}); //end of jquery
