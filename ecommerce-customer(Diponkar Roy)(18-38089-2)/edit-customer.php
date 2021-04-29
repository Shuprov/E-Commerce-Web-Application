<?php
require_once "controller/coustomer-controller.php";
?>
<html>
	<head>

	</head> 
	<body>
	<?php
	        $id="";
	        $err_id="";
		    
			$uname="";
			$err_uname="";
			$password="";
			$err_password="";			
			$email="";
			$err_email="";
			$phone="";
			$err_phone="";
			
			$address="";
			$err_address="";
			$hasError=false;
			
			//if($_SERVER['REQUEST_METHOD'] == "POST"){
				if(isset($_POST["edit-customer"])){
				 
				
				$s= strpos($_POST["email"],"@");
			//$t = strpos($_POST["email"],".",$s+1);
			
			$x= strpos($_POST["password"],"#");
            $y= strpos($_POST["password"],"?");
			
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
				
				if(empty($_POST["password"])){
					$err_password = "*Password Required";
					$hasError=true;
				}
				else if(strlen($_POST["password"]) < 8){
					$err_password="*Password should be at least 8 characters";
					$hasError=true;
				}
				else if(ctype_upper($_POST["password"])==true || ctype_lower($_POST["password"])==true ){ 
					$err_password="*Characters should contain combination of uppercase and lowercase";
					$hasError=true;
				}
				else if($x==null && $y==null){ 
					$err_password="*Characters should contain 1 special character eg.# or ?";
					$hasError=true;
				}
				else{
					$password=$_POST["password"];
				}
				
				if(empty($_POST["phone"])){
					$err_phone="*Phone number required";
					$hasError=true;
				}
				else if(!is_numeric($_POST["phone"])){
					$err_phone="*Only numerical value is accepted";
					$hasError=true;
				}
				else if(strlen($_POST["phone"])!=11){
					$err_phone="*Phone number should be exactly 11 characters";
					$hasError=true;
				}
				
				else{
					$phone=htmlspecialchars($_POST["phone"]);
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
				
				

				if(empty($_POST["address"])){
					$err_address="*address required";
					$hasError=true;
				}
				else{
				$address=htmlspecialchars($_POST["address"]);
				}
				
             if(!$hasError){
			updateCustomer($_POST["id"],$_POST["uname"],$_POST["password"],$_POST["email"],$_POST["phone"],$_POST["address"]);
			}				
				
				
			}
			
			?>
	
		<fieldset>
			
			<center><legend><h1>Edit Customer</h1></legend></center>
			<center>
			<form action="" method="post">
				<table>
					
					<tr>
						<td><span> Id</span></td> 
						<td>: <input type="text" value="<?php echo $id;?>" name="id">
						<span><?php echo $err_id;?></span></td>
						
					</tr>
					
					
				
					
					<tr>
						<td><span> Username</span></td> 
						<td>: <input type="text" value="<?php echo $uname;?>" name="uname">
						<span><?php echo $err_uname;?></span></td>
						
					</tr>
					
					
					
				
					<tr>
						<td>Password</td>
						<td>: <input type="password" value="<?php echo $password;?>" name="password">
						<span><?php echo $err_password;?></span></td>
					</tr>
					
					
					
					<tr>
						<td> Email</td>
						<td>: <input type="text" value="<?php echo $email;?>" name="email">
						<span><?php echo $err_email;?></span></td>
						
					</tr>
					
					<tr>
						<td><span> Phone </span></td>
						<td>: <input type="text" size="" id="phone" name="phone" placeholder="Number" value="<?php echo $phone;?>" 
						<span id="err_phone"><?php echo $err_phone;?></span></td>
						
					</tr>
					
					<tr>
						<td><span> Address </span></td>
						<td>: <input type="text" id="address" name="address" value="<?php echo $address;?>"
						<span id="err_address"><?php echo $err_address;?></span></td>
						
					</tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" name="edit-customer" value="Edit Customer"></td>
					</tr>
					
				</table>
				 
				
			</form>
			</center>
		</fieldset>	
	</body>
</html>