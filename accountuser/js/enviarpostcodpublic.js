$(document).ready(function() {

    $('#codpublic').on('click', function() {
        var codigopublic = $('#codigopublic').val();
        var codpublic = $('#codpublic').val();

        $.ajax({
                type: 'POST',
                url: './accountuser/configuraciones/funciones/cuentasconf.php',
                data: {
                    'codigopublic': codigopublic,
                    'codpublic': codpublic


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