<?php
      require_once "Controle/controle.php";
   
   $query = "select * from employee";
   
   $result = get($query);
?>

 

   <table border ="1" style="border-collapse;">
       <tr>
         <th> Id </th>
         <th> Name </th>
         <th> Password </th>
         <th>Email</th>
		 <th>Action</th>
         <th>Action</th>

         
       </tr>
<?php

 

   foreach($result as $row) {
       echo "<tr>";
       echo "<td>".$row["Id"]."</td>";
       echo "<td>".$row["Emp_name"]."</td>";
       echo "<td>".$row["Emp_pass"]."</td>";
       echo "<td>".$row["email"]."</td>";
       echo '<td><button><a href="editinfo.php" >Edit</a></button></td>';
       echo '<td><button><a href="delete.php">Delete</a></button></td>';
       echo "</tr>";
   }
?>

 

   </table>