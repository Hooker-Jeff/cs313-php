<?php

/**/

if (!isset($_GET['character_id'])) {
	die("Error, character ID not specified");
}


$invent_id = htmlspecialchars($_GET['character_id']);



require("dbConnect.php");
$db = get_db();


$query='SELECT * FROM character c
JOIN inventory i ON c.character_id = i.i_char_id
WHERE i.i_char_id = :id';

$stmt = $db->prepare($query);
$stmt->bindValue(':id', $character_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$character_name = $character['character_name'];

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

<?php
echo '<h1> Inventory for ' . $rows['character_name'] . '</h1><br/>';
?>

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