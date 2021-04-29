<?php
require_once "models/db-config.php";


         $name="";
         $err_name="";
         $email="";
         $err_email="";
         $phone="";
         $err_phone="";
		 $err_quantity;
		 $address="";
         $err_address="";		
         $payment="";
         $err_payment="";        
         $Message="";
         $err_mess="";
		 $hasError=false;

			if($_SERVER["REQUEST_METHOD"]=="POST"){
				
				 
				if(empty($_POST["name"])){
                $err_name="Name required";
				}
				else if(strlen($_POST["name"]) < 6){
                $err_name="Name must be more than 6 characters long";
				}
				else if(strpos($_POST["name"]," ")){
                $err_name="Name should not contain whitespace";
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
				else{
					$email=htmlspecialchars($_POST["email"]);
				}


				if(empty($_POST["address"])){
					$err_address="*address required";
					$hasError=true;
					
				}
				else{
					$address=htmlspecialchars($_POST["address"]);
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

				if(!isset($_POST["payment[]"])){
                $err_payment="Select payment method";
				}
				else{
                $payment=$_POST["payment"];
            }
            

				if(empty($_POST["message"])){
                $err_mess="Message should not be empty";
				}
				else{
                $message=htmlspecialchars($_POST["message"]);
				}
				
				if(!$hasError){
				 insertOrder($_POST["name"],$_POST["email"],$_POST["phone"],$_POST["address"],$_POST["payment"],$_POST["message"]);
				}
           
        
        }
		
		function insertOrder($name,$email,$phone,$address,$payment,$message)
{
	$query="insert into place_order values(NULL,'$name','$email','$phone','$address','$payment','$message')";
	execute($query);
	if ($payment == "cash"){
		header("Location: PlaceOrder.php");
		
	}
	
	elseif($payment == "Rocket"){
		header("Location: Rocket.php");
		
	}
	elseif($payment == "Nagad"){
		header("Location: Nagad.php");
		
	}
	
	
}
function updateOrder($id,$username,$password,$email,$phone,$address)
{
	$query="update place_order set name='$name',email= '$email',phone='$phone',address='$address','$payment' where id='$id'";
	execute($query);
	header("Location: all-orders.php");
}
function deleteOrder($id)
{
	$query="delete from place_order where id='$id'";
	execute($query);
	header("Location: all-order.php");
}

function getOrder($id)
{
	$query="select * from place_order where id='$id'";
	$result=get($query);
	if(count($result)>0)
	{
	return result[0];

	}
	else{ 
	return false;
	}
}

function getAllOrders()
{
	$query="select * from place_order";
	$result=get($query);
	return $result;
}
function checkNameValidity($name){
			$query="select * from place_order where name='$name'";
			$result=get($query);
			if(count($result)>0){
				return "false";
			}
			return "true";
		}

?>