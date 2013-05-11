<?php

	class CIPManagement extends CIPRanges
	{

		/**
		**name CIPManagement::singleSettingsAddDialog()
		**description Shows a dialog for locking client settings (clientname, IP, MAC) or for adding the settings to the DHCP server.
		**/
		public function singleSettingsAddDialog()
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
			$hasErrors = false;

			//Input lines for single clients/network settings
			$singleClientName = HTML_input('ED_singleClientName', false, 20, 64);
			$singleIp = HTML_input('ED_singleIp', false, 16, 16);
			$singleNetmask = HTML_input('ED_singleNetmask', false, 16, 16);
			$singleMac = HTML_input('ED_singleMac', false, 12, 12);
			$singleGateway = HTML_input('ED_singleGateway', false, 16, 16);

			//Lock a single client with different settings
			if (HTML_submit('BUT_lockIPClientName', $I18N_lockIPMACClientName.'¹'))
			{
				//Check if none of the (at least one) input lines has been filled in
				if (!isset($singleClientName{1}) && !isset($singleIp{1}) && !isset($singleMac{1}))
					$this->addErrorMessage($I18N_noIPMACClientNameGiven);
				else
				{
					//Check if the client name should be locked
					if (isset($singleClientName{1}))
						$this->checkNonusedClientname($singleClientName);
					//Check if the IP/Netmask should be locked
					if (isset($singleIp{1}))
						$this->checkNonusedIP($singleIp);
					//Check if the MAC should be locked
					if (isset($singleMac{1}))
						$this->checkNonusedMAC($singleMac);
				}

				//Check if there are errors and show the (hopefully not existing) error message
				$hasErrors = $this->showError();

				//Now do the processing, if all values are correct
				if (!$hasErrors)
				{
					//Check, if there is is given a client name
					if (isset($singleClientName{1}))
						$clientName = $singleClientName;
					else
					//If not => generate one
						$clientName = 'BLOCKClient-'.time();

					//Create new client object with the name
					$clientO = new CClient($clientName);

					//Add (if needed) IP and MAC.
					if (isset($singleIp{1}))
						$clientO->setIP($singleIp);
					if (isset($singleMac{1}))
						$clientO->setMAC($singleMac);

					//Set the status to mark the client as blocked
					$clientO->setStatus(CClient::STATUS_BLOCKED);
	
					//Give out errors
					if (!$this->showError())
						MSG_showInfo($I18N_givenSettingsAreBlocked);
				}
			}

			//Add a single client to the DHCP server
			if (HTML_submit('BUT_addSettingsToDhcp', $I18N_addSettingsToDhcp.'²'))
			{
				$this->checkNonusedClientname($singleClientName);
				$this->checkNonusedIP($singleIp);
				$this->checkNetmask($singleNetmask);
				$this->checkNonusedMAC($singleMac);
				$this->checkIP($singleGateway);

				//Check if there are errors and show the (hopefully not existing) error message
				if (!$this->showError())
				{
					//Create new client object with the name
					$clientO = new CClient($singleClientName);
					$clientO->setIP($singleIp);
					$clientO->setNetmask($singleNetmask);
					$clientO->setMAC($singleMac);
					$clientO->setGateway($singleGateway);
					$clientO->setBootType(CClient::BOOTTYPE_NOBOOT);
					$clientO->setStatus(CClient::STATUS_BLOCKED);
					$clientO->activateNetboot();

					if (!$clientO->showError())
						MSG_showInfo($I18N_addedDHCPSettings);
				}
			}

			HTML_showSmallTitle($I18N_singleClientsNetworksettings);
			HTML_showTableHeader(false, 'subtable2');
				HTML_showTableRow("$I18N_client_name <sup>1,2</sup>", ED_singleClientName, '');
				HTML_showTableRow("$I18N_ip <sup>1,2</sup>", ED_singleIp, "($I18N_eg 255.255.255.0)");
				HTML_showTableRow("$I18N_netmask <sup>2</sup>", ED_singleNetmask, "($I18N_eg 255.255.255.0)");
				HTML_showTableRow("$I18N_mac <sup>1,2</sup>", ED_singleMac, "($I18N_eg 009b52a5e121)");
				HTML_showTableRow("$I18N_gateway <sup>2</sup>",ED_singleGateway," ($I18N_eg 192.168.0.1)");
				HTML_showTableRow(BUT_lockIPClientName, BUT_addSettingsToDhcp,'');
			HTML_showTableEnd(false);
		}





		/**
		**name CIPManagement::showUsedIPsAndMACs()
		**description Shows a list of clients/IPs/MACs matching the search term.
		**/
		public function showUsedIPsAndMACs()
		{
			include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

			$CClientListerO = new CClientLister;

			if (HTML_submit('BUT_delete', $I18N_remove))
			{
				$clientsToDelete = $CClientListerO->getCheckedClientNames();

				if (count($clientsToDelete) > 0)
					foreach($clientsToDelete as $clientToDelete)
					{
						$CClientO = new CClient($clientToDelete);
						$CClientO->destroy();
					}
			}



			$CClientListerO->addGroupFilter($this->getSearchWord());
			$CClientListerO->addSearchFilter($this->getSearchWord());
			$CClientListerO->setOutputColumns(CClientLister::COLUMN_CONTINUOUS_NUMBER, CClientLister::COLUMN_STATUS, CClientLister::COLUMN_CLIENT, CClientLister::COLUMN_IP, CClientLister::COLUMN_MAC, CClientLister::COLUMN_CHECKBOX);
			$CClientListerO->setClientListExtraLine('','','','',BUT_delete,'');

			HTML_showSmallTitle($I18N_usedIPs);
			$CClientListerO->showClientTable();

		}


		/**
		**name CIPManagement::showDialog()
		**description Shows the IP management dialog.
		**/
		public function showDialog()
		{
			echo('<br><br>
				<table>
					<tr>
						<td valign="top">');
							$this->singleSettingsAddDialog(); echo('
						</td>
						<td valign="top">');
							$this->showRangesAddingDialog(); echo('
						</td>
					</tr>
					<tr>
						<td valign="top">');
							$this->showSearchDialog();
							$this->showRangesList();
							$this->showDynamicRangesList();
			echo('
						</td>
						<td valign="top">');
							$this->showUsedIPsAndMACs();
			echo('
						</td>
					</tr>
				</table>');
		}
	}
?>