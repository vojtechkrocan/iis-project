<?php
	require_once 'core.php';
	require_once 'check_worker.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Hled�n� filmu</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><input type="text" name="search-word" placeholder="Hledan� fr�ze" required /></td>
					<td><button type="submit" name="btn-search" style="margin-left: 25px;">Hledat film</button></td>
				</tr>
			</table>
		</form>
		<?php
			if( isset($_POST['btn-search']) )
			{
				$search_word = "";
				$search_word = $_POST['search-word'];
				$sql = "SELECT F.nazev AS Fnazev, Z.nazev AS Znazev, autor, delka, datum_prijeti
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
							<td>N�zev</td>
							<td>Autor</td>
							<td>��nr</td>
							<td>D�lka</td>
							<td>P�id�n do syst�mu</td>
							<td>Editovat</td>
							<td>Odstranit</td>
						</tr>");

					while($row = $result->fetch_assoc())
					{
						echo("<tr>
								<td>" . $row["Fnazev"] . "</td>
								<td>" . $row["autor"] . "</td>
								<td>" . $row["Znazev"] . "</td>
								<td>" . $row["delka"] . "</td>
								<td>" . $row["datum_prijeti"] . "</td>
							</tr>");
					}
					echo("</table>");
					echo("</div>");
				}
				else
				{

					echo ("<div>��dn� film nebyl nalezen.</div>");
				}
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
