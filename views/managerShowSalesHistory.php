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

$salesHistory = getSalesHistory();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manager</title>
    <link rel="stylesheet" href="css/managerHistoryCss.css">
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
            <h2>Sales History</h2>
            <table>
                <tr>
                    <th>Salesman Name</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Time Added</th>
                </tr>
                <?php if (count($salesHistory) > 0): ?>
                    <?php foreach ($salesHistory as $sale): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($sale['salesman_name']); ?></td>
                            <td><?php echo htmlspecialchars($sale['product_name']); ?></td>
                            <td><?php echo number_format($sale['product_price'], 2); ?></td>
                            <td><?php echo htmlspecialchars($sale['added_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No sales history found.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>Dashboard Footer</p>
    </div>
</body>

</html>