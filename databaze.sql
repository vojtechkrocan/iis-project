-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Pon 07. pro 2015, 20:15
-- Verze serveru: 5.5.46-0ubuntu0.14.04.2
-- Verze PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `iis_project`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `Film`
--

DROP TABLE IF EXISTS `Film`;
CREATE TABLE IF NOT EXISTS `Film` (
  `id_filmu` int(11) NOT NULL AUTO_INCREMENT,
  `id_zanru` int(11) NOT NULL,
  `nazev` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `autor` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs DEFAULT NULL,
  `delka` int(11) DEFAULT NULL,
  `datum_prijeti` datetime DEFAULT NULL,
  `obrazek_cesta` varchar(50) DEFAULT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`id_filmu`),
  KEY `id_zanru` (`id_zanru`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- RELACE PRO TABULKU `Film`:
--   `id_zanru`
--       `Zanr` -> `id_zanru`
--

--
-- Vypisuji data pro tabulku `Film`
--

INSERT INTO `Film` (`id_filmu`, `id_zanru`, `nazev`, `autor`, `delka`, `datum_prijeti`, `obrazek_cesta`, `cena`) VALUES
(1, 1, 'Les', 'Woody Allen', 96, '2014-09-25 00:00:00', NULL, 129),
(2, 4, 'Hello', 'Adele Buckingham', 96, '2014-09-25 00:00:00', NULL, 129),
(3, 9, 'Star Wars: Jabba Hutt je zpět', 'George Lucas', 102, '2015-01-01 00:00:00', NULL, 129),
(4, 7, 'Rambo', 'Steven Segal', 95, '2013-05-10 00:00:00', NULL, 129),
(5, 6, 'Rambo vs. Terminator', 'Arnold Schwarzeneger', 149, '2015-03-01 00:00:00', NULL, 129),
(6, 7, 'Rychle a Zběsile 12: Transormers vrací úder', 'Clint Eastwood', 159, '2015-05-02 00:00:00', NULL, 129),
(7, 8, 'Harry Potter: Muddle Story', 'Zdeněk Troška', 65, '2015-05-02 00:00:00', NULL, 129),
(8, 6, '8000 Metrů nad Mořem', 'Willy Guy', 90, '2015-05-02 00:00:00', NULL, 129),
(9, 4, 'Kód Pravdy', 'Jáchym Hladil', 159, '2015-05-02 00:00:00', NULL, 129),
(10, 6, 'Mars: Voda a život', 'John Geller', 102, '2015-05-02 00:00:00', NULL, 129),
(11, 2, 'Policie Ulanbatar: Zmizení jurty', 'Sechuan Jiang', 96, '2015-05-02 00:00:00', NULL, 129),
(12, 1, 'Agent ve škole 3', 'Sheldon Reynolds', 80, '2015-05-02 00:00:00', NULL, 129),
(13, 6, 'Letci na lyžích', 'Jan Křepelka', 72, '2015-12-06 01:31:53', NULL, 129);

-- --------------------------------------------------------

--
-- Struktura tabulky `Kino`
--

DROP TABLE IF EXISTS `Kino`;
CREATE TABLE IF NOT EXISTS `Kino` (
  `id_kina` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `mesto` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs DEFAULT NULL,
  `adresa` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs DEFAULT NULL,
  `telefoni_cislo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `Kino`
--

INSERT INTO `Kino` (`id_kina`, `nazev`, `mesto`, `adresa`, `telefoni_cislo`) VALUES
(1, 'Kino Brno', 'Brno', 'Kolejní 234, Královo Pole', '666888999'),
(2, 'Kino Praha', 'Praha', 'Nádražní 11, Praha 4', '789456123'),
(3, 'Kino Ostrava', 'Ostrava', 'Provaznická 45, Ostrava Svinov', '321654987');

-- --------------------------------------------------------

--
-- Struktura tabulky `Klient`
--

DROP TABLE IF EXISTS `Klient`;
CREATE TABLE IF NOT EXISTS `Klient` (
  `id_klienta` int(10) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `prijmeni` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `username` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `heslo` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `vek` int(11) DEFAULT NULL,
  `adresa` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  PRIMARY KEY (`id_klienta`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Vypisuji data pro tabulku `Klient`
--

INSERT INTO `Klient` (`id_klienta`, `jmeno`, `prijmeni`, `username`, `heslo`, `vek`, `adresa`) VALUES
(1, 'System', 'System', 'system00', 'asdasd', 21, 'Úzká 23, Blansko'),
(2, 'Radek', 'Filipín', 'yfili00', 'asdasd', 19, 'Vlhká 55, Frýdek-Místek'),
(3, 'Nikola', 'Hrubá', 'yhrub00', 'asdasd', 17, 'Jabloňová 33, Letohrad'),
(4, 'Aleš', 'Rozmazal', 'yrozm00', 'asdasd', 25, 'Milady Horákové 11, Brno'),
(5, 'Petr', 'Prudík', 'yprud00', 'asdasd', 25, 'Sevřená 4, Klatovy'),
(6, 'Jan', 'Daněk', 'ydane00', 'asdasd', 22, 'Šumavská 684, Olomouc'),
(7, 'Petr', 'Uhlíř', 'yuhli00', 'asdasd', 35, 'Zahradníkova 1024, Jihlava'),
(8, 'Jiří', 'Strejc', 'ystre00', 'asdasd', 52, 'Botanická 500, Jihlava'),
(9, 'Jiří', 'Marný', 'xaaa00', 'asdasd', 25, 'Žižkova 1, Humpolec'),
(11, 'Jáchym', 'Krbec', 'ykrbe00', 'asdasd', 15, 'SNP 23, Ostrava');

-- --------------------------------------------------------

--
-- Struktura tabulky `Prodej`
--

DROP TABLE IF EXISTS `Prodej`;
CREATE TABLE IF NOT EXISTS `Prodej` (
  `id_prodeje` int(11) NOT NULL AUTO_INCREMENT,
  `id_zamestnance` int(11) NOT NULL,
  `id_rezervace` int(11) NOT NULL,
  `cena` int(11) DEFAULT NULL,
  `datum` datetime DEFAULT NULL,
  PRIMARY KEY (`id_prodeje`),
  KEY `id_zamestnance` (`id_zamestnance`),
  KEY `id_rezervace` (`id_rezervace`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- RELACE PRO TABULKU `Prodej`:
--   `id_rezervace`
--       `Rezervace` -> `id_rezervace`
--   `id_zamestnance`
--       `Zamestnanec` -> `id_zamestnance`
--

--
-- Vypisuji data pro tabulku `Prodej`
--

INSERT INTO `Prodej` (`id_prodeje`, `id_zamestnance`, `id_rezervace`, `cena`, `datum`) VALUES
(1, 2, 1, 139, '2015-03-29 15:55:00'),
(2, 3, 2, 139, '2015-03-29 18:55:00'),
(3, 4, 3, 129, '2015-03-29 21:55:00');

-- --------------------------------------------------------

--
-- Struktura tabulky `Projekce`
--

DROP TABLE IF EXISTS `Projekce`;
CREATE TABLE IF NOT EXISTS `Projekce` (
  `id_projekce` int(11) NOT NULL AUTO_INCREMENT,
  `id_salu` int(11) NOT NULL,
  `id_filmu` int(11) NOT NULL,
  `cas_zahajeni` datetime DEFAULT NULL,
  `cas_ukonceni` datetime DEFAULT NULL,
  PRIMARY KEY (`id_projekce`),
  KEY `id_filmu` (`id_filmu`),
  KEY `id_salu` (`id_salu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- RELACE PRO TABULKU `Projekce`:
--   `id_filmu`
--       `Film` -> `id_filmu`
--   `id_salu`
--       `Sal` -> `id_salu`
--

--
-- Vypisuji data pro tabulku `Projekce`
--

INSERT INTO `Projekce` (`id_projekce`, `id_salu`, `id_filmu`, `cas_zahajeni`, `cas_ukonceni`) VALUES
(1, 2, 1, '2015-12-02 12:30:00', '2015-12-30 20:45:00'),
(2, 2, 2, '2015-12-01 09:30:00', '2015-12-22 18:00:00'),
(3, 1, 3, '2015-12-04 18:30:00', '2015-12-26 10:45:00'),
(4, 3, 4, '2015-04-04 20:30:00', '2015-12-31 14:15:00'),
(5, 3, 4, '2015-12-01 18:30:00', '2015-12-31 22:50:00');

-- --------------------------------------------------------

--
-- Struktura tabulky `Rezervace`
--

DROP TABLE IF EXISTS `Rezervace`;
CREATE TABLE IF NOT EXISTS `Rezervace` (
  `id_rezervace` int(11) NOT NULL AUTO_INCREMENT,
  `id_klienta` int(10) NOT NULL,
  `id_projekce` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `stav` tinyint(1) DEFAULT NULL,
  `pocet` int(10) NOT NULL,
  PRIMARY KEY (`id_rezervace`),
  KEY `id_klienta` (`id_klienta`),
  KEY `id_projekce` (`id_projekce`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- RELACE PRO TABULKU `Rezervace`:
--   `id_klienta`
--       `Klient` -> `id_klienta`
--   `id_projekce`
--       `Projekce` -> `id_projekce`
--

--
-- Vypisuji data pro tabulku `Rezervace`
--

INSERT INTO `Rezervace` (`id_rezervace`, `id_klienta`, `id_projekce`, `datum`, `stav`, `pocet`) VALUES
(1, 1, 1, '2015-12-08 17:22:00', 1, 4),
(2, 2, 4, '2015-12-08 18:45:00', 0, 8),
(3, 3, 5, '2015-12-08 19:22:00', 1, 2),
(5, 1, 4, '2015-12-08 20:20:00', 0, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `Sal`
--

DROP TABLE IF EXISTS `Sal`;
CREATE TABLE IF NOT EXISTS `Sal` (
  `id_salu` int(11) NOT NULL AUTO_INCREMENT,
  `id_kina` int(11) NOT NULL,
  `nazev` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs DEFAULT NULL,
  `velikost` int(11) NOT NULL,
  `zpusob_promitani` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs DEFAULT NULL,
  PRIMARY KEY (`id_salu`),
  KEY `id_kina` (`id_kina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- RELACE PRO TABULKU `Sal`:
--   `id_kina`
--       `Kino` -> `id_kina`
--

--
-- Vypisuji data pro tabulku `Sal`
--

INSERT INTO `Sal` (`id_salu`, `id_kina`, `nazev`, `velikost`, `zpusob_promitani`) VALUES
(1, 2, 'Sál 1', 300, '3D, 2D'),
(2, 3, 'Sál 2', 120, '3D, 2D'),
(3, 1, 'Sál 3', 80, '2D');

-- --------------------------------------------------------

--
-- Struktura tabulky `VIP_Klient`
--

DROP TABLE IF EXISTS `VIP_Klient`;
CREATE TABLE IF NOT EXISTS `VIP_Klient` (
  `id_klienta` int(10) NOT NULL,
  `telefoni_cislo` varchar(20) DEFAULT NULL,
  `adresa` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs DEFAULT NULL,
  `sleva` int(11) DEFAULT NULL,
  `platnost` datetime DEFAULT NULL,
  KEY `id_klienta` (`id_klienta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACE PRO TABULKU `VIP_Klient`:
--   `id_klienta`
--       `Klient` -> `id_klienta`
--

--
-- Vypisuji data pro tabulku `VIP_Klient`
--

INSERT INTO `VIP_Klient` (`id_klienta`, `telefoni_cislo`, `adresa`, `sleva`, `platnost`) VALUES
(3, '724159489', 'Skácelova 57, Brno', 10, '2016-03-20 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabulky `Zamestnanec`
--

DROP TABLE IF EXISTS `Zamestnanec`;
CREATE TABLE IF NOT EXISTS `Zamestnanec` (
  `id_zamestnance` int(11) NOT NULL AUTO_INCREMENT,
  `id_sef` int(11) DEFAULT NULL,
  `id_kina` int(11) NOT NULL,
  `jmeno` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `prijmeni` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `login` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `heslo` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `adresa` varchar(50) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `telefoni_cislo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_zamestnance`),
  UNIQUE KEY `login` (`login`),
  KEY `id_kina` (`id_kina`),
  KEY `id_sef` (`id_sef`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- RELACE PRO TABULKU `Zamestnanec`:
--   `id_kina`
--       `Kino` -> `id_kina`
--   `id_sef`
--       `Zamestnanec` -> `id_zamestnance`
--

--
-- Vypisuji data pro tabulku `Zamestnanec`
--

INSERT INTO `Zamestnanec` (`id_zamestnance`, `id_sef`, `id_kina`, `jmeno`, `prijmeni`, `login`, `heslo`, `adresa`, `telefoni_cislo`) VALUES
(1, NULL, 1, 'Petr', 'Bříza', 'xbriz00', 'angryturkey', 'Kolejní 5, Brno', '666888999'),
(2, NULL, 1, 'Lucie', 'Pravdová', 'xprav00', 'angryturkey', 'Purkňova 16, Brno', '724589659'),
(3, 1, 2, 'Robert', 'Mrůz', 'xmruz00', 'angryturkey', 'Kolejní 5, Praha', '765489321'),
(4, 3, 2, 'Jan', 'Lukeš', 'xluke00', 'angryturkey', 'Nerudova 12, Praha', '654987321'),
(5, 1, 3, 'Andrea', 'Cibulková', 'xcibu00', 'angryturkey', 'Provaznická 5, Ostrava', '601248923'),
(6, 5, 3, 'Stanislav', 'Mladý', 'xmlad00', 'angryturkey', 'Horní 16, Ostrava', '741852963'),
(7, 6, 3, 'Lenka', 'Vrbová', 'xvrbo00', 'angryturkey', 'Klegova 5, Ostrava', '753869421'),
(8, 6, 3, 'Bohumil', 'Vrtal', 'xvrta00', 'angryturkey', 'Masarykova 7, Ostrava', '621598473'),
(9, 1, 1, 'Adam', 'Marek', 'xmare00', 'angryturkey', 'Pražského Povstání 22, Blansko', '566655599');

-- --------------------------------------------------------

--
-- Struktura tabulky `Zanr`
--

DROP TABLE IF EXISTS `Zanr`;
CREATE TABLE IF NOT EXISTS `Zanr` (
  `id_zanru` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(512) CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  PRIMARY KEY (`id_zanru`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Vypisuji data pro tabulku `Zanr`
--

INSERT INTO `Zanr` (`id_zanru`, `nazev`) VALUES
(1, 'Rodinný'),
(2, 'Komedie'),
(3, 'Thriller'),
(4, 'Drama'),
(5, 'Horror'),
(6, 'Dokumentární'),
(7, 'Akční'),
(8, 'Dobrodružný'),
(9, 'Sci-fi');

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `Film`
--
ALTER TABLE `Film`
  ADD CONSTRAINT `fk_Zanr_film` FOREIGN KEY (`id_zanru`) REFERENCES `Zanr` (`id_zanru`);

--
-- Omezení pro tabulku `Prodej`
--
ALTER TABLE `Prodej`
  ADD CONSTRAINT `fk_Rez_prod` FOREIGN KEY (`id_rezervace`) REFERENCES `Rezervace` (`id_rezervace`),
  ADD CONSTRAINT `fk_Zam_prod` FOREIGN KEY (`id_zamestnance`) REFERENCES `Zamestnanec` (`id_zamestnance`);

--
-- Omezení pro tabulku `Projekce`
--
ALTER TABLE `Projekce`
  ADD CONSTRAINT `fk_Film_proj` FOREIGN KEY (`id_filmu`) REFERENCES `Film` (`id_filmu`),
  ADD CONSTRAINT `fk_Sal_proj` FOREIGN KEY (`id_salu`) REFERENCES `Sal` (`id_salu`);

--
-- Omezení pro tabulku `Rezervace`
--
ALTER TABLE `Rezervace`
  ADD CONSTRAINT `fk_Klient_rez` FOREIGN KEY (`id_klienta`) REFERENCES `Klient` (`id_klienta`),
  ADD CONSTRAINT `fk_Proj_rez` FOREIGN KEY (`id_projekce`) REFERENCES `Projekce` (`id_projekce`);

--
-- Omezení pro tabulku `Sal`
--
ALTER TABLE `Sal`
  ADD CONSTRAINT `fk_Kino_sal` FOREIGN KEY (`id_kina`) REFERENCES `Kino` (`id_kina`);

--
-- Omezení pro tabulku `VIP_Klient`
--
ALTER TABLE `VIP_Klient`
  ADD CONSTRAINT `fk_Klient_VIP` FOREIGN KEY (`id_klienta`) REFERENCES `Klient` (`id_klienta`);

--
-- Omezení pro tabulku `Zamestnanec`
--
ALTER TABLE `Zamestnanec`
  ADD CONSTRAINT `fk_Kino_zam` FOREIGN KEY (`id_kina`) REFERENCES `Kino` (`id_kina`),
  ADD CONSTRAINT `fk_Sef_zam` FOREIGN KEY (`id_sef`) REFERENCES `Zamestnanec` (`id_zamestnance`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
