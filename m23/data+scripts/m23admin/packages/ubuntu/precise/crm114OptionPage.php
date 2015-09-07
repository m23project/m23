<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("crm114");

$elem["crm114/cssupgrade"]["type"]="boolean";
$elem["crm114/cssupgrade"]["description"]="Proceed with CRM114 upgrade?
 The version of the crm114 package that is about to be installed is
 not able to use .css files created by the currently installed version. This means
 that any crm114 command is likely to fail with an error code, possibly rejecting
 incoming e-mail.
 .
 If the mail system on this machine depends on crm114, it is highly
 recommended that delivery (or just crm114 processing) should be temporarily
 disabled before the package is upgraded.         
 .
 If you proceed with the upgrade, you should carefully check whether crm114
 is still properly operating with existing .css files. If it does not, these
 files should be rebuilt by using the mailreaver cache, or recreated from
 scratch.
";
$elem["crm114/cssupgrade"]["descriptionde"]="Soll das CRM114-Upgrade fortgesetzt werden?
 Die Version des crm114-Pakets, das installiert werden soll, ist nicht in der Lage, ».css«-Dateien zu verwenden, welche mit der momentan installierten Version erstellt wurden. Das bedeutet, dass wahrscheinlich jeder crm114-Befehl mit einer Fehlernummer fehlschlagen wird und möglicherweise eingehende E-Mails zurückweist.
 .
 Falls das Mail-System auf diesem System von crm114 abhängig ist, wird dringlichst empfohlen, dass der Mail-Transport (oder lediglich die crm114-Verarbeitung) vor dem Paket-Upgrade zeitweilig unterbrochen wird.
 .
 Falls Sie mit dem Upgrade fortfahren, sollten Sie genau prüfen, ob crm114 mit den vorhandenen ».css«-Dateien noch korrekt funktioniert. Falls nicht, sollten diese Dateien mit Hilfe des »mailreaver«-Cache wiederhergestellt oder komplett neu erstellt werden.
";
$elem["crm114/cssupgrade"]["descriptionfr"]="Faut-il mettre à jour CRM114 ?
 La version du paquet crm114 qui va être installée ne peut pas utiliser les fichiers .css créés par la version actuelle. Cela a pour conséquence l'échec de la commande crm114, ce qui peut indirectement conduire à des rejets de courriers électroniques.
 .
 Si le système de courrier électronique de cette machine dépend de CRM114, il est fortement recommandé de désactiver la délivrance des messages (ou plus simplement leur traitement par crm114) avant la mise à jour du paquet.
 .
 Si vous acceptez la mise à jour, vous devez vérifier soigneusement si crm114 utilise toujours les anciens fichiers .css. Dans ce cas, ces fichiers doivent être reconstruits en utilisant le cache de mailreaver ou recréés à partir de zéro.
";
$elem["crm114/cssupgrade"]["default"]="false";
$elem["crm114/forceupgrade"]["type"]="boolean";
$elem["crm114/forceupgrade"]["description"]="Force CRM114 upgrade?
 If you enable this option, crm114 package won't ask any safety questions
 during the upgrade.  It is your full responsibility to arrange things in
 advance in such a way that nothing breaks after the upgrade.
";
$elem["crm114/forceupgrade"]["descriptionde"]="Soll das CRM114-Upgrade erzwungen werden?
 Falls Sie diese Option aktivieren, wird das Paket »crm114« während des Upgrade keine Sicherheitsfragen stellen. Es liegt in Ihrer Verantwortung, alles im Vorfeld so ordnen, dass nach dem Upgrade nichts fehlschlägt.
";
$elem["crm114/forceupgrade"]["descriptionfr"]="Faut-il forcer la mise à jour de CRM114 ?
 Si vous choisissez cette option, aucune question ne sera posée lors de la mise à jour. Le préparation de cette mise à jour, dans le but d'éviter des conséquences indésirables, restera donc de votre entière responsabilité.
";
$elem["crm114/forceupgrade"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
