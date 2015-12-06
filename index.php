<?php
	require_once 'core.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Řetězec multikin</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<!-- TODO:
 - pridat oddelovace pod vyhledavani
 - phpeeckem nainsertovat sedadla
 - do programu kalendar - jinak zobrazovat dnes, zitra, pozitri...a pak kalendar
 - pozadi
 - pridat vyjimku na system
 - interni - 2 tabulky na radek + ikona nad to
 - dodelat zpravy pri check_*.php
 - pridat flashmessage
 - tady pridat cestu k obrazkum filmu
 - predelat prihlasovaci jmeno na uzivatelske
 - udelat tlacitko zpet
-->
<body>
	<div class="content">
		<h2>Nejnovější filmy</h2>
		<hr noshade>
		<?php
			$sql = "SELECT F.nazev AS Fnazev, F.autor, F.delka, Z.nazev AS Znazev
					FROM Film F JOIN Zanr Z
					ON F.id_zanru = Z.id_zanru
					ORDER BY id_filmu
					DESC LIMIT 6";
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{
				$divide = 0;
				while($row = $result->fetch_assoc())
				{
					if($divide % 3 == 0)
						echo("<div class='movies'>");
					echo("<table class='moviesTable' >");
					echo("<tr><td><span class='description'>" . $row["Znazev"] . "</span></td></tr>");
					echo("<tr><td height='230px'><img src='img/movies/asd.jpg' width='100%' height='100%'></td></tr>");
					echo("<tr><td height='45px'><span class=''>" . $row["Fnazev"] . "</span></td></tr>");
					echo("<tr><td><span class='description'>Délka: " . $row["delka"] . " minut</span></td></tr>");
					echo("</table>");
					if($divide % 3 == 2)
						echo("</div>");
					$divide++;
				}
			}
			else
			    echo ("Doslo k SQL chybe: " . $db->error);
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
