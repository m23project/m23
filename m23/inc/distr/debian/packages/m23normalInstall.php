<?PHP
/*
Description: Installs normal Debian packages
Priority:25
*/

function run($id)
{
	include("/m23/inc/distr/debian/packages.php");
	include("/m23/inc/distr/debian/clientConfigCommon.php");

	$sql="SELECT normalPackage,client FROM `clientjobs` WHERE id=$id";
	$result=DB_query($sql) or die ("Could not execute SQL statement:".$sql);

	$line=mysqli_fetch_array($result);

	sendClientStageStatus(STATUS_BLUE);
// 	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_packages);

	$clientOptions=CLIENT_getAllOptions($line['client']);

	$scriptName="/m23/data+scripts/distr/".$clientOptions['distr']."/packages/".$line['normalPackage']."extraCommands.php";

	if (file_exists($scriptName))
	{
		include($scriptName);
		$executeScript = true;
	}
	else
		$executeScript = false;

	if ($executeScript)
		preInstallCommands($clientOptions);
	/* =====> */ MSR_statusBarIncCommand(5);

	//Check if there are debconf settings in the DB. If yes => Import them into the local debconf
	CLIENT_runDebconf($line['client']);
	/* =====> */ MSR_statusBarIncCommand(10);

	//Run the installation
	CLCFG_aptGet("install", $line['normalPackage']);
	/* =====> */ MSR_statusBarIncCommand(80);

	if ($executeScript)
		afterInstallCommands($clientOptions);

	PKG_fastGetInstalledPackages("/tmp/m23PackageInstallStatus.txt");
	/* =====> */ MSR_statusBarIncCommand(5);

	MSR_genSendCommand("/tmp/m23PackageInstallStatus.txt","MSR_markm23normalAsDone");

	sendClientStageStatus(STATUS_GREEN);

	sendClientStatus($id,"done");
	executeNextWork();
}
?>
