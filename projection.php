<?php
	require_once 'core.php';
	require_once 'check_user.php';

	if( isset($_GET['id']) )
	{
		$id_projekce = $_GET['id'];
		$sql = "SELECT P.id_projekce, P.id_salu, P.id_filmu, P.cas_zahajeni, P.cas_ukonceni, S.id_salu, S.id_kina, S.nazev AS Snazev,
				S.velikost, K.id_kina, K.nazev AS Knazev, F.id_filmu, F.nazev AS Fnazev, F.delka, F.cena, Z.id_zanru, Z.nazev AS Znazev
				FROM Projekce P JOIN Sal S JOIN Kino K JOIN Film F JOIN Zanr Z
				ON P.id_salu = S.id_salu AND S.id_kina = K.id_kina
				AND F.id_filmu = P.id_filmu AND F.id_zanru = Z.id_zanru
				WHERE P.id_projekce = $id_projekce
				ORDER BY P.cas_zahajeni DESC";
		$result = $db->query($sql);
		if( $result->num_rows == 1 )
		{
			$row = $result->fetch_assoc();
			$Snazev = $row['Snazev'];
			$Fnazev = $row['Fnazev'];
			$Knazev = $row['Knazev'];
			$Znazev = $row['Znazev'];
			$cena = $row['cena'];
			$id_klienta = $_userLogged_;
			$velikost = $row['velikost'];
			$cas_zahajeni = $row['cas_zahajeni'];
			$cas_ukonceni = $row['cas_ukonceni'];

			$volnych_mist = $row['velikost'];
			//var_dump($volnych_mist);
			$sql_free = "SELECT *
						FROM Rezervace R, Projekce P
						WHERE R.id_projekce = P.id_projekce
						AND P.id_projekce = " . $id_projekce;
			$result_free = $db->query($sql_free);
			if( $result_free->num_rows > 0)
			{
				while($row_free = $result_free->fetch_assoc())
					$volnych_mist -= $row_free['pocet'];
			}
		}
	}

	$display = false;
	if( isset($_POST['btn-display']) )
	{
		$display = true;
		echo("asdasdasdsad");

	}


	if( isset($_POST['btn-order']) )
	{

		$id_projekce = $_POST['id_projekce'];
		$pocet = $_POST['reserve'];

		if( $_userRights_ > USER_RIGHTS )
		{
			?>
				<script>alert("Pihla¹te se jako bì¾ný u¾ivatel.");</script>
			<?php
		}
		else if ( $pocet == 0 || !isset($pocet) )
		{
			?>
				<script>alert("Zadejte prosím poèet míst.");</script>
			<?php
		}
		else
		{
			$mista = 0;
			$sql = "SELECT *
					FROM Projekce P, Sal S
					WHERE P.id_salu = S.id_salu
					AND P.id_projekce = $id_projekce";
			$result= $db->query($sql);
			if( $result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$mista = $row['velikost'];
			}
			$sql_free = "SELECT *
						FROM Rezervace R, Projekce P
						WHERE R.id_projekce = P.id_projekce
						AND P.id_projekce = " . $id_projekce;
			$obsazeno = 0;
			$result_free = $db->query($sql_free);
			if( $result_free->num_rows > 0)
			{
				while($row_free = $result_free->fetch_assoc())
					$obsazeno += $row_free['pocet'];
			}
			$mista -= $obsazeno;
			// mista = pocet volnych mist
			if( $pocet > $mista )
			{
				?>
				<div id="flashMessage">
					Nedostatek volných míst.
				</div>
				<?php
			}
			else
			{

				$sql = "INSERT INTO Rezervace (id_klienta, id_projekce, datum, stav, pocet)
						VALUES ($_userLogged_, $id_projekce, '2015-12-06 20:20', 0, $pocet)";
				if ($db->query($sql) === TRUE)
				{
					header("Location: my_reservations.php");
				}
				else
				{
					?>
					<div id="flashMessage">
						Rezervaci se nepodaøilo vlo¾it do databáze.
					</div>
					<?php
				}
			}
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Projekce</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content">
		<h2>Projekce</h2>
		<hr>
		<h2><?php echo($Fnazev); ?></h2>
		<form method="post" >
			<label for='tyden'>Vyberte datum</label>
			<select name='tyden' class='box' >")
					<option value='1'>Tento týden</option>
					<option value='2'>Pøí¹tí týden</option>
					<option value='3'>Za dva týdny</option>
			</select></br>
			<div class="topMargin">
				<button type="submit" name="btn-display" class="bigger">Zobrazit</button>
			</div>
		<form>
		<hr>
		<?php
			if( $display )
			{
				echo("<div><h2 style='text-align: center; font-size: 1.5em;'>" . $Fnazev . "</h2>" .$Znazev);
				echo("<hr style='width: 40%;'><div class='description'>" . $Knazev . "</br>");
				echo("sál " . $Snazev . "</br>"); // velikost salu - pocet rezervaci na danou projekci

				echo( $den[date("D", strtotime($cas_zahajeni))] . " " . date("H:i", strtotime($cas_zahajeni)) );
				echo("</div><hr style='width: 40%;'><p style='text-transform: uppercase;'>va¹e cena " . $cena . " Kè</p>");
				echo("<p style='text-transform: uppercase;'>volných míst " . $volnych_mist . "</p>");
				?>
				<hr style='width: 40%;'>
				<form method="post" style="padding-top: 20px;">


						<?php
						
						?>

					<?php
					echo("<input type='hidden' name='id_projekce' value='" . $id_projekce . "' readonly />");
					?>
					<label for="reserve">Poèet míst</label>
					<input type="text" name="reserve" style="width: 40px; margin-top: 20px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
					<div class="topMargin">
						<button type="submit" name="btn-order" class="bigger">Rezervovat</button>
					</div>
				</form>
				<?php
				// rezervace staci na tyden v roce - cas je na projekci...datum v podstate taky
				echo("</div>");
			}
			else
				echo("<div>Neexistující projekce.</div>");
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
