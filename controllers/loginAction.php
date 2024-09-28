<?php
session_start();
require '../models/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);
    $conn = getConnection();
    $query = "SELECT * FROM userinfo WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        if ($remember_me) {
            setcookie('email', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
        } else {
            setcookie('email', '', time() - 3600, "/");
        }

        if ($user['role'] == 'manager') {
            $_SESSION['userEmail'] = $email;
            header('Location: ../views/managerProfile.php');
        } else {
            $_SESSION['userEmail'] = $email;
            header('Location: ../views/profile.php');
        }
    } else {
        header('Location: ../views/login.php?login=failed');
    }
}
?>
