<?php
	require_once 'core.php';
	require_once 'check_worker.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Hledat projekci</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>Vyhledávání projekcí</h2>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><input type="text" name="search-word" placeholder="Hledaná fráze" required /></td>
					<td><button type="submit" name="btn-search">Hledat projekci</button></td>
				</tr>
			</table>
		</form>
		<?php
			if( isset($_POST['btn-search']) )
			{
				$search_word = $_POST['search-word'];
				$sql = "SELECT P.cas_zahajeni, P.cas_ukonceni, S.nazev AS Snazev, K.nazev AS Knazev, K.mesto, K.telefoni_cislo
						FROM Projekce P JOIN Film F JOIN Sal S JOIN Kino K
						ON P.id_filmu = F.id_filmu AND P.id_salu = S.id_salu
						AND S.id_kina = K.id_kina
						WHERE
							F.nazev LIKE '%" . $search_word . "%'
							OR K.nazev LIKE '%" . $search_word . "%'
							OR K.mesto LIKE '%" . $search_word . "%'
						";
				$result = $db->query($sql);
				if ($result->num_rows > 0)
				{
					echo("<div class='result'>");
					echo("<table align='center'>
						<tr style='font-size: 1.3em;'>
						<td>Čas a datum zahajení</td>
						<td>Čas a datum ukončení</td>
						<td>Sál</td>
						<td>Kino</td>
						<td>Město</td>
						<td>Telefoní číslo</td>
						<td style='width: 45px;'>Editovat</td>
						</tr>");

					while($row = $result->fetch_assoc())
					{
						echo("<tr>
							<td>" . $row["cas_zahajeni"] . "</td>
							<td>" . $row["cas_ukonceni"] . "</td>
							<td>" . $row["Snazev"] . "</td>
							<td>" . $row["Knazev"] . "</td>
							<td>" . $row["mesto"] . "</td>
							<td>" . $row["telefoni_cislo"] . "</td>
							</tr>");
					}
					echo("</table>");
					echo("</div>");
				}
				else
				{

					echo ("<div>Žádná projekce nebyla nalezena.</div>");
				}
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
