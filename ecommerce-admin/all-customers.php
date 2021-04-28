<?php
require_once "controllers/customer-controller.php";
$customers= getAllCustomers();
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
?>


<div>
	<h1>All Customers</h1>
	<table border="1" style=border-collapse:collapse;>
		<thead>
			<th>Id</th>
			<th> Name</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
            <th>Action</th>
			<th>Action</th>

		</thead>
		<tbody>
		<?php
		foreach($customers as $customer)
		{
			echo "<tr>";
			echo "<td>".$customer["id"]."</td>";
			echo "<td>".$customer["name"]."</td>";
			echo "<td>".$customer["username"]."</td>";
			echo "<td>".$customer["password"]."</td>";
			echo "<td>".$customer["email"]."</td>";

			echo '<td><button><a href="edit-customer.php?id='.$customer["id"].'" >Edit</a></button></td>';
			echo '<td><button><a href="delete-customer.php?id='.$customer["id"].'">Delete</a></button></td>';
			echo "</tr>";

		}
		?>
			
		</tbody>
	</table>
</div>
