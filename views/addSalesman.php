<?php
session_start();
if (!isset($_SESSION['userEmail'])) {
    header("Location: login.php");
    die();
}

include "../models/functions.php";
$email = $_SESSION['userEmail'];

$userInfo = getUser($email);

$name = $userInfo['name'];
$contact_number = $userInfo['contact_number'];
$gender = $userInfo['gender'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manager</title>
    <link rel="stylesheet" href="css/addSalesmanCss.css">
</head>

<body>
    <div class="header">
        <h1><?php echo $name; ?>'s Dashboard</h1>
    </div>
    <div class="container">
        <div class="sidebar">
            <a href="managerProfile.php">Profile</a>
            <a href="removeSalesMan.php">Remove salesman</a>
            <a href="addSalesman.php">Add salesman</a>
            <a href="managerChangePassword.php">Change Password</a>
            <a href="managerShowSalesHistory.php">Sale history</a>
            <a href="managerChangePassword.php">Change Info</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main-content">
            <div class="registration-container">
                <form id="formRegistration" action="../controllers/salesRegistrationAction.php" method="post"
                    onsubmit="return submitForm(this)">
                    <h2>Salesman Registration</h2>
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
            </div>
            <script type="text/javascript" src="js/registrationJs.js"></script>
        </div>
    </div>
    <div class="footer">
        <p>Dashboard Footer</p>
    </div>
</body>

</html>