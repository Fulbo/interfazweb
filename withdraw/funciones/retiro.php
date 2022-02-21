<?php

include '../../funcionesg/db_conn.php';
include '../../funcionesg/sesion.php';

if(isset($_POST['retirar'])){
    if($_POST['monto'] != null){
        
        $monto = $_POST['monto'];
       $montoactual = $_SESSION['tokens'];
        
        
       if(preg_match('/[a-z]/', $monto)==0 ||  preg_match('/[A-Z]/', $monto==0)){
            if($monto < $montoactual){

                $data = array(
                    'accion' => 'retirarfulbo',
                    'data' => 
                    array('user' => $_SESSION['user_email'],
                    'monto' => $monto
                    )
                );
                $result = conectarserver($data);

                if($result != false){
                    if($result != null){
                        echo "<p class='alert alert-success'>A code was sent to your email</p>";
                        $_SESSION['codigomon'] = $result;
                        $_SESSION['monto'] = $monto;
                        $_SESSION['cont']=3;
                    }else{
                        echo "<p class='alert alert-danger'>Error</p>";
                        unset($_SESSION['codigomon']);
                        unset($_SESSION['monto']);
                        unset($_SESSION['cont']);
                    }
                }else{
                    echo "<p class='alert alert-danger'>Invalid amount error</p>";
                    unset($_SESSION['codigomon']);
                    unset($_SESSION['monto']);
                    unset($_SESSION['cont']);
                }
            }else{
                echo "<p class='alert alert-danger'>The entered amount of tokens cannot be greater than your current amount of tokens</p>";
                unset($_SESSION['codigomon']);
                unset($_SESSION['monto']);
                unset($_SESSION['cont']);
            }
    }else{
        echo "<p class='alert alert-danger'>Invalid</p>";
        unset($_SESSION['codigomon']);
        unset($_SESSION['monto']);
        unset($_SESSION['cont']);
    }
     
        

    }else{
        echo "<p class='alert alert-danger'>Missing fields to fill in</p>";
    }
}



    
?>

<?php 

if (isset($_SESSION['codigomon'])) { 

?>
<input type="text" name="codigomonto" id="codigomonto" placeholder="Enter your code ">
    <input type="submit" name="codenvmonto" class="btn btn-primary" id="codenvmonto" value="Send">

<?php 
}?>

<?php 
if(isset($_POST['codenvmonto'])){
    if($_SESSION['codigomon'] != null && $_POST['codigomonto'] != null){

        if($_SESSION['codigomon'] == $_POST['codigomonto']){
            
        $data = array(
			'accion' => 'codigoconfirmadomonto',
			'data' => 
			array('user' => $_SESSION['user_email'],
			'monto' => htmlspecialchars($_SESSION['monto']),
			)
		);
	//	echo var_dump($data);			
		$result = conectarserver($data);

        if($result == true){
            echo  "<p class='alert alert-success'>Amount successfully withdrawn to your wallet</p>";
           unset($_SESSION['codigomon']);
           unset($_SESSION['monto']);
           unset($_SESSION['cont']);
            
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
            

        }else{
            $_SESSION['cont'] = $_SESSION['cont'] - 1;
            echo "<p class='alert alert-danger'>Wrong code, you have ".$_SESSION['cont']." attempts left</p>";
            if($_SESSION['cont'] <= 0){
                unset($_SESSION['codigomon']);
                unset($_SESSION['monto']);
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
            unset($_SESSION['codigomon']);
            unset($_SESSION['monto']);
            unset($_SESSION['cont']); 
            ?>
       <script>
           location.reload();
       </script>
       <?php
        }
    }
}






?>

<script src="./withdraw/js/codigoenv.js"></script>