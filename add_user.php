<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Řetězec multikin</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include 'header.php' ?>
	<?php require_once 'db_connection.php'; ?>
	<div class="content">
		<?php
			$stmt = $db->prepare("INSERT INTO Zakaznik (jmeno, prijmeni, username) VALUES (?, ?, ?)");
			$stmt->bind_param("sss", $firstname, $lastname, $username);
			
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
