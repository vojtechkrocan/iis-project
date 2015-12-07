<?php
	require_once 'core.php';
	require_once 'check_worker.php';

	if( isset($_POST['btn-del']) )
	{
		$_POST['id_filmu'];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Hledání filmu</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>Vyhledávání filmů</h2>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><input type="text" name="search-word" placeholder="Hledaná fráze" required /></td>
					<td><button type="submit" name="btn-search">Hledat film</button></td>
				</tr>
			</table>
		</form>
		<?php
			if( isset($_POST['btn-search']) )
			{
				$search_word = "";
				$search_word = $_POST['search-word'];
				$sql = "SELECT F.nazev AS Fnazev, F.id_filmu, Z.nazev AS Znazev, autor, delka, datum_prijeti
						FROM Film F INNER JOIN Zanr Z
						ON F.id_zanru = Z.id_zanru
						WHERE
							F.nazev LIKE '%" . $search_word . "%'
							OR autor LIKE '%" . $search_word . "%'";
				$result = $db->query($sql);
				if ($result->num_rows > 0)
				{
					echo("<div class='result'>");
					echo("<table align='center'>
						<tr style='font-size: 1.3em;'>
							<td>Název</td>
							<td>Autor</td>
							<td>Žánr</td>
							<td>Délka</td>
							<td>Přidán do systému</td>
							<td style='width: 45px;'>Odstranit</td>
						</tr>");

					while($row = $result->fetch_assoc())
					{
						echo("<tr>
								<td>" . $row['Fnazev'] . "</td>
								<td>" . $row['autor'] . "</td>
								<td>" . $row['Znazev'] . "</td>
								<td>" . $row['delka'] . "</td>
								<td>" . $row['datum_prijeti'] . "</td>
								<td><form method='post'><input type='hidden' name='id_filmu' value='" . $row['id_filmu'] . "' readonly /><button type='submit' name='btn-del'>X</button></input></form></td>
							</tr>");
					}
					echo("</table>");
					echo("</div>");
				}
				else
				{

					echo ("<div>Žádný film nebyl nalezen.</div>");
				}
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
