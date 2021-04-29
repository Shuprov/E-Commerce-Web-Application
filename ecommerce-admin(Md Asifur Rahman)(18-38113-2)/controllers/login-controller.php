<?php
require_once "models/db-config.php";


if(isset($_POST["btn_login"])){
	$username=$_POST["username"];
    $password=$_POST["password"];
			if(authenticateAdmin($username,$password))
			{
				setcookie("username",$username,time()+30000);
				header("Location: dashboard.php");
			}
			else if(authenticateManager($username,$password))
			{
				setcookie("username",$username,time()+30000);
				header("Location: ../ecommerce-manager(Durjoy Sarker)(18-38181-2)/dashbord.php");
			}
			else if(authenticateEmployee($username,$password))
			{
				setcookie("username",$username,time()+30000);
				header("Location: ../ecommerce-employee(Tanvir Ahamed)(18-37968-2)/dashboard.php");
			}
			else if(authenticateCustomer($username,$password))
			{
				setcookie("username",$username,time()+30000);
				header("Location: ../ecommerce-customer(Diponkar Roy)(18-38089-2)/dashboard.php");
			}
			else{
				echo "Invalid username or password";
			}
			
		}

function authenticateAdmin($username,$password)
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
		
		function authenticateManager($username,$password)
		{
			$query="select * from manager_user where username='$username' and password='$password'";
			$result=get($query);
			if(count($result)>0)
			{
				return $result[0];
			}
			else{
				return false;
			}
		}
		
		function authenticateEmployee($username,$password)
		{
			$query="select * from employee_user where username='$username' and password='$password'";
			$result=get($query);
			if(count($result)>0)
			{
				return $result[0];
			}
			else{
				return false;
			}
		}
		
		function authenticateCustomer($username,$password)
		{
			$query="select * from  customer_user where username='$username' and password='$password'";
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