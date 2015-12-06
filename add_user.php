<?php
	require_once 'core.php';

	if(isset($_POST['btn-add']))
	{
		$username = $_POST['username'];
		$jmeno = $_POST['jmeno'];
		$prijmeni = $_POST['prijmeni'];
		$upass = $_POST['pass'];
		$vek = $_POST['vek'];
		$adresa = $_POST['adresa'];
		// check if already exists
		$sql = "SELECT username
				FROM Klient
				WHERE username = '$username'";
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{
			echo("<div id='flashMessage'>");
			echo("U¾ivatel " . $username . " ji¾ existuje.");
			echo("</div>");
		}
		else
		{
			$sql = "INSERT INTO Klient(username, jmeno, prijmeni, heslo, vek, adresa)
					VALUES('$username','$jmeno', '$prijmeni','$upass', '$vek', '$adresa')";
			if ($db->query($sql) === TRUE)
			{
				echo("<div id='flashMessage'>");
				echo("U¾ivatel " . $username . " byl úspì¹nì pøidán.");
				echo("</div>");
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
	<title>Pøidání nového u¾ivatele</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="content">
		<h2>Pøidání nového u¾ivatele</h2>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><label for="jmeno">Køestní jméno</label></td>
					<td><input type="text" name="jmeno" required /></td>
				</tr>
				<tr>
					<td><label for="prijmeni">Pøíjmení</label></td>
					<td><input type="text" name="prijmeni" required /></td>
				</tr>
				<tr>
					<td><label for="vek">Vìk</label></td>
					<td><input type="text" name="vek" required /></td>
				</tr>
				<tr>
					<td><label for="adresa">Adresa</label></td>
					<td><input type="text" name="adresa" /></td>
				</tr>
				<tr>
					<td><label for="username">U¾ivatelské jméno</label></td>
					<td><input type="text" name="username" required /></td>
				</tr>
				<tr>
					<td><label for="pass">Heslo</label></td>
					<td><input type="password" name="pass" required /></td>
				</tr>
			</table>
			<div class="topMargin">
				<button type="submit" name="btn-add" class="bigger">Pøidat u¾ivatele</button>
			</div>
		</form>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
