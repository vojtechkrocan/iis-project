<?php
	require_once 'core.php';

	if( $_userLogged_ ) // user is already logged on
		header("Location: index.php");

	if( isset($_POST['btn-login']) )
	{
		$username = $_POST['username'];
		$upass = $_POST['pass'];
		$sql = "SELECT * FROM Klient WHERE username = '" . $username . "' AND heslo = '" .$upass . "'";
		$result = $db->query($sql);
		if( $result->num_rows == 1 )
		{
			$row = $result->fetch_assoc();
			$_SESSION['user'] = $row['id_klienta'];
			$_SESSION['rights'] = USER_RIGHTS;
			header("Location: index.php");
		}
		else
		{
			?>
			<script>alert('�patn� p�ihla�ovac� �daje.');</script>
			<?php
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>P�ihl�en�</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="content">
		<h2>P�ihl�en�</h2>
		<hr>
		<form method="post">
			<table align="center" width="30%" border="0">
				<tr>
					<td><label for="username">U�ivatelsk� jm�no</label></td>
				</tr>
				<tr>
					<td><input type="text" name="username" placeholder="P�ihla�ovac� jm�no" required /></td>
				</tr>
				<tr>
					<td><label for="pass">Heslo</label></td>
				</tr>
				<tr>
					<td><input type="password" name="pass" placeholder="Heslo" required /></td>
				</tr>
				<tr>
					<td><button type="submit" name="btn-login" class="topMargin">P�ihl�sit se</button></td>
				</tr>
			</table>
		</form>
		<hr style="margin-top: 60px;">
		<div>
			<button type="button" onclick="window.location='login_worker.php';" style="width: auto;">P�ihl�en� pro zam�stnance</button>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
