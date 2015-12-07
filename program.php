<?php
	require_once 'core.php';
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
		<h2>Program</h2>
		<hr>
		<?php
			$sql = "SELECT *
					FROM Kino";
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					echo("<div class='cinema'>" . $row['nazev'] . "</br><hr style='width: 40%;' align='left'><p style='font-size: 0.8em'>" . $row['mesto'] ."</p>");
					$sql_projection = "SELECT P.id_projekce, P.id_salu, P.id_filmu, P.cas_zahajeni, P.cas_ukonceni, S.id_salu, S.id_kina, S.nazev AS Snazev,
										S.velikost, K.id_kina, K.nazev AS Knazev, F.id_filmu, F.nazev AS Fnazev, F.delka, F.cena
										FROM Projekce P JOIN Sal S JOIN Kino K JOIN Film F
										ON P.id_salu = S.id_salu AND S.id_kina = K.id_kina
										AND F.id_filmu = P.id_filmu
										ORDER BY P.cas_zahajeni DESC";
					$result_projection = $db->query($sql_projection);
					if( $result_projection->num_rows > 0 )
					{
						while($row_projection = $result_projection->fetch_assoc())
						{
							if( time () >  strtotime($row_projection['cas_zahajeni'] .' -1 Week') and time() < strtotime($row_projection['cas_ukonceni'] . ' -1 Week') )
							{
								if( $row_projection['id_kina'] == $row['id_kina'] )
								{
									echo("<a href='projection.php?id=" . $row_projection['id_projekce'] . "'><table class='projectionTable' cellpadding='5'>");
									echo("<tr><td>" . $row_projection['Fnazev'] . "</br></br>");
									echo("<p style='font-size: 0.8em;'>" . $row_projection['delka'] . " minut</p></br>");
									echo( $den[date("D", strtotime($row_projection['cas_zahajeni']))] . " " . date("H:i", strtotime($row_projection['cas_zahajeni'])) . "</br>");
									echo( "<p style='font-size: 0.8em;'>" . $row_projection['cena'] . " Kč</p></td></tr>" );
									echo("</table></a>");
								}
							}
						}
					}
					echo("</div>");
				}
			}
			else
				echo ("Došlo k SQL chybě: " . $db->error);
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
