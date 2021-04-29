<?php
$db_server="localhost";
$db_uname="root";
$db_pass="";
$db_name="panda_commerce";
function execute($query) //execute insert,update,delete
{
	global $db_server,$db_uname,$db_pass,$db_name;
	$connection=mysqli_connect($db_server,$db_uname,$db_pass,$db_name);
    mysqli_query($connection,$query);

}
function get($query) //execute select query
{
	global $db_server,$db_uname,$db_pass,$db_name;
	$connection=mysqli_connect($db_server,$db_uname,$db_pass,$db_name);
    $result= mysqli_query($connection,$query);
	$data=[];
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$data[]=$row;
		}
	}
	return $data;
}
?>