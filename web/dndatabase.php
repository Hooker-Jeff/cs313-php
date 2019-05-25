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


/*
$qry="SELECT public.character.local_race_id, public.race.race_id FROM public.character INNER JOIN public.race on public.character.local_race_id = public.race.race_id";
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
		
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		
	</style>
	</head>

	<body>

	  <h1> D&D Database </h1>

		<?php
		
		foreach ($db->query('SELECT * FROM public.character') as $row)
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
			echo '<td>' . $row['level'] . '</td>';
			echo '<td>' . $row['xp'] . '</td>';
			echo '<td>' . $row['hp_max'] . '</td>';
			echo '<td>' . $row['hp_current'] . '</td></tr></table><br/><br/>';
			
			
			
			
			
			
			
			
			
			echo ' Strength: ' . $row['str_amnt'];
			echo ' Strength Bonus: ' . $row['str_bonus'];
			echo ' Strength Saving Throw: ' . $row['str_saving'] . '<br/>';
			echo ' Dexterity: ' . $row['dex_amnt'];
			echo ' Dexterity Bonus: ' . $row['dex_bonus'];
			echo ' Dexterity Saving Throw: ' . $row['dex_saving'] . '<br/>';
			echo ' Constitution: ' . $row['con_amnt'];
			echo ' Constitution Bonus: ' . $row['con_bonus'];
			echo ' Constitution Saving Throw: ' . $row['con_saving'] . '<br/>';
			echo ' Intelligence: ' . $row['int_amnt'];
			echo ' Intelligence Bonus: ' . $row['int_bonus'];
			echo ' Intelligence Saving Throw: ' . $row['int_saving'] . '<br/>';
			echo ' Wisdom: ' . $row['wis_amnt'];
			echo ' Wisdom Bonus: ' . $row['wis_bonus'];
			echo ' Wisdom Saving Throw: ' . $row['wis_saving'] . '<br/>';
			echo ' Charisma: ' . $row['cha_amnt'];
			echo ' Charisma Bonus: ' . $row['cha_bonus'];
			echo ' Charisma Saving Throw: ' . $row['cha_saving'] . '<br/>' . '<br/>';
			echo ' Armor Class: ' . $row['ac'];
			echo ' Total Hit Dice: ' . $row['hit_dice'];
			echo ' Proficiency Bonus: ' . $row['proficiency_bonus'];
			echo ' Speed: ' . $row['speed'];
			echo ' Gold: ' . $row['gold'] . '<br/>' . '<br/>';
			echo ' Athletics: ' . $row['ability1'];
			echo ' Acrobatics: ' . $row['ability2'];
			echo ' Slight of Hand: ' . $row['ability3'];
			echo ' Stealth: ' . $row['ability4'];
			echo ' Arcane: ' . $row['ability5'];
			echo ' History: ' . $row['ability6'];
			echo ' Investigation: ' . $row['ability7'];
			echo ' Nature: ' . $row['ability8'];
			echo ' Religion: ' . $row['ability9'];
			echo ' Insight: ' . $row['ability10'];
			echo ' Medicine: ' . $row['ability11'];
			echo ' Animal Handling: ' . $row['ability12'];
			echo ' Perception: ' . $row['ability13'];
			echo ' Survival: ' . $row['ability14'];
			echo ' Deception: ' . $row['ability15'];
			echo ' Intimidation: ' . $row['ability16'];
			echo ' Performance: ' . $row['ability17'];
			echo ' Persuasion: ' . $row['ability18'];
			echo ' </td>' . '<br/>' . '<br/>' . '<br/>';
		}
		?>
	</body>
</html>
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		