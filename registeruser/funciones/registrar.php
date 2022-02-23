<?php
//API URL

if(isset($_POST['enviar'])){
  
    
    
if( $_POST["enviar"] != null && $_POST["password"]!= null && $_POST["email"] != null && $_POST["rpassword"] != null ){
 if($_POST["acept"] == 1){

$password = $_POST['password'];
$rpassword = $_POST['rpassword'];
$email = $_POST['email'];
$acept = $_POST['acept'];
$billetera = $_POST['billetera'];

$total_imagenes = count(glob('../../avatars/{*.png}',GLOB_BRACE));

$navatar = rand(1, $total_imagenes);

$avatar = $navatar;


//$regexp = '/[^a-zA-Z\d]/';

//if(strcmp($mobile,'')==0){
  //  $mobile = null;
//}



if($password != $rpassword){
    echo "<p class='alert alert-danger'>The passwords do not match</p>";
}

elseif(strlen($password)<8){
    echo "<p class='alert alert-danger'>Password must not be less than 8 characters long</p>";
}
elseif(preg_match('/[^a-zA-Z\d]/', $password)==0 || preg_match('/\d/', $password)==0 || preg_match('/[A-Z]/', $password)==0 || preg_match('/[a-z]/', $password)==0){
    echo "<p class='alert alert-danger'>"."Password must contain at least 1 special character, 1 upper case letter and 1 lower case letter
    "."</p>";
}
//elseif(preg_match('/[^a-zA-Z\d]/', $name)!=0){
  //  echo "<p class='alert alert-danger'>Invalid name</p>";
//}
//elseif(preg_match('/[a-z]/', $mobile)!=0 ||  preg_match('/[A-Z]/', $mobile)!=0){
  //  echo "<p class='alert alert-danger'>Invalid number</p>";
//}
elseif (strpos($email,"@")==0 || strpos($email,".")==0 ) {
    echo "<p class='alert alert-danger'>"."Does not match required email format, missing '@' sign."."</p>";
}



else{

$firma = "$email,$password,$billetera,$avatar,C13BECC3544694AF84022CCC5DB3EE30,C13BECC3544694AF84022CCC5DB3EE30";
$url = 'https://45.77.191.253:3000/api';

$ch = curl_init($url);
$payload = json_encode(array(
    'action' => 'UserRegister',
    'data' =>  array(
        'user' => htmlspecialchars($email),
        'password' => $password,
        'wallet' => htmlspecialchars($billetera),
        'avatar' =>  htmlspecialchars($avatar)
        // 'mobile' => htmlspecialchars($mobile),
        // 'name' => htmlspecialchars($name),
        // 'lastname' => htmlspecialchars($lastname),
        // 'city' => htmlspecialchars($city),
        // 'country' => htmlspecialchars($country),
        // 'subscribe' => htmlspecialchars($subscribe),
        
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

if($codigoRespuesta === 403){
    echo "<p class='alert alert-danger'>Error</p>";
}

if($codigoRespuesta === 200){
session_start();
    $result = json_decode($result,true);

$_SESSION['usuario'] = $email;
$_SESSION['cont'] = 3;
header('Location: ../codigo/valida.php');


}
if($codigoRespuesta === 409){
    echo  "<p class='alert alert-danger'>account already registered</p>";
}


curl_close($ch);

}

 }else{
     echo "<p class='alert alert-danger'>You must accept the terms and conditions</p>";
 }

}
else{
    echo "<p class='alert alert-danger'>Missing fields to fill in</p>";
}
}
