<?php
   require_once "DB/db.php";
   
   $query = "select * from product";
   
   $result = get($query);
?>

   <table border ="1" style="border-collapse;">
       <tr>
	     <th> Id </th>
		 <th> Name </th>
		 <th> Brand </th>
		 <th>Action</th>
		 <th>Action</th>
	   </tr>
<?php

   foreach($result as $row) {
	   echo "<tr>";
	   echo "<td>".$row["id"]."</td>";
	   echo "<td>".$row["name"]."</td>";
	   echo "<td>".$row["brand"]."</td>";
	   
	   echo '<td><button><a href="producttwo.php" >Edit</a></button></td>';
	   echo '<td><button><a href="third.php">Delete</a></button></td>';
	   echo "</tr>";
   }
?>

   </table>