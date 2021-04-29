<?php
   require_once "DB/db.php";
   require_once "CN/controlt.php";
   function insertUser($password,$name,$uname,$phone,$email){
	 $query="insert into string values ('$password','$name','$uname','$phone','$email')";
	 execute($query);
   }
?>

<?php session_start();?>
<html>
	<head></head> 
	<body>
		<?php
		    $name="";
			$err_name="";
			$uname="";
			$err_uname="";
			$password="";
			$err_password="";
			$email="";
			$err_email="";
			$phone="";
			$err_phone="";
			$id ="";
			$err_id="";
			$hasError=false;

			
			
		    if($_SERVER['REQUEST_METHOD'] == "POST"){
				insertUser($_POST["pass"],$_POST["name"],$_POST["uname"],$_POST["phone"] ,$_POST["email"]);
			    $s= strpos($_POST["email"],"@");
				if(empty($_POST["uname"])){
					$err_uname="*Username Required";
					$hasError=true;
				}
				else if(strlen($_POST["uname"]) < 3){
					$err_uname="*Username should be at least 2 characters";
					$hasError=true;
				}
				else if(strpos($_POST["uname"]," ")){
					$err_uname="*Space is not allowed";
                    $hasError=true;

				}
				else{
					$uname=htmlspecialchars($_POST["uname"]);
				}
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
				else if(strlen($_POST["pass"]) < 4){
					$err_password="*Password should be at least 4 characters";
					$hasError=true;
				}
				else{
					$password=$_POST["pass"];
				}
				if(empty($_POST["id"])){
					$err_id = "*Id Required";
					$hasError=true;
				}
				else{
					$id=$_POST["id"];
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
				if(empty($_POST["phone"])){
					$err_phone="*Phone number required";
					$hasError=true;
				}
				else if(!is_numeric($_POST["phone"])){
					$err_phone="*Only numerical value is accepted";
					$hasError=true;
				}
				else{
					$phone=htmlspecialchars($_POST["phone"]);
				}
					
			}
		?>
		
	
		<fieldset>
			
			<center><legend><h1> Registration </h1></legend></center>
			<center>
			<?php
                $_SESSION['show'] = "<h3>Welcome</h3>";
                echo $_SESSION['show'];
            ?>
			<form action="" method="post">
				<table>
					
					<tr>
						<td><span> Name</span></td> 
						<td>: <input type="text" onfocusout ="checkUsername(this)" value="<?php echo $name;?>" name="name">
						 <span id="err_username"></span>	
						<span><?php echo $err_name;?></span></td>
						
					</tr>
					
					<tr>
						<td><span> Username</span></td> 
						<td>: <input type="text" value="<?php echo $uname;?>" name="uname">
						<span><?php echo $err_uname;?></span></td>
						
					</tr>
					
				
					<tr>
						<td>Password</td>
						<td>: <input type="password" value="<?php echo $password;?>" name="pass">
						<span><?php echo $err_password;?></span></td>
					</tr>
					
					<tr>
						<td> Confirm Password </td>
						<td>: <input type="password" value="<?php echo $password;?>" name="pass">
						<span><?php echo $err_password;?></span></td>
						
					</tr>
					
					<tr>
						<td> Email</td>
						<td>: <input type="text" value="<?php echo $email;?>" name="email">
						<span><?php echo $err_email;?></span></td>
						
					</tr>
					
					<tr>
						<td> Phone</td>
						<td>: <input type="text" placeholder="code" value="<?php echo $phone;?>" name="phone">
						<span><?php echo $err_phone;?></span></td>
					</tr>
					
					
					<tr>
						<td align="center" colspan="2"><input type="submit" name="submit" value="register"></td>
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
