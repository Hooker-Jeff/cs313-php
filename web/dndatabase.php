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
			echo '<td>' . $row['char_level'] . '</td>';
			echo '<td>' . $row['xp'] . '</td>';
			echo '<td>' . $row['hp_max'] . '</td>';
			echo '<td>' . $row['hp_current'] . '</td></tr></table><br/><br/>';
			
			
			
			
			echo '<table align="center"><tr><th>Strength</th>';
			echo '<th>Strength Bonus</th>';
			echo '<th>Strength Saving Throw</th></tr>';
			
			echo '<tr><td>' . $row['str_amnt'] . '</td>';
			echo '<td>' . $row['str_bonus'] . '</td>';
			echo '<td>' . $row['str_saving'] . '</td></tr></table>';
			
			echo '<table align="center"><tr><th>Dexterity</th>';
			echo '<th>Dexterity Bonus</th>';
			echo '<th>Dexterity Saving Throw</th></tr>';
			
			echo '<td>' . $row['dex_amnt'] . '</td>';
			echo '<td>' . $row['dex_bonus'] . '</td>';
			echo '<td>' . $row['dex_saving'] . '</td></tr></table>';
			
			echo '<table align="center"><tr><th>Constitution</th>';
			echo '<th>Constitution Bonus</th>';
			echo '<th>Constitution Saving Throw</th></tr>';
			
			echo '<td>' . $row['con_amnt'] . '</td>';
			echo '<td>' . $row['con_bonus'] . '</td>';
			echo '<td>' . $row['con_saving'] . '</td></tr></table>';
			
			echo '<table align="center"><tr><th>Intelligence</th>';
			echo '<th>Intelligence Bonus</th>';
			echo '<th>Intelligence Saving Throw</th></tr>';
			
			echo '<td>' . $row['int_amnt'] . '</td>';
			echo '<td>' . $row['int_bonus'] . '</td>';
			echo '<td>' . $row['int_saving'] . '</td></tr></table>';
			
			echo '<table align="center"><tr><th>Wisdom</th>';
			echo '<th>Wisdom Bonus</th>';
			echo '<th>Wisdom Saving Throw</th></tr>';
			
			echo '<td>' . $row['wis_amnt'] . '</td>';
			echo '<td>' . $row['wis_bonus'] . '</td>';
			echo '<td>' . $row['wis_saving'] . '</td></tr></table>';
			
			echo '<table align="center"><tr><th>Charisma</th>';
			echo '<th>Charisma Bonus</th>';
			echo '<th>Charisma Saving Throw</th></tr>';
			
			echo '<td>' . $row['cha_amnt'] . '</td>';
			echo '<td>' . $row['cha_bonus'] . '</td>';
			echo '<td>' . $row['cha_saving'] . '</td></tr></table><br/><br/>';
			
			
			
			
			
			
			
			
			
			
			
			
			
			
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
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		