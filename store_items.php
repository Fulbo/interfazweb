<!DOCTYPE html>
<html lang="en">
<head>
<?php include "./includes/head.php"; ?>
    <link rel="stylesheet" href="./static/styles.css">
    <link rel="stylesheet" href="./items/css/style.css">
   
</head>
<body>

<a href="start">Home</a>
<h1 style="text-align: center; margin-bottom:80px;">Items</h1>

    <div class="contenedor">
        <div class="item"  style="background-color: #BDBDBD;" >
            <h1>common items</h1>
            <h2>20FUL</h2>
            <img src="./items/items/images.jpg" alt="Imagen item">
            <button onclick="buyitems(1)">Buy</button>
            <div style="margin-top:20px;" id="comun"></div>
        </div>
        
        <div class="item" style="background-color: #00FF00;">
            <h1>uncommon items</h1>
            <h2>50FUL</h2>
            <img src="./items/items/images.jpg" alt="Imagen item">
            <button onclick="buyitems(2)">Buy</button>
            <div style="margin-top:20px;" id="nocomun"></div>
        </div>

        <div class="item" style="background-color: #006CFF;">
            <h1>rare items</h1>
            <h2>70FUL</h2>
            <img src="./items/items/images.jpg" alt="Imagen item">
            <button onclick="buyitems(3)">Buy</button>
            <div style="margin-top:20px;" id="raro"></div>
        </div>

        <div class="item" style="background-color: #A200FF;">
            <h1>legendary items</h1>
            <h2>110FUL</h2>
            <img src="./items/items/images.jpg" alt="Imagen item">
            <button onclick="buyitems(4)">Buy</button>
            <div style="margin-top:20px;" id="legendario"></div>
          
        </div>

    </div>



    
    <script>


async function buyitems(id){

let confirmacion = confirm('accept to make the purchase or cancel to not make the purchase, once purchased the items will be added to your inventory')
 

if(confirmacion == true){
    var iditem = id;
  
if(iditem == 1){

    $.ajax({
            type: 'POST',
            url: './items/funciones/buyitems.php',
            data: {
                'id': iditem
                


            },
            beforeSend: function() {
                $('#comun').html('...')
            }
        })
        .done(function(response) {
            $('#comun').html(response)

        })

    }      

    if(iditem == 2){

$.ajax({
        type: 'POST',
        url: './items/funciones/buyitems.php',
        data: {
            'id': iditem
            


        },
        beforeSend: function() {
            $('#nocomun').html('...')
        }
    })
    .done(function(response) {
        $('#nocomun').html(response)

    })

}  

if(iditem == 3){

$.ajax({
        type: 'POST',
        url: './items/funciones/buyitems.php',
        data: {
            'id': iditem
            


        },
        beforeSend: function() {
            $('#raro').html('...')
        }
    })
    .done(function(response) {
        $('#raro').html(response)

    })

}  

if(iditem == 4){

$.ajax({
        type: 'POST',
        url: './items/funciones/buyitems.php',
        data: {
            'id': iditem
            


        },
        beforeSend: function() {
            $('#legendario').html('...')
        }
    })
    .done(function(response) {
        $('#legendario').html(response)

    })

}  

}
 }





</script>

</body>
</html>