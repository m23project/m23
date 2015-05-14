<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kinect-audio-setup");

$elem["kinect-audio-setup/accept_eula"]["type"]="boolean";
$elem["kinect-audio-setup/accept_eula"]["description"]="Do you accept the Microsoft KinectForWindows EULA?
 In order to fetch the binary firmware needed by this package you need
 to agree to the EULA of the Microsoft KinectForWindows SDK:
 .
 http://www.kinectforwindows.org/download/EULA.htm
";
$elem["kinect-audio-setup/accept_eula"]["descriptionde"]="";
$elem["kinect-audio-setup/accept_eula"]["descriptionfr"]="";
$elem["kinect-audio-setup/accept_eula"]["default"]="false";
$elem["kinect-audio-setup/eula_not_accepted"]["type"]="note";
$elem["kinect-audio-setup/eula_not_accepted"]["description"]="EULA not accepted
 You need to accept the EULA of Microsoft KinectForWindows SDK in order
 to fetch the binary firmware needed by this package.
 .
 You can do this later by calling:
   dpkg-reconfigure kinect-audio-setup
";
$elem["kinect-audio-setup/eula_not_accepted"]["descriptionde"]="";
$elem["kinect-audio-setup/eula_not_accepted"]["descriptionfr"]="";
$elem["kinect-audio-setup/eula_not_accepted"]["default"]="";
PKG_OptionPageTail2($elem);
?>
