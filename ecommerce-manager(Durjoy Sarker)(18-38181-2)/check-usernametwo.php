<?php
//require_once "controllers/login-controller.php";
require_once "CN/controlt.php";
$username=$_GET["name"];
$res = checkUsernameValidity($username);
echo $res;

?>