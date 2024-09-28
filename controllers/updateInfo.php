<?php
require_once "../models/functions.php";
$request_body = file_get_contents('php://input');
$request_body = json_decode($request_body);

$fname = $request_body->user_full_name;
$cnum = $request_body->user_cnum;


print_r($fname);