<?php
	require_once 'core.php';
	require_once 'check_worker.php';

	$found = false;
	if( isset($_GET['id']) )
	{
		$id_klienta =  $_GET['id'];
		$sql = "SELECT *
				FROM Klient
				WHERE id_klienta = " . $id_klienta;
		//var_dump($sql);
		$result = $db->query($sql);
		if( $result->num_rows == 1 )
		{
			$row = $result->fetch_assoc();
			$found = true;
			$jmeno = $row['jmeno'];
			$prijmeni = $row['prijmeni'];
			$adresa = $row['adresa'];
			$vek = $row['vek'];
			$username = $row['username'];
		}
	}

	if( isset($_POST['btn-save']) )
	{
		$username = $_POST['username'];
		$jmeno = $_POST['jmeno'];
		$prijmeni = $_POST['prijmeni'];
		$upass = $_POST['pass'];
		$vek = $_POST['vek'];
		$adresa = $_POST['adresa'];
		$id_klienta = $_POST['id_klienta'];
		$exists = false;
		$sql = "SELECT *
				FROM Klient
				WHERE username = '$username'";
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			if( $row['id_klienta'] != $id_klienta )
			{
				$exists = true;
				echo("<div id='flashMessage'>");
				echo("U¾ivatel " . $username . " ji¾ existuje.");
				echo("</div>");
			}
		}
		if( !$exists )
		{
			$sql = "UPDATE Klient
					SET jmeno = '$jmeno', prijmeni = '$prijmeni', username = '$username', vek = $vek, adresa = '$adresa'";
			if( $upass != "" )
				$sql .= ", heslo = '$upass'";
			$sql .=	" WHERE id_klienta = $id_klienta";
			if ($db->query($sql) === TRUE)
			{
				// asi predat flashMessage
				header("Location: internal.php");
			}
		 	else
			{
				echo("<div id='flashMessage'>");
				echo("U¾ivatele se nepodaøilo vlo¾it do databáze.");
				echo("</div>");
		 	}
		}
	}

	if( isset($_POST['btn-remove']) )
	{
		$id_zamestnance = $_POST['id_zamestnance'];
		$sql = "DELETE FROM Zamestnanec
				WHERE id_klienta = $id_zamestnance";
		if ($db->query($sql) === TRUE)
		{
			// asi predat flashMessage
			header("Location: internal.php");
		}
		else
		{
			echo("<div id='flashMessage'>");
			echo("Zamìstnance " . $username . " se nepodaøilo odstranit z databáze.");
			echo("</div>");
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Editace klienta</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>Editace u¾ivatele</h2>
		<hr>
		<?php
			if($found)
			{
				?>
				<form method="post">
					<table align="center" border="0">
						<tr>
							<td><input type="hidden" name="id_klienta"
								<?php
									echo ("value='" . $id_klienta . "'");
								?>
								readonly/>
						</tr>
						<tr>
							<td><label for="jmeno">Køestní jméno</label></td>
							<td><input type="text" name="jmeno"
								<?php
									echo ("value='" . $jmeno . "'");
								?>
								required /></td>
						</tr>
						<tr>
							<td><label for="prijmeni">Pøíjmení</label></td>
							<td><input type="text" name="prijmeni"
								<?php
									echo ("value='" . $prijmeni . "'");
								?>
								required /></td>
						</tr>
						<tr>
							<td><label for="vek">Vìk</label></td>
							<td><input type="text" name="vek"
								<?php
									if( $vek != NULL )
										echo ("value='" . $vek . "'");
								?>
								/></td>
						</tr>
						<tr>
							<td><label for="adresa">Adresa</label></td>
							<td><input type="text" name="adresa"
								<?php
									echo ("value='" . $adresa . "'");
								?>
								required /></td>
						</tr>
						<tr>
							<td><label for="username">U¾ivatelské jméno</label></td>
							<td><input type="text" name="username"
								<?php
									echo ("value='" . $username . "'");
								?>
								required /></td>
						</tr>
						<tr>
							<td><label for="pass">Nové heslo</label></td>
							<td><input type="password" name="pass" /></td>
						</tr>
					</table>
					<div class="topMargin">
						<button type="submit" name="btn-save" class="bigger">Ulo¾it</button>
					</div>
					<hr style="margin-top: 100px;">
					<div>
						<button type="submit" name="btn-remove" class="bigger remove" >Odstranit u¾ivatele</button>
					</div>
				</form>
				<?php
			}
			else
			{
				?>
				<div>Neexistující u¾ivatel.</div>
				<?php
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
