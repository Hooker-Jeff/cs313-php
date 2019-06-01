<?php

require("dbConnect.php");
$db = get_db();



?>

<!DOCTYPE html>

<html>

	<head>
	<title>Delete Character</title>
	</head>

	<body>
	
	<h1>Delete character?</h1>
	
	<form id="deleteForm" action="character-delete-confirm.php" method="POST">
	<input type="hidden" name="character_id" value="<?php echo $character_id; ?>">
	<input type="submit" value="Delete Character" />

	</form>
	
	<br/><br/>
	
	<a href="datahomepage.php">Return to homepage</a>
	

	</body>
</html>



























