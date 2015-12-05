<?php
	require_once 'core.php';
	require_once 'check_worker.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Interní čast systému</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<table align="center" border="0">
			<tr>
				<td><h2>Prodejní sekce</h2></td>
			</tr>
			<tr>
				<td><button type="button" name="btn-login" onclick="window.location='sell.php';">Prodat lístek</button></td>
			</tr>
			<tr>
				<td><h2>Klientská sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='search_user.php';">Najít klienta</button></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='register_user.php';">Registrovat nového klienta</button></td>
			</tr>
			<tr>
				<td><h2>Filmová sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='search_movie.php';">Najít film</button></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='add_movie.php';">Přidat nový film</button></td>
			</tr>
			<tr>
				<td><h2>Rezervační sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='search_reservation.php';">Najít rezervaci</button></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='add_reservation.php';">Přidat rezervaci</button></td>
			</tr>
			<tr>
				<td><h2>Projekční sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='';">Přidat projekci</button></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='';">Hledat projekci</button></td>
			</tr>

			<!-- tohle uz ma videt jen ten, kdo ma jako nadrizeneho NULL -->
			<?php
				if( $userRights == ADMIN_RIGHTS )
				{
					?>
					<tr>
						<td><h2>Administrační sekce</h2></td>
					</tr>
					<tr>
						<td><button type="submit" onclick="window.location='register_worker.php';">Přidat zaměstnance</button></td>
					</tr>
					<tr>
						<td><button type="submit" onclick="window.location='search_worker.php';">Hledat zaměstnance</button></td>
					</tr>
					<tr>
						<td><button type="submit" onclick="window.location='search_worker.php';">Zjistit tržbu</button></td>
					</tr>
					<?php
				}
			?>
		</table>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
