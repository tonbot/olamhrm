$(document).ready(function () {
  $("#message").hide();
  $("#login").click(function () {
    let username = $("#username").val();
    let password = $("#password").val();

    if (
      username === "" || username === null || password === "" || password === null) {
      $("#message").text("Please fill all fields");
      $("#message").show();
    } else {
      var fd = {
        a: 'login',
        b: username,
        c: password,
      };
    //  console.log(fd);
         
      $.ajax(
        //ajax call
        {
          url: "/olamhrm/model/EkirsApi.php",
          type: "POST",
          data: fd,
          encode: true,
          // beforeSend: function() {
          //     $('.progress-circle').show();
          //     $('.fa-sign-in-alt').hide();
          //  },
          //  complete: function(){
          //     $('.progress-circle').hide();
          //     $('.fa-sign-in-alt').show();
          //  },
          success: function (data) {
           console.log(data)
          },
          error: function (error) {
            console.log(error);
          },
        }
      ); //end of ajax
    } //end of else
  }); //end of adduser click ebent

  $("#login").focusout(function () {
    $("#message").hide();
  });
});
