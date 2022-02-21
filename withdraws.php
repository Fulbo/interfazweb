<!DOCTYPE html>
<html lang="en">
<head>

<?php include "./includes/head.php"; ?>


    <link rel="stylesheet" href="./withdraw/style.css">
    <link rel="stylesheet" href="./static/styles.css">

</head>
<body>
<?php
include "./funcionesg/sesion.php";
if (isset($_SESSION['token'])) { 



}
else {
    header("Location: log_in");
 }

?>

<a href="start">Home</a>
 <div class="withdraw">
 <h1>Withdraw funds</h1>

  <p class="msjpublickey">Public Key</p>

  <div class="contenidorbilletera">

  <p class="billeteravisible"><?php echo $_SESSION['billetera']; ?><i class="fas fa-eye-slash" id="ocultar"></i><i class="fas fa-eye" id="mostrar"></i></p>
  </div>
  <div class="mensaje alert alert-warning">
  <p>Remember to verify that your public key is correct before making a withdrawal. If your public key is not correct, you can go to the account settings and change your public key. <br> <a class="btn alert-info" href="#">Click here to learn more</a></p>
 
</div>


<div class="formularioretiro">
<input type="text" name="monto" id="monto" pattern="[0-9]" onkeypress="return solonumeros(event)" placeholder="Number of tokens to withdraw">
<input type="submit" class="btn btn-primary" name="retirar" id="retirar" value="Withdraw">
</div>

<div id="result"></div>
</div>





<script src="./withdraw/js/funds.js"></script>
</body>
</html>