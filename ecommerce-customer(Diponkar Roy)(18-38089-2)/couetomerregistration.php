<?php
   require_once "controller/coustomer-controller.php"; 
?>


<html>
	<head>
	<title> Panda Commerce Web Application </title>

	</head> 
	<body>
		
		
	
		<fieldset>
			
			<center><legend><h1>Coustomer Registration</h1></legend></center>
			<center>
			
			
			<form action="" method="post" onsubmit="return validate()">
				<table>
					
					
					
					
					<tr>
						<td><span> Name</span></td> 
						<td>: <input type="text" id="name" name="name" value=""/>
						<span id="err_name"><?php echo $err_name;?></span></td>
						
					</tr>
					
					<tr>
						<td><span> Username </span></td> 
						<td>: <input type="text" id="username" onfocusout="checkUsername(this)" name="uname" value=""/> 
						<span id="err_uname"><?php echo $err_uname;?></span></td>
						
					</tr>
					
					
					
				
					<tr>
						<td><span> Password </span></td>
						<td>: <input type="password" id="password" name="password" value=""/>
						<span id="err_password"><?php echo $err_password;?></span></td>
					</tr>
					
					<!--<tr>
						<td><span> Confirm Password </span></td>
						<td>: <input type="password" id="password" name="password" value="<?php echo $password;?>" 
						<span id="err_password"><?php echo $err_password;?></span></td>
					</tr> -->
					
					<tr>
						<td><span> Email </span></td>
						<td>: <input type="text" id="email" name="email" value=""/>
						<span id="err_email"><?php echo $err_email;?></span></td>
						
					</tr>
					
					<tr>
						<td><span> Phone </span></td>
						<td>: <input type="text" size="" id="phone" name="phone" placeholder="Number" value="" />
						<span id="err_phone"><?php echo $err_phone;?></span></td>
						
					</tr>
					 
					<tr>
						<td><span> Gender </span></td>
						<td>: <input type="radio" id="Male" name="gender"  value="Male"/> 
						<span>Male</span>
						<input type="radio" id="Female" name="gender"  value="Female"/>
						<span>Female</span><br><span id="err_gender"><?php echo $err_gender;?></span></td>
						
					</tr>



					<tr>
						<td><span> Address </span></td>
						<td>: <input type="text" id="address" name="address" value=""/>
						<span id="err_address"><?php echo $err_address;?></span></td>
						
					</tr>

					
					
					
					<tr>
						<td align="center" colspan="2"><input type="submit" name="add-customer" value="Register"></td>
						
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
		
		function validate(){
			cleanUp();
			
			var hasError=false;
			if(get("name").value == ""){
				get("err_name").innerHTML="*Name Required";
				get("err_name").style.color="red";
			    hasError=true;
				//err_msg += "*Name Required<br>";
			}
			
			if(get("username").value == ""){
				get("err_uname").innerHTML="*Username Required";
				get("err_uname").style.color="red";
				 hasError=true;
				//err_msg += "*Userame Required<br>";
			}
			
			if(get("password").value == ""){
				get("err_password").innerHTML="*Password Required";
				get("err_password").style.color="red";
			 hasError=true;
				//err_msg += "*Password Required<br>";
			}
				
			
			if(get("email").value == ""){
				get("err_email").innerHTML="*Email Required";
				get("err_email").style.color="red";
				 hasError=true;
				//err_msg += "*Email Required<br>";
			}
			
			
			if(get("phone").value == ""){
				get("err_phone").innerHTML="*Phone Number Required";
				get("err_phone").style.color="red";
			 hasError=true;
				//err_msg += "*Phone number Required<br>";
			}

			if(get("Male").checked == false){
				get("err_gender").innerHTML="*Gender Required";
				get("err_gender").style.color="red";
			 hasError=true;
				//err_msg += "*Phone number Required<br>";
			}

			if(get("address").value == ""){
				get("err_address").innerHTML="*Address Required";
				get("err_address").style.color="red";
			 hasError=true;
				//err_msg += "*Phone number Required<br>";
			}

			
			
			//alert(err_msg);
			if(!hasError){
				return true;
			}
			return false;
		}
		function cleanUp(){
			get("err_name").innerHTML = "";
			get("err_uname").innerHTML = "";
			get("err_password").innerHTML = "";
			get("err_email").innerHTML = "";
			get("err_phone").innerHTML = "";
			get("err_gender").innerHTML = "";
			get("err_address").innerHTML = "";
			
		}
		
		
	</script>
	
	
	<script>
function checkUsername(coustomer-controller){
	var username= coustomer-controller.value;
	//ajax
	var xhttp= new XMLHttpRequest();
	xhttp.onreadystatechange= function(){
		if(this.readyState==4 && this.status== 200){
			//when server respond
			var rsp= this.responseText;
			if(rsp== "true"){
				document.getElementById("err_username").innerHTML= "*Valid";
			}
			else{
				document.getElementById("err_username").innerHTML= "*Not Valid";
			}
		}
	}
	xhttp.open("GET","check-username-customer.php?uname="+username,true);
	xhttp.send();
}
</script>
	
	