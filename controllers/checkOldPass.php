<?php
require_once "../models/functions.php";
$request_body = file_get_contents('php://input');
$request_body = json_decode($request_body);

$oldPass = $request_body->userPass;
session_start();
$email = $_SESSION['userEmail'];


if (oldPassMatch($oldPass, $email)) {
    echo "valid";
} else {
    echo "invalid";
}