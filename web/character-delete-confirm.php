<?php

require("dbConnect.php");
$db = get_db();

$character_id = htmlspecialchars($_POST['character_id']);

try
{
	$query = 'DELETE FROM character WHERE character_id=:id';
	$stmt = $db->prepare($query);
	$stmt->bindValue(':id', $character_id, PDO::PARAM_INT);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	
?>