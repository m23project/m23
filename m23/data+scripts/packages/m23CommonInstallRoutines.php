<?php





/**
**name CIR_setDateAndTimeTemorarily()
**description Sets the date and time by calling 'date' temporarily.
**/
function CIR_setDateAndTimeTemorarily()
{
	$date = date('mdHiY.s');
	echo("\ndate $date\n");
}





/**
**name CIR_WorkaroundForMissingModulesDep()
**description Workaround for missing modules.dep to disable the repeated showing of the "FATAL" error.
**/
function CIR_WorkaroundForMissingModulesDep()
{
	echo('
	[ -d "/lib/modules/$(uname -r)" ] || mkdir "/lib/modules/$(uname -r)"
	[ -f "/lib/modules/$(uname -r)/modules.dep" ] || cat /lib/modules/*/modules.dep > "/lib/modules/$(uname -r)/modules.dep";
	');
}





/**
**name CIR_transferClientIP()
**description Transfers the current IP of a m23shared client to the m23 server.
**/
function CIR_transferClientIP()
{
	if (!$_SESSION['m23Shared'])
		return(false);

	$quiet = ($_SESSION['debug'] ? "": "-qq");

	$m23Server = getServerIP();
	echo("
	id=`cat /m23clientID 2> /dev/null`
	curIP=`export LC_ALL=C; ifconfig | grep \"inet addr\" | cut -d':' -f2 | cut -d' ' -f1 | head -1`
	wget $quiet -T5 -t0 --post-data \"type=MSR_curDynIP&curIP=\$curIP\" https://$m23Server/postMessage.php?m23clientID=\$id -O /dev/null
	");
}





/**
**name CIR_writeClientID($clientID)
**description writes the client ID to /m23clientID
**parameter clientParams: Associated array with the parameters of the client.
**/
function CIR_writeClientID($clientParams)
{
if ($_SESSION['m23Shared'])
	$clientID = m23SHARED_getCompleteClientName();
else
	$clientID = $clientParams['id'];

echo("
rm /m23clientID 2> /dev/null
cat >> /m23clientID << \"m23clientIDEOF\"
$clientID
m23clientIDEOF
");
};





/**
**name CIR_detectSCSI()
**description detects SCSI controlers and loads the modules
**/
function CIR_detectSCSI()
{
	echo("
	if test -e /tmp/scsirun
	then
 		true
	else
 		touch /tmp/scsirun
		
		SCSI_MODULES=\"aic7xxx aic79xx aic7xxx_old BusLogic ncr53c8xx NCR53c406a initio advansys aha1740 aha1542 aha152x atp870u dtc eata fdomain gdth megaraid pas16 pci2220i pci2000 psi240i qlogicfas qlogicfc qlogicisp seagate t128 tmscsim u14-34f ultrastor wd7000 a100u2w 3w-xxxx ata_piix ahci\"

		# Misc functions

		moduldir=\"/lib/modules/`uname -r`/kernel/drivers/scsi\"
		
		echo \"Probing for SCSI cards\"

		# Try to load the given modules (full path or current directory)
		echo \"6\" > /proc/sys/kernel/printk
		for i in \$SCSI_MODULES
		do
			echo -n \"\rProbing \$i                                 \"
			modprobe \$i >/dev/null 2>&1
		done

		echo \"Probing for SATA cards\"
		for mod in `find /lib/modules/ -type f -printf \"%f\\n\" | grep sata | cut -d'.' -f1`
		do
			modprobe \$mod
		done

		echo \"0\" > /proc/sys/kernel/printk

		modprobe raid0 2> /dev/null
		modprobe raid1 2> /dev/null
		modprobe raid456 2> /dev/null
		modprobe raid10 2> /dev/null
		modprobe dm-mod 2> /dev/null
		echo DEVICE partitions > /etc/mdadm.conf
		mdadm -Ebsc partitions >> /etc/mdadm.conf
		#make needed device nodes for MD
		for i in `seq 0 15`
		do
			mknod /dev/md\$i b 9 \$i 2> /dev/null
		done
		mdadm -As 2> /dev/null
		mdadm -Asc partitions 2> /dev/null
	fi
\n");
};





/**
**name CIR_waitForNextJob()
**description waits one minute and tries to fetch the next job from the server and executes it
**/
function CIR_waitForNextJob()
{
	$lang = getClientLanguage();

	$quiet = ($_SESSION['debug'] ? "": "-qq");

	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");


	echo("
#mv work.php `date +%s`.old

SEC=0
TIME=0
loopRun=`true`

while \$loopRun
	do
	");

	if (RMV_get("debug")!=1)
	echo("dialog --backtitle \"$I18N_client_installation\"  --title \"$I18N_client_status\" --infobox \"\n$I18N_waiting_for_jobs\" 6 70");

	echo("
		#Add the client ID if it is available
		id=`cat /m23clientID 2> /dev/null`
		if test \$id
		then
			idvar=\"?m23clientID=\$id\"
		fi

		wget $quiet -Owork.php \"https://".getServerIP()."/work.php\$idvar\" --no-check-certificate
		
		if test `find work.php -printf \"%s\"` -gt 0
		then
			chmod +x work.php
			loopRun=`false`
			break
		fi
		sleep 20
		TIME=`expr \$SEC / 60`
		SEC=`expr \$SEC + 20`
	done
	./work.php
	\n");
};





/**
**name CIR_enableDropbear()
**description sets up and starts dropbear SSH server
**/
function CIR_enableDropbear()
{
	include_once('/m23/inc/distr/debian/clientConfigCommon.php');	
	
	$options=CLIENT_getAllAskingOptions();
	
	$cpwd=encryptShadow("root",$options['netRootPwd']);
	
	
// 	echo("if [ `uname -r | grep m23 -c` -eq 1 ]
// then
// echo 'root:$cpwd:0:0:root:/:/bin/sh' > /etc/passwd
// fi
// ");
// 
// 	return(true);

	echo ("
if test -e /etc/dropbear/dropbear_rsa_host_key
then
	echo
else\n");
	CLCFG_setAuthorized_keys(getServerIP(),"/packages/baseSys/authorized_keys");
echo("mkdir -p /etc/dropbear

dropbearkey -type rsa -f /etc/dropbear/dropbear_rsa_host_key
dropbearkey -type dss -f /etc/dropbear/dropbear_dss_host_key

cp -r /root/.ssh /
chmod 700 /.ssh /tmp /
chown root /.ssh /
dropbear
fi

if [ `uname -r | grep m23 -c` -eq 1 ]
then
echo 'root:$cpwd:0:0:root:/:/bin/sh' > /etc/passwd
fi
");
};
?>
