<?php
	require_once 'core.php';
	require_once 'check_worker.php';

	// Get flash message
	if( isset($_POST['btn-add']) )
	{

	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Přidat projekci</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>Přidat projekci</h2>
		<hr>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><label for="nazev">Film</label></td>
					<td>
						<?php
							$sql = "SELECT *
									FROM Film";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								echo("<select name='film' class='box'>");
								while($row = $result->fetch_assoc())
								{
									echo("<option value='" . $row['id_filmu'] . "'>" . $row['nazev'] . "</option>");
								}
								echo("</select>");
							}
							else
								echo ("Došlo k SQL chybě: " . $db->error);
						?>
					</td>
				</tr>
				<tr>
					<td><label for="sal">Sal</label></td>
					<td>
						<?php
							$sql = "SELECT S.id_salu, S.nazev AS Snazev, K.mesto, K.nazev AS Knazev
									FROM Sal S JOIN Kino K
									ON S.id_kina = K.id_kina";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								echo("<select name='sal' class='box'>");
								while($row = $result->fetch_assoc())
								{
									echo("<option value='" . $row['id_salu'] . "'>" . $row['Snazev'] . ", " . $row['Knazev'] . "</option>");
								}
								echo("</select>");
							}
							else
								echo ("Došlo k SQL chybě: " . $db->error);
						?>
					</td>
				</tr>
			</table>
			<div class="topMargin ">
				<button type="submit" name="btn-add" class="bigger">Přidat projekci</button>
			</div>
		</form>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
