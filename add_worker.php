<?php
	require_once 'core.php';
	require_once 'check_worker.php';
	if( $_userRights_ != ADMIN_RIGHTS )
	{
		?>
		<script>alert("Nem�te opr�vn�n� pro p��stup do t�to sekce.")</script>
		<?php
		header("Location: worker_login.php");
	}

	if(isset($_POST['btn-add']))
	{
		$username = $_POST['username'];
		$jmeno = $_POST['jmeno'];
		$prijmeni = $_POST['prijmeni'];
		$upass = $_POST['pass'];

		// check jestli uz neexistuje
		/*
		$sql = "SELECT username FROM Klient WHERE username = '$username'";
		$result = $db->query($sql);
		if ($result->num_rows > 0)
		{

		}
		else
		{
			$sql = "INSERT INTO Klient(username, jmeno, prijmeni, heslo) VALUES('$username','$jmeno', '$prijmeni','$upass')";
			if ($db->query($sql) === TRUE)
			{

			}
		 	else
			{
		 	}
		}
		*/
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>P�id�n� nov�ho zam�stnance</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<h2>P�id�n� nov�ho zam�stnance</h2>
		<form method="post">
			<table align="center" width="30%" border="0" text-align="left">
				<tr>
					<td><label for="username">U�itelsk� jm�no</label></td>
					<td><input type="text" name="username" required /></td>
				</tr>
				<tr>
					<td><label for="jmeno">K�estn� jm�no</label></td>
					<td><input type="text" name="jmeno" required /></td>
				</tr>
				<tr>
					<td><label for="prijmeni">P�ijmen�</label></td>
					<td><input type="text" name="prijmeni" required /></td>
				</tr>
				<tr>
					<td><label for="pass">Heslo</label></td>
					<td><input type="password" name="pass"required /></td>
				</tr>
				<tr>
					<td><label for="adresa">Adresa</label></td>
					<td><input type="text" name="adresa" /></td>
				</tr>
				<tr>
					<td><label for="superior">Nad��zen�</label></td>
					<td>
						<?php
							$sql = "SELECT id_zamestnance, jmeno, prijmeni, login
									FROM Zamestnanec
									WHERE id_sef is NULL";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								echo("<select name='zanr' class='box'>");
								while($row = $result->fetch_assoc())
								{
									echo("<option value='" . $row['id_zamestnance'] . "'>" . $row['jmeno'] . " " . $row['prijmeni'] . "</option>");
								}
								echo("</select>");
							}
							else
								echo ("Do�lo k SQL chyb�: " . $db->error);
						?>
					</td>
				</tr>
				<tr>
					<td><label for="phoneNumber">Telefon� ��slo</label></td>
					<td><input type="text" name="phoneNumber" /></td>
				</tr>
				<tr>
					<td><label for="kino">Kino</label></td>
					<td>
						<?php
							$sql = "SELECT id_kina, nazev, mesto FROM Kino";
							$result = $db->query($sql);
							if ($result->num_rows > 0)
							{
								echo("<select name='zanr' class='box'>");
								while($row = $result->fetch_assoc())
								{
									echo("<option value='" . $row['id_kina'] . "'>" . $row['nazev'] . ", " . $row['mesto'] ."</option>");
								}
								echo("</select>");
							}
							else
								echo ("Do�lo k SQL chyb�: " . $db->error);
						?>
					</td>
				</tr>
			</table>
			<div class="topMargin ">
				<button type="submit" name="btn-add" style="width: auto;">P�idat zam�stnance</button>
			</div>
		</form>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
