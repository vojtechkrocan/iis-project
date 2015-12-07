<?php
	require_once 'core.php';
	require_once 'check_worker.php';

	// Get flash message
	if( isset($_POST['btn-add']) )
	{
		$id_filmu =  $_POST['id_filmu'];
		$id_salu =  $_POST['id_salu'];
		$cas_zahajeni = $_POST['datum_zahajeni'];
		$cas_ukonceni = $_POST['datum_ukonceni'];
		$sql = "INSERT INTO Projekce (id_salu, id_filmu, cas_zahajeni, cas_ukonceni)
				VALUES ($id_salu, $id_filmu, '$cas_zahajeni', '$cas_ukonceni')";
		if ($db->query($sql) === TRUE)
		{
			echo("<div id='flashMessage'>");
			echo("Projekce byla �sp�n� p�id�na.");
			echo("</div>");
		}
		else
		{
			echo("<div id='flashMessage'>");
			echo("Projekci se nepoda�ilo vlo�it do datab�ze.");
			echo("</div>");
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>P�idat projekci</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>P�idat projekci</h2>
		<hr>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><label for="id_filmu">Film</label></td>
					<td>
						<?php
							$sql = "SELECT *
									FROM Film";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								echo("<select name='id_filmu' class='box'>");
								while($row = $result->fetch_assoc())
									echo("<option value='" . $row['id_filmu'] . "'>" . $row['nazev'] . "</option>");
								echo("</select>");
							}
							else
								echo ("Do�lo k SQL chyb�: " . $db->error);
						?>
					</td>
				</tr>
				<tr>
					<td><label for="id_salu">Sal</label></td>
					<td>
						<?php
							$sql = "SELECT S.id_salu, S.nazev AS Snazev, K.mesto, K.nazev AS Knazev
									FROM Sal S JOIN Kino K
									ON S.id_kina = K.id_kina";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								echo("<select name='id_salu' class='box'>");
								while($row = $result->fetch_assoc())
									echo("<option value='" . $row['id_salu'] . "'>" . $row['Snazev'] . ", " . $row['Knazev'] . "</option>");
								echo("</select>");
							}
							else
								echo ("Do�lo k SQL chyb�: " . $db->error);
						?>
					</td>
				</tr>
				<tr>
					<td><label for="datum_zahajeni">Datum zah�jen�</label></td>
					<td>
							<input type="text" name="datum_zahajeni" required/>
					</td>
				</tr>
				<tr>
					<td><label for="datum_ukonceni">Datum ukon�en�</label></td>
					<td>
						<input type="text" name="datum_ukonceni" required/>
					</td>
				</tr>
			</table>
			<div class="topMargin ">
				<button type="submit" name="btn-add" class="bigger">P�idat projekci</button>
			</div>
		</form>
		<hr>
		<div class="description">
			*Form�t data je rrrr-mm-dd hh:mm.
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
