<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
       <!-- fonts -->
       <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Aguafina+Script&family=Dancing+Script&family=Kaushan+Script&family=Petit+Formal+Script&family=Pinyon+Script&family=Roboto&family=Rouge+Script&display=swap"
        rel="stylesheet">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- Ajax -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./static/stylepassword.css">
    <link rel="stylesheet" href="./static/preloaderpost2.css">
</head>
<body>
<?php
include "../../funcionesg/sesion.php";
if (isset($_SESSION['token'])) { 



}
else {
    header("Location: ../../log_in");
 }

?>    
<div class="contentchangepasssup">
<div class="contentchangepass">
    <h1>Change password</h1>
<div class="elemento">    <input type="password" name="passwordant" id="passwordant" placeholder="Enter your old password">
</div>
<div class="elemento">    <input type="password" name="password" id="password" placeholder="New password">
<div class="alert alert-info" id="elementpass"  style="text-align:left; display: none;">
            <p id="passstrength">
                <div class="mensajepass" id="passstrengthmayus"></div>
                <div class="mensajepass" id="passstrengthnums"></div>
                <div class="mensajepass" id="passstrengthnumbers"></div>
                <div class="mensajepass" id="passstrengthspecial"></div>
                
            </p>
            </div>
</div>

<div class="elemento">    <input type="password" name="rpassword" id="rpassword" placeholder="Repeat password">
</div>
<div class="elemento">    <input type="submit" name="passwordenv" id="passwordenv" value="Send">
</div>
   <div id="result" style="width:80%; display:flex; justify-content:center; align-items:center; margin:auto;"></div>

    </div>
    </div>

  


<script src="./static/validator.js"></script>    
<script src="./accountuser/js/enviarpostpass.js"></script>
</body>
</html>