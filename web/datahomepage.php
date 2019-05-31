<?php

require("dbConnect.php");
$db = get_db();

//$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
//$stmt->bindValue(':id', $id, PDO::PARAM_INT);
//$stmt->bindValue(':name', $name, PDO::PARAM_STR);
//$stmt->execute();
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = 'SELECT character_name FROM character';
$stmt = $db->prepare($query);
$stmt->execute();
$characters = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>

<html>

	<head>
	<title>D&D Database</title>
	<style>
	    * {
		  text-align: center;
		}
		
	</style>
	</head>

	<body>

	  <h1> D&D Database </h1><br/><br/>
	  
	  
	  <!--
	  <ul>
	  
	  <?php
	  /*
	  foreach($characters as $character)
	  {
		  $char_name = $character['character_name'];
		  echo '<li><p>$char_name</p></li>'
	  }
	  */
	  ?>
	  
	  </ul>
	  -->
	  
	  
	  
	  
	  
	  
	 
	  <form action="dndatabase.php" method="POST">
	  <select name="DnDForm">
	    <option value="No Character Selected">[Choose your character]</option>
		<option value="Taako Taaco">Taako</option>
		<option value="Sarissa Shadowhorn">Sarissa</option>
	  </select>	  
	  <input type="submit" value="Select Character" />
	  </form>
	  
	  
	</body>
</html> 















