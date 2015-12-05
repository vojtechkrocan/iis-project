<?php
	session_save_path("tmp/");
	session_start();
	require_once 'db_connection.php';
	/*
	if( isset($_SESSION['user']) != "" or  isset($_SESSION['worker']) != "" )
	{
		header("Location: index.php");
	}*/
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
			//setcookie('logged', $row['id_klienta'], time() + (86400 * 1), "/");
			//header("Location: index.php");
		}
		else
		{
			//setcookie('logged', '', time() - 3600, "/");
			?>
			<script>alert('©patné pøihla¹ovací údaje.');</script>
			<?php
		}
	}
	/*
	echo("USER: ");
	var_dump($_SESSION['user']);
	echo("WORKER: ");
	var_dump($_SESSION['worker']);
	*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Pøihlá¹ení­</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include 'header.php' ?>
	<div class="content">
		<h2>Pøihlá¹ení</h2>
		<div id="login-form">
			<form method="post">
				<table align="center" width="30%" border="0">
					<tr>
						<td><input type="text" name="username" placeholder="Pøihla¹ovací jméno" required /></td>
					</tr>
					<tr>
						<td><input type="password" name="pass" placeholder="Heslo" required /></td>
					</tr>
					<tr>
						<td><button type="submit" name="btn-login">Pøihlásit se</button></td>
					</tr>
				</table>
			</form>
		</div>
		<div style="padding-top: 50px;">
			<a href="worker_login.php" class="bigButton">Pøihlá¹ení pro zamìstnance</a>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
