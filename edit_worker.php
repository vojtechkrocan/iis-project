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

	$found = false;
	if( isset($_GET['id']) )
	{
		$id_zamestnance =  $_GET['id'];
		$sql = "SELECT *
				FROM Zamestnanec
				WHERE id_zamestnance = " . $id_zamestnance;
		$result = $db->query($sql);
		if( $result->num_rows == 1 )
		{
			$row = $result->fetch_assoc();
			$found = true;
			$jmeno = $row['jmeno'];
			$prijmeni = $row['prijmeni'];
			$adresa = $row['adresa'];
			$username = $row['login'];
			$id_sef = $row['id_sef'];
			$id_kina = $row['id_kina'];
			$telefoni_cislo = $row['telefoni_cislo'];
		}
	}

	if( isset($_POST['btn-save']) )
	{
		$id_zamestnance = $_POST['id_zamestnance'];
		$id_sef = 0;
		if( isset($_POST['id_sef']) )
			$id_sef = $_POST['id_sef'];
		$id_kina = $_POST['kino'];
		$jmeno = $_POST['jmeno'];
		$prijmeni = $_POST['prijmeni'];
		$username = $_POST['username'];
		$upass = $_POST['pass'];
		$adresa = $_POST['adresa'];
		$telefoni_cislo = $_POST['phoneNumber'];

		$exists = false;
		$sql = "SELECT *
				FROM Zamestnanec
				WHERE login = '$username'";
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			if( $row['id_zamestnance'] != $id_zamestnance )
			{
				$exists = true;
				echo("<div id='flashMessage'>");
				echo("Zamìstnanec " . $username . " ji¾ existuje.");
				echo("</div>");
			}
		}

		if( !$exists )
		{
			$sql = "UPDATE Zamestnanec
					SET jmeno = '$jmeno', prijmeni = '$prijmeni', login = '$username', adresa = '$adresa', id_kina = '$id_kina'";
			if( $upass != "" )
				$sql .= ", heslo = '$upass'";
			if( $id_sef > 0 )
				$sql .= ", id_sef = '$id_sef'";
			if( $telefoni_cislo != "" )
				$sql .= ", telefoni_cislo = '$telefoni_cislo'";
			$sql .=	" WHERE id_zamestnance = $id_zamestnance";
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
		$id_klienta = $_POST['id_klienta'];
		$sql = "DELETE FROM Klient
				WHERE id_klienta = $id_klienta";
		if ($db->query($sql) === TRUE)
		{
			// asi predat flashMessage
			header("Location: internal.php");
		}
		else
		{
			echo("<div id='flashMessage'>");
			echo("U¾ivatele " . $username . " se nepodaøilo odstranit z databáze.");
			echo("</div>");
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Editace zamìstnance</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>Editace zamìstnance</h2>
		<hr>
		<?php
			if($found)
			{
				?>
				<form method="post">
					<table align="center" border="0">
						<tr>
							<td><input type="hidden" name="id_zamestnance"
								<?php
									echo ("value='" . $id_zamestnance . "'");
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
							<td><label for="adresa">Adresa</label></td>
							<td><input type="text" name="adresa"
								<?php
									echo ("value='" . $adresa . "'");
								?>
								required /></td>
						</tr>
						<tr>
							<td><label for="phoneNumber">Telefoní èíslo</label></td>
							<td><input type="text" name="phoneNumber"
								<?php
									echo ("value='" . $telefoni_cislo . "'");
								?>
								required /></td>
						</tr>
						<?php
							$sql = "SELECT *
									FROM Zamestnanec
									WHERE id_zamestnance = $id_zamestnance";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								$row = $result->fetch_assoc();
								if( $row['id_sef'] != NULL )
								{
									$sql = "SELECT *
											FROM Zamestnanec
											WHERE id_sef is NULL";
									$result = $db->query($sql);
									if ($result->num_rows > 0)
									{
										echo("<tr><td><label for='superior'>Nadøízený</label></td>
											<td>");
										echo("<select name='superior' class='box'>");
										while($row = $result->fetch_assoc())
										{
											echo("<option value='" . $row['id_zamestnance'] . "' ");
											if( $id_sef == $row['id_zamestnance'] )
												echo("selected");
											echo(" >" . $row['jmeno'] . " " . $row['prijmeni'] . "</option>");
										}
										echo("</select>");
										echo("</td></tr>");
									}
									else
										echo ("Do¹lo k SQL chybì: " . $db->error);
								}
							}
						?>

						<tr>
							<td><label for="kino">Kino</label></td>
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
										echo("<option value='" . $row['id_kina'] . "' ");
										if( $row['id_kina'] == $id_kina )
											echo("selected");
										echo(" >" . $row['nazev'] . ", " . $row['mesto'] ."</option>");
									}
									echo("</select>");
								}
								else
									echo ("Do¹lo k SQL chybì: " . $db->error);
							?>
							</td>
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
						<button type="submit" name="btn-remove" class="bigger remove" >Odstranit zamìstnance</button>
					</div>
				</form>
				<?php
			}
			else
			{
				?>
				<div>Neexistující zamìstnanec.</div>
				<?php
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
