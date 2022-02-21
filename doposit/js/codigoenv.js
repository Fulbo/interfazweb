$(document).ready(function() {

    $('#codenvmonto2').on('click', function() {
        var codigomonto2 = $('#codigomonto2').val();
        var codenvmonto2 = $('#codenvmonto2').val();

        $.ajax({
                type: 'POST',
                url: './doposit/funciones/ingresar.php',
                data: {
                    'codigomonto2': codigomonto2,
                    'codenvmonto2': codenvmonto2


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