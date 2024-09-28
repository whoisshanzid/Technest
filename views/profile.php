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
    <title>Dashboard sales</title>
    <link rel="stylesheet" href="css/profileCss.css">
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
            <h2>Profile Information</h2>
            <p><strong>Name:</strong> <?php echo $name ?></p>
            <p><strong>Email:</strong> <?php echo $email ?></p>
            <p><strong>Contact Number:</strong> <?php echo $contact_number ?></p>
            <p><strong>Gender:</strong> <?php echo $gender ?></p>
        </div>
    </div>
    <div class="footer">
        <p>Dashboard Footer</p>
    </div>
</body>

</html>