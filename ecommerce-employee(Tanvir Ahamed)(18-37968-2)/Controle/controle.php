<?php
require_once "DB/db.php";


		    $name="";
			$err_name="";
			$password="";
			$err_password="";
			
			$email="";
			$err_email="";
			
			
			$hasError=false;

			
	        if($_SERVER['REQUEST_METHOD'] == "POST"){
		  
			    $s= strpos($_POST["email"],"@");
				
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
				/*if(empty($_POST["id"])){
					$err_id = "*Id Required";
					$hasError=true;
				}
				else{
					$id=$_POST["id"];
				} */
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
				if(!$hasError){
                    insertCustomer($_POST["name"],$_POST["pass"] ,$_POST["email"]);
                }
					
			}


function insertCustomer($name ,$password,$email)
{
    $query="insert into employee values(NULL,'$name','$password','$email')";
    execute($query);
    header("Location: show.php");
}

function updateCustomer($id,$name,$email)
{
    $query="update employee set Emp_name='$name', email='$email' where Id='$id'";
    execute($query);
    header("Location: show.php");
}

function deleteCustomer($id)
{
    $query="delete from employee where Id='$id'";
    execute($query);
    header("Location: show.php");
}

 

function getCustomer($id)
{
    $query="select * from  where employee id='$id'";
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
    $query="select * from employee";
    $result=get($query);
    return $result;
}

function checkUsernameValidity($username){
			$query="select * from employee where Emp_name='$username'";
			$result=get($query);
			if(count($result)>0){
				return "false";
			}
			return "true";
		}






?>