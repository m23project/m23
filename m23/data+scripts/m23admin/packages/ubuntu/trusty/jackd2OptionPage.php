<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jackd2");

$elem["jackd/tweak_rt_limits"]["type"]="boolean";
$elem["jackd/tweak_rt_limits"]["description"]="Enable realtime process priority?
 If you want to run jackd with realtime priorities, the user starting jackd
 needs realtime permissions. Accept this option to create the
 file /etc/security/limits.d/audio.conf, granting realtime
 priority and memlock privileges to the audio group.
 .
 Running jackd with realtime priority minimizes latency, but
 may lead to complete system lock-ups by requesting
 all the available physical system memory, which is unacceptable in
 multi-user environments.
";
$elem["jackd/tweak_rt_limits"]["descriptionde"]="Echtzeit-Verarbeitungspriorität aktivieren?
 Falls Sie Jackd mit Echtzeitpriorität ausführen möchten, benötigt der Benutzer, der Jackd startet, die Echtzeit-Rechte. Akzeptieren Sie diese Option, um die Datei /etc/security/limits.d/audio.conf zu erstellen und damit der Gruppe »audio« Echtzeit- und Memlock-Priorität zu gewähren.
 .
 Durch Betrieb von Jackd mit Echtzeitpriorität wird die Latenz minimiert. Dies kann aber auch zum kompletten Aufhängen des Systems führen, indem der gesamte physische Speicher angefordert wird, was in einer Mehrbenutzerumgebung nicht akzeptabel ist.
";
$elem["jackd/tweak_rt_limits"]["descriptionfr"]="Faut-il activer la gestion des priorités de processus en temps réel ?
 Si vous voulez exécuter jackd avec des priorités en temps réel, l'identifiant qui exécute le démon doit avoir des autorisations « realtime ». Vous pouvez choisir cette option pour créer un fichier /etc/security/limits.d/audio.conf qui donnera la priorité « realtime » et le privilège « memlock » (verrouillage de la mémoire) au groupe « audio ».
 .
 Si jackd est exécuté en priorité temps réel, les délais de latence seront diminués mais cela peut provoquer un gel complet du système si toute la mémoire physique du système est mobilisée, ce qui est difficilement acceptable en environnement multi-utilisateurs.
";
$elem["jackd/tweak_rt_limits"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
