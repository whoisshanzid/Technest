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

// Fetch all salesmen
$salesmen = getSalesmen(); // Create this function in your models/functions.php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove'])) {
    $salesmanId = $_POST['salesman_id'];
    removeSalesman($salesmanId); // Create this function to remove the salesman
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manager</title>
    <link rel="stylesheet" href="css/removeSalesManCss.css">
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
            <h2>Salesmen List</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($salesmen as $salesman): ?>
                    <tr>
                        <td><?php echo $salesman['id']; ?></td>
                        <td><?php echo $salesman['name']; ?></td>
                        <td><?php echo $salesman['email']; ?></td>
                        <td><?php echo $salesman['contact_number']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="salesman_id" value="<?php echo $salesman['id']; ?>">
                                <input type="submit" name="remove" value="Remove">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>Dashboard Footer</p>
    </div>
</body>

</html>