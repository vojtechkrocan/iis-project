<?php
	require_once 'core.php';
	require_once 'check_worker.php';
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
				$sql = "SELECT *
						FROM Rezervace R JOIN Klient K JOIN Projekce P JOIN Film F
						ON R.id_klienta = K.id_klienta AND R.id_projekce = P.id_projekce
						AND P.id_filmu = F.id_filmu
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
						<td>Příjmení</td>
						<td>Přihlašovací jméno</td>
						<td>Film</td>
						<td>Telefoní číslo</td>
						<td style='width: 45px;'>Editovat</td>
						<td style='width: 45px;'>Odstranit</td>
						</tr>");

					while($row = $result->fetch_assoc())
					{
						echo("<tr>
							<td>" . $row["jmeno"] . "</td>
							<td>" . $row["prijmeni"] . "</td>
							<td>" . $row["username"] . "</td>
							<td>" . $row["nazev"] . "</td>
							</tr>");
					}
					echo("</table>");
					echo("</div>");
				}
				else
				{

					echo ("<div>Žádná rezervace nebyla nalezena.</div>");
				}
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
