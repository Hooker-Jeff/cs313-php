<?php

try
{
  $dbUrl = getenv('HEROKU_POSTGRESQL_IVORY_URL');

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
	<title>Scripture topic insert</title>
	<style>
	    * {
		  text-align: center;
		}
		
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		
	</style>
	</head>

	<body>
	
	<h1>Enter New Scriptures and Topics</h1>

	<form id="mainForm" action="insertTopic.php" method="POST">

	<input type="text" id="txtBook" name="txtBook"></input>
	<label for="txtBooK">Book</label>
	<br /><br />

	<input type="text" id="txtChapter" name="txtChapter"></input>
	<label for="txtChapter">Chapter</label>
	<br /><br />

	<input type="text" id="txtVerse" name="txtVerse"></input>
	<label for="txtVerse">Verse</label>
	<br /><br />

	<label for="txtContent">Content:</label><br />
	<textarea id="txtContent" name="txtContent" rows="4" cols="50"></textarea>
	<br /><br />

	<label>Topics:</label><br />


	  

		<?php
		try
		{
		$statement = $db->prepare('SELECT id, name FROM topic');
		$statement->execute();
	
			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
			$id = $row['id'];
			$name = $row['name'];
		
			echo "<input type='checkbox' name='chkTopics[]' id='chkTopics$id' value='$id'>";
		
			echo "<label for='chkTopics$id'>$name</label><br />";
		
			echo "\n";
			}
		}
		catch (PDOException $ex)
		{
		echo "Error connecting to DB. Details: $ex";
		die();
		}
		
		
		
		
		
		/*
		foreach ($db->query('SELECT * FROM public.scriptures') as $row)
		{
			
			
			echo '<table style="width:100%" ><tr><th>Character Name</th>';
			echo '<th>Player Name</th>';
			echo '<th>Race</th>';
			echo '<th>Class</th>';
			echo '<th>Alignment</th>';
			echo '<th>Level</th>';
			echo '<th>Experience points</th>';
			echo '<th>Maximum HP</th>';
			echo '<th>Current HP</th></tr>';
			echo '<tr><td>' . $row['character_name'] . '</td>';
			echo '<td>' . $row['player_name'] . '</td>';
			echo '<td>' . $row['local_race_id'] . '</td>';
			echo '<td>' . $row['local_class_id'] . '</td>';
			echo '<td>' . $row['local_alignment_id'] . '</td>';
			echo '<td>' . $row['char_level'] . '</td>';
			echo '<td>' . $row['xp'] . '</td>';
			echo '<td>' . $row['hp_max'] . '</td>';
			echo '<td>' . $row['hp_current'] . '</td></tr></table><br/><br/>';
			*/
			
			
		}
		
		?>
		
		<br />

	<input type="submit" value="Add to Database" />

</form>

	</body>
</html>