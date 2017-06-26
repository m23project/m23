<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kinect-audio-setup");

$elem["kinect-audio-setup/accept_eula"]["type"]="boolean";
$elem["kinect-audio-setup/accept_eula"]["description"]="Do you accept the Microsoft Kinect for Windows EULA?
 In order to fetch the binary firmware needed by the kinect-audio-setup
 package, you need to agree to the End User License Agreement (EULA) of
 the Microsoft Kinect for Windows Software Development Kit:
 .
 http://research.microsoft.com/en-us/um/legal/kinectsdk-tou_noncommercial.htm
";
$elem["kinect-audio-setup/accept_eula"]["descriptionde"]="Stimmen Sie der EULA für Microsoft Kinect für Windows zu?
 Um die für das Paket kinect-audio-setup notwendige Binär-Firmware abzurufen, ist Ihre Zustimmung zur Lizenzvereinbarung für Endbenutzer (EULA) des Software Development Kit von Microsoft Kinect für Windows erforderlich:
 .
 http://research.microsoft.com/en-us/um/legal/kinectsdk-tou_noncommercial.htm
";
$elem["kinect-audio-setup/accept_eula"]["descriptionfr"]="Acceptez-vous le contrat d'utilisateur final (« EULA ») Microsoft Kinect pour Windows ?
 Afin de récupérer le fichier binaire nécessaire au paquet kinect-audio-setup, vous devez accepter le contrat d'utilisateur final (« EULA ») du logiciel de développement Microsoft Kinect pour Windows :
 .
 http://research.microsoft.com/en-us/um/legal/kinectsdk-tou_noncommercial.htm
";
$elem["kinect-audio-setup/accept_eula"]["default"]="false";
$elem["kinect-audio-setup/eula_not_accepted"]["type"]="error";
$elem["kinect-audio-setup/eula_not_accepted"]["description"]="EULA not accepted
 You need to accept the End User License Agreement (EULA) of the
 Microsoft Kinect for Windows Software Development Kit in order
 to fetch the binary firmware needed by the kinect-audio-setup package.
 .
 You can do this later with \"dpkg-reconfigure kinect-audio-setup\".
";
$elem["kinect-audio-setup/eula_not_accepted"]["descriptionde"]="EULA nicht zugestimmt
 Ihre Zustimmung zur Lizenzvereinbarung für Endbenutzer (EULA) des Software Development Kit von Microsoft Kinect für Windows ist erforderlich, um die für das Paket kinect-audio-setup notwendige Binär-Firmware abzurufen.
 .
 Sie können dies später noch erledigen, indem Sie »dpkg-reconfigure kinect-audio-setup« ausführen.
";
$elem["kinect-audio-setup/eula_not_accepted"]["descriptionfr"]="EULA non accepté
 Vous devez accepter le contrat d'utilisateur final (« EULA ») du logiciel de développement Microsoft Kinect pour Windows afin de récupérer le fichier binaire nécessaire au paquet kinect-audio-setup.
 .
 Vous pourrez le faire plus tard avec la commande « dpkg-reconfigure kinect-audio-setup ».
";
$elem["kinect-audio-setup/eula_not_accepted"]["default"]="";
PKG_OptionPageTail2($elem);
?>
