<?php
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Intern� �ast syst�mu</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		include 'header.php';
		require_once 'db_connection.php';
		//require_once 'worker_check.php';
	?>
	<div class="content" >
		<table align="center" border="0">
			<tr>
				<td><h2>Prodejn� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='sell.php';">Prodat l�stek</button></td>
			</tr>
			<tr>
				<td><h2>Klientsk� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='search_user.php';">Naj�t klienta</button></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='register_user.php';">Registrovat nov�ho klienta</button></td>
			</tr>
			<tr>
				<td><h2>Filmov� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='search_movie.php';">Naj�t film</button></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='add_movie.php';">P�idat nov� film</button></td>
			</tr>
			<tr>
				<td><h2>Rezerva�n� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='search_reservation.php';">Naj�t rezervaci</button></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='add_reservation.php';">P�idat rezervaci</button></td>
			</tr>
			<tr>
				<td><h2>Projek�n� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='';">P�idat projekci</button></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='';">Hledat projekci</button></td>
			</tr>

			<!-- tohle uz ma videt jen ten, kdo ma jako nadrizeneho NULL -->
			<tr>
				<td><h2>Administra�n� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='register_worker.php';">P�idat zam�stnance</button></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='search_worker.php';">Hledat zam�stnance</button></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login" onclick="window.location='search_worker.php';">Zjistit tr�bu</button></td>
			</tr>
		</table>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
