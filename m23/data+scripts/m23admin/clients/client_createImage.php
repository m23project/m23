<?
	HELPER_getClientNameAndID($client, $id);
?>



<span class="title"><?PHP echo("$client : $I18N_createImage"); ?></span>

<br><br>


<?php
	IMG_showCreateImage($client, $id);
	CLIENT_HTMLBackToDetails($client, $id, "clientAdmin");
	help_showhelp("client_createImage");
?>