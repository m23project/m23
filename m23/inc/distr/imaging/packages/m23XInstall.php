<?PHP
/*
Description:X11 only, no dektop
Priority:20
*/

function run($id)
{
	/*This script doesn't install anything, because X11 is installed with the
	m23xfree864 job. It is only to hinder the installation of a real desktop and
	setting the stage status.*/
	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);
	executeNextWork();
}
?>
