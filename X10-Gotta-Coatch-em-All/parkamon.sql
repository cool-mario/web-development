-- parkamon
CREATE TABLE IF NOT EXISTS `parkamon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `breed` text,
  `location` text,
  PRIMARY KEY (`id`)
);

INSERT INTO `parkamon` 
	(`breed`, `location`) 
VALUES
	('Bulbacoat', 'forest'),
	('Tentacoat', 'shore'),
	('Articoato', 'tundra'),
	('Parkachu', 'forest'),
	('Magicoat', 'shore'),
	('Coatster', 'tundra'),
	('Jacketlypuff', 'sky'),
	('Dragoncoat', 'sky'),
	('Parkawhirl', 'shore');

-- player
CREATE TABLE IF NOT EXISTS `player` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(10),
	PRIMARY KEY (`id`)
);
	
INSERT INTO player
	(`name`)
VALUES
    ('Parthenia'),
	('Tomika'),
	('Kip'),
	('Imelda'),
	('Geoffrey'),
	('Shanel'),
	('Lilliana'),
	('Deloris'),
	('Giovanna'),
	('Suanne');

-- ownership
CREATE TABLE IF NOT EXISTS `ownership` (
	`id` int NOT NULL AUTO_INCREMENT, 
	`player_id` int,
	`parkamon_id` int,
	`nickname` varchar(8),
	PRIMARY KEY (`id`)
);