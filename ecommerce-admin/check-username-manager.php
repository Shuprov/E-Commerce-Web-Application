<?php
require_once "controllers/manager-controller.php";
$username=$_GET["uname"];
$res = checkUsernameValidity($username);
echo $res;
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}

?>