<?php

/*
try
{
  $dbUrl = getenv('HEROKU_POSTGRESQL_ONYX_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}





$dbUrl = getenv('HEROKU_POSTGRESQL_ONYX_URL');
$sql = "SELECT character_name FROM public.character ORDER BY character_name ASC";
$result = mysqli_query($dbURL,$sql) or die("Bad SQL: $sql");

$option = "<select name='character_name' >";
while($row = mysqli_fetch_assoc($result)) {
	$option .= "<option value='{$row['character_name']}'>{$row(['character_name']}</option>\n";
}

$option .= "</select>"

*/

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