<?php




/**
**name RAID_create($mdDev, $devList, $mode)
**description Creates a RAID of different drives or partitions
**parameter mdDev: Name of the MD device to create (e.g. /dev/md1)
**parameter devList: Space separated list of devices to create the RAID on top (e.g. /dev/sda1 /dev/hda /dev/sbd5).
**parameter mode: Number of the RAID mode (e.g. 5 for RAID-5)
**/
function RAID_create($mdDev, $devList, $mode)
{
	$devList = trim($devList);
	$amount = substr_count ($devList, " ") + 1;
	$deviceNr = FDISK_getDriveAndNr($mdDev);

	return("
	modprobe raid$mode
	modprobe dm-mod
	mknod $mdDev b 9 $deviceNr[1] 2> /dev/null

	mdadm --zero-superblock $devList 2>&1 | tee -a /tmp/m23raid.log
	mdadm --create $mdDev --verbose --run --level=$mode --raid-devices=$amount $devList 2>&1 | tee -a /tmp/m23raid.log
	");
};



function RAID_createMdadmConf()
{
echo("
echo 'DEVICE /dev/hd*[0-9] /dev/sd*[0-9]' > /etc/mdadm.conf
mdadm --detail --scan >> /etc/mdadm.conf
");
};



/**
**name LVM_init()
**description Scans for existing volume groups and activated all found volumes.
**/
function LVM_init()
{
echo("
modprobe dm-mod
vgscan
vgchange -a y
");
};





/**
**name LVM_createVolumeGroup($dev,$vgName)
**description Creates a volume group. With multiple calls you can join multiple devices or partitions to.
**parameter devList: Space seperated list of devices (e.g. /dev/hda1 /dev/sda) that should get combined.
**parameter vgName: Name of the volume group
**/
function LVM_createVolumeGroup($devList,$vgName)
{
	$cmd = "";
	$devs = explode(" ",$devList);

	foreach ($devs as $dev)
		$cmd .= "
		pvcreate $dev
		vgcreate $vgName $dev
		";

	echo($cmd);
};



/**
**name LVM_createLogicalVolume($lvName,$vgName,$size)
**description Creates a logical volume. This logical volume can be used like a normal partition. This device is called /dev/$vgName/$lvName
**parameter lvName: Name of the logical volume
**parameter vgName: Name of the volume group
**parameter size: Size of the logical volume in MB
**returns The full path to the device file for accessing the logical volume.
**/
function LVM_createLogicalVolume($lvName,$vgName,$size)
{
	echo("lvcreate -L$size -n$lvName $vgName\n");
	return("/dev/$vgName/$lvName");
};

?>