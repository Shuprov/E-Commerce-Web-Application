<?php
   require_once "controller/order-controller.php";
?>


<?php session_start();?>
<html>
	
	<head>
	<title> Place Order</title>
	</head> 
	<body>
		


        <fieldset>
            <legend><h1>Place Order</h1></legend>
			
			<?php 
				$_SESSION['show'] = "<h3>Happy Shoping</h3>"; 
				
				echo $_SESSION['show'];
			
			?>  
			
            <form action="" method="post" onsubmit="return validate()">
                <table>
                   
					<tr>
						<td><span> Name</span></td> 
						<td>: <input type="text" id="name" name="name" value=""/>
						<span style = "color: red;" id="err_name"><?php echo $err_name;?></span></td>
						
					</tr>
                    
                   <tr>
						<td><span> Email </span></td>
						<td>: <input type="text" id="email" name="email" value=""/>
						<span style = "color: red;" id="err_email"><?php echo $err_email;?></span></td>
						
					</tr>
                    <tr>
						<td><span> Phone </span></td>
						<td>: <input type="text" size="" id="phone" name="phone" placeholder="Number" value="" />
						<span style = "color: red;" id="err_phone"><?php echo $err_phone;?></span></td>
						
					</tr>
					
					<tr>
						<td><span> Address </span></td>
						<td>: <input type="text" id="address" name="address" value=""/>
						<span style = "color: red;" id="err_address"><?php echo $err_address;?></span></td>
						
					</tr>
					<tr>
                        <td><span>Payment</span></td>
                        <td>: <input type="radio" id="cash" name="payment" value="cash"/>
						<span>Cash</span>
                        <input type="radio" id="rocket" name="payment" value="Rocket"/>
						<span>Rocket</span>
                       <input type="radio" id="nagad" name="payment" value="Nagad"/>
						<span>Nagad</span><br>
                        <span style = "color: red;" id ="err_payment"><?php echo $err_payment;?></span></td>
                    </tr>
                    
                    
                    <tr>
                        <td><span><b>Other Message</b></span></td>
                        <td>: <textarea type="text" id="message" name= "message" value =""/></textarea><br>
						<span style = "color: red;" id="err_mess"><?php echo $err_mess;?></span></td>
						</tr>
						<br>
			<tr>
				<td><td>
					<input type="submit" name="submit" value="Confirm Order">
					
				</td></td>
			</tr>

                </table>
			</form> 
    </fieldset>   
	
	
		<script>
		function get(id){
			return document.getElementById(id);
		}
		function validate(){
			cleanUp();
			
			var hasError=false;
			if(get("name").value == ""){
				get("err_name").innerHTML="*Name Required";
				
				hasError=true;
				//err_msg += "*Name Required<br>";
			}
					
			
			if(get("email").value == ""){
				get("err_email").innerHTML="*Email Required";
				
				 hasError=true;
				//err_msg += "*Email Required<br>";
			}
			
			
			if(get("phone").value == ""){
				get("err_phone").innerHTML="*Phone Number Required";
				
				hasError=true;
				//err_msg += "*Phone number Required<br>";
			}
			
			if(get("Address").value == ""){
				get("err_address").innerHTML="*Address Required";
				
				asError=true;
				
			}

			if(get("payment").checked == false){
				get("err_payment").innerHTML="*select payment option";
				
				hasError=true;
				
			}
			
			if(get("message").checked == false){
				get("err_mess").innerHTML="*Message Required";
				
				hasError=true;
				
			}

			

			
			
			//alert(err_msg);
			if(!hasError){
				return true;
			}
			return false;
		}
		function cleanUp(){
			get("err_name").innerHTML = "";
			get("err_address").innerHTML = "";
			get("err_email").innerHTML = "";
			get("err_phone").innerHTML = "";
			get("err_pay").innerHTML = "";
			get("err_mess").innerHTML = "";
			
		}
		
		
	</script>
</body>
</html>