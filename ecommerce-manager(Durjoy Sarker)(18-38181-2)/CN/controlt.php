<?php
require_once "DB/db.php";
		    $name="";
			$err_name="";
			$uname="";
			$err_uname="";
			$password="";
			$err_password="";
			$email="";
			$err_email="";
			$phone="";
			$err_phone="";
			$id ="";
			$err_id="";
			$hasError=false;
			if(isset($_POST["second"])){
				insertUser($_POST["pass"],$_POST["name"],$_POST["uname"],$_POST["phone"] ,$_POST["email"]);
			    $s= strpos($_POST["email"],"@");
				if(empty($_POST["uname"])){
					$err_uname="*Username Required";
					$hasError=true;
				}
				else if(strlen($_POST["uname"]) < 3){
					$err_uname="*Username should be at least 2 characters";
					$hasError=true;
				}
				else if(strpos($_POST["uname"]," ")){
					$err_uname="*Space is not allowed";
                    $hasError=true;

				}
				else{
					$uname=htmlspecialchars($_POST["uname"]);
				}
				if(empty($_POST["name"])){
					$err_name="*Name Required";
					$hasError=true;
				}
				else{
					$name=htmlspecialchars($_POST["name"]);
				}
				if(empty($_POST["pass"])){
					$err_password = "*Password Required";
					$hasError=true;
				}
				else if(strlen($_POST["pass"]) < 4){
					$err_password="*Password should be at least 4 characters";
					$hasError=true;
				}
				else{
					$password=$_POST["pass"];
				}
				if(empty($_POST["id"])){
					$err_id = "*Id Required";
					$hasError=true;
				}
				else{
					$id=$_POST["id"];
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
				if(empty($_POST["phone"])){
					$err_phone="*Phone number required";
					$hasError=true;
				}
				else if(!is_numeric($_POST["phone"])){
					$err_phone="*Only numerical value is accepted";
					$hasError=true;
				}
				else{
					$phone=htmlspecialchars($_POST["phone"]);
				}
				if(!$hasError){
			        insertCustomer($_POST["pass"],$_POST["name"],$_POST["uname"],$_POST["phone"] ,$_POST["email"]);
				}	
			}
function insertCustomer($name,$username ,$password ,$email , $phone)
{
	$query="insert into string values(NULL,'$name','$username','$password' ,'$email' ,'$phone')";
	execute($query);
	header("Location: showpro.php");
}
function updateCustomer($id , $name, $email)
{
	$query="update string set name='$name',email = '$email'where password='$id'";
	execute($query);
	header("Location: showpro.php");
}
function deleteCustomer($id)
{
	$query="delete from string where password='$id'";
	execute($query);
	header("Location: showpro.php");
}

function getCustomer($id)
{
	$query="select * from string where password='$id'";
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
	$query="select * from string";
	$result=get($query);
	return $result;
}

function checkUsernameValidity($username){
	$query="select * from string where name='$username'";
	$result=get($query);
	if(count($result)>0){
		return "false";
	}
	return "true";
}

?>
