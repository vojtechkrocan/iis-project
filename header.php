<!-- tohle smazat -->
<?php
	var_dump($userLogged);
	var_dump($userRights);
?>
<div class="mainMenu">
		<div class="userArea">
			<?php

				if( $userLogged )
				{
					?>
						<button type="button" onclick="window.location='logout.php';" style="width: auto">Odhlásit se</button>
					<?php
				}
				else
				{
					?>
						<button type="button" onclick="window.location='login.php';" style="width: auto">Pøihlásit se</button>
					<?php
				}
			?>
		</div>
	<div class="menu">
		<div class="menuBG">
			<a href="index.php" class="menuItem">Domù</a>
			<a href="program.php" class="menuItem">Program</a>
			<a href="cinemas.php" class="menuItem">Kina</a>
			<a href="contact.php" class="menuItem">Kontakt</a>
			<!-- Zobrazit jen kdyz je admin
			<a href="internal.php" class="menuItem">Interní</a> -->
			<?php
				if( $userRights > 0 )
				{
					?>
						<a href="internal.php" class="menuItem">Interní</a>
					<?php
				}
			?>
		</div>
	</div>
</div>
