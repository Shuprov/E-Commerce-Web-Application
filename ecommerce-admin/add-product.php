<?php
require_once "controllers/product-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
?>
<html>
<head>
</head>
<body>


	
	
    <fieldset>
      <center>
       <legend><h1> Add Product </h1></legend>
       <form action="" method="post" onsubmit="return validate()">
          <table>
          
             <tr>
               <td><span> Product Name</span></td>
               <td>: <input type="text" id="pname" value="<?php echo $productName;?>" name="pname" onfocusout="checkUsername(this)">
               <span id="err_pname"><?php echo $err_productName;?></span></td>
             </tr>
            
             <tr>
               <td><span> Brand Name</span></td>
               <td>: <input type="text" id="bname" value="<?php echo $brandName;?>" name="bname">
               <span id="err_bname"><?php echo $err_brandName;?></span></td>
             </tr>
            
             <tr>
               <td><span> Category Name</span></td>
               <td>: <input type="text" id="cname" value="<?php echo $categoryName;?>" name="cname">
               <span id="err_cname"><?php echo $err_categoryName;?></span></td>
             </tr>
            
             

             <tr>
               <td><span> Product Quantity</span></td>
               <td>: <input type="text" id="pquantity" value="<?php echo $productQuantity;?>" name="pquantity">
               <span id="err_pquantity"><?php echo $err_productQuantity;?></span></td>
             </tr>

            
             <tr>
               <td><span> Product Price</span></td>
               <td>: <input type="text" id="price" value="<?php echo $productPrice;?>" name="price">
               <span id="err_price"><?php echo $err_productPrice;?></span></td>
             </tr>

             <tr>
						<td align="center" colspan="2"><input type="submit" name="add-product" value="Add Product"></td>
					</tr>

         </table>    
        
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

	if(get("pname").value==""){
		get("err_pname").innerHTML="*Product Name Required";
				get("err_pname").style="color:blue";
				hasError=true;
	}
	
	
	if(get("bname").value==""){
				get("err_bname").innerHTML="*Brand Name Required";
				get("err_bname").style="color:blue";
				hasError=true;
	}
	if(get("cname").value==""){
				get("err_cname").innerHTML="*Category name Required";
				get("err_cname").style="color:blue";
				hasError=true;
	}
	if(get("pquantity").value==""){
				get("err_pquantity").innerHTML="*Product quantity Required";
				get("err_pquantity").style="color:blue";
				hasError=true;
	}
	if(get("price").value==""){
				get("err_price").innerHTML="*Product price Required";
				get("err_price").style="color:blue";
				hasError=true;
	}
	if(!hasError){
		return true;
	}
	return false;
}

function cleanUp(){
			get("err_pname").innerHTML="";
			get("err_bname").innerHTML="";
			get("err_cname").innerHTML="";
			get("err_pquantity").innerHTML="";
			get("err_price").innerHTML="";

}


//AJAX
function checkUsername(control){
	var username= control.value;
	
	var xhttp= new XMLHttpRequest();
	xhttp.onreadystatechange= function(){
		if(this.readyState==4 && this.status== 200){
			//when server respond
			var rsp= this.responseText;
			if(rsp== "true"){

				document.getElementById("err_pname").innerHTML= "*Valid";
				document.getElementById("err_pname").style.color="green";
			}
			else{
				
				document.getElementById("err_pname").innerHTML= "*Not Valid";
				document.getElementById("err_pname").style.color="red";
			}
		}
	}
	xhttp.open("GET","check-username-product.php?pname="+username,true);
	xhttp.send();
}

</script>
