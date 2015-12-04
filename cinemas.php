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
			$sql = "SELECT nazev, adresa
					FROM Kino";
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{
				echo("<div class='cinemas'>");
				while($row = $result->fetch_assoc())
				{
					echo("<div>");
					echo("<h2>" . $row["nazev"] . "</h2>");
					echo("<span class='description'>" . $row["adresa"] . "</span>");
					echo("</div>");
				}
				echo("</div>");
			}
			else
			    echo ("DEBUG: Chyba sql: " . $db->error);
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
