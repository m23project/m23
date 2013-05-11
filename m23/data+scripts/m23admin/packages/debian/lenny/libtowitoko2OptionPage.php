<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libtowitoko2");

$elem["libtowitoko2/port"]["type"]="select";
$elem["libtowitoko2/port"]["choices"][1]="ttyS0";
$elem["libtowitoko2/port"]["choices"][2]="ttyS1";
$elem["libtowitoko2/port"]["choices"][3]="ttyS2";
$elem["libtowitoko2/port"]["choices"][4]="ttyS3";
$elem["libtowitoko2/port"]["choicesde"][1]="ttyS0";
$elem["libtowitoko2/port"]["choicesde"][2]="ttyS1";
$elem["libtowitoko2/port"]["choicesde"][3]="ttyS2";
$elem["libtowitoko2/port"]["choicesde"][4]="ttyS3";
$elem["libtowitoko2/port"]["choicesfr"][1]="ttyS0";
$elem["libtowitoko2/port"]["choicesfr"][2]="ttyS1";
$elem["libtowitoko2/port"]["choicesfr"][3]="ttyS2";
$elem["libtowitoko2/port"]["choicesfr"][4]="ttyS3";
$elem["libtowitoko2/port"]["description"]="On which serial port is connected the smart card reader?
 PCSC needs to know on which serial port the reader is connected. This
 information is stored in the file /etc/reader.conf.
 .
 You should not edit this file directly but create or modify a file in
 /etc/reader.conf.d/ and use update-reader.conf(8) to regenerate
 /etc/reader.conf.
";
$elem["libtowitoko2/port"]["descriptionde"]="An welchem COM Port ist der Chipkarten-Leser angesteckt?
 PCSC muss wissen, an welchem COM Port der Leser angesteckt ist. Diese Information wird in der Datei /etc/reader.conf gespeichert.
 .
 Diese Datei sollte nicht direkt geändert werden, statt dessen sollte eine Datei in /etc/reader.conf.d/ erzeugt bzw. verändert werden und daraus dann über update-reader.conf(8) die Datei /etc/reader.conf generiert werden.
";
$elem["libtowitoko2/port"]["descriptionfr"]="Sur quel port série le lecteur de carte à puce est-il connecté ?
 PCSC doit savoir sur quel port série se trouve le lecteur de carte à puce. Cette information est conservée dans le fichier /etc/reader.conf.
 .
 Vous ne devez pas modifier directement ce fichier mais créer ou modifier un fichier dans /etc/reader.conf.d/ et utiliser update-reader.conf(8) pour régénérer /etc/reader.conf.
";
$elem["libtowitoko2/port"]["default"]="";
PKG_OptionPageTail2($elem);
?>
