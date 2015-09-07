<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("elilo");

$elem["elilo/runme"]["type"]="boolean";
$elem["elilo/runme"]["description"]="Automatically run elilo?
 It is necessary to run /usr/sbin/elilo to install the new elilo binary into
 the EFI partition.
 .
 WARNING: This procedure will write data into the debian directory of the
 EFI disk partition, possibly overwriting files installed there by hand.
 .
 Not installing the new elilo binary on the EFI disk partition may leave the
 system in an unbootable state.  Alternatives to automatic updating of the
 partition include running /usr/sbin/elilo by hand, or installing the new
 /usr/lib/elilo/elilo.efi executable into the EFI disk partition manually.
";
$elem["elilo/runme"]["descriptionde"]="Elilo automatisch ausführen?
 Es ist notwendig, /usr/sbin/elilo auszuführen, um das neue Elilo-Programm in die EFI-Partition zu installieren.
 .
 WARNUNG: Diese Prozedur wird Daten in das Debian-Verzeichnis der EFI-Platten-Partition schreiben und dabei möglicherweise Dateien überschreiben, die dort manuell installiert wurden.
 .
 Wird das neue Elilo-Programm nicht auf die EFI-Platten-Partition installiert, könnte Ihr System nicht mehr starten. Statt der automatischen Aktualisierung der Partition können Sie auch selbst /usr/sbin/elilo ausführen oder manuell das neue /usr/lib/elilo/elilo.efi-Programm auf die EFI-Platten-Partition installieren.
";
$elem["elilo/runme"]["descriptionfr"]="Faut-il lancer elilo automatiquement ?
 Il est indispensable d'exécuter la commande « /usr/sbin/elilo » pour installer la nouvelle version d'elilo sur la partition EFI.
 .
 Attention, cette procédure copiera des données dans le répertoire « debian » de la partition EFI, ce qui est susceptible d'écraser des fichiers qui y auraient été installés manuellement.
 .
 Si la nouvelle version d'elilo n'est pas installée sur la partition EFI, le système pourrait ne plus démarrer. Plutôt que mettre à jour automatiquement le programme, il est possible de le lancer ou de le copier le fichier exécutable « /usr/lib/elilo/elilo.efi » dans la partition EFI vous-même.
";
$elem["elilo/runme"]["default"]="true";
$elem["elilo/format"]["type"]="boolean";
$elem["elilo/format"]["description"]="Reformat and reload EFI partition?
 The structure of files in the EFI disk partition has changed since pre-3.2
 versions of the elilo package.  The EFI boot manager entry for Debian needs
 to be updated to reflect these changes.
 .
 In most cases, if no manual changes to the EFI partition content need to
 be preserved, this update can be handled automatically.
";
$elem["elilo/format"]["descriptionde"]="EFI-Partition neu formatieren und neu laden?
 Die Struktur der Dateien in der EFI-Platten-Partition hat sich seit pre-3.2-Versionen des Elilo-Pakets geändert. Der EFI-Bootmanager-Eintrag für Debian muss aktualisiert werden, um diese Änderungen zu berücksichtigen.
 .
 In den meisten Fällen, falls keine manuellen Änderungen am Inhalt der EFI-Partition erhalten bleiben müssen, kann dies von dieser Aktualisierung automatisch durchgeführt werden.
";
$elem["elilo/format"]["descriptionfr"]="Faut-il reformater et recharger la partition EFI ?
 La structure des fichiers dans la partition EFI a été modifiée depuis les versions antérieures à la version 3.2 du paquet d'elilo. L'entrée créée pour Debian dans le gestionnaire d'amorçage EFI doit être mise à jour pour prendre en compte ces modifications.
 .
 Dans la plupart des cas, si aucune modification manuelle à la partition EFI n'a besoin d'être conservée, cette mise à jour peut être effectuée automatiquement.
";
$elem["elilo/format"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
