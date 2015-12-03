<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
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
