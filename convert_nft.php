<!DOCTYPE html>
<html lang="en">
<head>
<?php include "./includes/head.php"; ?>


    <link rel="stylesheet" href="./static/styles.css">
    <link rel="stylesheet" href="./convertnft/css/style.css">
 
</head>
<body>


<a href="start">Home</a>
<div class="nftcontent">
<h1>CONVERT NFT</h1>



</div>
<div class="contentcards">
<ul>
  <li>
    <div class="details">
    
    <h2>Name Player</h2>
      <p>1 FUL</p>
    
      <button style="z-index:5;"  onclick="convertnft(2)">Convert Nft</button>
      <img src="./pj/vlad.svg">

      
    </div>
    
  </li>


</ul>

</div>



<div style="margin-top:200px;" id="result"></div>
<script>
 function convertnft(id){
$(document).ready(function() {

 
    var idnft = id;
  


    $.ajax({
            type: 'POST',
            url: './convertnft/funciones/convernft.php',
            data: {
                'id': idnft
                


            },
            beforeSend: function() {
                $('#result').html('...')
            }
        })
        .done(function(response) {
            $('#result').html(response)

        })

      
})
 }

</script>
 
</body>
</html>