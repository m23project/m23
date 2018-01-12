<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Common management funtions shared by Linux distributions.
$*/





/**
**name CLCFG_addPAMtoDM($dmFile)
**description Adds PAM modules (if present) to the pam.d configuration files.
**parameter dmFile: Name of the login manager pam.d config file.
**/
function CLCFG_addPAMtoDM($dmFile)
{
	echo('
	for lib in pam_loginuid.so pam_systemd.so
	do
		if [ $(find /lib | grep -c $lib) -gt 0 ]
		then
			echo "session required $lib" >> /etc/pam.d/'.$dmFile.'
		fi
	done
	');
}





/**
**name CLCFG_disableSudoRootLogin()
**description Disables getting root rights of normal users via sudo.
**/
function CLCFG_disableSudoRootLogin()
{
echo("
cat >> /etc/sudoers.d/noSudoRootLogin << \"EOF\"
Defaults	targetpw,timestamp_timeout = 0
EOF
chmod 0440 /etc/sudoers.d/noSudoRootLogin
");
}





/**
**name CLCFG_installFirmware()
**description Installs available firmware packages.
**/
function CLCFG_installFirmware()
{
	CLCFG_setDebConfDirect('firmware-ipw2x00 firmware-ipw2x00/license/error error
firmware-ipw2x00 firmware-ipw2x00/license/accepted boolean true
firmware-ivtv firmware-ivtv/license/error error
firmware-ivtv firmware-ivtv/license/accepted boolean true');

	echo('apt-cache search firmware | sort | grep firmware | cut -d\' \' -f1 | grep firmware | grep -v installer$ | grep -v nexus7 | grep -v grub | grep -v tools$ | grep -v dev$ | grep -v libertas-firmware | grep -v bladerf | xargs -n1 apt-get -y -m --force-yes install');
}





/**
**name CLCFG_monoRemove()
**description Removes mono packages and installs gnote when tomboy was installed before.
**/
function CLCFG_monoRemove()
{
	echo('
	tomboyCounter=$(dpkg --get-selections | grep tomboy -c)
	');

	CLCFG_aptGet('remove', 'libmono*');

	echo('
	if [ $tomboyCounter -gt 0 ]
	then
	');
		CLCFG_aptGet('install', 'gnote');
	echo('
	fi
	');
}





/**
**name CLCFG_setDebConfDM($dm)
**description Sets the display manager in debconf.
**parameter dm: Name of the display manager (kdm, lightdm, mdm, ...).
**/
function CLCFG_setDebConfDM($dm)
{
	CLCFG_setDebConfDirect("tdm-trinity shared/default-x-display-manager select $dm
kdm shared/default-x-display-manager select $dm
lightdm shared/default-x-display-manager select $dm
xdm shared/default-x-display-manager select $dm
gdm shared/default-x-display-manager select $dm
gdm3 shared/default-x-display-manager select $dm
mdm shared/default-x-display-manager select $dm");
}





/**
**name CLCFG_installXDM()
**description Installs the XDM display manager.
**/
function CLCFG_installXDM()
{
	CLCFG_setDebConfDM('xdm');
	CLCFG_aptGet('install', 'xdm');
}





/**
**name CLCFG_installSDDM()
**description Installs the SDDM display manager.
**/
function CLCFG_installSDDM()
{
	CLCFG_setDebConfDM('sddm');
	CLCFG_aptGet('install', 'sddm');

	/*
		Write a script that will be executed only once and invokes two starts of SDDM
		At the first start of SDDM, the user icon will be missing. On the next runs, the icon is visible.
	*/
	echo('
mv /usr/bin/sddm /usr/bin/sddm.orig

echo "#!/bin/bash
/usr/bin/sddm.orig &
PID=\$!
sleep 15
kill \$PID
wait
mv /usr/bin/sddm.orig /usr/bin/sddm
service sddm restart
" > /usr/bin/sddm

chmod +x /usr/bin/sddm
');
}





/**
**name CLCFG_installMintDM()
**description Installs the Linux Mint DM display manager.
**/
function CLCFG_installMintDM($session)
{
	CLCFG_setDebConfDM('mdm');

	CLCFG_aptGet('install', 'mdm mint-mdm-themes');
	
	switch($session)
	{
		case 'cinnamon.desktop':
			$dmrcSession = 'cinnamon';
			break;
		case 'mate.desktop':
			$dmrcSession = 'mate';
			break;
	}

	echo("

if [ $(grep qiana /etc/apt/sources.list -c) -gt 0 ]
then
echo '
[daemon]
DefaultSession=$session
Greeter=/usr/lib/mdm/mdmgreeter
[security]
[xdmcp]
[gui]
[greeter]
GraphicalTheme=Elegance
[chooser]
[debug]
[servers]' > /etc/mdm/mdm.conf
else
echo '
[daemon]
DefaultSession=$session
[security]
[xdmcp]
[gui]
[greeter]
IncludeAll=false
[chooser]
[debug]
[servers]' > /etc/mdm/mdm.conf
fi

sed -i \"s/Session=.*/Session=$dmrcSession/\" /etc/skel/.dmrc\n");

	CLCFG_addPAMtoDM('mdm');

	// Disable CPU intensive fading, background changing only every 5 minutes
	echo(
		EDIT_setOption('/usr/share/mdm/html-themes/Mint-X/slideshow.conf', 'interval_seconds', '300')."\n".
		EDIT_setOption('/usr/share/mdm/html-themes/Mint-X/slideshow.conf', 'fade_seconds', '0')."\n"
	);
}





/**
**name CLCFG_copyMBRToAllDevices($bootDevice)
**description Copies the MBR code from the boot device to all other devices.
**parameter bootDevice: Device name of the device with the original MBR (e.g. /dev/sda).
**/
function CLCFG_copyMBRToAllDevices($bootDevice)
{
	echo("
		#Copy grub boot code and MBR signature to files
		dd if=$bootDevice of=/tmp/mbr.code bs=444 count=1
		dd if=$bootDevice of=/tmp/mbr.sign skip=509 bs=1 count=2
		
		echo No | parted -m -l 2> /dev/null | grep \"dev\" | sed 's#Error: ##g' | sed -e '/Read-only file system/b1;b;:1 N;d' | cut -d':' -f1 | sed 's#[^a-z0-9A-Z/]##g' > /tmp/getDrives.list
		dmesg | grep '\* md[0-9].* configuration \*' | sed 's#[^md0-9]##g' | awk '{print(\"/dev/\"$0)}' >> /tmp/getDrives.list
		for allDev in $(sort -u /tmp/getDrives.list | grep dev)
		do
			dd of=\$allDev if=/tmp/mbr.code bs=444 count=1
			dd of=\$allDev if=/tmp/mbr.sign seek=509 bs=1 count=2
		done
	");
}





/**
**name CLCFG_activateBOOT_DEGRADED()
**description Activates BOOT_DEGRADED on Ubuntu 12.04 to allow booting from degraded RAIDs.
**/
function CLCFG_activateBOOT_DEGRADED()
{
echo('
	if [ `grep -i "Ubuntu 12.04" /etc/issue -c` -gt 0 ]
	then
		echo "BOOT_DEGRADED=true" >>  /etc/initramfs-tools/conf.d/mdadm
		update-initramfs -u
	fi
');
}





/**
**name CLCFG_installLightDM($session, $addSessionWrapper = false)
**description Installs the light DM display manager.
**parameter session: Name of the session to select by default.
**parameter addSessionWrapper: Set to true, if an additional line with "session-wrapper=/etc/X11/Xsession" should be added.
**/
function CLCFG_installLightDM($session, $addSessionWrapper = false)
{
	CLCFG_setDebConfDM('lightdm');
	$addLines = '';

	$greeters['ubuntu'] = 'unity-greeter';
	$greeters['ubuntu-2d'] = 'unity-greeter';

	$greeters['gnome-classic'] = 'lightdm-gtk-greeter';
	$greeters['gnome'] = 'lightdm-gtk-greeter';
	$greeters['gnome-fallback'] = 'lightdm-gtk-greeter';

	$greeters['gnome-shell'] = 'lightdm-gtk-greeter';

	$greeters['Lubuntu'] = 'lightdm-gtk-greeter';
	$greeters['Lubuntu-Netbook'] = 'lightdm-gtk-greeter';

	$greeters['xfce'] = 'lightdm-gtk-greeter';
	$greeters['xubuntu'] = 'lightdm-gtk-greeter';
	$greeters['ubuntustudio'] = 'lightdm-gtk-greeter';

	$greeters['kde-plasma'] = 'lightdm-kde-greeter';
	$greeters['plasma-desktop'] = 'lightdm-kde-greeter';

	$greeters['LXDE'] = 'lightdm-greeter';

	$greeters['pantheon'] = 'pantheon-greeter';

	$greeters['mate'] = 'lightdm-gtk-greeter';

	if ($addSessionWrapper)
		$addLines .= "\nsession-wrapper=/etc/X11/Xsession";

	CLCFG_aptGet("install", "lightdm");
	CLCFG_aptGet("install", $greeters[$session]);

echo("echo \"[SeatDefaults]
allow-guest=false
user-session=$session
greeter-session=".$greeters[$session]."$addLines\" > /etc/lightdm/lightdm.conf
");

	CLCFG_addPAMtoDM('lightdm');
}





/**
**name CLCFG_setDebConfDirect($debconf)
**description Sets debconf settings.
**parameter debconf: Debconf settings to add.
**/
function CLCFG_setDebConfDirect($debconf)
{
	$tempFile = uniqid('/tmp/');

echo("
cat >> $tempFile << \"EOF\"
$debconf
EOF
	debconf-set-selections $tempFile
	rm $tempFile
");
}





/**
**name TRINITY_installLoginManager($lang)
**description Installs the Trinity login manager KDM.
**parameter lang: short language
**/
function TRINITY_installLoginManager($lang)
{
	KDE_installLoginManager($lang, 3, true);

	echo('
		if [ -f /etc/init.d/tdm-trinity ]
		then
			update-rc.d tdm-trinity defaults
		fi
	');
}





/**
**name TRINITY_install($lang)
**description Installs a minimalistic Trinity desktop.
**parameter lang: short language
**/
function TRINITY_install($lang, $critical = true, $extraPackages = "")
{
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	$lV = I18N_getLangVars($lang);

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_trinity);

	$logFile="/tmp/m23Trinity.log";


	//DebConf setting
	CLCFG_aptGet("install","debconf-utils");
	echo("
		rm /tmp/debconfTrinity 2> /dev/null

#write debconf data
cat >> /tmp/debconfTrinity << \"EOF\"
kdm-trinity kdm-trinity/stop_running_server_with_children boolean false
kdm-trinity shared/default-x-display-manager select kdm-trinity
kdm-trinity kdm-trinity/daemon_name string /opt/trinity/bin/kdm
xdm shared/default-x-display-manager select kdm-trinity
gdm shared/default-x-display-manager select kdm-trinity
EOF

		debconf-set-selections /tmp/debconfTrinity
	");



	//Import the GPG key for the packages.
	echo("
		wget -T1 -t1 -q http://m23.sourceforge.net/trinity.asc -O - | apt-key add -
	");



	//Install Trinity
	CLCFG_aptGet("install","$extraPackages kdm-trinity kdebase-trinity kdelibs4c2a-trinity desktop-base-trinity kde-i18n-$lV[packagelang]-trinity kdepasswd-trinity kmix-trinity kate-trinity gtk-qt-engine-trinity language-pack-gnome-$lV[packagelang]");

	//Adjust the pathes from kde to trinity
	echo('
	find /home/ -maxdepth 1 -mindepth 1 | while read dir
	do
		cd "$dir"
		mv .kde .trinity
	done

	mv /etc/skel/.kde /etc/skel/.trinity

	ln -s /opt/trinity/bin/startkde /bin/starttrinity
	');



	//Check the installation
echo("
if [ -f /opt/trinity/bin/kdm ] || [ -f /opt/trinity/bin/tdm ]
then
	".sendClientLogStatus("Trinity installed",true,$critical)."
else
	");
	MSR_logCommand("/tmp/m23sourceupdate.log");
	MSR_logCommand($logFile);
	echo("
	".sendClientLogStatus("Trinity installed",false,$critical)."
fi

");

}





/**
**name CLCFG_makeDev()
**description Creates the device nodes in /dev by downloading and extracting an archive containing the device nodes and if this fails running MAKEDEV.
**/
function CLCFG_makeDev()
{
	$serverIP = getServerIP();
	return("
	cDir=`pwd`
	wget -q http://$serverIP/packages/baseSys/makedev.tar.gz -O /dev/makedev.tar.gz
	cd /dev

	mount /proc 2> /dev/null

	#Extract the archive with the device nodes
	tar xzf makedev.tar.gz
	ret=\$?

	#Check if the extraction worked and try to run MAKEDEV
	if [ \$ret -ne 0 ]
	then
		MAKEDEV generic
		ret=\$?
	fi

	#Check if the creation worked and try another call if not
	if [ \$ret -ne 0 ]
	then
		./MAKEDEV generic 2> /dev/null
	fi

	mknod vda b 254 0
	for i in `seq 1 9`
	do
		mknod vda\$i b 254 \$i
	done

	cd \$cDir
	");
}





/**
**name CLCFG_disablePlymouth()
**description Disables the plymouth.
**/
function CLCFG_disablePlymouth()
{
	foreach (array('/bin/plymouth', '/bin/plymouth-upstart-bridge', '/sbin/plymouthd') as $file)
	echo("
		dpkg-divert --local --rename --add $file
		ln -s /bin/true $file
	");
	
// 	echo("
// 	sed -i 's/splash//' /etc/default/grub
// 	update-grub
// 	");
// 	
// 	
// 	echo('
// 	rm /etc/default/grub
// 	cat >> /etc/default/grub << "EOF"
// 	GRUB_DEFAULT=0
// GRUB_HIDDEN_TIMEOUT=0
// GRUB_HIDDEN_TIMEOUT_QUIET=true
// GRUB_TIMEOUT=10
// GRUB_DISTRIBUTOR=`lsb_release -i -s 2> /dev/null || echo Debian`
// GRUB_CMDLINE_LINUX_DEFAULT=""
// GRUB_CMDLINE_LINUX=""
// EOF
// 	update-grub
// 	');
	
	/* rm /etc/init/plymouth* */
}





/**
**name CLCFG_disableAvahiDaemon()
**description Disables the avahi-daemon.
**/
function CLCFG_disableAvahiDaemon()
{
	echo("
		dpkg-divert --local --rename --add /usr/sbin/avahi-daemon
		ln -s /bin/true /usr/sbin/avahi-daemon
	");
	
	$clientParams=CLIENT_getAskingParams();

	//list of DNS servers
	$DNSServers[0]=$clientParams['dns1'];
	$DNSServers[1]=$clientParams['dns2'];
	CLCFG_resolvConf($DNSServers);
}





/**
**name CLCFG_configUpstartForNormalUsage()
**description Configures upstart for normal running in an installed system.
**/
function CLCFG_configUpstartForNormalUsage()
{
	echo("
	if [ `dpkg --get-selections | grep upstart | grep -c -v deinstall` -gt 0 ]
	then
		rm /sbin/initctl
		dpkg-divert --local --rename --remove /sbin/initctl
		export DEBIAN_FRONTEND=noninteractive
		apt-get -m --force-yes -qq -y install --reinstall upstart
	fi
	");
}





/**
**name CLCFG_configUpstartForChroot()
**description Configures upstart to make it not fail installation.
**/
function CLCFG_configUpstartForChroot()
{
	echo("
	if [ `dpkg --get-selections | grep upstart | grep -c -v deinstall` -gt 0 ] && [ ! -h /sbin/initctl ]
	then
		dpkg-divert --local --rename --add /sbin/initctl
		ln -s /bin/true /sbin/initctl
	fi
	");
}





/**
**name CLCFG_createScreenRC()
**description Creates the (under Ubuntu) needed settings for screen.
**/
function CLCFG_createScreenRC()
{
	echo("
mkdir /root/.screen-profiles -p

cat >> /root/.screen-profiles/windows << \"EOF\"
# Default windows
screen -t shell 0 motd+shell
EOF

cat >> /root/.screen-profiles/keybindings << \"EOF\"
source /usr/share/screen-profiles/keybindings/common
EOF

touch /root/.screenrc

#Set the access rights
chmod 644 /root/.screen-profiles/windows /root/.screen-profiles/keybindings /root/.screenrc

ln -s /usr/share/screen-profiles/profiles/plain /root/.screen-profiles/profile

	");
}





/**
**name CLCFG_addGrubPassword()
**description Adds a password line to the grub configuration to lock the edit line of bootmanager.
**/
function CLCFG_addGrubPassword()
{
	$options=CLIENT_getAllAskingOptions();
	$passwordLine = "password --md5 ".HELPER_grubMd5Crypt($options['netRootPwd']);
	echo(EDIT_insertAfterLineNumber("/boot/grub/menu.lst", 3, $passwordLine));
}





/**
**name CLCFG_addLiloPassword()
**description Adds a password line to the LiLo configuration to lock the edit line of bootmanager.
**/
function CLCFG_addLiloPassword()
{
	$options=CLIENT_getAllAskingOptions();

	//generate the parameters for securing the edit line of LiLo with the netboot password
	$passwordLine = "password=".$options['netRootPwd']."
restricted\n";

	//insert the password line and make sure that only root can read the lilo.conf
	echo(EDIT_insertAfterLineNumber("/etc/lilo.conf", 0, $passwordLine)."
chmod 600 /etc/lilo.conf
");
}





/**
**name GNOME_prepare()
**description Prepares the GNOME installation
**/
function GNOME_prepare()
{
	echo("
export DEBIAN_FRONTEND=noninteractive\n

rm /etc/rc2.d/S99kdm\n

");
}





/**
**name LXDE_install($lang, $fullInstall)
**description Installs the LXDE desktop.
**parameter lang: short language
**parameter fullInstall: Set to true, if the full desktop with all applications should be installed. Otherwise a minimal desktop will be installed
**/
function LXDE_install($lang, $fullInstall)
{
	CLCFG_installLightDM('LXDE', true);

	if ($fullInstall)
		$pkgs = 'task-lxde-desktop';
	else
		$pkgs = 'lxde-core';

	CLCFG_aptGet('install', $pkgs);
}





/**
**name GNOME3_install($lang, $fullInstall)
**description Installs the GNOME 3 desktop.
**parameter lang: short language
**parameter fullInstall: Set to true, if the full desktop with all applications should be installed. Otherwise a minimal desktop will be installed
**/
function GNOME3_install($lang, $fullInstall, $dm = 'gdm3')
{
	$lV = I18N_getLangVars($lang);
	
	CLCFG_setDebConfDM($dm);
	CLCFG_setDebConfDirect('
tasksel tasksel/desktop multiselect gnome
libpam-runtime libpam-runtime/profiles multiselect unix, gnome-keyring, consolekit, capability
gdm3 gdm3/daemon_name string /usr/sbin/gdm3
');

	$pkgs = "language-pack-gnome-$lV[packagelang]";

	if ($fullInstall)
		$pkgs .= ' gnome-desktop-environment';
	else
		$pkgs .= ' gnome-core';

	CLCFG_aptGet('install', $pkgs);
}





/**
**name GNOME_install($lang)
**description Installs a minimalistic GNOME desktop.
**parameter lang: short language
**/
function GNOME_install($lang)
{
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	$lV = I18N_getLangVars($lang);

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_gnome2);

	$keyboards = $lV['xkeyboard'];
	if (isset($lV['kdekeyboards']{1}))
		$keyboards .= ','.$lV['kdekeyboards'];

	$gdmLanguages = str_replace("\n",",",$lV['locale']);

	echo("

apt-get update 2>&1 | tee -a /tmp/m23sourceupdate.log

apt-get --force-yes -y install debconf-utils 2>&1 | tee  /tmp/m23gnome2.log

rm /tmp/debconfGnome2

#write debconf data

cat >> /tmp/debconfGnome2 << \"EOF\"
docbook-dsssl docbook-dsssl/set-papersize select A4
libpaper1 libpaper/defaultpaper select a4
gdm gdm/daemon_name string /usr/bin/gdm
gdm shared/default-x-display-manager select gdm
kdm shared/default-x-display-manager select gdm
xdm shared/default-x-display-manager select gdm
libpango1.0-common libpango1.0-common/saved_aliases_file note
libpango1.0-common libpango1.0-common/generated_aliases_file note
libpango1.0-common libpango1.0-common/use_defoma boolean true
EOF

debconf-set-selections /tmp/debconfGnome2

apt-get --force-yes -y install gnome-core xscreensaver 2>&1 | tee -a /tmp/m23gnome2.log

run=0
while [ `whereis gnome-control-center | wc -w` -lt 2 ] && [ \$run -lt 10 ]
do
apt-get --force-yes -y install gnome-core xscreensaver 2>&1 | tee -a /tmp/m23gnome2.log
apt-get install -f
run=`expr \$run + 1`
done

#install language pack
apt-get --force-yes -y install language-pack-gnome-$lV[packagelang] 2>&1 | tee -a /tmp/m23gnome2.log
apt-get --force-yes -y install language-pack-kde-$lV[packagelang]

apt-get --force-yes -y install ubuntu-artwork 2>&1 | tee -a /tmp/m23gnome2.log

gconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.default --type string --set /desktop/gnome/background/picture_filename /usr/m23/kde/m23background.png
gconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.mandatory --type string --set /desktop/gnome/background/picture_filename /usr/m23/kde/m23background.png

#gconftool-2 --type string --set /apps/gnome-session/options/splash_image \"/tmp/muh.png\"

gconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.default --type string --set /desktop/gnome/background/picture_options stretched
gconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.mandatory --type string --set /desktop/gnome/background/picture_options stretched

gconftool-2 --direct --config-source xml:readwrite:/etc/gconf/gconf.xml.default --type list --list-type string --set /desktop/gnome/peripherals/keyboard/kbd/layouts [\"$keyboards\"]
gconftool-2 --type string --set /desktop/gnome/peripherals/keyboard/kbd/layouts \"$lV[xkeyboard]\"

rm /usr/share/gconf/defaults/99_m23settings 2> /dev/null

cat >> /usr/share/gconf/defaults/99_m23settings << \"EOF\"
/desktop/gnome/peripherals/keyboard/kbd/layouts [$keyboards]
/desktop/gnome/background/picture_filename /usr/m23/kde/m23background.png
/desktop/gnome/background/picture_options stretched
EOF

update-gconf-defaults
");
}





/**
**name GNOME_installLoginManager($lang)
**description Installs the GNOME login manager GDM.
**parameter lang: short language
**/
function GNOME_installLoginManager($lang)
{
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
	
	$lV = I18N_getLangVars($lang);
	$gdmLanguages = str_replace("\n",",",$lV['locale']);

	echo("apt-get --force-yes -y install gdm 2>&1 | tee -a /tmp/m23gnome2.log
".
//exchange language specific welcome message
sedSearchReplace("/etc/gdm/gdm.conf","Welcome=Welcome to %n","Welcome=$I18N_kdm_greeting").
sedSearchReplace("/etc/gdm/gdm.conf","#Welcome=Welcome","Welcome=$I18N_kdm_greeting").
//all users can shut down the client
sedSearchReplace("/etc/gdm/gdm.conf","SecureSystemMenu=true","SecureSystemMenu=false").
//background should be an image
sedSearchReplace("/etc/gdm/gdm.conf","BackgroundType=2","BackgroundType=1").
sedSearchReplace("/etc/gdm/gdm.conf","#BackgroundType=","BackgroundType=").
//set default m23 background
sedSearchReplace("/etc/gdm/gdm.conf","#BackgroundImage=","BackgroundImage=").
sedSearchReplace("/etc/gdm/gdm.conf","BackgroundImage=","BackgroundImage=/usr/m23/kde/m23background.png").
sedSearchReplace("/etc/gdm/gdm.conf","UseCirclesInEntry=false","UseCirclesInEntry=true").
//root can login graphical
sedSearchReplace("/etc/gdm/gdm.conf","AllowRoot=false","AllowRoot=true").
"
apt-get remove xdm -y

grep DEBCONF_DAEMON= /etc/init.d/gdm | cut -d'=' -f2 > /etc/X11/default-display-manager

#if [ -f /usr/bin/gdm ]
#then
#	echo \"/usr/bin/gdm\" > /etc/X11/default-display-manager
#else
#	echo \"/usr/sbin/gdm\" > /etc/X11/default-display-manager
#fi

if [ `find /etc/X11/default-display-manager -printf %s` -eq 0 ]
then
	echo \"/usr/sbin/gdm\" > /etc/X11/default-display-manager
fi

sudo -u gdm gconftool-2 --set --type list --list-type string /apps/gdm/simple-greeter/recent-layouts [$lV[xkeyboard]]
gconftool-2 --set --type list --list-type string /apps/gdm/simple-greeter/recent-layouts [$lV[xkeyboard]]
update-gconf-defaults
");
}





/**
**name KDE_prepare()
**description Prepares the KDE installation
**/
function KDE_prepare()
{
echo("
export DEBIAN_FRONTEND=noninteractive\n

rm /etc/rc2.d/S99kdm\n


#create device files to make the istaller quiet

mknod /dev/raw1394 c 171 0 2> /dev/null

chown root.disk /dev/raw1394

chmod 660 /dev/raw1394

");
}





/**
**name KDE_install($lang)
**description Installs a minimalistic KDE desktop.
**parameter lang: short language
**parameter ver: KDE version 3 or 4 (minor releases are depending in the on the used distribution)
**/
function KDE_install($lang, $ver=3, $critical = true)
{
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	$lV = I18N_getLangVars($lang);

	CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_kde);

	$logFile="/tmp/m23KDE$ver.log";

	echo("

apt-get update 2>&1 | tee -a /tmp/m23sourceupdate.log

apt-get -m --force-yes -y install debconf-utils 2>&1 | tee $logFile

rm /tmp/debconfKDE3 2> /dev/null

#write debconf data

cat >> /tmp/debconfKDE3 << \"EOF\"
kdm kdm/default_nolisten_udp note
kdm kdm/default_servers_100dpi note
kdm kdm/default_servers_nolisten_tcp note
kdm shared/default-x-display-manager select kdm
kdm kdm/stop_running_server_with_children boolean true
kdm kdm/daemon_name string /usr/bin/kdm
xdm shared/default-x-display-manager select kdm
xdm xdm/stop_running_server_with_children boolean true
gdm shared/default-x-display-manager select kdm
EOF

debconf-set-selections /tmp/debconfKDE3
");

if ($ver == 3)
echo("
#get the package names
kdeBase=`apt-cache search kdebase | grep ^kdebase | cut -d' ' -f1 | grep -v \"\\-\"`
kdeLibs=`apt-cache search kdelibs4 | cut -d' ' -f1 | grep -v \"\\-\"`
kdm=`apt-cache search kdm | cut -d' ' -f1 | grep kdm\$`
langPkg=`apt-cache search kde-i18n-$lV[packagelang] | cut -d' ' -f1`
if [ -z \$langPkg ]
then
	langPkg=`apt-cache search language-pack-kde-$lV[packagelang] | cut -d' ' -f1`
fi

if [ -z \$kdm ]
then
	kdm=`apt-cache search xdm | cut -d' ' -f1`
	if [ -z \$kdm ]
	then
		kdm=`apt-cache search gdm | cut -d' ' -f1`
	fi
fi

kdepasswd=`apt-cache search kdepasswd | cut -d' ' -f1 | grep kdepasswd\$`

apt-get -m -y --force-yes install \$kdeBase \$kdeLibs \$kdm \$langPkg \$kdepasswd kmix 2>&1 ; echo $? > /tmp/apt-err | tee $logFile
apt-get -m -y --force-yes install gtk-qt-engine 2>&1  | tee $logFile
");
else
echo("
#get a list of all KDE packages
apt-cache search kde | grep kde | cut -d' ' -f1 > /tmp/kde-packages.cache

#try to find the KDE standard package
temp=`grep standard /tmp/kde-packages.cache`

if [ \$temp ]
then
	#yes, could be found
	kdePackages=\$temp
else
	#try to find the minimal KDE package, if standard is not available
	kdePackages=`grep minimal /tmp/kde-packages.cache`
fi

if [ \$kdePackages ]
then
	kdePackages=`grep kde-plasma-desktop /tmp/kde-packages.cache`
fi


#Check if still no KDE package could be found
if [ -z \$kdePackages ]
then
	#KDE standard and minimal package are not available => exit
	".sendClientLogStatus("KDE4 installation",false,false,$critical)."
fi

apt-get -m -y --force-yes install \$kdePackages kdm 2>&1 ; echo $? > /tmp/apt-err | tee $logFile
mkdir /usr/share/wallpapers -p
apt-get -m -y --force-yes install m23-kde4-wallpaper 2>&1 | tee $logFile
apt-get -m -y --force-yes install kde-l10n-$lV[packagelang] 2>&1  | tee $logFile
apt-get -m -y --force-yes install language-support-writing-$lV[packagelang] 2>&1  | tee $logFile
apt-get -m -y --force-yes install language-pack-kde-$lV[packagelang]-base 2>&1  | tee $logFile
apt-get -m -y --force-yes install language-pack-kde-$lV[packagelang] 2>&1  | tee $logFile
apt-get -m -y --force-yes install phonon-backend-gstreamer gstreamer0.10-plugins-good gstreamer0.10-plugins-ugly

");


echo("
apt-get -m -y --force-yes install language-pack-gnome-$lV[packagelang]

if [ `cat /tmp/apt-err` -eq 0 ]
then
	".sendClientLogStatus("KDE installed",true,$critical)."
else
	");
	MSR_logCommand("/tmp/m23sourceupdate.log");
	MSR_logCommand($logFile);
	echo("
	".sendClientLogStatus("KDE installed",false,$critical)."
fi

");

}





/**
**name KDE_installLoginManager($lang, $ver=3, $trinity = false)
**description Installs the KDE/Trinity login manager KDM.
**parameter lang: short language
**parameter ver: KDE version 3 or 4 (minor releases are depending in the on the used distribution)
**parameter trinity: Set to true, if the Trinity Desktop should be configured.
**/
function KDE_installLoginManager($lang, $ver=3, $trinity = false)
{
	$lV=I18N_getLangVars($lang);

	switch ($lang)
	{
		case "de":
			$welcomeMsg="Willkommen auf dem m23-Client %n";
			break;

		case "fr":
			$welcomeMsg="Bienvenu chez le poste client m23 %n";
			break;

		default:
			$welcomeMsg="Welcome to the m23 client %n";
			break;
	}

	if ($trinity)
	{
		$etcDir = "trinity";
		$skelDir = ".trinity";
		$kdmBin = "/opt/trinity/bin/kdm /opt/trinity/bin/tdm";
		CLCFG_aptGet('install', 'tdm-trinity kdm-trinity');
		echo("
		if [ -d /etc/$etcDir/tdm ]
		then
			ln -s /etc/$etcDir/tdm /etc/$etcDir/kdm
			ln -s /etc/$etcDir/tdm/tdmrc /etc/$etcDir/kdm/kdmrc
		fi
		");
		
	}
	else
	{
		$etcDir = "kde$ver";
		$skelDir = ".kde";
		$kdmBin = "/usr/bin/kdm";
	}

echo(
EDIT_commentoutInsert("/etc/$etcDir/kdm/backgroundrc","^Wallpaper=","Wallpaper=/usr/m23/kde/m23background.png","#").
EDIT_commentoutInsert("/etc/$etcDir/kdm/kdmrc","Language=","Language=$lV[country]","#").
EDIT_commentoutInsert("/etc/$etcDir/kdm/kdmrc","GreetString=","GreetString=$welcomeMsg","#").
EDIT_commentoutInsert("/etc/$etcDir/kdm/kdmrc","LogoArea=","LogoArea=Clock","#").
EDIT_commentoutInsert("/etc/$etcDir/kdm/kdmrc","AllowRootLogin=","AllowRootLogin=true","#").
EDIT_commentoutInsert("/etc/$etcDir/kdm/kdmrc","AllowShutdown=","AllowShutdown=All","#").
EDIT_searchLineNumber("/etc/$etcDir/kdm/kdmrc","-*-Core").
EDIT_insertAfterLineNumber("/etc/$etcDir/kdm/kdmrc", SED_foundLine, "DefaultSdMode=ForceNow").
EDIT_insertAfterLineNumber("/etc/$etcDir/kdm/kdmrc", SED_foundLine, "AllowSdForceNow=All").
EDIT_commentoutInsert("/etc/skel/$skelDir/share/config/kdeglobals","Language=","Language=$lV[country]","#").
EDIT_commentoutInsert("/etc/skel/.kde4/share/config/kdeglobals","Language=","Language=$lV[country]","#").
EDIT_commentoutInsert("/etc/skel/.kde4/share/config/kxkbrc","DisplayNames=","DisplayNames=$lV[kdekeyboard],$lV[kdekeyboards]","#").
EDIT_commentoutInsert("/etc/skel/.kde4/share/config/kxkbrc","LayoutList=","LayoutList=$lV[kdekeyboard],$lV[kdekeyboards]","#").
EDIT_commentoutInsert("/etc/skel/$skelDir/share/config/kdeglobals","Country=","Country=$lV[country]","#").
EDIT_commentoutInsert("/etc/skel/.kde4/share/config/kdeglobals","Country=","Country=$lV[country]","#").
EDIT_commentoutInsert("/etc/skel/.kde4/share/config/startupconfig","kdeglobals_locale_language=","kdeglobals_locale_language=\"$lV[country]\"","#").
EDIT_commentoutInsert("/etc/skel/.dmrc","Language=","Language=$lV[lang]","#").
EDIT_searchLineNumber("/etc/$etcDir/kdm/kdmrc","-*-Greeter").
EDIT_insertAfterLineNumber("/etc/$etcDir/kdm/kdmrc", SED_foundLine, "HiddenUsers=root"));

echo("
apt-get -m -y --force-yes remove xdm

# Check for possible display manager executables and use the first existing
for kdmBin in $kdmBin
do
	if [ -f \"\$kdmBin\" ]
	then
		echo \"\$kdmBin\" > /etc/X11/default-display-manager
		break
	fi
done

rm /tmp/*.sh /tmp/*.php 2> /dev/null
");

if (!$trinity)
echo("
sed 's/:0 local@tty1 \/usr\/X11R6\/bin\/X -nolisten tcp/:0 local@tty1 \/usr\/X11R6\/bin\/X vt7 -nolisten tcp/g' /etc/$etcDir/kdm/Xservers > /tmp/Xservers
cat /tmp/Xservers > /etc/$etcDir/kdm/Xservers
");
else
echo("
rm /etc/trinity/kdm/Xservers 2> /dev/null
");

if ($ver == 3)
echo("
apt-get -y -m --force-yes install m23-ksplash
");

echo("
	if [ -f /opt/trinity/bin/tdm ]
	then
");
		CLCFG_setDebConfDirect('tdm-trinity tdm-trinity/daemon_name string /opt/trinity/bin/tdm
tdm-trinity tdm-trinity/stop_running_server_with_children boolean false');
		CLCFG_setDebConfDM('tdm-trinity');
echo("
		export DEBIAN_FRONTEND=noninteractive
		dpkg-reconfigure tdm-trinity
	fi
");
}





/**
**name CLCFG_lilo2Grub()
**description Installs and runs the lilo.conf to Grub's menu.lst converter
**/
function CLCFG_lilo2Grub()
{
echo("
rm /sbin/lilo2grub 2> /dev/null
cat >> /sbin/lilo2grub << \"LILO2GRUBEOF\"

#!/bin/sh

device_map=/boot/grub/device.map
menu_lst=/boot/grub/menu.lst


#clears all global set variables
clearVars()
{
	title=\"\"
	root=\"\"
	kernel=\"\"
	initrd=\"\"
	type=\"\"
	other=\"\"
	paramcnt=0
}





#converts a standard device name to the grub's naming schema
#e.g. grubdev=`convert /dev/hda1`
convert () {
	# Break the device name into the disk part and the partition part
	tmp_disk=\$(echo \"\$1\" | sed -e 's%\\(\\(s\\|h\\|v\\|xv\\)d[a-z]\\)[0-9]*\$%\\1%' \\
				-e 's%\\(fd[0-9]*\\)\$%\\1%' \\
				-e 's%/part[0-9]*\$%/disc%' \\
				-e 's%\\(c[0-7]d[0-9]*\\).*\$%\\1%' \\
				-e 's%\\(/mapper/mpath[0-9]\\+\\)-part[0-9]\\+\$%\\1%')
	tmp_part=\$(echo \"\$1\" | sed -e 's%.*/\\(s\\|h\\|v\\|xv\\)d[a-z]\\([0-9]*\\)\$%\\2%' \\
				-e 's%.*/fd[0-9]*\$%%' \\
				-e 's%.*/floppy/[0-9]*\$%%' \\
				-e 's%.*/\\(disc\\|part\\([0-9]*\\)\\)\$%\\2%' \\
				-e 's%.*c[0-7]d[0-9]*p*%%' \\
				-e 's%.*/mapper/mpath[0-9]\\+-part\\([0-9]\\+\\)%\\1%')

	# Get the drive name
	tmp_drive=\$(grep -v '^#' \$device_map | grep \"\$tmp_disk *\$\" | \\
		sed 's%.*\\(([hf]d[0-9][a-g0-9,]*)\\).*%\\1%')

	# If not found, print an error message and exit
	if [ -z \"\$tmp_drive\" ]; then
		echo \"\$1 does not have any corresponding BIOS drive.\" 1>&2
		exit 1
	fi

	if [ -n \"\$tmp_part\" ]; then
		# If a partition is specified, we need to translate it into the
		# GRUB's syntax
		echo \"\$tmp_drive\" | sed \"s%)\$%,`expr \$tmp_part - 1`)%\"
	else
		# If no partition is specified, just print the drive name
		echo \"\$tmp_drive\"
	fi
}





#write a windows boot menu entry
writeWindows()
{
	#only write if all four needed information were found
	if [ \$paramcnt -eq 3 ] && [ \$type = \"w\" ]
	then
		echo \"title=\$title
root \$root
savedefault
chainloader     +1
\" >> \$menu_lst

	clearVars
	
	echo \"Adding Windows* to Grub's boot menu\"
	fi
}




clearVars
#scan the lilo.conf for windows entries and add them to menu.lst
cat /etc/lilo.conf | while read line
do
	cmd=`echo \$line | cut -d'=' -f1`
	param=`echo \$line | cut -d'=' -f2`

	case \$cmd in
		label)
			title=\$param
			paramcnt=`expr \$paramcnt \+ 1`
		;;
		table)
			paramcnt=`expr \$paramcnt \+ 1`
		;;
		other)
			root=`convert \$param`
			type=\"w\"
			paramcnt=`expr \$paramcnt \+ 1`
		;;
		\"\")
			clearVars
		;;
	esac
		writeWindows
done
LILO2GRUBEOF

chmod +x /sbin/lilo2grub

/sbin/lilo2grub

#add default kernel to start and timeout for user selection
echo \"default 0
timeout 3
\" > /tmp/menu.lst1.m23
cp /boot/grub/menu.lst /tmp/menu.lst2.m23
cat /tmp/menu.lst1.m23 /tmp/menu.lst2.m23 > /boot/grub/menu.lst
rm /tmp/menu.lst1.m23 /tmp/menu.lst2.m23

");
}





/**
**name CLCFG_getMbrPart($installPart,$clientOptions)
**description Returns the device to install the MBR of the bootloader in.
**parameter installPart: Partition to install the OS on.
**parameter clientOptions: Array with information about client options.
**returns Device to install the MBR of the bootloader in.
**/
function CLCFG_getMbrPart($installPart,$clientOptions)
{
	if (!empty($clientOptions['mbrPart']))
		return($clientOptions['mbrPart']);

	//this is for clients without mbrPart option
	$nameNumber = preg_split("/[0-9]/",$installPart);
	return($nameNumber[0]);
};





/**
**name CLCFG_setTimeZone($timezone)
**description Sets the timezone a a client.
**parameter timezone: POSIX timezone as defined at /usr/share/zoneinfo/posix/
**/
function CLCFG_setTimeZone($timezone)
{
	echo("
	rm -f /etc/localtime && ln -sf /usr/share/zoneinfo/posix/$timezone /etc/localtime
	echo \"$timezone\" > /etc/timezone
	dpkg-reconfigure --frontend noninteractive tzdata
	");
};





/**
**name CLCFG_writeHosts()
**description writes the /etc/hosts file for the client
**/
function CLCFG_writeHosts()
{
echo("

echo 127.0.0.1       localhost > /tmp/hosts

echo ".getClientIP()." ".CLIENT_getClientName()." >> /tmp/hosts

cat >> /tmp/hosts << \"HOSTSEOF\"

# The following lines are desirable for IPv6 capable hosts
# (added automatically by netbase upgrade)

::1     ip6-localhost ip6-loopback
fe00::0 ip6-localnet
ff00::0 ip6-mcastprefix
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters
ff02::3 ip6-allhosts

HOSTSEOF


mv /tmp/hosts /etc/hosts

chmod 644 /etc/hosts

chown root /etc/hosts

chgrp root /etc/hosts

chmod 777 /var/run/screen
chown root.utmp /var/run/screen
");
};





/**
**name CLCFG_addUser($username, $password, $groups, $uid = '', $gid = '')
**description generates the commands to add a user on the client. it adds the user account, creates a home directory, copies the m23 skel files and sets the
**parameter userName: the username for the account
**parameter password: the unecrypted password for the account
**parameter groups: the groups the user should be added to
**parameter skelDir: directory to the skeleton files
**parameter uid: Optional user ID of the new user.
**parameter gid: Optional group ID of the new user.
**/
function CLCFG_addUser($username, $password, $groups, $uid = '', $gid = '')
{
	if (isset($username{0}) && isset($password{0}))
	{
		//encrypt the password
		$cpass= encryptShadow($username,$password);

		if (is_numeric($uid))
			$uid = "--uid=$uid";

		if (is_numeric($gid))
			$gid = "--gid=$gid";

		echo ("
#In case that NFS is used.
mount /home

#WARNING: Don't delete the blank lines!

#mkdir /home/$username >> /tmp/m23ClientInstall.log

useradd $uid $gid -m -g users -d /home/$username -s /bin/bash -p '$cpass' \"$username\"  >> /tmp/m23ClientInstall.log

err=\$?

if [ \$err -eq 0 ]
	then
		".sendClientLogStatus("adding user",true)."
	else
		if [ \$err -eq 9 ]
			then
				".sendClientLogStatus("adding user (user exists)",true)."
			else
				".sendClientLogStatus("adding user",false,true)."
		fi
	fi

	#copy m23 skel files
	#cp -r /usr/m23/skel/.kde* /home/$username >> /tmp/m23ClientInstall.log

#copy desktop icons
#cp -r /usr/m23/skel/Desktop* /home/$username >> /tmp/m23ClientInstall.log

chown -R $username /home/$username >> /tmp/m23ClientInstall.log

chmod -R 700 /home/$username >> /tmp/m23ClientInstall.log\n

echo \"$username ALL=(ALL) ALL\" >> /etc/sudoers

		");
	}

	if (is_array($groups))
		foreach ($groups as $group)
			echo "addgroup $username $group\n";
};





/**
**name CLCFG_createBootDeviceNode()
**description Makes sure the needed device nodes for the boot device are created.
**/
function CLCFG_createBootDeviceNode()
{
	CLCFG_aptGet("install","udev");

return("
	mount /proc 2> /dev/null
	mount devpts /dev/pts -t devpts 2> /dev/null

	#make sure, sysfs is fstab (otherwise mounting it will not work)
	if [ `grep -c sysfs /etc/fstab` ]
	then
		echo \"sys /sys sysfs defaults 0 0\" >> /etc/fstab
	fi

	#make needed device nodes for MD
	for i in `seq 0 15`
	do
		mknod /dev/md\$i b 9 \$i 2> /dev/null
	done

	#Re-create the mtab file
	grep -v rootfs /proc/mounts > /etc/mtab

	#make sure the devices are created
	mount /sys 2> /dev/null

	if [ $(grep -c 'Debian GNU/Linux 7' /etc/issue) -gt 0 ]
	then
		echo -n \$RUNLEVEL > /tmp/RUNLEVEL.bak
		RUNLEVEL='S'
		sed -i -e 's#sleep 30##g' -e 's#sleep 60##g' /etc/init.d/udev
	fi

	/etc/init.d/udev start 2> /dev/null

	if [ $(grep -c 'Debian GNU/Linux 7' /etc/issue) -gt 0 ]
	then
		export RUNLEVEL=$(cat /tmp/RUNLEVEL.bak)
	fi

	#Check if udev runs
	if [ `ps -A | grep udevd -c` -gt 0 ]
	then
		x=1
	else
		".CLCFG_makeDev()."
	fi
");
}





/**
**name CLCFG_efi($CFDiskIOO)
**description Configures the client for UEFI booting.
**parameter CFDiskIOO: Object to with partition information for the calling client.
**returns true, if the client uses EFI, otherwise false.
**/
function CLCFG_efi($CFDiskIOO)
{
	if (!$CFDiskIOO->isUEFIActive())
		return(false);

	$EFIBootPartDev = $CFDiskIOO->getEFIBootPartDev();
// 	$CFDiskIOO->getpDiskAndpPartFromDev($EFIBootPartDev, $pDisk, $pPart);

// 	$possibleEFILoaders = '/tmp/possibleEFILoaders.list';

	// Add entry in fstab
	echo("
		efiBootID=`blkid $EFIBootPartDev | sed 's/ /\\n/g' | grep ^UUID | cut -d'\"' -f2`

		# Remove fat32 EFI partition found by m23hwscanner
		grep -v '$EFIBootPartDev' /etc/fstab > /tmp/fstab

		# Add it with UUID and correct mout path
		echo \"UUID=\$efiBootID /boot/efi vfat defaults 0  1\" >> /tmp/fstab
		cat /tmp/fstab > /etc/fstab

		fsck -y $EFIBootPartDev

		mount /boot/efi

		mount /sys

		mount /proc

		mount -t efivarfs efivarfs /sys/firmware/efi/efivars
	");

	CLCFG_aptGet('install', 'efibootmgr shim grub-efi-amd64 grub-efi-amd64-bin linux-signed-generic grub-efi-amd64-signed shim-signed');

	echo("
		grub-install --uefi-secure-boot
	");

	return(true);


// 	echo("
// 		title=`head -1 /etc/issue.net`
// 
// 		if [ -z \$title ]
// 		then
// 			title='Linux'
// 		fi
// 
// 		find /boot/efi/ | grep \.efi$ | sed 's#/boot/efi##g' | grep -v MokManager | while read loader
// 		do
// 			loaderBackslash=`echo -n \"\$loader\" | sed 's#/#\\\\\\\\#g'`
// 			loaderFile=`basename \"\$loader\"`
// 			
// 			efibootmgr --create --gpt --disk $pDisk --part $pPart --write-signature --label \"\$title (\$loaderFile)\" --loader \"$loader\"
// 			efibootmgr --create --gpt --disk $pDisk --part $pPart --write-signature --label \"\$title (\$loaderFile BS)\" --loader \"\$loaderBackslash\"
// 		done
// 		
// 		bootOrder=`efibootmgr | grep ^Boot[0-9A-F][0-9A-F][0-9A-F][0-9A-F] | grep -v \"\$title\" | sed -e 's/^Boot//' -e 's/[^0-9A-F].*//' | awk -vORS=',' '{print}' | sed 's/,$//'`
// 		
// 		if [ \$bootOrder ]
// 		then
// 			efibootmgr --bootorder \$bootOrder
// 		fi
// 	");


// 	EFI/BOOT/bootx64.efi ööö
// 
}


/**
**name CLCFG_genFstab($bootDevice,$rootDevice)
**description generates the commands to auto detect the partitions and generate the fstab file
**parameter bootDevice: the device the bootloader should be installed on (e.g. /dev/hda)
**parameter rootDevice: the path to the installation partition (e.g. /dev/hda1)
**/
function CLCFG_genFstab($bootDevice, $rootDevice, $bootloader, $ignoreErrors = false)
{
	echo("
#Deactivate init
mv /sbin/init /sbin/init.deactivated
	
#make proc mount directory
mkdir -p /proc

#set correct access rights
chmod 555 /proc/

#make temporary fstab, so we can mount proc
echo \"proc /proc proc defaults 0 0\" > /etc/fstab

#mount it
mount /proc

mount /sys

#delete temporary fstab
rm /etc/fstab 2> /dev/null

mkdir -p /usr/m23/skel/Desktop

chmod -R 555 /usr/m23

mkdir -p /mnt/floppy
chmod 755 /mnt/floppy

#get kernel name of the in root installed kernel
KERNEL_NAME=`ls -l /vmlinuz | awk -v FS='/' '{print \$NF}' | sed s/vmlinuz-//`
#ls -l /vmlinuz | cut -d'>' -f2 | cut -d'/' -f2 | sed s/vmlinuz-//

#if the previous line gets \"boot\" as kernel name try to fix it
if [ -n \"\$KERNEL_NAME\" ]
then
	if [ \"\$KERNEL_NAME\" ] && [ \"\$KERNEL_NAME\" == \"boot\" ]
	then
		KERNEL_NAME=`ls -l /vmlinuz | cut -d'>' -f2 | cut -d'/' -f3 | sed s/vmlinuz-//`
	fi
fi

#alternative way to get the kernel version: used by Debian
if [ -z \"\$KERNEL_NAME\" ]
then
	olddir=`pwd`
	cd /boot/
	for i in `ls vmlinuz* | grep \"\\.\" | sort -r | sed 's/vmlinuz-//'`
	do
		KERNEL_NAME=\$i
		ln -s /boot/vmlinuz-\$KERNEL_NAME /vmlinuz
		ln -s /boot/initrd.img-\$KERNEL_NAME /initrd.img
		break
	done
	cd \$olddir
fi

ln -s `find /lib -name libparted* -type f | sort | tail -1` /usr/lib/libparted-1.6.so.13 2> /dev/null
ln -s `find /lib -name libparted* -type f | sort | tail -1` /usr/lib/libparted-1.7.so.1 2> /dev/null
ln -s `find /lib -name libparted* -type f | sort | tail -1` /usr/lib/libparted-1.8.so.6 2> /dev/null
ln -s `find /lib -name libparted* -type f | sort | tail -1` /usr/lib/libparted-1.8.so.7 2> /dev/null

mount /proc");

CLCFG_aptGet("install","pciutils");

echo("

#check, if the m23 hardware scanner is installed
#Normally it should be there, but on newer Ubuntu versions m23hwscanner-ubuntu is not installable, but m23hwscanner
if [ ! -e /bin/m23hwscanner ]
then
	#try to install m23hwscanner (on some Ubuntu versions needed)");
	CLCFG_aptGet("install","m23hwscanner");
echo ("
fi

#generate fstab automatical
if /bin/m23hwscanner $bootDevice $rootDevice
then
	".sendClientLogStatus("Running m23hwscanner",true)."
else
	".sendClientLogStatus("Running m23hwscanner",false,true)."
fi

#Add some lines to the fstab
echo 'none	/dev/pts	devpts	defaults,auto	0 0
/dev/fd0	/mnt/floppy	auto	user,noauto	0 0' >>/etc/fstab

#/dev/pts is needed to allow logins by SSH
mkdir -p /dev/pts

#check for the programm to create the initrd
if [ `whereis mkinitrd | wc -w` -gt 1 ]
then
	initrdPath=\"mkinitrd\"
else
	if [ `whereis mkinitramfs | wc -w` -gt 1 ]
	then
		initrdPath=\"mkinitramfs\"
	fi
fi

#check if mkinitrd.yaird is used
yairdCount=`whereis mkinitrd | grep yaird | wc -l`

#get names of the loaded modules
lsmod | cut -d' ' -f1 | grep -v Module > /etc/modules

#add all mouse modules to the modules file to load them on system start
find /lib/modules/ | grep mouse | grep ko | awk -vFS='/' '{print(\$NF)}' | sed 's#\.ko##' | sort -u  | grep mouse >> /etc/modules

if [ -f /etc/\$initrdPath/modules ]
then
	cp /etc/modules /etc/\$initrdPath/modules
fi

update-modules 2> /dev/null

#remove eventual existing old initrd image
if [ \$yairdCount -eq 0 ]
then
	rm /boot/initrd.img-\$KERNEL_NAME 2> /dev/null
fi

#create needed devices
".CLCFG_makeDev()."

#make new initrd, that includes needed drivers for booting the client
if [ \$yairdCount -eq 0 ]
then
	/usr/sbin/\$initrdPath -r $rootDevice -o /boot/initrd.img-\$KERNEL_NAME /lib/modules/\$KERNEL_NAME/ 2> /dev/null
fi

");


if ($bootloader == "grub")
	{
		CLCFG_aptGet("remove", "lilo");
		
		echo("
		if [ $(grep -c 'Debian GNU/Linux 7' /etc/issue) -gt 0 ]
		then
		");
			CLCFG_aptGet("install", "grub2");
		echo("
		else
			# DebianVersionSpecific
			if [ $(grep -c 'Debian GNU/Linux 9' /etc/issue) -gt 0 ] || [ $(grep -c 'Debian GNU/Linux 8' /etc/issue) -gt 0 ] || [ $(grep xenial -c /etc/apt/sources.list) -gt 0 ] || [ $(grep devuan -c /etc/apt/sources.list) -gt 0 ]
			then
			");
				CLCFG_aptGet("install", "grub-pc");
			echo("
			else
			");
				CLCFG_aptGet("install", "grub m23-grub-splash");
		echo("
			fi
		fi
		");

		echo("
			#write Grub
			if /usr/sbin/grub-install $bootDevice
			then
				".sendClientLogStatus("Grub installation",true)."
			else
				".CLCFG_createBootDeviceNode()."

				#Re-check the device.map
				/usr/sbin/grub-install --recheck $bootDevice

				#Re-run the grub installer again
				if /usr/sbin/grub-install --recheck --force $bootDevice
				then
					".sendClientLogStatus("Grub installation",true)."
				else
					grubRoot=$(echo \"find /boot/grub/stage1\" | grub --batch | grep hd | tr -d '[:blank:]')
					grubBoot=$(echo \$grubRoot | sed 's/,[0-9]*//')

					err=0
					echo \"root \$grubRoot\" | grub --batch
					err=$(expr \$err + $?)

					echo \"setup \$grubBoot\" | grub --batch
					err=$(expr \$err + $?)

					if [ \$err -eq 0 ]
					then
						".sendClientLogStatus("Grub installation (Fallback)",true)."
					else
					");
						if ($ignoreErrors)
							echo('echo "Grub installation: ERROR"');
						else
							echo(sendClientLogStatus("Grub installation",false,true));
						echo("
					fi
				fi
			fi

			# DebianVersionSpecific
			if [ $(grep -c 'Debian GNU/Linux 9' /etc/issue) -gt 0 ] || [ $(grep -c 'Debian GNU/Linux 8' /etc/issue) -gt 0 ] || [ $(grep xenial -c /etc/apt/sources.list) -gt 0 ]
			then
				/usr/sbin/update-grub2
				sync
				
				if [ $(lsb_release -c -s) = 'xenial' ] || [ $(lsb_release -i -s) = 'LinuxMint' ] || [ $(grep -c 'Debian GNU/Linux 9' /etc/issue) -gt 0 ]
				then
					sed -i 's/\(GRUB_CMDLINE_LINUX_DEFAULT=\"\)\([^\"]*\)\"/\\1\\2 net.ifnames=0\"/' /etc/default/grub
					update-grub
				fi

			else
				#write menu.lst
				/usr/sbin/update-grub -y

				#Some versions need it without \"-y\"
				if [ $? -ne 0 ]
				then
					/usr/sbin/update-grub
				fi

				#Make sure the root device is correct in menu.lst (if update-grub could not determine the root device /dev/hda1 is assumed)
				[ -f /boot/grub/menu.lst ] && sed -i 's#/dev/hda1#$rootDevice#g' /boot/grub/menu.lst

				#Check if there are kernels listed in menu.lst

				kernelsInGrub()
				{
					kernels=0
					[ -f /boot/grub/menu.lst ] && kernels=$( expr \$kernels + $(grep ^title /boot/grub/menu.lst -c))
					[ -f /boot/grub/grub.cfg ] && kernels=$( expr \$kernels + $(grep menuentry /boot/grub/grub.cfg -c))
					#echo \"++++Kerneleintraege: \$kernels\" > /dev/stderr
					
					echo \$kernels
				}

				#No kernels found?
				if [ \$(kernelsInGrub) -eq 0 ]
				then
					#Delete menu.lst and try to create it new
					rm /boot/grub/menu.lst 2> /dev/null
					/usr/sbin/update-grub -y

					#Some versions need it without \"-y\"
					if [ $? -ne 0 ]
					then
						/usr/sbin/update-grub
					fi
				fi

				if [ \$(kernelsInGrub) -gt 0 ]
				then
					".sendClientLogStatus("Grub: Kernels found in menu.lst",true)."
				else
					");
					if ($ignoreErrors)
						echo('echo "Grub: Kernels found in menu.lst: ERROR"');
					else
						echo(sendClientLogStatus("Grub: Kernels found in menu.lst",false,true));
					echo("
				fi
		");
			CLCFG_addGrubPassword();
		echo("
			fi
		");

// 		CLCFG_lilo2Grub();
	}
else
	{
		CLCFG_addLiloPassword();
		echo ("
			#write lilo
			if /sbin/lilo
			then
				".sendClientLogStatus("LILO installation ok",true)."
			else
				".CLCFG_createBootDeviceNode()."

				#awk -vORS='*': replace newlines by *
				#sed 's/*$//': remove the * at the end
				#sed 's/\*\*/\\n/g: convert back the double newline (**) to single newline
				awk -vORS='*' {print} /etc/lilo.conf | sed 's/*$//' | sed 's/\*\*/\\n/g' | awk '
				BEGIN {
				old=muh
				}

				{
					if (old != $0)
					{
						print($0\"\\n\");
						old=$0
					}
				}
				' | sed 's/*/\\n/g' > /tmp/lilo.conf

				cat /tmp/lilo.conf > /etc/lilo.conf


				if /sbin/lilo
				then
					".sendClientLogStatus("LILO installation ok",true)."
				else
				");
					if ($ignoreErrors)
						echo('echo "LILO installation: ERROR"');
					else
						echo(sendClientLogStatus("LILO installation ok",false,true));
				echo("
				fi
				
				#find all \"update-grub\" files
				for updategrub in `whereis update-grub | sed 's/ /\\n/g' | grep -v ':'` /usr/bin/update-grub
				do
					#Delete the original update-grub
					rm \"\$updategrub\" 2> /dev/null
					#Write a script that calls lilo
					echo \"#!/bin/sh
lilo\" > \"\$updategrub\"
					#Make it executable
					chmod +x \"\$updategrub\"
				done
			fi

#			/sbin/lilo -b $rootDevice
			");
	}

CLCFG_activateBOOT_DEGRADED();

echo ("
#Reactivate init
mv /sbin/init.deactivated /sbin/init

#check if the fstab file exists
if [ -f /etc/fstab ]
then
	".sendClientLogStatus("/etc/fstab was written",true)."
else
");
	if ($ignoreErrors)
		echo('echo "/etc/fstab was written: ERROR"');
	else
		echo(sendClientLogStatus("/etc/fstab was written",false,true));
echo("
fi

#activate swap
if swapon -a
then
	".sendClientLogStatus("activating swap",true)."
else
	".sendClientLogStatus("activating swap",false)."
fi\n
");

};





/**
**name CLCFG_interfaces($clientParams)
**description generates a script that writes the /etc/network/interfaces file.
**parameter clientParams: Associated array with the parameters of the client.
**/
function CLCFG_interfaces($clientParams)
{
//m23customPatchBegin type=change id=CLCFG_interfacesDhcpBootimage
	if ($clientParams['dhcpBootimage'] !== "gpxe")
//m23customPatchEnd id=CLCFG_interfacesDhcpBootimage
	{
		$clientIP = $clientParams['ip'];
		$gateway = $clientParams['gateway'];
		$netmask = $clientParams['netmask'];

		//check if there is set a gateway and set the command for the interfaces file
		if (!empty($gateway))
			$gatewayLine="gateway ".$gateway."\n";
		else
			$gatewayLine="";

		$eth0Config = "auto eth0
iface eth0 inet static
address $clientIP
netmask $netmask
network ".CLIENT_getSubnet($clientIP,$netmask)."
broadcast ".CLIENT_getBroadcast($clientIP,$netmask)."
pre-down /sbin/ethtool -s eth0 wol g
$gatewayLine";
		$netDownSED = EDIT_setOption('/etc/init.d/halt', 'NETDOWN', 'no');
	}
	else
	{
		$netDownSED = '';
		$eth0Config = "auto eth0
iface eth0 inet dhcp";
	}

		echo("
$netDownSED

rm /etc/network/interfaces 2> /dev/null

#removes old stored udev network device(s)
rm /etc/udev/rules.d/*persistent-net.rules 2> /dev/null

#contens of the interfaces file
cat >> /etc/network/interfaces << \"EOF\"

# /etc/network/interfaces -- configuration file for ifup(8), ifdown(8)
# generated by m23
# The loopback interface

auto lo
iface lo inet loopback

$eth0Config
EOF

#check if the interfaces file exists
if [ -f /etc/network/interfaces ]
then
	".sendClientLogStatus("/etc/network/interfaces was written",true)."
else
	".sendClientLogStatus("/etc/network/interfaces was written",false,true)."
fi

#activate loopback device
if ifconfig lo 127.0.0.1
	then
		".sendClientLogStatus("127.0.0.1 loopdevice setup",true)."
	else
		".sendClientLogStatus("127.0.0.1 loopdevice setup",false)."
fi
");

//m23customPatchBegin type=change id=CLCFG_interfacesDhcpBootimage2
	if ($clientParams['dhcpBootimage'] !== "gpxe")
//m23customPatchEnd id=CLCFG_interfacesDhcpBootimage2
	{
		echo("
		
		#set up the network interface
		if ifconfig eth0 $clientIP
			then
				".sendClientLogStatus("eth0 setup",true)."
			else
				".sendClientLogStatus("eth0 setup",false,true)."
			fi
		
		#set up routing
			route add -net default gw $gateway
		\n
		");
	}
	else
	{
		echo("
		dhclient

		for dhClientPID in `ps | grep dhclient | tr -s [:blank:] | cut -d' ' -f2`
		do
			kill -9 \$dhClientPID
		done

		killall -9 dhclient
		");
	}
};





/**
**name CLCFG_hostname()
**description generates a script that writes the /etc/hostname file.
**parameter clientName: the name of the client
**/
function CLCFG_hostname($clientName)
{

	echo ("
rm /etc/hostname 2> /dev/null

cat >> /etc/hostname << \"EOF\"
$clientName
EOF

hostname $clientName

if [ -f /etc/hostname ]
then
	".sendClientLogStatus("/etc/hostname was written",true)."
else
	".sendClientLogStatus("/etc/hostname was written",false,true)."
fi

if hostname $clientName
then
	".sendClientLogStatus("/etc/hostname was written",true)."
else
	".sendClientLogStatus("/etc/hostname was written",false)."
fi\n
");
};





/**
**name CLCFG_resolvConf($DNSServers)
**description generates a script that writes the /etc/resolv.conf file.
**parameter DNSServers: list of DNS servers
**/
function CLCFG_resolvConf($DNSServers)
{
	$nameserver="";


	for ($i=0; $i < count($DNSServers); $i++)
		{
			if (strlen($DNSServers[$i]) > 0)
				$nameserver.="nameserver ".$DNSServers[$i]."\n";
		};

	//Don't write an empty resolv.conf
	if (strlen($nameserver) == 0)
		return(false);

	echo("
rm /etc/resolv.conf 2> /dev/null

cat >> /etc/resolv.conf << \"EOF\"
$nameserver
".
//m23customPatchBegin type=change id=CLCFG_resolvConfAdditionalLinesInresolv.conf
//m23customPatchEnd id=CLCFG_resolvConfAdditionalLinesInresolv.conf
"EOF

# Make a backup of the resolv.conf file
cp /etc/resolv.conf /etc/resolv.conf.m23
mkdir -p /etc/NetworkManager/dispatcher.d
rm /etc/NetworkManager/dispatcher.d/m23restore-resolv.conf 2> /dev/null

# Create a script, that will copy the backup back
cat >> /etc/NetworkManager/dispatcher.d/m23restore-resolv.conf << \"EOF\"
#!/bin/bash
if [ $(diff -u /etc/resolv.conf.m23 /etc/resolv.conf | grep -e ^' ' -c) -eq 0 ]
then
	cat /etc/resolv.conf.m23 >> /etc/resolv.conf
fi
EOF
chmod +x /etc/NetworkManager/dispatcher.d/m23restore-resolv.conf

if [ -f /etc/resolv.conf ]
then
	".sendClientLogStatus("/etc/resolv.conf was written",true)."
else
	".sendClientLogStatus("/etc/resolv.conf was written",false,true)."
fi\n

");
};





/**
**name CLCFG_aptConf()
**description generates a script that writes the /etc/apt/apt.conf.d/70debconf file.
**parameter proxyServer: IP or name of the proxy server
**parameter proxyPort: port the proxy server listens on
**/
function CLCFG_aptConf($proxyServer,$proxyPort)
{

	echo("
rm /etc/apt/apt.conf.d/70debconf 2> /dev/null

cat >> /etc/apt/apt.conf.d/70debconf << \"EOF\"

//Pre-configure all packages with debconf before they are installed.
//If you don't like it, comment it out.
DPkg::Pre-Install-Pkgs {\"/usr/sbin/dpkg-preconfigure --apt || true\";};");

if (!empty($proxyServer))
echo ("
Acquire::http::Proxy \"http://$proxyServer:$proxyPort\";
Acquire::ftp::Proxy \"http://$proxyServer:$proxyPort\";");


echo ("
EOF

if [ -f /etc/apt/apt.conf.d/70debconf ]
then
	".sendClientLogStatus("/etc/apt/apt.conf.d/70debconf was written",true)."
else
	".sendClientLogStatus("/etc/apt/apt.conf.d/70debconf was written",false,true)."
fi\n
");
};





/**
**name CLCFG_sourceslist($clientIP,$clientName,$serverIP)
**description generates a script that writes the /etc/apt/sources.list file.
**parameter clientIP: IP of the client
**parameter clientName: name of the client
**parameter serverIP: IP of the server
**/
function CLCFG_sourceslist($clientIP,$clientName,$serverIP)
{
	$allOptions = CLIENT_getAllOptions($clientName);

	$sourceName = $allOptions['packagesource'];

	echo("

rm /etc/apt/sources.list 2> /dev/null
cat >> /etc/apt/sources.list << \"EOF\"

".SRCLST_genList($clientName)."

EOF

if [ -f /etc/apt/sources.list ]
then
	".sendClientLogStatus("/etc/apt/sources.list was written",true)."
else
	".sendClientLogStatus("/etc/apt/sources.list was written",false,true)."
fi

apt-get update 2>&1 | tee /tmp/m23sourceupdate.log\n
");
	MSR_logCommand("/tmp/m23sourceupdate.log");

	CLCFG_sourceslistCreateConfigFiles($sourceName);
};





/**
**name CLCFG_sourceslistCreateConfigFiles($sourceName)
**description Creates config files for the package manager.
**parameter sourceName: The name of the package source list
**/
function CLCFG_sourceslistCreateConfigFiles($sourceName)
{
	//Get the list of files to add
	$atf = SRCLST_getAddToFile($sourceName);

	//If the first entry has no file name, then nothing of value is in it
	if (!isset($atf[0]['file']))
		return(false);

	//Run thru the file names and texts
	foreach ($atf as $fileText)
	{
		echo("
rm \"$fileText[file]\" 2> /dev/null
cat >> \"$fileText[file]\" << \"EOF\"
$fileText[text]
EOF
chmod 755 \"$fileText[file]\"
	");
	}
}





/**
**name CLCFG_hwdetect($serverIP)
**description updates and runs the hardware detection
**/
function CLCFG_hwdetect()
{
	echo("
apt-get -m --force-yes -qq -y install hwsetup hwdata-knoppix > /dev/null

mkdir -p /etc/sysconfig

#Make sure that usleep exists
usleep 1 2> /dev/null
if [ $? -ne 0 ]
then
	touch /bin/usleep
	chmod +x /bin/usleep
fi

if [ $(lsmod | grep usbnet -c) -eq 0 ]
then
	if /sbin/hwsetup -p
	then
		".sendClientLogStatus("hardware detection",true)."
	else
		".sendClientLogStatus("hardware detection",false,true)."
	fi
fi
\n
");
	RAID_createMdadmConf();
};



// locales locales/locales_to_be_generated multiselect de_DE.UTF-8 UTF-8
// locales locales/default_environment_locale select de_DE.UTF-8

/**
**name CLCFG_language($lang, $release = null)
**description sets the language for keyboard in console and X11 and console language
**parameter lang: 2 letter language code (de,fr,it,en)
**parameter release: The release name of the distribution (for special handling).
**/
function CLCFG_language($lang, $release = null)
{

	$lV = I18N_getLangVars($lang);
	
	if ($release !== null)
	{
		switch($release)
		{
			// DebianVersionSpecific
			case 'wheezy':
			case 'jessie':
			case 'stretch':
				foreach ($lV as $var => $val)
				{
					$val = str_replace('utf', 'UTF', $val);
					$val = str_replace('UTF8', 'UTF-8', $val);
					$lV[$var] = $val;
				}
			break;
		}
	}


echo("

rm /etc/sysconfig/keyboard 2> /dev/null

loadkeys $lV[keymap]

#write knoppix config file
cat >> /etc/sysconfig/keyboard << \"EOF\"
KEYTABLE=\"$lV[keymap]\"
XKEYBOARD=\"$lV[xkeyboard]\"
KDEKEYBOARD=\"$lV[kdekeyboard]\"
EOF

install-keymap $lV[keymap]

#generate locales
echo \"$lV[locale]\" > /etc/locale.gen
#set environment file (LANG variable)
echo \"LANG=$lV[lang]
LANGUAGE=$lV[lang]
LC_ALL=$lV[lang]
GDM_LANG=$lV[lang]\" > /etc/environment


#Another fix for Ubuntu
cat /etc/locale.gen | xargs -n1 locale-gen

#Special handling for Debian Squeeze
#DebianVersionSpecific
if [ `grep \"Debian GNU/Linux 6.0\" /etc/issue -c` -eq 1 ] || [ `grep \"Debian GNU/Linux 7\" /etc/issue -c` -eq 1 ] || [ `grep \"Debian GNU/Linux 8\" /etc/issue -c` -eq 1 ] || [ `grep \"Debian GNU/Linux 9\" /etc/issue -c` -eq 1 ]
then
	rm /etc/environment /tmp/lg 2> /dev/null

	#Converts the entries of the m23 generated locale.gen to the new format
	cat /etc/locale.gen | while read l
	do
		#Find the old values in SUPPORTED and add the found entries to the temporary new locale.gen
		grep \"^\${l}\" /usr/share/i18n/SUPPORTED >> /tmp/lg
	done

	sort -u /tmp/lg > /etc/locale.gen
fi

#update-locale LANG=de_DE.UTF-8 LANGUAGE=de_DE.UTF-8

echo -e \"LANG=$lV[lang]
LANGUAGE=$lV[lang]
LC_ALL=$lV[lang]
GDM_LANG=$lV[lang]\" >/etc/default/locale

#Ubuntu fix
sed -i 's/-e//g' /etc/default/locale

echo 'PATH=\"/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games\"' >> /etc/environment

echo \"[Desktop]
Session=default
Language=$lV[lang]\" > /etc/skel/.dmrc

locale-gen

/etc/init.d/keymap.sh start

apt-get -m -y --force-yes install language-pack-$lV[packagelang]

#Change the skel so that the keyboard in KDE is set to the client's language settings
sed 's/DisplayNames=.*/DisplayNames=$lV[kdekeyboard]/g' /etc/skel/.kde/share/config/kxkbrc | sed 's/LayoutList=.*/LayoutList=$lV[kdekeyboard]/g' > /tmp/kxkbrc
cat /tmp/kxkbrc > /etc/skel/.kde/share/config/kxkbrc
rm /tmp/kxkbrc

#Another Ubuntu fix
cat /etc/locale.gen >> /var/lib/locales/supported.d/$lV[country]

locale-gen

apt-get -m -y --force-yes install console-setup
apt-get -m -y --force-yes install keyboard-configuration

variant=$(grep 'layout\*$lV[keymap]\*' /var/lib/dpkg/info/console-setup.config | cut -d'*' -f4)

echo \"console-setup console-setup/variant select \$variant
console-setup console-setup/layout select \$variant
console-setup console-setup/layoutcode string $lV[keymap]
console-setup console-setup/modelcode string pc105
console-setup console-setup/ask_detect boolean false
console-setup console-setup/charmap select UTF-8
console-setup console-setup/model select Generic 105-key (Intl) PC\" > /tmp/consolesetup.debconf

#Layout must be written to console-setup, debconf values will be ignored, if a mismatch exists.
sed -i 's/XKBLAYOUT=.*/XKBLAYOUT=\"$lV[xkeyboard]\"/g' /etc/default/console-setup
sed -i 's/XKBLAYOUT=.*/XKBLAYOUT=\"$lV[xkeyboard]\"/g' /etc/default/keyboard

layout=$(grep '$lV[country]\*layout\*$lV[country]' /var/lib/dpkg/info/keyboard-configuration.config | cut -d'*' -f4)
variant=$(grep '$lV[country]\*variant\*$lV[country]' /var/lib/dpkg/info/keyboard-configuration.config | cut -d'*' -f5 | head -1)

echo \"keyboard-configuration keyboard-configuration/layout select \$layout
keyboard-configuration keyboard-configuration/xkb-keymap select $lV[xkeyboard]
keyboard-configuration keyboard-configuration/variant select \$variant
keyboard-configuration keyboard-configuration/unsupported_options boolean true
keyboard-configuration keyboard-configuration/ctrl_alt_bksp boolean false
keyboard-configuration keyboard-configuration/modelcode string pc105
keyboard-configuration keyboard-configuration/model select Generic 105-key (Intl) PC
keyboard-configuration keyboard-configuration/layoutcode string $lV[country]
keyboard-configuration keyboard-configuration/store_defaults_in_debconf_db boolean true\" > /tmp/keyboard-configuration.debconf

debconf-set-selections /tmp/consolesetup.debconf
debconf-set-selections /tmp/keyboard-configuration.debconf

dpkg-reconfigure console-setup
dpkg-reconfigure keyboard-configuration

\n
");

CLCFG_aptGet('install', 'console-setup keyboard-configuration');

};





/**
**name CLCFG_setRootPassword($cryptedPassword)
**description sets the root password of the client
**parameter cryptedPassword: sets an allready crypted root password
**/
function CLCFG_setRootPassword($cryptedPassword)
{
	echo("
echo 'root:$cryptedPassword:12106:0:99999:7:::' > /tmp/shadow.new\n\n

grep -v root /etc/shadow >> /tmp/shadow.new

cat /tmp/shadow.new > /etc/shadow

chgrp shadow /etc/shadow

chmod 640 /etc/shadow

if [ ! -f /etc/sudoers ] || [ `grep root /etc/sudoers -c` -eq 0 ]
then
	echo \"root ALL=(ALL) ALL\" >> /etc/sudoers
fi

\n
");
};





/**
**name CLCFG_setAuthorized_keys($serverIP,$pathToKeyFile)
**description sets the ssh authorized_file for remote login into the clients
**parameter serverIP: IP of the server
**parameter $pathToKeyFile: path on the server where to get the key file from
**/
function CLCFG_setAuthorized_keys($serverIP,$pathToKeyFile)
{
// 	$quiet = ($_SESSION['debug'] ? "": "-qq"); ööö
$quiet = '-d';

	echo("
mkdir -p /root/.ssh
# /etc/ssh/
chmod 700 /root/.ssh
#Make sure sshd_config exists to remove complaining
#touch /etc/ssh/sshd_config

wget $quiet -O - \"https://$serverIP$pathToKeyFile\" >> /root/.ssh/authorized_keys

chmod 700 /root/.ssh/authorized_keys
chown root /root/.ssh/authorized_keys
chgrp root /root/.ssh/authorized_keys

\n
".EDIT_replace("/etc/ssh/sshd_config", "ChallengeResponseAuthentication no", "ChallengeResponseAuthentication yes","g")."
".EDIT_commentoutAll('/etc/ssh/sshd_config', 'PermitRootLogin', '#')."
".EDIT_appendToFile('/etc/ssh/sshd_config', 'PermitRootLogin without-password')."
".EDIT_commentoutAll('/etc/ssh/sshd_config', 'PubkeyAcceptedKeyTypes', '#')."
".EDIT_appendToFile('/etc/ssh/sshd_config', 'PubkeyAcceptedKeyTypes=+ssh-dss'));
};





/**
**name CLCFG_copyClientPackageStatus($clientName)
**description copies the package installation status file from the lient to the cache directory of the server
**parameter clientName: the name of the client
**/
function CLCFG_copyClientPackageStatus($clientName)
{
	//check if the necessary directories do exist and make them
	if (!is_dir("/m23/var/cache/clients"))
			mkdir("/m23/var/cache/clients");
	if (!is_dir("/m23/var/cache/clients/$clientName"))
			mkdir("/m23/var/cache/clients/$clientName");

	$ip = CLIENT_getIPbyName($clientName);

	$cmd="sudo scp -o VerifyHostKeyDNS=no -o PreferredAuthentications=publickey -o PasswordAuthentication=no -o CheckHostIP=no -o BatchMode=yes -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -C root@$ip:/var/lib/dpkg/status /m23/var/cache/clients/$clientName/packageStatus";

	exec($cmd);
};





/**
**name CLCFG_aptGet($command, $packages)
**description Executes an APT command with parameters and tries to install/remove as many packages as possible. If the packages could not get installed in a bunch try to install the packges one by one.
**parameter command: install or remove
**parameter packages: white space seperated list of packages to install or remove
**/
function CLCFG_aptGet($command, $packages, $critical = false)
{
	echo("
	export DEBIAN_FRONTEND=noninteractive

	(apt-get -y -m --force-yes $command $packages 2>&1; echo $? > /tmp/m23apt.ret) | tee /tmp/m23apt.log
	");
	
	if ("install" == $command)
	echo("
	####################################################################
	# Special handling of the Ubuntu \"Hash Sum mismatch\" error       #
	# As suggested in http://ubuntuforums.org/showthread.php?p=9969508 #
	####################################################################
	if [ `grep -c 'Hash Sum mismatch' /tmp/m23apt.log` -gt 0 ]
	then
		apt-get update
		(apt-get -y -m --force-yes $command $packages 2>&1; echo $? > /tmp/m23apt.ret) | tee /tmp/m23apt.log
	fi

	if [ `grep -c 'Hash Sum mismatch' /tmp/m23apt.log` -gt 0 ]
	then
		apt-get update -o Acquire::http::No-Cache=True
		apt-get update
		(apt-get -y -m --force-yes $command $packages 2>&1; echo $? > /tmp/m23apt.ret) | tee /tmp/m23apt.log
	fi

	if [ `grep -c 'Hash Sum mismatch' /tmp/m23apt.log` -gt 0 ]
	then
		apt-get update -o Acquire::BrokenProxy=true
		apt-get update
		(apt-get -y -m --force-yes $command $packages 2>&1; echo $? > /tmp/m23apt.ret) | tee /tmp/m23apt.log
	fi
	");
	

	echo("
	if [ `cat /tmp/m23apt.ret` -ne 0 ]
	then
		for pkg in $packages
		do
			apt-get -y -m --force-yes $command \$pkg
		done
	fi
	");

	echo("
	if [ `cat /tmp/m23apt.ret` -eq 0 ]
	then
		".sendClientLogStatus("apt-get $command $packages",true,false)."
	else
		");
		MSR_logCommand('/tmp/m23apt.log');
		echo("
		".sendClientLogStatus("apt-get $command $packages",false,$critical)."
	fi
	");
};





/**
**name CLCFG_importLocalPoolKey()
**description Generates BASH code to import the local package pool key (if it exists) on the client's APT system.
**returns BASH code to import the local package pool key or empty string, if there is no package pool sign key.
**/
function CLCFG_importLocalPoolKey()
{
	if (!file_exists(CGPGSign::POOLSIGNKEYFILE)) return('');

	$serverIP = getServerIP();

	$url = str_replace('/m23/data+scripts/', "http://$serverIP/", CGPGSign::POOLSIGNKEYFILE);
	return("wget -T1 -t1 -q $url -O - | apt-key add -");
}





/**
**name CLCFG_installBasePackages($packagelist)
**description installs needed base packages
**parameter packagelist: the list of the packages to install
**parameter keyring: name of the keyring package
**/
function CLCFG_installBasePackages($packagelist, $keyring="debian-keyring")
{
	echo("
	#Deactivate init
	mv /sbin/init /sbin/init.deactivated

	#Make sure, ischroot will return 2 to stop sysvinit from shuting down the installation
	mv /usr/bin/ischroot /usr/bin/ischroot.deactivated

	#set these options to make the kerne install without user interverntion
	echo \"do_initrd = Yes\" >> /etc/kernel-img.conf

	#echo \"no_symlink = Yes\" >> /etc/kernel-img.conf #neu

	#echo \"link_in_boot = Yes\" >> /etc/kernel-img.conf #neu

	echo \"warn_initrd = No\" >> /etc/kernel-img.conf

	echo \"silent_loader = Yes\" >> /etc/kernel-img.conf

	echo \"silent_modules = Yes\" >> /etc/kernel-img.conf

	echo \"do_bootloader = Yes\" >> /etc/kernel-img.conf

	echo \"do_bootfloppy = No\" >> /etc/kernel-img.conf
	
	echo \"do_boot_enable = No\" >> /etc/kernel-img.conf

	".CLCFG_createBootDeviceNode()."
	mount /sys

	wget -T1 -t1 -q http://m23.sourceforge.net/m23-Sign-Key.asc -O - | apt-key add -

	".CLCFG_importLocalPoolKey()."

	");

	CLCFG_aptGet("upgrade", "");

	CLCFG_aptGet("install","$packagelist");

	CLCFG_aptGet("install","$keyring screen dialog gnupg sudo");

	CLCFG_aptGet("install","ethtool");

	CLCFG_aptGet("install","isc-dhcp-client");
	
	echo("
		wget -T1 -t1 -q http://m23.sourceforge.net/m23-Sign-Key.asc -O - | apt-key add -

		".CLCFG_importLocalPoolKey()."

		dpkg-reconfigure sudo

		dpkg-reconfigure openssh-server

		if [ -f '/lib/systemd/system/ssh@.service' ] && [ $( grep -c 'KillMode=process' '/lib/systemd/system/ssh@.service') -eq 0 ]
		then
			# Needed by SSH server under systemd. Otherwise screen sessions that are started via SSH are stopped when the SSH disconnects
			echo 'KillMode=process' >> '/lib/systemd/system/ssh@.service'
			
			loginctl enable-linger root
		fi
	");

	CLCFG_aptGet("install","man nano");

	echo("\nchmod 755 /var/run/screen

	#Reactivate init
	mv /sbin/init.deactivated /sbin/init
	mv /usr/bin/ischroot.deactivated /usr/bin/ischroot

	rm /var/log/exim4/paniclog 2> /dev/null
	
	\n");

	CLCFG_disableAvahiDaemon();

	CLCFG_setDebConfDirect('dash dash/sh boolean false');
	echo("\ndpkg-reconfigure dash\n");
};





/**
**name CLCFG_setDebconf($serverIP,$debconfFile)
**description installs the debconf packages and sets debconf configuration
**parameter serverIP: IP of the server, where to download the config file
**parameter debconfFile: path and filename of the debconf file
**/
function CLCFG_setDebconf($serverIP,$debconfFile)
{
	$quiet = ($_SESSION['debug'] ? "": "-qq");

	echo("

	apt-get update

	apt-get -m --force-yes -y install debconf-utils
	apt-get -m --force-yes -y install dialog

	if [ -f /usr/bin/debconf-set-selections ]
	then
		echo \"debconf-set-selections found\"
	else
		apt-get -m --force-yes -y install m23-debconf-woody wget
	fi

	rm /tmp/m23client-debconf 2> /dev/null

	wget $quiet https://$serverIP$debconfFile -O /tmp/m23client-debconf

	export PATH=\$PATH:/usr/bin

	debconf-set-selections /tmp/m23client-debconf

	export DEBIAN_FRONTEND=noninteractive

	dpkg-reconfigure passwd

	");
};


/**
**name CLCFG_debootstrap($suite,$DNSServers,$gateway,$packageProxy,$packagePort,$mirror="",$arch="i386",$exclude="",$include="")
**description bootstraps a Debian system
**parameter suite: select the Debian suite (sarge, sid, woody, potato)
**parameter DNSServers: DNS server for resolving the names of the installation server
**parameter gateway: gateway for fetching the packages
**parameter packageProxy: the ip of the proxy the packages should be fetched from
**parameter packagePort: the proxy port
**parameter mirror: the Debian mirror the packages should be fetched from
**parameter arch: the computer architecture of the client
**parameter exclude: packages to exclude (as comma-seperated list)
**parameter include: additional packages to include
**parameter isCritical: selects if debootstrap errors should be critical
**parameter additionalPackages: space seperated list of additional packages that should be installed during bootstrapping
**/
function CLCFG_debootstrap($suite,$DNSServers,$gateway,$packageProxy,$packagePort,$mirror="",$arch="i386",$exclude="",$include="dialog libncursesw5 parted wget apt",$isCritical=false,$additionalPackages="dialog libncursesw5 parted wget apt",$updateFkt=CLCFG_updateDebootstrapScriptsDebian)
{
	$serverIP = getServerIP();
	$quietWget = ($_SESSION['debug'] ? "": "-qq");

	//set resolv.conf in ramdisk
	CLCFG_resolvConf($DNSServers);

	$debootstrapWWW=$updateFkt($m23debootstrapDir);
	
	if ($arch != "i386")
		$pkgdetailsArch="-amd64";
	else
		$pkgdetailsArch="";

	if (isset($gateway{1}))
	echo("
			route add -net default gw $gateway 2> /dev/null\n\n");

	echo("
			mkdir -p /usr/lib/debootstrap/scripts

			#copy debootstrap files

			rm /bin/debootstrap 2> /dev/null

			wget $quietWget http://$serverIP/$debootstrapWWW/debootstrap -O /bin/debootstrap

			chmod +x /bin/debootstrap

			wget $quietWget http://$serverIP/$debootstrapWWW/devices.tar.gz -O /usr/lib/debootstrap/devices.tar.gz

			wget $quietWget http://$serverIP/$debootstrapWWW/pkgdetails$pkgdetailsArch -O /usr/lib/debootstrap/pkgdetails

			chmod 777 /usr/lib/debootstrap/pkgdetails

			wget $quietWget http://$serverIP/$debootstrapWWW/arch -O /usr/lib/debootstrap/arch

			wget $quietWget http://$serverIP/$debootstrapWWW/functions -O /usr/lib/debootstrap/functions

			wget $quietWget http://$serverIP/$debootstrapWWW/scripts/$suite -O /usr/lib/debootstrap/scripts/$suite

			ln -s /usr/lib/debootstrap /usr/share
		");

		if (!empty($packageProxy))
		echo("
			export http_proxy=\"http://$packageProxy:$packagePort\"

			export ftp_proxy=\"http://$packageProxy:$packagePort\"
			");
			
		$addParams="";
			
		if (!empty($exclude))
			$addParams.=" --exclude=\"$exclude\" ";
			
		if (!empty($include))
			$addParams.=" --include=\"$include\" ";

		$debootstrapCacheFile = PKG_getDebootstrapCacheFilename($suite, $arch);

		if (file_exists(PKG_getDebootstrapCacheServerFile($suite, $arch)))
			$debootstrapCacheFileURL = PKG_getDebootstrapCacheServerURL($suite, $arch);
		else
		{
// 			$debootstrapCacheFileURL = PKG_getDebootstrapCacheSfURL($suite, $arch);
			PKG_downloadBaseSysTom23Server($suite, $arch);
			$debootstrapCacheFileURL = PKG_getDebootstrapCacheServerURL($suite, $arch);
		}

		echo("
			rm -r * 2> /dev/null
			
			ret=1
			try=0

			# Try for 60 minutes to fetch the cache file
			while [ \$ret -ne 0 ] && [ \$try -lt 60 ]
			do
				wget $debootstrapCacheFileURL -o /tmp/debootstrapCache.log -O $debootstrapCacheFile
				ret=\$?
				
				if [ \$ret -eq 0 ]
				then
					break
				fi
				
				try=$[ \$try + 1 ]
				sleep 60
			done

			if [ \$ret -ne 0 ]
			then
				".sendClientLogStatus("Download of base system error: $debootstrapCacheFileURL", false, true)."
			else
				".sendClientLogStatus("Download of base system OK: $debootstrapCacheFileURL",true)."
			fi
			
			ret=$(grep -c sourceforge.net $debootstrapCacheFile)
#			try=0

#			while [ `grep \"404 Not Found\" -c /tmp/debootstrapCache.log` -eq 0 ] && [ $(grep -c sourceforge.net $debootstrapCacheFile) -lt  2 ] && [ \$ret -ne 0 ] && [ \$try -lt 10 ]
#			do
#				wget -c $debootstrapCacheFileURL -o /tmp/debootstrapCache.log -O $debootstrapCacheFile
#				ret=\$?
#				try=`expr \$try + 1`
#			done

			if [ \$ret = 0 ]
			then
				mkdir m23-time
				date +%s > m23-time/debootstrap7z.start

				7zr x -so $debootstrapCacheFile | tar xp --same-owner
				if [ $? -ne 0 ]
				then
					".sendClientLogStatus("Extration of base system error: $debootstrapCacheFile", false, true)."
				else
					".sendClientLogStatus("Extration of base system OK: $debootstrapCacheFile",true)."
				fi
				rm $debootstrapCacheFile

				date +%s > m23-time/debootstrap7z.stop
			else
				#so dialog is available after change root
				export additional=\"apt $additionalPackages\"

#				mkdir m23-time
#				date +%s > m23-time/debootstrap.start
				
				debootstrap --arch $arch $addParams $suite . $mirror 2>&1 | tee /tmp/m23debootstrap.log
				try=0
	
				#Execute until debootstrap was executed sucessfully or 10 times
				while [ `grep -c \"t download package\" /tmp/m23debootstrap.log` -gt 0 ] && [ \$try -lt 10 ]
				do
					debootstrap --arch $arch $addParams $suite . $mirror 2>&1 | tee /tmp/m23debootstrap.log
					try=`expr \$try + 1`
				done

#				date +%s > m23-time/debootstrap.stop

				if [ -f usr/bin/apt-get ]
					then
						".sendClientLogStatus("debootstrap APT check",true)."
					else
						".sendClientLogStatus("debootstrap APT check",false,true /*allways critical*/)."
				fi
			fi

			unset http_proxy

			unset ftp_proxy
			\n
	");
};





/**
**name CLCFG_downgradeExt()
**description downgrades all ext* partitions so the fsck.ext* of woody can understand it
**/
function CLCFG_downgradeExt()
{
	$serverIP = getServerIP();
	$quietWget = ($_SESSION['debug'] ? "": "-qq");

echo("
	wget $quietWget http://$serverIP/distr/debian/tune2fs -O /tmp/tune2fs

	chmod +x /tmp/tune2fs

	`grep ext3 /etc/fstab | cut -d' ' -f1 | awk '{print\"/tmp/tune2fs -O ^dir_index \"\$0 }'`

	`grep ext2 /etc/fstab | cut -d' ' -f1 | awk '{print\"/tmp/tune2fs -O ^dir_index \"\$0 }'`

	");
};





/**
**name CLCFG_mountRootDir($rootDev, $mountPoint, $CFDiskIOO = false)
**description create a new directory for mounting the root partition of the client, mount the installation directory to this mount point and create a temp directory
**parameter rootDev: the root device (e.g. /dev/hda1)
**parameter mountPoint: directory under /mnt to mount the device in
**parameter CFDiskIOO: Client object (used for mounting the EFI boot partition).
**/
function CLCFG_mountRootDir($rootDev, $mountPoint, $CFDiskIOO = false)
{
	echo("
			mkdir -p /mnt/$mountPoint

			#check if the device was mounted before and unmounts it if it was mounted
			if [ `grep /mnt/$mountPoint /proc/mounts |awk '{print \$i}' | wc -l` -gt 0 ]
			then
				umount /mnt/$mountPoint
			fi

			if mount $rootDev /mnt/$mountPoint
				then
 					".sendClientLogStatus("$rootDev on $mountPoint mounted",true)."
				else
 					".sendClientLogStatus("$rootDev on $mountPoint mounted",false,true)."
			fi

			mkdir -p /mnt/$mountPoint/tmp
			cd /mnt/$mountPoint\n
	");

	// Check, if $CFDiskIOO contains an object
	if (is_object($CFDiskIOO))
	{
		$efiBootMountPoint = "/mnt/$mountPoint/boot/efi";

		// Mount the EFI boot partition, if the client is in UEFI mode
		if ($CFDiskIOO->isUEFIActive())
		echo("
			mkdprobe vfat
			
			mount /proc

			mkdir -p $efiBootMountPoint

			mount -t vfat ".$CFDiskIOO->getEFIBootPartDev()." $efiBootMountPoint
		");
	}
};





/**
**name CLCFG_activateDMA()
**description try to activate DMA to speed up installation. this short script tries to detect
**/
function CLCFG_activateDMA()
{
	echo("
	
	for dev in a b c d e f g h i j k l m n o p q r s t u v w x y z
	do
		if hdparm -i /dev/hd\$dev  2> /dev/null | grep mdma1;
			then
				hdparm -d1 /dev/hd\$dev
				hdparm -c1 /dev/hd\$dev
				".sendClientLogStatus("/dev/hd\$dev: DMA activated",true)."
		fi
	done
	");
};





/**
**name CLCFG_fetchm23BasicTools()
**description fetches the basic m23 tools and fsize
**/
function CLCFG_fetchm23BasicTools()
{
	echo("

#copy wait4go	
cp /bin/wait4go /mnt/root/bin/

cp /bin/checkdisklabel /bin/dmidecode /mnt/root/bin
\n");
};





/**
**name CLCFG_dialogGaugeProcPos($backtitle, $title, $message, $infofilecmd, $fullsize, $force=false)
**description Generates the BASH code for showing a dialog with status bar that uses /proc/pid/fdinfo for current file position
**parameter backtitle: title on top of the screen
**parameter title: message title
**parameter message: message to show over the status bar
**parameter infofilecmd: BASH code to figure out the needed status file in the proc filesystem
**parameter fullsize: The full size of the file that should be written.
**parameter force: Forces showing of the dialog box
**/
function CLCFG_dialogGaugeProcPos($backtitle, $title, $message, $infofilecmd, $fullsize, $force=false)
{
	echo("
	
	echo | dialog --backtitle \"$backtitle\" --title \"$title\" --gauge \"$message\" 6 70 0
	sleep 2
	
	infofile=`$infofilecmd`

	(
	while [ -e \$infofile ]
	do
	sleep 2
	pos=`cat \$infofile | grep pos | tr -d [:blank:] | cut -d':' -f2 2>/dev/null`
	fsize=$fullsize
	PCT=`echo \$pos | awk -vOFMT=\"%.100g\" -vsize=\$fsize '{print(($0 / size) * 100)}'`
echo \"XXX\"
echo \$PCT  | cut -d'.' -f1
echo \"$message\"
echo \"XXX\"");
	MSR_statusBarCommand("\$PCT", "$message");
echo("
	done
	) | dialog --backtitle \"$backtitle\" --title \"$title\" --gauge \"$message\" 6 70 0
");
}





/**
**name CLCFG_dialogInfoBox($backtitle, $title, $message)
**description generates the BASH code for showing an dialog infobox
**parameter backtitle: title on top of the screen
**parameter title: message title
**parameter message: the message itself
**parameter force forces showing of the dialog box
**/
function CLCFG_dialogInfoBox($backtitle, $title, $message,$force=false, $percent=50)
{
	CLCFG_dialogAllBox($backtitle, $title, $message, "infobox", $force, $percent);
};





/**
**name CLCFG_dialogMsgBox($backtitle, $title, $message)
**description generates the BASH code for showing an dialog message box
**parameter backtitle: title on top of the screen
**parameter title: message title
**parameter message: the message itself
**parameter force forces showing of the dialog box
**/
function CLCFG_dialogMsgBox($backtitle, $title, $message,$force=false, $percent=50)
{
	CLCFG_dialogAllBox($backtitle, $title, $message, "msgbox", $force, $percent);
};





/**
**name CLCFG_dialogAllBox($backtitle, $title, $message, $type)
**description generates the BASH code for showing different types of dialog boxes
**parameter backtitle: title on top of the screen
**parameter title: message title
**parameter message: the message itself
**parameter type: type of the dialog box
**/
function CLCFG_dialogAllBox($backtitle, $title, $message, $type, $force)
{
	if ((RMV_get("debug")!=1) || $force)
		echo("dialog --backtitle \"$backtitle\"  --title \"$title\"  --$type \"\\n $message\" 6 70\n");

	MSR_statusBarCommand("", $message);
};





/**
**name CLCFG_executeAfterChroot()
**description prepares for pivot_root and does it and executes afterChroot
**/
function CLCFG_executeAfterChroot()
{
echo("
mkdir -p /mnt/root/oldroot

mkdir -p /mnt/root/tmp/preChroot

cp /tmp/screen* /mnt/root/tmp/preChroot
cp /tmp/screen* /mnt/root/tmp

cp -dpr /.screen /mnt/root/
mkdir -p /mnt/root/var/run/screen/S-root
cp -dpr /.screen/* /mnt/root/var/run/screen/S-root
chmod 700 /mnt/root/var/run/screen/S-root

cd /mnt/root

#change root
pivot_root . oldroot

mkdir -p /proc

mount /proc

#start afterChrootInstall.sh
/tmp/afterChrootInstall.sh\n");
};





/**
**name CLCFG_writeCrontabm23fetchjobEvery5Minutes()
**description Adds entries to crontab to check every 5 minutes for new jobs.
**/
function CLCFG_writeCrontabm23fetchjobEvery5Minutes($clientParams)
{
	if ($clientParams['dhcpBootimage'] == "gpxe")
echo('
echo "*/5 * * * * root screen -dmS m23fetchjob /etc/init.d/m23fetchjob" >> /etc/crontab
');
}





/**
**name CLCFG_writeM23fetchjob($release)
**description generates the m23fetchjob script
**parameter release: Name of the distribution release for special handling of some releases.
**/
function CLCFG_writeM23fetchjob($release = 'none')
{
	switch ($release)
	{
		case 'xenial':
			$RequiredStart = "\\\$syslog \\\$remote_fs";
			$RequiredStop = "\\\$syslog \\\$remote_fs";
			$DefaultStart = "2 3 4 5";
			break;
		default:
			$RequiredStart = "\\\$network \\\$local_fs";
			$RequiredStop = "\\\$network \\\$local_fs";
			$DefaultStart = "S";
			break;
	}

echo("
export > /CLCFG_writeM23fetchjob.log #üüü

#write the m23fetchjob script
echo \"#!/bin/bash

### BEGIN INIT INFO
# Provides:   m23fetchjob
# Required-Start:	$RequiredStart
# Required-Stop:	$RequiredStop
# Default-Start:	$DefaultStart
# Default-Stop:
# X-Interactive:	true
# Short-Description: Fetches jobs from the m23 server
### END INIT INFO

# /etc/init.d/m23fetchjob
# Fetches jobs from the m23 server
# (C) Hauke Goos-Habermann <hhabermann@pc-kiel.de>

if [ \`screen -ls | grep -c m23fetchjob\` -gt 1 ]
then
	exit 0
fi

if [ \\$# -gt 0 ] && [ \\$1 != \\\"start\\\" ]
then
	exit 0
fi

m23fetchjob ".getServerIP()." \" > /etc/init.d/m23fetchjob
chmod +x /etc/init.d/m23fetchjob

#link it to get it executed on enery start
rm /etc/rcS.d/S42m23fetchjob 2> /dev/null
ln -s ../init.d/m23fetchjob /etc/rcS.d/S42m23fetchjob

rm /sbin/m23fetchjob 2> /dev/null

cat >> /sbin/m23fetchjob << \"MFJEOF\"
#!/bin/bash
export PATH=/sbin:/usr/sbin:/usr/local/sbin:/bin:/usr/bin:/usr/local/bin

".MSR_curDynIPCommand(true)."

cd /tmp
rm work.php* 2> /dev/null

wget -t2 -w5 https://\$1/work.php\$idvar -O work.php
chmod +x work.php
./work.php
exit

MFJEOF

chmod 755 /sbin/m23fetchjob
chmod +x /sbin/m23fetchjob

\n
");

	// DebianVersionSpecific
	switch ($release)
	{
		case 'xenial':
			echo("\nfind /etc/rc* | grep m23fetchjob | xargs rm\nupdate-rc.d m23fetchjob defaults\nsystemctl enable m23fetchjob\n");
		break;

		case 'stretch':
			echo("\ndpkg-reconfigure m23-initscripts\n");
		break;
	}
}





/**
**name CLCFG_hideKernelWarnings()
**description hides the kernel warnungs
**/
function CLCFG_hideKernelWarnings()
{
echo ("

kernel=`uname -r`

mkdir -p /lib/modules/\$kernel

touch /lib/modules/\$kernel/modules.dep

");
};





/**
**name CLCFG_getRootDeviceFS($rootDevice,$clientName)
**description Gets the filesystem of the root device.
**parameter rootDevice: the device, the kernel should be installed on
**parameter clientName: the name of the client
**returns Filesystem of the root device.
**/
function CLCFG_getRootDeviceFS($rootDevice,$clientName)
{
	$param = FDISK_getPartitions($clientName);
	FDISK_dev2LDevLPart($param,$rootDevice,$vDev,$vPart);
	$fs = $param["dev$vDev"."part$vPart"."_fs"];
	return($fs);
}





/**
**name CLCFG_genFakeFstab($rootDevice,$clientName)
**description generates a fake /etc/fstab that only contains the lines for proc and the root partition (this is used to make the kernel install correctly)
**parameter rootDevice: the device, the kernel should be installed on
**parameter clientName: the name of the client
**/
function CLCFG_genFakeFstab($rootDevice,$clientName)
{
	$param = FDISK_getPartitions($clientName);
	FDISK_dev2LDevLPart($param,$rootDevice,$vDev,$vPart);
	
	$fs = $param["dev$vDev"."part$vPart"."_fs"];
	
	
	echo ("
	rm /etc/fstab 2> /dev/null
	
	cat >> /etc/fstab << \"FSTABEOF\"

proc /proc proc defaults 0 0
$rootDevice / $fs defaults 0 1

FSTABEOF

".CLCFG_makeDev()."

");

};





/**
**name CLCFG_copySSLCert($rootPath="/mnt/root", $disableSSLCertCheck = false)
**description fetches the SSL certificate from the server and copies it to the client
**parameter rootPath: the path to where the root directory is mounted
**parameter disableSSLCertCheck: Disables the SSL certificate check of wget.
**/
function CLCFG_copySSLCert($rootPath="/mnt/root", $disableSSLCertCheck = false)
{
	$serverIP = getServerIP();
	$quietWget = ($_SESSION['debug'] ? "": "-qq");

	//Determine, if the SSL certificate check is diabled globally for all clients.
	if (SERVER_isSSLCertCheckDisabled())
		$disableSSLCertCheck = true;

	if ($_SESSION['m23Shared'])
		$extraDir = "/$serverIP";
	else
		$extraDir = "";


	//Prepare the directories for the SSL certificates
echo("
mkdir -p $rootPath/etc/ssl/certs
mkdir -p $rootPath/usr/lib/ssl
mkdir -p $rootPath/usr/local/share/ca-certificates/m23

ln -s /etc/ssl/certs $rootPath/usr/lib/ssl
");


	//Read the hash value of the certificate (without white spaces)
	$f = fopen("/m23/data+scripts/packages/baseSys$extraDir/ca.hash","r");
	while ($hash = trim(fgets($f)))
	{
		//Skip empty lines
		if (!isset($hash{1}))
			continue;
	
		echo("
wget $quietWget -O$rootPath/etc/ssl/certs/$hash.0 \"https://$serverIP/packages/baseSys$extraDir/ca.crt\"
if [ $? -gt 0 ]
then
	wget $quietWget --no-check-certificate -O$rootPath/etc/ssl/certs/$hash.0 \"https://$serverIP/packages/baseSys$extraDir/ca.crt\"
fi

# Copy the certificate to CAcert
cp $rootPath/etc/ssl/certs/$hash.0 $rootPath/usr/local/share/ca-certificates/m23/m23server.crt
");
	}

	fclose($f);
//m23customPatchBegin type=change id=CLCFG_copySSLCertSSLCertificatesPermissions
	//Set permission the directories for the SSL certificates
echo("
chmod -R 755 $rootPath/etc/ssl/certs $rootPath/usr/lib/ssl/certs $rootPath/usr/local/share/ca-certificates/m23
chown -R root $rootPath/etc/ssl/certs $rootPath/usr/lib/ssl/certs $rootPath/usr/local/share/ca-certificates/m23
chgrp -R root $rootPath/etc/ssl/certs $rootPath/usr/lib/ssl/certs $rootPath/usr/local/share/ca-certificates/m23
\n
");
//m23customPatchEnd id=CLCFG_copySSLCertSSLCertificatesPermissions

$notFirst = false;
$greps = '';

//Generate Ubuntu matching greps from 11.04 to <current year>10
for ($year = 11; $year <= date('y'); $year++)
{
	if ($notFirst)
		$greps .= " || ";
	else
		$notFirst = true;
	
	$greps .= "[ `grep -i 'Ubuntu $year.04' $rootPath/etc/issue -c` -gt 0 ] || [ `grep -i 'Ubuntu $year.10' $rootPath/etc/issue -c` -gt 0 ]";
}

//Disable checks for Linux Mint 11 and above
$greps .= ' || ( [ $(grep \'Mint\' /etc/issue -c) -gt 0 ] && [ $(sed \'s/[^0-9]//g\' /etc/issue) -gt 10 ] )';

if ($disableSSLCertCheck || HELPER_isExecutedOnUCS())
	$greps .= ' || true';

echo("
if $greps
then
	echo 'check_certificate = off' >> $rootPath/etc/wgetrc
fi
");


};





/**
**name CLCFG_changeUser($username, $password="", $groups="", $newUserName="")
**description changes the settings of an useraccount on a client
**parameter userName: the (old) username for the account
**parameter password: the new unecrypted password for the account
**parameter newUserName: the new username
**/
function CLCFG_changeUser($username, $password="", $newUserName="")
{
	if ($username == $newUserName)
		$newUserName="";

	if (!empty($password))
		{
			//change the password
			if ($username != "root")
				$cpass = encryptShadow($username,$password);
			else
				$cpass = $password;
			echo("
					usermod -p '$cpass' $username
					if [ $? -eq 0 ]
					then
						".sendClientLogStatus("Changing password for user \"$username\"",true)."
					else
						".sendClientLogStatus("Changing password for user \"$username\"",false)."
					fi
				");
		};

	if (!empty($newUserName))
		{
			//change the username
			echo("
					usermod -l $newUserName $username
					if [ $? -eq 0 ]
					then
						".sendClientLogStatus("Changing username from \"$username\" to \"$newUserName\"",true)."
					else
						".sendClientLogStatus("Changing username from \"$username\" to \"$newUserName\"",false)."
					fi
				");
		};
}





/**
**name CLCFG_patchNsswitchForLDAP()
**description Patches /etc/nsswitch.conf for usage with LDAP.
**/
function CLCFG_patchNsswitchForLDAP()
{
	$file="/etc/nsswitch.conf";

	echo("
	
	userGroup=`find $file -printf 'chown %u.%g $file'`
	perm=`find $file -printf 'chmod %m $file'`

	cat $file | sed 's/^passwd:/#passwd:/g' | sed 's/^group:/#group:/g' | sed 's/^shadow:/#shadow:/g'  | sed \"/#passwd/i\\
passwd:  compat ldap\" | sed \"/#group/i\\
group:   compat ldap\" | sed \"/#shadow/i\\
shadow:  compat ldap\" > $file.tmp

	mv $file.tmp $file

	\$userGroup

	\$perm
");
}





/**
**name CLCFG_enableNFSHome($nfsURL)
**description enables storing of home directories on a NFS server
**parameter nfsURL: URL to the NFS storage (e.g. 192.168.1.23:/nfs-homes)
**/
function CLCFG_enableNFSHome($nfsURL)
{
	if (empty($nfsURL))
	{
		CLCFG_disableNFSHome();
		return(false);
	}

	$fstabLine = "$nfsURL /home nfs defaults 0 0";

	echo("
	export DEBIAN_FRONTEND=noninteractive

	apt-get -m --force-yes -qq -y install nfs-common

	echo \"NEED_IDMAPD=yes
NEED_GSSD=no\" > /etc/default/nfs-common

	".EDIT_addIfNotExists('/etc/fstab',$fstabLine,$fstabLine));
}





/**
**name CLCFG_disableNFSHome()
**description Disables storing of home directories on a NFS server
**/
function CLCFG_disableNFSHome()
{
	echo("
	if [ `mount | grep 'type nfs' -c` -gt 0 ]
	then
		cp -a /home /home.nonnfs
	
		umount /home
		rmdir /home
	
		mv /home.nonnfs /home
		".
		EDIT_deleteMatching('/etc/fstab','/home nfs user,auto 0 0').
		"
	fi
	");
}





/**
**name CLCFG_installDesktopLanguagePackage($lang, $kde = false, $gnome = false)
**description Installs some additional language packages for (KDE / Gnome) desktops.
**parameter lang: short language
**parameter kde: Install KDE language packages too.
**parameter gnome: Install Gnome language packages too.
**/
function CLCFG_installDesktopLanguagePackage($lang, $kde = false, $gnome = false)
{
	$langTrans['de'] = 'german';		// German
	$langTrans['bg'] = 'bulgarian';		// Bulgarian
	$langTrans['cn'] = 'chinese-s';		// Simplified Chinese desktop
	$langTrans['tw'] = 'chinese-t';		// Traditional Chinese desktop
	$langTrans['cs'] = 'czech';			// Czech desktop
	$langTrans['dk'] = 'danish';		// Danish desktop
	$langTrans['es'] = 'spanish';		// Spanish desktop
	$langTrans['fi'] = 'finnish';		// Finnish desktop
	$langTrans['fr'] = 'french';		// French desktop
	$langTrans['he'] = 'hebrew';		// Hebrew desktop
	$langTrans['ie'] = 'irish';			// Irish desktop
	$langTrans['it'] = 'italian';		// Italian desktop
	$langTrans['jp'] = 'japanese';		// Japanese desktop
	$langTrans['nl'] = 'dutch';			// Dutch desktop
	$langTrans['pl'] = 'polish';		// Polish desktop
	$langTrans['ru'] = 'russian';		// Russian desktop
	$langTrans['sk'] = 'slovak';		// Slovak desktop
	$langTrans['sl'] = 'slovenian';		// Slovenian desktop
	$langTrans['tr'] = 'turkish';		// Turkish desktop
	$langTrans['uk'] = 'british';		// British English desktop
	$langTrans['hu'] = 'hungarian';		// Hungarian desktop
	$langTrans['no'] = 'norwegian';		// Norwegian (Bokmaal and Nynorsk) desktop
	$langTrans['sv'] = 'swedish';		// Swedish desktop
	$langTrans['pt'] = 'portuguese';	// Portuguese desktop
	$langTrans['et'] = 'estonian';		// Estonian desktop
	$langTrans['gr'] = 'greek';			// Greek desktop
	$langTrans['is'] = 'icelandic';		// Icelandic desktop
	$langTrans['id'] = 'indonesian';	// Indonesian desktop
	$langTrans['lt'] = 'lithuanian';	// Lithuanian desktop
	$langTrans['ro'] = 'romanian';		// Romanian desktop
	$langTrans['sr'] = 'serbian';		// Serbian desktop

	$trans = $langTrans[$lang];

	$pkg = "task-$trans-desktop";
	if ($kde) $pkg .= " task-$trans-kde-desktop";
	if ($gnome) $pkg .= " task-$trans-gnome-desktop";

	CLCFG_aptGet("install", $pkg);
}





/**
**name CLCFG_installApplicationLanguagePackages($lang)
**description Installs some additional language packages for installed applications with seperate language packs.
**parameter lang: short language
**/
function CLCFG_installApplicationLanguagePackages($lang)
{
	$lV = I18N_getLangVars($lang);
	$pkgLang = $lV['packagelang'];

echo("
if [ `dpkg --get-selections | grep openoffice.org -c` -gt 0 ]
then
");
	CLCFG_aptGet("install","openoffice.org-l10n-$pkgLang");
	CLCFG_aptGet("install","openoffice.org-help-$pkgLang");
	CLCFG_aptGet("install","openoffice.org-hyphenation-$pkgLang");
	CLCFG_aptGet("install","openoffice.org-thesaurus-$pkgLang");
echo("
fi

if [ `dpkg --get-selections | grep libreoffice -c` -gt 0 ]
then
");
	CLCFG_aptGet("install","libreoffice-l10n-$pkgLang");
	CLCFG_aptGet("install","libreoffice-help-$pkgLang");
	CLCFG_aptGet("install","libreoffice-hyphenation-$pkgLang");
	CLCFG_aptGet("install","libreoffice-thesaurus-$pkgLang");
echo("
fi

if [ `dpkg --get-selections | grep icedove -c` -gt 0 ]
then
");
	CLCFG_aptGet("install","icedove-l10n-$pkgLang");
echo("
fi

if [ `dpkg --get-selections | grep thunderbird -c` -gt 0 ]
then
");
	CLCFG_aptGet("install","thunderbird-l10n-$pkgLang");
echo("
fi

if [ `dpkg --get-selections | grep iceweasel -c` -gt 0 ]
then
");
	CLCFG_aptGet("install","iceweasel-l10n-$pkgLang");
echo("
fi

if [ `dpkg --get-selections | grep firefox -c` -gt 0 ]
then
");
	CLCFG_aptGet("install","firefox-l10n-$pkgLang");
echo("
fi
");
}





/**
**name CLCFG_updateDebootstrapScripts($distrDir)
**description Updates the debootstrap scripts for Debian or Ubuntu and returns the www path to the files
**/
function CLCFG_updateDebootstrapScripts($distrDir)
{
	$debootstrapWWW="distr/$distrDir/debootstrap";
	$m23debootstrapDir="/m23/data+scripts/distr/$distrDir/debootstrap";
	$timeFile="$m23debootstrapDir/m23lastUpdate";
	
	//if (!file_exists($timeFile) || (((time()-filectime($timeFile))/3600) > 12))
	if (!file_exists("$m23debootstrapDir/functions"))
	{
		$aptGetProxyParamter = CSYSTEMPROXY_getAptGetProxyParamter();
	
		exec("sudo rm $timeFile;

sudo apt-get update;
if [ \$? -ne 0 ]
	then
		exit
fi

sudo apt-get -m --force-yes -y install $aptGetProxyParamter debootstrap;
if [ \$? -ne 0 ]
	then
		exit
fi

sudo touch $timeFile;
");

		if (!is_dir("$m23debootstrapDir"))
		{
			exec("
					sudo mkdir -p $m23debootstrapDir
				");
		};


	//copy files and fix permissions
	exec("
			sudo cp -r /usr/lib/debootstrap/* $m23debootstrapDir

			sudo cp /usr/sbin/debootstrap $m23debootstrapDir
			
			if [ ! -f $m23debootstrapDir/pkgdetails ]
			then
				".CSYSTEMPROXY_getEnvironmentVariables()."
				sudo wget http://m23.sf.net/m23debs/pkgdetails -O $m23debootstrapDir/pkgdetails
			fi

			sudo chown ".HELPER_getApacheUser().".".HELPER_getApacheGroup()." $m23debootstrapDir -R
			
			sudo chmod 755 $m23debootstrapDir -R
		");
	};
	
	return($debootstrapWWW);
};





/**
**name CLCFG_updateDebootstrapScriptsDebian()
**description Updates the debootstrap scripts for Debian and returns the www path to the files
**/
function CLCFG_updateDebootstrapScriptsDebian()
{
	return(CLCFG_updateDebootstrapScripts("debian"));
}

?>
