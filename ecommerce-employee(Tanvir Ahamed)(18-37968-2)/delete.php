<?php
require_once "Controle/controle.php";
?>

<html>
	<head></head> 
	<body>
		<?php
		    
			$id="";
			$err_id="";
			$hasError=false;
			
					        if($_SERVER['REQUEST_METHOD'] == "POST"){

				

				if(empty($_POST["ID"])){
					$err_id = "*ID required";
					$hasError=true;
				}
				else{
					$id=$_POST["ID"];
				}
                   if(!$hasError){
			deleteCustomer($_POST["ID"]);
            }
				
							}
			
		?>
	
		<fieldset>
			<legend><h1>Delete Employee</h1></legend>
			<form action="" method="post" onsubmit="return validate()">
				<table>
					
					
					
					
					<tr>
						<td>Employee ID</td>

                     <td>: <input type="text" id="id" value="<?php echo $id;?>" name="ID">
                     	<span id="err_id"><?php echo $err_id;?></span></td>

					</tr>
					
					
				
					
					<tr>
						<td align="center" colspan="2"><input type="submit" name="Terminate" value="Terminate"></td>
					</tr>
					
				</table>
				 
				
			</form>
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
	if(get("id").value==""){
		get("err_id").innerHTML="*Id Required";
				get("err_id").style="color:blue";
				hasError=true;
	}
	
	
	if(!hasError){
		return true;
	}
	return false;
}
function cleanUp(){
			get("err_id").innerHTML="";

}
</script>