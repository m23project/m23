<?PHP
/*
Description: Unity desktop
Priority:20
*/

// Gnome classic: gnome-panel

//saned, cups-bsd, checkbox

/**
**name UBUNTU_installLanguagePacks($lang)
**description Installs the language packs on Ubuntu.
**parameter lang: short language
**/
function UBUNTU_installLanguagePacks($lang)
{
	$lV=I18N_getLangVars($lang);

	//Install language packs
	CLCFG_aptGet("install", "language-pack-$lV[packagelang] language-pack-$lV[packagelang]-base language-pack-en language-pack-en-base language-pack-gnome-$lV[packagelang] language-pack-gnome-$lV[packagelang]-base language-pack-gnome-en language-pack-gnome-en-base language-pack-kde-$lV[packagelang] language-pack-kde-$lV[packagelang]-base");
}





/**
**name UNITY_install($lang, $unity2d, $globalMenu, $normalButtonPosition, $normalScrollBars, $addDesktopIcons, $removeUbuntuOne)
**description Installs the Unity desktop.
**parameter lang: short language
**parameter unity2d: If set to true Unity 2D is installed instead of Unity 3D
**parameter globalMenu: If set to true Unity's global menus are activated otherwise deactivated.
**parameter normalButtonPosition: If set to true the window buttons are shown on the top right instead of top left.
**parameter normalScrollBars: If set to true the normal scroll bars are usesed instead of the Unity bars.
**parameter addDesktopIcons: If set to true the home, network, volumes and trash icons are shown on the desktop.
**parameter removeUbuntuOne: If set to true Ubuntu One is removed.
**/
function UNITY_install($lang, $unity2d, $globalMenu, $normalButtonPosition, $normalScrollBars, $addDesktopIcons, $removeUbuntuOne)
{
	if ($unity2d)
		$unityPackages = "unity-2d unity-2d-places unity-2d-launcher indicator-application indicator-appmenu indicator-datetime indicator-messages indicator-session indicator-sound unity-lens-applications unity-lens-files unity-lens-music gnome-themes-standard unity-place-applications unity-place-files gnome-themes-ubuntu unity-greeter";
	else
		$unityPackages = "unity unity-greeter unity-lens-applications unity-lens-files unity-lens-music unity-lens-video unity-place-applications unity-place-files gnome-themes-standard gnome-themes-ubuntu indicator-application indicator-appmenu indicator-datetime indicator-messages indicator-power indicator-printers indicator-session indicator-sound gnome-settings-daemon";

	echo("
#write debconf data
cat >> /tmp/debconfUnity << \"EOF\"
kdm shared/default-x-display-manager select lightdm
lightdm shared/default-x-display-manager select lightdm
xdm shared/default-x-display-manager select lightdm
gdm shared/default-x-display-manager select lightdm
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
EOF

	debconf-set-selections /tmp/debconfUnity
	");

	CLCFG_aptGet("install", "$unityPackages lightdm ubuntu-artwork acpi-support");
	
	//Regenerate all icon caches
// 	echo("\nfind /usr/share/icons/ | grep index.theme | xargs -n1 dirname | xargs -n1 gtk-update-icon-cache --force\n");
	

	if ($normalScrollBars)
	{
		CLCFG_aptGet("remove","overlay-scrollbar");

		echo('
			echo "export LIBOVERLAY_SCROLLBAR=0" > /etc/X11/Xsession.d/80-disableoverlayscrollbars
		');
	}

	if ($addDesktopIcons)
	{
		foreach (array('home_icon_visible', 'network_icon_visible', 'volumes_visible', 'trash_icon_visible') as $icon)
		{
			echo("\ngconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.defaults --type bool --set /apps/nautilus/desktop/$icon true\n");
		}
	}

	UBUNTU_installLanguagePacks($lang);

	//(De)Activates the global menus
	CLCFG_aptGet($globalMenu ? "install" : "remove","appmenu-gtk appmenu-gtk3 appmenu-qt firefox-globalmenu thunderbird-globalmenu");

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
}





function run($id)
{
	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	
	$lang = getClientLanguage();

// 	GNOME_prepare();
	/* =====> */ MSR_statusBarIncCommand(25);

	UNITY_install($lang, false, false, true, true, true, true);
	
// 	UNITY_install($lang, true, false, true, true, true, true); 2D
	
	/* =====> */ MSR_statusBarIncCommand(50);

// 	GNOME_installLoginManager($lang);
	/* =====> */ MSR_statusBarIncCommand(25);

	MSR_logCommand("/tmp/m23sourceupdate.log");

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

	executeNextWork();
}
?>