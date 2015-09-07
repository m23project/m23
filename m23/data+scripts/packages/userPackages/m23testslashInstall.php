<?PHP
/*
Description: Enter your description here
Priority: Enter the priority number here (scripts with lower numbers get executed earlier)
*/

include (\"/m23/data+scripts/packages/m23CommonInstallRoutines.php\");
include (\"/m23/inc/distr/debian/clientConfigCommon.php\");

function run($id)
{
  echo("\"");
\
	/*
		Set variables:
			$id: is the numer of the current job
			
		Usefull funtion calls:
			PKG_getPackageParams($id): Get all parameters of the packages
			$clientParams=CLIENT_getAskingParams(): Get all parameters of the client
			sendClientStatus($id,\"done\"): Change the status of the current script
			MSR_logCommand($logFile): A text file from the client to the client\'s log in the m23 database
			
		Example (Send last 5 lines of the sources.list to the m23 client\'s log):
		
			echo(\"cat /etc/apt/sources.list | tail -5 > /tmp/last5Lines
			\");
			MSR_logCommand(\"/tmp/last5Lines\");
			
	*/

	sendClientStatus($id,\"done\");
	executeNextWork();
};
?>