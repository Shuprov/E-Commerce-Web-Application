<?php
require_once "models/db-config.php";


		 $name="";
         $err_name="";
		 $pname="";
         $err_pname="";
		 $review="";
         $err_review="";
		 $hasError=false;
		
		 if($_SERVER["REQUEST_METHOD"]=="POST"){
			
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
        
		 
	
	
	function insertReview($name,$pname,$review)
{
	$query="insert into product_review values(NULL,'$name','$pname','$review')";
	execute($query);
	header("Location: all_review.php");
}

function updateReview($id,$name,$pname,$review)
{
	$query="update product_review set name='$name',product name='$pname',review= '$review' where id='$id'";
	execute($query);
	header("Location: all_review.php");
}

function deleteReview($id)
{
	$query="delete from product_review where id='$id'";
	execute($query);
	header("Location: all-review.php");
}

function getReview($id)
{
	$query="select * from product_review where id='$id'";
	$result=get($query);
	if(count($result)>0)
	{
	return result[0];

	}
	else{ 
	return false;
	}
}

function getAllReviews()
{
	$query="select * from product_review";
	$result=get($query);
	return $result;
}
function checknameValidity($name){
			$query="select * from product_review where name='$name'";
			$result=get($query);
			if(count($result)>0){
				return "false";
			}
			return "true";
		}




?>