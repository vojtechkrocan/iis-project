<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Přihlášení</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include 'header.php' ?>
	<div class="content" align="center">
		<form action="index.php" method="post">
			<table>
				<tr>
					<td>Rodné číslo:</td>
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
					<td align="center" colspan="2"><input type="submit" name="Submit" size="17" /></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
