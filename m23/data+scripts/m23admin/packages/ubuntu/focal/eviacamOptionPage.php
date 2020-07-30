<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("eviacam");

$elem["eviacamloader/eviacamloader_setuid"]["type"]="boolean";
$elem["eviacamloader/eviacamloader_setuid"]["description"]="Should eviacamloader be installed \"setuid root\"?
 Installing eviacamloader with the set-user-ID bit set enables all
 users who have been added to the group \"eviacam\" to launch eviacam
 with a modified scheduling priority for better responsiveness.
 .
 Since this setting allows eviacamloader to be run with superuser
 privileges, it may have security implications in the case of
 vulnerabilities in eviacamloader's code.
";
$elem["eviacamloader/eviacamloader_setuid"]["descriptionde"]="Soll Eviacamloader mit »setuid root« installiert werden?
 Wenn Eviacamloader mit den gesetztem Set-User-ID-Bit installiert wird, werden alle Benutzer, die der Gruppe »eviacam« hinzugefügt wurden, Eviacam in der Weise benutzen können, dass das Programm vorrangig Rechnerzeit erhält und damit reaktionsschneller wird.
 .
 Da diese Einstellung ermöglicht, Eviacamloader mit Superuser-Rechten auszuführen, können etwaige Schwachstellen im Quelltext von Eviacamloader die Sicherheit des Systems beeinträchtigen.
";
$elem["eviacamloader/eviacamloader_setuid"]["descriptionfr"]="Faut-il utiliser eviacamloader avec les privilèges du superutilisateur  ?
 Installer eviacamloader avec l'octet set-user-ID autorise tous les utilisateurs membres du groupe « eviacam », à lancer eviacam avec une priorité d'exécution modifiée pour de meilleurs temps de réponse.
 .
 Puisque ce paramètre autorise eviacamloader à être exécuté avec les droits superutilisateur, cela peut avoir des répercussions sur la sécurité dans le cas où le code d'eviacamloader contiendrait des vulnérabilités.
";
$elem["eviacamloader/eviacamloader_setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
