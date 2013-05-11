<?PHP
/*
Description: Installs normal Debian packages
Priority:25
*/

function run($id)
{
	include("/m23/inc/distr/halfSister/packages.php");
	include("/m23/inc/distr/debian/clientConfigCommon.php");

	$sql="SELECT normalPackage,client FROM `clientjobs` WHERE id=$id";
	$result=mysql_query($sql) or die ("Could not execute SQL statement:".$sql);

	$line=mysql_fetch_array($result);

	sendClientStageStatus(STATUS_BLUE);

	$clientOptions=CLIENT_getAllOptions($line['client']);

	$scriptName="/m23/data+scripts/distr/".$clientOptions['distr']."/packages/".$line['normalPackage']."extraCommands.php";

	if (file_exists($scriptName))
		{
			include($scriptName);
			$executeScript = true;
		};

	if ($executeScript)
		preInstallCommands($clientOptions);
	/* =====> */ MSR_statusBarIncCommand(5);

	//Check if there are client package configuration settings in the DB. If yes => Import them into the local client package configuration
	HS_runClientPackageConfDB($line['client']);
	/* =====> */ MSR_statusBarIncCommand(10);

	//Run the installation
	HS_pkgInstall($line['normalPackage']);
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
