<?php
require_once "controller/review-controller.php";
$reviews= getALLReviews();
?>


<div>
	<h1>All Reviews</h1>
	<table border="1" style=border-collapse:collapse;>
		<thead>
			<th>Id</th>
			<th>name</th>
			<th>product name</th>
			<th>review</th>
			<th>Action</th>
			<th>Action</th>
			

		</thead>
		<tbody>
		<?php
		foreach($reviews as $review)
		{
			echo "<tr>";
			echo "<td>".$review["id"]."</td>";
			echo "<td>".$review["name"]."</td>";
			echo "<td>".$review["product name"]."</td>";
			echo "<td>".$review["review"]."</td>";
			
			echo '<td><button><a href="edit_review.php" >Edit</a></button></td>';
			echo '<td><button><a href="delete-review.php">Delete</a></button></td>';
			echo "</tr>";

		}
		?>
			
		</tbody>
	</table>
</div>
