
<!DOCTYPE html>
 
<html lang="en">
<head>
	<?php include "./includes/head.php"; ?>

	<link rel="stylesheet" href="static/styles.css">




<style>
#single_2 href {
  width: 120%;
  height: 100%;
  border: 2px solid red;
}

.fancybox-skin {
  position: relative;
  background: none;
  color: #444;
  text-shadow: none;
}

.fancybox-image {
  max-width: 100%;
  max-height: 100%;
  overflow: hidden;
}

.fancybox-overlay {
  position: absolute;
  top: 0;
  left: 0;
  overflow: hidden;
  display: none;
  z-index: 8010;
}

.fancybox-overlay-fixed {
  position: fixed;
  bottom: 0;
  right: 0;
  overflow: hidden;
}

.fancybox-inner {
  overflow: hidden !important;
}

.front-text {
  position: absolute;
  color: white;
  text-align: center;
}


</style>

</head>
<body>








<?php 


include "funcionesg/sesion.php";
include "funcionesg/logout.php";
 
?>
<?php 

if(isset($_SESSION['token'])){
$token=$_SESSION['token'];

$firma = "$token,C13BECC3544694AF84022CCC5DB3EE30,C13BECC3544694AF84022CCC5DB3EE30";
$url = 'https://45.77.191.253:3000/api';

$ch = curl_init($url);
$payload = json_encode(array(
    'action' => 'GetInformation',
    'data' =>  array(
        'token' => htmlspecialchars($token),
  
    ),
    'who' =>'C13BECC3544694AF84022CCC5DB3EE30',
    'sign' => strtoupper(hash("sha256",$firma))
   
 
    

));
//parametros de envio
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);

$codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);



$result = json_decode($result,true);

}





  
?>

	 <div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
	 <?php   if (isset($_SESSION['token'])) { 
		   ?>
		<img class="imgavatar" src="./avatars/<?php echo $result["Avatar"]; ?>.png"   alt="avatar">
      <div id="valores" style="text-align:center;">
      <h4>Tokens: <?php echo $result["Tokens"]; ?></h4>
    <h4>Experience: <?php echo $result["Experience"]; ?></h4>

      </div>
		
      <a href="account">My account</a>
      <a href="withdraws">Withdraw funds</a>
      <a href="deposit">Deposit tokens</a>
      <a href="convert_nft">Convert nft</a>
      <a href="store_items">Store</a>

		<form action="" method="POST">
		<input type="submit" class="btn btn-warning" name="cerrarsesion" value="Logout">
		</form>
		
		
		<?php }  if (!isset($_SESSION['token'])) {   
			?>

				<a href="log_in" style="width:80px;" class="btn btn-warning">Login</a>
				<a href="registration" style="width:80px;" class="btn btn-info">Register</a>

			<?php
			
		 }  ?>
		

	

	 </div>
	 



<script src="./static/scripts.js">

  
</script>





</body>
</html>

