<span class="title">Developer's playground</span>


<?PHP
	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/messageReceive.php');
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');
	HTML_showFormHeader();
	HTML_showTableHeader();
	HTML_setPage("developersPlayground");
	
	include_once('/m23/inc/distr/debian/packages.php');
	
// 	include_once('/m23/inc/autoTest.php');
	include_once('/m23/inc/CFDiskIO.php');
	include_once('/m23/inc/CFDiskBasic.php');
	include_once('/m23/inc/CFDiskGUI.php');
	
	$CFDiskGUIO = new CFDiskGUI('08cl2');
	$CFDiskGUIO->printAllBars();

/*
a:6:{s:18:"wantedPartitioning";a:1:{i:0;a:6:{s:3:"dev";s:8:"/dev/sda";s:4:"size";s:4:"8192";i:0;a:5:{s:2:"nr";i:1;s:5:"start";i:2;s:3:"end";i:512;s:4:"type";s:7:"efipart";s:2:"fs";s:8:"efi-boot";}i:1;a:5:{s:2:"nr";i:2;s:5:"start";s:3:"512";s:3:"end";s:4:"7800";s:4:"type";s:7:"efipart";s:2:"fs";s:4:"ext4";}i:2;a:5:{s:2:"nr";i:3;s:5:"start";s:4:"7800";s:3:"end";s:4:"8000";s:4:"type";s:7:"efipart";s:2:"fs";s:10:"linux-swap";}i:3;a:5:{s:2:"nr";i:4;s:5:"start";s:4:"8000";s:3:"end";s:4:"8192";s:4:"type";s:7:"efipart";s:2:"fs";s:8:"reiserfs";}}}s:14:"partitionSteps";a:11:{i:0;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";i:2;s:3:"end";i:512;s:4:"type";s:7:"efipart";s:5:"pPart";i:1;}i:1;a:3:{s:7:"command";s:5:"bflag";s:3:"dev";s:8:"/dev/sda";s:5:"pPart";i:1;}i:2;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda1";s:2:"fs";s:8:"efi-boot";}i:3;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";s:3:"512";s:3:"end";s:4:"7800";s:4:"type";s:7:"efipart";s:5:"pPart";i:2;}i:4;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";s:4:"7800";s:3:"end";s:4:"8000";s:4:"type";s:7:"efipart";s:5:"pPart";i:3;}i:5;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";s:4:"8000";s:3:"end";s:4:"8192";s:4:"type";s:7:"efipart";s:5:"pPart";i:4;}i:6;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda2";s:2:"fs";s:4:"ext4";}i:7;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda3";s:2:"fs";s:10:"linux-swap";}i:8;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda4";s:2:"fs";s:8:"reiserfs";}i:9;a:3:{s:7:"command";s:5:"bflag";s:3:"dev";s:8:"/dev/sda";s:5:"pPart";s:1:"1";}i:10;a:3:{s:7:"command";s:14:"EFItypeAndGUID";s:3:"dev";s:8:"/dev/sda";s:5:"pPart";s:1:"1";}}s:4:"undo";a:1:{i:0;a:2:{s:2:"wp";a:1:{i:0;a:6:{s:3:"dev";s:8:"/dev/sda";s:4:"size";s:4:"8192";i:0;a:5:{s:2:"nr";i:1;s:5:"start";i:2;s:3:"end";i:512;s:4:"type";s:7:"efipart";s:2:"fs";s:8:"efi-boot";}i:1;a:5:{s:2:"nr";i:2;s:5:"start";s:3:"512";s:3:"end";s:4:"7800";s:4:"type";s:7:"efipart";s:2:"fs";s:4:"ext4";}i:2;a:5:{s:2:"nr";i:3;s:5:"start";s:4:"7800";s:3:"end";s:4:"8000";s:4:"type";s:7:"efipart";s:2:"fs";s:10:"linux-swap";}i:3;a:5:{s:2:"nr";i:4;s:5:"start";s:4:"8000";s:3:"end";s:4:"8192";s:4:"type";s:7:"efipart";s:2:"fs";s:8:"reiserfs";}}}s:2:"ps";a:11:{i:0;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";i:2;s:3:"end";i:512;s:4:"type";s:7:"efipart";s:5:"pPart";i:1;}i:1;a:3:{s:7:"command";s:5:"bflag";s:3:"dev";s:8:"/dev/sda";s:5:"pPart";i:1;}i:2;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda1";s:2:"fs";s:8:"efi-boot";}i:3;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";s:3:"512";s:3:"end";s:4:"7800";s:4:"type";s:7:"efipart";s:5:"pPart";i:2;}i:4;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";s:4:"7800";s:3:"end";s:4:"8000";s:4:"type";s:7:"efipart";s:5:"pPart";i:3;}i:5;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";s:4:"8000";s:3:"end";s:4:"8192";s:4:"type";s:7:"efipart";s:5:"pPart";i:4;}i:6;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda2";s:2:"fs";s:4:"ext4";}i:7;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda3";s:2:"fs";s:10:"linux-swap";}i:8;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda4";s:2:"fs";s:8:"reiserfs";}i:9;a:3:{s:7:"command";s:5:"bflag";s:3:"dev";s:8:"/dev/sda";s:5:"pPart";s:1:"1";}i:10;a:3:{s:7:"command";s:14:"EFItypeAndGUID";s:3:"dev";s:8:"/dev/sda";s:5:"pPart";s:1:"1";}}}}s:22:"partitionStepsForShift";a:11:{i:0;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";i:2;s:3:"end";i:512;s:4:"type";s:7:"efipart";s:5:"pPart";i:1;}i:1;a:3:{s:7:"command";s:5:"bflag";s:3:"dev";s:8:"/dev/sda";s:5:"pPart";i:1;}i:2;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda1";s:2:"fs";s:8:"efi-boot";}i:3;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";s:3:"512";s:3:"end";s:4:"7800";s:4:"type";s:7:"efipart";s:5:"pPart";i:2;}i:4;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";s:4:"7800";s:3:"end";s:4:"8000";s:4:"type";s:7:"efipart";s:5:"pPart";i:3;}i:5;a:6:{s:7:"command";s:3:"add";s:3:"dev";s:8:"/dev/sda";s:5:"start";s:4:"8000";s:3:"end";s:4:"8192";s:4:"type";s:7:"efipart";s:5:"pPart";i:4;}i:6;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda2";s:2:"fs";s:4:"ext4";}i:7;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda3";s:2:"fs";s:10:"linux-swap";}i:8;a:3:{s:7:"command";s:6:"format";s:3:"dev";s:9:"/dev/sda4";s:2:"fs";s:8:"reiserfs";}i:9;a:3:{s:7:"command";s:5:"bflag";s:3:"dev";s:8:"/dev/sda";s:5:"pPart";s:1:"1";}i:10;a:3:{s:7:"command";s:14:"EFItypeAndGUID";s:3:"dev";s:8:"/dev/sda";s:5:"pPart";s:1:"1";}}s:5:"fstab";a:1:{s:9:"/dev/sda4";a:3:{s:3:"dev";s:9:"/dev/sda4";s:3:"mnt";s:9:"/mnt/mini";s:5:"param";s:22:"auto defaults,auto 0 0";}}s:16:"definedDiskSizes";a:1:{s:8:"/dev/sda";s:4:"8192";}}
*/

print("<pre>");

// $CFDiskBasicO = new CFDiskBasic('defuefi');
// $CFDiskBasicO->fdiskAdjustPartitioning();
// 
// print_r($CFDiskBasicO->genPartedCommands('', 'trusty'));
/*
	$CClientO = new CFDiskIO('ueficl0');
	$CClientO->findAndSetEFIBootPartDev();
	print(serialize($CClientO->getEFIBootPartDev()));*/

print("</pre>\n");
	HTML_showTableEnd();
	HTML_showFormEnd();
?>