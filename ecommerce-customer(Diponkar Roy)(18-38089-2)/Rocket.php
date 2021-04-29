
<?php session_start();?>
<html>
	<head>
	<title> Rocket Payment </title>

	</head> 
	<body>
		<?php
		   $rocket="";
			$err_rnum="";			
			$password="";
			$err_password="";
			$amount="";
			$err_amount="";
			
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				
				
				if(empty($_POST["rocket"])){
					$err_rnum="*Rocket number required";
					$hasError=true;
				}
				else if(!is_numeric($_POST["rocket"])){
					$err_rnum="*Only numerical value is accepted";
					$hasError=true;
				}
				else if(strlen($_POST["rocket"])!=12){
					$err_rnum="*Rocket number should be exactly 11 characters";
					$hasError=true;
				}
				
				else{
					$rocket=htmlspecialchars($_POST["rocket"]);
				}
				
				if(empty($_POST["password"])){
					$err_password = "*Password Required";
					$hasError=true;
				}
				
				else if(!is_numeric($_POST["password"])){
					$err_password="*Only numerical value is accepted";
					$hasError=true;
				}
				
				else if(strlen($_POST["password"]) < 4){
					$err_password="*Password should be at least 8 characters";
					$hasError=true;
				}
				else{
					$password=$_POST["password"];
				}
				
				
				if(empty($_POST["amount"])){
					$err_amount="*Amount required";
					$hasError=true;
				}
				else if(!is_numeric($_POST["amount"])){
					$err_amount="*Only numerical value is accepted";
					$hasError=true;
				}
				else{
					$amount=$_POST["amount"];
				}
				
				
			}
			
		?>
	
		<fieldset>
			
			<center><legend><h1>Rocket Payment</h1></legend></center>
			<center>
			
			<?php 
				$_SESSION['show'] = "<h3>Pay Via Rocket</h3>"; 
				
				echo $_SESSION['show'];
			
			?> 
			<form action="" method="post">
				<table>
					
					
					
					
					<tr>
						<td><span> Rocket Number </span></td>
						<td>: <input type="text" size="" id="rnum" name="rocket" placeholder="Number" value="<?php echo $rocket;?>" 
						<span id="err_rnum"><?php echo $err_rnum;?></span></td>
						
					</tr>
					
															
					<tr>
						<td><span> Password </span></td>
						<td>: <input type="password" id="password" name="password" value="<?php echo $password;?>" 
						<span id="err_password"><?php echo $err_password;?></span></td>
					</tr>
					
					<tr>
						<td><span> Amount </span></td>
						<td>: <input type="text" size="" id="amount" name="amount" placeholder="amount" value="<?php echo $amount;?>" 
						<span id="err_amount"><?php echo $err_amount;?></span></td>
						
					</tr>
					
						<tr>
						<td align="center" colspan="2"><input type="submit" name="submit" value="Payment"></td>
					</tr>
					
				</table>
					
					
					
				 
				
			</form>
			</center>
		</fieldset>		


		<script>
		function get(id){
			return document.getElementById(id);
		}
		function validate(){
			cleanUp();
			
			var hasError=false;
			
			if(get("rocket").value == ""){
				get("err_rnum").innerHTML="*rocket Number Required";
				get("err_rnum").style.color="red";
				var hasError=true;
				//err_msg += "*Phone number Required<br>";
			}
			
			
			if(get("password").value == ""){
				get("err_password").innerHTML="*Password Required";
				get("err_password").style.color="red";
				var hasError=true;
				//err_msg += "*Password Required<br>";
			}
			
			
			if(get("amount").value == ""){
				get("err_amount").innerHTML="*amount Required";
				get("err_amount").style.color="red";
				var hasError=true;
				//err_msg += "*Phone number Required<br>";
			}
			
			//alert(err_msg);
			if(!hasError){
				return true;
			}
			return false;
		}
		
		function cleanUp(){
			get("err_rnum").innerHTML = "";
			get("err_password").innerHTML = "";
			get("err_amount").innerHTML = "";
			
		}
		
		
	</script>
		
	</body>
</html>
					