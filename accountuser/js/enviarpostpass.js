$(document).ready(function() {

    $('#passwordenv').on('click', function() {
        var passwordant = $('#passwordant').val();
        var password = $('#password').val();
        var rpassword = $('#rpassword').val();
        var passwordenv = $('#passwordenv').val();

        $.ajax({
                type: 'POST',
                url: './accountuser/configuraciones/funciones/cuentasconf.php',
                data: {
                    'passwordant': passwordant,
                    'password': password,
                    'rpassword': rpassword,
                    'passwordenv': passwordenv


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