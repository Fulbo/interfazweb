$(document).ready(function() {
    $('#enviarcod').focus()

    $('#enviarcod').on('click', function() {
        var codigoemail = $('#codigoemail').val();
        var codigomobile = $('#codigomobile').val();
        var enviarcod = $('#enviarcod').val();


        $.ajax({
                type: 'POST',
                url: './registeruser/codigo/valida.php',
                data: {
                    'enviarcod': enviarcod,
                    'codigoemail': codigoemail,
                    'codigomobile': codigomobile

                },
                beforeSend: function() {
                    $('#result').html(" <div id='preloader_1'><span></span><span></span><span></span><span></span><span></span></div>")
                }
            })
            .done(function(response) {
                $('#result').html(response)
            })


    })
})