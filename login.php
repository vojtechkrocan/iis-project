<?php
	session_start();
	require_once 'db_connection.php';

	if(isset($_SESSION['user'])!="")
	{
	 header("Location: home.php");
	}
		if(isset($_POST['btn-login']))
		{
			$email = mysql_real_escape_string($_POST['email']);
			$upass = mysql_real_escape_string($_POST['pass']);
			$res=mysql_query("SELECT * FROM Zakaznik WHERE username='$username'");
			$row=mysql_fetch_array($res);
			if($row['password']==md5($upass))
			{
				$_SESSION['user'] = $row['user_id'];
				header("Location: index.php");
			}
			else
			{
				?>
				<script>alert('wrong details');</script>
				<?php
			 }
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Přihlášení­</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include 'header.php' ?>
	<?php require_once 'db_connection.php'; ?>
	<div class="content">
		<h2>Přihlášení</h2>
		<div id="login-form">
			<form method="post">
				<table align="center" width="30%" border="0">
					<tr>
						<td><input type="text" name="username" placeholder="Přihlašovací jméno" required /></td>
					</tr>
					<tr>
						<td><input type="password" name="pass" placeholder="Heslo" required /></td>
					</tr>
					<tr>
						<td><button type="submit" name="btn-login" >Přihlásit se</button></td>
					</tr>
				</table>
			</form>
		</div>
		<!--
		<form action="index.php" method="post" align="center">

			<div>Váš login:</div>
			<div><input type="text" name="pin" size="23"/></div>
			<div>Heslo:</div>
			<div><input type="text" name="password" size="23" /></div>

			<table align="center" text-align>
				<tr>
					<td align="left">Váš login:</td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="pin" size="17" /></td>
				</tr>
				<tr>
					<td align="left">Heslo:</td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="password" size="17" /></td>
				</tr>

				<tr>
					<td align="center" colspan="2" style="padding-top: 10px;"><input type="submit" name="Submit" size="35" value="Přihlásit se" /></td>
				</tr>
			</table>
		</form>
		-->
		<div style="padding-top: 50px;">
			<a href="worker_login.php" class="bigButton">Přihlášení pro zaměstnance</a>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
