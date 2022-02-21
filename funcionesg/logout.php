<?php 
if(isset($_POST['cerrarsesion'])){
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_email"]);
session_unset();
session_destroy();

}