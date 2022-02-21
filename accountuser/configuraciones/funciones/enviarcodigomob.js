$(document).ready(function() {

    $('#codenv').on('click', function() {
        var codigomob = $('#codigomob').val();
        var codenv = $('#codenv').val();

        $.ajax({
                type: 'POST',
                url: './accountuser/configuraciones/funciones/cuentasconf.php',
                data: {
                    'codigomob': codigomob,
                    'codenv': codenv


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