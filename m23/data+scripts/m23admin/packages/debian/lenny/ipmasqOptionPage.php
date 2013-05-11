<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ipmasq");

$elem["ipmasq/dpkg-conffiles"]["type"]="note";
$elem["ipmasq/dpkg-conffiles"]["description"]="/etc/ipmasq/rules now conffiles
 The rules files located in /etc/ipmasq/rules have been placed under
 package manager control as of version 3.4.0.  It is safe (and recommended)
 to allow dpkg to replace your version.
";
$elem["ipmasq/dpkg-conffiles"]["descriptionde"]="/etc/ipmasq/rules sind jetzt Konfigurationsdateien
 Die Regel-Dateien in /etc/ipmasq/rules sind seit Version 3.4.0 unter der Paketverwaltungs-Kontrolle. Es ist sicher (und wird empfohlen), dpkg das Ersetzen Ihrer Version zu gestatten.
";
$elem["ipmasq/dpkg-conffiles"]["descriptionfr"]="Les /etc/ipmasq/rules sont maintenant des fichiers de configuration
 Les fichiers de règles situés dans /etc/ipmasq/rules ont été placés sous le contrôle du gestionnaire de paquet, depuis la version 3.4.0. Laisser dpkg changer votre version est sans danger et même recommandé.
";
$elem["ipmasq/dpkg-conffiles"]["default"]="";
$elem["ipmasq/external-rules-moved"]["type"]="boolean";
$elem["ipmasq/external-rules-moved"]["description"]="External interface rules moved; move them?
 The rules files I50external.def and O50external.def have changed position
 to I90external.def and O90external.def, respectively.  May I move these
 rules files (and their corresponding .rul files) to their new positions?
";
$elem["ipmasq/external-rules-moved"]["descriptionde"]="Neuer Ort für Ext. Interf. Regeln; sollen Ihre Dateien verschoben werden?
 Die Regel-Dateien I50external.def und O50external.def wurden umbenannt in I90external.def und O90external.def. Möchten Sie diese Regel-Dateien (und die zugehörigen .rul Dateien) dorthin verschieben?
";
$elem["ipmasq/external-rules-moved"]["descriptionfr"]="Faut-il déplacer les fichiers de règles pour l'interface externe ?
 Les fichiers de règles I50external.def et O50external.def sont devenus, respectivement, I90external.def et O90external.def. Les noms de ces fichiers et des fichiers .rul correspondants peuvent-ils être modifiés ?
";
$elem["ipmasq/external-rules-moved"]["default"]="true";
$elem["ipmasq/old-rc.boot-file"]["type"]="boolean";
$elem["ipmasq/old-rc.boot-file"]["description"]="Delete outdated boot script?
 Should I delete the old, no longer used /etc/rc.boot/ipmasq boot script?
";
$elem["ipmasq/old-rc.boot-file"]["descriptionde"]="Soll das veraltete Boot-Skript gelöscht werden?
 Soll das alte, nicht länger benutzte Boot-Skript /etc/rc.boot/ipmasq gelöscht werden?
";
$elem["ipmasq/old-rc.boot-file"]["descriptionfr"]="Faut-il supprimer l'ancien script de démarrage ?
 Faut-il supprimer l'ancien script de démarrage /etc/rc.boot/ipmasq qui n'est plus utilisé ?
";
$elem["ipmasq/old-rc.boot-file"]["default"]="true";
$elem["ipmasq/old-ipmasq.conf"]["type"]="boolean";
$elem["ipmasq/old-ipmasq.conf"]["description"]="Delete outdated configuration file?
 The configuration file /etc/ipmasq.conf is no longer used and the
 information it contains is determined automatically by ipmasq.  Should I
 delete the file /etc/ipmasq.conf?
";
$elem["ipmasq/old-ipmasq.conf"]["descriptionde"]="Soll die veraltete Konfigurationsdatei gelöscht werden?
 Die Konfigurationsdatei /etc/ipmasq.conf wird nicht mehr benutzt und die darin enthaltenen Informationen werden nun automatisch durch ipmasq festgestellt. Soll die Datei /etc/ipmasq.conf gelöscht werden?
";
$elem["ipmasq/old-ipmasq.conf"]["descriptionfr"]="Faut-il supprimer l'ancien fichier de configuration ?
 Le fichier de configuration /etc/ipmasq.conf n'est plus utilisé et les informations qu'il contient sont déterminées automatiquement par ipmasq. Faut-il supprimer le fichier /etc/ipmasq.conf ?
";
$elem["ipmasq/old-ipmasq.conf"]["default"]="true";
$elem["ipmasq/move-ipmasq.rules"]["type"]="boolean";
$elem["ipmasq/move-ipmasq.rules"]["description"]="Move custom rules file to new location?
 Should I move your /etc/ipmasq.rules into the /etc/ipmasq/rules directory?
";
$elem["ipmasq/move-ipmasq.rules"]["descriptionde"]="Sollen Ihre Regel-Dateien verschoben werden?
 Sollen Ihre Dateien /etc/ipmasq.rules in das Verzeichnis /etc/ipmasq/rules verschoben werden?
";
$elem["ipmasq/move-ipmasq.rules"]["descriptionfr"]="Faut-il déplacer votre fichier de règles à sa nouvelle place ?
 Faut-il déplacer le fichier /etc/ipmasq.rules dans le répertoire /etc/ipmasq/rules ?
";
$elem["ipmasq/move-ipmasq.rules"]["default"]="true";
$elem["ipmasq/ppp-recompute"]["type"]="boolean";
$elem["ipmasq/ppp-recompute"]["description"]="Should PPP connections recompute the firewall?
 Do you wish to have ipmasq recompute the firewall rules when pppd brings
 up or takes down a link?
";
$elem["ipmasq/ppp-recompute"]["descriptionde"]="Soll eine PPP-Verbindung die Firewall anpassen?
 Möchten Sie, dass ipmasq die Firewall-Regeln anpasst, wenn pppd eine Verbindung auf- oder abbaut?
";
$elem["ipmasq/ppp-recompute"]["descriptionfr"]="Les connexions PPP doivent-elles recalculer les règles du pare-feu ?
 Souhaitez-vous qu'ipmasq recalcule les règles du pare-feu quand le démon pppd établit ou interrompt une liaison ?
";
$elem["ipmasq/ppp-recompute"]["default"]="true";
$elem["ipmasq/ppp-turn-on"]["type"]="note";
$elem["ipmasq/ppp-turn-on"]["description"]="PPP recomputation controlled by file /etc/ipmasq/ppp
 Ipmasq will recompute the firewall rules if the file /etc/ipmasq/ppp is
 present.
 .
 Create the file /etc/ipmasq/ppp to have ipmasq recompute the firewall when
 pppd brings up or takes down a link.
";
$elem["ipmasq/ppp-turn-on"]["descriptionde"]="PPP-Anpassung wird durch die Datei /etc/ipmasq/ppp verwaltet
 Ipmasq passt die Firewall-Regeln an, wenn die Datei /etc/ipmasq/ppp vorhanden ist.
 .
 Erstellen Sie die Datei /etc/ipmasq/ppp, damit ipmasq die Firewall anpasst, wenn pppd eine Verbindung auf- oder abbaut.
";
$elem["ipmasq/ppp-turn-on"]["descriptionfr"]="Le fichier /etc/ipmasq/ppp contrôle la façon de recalculer
 Ipmasq recalcule les règles du pare-feu si le fichier /etc/ipmasq/ppp existe.
 .
 Le fichier /etc/ipmasq/ppp doit être créé pour qu'ipmasq recalcule les règles du pare-feu quand le démon pppd établit ou interrompt une liaison.
";
$elem["ipmasq/ppp-turn-on"]["default"]="";
$elem["ipmasq/ppp-turn-off"]["type"]="note";
$elem["ipmasq/ppp-turn-off"]["description"]="PPP recomputation controlled by file /etc/ipmasq/ppp
 Ipmasq will recompute the firewall rules if the file /etc/ipmasq/ppp is
 present.
 .
 Delete the file /etc/ipmasq/ppp to stop having ipmasq recompute the
 firewall when pppd brings up or takes down a link.
";
$elem["ipmasq/ppp-turn-off"]["descriptionde"]="PPP-Anpassung wird durch die Datei /etc/ipmasq/ppp verwaltet
 Ipmasq passt die Firewall-Regeln an, wenn die Datei /etc/ipmasq/ppp vorhanden ist.
 .
 Löschen Sie die Datei /etc/ipmasq/ppp, damit ipmasq nicht mehr die Firewall anpasst, wenn pppd eine Verbindung auf- oder abbaut.
";
$elem["ipmasq/ppp-turn-off"]["descriptionfr"]="Le fichier /etc/ipmasq/ppp contrôle la façon de recalculer
 Ipmasq recalcule les règles du pare-feu si le fichier /etc/ipmasq/ppp existe.
 .
 Il faut supprimer le fichier /etc/ipmasq/ppp pour qu'ipmasq cesse de recalculer les règles du pare-feu quand le démon pppd établit ou interrompt une liaison.
";
$elem["ipmasq/ppp-turn-off"]["default"]="";
$elem["ipmasq/start"]["type"]="boolean";
$elem["ipmasq/start"]["description"]="Start ipmasq?
 Should I start IP Masquerading?
";
$elem["ipmasq/start"]["descriptionde"]="ipmasq starten?
 Soll IP-Masquerading gestartet werden?
";
$elem["ipmasq/start"]["descriptionfr"]="Faut-il démarrer ipmasq ?
 Faut-il lancer le masquage des adresses IP ?
";
$elem["ipmasq/start"]["default"]="false";
$elem["ipmasq/start-location"]["type"]="select";
$elem["ipmasq/start-location"]["choices"][1]="Disable";
$elem["ipmasq/start-location"]["choices"][2]="After network interfaces are brought up";
$elem["ipmasq/start-location"]["choices"][3]="After network filesystems are mounted";
$elem["ipmasq/start-location"]["choices"][4]="After network services have been started";
$elem["ipmasq/start-location"]["choicesde"][1]="Deaktiviert";
$elem["ipmasq/start-location"]["choicesde"][2]="Nachdem Netzwerkschnittstellen aktiv sind";
$elem["ipmasq/start-location"]["choicesde"][3]="Nachdem Netzwerk-Dateisysteme eingebunden sind";
$elem["ipmasq/start-location"]["choicesde"][4]="Nachdem Netzwerkdienste gestartet wurden";
$elem["ipmasq/start-location"]["choicesfr"][1]="Désactivation";
$elem["ipmasq/start-location"]["choicesfr"][2]="Une fois les interfaces réseau établies";
$elem["ipmasq/start-location"]["choicesfr"][3]="Une fois les systèmes de fichiers réseau montés";
$elem["ipmasq/start-location"]["choicesfr"][4]="Une fois les services réseau démarrés";
$elem["ipmasq/start-location"]["description"]="When should ipmasq be started?
 Ipmasq can be told initially to compute the firewall rules at one of a
 number of points in the boot process.  This question asks at which point
 ipmasq should start.
";
$elem["ipmasq/start-location"]["descriptionde"]="Wann soll ipmasq gestartet werden?
 Ipmasq kann mitgeteilt werden, wann die Anpassung der Firewall-Regeln beim Systemstart vorgenommen werden soll. Diese Frage bezieht sich auf den Zeitpunkt, an dem ipmasq starten soll.
";
$elem["ipmasq/start-location"]["descriptionfr"]="Quand faut-il lancer ipmasq ?
 Il est possible de demander à ipmasq de faire le premier calcul des règles du pare-feu à plusieurs moments du processus de démarrage. À quel moment ce calcul doit-il prendre place ?
";
$elem["ipmasq/start-location"]["default"]="After network interfaces are brought up";
PKG_OptionPageTail2($elem);
?>
