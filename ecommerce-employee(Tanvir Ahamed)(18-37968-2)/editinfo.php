<?php
require_once "Controle/controle.php";
?>

<html>
	<head></head> 
	<body>
		<?php
            $id="";
			$err_id="";
		    $name="";
			$err_name="";
			
           $email="";
			$err_email="";
			$hasError=false;
			
			 //if(isset($_POST["submit"])){
				if($_SERVER['REQUEST_METHOD'] == "POST"){

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
			
				if(empty($_POST["name"])){
					$err_name="*Name Required";
					$hasError=true;
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
				else if(!strpos($_POST["email"],".",$s+1)){
					$err_email="*Characters must contain atleast 1 dot after @";
                    $hasError=true;

				}
				else{
					$email=htmlspecialchars($_POST["email"]);
				}
				 if(!$hasError){
                   updateCustomer($_POST["id"],$_POST["name"],$_POST["email"]);
                }

				
			}
			
		?>
	
		<fieldset>
			<legend><h1>Edit Information</h1></legend>
			<form action="" method="post" onsubmit="return validate()">
				<table>

					<tr>
						<td>ID</td>
						<td>: <input type="text" id="id" value="<?php echo $id;?>" name="id">
						<span id="err_id"><?php echo $err_id;?></span></td>
					</tr>



					<tr>
						<td><span>Emp Name</span></td> 
						<td>: <input type="name" id="name" value="<?php echo $name;?>" name="name">
							
						<span id="err_name"><?php echo $err_name;?></span></td>
						
					</tr>
					

					<tr>
						<td> Email</td>
						<td>: <input type="text" id="email" value="<?php echo $email;?>" name="email">
						<span id="err_email"><?php echo $err_email;?></span></td>
						
					</tr>
					
					
					
					
		

					
					
					<tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" name="submit" value="register"></td>
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
	
	if(get("name").value==""){
		get("err_name").innerHTML="*Name Required";
				get("err_name").style="color:blue";
				hasError=true;
	}
	else if(get("name").value.length<6){
		get("err_name").innerHTML="*Name must be 6 characters";
				get("err_name").style="color:blue";
				hasError=true;
	}	
	
	if(get("email").value==""){
				get("err_email").innerHTML="*Email Required";
				get("err_email").style="color:blue";
				hasError=true;
	}
	if(!hasError){
		return true;
	}
	return false;
}

function cleanUp(){			
get("err_id").innerHTML="";
get("err_name").innerHTML="";
get("err_email").innerHTML="";

}


function checkUsername(control){
	var username= control.value;
	//ajax
	var xhttp= new XMLHttpRequest();
	xhttp.onreadystatechange= function(){
		if(this.readyState==4 && this.status== 200){
			//when server respond
			var rsp= this.responseText;
			if(rsp== "true"){
				userExist=false;

				document.getElementById("err_uname").innerHTML= "*Valid";
				document.getElementById("err_uname").style.color="green";
			}
			else{
				
				userExist=true;

				document.getElementById("err_uname").innerHTML= "*Not Valid";
				document.getElementById("err_uname").style.color="red";
			}
		}
	}
	xhttp.open("GET","check-username-manager.php?uname="+username,true);
	xhttp.send();
}

</script>
