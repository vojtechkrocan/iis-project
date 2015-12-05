<?php
	if( $userLogged == false )
	{
		?>
		<script>alert('Pro pøístup do této sekce se musíte pøihlásit.');</script>
		<?php
		header("Location: login.php");
	}
?>
