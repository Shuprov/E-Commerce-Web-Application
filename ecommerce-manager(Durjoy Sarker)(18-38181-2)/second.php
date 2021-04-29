<?php
   require_once "DB/db.php";
   require_once "CN/controlt.php";
?>

<html>
	<head></head> 
	<body>
		<?php
		    $name="";
			$err_name="";
			$password="";
			$err_password="";
			$err_email="";
			$email="";
			$hasError=false;
			
		    if(isset($_POST["submit"])){
				if(empty($_POST["name"])){
					$err_name="*Name Required";
					$hasError=true;
				}
				else{
					$name=htmlspecialchars($_POST["name"]);
				}
				if(empty($_POST["pass"])){
					$err_password = "*Password Required";
					$hasError=true;
				}
				else if(strlen($_POST["pass"]) < 2){
					$err_password="*Forget Password should be at least 2 characters";
					$hasError=true;
				}
				else{
					$password=$_POST["pass"];
				}
				if(empty($_POST["email"])){
					$err_email="*Email address required";
					$hasError=true;
				}
				else if(!strpos($_POST["email"],"@")){
					$err_email="*Characters must contain @";
                    $hasError=true;

				}
				else if(!strpos($_POST["email"],".",$s+1)){
					$err_email="*Characters must contain atleast 1 dot after @";
                    $hasError=true;

				}
				else{
					$email=htmlspecialchars($_POST["email"]);
				}
				if(!$hasError){
			       updateCustomer($_POST["pass"],$_POST["name"] ,$_POST["email"]);
                }
			}
			
		?>
	
	
		<fieldset>
			
			<center><legend><h1> Edit </h1></legend></center>
			<center>
			<form action="" method="post">
				<table>
				
				    <tr>
						<td>Password</td>
						<td>: <input type="password" value="<?php echo $password;?>" name="pass">
						<span><?php echo $err_password;?></span></td>
					</tr>
					
					<tr>
						<td><span> Name</span></td> 
						<td>: <input type="text" onfocusout ="checkUsername(this)" value="<?php echo $name;?>" name="name">
						<span id="err_username"></span>
						<span><?php echo $err_name;?></span></td>
						
					</tr>
					
					<tr>
						<td> Email</td>
						<td>: <input type="text" value="<?php echo $email;?>" name="email">
						<span><?php echo $err_email;?></span></td>
						
					</tr>
				
				
					
					<tr>
						<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
					</tr>
					
				</table>
				
			</form>
			</center>
		</fieldset>
		
	</body>
</html>
<script>
function checkUsername(controlt){
	var username= controlt.value;
	var xhttp= new XMLHttpRequest();
	xhttp.onreadystatechange= function(){
		if(this.readyState == 4 && this.status == 200){
			var rsp= this.responseText;
			if(rsp == "true"){
				document.getElementById("err_username").innerHTML= "Valid";
				document.getElementById("err_username").style="color:Green";
			}
			else{
				document.getElementById("err_username").innerHTML= "Not Valid";
				document.getElementById("err_username").style="color:red";
			}
		}
	}
	xhttp.open("GET","check-usernametwo.php?name="+username,true);
	xhttp.send();
}
</script>
