<?php
   require_once "DB/db.php";
   require_once "CN/control.php";
   function insertUser($id,$username,$password){
	 $query="insert into product values ('$id','$username','$password')";
	 execute($query);//data base er sathe conncet kore then insert kore
   }
?>

<?php session_start();?>
<html>
	<head></head> 
	<body>
		<?php
		    $name="";
			$err_name="";
			$id="";
			$err_id="";
			$bname="";
			$err_bname="";
			
			$hasError=false;
			
		    if($_SERVER['REQUEST_METHOD'] == "POST"){
				insertUser($_POST["id"],$_POST["bname"],$_POST["name"]);
				if(empty($_POST["id"])){
					$err_id="*Product Id Required";
					$hasError=true;
				}
				else if(strlen($_POST["id"]) < 3){
					$err_id="*Product id should be at least 3 characters";
					$hasError=true;
				}
				else if(strpos($_POST["id"]," ")){
					$err_id="*Space is not allowed";
                    $hasError=true;

				}
				else if(!is_numeric($_POST["id"])){
					$err_id="*Only numerical value is accepted";
					$hasError=true;
				}
				else{
					$id=htmlspecialchars($_POST["id"]);
				}
				if(empty($_POST["name"])){
					$err_name="*Name Required";
					$hasError=true;
				}
				else if(strpos($_POST["name"]," ")){
					$err_name="*Space is not allowed";
                    $hasError=true;
				}
				else{
					$name=htmlspecialchars($_POST["name"]);
				}
				if(empty($_POST["bname"])){
					$err_bname="*Name Required";
					$hasError=true;
				}
				else{
					$bname=htmlspecialchars($_POST["bname"]);
				}
			}
		?>
	
		<fieldset>
			
			<center><legend><h1> Add Product </h1></legend></center>
			<center>
			<?php
                $_SESSION['show'] = "<h3>Welcome</h3>";
                echo $_SESSION['show'];
            ?>
			<form action="" method="post">
				<table>
				
                    <tr>
						<td><span> Name </span></td>                                                           
						<td>: <input type="text" onfocusout ="checkUsername(this)" value="<?php echo $name;?>" name="name">  
                        <span id="err_username"></span>						
						<span><?php echo $err_name;?></span></td>
						
					</tr>
					
					<tr>
						<td><span> Brand Name </span></td> 
						<td>: <input type="text" value="<?php echo $bname;?>" name="bname">
						<span><?php echo $err_bname;?></span></td>
					</tr>
					
					<tr>
						<td><span> Id </span></td> 
						<td>: <input type="text" value="<?php echo $id;?>" name="id">
						<span><?php echo $err_id;?></span></td>
					</tr>
					
					
					<tr>
						<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
					</tr>
					

					
				</table>
				 
				
			</form>
			</center>
		</fieldset>
		
	</body>
</html>

<script>
function checkUsername(control){
	var username = control.value;
	var xhttp= new XMLHttpRequest();
	xhttp.onreadystatechange= function(){
		if(this.readyState==4 && this.status == 200){
			var rsp= this.responseText;
			if(rsp == "true"){
				document.getElementById("err_username").innerHTML= "Valid";
				document.getElementById("err_username").style="color:Green"
			}
			else{
				document.getElementById("err_username").innerHTML= "Not Valid";
				document.getElementById("err_username").style="color:red"
			}
		}
	}
	xhttp.open("GET","check-username.php?name="+username,true);
	xhttp.send();
}
</script>
