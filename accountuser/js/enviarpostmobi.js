$(document).ready(function() {

    $('#mobileenv').on('click', function() {
        var mobile = $('#mobile').val();
        var mobileenv = $('#mobileenv').val();

        $.ajax({
                type: 'POST',
                url: './accountuser/configuraciones/funciones/cuentasconf.php',
                data: {
                    'mobile': mobile,
                    'mobileenv': mobileenv


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