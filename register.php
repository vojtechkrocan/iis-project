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
		<form action="login.php" method="post">
			<table>
				<tr>
					<td>Rodné číslo:</td>
					<td align="center"><input type="text" name="pin" size="30" /></td>
				</tr>
				<tr>
					<td>Jméno:</td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="firstname" size="30" /></td>
				</tr>
				<tr>
					<td>Přijmení:</td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="surname" size="30" /></td>
				</tr>

				<tr>
					<td align="center" colspan="2"><input type="submit" name="Submit" size="30" /></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
