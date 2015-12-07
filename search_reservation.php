<?php
	require_once 'core.php';
	require_once 'check_worker.php';

	if( isset($_POST['btn-del']) )
	{
		$id_rezervace = $_POST['id_rezervace'];
		$sql = "SELECT *
				FROM Rezervace
				WHERE id_rezervace = $id_rezervace";
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			if( $row['stav'] != 0 )
			{
				echo("<div id='flashMessage'>");
				echo("Zaplacenou rezervaci ji¾ nelze odstranit z databáze.");
				echo("</div>");
			}
			else
			{
				$sql = "DELETE FROM Rezervace
						WHERE id_rezervace = $id_rezervace";
				if ($db->query($sql) === TRUE)
				{
					header("Location: internal.php");
				}
				else
				{
					echo("<div id='flashMessage'>");
					echo("Rezervaci se nepodaøilo odstranit z databáze.");
					echo("</div>");
				}
			}
		}
	}

	if( isset($_POST['btn-pay']) )
	{
		$id_rezervace = $_POST['id_rezervace'];
		$sql = "SELECT *
				FROM Rezervace
				WHERE id_rezervace = $id_rezervace";
		$pocet = 0;
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$pocet = $row['pocet'];
		}
		$cena_za_film = 0;
		$sql = "SELECT *
				FROM Film";
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$cena_za_film = $row['cena'];
		}
		$celkova_cena = $cena_za_film * $pocet;
		// zmensit cenu, kdyz je ve VIP
		$actual_time = date("y-m-d H:i", time());
		$sql = "INSERT INTO Prodej (id_zamestnance, id_rezervace, cena, datum)
				VALUES ($_userLogged_, $id_rezervace, $celkova_cena, '$actual_time')";
		if ( !($db->query($sql) === TRUE) )
		{
			echo("<div id='flashMessage'>");
			echo("Rezervaci se nepodaøilo zaplatit.");
			echo("</div>");
		}
		$sql = "UPDATE Rezervace
				SET stav = 1
				WHERE id_rezervace = $id_rezervace";
		if ($db->query($sql) === TRUE)
		{
			header("Location: internal.php");
		}
		else
		{
			echo("<div id='flashMessage'>");
			echo("Rezervaci se nepodaøilo zaplatit.");
			echo("</div>");
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Hledat rezervaci</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>Vyhledávání rezervací</h2>
		<hr>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><input type="text" name="search-word" placeholder="Hledaná fráze" required /></td>
					<td><button type="submit" name="btn-search">Hledat rezervaci</button></td>
				</tr>
			</table>
		</form>
		<?php
			if( isset($_POST['btn-search']) )
			{
				$search_word = $_POST['search-word'];
				$sql = "SELECT R.id_rezervace, R.id_klienta, R.id_projekce, R.datum, R.stav, R.pocet, K.id_klienta, K.jmeno, K.prijmeni,
						K.username, P.id_filmu, P.id_salu, P.id_projekce, S.id_salu, S.nazev AS Snazev, F.id_filmu, F.nazev AS Fnazev
						FROM Rezervace R JOIN Klient K JOIN Projekce P JOIN Film F JOIN Sal S
						ON R.id_klienta = K.id_klienta AND R.id_projekce = P.id_projekce
						AND P.id_filmu = F.id_filmu AND P.id_salu = S.id_salu
						WHERE
							K.username LIKE '%" . $search_word . "%'
							OR K.jmeno LIKE '%" . $search_word . "%'
							OR K.prijmeni LIKE '%" . $search_word . "%'
							OR F.nazev LIKE '%" . $search_word . "%'";
				$result = $db->query($sql);
				if ($result->num_rows > 0)
				{
					echo("<div class='result'>");
					echo("<table align='center'>
						<tr style='font-size: 1.3em;'>
						<td>Jméno</td>
						<td>Pøíjmení</td>
						<td>Pøihla¹ovací jméno</td>
						<td>Film</td>
						<td>Sal</td>
						<td>Poèet</td>
						<td>Stav</td>
						<td style='width: 45px;'>Zaplatit</td>
						<td style='width: 45px;'>Zru¹it</td>
						</tr>");

					while($row = $result->fetch_assoc())
					{
						echo("<tr>
							<td>" . $row["jmeno"] . "</td>
							<td>" . $row["prijmeni"] . "</td>
							<td>" . $row["username"] . "</td>
							<td>" . $row["Fnazev"] . "</td>
							<td>" . $row["Snazev"] . "</td>
							<td>" . $row["pocet"] . "</td>

							");
						if ( $row["stav"] == 0 )
						{
							echo("<td>Nezaplaceno</td>");
							echo("<td><form method='post'><input type='hidden' name='id_rezervace' value='" . $row['id_rezervace'] . "' readonly /><button type='submit' name='btn-pay'>Z</button></form></td>");
						}
						else
						{
							echo("<td>Zaplaceno</td>");
							echo("<td></td>");
						}
						echo("<td><form method='post'><input type='hidden' name='id_rezervace' value='" . $row['id_rezervace'] . "' readonly /><button type='submit' name='btn-del'>X</button></form></td></tr>");
					}
					echo("</table>");
					echo("</div>");
				}
				else
				{

					echo ("<div>®ádná rezervace nebyla nalezena.</div>");
				}
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
