<?php


$character_id = htmlspecialchars($_POST['character_id']);

$char_name = $_POST['char_name'];
$player_name = $_POST['player_name'];
$race_id = $_POST['race_id'];
$class_id = $_POST['class_id'];
$alignment_id = $_POST['alignment_id'];
$char_level = $_POST['char_level'];
$exp = $_POST['exp'];
$max_hp = $_POST['max_hp'];
$current_hp = $_POST['current_hp'];

$str_level = $_POST['str_level'];
$str_bonus = $_POST['str_bonus'];
$str_saving = $_POST['str_saving'];
$dex_level = $_POST['dex_level'];
$dex_bonus = $_POST['dex_bonus'];
$dex_saving = $_POST['dex_saving'];
$con_level = $_POST['con_level'];
$con_bonus = $_POST['con_bonus'];
$con_saving = $_POST['con_saving'];
$int_level = $_POST['int_level'];
$int_bonus = $_POST['int_bonus'];
$int_saving = $_POST['int_saving'];
$wis_level = $_POST['wis_level'];
$wis_bonus = $_POST['wis_bonus'];
$wis_saving = $_POST['wis_saving'];
$cha_level = $_POST['cha_level'];
$cha_bonus = $_POST['cha_bonus'];
$cha_saving = $_POST['cha_saving'];

$ac = $_POST['ac'];
$hit_dice = $_POST['hit_dice'];
$prof = $_POST['prof'];
$speed = $_POST['speed'];
$gold = $_POST['gold'];

$athletics = $_POST['athletics'];
$acrobatics = $_POST['acrobatics'];
$slight = $_POST['slight'];
$stealth = $_POST['stealth'];
$arcane = $_POST['arcane'];
$history = $_POST['history'];
$investigation = $_POST['investigation'];
$nature = $_POST['nature'];
$religion = $_POST['religion'];
$insight = $_POST['insight'];
$medicine = $_POST['medicine'];
$animal = $_POST['animal'];
$percep = $_POST['percep'];
$survival = $_POST['survival'];
$deception = $_POST['deception'];
$intimidation = $_POST['intimidation'];
$performance = $_POST['performance'];
$persuasion = $_POST['persuasion'];

require("dbConnect.php");
$db = get_db();

try
{
	$query = 'UPDATE character 
	SET char_name = :char_name, player_name = $:player_name '/*, race_id = $race_id, class_id = $class_id, alignment_id = $alignment_id,
	char_level = $char_level,exp = $exp, max_hp = $max_hp, current_hp = $current_hp, 
	str_level = $str_level, str_bonus = $str_bonus, str_saving = $str_saving, 
	dex_level = $dex_level, dex_bonus = $dex_bonus, dex_saving = $dex_saving, 
	con_level = $con_level, con_bonus = $con_bonus, con_saving = $con_saving, 
	int_level = $int_level, int_bonus = $int_bonus, int_saving = $int_saving, 
	wis_level = $wis_level, wis_bonus = $wis_bonus, wis_saving = $wis_saving, 
	cha_level = $cha_level, cha_bonus = $cha_bonus, cha_saving = $cha_saving, 
	ac = $ac, hit_dice = $hit_dice, prof = $prof, speed = $speed, gold = $gold,
	athletics = $athletics, acrobatics = $acrobatics, slight = $slight, 
	stealth = $stealth, arcane = $arcane, history = $history, investigation = $investigation, 
	nature = $nature, religion = $religion, insight = $insight, medicine = $medicine, 
	animal = $animal, percep = $percep, survival = $survival, deception = $deception, 
	intimidation = $intimidation, performance = $performance, persuasion = $persuasion */ . '
	WHERE character_id=$character_id';
	
	
	$stmt = $db->prepare($query);
	$statement->bindValue(':char_name', $char_name);
	$statement->bindValue(':player_name', $player_name);
	$statement->bindValue(':race_id', $race_id);
	$statement->bindValue(':class_id', $class_id);
	$statement->bindValue(':alignment_id', $alignment_id);
	$statement->bindValue(':char_level', $char_level);
	$statement->bindValue(':exp', $exp);
	$statement->bindValue(':max_hp', $max_hp);
	$statement->bindValue(':current_hp', $current_hp);
	
	$statement->bindValue(':str_level', $str_level);
	$statement->bindValue(':str_bonus', $str_bonus);
	$statement->bindValue(':str_saving', $str_saving);
	$statement->bindValue(':dex_level', $dex_level);
	$statement->bindValue(':dex_bonus', $dex_bonus);
	$statement->bindValue(':dex_saving', $dex_saving);
	$statement->bindValue(':con_level', $con_level);
	$statement->bindValue(':con_bonus', $con_bonus);
	$statement->bindValue(':con_saving', $con_saving);
	$statement->bindValue(':int_level', $int_level);
	$statement->bindValue(':int_bonus', $int_bonus);
	$statement->bindValue(':int_saving', $int_saving);
	$statement->bindValue(':wis_level', $wis_level);
	$statement->bindValue(':wis_bonus', $wis_bonus);
	$statement->bindValue(':wis_saving', $wis_saving);
	$statement->bindValue(':cha_level', $cha_level);
	$statement->bindValue(':cha_bonus', $cha_bonus);
	$statement->bindValue(':cha_saving', $cha_saving);
	
	$statement->bindValue(':ac', $ac);
	$statement->bindValue(':hit_dice', $hit_dice);
	$statement->bindValue(':prof', $prof);
	$statement->bindValue(':speed', $speed);
	$statement->bindValue(':gold', $gold);
	
	$statement->bindValue(':athletics', $athletics);
	$statement->bindValue(':acrobatics', $acrobatics);
	$statement->bindValue(':slight', $slight);
	$statement->bindValue(':stealth', $stealth);
	$statement->bindValue(':arcane', $arcane);
	$statement->bindValue(':history', $history);
	$statement->bindValue(':investigation', $investigation);
	$statement->bindValue(':nature', $nature);
	$statement->bindValue(':religion', $religion);
	$statement->bindValue(':insight', $insight);
	$statement->bindValue(':medicine', $medicine);
	$statement->bindValue(':animal', $animal);
	$statement->bindValue(':percep', $percep);
	$statement->bindValue(':survival', $survival);
	$statement->bindValue(':deception', $deception);
	$statement->bindValue(':intimidation', $intimidation);
	$statement->bindValue(':performance', $performance);
	$statement->bindValue(':persuasion', $persuasion);
	
	$statement->execute();
	
	
}
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: datahomepage.php");
die();




?>