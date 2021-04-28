<?php 
require_once "controllers/login-controller.php";
		    /*if($_SERVER["REQUEST_METHOD"] == "POST"){
				$username=$_POST["username"];
				$password=$_POST["password"];
				if($username=="Shuprov"&& $password=="123456")
				{
					//session_start();
					setcookie("username",$username,time()+60);
					//$_SESSION["username"]=$username;
					header("Location:dashboard.php");
				}
			}*/

?>

<!--login starts -->

<html> 
<head> </head>
<body>
<form action="" method="post">
	<h1>Admin Login</h1>
<input type="text" name="username" onfocusout="checkUsername(this)" placeholder="username">
<span id="err_username"></span> <br>
<input type="password" name="password" placeholder="password"><br>
<input type="submit" name="btn_login" value="login"> 

</form>
</body>
</html>

<!--login ends -->

