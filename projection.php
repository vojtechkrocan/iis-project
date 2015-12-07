<?php
	require_once 'core.php';
	require_once 'check_user.php';

	$found = false;
	if( isset($_GET['id']) )
	{
		$id_projekce = $_GET['id'];
		$sql = "SELECT P.id_projekce, P.id_salu, P.id_filmu, P.cas_zahajeni, P.cas_ukonceni, S.id_salu, S.id_kina, S.nazev AS Snazev,
				S.velikost, K.id_kina, K.nazev AS Knazev, F.id_filmu, F.nazev AS Fnazev, F.delka, F.cena
				FROM Projekce P JOIN Sal S JOIN Kino K JOIN Film F
				ON P.id_salu = S.id_salu AND S.id_kina = K.id_kina
				AND F.id_filmu = P.id_filmu
				WHERE P.id_projekce = $id_projekce
				ORDER BY P.cas_zahajeni DESC";
		$result = $db->query($sql);
		if( $result->num_rows == 1 )
		{
			$row = $result->fetch_assoc();
			$found = true;
			$Snazev = $row['Snazev'];
			$Fnazev = $row['Fnazev'];
			$Knazev = $row['Knazev'];
			$cena = $row['cena'];
			$id_klienta = $_userLogged_;
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Program</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content">
		<h2>Projekce</h2>
		<hr>
		<?php
			if($found)
			{
				echo("<div><h2 style='text-align: center; font-size: 1.5em;'>" . $Fnazev . "</h2><hr style='width: 40%;'>");
				echo($Knazev . "</br>");
				echo("sál " . $Snazev . "</br>");
				echo("vaše cena " . $cena . " Kč</br><hr style='width: 40%;'>");
				echo("volných míst "); // velikost salu - pocet rezervaci na danou projekci
				// rezervace staci na tyden v roce - cas je na projekci...datum v podstate taky
				echo("</div>");
			}
			else
			{
				?>
				<div>Neexistující projekce.</div>
				<?php
			}
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
