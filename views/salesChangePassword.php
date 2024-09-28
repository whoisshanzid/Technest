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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/salesChangePasswordCss.css">
</head>

<body>
    <div class="header">
        <h1><?php echo $name; ?>'s Dashboard</h1>
    </div>
    <div class="container">
        <div class="sidebar">
            <a href="profile.php">Profile</a>
        
            <a href="salesChangePassword.php">Change password</a>
            <a href="salesViewItem.php">View items</a>
            <a href="salesChangeInfo.php">Edit profile</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main-content">
            <h2>Change Password</h2>
            <form action="../controllers/changePasswordAction.php" method="post"
                onsubmit="return changePasswordValidation(this)">
                <div class="form-group">
                    <label for="cpass">Current password</label>
                    <input type="password" name="cpass" id="cpass">
                    <span id="error1"></span>
                </div>
                <div class="form-group">
                    <label for="npass">New password</label>
                    <input type="password" name="npass" id="npass">
                    <span id="error2"></span>
                </div>
                <div class="form-group">
                    <label for="rpass">Retype password</label>
                    <input type="password" name="rpass" id="rpass">
                    <span id="error3"></span>
                </div>
                <button type="submit">Change</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Dashboard Footer</p>
    </div>
    <script type="text/javascript" src="js/changePasswordJs.js"></script>
</body>

</html>