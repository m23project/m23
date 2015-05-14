<?PHP

include_once("/m23/inc/distr/debian/clientConfig.php");

// gconftool-2 --load=/tmp/gconf.orig --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.defaults
// apt-get remove ubuntu-artwork
// baobab dconf-tools eog evince-common file-roller gcalctool gedit-common gnome-nettool gnome-power-manager gnome-screenshot gnome-sushi gnome-system-log gucharmap libatk-adaptor-schemas notify-osd seahorse simple-scan vino

define('UBUNTUDESKTOP_UNITY2D',11);
define('UBUNTUDESKTOP_UNITY3D',12);
define('UBUNTUDESKTOP_UNITYFULL',13);

define('UBUNTUDESKTOP_KDE',21);
define('UBUNTUDESKTOP_KDEFULL',22);
define('UBUNTUDESKTOP_KDENETBOOK',23);

define('UBUNTUDESKTOP_GNOME',31);
define('UBUNTUDESKTOP_GNOMECLASSIC',32);

define('UBUNTUDESKTOP_XFCEFULL',41);

define('UBUNTUDESKTOP_LXDEFULL',51);
define('UBUNTUDESKTOP_LXDECORE',52);

define('MINT13DESKTOP_CINNAMON',61);
define('MINT13DESKTOP_KDE',62);
define('MINT13DESKTOP_MATE',63);

define('UBUNTDM_LIGHTDM',1001);
define('UBUNTDM_MDM',1002);

// Ubuntu 14.04
define('UBUNTUDESKTOP_UNITY3D_1404',2012);
define('UBUNTUDESKTOP_UNITYFULL_1404',2013);
define('UBUNTUDESKTOP_LUBUNTU_1404',2051);
define('UBUNTUDESKTOP_LUBUNTUCORE_1404',2052);

// Linux Mint 17
define('MINT17DESKTOP_CINNAMON',2061);
define('MINT17DESKTOP_MATE',2063);
define('MINT17_XFCEFULL',2041);
define('MINT17_KDE',2062);

define('ELEMENTARYOS',3001);

/*
Mint 17

mint-artwork-cinnamon: !!! Predepends: libglib2.0-bin

wichtig: mintlocale linuxmint-keyring mint-meta-core mint-meta-codecs mintdesktop policykit-desktop-privileges

/etc/mdm/mdm.conf
[daemon]
Greeter=/usr/lib/mdm/mdmgreeter

[security]

[xdmcp]

[gui]

[greeter]
GraphicalTheme=Elegance

[chooser]

[debug]

[servers]




mint-meta-mate caja-extensions-common caja-gksu caja-open-terminal

compiz-core compiz-plugins-default





policykit-desktop-privileges

ubuntu-settings ubuntu-system-service


dpkg --get-selections | grep -v deinstall$ | tr -d '[:blank:]' | sed 's/install$//g' | sort | nc 192.168.1.77 12345
nc -l -p 12345 > pkg.m23-neu

*/





/**
**name CLCFG_showDistributionSpecificOptionsUbuntu($options)
**description Shows additional distribution specific options for Ubuntu.
**parameter options: options array
**returns Options array or false, if there was an error
**/
function CLCFG_showDistributionSpecificOptionsUbuntu($options)
{
	include_once("/m23/inc/distr/debian/packages.php");
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Add Debian's options
	$options = CLCFG_showDistributionSpecificOptions($options, 'ubuntu');

	$disableSudoRootLogin = HTML_storableCheckBox('CB_disableSudoRootLogin', '', 'disableSudoRootLogin', ($options['disableSudoRootLogin'] == 1));
	$options = CLIENT_getSetOption(($disableSudoRootLogin ? 1 : 0), 'disableSudoRootLogin', $options);

	echo("
	<tr>
		<td>$I18N_disableSudoRootLogin</td>
		<td colspan=\"2\">".CB_disableSudoRootLogin."</td>
	</tr>
	");

	return($options);
};
$CLCFG_showDistributionSpecificOptions='CLCFG_showDistributionSpecificOptionsUbuntu';





/**
**name UBUNTU_installLanguagePacks($lang)
**description Installs the language packs on Ubuntu.
**parameter lang: short language
**/
function UBUNTU_installLanguagePacks($lang)
{
	$lV=I18N_getLangVars($lang);

	echo('
dpkg --get-selections | grep k3b -c > /tmp/k3b.amount
');

	//Install language packs
	CLCFG_aptGet("install", "language-pack-$lV[packagelang] language-pack-$lV[packagelang]-base language-pack-en language-pack-en-base language-pack-gnome-$lV[packagelang] language-pack-gnome-$lV[packagelang]-base language-pack-gnome-en language-pack-gnome-en-base language-pack-kde-$lV[packagelang] language-pack-kde-$lV[packagelang]-base");

	echo('
if [ `cat /tmp/k3b.amount` -eq 0 ]
then
	apt-get -m -y --force-yes remove k3b
fi
');

}





/**
**name UBUNTU_desktopInstall($desktop, $globalMenu, $normalButtonPosition, $normalScrollBars, $addDesktopIcons, $removeUbuntuOne)
**description Installs the Unity desktop.
**parameter desktop: Desktop constant.
**parameter globalMenu: If set to true Unity's global menus are activated otherwise deactivated.
**parameter normalButtonPosition: If set to true the window buttons are shown on the top right instead of top left.
**parameter normalScrollBars: If set to true the normal scroll bars are usesed instead of the Unity bars.
**parameter addDesktopIcons: If set to true the home, network, volumes and trash icons are shown on the desktop.
**parameter removeUbuntuOne: If set to true Ubuntu One is removed.
**/
function UBUNTU_desktopInstall($desktop, $globalMenu, $normalButtonPosition, $normalScrollBars, $addDesktopIcons, $removeUbuntuOne, $removeMono = false)
{
	$lang = getClientLanguage();

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	
	$displayManager = UBUNTDM_LIGHTDM;

	//Default package(s) for Ubuntu
	$desktopPackages = 'ubuntu-artwork ';

	$linuxMint13BasePackages = 'linuxmint-keyring gstreamer0.10-alsa gstreamer0.10-plugins-base-apps gstreamer0.10-plugins-base-apps ubuntu-extras-keyring ubuntu-keyring mint-meta-core';
	
	$linuxMint17BasePackages = 'ubuntu-extras-keyring ubuntu-keyring mintlocale linuxmint-keyring mint-meta-core mint-meta-codecs mintdesktop libglib2.0-bin mint-mdm-themes';

	switch($desktop)
	{
		case UBUNTUDESKTOP_UNITY2D:				//OK
			$desktopPackages = "unity-2d unity-2d-places unity-2d-launcher indicator-application indicator-appmenu indicator-datetime indicator-messages indicator-session indicator-sound unity-lens-applications unity-lens-files unity-lens-music gnome-themes-standard unity-place-applications unity-place-files gnome-themes-ubuntu unity-greeter";
			$dialogHeader = $I18N_installing_unity2d;
			$session = 'ubuntu-2d';
		break;
		case UBUNTUDESKTOP_UNITY3D:				//OK
			$desktopPackages = "unity unity-greeter unity-lens-applications unity-lens-files unity-lens-music unity-lens-video unity-place-applications unity-place-files gnome-themes-standard gnome-themes-ubuntu indicator-application indicator-appmenu indicator-datetime indicator-messages indicator-power indicator-printers indicator-session indicator-sound gnome-settings-daemon compiz gnome-session";
			$dialogHeader = $I18N_installing_unity3d;
			$session = 'ubuntu';
		break;
		case UBUNTUDESKTOP_UNITY3D_1404:
			$desktopPackages = 'ubuntu-session indicator-application indicator-appmenu indicator-datetime indicator-messages indicator-session indicator-sound unity-lens-applications unity-lens-files unity-lens-music gnome-themes-standard gnome-themes-ubuntu unity-greeter branding-ubuntu ubuntu-ui-toolkit-theme ubuntu-artwork xcursor-themes ubuntu-settings overlay-scrollbar overlay-scrollbar-gtk2 overlay-scrollbar-gtk3 dmz-cursor-theme gvfs-bin gvfs-fuse indicator-printers nautilus-share notify-osd notify-osd-icons policykit-desktop-privileges qt-at-spi sni-qt software-properties-common software-properties-gtk unity-scope-chromiumbookmarks unity-scope-clementine unity-scope-devhelp unity-scope-firefoxbookmarks unity-scope-home unity-scope-manpages unity-scope-tomboy unity-scope-audacious unity-scope-calculator qtdeclarative5-accounts-plugin qtdeclarative5-dialogs-plugin qtdeclarative5-localstorage-plugin qtdeclarative5-privatewidgets-plugin qtdeclarative5-ubuntu-ui-extras-browser-plugin-assets qtdeclarative5-ubuntu-ui-toolkit-plugin qtdeclarative5-unity-action-plugin qtdeclarative5-window-plugin';
			$dialogHeader = $I18N_installing_unity3d;
			$session = 'ubuntu';
		break;
		case UBUNTUDESKTOP_UNITYFULL:
			$desktopPackages = "ubuntu-desktop";
			$dialogHeader = $I18N_installing_unityfull;
			$session = 'ubuntu';
		break;
		case UBUNTUDESKTOP_UNITYFULL_1404:
			$desktopPackages = "ubuntu-desktop";
			$dialogHeader = $I18N_installing_unityfull_1404;
			$session = 'ubuntu';
		break;
		case UBUNTUDESKTOP_GNOMECLASSIC:		//OK
			$desktopPackages = "gnome-panel ubuntu-artwork";
			$dialogHeader = $I18N_installing_gnomeclassic;
			$session = 'gnome-classic';
		break;
/*		case UBUNTUDESKTOP_GNOME_1404:
			$desktopPackages = "gnome-backgrounds gnome-contacts gnome-icon-theme-extras gnome-shell gnome-shell-common gnome-shell-extensions gnome-terminal gnome-terminal-data gnome-tweak-tool gnome-session xdg-user-dirs gdm gnome-core";
			$dialogHeader = $I18N_installing_gnomeclassic;
			$session = 'gnome';
		break;*/
		case ELEMENTARYOS:
			$desktopPackages = "elementary-artwork elementary-default-settings elementary-desktop elementary-dpms-helper elementary-icon-theme elementary-live-settings elementary-minimal elementary-os-overlay elementary-printer-test-page elementary-standard elementary-theme elementary-wallpapers fonts-capture-it-elementary fonts-daniel-elementary fonts-elementary-core fonts-elementary-extra fonts-hvd-bodedo-elementary fonts-jenna-sue-elementary fonts-khmer-mondulkiri-elementary fonts-limelight-elementary fonts-lobster-elementary fonts-open-sans-elementary fonts-open-sans-emoji-elementary fonts-operating-instructions-elementary fonts-plainblack-elementary fonts-raleway-elementary ";
			$dialogHeader = $I18N_installing_elementary_desktop;
			$session = 'pantheon';
		break;
		case UBUNTUDESKTOP_KDEFULL:
			$desktopPackages = "kubuntu-desktop lightdm-kde-greeter";
			$dialogHeader = $I18N_installing_kde;
			$session = 'plasma-desktop';
		break;
		case UBUNTUDESKTOP_KDE:
			$desktopPackages = "plasma-desktop lightdm-kde-greeter";
			$dialogHeader = $I18N_installing_kde;
			$session = 'plasma-desktop';
		break;
		case UBUNTUDESKTOP_KDENETBOOK:
			$desktopPackages = "plasma-netbook lightdm-kde-greeter";
			$dialogHeader = $I18N_installing_kde;
			$session = 'plasma-desktop';
		break;
		case UBUNTUDESKTOP_XFCEFULL:			//OK
			$desktopPackages = "xubuntu-desktop";
			$dialogHeader = $I18N_installingXubuntuDesktop;
			$session = 'xubuntu';
		break;
		case MINT17_XFCEFULL:			//OK
			// Fix missing predepends of mint-artwork-xfce to libglib2.0-bin
			CLCFG_aptGet('install', 'libglib2.0-bin');
			$desktopPackages = "mint-artwork-common mint-backgrounds-xfce mint-artwork-xfce mint-meta-xfce mint-info-xfce mint-themes xfce-keyboard-shortcuts xfce4-appfinder xfce4-datetime-plugin xfce4-dict xfce4-indicator-plugin xfce4-notifyd xfce4-panel xfce4-places-plugin xfce4-power-manager xfce4-power-manager-data xfce4-power-manager-plugins xfce4-screenshooter xfce4-session xfce4-settings xfce4-taskmanager xfce4-terminal xfce4-volumed xfce4-weather-plugin xfce4-whiskermenu-plugin xfce4-xkb-plugin mint-meta-codecs mint-meta-core";
			$dialogHeader = $I18N_installing_xfce;
			$session = 'xfce';
			$displayManager = UBUNTDM_MDM;
		break;
		case MINT17_KDE:			//OK
			// Fix missing predepends of mint-artwork-kde to libglib2.0-bin
			CLCFG_aptGet('install', 'libglib2.0-bin');
			$desktopPackages = "mint-artwork-kde mint-artwork-kde-icons mint-configuration-kde mint-info-kde mint-mdm-themes-kde mint-meta-codecs-kde mint-meta-kde mint-meta-codecs mint-meta-core kde-workspace kde-telepathy konqueror konq-plugins dolphin konsole plasma-widgets-addons";
			$dialogHeader = $I18N_installing_kde;
			$session = 'kde-plasma';
			$displayManager = UBUNTDM_MDM;
		break;
		case UBUNTUDESKTOP_LXDEFULL:
			$desktopPackages = "lubuntu-desktop";
			$dialogHeader = $I18N_installingLXDE;
			$session = 'Lubuntu';
		break;
		case UBUNTUDESKTOP_LXDECORE:
			$desktopPackages = "lubuntu-core";
			$dialogHeader = $I18N_installingLXDE;
			$session = 'Lubuntu';
		break;
		case UBUNTUDESKTOP_LUBUNTUCORE_1404:
			$desktopPackages = "lubuntu-default-session lubuntu-core lxde-common lubuntu-icon-theme lubuntu-artwork-14-04 lubuntu-default-settings";
			$dialogHeader = $I18N_installingLXDELubuntuCore;
			$session = 'Lubuntu';
		break;
		case UBUNTUDESKTOP_LUBUNTU_1404:
			$desktopPackages = "lubuntu-desktop";
			$dialogHeader = $I18N_installingLXDELubuntu;
			$session = 'Lubuntu';
		break;
		case UBUNTUDESKTOP_CONSOLE:
			$desktopPackages = "ubuntu-minimal ";
		break;
		case MINT13DESKTOP_CINNAMON:
			$desktopPackages = 'mint-artwork-cinnamon mint-info-cinnamon mint-meta-cinnamon cinnamon cinnamon-themes '.$linuxMint13BasePackages;
			$displayManager = UBUNTDM_MDM;
			$dialogHeader = $I18N_installingCinnamon;
			$session = 'cinnamon.desktop';
		break;
		case MINT17DESKTOP_CINNAMON:
			// Fix missing predepends of mint-artwork-cinnamon to libglib2.0-bin
			CLCFG_aptGet('install', 'libglib2.0-bin');
			$desktopPackages = 'mint-artwork-cinnamon mint-info-cinnamon mint-meta-cinnamon cinnamon cinnamon-themes '.$linuxMint17BasePackages;
			$displayManager = UBUNTDM_MDM;
			$dialogHeader = $I18N_installingCinnamon;
			$session = 'cinnamon.desktop';
		break;
		case MINT13DESKTOP_MATE:
			$desktopPackages = 'mate-applets mate-applets-common mate-bluetooth mate-calc mate-common mate-conf mate-conf-common mate-conf-editor mate-control-center mate-corba mate-desktop mate-desktop-common mate-dialogs mate-doc-utils mate-icon-theme mate-keyring mate-media mate-media-common mate-media-pulse mate-menus mate-mime-data mate-netspeed mate-notification-daemon mate-panel mate-panel-common mate-polkit mate-power-manager mate-power-manager-common mate-screensaver mate-sensors-applet mate-session-manager mate-settings-daemon mate-settings-daemon-common mate-settings-daemon-pulse mate-system-monitor mate-system-tools mate-terminal mate-terminal-common mate-text-editor mate-utils mate-vfs mate-vfs-common mate-window-manager mint-artwork-mate mint-info-mate mintmenu mint-artwork-common mint-artwork-gnome mint-artwork-mate mint-backgrounds-maya mint-backgrounds-maya-extra mint-common'.$linuxMint13BasePackages;
			$displayManager = UBUNTDM_MDM;
			$dialogHeader = $I18N_installingMate;
			$session = 'mate.desktop';
		break;
		case MINT17DESKTOP_MATE:
			$desktopPackages = 'mate-applets mate-applets-common mate-bluetooth mate-calc mate-common mate-conf mate-conf-common mate-conf-editor mate-control-center mate-corba mate-desktop mate-desktop-common mate-dialogs mate-doc-utils mate-icon-theme mate-keyring mate-media mate-media-common mate-media-pulse mate-menus mate-mime-data mate-netspeed mate-notification-daemon mate-panel mate-panel-common mate-polkit mate-power-manager mate-power-manager-common mate-screensaver mate-sensors-applet mate-session-manager mate-settings-daemon mate-settings-daemon-common mate-settings-daemon-pulse mate-system-monitor mate-system-tools mate-terminal mate-terminal-common mate-text-editor mate-utils mate-vfs mate-vfs-common mate-window-manager mint-artwork-mate mint-info-mate mintmenu mint-artwork-common mint-artwork-gnome mint-artwork-mate mint-backgrounds-qiana mint-common mint-meta-mate caja-extensions-common caja-gksu caja-open-terminal metacity metacity-common'.$linuxMint17BasePackages;
			$displayManager = UBUNTDM_MDM;
			$dialogHeader = $I18N_installingMate;
			$session = 'mate.desktop';
		break;
	}

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $dialogHeader);

	CLCFG_setDebConfDirect('
cupsys-bsd cupsys-bsd/setuplpd boolean false
cups-bsd cups-bsd/setuplpd boolean false
sane-utils sane-utils/saned_run boolean false
checkbox checkbox/plugins/apport_prompt/default_package string
checkbox checkbox/plugins/launchpad_exchange/transport_url string https://launchpad.net/+hwdb/+submit
checkbox checkbox/plugins/proxy_info/https_proxy string
checkbox checkbox/plugins/proxy_info/http_proxy string
checkbox checkbox/plugins/apport_prompt/default_enabled boolean false
checkbox checkbox/plugins/launchpad_prompt/email string
checkbox checkbox/plugins/jobs_info/blacklist string
checkbox checkbox/plugins/jobs_info/whitelist string
gpsd gpsd/autodetection boolean true
gpsd gpsd/daemon_options string
gpsd gpsd/device string
gpsd gpsd/socket string /var/run/gpsd.sock
gpsd gpsd/start_daemon boolean false
wvdial wvdial/login string
wvdial wvdial/passphrase2 password
wvdial wvdial/passphrase password
wvdial wvdial/passphrases_mismatch error
wvdial wvdial/phone string
wvdial wvdial/wvdialconf boolean true
dictionaries-common dictionaries-common/default-wordlist select english (Webster\'s Second International English wordlist)
dictionaries-common dictionaries-common/old_wordlist_link boolean true
dictionaries-common dictionaries-common/selecting_ispell_wordlist_default note
libvirtodbc0 libvirtodbc0/register-odbc-driver boolean false
samba-common samba-common/dhcp boolean false
samba-common samba-common/do_debconf boolean true
samba-common samba-common/encrypt_passwords boolean true
samba-common samba-common/workgroup string WORKGROUP
samba samba/generate_smbpasswd boolean true
samba samba/run_mode select daemons
libvirtodbc0 libvirtodbc0/register-odbc-driver boolean true');

	// Install and configure the display manager
	switch($displayManager)
	{
		case UBUNTDM_LIGHTDM:
			CLCFG_installLightDM($session);
		break;

		case UBUNTDM_MDM:
			CLCFG_installMintDM($session);
		break;
	}
	/* =====> */ MSR_statusBarIncCommand(25);


	// Install the chosen desktop
	CLCFG_aptGet("install", "$desktopPackages acpi-support");
	/* =====> */ MSR_statusBarIncCommand(50);

	// Set Ubuntu's scrollbars back to normal
	if ($normalScrollBars)
	{
		CLCFG_aptGet("remove","overlay-scrollbar");

		echo('
			echo "export LIBOVERLAY_SCROLLBAR=0" > /etc/X11/Xsession.d/80-disableoverlayscrollbars
		');
	}

	// Add icons to the Unity desktop (or not)
	if ($addDesktopIcons)
	{
		foreach (array('home_icon_visible', 'network_icon_visible', 'volumes_visible', 'trash_icon_visible') as $icon)
		{
			echo("\ngconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.defaults --type bool --set /apps/nautilus/desktop/$icon true\n");
		}
	}

	UBUNTU_installLanguagePacks($lang);
	/* =====> */ MSR_statusBarIncCommand(15);

	//(De)Activates the global menus
	CLCFG_aptGet($globalMenu ? "install" : "remove","appmenu-gtk appmenu-gtk3 appmenu-qt firefox-globalmenu thunderbird-globalmenu");

	// Sort the window buttons in normal order?
	if ($normalButtonPosition)
		echo('
			gconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.defaults/ --type string --set /apps/metacity/general/button_layout "menu:minimize,maximize,close"
		');
	else
		echo('
			gconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.defaults/ --type string --set /apps/metacity/general/button_layout "maximize,minimize,close:"
		');

	//Remove Ubuntu One?
	if ($removeUbuntuOne)
	{
		CLCFG_aptGet("remove","ubuntuone-client ubuntuone-installer rhythmbox-ubuntuone python-ubuntuone-storageprotocol python-ubuntuone-client");
	}

	// Remove mono?
	if ($removeMono)
	{
	/* =====> */ MSR_statusBarIncCommand(5);
		CLCFG_monoRemove();
	/* =====> */ MSR_statusBarIncCommand(5);
	}
	else
	/* =====> */ MSR_statusBarIncCommand(10);

	echo("\ndpkg-reconfigure m23-skel\n");
}





/**
**name UBUNTU_fixBeforeBaseInstall($release)
**description Corrects the settings for Ubuntu before the base packages are installed.
**parameter release: Name of the Ubuntu release.
**/
function UBUNTU_fixBeforeBaseInstall($clientOptions)
{
	switch ($clientOptions['release'])
	{
		case 'precise':
		echo('
		echo \'APT::Immediate-Configure "false";\' > /etc/apt/apt.conf.d/80Immediate-Configure
		
		if [ $(grep check_certificate /etc/wgetrc -c) -eq 0 ]
		then
			echo \'check_certificate = off\' >> /etc/wgetrc
		fi

		mkdir -p /boot/grub
		touch /boot/grub/menu.lst

		#mv /etc/kernel/postinst.d/zz-update-grub /tmp/zz-update-grub

		');
		break;

		case 'trusty':
			CLCFG_aptGet("install", $clientOptions['bootloader']);

			echo('
			cp /usr/sbin/update-grub /usr/sbin/update-grub.real
			dpkg-divert --local --rename --add /usr/sbin/update-grub
			ln -s /bin/true /usr/sbin/update-grub

			cp /etc/init.d/udev /etc/init.d/udev.real
			dpkg-divert --local --rename --add /etc/init.d/udev
			ln -s /bin/true /etc/init.d/udev

			touch /etc/init.d/systemd-logind
			chmod +x /etc/init.d/systemd-logind

			touch /etc/init.d/modemmanager
			chmod +x /etc/init.d/modemmanager

			touch /etc/init.d/whoopsie
			chmod +x /etc/init.d/whoopsie
			');
		break;
	}
}





/**
**name UBUNTU_fixAfterBaseInstall($release)
**description Corrects the settings for Ubuntu after the base packages are installed.
**parameter release: Name of the Ubuntu release.
**/
function UBUNTU_fixAfterBaseInstall($release)
{
	switch ($release)
	{
		case 'precise':
			CLCFG_aptGet("install","policykit-1 upower acpi-support iputils-ping ubuntu-extras-keyring ubuntu-sounds");
		break;

		case 'trusty':
			echo('
			rm /usr/sbin/update-grub
			dpkg-divert --local --rename --remove /usr/sbin/update-grub
			mv /usr/sbin/update-grub.real /usr/sbin/update-grub

			dpkg-divert --local --rename --remove /etc/init.d/udev
			mv /etc/init.d/udev.real /etc/init.d/udev
			');
			CLCFG_aptGet("install","policykit-1 upower acpi-support iputils-ping ubuntu-extras-keyring ubuntu-sounds");
		break;
	}
}





/**
**name CLCFG_listUbuntuReleases($selName,$first)
**description generates a selection of the different Ubuntu releases (breezy, hoary, warty)
**parameter selName: the name of the selection
**parameter first: the release to show first
**/
function CLCFG_listUbuntuReleases($selName,$first)
{
	return(CLCFG_listDebianReleasesGeneric($selName,$first,"ubuntu"));
}

$CLCFG_listReleases=CLCFG_listUbuntuReleases;





/**
**name CLCFG_updateDebootstrapScriptsUbuntu()
**description Updates the debootstrap scripts for Ubuntu and returns the www path to the files
**/
function CLCFG_updateDebootstrapScriptsUbuntu()
{
	return(CLCFG_updateDebootstrapScripts("ubuntu"));
}





/**
**name CLIENT_enableLDAP($clientOptions)
**description enables LDAP login for a client.
**parameter clientOptions: the client's options array
**/
function CLCFG_enableLDAPUbuntu($clientOptions)
{
	//exit the function if LDAP shouldn't used
	if ($clientOptions['ldaptype']=="none")
		return;

	$server=LDAP_loadServer($clientOptions['ldapserver']);

	$LDAPhost = $server['host'];
	$baseDN = $server['base'];

	//exit the function if LDAP host or base DN is empty
	if (empty($LDAPhost) || empty($baseDN))
		return;
		
	if ('trusty' == $clientOptions['release'])
	{
		CLCFG_setDebConfDirect("ldap-auth-config ldap-auth-config/binddn string cn=proxyuser,dc=example,dc=net
ldap-auth-config ldap-auth-config/bindpw password
ldap-auth-config ldap-auth-config/dblogin boolean false
ldap-auth-config ldap-auth-config/dbrootlogin boolean false
ldap-auth-config ldap-auth-config/ldapns/base-dn string $baseDN
ldap-auth-config ldap-auth-config/ldapns/ldap-server string ldap://$LDAPhost
ldap-auth-config ldap-auth-config/ldapns/ldap_version select 3
ldap-auth-config ldap-auth-config/move-to-debconf boolean true
ldap-auth-config ldap-auth-config/override boolean true
ldap-auth-config ldap-auth-config/pam_password select md5
ldap-auth-config ldap-auth-config/rootbinddn string
ldap-auth-config ldap-auth-config/rootbindpw password
libpam-runtime libpam-runtime/profiles multiselect unix, ldap, systemd, capability");
	}
	else
	{
		// Thanks to the howto from: http://tuxnetworks.blogspot.com/2010/04/ldap-client-lucid-lynx.html
		CLCFG_setDebConfDirect("ldap-auth-config ldap-auth-config/binddn string cn=proxyuser,dc=example,dc=net
ldap-auth-config ldap-auth-config/bindpw password
ldap-auth-config ldap-auth-config/dblogin boolean false
ldap-auth-config ldap-auth-config/dbrootlogin boolean false
ldap-auth-config ldap-auth-config/ldapns/base-dn string $baseDN
ldap-auth-config ldap-auth-config/ldapns/ldap-server string ldap://$LDAPhost/
ldap-auth-config ldap-auth-config/ldapns/ldap_version select 3
ldap-auth-config ldap-auth-config/move-to-debconf boolean true
ldap-auth-config ldap-auth-config/override boolean true
ldap-auth-config ldap-auth-config/pam_password select md5
ldap-auth-config ldap-auth-config/rootbinddn string cn=manager,dc=example,dc=net
ldap-auth-config ldap-auth-config/rootbindpw password
libnss-ldap libnss-ldap/binddn string cn=proxyuser,$baseDN
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
libpam-runtime libpam-runtime/profiles multiselect unix, ldap, gnome-keyring, consolekit");
	}

/*
	echo \"base $baseDN
ldap_version 3
pam_password md5
uri ldap://$LDAPhost/
bind_policy soft\" > /etc//etc/ldap.conf
*/

echo("
	export DEBIAN_FRONTEND=noninteractive

	apt-get -m --force-yes -qq -y install libnss-ldap libpam-ldap nscd nss-updatedb libnss-db ldap-utils


echo \"BASE    $baseDN
URI     ldap://$LDAPhost

SIZELIMIT       0
TIMELIMIT       0
DEREF           never
SASL_MECH       none
TLS_CACERT      /etc/ssl/certs/ca-certificates.crt\" > /etc/ldap/ldap.conf
");


if ('trusty' == $clientOptions['release'])
	echo("echo \"account sufficient		pam_ldap.so
account sufficient		pam_unix.so
account [success=2 new_authtok_reqd=done default=ignore]	pam_unix.so
account [success=1 default=ignore]		pam_ldap.so
account required						pam_permit.so
session required						pam_mkhomedir.so umask=0022 skel=/etc/skel/ silent\" > /etc/pam.d/common-account
");
else
	echo("
echo \"account sufficient pam_ldap.so
account required pam_unix.so
session required pam_mkhomedir.so umask=0022 skel=/etc/skel/ silent\" > /etc/pam.d/common-account
");

// Add the local groups to the LDAP user
echo('
echo "*; *; *; Al0000-2400;'.DISTR_getUbuntuUserGroups(',').'" >> /etc/security/group.conf
echo "auth required pam_group.so use_first_pass" >> /etc/pam.d/common-auth
');




	CLCFG_patchNsswitchForLDAP();

	echo("
	/usr/sbin/nss_updatedb ldap
	/usr/sbin/nssldap-update-ignoreusers
	");
}
?>