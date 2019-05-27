<?php

require("dbConnect.php");
$db = get_db();


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
		try {
		
		$statement = $db->prepare('SELECT id, book, chapter, verse, content FROM public.scriptures');
		$statement->execute();
		
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		echo '<p>';
		echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
		echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
		echo '<br/>';
		echo 'Topics: ';
		
		$stmtTopics = $db->prepare('SELECT name FROM topic t'
			. ' INNER JOIN scripture_topic st ON st.topicId = t.id'
			. ' WHERE st.scriptureId = :scriptureId');
		$stmtTopics->bindValue(':scriptureId', $row['id']);
		$stmtTopics->execute();
		
		while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
		{
			echo $topicRow['name'] . ' ';
		}
		echo '</p>';
		}
	
	}
	catch (PDOException $ex)
	{
	echo "Error with DB. Details: $ex";
	die();
	}
		
		?>
	</body>
</html>