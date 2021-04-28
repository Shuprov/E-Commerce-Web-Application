<?php
require_once "controllers/customer-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
$id=$_GET["id"];
deleteCustomer($id);
?>
