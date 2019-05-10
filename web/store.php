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
	<td><center><a href="add-to-cart.php?id=Product1">Add to cart</a></center></td>
  </tr>
  <tr>
    <td>Product 2</td>
	<td>$842</td>
	<td>Description description description</td>
	<td><center><a href="add-to-cart.php?id=Product2">Add to cart</a></center></td>
  </tr>
  <tr>
    <td>Product 3</td>
	<td>$35</td>
	<td>Description description description</td>
	<td><center><a href="add-to-cart.php?id=Product3">Add to cart</a></center></td>
  </tr>
  
</table> 
<br><br>
<a href="cart.php">View your cart</a>

</body>
</html>