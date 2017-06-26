<span class="title"><?PHP echo($_GET['client']." : ".$I18N_backup); ?></span>

<br><br>


<?php
	BACKUP_showClientSettings($_GET['client']);

	CLIENT_HTMLBackToDetails($_GET['client'], $_GET['id'], "clientAdmin");

	help_showhelp("client_backup");
?>
