<?php

require("dbConnect.php");
$db = get_db();


$query='SELECT * FROM inventory;'

$stmt = $db->prepare($query);
$stmt->bindValue(':id', $invent_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
<title>Inventory Manager</title>
<link rel="stylesheet" href="inventoryStyles.css">
<script type = "text/javascript" src = "inventory-manager.js" ></script>
</head>

<body>
<div id="myDIV" class="header">
<h1>Inventory Manager</h1></br></br>
<input type="text" id="input" placeholder="Item...">
<span onclick="newElement()" class="addBtn">Add</span>
</div>

<ul id="myUL">
</ul>

</body>
</html>