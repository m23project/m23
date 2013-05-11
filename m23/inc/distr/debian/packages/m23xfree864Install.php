<?PHP
/*
Description:XFree86 or XOrg base system
Priority:15
*/
function run($id)
{
 $lang=getClientLanguage();
 include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");
 include('/m23/inc/distr/ubuntu/clientConfigCommon.php');
 
 CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_xfree86);
echo("

echo \"
	xserver-xorg xserver-xorg/config/doublequote_in_string_error note
xserver-xorg xserver-xorg/config/device/bus_id_error note
xserver-xorg xserver-xorg/config/inputdevice/keyboard/options string
xserver-xorg xserver-xorg/autodetect_keyboard boolean false
xserver-xorg xserver-xorg/config/device/use_fbdev boolean false
xserver-xorg xserver-xorg/config/inputdevice/keyboard/variant string
xserver-xorg xserver-xorg/config/nonnumeric_string_error note
xserver-xorg xserver-xorg/config/inputdevice/keyboard/layout string $lang
xserver-xorg xserver-xorg/config/inputdevice/keyboard/model string pc104
xserver-xorg xserver-xorg/config/device/driver select
xserver-xorg xserver-xorg/config/null_string_error note
xserver-xorg xserver-xorg/config/device/bus_id string
xserver-xorg xserver-xorg/config/inputdevice/keyboard/rules string xorg\" > /tmp/xorg.debconf
	debconf-set-selections /tmp/xorg.debconf

export DEBIAN_FRONTEND=noninteractive
apt-get -q update 2>&1 | tee -a /tmp/m23sourceupdate.log
if apt-get --force-yes -y -q install x-window-system ddcxinfo-knoppix
then
 ".sendClientLogStatus("X11 installed",true)."
else
	if apt-get --force-yes -y -q install x-window-system-core ddcxinfo-knoppix
	then
		if [ -d /usr/lib/xorg/modules ]
		then
			sed 's#/usr/X11R6/lib/modules#/usr/lib/xorg/modules#g' /etc/X11/xorg.conf > /tmp/xorg.conf
			cat /tmp/xorg.conf > /etc/X11/xorg.conf
			rm /tmp/xorg.conf
		fi
		".sendClientLogStatus("XOrg installed",true)."
	else
	".sendClientLogStatus("XOrg installed",false,true)."
	fi
fi

rm /etc/X11/xorg.conf
ln -s /etc/X11/XF86Config-4 /etc/X11/xorg.conf
rm /etc/X11/XF86Config
rm /etc/X11/XF86Config-4
");

/* =====> */ MSR_statusBarIncCommand(100);

sendClientStatus($id,"done");
executeNextWork();
}
?>
