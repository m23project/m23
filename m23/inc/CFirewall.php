<?php
class CFirewall extends CChecks
{

	const SCRIPT_FILE = '/m23/bin/firewall.sh';
	const RULES_FILE = '/m23/bin/firewall.iptables';
	const INTERFACES_FILE = '/etc/network/interfaces';

	
// 	const SCRIPT_FILE = '/tmp/firewall.sh';
// 	const RULES_FILE = '/tmp/firewall.iptables';
// 	const INTERFACES_FILE = '/tmp/interfaces';





/**
**name CFirewall::__construct($in)
**description Constructor for new CFDiskIO objects. The object holds all information about the partitioning (of a client and loads the values from the DB).
**parameter in: Name or object of an existing client (to load) or data of an empty disk.
**/
	public function __construct()
	{
		$this->writeDefaultScript();
	}





/**
**name CFirewall::clearIPtablesSettings()
**description Clears all currently set iptables rules.
**/
	private function clearIPtablesSettings()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$cmds = '
		iptables -F
		iptables -F -t mangle
		iptables -F -t nat
		iptables -F INPUT
		iptables -F OUTPUT
		iptables -F FORWARD
		iptables -X
		iptables -X -t mangle
		iptables -X -t nat
		iptables -P INPUT ACCEPT
		iptables -P FORWARD ACCEPT
		iptables -P OUTPUT ACCEPT
';

		SERVER_runInBackground('clearIPtablesSettings',$cmds,"root",false);
		$this->addInfoMessage($I18N_firewallRulesDeactivated);
	}





/**
**name CFirewall::scriptFileExists()
**description Checks, if the iptables script file exists.
**returns true, if the iptables script file exists, otherwise false.
**/
	private function scriptFileExists()
	{
		return(file_exists(CFirewall::SCRIPT_FILE));
	}





/**
**name CFirewall::rulesFileExists()
**description Checks, if the iptables rules file exists.
**returns true, if the iptables rules file exists, otherwise false.
**/
	private function rulesFileExists()
	{
		return(file_exists(CFirewall::RULES_FILE));
	}





/**
**name CFirewall::writeDefaultScript()
**description Writes the default iptables script, if there is no script.
**/
	private function writeDefaultScript()
	{
		if ($this->scriptFileExists())
			return(false);

		// Calculate the network of the server and netmask short form
		$network = getServerNetwork();
		$netmaskBits = HELPER_netmaskAmountOfSetBits(getServerNetmask());

		$text = "
#!/bin/bash

# Basic m23 server firewall script

# Set default policies.
iptables -P INPUT DROP
iptables -P FORWARD DROP
iptables -P OUTPUT ACCEPT

# Allow anything on loopback
iptables -A INPUT -i lo -j ACCEPT

# Allow m23 clients on the local network
iptables -A INPUT -s $network/$netmaskBits -j ACCEPT

# Allow SSH from anywhere
iptables -A INPUT -p tcp --dport ssh -j ACCEPT

# Allow already established connections (needed for internet access, ping, etc.)
iptables -A INPUT -m conntrack --ctstate ESTABLISHED,RELATED -j ACCEPT
";

		$this->putScript($text);
	}





/**
**name CFirewall::getScript()
**description Gets the contents of the iptables script.
**returns Contents of the iptables script.
**/
	private function getScript()
	{
		return(SERVER_getFileContents(CFirewall::SCRIPT_FILE));
	}





/**
**name CFirewall::putScript($text)
**description Writes script code in the iptables script.
**parameter text: The iptables script code to write.
**/
	private function putScript($text)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		SERVER_putFileContents(CFirewall::SCRIPT_FILE, $text, '755');
		$this->addInfoMessage($I18N_firewallScriptSaved);
	}





/**
**name CFirewall::executeScript()
**description Executes the iptables script.
**/
	private function executeScript()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		SERVER_runInBackground('executeScript','bash '.CFirewall::SCRIPT_FILE, 'root', false);
		$this->addInfoMessage($I18N_firewallScriptExecuted);
	}





/**
**name CFirewall::exportRules()
**description Exports the set iptables rules to a rule file (generated with iptables-save).
**/
	private function exportRules()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		SERVER_runInBackground('exportRules','iptables-save > '.CFirewall::RULES_FILE, 'root', false);
		$this->addInfoMessage($I18N_firewallRulesExported);
	}





/**
**name CFirewall::activateInInterfaces()
**description Activates auto-loading of the iptables rules in the interfaces file.
**returns true, if the auto-loading is not allready active, otherwise false.
**/
	private function activateInInterfaces()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if ($this->isActive())
			return(false);
	
		// Get the interfaces file
		$text = SERVER_getFileContents(CFirewall::INTERFACES_FILE);

		// Split it into lines and build an array
		$lines = explode("\n", $text);

		// Variables for positions of the last eth block
		$lineNumberStartOfLastEthBlock = false;
		$lineNumberAfterLastEthBlock = count($lines);

		// Run thru the lines
		for ($i = 0; $i < count($lines); $i++)
		{
			$line = $lines[$i];

			// An empty line after an eth block indicates the end of the block
			if (($lineNumberStartOfLastEthBlock !== false) && (!isset($line{2})))
				$lineNumberAfterLastEthBlock = $i;

			// Check, if the line contains an eth block
			if (strpos($line, 'iface eth') !== false)
				$lineNumberStartOfLastEthBlock = $i;
		}

		// Go again thru the lines to insert the new line
		$out = '';
		for ($i = 0; $i <= count($lines); $i++)
		{
			$line = $lines[$i];

			// Insert the new line here
			if ($i == $lineNumberAfterLastEthBlock)
				$out .= "\tpost-up iptables-restore < ".CFirewall::RULES_FILE."\n";

			$out .= "$line\n";
		}

		// Save the modified file
		SERVER_putFileContents(CFirewall::INTERFACES_FILE, $out, '755');

		$this->addInfoMessage($I18N_autoLoadingOfFirewallRulesActivated);

		return(true);
	}





/**
**name CFirewall::isActive()
**description Checks, if auto-loading of the iptables rules in the interfaces file is active.
**returns true, if the auto-loading is active, otherwise false.
**/
	private function isActive()
	{
		$text = SERVER_getFileContents(CFirewall::INTERFACES_FILE);
		return (HELPER_grepCount($text,"post-up iptables-restore < ".CFirewall::RULES_FILE) > 0);
	}





/**
**name CFirewall::activate()
**description Activates the firewall.
**returns true, if the firewall was activated, otherwise false.
**/
	private function activate()
	{
		if ($this->isActive())
			return(false);
	
		if ($this->scriptFileExists())
		{
			$this->executeScript();
			$this->exportRules();
			$this->activateInInterfaces();
		}
		else
			die('The script file "'.CFirewall::SCRIPT_FILE.'" could not be found!');

		return(true);
	}





/**
**name CFirewall::deactivate()
**description Deactivates the firewall.
**returns true, if the firewall was deactivated, otherwise false.
**/
	private function deactivate()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if (!$this->isActive())
			return(false);

		$this->clearIPtablesSettings();

		// Filter out all iptables rules auto-loading lines from the interfaces file.
		$text = SERVER_getFileContents(CFirewall::INTERFACES_FILE);
		$out = HELPER_grepNot($string, "post-up iptables-restore < ".CFirewall::RULES_FILE);
		SERVER_putFileContents(CFirewall::INTERFACES_FILE, $out, '755');

		$this->addInfoMessage($I18N_autoLoadingOfFirewallRulesDeactivated);
	}





/**
**name CFirewall::getSatusIconHTML()
**description Generates a HTML status icon to indicate the status of the firewall.
**/
	private function getSatusIconHTML()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		if ($this->isActive())
			return('<img src="/gfx/status/green.png" alt="'.$I18N_enabled.'">');
		else
			return('<img src="/gfx/status/red.png" alt="'.$I18N_disabled.'">');
	}





/**
**name CFirewall::show()
**description Shows a dialog for (de)activating the firewall and changing the rules.
**/
	public function show()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$iptablesScript = HTML_textArea('TA_iptablesScript', 100, 25, $this->getScript());

		// Choose the label for the save button
		if ($this->isActive())
			$BUT_saveScriptLabel = $I18N_saveAndActivate;
		else
			$BUT_saveScriptLabel = $I18N_save;

		if (HTML_submit('BUT_saveScript', $BUT_saveScriptLabel))
		{
			// If the firewall is active, it should be reloaded with the new iptables script
			if ($this->isActive())
			{
				$this->deactivate();
				$this->putScript($iptablesScript);
				$this->activate();
			}
			else
			// If the firewall is disabled, the new iptables script should be stored only
				$this->putScript($iptablesScript);
		}



		// Choose the label for the toggle firewall button
		if ($this->isActive())
			$BUT_deactivateFirewallLabel = $I18N_deactivate;
		else
			$BUT_deactivateFirewallLabel = $I18N_activate;

		// If the firewall is active => deactivate, if deactivated => activate
		if (HTML_submit('BUT_deActivateFirewall', $BUT_deactivateFirewallLabel))
		{
			if ($this->isActive())
				$this->deactivate();
			else
				$this->activate();
		}



		MSG_showMessageBoxPlaceholder();
		HTML_showTableHeader(false, 'subtable');
		HTML_showTableRow($I18N_status.': '.$this->getSatusIconHTML());
		HTML_showTableRow(TA_iptablesScript);
		HTML_showTableRow(BUT_saveScript.' '.BUT_deActivateFirewall);
		HTML_showTableEnd(false);
		
		$this->showMessages();
	}
}
?>