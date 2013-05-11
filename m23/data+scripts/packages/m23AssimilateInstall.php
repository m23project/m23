<?PHP
/*
Description:The m23 assimilator imports an existing Debian computer into the m23 system
Priority:0
*/

function run($id)
{
	ASSI_prepareClient();
	/* =====> */ MSR_statusBarIncCommand(25);

	MSR_getClientSettingsCommand();
	/* =====> */ MSR_statusBarIncCommand(45);

	MSR_CopyClientPackageStatusCommand();
	/* =====> */ MSR_statusBarIncCommand(20);

	MSR_statusFileCommand();
	/* =====> */ MSR_statusBarIncCommand(10);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

	rm /tmp/*.sh

	rm /tmp/*.php\n\n");

	executeNextWork();
}
?>