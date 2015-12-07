<?php
	if( $_userLogged_ == false )
	{
		?>
		<script>alert('Pro pøístup do této sekce se musíte pøihlásit.');</script>
		<?php
		header("Location: login_worker.php");
	}
	if( $_userRights_ < 2 )
	{
		?>
		<script>alert('Nemáte práva k pøístupu do této sekce.');</script>
		<?php
		header("Location: login_worker.php");
	}
?>
