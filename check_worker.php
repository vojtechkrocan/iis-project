<?php
	if( $userLogged == false )
	{
		?>
		<script>alert('Pro p��stup do t�to sekce se mus�te p�ihl�sit.');</script>
		<?php
		header("Location: worker_login.php");
	}
	if( $userRights < 1 )
	{
		?>
		<script>alert('Nem�te pr�va k p��stupu do t�to sekce.');</script>
		<?php
		header("Location: worker_login.php");
	}
?>
