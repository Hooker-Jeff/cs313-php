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
		
			
		foreach ($db->query('SELECT * FROM public.character WHERE character_name = $_POST['"DnDForm"'] ') as $row)
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
		}
		?>
	</body>
</html>
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		