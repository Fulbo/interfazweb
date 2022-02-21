$("#mostrar").click(function() {

    $("#mostrar").css("visibility", "hidden");
    $("#ocultar").css("visibility", "visible");
    $(".contenidorbilletera p a").css("text-shadow", "0 0 0px rgb(41, 41, 41)");
});



$("#ocultar").click(function() {

    $("#mostrar").css("visibility", "visible");
    $("#ocultar").css("visibility", "hidden");
    $(".contenidorbilletera p a").css("text-shadow", "0 0 6px rgb(41, 41, 41)");

});




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