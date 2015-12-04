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
			$sql = "SELECT P.cas_zahajeni, S.id_salu, F.id_filmu FROM Film AS F INNER JOIN Projekce AS P INNER JOIN Sal AS S";
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{

				while($row = $result->fetch_assoc())
				{
					echo("<span>");
					echo("Zahajeni" . $row["P.cas_zahajeni"]);
					echo("Film: " . $row["F.id_filmu"]);
					echo("Sal: " . $row["S.id_salu"]);
					echo("</span>");
				}

			}
			else
			    echo ("DEBUG: Chyba od sql: " . $db->error);
		?>
	</div>
</body>
</html>
