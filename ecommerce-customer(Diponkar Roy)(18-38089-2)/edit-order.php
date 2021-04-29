<?php
require_once "controller/order-controller.php";
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
			$email="";
			$err_email="";
			$phone="";
			$err_phone="";			
			$address="";
			$err_address="";
			$payment="";
			$err_payment="";        
			$Message="";
			$err_mess="";
			$hasError=false;
			
			//if($_SERVER['REQUEST_METHOD'] == "POST"){
				if(isset($_POST["edit-order"])){
				 
				 
				if(empty($_POST["name"])){
                $err_name="Name required";
				}
				else if(strlen($_POST["name"]) < 6){
                $err_name="Name must be more than 6 characters long";
				}
				else if(strpos($_POST["name"]," ")){
                $err_name="Name should not contain whitespace";
				}

				else{   
                $name=htmlspecialchars($_POST["name"]);

				}

				if(empty($_POST["email"])){
					$err_email="*Email address required";
					$hasError=true;
				}
				else if(!strpos($_POST["email"],"@")){
					$err_email="*Characters must contain @";
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

				if(!isset($_POST["payment[]"])){
                $err_payment="Select payment method";
				}
				else{
                $payment=$_POST["payment"];
            }
            

				if(empty($_POST["message"])){
                $err_mess="Message should not be empty";
				}
				else{
                $message=htmlspecialchars($_POST["message"]);
				}
				
				if(!$hasError){
				 insertOrder($_POST["name"],$_POST["email"],$_POST["phone"],$_POST["address"],$_POST["payment"],$_POST["message"]);
				}
           
        
        }
			
			?>
	
		<fieldset>
			
			<center><legend><h1>Edit Order</h1></legend></center>
			<center>
			<form action="" method="post">
				<table>
					
					<tr>
						<td><span> Id</span></td> 
						<td>: <input type="text" value="<?php echo $id;?>" name="id">
						<span><?php echo $err_id;?></span></td>
						
					</tr>
					
					
					<tr>
						<td><span> Name</span></td> 
						<td>: <input type="text" id="name" name="name" value=""/>
						<span id="err_name"><?php echo $err_name;?></span></td>
						
					</tr>
                    
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
						<td><span> Address </span></td>
						<td>: <input type="text" id="address" name="address" value=""/>
						<span id="err_address"><?php echo $err_address;?></span></td>
						
					</tr>
					<tr>
                        <td><span>Payment</span></td>
                        <td>: <input type="radio" id="cash" name="payment" value="<?php echo $cash;?>"
						<span>cash</span>
                        <input type="radio" id="Bcash" name="payment" value="<?php echo $Bcash;?>"
						<span>bcash</span>
                        <input type="radio" id="Rocket" name="paymentt" value="<?php echo $Rocket;?>"
						<span>rocket</span>
                       <input type="radio" id="Nagad" name="payment" value="<?php echo $Nagad;?>"
						<span>nagad</span><br>
                        <span id ="err_payment"><?php echo $err_payment;?></span></td>
                    </tr>
                    
                    
                    <tr>
                        <td><span><b>Other Message</b></span></td>
                        <td>: <textarea type="text" id="message" name= "message" value =""/></textarea><br>
						<span id="err_mess"><?php echo $err_mess;?></span></td>
						</tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" name="edit-order" value="Edit Order"></td>
					</tr>
					
				</table>
				 
				
			</form>
			</center>
		</fieldset>	
	</body>
</html>