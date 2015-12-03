<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Přihlášení­</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include 'header.php' ?>
	<?php //require_once 'db_connection.php';
	 ?>
	<div class="content" align="center">
		<form action="index.php" method="post">
			<table>
				<tr>
					<td>Váš login:</td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="pin" size="17" /></td>
				</tr>
				<tr>
					<td>Heslo:</td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="password" size="17" /></td>
				</tr>

				<tr>
					<td align="center" colspan="2" style="padding-top: 10px;"><input type="submit" name="Submit" size="17" /></td>
				</tr>
			</table>
		</form>
		<div>
			<span class="link"><a href="worker_login.php">Přihlášení pro zaměstnance</a></span>
		</div>
	</div>
</body>
</html>
