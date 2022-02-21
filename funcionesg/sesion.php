<?php
session_start();
if(isset($_SESSION['user_id'] ) && isset($_SESSION['user_email'])){

	$id =	$_SESSION['user_id'];
    $email =  $_SESSION['user_email'];
			
		 
}
            ?>