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
		<h2>Vyhled�v�n� klient�</h2>
		<hr>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><input type="text" name="search-word" placeholder="Hledan� fr�ze" /></td>
					<td><button type="submit" name="btn-search">Hledat klienta</button></td>
				</tr>
			</table>
		</form>
		<?php
			if( isset($_POST['btn-search']) )
			{
				$search_word = $_POST['search-word'];
				$sql = "SELECT *
						FROM Klient
						WHERE
							username LIKE '%" . $search_word . "%'
							OR jmeno LIKE '%" . $search_word . "%'
							OR prijmeni LIKE '%" . $search_word . "%'";
				$result = $db->query($sql);
				if ($result->num_rows > 0)
				{
					echo("<div class='result'>");
					echo("<table align='center'>
						<tr style='font-size: 1.3em;'>
						<td>Jm�no</td>
						<td>P��jmen�</td>
						<td>P�ihla�ovac� jm�no</td>
						<td>V�k</td>
						<td style='width: 45px;'>Editovat</td>
						</tr>");

					while($row = $result->fetch_assoc())
					{
						echo("<tr>
							<td>" . $row['jmeno'] . "</td>
							<td>" . $row['prijmeni'] . "</td>
							<td>" . $row['username'] . "</td>
							<td>" . $row['vek'] . " let</td>
							<td><button onclick=\"window.location='edit_user.php?id=" . $row['id_klienta'] . "'\" >E</button></td>
							</tr>");
					}
					echo("</table>");
					echo("</div>");
				}
				else
				{

					echo ("<div>��dn� klient nebyl nalezen.</div>");
				}
			}
			// tady GET
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
