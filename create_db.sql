USE xkaliv06;
SET NAMES 'iso-8859-2';

drop table if exists Kino CASCADE;
drop table if exists Sal CASCADE;
drop table if exists Film CASCADE;
drop table if exists Zanr CASCADE;
drop table if exists Zamestnanec CASCADE;
drop table if exists Projekce CASCADE;
drop table if exists Sedadlo CASCADE;
drop table if exists Prodej CASCADE;
drop table if exists Klient CASCADE;
drop table if exists Rezervace CASCADE;
drop table if exists VIP_Klient CASCADE;
drop table if exists Patri CASCADE;

CREATE TABLE `Kino` (
	`id_kina` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nazev VARCHAR(50) NOT NULL COLLATE latin2_czech_cs,
	mesto VARCHAR(50) COLLATE latin2_czech_cs,
	adresa VARCHAR(50) COLLATE latin2_czech_cs,
	telefoni_cislo VARCHAR(20) NOT NULL
);

CREATE TABLE `Sal` (
	`id_salu` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`id_kina` INTEGER NOT NULL,
	nazev VARCHAR(50) COLLATE latin2_czech_cs,
	velikost INTEGER NOT NULL,
	zpusob_promitani VARCHAR(50) COLLATE latin2_czech_cs
);

CREATE TABLE `Film` (
	`id_filmu` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`id_zanru` INTEGER NOT NULL,
	nazev VARCHAR(50) NOT NULL COLLATE latin2_czech_cs,
	autor  VARCHAR(50) COLLATE latin2_czech_cs,
	delka INTEGER,
	datum_prijeti DATETIME,
	obrazek_cesta VARCHAR(50)
);

CREATE TABLE `Zanr` (
	`id_zanru` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nazev VARCHAR(512) NOT NULL COLLATE latin2_czech_cs
);

CREATE TABLE `Zamestnanec` (
	`id_zamestnance` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`id_sef` INTEGER,
	`id_kina` INTEGER NOT NULL,
	jmeno VARCHAR(50) COLLATE latin2_czech_cs,
	prijmeni VARCHAR(50) COLLATE latin2_czech_cs,
	login VARCHAR(50) UNIQUE NOT NULL COLLATE latin2_czech_cs,
	heslo VARCHAR(50) NOT NULL COLLATE latin2_czech_cs,
	adresa VARCHAR(50) COLLATE latin2_czech_cs,
	telefoni_cislo VARCHAR(20)
);

CREATE TABLE `Projekce` (
	`id_projekce` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`id_salu` INTEGER NOT NULL,
	`id_filmu` INTEGER NOT NULL,
	cas_zahajeni DATETIME,
	cas_ukonceni DATETIME
);

CREATE TABLE `Sedadlo` (
	`id_sedadla` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`id_salu` INTEGER NOT NULL,
	pozice INTEGER
);

CREATE TABLE `Prodej` (
	`id_prodeje` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`id_zamestnance` INTEGER NOT NULL,
	`id_rezervace` INTEGER NOT NULL,
	cena INTEGER,
	datum DATETIME
);

CREATE TABLE `Klient` (
	`id_klienta` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	jmeno VARCHAR(50) NOT NULL COLLATE latin2_czech_cs,
	prijmeni  VARCHAR(50) NOT NULL COLLATE latin2_czech_cs,
	username VARCHAR(50) UNIQUE NOT NULL COLLATE latin2_czech_cs,
	heslo VARCHAR(50) NOT NULL COLLATE latin2_czech_cs,
	vek INTEGER
);

CREATE TABLE `Rezervace` (
	`id_rezervace` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`id_klienta` int(10) NOT NULL,
	`id_projekce` INTEGER NOT NULL,
	datum DATETIME NOT NULL,
	stav TINYINT(1),
	telefoni_cislo VARCHAR(20)
);

CREATE TABLE `VIP_Klient` (
	`id_klienta` int(10) NOT NULL,
	telefoni_cislo VARCHAR(20),
	adresa VARCHAR(50) COLLATE latin2_czech_cs,
	sleva INTEGER,
	platnost DATETIME
);

CREATE TABLE `Patri` (
	`id_rezervace` INTEGER NOT NULL,
	`id_sedadla` INTEGER NOT NULL
);

ALTER TABLE `Sal` ADD INDEX (`id_kina`) ;
ALTER TABLE `Sal` ADD CONSTRAINT `fk_Kino_sal` FOREIGN KEY (`id_kina`) REFERENCES `Kino` (`id_kina`) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE `Film` ADD INDEX (`id_zanru`) ;
ALTER TABLE `Film` ADD CONSTRAINT `fk_Zanr_film` FOREIGN KEY (`id_zanru`) REFERENCES `Zanr` (`id_zanru`) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE `Zamestnanec` ADD INDEX (`id_kina`) ;
ALTER TABLE `Zamestnanec` ADD INDEX (`id_sef`) ;
ALTER TABLE `Zamestnanec` ADD CONSTRAINT `fk_Sef_zam` FOREIGN KEY (`id_sef`) REFERENCES `Zamestnanec` (`id_zamestnance`) ON DELETE RESTRICT ON UPDATE RESTRICT ;
ALTER TABLE `Zamestnanec` ADD CONSTRAINT `fk_Kino_zam` FOREIGN KEY (`id_kina`) REFERENCES `Kino` (`id_kina`) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE `Projekce` ADD INDEX (`id_filmu`) ;
ALTER TABLE `Projekce` ADD INDEX (`id_salu`) ;
ALTER TABLE `Projekce` ADD CONSTRAINT `fk_Film_proj` FOREIGN KEY (`id_filmu`) REFERENCES `Film` (`id_filmu`) ON DELETE RESTRICT ON UPDATE RESTRICT ;
ALTER TABLE `Projekce` ADD CONSTRAINT `fk_Sal_proj` FOREIGN KEY (`id_salu`) REFERENCES `Sal` (`id_salu`) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE `Sedadlo` ADD INDEX (`id_salu`) ;
ALTER TABLE `Sedadlo` ADD CONSTRAINT `fk_Sal_sed` FOREIGN KEY (`id_salu`) REFERENCES `Sal` (`id_salu`) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE `Prodej` ADD INDEX (`id_zamestnance`) ;
ALTER TABLE `Prodej` ADD INDEX (`id_rezervace`) ;
ALTER TABLE `Prodej` ADD CONSTRAINT `fk_Zam_prod` FOREIGN KEY (`id_zamestnance`) REFERENCES `Zamestnanec` (`id_zamestnance`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `Prodej` ADD CONSTRAINT `fk_Rez_prod` FOREIGN KEY (`id_rezervace`) REFERENCES `Rezervace` (`id_rezervace`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `Rezervace` ADD INDEX (`id_klienta`) ;
ALTER TABLE `Rezervace` ADD INDEX (`id_projekce`) ;
ALTER TABLE `Rezervace` ADD CONSTRAINT `fk_Klient_rez` FOREIGN KEY (`id_klienta`) REFERENCES `Klient` (`id_klienta`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `Rezervace` ADD CONSTRAINT `fk_Proj_rez` FOREIGN KEY (`id_projekce`) REFERENCES `Projekce` (`id_projekce`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `Patri` ADD INDEX (`id_rezervace`) ;
ALTER TABLE `Patri` ADD INDEX (`id_sedadla`) ;
ALTER TABLE `Patri` ADD CONSTRAINT `fk_id_rez_id_sed` PRIMARY KEY (`id_rezervace`, `id_sedadla`);
ALTER TABLE `Patri` ADD CONSTRAINT `fk_Rez_patri` FOREIGN KEY (`id_rezervace`) REFERENCES `Rezervace` (`id_rezervace`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `Patri` ADD CONSTRAINT `fk_Sed_patri` FOREIGN KEY (`id_sedadla`) REFERENCES `Sedadlo` (`id_sedadla`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `VIP_Klient` ADD INDEX (`id_klienta`) ;
ALTER TABLE `VIP_Klient` ADD CONSTRAINT `fk_Klient_VIP` FOREIGN KEY (`id_klienta`) REFERENCES `Klient` (`id_klienta`) ON DELETE RESTRICT ON UPDATE RESTRICT;


ALTER TABLE `Projekce`
	ADD CONSTRAINT chk_cas_zah_cas_ukonc
	CHECK (cas_zahajeni <= cas_ukonceni);


INSERT INTO Kino VALUES (1, 'Kino Brno', 'Brno', 'Kolejní', 666888999);
INSERT INTO Kino VALUES (2, 'Kino Praha', 'Praha', 'Nádraní', 789456123);
INSERT INTO Kino VALUES (3, 'Kino Ostrava', 'Ostrava', 'Provaznická', 321654987);

INSERT INTO Sal VALUES (1, 2, '12', 300, '3D, 2D');
INSERT INTO Sal VALUES (2, 3, '8', 120, '3D, 2D');
INSERT INTO Sal VALUES (3, 1, '5', 80, '2D');

INSERT INTO Zanr VALUES (1, 'Rodinný');
INSERT INTO Zanr VALUES (2, 'Komedie');
INSERT INTO Zanr VALUES (3, 'Thriller');
INSERT INTO Zanr VALUES (4, 'Drama');
INSERT INTO Zanr VALUES (5, 'Horror');
INSERT INTO Zanr VALUES (6, 'Dokumentární');
INSERT INTO Zanr VALUES (7, 'Akční');
INSERT INTO Zanr VALUES (8, 'Dobrodružný');
INSERT INTO Zanr VALUES (9, 'Sci-fi');

INSERT INTO Film VALUES (1, 1, 'Les', 'Woody Allen', 96, STR_TO_DATE('25.09.2014','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (2, 4, 'Hello', 'Adele Buckingham', 96, STR_TO_DATE('25.09.2014','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (3, 9, 'Star Wars: Jabba Hutt je zpět', 'George Lucas', 102, STR_TO_DATE('01.01.2015','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (4, 7, 'Rambo', 'Steven Segal', 95, STR_TO_DATE('10.05.2013','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (5, 6, 'Rambo vs. Terminator', 'Arnold Schwarzeneger', 149, STR_TO_DATE('01.03.2015','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (6, 7, 'Rychle a Zběsile 12: Transormers vrací úder', 'Clint Eastwood', 159, STR_TO_DATE('02.05.2015','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (7, 8, 'Harry Potter: Muddle Story', 'Zdeněk Troška', 65, STR_TO_DATE('02.05.2015','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (8, 6, '8000 Metrů nad Mořem', 'Willy Guy', 90, STR_TO_DATE('02.05.2015','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (9, 4, 'Kód Pravdy', 'Jáchym Hladil', 159, STR_TO_DATE('02.05.2015','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (10, 6, 'Mars: Voda a život', 'John Geller', 102, STR_TO_DATE('02.05.2015','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (11, 2, 'Policie Ulanbatar: Zmizení jurty', 'Sechuan Jiang', 96, STR_TO_DATE('02.05.2015','%d.%m.%Y'), NULL);
INSERT INTO Film VALUES (12, 1, 'Agent ve šlole 3', 'Sheldon Reynolds', 80, STR_TO_DATE('02.05.2015','%d.%m.%Y'), NULL);

INSERT INTO Zamestnanec VALUES (1, NULL, 1, 'Petr', 'Bříza', 'xbriz00', 'angryturkey', 'Kolejní 5, Brno', 666888999);
INSERT INTO Zamestnanec VALUES (2, 1, 1, 'Lucie', 'Pravdová', 'xprav00', 'angryturkey', 'Purkňova 16, Brno', 724589659);
INSERT INTO Zamestnanec VALUES (3, 1, 2, 'Robert', 'Mrůz', 'xmruz00', 'angryturkey', 'Kolejní 5, Praha', 765489321);
INSERT INTO Zamestnanec VALUES (4, 3, 2, 'Jan', 'Luke', 'xluke00', 'angryturkey', 'Nerudova 12, Praha', 654987321);
INSERT INTO Zamestnanec VALUES (5, 1, 3, 'Andrea', 'Cibulková', 'xcibu00', 'angryturkey', 'Provaznická 5, Ostrava', 601248923);
INSERT INTO Zamestnanec VALUES (6, 5, 3, 'Stanislav', 'Mladý', 'xmlad00', 'angryturkey', 'Horní 16, Ostrava', 741852963);
INSERT INTO Zamestnanec VALUES (7, 6, 3, 'Lenka', 'Vrbová', 'xvrbo00', 'angryturkey', 'Klegova 5, Ostrava', 753869421);
INSERT INTO Zamestnanec VALUES (8, 6, 3, 'Bohumil', 'Vrtal', 'xvrta00', 'angryturkey', 'Masarykova 7, Ostrava', 621598473);

INSERT INTO Projekce VALUES (1, 2, 1, STR_TO_DATE('01.04.2015 12:30','%d.%m.%Y %T'), STR_TO_DATE('01.04.2015 20:45','%d.%m.%Y %T'));
INSERT INTO Projekce VALUES (2, 2, 2, STR_TO_DATE('03.04.2015 09:30','%d.%m.%Y %T'), STR_TO_DATE('03.04.2015 18:00','%d.%m.%Y %T'));
INSERT INTO Projekce VALUES (3, 1, 3, STR_TO_DATE('09.04.2015 18:30','%d.%m.%Y %T'), STR_TO_DATE('09.04.2015 10:45','%d.%m.%Y %T'));
INSERT INTO Projekce VALUES (4, 3, 4, STR_TO_DATE('01.04.2015 20:30','%d.%m.%Y %T'), STR_TO_DATE('01.04.2015 14:15','%d.%m.%Y %T'));
INSERT INTO Projekce VALUES (5, 3, 4, STR_TO_DATE('22.06.2015 18:30','%d.%m.%Y %T'), STR_TO_DATE('22.06.2015 22:50','%d.%m.%Y %T'));

INSERT INTO Sedadlo VALUES (1, 1, 1);
INSERT INTO Sedadlo VALUES (2, 1, 2);
INSERT INTO Sedadlo VALUES (3, 1, 3);
INSERT INTO Sedadlo VALUES (4, 1, 4);
INSERT INTO Sedadlo VALUES (5, 1, 5);
INSERT INTO Sedadlo VALUES (6, 1, 6);
INSERT INTO Sedadlo VALUES (7, 1, 7);
INSERT INTO Sedadlo VALUES (8, 1, 8);
INSERT INTO Sedadlo VALUES (9, 1, 9);
INSERT INTO Sedadlo VALUES (10, 1, 10);
INSERT INTO Sedadlo VALUES (11, 2, 1);
INSERT INTO Sedadlo VALUES (12, 2, 2);
INSERT INTO Sedadlo VALUES (13, 2, 3);
INSERT INTO Sedadlo VALUES (14, 2, 4);
INSERT INTO Sedadlo VALUES (15, 2, 5);
INSERT INTO Sedadlo VALUES (16, 2, 6);
INSERT INTO Sedadlo VALUES (17, 2, 7);
INSERT INTO Sedadlo VALUES (18, 2, 8);
INSERT INTO Sedadlo VALUES (19, 2, 9);
INSERT INTO Sedadlo VALUES (20, 2, 10);
INSERT INTO Sedadlo VALUES (21, 3, 1);
INSERT INTO Sedadlo VALUES (22, 3, 2);
INSERT INTO Sedadlo VALUES (23, 3, 3);
INSERT INTO Sedadlo VALUES (24, 3, 4);
INSERT INTO Sedadlo VALUES (25, 3, 5);
INSERT INTO Sedadlo VALUES (26, 3, 6);
INSERT INTO Sedadlo VALUES (27, 3, 7);
INSERT INTO Sedadlo VALUES (28, 3, 8);
INSERT INTO Sedadlo VALUES (29, 3, 9);
INSERT INTO Sedadlo VALUES (30, 3, 10);

INSERT INTO Klient VALUES (1, 'System', 'System', 'system00', 'asdasd', 21);
INSERT INTO Klient VALUES (2, 'Radek', 'Filipín', 'yfili00', 'asdasd', 18);
INSERT INTO Klient VALUES (3, 'Nikola', 'Hrubá', 'yhrub00', 'asdasd', 17);
INSERT INTO Klient VALUES (4, 'Aleš', 'Rozmazal', 'yrozm00', 'asdasd', 25);
INSERT INTO Klient VALUES (5, 'Petr', 'Prudík', 'yprud00', 'asdasd', 25);
INSERT INTO Klient VALUES (6, 'Jan', 'Daněk', 'ydane00', 'asdasd', 22);
INSERT INTO Klient VALUES (7, 'Petr', 'Uhlíř', 'yuhli00', 'asdasd', 38);
INSERT INTO Klient VALUES (8, 'Jiří', 'Strejc', 'ystre00', 'asdasd', 52);

INSERT INTO Rezervace VALUES (1, 1, 1, STR_TO_DATE('28.03.2015 17:22', '%d.%m.%Y %T'), 1, 724159489);
INSERT INTO Rezervace VALUES (2, 2, 4, STR_TO_DATE('28.03.2015 18:45', '%d.%m.%Y %T'), 1, 724159489);
INSERT INTO Rezervace VALUES (3, 3, 5, STR_TO_DATE('28.03.2015 19:22', '%d.%m.%Y %T'), 1, 724159489);

INSERT INTO Prodej VALUES (1, 2, 1, 139,  STR_TO_DATE('29.03.2015 15:55','%d.%m.%Y %T'));
INSERT INTO Prodej VALUES (2, 3, 2, 139,  STR_TO_DATE('29.03.2015 18:55','%d.%m.%Y %T'));
INSERT INTO Prodej VALUES (3, 4, 3, 129,  STR_TO_DATE('29.03.2015 21:55','%d.%m.%Y %T'));

INSERT INTO VIP_Klient VALUES (3, 724159489, 'Skácelova 57, Brno', 10, STR_TO_DATE('20.03.2016','%d.%m.%Y'));

INSERT INTO Patri VALUES (1, 3);
