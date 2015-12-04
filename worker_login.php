<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Řetězec multikin</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include 'header.php' ?>
	<div class="content">
		<h2>Přihlášení­ pro zaměstnance</h2>
		<form action="index.php" method="post">
			<table>
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
					<td align="center" colspan="2" style="padding-top: 10px;"><input type="submit" name="Submit" size="17" /></td>
				</tr>
			</table>
		</form>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
