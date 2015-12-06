<?php
	require_once 'core.php';
	require_once 'check_worker.php';

	if( isset($_POST['btn-add']) )
	{
		$nazev = $_POST['nazev'];
		$zanr = $_POST['zanr'];
		$autor = $_POST['autor'];
		$delka = $_POST['delka'];
		$datum_prijeti = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
		$sql = "INSERT INTO Film (nazev, id_zanru, autor, delka, datum_prijeti)
				VALUES ('$nazev', $zanr, '$autor', $delka, '$datum_prijeti')";
		echo("<div id='flashMessage'>");
		if ($db->query($sql) === TRUE)
		{
			echo ("Film byl úspěšně vložen do databáze.");
		}
		else
			echo ("Film se nepodařilo vložit. Sql: " . $db->error);
		echo("</div>");
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Přidání nového filmu</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>Přidat nový film</h2>
		<form method="post">
			<table align="center" border="0">
				<tr>
					<td><label for="nazev">Název filmu</label></td>
					<td><input type="text" name="nazev" required /></td>
				</tr>
				<tr>
					<td><label for="zanr">Žánr</label></td>
					<td>
						<?php
							$sql = "SELECT id_zanru, nazev FROM Zanr";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								echo("<select name='zanr' class='box'>");
								while($row = $result->fetch_assoc())
								{
									echo("<option value='" . $row['id_zanru'] . "'>" . $row['nazev'] . "</option>");
								}
								echo("</select>");
							}
							else
								echo ("Došlo k SQL chybě: " . $db->error);
						?>
					</td>
				</tr>
				<tr>
					<td><label for="autor">Autor</label></td>
					<td><input type="text" name="autor" required /></td>
				</tr>
				<tr>
					<td><label for="delka">Délka</label></td>
					<td><input type="text" name="delka" required /></td>
				</tr>
			</table>
			<div class="topMargin ">
				<button type="submit" name="btn-add" style="width: 143px;">Přidat film</button>
			</div>
		</form>
	</div>
	<?php include 'footer.php'; ?>
	<script>
		var fm = document.getElementById("flashMessage");
		console.log(fm);
		$('fm').click(function(){
        	$(this).hide();
		});
	</script>
</body>
</html>
