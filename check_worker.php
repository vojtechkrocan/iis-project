<?php
	if( $_userLogged_ == false )
	{
		?>
		<script>alert('Pro p��stup do t�to sekce se mus�te p�ihl�sit.');</script>
		<?php
		header("Location: login_worker.php");
	}
	if( $_userRights_ < 2 )
	{
		?>
		<script>alert('Nem�te pr�va k p��stupu do t�to sekce.');</script>
		<?php
		header("Location: login_worker.php");
	}
?>
