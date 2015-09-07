<?
	HTML_showTitle($I18N_firewallSetting);
	HTML_showFormHeader();
	HTML_setPage('firewall');

	$CFirewallO = new CFirewall();
	$CFirewallO->show();

	HTML_showFormEnd();

	help_showhelp('firewall');
?>