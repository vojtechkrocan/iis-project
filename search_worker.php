<?php
	require_once 'core.php';
	require_once 'check_worker.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Hledání zaměstnance firmy</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>Vyhledávání zaměstnanců</h2>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><input type="text" name="search-word" placeholder="Hledaná fráze" /></td>
					<td><button type="submit" name="btn-search">Hledat zaměstnance</button></td>
				</tr>
			</table>
		</form>
		<?php
			if( isset($_POST['btn-search']) )
			{
				$search_word = $_POST['search-word'];
				$sql = "SELECT *
						FROM Zamestnanec
						WHERE
							login LIKE '%" . $search_word . "%'
							OR jmeno LIKE '%" . $search_word . "%'
							OR prijmeni LIKE '%" . $search_word . "%'
							OR adresa LIKE '%" . $search_word . "%'";
				$result = $db->query($sql);
				if ($result->num_rows > 0)
				{
					echo("<div class='result'>");
					echo("<table align='center'>
						<tr style='font-size: 1.3em;'>
						<td>Jméno</td>
						<td>Příjmení</td>
						<td>Přihlašovací jméno</td>
						<td>Adresa</td>
						<td>Telefoní číslo</td>
						<td style='width: 45px;'>Editovat</td>
						</tr>");

					while($row = $result->fetch_assoc())
					{
						echo("<tr>
							<td>" . $row["jmeno"] . "</td>
							<td>" . $row["prijmeni"] . "</td>
							<td>" . $row["login"] . "</td>
							<td>" . $row["adresa"] . "</td>
							<td>" . $row["telefoni_cislo"] . "</td>
							<td><button onclick=\"window.location='edit_worker.php?id=" . $row["id_zamestnance"] . "'\">E</button></td>
							</tr>");
					}
					echo("</table>");
					echo("</div>");
				}
				else
					echo ("<div>Žádný zaměstnanec nebyl nalezen.</div>");
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
