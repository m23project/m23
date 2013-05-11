<?PHP
/*
Name:fdiskFormatInstall.php
Funktion: liest Partionierungsdaten aus der DB und wandelt sie in ein parted-Script
Programmierer: Hauke Goos-Habermann
Description:Partitionierung und Formatierung
Priority:5
*/

include ('m23CommonInstallRoutines.php');
include_once('/m23/inc/distr/debian/clientConfigCommon.php');

function run($id)
{
	$clientOptions=CLIENT_getAllAskingOptions();

	//Set the size of the inodes to 128 bytes for Debian Etch (this is needed for grub)
	if ($clientOptions['release']=="etch")
		$mkfsextOptions = " -I 128 ";
	else
		$mkfsextOptions = "";

	//Get the name of the sources list
	$sourceName = $clientOptions['packagesource'];

	CIR_detectSCSI();

	CIR_enableDropbear();

	$lang=getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_partition_format_client);

	FDISK_adjustFdiskParams(CLIENT_getClientName());
	/* =====> */ MSR_statusBarIncCommand(25);

	//get package parameters => convert to the associative array => convert to the commands
	$formatCommands = FDISK_genPartedCommands(explodeAssoc("###",PKG_getPackageParams($id)), $mkfsextOptions, $sourceName);
 
	echo($formatCommands);
	/* =====> */ MSR_statusBarIncCommand(75);

	//Make sure m23raid.log exists
	echo('
touch /tmp/m23raid.log
');

	MSR_logCommand("/tmp/m23raid.log");

	sendClientStatus($id,"done");
	executeNextWork();
}
?>
