<?php

/**/

if (!isset($_GET['i_char_id'])) {
	die("Error, character ID not specified");
}


$invent_id = htmlspecialchars($_GET['i_char_id']);



require("dbConnect.php");
$db = get_db();


$query='SELECT * FROM inventory i
WHERE i.i_char_id = :id';

$stmt = $db->prepare($query);
$stmt->bindValue(':id', $i_char_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

/**/

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

<?php


foreach ($rows as $row)
		{
			echo '<li>' . $row['invent_name'] . '</li';			
		}

?>

</ul>

</body>
</html>