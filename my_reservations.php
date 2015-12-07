<?php
	require_once 'core.php';
	require_once 'check_user.php';

	if( $_userRights_ > USER_RIGHTS )
	{
		?>
		<script>alert("Přihlašte se prosím za uživatelský účet.");</script>
		<?php
	}

	if( isset($_POST['btn-del']) )
	{
		$sql = "DELETE FROM Rezervace
				WHERE id_rezervace = " . $_POST['id_rezervace'];
		if ($db->query($sql) === TRUE)
			header("Location: internal.php");
		else
		{
			echo("<div id='flashMessage'>");
			echo("Rezervaci " . $username . " se nepodařilo zrušit.");
			echo("</div>");
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Moje rezervace</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content">
		<h2>Moje rezervace</h2>
		<hr>
		<?php
			$sql = "SELECT R.id_rezervace, R.id_klienta, R.id_projekce, R.datum, R.stav, P.id_projekce, P.id_salu,
					P.id_filmu, K.id_klienta, F.id_filmu, F.nazev AS Fnazev, F.cena, Ki.id_kina, Ki.nazev AS Kinazev,
					S.id_salu, S.nazev AS Snazev
					FROM Rezervace R JOIN Projekce P JOIN Klient K JOIN Film F JOIN Kino Ki JOIN Sal S
					ON R.id_projekce = P.id_projekce AND R.id_klienta = K.id_klienta AND P.id_filmu = F.id_filmu
					AND P.id_salu = S.id_salu AND S.id_kina = Ki.id_kina
					WHERE R.id_klienta = $_userLogged_
					ORDER BY R.datum DESC";
			$result = $db->query($sql);
			if( $result->num_rows > 0 )
			{
				echo("<div class='result'>");
				echo("<table align='center'>
					<tr style='font-size: 1.3em;'>
					<td>Film</td>
					<td>Cena</td>
					<td>Datum</td>
					<td>Kino</td>
					<td>Sál</td>
					<td>Počet</td>
					<td style='width: 45px;'>Zrušit</td>
					</tr>");

				while($row = $result->fetch_assoc())
				{
					echo("<tr>
						<td>" . $row["Fnazev"] . "</td>
						<td>" . $row["cena"] . "</td>
						<td>" . $row["datum"] . "</td>
						<td>" . $row["Kinazev"] . "</td>
						<td>" . $row["Snazev"] . "</td>
						<td>" . $row["Snazev"] . "</td>
						<td><form method='post'><input type='hidden' name='id_rezervace' value='" . $row['id_rezervace'] . "' readonly /><button name='btn-del' type='submit'>X</button></input></form></td>
						</tr>");
				}
				echo("</table>");
				echo("</div>");
			}
			else
			{
				echo ("<div>Žádné rezervace nebyly nalezeny.</div>");
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
