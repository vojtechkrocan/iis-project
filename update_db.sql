UPDATE `Kino`
SET adresa = 'Nádra¾ní'
WHERE id_kina = 2;

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

# rezervace sedadel
# asi pridat slozenej klic
