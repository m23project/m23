<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xfstt");

$elem["xfstt/listen_tcp"]["type"]="boolean";
$elem["xfstt/listen_tcp"]["description"]="Do you want xfstt to listen on a TCP port?
 Xfstt runs as superuser, but only before a connection is established with
 the client, then it drops superuser privileges and is run as user nobody.
 .
 This approach is fairly secure, but if you are not going to provide fonts
 to remote hosts, it is recommended to not listen to network connections.
";
$elem["xfstt/listen_tcp"]["descriptionde"]="Möchten Sie, das Xfstt an einem TCP-Port lauscht?
 Xfstt läuft mir Root-Rechten, aber nur bis eine Verbindung mit dem Client etabliert ist, dann lässt es die Root-Rechte fallen und läuft als Benutzer nobody.
 .
 Diese Herangehensweise ist recht sicher, aber falls Sie entfernten Rechnern keine Schriften anbieten wollen, wird empfohlen, dass nicht an Netzverbindungen gelauscht wird.
";
$elem["xfstt/listen_tcp"]["descriptionfr"]="Voulez-vous que xfstt écoute un port TCP ?
 Xfstt fonctionne avec les droits du super-utilisateur, mais seulement avant qu'une connexion ne soit établie avec le client ; il abandonne ensuite ces droits et fonctionne en tant qu'utilisateur nobody.
 .
 Cette manière de faire est relativement sûre ; mais si vous ne voulez pas offrir de polices à des sites distants, il est recommandé de ne pas permettre ces connexions par le réseau.
";
$elem["xfstt/listen_tcp"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
