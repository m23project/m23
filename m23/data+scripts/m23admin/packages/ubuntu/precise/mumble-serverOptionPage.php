<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mumble-server");

$elem["mumble-server/password"]["type"]="password";
$elem["mumble-server/password"]["description"]="Password to set on SuperUser account:
 Murmur has a special account called \"SuperUser\" which bypasses all
 privilege checks.
 .
 If you set a password here, the password for the \"SuperUser\" account will
 be updated.
 .
 If you leave this blank, the password will not be changed.
";
$elem["mumble-server/password"]["descriptionde"]="Passwort für den Benutzer »SuperUser«:
 Murmur hat einen besonderen Benutzer, der »SuperUser« heißt, der alle Rechteprüfungen umgeht.
 .
 Falls Sie ein Passwort hier eingeben, wird das Passwort für den Benutzer »SuperUser« neu gesetzt.
 .
 Falls Sie dieses Feld leer lassen, wird das Passwort nicht geändert.
";
$elem["mumble-server/password"]["descriptionfr"]="Mot de passe du superutilisateur :
 Murmur utilise un compte spécial appelé « SuperUser » qui contourne toutes les vérifications usuelles de privilèges.
 .
 Le mot de passe indiqué ici sera affecté au compte « SuperUser ».
 .
 Si vous laissez ce champ vide, le mot de passe ne sera pas modifié.
";
$elem["mumble-server/password"]["default"]="";
$elem["mumble-server/start_daemon"]["type"]="boolean";
$elem["mumble-server/start_daemon"]["description"]="Autostart mumble-server on server boot?
 Mumble-server (murmurd) can start automatically when the server is booted.
";
$elem["mumble-server/start_daemon"]["descriptionde"]="Mumble-Server beim Booten automatisch starten?
 Der Mumble-Server (murmurd) kann automatisch gestartet werden, wenn der Server neu gestartet wird.
";
$elem["mumble-server/start_daemon"]["descriptionfr"]="Faut-il démarrer automatiquement mumble-server au lancement de la machine ?
 Le démon de mumble (murmurd) peut être démarré automatiquement lors du lancement de la machine.
";
$elem["mumble-server/start_daemon"]["default"]="true";
$elem["mumble-server/use_capabilities"]["type"]="boolean";
$elem["mumble-server/use_capabilities"]["description"]="Allow mumble-server to use higher priority?
 Mumble-server (murmurd) can use higher process and network priority to
 ensure low latency audio forwarding even on highly loaded servers.
";
$elem["mumble-server/use_capabilities"]["descriptionde"]="Soll dem Mumble-Server erlaubt werden eine höhere Priorität zu nutzen?
 Der Mumble-Server (murmurd) kann eine höhere Prozess- und Netzwerkpriorität nutzen, um sicherzustellen, dass selbst bei hoher Last auf den Servern die Audiosignale mit niedriger Latenz weitergeleitet werden.
";
$elem["mumble-server/use_capabilities"]["descriptionfr"]="Faut-il autoriser mumble-server à utiliser une priorité élevée ?
 Le démon de mumble-server (murmurd) peut utiliser une priorité de processus et de réseau plus élevée afin d'assurer une latence de transfert audio basse même sur des serveurs fortement chargés.
";
$elem["mumble-server/use_capabilities"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
