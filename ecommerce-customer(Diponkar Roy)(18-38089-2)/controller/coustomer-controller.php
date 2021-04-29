<?php
require_once "models/db-config.php";

//validation

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
			$gender="";
			$err_gender="";
			$address="";
			$err_address="";
			$hasError=false;
			
			//if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_POST["add-customer"])){

				 
				
				$s= strpos($_POST["email"],"@");
			//$t = strpos($_POST["email"],".",$s+1);
			
			$x= strpos($_POST["password"],"#");
            $y= strpos($_POST["password"],"?");
			
				if(empty($_POST["uname"])){
					$err_uname="*Username Required";
					$hasError=true;
				}
				else if(strlen($_POST["uname"]) < 6){
					$err_uname="*Username should be at least 6 characters";
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
				else if(is_numeric($_POST["name"])){
					$err_name="*Only string value is accepted";
					$hasError=true;
				}
				else if(strlen($_POST["name"]) < 3){
					$err_name="*Name should be at least 3 characters";
					$hasError=true;
				}
				
				else{
					$name=htmlspecialchars($_POST["name"]);
				}
				if(empty($_POST["password"])){
					$err_password = "*Password Required";
					$hasError=true;
				}
				else if(strlen($_POST["password"]) < 8){
					$err_password="*Password should be at least 8 characters";
					$hasError=true;
				}
				else if(ctype_upper($_POST["password"])==true || ctype_lower($_POST["password"])==true ){ 
					$err_password="*Characters should contain combination of uppercase and lowercase";
					$hasError=true;
				}
				else if($x==null && $y==null){ 
					$err_password="*Characters should contain 1 special character eg.# or ?";
					$hasError=true;
				}
				else{
					$password=$_POST["password"];
				}
				
				if(empty($_POST["phone"])){
					$err_phone="*Phone number required";
					$hasError=true;
				}
				else if(!is_numeric($_POST["phone"])){
					$err_phone="*Only numerical value is accepted";
					$hasError=true;
				}
				else if(strlen($_POST["phone"])!=11){
					$err_phone="*Phone number should be exactly 11 characters";
					$hasError=true;
				}
				
				else{
					$phone=htmlspecialchars($_POST["phone"]);
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
				
				if(empty($_POST["gender"])){
					$err_gender="*gender required";
					$hasError=true;
					
				}
				else{
				$gender=htmlspecialchars($_POST["gender"]);

				}

				if(empty($_POST["address"])){
					$err_address="*address required";
					$hasError=true;
				}
				else{
				$address=htmlspecialchars($_POST["address"]);
				}
             if(!$hasError){
			insertCoustomer($_POST["uname"],$_POST["password"] ,$_POST["email"],$_POST["phone"],$_POST["address"]);
			}				
				
				
			}
			
	//controller


function insertCoustomer ($username,$password,$email,$phone,$address)
{
	$query="insert into coustomer_registration values(NULL,'$username','$password','$email','$phone','$address')";
	execute($query);
	header("Location: all-customers.php");
}
function updateCustomer($id,$username,$password,$email,$phone,$address)
{
	$query="update coustomer_registration set username='$username',password='$password',email= '$email',phone='$phone',address='$address' where id='$id'";
	execute($query);
	header("Location: all-customers.php");
}
function deleteCustomer($id)
{
	$query="delete from coustomer_registration where id='$id'";
	execute($query);
	header("Location: all-customers.php");
}

function getCustomer($id)
{
	$query="select * from coustomer_registration where id='$id'";
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
	$query="select * from coustomer_registration";
	$result=get($query);
	return $result;
}
function checkUsernameValidity($username){
			$query="select * from coustomer_registration where username='$username'";
			$result=get($query);
			if(count($result)>0){
				return "false";
			}
			return "true";
		}




?>