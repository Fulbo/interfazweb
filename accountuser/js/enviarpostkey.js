$(document).ready(function() {

    $('#keyenv').on('click', function() {
        var publickey = $('#publickey').val();
        var keyenv = $('#keyenv').val();

        $.ajax({
                type: 'POST',
                url: './accountuser/configuraciones/funciones/cuentasconf.php',
                data: {
                    'publickey': publickey,
                    'keyenv': keyenv


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