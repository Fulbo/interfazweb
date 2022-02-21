$(document).ready(function() {
    $('#enviar').focus()

    $('#enviar').on('click', function() {
        var name = $('#name').val();
        var enviar = $('#enviar').val();
        var lastname = $('#lastname').val();
        var mobile = $('#mobile').val();
        var city = $('#city').val();
        var country = $('#country').val();
        var password = $('#password').val();
        var rpassword = $('#rpassword').val();
        var billetera = $('#billetera').val();
        var isChecked = document.getElementById('acept').checked;




        if (isChecked) {
            var acept = 1;
        } else {
            var acept = 0;
        }


        var email = $('#email').val();


        $.ajax({
                type: 'POST',
                url: './registeruser/funciones/registrar.php',
                data: {
                    'enviar': enviar,
                    'password': password,
                    'rpassword': rpassword,
                    'acept': acept,
                    'email': email,
                    'billetera': billetera
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