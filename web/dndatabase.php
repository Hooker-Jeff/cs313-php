<?php

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

	  <h1> D&D Database </h1>

		<?php
		
		foreach ($db->query('SELECT * FROM public.character') as $row)
		{
			echo 'Character Name: ' . $row['character_name'] . '<br/>';
			echo 'Player Name: ' . $row['player_name'] . '<br/>';
		}
		?>
	</body>
</html>
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		