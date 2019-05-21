<?php

	try

	{

	  $dbUrl = getenv('DATABASE_URL');



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

	  	echo "Error connecting to DB. Details: $ex";
		
		die();

	}

?>

<!DOCTYPE html>

<html>

	<head>

	  <style>

	    * {

		  text-align: center;

		}

	  </style>

	</head>

	<body>

	  <h1> Scripture Resources </h1>

		<?php
		
			$statement = $db->prepare("SELECT book, chapter, verse, content FROM scripture");
			$statement->execute();

			while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$book = $row['book'];
			$chapter = $row['chapter'];
			$verse = $row['verse'];
			$content = $row['content'];
			echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
			}

		?>

	</body>

<html>