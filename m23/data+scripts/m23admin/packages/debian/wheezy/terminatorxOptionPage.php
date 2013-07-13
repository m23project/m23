<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("terminatorx");

$elem["terminatorx/suid_bin"]["type"]="boolean";
$elem["terminatorx/suid_bin"]["description"]="Install terminatorX SUID root so it can use realtime scheduling?
 TerminatorX now supports installation of its binary SUID root.  This
 allows it to run in a realtime scheduled priority thereby greatly
 improving performance.  However, it is generally a good idea to minimize
 the number of SUID programs on your machine to avoid security risks.
 .
 If you are installing this on your personal desktop with only 1 user, it
 should be fairly safe to accept here. If in doubt, refuse.
";
$elem["terminatorx/suid_bin"]["descriptionde"]="TerminatorX SUID root installieren, so das es Echtzeit-Scheduling verwenden kann?
 TerminatorX ermöglicht jetzt die Installation seines Programms mit SUID root. Dies erlaubt es ihm, mit Echtzeit-Festlegungs-Priorität zu laufen und damit bedeutend an Leistung zu gewinnen. Allerdings ist es im allgemeinen eine gute Idee, die Anzahl an SUID-Programmen auf Ihrer Maschine zu reduzieren um Sicherheitsrisiken zu vermeiden.
 .
 Falls Sie auf Ihrer persönlichen Arbeitsplatzmaschine mit nur einem Benutzer installieren, sollte es recht sicher sein, hier zu akzeptieren. Im Zweifelsfall lehnen Sie ab.
";
$elem["terminatorx/suid_bin"]["descriptionfr"]="Faut-il installer TerminatorX « setuid root » afin qu'il puisse utiliser le programmateur en temps réel ?
 TerminatorX peut maintenant s'exécuter avec les droits du super-utilisateur même s'il est lancé par un autre utilisateur (« setuid root »). Cela permet de le lancer avec une priorité programmée en temps réel, ce qui améliore considérablement ses performances. Cependant, il est généralement conseillé de limiter le nombre de programmes s'exécutant avec les droits du super-utilisateur sur votre machine, afin d'éviter les failles de sécurité.
 .
 Si vous l'installez sur votre ordinateur personnel et que vous êtes le seul utilisateur, vous devriez pouvoir accepter sans risque. Dans le doute, refusez.
";
$elem["terminatorx/suid_bin"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
