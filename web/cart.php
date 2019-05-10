<?php

session_start();

while (list ($key, $val) = each ($_SESSION['cart'])) { 
echo "$key -> $val <br>"; 
}


?>