<?php
	require_once 'core.php';
	require_once 'check_worker.php';
	/*
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
		*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Pøidání nového filmu</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >

	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
