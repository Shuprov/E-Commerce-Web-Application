<?php
require_once "controllers/product-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
$id=$_GET["id"];
deleteProduct($id);
?>
