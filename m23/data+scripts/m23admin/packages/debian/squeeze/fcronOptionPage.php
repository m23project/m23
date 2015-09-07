<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fcron");

$elem["fcron/anacronwarn"]["type"]="note";
$elem["fcron/anacronwarn"]["description"]="Warning: interactions with anacron!
 If you have the anacron package in the 'removed' but not 'purged' state
 (i.e. anacron configuration files are still around the system), the fcron
 package will cause harmless side effects, such as reports of anacron being
 started at boot up.
 .
 DO NOT FILE BUGS AGAINST ANACRON IF YOU HAVE FCRON INSTALLED IN THE
 SYSTEM. They will be either reassigned to fcron to be summarily closed by
 me, or summarily closed by the anacron maintainer himself.
 .
 More information about this issue is available in
 /usr/share/doc/fcron/README.Debian
";
$elem["fcron/anacronwarn"]["descriptionde"]="Wechselwirkungen mit anacron !
 Wenn Sie das anachron-Paket im 'removed' aber nicht im 'purged' Status haben (z.B. es befinden sich noch irgendwo im System anacron Konfigurations Dateien ), kann es sein, dass das fcron Paket einige harmlose Seiteneffekte aufweist, z.B. Meldungen das anacron beim booten gestartet wird.
 .
 MELDEN SIE KEINE ANACRON BUGS, WENN SIE FCRON AUF DEM COMPUTER INSTALLIERT HABEN. Diese werden wieder fcron zugeschrieben um entweder von mir oder vom anacron Maintainer selbst gesammelt geschlossen zu werden.
 .
 Weiter Informationen zu diesem Thema sind in /usr/share/doc/fcron/README.Debian verfügbar.
";
$elem["fcron/anacronwarn"]["descriptionfr"]="interférences avec anacron !
 Si le paquet anacron a été supprimé (« removed ») mais non purgé (« purged »), les fichiers de configuration d'anacron sont toujours présents. Des effets de bord sans conséquence auront alors lieu, notamment des messages indiquant qu'anacron est lancé au démarrage.
 .
 N'EFFECTUEZ PAS DE RAPPORT DE BOGUE CONTRE ANACRON SI FCRON EST INSTALLÉ SUR VOTRE SYSTÈME. Il sera soit réassigné à fcron et fermé sans autre forme de procès par moi-même, soit fermé directement par le responsable d'anacron.
 .
 Vous pouvez consulter /usr/share/doc/fcron/README.Debian pour plus d'informations.
";
$elem["fcron/anacronwarn"]["default"]="";
PKG_OptionPageTail2($elem);
?>
