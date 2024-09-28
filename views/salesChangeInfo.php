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
    <link rel="stylesheet" href="css/changeInfoCss.css">
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
        <h2>Edit profile</h2>
            <form action="../controllers/changeInfoAction.php" method="post" onsubmit="return updateInfo(this)">
                <div class="form-group">
                    <label for="fname">Full name</label>
                    <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($name); ?>">
                    <span id="rerr1" class="error"></span>
                </div>
                <div class="form-group">
                    <label for="cnum">Contact number</label>
                    <input type="text" name="cnum" id="cnum" value="<?php echo htmlspecialchars($contact_number); ?>">
                    <span id="rerr2" class="error"></span>
                </div>
                <div class="form-group">
                    <p>Please select your gender</p>
                    <input type="radio" id="rmale" name="gender" value="Male" <?php echo ($gender == 'Male') ? 'checked' : ''; ?>>
                    <label for="male">Male</label><br>
                    <input type="radio" id="rfemale" name="gender" value="Female" <?php echo ($gender == 'Female') ? 'checked' : ''; ?>>
                    <label for="female">Female</label>
                    <span id="rerr4" class="error"></span>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Dashboard Footer</p>
    </div>
</body>

</html>