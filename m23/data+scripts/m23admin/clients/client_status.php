<?PHP
	$client = (isset($_GET['client']{0}) ? $_GET['client'] : $_POST['client']);
	$id = (isset($_GET['id']{0}) ? $_GET['id'] : $_POST['id']);
	
	echo("<span class=\"title\">$client : $I18N_change_client_status</span>");
?>

<br><br>


<?php
	CLIENT_showStatusSelection($client, $id);
	CLIENT_HTMLBackToDetails($client, $id, "criticalStatus");
	HTML_setPage("clientstatus");
	help_showhelp("client_status");
?>
