<?PHP
/*
Description: Sends package status information to the server
Priority:25
*/
function run($id)
{
	echo("
	#apt-get clean
	");

	MSR_CopyClientPackageStatusCommand();
	/* =====> */ MSR_statusBarIncCommand(90);

	MSR_statusFileCommand();
	/* =====> */ MSR_statusBarIncCommand(10);

	sendClientStatus($id,"done");
	executeNextWork();
};
?>