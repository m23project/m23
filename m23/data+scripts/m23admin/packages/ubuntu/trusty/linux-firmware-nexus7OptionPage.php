<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-firmware-nexus7");

$elem["shared/nexus7_notice_accepted"]["type"]="boolean";
$elem["shared/nexus7_notice_accepted"]["description"]="Do you acknowledge the Ubuntu for Google Nexus 7 usage notice?
 \"Ubuntu for Google Nexus 7\" is released for free non-commercial use on 
 the Google Nexus 7 only. It is provided without warranty, even the 
 implied warranty of merchantability, satisfaction or fitness for a 
 particular use. See the licence included with each program for details. 
 Some licences may grant additional rights; this notice shall not limit 
 your rights under each program's licence. Licences for each program are 
 available in the usr/share/doc directory. Source code for Ubuntu can be 
 downloaded from archive.ubuntu.com. Ubuntu, the Ubuntu logo and 
 Canonical are registered trademarks of Canonical Ltd. All other 
 trademarks are the property of their respective owners.
 . 
 \"Ubuntu for Google Nexus 7\" is released for limited use due to the 
 inclusion of the following hardware drivers:
 .
 [Wireless] - [Broadcom Corporation]
 [Bluetooth] - [Broadcom Corporation]
 [Graphics] - [NVIDIA Corporation]
 [Video Codecs] - [NVIDIA Corporation]
 .
 The original components and licenses can be found at:
 https://developers.google.com/android/nexus/drivers#grouper
 .

";
$elem["shared/nexus7_notice_accepted"]["descriptionde"]="";
$elem["shared/nexus7_notice_accepted"]["descriptionfr"]="";
$elem["shared/nexus7_notice_accepted"]["default"]="false";
$elem["shared/nexus7_notice_error"]["type"]="error";
$elem["shared/nexus7_notice_error"]["description"]="Failure to acknowledge the Ubuntu for Google Nexus 7 usage notice.
 If you do not acknowledge the Ubuntu for Google Nexus 7 usage notice,
 you cannot install this software.
 .
 The installation of this package has been canceled.
 .
";
$elem["shared/nexus7_notice_error"]["descriptionde"]="";
$elem["shared/nexus7_notice_error"]["descriptionfr"]="";
$elem["shared/nexus7_notice_error"]["default"]="";
PKG_OptionPageTail2($elem);
?>
