<?php 
include '../../funcionesg/db_conn.php';
include '../../funcionesg/sesion.php';
if(isset($_POST['id'])){
    if($_POST['id'] != null){
        $nft = $_POST['id'];
    
        $data = array(
            'accion' => 'convertiranft',
            'data' => 
            array('user' => $_SESSION['user_email'],
            'idnft' => $nft
            )
        );
        $result = conectarserver($data);

        if($result != false){
            if($result != null){
                echo "<p class='alert alert-success'>Character Converted to nft successfully</p>";
                
            }else{
                echo "<p class='alert alert-danger'>Error</p>";
        
            }
        }else{
            echo "<p class='alert alert-danger'>You don't have enough tokens</p>";
        
        }
    
    }
}





?>