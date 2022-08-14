<?php
    include_once('resources/include.php'); 

   // print_r($response)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKIRS LUC</title>
    <link rel="shortcut icon" href="image/ekirs.ico">
    <link rel="stylesheet" href="resources/customCss/index.css">
    <script src="resources/customJs/index.js"></script>
    <style>
        #message{
            color:red;
            font-size:13px;
            text-align:center;
            padding: 8px ;
        }
    </style>
</head>

<body>

    <div class="motherContainer">
        <div class="hasChildren">
          <!-- <div class="text-center"><img src="image/ekirs.png" width="120px" alt=""> </div>  -->
            <div class="titleContainer">Welcome,</div>
            <div class="title2">Please continue to login.</div>
            <div class="frmContainer">
                <form method="post">
                    <div id="message"></div>
                     <label for="">Username <em>*</em></label>
                    <div><input class="" type="text" name="" id="username" ></div>
                    <label for="password">Password <em>*</em></label>
                    <div><input class="" type="password" name="password" id="password"></div>
                    <div class="text-center"><button class="" type="button" id="login">Login</button></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>