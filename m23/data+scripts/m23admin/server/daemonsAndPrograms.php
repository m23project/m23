<span class="title"> <?PHP echo($I18N_daemons_and_programs);?> </span><br><br>

<?PHP
	HTML_showFormHeader();
	HTML_setPage('server_daemonsAndPrograms');
	echo("<span class=\"titlesmal\">$I18N_daemons</span>");
	SERVER_programmStatusTableHeader();
	SERVER_programmStatus("apache2","apache2","/etc/init.d/apache2",$I18N_descrApache,SERVER_apacheInfo());
	SERVER_programmStatus("mysql","mysql-server","/etc/init.d/mysql",$I18N_descrMysql,SERVER_mysqlInfo());
	
	foreach (array('isc-dhcp-server' => 'isc-dhcp-server', 'dhcpd' => 'dhcp-server', 'dhcpd3' => 'dhcp3-server') as $dhcpDaemon => $dhcpPkg)
	{
		$dhcpScript="/etc/init.d/$dhcpDaemon";
		
		if ($dhcpDaemon === 'isc-dhcp-server')
			$dhcpDaemon = 'dhcpd';

		if (file_exists($dhcpScript))
			break;
	};

	SERVER_programmStatus($dhcpDaemon,$dhcpPkg,$dhcpScript,$I18N_descrDhcp,SERVER_dhcpInfo());
	SERVER_programmStatus("slapd","slapd","/etc/init.d/slapd",$I18N_descrOpenLDAP,SERVER_LDAPInfo());
	SERVER_programmStatus('opentracker', 'opentracker-installer', '/m23/bin/btServer.php', $I18N_descrBTServer, BT_status(true, true), false);
	
	HTML_showTableEnd();

// 	echo("<br><span class=\"title\">$I18N_helperApplications</span>");
// 	SERVER_programmStatusTableHeader();
// 	SERVER_programmStatus("wget","wget","",$I18N_descrWget,"");
// 	SERVER_programmStatus("pwgen","pwgen","","$I18N_descrPwgen","");
// 	SERVER_programmStatus($I18N_burnerApplications,"dvd+rw-tools mkisofs cdrdao cdrecord","",$I18N_descrBurnerApplications,"");
// 	HTML_showTableEnd();

	echo("<center><INPUT type=\"submit\" name=\"BUT_submit\" value=\"$I18N_doActions\"></center>");
	HTML_showFormEnd();

	help_showhelp("daemonsAndPrograms");
?>
