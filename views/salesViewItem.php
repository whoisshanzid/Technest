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
$salesmanId = $userInfo['id']; // Assuming you have the ID of the salesman
$contact_number = $userInfo['contact_number'];
$gender = $userInfo['gender'];

// Handle search
$searchTerm = '';
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search_term'];
    $products = searchProducts($searchTerm);
} else {
    $products = getAllProducts();
}

// Handle adding item
if (isset($_POST['add_item'])) {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    addItem($salesmanId, $productName, $productPrice); // Function to add item to added_items
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sales</title>
    <link rel="stylesheet" href="css/salesViewItemCss.css">
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
            <h2>Available Items</h2>
            <form method="POST" action="">
                <input type="text" name="search_term" placeholder="Search for items..."
                    value="<?php echo htmlspecialchars($searchTerm); ?>">
                <input type="submit" name="search" value="Search">
            </form>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php if (count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td><?php echo number_format($product['price'], 2); ?></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                                    <input type="submit" name="add_item" value="Add Item">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No items found.</td>
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