UPDATE `Kino`
SET adresa = 'N�dra�n�'
WHERE id_kina = 2;

# predelat DB - klient pridat adresu;
ALTER TABLE `Klient`
ADD COLUMN adresa VARCHAR(50) COLLATE latin2_czech_cs;

UPDATE `Klient`
SET adresa = '�zk� 23, Blansko'
WHERE id_klienta = 1;

UPDATE `Klient`
SET adresa = 'Vlhk� 55, Fr�dek-M�stek'
WHERE id_klienta = 2;

UPDATE `Klient`
SET adresa = 'Jablo�ov� 33, Letohrad'
WHERE id_klienta = 3;

UPDATE `Klient`
SET adresa = 'Milady Hor�kov� 11, Brno'
WHERE id_klienta = 4;

UPDATE `Klient`
SET adresa = 'Sev�en� 4, Klatovy'
WHERE id_klienta = 5;

UPDATE `Klient`
SET adresa = '�umavsk� 684, Olomouc'
WHERE id_klienta = 6;

UPDATE `Klient`
SET adresa = 'Zahradn�kova 1024, Jihlava'
WHERE id_klienta = 7;

UPDATE `Klient`
SET adresa = 'Botanick� 500, Jihlava'
WHERE id_klienta = 8;

UPDATE `Klient`
SET adresa = '�i�kova 1, Humpolec'
WHERE id_klienta = 9;

UPDATE `Klient`
SET adresa = 'Nerudova 299, Hodon�n'
WHERE id_klienta = 10;

ALTER TABLE `Klient`
MODIFY COLUMN adresa VARCHAR(50) NOT NULL COLLATE latin2_czech_cs;

# rezervace sedadel
# asi pridat slozenej klic
