<?php
	require_once 'core.php';

	if(isset($_POST['btn-add']))
	{
		$username = $_POST['username'];
		$jmeno = $_POST['jmeno'];
		$prijmeni = $_POST['prijmeni'];
		$upass = $_POST['pass'];

		// check jestli uz neexistuje
		$sql = "SELECT username FROM Klient WHERE username = '$username'";
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{
			
		}
		else
		{
			$sql = "INSERT INTO Klient(username, jmeno, prijmeni, heslo) VALUES('$username','$jmeno', '$prijmeni','$upass')";
			if ($db->query($sql) === TRUE)
			{

			}
		 	else
			{
		 	}
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Registrace</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include 'header.php' ?>
	<div class="content">
		<form method="post">
			<table align="center" width="30%" border="0" text-align="left">
				<tr>
					<td style="padding-top: 15px;"><input type="text" name="username" placeholder="Uživatelské jméno" required /></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;"><input type="text" name="jmeno" placeholder="Křestní jméno" required /></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;"><input type="text" name="prijmeni" placeholder="Příjmení" required /></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;"><input type="password" name="pass" placeholder="Heslo" required /></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;"><button type="submit" name="btn-add">Registrovat</button></td>
				</tr>
			</table>
		</form>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
