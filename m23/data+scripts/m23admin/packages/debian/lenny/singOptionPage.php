<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sing");

$elem["sing/suid_or_not"]["type"]="boolean";
$elem["sing/suid_or_not"]["description"]="Do you want to make 'sing' suid?
 For 'sing' to work for non-root users, it needs to be suid.
 .
 Please keep in mind that making 'sing' suid, allows non-root users to send
 spoofed ICMP messages from your machine.
 .
 If you don't know what that means, refuse to make it suid here,
 and run 'sing' only as root.
";
$elem["sing/suid_or_not"]["descriptionde"]="Möchten Sie sing mit dem SUID-Bit versehen?
 Damit sing von anderen Benutzern als root ausgeführt werden kann, muss das suid-Bit gesetzt werden.
 .
 Bitte beachten Sie, dass in diesem Fall alle Benutzer gefälschte ICMP-Nachrichten über diesen Rechner versenden können.
 .
 Wenn Sie nicht wissen, was das bedeutet, dann sollten Sie es nicht mit dem SUID-Bit versehen und sing nur als root ausführen.
";
$elem["sing/suid_or_not"]["descriptionfr"]="Faut-il que sing soit exécuté avec les droits du superutilisateur (« suid ») ?
 Pour que les utilisateurs non privilégiés puissent utiliser sing, il doit être lancé avec les droits du superutilisateur (« root »).
 .
 Veuillez garder à l'esprit que rendre sing « suid » permettra aux utilisateurs autres que root d'envoyer des paquets ICMP abusifs depuis votre machine.
 .
 Si vous ne comprenez pas ce que cela signifie, refusez cette option et n'exécutez sing qu'en tant que superutilisateur.
";
$elem["sing/suid_or_not"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
