<?php
   require_once "controller/review-controller.php";
?>
<?php session_start();?>

<html>
	
	<head>
	<title> Product Review</title>
	</head> 
	<body>
	
	
	 <fieldset>
            <center><legend><h1>Product Review</h1></legend><center>
			<center>
			<?php 
				$_SESSION['show'] = "<h3>Thank you for your valuable Review</h3>"; 
				
				echo $_SESSION['show'];
			
			?> 
            <form action="" method="post" onsubmit="return validate()">
                <table>
				
					<tr>
						<td><span> Name</span></td> 
						<td>: <input type="text" id="name" name="name" value=""/>
						<span id="err_name"><?php echo $err_name;?></span></td>
						
					</tr>
					
                   <tr>
						<td><span> Product Name</span></td> 
						<td>: <input type="text" id="productname" name="pname" value=""/>
						<span id="err_pname"><?php echo $err_pname;?></span></td>
						
					</tr>
					
					<tr>
                        <td><span><b>Review</b></span></td>
                        <td>: <textarea name="review" id="review" value=""/></textarea><br>
						<span id="err_review"><?php echo $err_review;?></span></td>
						</tr>
						<br>
					<tr>
						<td><td><input type="submit" name="Submit" value="Submit"></td></td>
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
			
			if(get("productname").value == ""){
				get("err_pname").innerHTML="*Product Name Required";
				get("err_pname").style.color="red";
				hasError=true;
				//err_msg += "*Name Required<br>";
			}
			
			
			if(get("review").value == ""){
				get("err_review").innerHTML="*Review Required";
				get("err_review").style.color="red";
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
			get("err_pname").innerHTML = "";
			get("err_review").innerHTML = "";
			
			
		}
		
		
	</script>
