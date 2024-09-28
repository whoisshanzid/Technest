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
    <link rel="stylesheet" href="css/managerProfileCss.css">
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
            <h2>Manager Profile Information</h2>
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