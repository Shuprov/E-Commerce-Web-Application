<?php
require_once "controllers/manager-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}


?>
<html>
	<head>
	</head> 
	<body>

	
		<fieldset>
			
			<center><legend><h1>Add Manager</h1></legend></center>
			<center>
			<form action="" method="post" onsubmit="return validate()">
				<table>
					
					
					
					
					<tr>
						<td><span> Name</span></td> 
						<td>: <input type="text" id="name" value="<?php echo $name;?>" name="name">
						<!--<span id="err_name"></span>-->
						<span id="err_name"><?php echo $err_name;?></span></td>
						
					</tr>
					
					
					<tr>
						<td><span> Username</span></td> 
						<td>: <input type="text" id="uname" value="<?php echo $uname;?>" name="uname" onfocusout="checkUsername(this)">
						<!--<span id="err_username"></span>
                        <span id="err_uname"></span> -->
						<span id="err_uname"><?php echo $err_uname;?></span></td>
						
					</tr>
					
										

					
					
					
				
					<tr>
						<td>Password</td>
						<td>: <input type="password" id="pass" value="<?php echo $password;?>" name="pass">
						<!--<span id="err_pass"></span> -->
						<span id="err_pass"><?php echo $err_password;?></span></td>
					</tr>
					
										

					
					
					
					<tr>
						<td> Email</td>
						<td>: <input type="text" id="email" value="<?php echo $email;?>" name="email">
						<!--<span id="err_email"></span> -->
						<span id="err_email"><?php echo $err_email;?></span></td>
						
					</tr>
					
										

					<tr>
						<td align="center" colspan="2"><input type="submit" name="add-manager" value="Add Manager"></td>
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

	if(get("name").value==""){
		get("err_name").innerHTML="*Name Required";
				get("err_name").style="color:blue";
				hasError=true;
	}
	else if(get("name").value.length<6){
		get("err_name").innerHTML="*Name must be 6 characters";
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
	
	else if(get("pass").value.length<8){
		get("err_pass").innerHTML="*Password must be 8 characters";
				get("err_pass").style="color:blue";
				hasError=true;
	}
	//debugger;
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
			get("err_name").innerHTML="";
			get("err_uname").innerHTML="";
			get("err_pass").innerHTML="";
			get("err_email").innerHTML="";

}


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
