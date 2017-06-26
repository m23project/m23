<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Debian specific management functions.
$*/


include('clientConfigCommon.php');



define('DEBIAN8DESKTOP_MATE_FULL', 4001);
define('DEBIAN8DESKTOP_MATE_MINIMAL', 4002);
define('DEBIAN8DESKTOP_TRINITY_MINIMAL', 4003);
define('DEBIAN8DESKTOP_GNOME_FULL', 4004);
define('DEBIAN8DESKTOP_XFCE_FULL', 4005);
define('DEBIAN8DESKTOP_KDE_FULL', 4006);
define('DEBIAN8DESKTOP_CINNAMON_FULL', 4007);
define('DEBIAN8DESKTOP_LXDE_FULL', 4008);





/**
**name DEBIAN_desktopInstall($desktop)
**description Installs a Debian desktop.
**parameter desktop: Desktop constant.
**/
function DEBIAN_desktopInstall($desktop)
{
	$lang = getClientLanguage();

	$lV = I18N_getLangVars($lang);

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	$installDesktopLanguagePackage = true;

	switch($desktop)
	{
		case DEBIAN8DESKTOP_MATE_FULL:
			$desktopPackages = 'task-mate-desktop';
			$dialogHeader = $I18N_installingMate;
		break;

		case DEBIAN8DESKTOP_MATE_MINIMAL:
			$desktopPackages = 'mate-applets mate-applets-common mate-backgrounds mate-control-center mate-control-center-common mate-desktop mate-desktop-common mate-desktop-environment mate-desktop-environment-core mate-icon-theme mate-icon-theme-faenza mate-media mate-media-common mate-media-pulse mate-menus mate-notification-daemon mate-panel mate-panel-common mate-polkit:amd64 mate-polkit-common mate-power-manager mate-power-manager-common mate-screensaver mate-screensaver-common mate-session-manager mate-settings-daemon mate-settings-daemon-common mate-settings-daemon-pulse mate-system-monitor mate-system-monitor-common mate-terminal mate-terminal-common mate-themes mate-utils mate-utils-common';
			$dialogHeader = $I18N_installingMate;
		break;

		case DEBIAN8DESKTOP_TRINITY_MINIMAL:
			$desktopPackages = 'desktop-base-trinity kate-trinity kdesktop-trinity kicker-trinity konsole-trinity kpersonalizer-trinity ksmserver-trinity ksplash-trinity tdebase-runtime-data-common-trinity tdebase-trinity-bin tdm-trinity twin-trinity';
			$dialogHeader = $I18N_installing_trinity;
		break;

		case DEBIAN8DESKTOP_GNOME_FULL:
			$desktopPackages = 'task-gnome-desktop';
			$dialogHeader = $I18N_installing_gnome;
		break;

		case DEBIAN8DESKTOP_XFCE_FULL:
			$desktopPackages = 'task-xfce-desktop';
			$dialogHeader = $I18N_installing_xfce;
		break;

		case DEBIAN8DESKTOP_KDE_FULL:
			$desktopPackages = "task-kde-desktop kde-l10n-$lV[packagelang]";
			$dialogHeader = $I18N_installing_kde;
		break;

		case DEBIAN8DESKTOP_CINNAMON_FULL:
			$desktopPackages = 'task-cinnamon-desktop';
			$dialogHeader = $I18N_installingCinnamon;
		break;

		case DEBIAN8DESKTOP_LXDE_FULL:
			$desktopPackages = 'task-lxde-desktop';
			$dialogHeader = $I18N_installingLXDE;
		break;
	}

	if ($installDesktopLanguagePackage)
		CLCFG_installDesktopLanguagePackage($lang, true, true);

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $dialogHeader);

	CLCFG_setDebConfDirect('lightdm shared/default-x-display-manager select lightdm');

	// Install the chosen desktop
	CLCFG_aptGet("install", "$desktopPackages acpi-support lightdm");
	/* =====> */ MSR_statusBarIncCommand(100);

	echo("\ndpkg-reconfigure m23-skel\n");
}





/**
**name CLCFG_listDebianReleasesGeneric($distr)
**description Generates an array of the different releases (e.g. sarge, sid, woody, potato) of a distribution.
**parameter selName: the name of the selection
**parameter first: the release to show first
**parameter distr: distribution directory
**returns: Array with release names.
**/
function CLCFG_getDebianReleasesGeneric($distr)
{
	$nr = 0;
	$DIR = opendir ("/m23/data+scripts/distr/$distr/debootstrap/scripts/");

	while (false !== ($file = readdir ($DIR)))
	{
		if (strpos($file,".") === false)
			$out[$nr++] = $file;
	}
	
	sort($out);

	closedir($DIR);
	return($out);
};





/**
**name CLCFG_listDebianReleasesGeneric($selName,$first,$distr)
**description generates a selection of the different releases (e.g. sarge, sid, woody, potato) of a distribution.
**parameter selName: the name of the selection
**parameter first: the release to show first
**parameter distr: distribution directory
**returns: Selection with release names.
**/
function CLCFG_listDebianReleasesGeneric($selName,$first,$distr)
{
	return(HTML_listSelection($selName,CLCFG_getDebianReleasesGeneric($distr),$first));
};





/**
**name CLCFG_listDebianReleases($selName,$first)
**description generates a selection of the different Debian releases (sarge, sid, woody, potato)
**parameter selName: the name of the selection
**parameter first: the release to show first
**/
function CLCFG_listDebianReleases($selName,$first)
{
	return(CLCFG_listDebianReleasesGeneric($selName,$first,"debian"));
}
$CLCFG_listReleases = 'CLCFG_listDebianReleases';





/**
**name CLCFG_addDistributionSpecificOptions( $options)
**description adds distribution specific settings to an option array and returns the new array
**parameter $options: the options array with some values
**/
function CLCFG_addDistributionSpecificOptions($options)
{
	$options['kernel']=$_POST['SEL_kernel'];
	$options['disableSSLCertCheck']=($_POST['CB_disableSSLCertCheck'] == 'yes' ? 1 : 0);
	$options['disableSudoRootLogin']=($_POST['CB_disableSudoRootLogin'] == 'yes' ? 1 : 0);
	$options['installX2goserver']=($_POST['CB_installX2goserver'] == 'yes' ? 1 : 0);
	return($options);
};





/**
**name CLCFG_showDistributionSpecificOptions($options, $distr = "debian")
**description shows distribution specific options and returns false, if there was an error
**parameter options: options array
**parameter distr: The name the distribution to use.
**/
function CLCFG_showDistributionSpecificOptions($options, $distr = "debian")
{
	include_once("/m23/inc/distr/debian/packages.php");
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$options = CLIENT_getSetOption(NULL,"kernel",$options);

	$kernelList = PKG_getKernels($distr, $_POST['SEL_sourcename'], $options['arch']);
	$kernel = HTML_storableSelection("SEL_kernel", "kernel", $kernelList, SELTYPE_selection, true, isset($options['kernel']) ? $options['kernel'] : NULL, $options['kernel']);
	$options = CLIENT_getSetOption($kernel,"kernel",$options);

	$disableSSLCertCheck = HTML_storableCheckBox('CB_disableSSLCertCheck', '', 'disableSSLCertCheck', isset($options['disableSSLCertCheck']) && ($options['disableSSLCertCheck'] == 1));
	$options = CLIENT_getSetOption(($disableSSLCertCheck ? 1 : 0), 'disableSSLCertCheck', $options);

	$installX2goserver = HTML_storableCheckBox('CB_installX2goserver', '', 'installX2goserver', isset($options['installX2goserver']) && ($options['installX2goserver'] == 1));
	$options = CLIENT_getSetOption(($installX2goserver ? 1 : 0), 'installX2goserver', $options);
	
	
	/***********
	CAUTION: Must be set in CLCFG_addDistributionSpecificOptions too
	***********/

	echo("
	<tr>
		<td>Kernel</td>
		<td colspan=\"2\">".SEL_kernel."</td>
	</tr>
	<tr>
		<td>$I18N_disableSSLCertCheck</td>
		<td colspan=\"2\">".CB_disableSSLCertCheck."</td>
	</tr>
	<tr>
		<td>$I18N_installX2goserver</td>
		<td colspan=\"2\">".CB_installX2goserver."</td>
	</tr>
	");

	return($options);
};
$CLCFG_showDistributionSpecificOptions='CLCFG_showDistributionSpecificOptions';





/**
**name CLIENT_enableLDAP($clientOptions)
**description enables LDAP login for a client.
**parameter clientOptions: the client's options array
**/
function CLCFG_enableLDAPDebian($clientOptions)
{
	//exit the function if LDAP shouldn't used
	if ($clientOptions['ldaptype']=="none")
		return;

	if (HELPER_isExecutedOnUCS())
	{
		UCS_enableClientLDAP();
		return(false);
	}


	$server=LDAP_loadServer($clientOptions['ldapserver']);

	$LDAPhost=$server['host'];
	$baseDN=$server['base'];

	//exit the function if LDAP host or base DN is empty
	if (empty($LDAPhost) || empty($baseDN))
		return;

	if ('squeeze' == $clientOptions['release'])
	{
		CLCFG_setDebConfDirect("libnss-ldap libnss-ldap/binddn string cn=proxyuser,$baseDN
libnss-ldap libnss-ldap/bindpw password
libnss-ldap libnss-ldap/confperm boolean false
libnss-ldap libnss-ldap/dblogin boolean false
libnss-ldap libnss-ldap/dbrootlogin boolean false
libnss-ldap libnss-ldap/nsswitch note
libnss-ldap libnss-ldap/override boolean true
libnss-ldap libnss-ldap/rootbinddn string cn=manager,$baseDN
libnss-ldap libnss-ldap/rootbindpw password
libnss-ldap shared/ldapns/base-dn string $baseDN
libnss-ldap shared/ldapns/ldap-server string ldapi://$LDAPhost
libnss-ldap shared/ldapns/ldap_version select 3
libpam-ldap libpam-ldap/binddn string cn=proxyuser,$baseDN
libpam-ldap libpam-ldap/bindpw password
libpam-ldap libpam-ldap/dblogin boolean false
libpam-ldap libpam-ldap/dbrootlogin boolean false
libpam-ldap libpam-ldap/override boolean true
libpam-ldap libpam-ldap/pam_password select md5
libpam-ldap libpam-ldap/rootbinddn string cn=manager,$baseDN
libpam-ldap libpam-ldap/rootbindpw password
libpam-ldap shared/ldapns/base-dn string $baseDN
libpam-ldap shared/ldapns/ldap-server string ldapi://$LDAPhost
libpam-ldap shared/ldapns/ldap_version select 3
ldap-auth-config ldap-auth-config/ldapns/ldap-server string ldapi://$LDAPhost
portmap portmap/loopback boolean false
");
	}
	else
	{
		CLCFG_setDebConfDirect("libnss-ldap libnss-ldap/binddn string cn=proxyuser,$baseDN
libnss-ldap libnss-ldap/bindpw password
libnss-ldap libnss-ldap/confperm boolean true
libnss-ldap libnss-ldap/dblogin boolean false
libnss-ldap libnss-ldap/dbrootlogin boolean false
libnss-ldap libnss-ldap/nsswitch note
libnss-ldap libnss-ldap/override boolean true
libnss-ldap libnss-ldap/rootbinddn string cn=manager,$baseDN
libnss-ldap libnss-ldap/rootbindpw password
libnss-ldap shared/ldapns/base-dn string $baseDN
libnss-ldap shared/ldapns/ldap-server string ldap://$LDAPhost
libnss-ldap shared/ldapns/ldap_version select 3
libpam-runtime libpam-runtime/override boolean false
libpam-runtime libpam-runtime/profiles multiselect unix, ldap
portmap portmap/loopback boolean false");
	}

	//Thanks to the howto from: http://www.debuntu.org/ldap-server-and-linux-ldap-clients-p2

	CLCFG_aptGet('install','libnss-ldap libpam-ldap nscd ldap-utils libnss-db nss-updatedb');
	
echo("

	echo \"host $LDAPhost
base $baseDN
rootbinddn cn=admin,$baseDN\" > /etc/libnss-ldap.conf

	cat /etc/libnss-ldap.conf > /etc/pam_ldap.conf

pam configuration files need to be modfied a bit like:

	echo \"account sufficient pam_ldap.so
account required pam_unix.so
session required pam_mkhomedir.so umask=0022 skel=/etc/skel/ silent\" > /etc/pam.d/common-account

	echo \"auth sufficient pam_ldap.so
auth required pam_unix.so nullok_secure use_first_pass\" > /etc/pam.d/common-auth

	echo \"password sufficient pam_ldap.so
password required pam_unix.so nullok obscure min=4 md5\" > /etc/pam.d/common-password

	echo \"session sufficient pam_ldap.so
session required pam_unix.so
session optional pam_foreground.so\" > /etc/pam.d/common-session


	echo \"BASE dc=$baseDN
URI ldap://$LDAPhost\" > /etc/ldap/ldap.conf
");

// Add the local groups to the LDAP user
echo('
echo "*; *; *; Al0000-2400;'.DISTR_getDebianUserGroups(',').'" >> /etc/security/group.conf
echo "auth required pam_group.so use_first_pass" >> /etc/pam.d/common-auth
');

	CLCFG_patchNsswitchForLDAP();
	
	echo("
	/usr/sbin/nss_updatedb ldap
	dpkg-reconfigure libpam-runtime
	");

	if ('wheezy' == $clientOptions['release'])
	{
		echo(EDIT_writeToFile('/etc/pam.d/common-account', 'account [success=2 new_authtok_reqd=done default=ignore]        pam_unix.so
account [success=1 default=ignore]      pam_ldap.so
account requisite                       pam_deny.so
account required                        pam_permit.so
session required pam_mkhomedir.so umask=0022 skel=/etc/skel/ silent')."\n".
		EDIT_writeToFile('/etc/pam.d/common-auth', 'auth    [success=2 default=ignore]      pam_unix.so nullok_secure
auth    [success=1 default=ignore]      pam_ldap.so use_first_pass
auth    requisite                       pam_deny.so
auth    required                        pam_permit.so')."\n".
		EDIT_writeToFile('/etc/pam.d/common-password', 'password        [success=2 default=ignore]      pam_unix.so obscure sha512
password        [success=1 user_unknown=ignore default=die]     pam_ldap.so use_authtok try_first_pass
password        requisite                       pam_deny.so
password        required                        pam_permit.so')."\n".
		EDIT_writeToFile('/etc/pam.d/common-session', 'session [default=1]                     pam_permit.so
session requisite                       pam_deny.so
session required                        pam_permit.so
session required        pam_unix.so
session optional                        pam_ldap.so')."\n".
		EDIT_writeToFile('/etc/pam.d/common-session-noninteractive', 'session [default=1]                     pam_permit.so
session requisite                       pam_deny.so
session required                        pam_permit.so
session required        pam_unix.so
session optional                        pam_ldap.so'));
	}
}
?>