<?php
   require_once "CN/control.php";
?>

<html>
   <body>
       <fieldset>
			<center><legend><h1> Add Product </h1></legend></center>
			<center>
			<form action="" method="post" onsubmit = "return validate()">
				<table>
                    <tr>
						<td><span> Name </span></td> 
						<td>: <input type="text" id = "name" name = "name" value=""/>
						<span id = "err_name"><?php echo $err_name;?></span></td>

					</tr>
					
					<tr>
						<td><span> Brand Name </span></td> 
						<td>: <input type="text" id = "bname" name = "bname" value=""/>
						<span id ="err_bname"><?php echo $err_bname;?></span></td>
					</tr>
					
					<tr>
						<td><span> Id </span></td> 
						<td>: <input type="text" id = "id" name = "id" value=""/> 
						<span id ="err_id"><?php echo $err_id;?></span></td>
					</tr>
					
					
					<tr>
					    <td align="center" colspan="2"><input type="submit" name="Submit" value="Submit"></td>
					</tr>

				</table>
			</form>
			</center>
		</fieldset>
		</body>
	  <script>
	     function get(id) {
             return document.getElementById(id);
		 }
         function validate(){
			  cleanUp();
              var hasError = false;
			  if(get("name").value == "") {
				  get("err_name").innerHTML ="*Name Required";
				  get("err_name").style.color="red";
				  hasError = true;
			  }
			  if(get("bname").value == "") {
				  get("err_bname").innerHTML ="*Brand Name Required";
				  get("err_bname").style.color="Green";
				  hasError = true;
			  }
			  if(get("id").value == "") {
				  get("err_id").innerHTML ="*Password Required";
				  get("err_id").style.color="Blue";
				  hasError = true;
			  }
			  //alert(err_msg);
			  if(!hasError){
		          return true;
	          }
	          return false;
         }			 
	     function cleanUp() {
			 get("err_name").innerHTML = "";
			 get("err_bname").innerHTML = "";
			 get("err_id").innerHTML =""; 
		 }
	  </script>
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
