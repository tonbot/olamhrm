

$(document).ready(function () {
    let id = $("#id").html(); //Employee id
    var table1;
    var table2;
    var table3;
    var table4;

    //date picker fnction
    $(function () {
        $(".datepickers").datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true,
        });
    });



    table1 = $('#WorkExperienceTable').DataTable(); //supervisor table
    table2 = $('#educationTable').DataTable(); //subordinate table
    table3 = $('#skillTable').DataTable(); //supervisor table
    table4 = $('#languageTable').DataTable(); //subordinate table
    table5 = $('#licenseTable').DataTable(); //subordinate table

    $(".attachment-error").css("display", "none");
    //set current page to active
    $(".Qualifications").addClass("active");

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
    $(".cancelWorkExperience").click(function () {
        assignedType = '';
        $("input[type=text]").val("");
        $(".contact_form").css("display", "none");
        $(".addWorkExperience").show();
        $(".deleteWorkExperience").show();
        $("#company").css("border-color", "rgba(0, 0, 0, 0.3)");
        $("#job_title").css("border-color", "rgba(0, 0, 0, 0.3)");
    });

    //show contact form body
    $(".addWorkExperience").click(function () {
        $(".contact_form").css("display", "block");
        $(".deleteWorkExperience").hide();
        $(this).css("display", "none");
    });
    
    //SAVE WORK EXPERIENCE
    $(".saveWorkExperince").click(function () {
        //get basic data
        let company = $("#company").val();
         (company === "") ? $("#company").css("border-color", "red") : ""
        let job_title = $("#job_title").val().trim();
          (job_title === "") ? $("#job_title").css("border-color", "red") : ""
        //check if important field are empty
        if(company === '' || job_title === '' ) {
            return;
        }
        // formData
        let fd = {
            a: "employeeDetails",
            b: company,
            c: job_title,
            d: $("#from").val().trim(),
            e: $("#to").val().trim(),
            f: $("#comment").val().trim(),
            g: "workExperience",
            k: "qualification",
            l: id,
        }
         console.log(fd)
         putQualification(fd);
    });
    /********************************* Work Experience ends here************************************************ */


    /********************************* EDUCATION ************************************************ */
    //  cancelWorkExperience edit
    $(".cancelEducation").click(function () {
        $("input[type=text]").val("");
        $(".contact_formEducation").css("display", "none");
        $(".addEducation").show();
        $("#level").css("border-color", "rgba(0, 0, 0, 0.3)");
    });

    //show contact form body
    $(".addEducation").click(function () {
        $(".contact_formEducation").css("display", "block");
        $(this).css("display", "none");
    });
    
    //SAVE WORK EXPERIENCE
    $(".saveEducation").click(function () {
        //get basic data
        let level = $("#level").val();
         (level === "") ? $("#level").css("border-color", "red") : ""
        //check if important field are empty
        if(level === '') {
            return;
        }
        // formData
        let fd = {
            a: "employeeDetails",
            b: level,
            c: $("#institute").val().trim(),
            d: $("#major").val().trim(),
            e: $("#year").val().trim(),
            f: $("#score").val().trim(),
            h: $("#startDate").val().trim(),
            i: $("#endDate").val().trim(),
            g: "education",
            k: "qualification",
            l: id,
        }
         console.log(fd)
         putQualification(fd);
    });
    /********************************* EDUCATION************************************************ */

    /********************************* SKILL ************************************************ */
    //  cancelWorkExperience edit
    $(".cancelSkill").click(function () {
        $("input[type=text]").val("");
        $(".contact_formSkill").css("display", "none");
        $(".addSkill").show();
        $("#skill").css("border-color", "rgba(0, 0, 0, 0.3)");
    });

    //show contact form body
    $(".addSkill").click(function () {
        $(".contact_formSkill").css("display", "block");
        $(this).css("display", "none");
    });
    
    //SAVE WORK EXPERIENCE
    $(".saveSkill").click(function () {
        //get basic data
        let skill = $("#skill").val();
         (skill === "") ? $("#skill").css("border-color", "red") : ""
        //check if important field are empty
        if(skill === '') {
            return;
        }
        // formData
        let fd = {
            a: "employeeDetails",
            b: skill,
            c: $("#years_of_experience").val().trim(),
            d: $("#skillComment").val().trim(),
            g: "skill",
            k: "qualification",
            l: id,
        }
         console.log(fd)
         putQualification(fd);
    });
    /********************************* SKILL************************************************ */
      

    /********************************* LANGUAGE ************************************************ */
    //  cancelWorkExperience edit
    $(".cancelLanguage").click(function () {
        $("input[type=text]").val("");
        $(".contact_formLanguage").css("display", "none");
        $(".addLanguage").show();
        $("#language").css("border-color", "rgba(0, 0, 0, 0.3)");
    });

    //show contact form body
    $(".addLanguage").click(function () {
        $(".contact_formLanguage").css("display", "block");
        $(this).css("display", "none");
    });
    
    //SAVE WORK EXPERIENCE
    $(".saveLanguage").click(function () {
        //get basic data
        let language = $("#language").val();
         (language === "") ? $("#language").css("border-color", "red") : ""
        //check if important field are empty
        if(language === '') {
            return;
        }
        // formData
        let fd = {
            a: "employeeDetails",
            b: language,
            c: $("#fluency").find(":selected").text().trim(),
            d: $("#competency").find(":selected").text().trim(),
            e: $("#languageComment").val().trim(),
            g: "language",
            k: "qualification",
            l: id,
        }
         console.log(fd)
         putQualification(fd);
    });
    /********************************* LANGUAGE************************************************ */


 /********************************* LICENSE ************************************************ */
    //  cancelWorkExperience edit
    $(".cancelLicense").click(function () {
        $("input[type=text]").val("");
        $(".contact_formLicense").css("display", "none");
        $(".addLicense").show();
        $("#license").css("border-color", "rgba(0, 0, 0, 0.3)");
    });

    //show contact form body
    $(".addLicense").click(function () {
        $(".contact_formLicense").css("display", "block");
        $(this).css("display", "none");
    });
    
    //SAVE WORK EXPERIENCE
    $(".saveLicense").click(function () {
        //get basic data
        let licenseType = $("#licenseType").val();
         (licenseType === "") ? $("#licenseType").css("border-color", "red") : ""
        //check if important field are empty
        if(licenseType === '') {
            return;
        }
        // formData
        let fd = {
            a: "employeeDetails",
            b: licenseType,
            c: $("#licenseNumber").val().trim(),
            d: $("#issuedDate").val().trim(),
            e: $("#expiryDate").val().trim(),
            g: "license",
            k: "qualification",
            l: id,
        }
         console.log(fd)
         putQualification(fd);
    });
    /********************************* LICENSE ************************************************ */




    //  table data
      getWorkExperience()
      getSkill()
      

    /******************************************GET WORK Experience************************************************* */

    function getWorkExperience() {
        table1.destroy();
        formData = {
            a: "employeeDetails",
            k: "getWorkExperience",
            l: id,
        }
        return table1 = $('#WorkExperienceTable').DataTable({
            "ajax": {
                url: "/olamhrm/model/EkirsApi.php",
                type: "POST",
                dataSrc: "",
                data: formData
            },
            columns: [
                { "data": null },
                { "data": "company"},
                { "data": "job_title"},
                { "data": "fromD"},
                { "data": "toD"},
            ],

            //serial number
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + " </b>");
                return nRow;
            },

        });
    }
    /******************************************GET ASSIGNED SUPERVISOR DATA ENDS HERE************************************************* */
   
    getEducation()

    
    /******************************************GET ASSIGNED SUBORDINATE DATA************************************************* */
    function getEducation() {
        table2.destroy();
        formData = {
            a: "employeeDetails",
            k: "getEducation",
            l: id,
        }
        return table2 = $('#educationTable').DataTable({
            "ajax": {
                url: "/olamhrm/model/EkirsApi.php",
                type: "POST",
                dataSrc: "",
                data: formData
            },
            columns: [
                { "data": null},
                { "data": "level"},
                { "data": "year"},
                { "data": "score"},
            ],

            //serial number
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + " </b>");
                return nRow;
            },

        });
    }
    /***
     * ***************************************GET ASSIGNED SUBORDINATE DATA ENDS HERE************************************************* */
     getLanguage()
 
    /******************************************GET ASSIGNED SUBORDINATE DATA************************************************* */
    function getSkill() {
        table3.destroy();
        formData = {
            a: "employeeDetails",
            k: "getSkill",
            l: id,
        }
        return table3 = $('#skillTable').DataTable({
            "ajax": {
                url: "/olamhrm/model/EkirsApi.php",
                type: "POST",
                dataSrc: "",
                data: formData
            },
            columns: [
                { "data": null },
                { "data": "skill" },
                { "data": "year_of_experience" },
            ],

            //serial number
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + " </b>");                
                return nRow;
            },

        });
    }
    /******************************************GET ASSIGNED SUBORDINATE DATA ENDS HERE************************************************* */
 /******************************************GET ASSIGNED SUBORDINATE DATA************************************************* */
 function getLanguage() {
    table4.destroy();
    formData = {
        a: "employeeDetails",
        k: "getLanguage",
        l: id,
    }
    return table4 = $('#languageTable').DataTable({
        "ajax": {
            url: "/olamhrm/model/EkirsApi.php",
            type: "POST",
            dataSrc: "",
            data: formData
        },
        columns: [
            { "data": null },
            { "data": "language" },
            { "data": "fluency" },
            { "data": "competency" },
            { "data": "comment" },
        ],

        //serial number
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {
            $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + " </b>");
            return nRow;
        },

    });
}
/******************************************GET ASSIGNED SUBORDINATE DATA ENDS HERE************************************************* */
getLicense()
function getLicense() {
    table5.destroy();
    formData = {
        a: "employeeDetails",
        k: "getLicense",
        l: id,
    }
    return table5 = $('#licenseTable').DataTable({
        "ajax": {
            url: "/olamhrm/model/EkirsApi.php",
            type: "POST",
            dataSrc: "",
            data: formData
        },
        columns: [
            { "data": null },
            { "data": "license_type" },
            { "data": "license_number"},
            { "data": "issued_date" },
            { "data": "expiry_date" },
        ],

        //serial number
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {
            $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + " </b>");
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
        fd.append("k", "qAttachment");
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
    function putQualification(fd) {
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
