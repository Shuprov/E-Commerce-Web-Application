<?php
require_once "controller/coustomer-controller.php";
$username=$_GET["uname"];
$res = checkUsernameValidity($username);
echo $res;

?>