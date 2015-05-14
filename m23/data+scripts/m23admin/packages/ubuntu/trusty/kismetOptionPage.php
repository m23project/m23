<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kismet");

$elem["kismet/install-setuid"]["type"]="boolean";
$elem["kismet/install-setuid"]["description"]="Install Kismet \"setuid root\"?
 Kismet needs root privileges for some of its functions. However, running it
 as root (\"sudo kismet\") is not recommended, since running all of the code
 with elevated privileges increases the risk of bugs doing system-wide
 damage. Instead Kismet can be installed with the \"setuid\" bit set, which
 will allow it to grant these privileges automatically to the processes that
 need them, excluding the user interface and packet decoding parts.
 .
 Enabling this feature allows users in the \"kismet\" group to run Kismet
 (and capture packets, change wireless card state, etc), so only thoroughly
 trusted users should be granted membership of the group.
 .
 For more detailed information, see section 4 of the Kismet README
 (\"Suidroot & Security\"), which can be found at
 /usr/share/doc/kismet/README or \"http://www.kismetwireless.net/README\".
";
$elem["kismet/install-setuid"]["descriptionde"]="Kismet mit »setuid root« installieren?
 Für einige seiner Funktionen benötigt Kismet Root-Rechte. Es wird jedoch nicht empfohlen, es als Root auszuführen (»sudo kismet«), da die Ausführung des ganzen Codes mit erhöhten Rechten das Risiko vergrößert, dass Fehler systemweiten Schaden anrichten. Stattdessen kann Kismet mit gesetztem »setuid«-Bit installiert werden, wodurch diese Rechte automatisch dem Prozess gewährt werden, der sie benötigt, ausschließlich der Benutzeroberfläche und Teilen zum Dekodieren von Datenpaketen.
 .
 Das Aktivieren dieser Funktionalität ermöglicht Benutzern in der Gruppe »kismet«, Kismet auszuführen (und Datenpakete zu erfassen, den Status von Drahtlosnetzwerkkarten zu ändern, etc.), daher sollte nur völlig vertrauenswürdigen Benutzern die Mitgliedschaft in dieser Gruppe gewährt werden.
 .
 Für weitere detaillierte Informationen lesen Sie Abschnitt 4 der Kismet-README-Datei (»Suidroot & Security«). Diese kann unter /usr/share/doc/kismet/README oder »http://www.kismetwireless.net/README« gefunden werden.
";
$elem["kismet/install-setuid"]["descriptionfr"]="Faut-il installer Kismet avec les privilèges du superutilisateur ?
 Kismet a besoin des privilèges du superutilisateur pour certaines de ses fonctions. Toutefois, l'exécution de Kismet avec des privilèges élevés (« sudo kismet ») n'est pas recommandée puisque cela augmente le risque d'endommager le système. À la place, Kismet peut être installé en fixant le bit « setuid » ce qui permet d'accorder ces privilèges automatiquement aux processus qui les nécessitent en excluant l'interface utilisateur ainsi que les parties de décodage de paquets.
 .
 L'activation de cette fonctionnalité permet aux utilisateurs du groupe « kismet » d'exécuter Kismet (avec la capture de paquets, le changement de l'état de la carte wifi, etc.), ce qui permet de restreindre le programme à un groupe particulier d'utilisateurs de confiance.
 .
 Pour davantage d'information, veuillez vous référer à la section 4 du fichier README de Kismet (Suidroot et Sécurité) qui se trouve dans le répertoire « /usr/share/doc/kismet/ » ou à l'adresse « http://www.kismetwireless.net/README ».
";
$elem["kismet/install-setuid"]["default"]="true";
$elem["kismet/install-users"]["type"]="string";
$elem["kismet/install-users"]["description"]="Users to add to the kismet group:
 Only users in the kismet group are able to use kismet under the setuid
 model.
 .
 Please specify the users to be added to the group, as a
 space-separated list.
 .
 Note that currently logged-in users who are added to a group will
 typically need to log out and log in again before it is recognized.
";
$elem["kismet/install-users"]["descriptionde"]="Benutzer zur Gruppe »kismet« hinzufügen:
 Nur Benutzer in der Gruppe »kismet« können Kismet unter dem Setuid-Modell nutzen.
 .
 Bitte geben Sie die Benutzer, die der Gruppe hinzugefügt werden sollen, als eine durch Leerzeichen getrennte Liste an.
 .
 Beachten Sie, dass derzeit angemeldete Benutzer, die einer Gruppe hinzugefügt werden, sich normalerweise ab- und wieder anmelden müssen, bevor dies erkannt wird.
";
$elem["kismet/install-users"]["descriptionfr"]="Utilisateurs à ajouter au groupe « kismet » :
 Seuls les utilisateurs membres du groupe « kismet » peuvent utiliser kismet dans le modèle « setuid ».
 .
 Veuillez indiquer les utilisateurs qui doivent être ajoutés au groupe (selon une liste séparée par un espace).
 .
 Veuillez noter que les utilisateurs actuellement connectés au système et qui sont ajoutés à ce groupe doivent se déconnecter et se reconnecter à nouveau pour pouvoir se servir du programme.
";
$elem["kismet/install-users"]["default"]="";
PKG_OptionPageTail2($elem);
?>
