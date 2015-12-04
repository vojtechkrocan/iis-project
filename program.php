<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Řetězec multikin</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include 'header.php' ?>
	<?php require_once 'db_connection.php'; ?>
	<div class="content">
		<?php
			$sql = "SELECT cas_zahajeni, S.id_salu, F.nazev FROM Projekce AS P INNER JOIN Film AS F INNER JOIN Sal AS S";
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{

				while($row = $result->fetch_assoc())
				{
					echo("<span class='program'>");
					echo("Datum zahajeni: " . $row["cas_zahajeni"]);
					echo(" Film: " . $row["nazev"]);
					echo(" Sal: " . $row["id_salu"]);
					echo("</br></span>");
				}

			}
			else
			    echo ("DEBUG: Chyba od sql: " . $db->error);
		?>
	</div>
</body>
</html>
