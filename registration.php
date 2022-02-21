<!DOCTYPE html>
<html lang="en">

<head>
<?php include "./includes/head.php"; ?>

    <link rel="stylesheet" href="./static/styles.css">
    <link rel="stylesheet" href="./static/preloaderpost.css">
    <link rel="stylesheet" href="./static/styleregistration.css">

 
    
</head>

<body>
    
    
    
<?php
include "./funcionesg/sesion.php";
  if(isset($_SESSION['token'])){
  
      header('Location: start');
  }
  ?>    

<script>
  async function conectarwallet()  {
    
        if (window.solana && window.solana.isPhantom) 
        {
            try 
            {
                const resp = await window.solana.connect();    
                document.getElementById("billetera").setAttribute("value",resp.publicKey.toString());
            } catch (err) 
            {
                alert("Could not connect to phantom wallet");
            }   
        }
        else
        {
            window.open("https://phantom.app/", "_blank");
        }
        

  }

  </script>
    <div class="login-page">
        <div class="form">
        <header class="header">
	<h1 class="glitched">Register</h1>
</header>
            <!--<input type="text" id="name" name="name" maxlength="40" onkeypress="return soloLetras(event)" required
            placeholder="Name" />-->
            <!--<input type="text" name="lastname" maxlength="40" onkeypress="return soloLetras(event)" id="lastname"
                required placeholder="Last name" />-->
            <!--<input type="text" name="mobile" maxlength="20" pattern="[0-9]+" onkeypress="return solonumeros(event)"
                id="mobile" placeholder="Mobile" />-->
           <!-- <input type="text" name="country" maxlength="100" id="country" placeholder="Country" />
            <input type="text" name="city" maxlength="100" id="city" placeholder="City" />-->
            <input type="text" name="billetera" id="billetera" placeholder="Public key of your wallet *optional"/>
            <input type="button" onclick="conectarwallet()" value="Connect wallet"/>
            <!--<p>Suscribe to news</p>-->
            <!--<input type="checkbox" id="suscribe" id="suscribe" name="suscribe" placeholder="Subscribe to News:" />-->
            <input type="text" name="email" id="email" placeholder="Email" required />
            <input type="password" maxlength="100" name="password" id="password" placeholder="password" required />
            <div class="alert alert-info" id="elementpass"  style="text-align:left; display: none;">
            <p id="passstrength">
                <div class="mensajepass" id="passstrengthmayus"></div>
                <div class="mensajepass" id="passstrengthnums"></div>
                <div class="mensajepass" id="passstrengthnumbers"></div>
                <div class="mensajepass" id="passstrengthspecial"></div>
                
            </p>
            </div>
            <input type="password" maxlength="100" name="rpassword" id="rpassword" placeholder="Repeat password"
                required />
            <p id="passstrength2"></p>
            <p>Accept terms and conditions</p>
            <input type="checkbox" id="acept" id="acept" name="acept" value="1"
                placeholder="I accept the terms and conditions:" required />
            <input type="submit" value="Send" id="enviar" name="enviar" class="boton">
            <p class="message">Do you already have an account? <a href="log_in">Login</a></p>

            <p id="result"></p>
        </div>
    </div>







    <script src="./static/validator.js"></script>
    <script src="./static/scripts.js"></script>

    <script src="./registeruser/funciones/valida.js"></script>


    <script>
    $('.message a').click(function() {
        $('form').animate({
            height: "toggle",
            opacity: "toggle"
        }, "slow");
    });


    $("header").append("<div class='glitch-window'></div>");
//fill div with clone of real header
$( "h1.glitched" ).clone().appendTo( ".glitch-window" );
    </script>
</body>

</html>