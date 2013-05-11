<?PHP
/*
Description:KDE Desktop
Priority:20
*/

function run($id)
{
 $server=getServerIP();

 $lang=getClientLanguage();

 include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

echo("
export DEBIAN_FRONTEND=noninteractive\n

rm /etc/rc2.d/S99kdm\n


#create device files to make the istaller quiet

mknod /dev/raw1394 c 171 0

chown root.disk /dev/raw1394

chmod 660 /dev/raw1394

");

/* =====> */ MSR_statusBarIncCommand(1);

CLCFG_dialogInfoBox($I18N_client_installation, $I18N_client_status, $I18N_installing_kde);

if ($lang != "en")
	$kdei18n="kde-i18n-$lang";

echo("

apt-get update 2>&1 | tee -a /tmp/m23sourceupdate.log

apt-get --force-yes -y install debconf-utils 2>&1 | tee  /tmp/m23KDE3.log

rm /tmp/debconfKDE3

#write debconf data

cat >> /tmp/debconfKDE3 << \"EOF\"
kdm kdm/default_nolisten_udp note
kdm kdm/default_servers_100dpi note
kdm kdm/default_servers_nolisten_tcp note
kdm shared/default-x-display-manager select kdm
xdm shared/default-x-display-manager select kdm
gdm shared/default-x-display-manager select kdm
EOF

debconf-set-selections /tmp/debconfKDE3

apt-get --force-yes -y install kdebase kdelibs3 kdm $kdei18n kdepasswd 2>&1 | tee /tmp/m23kde3.log");

MSR_logCommand("/tmp/m23sourceupdate.log");

/* =====> */ MSR_statusBarIncCommand(88);

echo("

wget -q https://$server/packages/kde3/kdmrc -O /etc/kde3/kdm/kdmrc
wget -q https://$server/packages/kde3/backgroundrc -O /etc/kde3/kdm/backgroundrc
echo \"/usr/bin/kdm\" > /etc/X11/default-display-manager
wget -q https://$server/packages/kde3/initkdm.tar.gz -O /etc/initkdm.tar.gz
cd /etc
rm init.d/xdm
rm rc0.d/K01xdm
rm rc1.d/K01xdm
rm rc2.d/S99xdm
rm rc3.d/S99xdm
rm rc4.d/S99xdm
rm rc5.d/S99xdm
rm rc6.d/K01xdm
tar xfzp initkdm.tar.gz --same-owner\n");
sendClientStatus($id,"done");
sendClientStageStatus(STATUS_GREEN);
echo("

rm /tmp/*.sh

rm /tmp/*.php\n\n");

/* =====> */ MSR_statusBarIncCommand(10);

//adjust language setting

if ($lang!="de")
echo("
cd /usr/m23/m23/skel/.kde/share/config

sed s/Language=de/Language=$lang/g kdeglobals > /tmp/kdeglobals
mv /tmp/kdeglobals .

sed s/Country=de/Country=$lang/g kdeglobals > /tmp/kdeglobals
mv /tmp/kdeglobals .

cd /etc/kde3/kdm/
sed s/Language=de_DE/Language=$lang/g kdmrc > /tmp/kdmrc
mv /tmp/kdmrc .

sed s/\"Willkommen auf Ihrem m23 Client %n\"/welcome/g kdmrc > /tmp/kdmrc
mv /tmp/kdmrc .
");

/* =====> */ MSR_statusBarIncCommand(1);

executeNextWork();
}
?>
