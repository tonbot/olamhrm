
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
              $("td:first", nRow).html("<input type=checkbox value=" + (aData["id"]) + " >");
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
   

  function delete_question(formData){
                
    $.ajax({
        url: "post/report_post.php",
        type: "POST",
        data: formData,   
        encode:true,
        success: function(data){
         table.destroy();
         console.log(data)
          const res = JSON.parse(data);
          if(res.data !='false'){
            table2 = get_all_question()
             return
          }
          
        },
        error: function(error){
          console.log(error)
        },
  
    });
 
 }












   
    

});