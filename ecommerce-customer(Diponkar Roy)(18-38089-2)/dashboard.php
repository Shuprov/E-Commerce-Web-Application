<?php session_start();?>

<html>
<head>

</head>
<body>
<h1>Customer Dashboard</h1>
<?php 
				$_SESSION['show'] = "<h3>Wellcome In Our Shop</h3>"; 
				
				echo $_SESSION['show'];
			
			?> 
<hr>
<a href="all-customers.php">All customers</a> <br><br>
<a href="couetomerregistration.php">Add customer</a><br><br>
<a href="all-orders.php">All Orders</a><br><br>
<a href="PlaceOrder.php">Add Order</a><br><br>
<a href="all_review.php">All Reviews</a><br><br>
<a href="productReview.php">Add Review</a><br><br>
<a href="../ecommerce-admin(Md Asifur Rahman)(18-38113-2)/login.php">Logout</a>




</body>
</html>