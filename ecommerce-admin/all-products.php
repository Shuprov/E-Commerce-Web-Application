<?php
require_once "controllers/product-controller.php";
if(!isset($_COOKIE["username"]))
{
	header("Location:login.php");
}
$products= getAllProducts();
?>


<div>
	<h1>All Products</h1>
	<div id="">
	<input type="text" id="search_text" onkeyup="suggest(this)" placeholder="Search">
	<p id="suggestion">
	
	</p>
	</div>
	<table border="1" style=border-collapse:collapse;>
		<thead>
			<th>Id</th>
			<th> Product Name</th>
			<th>Brand Name</th>
			<th>Category Name</th>
			<th>Product Quantity</th>
            <th>Product Price</th>
            <th>Action</th>
			<th>Action</th>

		</thead>
		<tbody>
		<?php
		foreach($products as $product)
		{
			echo "<tr>";
			echo "<td>".$product["product_id"]."</td>";
			echo "<td>".$product["product_name"]."</td>";
			echo "<td>".$product["brand_name"]."</td>";
			echo "<td>".$product["category_name"]."</td>";
			echo "<td>".$product["product_quantity"]."</td>";
			echo "<td>".$product["product_price"]."</td>";

			echo '<td><button><a href="edit-product.php?id='.$product["product_id"].'" >Edit</a></button></td>';
			echo '<td><button><a href="delete-product.php?id='.$product["product_id"].'">Delete</a></button></td>';
			echo "</tr>";

		}
		?>
			
		</tbody>
	</table>

</div>

<script>

function suggest(control){
	var key= control.value;
	if(key=="")
	{
	document.getElementById("suggestion").innerHTML= "";
	return;
	}
	
	var xhttp= new XMLHttpRequest();
	xhttp.onreadystatechange= function(){
		if(this.readyState==4 && this.status== 200){
			//when server respond
		document.getElementById("suggestion").innerHTML= this.responseText;

			
		}
	}
	xhttp.open("GET","searchProduct.php?key="+key,true);
	xhttp.send();
}
</script>