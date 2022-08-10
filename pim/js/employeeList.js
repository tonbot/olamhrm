
$(document).ready(function() { 

    var table2;
    //display active page

    //datable
    table2 = $('#employeeListTable').DataTable();
    get_all_employee()// get_all_employee();

    // get_all_employee();
      function get_all_employee(){
        table2.destroy();
        formData ={
            a :  "employeeLIst",
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
            { "data":  null },
            { "data": "employee_id" },
            { "data": "emp_firstname" },
            { "data": "emp_middle_name" },
            { "data": "emp_lastname" },
            { "data": "emp_mobile" },
            { "data": "emp_gender" },
            { "data" : "emp_status"},
            { "data" : null},
           ] , 

           columnDefs: [ {
            "targets": -1,
            "defaultContent": "<button class='btn-primary action' type='button'>View More</button>"
          }],

            //serial number
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
              $("td:first", nRow).html("<input type=checkbox class=checkBoxAll name=checkBoxAllArr value=" + (aData["id"]) + " >");
             return nRow;
          },

        });
      }
  
 /**This  */
$('#employeeListTable tbody').on( 'click', '.action', function () {
    var data = table2.row( $(this).parents('tr') ).data();
       let id = data['id'];           
                window.location.href="/olamhrm/pim/employeeDetails.php?a="+id;
  });
   


//SELECT ALL ASSIGNED SUBORDINATE
 $("#selectAllEmployee").click(function () {
    $(".checkBoxAll").prop('checked', $(this).prop('checked'));
 });

 //DELETE SELECTED ASSIGNED SUPERVISOR
 $(".deleteEmployee").click(function(){
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
        b: dataArray,
        z: 'deleteEmployee',
        k: "deleteCheckBoxSelected",
    }
    putReportTo(fd);
 });


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
           get_all_employee();
  
        },
        error: function (error) {
            /**on error function */
            console.log(error);
        },
    });
}









   
    

});