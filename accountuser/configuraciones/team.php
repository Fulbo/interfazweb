<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fulbostars - Team</title>
       <!-- fonts -->
       <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Aguafina+Script&family=Dancing+Script&family=Kaushan+Script&family=Petit+Formal+Script&family=Pinyon+Script&family=Roboto&family=Rouge+Script&display=swap"
        rel="stylesheet">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- Ajax -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<style>


#avatarcontainer{
  display:none;
}
#escudocontainer{
  display:none;
}
#camisetacontainer{
  display:none;
}
    .container {


  max-width: 800px;
  margin: 5% auto;
  padding: 20px;
  height:500px;
  background-color: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-sizing: border-box;
  box-shadow: 0 10px 35px rgba(0, 0, 0, 0.4);
  overflow-y: scroll;
  position:fixed;
top:0%;
left:0%;

}

.text-center {
  text-align: center;
  margin-bottom: 1em;
}

.lightbox-gallery {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
}

.lightbox-gallery div > img {
  max-width: 100%;
  display: block;
  border-radius:100px;
  box-shadow:0px 0px 5px 0.5px;
  transition:1s;
}
.lightbox-gallery div > img:hover {
    transition:1s;
    transform:scale(1.1);
}

.lightbox-gallery div {
  margin: 10px;
  flex-basis: 180px;
}

@media only screen and (max-width: 480px) {
  .lightbox-gallery {
    flex-direction: column;
    align-items: center;
  }

  .lightbox > div {
    margin-bottom: 10px;
  }
}

/*Lighbox CSS*/

.lightbox {
  display: none;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  position: fixed;
  top: 0;
  left: 0;
  z-index: 20;
  padding-top: 30px;
  box-sizing: border-box;
  
}

.lightbox img {
  display: block;
  margin: auto;
  border-radius:100px;
}

.lightbox .caption {
  margin: 15px auto;
  width: 50%;
  text-align: center;
  font-size: 1em;
  line-height: 1.5;
  font-weight: 700;
  color: #eee;
}

.closeavatar{
    display:flex !important;
    justify-content:center;
    align-items:center;
    margin:auto;
    margin-top:50px;
    padding:10px;
    font-size:18px;
    width:25%;

}
.h2avatar{
    display:flex;
    justify-content:center;
    margin:auto;
    align-items:center;
    margin-bottom:50px;
}
</style>


<body>
<?php
include "../../funcionesg/sesion.php";
if (isset($_SESSION['token']) ) { 



}
else {
    header("Location:  ../../log_in");
 }

?>
<div class="avatar" id="avatar">
    <h2>Hello <?php echo $_SESSION['user_full_name']; ?></h2>
    <div id="imgavatar" > 
    <img style="width:100px;" src="./avatars/<?php echo $_SESSION['avatar']; ?>" alt="avatar">
</div>
    <a onclick="changeavatar()" id="avatar">Change Avatar?</a>

    <div class="container" id="avatarcontainer">
    <h2 class="h2avatar">Choose your avatar</h2>
    <div class="lightbox-gallery">
        <?php 
        $cont = 0;
        $total_imagenes = count(glob('../../avatars/{*.png}',GLOB_BRACE));
        for ($i=0; $i < $total_imagenes ; $i++) { 
          $cont += 1;
          ?>
        <div><img src="./avatars/<?php echo $cont; ?>.png"  onclick="avatar('<?php echo $cont; ?>.png')"  alt="avatar"></div>
       
   <?php }?>
      </div>

    <button type="submit" onclick="closechange()" id="close" class="btn btn-danger closeavatar">Close</button>
    <div id="resultavatar"></div>  
</div>



    
</div>  



<div class="teaminfo"> 
<h2>Team Info</h2>
<p>Team Name: <?php echo $_SESSION['teamname']; ?></p>
<input type="text" name="teamname" id="teamname">
<input type="submit" value="Save" id="teamenv">
<div id="resultnameteam"></div>

</div>












<script src="./accountuser/js/enviarteam.js"></script>
</body>
</html>