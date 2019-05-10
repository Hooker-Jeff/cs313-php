<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add to cart page</title>
<link rel="stylesheet" href="store.css">
</head>

<body>

<?php

$_SESSION['cart'] = array();

array_push($_SESSION['cart'], $_GET['id']);

echo "Number of Items in the cart = " . sizeof($_SESSION['cart']);
?>

<br><p>Product was successfully added to your cart.<br>
<a href="cart.php">View your cart</a><br>
<a href="store.php">Back to the store</a>
</p>

</body>
</html>