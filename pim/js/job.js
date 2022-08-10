$(document).ready(function () {
    
    $(".contact_form").css("display", "block");
    //date picker fnction
    $(function () {
        $(".datepickers").datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true,
        });
    });

    //attachment error message
    $(".attachment-error").css("display", "none");
    //set current page to active
    $(".job").addClass("active");
    // hide save and cancel button
    $(".save, .cancel").hide();
    // cancel edit
    $(".cancel").click(function () {
        $("input, select, radio").attr("disabled", "disabled");
        $("input[type=file]").removeAttr("disabled");
        $(".edit").show();
        $(".save").hide();
        $(this).hide();
    });
    //start edit
    $(".edit").click(function () {
        $(":disabled").removeAttr("disabled");
        getJobTitles();
        getJobCategories();
        getLocations();
        getSubUnits();
        $(".save, .cancel").show();
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
 
    var id = $("#id").html(); //emp id

/******************************************GET DATA************************************************* */
    function getJobTitles() {
        let fd = {
            a: "employeeDetails",
            k: "getJobTitles",
            l: id,
        }
        getData(fd);
    }
    function getJobCategories() {
        let fd = {
            a: "employeeDetails",
            k: "getJobCategories",
            l: id,
        }
         getData(fd);
    }
    function getSubUnits() {
        let fd = {
            a: "employeeDetails",
            k: "getSubUnits",
            l: id,
        }
         getData(fd);
    }
    function getLocations() {
        let fd = {
            a: "employeeDetails",
            k: "getLocations",
            l: id,
        }
         getData(fd);
    }


    function getData(fd) {
        $.ajax(
            //ajax call
            {
                url: "/olamhrm/model/EkirsApi.php",
                type: "POST",
                data: fd,
                encode: true,
                success: function (data) {
                    // console.log(data);
                    if (data != null && data != "") {
                        data = JSON.parse(data)
                        removeOption(data);
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            }
        ); //end of ajax
    }

    function removeOption(data) {
        if (data.code == 200) {
            let dataMessage = data.message;
            switch (data.module) {
                case "getJobTitles":
                    // $('#jobTitle').find('option').remove().end()
                    dataMessage.forEach(function (index) {
                        $('#jobTitle').append('<option value="">' + index.job_title + '</option>');
                    });
                    break;
                case "getJobCategories":
                    // $('#jobCategory').find('option').remove().end()
                    dataMessage.forEach(function (index) {
                        $('#jobCategory').append('<option value="">' + index.category + '</option>');
                    });
                    break;
                case "getSubUnits":
                    // $('#subUnit').find('option').remove().end()
                    dataMessage.forEach(function (index) {
                        $('#subUnit').append('<option value="">' + index.sub_unit + '</option>');
                    });
                    break;
                case "getLocations":
                    // $('#location').find('option').remove().end()
                    dataMessage.forEach(function (index) {
                        $('#location').append('<option value="">' + index.location + '</option>');
                    });
                    break;


                default:
                    break;
            }
        }
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
        fd.append("k", "jAttachment");
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
    // save  job data
    $(".save").click(function () {
    
        //get basic data
        let jobTitle = $("#jobTitle").find(":selected").text();
        let jobCategory = $("#jobCategory").find(":selected").text();
        let subUnit = $("#subUnit").find(":selected").text();
        let location = $("#location").find(":selected").text();
        let joinedDate = $("#joinedDate").val();
        let startDate = $("#startDate").val();
        let endDate = $("#endDate").val();
        
        //   formdata
        let fd = {
            a: "employeeDetails",
            b: jobTitle,
            c: jobCategory,
            d: subUnit,
            e: location,
            f: startDate,
            g: endDate,
            h: joinedDate,
            k: "job",
            l: id,
        };
        console.log(fd);
        addJob(fd);
    });
    //register employee function
    function addJob(fd) {
        // console.log(fd);
        $.ajax({
            url: "/olamhrm/model/EkirsApi.php",
            type: "POST",
            data: fd,
            encode: true,
            success: function (data) {

                if (data == "true" || data === "Job Details Added Successfully"){
                    alert("Update is successful!" + "  " + "Page will reload to see the update.");
                       location.reload();
                       return;
                 } else{
                    console.log(data);
                    alert ("Something went wrong");
                 } 
                 
            },
            error: function (error) {
                /**on error function */
                console.log(error);
            },
        });
    }

    /******************************************SAVE DATA************************************************* */
}); //end of jquery
