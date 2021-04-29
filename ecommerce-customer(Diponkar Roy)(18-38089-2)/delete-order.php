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
			$hasError=false;

			
			
			if(isset($_POST["delete-order"])){

				
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
			deleteOrder($_POST["id"]);
            }
			
			} 
			
		?> 
	
		<fieldset>
			
			<center><legend><h1>Delete Order</h1></legend></center>
			<center>
			<form action="" method="post">
				<table>
					
					
					<tr>
						<td><span> Id</span></td> 
						<td>: <input type="text" value="<?php echo $id;?>" name="id">
						<span><?php echo $err_id;?></span></td>
						
					</tr>
					
					
					<tr>
						<td align="center" colspan="2"><input type="submit" name="delete-order" value="Delete Order"></td>
					</tr>
					
				</table>
				 
				
			</form>
			</center>
		</fieldset>	
	</body>
</html>