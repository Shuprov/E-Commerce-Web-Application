<?php
require_once "models/db-config.php";

if(isset($_POST["btn_login"])){
			if(authenticateUser($_POST["username"],$_POST["password"]))
			{
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