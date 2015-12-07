UPDATE `Kino`
SET adresa = 'Nádra¾ní'
WHERE id_kina = 2;

# ALTER KLIENT
# predelat DB - klient pridat adresu;
ALTER TABLE `Klient`
ADD COLUMN adresa VARCHAR(50) COLLATE latin2_czech_cs;

UPDATE `Klient`
SET adresa = 'Úzká 23, Blansko'
WHERE id_klienta = 1;

UPDATE `Klient`
SET adresa = 'Vlhká 55, Frýdek-Místek'
WHERE id_klienta = 2;

UPDATE `Klient`
SET adresa = 'Jabloòová 33, Letohrad'
WHERE id_klienta = 3;

UPDATE `Klient`
SET adresa = 'Milady Horákové 11, Brno'
WHERE id_klienta = 4;

UPDATE `Klient`
SET adresa = 'Sevøená 4, Klatovy'
WHERE id_klienta = 5;

UPDATE `Klient`
SET adresa = '©umavská 684, Olomouc'
WHERE id_klienta = 6;

UPDATE `Klient`
SET adresa = 'Zahradníkova 1024, Jihlava'
WHERE id_klienta = 7;

UPDATE `Klient`
SET adresa = 'Botanická 500, Jihlava'
WHERE id_klienta = 8;

UPDATE `Klient`
SET adresa = '®i¾kova 1, Humpolec'
WHERE id_klienta = 9;

UPDATE `Klient`
SET adresa = 'Nerudova 299, Hodonín'
WHERE id_klienta = 10;

ALTER TABLE `Klient`
MODIFY COLUMN adresa VARCHAR(50) NOT NULL COLLATE latin2_czech_cs;

# ALTER FILM
#pridani ceny na k filmu
ALTER TABLE `Film`
ADD COLUMN cena INTEGER;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 1;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 2;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 3;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 4;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 5;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 6;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 7;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 8;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 9;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 10;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 11;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 12;

UPDATE `Film`
SET cena = 129
WHERE id_filmu = 13;

ALTER TABLE `Film`
MODIFY cena INTEGER NOT NULL;

# not nullty na Zamestnanci
ALTER TABLE `Zamestnanec`
MODIFY jmeno varchar(50) NOT NULL COLLATE latin2_czech_cs;

ALTER TABLE `Zamestnanec`
MODIFY prijmeni varchar(50) NOT NULL COLLATE latin2_czech_cs;

ALTER TABLE `Zamestnanec`
MODIFY adresa varchar(50) NOT NULL COLLATE latin2_czech_cs;

# rezervace sedadel
# asi pridat slozenej klic

# update projekci
UPDATE  `iis_project`.`Projekce` SET  `cas_zahajeni` =  '2015-12-02 12:30:00',
`cas_ukonceni` =  '2015-12-30 20:45:00' WHERE  `Projekce`.`id_projekce` =1;

UPDATE  `iis_project`.`Projekce` SET  `cas_zahajeni` =  '2015-12-01 09:30:00',
`cas_ukonceni` =  '2015-12-22 18:00:00' WHERE  `Projekce`.`id_projekce` =2;

UPDATE  `iis_project`.`Projekce` SET  `cas_zahajeni` =  '2015-12-04 18:30:00',
`cas_ukonceni` =  '2015-04-25 10:45:00' WHERE  `Projekce`.`id_projekce` =3;

UPDATE  `iis_project`.`Projekce` SET  `cas_zahajeni` =  '2015-04-04 20:30:00',
`cas_ukonceni` =  '2015-04-25 14:15:00' WHERE  `Projekce`.`id_projekce` =4;

UPDATE  `iis_project`.`Projekce` SET  `cas_zahajeni` =  '2015-12-01 18:30:00',
`cas_ukonceni` =  '2015-12-31 22:50:00' WHERE  `Projekce`.`id_projekce` =5;

UPDATE  `iis_project`.`Projekce` SET  `cas_ukonceni` =  '2015-12-26 10:45:00' WHERE  `Projekce`.`id_projekce` =3;

UPDATE  `iis_project`.`Projekce` SET  `cas_ukonceni` =  '2015-12-31 14:15:00' WHERE  `Projekce`.`id_projekce` =4;
