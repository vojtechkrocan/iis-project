<?php
	require_once 'core.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Program</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="content">
		<h2>Program</h2>
		<?php
			$sql = "SELECT DISTINCT P.cas_zahajeni, S.id_salu, F.nazev
					FROM Projekce P, Film F, Sal S
					WHERE P.id_salu = S.id_salu AND P.id_filmu = F.id_filmu";
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{

				while($row = $result->fetch_assoc())
				{
					echo("<table >");
					echo("<tr><td>Zahájení:" . $row["cas_zahajeni"] . "</td></tr>");
					echo("<tr><td>Sál: " . $row["id_salu"] . "</td></tr>");
					echo("<tr><td>Film: " . $row["nazev"] . "</td></tr>");
					echo("</table>");
				}

			}
			else
			    echo ("DEBUG: Chyba sql: " . $db->error);
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
