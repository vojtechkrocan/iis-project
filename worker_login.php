<?php
	session_start();
	require_once 'db_connection.php';
	if( isset($_SESSION['user']) != "" ||  isset($_SESSION['worker']) != "" )
	{
		echo("USER: ");
		var_dump($_SESSION['user']);
		echo("WORKER: ");
		var_dump($_SESSION['worker']);
		//header("Location: index.php");
	}
	if( isset($_POST['btn-login']) )
	{
		$username = $_POST['username'];
		$upass = $_POST['pass'];
		$sql = "SELECT * FROM Zamestnanec WHERE login = '" . $username . "' AND heslo = '" .$upass . "'";;
		$result = $db->query($sql);
		if( $result->num_rows == 1 )
		{
			$row = $result->fetch_assoc();
			$_SESSION['worker'] = $row['id_zamestnance'];
			//header("Location: index.php");
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
	<title>�et�zec multikin</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include 'header.php' ?>
	<div class="content">
		<h2>P�ihl�en� pro zam�stnance</h2>
		<form action="index.php" method="post">
			<table>
				<tr>
					<td align="left">V� login:</td>
				</tr>
				<tr>
					<td><input type="text" name="username" placeholder="P�ihla�ovac� jm�no" required /></td>
				</tr>
				<tr>
					<td align="left">Heslo:</td>
				</tr>
				<tr>
					<td><input type="password" name="pass" placeholder="Heslo" required /></td>
				</tr>

				<tr>
					<td><button type="submit" name="btn-login">P�ihl�sit se</button></td>
				</tr>
			</table>
		</form>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
