<?php
	var_dump($_userLogged_);
	var_dump($_userRights_);
?>
<div class="topbar">
	<?php
		if( $_userLogged_ )
		{
			if( $_userRights_ <= USER_RIGHTS )
			{
				$sql = "SELECT *
						FROM Klient
						WHERE id_klienta = '" . $_userLogged_ . "'";

			}
			else
			{
				$sql = "SELECT *
						FROM Zamestnanec
						WHERE id_zamestnance = '" . $_userLogged_ . "'";
			}
			$result = $db->query($sql);
			if( $result->num_rows == 1 )
			{
				$row = $result->fetch_assoc();
				if( $_userRights_ <= USER_RIGHTS )
					echo($row['username']);
				else
					echo($row['login']);
				echo(" | " . $row['jmeno'] . " " . $row['prijmeni'] . " | ");
				?>
					<a href="logout.php">Odhlásit se</a>
				<?php
			}
			else
			{
				?>
					<a href="login.php">Pøihlásit se</a>
				<?php
			}
		}
		else
		{
			?>
				<a href="login.php">Pøihlásit se</a>
			<?php
		}
	?>
</div>
<div class="mainMenu">
	<div class="menu">
		<div class="menuBG">
			<a href="index.php" class="menuItem">Domù</a>
			<a href="program.php" class="menuItem">Program</a>
			<a href="cinemas.php" class="menuItem">Kina</a>
			<a href="contact.php" class="menuItem">Kontakt</a>
			<!-- Zobrazit jen kdyz je admin
			<a href="internal.php" class="menuItem">Interní</a> -->
			<?php
				if( $_userRights_ > USER_RIGHTS )
				{
					?>
						<a href="internal.php" class="menuItem">Interní</a>
					<?php
				}
			?>
		</div>
	</div>
</div>
