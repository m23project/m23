<?php HTML_showFormHeader(); ?>

<span class="title">
<?PHP
	if (isset($_GET['clearSession']) && ($_GET['clearSession'] == 1))
	{
		$_SESSION = array();
		unset($_SESSION['FDISK_showDiskDefine']);
		if (function_exists('m23SHARED_init'))
			dbConnect();
	}
	
	LDAP_checkphpLdapAdminConfiguration();

	$clientBuilder=ADDDIALOG_normalAdd;

	//Store the action for later usage
	if (isset($_GET['action']))
		$_SESSION['clientAddAction'] = $_GET['action'];
	
	if (isset($_SESSION['clientAddAction']) && ($_SESSION['clientAddAction'] == "clientBuilder"))
	{
		$clientBuilder = ADDDIALOG_defineOnly;
		$helpPage="clientBuilder";
		echo($I18N_clientBuilder);
	}
	else
	{
		echo($I18N_add_client); 
		$helpPage="client_add";
	}
?>
</span><br><br>



<?php

	//Check if m23shared is running and if there are unused paid clients
	if (isset($_SESSION['m23Shared']) && $_SESSION['m23Shared'])
		$showDialog = m23SHARED_unusedPaidClientsAvailable();
	else
		$showDialog = true;

	//Show the client add dialog if possible
	if ($showDialog)
		CLIENT_showAddDialog($clientBuilder);

	HTML_showFormEnd();
	help_showhelp($helpPage);
?>

