

<?php session_start();?>
<html>
	<head>
	<title> Nagad Payment </title>

	</head> 
	<body>
		<?php
		   $nagad="";
			$err_nnum="";			
			$password="";
			$err_password="";
			$amount="";
			$err_amount="";
			
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				
				
				if(empty($_POST["nagad"])){
					$err_nnum="*Nagad number required";
					$hasError=true;
				}
				else if(!is_numeric($_POST["nagad"])){
					$err_nnum="*Only numerical value is accepted";
					$hasError=true;
				}
				else if(strlen($_POST["nagad"])!=11){
					$err_nnum="*Nagad number should be exactly 11 characters";
					$hasError=true;
				}
				
				else{
					$nagad=htmlspecialchars($_POST["nagad"]);
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
			
			<center><legend><h1>Nagad Payment</h1></legend></center>
			<center>
			<?php 
				$_SESSION['show'] = "<h3>Pay Via Nagad</h3>"; 
				
				echo $_SESSION['show'];
			
			?> 
			<form action="" method="post">
				<table>
					
					
					
					
					<tr>
						<td><span> Nagad Number </span></td>
						<td>: <input type="text" size="" id="nnum" name="nagad" placeholder="Number" value="<?php echo $nagad;?>" 
						<span id="err_nnum"><?php echo $err_nnum;?></span></td>
						
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
			
			if(get("nagad").value == ""){
				get("err_nnum").innerHTML="*Nagad Number Required";
				get("err_nnum").style.color="red";
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
			get("err_bnum").innerHTML = "";
			get("err_password").innerHTML = "";
			get("err_amount").innerHTML = "";
			
		}
		
		
	</script>
		
	</body>
</html>
					