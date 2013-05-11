<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ipopd");

$elem["ipopd/protocol"]["type"]="multiselect";
$elem["ipopd/protocol"]["choices"][1]="pop3";
$elem["ipopd/protocol"]["choices"][2]="pop3s";
$elem["ipopd/protocol"]["description"]="Server ports and protocols to support:
 Please choose the server ports and protocols to activate.
 .
  pop3:  POP 3 on TCP port 110 with TLS support;
  pop3s: POP 3 on TCP port 995 with SSL support;
  pop2:  (obsolete) POP 2 on TCP port 109 with TLS support.
 .
 It is recommended to activate both pop3 and pop3s.
 .
 As the ports and protocols choice may have been overridden by local
 changes, you may need to enforce the choice and run the package
 configuration again with 'dpkg-reconfigure ipopd'.
";
$elem["ipopd/protocol"]["descriptionde"]="Server-Ports und Protokolle, die unterstützt werden sollen:
 Bitte wählen Sie die zu aktivierenden Server-Ports und Protokolle.
 .
  pop3:  POP 3 auf TCP-Port 110 mit TLS-Unterstützung;
  pop3s: POP 3 auf TCP-Port 995 mit SSL-Unterstützung;
  pop2:  (veraltet) POP 2 auf TCP-Port 109 mit TLS-Unterstützung.
 .
 Es wird empfohlen, sowohl pop3 als auch pop3s zu aktivieren.
 .
 Da die Auswahl an Ports und Protokollen durch lokale Änderungen überschrieben sein könnten, müssen Sie eventuell die Auswahl erzwingen und die Paketkonfiguration mit »dpkg-reconfigure ipopd« erneut ausführen.
";
$elem["ipopd/protocol"]["descriptionfr"]="Port et protocoles à gérer sur le serveur :
 Veuillez choisir les ports et les protocoles à activer sur le serveur.
 .
  pop3  : POP 3 sur port TCP 110 avec gestion TLS;
  pop3s : POP 3 sur port TCP 995 avec gestion SSL;
  pop2  : (obsolète) POP 2 sur port TCP 109 avec gestion TLS.
 .
 Il est recommandé d'activer pop3 et pop3s.
 .
 Comme les ports choisis pour être activés peuvent être remplacés par des modifications locales, il est recommandé de forcer ces choix et de recommencer la configuration du paquet avec la commande « dpkg-reconfigure ipopd ».
";
$elem["ipopd/protocol"]["default"]="pop3, pop3s";
$elem["ipopd/force_debconf_choice"]["type"]="boolean";
$elem["ipopd/force_debconf_choice"]["description"]="Enforce port selection?
 The ipopd daemon supports listening simultaneously on several ports.
 .
 As the ports and protocols choice may have been overridden by local
 changes, you may need to enforce the choice and run the package
 configuration again with 'dpkg-reconfigure ipopd'.
";
$elem["ipopd/force_debconf_choice"]["descriptionde"]="Port-Auswahl erzwingen?
 Der ipopd-Daemon kann auf mehreren Ports simultan auf Anfragen warten.
 .
 Da die Auswahl an Ports und Protokollen durch lokale Änderungen überschrieben sein könnten, müssen Sie eventuell die Auswahl erzwingen und die Paketkonfiguration mit »dpkg-reconfigure ipopd« erneut ausführen.
";
$elem["ipopd/force_debconf_choice"]["descriptionfr"]="Faut-il forcer le choix des ports ?
 Le démon ipopd peut être à l'écoute sur plusieurs ports simultanément.
 .
 Comme les ports choisis pour être activés peuvent être remplacés par des modifications locales, il est recommandé de forcer ces choix et de recommencer la configuration du paquet avec la commande « dpkg-reconfigure ipopd ».
";
$elem["ipopd/force_debconf_choice"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
