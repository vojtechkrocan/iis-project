<?php
	session_save_path("tmp/");
	session_start();
	require_once 'db_connection.php';
	/*
	if(isset($_SESSION['user']) != "" or isset($_SESSION['worker'])!="")
	{
		 header("Location: worker_login.php");
	}
	*/
	if(isset($_POST['btn-register']))
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
			?>
			<script>alert('U¾ivatelské jméno ji¾ existuje.');</script>
			<?php
		}
		else
		{
			$sql = "INSERT INTO Klient(username, jmeno, prijmeni, heslo) VALUES('$username','$jmeno', '$prijmeni','$upass')";
			if ($db->query($sql) === TRUE)
			{
			?>
				<script>alert('Registrace probìhla úspì¹nì.');</script>
				<?php
			}
		 	else
			{
			?>
				<script>alert('Bìhem registrace nastala chyba...');</script>
			<?php
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
					<td style="padding-top: 15px;"><input type="text" name="username" placeholder="U¾ivatelské jméno" required /></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;"><input type="text" name="jmeno" placeholder="Køestní jméno" required /></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;"><input type="text" name="prijmeni" placeholder="Pøíjmení" required /></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;"><input type="password" name="pass" placeholder="Heslo" required /></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;"><button type="submit" name="btn-register">Registrovat</button></td>
				</tr>
			</table>
		</form>
		<!--
		<form action="login.php" method="post">
			<table>
				<tr>
					<td>RodnÃ© ÄÃ­slo:</td>
					<td align="center"><input type="text" name="pin" size="30" /></td>
				</tr>
				<tr>
					<td>JmÃ©no:</td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="firstname" size="30" /></td>
				</tr>
				<tr>
					<td>PÅ™ijmenÃ­:</td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="surname" size="30" /></td>
				</tr>

				<tr>
					<td align="center" colspan="2"><input type="submit" name="Submit" size="30" /></td>
				</tr>
			</table>
		</form>
		-->
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
