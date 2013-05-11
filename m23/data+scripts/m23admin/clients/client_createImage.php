<?
	if (isset($_POST['client']{1}))
		$client = $_POST['client'];
	else
		$client = $_GET['client'];
?>



<span class="title"><?PHP echo("$client : $I18N_createImage"); ?></span>

<br><br>


<?php
	IMG_showCreateImage($client);
	help_showhelp("client_createImage");
?>