<!DOCTYPE html>
<html lang="en">
<head>

<?php include "./includes/head.php"; ?>
<link rel="stylesheet" href="./static/styleaccount.css">
</head>
<body>
<?php
include "./funcionesg/sesion.php";
if (isset($_SESSION['token'])) { 



}
else {
?>
<script>
        
                window.location.replace("https://fulbostars.com/log_in");     
        
           


        </script>

<?php
 }

?>


<nav class="sidebar-navigation"  style="z-index:100;">
	<ul style="z-index:100;">
	<a href="start">
		<li>
			<i><img src="./img/logo.png" alt="logo" style="width: 45px;height:45px; "></i>
			<span class="tooltip" style="color:white;">Home</span>
		</li>
		</a>
	<li   id="boton">
			<i class="fa fa-lock"></i>
			<span class="tooltip">Change password</span>
		</li>
		<li id="boton2">
			<i class="fa fa-mobile" ></i>
			<span class="tooltip">Change mobile</span>
		</li>
		<li id="boton3">
			<i class="fa fa-map-marker"></i>
			<span class="tooltip">Change location</span>
		</li>
		<li id="boton4">
			<i class="fa fa-key"></i>
			<span class="tooltip">Change public key</span>
		</li>
		<li id="boton5">
			<i class="fa fa-futbol-o"></i>
			<span class="tooltip">Update team data</span>
		</li>
   
	</ul>
</nav>

    
    <div id="content" ></div>
    
  

   <script src="./accountuser/js/scriptsconfig.js"></script>


   <script>
$('ul li').on('click', function() {
	$('li').removeClass('active');
	$(this).addClass('active');
});

   </script>
</body>
</html>