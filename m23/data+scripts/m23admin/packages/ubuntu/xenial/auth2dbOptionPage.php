<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("auth2db");

$elem["auth2db/activate_alerts"]["type"]="boolean";
$elem["auth2db/activate_alerts"]["description"]="Do you want to activate Auth2DB Alerts?
 This feature of Auth2DB will make you able to receive alerts
 to a email box when some events are met, for example, too many
 SSH connection failures from some IP.
 .
 Despite the choice you made, you can easily reconfigure this
 using 'dpkg-reconfigure auth2db' command or a equivalent GUI.
";
$elem["auth2db/activate_alerts"]["descriptionde"]="Wollen Sie die Auth2DB-Warnungen aktivieren?
 Diese Funktionalität erlaubt es Ihnen, sich Warnungen von Auth2DB an ein E-Mail-Postfach senden zu lassen, wenn gewisse Bedingungen erfüllt sind. Hierzu zählen zum Beispiel zu viele fehlgeschlagene SSH-Verbindungsversuche von einer IP aus.
 .
 Ungeachtet der Wahl die Sie getroffen haben, können Sie diese Einstellung einfach neu konfigurieren, in dem Sie den Befehl »dpkg-reconfigure auth2db« aufrufen oder eine vergleichbare GUI-Schnittstelle verwenden.
";
$elem["auth2db/activate_alerts"]["descriptionfr"]="Faut-il activer les alertes de Auth2DB ?
 Une option de Auth2DB permet de recevoir directement par courriel des alertes lorsque des événements se produisent, par exemple des échecs répétés de connexions SSH depuis une adresse donnée.
 .
 Si vous ne choisissez pas cette option maintenant, vous pourrez l'activer plus tard avec la commande « dpkg-reconfigure auth2db ».
";
$elem["auth2db/activate_alerts"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
