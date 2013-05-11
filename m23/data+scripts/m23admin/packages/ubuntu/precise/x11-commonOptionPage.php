<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("x11-common");

$elem["x11-common/xwrapper/allowed_users"]["type"]="select";
$elem["x11-common/xwrapper/allowed_users"]["choices"][1]="Root Only";
$elem["x11-common/xwrapper/allowed_users"]["choices"][2]="Console Users Only";
$elem["x11-common/xwrapper/allowed_users"]["choicesde"][1]="Nur Superuser";
$elem["x11-common/xwrapper/allowed_users"]["choicesde"][2]="Nur Konsolenbenutzer";
$elem["x11-common/xwrapper/allowed_users"]["choicesfr"][1]="Superutilisateur seulement";
$elem["x11-common/xwrapper/allowed_users"]["choicesfr"][2]="Depuis la console";
$elem["x11-common/xwrapper/allowed_users"]["description"]="Users allowed to start the X server:
 Because the X server runs with superuser privileges, it may be unwise to
 permit any user to start it, for security reasons.  On the other hand, it is
 even more unwise to run general-purpose X client programs as root, which is
 what may happen if only root is permitted to start the X server.  A good
 compromise is to permit the X server to be started only by users logged in to
 one of the virtual consoles.
";
$elem["x11-common/xwrapper/allowed_users"]["descriptionde"]="Benutzer, die den X-Server starten dürfen:
 Weil der X-Server mit Superuser-Rechten läuft, kann es unter Sicherheitsaspekten unklug sein, jedem Benutzer das Starten zu erlauben. Andererseits ist es noch unklüger, allgemeine X-Programme als Superuser auszuführen, was passieren könnte, wenn nur der Superuser den X-Server starten darf. Ein guter Kompromiss kann sein, nur den Personen das Starten des X-Servers zu erlauben, die auf einer der virtuellen Konsolen angemeldet sind.
";
$elem["x11-common/xwrapper/allowed_users"]["descriptionfr"]="Utilisateurs autorisés à lancer un serveur X :
 Le serveur X étant lancé avec des droits privilégiés, il n'est pas très prudent pour des raisons de sécurité de permettre à n'importe qui de le lancer. D'un autre côté, il est encore moins prudent de lancer les logiciels clients X en tant que superutilisateur, ce qui risque d'arriver si seul le superutilisateur est autorisé à lancer un serveur X. Un bon compromis est que seuls les utilisateurs connectés sur une des consoles virtuelles puissent lancer un serveur X.
";
$elem["x11-common/xwrapper/allowed_users"]["default"]="Console Users Only";
$elem["x11-common/xwrapper/actual_allowed_users"]["type"]="string";
$elem["x11-common/xwrapper/actual_allowed_users"]["description"]="for internal use
 This template is never shown to the user and does not require translation.
";
$elem["x11-common/xwrapper/actual_allowed_users"]["descriptionde"]="";
$elem["x11-common/xwrapper/actual_allowed_users"]["descriptionfr"]="";
$elem["x11-common/xwrapper/actual_allowed_users"]["default"]="";
PKG_OptionPageTail2($elem);
?>
