<html>
   <body>
       <fieldset>
			<center><legend><h1> Edit </h1></legend></center>
			<center>
			<form action="" method="post" onsubmit = "return validate()">
				<table>
				
                    <tr>
						<td><span> Name </span></td> 
						<td>: <input type="text" id = "name" name = "name"><span id = "err_name"></span></td>
					</tr>
					
					<tr>
						<td><span> User Name </span></td> 
						<td>: <input type="text" id = "username" name = "uname"><span id ="err_uname"></span></td>
					</tr>
					
					<tr>
						<td><span> Password </span></td> 
						<td>: <input type="password" id = "password" name = "password"> <span id ="err_password"></span></td>
					</tr>
					
					<tr>
						<td><span> Gmail </span></td> 
						<td>: <input type="text" id = "gmail" name = "gmail"> <span id ="err_gmail"></span></td>
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
				  hasError = true;
			  }
			  if(get("username").value == "") {
				  get("err_uname").innerHTML ="*User Name Required";
				  hasError = true;
			  }
			  if(get("password").value == "") {
				  get("err_password").innerHTML ="*Password Required";
				  hasError = true;
			  }
			  else if(get("password").value < 2) {
				  get("err_password").innerHTML ="*Password should be at least 3 characters";
				  hasError = true;
			  }
			  if(get("gmail").value == "") {
				  get("err_gmail").innerHTML ="*Gmail Required";
				  hasError = true;
			  }
			  else if(get("gmail").value != "@") {
				  get("err_gmail").innerHTML ="*@ Required";
				  hasError = true;
			  }
			  else if(get("gmail").value != ".") {
				  get("err_gmail").innerHTML ="*Dot Required";
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
			 get("err_uname").innerHTML = "";
			 get("err_password").innerHTML ="";
             get("err_gmail").innerHTML ="";	
             				 
		 }
	  </script>
</html>