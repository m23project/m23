<span class="title"><?PHP echo($_GET['client']." : ".$I18N_change_debug_status); ?></span>

<br><br>


<?php
	CLIENT_showDebugSelection($_GET['client']);
	
	CLIENT_HTMLBackToDetails($_GET['client'],$_GET['id'],"criticalStatus");
	
	help_showhelp("client_debug");
?>
