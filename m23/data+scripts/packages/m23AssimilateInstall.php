<?PHP
/*
Description:The m23 assimilator imports an existing Debian computer into the m23 system
Priority:0
*/

function run($id)
{
	HS_fetchm23HSAdminAndm23hwscannerByOS();	//halfSister-based
	ASSI_prepareClient();						//Debian-based
	/* =====> */ MSR_statusBarIncCommand(25);

	HS_ASSI_getClientSettingsCommand();			//halfSister-based
	MSR_getClientSettingsCommand();				//Debian-based
	/* =====> */ MSR_statusBarIncCommand(45);

												//no cache file used on halfSister-based
	MSR_CopyClientPackageStatusCommand();		//Debian-based
	/* =====> */ MSR_statusBarIncCommand(20);

	HS_ASSI_statusFileCommand();				//halfSister-based
	MSR_statusFileCommand();					//Debian-based
	/* =====> */ MSR_statusBarIncCommand(10);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

	rm /tmp/*.sh

	rm /tmp/*.php\n\n");

	executeNextWork();
}
?>