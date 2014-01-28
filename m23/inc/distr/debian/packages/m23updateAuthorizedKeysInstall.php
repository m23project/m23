<?PHP
/*
Description: Updates the authorized_keys file with the public SSH key of the m23 server.
Priority:125
*/

function run($id)
{
	include('/m23/inc/distr/debian/clientConfigCommon.php');

	echo("
sed -i \"s#ssh-dss AAAAB3NzaC1kc3MAAACBAK/uN5GSeR9QOO5J4356XtuugLVX576OJHIpAYgbm1vzJuN6dDGurB7z34S/ihA5eRnaRF6PEpAdPy3ceW+U2Nn7pJBKv1HS8TKJD37sGrkbBweXBbKjuZyLvgV+tLxpwaHRxdK0ppKY84DVFlXKt4gS2mvGIuJ8vauVvf/iMzCHAAAAFQC2Q15Ap0XYgHMNU2jWtaHa0hV8qwAAAIEAp+FG7Rw/fpwDIl69IYH2LxaSOTJYxw03+y8oIQvmu5KJ4afuCTeqUorR7zy/V2yIXjc47zxMije7mdnTCKSAerrMHAi6AMV5UerZ2JFhwNOZIQiPeXW43ZOzVNKLobfhPKkBm01abAkWK7+Kcb3PrvpuW1DjkMkIpGlE/eA73+8AAACAOB+K6cXynUyXj53lcrUQ2JjrXsclzzSCj5sGyWtRPNFS6GSu+6Cu3XUy6z7DLVtRtEIoQvuGXMzh3cgC/pSvyfvmQvqSPzSUN5EOvaZqlFULPtdgO4+So9t5wfxug+/32UMPbsJJtLeRN9ie3TpVYWd8dZVlrsqKADakx7f/B8A= root@m23s##g\" /root/.ssh/authorized_keys
");
	
	CLCFG_setAuthorized_keys(getServerIP(),"/packages/baseSys/authorized_keys");

	/* =====> */ MSR_statusBarIncCommand(100);

	sendClientStageStatus(STATUS_GREEN);
	sendClientStatus($id,"done");
	executeNextWork();
}
?>