<?php
include "../models/functions.php";
session_start();
$currentPassword = $_POST['cpass'];
$newPassword = $_POST['npass'];
$retypePassword = $_POST['rpass'];
if ($newPassword !== $retypePassword) {
    echo "New password and Retype password do not match.";
    exit;
}
$email = $_SESSION['userEmail'];

$userInfo = getUser($email);

$name = $userInfo['name'];
$contact_number = $userInfo['contact_number'];
$gender = $userInfo['gender'];
updateDatabase($newPassword, $name, $contact_number, $gender, $email);

$role = $userInfo['role'];

if ($role === "manager") {
    header("Location: ../views/managerProfile.php");
} else {
    header("Location: ../views/profile.php");
}


?>