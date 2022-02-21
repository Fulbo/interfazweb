<?php 








function verificausuario($datos){

  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  

  foreach($usuarios as $user){
    echo "<p>".var_dump($datos)."<p>";
      if($datos['user']==$user['user']){
        if($datos['password']==$user['password'] && $user['datos']['activo'] == "1"){
          return $user["datos"];
        }
        return "false"; 
      }   
    } 
    return "false";
}

function updatepassword($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  
  foreach($usuarios as $user){
 
      if($datos['user']==$user['user']){
        if($datos['passwordant'] == $user['password']){
          $user['password'] = $datos['password'];
          echo "<p>".var_dump($user)."<p>";
          return true;
         

        }else{
          return false;
        }
      
      }else{
        return false;
      }   
    }  
}

function updatemobilecodigo($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  
  foreach($usuarios as $user){
 
    if($datos['user']==$user['user']){
      if($datos['mobile'] != null){
        //codigo que genera el servidor y envia sms al usuario para confirmar el cambio
        return "612412";
      }else{ return false;}
    }else{
      return false;
    } 
}

}



function codigoconfirmadomobile($datos){
 
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  
  foreach($usuarios as $user){
 
    if($datos['user']==$user['user']){
        
      $user['datos']['mobile'] = $datos['mobile'];
     
      echo "<p>".var_dump($user)."<p>";

      return true;
    }else{
      return false;
    } 
}

}

function updateubicacion($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  
  foreach($usuarios as $user){
  if($datos['user']==$user['user']){

    $user['datos']['city'] = $datos['city'];
    $user['datos']['country'] = $datos['country'];
    echo "<p>".var_dump($user)."<p>";
    return true;
  }else{
    return false;
  }
}

}



function resetpassword($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  
  foreach($usuarios as $user){
    if($datos['user']==$user['user']){
      if($datos['user'] != null){
        //codigo que genera el servidor y envia sms al usuario para confirmar el cambio
        return "612412";
      }

     
    }else{
      return false;
    }
  }

}

function resetpasswordfinal($datos){

  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  foreach($usuarios as $user){
    if($datos['user']==$user['user']){
      if($datos['user'] != null && $datos['password'] != null){
        
        
        $user['password'] = $datos['password'];
        
        echo "<p>".var_dump($user)."<p>";
        return true;
        
      }

     
    }else{
      return false;
    }
  }


}


function updatepublickey($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  

  foreach($usuarios as $user){
    if($datos['user']==$user['user']){
      if($datos['user'] != null && $datos['publickey'] != null){
        
        
        $user['datos']['billetera'] = $datos['publickey'];
        
        echo "<p>".var_dump($user)."<p>";
        return true;
        
      }

     
    }else{
      return false;
    }
  }


}



function updateavatar($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  
  
  
  foreach($usuarios as $user){
    if($datos['user']==$user['user']){
      if($datos['user'] != null && $datos['avatar'] != null){
        
        
        $user['datos']['avatar'] = $datos['avatar'];
        
        echo "<p>".var_dump($user)."<p>";
        return true;
        
      }

     
    }else{
      return false;
    }
  }


}

function updateteamname($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  foreach($usuarios as $user){
    if($datos['user']==$user['user']){
      if($datos['user'] != null && $datos['teamname'] != null){
        
        
        $user['datos']['teamname'] = $datos['teamname'];
        
        echo "<p>".var_dump($user)."<p>";
        return true;
        
      }

     
    }else{
      return false;
    }
  }

}

function retirarfulbo($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  
  foreach($usuarios as $user){
 
    if($datos['user']==$user['user']){
      if($datos['monto'] != null){
        //codigo que genera el servidor y envia email al usuario para confirmar el retiro
        return "612412";
      }
    }
   
    
}
return false;
     


}

function codigoconfirmadomonto($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );
  foreach($usuarios as $user){
 
    if($datos['user']==$user['user']){
        //el servidor devuelve true o false segun si el codigo es correcto o no, le retira los tokens a la wallet del usuario la cual esta almacenada en la bd
      return true;
    }
 
   
}     return false;


}


function ingresartokens($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );


  foreach($usuarios as $user){
  
      if($datos['user']==$user['user']){
       
        return "612412"; 
      }   
    } 
    return "false";


}
function convertiranft($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );



  
  foreach($usuarios as $user){
  
    if($datos['user']==$user['user']){
     //habria que validar que el id del personaje exista y sea correcto, si esta todo ok se realiza la transaccion
          // ademas habria que revisar que el mismo lo tiene o si no lo tiene ya
      return true; 
    }   
  } 
  return "false";


}


function buyitem($datos){
  $usuarios=array(
    array("user"=>"jose@gmail.com","password"=>"1234","datos"=>array("id"=>"1","nombre"=>"Jose","avatar" => "1.png","teamname" => "turraca","billetera" =>"ASV6snqHHAupgDvqEbySegv4Fc4ZxPb8BEUjdRa1hkVP","activo"=>"1","apellido"=>"tantardini","city"=>"longchamps","country"=>"argentina","tokens"=>"100","mobile"=>"+541127924947")),
    array("user"=>"luis@gmail.com","password"=>"1233","datos"=>array("id"=>"2","nombre"=>"Luis","avatar" => "2.png","teamname" => "fulbito","billetera" =>"7vq8Ba2vRb7NDmsq7facY77LQUbg9ox4LNZYE13SPqmY","activo"=>"1","apellido"=>"divina","city"=>"villa 31","country"=>"paraguay","tokens"=>"200","mobile"=>"+541128521423"))
  );



  
  foreach($usuarios as $user){
  
    if($datos['user']==$user['user']){
     //habria que validar que el id del item exista y sea correcto, si esta todo ok se realiza la transaccion
     // ademas habria que revisar que el mismo lo tiene o si no lo tiene ya
      return true; 
    }   
  } 
  return "false";


}






function conectarserver($datos){
  if(empty($datos)){
    echo "no se especifico la accion";
    return;
  }
  if($datos['accion'] == 'validarusuario'){
    return verificausuario($datos['data']);
  }
  elseif($datos['accion'] == 'updatepassword'){
    return updatepassword($datos['data']);
  }
  elseif($datos['accion'] == 'updatemobile'){
    return updatemobilecodigo($datos['data']);
  }
  elseif($datos['accion'] == 'codigoconfirmadomobile'){
    return codigoconfirmadomobile($datos['data']);
  }
  elseif($datos['accion'] == 'updateubicacion'){
    return updateubicacion($datos['data']);
  }
  elseif($datos['accion'] == 'resetpassword'){
    return resetpassword($datos['data']);
  }
  elseif($datos['accion'] == 'resetpasswordfinal'){
    return resetpasswordfinal($datos['data']);
  }
  elseif($datos['accion'] == 'updatepublickey'){
    return updatepublickey($datos['data']);
  }

  elseif($datos['accion'] == 'updateavatar'){
    return updateavatar($datos['data']);
  }
  elseif($datos['accion'] == 'updateteamname'){
    return updateteamname($datos['data']);
  }
  elseif($datos['accion'] == 'retirarfulbo'){
    return retirarfulbo($datos['data']);
  }
  elseif($datos['accion'] == 'updateteamname'){
    return updateteamname($datos['data']);
  }

  elseif($datos['accion'] == 'codigoconfirmadomonto'){
    return codigoconfirmadomonto($datos['data']);
  }
  
  elseif($datos['accion'] == 'ingresartokens'){
    return ingresartokens($datos['data']);
  }

  elseif($datos['accion'] == 'convertiranft'){
    return convertiranft($datos['data']);
  }
  elseif($datos['accion'] == 'buyitem'){
    return buyitem($datos['data']);
  }
  
  
  else{
    echo "accion desconocida";
    return;
  } 
} 


function conectarserverfinal($datos){
  //		echo json_encode($data);
  $postdata = http_build_query(json_encode($data));

  $opts = array('http' =>
    array(
      'method' => 'POST',
      'header'=>  "Content-Type: application/json\r\n",
      'content' => json_encode($data)
    )
  );

  echo $opts;

  $context = stream_context_create($opts);
  
  return file_get_contents('http://localhost:3001/api', false, $context);
} 

