function isLoginValid(form) {
    var email = form.email.value;
    var password = form.password.value;
    var rememberMe = form.remember_me.checked;

    var isValid = true;

    if (email === "") {
        document.getElementById('err1').textContent = "Email is required";
        isValid = false;
    } else {
        document.getElementById('err1').textContent = "";
    }

    if (password === "") {
        document.getElementById('err2').textContent = "Password is required";
        isValid = false;
    } else {
        document.getElementById('err2').textContent = "";
    }

    if (isValid && rememberMe) {
        setCookie("email", email, 30);
    }

    return isValid;
}

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
