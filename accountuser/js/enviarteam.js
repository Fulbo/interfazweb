function changeavatar() {

    $("#avatarcontainer").css('display', 'block');


}





function closechange() {
    $(".container").css('display', 'none');
}

function avatar(valor) {

    $.ajax({
            type: 'POST',
            url: './accountuser/configuraciones/funciones/cuentasconf.php',
            data: {
                'avatar': valor



            },
            beforeSend: function() {
                $('#resultavatar').html('...')
            }
        })
        .done(function(response) {
            $('#resultavatar').html(response)

        })
}




$(document).ready(function() {

    $('#teamenv').on('click', function() {
        var teamname = $('#teamname').val();
        var teamenv = $('#teamenv').val();

        $.ajax({
                type: 'POST',
                url: './accountuser/configuraciones/funciones/cuentasconf.php',
                data: {
                    'teamenv': teamenv,
                    'teamname': teamname,



                },
                beforeSend: function() {
                    $('#resultnameteam').html('...')

                }
            })
            .done(function(response) {
                $('#resultnameteam').html(response)


            })


    })
})