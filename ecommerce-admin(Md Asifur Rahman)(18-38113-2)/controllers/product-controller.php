<?php
require_once "models/db-config.php";



     
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

		   if(isset($_POST["add-product"])){

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
			insertProduct($_POST["pname"],$_POST["bname"],$_POST["cname"],$_POST["pquantity"],$_POST["price"]);

	}	
	
    }
    
			
	        
			
	//controller


function insertProduct($pname,$bname,$cname,$pquantity,$price)
{
	$query="insert into product values(NULL,'$pname','$bname','$cname','$pquantity','$price')";
	execute($query);
	header("Location: all-products.php");
}

function updateProduct($id,$pname,$bname,$cname,$pquantity,$price)
{
	$query="update product set product_name='$pname',brand_name='$bname',category_name='$cname',product_quantity='$pquantity',product_price='$price' where product_id='$id'";
	execute($query);
	header("Location: all-products.php");
}

function deleteProduct($id)
{
	$query="delete from product where product_id='$id'";
	execute($query);
	header("Location: all-products.php");
}

function getProduct($id)
{
	$query="select * from product where product_id='$id'";
	$result=get($query);
	if(count($result)>0)
	{
	return $result[0];

	}
	else{ 
	return false;
	}
}

function getAllProducts()
{
	$query="select * from product";
	$result=get($query);
	return $result;
}
function searchProduct($key)
{
	$query="SELECT product_id,product_name FROM `product` WHERE product_name like '%$key%'";
	$result=get($query);
	return $result;
}

function checkUsernameValidity($username){
			$query="select * from product where product_name='$username'";
			$result=get($query);
			if(count($result)>0){
				return "false";
			}
			return "true";
		}



?>