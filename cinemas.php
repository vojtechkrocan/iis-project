<?php
	require_once 'core.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Kina</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content">
		<h2>Kina</h2>
		<hr>
		<?php
			$sql = "SELECT nazev, adresa, telefoni_cislo
					FROM Kino";
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{
				echo("<div class='cinemas'>");
				while($row = $result->fetch_assoc())
				{
					echo("<div>");
					echo($row['nazev'] . "</h2><hr style='width: 40%;' align='left'>");
					echo("<div class='description' style='padding-bottom: 20px;'>" . $row['adresa'] . "</br>");
					echo("Kontakt: " . $row['telefoni_cislo'] . "</div>");
					// saly
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
