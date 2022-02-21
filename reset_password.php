<!DOCTYPE html>
<html lang="en">
<head>
<?php include "./includes/head.php"; ?>

</head>
<body>
    <?php 
    session_start();
      if(isset($_SESSION['token'])){
  
        header('Location: start');
    }
    
    ?>
    <h1>Reset Password</h1>
    <input type="text" name="email" id="email" placeholder="Enter email">
    <input type="submit" value="Send" id="resetpass">


<div id="result"></div>

<script src="./loginuser/resetpass/js/enviarpostreset.js"></script>
</body>
</html>