<?php
	session_start();
	session_destroy();
	$_userLogged_ = false;
	$_userRights_ = false;
	require_once 'core.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Odhlášení</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="content">
		<h2>Odhlášení proběhlo úspěšně</h2>
		<button type="button" onclick="window.location='login.php';" style="width: auto">Nové přihlášení</button>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
