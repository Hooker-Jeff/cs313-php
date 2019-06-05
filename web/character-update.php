<?php

require("dbConnect.php");
$db = get_db();

$character_id = htmlspecialchars($_POST['character_id']);

$query='SELECT * FROM character c 
JOIN race r ON c.local_race_id = r.race_id 
JOIN class_table s ON c.local_class_id = s.class_id 
JOIN alignment a ON c.local_alignment_id = a.alignment_id 
WHERE c.character_id = :id';

$stmt = $db->prepare($query);
$stmt->bindValue(':id', $character_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$character_name = $character['character_name'];



?>

<!DOCTYPE html>

<html>

	<head>
	<title>Update Character</title>
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
	
	<h1>Enter Updated Character Information</h1>
	
	<form id="mainForm" action="character-update-confirm.php" method="POST">

	<!--
	<input type="text" id="char_id" name="char_id"></input>
	<label for="char_id">Character ID</label>
	<br /><br />
	-->
	
	<input type="text" id="char_name" name="char_name" value="<?php foreach ($rows as $row)echo $row['character_name'];?>"></input>
	<label for="char_name">Character Name</label>
	<br /><br />

	<input type="text" id="player_name" name="player_name"></input>
	<label for="player_name">Player Name</label>
	<br /><br />

	<input type="text" id="race_id" name="race_id"></input>
	<label for="race_id">Race ID</label>
	<br /><br />
	
	<input type="text" id="class_id" name="class_id"></input>
	<label for="class_id">Class ID</label>
	<br /><br />
	
	<input type="text" id="alignment_id" name="alignment_id"></input>
	<label for="alignment_id">Alignment ID</label>
	<br /><br />

	<input type="text" id="char_level" name="char_level"></input>
	<label for="char_level">Character Level</label>
	<br /><br />

	<input type="text" id="exp" name="exp"></input>
	<label for="exp">Current Experience Points</label>
	<br /><br />
	
	<input type="text" id="max_hp" name="max_hp"></input>
	<label for="max_hp">Maximum HP</label>
	<br /><br />

	<input type="text" id="current_hp" name="current_hp"></input>
	<label for="current_hp">Current HP</label>
	<br /><br /><br /><br />
	
	
	

	<input type="text" id="str_level" name="str_level"></input>
	<label for="str_level">Strength</label>
	<br /><br />
	
	<input type="text" id="str_bonus" name="str_bonus"></input>
	<label for="str_bonus">Strength Bonus</label>
	<br /><br />

	<input type="text" id="str_saving" name="str_saving"></input>
	<label for="str_saving">Strength Saving Throw</label>
	<br /><br />

	<input type="text" id="dex_level" name="dex_level"></input>
	<label for="dex_level">Dexterity</label>
	<br /><br />
	
	<input type="text" id="dex_bonus" name="dex_bonus"></input>
	<label for="dex_bonus">Dexterity Bonus</label>
	<br /><br />

	<input type="text" id="dex_saving" name="dex_saving"></input>
	<label for="dex_saving">Dexterity Saving Throw</label>
	<br /><br />
	
	<input type="text" id="con_level" name="con_level"></input>
	<label for="con_level">Constitution</label>
	<br /><br />
	
	<input type="text" id="con_bonus" name="con_bonus"></input>
	<label for="con_bonus">Constitution Bonus</label>
	<br /><br />

	<input type="text" id="con_saving" name="con_saving"></input>
	<label for="con_saving">Constitution Saving Throw</label>
	<br /><br />
	
	<input type="text" id="int_level" name="int_level"></input>
	<label for="int_level">Intelligence</label>
	<br /><br />
	
	<input type="text" id="int_bonus" name="int_bonus"></input>
	<label for="int_bonus">Intelligence Bonus</label>
	<br /><br />

	<input type="text" id="int_saving" name="int_saving"></input>
	<label for="int_saving">Intelligence Saving Throw</label>
	<br /><br />
	
	<input type="text" id="wis_level" name="wis_level"></input>
	<label for="wis_level">Wisdom</label>
	<br /><br />
	
	<input type="text" id="wis_bonus" name="wis_bonus"></input>
	<label for="wis_bonus">Wisdom Bonus</label>
	<br /><br />

	<input type="text" id="wis_saving" name="wis_saving"></input>
	<label for="wis_saving">Wisdom Saving Throw</label>
	<br /><br />
	
	<input type="text" id="cha_level" name="cha_level"></input>
	<label for="cha_level">Charisma</label>
	<br /><br />
	
	<input type="text" id="cha_bonus" name="cha_bonus"></input>
	<label for="cha_bonus">Charisma Bonus</label>
	<br /><br />

	<input type="text" id="cha_saving" name="cha_saving"></input>
	<label for="cha_saving">Charisma Saving Throw</label>
	<br /><br /><br /><br />
	
	
	
	
	<input type="text" id="ac" name="ac"></input>
	<label for="ac">Armor Class</label>
	<br /><br />
	
	<input type="text" id="hit_dice" name="hit_dice"></input>
	<label for="hit_dice">Total Hit Dice</label>
	<br /><br />

	<input type="text" id="prof" name="prof"></input>
	<label for="prof">Proficiency Bonus</label>
	<br /><br />

	<input type="text" id="speed" name="speed"></input>
	<label for="speed">Character Speed</label>
	<br /><br />
	
	<input type="text" id="gold" name="gold"></input>
	<label for="gold">Character Gold</label>
	<br /><br /><br /><br />
	
	
	
	

	<input type="text" id="athletics" name="athletics"></input>
	<label for="athletics">Athletics</label>
	<br /><br />

	<input type="text" id="acrobatics" name="acrobatics"></input>
	<label for="acrobatics">Acrobatics</label>
	<br /><br />
	
	<input type="text" id="slight" name="slight"></input>
	<label for="slight">Slight of Hand</label>
	<br /><br />

	<input type="text" id="stealth" name="stealth"></input>
	<label for="stealth">Stealth</label>
	<br /><br />

	<input type="text" id="arcane" name="arcane"></input>
	<label for="arcane">Arcane</label>
	<br /><br />
	
	<input type="text" id="history" name="history"></input>
	<label for="history">History</label>
	<br /><br />

	<input type="text" id="investigation" name="investigation"></input>
	<label for="investigation">Investigation</label>
	<br /><br />

	<input type="text" id="nature" name="nature"></input>
	<label for="nature">Nature</label>
	<br /><br />
	
	<input type="text" id="religion" name="religion"></input>
	<label for="religion">Religion</label>
	<br /><br />

	<input type="text" id="insight" name="insight"></input>
	<label for="insight">Insight</label>
	<br /><br />

	<input type="text" id="medicine" name="medicine"></input>
	<label for="medicine">Medicine</label>
	<br /><br />
	
	<input type="text" id="animal" name="animal"></input>
	<label for="animal">Animal Handling</label>
	<br /><br />

	<input type="text" id="percep" name="percep"></input>
	<label for="percep">Perception</label>
	<br /><br />

	<input type="text" id="survival" name="survival"></input>
	<label for="survival">Survival</label>
	<br /><br />
	
	<input type="text" id="deception" name="deception"></input>
	<label for="deception">Deception</label>
	<br /><br />

	<input type="text" id="intimidation" name="intimidation"></input>
	<label for="intimidation">Intimidation</label>
	<br /><br />

	<input type="text" id="performance" name="performance"></input>
	<label for="performance">Performance</label>
	<br /><br />

	<input type="text" id="persuasion" name="persuasion"></input>
	<label for="persuasion">Persuasion</label>
	<br /><br />


	<input type="submit" value="Update Character" />

	</form>

	</body>
</html>