<?PHP
	include('/m23/inc/raidlvm.php');
	
	RAID_create("/dev/md1","/dev/sda /dev/hda", 1);
	RAID_createMdadmConf();
	/*LVM_init();
	LVM_createVolumeGroup("/dev/md1","vg");
	LVM_createLogicalVolume("1gb","vg",1000);
	LVM_createLogicalVolume("500mb","vg",500);
	LVM_createLogicalVolume("lala","vg",500);*/
?>
