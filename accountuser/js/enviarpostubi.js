$(document).ready(function() {

    $('#ubienv').on('click', function() {
        var country = $('#country').val();
        var city = $('#city').val();
        var ubienv = $('#ubienv').val();

        $.ajax({
                type: 'POST',
                url: './accountuser/configuraciones/funciones/cuentasconf.php',
                data: {
                    'ubienv': ubienv,
                    'country': country,
                    'city': city


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