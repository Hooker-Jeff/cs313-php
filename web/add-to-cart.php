<?php
session_start();


if(empty($_session['cart'])){
	$_session['cart'] = array();
}

array_push($_session['cart'], $_GET['id']);

?>

<p>Product was successfully added to your cart.<br>
<a href="cart.php">View your cart</a><br>
<a href="store.php">Back to the store</a>
</p>