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
    <link rel="stylesheet" href="css/managerChangePasswordCss.css">
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
            <a href="changeInfo.php">Change Info</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main-content">
            <h2>Change Password</h2>
            <form action="../controllers/changePasswordAction.php" method="post"
                >
                <div class="form-group">
                    <label for="cpass">Current Password</label>
                    <input type="password" name="cpass" id="cpass" required>
                    <span id="error1"></span>
                </div>
                <div class="form-group">
                    <label for="npass">New Password</label>
                    <input type="password" name="npass" id="npass" required>
                    <span id="error2"></span>
                </div>
                <div class="form-group">
                    <label for="rpass">Retype Password</label>
                    <input type="password" name="rpass" id="rpass" required>
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