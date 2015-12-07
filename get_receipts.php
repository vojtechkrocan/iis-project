<?php
	require_once 'core.php';
	require_once 'check_worker.php';
	if( $_userRights_ != ADMIN_RIGHTS )
	{
		?>
		<script>alert("Nemáte oprávnìní pro pøístup do této sekce.")</script>
		<?php
		header("Location: worker_login.php");
	}

	$nalezen_zisk = false;
	if( isset($_POST['btn-get']) )
	{
		$id_kina = $_POST['kino'];
		$datum_od = $_POST['datum_od'];
		$datum_do = $_POST['datum_do'];
		$celkovy_zisk = 0;
		$sql = "SELECT P.id_prodeje, P.cena, P.datum
				FROM Prodej P JOIN Rezervace R JOIN Projekce Pr JOIN Sal S JOIN Kino K
				ON P.id_rezervace = R.id_rezervace AND R.id_projekce = Pr.id_projekce
				AND Pr.id_salu = S.id_salu AND S.id_kina = K.id_kina
				WHERE K.id_kina = $id_kina";
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if( $row['datum']  > $datum_od && $row['datum'] < $datum_do )
					$celkovy_zisk += $row['cena'];
			}
		}
		$nalezen_zisk = true;
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Zjistit tr¾by</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content">
		<h2>Zjistit tr¾by</h2>
		<hr>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><label for="kino">Vyberte kino</label></td>
					<td>
						<?php
							$sql = "SELECT *
									FROM Kino";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								echo("<select name='kino' class='box'>");
								while($row = $result->fetch_assoc())
								{
									echo("<option value='" . $row['id_kina'] . "'>" . $row['nazev'] . ", " . $row['mesto'] ."</option>");
								}
								echo("</select>");
							}
						?>
					</td>
				</tr>
				<tr>
					<td><label for="datum_od">Datum od</label></td>
					<td><input type="text" name="datum_od" required/></td>
				</tr>
				<tr>
					<td><label for="datum_do">Datum do</label></td></td>
					<td><input type="text" name="datum_do" required/></td>
				</tr>
			</table>
			<div class="topMargin">
				<button type="submit" name="btn-get" style="width: auto;" class="bigger">Zobrazit</button>
			</div>
		</form>
		<hr>
		<?php
			if( $nalezen_zisk )
			{
				echo("<div>");
				echo("Celkový zisk: " . $celkovy_zisk);
				echo("</div>");
			}
		?>
		<hr>
		<div class="description">
			*Formát data je rrrr-mm-dd hh:mm.
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
