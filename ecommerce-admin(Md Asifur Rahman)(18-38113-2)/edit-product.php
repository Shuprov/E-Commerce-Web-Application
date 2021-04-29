<?php
require_once "controllers/product-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
$id=$_GET["id"];
$product=getProduct($id);

     $productId="";
     $err_productId="";
     $productName="";
     $err_productName="";
     $brandName="";
     $err_brandName="";
     $categoryName="";
     $err_categoryName="";
     $productQuantity="";
     $err_productQuantity="";
     $productPrice="";
     $err_productPrice="";
     
     $hasError=false;

		   if(isset($_POST["edit-product"])){

        if(empty($_POST["pid"])){
            $err_productId="*Product Id Required";
            $hasError=true;
        }
       
    
        else if(!is_numeric($_POST["pid"])){
            $err_productId="*Only numeric value is accepted";
            $hasError=true;
        }
        else{
            $productId=htmlspecialchars($_POST["pid"]);
        } 

        if(empty($_POST["pname"])){
            $err_productName="*Product Name Required";
            $hasError=true;
        }
       
        else if(is_numeric($_POST["pname"])){
            $err_productName="*Only string value is accepted";
            $hasError=true;
        }
        else{
            $productName=htmlspecialchars($_POST["pname"]);
        }

        if(empty($_POST["bname"])){
            $err_brandName="*Brand Name Required";
            $hasError=true;
        }
        else if(is_numeric($_POST["bname"])){
            $err_brandName="*Only string value is accepted";
            $hasError=true;
        }
      
        else{
            $brandName=htmlspecialchars($_POST["bname"]);
        }
        if(empty($_POST["cname"])){
            $err_categoryName="*Category Name Required";
            $hasError=true;
        }
        else if(is_numeric($_POST["cname"])){
            $err_categoryName="*Only string value is accepted";
            $hasError=true;
        }
        else{
            $categoryName=htmlspecialchars($_POST["cname"]);
        }
        if(empty($_POST["pquantity"])){
            $err_productQuantity="*Product Quantity Required";
            $hasError=true;
        }
        else if(!is_numeric($_POST["pquantity"])){
            $err_productQuantity="*Only numeric value is accepted";
            $hasError=true;
        }
      
        else{
            $productQuantity=htmlspecialchars($_POST["pquantity"]);
        }
        if(empty($_POST["price"])){
            $err_productPrice="*Product Price Required";
            $hasError=true;
        }
        else if(!is_numeric($_POST["price"])){
            $err_productPrice="*Only numeric value is accepted";
            $hasError=true;
        }
      
        else{
            $productPrice=htmlspecialchars($_POST["price"]);
        }
		
		if(!$hasError){
			updateProduct($_POST["pid"],$_POST["pname"],$_POST["bname"],$_POST["cname"],$_POST["pquantity"],$_POST["price"]);

	}	
	
    }


?>



	
<html>
<head>
</head>
<body>


	
	
    <fieldset>
      <center>
       <legend><h1>Edit Product </h1></legend>
       <form action="" method="post" onsubmit="return validate()">
          <table>
          <tr>
               <td><span> Product ID</span></td>
               <td>: <input type="text" id="pid" value="<?php echo $product["product_id"];?>" name="pid">
               <span id="err_pid"><?php echo $err_productId;?></span></td>
             </tr>
             <tr>
               <td><span> Product Name</span></td>
               <td>: <input type="text" id="pname" value="<?php echo $product["product_name"];?>" name="pname" onfocusout="checkUsername(this)">
               <span id="err_pname"><?php echo $err_productName;?></span></td>
             </tr>
            
             <tr>
               <td><span> Brand Name</span></td>
               <td>: <input type="text" id="bname" value="<?php echo $product["brand_name"];?>" name="bname">
               <span id="err_bname"><?php echo $err_brandName;?></span></td>
             </tr>
            
             <tr>
               <td><span> Category Name</span></td>
               <td>: <input type="text" id="cname" value="<?php echo $product["category_name"];?>" name="cname">
               <span id="err_cname"><?php echo $err_categoryName;?></span></td>
             </tr>
            
             

             <tr>
               <td><span> Product Quantity</span></td>
               <td>: <input type="text" id="pquantity" value="<?php echo $product["product_quantity"];?>" name="pquantity">
               <span id="err_pquantity"><?php echo $err_productQuantity;?></span></td>
             </tr>

            
             <tr>
               <td><span> Product Price</span></td>
               <td>: <input type="text" id="price" value="<?php echo $product["product_price"];?>" name="price">
               <span id="err_price"><?php echo $err_productPrice;?></span></td>
             </tr>

             <tr>
						<td align="center" colspan="2"><input type="submit" name="edit-product" value="Edit Product"></td>
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
	
	if(get("pid").value==""){
		get("err_pid").innerHTML="*Product id Required";
				get("err_pid").style="color:blue";
				hasError=true;
	}

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
			get("err_pid").innerHTML="";
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