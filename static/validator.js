$('#password').keyup(function(e) {
    $("#elementpass").css("display", "block");

    let passregexmayus = document.getElementById("passstrengthmayus");
    let passregexnums = document.getElementById("passstrengthnums");
    let passregexnumbers = document.getElementById("passstrengthnumbers");
    let passregexspecial = document.getElementById("passstrengthspecial");
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    var enoughRegex = new RegExp("(?=.{8,100000})", "g");
    var enoughRegexnumbers = new RegExp("(?=.*[0-9])", "g");
    var mayus = new RegExp("(?=.*[A-Z])(?=.*[a-z])", "g");
    var enoughRegexspecial = new RegExp("(?=.*[\\W_])", "g");
    if (mayus.test($(this).val())) {
        passregexmayus.innerHTML = "<i class='okay'>✓</i> it must contain a combination of upper and lower case letters."
    }
    if (mayus.test($(this).val()) == false) {
        passregexmayus.innerHTML = "<i class='error'>x</i> it must contain a combination of upper and lower case letters."
    }

    if (enoughRegex.test($(this).val())) {
        passregexnums.innerHTML = "<i  class='okay'>✓</i> 8 characters or longer."
    }
    if (enoughRegex.test($(this).val()) == false) {
        passregexnums.innerHTML = "<i class='error'>x</i> 8 characters or longer."
    }


    if (enoughRegexnumbers.test($(this).val())) {
        passregexnumbers.innerHTML = "<i  class='okay'>✓</i> it may contain letters and numbers."
    }
    if (enoughRegexnumbers.test($(this).val()) == false) {
        passregexnumbers.innerHTML = "<i class='error'>x</i> it may contain letters and numbers."
    }

    if (enoughRegexspecial.test($(this).val())) {
        passregexspecial.innerHTML = "<i  class='okay'>✓</i> it must contain at least one special character (?,*,&)."
    }
    if (enoughRegexspecial.test($(this).val()) == false) {
        passregexspecial.innerHTML = "<i class='error'>x</i> it must contain at least one special character (?,*,&)."
    }







    return true;
});




$('#rpassword').keyup(function(e) {
    let valor = $('#password').keyup().val();

    if (valor != $(this).val()) {
        $('#passstrength2').removeClass('alert alert-success');
        $('#passstrength2').addClass('alert alert-danger');
        $('#passstrength2').html('Passwords are different');
    } else {
        $('#passstrength2').removeClass('alert alert-danger');
        $('#passstrength2').addClass('alert alert-success');
        $('#passstrength2').html('Passwords match');
    }



});