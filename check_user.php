<?php
	if( $_userLogged_ == false )
	{
		?>
		<script>alert('Pro pøístup do této sekce se musíte pøihlásit.');</script>
		<?php
		header("Location: login.php");
	}
?>
