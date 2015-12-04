<?php
	session_start();
	require_once 'db_connection.php';
	if(isset($_SESSION['user'])!="")
	{
	 header("Location: worker_login.php");
	}

	if(isset($_POST['btn-signup']))
	{
		$uname = mysql_real_escape_string($_POST['uname']);
		$email = mysql_real_escape_string($_POST['email']);
		$upass = md5(mysql_real_escape_string($_POST['pass']));

 		if(mysql_query("INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
		{
		?>
			<script>alert('Registrace proběhla úspěšně.');</script>
			<?php
		}
	 	else
		{
		?>
			<script>alert('Během registrace nastala chyba...');</script>
		<?php
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
					<td style="padding-top: 15px;"><button type="submit" name="btn-signup">Registrovat</button></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;"><a href="login.php" class="smallButton">Přejít k přihlašování</a></td>
				</tr>
			</table>
		</form>
		<!--
		<form action="login.php" method="post">
			<table>
				<tr>
					<td>RodnĂŠ ÄĂ­slo:</td>
					<td align="center"><input type="text" name="pin" size="30" /></td>
				</tr>
				<tr>
					<td>JmĂŠno:</td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="firstname" size="30" /></td>
				</tr>
				<tr>
					<td>PĹijmenĂ­:</td>
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
