<?php
require_once "Controle/controle.php";
$username=$_GET["name"];
$res = checkUsernameValidity($username);
echo $res;

?>