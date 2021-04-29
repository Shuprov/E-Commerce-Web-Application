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
			$hasError=false;

			
			
			if(isset($_POST["delete-customer"])){

				
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
			
				
					
				if(!$hasError){
			deleteCustomer($_POST["id"]);
            }
			
			} 
			
		?> 
	
		<fieldset>
			
			<center><legend><h1>Delete Customer</h1></legend></center>
			<center>
			<form action="" method="post">
				<table>
					
					
					<tr>
						<td><span> Id</span></td> 
						<td>: <input type="text" value="<?php echo $id;?>" name="id">
						<span><?php echo $err_id;?></span></td>
						
					</tr>
					
					
					<tr>
						<td align="center" colspan="2"><input type="submit" name="delete-customer" value="Delete Customer"></td>
					</tr>
					
				</table>
				 
				
			</form>
			</center>
		</fieldset>	
	</body>
</html>