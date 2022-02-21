$(document).ready(function() {

    $('#codenv').on('click', function() {
        var codigoemail = $('#codigoemail').val();
        var codenv = $('#codenv').val();

        $.ajax({
                type: 'POST',
                url: './loginuser/resetpass/funciones/funcionreset.php',
                data: {
                    'codigoemail': codigoemail,
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


$(document).ready(function() {

    $('#newenv').on('click', function() {
        var newpassword = $('#newpassword').val();
        var newenv = $('#newenv').val();

        $.ajax({
                type: 'POST',
                url: './loginuser/resetpass/funciones/funcionreset.php',
                data: {
                    'newpassword': newpassword,
                    'newenv': newenv


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