<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("uftp");

$elem["uftp/dest_dir"]["type"]="string";
$elem["uftp/dest_dir"]["description"]="Destination directories for received files:
 When an incoming file specifies an absolute path, it must match one of the
 destination directories, otherwise the file will be rejected. Incoming files
 that don't specify an absolute path will be received into the first
 destination directory in the list.
 .
 Default is '/tmp'.
";
$elem["uftp/dest_dir"]["descriptionde"]="Zielverzeichnisse für empfangenen Dateien:
 Wenn eine eingehende Datei mit absolutem Pfad empfangen wird, muss dieser in einem der Zielverzeichnisse liegen; ansonsten wird die Datei abgewiesen. Eingehende Dateien ohne absoluten Pfad werden im ersten angegebenen Verzeichnis abgelegt.
 .
 Standard is '/tmp'.
";
$elem["uftp/dest_dir"]["descriptionfr"]="Répertoire de destination des fichiers reçus :
 Quand un fichier entrant indique un chemin absolu, celui-ci doit correspondre à l'un des répertoires de destination sinon le fichier sera rejeté. Les fichiers entrants qui n'indiquent pas de chemin absolu seront placés dans le premier répertoire de destination de la liste.
 .
 Le répertoire par défaut est « /tmp ».
";
$elem["uftp/dest_dir"]["default"]="/tmp";
$elem["uftp/arguments"]["type"]="string";
$elem["uftp/arguments"]["description"]="Extra arguments passed to uftpd:
 Commonly used arguments:
 .
  '-t' for writing the received data into the destination directory.
  '-k <file>' can be used to specify key-files for encrypted transfers.
  '-I <iface>' can be used to specify the network interface to listen on.
 .
 See 'man 1 uftpd' for details.
";
$elem["uftp/arguments"]["descriptionde"]="Zusätzliche Argumente für uftpd:
 Oft benutzte Argumente:
 .
  '-t' um empfangene Daten direkt in das Zielverzeichnis zu schreiben.
  '-k <Datei>' gibt Dateien mit Schlüsseln für die verschlüsselte Übertragung.
  '-I <Interface>' legt die Interfaces fest, über die Daten empfangen werden.
 .
 Siehe 'man 1 uftpd' für Details.
";
$elem["uftp/arguments"]["descriptionfr"]="Arguments additionnels passés à uftpd :
 Arguments couramment utilisés :
 .
  '-t' pour enregistrer le nouveau fichier dans le répertoire de destination.
  '-k <fichier>' pour indiquer des fichiers de clé pour les transfert chiffrés.
  '-I <interface>' pour indiquer l'interface réseau sur laquelle écouter.
 .
 Consulter « man 1 uftpd » pour les détails.
";
$elem["uftp/arguments"]["default"]="-t";
$elem["uftp/generate_config"]["type"]="boolean";
$elem["uftp/generate_config"]["description"]="for internal use

";
$elem["uftp/generate_config"]["descriptionde"]="";
$elem["uftp/generate_config"]["descriptionfr"]="";
$elem["uftp/generate_config"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
