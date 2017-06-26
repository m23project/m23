<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("seyon");

$elem["seyon/device"]["type"]="string";
$elem["seyon/device"]["description"]="Modem device
 Please choose the device file corresponding to the port the modem is
 connected to. This may be /dev/ttyS1 or any other device file.
 .
 /dev/modem is usually a symbolic link to the appropriate device file.
 This configuration program will not setup this link. If you choose
 \"/dev/modem\", the link should already exist.
";
$elem["seyon/device"]["descriptionde"]="Modem-Gerät
 Bitte wählen Sie die Gerätedatei, die zu dem Port korrespondiert, an dem das Modem angeschlossen ist. Dies könnte /dev/ttyS1 oder jede andere Gerätedatei sein.
 .
 /dev/modem ist normalerweise ein symbolischer Link auf die passende Gerätedatei. Dieses Konfigurationsprogramm wird diesen Link nicht einrichten. Falls Sie »/dev/modem« wählen, sollte dieser Link bereits existieren.
";
$elem["seyon/device"]["descriptionfr"]="Périphérique du modem
 Veuillez choisir le fichier de périphérique correspondant au port où est connecté le modem. Cela peut être /dev/ttyS1 ou tout autre fichier de périphérique.
 .
 /dev/modem est généralement un lien symbolique vers le fichier de périphérique correct. Ce programme de configuration n'établira pas ce lien. Si vous indiquez « /dev/modem », il faudrait que le lien existe au préalable.
";
$elem["seyon/device"]["default"]="/dev/modem";
PKG_OptionPageTail2($elem);
?>
