<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Store</title>
<link rel="stylesheet" href="store.css">
<script type = "text/javascript" src = "store.js" ></script>
</head>

<body>
<center>
<br>
<h1>Simple Shopping Cart using PHP</h1><br>
<hr>
</center>

 <table style="width:100%">
  <tr>
    <th>Product</th>
    <th>Price</th>
	<th>Description</th>
    <th>Add to Cart?</th>
  </tr>
  <tr>
    <td>Product 1</td>
	<td>$245</td>
	<td>Description description description</td>
	<td><button type="button">Add to cart</button></td>
  </tr>
  <tr>
    <td>Product 2</td>
	<td>$842</td>
	<td>Description description description</td>
	<td><button type="button">Add to cart</button></td>
  </tr>
  <tr>
    <td>Product 3</td>
	<td>$35</td>
	<td>Description description description</td>
	<td><button type="button">Add to cart</button></td>
  </tr>
  
</table> 
<br><br>
<a href="cart.html">View your cart</a>

</body>
</html>