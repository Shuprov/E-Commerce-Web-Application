<?php
require_once "controller/coustomer-controller.php";
$customers= getAllCustomers();
?>


<div>
	<h1>All Customers</h1>
	<table border="1" style=border-collapse:collapse;>
		<thead>
			<th>Id</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th> Phone</th>
			<th> Address</th>

            <th>Action</th>
			<th>Action</th>

		</thead>
		<tbody>
		<?php
		foreach($customers as $customer)
		{
			echo "<tr>";
			echo "<td>".$customer["id"]."</td>";
			echo "<td>".$customer["username"]."</td>";
			echo "<td>".$customer["password"]."</td>";
			echo "<td>".$customer["email"]."</td>";
			echo "<td>".$customer["phone"]."</td>";
			echo "<td>".$customer["address"]."</td>";


			echo '<td><button><a href="edit-customer.php" >Edit</a></button></td>';
			echo '<td><button><a href="delete-customer.php">Delete</a></button></td>';
			echo "</tr>";

		}
		?>
			
		</tbody>
	</table>
</div>
