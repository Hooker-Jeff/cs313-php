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
	
	<input type="text" id="char_name" name="char_name" value="<?php foreach ($rows as $row)echo $row['character_name'];?>" required></input>
	<label for="char_name">Character Name</label>
	<br /><br />

	<input type="text" id="player_name" name="player_name" value="<?php foreach ($rows as $row)echo $row['player_name'];?>" required></input>
	<label for="player_name">Player Name</label>
	<br /><br />

	<input type="number" id="race_id" name="race_id" min="10" max="18" value="<?php foreach ($rows as $row)echo $row['local_race_id'];?>" required></input>
	<label for="race_id">Race ID</label>
	<br />
	<p>(10-Dwarf, 11-Elf, 12-Halfling, 13-Human, 14-Dragonborn, 15-Gnome, 16-Half Elf, 17-Half Ork, 18-Tiefling)</p><br />
	
	<input type="number" id="class_id" name="class_id" min="20" max="31" value="<?php foreach ($rows as $row)echo $row['local_class_id'];?>" required></input>
	<label for="class_id">Class ID</label>
	<br />
	<p>(20-Barbarian, 21-Bard, 22-Cleric, 23-Druid, 24-Fighter, 25-Monk, 26-Paladin, 27-Ranger, 28-Rogue, 29-Sorcerer, 30-Warlock, 31-Wizard)</p><br />
	
	<input type="number" id="alignment_id" name="alignment_id" min="40" max="48" value="<?php foreach ($rows as $row)echo $row['local_alignment_id'];?>" required></input>
	<label for="alignment_id">Alignment ID</label>
	<br />
	<p>(40-Lawful Good, 41-Lawful Neutral, 42-Lawful Evil, 43-Neutral Good, 44-True Neutral, 45-Neutral Evil, 46-Chaotic Good, 47-Chaotic Neutral, 48-Chaotic Evil)</p><br />

	<input type="number" id="char_level" name="char_level" min="0" max="20" value="<?php foreach ($rows as $row)echo $row['char_level'];?>" required></input>
	<label for="char_level">Character Level</label>
	<br /><br />

	<input type="text" id="exp" name="exp" value="<?php foreach ($rows as $row)echo $row['xp'];?>" pattern="[0-9]+" title="Number of experience points" required></input>
	<label for="exp">Current Experience Points</label>
	<br /><br />
	
	<input type="text" id="max_hp" name="max_hp" value="<?php foreach ($rows as $row)echo $row['hp_max'];?>" required pattern="[0-9]+" title="Total number of health points"></input>
	<label for="max_hp">Maximum HP</label>
	<br /><br />

	<input type="text" id="current_hp" name="current_hp" value="<?php foreach ($rows as $row)echo $row['hp_current'];?>" required pattern="[0-9]+" title="Current number of health points"></input>
	<label for="current_hp">Current HP</label>
	<br /><br /><br /><br />
	
	
	

	<input type="text" id="str_level" name="str_level" value="<?php foreach ($rows as $row)echo $row['str_amnt'];?>" pattern="[0-9]+" title="Number representing strength level"></input>
	<label for="str_level">Strength</label>
	<br /><br />
	
	<input type="text" id="str_bonus" name="str_bonus" value="<?php foreach ($rows as $row)echo $row['str_bonus'];?>" pattern="[0-9]+" title="Number representing strength bonus"></input>
	<label for="str_bonus">Strength Bonus</label>
	<br /><br />

	<input type="text" id="str_saving" name="str_saving" value="<?php foreach ($rows as $row)echo $row['str_saving'];?>" pattern="[0-9]+" title="Number representing strength saving throw"></input>
	<label for="str_saving">Strength Saving Throw</label>
	<br /><br />

	<input type="text" id="dex_level" name="dex_level" value="<?php foreach ($rows as $row)echo $row['dex_amnt'];?>" pattern="[0-9]+" title="Number representing dexterity level"></input>
	<label for="dex_level">Dexterity</label>
	<br /><br />
	
	<input type="text" id="dex_bonus" name="dex_bonus" value="<?php foreach ($rows as $row)echo $row['dex_bonus'];?>" pattern="[0-9]+" title="Number representing dexterity bonus"></input>
	<label for="dex_bonus">Dexterity Bonus</label>
	<br /><br />

	<input type="text" id="dex_saving" name="dex_saving" value="<?php foreach ($rows as $row)echo $row['dex_saving'];?>" pattern="[0-9]+" title="Number representing dexterity saving throw"></input>
	<label for="dex_saving">Dexterity Saving Throw</label>
	<br /><br />
	
	<input type="text" id="con_level" name="con_level" value="<?php foreach ($rows as $row)echo $row['con_amnt'];?>" pattern="[0-9]+" title="Number representing constitution level"></input>
	<label for="con_level">Constitution</label>
	<br /><br />
	
	<input type="text" id="con_bonus" name="con_bonus" value="<?php foreach ($rows as $row)echo $row['con_bonus'];?>" pattern="[0-9]+" title="Number representing constitution bonus"></input>
	<label for="con_bonus">Constitution Bonus</label>
	<br /><br />

	<input type="text" id="con_saving" name="con_saving" value="<?php foreach ($rows as $row)echo $row['con_saving'];?>" pattern="[0-9]+" title="Number representing constitution saving throw"></input>
	<label for="con_saving">Constitution Saving Throw</label>
	<br /><br />
	
	<input type="text" id="int_level" name="int_level" value="<?php foreach ($rows as $row)echo $row['int_amnt'];?>" pattern="[0-9]+" title="Number representing intelligence level"></input>
	<label for="int_level">Intelligence</label>
	<br /><br />
	
	<input type="text" id="int_bonus" name="int_bonus" value="<?php foreach ($rows as $row)echo $row['int_bonus'];?>" pattern="[0-9]+" title="Number representing intelligence bonus"></input>
	<label for="int_bonus">Intelligence Bonus</label>
	<br /><br />

	<input type="text" id="int_saving" name="int_saving" value="<?php foreach ($rows as $row)echo $row['int_saving'];?>" pattern="[0-9]+" title="Number representing intelligence saving throw"></input>
	<label for="int_saving">Intelligence Saving Throw</label>
	<br /><br />
	
	<input type="text" id="wis_level" name="wis_level" value="<?php foreach ($rows as $row)echo $row['wis_amnt'];?>" pattern="[0-9]+" title="Number representing wisdom level"></input>
	<label for="wis_level">Wisdom</label>
	<br /><br />
	
	<input type="text" id="wis_bonus" name="wis_bonus" value="<?php foreach ($rows as $row)echo $row['wis_bonus'];?>" pattern="[0-9]+" title="Number representing wisdom bonus"></input>
	<label for="wis_bonus">Wisdom Bonus</label>
	<br /><br />

	<input type="text" id="wis_saving" name="wis_saving" value="<?php foreach ($rows as $row)echo $row['wis_saving'];?>" pattern="[0-9]+" title="Number representing wisdom saving throw"></input>
	<label for="wis_saving">Wisdom Saving Throw</label>
	<br /><br />
	
	<input type="text" id="cha_level" name="cha_level" value="<?php foreach ($rows as $row)echo $row['cha_amnt'];?>" pattern="[0-9]+" title="Number representing charisma level"></input>
	<label for="cha_level">Charisma</label>
	<br /><br />
	
	<input type="text" id="cha_bonus" name="cha_bonus" value="<?php foreach ($rows as $row)echo $row['cha_bonus'];?>" pattern="[0-9]+" title="Number representing charisma bonus"></input>
	<label for="cha_bonus">Charisma Bonus</label>
	<br /><br />

	<input type="text" id="cha_saving" name="cha_saving" value="<?php foreach ($rows as $row)echo $row['cha_saving'];?>" pattern="[0-9]+" title="Number representing charisma saving throw"></input>
	<label for="cha_saving">Charisma Saving Throw</label>
	<br /><br /><br /><br />
	
	
	
	
	<input type="number" id="ac" name="ac" min="8" max="50" value="<?php foreach ($rows as $row)echo $row['ac'];?>"></input>
	<label for="ac">Armor Class</label>
	<br /><br />
	
	<input type="number" id="hit_dice" name="hit_dice" min="1" max="20" value="<?php foreach ($rows as $row)echo $row['hit_dice'];?>"></input>
	<label for="hit_dice">Total Hit Dice</label>
	<br /><br />

	<input type="number" id="prof" name="prof" min="1" max="10" value="<?php foreach ($rows as $row)echo $row['prof_bonus'];?>"></input>
	<label for="prof">Proficiency Bonus</label>
	<br /><br />

	<input type="text" id="speed" name="speed" value="<?php foreach ($rows as $row)echo $row['speed'];?>" pattern="[0-9]+" title="Number representing character speed"></input>
	<label for="speed">Character Speed</label>
	<br /><br />
	
	<input type="text" id="gold" name="gold" value="<?php foreach ($rows as $row)echo $row['gold'];?>" pattern="[0-9]+" title="Number of gold pieces"></input>
	<label for="gold">Character Gold</label>
	<br /><br /><br /><br />
	
	
	
	

	<input type="text" id="athletics" name="athletics" value="<?php foreach ($rows as $row)echo $row['ability1'];?>" pattern="[0-9]+" title="Number representing athletics skill level"></input>
	<label for="athletics">Athletics</label>
	<br /><br />

	<input type="text" id="acrobatics" name="acrobatics" value="<?php foreach ($rows as $row)echo $row['ability2'];?>" pattern="[0-9]+" title="Number representing acrobatics skill level"></></input>
	<label for="acrobatics">Acrobatics</label>
	<br /><br />
	
	<input type="text" id="slight" name="slight" value="<?php foreach ($rows as $row)echo $row['ability3'];?>" pattern="[0-9]+" title="Number representing slight of hand skill level"></></input>
	<label for="slight">Slight of Hand</label>
	<br /><br />

	<input type="text" id="stealth" name="stealth" value="<?php foreach ($rows as $row)echo $row['ability4'];?>" pattern="[0-9]+" title="Number representing stealth skill level"></></input>
	<label for="stealth">Stealth</label>
	<br /><br />

	<input type="text" id="arcane" name="arcane" value="<?php foreach ($rows as $row)echo $row['ability5'];?>" pattern="[0-9]+" title="Number representing arcane skill level"></></input>
	<label for="arcane">Arcane</label>
	<br /><br />
	
	<input type="text" id="history" name="history" value="<?php foreach ($rows as $row)echo $row['ability6'];?>" pattern="[0-9]+" title="Number representing history skill level"></></input>
	<label for="history">History</label>
	<br /><br />

	<input type="text" id="investigation" name="investigation" value="<?php foreach ($rows as $row)echo $row['ability7'];?>" pattern="[0-9]+" title="Number representing investigation skill level"></></input>
	<label for="investigation">Investigation</label>
	<br /><br />

	<input type="text" id="nature" name="nature" value="<?php foreach ($rows as $row)echo $row['ability8'];?>" pattern="[0-9]+" title="Number representing nature skill level"></></input>
	<label for="nature">Nature</label>
	<br /><br />
	
	<input type="text" id="religion" name="religion" value="<?php foreach ($rows as $row)echo $row['ability9'];?>" pattern="[0-9]+" title="Number representing religion skill level"></></input>
	<label for="religion">Religion</label>
	<br /><br />

	<input type="text" id="insight" name="insight" value="<?php foreach ($rows as $row)echo $row['ability10'];?>" pattern="[0-9]+" title="Number representing insight skill level"></></input>
	<label for="insight">Insight</label>
	<br /><br />

	<input type="text" id="medicine" name="medicine" value="<?php foreach ($rows as $row)echo $row['ability11'];?>" pattern="[0-9]+" title="Number representing medicine skill level"></></input>
	<label for="medicine">Medicine</label>
	<br /><br />
	
	<input type="text" id="animal" name="animal" value="<?php foreach ($rows as $row)echo $row['ability12'];?>" pattern="[0-9]+" title="Number representing animal handling skill level"></></input>
	<label for="animal">Animal Handling</label>
	<br /><br />

	<input type="text" id="percep" name="percep" value="<?php foreach ($rows as $row)echo $row['ability13'];?>" pattern="[0-9]+" title="Number representing perception skill level"></></input>
	<label for="percep">Perception</label>
	<br /><br />

	<input type="text" id="survival" name="survival" value="<?php foreach ($rows as $row)echo $row['ability14'];?>" pattern="[0-9]+" title="Number representing survival skill level"></></input>
	<label for="survival">Survival</label>
	<br /><br />
	
	<input type="text" id="deception" name="deception" value="<?php foreach ($rows as $row)echo $row['ability15'];?>" pattern="[0-9]+" title="Number representing deception skill level"></></input>
	<label for="deception">Deception</label>
	<br /><br />

	<input type="text" id="intimidation" name="intimidation" value="<?php foreach ($rows as $row)echo $row['ability16'];?>" pattern="[0-9]+" title="Number representing intimidation skill level"></></input>
	<label for="intimidation">Intimidation</label>
	<br /><br />

	<input type="text" id="performance" name="performance" value="<?php foreach ($rows as $row)echo $row['ability17'];?>" pattern="[0-9]+" title="Number representing performance skill level"></></input>
	<label for="performance">Performance</label>
	<br /><br />

	<input type="text" id="persuasion" name="persuasion" value="<?php foreach ($rows as $row)echo $row['ability18'];?>" pattern="[0-9]+" title="Number representing persuasion skill level"></></input>
	<label for="persuasion">Persuasion</label>
	<br /><br />


	<input type="submit" value="Update Character" />

	</form>
	
	<form method="post" action="datahomepage.php">
		<input type="submit" value="Go Home">
	</form>

	</body>
</html>