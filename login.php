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
		<h2>Přihlásit</h2>
		<form action="index.php" method="post" align="center">
			<!--
			<div>Váš login:</div>
			<div><input type="text" name="pin" size="23"/></div>
			<div>Heslo:</div>
			<div><input type="text" name="password" size="23" /></div>
			-->
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
					<td align="center" colspan="2" style="padding-top: 10px;"><input type="submit" name="Submit" size="20" /></td>
				</tr>
			</table>
		</form>
		<div>
			<a href="worker_login.php" class="smallButton">Přihlášení pro zaměstnance</a>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
