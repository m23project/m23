<?PHP
/*
Description: Enter your description here
Priority: Enter the priority number here (scripts with lower numbers get executed earlier)
*/

/*
	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

include ("/m23/data+scripts/packages/m23CommonInstallRoutines.php");
include ("/m23/inc/distr/debian/clientConfigCommon.php");

function run($id)
{
	/*
		Set variables:
			$id: is the numer of the current job
			
		Usefull funtion calls:
			PKG_getPackageParams($id): Get all parameters of the packages
			$clientParams=CLIENT_getAskingParams(): Get all parameters of the client
			sendClientStatus($id,"done"): Change the status of the current script
			MSR_logCommand($logFile): A text file from the client to the client's log in the m23 database
			
		Example (Send last 5 lines of the sources.list to the m23 client's log):
		
			echo("cat /etc/apt/sources.list | tail -5 > /tmp/last5Lines
			");
			MSR_logCommand("/tmp/last5Lines");
			
	*/

	sendClientStatus($id,"done");
	executeNextWork();
};
?>