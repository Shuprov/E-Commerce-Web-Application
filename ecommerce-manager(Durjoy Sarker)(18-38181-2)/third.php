<?php
   require_once "DB/db.php";
   require_once "CN/control.php";
?>


<html>
	<head></head> 
	<body>
		<?php
			$id="";
			$err_id="";
			$hasError=false;
			
		    if(isset($_POST["Delete"])){
				if(empty($_POST["id"])){
					$err_id="*Id number required";
					$hasError=true;
				}
				else if(!is_numeric($_POST["id"])){
					$err_id="*Only numerical value is accepted";
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
			
			<center><legend><h1> Delete </h1></legend></center>
			<center>
			<form action="" method="post">
				<table>
					
					<tr>
						<td><span> Id </span></td> 
						<td>: <input type="text" value="<?php echo $id;?>" name="id">
						<span><?php echo $err_id;?></span></td>
						
					</tr>
					
					
					<tr>
						<td align="center" colspan="2"><input type="submit" name="Delete" value="Delete"></td>
					</tr>
					
				</table>
				 
				
			</form>
			</center>
		</fieldset>
		
	</body>
</html>