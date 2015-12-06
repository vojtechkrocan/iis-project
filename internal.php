<?php
	require_once 'core.php';
	require_once 'check_worker.php';

	// Get flash message

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Intern� �ast syst�mu</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<table align="center" border="0">
			<tr>
				<td><h2>Prodejn� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="button" name="btn-login" onclick="window.location='sell.php';">Prodat l�stek</button></td>
			</tr>
			<tr>
				<td><h2>Klientsk� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='search_user.php';">Hledat klienta</button></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='add_user.php';">P�idat nov�ho klienta</button></td>
			</tr>
			<tr>
				<td><h2>Filmov� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='search_movie.php';">Hledat film</button></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='add_movie.php';">P�idat nov� film</button></td>
			</tr>
			<tr>
				<td><h2>Rezerva�n� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='search_reservation.php';">Hledat rezervaci</button></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='add_reservation.php';">P�idat rezervaci</button></td>
			</tr>
			<tr>
				<td><h2>Projek�n� sekce</h2></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='search_projection.php';">Hledat projekci</button></td>
			</tr>
			<tr>
				<td><button type="submit" onclick="window.location='';">P�idat projekci</button></td>
			</tr>
			<!-- tohle uz ma videt jen ten, kdo ma jako nadrizeneho NULL -->
			<?php
				if( $_userRights_ == ADMIN_RIGHTS )
				{
					?>
					<tr>
						<td><h2>Administra�n� sekce</h2></td>
					</tr>
					<tr>
						<td><button type="submit" onclick="window.location='add_worker.php';">P�idat zam�stnance</button></td>
					</tr>
					<tr>
						<td><button type="submit" onclick="window.location='search_worker.php';">Hledat zam�stnance</button></td>
					</tr>
					<tr>
						<td><button type="submit" onclick="window.location='get_receipts.php';">Zjistit tr�bu</button></td>
					</tr>
					<?php
				}
			?>
		</table>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
