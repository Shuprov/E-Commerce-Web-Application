<?php
require_once "controller/order-controller.php";
$Orders= getAllOrders();
?>


<div>
	<h1>All Orders</h1>
	<table border="1" style=border-collapse:collapse;>
		<thead>
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th> Phone</th>
			<th> Address</th>
			<th> Payment</th>
			<th> Message</th>

            <th>Action</th>
			

		</thead>
		<tbody>
		<?php
		foreach($Orders as $order)
		{
			echo "<tr>";
			echo "<td>".$order["id"]."</td>";
			echo "<td>".$order["name"]."</td>";
			echo "<td>".$order["email"]."</td>";
			echo "<td>".$order["phone"]."</td>";
			echo "<td>".$order["address"]."</td>";
			echo "<td>".$order["payment"]."</td>";
			echo "<td>".$order["message"]."</td>";


			//echo '<td><button><a href="edit-order.php" >Edit</a></button></td>';
			echo '<td><button><a href="delete-order.php">Delete</a></button></td>';
			echo "</tr>";

		}
		?>
			
		</tbody>
	</table>
</div>
