<?php

switch ($_GET['infoType'])
	{
		case "hardware" : $title=$I18N_hardware_info; break;
		case "directConnect" : $title=$I18N_client_directConnect; break;
		case "clientLog": $title=$I18N_client_log; break;
		case "addToGroup": $title=$I18N_addToGroup; break;
		case "delFromGroup": $title=$I18N_removeFromGroup; break;
	};

	$client = $_GET['client'];
	$id = $_GET['id'];
?>

<span class="title"><?PHP echo("$client : $title"); ?></span>

<br><br>

<?php
switch ($_GET['infoType'])
	{
		case "hardware":
			{
				CLIENT_showHardwareInfo($client);
				CLIENT_HTMLBackToDetails($client,$id,"clientInformation");
				$helpPage="clientinfo_hardware";
				break;
			};
		case "directConnect":
			{
				echo(CLIENT_showDirectConnectionHelp($client,$GLOBALS['m23_language']));
				CLIENT_HTMLBackToDetails($client,$id,"criticalStatus");
				$helpPage="";
				break;
			};
			
		case "clientLog":
			{
				CLIENT_showLog($client);
				CLIENT_HTMLBackToDetails($client,$id,"clientInformation");
				$helpPage="clientinfo_clientLog";
				break;
			};
			
		case "addToGroup":
			{
				GRP_doClientMoreGroups($client,"add");
				CLIENT_HTMLBackToDetails($client,$id,"clientAdmin");
				$helpPage="clientinfo_addToGroup";
				break;
			}
			
		case "delFromGroup":
			{
				GRP_doClientMoreGroups($client,"del");
				CLIENT_HTMLBackToDetails($client,$id,"clientAdmin");
				$helpPage="clientinfo_delFromGroup";
				break;
			}
	};

	if (!empty($helpPage))
		help_showhelp($helpPage);
?>
