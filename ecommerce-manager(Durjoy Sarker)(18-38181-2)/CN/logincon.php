<?php
require_once "DB/db.php";

if(isset($_POST["btn_login"])){
			if(authenticateUser($_POST["username"],$_POST["password"]))
			{
				header("Location: dashbord.php");
			}
			else{
				echo "Invalid username or password";
			}
		}

function authenticateUser($username,$password)
		{
			$query="select * from login where username='$username' and password='$password'";
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