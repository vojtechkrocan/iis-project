<?php
	require_once 'core.php';
	require_once 'check_worker.php';
	if( $_userRights_ != ADMIN_RIGHTS )
	{
		?>
		<script>alert("Nemáte oprávnění pro přístup do této sekce.")</script>
		<?php
		header("Location: worker_login.php");
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Přidání nového zaměstnance</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="content" >
		<!-- Tady pokracovat -->
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
