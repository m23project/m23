<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("plptools");

$elem["plptools/customize"]["type"]="note";
$elem["plptools/customize"]["description"]="Customize /etc/default/plptools
 In addition to plptools' main daemon \"ncpd\", plptools provides two optional
 daemons:
 .
  plpnfuse (for mounting a Psion's drives using Filesystem in USErspace)
  plpprintd (for printing via PC from a Psion Series 5)
 .
 Both daemons are disabled by default. You can enable them by editing
 /etc/default/plptools.
";
$elem["plptools/customize"]["descriptionde"]="/etc/default/plptools anpassen
 Zusätzlich zum Haupt-Daemon von Plptools »ncpd« stellt Plptools zwei optionale Daemons zur Verfügung:
 .
  plpnfuse (zum Einhängen von Laufwerken eines Psions mittels Dateisystem im Userspace)
  plpprintd (zum Drucken über einen PC von einem Psion der Serie 5 aus)
 .
 Beide Daemons sind in der Voreinstellung deaktiviert. Sie können sie durch Editieren von /etc/default/plptools aktivieren.
";
$elem["plptools/customize"]["descriptionfr"]="Personnalisation de /etc/plptools.conf
 En plus du démon principal de plptools « ncpd », deux autres démons optionnels sont fournis :
 .
  - plpnfuse  : montage des disques d'un Psion dans l'espace utilisateur
  - plpprintd : impression d'un Psion Series 5 via un PC.
 .
 Les deux démons sont désactivés par défaut. Pour les activer vous devrez modifier le fichier /etc/default/plptools.
";
$elem["plptools/customize"]["default"]="";
$elem["plptools/ncpd/start"]["type"]="boolean";
$elem["plptools/ncpd/start"]["description"]="Should ncpd be started during boot?
 Normally, ncpd - the daemon which handles the serial connection to a
 Psion - is started on boot-up. If you intend to connect your Psion to
 another machine on the net and NEVER will use it locally, you can
 disable this here.
";
$elem["plptools/ncpd/start"]["descriptionde"]="Soll ncdp beim Systemstart gestartet werden?
 Normalerweise wird ncpd - der Daemon, welcher die serielle Verbindung zu einem Psion verwaltet - beim Systemstart gestartet. Falls Sie vorhaben, Ihren Psion mit einem anderen Rechner im Netz zu verbinden und ihn NIE lokal verwenden, können Sie dies hier abschalten.
";
$elem["plptools/ncpd/start"]["descriptionfr"]="Faut-il lancer ncpd au démarrage ?
 Normalement, ncpd (le démon qui gère la connexion série à un Psion) est lancé au démarrage. Si vous avez l'intention de connecter le Psion à une autre machine du réseau mais JAMAIS à celle-ci, vous pouvez le désactiver.
";
$elem["plptools/ncpd/start"]["default"]="true";
$elem["plptools/ncpd/serial"]["type"]="string";
$elem["plptools/ncpd/serial"]["description"]="Specify serial line to be used
 By default, the Psion is expected to be connected to the first serial
 line (COM1:) of your machine. You can change this here.
";
$elem["plptools/ncpd/serial"]["descriptionde"]="Geben Sie die serielle Schnittstelle an, die verwendet werden soll
 In der Voreinstellung wird erwartet, dass der Psion mit der ersten seriellen Schnittstelle (COM1:) ihres Rechners verbunden ist. Sie können dies hier ändern.
";
$elem["plptools/ncpd/serial"]["descriptionfr"]="Ligne série à utiliser :
 Veuillez indiquer la ligne série à utiliser pour la connexion du Psion.
";
$elem["plptools/ncpd/serial"]["default"]="/dev/ttyS0";
$elem["plptools/ncpd/listenat"]["type"]="string";
$elem["plptools/ncpd/listenat"]["description"]="Specify the IP address and port for ncpd
 If you intend to use the plptools front-ends from other machines, you
 can specify 0.0.0.0 or the IP address of your machine here. Normal
 users should keep the default 127.0.0.1!
 .
 Note, that THIS IS A SECURITY THREAT as no authentication and no
 encryption is used! DO NOT USE THIS on machines which are accessible
 from the Internet!
";
$elem["plptools/ncpd/listenat"]["descriptionde"]="Geben Sie die IP-Adresse und den Port für ncpd an
 Falls Sie vorhaben, die Frontends der Plptools von einem anderen Rechner aus zu verwenden, können Sie 0.0.0.0 oder die IP-Adresse ihres Rechners hier eingeben. Gewöhnliche Anwender sollten die Voreinstellung 127.0.0.1 belassen.
 .
 Beachten Sie, dass DIES EIN SICHERHEITSRISIKO IST, da keine Authentifizierung und keine Verschlüsselung verwendet wird! VERWENDEN SIE DIES NICHT auf Rechnern, die vom Internet aus zugänglich sind!
";
$elem["plptools/ncpd/listenat"]["descriptionfr"]="Adresse IP et port pour ncpd :
 Si vous prévoyez d'utiliser les frontaux de plptools à partir d'autres machines, vous pouvez entrer 0.0.0.0 ou l'adresse IP de cette machine-ci. Pour une utilisation classique, veuillez conserver la valeur par défaut 127.0.0.1.
 .
 Veuillez noter que cela peut avoir des implications de sécurité car aucune authentification ni aucun chiffrement ne sont utilisés. Il est déconseillé d'utiliser cette fonctionnalité sur des machines connectées à l'Internet.
";
$elem["plptools/ncpd/listenat"]["default"]="127.0.0.1";
$elem["plptools/plpfuse/start"]["type"]="boolean";
$elem["plptools/plpfuse/start"]["description"]="Should plpfuse be started during boot?
 If plpfuse is started during boot-up, it will wait for a Psion being
 connected and then automatically mount that Psion. Since this is
 done as root, non-privileged users will not have access to the
 mounted directory. If you have a single-user machine, you probably
 want to start plpfuse manually when you need it.
";
$elem["plptools/plpfuse/start"]["descriptionde"]="Soll plpfuse während des Systemstarts gestartet werden?
 Falls plpfuse während des Systemstarts gestartet wird, wird es warten, bis ein Psion angeschlossen wird und dann den Psion automatisch in den Verzeichnisbaum einhängen. Da dies als root ausgeführt wird, werden nicht-privilegierte Nutzer keinen Zugang zu dem eingehängten Verzeichnis haben. Falls Sie einen Ein-Benutzer-Rechner haben, möchten Sie möglicherweise plpfuse manuell starten, wenn Sie es benötigen.
";
$elem["plptools/plpfuse/start"]["descriptionfr"]="Faut-il lancer plpfuse au démarrage du système?
 Si plpfuse est lancé au démarrage, il attendra la connexion d'un Psion puis le montera automatiquement. Comme cela est fait avec les privilèges du superutilisateur, les utilisateurs non privilégiés n'auront pas accès au répertoire monté. Sur une machine mono-utilisateur, vous devriez démarrer plpfuse vous-même au moment où vous en aurez besoin.
";
$elem["plptools/plpfuse/start"]["default"]="false";
$elem["plptools/plpprintd/start"]["type"]="boolean";
$elem["plptools/plpprintd/start"]["description"]="Should plpprintd be started during boot?
 If you intend to use the Psion's \"Print via PC\" feature, you can
 enable this option. You must have a working print queue which
 is capable of printing Postscript in order to use this feature.
";
$elem["plptools/plpprintd/start"]["descriptionde"]="Soll plpprintd während des Systemstarts gestartet werden?
 Falls Sie vorhaben, die »Drucken über PC«-Funktion des Psions zu verwenden, können Sie diese Option aktivieren. Sie müssen eine funktionierende Druckwarteschlange haben, die Postscript drucken kann, um diese Funktion zu verwenden.
";
$elem["plptools/plpprintd/start"]["descriptionfr"]="Faut-il lancer plpprintd au démarrage ?
 Si vous prévoyez d'utiliser la fonction « Imprimer via un PC » du Psion, vous pouvez activer cette option. Pour cela, vous devez avoir une file d'attente active et capable d'imprimer du PostScript.
";
$elem["plptools/plpprintd/start"]["default"]="false";
$elem["plptools/plpprintd/printqueue"]["type"]="string";
$elem["plptools/plpprintd/printqueue"]["description"]="Specify the print queue to be used
 Please enter the name of the print queue you want to use for
 printing from the Psion.
";
$elem["plptools/plpprintd/printqueue"]["descriptionde"]="Geben Sie die Druckwarteschlange ein, die verwendet werden soll
 Bitte geben Sie den Namen der Druckwarteschlange an, die Sie zum Drucken vom Psion verwenden möchten.
";
$elem["plptools/plpprintd/printqueue"]["descriptionfr"]="File d'attente d'impression à utiliser :
 Veuillez entrer le nom de la file d'attente d'impression que vous souhaitez utiliser pour imprimer à partir du Psion.
";
$elem["plptools/plpprintd/printqueue"]["default"]="psion";
$elem["plptools/frontends/remoteaddr"]["type"]="string";
$elem["plptools/frontends/remoteaddr"]["description"]="Specify remote host to be contacted
 Since you have ncpd either disabled or listening on a non-standard
 address, you should specify the address for the frontends again.
";
$elem["plptools/frontends/remoteaddr"]["descriptionde"]="Geben Sie den entfernten Rechner ein, mit dem verbunden werden soll
 Da Sie ncpd entweder deaktiviert haben oder ndpd nicht an die Standardadresse gebunden ist, sollten Sie die Adresse für die Frontends eingeben.
";
$elem["plptools/frontends/remoteaddr"]["descriptionfr"]="Hôte distant à contacter :
 Comme ncpd est désactivé ou à l'écoute sur une adresse non standard, vous devriez à nouveau indiquer l'adresse des frontaux.
";
$elem["plptools/frontends/remoteaddr"]["default"]="";
PKG_OptionPageTail2($elem);
?>
