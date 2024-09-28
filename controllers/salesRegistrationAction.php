<?php
require_once "../models/functions.php";
$fname = $_POST['fname'];
$cnum = $_POST['cnum'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
if (salesInserted($fname, $cnum, $gender, $email, $password)) {
    header("Location: ../views/addSalesman.php");
}
?>