<?PHP
/*
Description: Printer detection
Priority:25
*/

function run($id)
{
 $serverIP=getServerIP();

 $lang=getClientLanguage();

 include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
 include('/m23/inc/distr/debian/clientConfigCommon.php');


CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installingPrinter);

echo("
export DEBIAN_FRONTEND=noninteractive

#write debconf data

rm /tmp/printerconf 2> /dev/null

cat >> /tmp/printerconf << \"EOF\"
cupsys cupsys/raw-print boolean true
cupsys cupsys/ports string  631
cupsys cupsys/backend multiselect ipp, lpd, parallel, socket, usb
cupsys cupsys/portserror note
cupsys cupsys/browse boolean true
cupsys-bsd cupsys-bsd/setuplpd boolean false
foomatic-filters foomatic-filters/spooler select cups
printconf printconf/setup_printers boolean true
printconf printconf/printconf_run boolean true
EOF

debconf-set-selections /tmp/printerconf

for pkg in printconf foomatic-filters foomatic-filters-ppds cupsys-driver-gimpprint-data cupsomatic-ppd cupsys-driver-gutenprint printer-driver-c2esp printer-driver-foo2zjs printer-driver-hpcups printer-driver-ptouch printer-driver-pxljr printer-driver-sag-gdi printer-driver-splix
do
	apt-get --force-yes -y install \$pkg 2>&1 | tee /tmp/m23PrinterConfig.log
done

dpkg-reconfigure cupsys

rm /etc/cups/cupsd.conf
cat >> /etc/cups/cupsd.conf << \"CUPSEOF\"
# Show general information in error_log.
LogLevel info
SystemGroup lpadmin
# Allow remote access
Port 631
# Enable printer sharing and shared printers.
Browsing On
BrowseOrder allow,deny
BrowseAllow @LOCAL
BrowseAddress @LOCAL
DefaultAuthType Basic
<Location />
  # Allow shared printing and remote administration...
  Order allow,deny
  Allow @LOCAL
</Location>
<Location /admin>
  Encryption Required
  # Allow remote administration...
  Order allow,deny
  Allow @LOCAL
</Location>
<Location /admin/conf>
  AuthType Basic
  Require user @SYSTEM
  # Allow remote access to the configuration files...
  Order allow,deny
  Allow @LOCAL
</Location>
<Policy default>
  <Limit Send-Document Send-URI Hold-Job Release-Job Restart-Job Purge-Jobs Set-Job-Attributes Create-Job-Subscription Renew-Subscription Cancel-Subscription Get-Notifications Reprocess-Job Cancel-Current-Job Suspend-Current-Job Resume-Job CUPS-Move-Job>
    Require user @OWNER @SYSTEM
    Order deny,allow
  </Limit>
  <Limit Pause-Printer Resume-Printer Set-Printer-Attributes Enable-Printer Disable-Printer Pause-Printer-After-Current-Job Hold-New-Jobs Release-Held-New-Jobs Deactivate-Printer Activate-Printer Restart-Printer Shutdown-Printer Startup-Printer Promote-Job Schedule-Job-After CUPS-Add-Printer CUPS-Delete-Printer CUPS-Add-Class CUPS-Delete-Class CUPS-Accept-Jobs CUPS-Reject-Jobs CUPS-Set-Default>
    AuthType Basic
    Require user @SYSTEM
    Order deny,allow
  </Limit>
  <Limit CUPS-Authenticate-Job>
    Require user @OWNER @SYSTEM
    Order deny,allow
  </Limit>
  # Only the owner or an administrator can cancel a job...
  <Limit Cancel-Job>
    Order deny,allow
    Require user @OWNER @SYSTEM
  </Limit>
  <Limit All>
    Order deny,allow
  </Limit>
</Policy>
Printcap /var/run/cups/printcap
CUPSEOF

pwd=`pwd`

cd /etc/rcS.d
ln -s ../init.d/printconf S46printconf

cd \$pwd

");

/* =====> */ MSR_statusBarIncCommand(90);

// Generate a random password for the m23 CUPS user
$m23cupsadminPW = md5(HELPER_generateSalt(256));

// Add the new user
$groups[0] = 'lpadmin';
CLCFG_addUser('m23cupsadmin', $m23cupsadminPW, $groups);

// Store the password as client option
$clientName = CLIENT_getClientName();
$options = CLIENT_getAllOptions($clientName);
$options = CLIENT_getSetOption($m23cupsadminPW, 'm23cupsadminPW', $options);
CLIENT_setAllOptions($clientName, $options);

/* =====> */ MSR_statusBarIncCommand(10);

MSR_logCommand("/tmp/m23PrinterConfig.log");

sendClientStatus($id,"done");

executeNextWork();
}
?>