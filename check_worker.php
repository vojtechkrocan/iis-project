<?php
	if( $userLogged == false )
	{
		?>
		<script>alert('Pro pøístup do této sekce se musíte pøihlásit.');</script>
		<?php
		header("Location: worker_login.php");
	}
	if( $userRights < 1 )
	{
		?>
		<script>alert('Nemáte práva k pøístupu do této sekce.');</script>
		<?php
		header("Location: worker_login.php");
	}
?>
