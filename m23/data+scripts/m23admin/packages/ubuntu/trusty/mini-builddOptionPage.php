<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mini-buildd");

$elem["mini-buildd/purge_warning"]["type"]="note";
$elem["mini-buildd/purge_warning"]["description"]="mini-buildd data purge warning
 You have chosen to purge mini-buildd.
 .
 As a consequence, the mini-buildd user will be removed
 along with all the files it owns, possibly including Debian
 repositories.
 .
 To keep this data, you need to back it up now.
";
$elem["mini-buildd/purge_warning"]["descriptionde"]="Warnung vor dem vollständigen Entfernen aller mini-buildd-Daten
 Sie möchten mini-buildd vollständig vom Rechner entfernen.
 .
 Hierbei wird der mini-buildd-Benutzer gemeinsam mit allen Dateien entfernt, die ihm zugeordnet sind. Dies schließt möglicherweise Debian-Paketdepots ein.
 .
 Um diese Daten zu behalten, müssen Sie jetzt eine Sicherheitskopie davon erstellen.
";
$elem["mini-buildd/purge_warning"]["descriptionfr"]="Avertissement de purge des données de mini-buildd
 Vous avez choisi de purger mini-buildd.
 .
 Ce choix implique la suppression de l'identifiant utilisé par mini-buildd ainsi que des fichiers dont il est propriétaire. Cela  peut comprendre les dépôts Debian.
 .
 Si vous préférez conserver ces données tout en purgeant le paquet, vous devez en faire une sauvegarde vous-même avant de poursuivre.
";
$elem["mini-buildd/purge_warning"]["default"]="";
$elem["mini-buildd/home"]["type"]="string";
$elem["mini-buildd/home"]["description"]="Home path:
 Please choose the directory where mini-buildd data will be stored.
 The directory will also be the home directory for the mini-buildd user.
 .
 It should have enough space for all the builders and repositories
 you plan to use.
";
$elem["mini-buildd/home"]["descriptionde"]="Home-Verzeichnis:
 Bitte wählen Sie ein Verzeichnis aus, in dem die Daten von mini-buildd gespeichert werden. Das Verzeichnis wird als Home-Verzeichnis für den mini-buildd-Benutzer verwendet.
 .
 Es sollte genügend Platz für alle Bauprogramme und Depots vorhanden sein, die Sie benutzen wollen.
";
$elem["mini-buildd/home"]["descriptionfr"]="Chemin du répertoire personnel (« Home ») :
 Veuillez choisir le dossier dans lequel les données de mini-buildd seront stockées. Le dossier sera également le répertoire personnel pour l'utilisateur mini-buildd.
 .
 Il devra avoir assez de place pour tous les compilateurs et dossiers que vous prévoyez d'utiliser.
";
$elem["mini-buildd/home"]["default"]="/var/lib/mini-buildd";
$elem["mini-buildd/admin_password"]["type"]="password";
$elem["mini-buildd/admin_password"]["description"]="Administrator password for mini-buildd:
 Please choose the password for the administrative user of
 mini-buildd. This password will be used for the \"admin\" user
 in mini-buildd's web interface.
 .
 If you enter a password, this will also trigger the creation of a
 local \"admin\" user.
 .
 If you leave this empty, no user creation will happen.
";
$elem["mini-buildd/admin_password"]["descriptionde"]="Administratorpasswort für mini-buildd:
 Bitte wählen Sie ein Passwort für den administrativen Benutzer von mini-buildd aus. Dieses Passwort wird für den Benutzer »admin« in der Weboberfläche von mini-buildd verwendet.
 .
 Wenn Sie ein Passwort eingeben, wird dadurch auch die Erstellung eines lokalen Benutzers »admin« ausgelöst.
 .
 Wenn Sie dies leer lassen, wird kein Benutzer erstellt.
";
$elem["mini-buildd/admin_password"]["descriptionfr"]="Mot de passe administrateur pour mini-buildd :
 Veuillez choisir le mot de passe pour l'administrateur de mini-buildd. Ce mot de passe sera utilisé pour l'utilisateur « admin » dans l'interface wed de mini-buildd.
 .
 Si vous entrez un mot de passe, cela déclenchera également la création d'un utilisateur « admin » local.
 .
 Si vous laissez ceci vide, aucun utilisateur ne sera créé.
";
$elem["mini-buildd/admin_password"]["default"]="";
$elem["mini-buildd/options"]["type"]="string";
$elem["mini-buildd/options"]["description"]="Extra options:
 Please add any mini-buildd command line options you would like to use
 (\"mini-buildd --help\" gives a list of available options).
 .
 The only options really recommended for use here are \"-v\"/\"--verbose\"
 to increase the log level or \"-q\"/\"--quiet\" to decrease it.
";
$elem["mini-buildd/options"]["descriptionde"]="Zusätzliche Optionen:
 Bitte geben Sie alle Optionen für die Befehlszeile an, die Sie verwenden möchten (»mini-buildd --help« zeigt eine Liste der verfügbaren Optionen).
 .
 Die einzigen Optionen, die hier wirklich zur Verwendung empfohlen werden, sind »-v«/»--verbose«, um den Umfang der Statusmeldungen zu erhöhen und »-q«/»--quiet«, um ihn zu verringern.
";
$elem["mini-buildd/options"]["descriptionfr"]="Options supplémentaires :
 Veuillez ajouter toutes les commandes optionnelles de mini-buildd que vous voudriez utiliser (« mini-buildd --help » donne une liste des options disponibles).
 .
 Les seules options réellement recommandées ici sont « -v « / »--verbose » pour augmenter la verbosité des logs ou « -q « / » --quiet » pour la diminuer.
";
$elem["mini-buildd/options"]["default"]="--verbose";
$elem["mini-buildd/note"]["type"]="note";
$elem["mini-buildd/note"]["description"]="Configuration of mini-buildd complete
 Unless you changed the defaults, you should now be able to visit the
 new home of the local mini-buildd instance at http://localhost:8066.
 .
 A good starting point is the online manual named \"Quickstart\".
";
$elem["mini-buildd/note"]["descriptionde"]="Konfiguration von mini-buildd abgeschlossen
 Sofern Sie die Voreinstellungen nicht geändert haben, sollten Sie nun die Weboberfläche der lokalen mini-buildd-Instanz unter http://localhost:8066 ansehen können.
 .
 Ein guter Einstieg ist das Online-Handbuch unter dem Punkt »Quickstart«.
";
$elem["mini-buildd/note"]["descriptionfr"]="La configuration de mini-buildd est terminée.
 À moins que vous ne modifiez les valeurs par défaut, vous devriez pouvoir vous rendre sur la nouvelle page d'accueil de l'instance mini-buildd à l'adresse http://localhost:8066.
 .
 Un bon point de départ est le manuel en ligne nommé « Quickstart ».
";
$elem["mini-buildd/note"]["default"]="";
PKG_OptionPageTail2($elem);
?>
