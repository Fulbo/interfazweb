<?php 
  session_start();

  if (!isset($_SESSION['token'])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "./includes/head.php"; ?>

<link rel="stylesheet" href="./static/styles.css">

</head>
<body>
	  <div class="d-flex justify-content-center align-items-center"  style="min-height: 100vh; color:white;">
	  	<form class="p-5 rounded shadow" 
	  	      action="./loginuser/auth.php"
	  	      method="post" 
	  	      style="width: 30rem ; background-color:#00A651;">
	  		  <header class="header">
	<h1 class="glitched">Login</h1>
</header>
	  		<?php if (isset($_GET['error'])) { ?>
	  		<div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error'])?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" 
		           class="form-label">Email address
		    </label>
		    <input type="email" 
		           name="email" 
		           value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" 
		           class="form-control" 
		           id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" 
		           class="form-label">Password
		    </label>
		    <input type="password" 
		           class="form-control" 
		           name="password" 
		           id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <button type="submit" 
		          class="btn btn-primary" style="width: 100%; ">LOGIN

		  </button>
		 <div class="contentlogininf" style="text-align: center; ">
		  <br>
		  <a href="registration">Do not have an account yet?</a>
		  <br>
		  <a href="reset_password">Forgot your password?</a>
		  </div>
		</form>
		
	  </div>
	  <script>
    $("header").append("<div class='glitch-window'></div>");
//fill div with clone of real header
$( "h1.glitched" ).clone().appendTo( ".glitch-window" );</script>
</body>
</html>

<?php 
}else {
   header("Location: start");
}
 ?>
