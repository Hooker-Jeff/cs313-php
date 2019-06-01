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
	<title>D&D Database</title> 
	</head>

	<body>

	  <h1> D&D Database </h1><br/><br/>
	  
	  
	  
	  <ul>
	  
	  <?php
	  
	  foreach($rows as $character)
	  {
		  $id = $character['character_id'];
		  $char_name = $character['character_name'];
		  echo "<li><p><a href='dndatabase.php?character_id=$id'>$char_name</a></p></li>";
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















