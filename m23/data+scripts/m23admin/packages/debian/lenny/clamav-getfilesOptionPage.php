<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("clamav-getfiles");

$elem["clamav-getfiles/download-eicar-com"]["type"]="boolean";
$elem["clamav-getfiles/download-eicar-com"]["description"]="Do you want to download eicar.com from the Internet?
 To verify the integrity of the downloaded databases, clamav-getfiles uses
 clamav-testfiles. It can additionally use the Eicar Anti-Virus Test File,
 which unfortunately has a non-free license and cannot thus be in Debian
 proper.
 .
 The clean way to solve this would be a Debian package eicar-testfile which
 downloads the real Eicar Anti-Virus Test File from the Internet on
 installation. Such a package has been prepared and uploaded, but it was
 rejected by the Debian ftp-masters in June 2003. See the RFP/ITP bug
 #198311.
 .
 Since Debian officially declined to have the Eicar Anti-Virus Test File in
 a single location, packages needing that file need to replicate the work
 locally.
 .
 Please choose if you want to download the non-free Eicar Anti-Virus Test
 File from the Internet to improve the integrity test of the downloaded
 clamav databases.
";
$elem["clamav-getfiles/download-eicar-com"]["descriptionde"]="Wollen Sie eicar.com aus dem Internet herunterladen?
 Um die Integrität der heruntergeladenen Virusdefinitionen zu prüfen, benutzt clamav-getfiles Testpattern aus clamav-testfiles. Es kann außerdem noch die Eicar-Anti-Virus-Testdatei benutzen, die leider nicht unter einer freien Lizenz steht und deswegen nicht in Debian integriert werden kann.
 .
 Es sollte ein Debian-Paket eicar-testfile geben, das bei der Installation die eigentliche Eicar-Anti-Virus-Testdatei aus dem Internet herunterlädt. Dieses Paket existiert bereits, wurde aber von den Debian-ftp-mastern im Juni 2003 abgelehnt. Weitere Informationen liegen im RFP/ITP-Bug-Report #198311.
 .
 Da Debian offiziell ablehnt, die Eicar-Anti-Virus-Testdatei an einer einzigen definierten Stelle in der Distribution zu haben, müssen Pakete, die diese Datei benötigen, sie selbst herunterladen.
 .
 Soll die nichtfreie Eicar-Anti-Virus-Testdatei aus dem Internet heruntergeladen werden, um die Überprüfung der heruntergeladenen clamav-Datenbanken zu verbessern?
";
$elem["clamav-getfiles/download-eicar-com"]["descriptionfr"]="Souhaitez-vous télécharger eicar.com ?
 Pour vérifier l'intégrité des bases de données téléchargées, clamav-getfiles utilise clamav-testfiles. Il peut également utiliser le fichier de vérification des anti-virus d'Eicar (« Eicar Anti-Virus Test File »), dont la licence n'est malheureusement pas libre ce qui ne permet pas de l'inclure dans la distribution Debian.
 .
 La méthode correcte pour gérer cela serait de construire un paquet Debian eicar-testfile qui téléchargerait le fichier de vérification des anti-virus d'Eicar sur l'Internet, lors de son installation. Un tel paquet a été construit et envoyé, mais il a été rejeté par les administrateurs du site FTP de Debian en juin 2003. Veuillez consulter le bogue numéro 198311 pour plus d'informations.
 .
 Comme Debian n'a pas souhaité que le fichier de vérification d'anti-virus d'Eicar soit situé à un seul endroit, les paquets qui s'en servent doivent reproduire ce travail localement.
 .
 Veuillez indiquer si vous souhaitez télécharger le fichier non libre de vérification d'anti-virus d'Eicar, afin d'améliorer le test d'intégrité des bases de données téléchargées pour clamav.
";
$elem["clamav-getfiles/download-eicar-com"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
