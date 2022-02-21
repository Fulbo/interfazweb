<?php
    include '../../../funcionesg/db_conn.php';
    include '../../../funcionesg/sesion.php';


    if(isset($_POST['resetpass'])){
        if($_POST['email'] != null){

            $email = $_POST['email'];
            if (strpos($email,"@")==0 || strpos($email,".")==0 ) {
                echo "<p class='alert alert-danger'>"."Does not match required email format, missing '@' sign."."</p>";
            }else{
                $data = array(
                    'accion' => 'resetpassword',
                    'data' => 
                    array('user' => $email
                    )
                );
             
             
                $result = conectarserver($data);
                if($result != false){
                    if($result != null){
                        echo "<p class='alert alert-success'>A code was sent to your email</p>";
                        $_SESSION['codigoservidor'] = $result;
                        $_SESSION['cont']=3;
                        $_SESSION['email']=$email;
                        unset($_SESSION['accessresetpassword']);
                    }
                    else{
                        echo "<p class='alert alert-danger'>Error</p>";
                        unset($_SESSION['codigoservidor']);
                        unset($_SESSION['cont']);
                        unset($_SESSION['accessresetpassword']);
                        unset($_SESSION['email']);
                    }
                }else{
                    echo "<p class='alert alert-danger'>Error: Invalid email</p>";
                    unset($_SESSION['codigoservidor']);
                    unset($_SESSION['cont']);
                    unset($_SESSION['accessresetpassword']);
                    unset($_SESSION['email']);
                }
            }

        }else{
            echo "<p class='alert alert-danger'> Missing fields to fill in </p>";
        }


    }




    if (isset($_SESSION['codigoservidor'])) { 

        ?>
        <input type="text" name="codigoemail" id="codigoemail" placeholder="Enter your code">
            <input type="submit" name="codenv" id="codenv" value="Enviar">
        
        <?php 
        }?>


<?php 
if(isset($_POST['codenv'])){
    if($_SESSION['codigoservidor'] != null && $_POST['codigoemail'] != null){

        if($_SESSION['codigoservidor'] == $_POST['codigoemail']){

                $_SESSION['accessresetpassword'] = true;

        }else{
            $_SESSION['cont'] = $_SESSION['cont'] - 1;
            echo "<p class='alert alert-danger'>Wrong code, you have ".$_SESSION['cont']." more attempts</p>";
            if($_SESSION['cont'] <= 0){
                unset($_SESSION['codigoservidor']);
                unset($_SESSION['cont']); 
                unset($_SESSION['email']);
                unset($_SESSION['accessresetpassword']);
                ?>
                <script>
                $(document).ready(function(){
                 //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
                 setTimeout(refrescar, 3000);
               });
                    function refrescar(){
                 //Actualiza la página
                 location.reload();
               }
                        </script>
               <?php
            }

        }


    }else{
        $_SESSION['cont'] = $_SESSION['cont'] - 1;
        echo "<p class='alert alert-danger'>Wrong code, you have ".$_SESSION['cont']." more attempts</p>";
        if($_SESSION['cont'] <= 0){
            unset($_SESSION['codigoservidor']);
            unset($_SESSION['cont']); 
            unset($_SESSION['accessresetpassword']);
            unset($_SESSION['email']);
            ?>
            <script>
            $(document).ready(function(){
             //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
             setTimeout(refrescar, 3000);
           });
                function refrescar(){
             //Actualiza la página
             location.reload();
           }
                    </script>
           <?php
        }
    }
}




if(isset($_SESSION['accessresetpassword'])){
    if($_SESSION['accessresetpassword'] == true){

        unset($_SESSION['codigoservidor']);
        unset($_SESSION['cont']); 

        ?>
        <script>
  $("#codigoemail").css("display", "none");
  $("#codenv").css("display", "none");
        </script>
        <?php

?>

<input type="password" name="newpassword" id="newpassword" placeholder="Enter your new password ">
    <input type="submit" name="newenv" id="newenv" value="Send">

<?php 
?>


<?php 
}else{
    unset($_SESSION['codigoservidor']);
    unset($_SESSION['cont']); 
    unset($_SESSION['accessresetpassword']);
    unset($_SESSION['email']);
}
}


if(isset($_POST['newenv']) && isset($_SESSION['accessresetpassword']) ){

    if($_POST['newpassword'] != null && $_SESSION['accessresetpassword'] == true ){

        $password = $_POST['newpassword'];

        if(strlen($password)<8){
            echo "<p class='alert alert-danger'>The password must not be less than 8 characters long</p>";
        }
        elseif(preg_match('/[^a-zA-Z\d]/', $password)==0 || preg_match('/\d/', $password)==0 || preg_match('/[A-Z]/', $password)==0 || preg_match('/[a-z]/', $password)==0){
            echo "<p class='alert alert-danger'>"."The password must contain at least 1 special character, 1 uppercase letter, 1 lowercase letter and 1 special character."."</p>";
        }else{
           
            $data = array(
                'accion' => 'resetpasswordfinal',
                'data' => 
                array('user' => $_SESSION['email'],
                'password' => $password
                )
            );
         
         
            $result = conectarserver($data);
            if($result != false){
                if($result != null){
                    echo "<p class='alert alert-success'>Your password has been changed</p>";
                    unset($_SESSION['codigoservidor']);
                    unset($_SESSION['cont']);
                    unset($_SESSION['email']);
                    unset($_SESSION['accessresetpassword']);

                    ?>
                    <script>
                    $(document).ready(function(){
                     //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
                     setTimeout(refrescar, 3000);
                   });
                        function refrescar(){
                     //Actualiza la página
                     location.reload();
                   }
                            </script>
                   <?php
                }else{
                    echo "<p class='alert alert-danger'>Error: unknown</p>";
                }
           


        }else{
            echo "<p class='alert alert-danger'>Error: unknown</p>";
        }




        }
    } else{
        echo "<p class='alert alert-danger'> Missing fields to fill in </p>";
    }   

}








?>



<script src="./loginuser/resetpass/funciones/postreset.js"></script>
