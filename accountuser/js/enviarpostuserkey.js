$(document).ready(function() {

    $('#sendkey').on('click', function() {
        var userkey = $('#userkey').val();
        var passwordkey = $('#passwordkey').val();
        var sendkey = $('#sendkey').val();

        $.ajax({
                type: 'POST',
                url: './accountuser/configuraciones/funciones/cuentasconf.php',
                data: {
                    'userkey': userkey,
                    'passwordkey': passwordkey,
                    'sendkey': sendkey


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