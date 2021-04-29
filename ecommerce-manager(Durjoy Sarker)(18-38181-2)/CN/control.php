<?php
require_once "DB/db.php";

//validation
			
		    $name="";
			$err_name="";
			$id="";
			$err_id="";
			$bname="";
			$err_bname="";
			
			$hasError=false;
			
		    if(isset($_POST["producttwo"])){
				insertUser($_POST["id"],$_POST["bname"],$_POST["name"]);
				if(empty($_POST["id"])){
					$err_uname="*Product Id Required";
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
				if(!$hasError){
			        insertCustomer($_POST["id"],$_POST["bname"],$_POST["name"]);
				}
			}
				
			
			
	//controller


function insertCustomer($name, $username ,$password)
{
	$query="insert into product values(NULL,'$name','$username','$password')";
	execute($query);
	header("Location: show.php");
}
function updateCustomer($id,$name)
{
	$query="update product set name='$name' where id='$id'";
	execute($query);
	header("Location: show.php");
}
function deleteCustomer($id)
{
	$query="delete from product where id='$id'";
	execute($query);
	header("Location: show.php");
}

function getCustomer($id)
{
	$query="select * from  where product id='$id'";
	$result=get($query);
	if(count($result)>0)
	{
		return result[0];
	}
	else{ 
	  return false;
	}
}

function getAllCustomers()
{
	$query="select * from product";
	$result=get($query);
	return $result;
}

function checkUsernameValidity($username){
	$query="select * from product where name ='$username'";
	$result=get($query);
	if(count($result)>0){
		return "false";
	}
	return "true";
}
?>