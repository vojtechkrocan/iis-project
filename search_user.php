<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Hledaní klienta</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		include 'header.php';
		require_once 'db_connection.php';
		//require_once 'worker_check.php';
	?>
	<div class="content" >
		<form method="post">
			<table align="center" border="0">
			<!-- TODO: input na hledani - pod to tabulku s pevnyma rozmerama a tu naplnit klientama a tam nabizet editaci nebo smazani-->
				<tr>
					<td><input type="text" name="username" placeholder="Přihlašovací jméno" height="35" width="230" required /></td>
					<td><button type="submit" name="btn-search" style="margin-left: 25px;">Hledat klienta</button></td>
				</tr>
			</table>
		</form>
		<?php
			$sql = "SELECT jmeno, prijmeni, username, vek FROM Klient";
			//$stmt = $db->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					echo("<table class='moviesTable'>");
					echo("<tr><td>Jméno: " . $row["jmeno"] . "</td></tr>");
					echo("<tr><td>Příjmení: " . $row["prijmeni"] . "</td></tr>");
					echo("<tr><td>Username: " . $row["username"] . "</td></tr>");
					echo("<tr><td>Věk:" . $row["vek"] . " let</td></tr>");
					echo("</table>");
				}
			}
			else
				echo ("Doslo k SQL chybe: " . $db->error);
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
