<?php
	require_once 'core.php';

	if( isset($_POST['btn-login']) )
	{
		$username = $_POST['username'];
		$upass = $_POST['pass'];
		$sql = "SELECT * FROM Zamestnanec WHERE login = '" . $username . "' AND heslo = '" .$upass . "'";
		$result = $db->query($sql);
		if( $result->num_rows == 1 )
		{
			$row = $result->fetch_assoc();
			$_SESSION['user'] = $row['id_zamestnance'];
			// Rights
			if( $row['id_sef'] == NULL )
				$_SESSION['rights'] = ADMIN_RIGHTS;
			else
				$_SESSION['rights'] = WORKER_RIGHTS;
			header("Location: index.php");
		}
		else
		{
			?>
			<script>alert('Špatné přihlašovací údaje.');</script>
			<?php
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Řetězec multikin</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content">
		<h2>Přihlášení­ pro zaměstnance</h2>
		<form method="post">
			<table align="center">
				<tr>
					<td align="left">Váš login:</td>
				</tr>
				<tr>
					<td><input type="text" name="username" placeholder="Přihlašovací jméno" required /></td>
				</tr>
				<tr>
					<td align="left">Heslo:</td>
				</tr>
				<tr>
					<td><input type="password" name="pass" placeholder="Heslo" required /></td>
				</tr>

				<tr>
					<td style="padding-top: 20px"><button type="submit" name="btn-login">Přihlásit se</button></td>
				</tr>
			</table>
		</form>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
