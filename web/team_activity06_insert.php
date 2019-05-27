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

$book = $_POST['txtBook'];
$chapter = $_POST['txtChapter'];
$verse = $_POST['txtVerse'];
$content = $_POST['txtContent'];
$topicIds = $_POST['chkTopics'];

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
	  
	  

		<?php
		
		$query = 'INSERT INTO public.scriptures(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';
		$statement = $db->prepare($query);
		
		$statement->bindValue(':book', $book);
		$statement->bindValue(':chapter', $chapter);
		$statement->bindValue(':verse', $verse);
		$statement->bindValue(':content', $content);
		$statement->execute();
		
		$scriptureId = $db->lastInsertId("scripture_id_seq");
		
		foreach ($topicIds as $topicId)
		{
		echo "ScriptureId: $scriptureId, topicId: $topicId";
		
		$statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES(:scriptureId, :topicId)');
		
		$statement->bindValue(':scriptureId', $scriptureId);
		$statement->bindValue(':topicId', $topicId);
		$statement->execute();
		}
		
		catch (Exception $ex)
		{
		echo "Error with DB. Details: $ex";
		die();
		}
		
		header("Location: showTopics.php");
		die();
		
		
		
		
		
		
		
		
		
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
	</body>
</html>