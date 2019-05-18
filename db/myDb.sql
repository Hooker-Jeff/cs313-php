-- the first table will cover the majority of the character data

CREATE TABLE public.character (
	character_id		SERIAL NOT NULL PRIMARY KEY,								-- id for the character
	character_name		varchar(50) NOT NULL UNIQUE,								-- name for the character
	player_name			varchar(50) NOT NULL,										-- name of the player
	local_race_id		tinyint NOT NULL REFERENCES public.race(race_id),			-- race id number
	local_class_id		tinyint NOT NULL REFERENCES public.class_table(class_id),	-- class id number
	local_alignment_id	tinyint NOT NULL REFERENCES public.alignment(alignment_id),	-- alignment id number
	char_level			tinyint NOT NULL,											-- character level
	xp					int NOT NULL,												-- character total xp
	hp_max				smallint,													-- maximum hp
	hp_current			smallint,													-- current character hp
	str_amnt			tinyint,													-- strength
	str_bonus			tinyint,													-- strength modifier
	str_saving			tinyint,													-- strength saving throw
	dex_amnt			tinyint,													-- dexterity
	dex_bonus			tinyint,													-- dexterity modifier
	dex_saving			tinyint,													-- dexterity saving throw
	con_amnt			tinyint,													-- constitution
	con_bonus			tinyint,													-- constitution modifier
	con_saving			tinyint,													-- constitution saving throw
	int_amnt			tinyint,													-- intelligence
	int_bonus			tinyint,													-- intelligence modifier
	int_saving			tinyint,													-- intelligence saving throw
	wis_amnt			tinyint,													-- wisdom
	wis_bonus			tinyint,													-- wisdom modifier
	wis_saving			tinyint,													-- wisdom saving throw
	cha_amnt			tinyint,													-- charisma
	cha_bonus			tinyint,													-- charisma modifier
	cha_saving			tinyint,													-- charisma saving throw
	ac					tinyint,													-- armor class
	hit_dice			tinyint,													-- hit dice
	prof_bonus			tinyint,													-- proficiency bonus
	speed				tinyint,													-- character speed
	gold				int															-- character gold amount
);



-- the next table will contain the various races

CREATE TABLE public.race (
	race_id				SERIAL smallint NOT NULL PRIMARY KEY,						-- id for the race table
	race_name			varchar(25) NOT NULL										-- race names
);



-- the third table will contain the classes

CREATE TABLE public.class_table (
	class_id			SERIAL smallint NOT NULL PRIMARY KEY,						-- id for the class table
	class_name			varchar(25) NOT NULL										-- class names
);



-- the fourth table will contain the alignments

CREATE TABLE public.alignment (
	alignment_id		SERIAL smallint NOT NULL PRIMARY KEY,						-- id for the alignments
	alignment_name		varchar(25) NOT NULL										-- alignments
);



-- the fifth table will cover the character's inventory

CREATE TABLE public.inventory (
	invent_id			SERIAL int NOT NULL PRIMARY KEY,							-- id for the character's inventory items
	i_char_id			tinyint REFERENCES public.character(character_id),			-- id of the character who has the items
	invent_name			varchar(80) NOT NULL,										-- item name
	invent_note			text NOT NULL												-- info about the item
);



-- the sixth table covers the spell-casting and other magic

CREATE TABLE public.spells (
	magic_id			SERIAL int NOT NULL PRIMARY KEY,							-- id for the spell or magic effect
	m_char_id			tinyint REFERENCES public.character(character_id),			-- id of the character who does the magic
	max_spells_prepared	tinyint,													-- maximum number of spells the character can prepare
	spell_save_dc		tinyint,													-- character's spell save DC
	magic_name			varchar(80) NOT NULL,										-- name of the spell or magical effect
	magic_level			tinyint,													-- level of the spell or effect
	magic_note			text NOT NULL												-- info about the spell or magical effect
);



-- the seventh and final table covers the character's abilities

CREATE TABLE public.abilities (
	ability_id			SERIAL tinyint NOT NULL PRIMARY KEY,						-- id of the ability
	a_char_id			tinyint REFERENCES public.character(character_id),			-- id of the character who has the ability
	ability_name		varchar(20) NOT NULL,										-- name of the ability
	ability_amnt		tinyint														-- value of the ability
);














