<?php
require_once "../models/functions.php";
$request_body = file_get_contents('php://input');
$request_body = json_decode($request_body);

$email = $request_body->userEmail;

if (!emailExsist($email)) {
    echo "valid";
} else {
    echo "invalid";
}