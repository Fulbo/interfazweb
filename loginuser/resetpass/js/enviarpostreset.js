$(document).ready(function() {

    $('#resetpass').on('click', function() {
        var email = $('#email').val();
        var resetpass = $('#resetpass').val();

        $.ajax({
                type: 'POST',
                url: './loginuser/resetpass/funciones/funcionreset.php',
                data: {
                    'email': email,
                    'resetpass': resetpass


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