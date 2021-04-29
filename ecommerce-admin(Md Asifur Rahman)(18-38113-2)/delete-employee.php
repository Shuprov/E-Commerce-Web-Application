<?php
require_once "controllers/employee-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
$id=$_GET["id"];
deleteEmployee($id);
?>
