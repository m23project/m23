<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sympa");

$elem["sympa/language"]["type"]="select";
$elem["sympa/language"]["description"]="Default language for Sympa:
";
$elem["sympa/language"]["descriptionde"]="Standardsprache für Sympa:
";
$elem["sympa/language"]["descriptionfr"]="Langue par défaut pour Sympa :
";
$elem["sympa/language"]["default"]="en_US";
$elem["sympa/hostname"]["type"]="string";
$elem["sympa/hostname"]["description"]="Sympa hostname:
 This is the name of the machine or the alias you will use to reach sympa.
 .
 Example:
 .
   listhost.cru.fr
 .
   Then, you will send your sympa commands to:
 .
   sympa@listhost.cru.fr
";
$elem["sympa/hostname"]["descriptionde"]="Sympa-Rechnername:
 Dies ist der Name des Rechners oder der Alias, über den Sympa erreichbar ist.
 .
 Beispiel:
 .
   listhost.cru.fr
 .
   Dann werden Sympa-Befehle gesandt an:
 .
   sympa@listhost.cru.fr
";
$elem["sympa/hostname"]["descriptionfr"]="Nom d'hôte du serveur « sympa » :
 Veuillez indiquer le nom d'hôte de la machine ou de l'alias utilisé pour envoyer des requêtes à Sympa. Par exemple :
 .
 Exemple :
 .
   listhost.cru.fr
 .
 Les commandes de Sympa seront alors envoyées à :
 .
   sympa@listhost.cru.fr
";
$elem["sympa/hostname"]["default"]="";
$elem["sympa/listmaster"]["type"]="string";
$elem["sympa/listmaster"]["description"]="Listmaster email address(es):
 Listmasters are privileged people who administrate mailing lists (mailing
 list superusers).
 .
 Please give listmasters email addresses separated by commas.
 .
 Example:
 .
   postmaster@cru.fr, root@home.cru.fr
";
$elem["sympa/listmaster"]["descriptionde"]="E-Mail-Adresse(n) des Listenadministrators:
 Listenadministratoren sind privilegierte Benutzer, die Mailinglisten verwalten.
 .
 Bitte die E-Mail-Adressen der Listenadministratoren durch Kommata getrennt eingeben.
 .
 Beispiel:
 .
   postmaster@cru.fr, root@home.cru.fr
";
$elem["sympa/listmaster"]["descriptionfr"]="Adresses électroniques des administrateurs de listes :
 Un administrateur de listes (« listmaster ») est une personne qui gère le serveur de listes de diffusion.
 .
 Les adresses électroniques des administrateurs doivent être séparées par des virgules. Par exemple :
 .
 Exemple :
 .
   postmaster@cru.fr, root@home.cru.fr
";
$elem["sympa/listmaster"]["default"]="";
$elem["sympa/remove_spool"]["type"]="boolean";
$elem["sympa/remove_spool"]["description"]="Should lists home and spool directories be removed?
 The lists home directory (/var/lib/sympa) contains the mailing lists
 configurations, mailing list archives and S/MIME user certificates
 (when sympa is configured for using S/MIME encryption and authentication).
 The spool directory (/var/spool/sympa) contains various queue directories.
 .
 Note that if those directories are empty, they will be automatically
 removed.
 .
 Please choose whether you want to remove lists home and spool directories.
";
$elem["sympa/remove_spool"]["descriptionde"]="Sollen die Home- und Spoolverzeichnisse der Listen gelöscht werden?
 Das Home-Verzeichnis der Listen (/var/lib/sympa) enthält die Konfigurationen für die Mailinglisten, die Archive der Mailinglisten und S/MIME-Benutzerzertifikate (wenn Sympa für die Verwendung von S/MIME-Verschlüsselung und Authentifizierung konfiguriert wurde). Das Spool-Verzeichnis /var/spool/sympa enthält verschiedene Queue-Verzeichnisse.
 .
 Falls diese Verzeichnisse leer sein sollten, werden sie automatisch entfernt.
 .
 Bitte wählen Sie aus, ob Sie die Home- und Spoolverzeichnisse der Listen entfernen wollen.
";
$elem["sympa/remove_spool"]["descriptionfr"]="Voulez-vous supprimer les répertoires de listes et de mise en attente ?
 Le répertoire des listes (/var/lib/sympa) contient la configuration des listes de diffusion, les archives de listes de diffusion ainsi que les certificats S/MIME des utilisateurs (quand sympa est configuré pour utiliser le chiffrement et l'authentification S/MIME). Le répertoire de mise en attente (« spool ») (/var/spool/sympa) contient quant à lui des répertoires de files d'attentes diverses.
 .
 Notez que ces répertoires seront automatiquement supprimés s'ils sont vides.
 .
 Veuillez choisir si vous voulez supprimer les répertoires de listes et de mise en attente.
";
$elem["sympa/remove_spool"]["default"]="false";
$elem["wwsympa/wwsympa_url"]["type"]="string";
$elem["wwsympa/wwsympa_url"]["description"]="URL to access WWSympa:
";
$elem["wwsympa/wwsympa_url"]["descriptionde"]="URL zum Zugriff auf WWSympa:
";
$elem["wwsympa/wwsympa_url"]["descriptionfr"]="URL d'accès à WWSympa :
";
$elem["wwsympa/wwsympa_url"]["default"]="";
$elem["wwsympa/webserver_type"]["type"]="select";
$elem["wwsympa/webserver_type"]["choices"][1]="Apache 2";
$elem["wwsympa/webserver_type"]["choicesde"][1]="Apache 2";
$elem["wwsympa/webserver_type"]["choicesfr"][1]="Apache 2";
$elem["wwsympa/webserver_type"]["description"]="Which Web Server(s) are you running?
";
$elem["wwsympa/webserver_type"]["descriptionde"]="Welche(n) Webserver betreiben Sie?
";
$elem["wwsympa/webserver_type"]["descriptionfr"]="Type de serveur(s) Web :
";
$elem["wwsympa/webserver_type"]["default"]="Apache 2";
$elem["wwsympa/fastcgi"]["type"]="boolean";
$elem["wwsympa/fastcgi"]["description"]="Do you want WWSympa to run with FastCGI?
 FastCGI is an Apache module that makes WWSympa run much faster. This
 option will be activated only if the `libapache-mod-fastcgi' package is
 installed on your system. Please first make sure you installed this
 package. FastCGI is required for using the Sympa SOAP server.
";
$elem["wwsympa/fastcgi"]["descriptionde"]="Soll WWSympa mit FastCGI ausgeführt werden?
 FastCGI ist ein Apache-Modul, das WWSympa beschleunigt. Diese Option steht nur zur Auswahl, falls das Paket »libapache-mod-fastcgi« installiert ist. Bitte stellen Sie sicher, dass das Paket installiert ist. FastCGI wird für den Sympa-SOAP-Server benötigt.
";
$elem["wwsympa/fastcgi"]["descriptionfr"]="Voulez-vous utiliser WWSympa avec FastCGI ?
 FastCGI est un module Apache qui permet d'exécuter WWSympa plus rapidement. Cette option ne pourra être activée que si le paquet « libapache-mod-fastcgi » est installé sur votre système. Assurez-vous d'abord que vous avez installé ce paquet. FastCGI est indispensable pour utiliser le serveur SOAP Sympa.
";
$elem["wwsympa/fastcgi"]["default"]="false";
$elem["sympa/use_soap"]["type"]="boolean";
$elem["sympa/use_soap"]["description"]="Do you want the sympa SOAP server to be used?
 Sympa SOAP server allows to access a Sympa service from within another
 program, written in any programming language and on any computer. The SOAP
 server provides a limited set of high level functions including login,
 which, lists, subscribe, signoff.
 .
 The SOAP server uses libsoap-lite-perl package and a webserver like apache.
";
$elem["sympa/use_soap"]["descriptionde"]="Soll der Sympa-SOAP-Server verwendet werden?
 Der Sympa-SOAP-Server erlaubt den Zugriff auf Sympa-Dienste von innerhalb anderer Programme, die in jeder Programmiersprache geschrieben sein können und auf jedem Computer laufen können. Der SOAP-Server stellt eine begrenzte Anzahl von abstrakten Funktionen bereit, darunter login, which, lists, subscribe, signoff.
 .
 Der SOAP-Server verwendet das libsoap-lite-perl-Paket und einen Webserver wie Apache.
";
$elem["sympa/use_soap"]["descriptionfr"]="Voulez-vous utiliser le serveur SOAP Sympa ?
 Le serveur SOAP Sympa permet l'accès au service Sympa depuis un autre programme, quel que soit le langage dans lequel il est écrit et la plateforme sur laquelle il est utilisé. Ce serveur offre un ensemble limité de fonctions de haut niveau, notamment les commandes login, which, lists, subscribe et signoff.
 .
 Le serveur SOAP utilise le paquet libsoap-lite-perl et un serveur web comme Apache.
";
$elem["sympa/use_soap"]["default"]="false";
$elem["wwsympa/webserver_restart"]["type"]="boolean";
$elem["wwsympa/webserver_restart"]["description"]="Do you want the Web server to be restarted after installation?
 If you don't want the webserver to be restarted, please make sure that wwsympa
 and the Sympa SOAP server are not running or the database may contain duplicates.
";
$elem["wwsympa/webserver_restart"]["descriptionde"]="Soll der Webserver nach der Installation neu gestartet werden?
 Falls Sie nicht möchten, dass der Webserver neu gestartet wird, stellen Sie sicher, dass Wwsympa und der Sympa-SOAP-Server nicht laufen, ansonsten könnte die Datenbank Dubletten enthalten.
";
$elem["wwsympa/webserver_restart"]["descriptionfr"]="Voulez-vous redémarrer le serveur Web après l'installation ?
 Si vous ne souhaitez pas que le serveur web soit redémarré, veuillez contrôler que wwsympa et le serveur SOAP ne sont pas actifs, sinon la base de données risque de contenir des doublons.
";
$elem["wwsympa/webserver_restart"]["default"]="true";
$elem["wwsympa/remove_spool"]["type"]="boolean";
$elem["wwsympa/remove_spool"]["description"]="Should the web archives and the bounce directory be removed?
 If you used the default configuration, WWSympa web archives are located in
 /var/lib/sympa/wwsarchive. The WWSympa bounce directory contains bounces
 (non-delivery reports) and is set to /var/spool/sympa/wwsbounce by
 default.
 .
 Please choose whether you want to remove the web archives and the bounce
 directory.
";
$elem["wwsympa/remove_spool"]["descriptionde"]="Sollen die Webarchive und das Bounce-Verzeichnis gelöscht werden?
 WWSympa Webarchive befinden sich in der Standardkonfiguration im Verzeichnis /var/lib/sympa/wwwsarchive. Das Bounceverzeichnis befindet sich in /var/spool/sympa/wwsbounce und enthält Berichte über nicht-erfolgte Zustellungen.
 .
 Wählen Sie aus, ob Sie die WWW-Archive und das Verzeichnis für Bounces entfernt haben möchten.
";
$elem["wwsympa/remove_spool"]["descriptionfr"]="Supprimer les archives web et le répertoire de rejets lors de la purge de sympa ?
 Si vous utilisez la configuration par défaut, les archives web de WWSympa se trouvent dans le répertoire /var/lib/sympa/wwsarchive. Le sous-répertoire de rejets (« bounce ») de WWSympa contient quant à lui les comptes-rendus de courriers non délivrés (« bounces »). Son emplacement par défaut est /var/spool/sympa/wwsbounce.
 .
 Veuillez choisir si vous souhaitez supprimer les archives web et le sous-répertoire de rejets au moment de l'exécution de « dpkg --purge sympa ».
";
$elem["wwsympa/remove_spool"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
