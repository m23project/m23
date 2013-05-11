<span class="title"><?PHP echo($_GET['client']." : ".$I18N_backup); ?></span>

<br><br>


<?php
	BACKUP_showClientSettings($_GET['client']);

	help_showhelp("client_backup");
?>
