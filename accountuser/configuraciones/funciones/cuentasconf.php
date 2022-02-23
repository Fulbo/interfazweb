<?php
    include '../../../funcionesg/db_conn.php';
    include '../../../funcionesg/sesion.php';
    if(isset($_POST['passwordenv'])){
        //config password
    if($_POST["password"] != null && $_POST["passwordant"] != null && $_POST["rpassword"] != null){


        $password = $_POST['password'];
        $passwordant = $_POST['passwordant'];
        $rpassword = $_POST['rpassword'];
      
        if($password != $rpassword){

            echo "<p class='alert alert-danger'>Passwords do not match</p>";

        }

        elseif(strlen($password)<8){
            echo "<p class='alert alert-danger'>Password must not be less than 8 characters long</p>";
        }
        elseif(preg_match('/[^a-zA-Z\d]/', $password)==0 || preg_match('/\d/', $password)==0 || preg_match('/[A-Z]/', $password)==0 || preg_match('/[a-z]/', $password)==0){
            echo "<p class='alert alert-danger'>"."Password must contain at least 1 special character, 1 upper case letter, 1 lower case letter and 1 special character"."</p>";
        }else{
        $email = $_SESSION['email'];
		$firma = "$email,$passwordant,$password,C13BECC3544694AF84022CCC5DB3EE30,C13BECC3544694AF84022CCC5DB3EE30";
		//url de destino
		$url = 'https://45.77.191.253:3000/api';
		
		//iniciamos curl
		$ch = curl_init($url);
		//datos a enviar
		//lo decodificamos a json
		$payload = json_encode(array(
			'action' => 'ChangePassword',
			'data' =>  array(
				'user' => $_SESSION['email'],
                'oldpassword' => $passwordant,
                'newpassword' => $password,
			),
			'who' =>'C13BECC3544694AF84022CCC5DB3EE30',
			'sign' => strtoupper(hash("sha256",$firma))
		   
		 
			
		
		));
		//parametros de envio
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		
		//ejecutamos el post y guardamos en variable result la respuesta
		$result = curl_exec($ch);
		
		$codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($codigoRespuesta == 200){
            echo "<p class='alert alert-success'>The password was successfully changed</p>";
            ?>
            <script>
            $(document).ready(function(){
             setTimeout(refrescar, 3000);
           });
                function refrescar(){
             location.reload();
           }
                    </script>
           <?php
        }
        elseif($codigoRespuesta == 409){
            echo "<p class='alert alert-danger'>The old password you entered is not correct</p>";
        }
     
        }

        
    }else{
        echo "<p class='alert alert-danger'>Missing fields to fill in</p>";
    }

        



    }


if(isset($_POST['mobileenv'])){

    if($_POST["mobile"] != null ){

        $mobile =  htmlspecialchars($_POST['mobile']);
    
        if(strlen($mobile)<8){
            echo "<p class='alert alert-danger'>The mobile number must not have less than 8 digits</p>";
            unset($_SESSION['codigo']);
            unset($_SESSION['newmobile']);
            unset($_SESSION['cont']);
        }else{

        $data = array(
			'accion' => 'updatemobile',
			'data' => 
			array('user' => $_SESSION['user_email'],
			'mobile' => htmlspecialchars($mobile),
			)
		);
	//	echo var_dump($data);			
		$result = conectarserver($data);
        if($result != false){
            if($result != null){
                echo "<p class='alert alert-success'>A code has been sent to your cell phone</p>";
                $_SESSION['codigo'] = $result;
                $_SESSION['newmobile'] = $mobile;
                $_SESSION['cont']=3;
            }
            else{
                echo "<p class='alert alert-danger'>Error</p>";
                unset($_SESSION['codigo']);
                unset($_SESSION['newmobile']);
                unset($_SESSION['cont']);
            }
        }else{
            echo "<p class='alert alert-danger'>Invalid number error</p>";
            unset($_SESSION['codigo']);
            unset($_SESSION['newmobile']);
            unset($_SESSION['cont']);
        }
    }
}
    else{
        echo "<p class='alert alert-danger'>No number entered</p>";
        unset($_SESSION['codigo']);
        unset($_SESSION['newmobile']);
        unset($_SESSION['cont']);
    }


}






    
    ?>

<?php 

if (isset($_SESSION['codigo'])) { 

?>
<input type="text" name="codigomob" id="codigomob" placeholder="Enter your code ">
    <input type="submit" name="codenv" id="codenv" value="Enviar">

<?php 
}?>

<?php 
if(isset($_POST['codenv'])){
    if($_SESSION['codigo'] != null && $_POST['codigomob'] != null){

        if($_SESSION['codigo'] == $_POST['codigomob']){
            
        $data = array(
			'accion' => 'codigoconfirmadomobile',
			'data' => 
			array('user' => $_SESSION['user_email'],
			'mobile' => htmlspecialchars($_SESSION['newmobile']),
			)
		);
	//	echo var_dump($data);			
		$result = conectarserver($data);

        if($result == true){
            echo  "<p class='alert alert-success'>Number changed successfully</p>";
           unset($_SESSION['codigo']);
           unset($_SESSION['newmobile']);
           unset($_SESSION['cont']);
           ?>
           <script>
           $(document).ready(function(){
          
            setTimeout(refrescar, 3000);
          });
               function refrescar(){
            //update page
            location.reload();
          }
                   </script>
          <?php
            
  
        }
            

        }else{
            $_SESSION['cont'] = $_SESSION['cont'] - 1;
            echo "<p class='alert alert-danger'>Wrong code, you have ".$_SESSION['cont']." attempts left</p>";
            if($_SESSION['cont'] <= 0){
                unset($_SESSION['codigo']);
                unset($_SESSION['newmobile']);
                unset($_SESSION['cont']); 
                ?>
           <script>
               location.reload();
           </script>
           <?php
            }

        }


    }else{
        $_SESSION['cont'] = $_SESSION['cont'] - 1;
        echo "<p class='alert alert-danger'>Wrong code, you have ".$_SESSION['cont']." attempts left</p>";
        if($_SESSION['cont'] <= 0){
            unset($_SESSION['codigo']);
            unset($_SESSION['newmobile']);
            unset($_SESSION['cont']); 
            ?>
       <script>
           location.reload();
       </script>
       <?php
        }
    }
}


//update location

if(isset($_POST['ubienv'])){

    if($_POST["city"] != null && $_POST["country"] != null ){

        $city =  htmlspecialchars($_POST['city']);
        $country =  htmlspecialchars($_POST['country']);

        $data = array(
			'accion' => 'updateubicacion',
			'data' => 
			array('user' => $_SESSION['user_email'],
			'city' => htmlspecialchars($city),
            'country' => htmlspecialchars($country)
			)
		);


	//	echo var_dump($data);			
		$result = conectarserver($data);



        
        if($result != false){
            if($result == true){
                echo "<p class='alert alert-success'>Changed location</p>";

            }
            else{
                echo "<p class='alert alert-danger'>Unknown error</p>";
       
            }
        }else{
            echo "<p class='alert alert-danger'>Error: Invalid location</p>";
  
        }



    }else{
        echo "<p class='alert alert-danger'>Missing fields to fill in</p>"; 
    }


}



//publickey
//aca va ir lo que se cargue de usuario y password que luego va habilitar la public key
if(isset($_POST['sendkey'])){








}


if(isset($_SESSION['trueuserkey'])){
?>


<h1>Update public key</h1>
    
    <input type="text" name="publickey" id="publickey" placeholder="Enter your public key">
    <input type="submit" name="key" id="key" onclick="conectarwallet()" value="Get public key">
    <input type="submit" name="keyenv" id="keyenv" value="update">





<?php


}



if(isset($_POST['keyenv'])){

    if($_POST['publickey'] != null){

        $publickey =  htmlspecialchars($_POST['publickey']);

        $data = array(
			'accion' => 'updatepublickey',
			'data' => 
			array('user' => $_SESSION['user_email'],
			'publickey' => htmlspecialchars($publickey),
           
			)
		);
	//	echo var_dump($data);			
		$result = conectarserver($data);


        if($result != false){
            if($result == true){
                echo "<p class='alert alert-success'>a code has been sent to your email.</p>";
                $_SESSION['newpublickey'] = $publickey;
            }
            else{
                echo "<p class='alert alert-danger'>Unknown error</p>";
       
            }
        }else{
            echo "<p class='alert alert-danger'>Invalid public key error</p>";
  
        }

        




    }else{
        echo "<p class='alert alert-danger'>Missing fields to complete</p>";
    }


}






?>

<?php 

if (isset($_SESSION['newpublickey'])) { 

?>
<input type="text" name="codigopublic" id="codigopublic" placeholder="Enter your code ">
    <input type="submit" name="codpublic" id="codpublic" value="Enviar">

<?php 
}?>

<?php 
if(isset($_POST['codpublic'])){
    if($_POST['codigopublic'] != null){

        if($_POST['codigopublic']){
            
        $data = array(
			'accion' => 'codigoconfirmadomobile',
			'data' => 
			array('user' => $_SESSION['user_email'],
			'publickey' => htmlspecialchars($_SESSION['newpublickey']),
            'codigo' => htmlspecialchars($_POST['codigopublic']),
			)
		);
	//	echo var_dump($data);			
		$result = conectarserver($data);

        if($result == true){
            echo  "<p class='alert alert-success'>Number changed successfully</p>";
           unset($_SESSION['newpublickey']);
           unset($_SESSION['cont']);
           ?>
           <script>
           $(document).ready(function(){
          
            setTimeout(refrescar, 3000);
          });
               function refrescar(){
            //update page
            location.reload();
          }
                   </script>
          <?php
            
  
        }
            

        }else{
            $_SESSION['cont'] = $_SESSION['cont'] - 1;
            echo "<p class='alert alert-danger'>Wrong code, you have ".$_SESSION['cont']." attempts left</p>";
            if($_SESSION['cont'] <= 0){
                unset($_SESSION['newpublickey']);
                unset($_SESSION['cont']); 
                ?>
           <script>
               location.reload();
           </script>
           <?php
            }

        }


    }else{
        $_SESSION['cont'] = $_SESSION['cont'] - 1;
        echo "<p class='alert alert-danger'>Wrong code, you have ".$_SESSION['cont']." attempts left</p>";
        if($_SESSION['cont'] <= 0){
            unset($_SESSION['newpublickey']);
            unset($_SESSION['cont']); 
            ?>
       <script>
           location.reload();
       </script>
       <?php
        }
    }
}







//fin public key






//avatar
if(isset($_POST['avatar'])){
   

    $avatar= htmlspecialchars($_POST['avatar']);


    $data = array(
             'accion' => 'updateavatar',
             'data' => 
             array('user' => $_SESSION['user_email'],
             'avatar' => htmlspecialchars($avatar)           
             )
         );
     //	echo var_dump($data);			
         $result = conectarserver($data);
 
 
         if($result == true){
             echo "<p class='alert alert-success'>Avatar successfully updated</p>";

             $_SESSION['avatar'] = $avatar;
            
             ?>
             <script>$('#close').on('click', function() {
    $('#content').load('./cuenta/configuraciones/team.php');

})</script>
             
             <?php
             
            
         }
         elseif($result == false){
             echo "<p class='alert alert-danger'>Unknown error</p>";
         }
    
}
       

//teamname

if(isset($_POST['teamenv'])){

    if($_POST['teamname'] != null){

      $teamname1 = $_POST['teamname'];

      $teamname = htmlspecialchars($teamname1);
      

        $data = array(
            'accion' => 'updateteamname',
            'data' => 
            array('user' => $_SESSION['user_email'],
            'teamname' => htmlspecialchars($teamname)           
            )
        );
    //	echo var_dump($data);			
        $result = conectarserver($data);


        if($result == true){
            echo "<p class='alert alert-success'>Team name successfully updated</p>";

            $_SESSION['teamname'] = $teamname;
           
        }
        elseif($result == false){
            echo "<p class='alert alert-danger'>Unknown error</p>";
        }



    }
    else{
        echo "<p class='alert alert-danger'>Missing fields to fill</p>";
    }
}












?>
<script src="./accountuser/configuraciones/funciones/enviarcodigomob.js"></script>
<script src="./accountuser/configuraciones/funciones/enviarpostkey.js"></script>
<script src="./accountuser/configuraciones/funciones/enviarpostcodpublic.js"></script>