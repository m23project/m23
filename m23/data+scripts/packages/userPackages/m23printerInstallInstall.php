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
    // Name of the printer in the client's printing dialog
    $printerName = 'myPrinter';
    // Name of the printer's printserver
    $printSeverURL = 'https://example.com/myprinter';
    // The printer's PPD file store location on the m23 client
    $PPDFile = '/usr/share/myprinter/printer.ppd';
    // The download location of the printer's PPD file (/m23/data+scripts/extraDebs/printer.ppd on the m23 server)
    $PPDDownloadURL = 'http://'.getServerIP().'/extraDebs/printer.ppd';
    
    // Download the PPD and add a new printer
	echo ("
	wget $PPDDownloadURL -O $PPDFile
	lpadmin -p $printerName -E -v $printSeverURL -P $PPDFile
    lpadmin -d $printerName
    ");


	sendClientStatus($id,"done");
	executeNextWork();
};
?>