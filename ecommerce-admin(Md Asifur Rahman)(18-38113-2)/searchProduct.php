<?php
require_once "controllers/product-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
$key=$_GET["key"];
$products = searchProduct($key);
foreach($products as $product)
{
	echo $product["product_name"]."<br>";
}
/*if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
*/
?>