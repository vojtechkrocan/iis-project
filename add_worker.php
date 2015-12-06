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

	if(isset($_POST['btn-add']))
	{
		$username = $_POST['username'];
		$jmeno = $_POST['jmeno'];
		$prijmeni = $_POST['prijmeni'];
		$upass = $_POST['pass'];
		$adresa = $_POST['adresa'];
		$id_kina = $_POST['kino'];
		$id_sef = $_POST['superior'];
		$telefoni_cislo = $_POST['phoneNumber'];
		// check jestli uz neexistuje
		$sql = "SELECT *
				FROM Zamestnanec
				WHERE login = '$username'";
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{
			echo("<div id='flashMessage'>");
			echo("Zamìstnanec " . $username . " ji¾ existuje.");
			echo("</div>");
		}
		else
		{
			$sql = "INSERT INTO Zamestnanec(login, jmeno, prijmeni, heslo, adresa, id_kina, id_sef, telefoni_cislo)
					VALUES('$username','$jmeno', '$prijmeni','$upass', '$adresa', $id_kina, $id_sef, '$telefoni_cislo')";
			if ($db->query($sql) === TRUE)
			{
				echo("<div id='flashMessage'>");
				echo("U¾ivatel " . $username . " byl úspì¹nì pøidán.");
				echo("</div>");
				// header("Location: internal.php");
			}
			else
			{
				echo("<div id='flashMessage'>");
				echo("U¾ivatele " . $username . " se nepodaøilo vlo¾it do databáze.");
				echo("</div>");
			}
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Pøidání nového zamìstnance</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>Pøidání nového zamìstnance</h2>
		<form method="post">
			<table align="center" width="30%" border="0" text-align="left">
				<tr>
					<td><label for="jmeno">Køestní jméno</label></td>
					<td><input type="text" name="jmeno" required /></td>
				</tr>
				<tr>
					<td><label for="prijmeni">Pøijmení</label></td>
					<td><input type="text" name="prijmeni" required /></td>
				</tr>
				<tr>
					<td><label for="adresa">Adresa</label></td>
					<td><input type="text" name="adresa" /></td>
				</tr>
				<tr>
					<td><label for="superior">Nadøízený</label></td>
					<td>
						<?php
							$sql = "SELECT id_zamestnance, jmeno, prijmeni, login
									FROM Zamestnanec
									WHERE id_sef is NULL";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								echo("<select name='superior' class='box'>");
								while($row = $result->fetch_assoc())
								{
									echo("<option value='" . $row['id_zamestnance'] . "'>" . $row['jmeno'] . " " . $row['prijmeni'] . "</option>");
								}
								echo("</select>");
							}
							else
								echo ("Do¹lo k SQL chybì: " . $db->error);
						?>
					</td>
				</tr>
				<tr>
					<td><label for="phoneNumber">Telefoní èíslo</label></td>
					<td><input type="text" name="phoneNumber" /></td>
				</tr>
				<tr>
					<td><label for="kino">Kino</label></td>
					<td>
						<?php
							$sql = "SELECT id_kina, nazev, mesto FROM Kino";
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
							else
								echo ("Do¹lo k SQL chybì: " . $db->error);
						?>
					</td>
				</tr>
				<tr>
					<td><label for="username">U¾itelské jméno</label></td>
					<td><input type="text" name="username" required /></td>
				</tr>
				<tr>
					<td><label for="pass">Heslo</label></td>
					<td><input type="password" name="pass"required /></td>
				</tr>
			</table>
			<div class="topMargin ">
				<button type="submit" name="btn-add" style="width: auto;">Pøidat zamìstnance</button>
			</div>
		</form>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
