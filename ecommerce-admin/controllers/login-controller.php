<?php
require_once "models/db-config.php";


if(isset($_POST["btn_login"])){
	$username=$_POST["username"];
    $password=$_POST["password"];
			if(authenticateUser($username,$password))
			{
				setcookie("username",$username,time()+30000);
				header("Location: dashboard.php");
			}
			else{
				echo "Invalid username or password";
			}
			
		}

function authenticateUser($username,$password)
		{
			$query="select * from admin where username='$username' and password='$password'";
			$result=get($query);
			if(count($result)>0)
			{
				return $result[0];
			}
			else{
				return false;
			}
		}
		
		
?>