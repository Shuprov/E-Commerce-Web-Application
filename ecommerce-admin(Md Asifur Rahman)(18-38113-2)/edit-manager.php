<?php
require_once "controllers/manager-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
$id=$_GET["id"];
$manager=getManager($id);
?>
<html>
	<head>

	</head> 
	<body>
		<?php
		    $id="";
			$err_id="";
		    $name="";
			$err_name="";
			$uname="";
			$err_uname="";
			$password="";
			$err_password="";
			$email="";
			$err_email="";
			$hasError=false;

			
			
		    //if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_POST["edit-manager"])){

				
				$s= strpos($_POST["email"],"@");
			//$t = strpos($_POST["email"],".",$s+1);
			
			$x= strpos($_POST["pass"],"#");
            $y= strpos($_POST["pass"],"?");
			
			if(empty($_POST["id"])){
					$err_id="*Id Required";
					$hasError=true;
				}
				else if(!is_numeric($_POST["id"])){
					$err_id="*Only numeric value is accepted";
					$hasError=true;
				}
				else{
					$id=htmlspecialchars($_POST["id"]);
				}
			
				if(empty($_POST["uname"])){
					$err_uname="*Username Required";
					$hasError=true;
				}
				else if(strlen($_POST["uname"]) < 6){
					$err_uname="*Username should be at least 6 characters";
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
				else if(strlen($_POST["name"]) < 3){
					$err_name="*Name should be at least 3 characters";
					$hasError=true;
				}
				else if(is_numeric($_POST["name"])){
					$err_name="*Only string value is accepted";
					$hasError=true;
				}
				else{
					$name=htmlspecialchars($_POST["name"]);
				}
				if(empty($_POST["pass"])){
					$err_password = "*Password Required";
					$hasError=true;
				}
				else if(strlen($_POST["pass"]) < 8){
					$err_password="*Password should be at least 8 characters";
					$hasError=true;
				}
				else if(ctype_upper($_POST["pass"])==true || ctype_lower($_POST["pass"])==true ){ 
					$err_password="*Characters should contain combination of uppercase and lowercase";
					$hasError=true;
				}
				else if($x==null && $y==null){ 
					$err_password="*Characters should contain 1 special character eg.# or ?";
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
			updateManager($_POST["id"],$_POST["name"],$_POST["uname"],$_POST["pass"],$_POST["email"]);
            }
			
			} 
			
		?> 
	
		<fieldset>
			
			<center><legend><h1>Edit Manager</h1></legend></center>
			<center>
			<form action="" method="post" onsubmit="return validate()">
				<table>
					
					
					<tr>
						<td><span> Id</span></td> 
						<td>: <input type="text" id="id" value="<?php echo $manager["id"];?>" name="id">
						<!--<span id="err_id"></span>-->
						<span id="err_id"><?php echo $err_id;?></span></td>
						
					</tr>
					
					<tr>
						<td><span> Name</span></td> 
						<td>: <input type="text" id="name" value="<?php echo $manager["name"];?>" name="name"> 
						<!--<span id="err_name"></span>-->
						<span id="err_name"><?php echo $err_name;?></span></td>
						
					</tr>
					
					<tr>
						<td><span> Username</span></td> 
						<td>: <input type="text" onfocusout="checkUsername(this)" id="uname" value="<?php echo $manager["username"];?>" name="uname">
						<!--<span id="err_username"></span>
						<span id="err_uname"></span>-->
						<span id="err_uname"><?php echo $err_uname;?></span></td>
						
					</tr>
					
					
					
				
					<tr>
						<td>Password</td>
						<td>: <input type="password" id="pass" value="<?php echo $manager["password"];?>" name="pass"> 
						<!--<span id="err_pass"></span>-->
						<span id="err_pass"><?php echo $err_password;?></span></td>
					</tr>
					
					
					
					<tr>
						<td> Email</td>
						<td>: <input type="text" id="email" value="<?php echo $manager["email"];?>" name="email"> 
						<!--<span id="err_email"></span>-->
						<span id="err_email"><?php echo $err_email;?></span></td>
						
					</tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" name="edit-manager" value="Edit Manager"></td>
					</tr>
					
				</table>
				 
				
			</form>
			</center>
		</fieldset>	
	</body>
</html>

<script>
function get(id){
	return document.getElementById(id);
}
var userExist=false;

function validate(){
	cleanUp();
	var hasError=false;
	if(get("id").value==""){
		get("err_id").innerHTML="*Id Required";
				get("err_id").style="color:blue";
				hasError=true;
	}
	if(get("name").value==""){
		get("err_name").innerHTML="*Name Required";
				get("err_name").style="color:blue";
				hasError=true;
	}
	if(get("uname").value==""){
				get("err_uname").innerHTML="*Username Required";
								get("err_uname").style="color:blue";
				hasError=true;
	}
	if(get("pass").value==""){
				get("err_pass").innerHTML="*Password Required";
				get("err_pass").style="color:blue";
				hasError=true;
	}
	if(userExist){
		hasError=true;
		get("err_uname").innerHTML="*Username Exists";
		get("err_uname").style="color:red";
	}
	if(get("email").value==""){
				get("err_email").innerHTML="*Email Required";
				get("err_email").style="color:blue";
				hasError=true;
	}
	if(!hasError){
		return true;
	}
	return false;
}
function cleanUp(){
			get("err_id").innerHTML="";
			get("err_name").innerHTML="";
			get("err_uname").innerHTML="";
			get("err_pass").innerHTML="";
			get("err_email").innerHTML="";

}


//AJAX
function checkUsername(control){
	var username= control.value;
	//ajax
	var xhttp= new XMLHttpRequest();
	xhttp.onreadystatechange= function(){
		if(this.readyState==4 && this.status== 200){
			//when server respond
			var rsp= this.responseText;
			if(rsp== "true"){
								userExist=false;
				document.getElementById("err_uname").innerHTML= "*Valid";
				document.getElementById("err_uname").style.color="green";
			}
			else{
				userExist=true;
				document.getElementById("err_uname").innerHTML= "*Not Valid";
				document.getElementById("err_uname").style.color="red";
			}
		}
	}
	xhttp.open("GET","check-username-manager.php?uname="+username,true);
	xhttp.send();
}
</script>