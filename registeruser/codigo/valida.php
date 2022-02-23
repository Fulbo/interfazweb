<!DOCTYPE html>
<html lang="en">

<head>
<?php include "../../includes/head.php"; ?>

</head>

<body>
    <?php
        session_start();


if(isset($_SESSION['usuario'])){
    echo "<p class='alert alert-success'>We sent an email to confirm your details. </p>";
}


        if(isset($_SESSION['usuario'])){
           
        

            $bandera = 1;
        
       
?>


    <input type="text" name="codigoemail" id="codigoemail" placeholder="Enter email code" id="">

   



    <input type="submit" value="Send" id="enviarcod" name="enviarcod">

    <?php
        }



if(isset($_POST['enviarcod'])){
if($_POST['codigoemail'] != null){
  $email = $_SESSION['usuario'];
  $codigo = $_POST['codigoemail'];
    $firma = "$email,$codigo,C13BECC3544694AF84022CCC5DB3EE30,C13BECC3544694AF84022CCC5DB3EE30";


$url = 'https://45.77.191.253:3000/api';

$ch = curl_init($url);

$payload = json_encode(array(
    'action' => 'ValidateUser',
    'data' =>  array(
        'user' => $_SESSION['usuario'],
        'code' => $_POST['codigoemail']
 
      
    ),
    'who' =>'C13BECC3544694AF84022CCC5DB3EE30',
    'sign' => strtoupper(hash("sha256",$firma))
   ));
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);
$codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);





if($codigoRespuesta === 200){
    

    echo "<p class='alert alert-success'>Congratulations, your account has been successfully activated!</p>";

    ?>

        <script>
            setTimeout(() => {
                window.location.replace("https://fulbostars.com/log_in");     
            }, 2000);
           


        </script>
    
    <?php

}elseif($codigoRespuesta === 404){
    
    echo "<p class='alert alert-danger'>wrong code</p>";
}
elseif($codigoRespuesta === 666){
    echo "<p class='alert alert-danger'>It has run out of attempts</p>";

    ?>
        
    <script>

        setTimeout(() => {
            window.location.replace("https://fulbostars.com/log_in");     
        }, 1500);

    </script>
    
    <?php

}

curl_close($ch);



}else{
    echo "<p class='alert alert-danger'>no code was entered</p>";
}
}      
    


?>
    <script src="./registeruser/funciones/enviarcod.js"></script>
</body>

</html>