<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("uw-imapd");

$elem["uw-imapd/protocol"]["type"]="multiselect";
$elem["uw-imapd/protocol"]["choices"][1]="imap2";
$elem["uw-imapd/protocol"]["choices"][2]="imaps";
$elem["uw-imapd/protocol"]["description"]="Server ports and protocols to support:
 Please choose the server ports and protocols to activate.
 .
  imap2: IMAP 4rev1 on TCP port 143 with TLS support;
  imaps: IMAP 4rev1 on TCP port 993 with SSL support;
  imap3: (obsolete) IMAP 3 on TCP port 220 with TLS support.
 .
 It is recommended to activate both imap2 and imaps.
 .
 As the ports and protocols choice may have been overridden by local
 changes, you may need to enforce the choice and run the package
 configuration again with 'dpkg-reconfigure uw-imapd'.
";
$elem["uw-imapd/protocol"]["descriptionde"]="Server-Ports und Protokolle, die unterstützt werden sollen:
 Bitte wählen Sie die zu aktivierenden Server-Ports und Protokolle.
 .
  imap2: IMAP 4rev1 auf TCP-Port 143 mit TLS-Unterstützung;
  imaps: IMAP 4rev1 auf TCP-Port 993 mit SSL-Unterstützung;
  imap3: (veraltet) IMAP 3 auf TCP-Port 220 mit TLS-Unterstützung.
 .
 Es wird empfohlen, sowohl imap2 als auch imaps zu aktivieren.
 .
 Da die Auswahl an Ports und Protokollen durch lokale Änderungen überschrieben sein könnten, müssen Sie eventuell die Auswahl erzwingen und die Paketkonfiguration mit »dpkg-reconfigure uw-imapd« erneut ausführen.
";
$elem["uw-imapd/protocol"]["descriptionfr"]="Port et protocoles à gérer sur le serveur :
 Veuillez choisir les ports et les protocoles à activer sur le serveur.
 .
  imap2 : IMAP 4rev1 sur port TCP 143 avec gestion TLS;
  imaps : IMAP 4rev1 sur port TCP 993 avec gestion SSL;
  imap3 : (obsolète) IMAP 3 sur port TCP 220 avec gestion TLS.
 .
 Il est recommandé d'activer imap2 et imaps.
 .
 Comme les ports choisis pour être activés peuvent être remplacés par des modifications locales, il est recommandé de forcer ces choix et de recommencer la configuration du paquet avec la commande « dpkg-reconfigure uw-imapd ».
";
$elem["uw-imapd/protocol"]["default"]="imap2, imaps";
$elem["uw-imapd/force_debconf_choice"]["type"]="boolean";
$elem["uw-imapd/force_debconf_choice"]["description"]="Enforce port selection?
 The uw-imap daemon supports listening simultaneously on several ports.
 .
 As the ports and protocols choice may have been overridden by local
 changes, you may need to enforce the choice and run the package
 configuration again with 'dpkg-reconfigure uw-imapd'.
";
$elem["uw-imapd/force_debconf_choice"]["descriptionde"]="Port-Auswahl erzwingen?
 Der uw-imap-Daemon kann auf mehreren Ports simultan auf Anfragen warten.
 .
 Da die Auswahl an Ports und Protokollen durch lokale Änderungen überschrieben sein könnten, müssen Sie eventuell die Auswahl erzwingen und die Paketkonfiguration mit »dpkg-reconfigure uw-imapd« erneut ausführen.
";
$elem["uw-imapd/force_debconf_choice"]["descriptionfr"]="Faut-il forcer le choix des ports ?
 Le démon uw-imap peut être à l'écoute sur plusieurs ports simultanément.
 .
 Comme les ports choisis pour être activés peuvent être remplacés par des modifications locales, il est recommandé de forcer ces choix et de recommencer la configuration du paquet avec la commande « dpkg-reconfigure uw-imapd ».
";
$elem["uw-imapd/force_debconf_choice"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
