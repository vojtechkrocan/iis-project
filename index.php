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
 - zmenit worker check RIGHTS
 - pridat user
 - prihlaseni uzivatele
 - predelat DB - klient pridat adresu; poresit rezervace
 - zakazat stranky neprihlasenemu uzivateli
 - predelat tlacitka
 - phpeeckem nainsertovat sedadla
 - do programu kalendar - jinak zobrazovat dnes, zitra, pozitri...a pak kalendar
 - pozadi
 - join a shoda jmen -> alias AS
 - pridat vyjimku na system
-->
<body>
	<div class="content">
		<h2>Nejnovější filmy</h2>
		<?php
			$sql = "SELECT nazev, delka, autor FROM Film ORDER BY id_filmu DESC LIMIT 6";
			//$stmt = $db->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{
				$divide = 0;
				while($row = $result->fetch_assoc())
				{
					if($divide % 3 == 0)
						echo("<div class='movies'>");
					echo("<table class='moviesTable' >");
					//echo("<tr><td><span class='description'>" . $row["Zanr.nazev"] . "</span></td></tr>");
					echo("<tr><td height='230px'><img src='img/movies/asd.jpg' width='100%' height='100%'></td></tr>");
					echo("<tr><td height='45px'><span class=''>" . $row["nazev"] . "</span></td></tr>");
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
