<?php
require_once "controllers/employee-controller.php";
$employees= getAllEmployees();
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
?>


<div>
	<h1>All Employees</h1>
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
		foreach($employees as $employee)
		{
			echo "<tr>";
			echo "<td>".$employee["id"]."</td>";
			echo "<td>".$employee["name"]."</td>";
			echo "<td>".$employee["username"]."</td>";
			echo "<td>".$employee["password"]."</td>";
			echo "<td>".$employee["email"]."</td>";

			echo '<td><button><a href="edit-employee.php?id='.$employee["id"].'" >Edit</a></button></td>';
			echo '<td><button><a href="delete-employee.php?id='.$employee["id"].'">Delete</a></button></td>';
			echo "</tr>";

		}
		?>
			
		</tbody>
	</table>
</div>
