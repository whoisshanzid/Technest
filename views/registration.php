<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/registrationCss.css">
</head>
 
<body>
    <div class="registration-container">
        <form id="formRegistration" action="../controllers/registrationAction.php" method="post" onsubmit="return submitForm(this)">
            <h2>Registration</h2>
            <div class="form-group">
                <label for="fname">Full name</label>
                <input type="text" name="fname" id="fname">
                <span id="rerr1" class="error"></span>
            </div>
            <div class="form-group">
                <label for="cnum">Contact number</label>
                <input type="text" name="cnum" id="cnum">
                <span id="rerr2" class="error"></span>
            </div>
            <div class="form-group">
                <p>Please select your gender</p>
                <input type="radio" id="rmale" name="gender" value="Male">
                <label for="rmale">Male</label><br>
                <input type="radio" id="rfemale" name="gender" value="Female">
                <label for="rfemale">Female</label>
                <span id="rerr4" class="error"></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <span id="rerr3" class="error"></span>
                <span id="email_validation"></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <span id="rerr5" class="error"></span>
            </div>
            <div class="form-group">
                <label for="rpass">Confirm password</label>
                <input type="password" name="rpass" id="rpass">
                <span id="rerr6" class="error"></span>
            </div>
            <span id="rerr7" class="error"></span><br>
            <button type="submit">Register</button>
        </form>
        <button onclick="window.location.href='login.php'" style="margin-top: 20px; padding: 10px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer;">Go To Login</button>
    </div>
    <script type="text/javascript" src="js/registrationJs.js"></script>
</body>
 
</html>