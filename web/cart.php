<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Your Cart</title>
<link rel="stylesheet" href="store.css">
</head>

<body>
<center><h2>Your Cart</h2></center><br><hr>

<?php

while (list ($key, $val) = each ($_SESSION['cart'])) { 
echo "$key -> $val <br>"; 
}


?>

</body>
</html>