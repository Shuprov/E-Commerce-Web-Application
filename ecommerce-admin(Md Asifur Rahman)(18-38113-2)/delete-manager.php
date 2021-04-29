<?php
require_once "controllers/manager-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
$id=$_GET["id"];
deleteManager($id);
?>
