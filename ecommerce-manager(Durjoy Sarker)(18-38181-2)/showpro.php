<?php
    require_once "DB/db.php";
   
   $query = "select * from string";
   
   $result = get($query);
?>

   <table border ="1" style="border-collapse;">
       <tr>
	     <th> Password </th>
		 <th> Name </th>
		 <th> User Name </th>
		 <th> Phone </th>
		 <th> Email</th>
		 <th>Action</th>
		 <th>Action</th>
	   </tr>
<?php

   foreach($result as $row) {
	   echo "<tr>";
	   echo "<td>".$row["password"]."</td>";
	   echo "<td>".$row["name"]."</td>";
	   echo "<td>".$row["uname"]."</td>";
	   echo "<td>".$row["phone"]."</td>";
	   echo "<td>".$row["email"]."</td>";
	   
	   echo '<td><button><a href="second.php" >Edit</a></button></td>';
	   echo '<td><button><a href="delete.php" >Delete</a></button></td>';
	   echo "</tr>";
   }
?>

   </table>
   
   