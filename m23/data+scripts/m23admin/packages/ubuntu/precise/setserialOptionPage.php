<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("setserial");

$elem["setserial/autosave"]["type"]="boolean";
$elem["setserial/autosave"]["description"]="Automatically configure the serial port parameters?
 It is recommended that the serial port parameters should be
 configured automatically. It is also possible to configure them
 manually by editing the file /etc/serial.conf.
 .
 PCMCIA serial-type devices should be configured with pcmciautils. See
 /usr/share/doc/setserial/README.Debian.gz for details.
";
$elem["setserial/autosave"]["descriptionde"]="Konfiguriere die Parameter der seriellen Schnittstelle automatisch?
 Es wird empfohlen, dass die Parameter der seriellen Schnittstelle automatisch konfiguriert werden. Eine manuelle Konfiguration durch Bearbeitung der Datei /etc/serial.conf ist auch möglich.
 .
 Seriell-artige PCMCIA-Geräte sollten mit den Pcmciautils konfiguriert werden. Lesen Sie /usr/share/doc/setserial/README.Debian.gz für weitere Details.
";
$elem["setserial/autosave"]["descriptionfr"]="Faut-il configurer automatiquement les paramètres du port série ?
 Il est recommandé de configurer automatiquement les paramètres du port série. Dans le cas contraire, ceux-ci peuvent l'être en modifiant le fichier /etc/serial.conf.
 .
 Les périphériques série PCMCIA doivent être configurés avec pcmcia-utils. Veuillez consulter le fichier /usr/share/doc/setserial/README.Debian.gz pour plus d'informations.
";
$elem["setserial/autosave"]["default"]="true";
$elem["setserial/autosave-types"]["type"]="select";
$elem["setserial/autosave-types"]["choices"][1]="autosave once";
$elem["setserial/autosave-types"]["choices"][2]="manual";
$elem["setserial/autosave-types"]["choices"][3]="autosave always";
$elem["setserial/autosave-types"]["choicesde"][1]="einmal automatisch speichern";
$elem["setserial/autosave-types"]["choicesde"][2]="händisch";
$elem["setserial/autosave-types"]["choicesde"][3]="immer automatisch speichern";
$elem["setserial/autosave-types"]["choicesfr"][1]="sauvegarde unique";
$elem["setserial/autosave-types"]["choicesfr"][2]="manuelle";
$elem["setserial/autosave-types"]["choicesfr"][3]="sauvegarde systématique";
$elem["setserial/autosave-types"]["description"]="Type of automatic serial port configuration:
 Setserial allows saving the current serial configuration in various ways:
 .
  autosave once  : save only once, now;
  manual         : never save the configuration automatically;
  autosave always: save on every system shutdown (risks overwriting the
                   serial.conf file with errors);
  kernel         : do not use the serial.conf file and use the kernel settings
                   at bootup.
";
$elem["setserial/autosave-types"]["descriptionde"]="Art der automatischen Konfiguration der seriellen Schnittstelle:
 Setserial erlaubt das Speichern der aktuellen Konfiguration für die serielle Schnittstelle auf verschiedene Arten:
 .
 einmal automatisch speichern: nur einmal (jetzt) speichern;
 händisch                    : die Konfiguration niemals automatisch speichern;
 immer automatisch speichern : jedes Mal beim Herunterfahren des Systems
                               speichern (riskiert das Überschreiben der Datei
                               serial.conf mit Fehlern);Kernel                      : verwende statt der Datei serial.conf die                               Kernel-Einstellungen beim Systemstart.
";
$elem["setserial/autosave-types"]["descriptionfr"]="Mode de configuration automatique des ports série :
 Plusieurs méthodes sont possibles pour la sauvegarde des paramètres des ports série :
 .
  sauvegarde unique       : sauvegarde une seule fois, maintenant ;
  manuelle                : pas de sauvegarde automatique ;
  sauvegarde systématique : sauvegarde à chaque arrêt du système
                            (risque possible d'écrasement avec des
                            paramètres erronés) ;
  noyau                   : pas d'utilisation du fichier serial.conf
                            et utilisation des paramètres du noyau
                            au démarrage.
";
$elem["setserial/autosave-types"]["default"]="autosave once";
$elem["setserial/update-modules-failed"]["type"]="error";
$elem["setserial/update-modules-failed"]["description"]="Error during update-modules configuration for setserial
 The setserial configuration process tried to install the module
 management code to support the serial.o module being loaded and
 unloaded dynamically by the kernel module loader.
 .
 This process failed. This may be caused by a non-standard module
 configuration and should be solved manually by running
 '/sbin/update-modules'.
";
$elem["setserial/update-modules-failed"]["descriptionde"]="Fehler während der update-modules-Konfiguration für Setserial
 Die Konfiguration für Setserial versuchte, das Modul für Management-Code zu laden, um das dynamische Laden bzw. Entladen des serial.o-Moduls durch den Kernel-Modul-Lader zu ermöglichen.
 .
 Dieser Prozess ist fehlgeschlagen. Dies kann durch eine vom Normalfall abweichende Modul-Konfiguration hervorgerufen worden sein und sollte durch händischen Aufruf von »/sbin/update-modules« behoben werden.
";
$elem["setserial/update-modules-failed"]["descriptionfr"]="Erreur pendant la configuration d'update-modules pour setserial
 Le programme de configuration de setserial a essayé de mettre en place le code nécessaire au gestionnaire des modules pour gérer le chargement et déchargement du module serial.o par le gestionnaire de modules du noyau.
 .
 Cette action a échoué. Il se peut que la configuration des modules ne soit pas standard. Il est conseillé de résoudre ce problème en exécutant la commande « /sbin/update-modules » manuellement.
";
$elem["setserial/update-modules-failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
