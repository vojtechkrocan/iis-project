<?php
	if( $_userLogged_ == false )
	{
		?>
		<script>alert('Pro p��stup do t�to sekce se mus�te p�ihl�sit.');</script>
		<?php
		header("Location: login.php");
	}
?>
