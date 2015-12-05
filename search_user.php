<?php
	require_once 'core.php';
	require_once 'check_worker.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Hledan� klienta</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<form method="post">
			<table align="center" border="0">
			<!-- TODO: input na hledani - pod to tabulku s pevnyma rozmerama a tu naplnit klientama a tam nabizet editaci nebo smazani-->
				<tr>
					<td><input type="text" name="search-word" placeholder="P�ihla�ovac� jm�no" height="150" width="230" required /></td>
					<td><button type="submit" name="btn-search" style="margin-left: 25px;">Hledat klienta</button></td>
				</tr>
			</table>
		</form>
		<?php
			if( isset($_POST['btn-search']) )
			{
				$search_word = "";
				$search_word = $_POST['search-word'];
				$sql = "SELECT *
						FROM Klient
						WHERE
						(
							username LIKE '%" . $search_word . "%'
							OR jmeno LIKE '%" . $search_word . "%'
							OR prijmeni LIKE '%" . $search_word . "%'

						)";
				var_dump($sql);
				$result = $db->query($sql);
				if ($result->num_rows > 0)
				{
					echo("<table><td>Jm�no</td><td>P��jmen�</td><td>P�ihla�ovac� jm�no</td><td>V�k</td><td>Editovat</td><td>Odstranit</td></tr>");

					while($row = $result->fetch_assoc())
					{
						echo("<tr><td>" . $row["jmeno"] . "</td><td>" . $row["prijmeni"] . "</td><td>" . $row["username"] . "</td><td>" . $row["vek"] . " let</td></tr>");
					}
					echo("</table>");
				}
				else
				{

					echo ("<div>��dn� klient nebyl nalezen.</div>");
				}
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
