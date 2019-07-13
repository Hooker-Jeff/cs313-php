<?php

require("dbConnect.php");
$db = get_db();


//$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
//$stmt->execute();
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = 'SELECT character_name,character_id FROM character';
$stmt = $db->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>

<html>

	<head>
	<title>Inventory Manager</title> 
	</head>

	<body>

	  <h1>Inventory Manager </h1><br/>
	  
	  <h3>Select which character inventory to view</h3></br><br/>
	  
	  
	  
	  <ul>
	  
	  <?php
	  
	  foreach($rows as $character)
	  {
		  $id = $character['character_id'];
		  $char_name = $character['character_name'];
		  echo "<li><p><a href='inventory-manager.php?character_id=$id'>$char_name</a></p></li>";
	  }
	  
	  ?>
	  
	  </ul>
	  
	  
	  
	  
	  
	  
	  <!--
	 
	  <form action="dndatabase.php" method="POST">
	  <select name="DnDForm">
	    <option value="No Character Selected">[Choose your character]</option>
		<option value="Taako Taaco">Taako</option>
		<option value="Sarissa Shadowhorn">Sarissa</option>
	  </select>	  
	  <input type="submit" value="Select Character" />
	  </form>
	  
	  -->
	  
	</body>
</html> 















