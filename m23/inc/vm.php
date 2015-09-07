<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Functions for managing virtual clients.
$*/


define('CLOUDSTACK_CONFFILE', '/m23/inc/CloudStackConf.php');

//Try to include the maybe existing CloudStack configuration file and class
@include_once(CLOUDSTACK_CONFFILE);
@include_once('/m23/inc/CloudStack/CloudStackClient.php');

//Path to store the images and virtual machine files
define('VM_IMAGE_DIR','/m23/vms/');

//Status of a virtual machine
define('VM_STATE_OFF',0);
define('VM_STATE_PAUSE',1);
define('VM_STATE_ON',2);

//Types of virtual network cards
define('VM_NETTYPE_HOSTINTERFACE',0);
define('VM_NETTYPE_BRIDGEDINTERFACE',1);

//Status of a virtual network cards
define('VM_NET_DISCONNECTED',0);
define('VM_NET_CONNECTED',1);

//VM software installed on the host
define('VM_SW_NONE',0);
define('VM_SW_VBOX',1);
define('VM_SW_KVM',2);
define('VM_SW_CLOUDSTACK',3);

//Role of the client as VM host, guest or none of them
define('VM_ROLE_NONE',0);
define('VM_ROLE_HOST',1);
define('VM_ROLE_GUEST',2);

//Steps in the GUI to create a new VM
define('VM_stepSelectHost',0);
define('VM_stepCheckHost',1);
define('VM_stepCreateGuest',2);
define('VM_stepCreateCloudStackVM',3);





/**
**name VM_captureVMScreenAsMovie($type, $vmName, $enable, $movieFile, $width, $height, $rate, $fps)
**description Enables/disables capturing the screen of a VM to a movie file.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmname: Name of the VM.
**parameter enable: true for enabling the capturing, false for disabling.
**parameter movieFile: File to store the capturing in.
**parameter width: Width of the movie.
**parameter height: Height of the movie.
**parameter rate: Bitrate of the movie.
**parameter fps: Frames per second
**returns BASH code for enabling/disabling the capturing of the VM's screens to a movie file.
**/
function VM_captureVMWindowAsMovie($type, $vmName, $enable, $movieFile, $width, $height, $rate, $fps)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			if ($enable)
				return("VBoxManage modifyvm \"$vmName\" --vcpenabled on --vcpscreens 0 --vcpfile \"$movieFile\" --vcpwidth $width --vcpheight $height --vcprate $rate --vcpfps $fps\n");
			else
				return("VBoxManage modifyvm \"$vmName\" --vcpenabled off\n");
		break;
	}
	return($cmd);
}





/**
**name VM_CloudStackDeleteClientVM($virtualMachineId, &$VMDeletionOK)
**description Deletes a virtual machine for use with m23 in CloudStack, only a cloudstack admin can recover it
**parameter virtualMachineId:  CloudStack ID of the virtual machine
**parameter VMDeletionOK: True if VM was successfully deleted, false otherwise
**returns ErrorMessages or Success messages, sets parameter VMDeletionOK (true if all went well, false if an error ocurred)
**/	
function VM_CloudStackDeleteClientVM($virtualMachineId, &$VMDeletionOK)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	try
	{
		$csClient = VM_CloudStack_getObject();
		$result = $csClient->destroyVirtualMachine($virtualMachineId);

		if (property_exists($result, 'errorcode'))
		{
			$VMDeletionOK = FALSE;
			return($I18N_csError."\n".$I18N_csErrorCode.$result->errorcode."\n".$I18N_csErrorText.$result->errortext);
		}
		else
		{
			$jobid = $result->jobid;
			$jobstatus = 0;
			$maxtrynumber = 150;
			while ($jobstatus == 0)
			{
				sleep(1);
				$jobresult = $csClient->queryAsyncJobResult($jobid);
				$jobstatus = $jobresult->jobstatus;

				if ($jobstatus == 2)
				{
					$VMDeletionOK = FALSE;
					return($I18N_csError."\n".$I18N_csErrorText.$jobresult->jobresult);
				}
				
				if (0 == ($maxtrynumber--))
				{
					$VMDeletionOK = FALSE;
					return($I18N_csTimeout);
				}
			}

			$VMDeletionOK = TRUE;
			return($I18N_csJobSuccess);
		}
	}
	catch(Exception $except)
	{
		$VMDeletionOK = FALSE;
		return($I18N_csError."\n".$I18N_csErrorText.$except->getMessage());
	}
}





/**
**name VM_isCloudStackClient($clientName)
**description Checks, if the client is run in CloudStack
**returns true, when the client is run in CloudStack otherwise false.
**/
function VM_isCloudStackClient($clientName)
{
	//Check, if this is a virtual client
	$vmSwHost = VM_getSWandHost($clientName);
	if ($vmSwHost === false)
		return(false);

	//Check, if is is run in CloudStack
	if (VM_SW_CLOUDSTACK == $vmSwHost['vmSoftware'])
		return(true);
	else
		return(false);
}





/**
**name VM_CloudStackCheckConstants($CLOUDSTACK_API_ENDPOINT, $CLOUDSTACK_API_KEY, $CLOUDSTACK_SECRET_KEY)
**description Checks, if the given constant values are valid.
**parameter CLOUDSTACK_API_ENDPOINT: The API entpoint.
**parameter CLOUDSTACK_API_KEY: The API key.
**parameter CLOUDSTACK_SECRET_KEY: The secret API key.
**returns true, when the constant values are valid otherwise false.
**/
function VM_CloudStackCheckConstants($CLOUDSTACK_API_ENDPOINT, $CLOUDSTACK_API_KEY, $CLOUDSTACK_SECRET_KEY)
{
	if (empty($CLOUDSTACK_API_ENDPOINT) || empty($CLOUDSTACK_API_KEY) || empty($CLOUDSTACK_SECRET_KEY))
		return(false);

	$cloudstack = VM_CloudStack_getObject($CLOUDSTACK_API_ENDPOINT, $CLOUDSTACK_API_KEY, $CLOUDSTACK_SECRET_KEY);

	return(is_string($cloudstack->listCapabilities()->capability->cloudstackversion));
}





/**
**name VM_CloudStackConfigGUI()
**description Shows a dialog for editing the CloudStack config file and uploading the m23 client ISO.
**/
function VM_CloudStackConfigGUI()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	VM_CloudStackWriteConfFile();
	@include(CLOUDSTACK_CONFFILE);
	
	echo(H_MESSAGEBOXPLACEHOLDER);

	// Generate the elements for entering the CloudStack credentials
	$CLOUDSTACK_API_ENDPOINT = HTML_input('ED_CLOUDSTACK_API_ENDPOINT', CLOUDSTACK_API_ENDPOINT, 85);
	$CLOUDSTACK_API_KEY = HTML_input('ED_CLOUDSTACK_API_KEY', CLOUDSTACK_API_KEY, 85);
	$CLOUDSTACK_SECRET_KEY = HTML_input('ED_CLOUDSTACK_SECRET_KEY', CLOUDSTACK_SECRET_KEY, 85);
	$CLOUDSTACK_SERVICE_OFFERING_ID = HTML_input('ED_CLOUDSTACK_SERVICE_OFFERING_ID', CLOUDSTACK_SERVICE_OFFERING_ID, 85);
	$CLOUDSTACK_NETWORKIDS = HTML_input('ED_CLOUDSTACK_NETWORKIDS', CLOUDSTACK_NETWORKIDS, 85);
	$CLOUDSTACK_DISK_OFFERING_ID = HTML_input('ED_CLOUDSTACK_DISK_OFFERING_ID', CLOUDSTACK_DISK_OFFERING_ID, 85);
	$CLOUDSTACK_TEMPLATE_ID = (defined('CLOUDSTACK_TEMPLATE_ID') ? constant('CLOUDSTACK_TEMPLATE_ID') : '');

	// Check, if the given values build a valid configuration
	$constantsValid = VM_CloudStackCheckConstants($CLOUDSTACK_API_ENDPOINT, $CLOUDSTACK_API_KEY, $CLOUDSTACK_SECRET_KEY);

	// The config file is written, when the save button clicked or the test button is clicked and valid parameters are present
	if (HTML_submit('BUT_save', $I18N_save) || ($constantsValid && (HTML_submitCheck('BUT_test'))))
	{
		VM_CloudStackWriteConfFile(true, $CLOUDSTACK_API_ENDPOINT, $CLOUDSTACK_API_KEY, $CLOUDSTACK_SECRET_KEY, $CLOUDSTACK_SERVICE_OFFERING_ID, $CLOUDSTACK_TEMPLATE_ID, $CLOUDSTACK_NETWORKIDS, $CLOUDSTACK_DISK_OFFERING_ID);
		MSG_showInfo($I18N_CloudStack_credentials_saved);
	}

	// Show the result of the test
	if (HTML_submit('BUT_test', $I18N_test_it))
	{
		if ($constantsValid)
			MSG_showInfo($I18N_CloudStack_credentials_valid);
		else
			MSG_showError($I18N_CloudStack_credentials_invalid);
	}

	// Show the table with the elements
	HTML_showSmallTitle($I18N_credentials);
	HTML_showTableHeader(true);
		HTML_showTableRow($I18N_CLOUDSTACK_API_ENDPOINT, ED_CLOUDSTACK_API_ENDPOINT);
		HTML_showTableRow($I18N_CLOUDSTACK_API_KEY, ED_CLOUDSTACK_API_KEY);
		HTML_showTableRow($I18N_CLOUDSTACK_SECRET_KEY, ED_CLOUDSTACK_SECRET_KEY);
		HTML_showTableRow($I18N_CLOUDSTACK_SERVICE_OFFERING_ID, ED_CLOUDSTACK_SERVICE_OFFERING_ID);
		HTML_showTableRow($I18N_CLOUDSTACK_NETWORKIDS, ED_CLOUDSTACK_NETWORKIDS);
		HTML_showTableRow($I18N_CLOUDSTACK_DISK_OFFERING_ID, ED_CLOUDSTACK_DISK_OFFERING_ID);
		HTML_showTableRow($I18N_CLOUDSTACK_TEMPLATE_ID, CLOUDSTACK_TEMPLATE_ID);
		HTML_showTableRow($I18N_VMSoftware, CLOUDSTACK_HYPERVISOR);
		HTML_showTableRow($I18N_CLOUDSTACK_OSTYPE_ID, CLOUDSTACK_OSTYPE_ID);
		HTML_showTableRow('', BUT_save.' '.BUT_test);
	HTML_showTableEnd(true);

	// If the configuration is valid, the dialog for downloading the client ISO is shown
	if ($constantsValid)
	{
		// Define the dialog elements
		$CLOUDSTACK_BOOTISO_URL = HTML_input('ED_CLOUDSTACK_BOOTISO_URL', CLOUDSTACK_BOOTISO_URL, 85);
		HTML_submitDefine('BUT_uploadISO', $I18N_upload);

		// Choose the CloudStack zone and the the download URL
		HTML_showSmallTitle($I18N_CloudStack_boot_ISO);
		HTML_showTableHeader(true);
			$zoneID = VM_GUIstepSelectHost(VM_SW_CLOUDSTACK);
			echo('<tr><td colspan="3">'.ED_CLOUDSTACK_BOOTISO_URL.' '.BUT_uploadISO.'</td></tr>');
		HTML_showTableEnd(true);

		// Do the upload
		if (HTML_submitCheck('BUT_uploadISO'))
		{
			// Download the ISO to the CloudStack zone
			$msg = VM_CloudStackUploadIso(basename($CLOUDSTACK_BOOTISO_URL), $CLOUDSTACK_BOOTISO_URL, $zoneID, $isoUploadSuccess, $isoID);

			// Check, if it was downloaded and registered sucessfully
			if ($isoUploadSuccess)
			{
				// Show a success message
				MSG_showInfo($msg);

				// Write an updated config file with the new template ID ( = ID of the uploaded ISO)
				VM_CloudStackWriteConfFile(true, $CLOUDSTACK_API_ENDPOINT, $CLOUDSTACK_API_KEY, $CLOUDSTACK_SECRET_KEY, $CLOUDSTACK_SERVICE_OFFERING_ID, $isoID, $CLOUDSTACK_NETWORKIDS, $CLOUDSTACK_DISK_OFFERING_ID);
			}
			else
				MSG_showError($msg);
		}
	}

}





/**
**name VM_CloudStackWriteConfFile($overwrite, $CLOUDSTACK_API_ENDPOINT, $CLOUDSTACK_API_KEY, $CLOUDSTACK_SECRET_KEY, $CLOUDSTACK_SERVICE_OFFERING_ID, $CLOUDSTACK_TEMPLATE_ID, $CLOUDSTACK_NETWORKIDS, $CLOUDSTACK_DISK_OFFERING_ID);
**description Writes the CloudStack config file or writes a basic config file, if it does not exist.
**parameter overwrite: Set to true, if the config file should be overwritten in any case.
**parameter CLOUDSTACK_API_ENDPOINT: The API endpoint.
**parameter CLOUDSTACK_API_KEY: The API key.
**parameter CLOUDSTACK_SECRET_KEY: The secret API key.
**parameter CLOUDSTACK_SERVICE_OFFERING_ID: The virtual CPU and RAM combination to use for a new VM.
**parameter CLOUDSTACK_TEMPLATE_ID: The ID of the m23 client installation ISO.
**parameter CLOUDSTACK_NETWORKIDS: The ID of the network to use.
**parameter CLOUDSTACK_DISK_OFFERING_ID: The virtual hard disk type.
**/
function VM_CloudStackWriteConfFile($overwrite = false, $CLOUDSTACK_API_ENDPOINT = '', $CLOUDSTACK_API_KEY = '', $CLOUDSTACK_SECRET_KEY = '', $CLOUDSTACK_SERVICE_OFFERING_ID = '', $CLOUDSTACK_TEMPLATE_ID = '', $CLOUDSTACK_NETWORKIDS = '', $CLOUDSTACK_DISK_OFFERING_ID = '')
{
	if ($overwrite || (!VM_CloudStack_available()))
	{
		$contents = "<?php
define('CLOUDSTACK_API_ENDPOINT', '$CLOUDSTACK_API_ENDPOINT');
define('CLOUDSTACK_API_KEY', '$CLOUDSTACK_API_KEY');
define('CLOUDSTACK_SECRET_KEY', '$CLOUDSTACK_SECRET_KEY');
define('CLOUDSTACK_SERVICE_OFFERING_ID', '$CLOUDSTACK_SERVICE_OFFERING_ID');
define('CLOUDSTACK_TEMPLATE_ID', '$CLOUDSTACK_TEMPLATE_ID');
define('CLOUDSTACK_NETWORKIDS', '$CLOUDSTACK_NETWORKIDS');
define('CLOUDSTACK_DISK_OFFERING_ID', '$CLOUDSTACK_DISK_OFFERING_ID');
define('CLOUDSTACK_HYPERVISOR', 'KVM');
define('CLOUDSTACK_BOOTISO_URL', 'http://switch.dl.sourceforge.net/project/m23/CloudStack/m23client-amd64.iso');
define('CLOUDSTACK_BOOTISO_MD5', '10df9ec3dedc8f2a6095d9e23dd3bddf');
define('CLOUDSTACK_OSTYPE_ID', '133');
define('CLOUDSTACK_X2GO_PORTNUMBER', '22');
?>";

		SERVER_putFileContents(CLOUDSTACK_CONFFILE, $contents, '555', 'www-data', 'www-data');
	}
}






/**
**name VM_CloudStackUploadIso($isoName, $isoUrl, $zoneID, &$isoUploadSuccess, &$isoID)
**description Uploads and registers a new bootable ISO file into cloudstack from a given website
**parameter isoName: the name you choose for the ISO file 
**parameter isoUrl: the url from where you want cloudstack to download the ISO file
**parameter zoneID: The ID of the CloudStack zone.
**parameter isoUploadSuccess: is set to True if action succeeded, false otherwise
**parameter isoID: is set to Cloudstack-Iso-ID if action succeeded, otherwise not set
**returns textmessage about result (errormessage or success message) and sets isoUploadSuccess to True if action succeeded, false otherwise, sets isoID to Iso-ID
**/
function VM_CloudStackUploadIso($isoName, $isoUrl, $zoneID, &$isoUploadSuccess, &$isoID)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$cloudstack = VM_CloudStack_getObject();

	try
	{
		$result = $cloudstack->registerIso($isoName.date('Ymd-H-i-s'), $isoName.date('Ymd-H-i-s'), $isoUrl, $zoneID, "", "", "", "", "", CLOUDSTACK_OSTYPE_ID);

		if (property_exists($result, 'errorcode'))
		{
			$isoUploadSuccess = FALSE;
			return($I18N_csError."\n".$I18N_csErrorCode.$result->errorcode."\n".$I18N_csErrorText.$result->errortext);
		}
		else
		{
			if ($result->count != 1)
			{
				$isoUploadSuccess = FALSE;
				return ($I18N_csError);
			}

			$isolist = $result->iso;
			$isolisting = $isolist[0];

			$isready = $isolisting->isready;
			$status = $isolisting->status;
			$iso_id = $isolisting->id;

// 			print("is ready: ".$isready.", iso-id: ".$iso_id.", job-status: ".$status);

			$maxtrynumber = 120;
			while ($status !== "Successfully Installed" && $isready !== '1')
			{
				sleep(2);

				$isos = $cloudstack->listIsos();

				foreach ($isos as $iso) 
				{
					if ($iso->id == $iso_id)
					{
					$isready = $iso->isready;
					$status = $iso->status;
					}
				}

				if (0 == ($maxtrynumber--))
				{
					$isoUploadSuccess = FALSE;
					return($I18N_csTimeout);
				}
			}

			$isoUploadSuccess = TRUE;
			$isoID = $iso_id;
			return($I18N_csJobSuccess);
		}
	}
	catch(Exception $except)
	{
		$isoUploadSuccess = FALSE;
		return($I18N_csError."\n".$I18N_csErrorText.$except->getMessage());
	}
}





/**
**name VM_CloudStackEnablePortForwarding($virtualMachineId, &$pFSuccess)
**description creates a port forwarding rule for a virtual machine, with private port and public port being the same
**parameter virtualMachineId: the cloudstack ID of the virtual machine to which the rule shall apply
**parameter pFSuccess: is set to true, if the rule was created
**returns textmessage about result (errormessage or success message) and sets pFSuccess to True if action succeeded, false otherwise
**/
function VM_CloudStackEnablePortForwarding($virtualMachineId, &$pFSuccess)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$cloudstack = VM_CloudStack_getObject();

	$publicIPAddressList = $cloudstack->listPublicIpAddresses();
	foreach ($publicIPAddressList->publicipaddress as $publicIPaddressListing)
	{
		if ($publicIPaddressListing->associatednetworkid == CLOUDSTACK_NETWORKIDS)
		{
			$publicIPAddressID = $publicIPaddressListing->id;
			break;
		}
	}

	try
	{
		$result = $cloudstack->createPortForwardingRule($publicIPAddressID, CLOUDSTACK_X2GO_PORTNUMBER, 'TCP', CLOUDSTACK_X2GO_PORTNUMBER, $virtualMachineId);
		if (property_exists($result, 'errorcode'))
		{
			$pFSuccess = FALSE;
			return($I18N_csError."\n".$I18N_csErrorCode.$result->errorcode."\n".$I18N_csErrorText.$result->errortext);
		}
	}
	catch(Exception $except)
	{
		$pFSuccess = FALSE;
		return($I18N_csError."\n".$I18N_csErrorText.$except->getMessage());
	}

	$pFSuccess = TRUE;
	return($I18N_csJobSuccess);
}





/**
**name VM_CloudStackDisablePortForwarding($virtualMachineId, &$pFSuccess)
**description deletes a port forwarding rule for a virtual machine, with private port and public port being the same (CLOUDSTACK_X2GO_PORTNUMBER)
**parameter virtualMachineId: the cloudstack ID of the virtual machine from which the port forwarding rule shall be deleted
**parameter pFDSuccess: is set to true, if the rule was deleted successfully
**returns textmessage about result (errormessage or success message) and sets pFDSuccess to True if action succeeded, false otherwise
**/
function VM_CloudStackDisablePortForwarding($virtualMachineId, &$pFDSuccess)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$cloudstack = VM_CloudStack_getObject();
	
	foreach ($cloudstack->listPortForwardingRules() as $portforwardingrule)
	{ 
	  if ($portforwardingrule->virtualmachineid == $virtualMachineId and $portforwardingrule->publicport == CLOUDSTACK_X2GO_PORTNUMBER and $portforwardingrule->privateport == CLOUDSTACK_X2GO_PORTNUMBER)
	  { 
	    try
	    {
 	      $result = $cloudstack->deletePortForwardingRule($portforwardingrule->id);
	      if (property_exists($result, 'errorcode'))
		{
			$pFDSuccess = FALSE;
			return($I18N_csError."\n".$I18N_csErrorCode.$result->errorcode."\n".$I18N_csErrorText.$result->errortext);
		}
	    }
	    catch(Exception $except)
	    {
		$pFDSuccess = FALSE;
		return($I18N_csError."\n".$I18N_csErrorText.$except->getMessage());
	    }
	    break;
	  }
	}
	$pFDSuccess = TRUE;
	return($I18N_csJobSuccess);
}





/**
**name VM_CloudStackSendSetVisualURL()
**description Sends the visual URL (current client ip:22) to the m23 server, if run under CloudStack.
**/
function VM_CloudStackSendSetVisualURL()
{
	echo(MSR_getm23clientIDCMD('?').'
	serverGateway=$(/sbin/ip route | awk \'/default/ { print $3 }\')
	
	wget -T5 -t0 http://$serverGateway/latest/public-ipv4 -O /tmp/clientIP
	if [ $? -eq 0 ]
	then
		clientIP=$(cat /tmp/clientIP)
		url="$clientIP:22"

		#Send the visual connection URL to the m23 server
		wget -T5 -t0 --post-data="url=$url&clientName='.CLIENT_getClientName().'&type=MSR_VM_setVisualURL" "https://'.getServerIP().'/postMessage.php?$idvar" --no-check-certificate -O "/tmp/MSR_VM_setVisualURL-$clientIP.log"
	fi
');
}





/**
**name VM_CloudStackStartVM($clientname, &$startVMOK)
**description starts a virtual machine in CloudStack
**parameter clientname: CloudStack name of the instance / name of the m23 client.
**parameter startVMOK: true if started successfully or already running, false otherwise
**returns textmessage with result of start or error message
**/
function VM_CloudStackStartVM($clientname, &$startVMOK)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$clientID = VM_CloudStackClientName2ClientID($clientname);

	try
	{
		$csClient = VM_CloudStack_getObject();
		$result = $csClient->startVirtualMachine($clientID);
		if (property_exists($result, 'errorcode'))
		{
			$startVMOK = FALSE;
			return($I18N_csError."\n".$I18N_csErrorCode.$result->errorcode."\n".$I18N_csErrorText.$result->errortext);
		}
		else
		{
			$jobid = $result->jobid;
			$jobstatus = 0;
			$maxtrynumber = 180;
			while ($jobstatus == 0) 
			{
				sleep(2);
				$jobresult = $csClient->queryAsyncJobResult($jobid);
				$jobstatus = $jobresult->jobstatus;
				
				if ($jobstatus == 2)
				{
					$startVMOK = FALSE;
// 					return($I18N_csError."\n".$I18N_csErrorText.$jobresult->jobresult);
				}

				if (0 == ($maxtrynumber--))
				{
					$startVMOK = FALSE;
					return($I18N_csTimeout);
				}
			}

			$startVMOK = TRUE;
			return($I18N_csJobSuccess);
		}
	}
	catch(Exception $except)
	{
		$startVMOK = FALSE;
		return($I18N_csError."\n".$I18N_csErrorText.$except->getMessage());
	}
}





/**
**name VM_CloudStackStopVM($clientname, &$stopVMOK)
**description stops a virtual machine in CloudStack
**parameter clientname: CloudStack name of the instance / name of the m23 client.
**parameter stopVMOK: true if stopped successfully or already stopped, false otherwise
**returns textmessage with result of stop or error message
**/
function VM_CloudStackStopVM($clientname, &$stopVMOK)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$clientID = VM_CloudStackClientName2ClientID($clientname);

	try
	{
		$csClient = VM_CloudStack_getObject();
		$result = $csClient->stopVirtualMachine($clientID);
		if (property_exists($result, 'errorcode'))
		{
			$stopVMOK = FALSE;
			return($I18N_csError."\n".$I18N_csErrorCode.$result->errorcode."\n".$I18N_csErrorText.$result->errortext);
		}
		else
		{
			$jobid = $result->jobid;
			$jobstatus = 0;
			$maxtrynumber = 180;
			while ($jobstatus == 0)
			{
				sleep(2);
				$jobresult = $csClient->queryAsyncJobResult($jobid);
				$jobstatus = $jobresult->jobstatus;
				
				if ($jobstatus == 2)
				{
					$stopVMOK = FALSE;
					return($I18N_csError."\n".$I18N_csErrorText.$jobresult->jobresult);
				}
				
				if (0 == ($maxtrynumber--))
				{
					$stopVMOK = FALSE;
					return($I18N_csTimeout);
				}
			}

			$stopVMOK = TRUE;
			return($I18N_csJobSuccess);
		}
	}
	catch(Exception $except)
	{
		$stopVMOK = FALSE;
// 		return($I18N_csError."\n".$I18N_csErrorText.$except->getMessage());
	}
}





/**
**name VM_CloudStackGetVMStatus($clientname)
**description gets the status of a virtual machine
**parameter clientname: CloudStack name of the instance / name of the m23 client.
**returns textmessage with machine status (like 'Running' or 'Stopped') or FALSE if no status could be retrieved (e.g. if machine doesn't exist)
**/
function VM_CloudStackGetVMStatus($clientname)
{
	$clientID = VM_CloudStackClientName2ClientID($clientname);
	$cloudstack = VM_CloudStack_getObject();
	$vms = $cloudstack->listVirtualMachines();
	foreach ($vms as $vm)
	{
		if ($vm->id == $clientID)
		{
			switch($vm->state)
			{
				case 'Running':
					return(VM_STATE_ON);
				case 'Stopped':
					return(VM_STATE_OFF);
			}
		}
	}
	return(FALSE);
}





/**
**name VM_CloudStackClientName2ClientID($clientname)
**description returns the Cloudstack-ID of a client with the given client host name
**parameter clientname: Host name of the virtual machine
**returns Cloudstack-Client-ID if the clientname can be retrieved, False otherwise 
**/
function VM_CloudStackClientName2ClientID($clientname)
{
	$cloudstack = VM_CloudStack_getObject();
	$vms = $cloudstack->listVirtualMachines();
	foreach ($vms as $vm)
	{
		if ($vm->name == $clientname)
			return($vm->id);
	}
	return(FALSE);
}





/**
**name VM_CloudStackNetBootActivate($clientname, $activate, &$nBASuccess)
**description attaches/exchanges or removes (if any) a network boot ISO to or from the client
**parameter clientname: CloudStack name of the instance / name of the m23 client.
**parameter activate: TRUE for attaching ISO, FALSE for removing
**parameter nBASuccess: is set to True if action succeeded, false otherwise
**returns textmessage about result (errormessage or success message) and sets nBASuccess to True if action succeeded, false otherwise
**/
function VM_CloudStackNetBootActivate($clientname, $activate, &$nBASuccess)
{
	$clientID = VM_CloudStackClientName2ClientID($clientname);

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$cloudstack = VM_CloudStack_getObject();
	try
	{
		if ($activate === TRUE)
			$result = $cloudstack->attachIso(CLOUDSTACK_TEMPLATE_ID, $clientID);
		else
			$result = $cloudstack->detachIso($clientID);

		if (property_exists($result, 'errorcode'))
		{
			$nBASuccess = FALSE;
			return($I18N_csError."\n".$I18N_csErrorCode.$result->errorcode."\n".$I18N_csErrorText.$result->errortext);
		}
		else
		{
			$jobid = $result->jobid;
			$jobstatus = 0;
			$maxtrynumber = 30;
			while ($jobstatus == 0) 
			{
				sleep(2);
				$jobresult = $cloudstack->queryAsyncJobResult($jobid);
				$jobstatus = $jobresult->jobstatus;

				if ($jobstatus == 2)
				{
					$nBASuccess = FALSE;
// 					return($I18N_csError."\n".$I18N_csErrorText.$jobresult->jobresult);
				}

				if (0 == ($maxtrynumber--))
				{
					$nBASuccess = FALSE;
					return($I18N_csTimeout);
				}
			}

			$nBASuccess = TRUE;
			return($I18N_csJobSuccess);
		}
	}
	catch(Exception $except)
	{
		$nBASuccess = FALSE;
		return($I18N_csError."\n".$I18N_csErrorText.$except->getMessage());
	}
}





/**
**name VM_CloudStackCreateVM($name, $zoneID, &$VMCreationOK)
**description Creates a virtual machine for use with m23 in CloudStack
**parameter name: Name of the virtual machine, can contain ASCII letters 'a' through 'z', the digits '0' through '9', and the hyphen ('-'), must be between 1 and 63 characters long, and can't start or end with "-" and can't start with digit
**parameter zoneID: zoneID for CloudStack
**/
function VM_CloudStackCreateVM($name, $zoneID, &$VMCreationOK)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$userData = base64_encode('m23server='.getServerIP());

	try
	{
		$csClient = VM_CloudStack_getObject();
		$result = $csClient->deployVirtualMachine(CLOUDSTACK_SERVICE_OFFERING_ID, CLOUDSTACK_TEMPLATE_ID, $zoneID, "", CLOUDSTACK_DISK_OFFERING_ID, $name, "", "", "", CLOUDSTACK_HYPERVISOR, "", $name, CLOUDSTACK_NETWORKIDS, "", "", "", $userData, "FALSE");
		
		if (property_exists($result, 'errorcode'))
		{
			$VMCreationOK = FALSE;
			return($I18N_csError."\n".$I18N_csErrorCode.$result->errorcode."\n".$I18N_csErrorText.$result->errortext);
		}
		else
		{
			$jobid = $result->jobid;
			$jobstatus = 0;
			$maxtrynumber = 30;

			while ($jobstatus == 0) 
			{
				sleep(1);
				$jobresult = $csClient->queryAsyncJobResult($jobid);
				$jobstatus = $jobresult->jobstatus;

				if ($jobstatus == 2)
				{
					$VMCreationOK = FALSE;
					return($I18N_csError."\n".$I18N_csErrorText.$jobresult->jobresult);
				}

				if (0 == ($maxtrynumber--))
				{
					$VMCreationOK = FALSE;
					return($I18N_csTimeout);
				}
			}

			$pFSuccess = '';
			$virtualMachineId = VM_CloudStackClientName2ClientID($name);
			$pFError = VM_CloudStackEnablePortForwarding($virtualMachineId, $pFSuccess);

			if ($pFSuccess)
			{
				$VMCreationOK = TRUE;
				return($I18N_csVMCreatedSuccessfully);
			}
			else
			{
				$VMCreationOK = FALSE;
				return($pFError);
			}
		}
	}
	catch(Exception $except)
	{
		$VMCreationOK = FALSE;
		return($I18N_csError."\n".$I18N_csErrorText.$except->getMessage());
	}
}





/**
**name VM_CloudStack_getServerIP()
**description Gets the external m23 server IP if the m23 server is run as CloudStack VM.
**returns External m23 server IP.
**/
function VM_CloudStack_getServerIP()
{
	return(HELPER_getContentFromURL('http://'.getServerGateway().'/latest/public-ipv4'));
}





/**
**name VM_GUIstepCreateCloudStackVM()
**description Shows a dialog to create a new VM in CloudStack.
**/
function VM_GUIstepCreateCloudStackVM()
{
	//Check if this part should be shown in the current step
	if ($_SESSION['VM_createStep'] != VM_stepCreateCloudStackVM)
		return(false);

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Input lines for the VM name, its MAC and the RAM and harddisk sizes
	$_SESSION['VM_name'] = HTML_input("ED_VMName");

	//Button for creating the VM
	if (HTML_submit("BUT_createVM", $I18N_create))
	{
		$VMCReationMessage = VM_CloudStackCreateVM($_SESSION['VM_name'] /*name*/, $_SESSION['VM_host'] /*zone*/, $VMCreationOK);
	}
	else
		$VMCreationOK = $VMCReationMessage = false;

	//Show the dialog elements for creating the VM
	echo("	<tr><td colspan=\"2\"><hr></td></tr>
			<tr><td>$I18N_VMName</td><td align=\"right\">".ED_VMName."</td></tr>\n");

	if (($VMCReationMessage === false) || ($VMCreationOK === false))
		//Show the button if the creation failed or hasn't been started
		echo("<tr><td colspan=\"2\" align=\"center\">".BUT_createVM."</td></tr>\n");
	else
		//Show the link for adding the VM client to the m23 management
		echo("<tr><td colspan=\"2\" align=\"center\"><a href=\"index.php?page=addclient&VM_client=".$_SESSION['VM_name']."&VM_host=".$_SESSION['VM_host']."&VM_dhcpBootimage=gpxe&VM_software=".VM_stepCreateCloudStackVM."\">&gt; &gt; &gt; $I18N_add_client &lt; &lt; &lt;</a></td></tr>\n");

	//Check if there is a message from the VM creation tool
	if ($VMCReationMessage != false)
	{
		echo("<tr><td colspan=\"2\" align=\"center\">");
		//Decide if the message should be shown as an info or error message
		if ($VMCreationOK)
			MSG_showInfo(nl2br($VMCReationMessage));
		else
			MSG_showError(nl2br($VMCReationMessage));
		echo("</td></tr>\n");
	}
}





/**
**name VM_CloudStack_available()
**description Checks, if the CloudStack configuration file is included and contains the needed constants.
**returns true, if the CloudStack are present.
**/
function VM_CloudStack_available()
{
	return(defined('CLOUDSTACK_SECRET_KEY') && defined('CLOUDSTACK_API_ENDPOINT') && defined('CLOUDSTACK_API_KEY'));
}





/**
**name VM_CloudStack_getObject($CLOUDSTACK_API_ENDPOINT = false, $CLOUDSTACK_API_KEY = false, $CLOUDSTACK_SECRET_KEY = false)
**description Gets a new CloudStackClient object.
**parameter CLOUDSTACK_API_ENDPOINT: The API entpoint.
**parameter CLOUDSTACK_API_KEY: The API key.
**parameter CLOUDSTACK_SECRET_KEY: The secret API key.
**returns New CloudStackClient object.
**/
function VM_CloudStack_getObject($CLOUDSTACK_API_ENDPOINT = false, $CLOUDSTACK_API_KEY = false, $CLOUDSTACK_SECRET_KEY = false)
{
	if ($CLOUDSTACK_API_ENDPOINT == false)
	{
		$CLOUDSTACK_API_ENDPOINT = CLOUDSTACK_API_ENDPOINT;
		$CLOUDSTACK_API_KEY = CLOUDSTACK_API_KEY;
		$CLOUDSTACK_SECRET_KEY = CLOUDSTACK_SECRET_KEY;
	}

	return(new CloudStackClient($CLOUDSTACK_API_ENDPOINT, $CLOUDSTACK_API_KEY, $CLOUDSTACK_SECRET_KEY));
}





/**
**name VM_CloudStack_getVersion()
**description Gets the version of CloudStack.
**returns CloudStack version.
**/
function VM_CloudStack_getVersion()
{
	$cloudstack = VM_CloudStack_getObject();
	return($cloudstack->listCapabilities()->capability->cloudstackversion);
}





/**
**name VM_shutdownAndDisableNetbootAfterInstall($vmName)
**description Reboots an VM and disables network booting.
**parameter vmname: Name of the VM.
**/
function VM_rebootAndDisableNetbootAfterInstall($vmName)
{
	VM_webAction($vmName, 'rebootAndDisableNetboot');
}





/**
**name VM_rebootAndActivateNetboot($vmName)
**description Reboots an VM and activates network booting.
**parameter vmname: Name of the VM.
**/
function VM_rebootAndActivateNetboot($vmName)
{
	VM_webAction($vmName, 'rebootAndActivateNetboot');
}





/**
**name VM_shutdownAndDisableNetbootAfterInstall($vmName)
**description Shuts down an VM and disables network booting.
**parameter vmName: Name of the VM.
**/
function VM_shutdownAndDisableNetbootAfterInstall($vmName)
{
	VM_webAction($vmName, 'shutdownAndDisableNetboot');
}





/**
**name VM_shutdownAndDisableNetboot($type, $vmName)
**description Generates a BASH command to shut down an VM and to disable network booting.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmname: Name of the VM.
**returns BASH code to shut down an VM and to disable network booting.
**/
function VM_shutdownAndDisableNetboot($type, $vmName)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$cmd = "/m23/vms/vbox/bin/shutdownAndDisableNetboot $vmName";
		break;
	}
	return($cmd);
}





/**
**name VM_rebootChangeBootDevice($type, $visual, $vmName)
**description Generates a BASH command to reboot an VM and to disable network booting.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmname: Name of the VM.
**parameter visual: If set to true, the VM should be run in visual mode otherwise in headless mode.
**returns BASH code to reboot an VM and to disable network booting.
**/
function VM_rebootChangeBootDevice($type, $visual, $vmName, $bootdevice)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$visual = ($visual ? 0 : 1);
			$cmd = "/m23/vms/vbox/bin/reboot $vmName $visual $bootdevice";
		break;

		case VM_SW_CLOUDSTACK:
			$retMsg = VM_CloudStackNetBootActivate($vmName, $bootdevice == 'net', $nBASuccess);
			VM_CloudStackStopVM($vmName, $startVMOK1);
			VM_CloudStackStartVM($vmName, $startVMOK2);
			return($nBASuccess && $startVMOK1 && $startVMOK2);
		break;
	}
	return($cmd);
}





/**
**name VM_getVBoxVersion($clientNameOrIP)
**description Get the currently installed VirtualBox version of the host.
**parameter clientNameOrIP: The name of the client or localhost or an IP.
**returns The version number of VirtualBox.
**/
function VM_getVBoxVersion($clientNameOrIP)
{
	//Get the VirtualBox version
	$ver = CLIENT_executeOnClientOrIP($clientNameOrIP,"m23-getVBoxVersion","VBoxManage --version | tail -1","m23-vbox",false);
	
	return($ver);
}





/**
Database columns
m23.clients.vmRunOnHost: This value is set ONLY if the client is a virtual client. Then it contains the client ID of the virtualisation server.
m23.clients.vmSoftware: The constant (VM_SW_*) of the virtualisation software.
m23.clients.vmRole: The role of the computer virtualisation host (VM_ROLE_HOST), guest (VM_ROLE_GUEST) or no virtualisation (VM_ROLE_NONE). Combinations of both are possible too.
m23.clients.vmVisualPassword: The password to log into the visual management console to control the virtual machines directly from the boot. This is valid for all virtual guests on the host and so it's set only on the HOST.
m23.clients.vmVisualURL: The URL to connect to the visual management console (e.g. 192.168.1.23:23 with VNC). This is set only on the GUEST.
**/

define('VBOX_addonStoreDir','/m23/data+scripts/extraDebs/');
define('VBOX_addonDownloaderLog','/m23/log/VBoxAddonDownloader.log');





/**
**name VM_setVBoxAddonAsDefault($version)
**description Sets a choosen VirtualBox addition package version as default.
**parameter version: Version number of the VirtualBox addition to set as default.
**/
function VM_setVBoxAddonAsDefault($version)
{
	//Delete old default addons
	@unlink(VBOX_addonStoreDir."VBoxLinuxAdditions-amd64.run");
	@unlink(VBOX_addonStoreDir."VBoxLinuxAdditions-x86.run");
	
	symlink(VBOX_addonStoreDir."VBoxLinuxAdditions-amd64-$version.run",VBOX_addonStoreDir."VBoxLinuxAdditions-amd64.run");
	symlink(VBOX_addonStoreDir."VBoxLinuxAdditions-x86-$version.run",VBOX_addonStoreDir."VBoxLinuxAdditions-x86.run");
}





/**
**name VM_downloadedVBoxAddons()
**description Lists all VirtualBox addition package versions that can be downloaded from the m23 server.
**returns Associative array with ther version numbers of all VirtualBox addition packages that can be downloaded from the m23 server.
**/
function VM_downloadedVBoxAddons()
{
	exec("ls ".VBOX_addonStoreDir."VBoxLinuxAdditions-amd64*.run | sed 's/.*amd64-//g' | grep -v VBoxLinuxAdditions | sed 's/.run//g'",$out);
	return(HELPER_array2AssociativeArray($out));
}





/**
**name VM_getVBoxAddonDefaultVersion()
**description Gets the version number of the VirtualBox addition package.
**returns The default version of the VirtualBox addition package.
**/
function VM_getVBoxAddonDefaultVersion()
{
	if (file_exists(VBOX_addonStoreDir."VBoxLinuxAdditions-x86.run"))
	{
		$link = readlink(VBOX_addonStoreDir."VBoxLinuxAdditions-x86.run");
		$temp = str_replace(VBOX_addonStoreDir."VBoxLinuxAdditions-x86-", "", $link);
		$version = str_replace(".run", "", $temp);
		return($version);
	}
	else
		return(false);
}





/**
**name VM_generateVBOXaddonDownloadCMD($version)
**description Generates the download commands to download a VirtualBox addition ISO and to extract the addition installers for Linux.
**parameter version: Version number of the VirtualBox addition to download and extract.
**/
function VM_generateVBOXaddonDownloadCMD($version)
{
return("
#Get the name of the ISO file
isoFile=`wget http://download.virtualbox.org/virtualbox/$version/ -O - | grep iso | cut -d'\"' -f2 | sort -n | tail -1`

echo -n \"Downloading VirtualBox addition ISO (\$isoFile) ...\" | tee -a ".VBOX_addonDownloaderLog."
wget http://download.virtualbox.org/virtualbox/$version/\$isoFile -O /m23/tmp/VBoxGuestAdditions.iso

if [ \$? -eq 0 ]
then
	echo \" done\" | tee -a ".VBOX_addonDownloaderLog."
	#Mount the ISO
	mkdir -p /m23/tmp/vbox-loop
	umount /m23/tmp/vbox-loop 2> /dev/null
	mount -o loop /m23/tmp/VBoxGuestAdditions.iso /m23/tmp/vbox-loop

	#Copy the addons
	for add in `ls /m23/tmp/vbox-loop/VBoxLinuxAdditions-*.run`
	do
		fn=`basename \$add | sed \"s/.run/-$version.run/g\"`
		cp \$add ".VBOX_addonStoreDir."\$fn

		if [ \$? -eq 0 ]
		then
			echo \"\$fn copied to ".VBOX_addonStoreDir."\" | tee -a ".VBOX_addonDownloaderLog."
		else
			echo \"Copying of \$fn to ".VBOX_addonStoreDir." failed\" | tee -a ".VBOX_addonDownloaderLog."
		fi
	done

	#Change the owner
	chown www-data.www-data ".VBOX_addonStoreDir."VBoxLinuxAdditions-*.run

	#Unmount the ISO
	umount /m23/tmp/vbox-loop

	#Delete the ISO after download
	rm /m23/tmp/VBoxGuestAdditions.iso
else
	echo \" failed\" | tee -a ".VBOX_addonDownloaderLog."
fi
");
}





/**
**name VM_downloadVBOXaddons($checkedVersions)
**description Downloads the VirtualBox addition ISOs and extracts the addition installers for Linux.
**parameter checkedVersions: Array with all version numbers of the VirtualBox additions to download.
**/
function VM_downloadVBOXaddons($checkedVersions)
{
	$cmds="";
	foreach($checkedVersions as $version)
		$cmds.=VM_generateVBOXaddonDownloadCMD($version);

	if (!SERVER_runningInBackground("VBoxAddonDownloader"))
	{
		SERVER_runInBackground("VBoxAddonDownloader","
rm ".VBOX_addonDownloaderLog."
touch ".VBOX_addonDownloaderLog."
chmod 555 ".VBOX_addonDownloaderLog."
chmod 555 /m23/log",root,false);
		SERVER_runInBackground("VBoxAddonDownloader",$cmds);
	}
}





/**
**name VM_VBOXaddonDownloadDialog()
**description Shows a dialog for downloading the VirtualBox additions to the m23 server.
**/
function VM_VBOXaddonDownloadDialog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	HTML_showTableHeader(true);

	//Get the contents of the logfile
	if (file_exists(VBOX_addonDownloaderLog))
		$log = SERVER_getFileContents(VBOX_addonDownloaderLog);
	else
		$log = "";

	HTML_submit("BUT_refresh",$I18N_refresh);
	
	$downloadedVBoxAddons = VM_downloadedVBoxAddons();
	$newDefaultVersion = HTML_selection("SEL_defaultVersion", $downloadedVBoxAddons, SELTYPE_selection, true, VM_getVBoxAddonDefaultVersion());

	if (HTML_submit("BUT_setVBoxAddonDefaultVersion",$I18N_setAsDefaultVersion))
		VM_setVBoxAddonAsDefault($newDefaultVersion);

	echo("
	<tr>
		<td>
			<span class=\"titlesmal\">$I18N_downloadableVBoxAddons</span><br>");

			foreach(VM_listDownloadableVBoxAddons() as $version)
				$VBVersionArray[$version] = $version . (VM_wasVBoxAddonDownloaded($version) ? " ($I18N_alreadyDownloaded)" : "");

			$checkedVersions = HTML_multiCheckBoxShow($VBVersionArray);

			if (HTML_submit("BUT_download",$I18N_download))
			{
				VM_downloadVBOXaddons($checkedVersions);
				MSG_showInfo($I18N_downloadStarted);
			}

			echo("<br><center>".BUT_download."</center>
		</td>
		<td width=\"16\"></td>
		<td valign=\"top\">
			<span class=\"titlesmal\">$I18N_downloadStatus</span><br><br>
			<textarea name=\"TA_log\" cols=\"80\" rows=\"15\" readonly>$log</textarea><br>
			".BUT_refresh."<br><br>
			<span class=\"titlesmal\">$I18N_chooseDefaultVersion</span><br><br>
			".SEL_defaultVersion." ".BUT_setVBoxAddonDefaultVersion."<br><br>
			&raquo; <a href=\"index.php?page=packageBuilder\">$I18N_deleteVBoxAddons</a>
		</td>
	</tr>");

	HTML_showTableEnd(true);
}





/**
**name VM_wasVBoxAddonDownloaded($version)
**description Checks, if the VirtualBox addition for a selected version was downloaded to the m23 server.
**parameter version: Version number of the VirtualBox addition to look for.
**returns True, if the addition is there.
**/
function VM_wasVBoxAddonDownloaded($version)
{
	return(file_exists(VBOX_addonStoreDir."VBoxLinuxAdditions-x86-$version.run"));
}





/**
**name VM_listDownloadableVBoxAddons()
**description Returns an array with the version numers of all VirtualBox addition ISOs that are 2.0.0 and above.
**returns Array with the version numers of all VirtualBox addition ISOs that are 2.0.0 and above as key and value.
**/
function VM_listDownloadableVBoxAddons()
{
	exec("
	idxTime=`find /m23/tmp/downloadableVBoxAddons.idx -printf %C@ | cut -d'.' -f1`
	curTime=`date +%s`
	difTime=`expr \$curTime - \$idxTime`

	if [ ! -e /m23/tmp/downloadableVBoxAddons.idx ] || [ \$difTime -gt 300 ]
	then
		wget -q http://download.virtualbox.org/virtualbox/ -O /m23/tmp/downloadableVBoxAddons.idx
	fi

	cat /m23/tmp/downloadableVBoxAddons.idx | cut -d'\"' -f2 | egrep '[1-9]+\.[0-9]+\.[0-9]+/' | egrep -v '^1\.' | sed 's#/##g'",$out);

	return(HELPER_array2AssociativeArray($out));
}





/**
**name VM_stopVM($type, $vmName)
**description Generates a BASH command to stop a virtual machine.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmname: Name of the VM.
**returns BASH code to stop a virtual machine.
**/
function VM_stopVM($type, $vmName)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$cmd = "VBoxManage controlvm \"$vmName\" poweroff";
		break;

		case VM_SW_CLOUDSTACK:
			VM_CloudStackStopVM($vmName, $startVMOK);
			return($startVMOK);
		break;
	}

	VM_stopVMCommandFile($vmName);

	return($cmd);
}





/**
**name VM_pauseVM($type, $vmName)
**description Generates a BASH command to pause a virtual machine.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmname: Name of the VM.
**returns BASH code to pause a virtual machine.
**/
function VM_pauseVM($type, $vmName)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$cmd = "VBoxManage controlvm \"$vmName\" pause";
		break;
	}
	return($cmd);
}





/**
**name VM_resumeVM($type, $vmName)
**description Generates a BASH command to resume a virtual machine.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmname: Name of the VM.
**returns BASH code to resume a virtual machine.
**/
function VM_resumeVM($type, $vmName)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$cmd = "VBoxManage controlvm \"$vmName\" resume";
		break;
	}
	return($cmd);
}





/**
**name VM_webAction($vmName, $action)
**description Executes an action for a VM controlled by the web UI.
**parameter vmName: Name of the VM.
**parameter action: Action for the VM given by the URL parameter.
**returns True if the command can be executed otherwise false.
**/
function VM_webAction($vmName, $action)
{
	$info = VM_getSWandHost($vmName);

	//Exit if it's not a VM
	if ($info == false)
		return(false);

	$runInScreen = false;

	//Check what action is selected via the URL from the web interface
	switch ($action)
	{
		case "start":
			$cmd = VM_startVM($info['vmSoftware'], $vmName, false);
			$runInScreen = true;
			break;
		case "startVisual":
			$cmd = VM_startVM($info['vmSoftware'], $vmName, true);
			break;
		case "stop":
			$cmd = VM_stopVM($info['vmSoftware'], $vmName);
			break;
		case "pause":
			$cmd = VM_pauseVM($info['vmSoftware'], $vmName);
			break;
		case "shutdownAndDisableNetboot":
			$runInScreen = true;
			$cmd = VM_shutdownAndDisableNetboot($info['vmSoftware'], $vmName);
			break;
		case "rebootAndDisableNetboot":
			$runInScreen = true;
			$cmd = VM_rebootChangeBootDevice($info['vmSoftware'], isset($info['vmVisualURL']{1}), $vmName, 'disk');
			break;
		case "rebootAndActivateNetboot":
			$runInScreen = true;
			$cmd = VM_rebootChangeBootDevice($info['vmSoftware'], isset($info['vmVisualURL']{1}), $vmName, 'net');
			break;
		default:
			return(false);
	}
	
	if (!is_bool($cmd))
		$out = CLIENT_executeOnClientOrIP($info['vmHost'],"VM_startStopPause","$cmd","m23-vbox",$runInScreen);
// 	print("<pre>$out</pre>");
	return(true);
}





/**
**name VM_delete($vmName)
**description Deletes a virtual machine from a VM host.
**parameter vmname: Name of the VM.
**returns true if it's an VM or false if not.
**/
function VM_delete($vmName)
{
	$info = VM_getSWandHost($vmName);

	//Exit if it's not a VM
	if ($info == false)
		return(false);
	
	switch ($info['vmSoftware'])
	{
		case VM_SW_CLOUDSTACK:
			$virtualMachineId = VM_CloudStackClientName2ClientID($vmName);
			VM_CloudStackDisablePortForwarding($virtualMachineId, $pFDSuccess);
			VM_CloudStackDeleteClientVM($virtualMachineId, $VMDeletionOK);
			return($pFDSuccess.", ".$VMDeletionOK);
		default:
			$cmd = VM_delVMCMD($info['vmSoftware'], $vmName);
		
			CLIENT_executeOnClientOrIP($info['vmHost'],"VM_deleteVM","$cmd","m23-vbox",true);
			return(true);
	}
}





/**
**name VM_vmSwNr2Name($vmType)
**description Converts the VM software constant (VM_SW_*) to the human readable name.
**parameter vmType: Code number of the virtualisation software.
**returns Human readable name of the VM software.
**/
function VM_vmSwNr2Name($vmType)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	switch ($vmType)
	{
		case VM_SW_VBOX:
			return($I18N_VMSwVBox);
		case VM_SW_CLOUDSTACK:
			return($I18N_VMSwCloudStack);
		default:
			return(false);
	}
}





/**
**name VM_getHTMLStatusBlock($clientName)
**description Generates and returns a status block in a HTML table with informations (VM host, VM software, VM power switch state, visual console URL and password, VM NICs) about the selected VM client.
**parameter clientName: Name of the VM client.
**returns HTML table with information about the VM.
**/
function VM_getHTMLStatusBlock($clientName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Get VM host and software for the client
	$vmSwHost = VM_getSWandHost($clientName);

	if ($vmSwHost != false)
	{
		//Get the current VM status according to the VM software
		$vmInfo = VM_getStatus($clientName);

		//convert the switch status to readable information
		$readableStatus = VM_convertSwitchStatusInfo($vmInfo['state']);
		
		
		switch ($vmSwHost['vmSoftware'])
		{
			case VM_SW_VBOX:
				//Show general information about the VM client
				$vmInfoHTML = "<tr><td colspan=\"2\"><span class=\"subhighlight\">$I18N_virtualisation</span></td></tr>
				<tr><td>$I18N_vmHost:</td><td>$vmSwHost[vmHost]</td></tr>
				<tr><td>$I18N_VMSoftware:</td><td>".VM_vmSwNr2Name($vmSwHost['vmSoftware'])."</td></tr>
				<tr><td>$I18N_status:</td><td>$readableStatus[text] $readableStatus[imgTag]</td></tr>";

				//Show the visual connection URL and password if the VM client is on
				if ($vmInfo['state'] == VM_STATE_ON)
				{
					$hostDisplay = explode(':',$vmSwHost['vmVisualURL']);
					$vmInfoHTML .= "<tr><td>$I18N_VMVisualURL:</td><td>$vmSwHost[vmVisualURL]</td></tr>
					<tr><td>$I18N_VMVisualPassword:</td><td>$vmSwHost[vmVisualPassword]</td></tr>
					<tr><td>TightVNC Java Viewer:</td><td><a target=\"_blank\" href=\"/java-vnc/vnc-viewer.php?host=$hostDisplay[0]&pass=$vmSwHost[vmVisualPassword]&display=$hostDisplay[1]\">$I18N_startVNCApplet</a></td></tr>";
				}
		
				//Run thru the network cards and add their infos
				for ($nicNr = 1; isset($vmInfo["nic$nicNr"]); $nicNr++)
				{
					//Get the info blick for the current selected NIC
					$nic = $vmInfo["nic$nicNr"];
					$vmInfoHTML .= "<tr><td>$I18N_VMNetworkCard $nicNr:</td><td>$nic[netDev], $nic[speed]</td></tr>";
				}
			break;

			case VM_SW_CLOUDSTACK:
				$hostDisplay = explode(':',$vmSwHost['vmVisualURL']);
				//Show general information about the VM client
				$vmInfoHTML = "<tr><td colspan=\"2\"><span class=\"subhighlight\">$I18N_virtualisation</span></td></tr>
				<tr><td>$I18N_VMSoftware:</td><td>".VM_vmSwNr2Name($vmSwHost['vmSoftware'])."</td></tr>
				<tr><td>$I18N_status:</td><td>$readableStatus[text] $readableStatus[imgTag]</td></tr>
				<tr><td>$I18N_SSHx2goIP:</td><td>$hostDisplay[0]</td></tr>
				<tr><td>$I18N_SSHx2goPort:</td><td>$hostDisplay[1]</td></tr>";
		}
	}

	return($vmInfoHTML);
}





/**
**name VM_activateNetboot($vmName, $activate)
**description (De)Activates network booting of a VM.
**parameter vmName: Name of the VM.
**parameter activate: true for booting from network, false for booting from the HD.
**returns The message of the VM management tool or false if it's not a VM.
**/
function VM_activateNetboot($vmName, $activate)
{
	if ($activate)
		VM_rebootAndActivateNetboot($vmName);
	else
		VM_rebootAndDisableNetbootAfterInstall($vmName);

/*
	$info = VM_getSWandHost($vmName);

	//Check if it is a VM client
	if ($info === false)
		return(false);
	else
	{
		//Create the command string for (de)activating network booting and execute it on the VM host
		$cmd = VM_activateNetbootCMD($info['vmSoftware'], $vmName, $activate);
		$ret = CLIENT_executeOnClientOrIP($info['vmHost'],"VM_activateNetboot","$cmd","m23-vbox",false);
		return($ret);
	}
*/
}





/**
**name VM_convertSwitchStatusInfo($status)
**description Returns the status of a VM guest in several ways.
**parameter status: Status of the VM guest (one of VM_STATE_*)
**returns Associative array with: $out['text']: The status as text in the current language. $out['icon']: The icon of the given status (as traffic lights). $out['imgTag']: The status as traffic light in an HTML img tag with the written status as title.
**/
function VM_convertSwitchStatusInfo($status)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	switch($status)
	{
		case VM_STATE_OFF:
			$out['text'] = $I18N_computerOff;
			$out['imgTag'] = "<img src=\"/gfx/status/red.png\" title=\"$I18N_computerOff\">";
			$out['icon'] = "/gfx/status/red.png";
			break;

		case VM_STATE_PAUSE:
			$out['text'] = $I18N_computerPaused;
			$out['imgTag'] = "<img src=\"/gfx/status/yellow.png\" title=\"$I18N_computerPaused\">";
			$out['icon'] = "/gfx/status/yellow.png";
			break;

		case VM_STATE_ON:
			$out['text'] = $I18N_computerOn;
			$out['imgTag'] = "<img src=\"/gfx/status/green.png\" title=\"$I18N_computerOn\">";
			$out['icon'] = "/gfx/status/green.png";
			break;
	}

	return($out);
}





/**
**name VM_getSWandHost($clientName)
**description Gets the VM software and VM host of a m23 client.
**parameter clientName: Name of the virtualised client.
**returns $out['vmSoftware']: The VM software used for the guest. $out['vmHost']: The name of the VM host.
**/
function VM_getSWandHost($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	//SQL query for getting the VM software on the guest, a check that the client is a VM guest and the VM host that runs the guest
	$res = db_query('SELECT vmRunOnHost AS vmHostID, vmSoftware, ((vmRole & '.VM_ROLE_GUEST.') = '.VM_ROLE_GUEST.') AS roleTrue, (SELECT client FROM `clients` WHERE id = vmHostID) AS vmHost, (SELECT vmVisualPassword FROM `clients` WHERE id = vmHostID) AS vmVisualPassword, vmVisualURL, (SELECT ip FROM `clients` WHERE id = vmHostID) AS vmHostIP FROM `clients` WHERE client="'.$clientName.'"'); //FW ok

	$info = mysqli_fetch_assoc($res);

	//Exit if this client is no VM guest
	if ($info['roleTrue'] != 1)
		return(false);
	else
		return($info);
}





/**
**name VM_getStatus($clientName)
**description Returns the current status of a VM guest.
**parameter clientName: Name of the virtualised client.
**returns Array with the current state of the VM or false is the client is no VM guest.
**/
function VM_getStatus($clientName)
{
	$info = VM_getSWandHost($clientName);

	//Create the status command string and execute it on the VM host
	$cmd = VM_status($info['vmSoftware'], $clientName);
	
	if (!is_array($cmd))
	{
		$ret = CLIENT_executeOnClientOrIP($info['vmHost'],"VM_status","$cmd","m23-vbox",false);
		return(VM_parseStatus($info['vmSoftware'],$ret));
	}
	else
		return($cmd);
}





/**
**name VM_GUIstepCreateGuest()
**description Shows a dialog to create a new VM on the chosen host.
**/
function VM_GUIstepCreateGuest()
{
	//Check if this part should be shown in the current step
	if ($_SESSION['VM_createStep'] != VM_stepCreateGuest)
		return(false);

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");


	//Get all active network devices that can be used for bridging
	$activeDevices = CLIENT_getActiveNetDevices($_SESSION['VM_host']);
	foreach ($activeDevices as $device)
		$devList[$device['dev']] = "$device[dev] $device[mac]";
	$_SESSION['VM_netDev'] = HTML_selection("SEL_bridgingDevice",$devList,SELTYPE_selection);

	//Input lines for the VM name, its MAC and the RAM and harddisk sizes
	$_SESSION['VM_name'] = HTML_input("ED_VMName");
	$_SESSION['VM_mac'] = HTML_input("ED_mac",HELPER_randomMAC(), 17);
	$_SESSION['VM_ram'] = HTML_input("ED_ram",256, 4);
	$_SESSION['VM_diskSize'] = HTML_input("ED_diskSize",8192, 6);

	//Button for creating the VM
	if (HTML_submit("BUT_createVM",$I18N_create))
	{
		$diskName = $_SESSION['VM_name']."hda";
		$cmd = VM_createDiskImage($_SESSION['VM_software'], $_SESSION['VM_name'], $diskName, $_SESSION['VM_diskSize']);
		$cmd .= VM_createVM($_SESSION['VM_software'], $_SESSION['VM_name'], $_SESSION['VM_ram'], $diskName, $_SESSION['VM_mac'],$_SESSION['VM_netDev']);
		//Execute and get the output or false if there was an error code returned
		$VMCReationMessage = CLIENT_executeOnClientOrIP($_SESSION['VM_host'],"VM_create",$cmd,"m23-vbox",false);
		//Check if the creation message contains FAILED. If not the creation should have been sucessfully

		//Count the occurrence of FAILED and VERR_ALREADY_EXISTS (this is prompted if an existing harddisk image is re-used)
		$failedCount = substr_count($VMCReationMessage,"FAILED");
		$VERR_ALREADY_EXISTSCount = substr_count($VMCReationMessage,"VERR_ALREADY_EXISTS");

		//If there are NOT more VERR_ALREADY_EXISTS errors than FAILED errors VBox only complains about creating an existing virtual harddisk, that can be re-used in the same VM
		$VMCreationOK = ($failedCount <= $VERR_ALREADY_EXISTSCount);
	}
	else
		$VMCreationOK = $VMCReationMessage = false;

	//Show the dialog elements for creating the VM
	echo("	<tr><td colspan=\"2\"><hr></td></tr>
			<tr><td>$I18N_hostNetworkCard</td><td align=\"right\">".SEL_bridgingDevice."</td></tr>
			<tr><td>$I18N_VMName</td><td align=\"right\">".ED_VMName."</td></tr>
			<tr><td>$I18N_mac</td><td align=\"right\">".ED_mac."</td></tr>
			<tr><td>$I18N_memory</td><td align=\"right\">".ED_ram." MB</td></tr>
			<tr><td>$I18N_harddisk</td><td align=\"right\">".ED_diskSize." MB</td></tr>\n");

	if (($VMCReationMessage === false) || ($VMCreationOK === false))
		//Show the button if the creation failed or hasn't been started
		echo("<tr><td colspan=\"2\" align=\"center\">".BUT_createVM."</td></tr>\n");
	else
		//Show the link for adding the VM client to the m23 management
		echo("<tr><td colspan=\"2\" align=\"center\"><a href=\"index.php?page=addclient&VM_client=".$_SESSION['VM_name']."&VM_mac=".
		str_replace(":","",$_SESSION['VM_mac'])."&VM_host=".$_SESSION['VM_host']."&VM_software=".VM_SW_VBOX."\">&gt; &gt; &gt; $I18N_add_client &lt; &lt; &lt;</a></td></tr>\n");

	//Check if there is a message from the VM creation tool
	if ($VMCReationMessage != false)
	{
		echo("<tr><td colspan=\"2\" align=\"center\">");
		//Decide if the message should be shown as an info or error message
		if ($VMCreationOK)
			MSG_showInfo(nl2br($VMCReationMessage));
		else
			MSG_showError(nl2br($VMCReationMessage));
		echo("</td></tr>\n");
	}
}





/**
**name VM_GUIstepCheckHost()
**description Shows a dialog part with information about the chose VM host.
**/
function VM_GUIstepCheckHost()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Preset values for making screenshots
	if ($_GET['screenshot'] == 1)
	{
		$_SESSION['VM_createStep'] = VM_stepCheckHost;
		$_SESSION['VM_host'] = "localhost";
	}
	
	//Check if this part should be shown in the current step
	if ($_SESSION['VM_createStep'] < VM_stepCheckHost)
		return(false);

	$title = VM_vmSwNr2Name($_SESSION['VM_software']);
	HTML_showSmallTitle($title);

	switch($_SESSION['VM_software'])
	{
		case VM_SW_VBOX:
			//Check if the client is running and offer wake-on-lan if not
			if (CLIENT_isrunning($_SESSION['VM_host']))
			{
				//Get current disk and memory usage
				$freeDiskSpace = (CLIENT_getCurrentFreeSpaceInDir($_SESSION['VM_host'], "/m23/vms") / 1024);
				$memoryUsage = CLIENT_getCurrentMemoryUsage($_SESSION['VM_host']);
				
				$cpuInfoHTML = HWINFO_getCPU($_SESSION['VM_host']);
		
				$VBoxVer = VM_getVBoxVersion($_SESSION['VM_host']);
		
				//convert the switch status to readable information
				$readableStatus = VM_convertSwitchStatusInfo(VM_STATE_ON);
		
				echo("
					<tr><td colspan=\"2\"><hr></td></tr>
					<tr><td>$readableStatus[text]</td><td align=\"right\">$readableStatus[imgTag]</td></tr>
					<tr><td>$I18N_vboxVersion</td><td align=\"right\">$VBoxVer</td></tr>
					<tr><td colspan=\"2\"><hr></td></tr>
					<tr><td colspan=\"2\"><span class=\"title\">$I18N_hardware_info</span></td></tr>
					<tr><td>CPU</td><td>$cpuInfoHTML</td></tr>
					<tr><td>$I18N_freeDiskSpace</td><td align=\"right\">".I18N_number_format($freeDiskSpace)." MB</td></tr>
					<tr><td>$I18N_totalMemory</td><td align=\"right\">".I18N_number_format($memoryUsage['all'] / 1024)." MB</td></tr>
					<tr><td>$I18N_freeMemory</td><td align=\"right\">".I18N_number_format($memoryUsage['free'] / 1024)." MB</td></tr>
					");
				
				//If the client is accessible go forward to the next step
				$_SESSION['VM_createStep'] = VM_stepCreateGuest;
			}
			else
			{
				if (HTML_submit("BUT_wol",$I18N_wakeUp))
					CLIENT_wol($_SESSION['VM_host']);
		
				HTML_submit("BUT_refresh",$I18N_refresh);
		
				//convert the switch status to readable information
				$readableStatus = VM_convertSwitchStatusInfo(VM_STATE_OFF);
		
				echo("
					<tr><td colspan=\"2\"><hr></td></tr>
					<tr><td>$readableStatus[text]</td><td align=\"right\">$readableStatus[imgTag]</td></tr>
					<tr><td>".BUT_wol."</td><td>".BUT_refresh."</td></tr>");
			}
			break;

		case VM_SW_CLOUDSTACK:
				$readableStatus = VM_convertSwitchStatusInfo(VM_STATE_ON);
				echo("
				<tr><td>$readableStatus[text]</td><td align=\"right\">$readableStatus[imgTag]</td></tr>
				<tr><td>$I18N_CloudStackVersion</td><td align=\"right\">".VM_CloudStack_getVersion()."</td></tr>
				");

				//Get information about the accounts
				$info = VM_CloudStack_getObject()->listAccounts();
				$info = $info[0];
				$info = get_object_vars($info);

				//Build array with 
				$typeI18N['vm'] = $I18N_CloudStack_vm;
				$typeI18N['ip'] = $I18N_CloudStack_ip;
				$typeI18N['network'] = $I18N_CloudStack_network;
				$typeI18N['volume'] = $I18N_CloudStack_volume;
				$typeI18N['snapshot'] = $I18N_CloudStack_snapshot;
				$typeI18N['project'] = $I18N_CloudStack_project;
	
				foreach ($typeI18N as $type => $i18n)
				{
					$total = str_replace('Unlimited', '&infin;', $info[$type.'total']);
					$limit = str_replace('Unlimited', '&infin;', $info[$type.'limit']);
					$available = str_replace('Unlimited', '&infin;', $info[$type.'available']);
					echo("<tr><td>$i18n</td><td align=\"right\">$total/$limit</td></tr>\n");
				}

				//If the client is accessible go forward to the next step
				$_SESSION['VM_createStep'] = VM_stepCreateCloudStackVM;
			break;
	}
}





/**
**name VM_GUIstepSelectHost($VM_software)
**description Shows a dialog part for choosing the VM host.
**parameter VM_software: Code number of the virtualisation software.
**returns Gives back the VM host or false if there is no host for the choosen virtualisation solution.
**/
function VM_GUIstepSelectHost($VM_software)
{
	if ((VM_SW_CLOUDSTACK == $VM_software) && !VM_CloudStack_available())
		return(false);

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$SEL_vmHost = "SEL_vmHost$VM_software";
	$BUT_selectHost = "BUT_selectHost$VM_software";

	//Preset values for making screenshots
	if ($_GET['screenshot'] == 1)
		$_POST[$SEL_vmHost] = 'localhost';

	$title = VM_vmSwNr2Name($VM_software);

	//Make sure the creation step is set in the session variable
	if (!isset($_SESSION['VM_createStep']))
		$_SESSION['VM_createStep'] = VM_stepSelectHost;

	//Get the list of all VM hosts with the chosen VM software
	$vmHosts = VM_getAllVMHosts($VM_software);

	//Return if there are no hosts for the choosen virtualisation solution
	if (count($vmHosts) === 0)
		return(false);

	$vmHost = HTML_selection($SEL_vmHost, $vmHosts, SELTYPE_selection, true, $_SESSION['VM_host']);

	if (HTML_submit($BUT_selectHost, $I18N_select))
	{
		$_SESSION['VM_host'] = $vmHost;
		$_SESSION['VM_createStep'] = VM_stepCheckHost;
		$_SESSION['VM_software'] = $VM_software;
	}

	HTML_showSmallTitle($title);
	//Draw it
	echo('
	<tr>
		<td>'.$I18N_vmHost.' '.constant($SEL_vmHost).'</td>
		<td align="right">'.constant($BUT_selectHost).'</td>
	</tr>');
	
	return($vmHost);
}





/**
**name VM_getAllVMHosts($VM_software)
**description Returns a list of all VM hosts with a choosen virtualisation software.
**parameter VM_software: Code number of the virtualisation software.
**returns Associative array with the hostname as key and value.
**/
function VM_getAllVMHosts($VM_software)
{
	CHECK_FW(CC_vmsoftware, $VM_software);
	
	switch ($VM_software)
	{
		case VM_SW_VBOX:
		case VM_SW_KVM:
			$res = db_query("SELECT `client` FROM `clients` WHERE (`vmSoftware` & $VM_software ) = $VM_software AND (`vmRole` & ".VM_ROLE_HOST.") = ".VM_ROLE_HOST); //FW ok

			$out = array();
			while ($row = mysqli_fetch_row($res))
				$out[$row[0]] = $row[0];

			return($out);

		case VM_SW_CLOUDSTACK:
			try
			{
				$cloudstack = VM_CloudStack_getObject();
	
				$zones = $cloudstack->listZones();
	
				$out = array();
				foreach ($zones as $zone)
					$out[$zone->id] = $zone->name;
	
				return($out);
			}
			catch(Exception $except)
			{
				return(array());
			}
	}
}





/**
**name VM_setVisualURL($VMguest,$url)
**description Sets the URL to connect to the visual management console.
**parameter VMguest: Name of the guest that is run in the virtualisation software.
**parameter url: The URL to connect to the visual management console (e.g. 192.168.1.23:23 with VNC).
**returns MySQL resource or false on error.
**/
function VM_setVisualURL($VMguest,$url)
{
	//Get information about the VM guest and its host
	$info = VM_getSWandHost($VMguest);

	//e.g. $url = "m23vmclient:1" => $hostScreen[0] = "m23vmclient", $hostScreen[1] = "1"
	$hostScreen = explode(":",$url);
	
	if (isset($info['vmHostIP']{1}))
		$host = $info['vmHostIP'];
	else
		$host = $hostScreen[0];
	
	$data['vmVisualURL'] = "$host:$hostScreen[1]";
	return(CLIENT_setAllParams($VMguest,$data));
}





/**
**name VM_setHostInDB($VMhost, $password, $vmType)
**description Sets the password for the login to the visual management console on the host for all guests, the host flag and the type of used virtualisation software.
**parameter VMhost: Name of the host with the virtualisation software.
**parameter password: Password to set.
**parameter vmSoftware: Type of the virtualisation software.
**returns MySQL resource or false on error.
**/
function VM_setHostInDB($VMhost, $password, $vmSoftware)
{
	$data = CLIENT_getParams($VMhost);
	$data['vmVisualPassword'] = $password;
// 	Add the virtualisation software and role by binary ORing
	$data['vmSoftware'] = ($data['vmSoftware'] | $vmSoftware);
	$data['vmRole'] = ($data['vmRole'] | VM_ROLE_HOST);
	return(CLIENT_setAllParams($VMhost,$data));
}





/**
**name VM_setGuestInDB($clientName, $VMSoftware, $VMHostName)
**description Makes the client a VM guest in the DB.
**parameter clientName: Name of the m23 client (VM guest)
**parameter VMSoftware: Type of the virtualisation software.
**parameter VMHostName: Name of the m23 client (VM host)
**returns MySQL resource or false on error.
**/
function VM_setGuestInDB($clientName, $VMSoftware, $VMHostName)
{
	$data = CLIENT_getParams($clientName);
	$VMHostID = CLIENT_getId($VMHostName);
	
	$data['vmRunOnHost'] = $VMHostID;
// 	Add the virtualisation software and role by binary ORing
	$data['vmSoftware'] = ($data['vmSoftware'] | $VMSoftware);
	$data['vmRole'] = ($data['vmRole'] | VM_ROLE_GUEST);

	return(CLIENT_setAllParams($clientName,$data));
}





/**
**name VM_statusIcons($param)
**description Returns HTML codes that include the VM status icons of the client.
**parameter param: Client's parameter array.
**returns HTML codes with included status icons.
**/
function VM_statusIcons($param)
{
	//Exit the function if the client has nox VMs
	if ($param['vmRole'] == VM_ROLE_NONE)
		return("");

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$html = "";

	//Array with status icon and description for the virtualsiation soulutions on host and guest.
	$imgA['VM_ROLE_HOST']['VM_SW_VBOX'][0] = "vm-server-vbox-mini.png";
	$imgA['VM_ROLE_HOST']['VM_SW_VBOX'][1] = $I18N_VMServerVBox;
	$imgA['VM_ROLE_HOST']['VM_SW_VBOX'][2] = "index.php?page=clientsoverview&vmRunOnHost=$param[id]";

//	$imgA['VM_ROLE_HOST']['VM_SW_KVM'][0] = "vm-server-mini.png";
	$imgA['VM_ROLE_GUEST']['VM_SW_VBOX'][0] = "vm-client-vbox-mini.png";
	$imgA['VM_ROLE_GUEST']['VM_SW_VBOX'][1] = $I18N_VMClientVBox;
	$imgA['VM_ROLE_GUEST']['VM_SW_VBOX'][2] = "index.php?page=clientdetails&client=$param[client]&id=$param[id]#virtualisation";

	//Run thru all known roles
	foreach (array_keys($imgA) as $role)
	{
		//Check if the client is in a special role
		if (($param['vmRole'] & $role) == $role)
			//Check if the client uses a special virtualisation software in this rule
			foreach (array_keys($imgA[$role]) as $vmSW)
				//Choose the icon and title by role and virtualisation software
				if (($param['vmSoftware'] & $vmSW) == $vmSW)
					$html .= '<a href="'.$imgA[$role][$vmSW][2].'"><img src="/gfx/'.$imgA[$role][$vmSW][0].'" title="'.$imgA[$role][$vmSW][1].'" border=0></a> ';
	}
	return($html);
}





/**
**name VM_createDiskImage($type, $vmName, $diskName, $size)
**description Creates a new empty virtual harddisk image file.
**parameter type: VM_SW_KVM for KVM or VM_SW_VBOX for VirtualBox OSE
**parameter vmname: Name of the VM.
**parameter diskname: Name of the image file without extension.
**parameter size: Size of the image file in MB.
**returns BASH code to create a virtual disk image.
**/
function VM_createDiskImage($type, $vmName, $diskName, $size, $imageDir = VM_IMAGE_DIR)
{
	switch ($type)
	{
		case VM_SW_KVM:
			//size allowed here with nG
			$cmd = "qemu-img create -f qcow2 ".VM_IMAGE_DIR."/kvm/$vmName/$diskName.kvm ".$size."M";
			break;
		case VM_SW_VBOX:
			//size in MB
			$cmd = "mkdir -p \"".VM_IMAGE_DIR."/vbox/$vmName/\"
			if [ `VBoxManage --version | cut -d'.' -f1` -eq 4 ]
			then
				VBoxManage createhd --filename \"$imageDir/vbox/$vmName/$diskName.vdi\" --size $size 2>&1 | cat
			else
				VBoxManage createvdi -filename \"$imageDir/vbox/$vmName/$diskName.vdi\" -size $size -register 2>&1 | cat
			fi\n";
				
			break;
	}
// 	print("<pre>$cmd</pre>");
	return($cmd);
}





/**
**name VM_delVMCMD($type, $vmName)
**description Deletes a virtual machine.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmname: Name of the VM.
**returns BASH code to delete a virtual machine.
**/
function VM_delVMCMD($type, $vmName)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$cmd = "VBoxManage modifyvm \"$vmName\" -hda none;
					VBoxManage modifyvm \"$vmName\" --hda none;
					VBoxManage modifyvm \"$vmName\" -hdb none;
					VBoxManage modifyvm \"$vmName\" --hdb none;
					VBoxManage modifyvm \"$vmName\" -hdc none;
					VBoxManage modifyvm \"$vmName\" --hdc none;
					VBoxManage unregistervm \"$vmName\" -delete;
					VBoxManage unregistervm \"$vmName\" --delete;\n";
			break;
	}
	return($cmd);
}





/**
**name VM_activateNetbootCMD($type, $vmName, $activate)
**description Generates a BASH command line to (de)activate network booting of a VM.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmName: Name of the VM.
**parameter activate: true for booting from network, false for booting from the HD.
**returns BASH code to delete a virtual machine.
**/
function VM_activateNetbootCMD($type, $vmName, $activate)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$cmd = ($activate ? "
			if [ `VBoxManage --version | cut -d'.' -f1` -eq 2 ]
			then
				VBoxManage modifyvm \"$vmName\" -boot1 net;
			else
				VBoxManage modifyvm \"$vmName\" --boot1 net;
			fi\n" : "
			if [ `VBoxManage --version | cut -d'.' -f1` -eq 2 ]
			then
				VBoxManage modifyvm \"$vmName\" -boot1 disk;
			else
				VBoxManage modifyvm \"$vmName\" --boot1 disk;
			fi
			\n");
			break;
	}
	return($cmd);
}




/**
**name VM_createVM($type, $vmName, $ramSize, $diskName, $mac)
**description Creates a virtual machine.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmName: Name of the VM.
**parameter ramSize: Size of the memory in MB.
**parameter diskName: Name of the virtual harddisk file.
**parameter mac: MAC address of the virtual network card. It can be in the format 12:23:34:45:56:78 or 122334455678.
**parameter netDev: Device of the real network card that is used to let the VM communictae with the outer world.
**returns BASH code to create a virtual machine.
**/
function VM_createVM($type, $vmName, $ramSize, $diskName, $mac, $netDev, $imageDir = VM_IMAGE_DIR)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$mac = str_replace(":","",$mac);
			$cmd = "VBoxManage createvm -register -name \"$vmName\"

				if [ $(egrep '(vmx|svm)' /proc/cpuinfo -c) -gt 0 ]
				then
					hwvirt='on'
				else
					hwvirt='off'
				fi
				
				if [ `VBoxManage --version | cut -d'.' -f1` -eq 2 ]
				then
					VBoxManage modifyvm \"$vmName\" -pae \$hwvirt -ostype debian -memory $ramSize -vram 8 -acpi on -ioapic off -hwvirtex \$hwvirt -nestedpaging \$hwvirt -monitorcount 1 -bioslogofadein off -bioslogofadeout off -hda \"$imageDir/vbox/$vmName/$diskName.vdi\" -nic1 hostif -hostifdev1 $netDev -cableconnected1 on -macaddress1 $mac\n
				else
					VBoxManage storagectl \"$vmName\" --name \"IDE Controller\" --add ide
					VBoxManage modifyvm \"$vmName\" --pae \$hwvirt --ostype debian --memory $ramSize --vram 8 --acpi on --ioapic off --hwvirtex \$hwvirt --nestedpaging \$hwvirt --monitorcount 1 --bioslogofadein off --bioslogofadeout off --hda \"$imageDir/vbox/$vmName/$diskName.vdi\" --nic1 bridged --bridgeadapter1 $netDev --cableconnected1 on --macaddress1 $mac
				fi
				\n";
	}
	return($cmd);
}





/**
**name VM_insertBootISO($type, $vmName, $iso)
**description Inserts a bootable ISO into a VM.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmName: Name of the VM.
**parameter iso: ISO file with full path.
**returns BASH code to insert a bootable ISO into a VM.
**/
function VM_insertBootISO($type, $vmName, $iso)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$cmd = "
				if [ `VBoxManage --version | cut -d'.' -f1` -eq 2 ]
				then
					VBoxManage storageattach \"$vmName\" -storagectl \"IDE Controller\" -port 1 -device 0 -type dvddrive -medium \"$iso\"
					VBoxManage modifyvm \"$vmName\" -dvd \"$iso\"
					VBoxManage modifyvm \"$vmName\" -boot1 dvd\n
				else
					VBoxManage storageattach \"$vmName\" --storagectl \"IDE Controller\" --port 1 --device 0 --type dvddrive --medium \"$iso\"
					VBoxManage modifyvm \"$vmName\" --dvd \"$iso\"
					VBoxManage modifyvm \"$vmName\" --boot1 dvd\n
				fi
				\n";
	}
	return($cmd);
}





/**
**name VM_startVMInExistingXSession($type, $vmName)
**description Starts a virtual machine in an existing X session.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmName: Name of the VM.
**returns BASH code to start a virtual machine and finding the DISPLAY number of the user who runs this script.
**/
function VM_startVMInExistingXSession($type, $vmName)
{
	$cmd ='
	# Try to get the DISPLAY number of the user who runs this script
	disp=$(who | tr -s \'[:blank:]\' | grep $(whoami) | cut -d\' \' -f2 | grep \':\')

	# Check, if a DISPLAY number could retrieved
	if [ $(echo -n $disp | wc -m) -gt 0 ]
	then
		export DISPLAY="$disp"
	else
		echo "No DISPLAY found"
		exit 1
	fi
	';

	switch ($type)
	{
		case VM_SW_VBOX:
			$cmd .= "VBoxManage startvm $vmName&\n";
		break;
	}

	return($cmd);
}





/**
**name VM_startVM($type, $vmName, $vnc)
**description Starts a virtual machine.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmName: Name of the VM.
**parameter vnc: Set to true if the VM should be accessible since the booting via VNC.
**returns BASH code to start a virtual machine.
**/
function VM_startVM($type, $vmName, $vnc)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			if ($vnc)
			{
				$serverIP = getServerIP();
				$cmd = "chmod 700 /var/run/screen/S-m23-vbox; /m23/vms/vbox/bin/vnc4server-m23-vbox -startvm \"$vmName\" -m23server $serverIP -fp /usr/share/fonts/X11/75dpi/ -fp /usr/share/fonts/X11/misc/";
			}
			else
				$cmd = "VBoxHeadless -s \"$vmName\"\n";
		break;

		case VM_SW_CLOUDSTACK:
			VM_CloudStackStartVM($vmName, $startVMOK);
			return($startVMOK);
		break;
	}

	VM_startVMCommandFile($vmName, $cmd);
	return($cmd);
}





/**
**name VM_startVMCommandFile($vmName, $cmd)
**description Writes a command file with the command(s) to start the VM.
**parameter vmName: Name of the VM.
**parameter cmd: Bash code to start the VM.
**/
function VM_startVMCommandFile($vmName, &$cmd)
{
	$runFile = "/m23/vms/runningVMs/$vmName.run";
	$cmd.="; echo \"$cmd\" > \"$runFile\"; chmod 600 \"$runFile\"; chown m23-vbox \"$runFile\";";
}





/**
**name VM_stopVMCommandFile($vmName)
**description Removes automatical staring of a VM by removing the command file.
**parameter vmName: Name of the VM.
**/
function VM_stopVMCommandFile($vmName)
{
	$cmd.="; rm \"/m23/vms/runningVMs/$vmName.run\"";
}





/**
**name VM_status($type, $vmName)
**description Gets the current status of a virtual machine.
**parameter type: VM_SW_VBOX for VirtualBox OSE
**parameter vmName: Name of the VM.
**returns BASH code to get the current status of a virtual machine or array containing the status of the VM.
**/
function VM_status($type, $vmName)
{
	switch ($type)
	{
		case VM_SW_VBOX:
			$cmd = "VBoxManage showvminfo \"$vmName\" | grep \":\" | tr -s [':blank:'] 2>&1 | cat";
			break;

		case VM_SW_CLOUDSTACK:
			$out['state'] = VM_CloudStackGetVMStatus($vmName);
			return($out);
	}
	return($cmd);
}





/**
**name VM_parseVBOXdisk($param)
**description Parses a harddisk/DVD/floppy status line of VirtualBox.
**parameter param: Parameter line that may contain the complete path to the image file or "empty".
**returns Name of the assigned image or false of the medium is empty.
**/
function VM_parseVBOXdisk($param)
{
	$tmp = explode(" ",$param);
	if ($tmp[0] === "empty")
		return(false);
	else
		return($tmp[0]);
}





/**
**name VM_parseVBOXstate($param)
**description Parses the status (on, off, paused) line of VirtualBox.
**parameter param: Parameter line that contains the status string of the VM.
**returns VM_STATE_OFF, VM_STATE_PAUSE, VM_STATE_ON or false if the line could not be parsed.
**/
function VM_parseVBOXstate($param)
{
	$stateText[VM_STATE_OFF] = 'powered off';
	$stateText[VM_STATE_OFF] = 'aborted';
	$stateText[VM_STATE_PAUSE] = 'paused';
	$stateText[VM_STATE_ON] = 'running';
	
	foreach ($stateText as $state => $text)
	{
		if (substr_count($param, $text) > 0)
			return($state);
	}

	return(false);
}





/**
**name VM_parseVBOXNic($param)
**description Parses the status line of a virtual network card.
**parameter param: Parameter line that contains the status string of the VM.
**returns Array with the current state of the network device.
**/
function VM_parseVBOXNic($param)
{
	foreach (explode(", ",$param) AS $line)
	{
		$varVal = explode(": ",$line);

		switch($varVal[0])
		{
			case "Attachment":
				//Get the part between the two "'". This is the physical network card.
				$tmp = explode("'",$varVal[1]);
				$out['netDev'] = $tmp[1];

				//Check if the virtual network device is of the type "host interface" (other types are not supported at the moment)
				if (!(strpos($tmp[0],"Host Interface") === false))
					$out['netType'] = VM_NETTYPE_HOSTINTERFACE;
				elseif (!(strpos($tmp[0],"Bridged Interface") === false))
					$out['netType'] = VM_NETTYPE_BRIDGEDINTERFACE;
				else
					$out['netType'] = false;
			break;

			case "Cable connected":
				if ($varVal[1] === "on")
					$out['cable'] = VM_NET_CONNECTED;
				else
					$out['cable'] = VM_NET_DISCONNECTED;
			break;

			case "Reported speed":
				$out['speed'] = $varVal[1];
			break;
		}
	}
	return($out);
}






/**
**name VM_parseStatus($type, $status)
**description Parses the complete status of a VM.
**returns Array with the current state of the VM.
**/
function VM_parseStatus($type, $status)
{
	$out = array();
	switch ($type)
	{
		case VM_SW_VBOX:
			foreach (explode("\n",$status) AS $line)
			{
				//Split the variable name and the value
				$varVal = explode(": ",$line);

				//Parse the parameters
				switch($varVal[0])
				{
					case "Name": $out['vmName'] = trim($varVal[1]); break;
					case "Floppy": $out['floppy'] = VM_parseVBOXdisk($varVal[1]); break;
					case "Primary master": $out['hda'] = VM_parseVBOXdisk($varVal[1]); break;
					case "Primary slave": $out['hdb'] = VM_parseVBOXdisk($varVal[1]); break;
					case "Secondary slave": $out['hdc'] = VM_parseVBOXdisk($varVal[1]); break;
					case "DVD": $out['dvd'] = VM_parseVBOXdisk($varVal[1]); break;
					case "State": $out['state'] = VM_parseVBOXstate($varVal[1]); break;
					case "NIC 1": $out['nic1'] = VM_parseVBOXNic($line); break;
				}
			}
			break;
	}
	return($out);
}


/*
	Make a hd image deletable
	VBoxManage unregisterimage disk /m23/vms/vbox/vboxinkvmserver/vboxinkvmserverhda.vdi
*/

?>