<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/loginCss.css">
    <script type="text/javascript" src="js/loginJs.js"></script>
</head>
<body>
    <div class="login-container">
        <form action="../controllers/loginAction.php" method="post" onsubmit="return isLoginValid(this);">
            <h2>Login</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <span id="err1" class="error"></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span id="err2" class="error"></span>
            </div>
            <div class="form-group">
                <label for="remember_me">Remember Me</label>
                <input type="checkbox" id="remember_me" name="remember_me">
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="registration.php">Register.</a></p>
    </div>
    <script>
        window.onload = function() {
            if (document.cookie.indexOf("email=") !== -1) {
                var email = getCookie("email");
                document.getElementById('email').value = email;
                document.getElementById('remember_me').checked = true;
            }
        };

        function getCookie(name) {
            var cookieArr = document.cookie.split(";");
            for (var i = 0; i < cookieArr.length; i++) {
                var cookiePair = cookieArr[i].split("=");
                if (name === cookiePair[0].trim()) {
                    return decodeURIComponent(cookiePair[1]);
                }
            }
            return null;
        }
    </script>
</body>
</html>
