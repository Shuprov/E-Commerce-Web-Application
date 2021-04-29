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
		    $name="";
			$err_name="";
			$pname="";
			$err_pname="";
			$review="";
			$err_review="";
			$hasError=false;
			
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				if(isset($_POST["edit_review"])){
				 
				if(empty($_POST["name"])){
                $err_name="*Name required";
				}
				else{
					$name=htmlspecialchars($_POST["name"]);
				}
				
				if(empty($_POST["pname"])){
                $err_pname="*Product Name required";
				}
				
				else{
					$pname=htmlspecialchars($_POST["pname"]);
				}
								
				if(empty($_POST["review"])){
                $err_review="*Review should not be empty";
				}
				
				else{
					$review=htmlspecialchars($_POST["review"]);
				}
				
				if(!$hasError){
			insertReview($_POST["name"],$_POST["pname"],$_POST["review"]);
			}
			
		 }
			}
		 ?>
	
		<fieldset>
			
			<center><legend><h1>Edit Review</h1></legend></center>
			<center>
			<form action="" method="post">
				<table>
					
					<tr>
						<td><span> Id</span></td> 
						<td>: <input type="text" value="<?php echo $id;?>" name="id">
						<span><?php echo $err_id;?></span></td>
						
					</tr>
					
					
				
					
					<tr>
						<td><span>name</span></td> 
						<td>: <input type="text" value="<?php echo $name;?>" name="name">
						<span><?php echo $err_name;?></span></td>
						
					</tr>
					
					
					
				
					
					<tr>
						<td><span>product name</span></td> 
						<td>: <input type="text" value="<?php echo $pname;?>" name="pname">
						<span><?php echo $err_pname;?></span></td>
						
					</tr>
					
					
					<tr>
                        <td><span><b>Review</b></span></td>
                        <td>: <textarea name="review" id="review" value="<?php echo $review;?>"></textarea><br>
						<span id="err_review"><?php echo $err_review;?></span></td>
						</tr>
						<br>
					<tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" name="edit-review" value="Edit Review"></td>
					</tr>
					
				</table>
				 
				
			</form>
			</center>
		</fieldset>	
	</body>
</html>