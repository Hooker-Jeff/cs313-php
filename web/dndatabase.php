<?php


if (!isset($_GET['character_id'])) {
	die("Error, character ID not specified");
}


$character_id = htmlspecialchars($_GET['character_id']);


require("dbConnect.php");
$db = get_db();


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
	<title>D&D Database</title>
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
				
		foreach ($rows as $row)
		{
			echo '<h1> D&D info for ' . $row['character_name'] . '</h1><br/>';
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
			echo '<td>' . $row['race_name'] . '</td>';
			echo '<td>' . $row['class_name'] . '</td>';
			echo '<td>' . $row['alignment_name'] . '</td>';
			echo '<td>' . $row['char_level'] . '</td>';
			echo '<td>' . $row['xp'] . '</td>';
			echo '<td>' . $row['hp_max'] . '</td>';
			echo '<td>' . $row['hp_current'] . '</td></tr></table><br/><br/>';
			
			
			
			
			echo '<table align="center" width="50%"><tr><th>Strength</th>';
			echo '<th>Strength Bonus</th>';
			echo '<th>Strength Saving Throw</th></tr>';
			
			echo '<tr><td>' . $row['str_amnt'] . '</td>';
			echo '<td>' . $row['str_bonus'] . '</td>';
			echo '<td>' . $row['str_saving'] . '</td></tr></table>';
			
			echo '<table align="center" width="50%"><tr><th>Dexterity</th>';
			echo '<th>Dexterity Bonus</th>';
			echo '<th>Dexterity Saving Throw</th></tr>';
			
			echo '<tr><td>' . $row['dex_amnt'] . '</td>';
			echo '<td>' . $row['dex_bonus'] . '</td>';
			echo '<td>' . $row['dex_saving'] . '</td></tr></table>';
			
			echo '<table align="center" width="50%"><tr><th>Constitution</th>';
			echo '<th>Constitution Bonus</th>';
			echo '<th>Constitution Saving Throw</th></tr>';
			
			echo '<tr><td>' . $row['con_amnt'] . '</td>';
			echo '<td>' . $row['con_bonus'] . '</td>';
			echo '<td>' . $row['con_saving'] . '</td></tr></table>';
			
			echo '<table align="center" width="50%"><tr><th>Intelligence</th>';
			echo '<th>Intelligence Bonus</th>';
			echo '<th>Intelligence Saving Throw</th></tr>';
			
			echo '<tr><td>' . $row['int_amnt'] . '</td>';
			echo '<td>' . $row['int_bonus'] . '</td>';
			echo '<td>' . $row['int_saving'] . '</td></tr></table>';
			
			echo '<table align="center" width="50%"><tr><th>Wisdom</th>';
			echo '<th>Wisdom Bonus</th>';
			echo '<th>Wisdom Saving Throw</th></tr>';
			
			echo '<tr><td>' . $row['wis_amnt'] . '</td>';
			echo '<td>' . $row['wis_bonus'] . '</td>';
			echo '<td>' . $row['wis_saving'] . '</td></tr></table>';
			
			echo '<table align="center" width="50%"><tr><th>Charisma</th>';
			echo '<th>Charisma Bonus</th>';
			echo '<th>Charisma Saving Throw</th></tr>';
			
			echo '<tr><td>' . $row['cha_amnt'] . '</td>';
			echo '<td>' . $row['cha_bonus'] . '</td>';
			echo '<td>' . $row['cha_saving'] . '</td></tr></table><br/><br/>';
			
			
			
			echo '<table align="center" width="50%"><tr><th>Armor Class</th>';
			echo '<th>Total Hit Dice</th>';
			echo '<th>Proficiency Bonus</th>';
			echo '<th>Speed</th>';
			echo '<th>Gold</th></tr>';
			
			echo '<tr><td>' . $row['ac'] . '</td>';
			echo '<td>' . $row['hit_dice'] . '</td>';
			echo '<td>' . $row['prof_bonus'] . '</td>';
			echo '<td>' . $row['speed'] . '</td>';
			echo '<td>' . $row['gold'] . '</td></tr></table><br/><br/>';
			 
			 
			 
			echo '<table align="center" width="50%"><tr><td>Athletics</td><td>' . $row['ability1'] . '</td></tr>';
			echo '<tr><td>Acrobatics</td><td>' . $row['ability2'] . '</td></tr>';
			echo '<tr><td>Slight of Hand</td><td>' . $row['ability3'] . '</td></tr>';
			echo '<tr><td>Stealth</td><td>' . $row['ability4'] . '</td></tr>';
			echo '<tr><td>Arcane</td><td>' . $row['ability5'] . '</td></tr>';
			echo '<tr><td>History</td><td>' . $row['ability6'] . '</td></tr>';
			echo '<tr><td>Investigation</td><td>' . $row['ability7'] . '</td></tr>';
			echo '<tr><td>Nature</td><td>' . $row['ability8'] . '</td></tr>';
			echo '<tr><td>Religion</td><td>' . $row['ability9'] . '</td></tr>';
			echo '<tr><td>Insight</td><td>' . $row['ability10'] . '</td></tr>';
			echo '<tr><td>Medicine</td><td>' . $row['ability11'] . '</td></tr>';
			echo '<tr><td>Animal Handling</td><td>' . $row['ability12'] . '</td></tr>';
			echo '<tr><td>Perception</td><td>' . $row['ability13'] . '</td></tr>';
			echo '<tr><td>Survival</td><td>' . $row['ability14'] . '</td></tr>';
			echo '<tr><td>Deception</td><td>' . $row['ability15'] . '</td></tr>';
			echo '<tr><td>Intimidation</td><td>' . $row['ability16'] . '</td></tr>';
			echo '<tr><td>Performance</td><td>' . $row['ability17'] . '</td></tr>';
			echo '<tr><td>Persuasion</td><td>' . $row['ability18'] . '</td></tr></table>';
			
			
			echo '<br/><br/><br/>';
		}
		
		?>
		
	</body>
</html>
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		