<?php
require_once "controllers/manager-controller.php";
$managers= getAllManagers();
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
?>


<div>
	<h1>All Managers</h1>
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
		foreach($managers as $manager)
		{
			echo "<tr>";
			echo "<td>".$manager["id"]."</td>";
			echo "<td>".$manager["name"]."</td>";
			echo "<td>".$manager["username"]."</td>";
			echo "<td>".$manager["password"]."</td>";
			echo "<td>".$manager["email"]."</td>";

			echo '<td><button><a href="edit-manager.php?id='.$manager["id"].'" >Edit</a></button></td>';
			echo '<td><button><a href="delete-manager.php?id='.$manager["id"].'">Delete</a></button></td>';
			echo "</tr>";

		}
		?>
			
		</tbody>
	</table>

</div>
