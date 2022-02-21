<?php


include '../../funcionesg/db_conn.php';
include '../../funcionesg/sesion.php';
if(isset($_POST['id'])){
    if($_POST['id'] != null){
        $iditem = $_POST['id'];
    
        $data = array(
            'accion' => 'buyitem',
            'data' => 
            array('user' => $_SESSION['user_email'],
            'iditem' => $iditem
            )
        );
        $result = conectarserver($data);

        if($result != false){
            if($result != null){
                echo "<p class='alert alert-success'>item purchased successfully</p>";
                
            }else{
                echo "<p class='alert alert-danger'>Error</p>";
        
            }
        }else{
            echo "<p class='alert alert-danger'>You don't have enough tokens</p>";
        
        }
    
    }

}

?>