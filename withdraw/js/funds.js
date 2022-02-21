$("#mostrar").click(function() {

    $("#mostrar").css("visibility", "hidden");
    $("#ocultar").css("visibility", "visible");
    $(".contenidorbilletera p").css("text-shadow", "0 0 0px rgb(41, 41, 41)");
});



$("#ocultar").click(function() {

    $("#mostrar").css("visibility", "visible");
    $("#ocultar").css("visibility", "hidden");
    $(".contenidorbilletera p").css("text-shadow", "0 0 6px rgb(41, 41, 41)");

});



$(document).ready(function() {

    $('#retirar').on('click', function() {
        var monto = $('#monto').val();
        var retirar = $('#retirar').val();

        $.ajax({
                type: 'POST',
                url: './withdraw/funciones/retiro.php',
                data: {
                    'monto': monto,
                    'retirar': retirar


                },
                beforeSend: function() {
                    $('#result').html('...')
                }
            })
            .done(function(response) {
                $('#result').html(response)

            })


    })
})



function solonumeros(e) {
    var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = ".,1234567890",
        especiales = [],
        tecla_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}