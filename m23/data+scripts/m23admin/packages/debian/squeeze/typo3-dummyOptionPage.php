<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("typo3-dummy");

$elem["typo3-dummy/apache_mode"]["type"]="select";
$elem["typo3-dummy/apache_mode"]["choices"][1]="vhost";
$elem["typo3-dummy/apache_mode"]["choices"][2]="directory";
$elem["typo3-dummy/apache_mode"]["choicesde"][1]="Vhost";
$elem["typo3-dummy/apache_mode"]["choicesde"][2]="Verzeichnis";
$elem["typo3-dummy/apache_mode"]["choicesfr"][1]="hôte virtuel";
$elem["typo3-dummy/apache_mode"]["choicesfr"][2]="répertoire";
$elem["typo3-dummy/apache_mode"]["description"]="Apache integration mode:
 Please choose the method that should be used for integrating the
 TYPO3 installation with the apache2 web server:
 .
  vhost:     generates URLs with TYPO3 as part of the domain name, such
             as http://typo3.example.com/; 
  directory: fits TYPO3 within the existing site, making it available
             at an address like http://www.example.com/cms/;
  none:      does not configure TYPO3 automatically. The server will
             need manual configuration. Choose this option if you are
             using a web server other than apache2.
";
$elem["typo3-dummy/apache_mode"]["descriptionde"]="Apache-Integrationsmodus:
 Bitte wählen Sie die Methode, die für die Integration der TYPO3-Installation mit dem Apache2-Webserver benutzt werden soll:
 .
  Vhost:       erstellt URLs mit TYPO3 als Teil des Domain-Namens, wie
               beispielsweise http://typo3.beispiel.com/;
  Verzeichnis: passt TYPO3 innerhalb einer existierenden Site ein und macht
               es unter einer Adresse, wie http://www.beispiel.com/cms/
               verfügbar;
  keine:       konfiguriert TYPO3 nicht automatisch. Der Server wird eine
               manuelle Konfiguration benötigen. Benutzen Sie diese Option,
               falls Sie einen anderen Webserver als Apache2 benutzen.
";
$elem["typo3-dummy/apache_mode"]["descriptionfr"]="Méthode d'intégration à Apache :
 Veuillez choisir la méthode à utiliser pour intégrer l'installation de TYPO3 au serveur web Apache 2 :
 .
 hôte virtuel : crée des URL avec TYPO3 dans le nom de domaine,
                comme http://typo3.example.com/ ;
   répertoire : intègre TYPO3 au site existant, le rendant accessible
                à une adresse comme http://www.example.com/cms/ ;
       aucune : ne configure pas TYPO3 automatiquement. Le serveur
                devra être configuré manuellement. Choisir cette option
                pour utiliser un serveur web différent d'Apache 2.
";
$elem["typo3-dummy/apache_mode"]["default"]="directory";
$elem["typo3-dummy/apache_restart"]["type"]="boolean";
$elem["typo3-dummy/apache_restart"]["description"]="Should apache2 be restarted after installation?
 Apache's configuration has been changed to include TYPO3 and
 activate the rewrite module. For these changes to take effect,
 apache2 must be reloaded.
";
$elem["typo3-dummy/apache_restart"]["descriptionde"]="Soll Apache2 nach der Installation neu gestartet werden?
 Apaches Konfiguration wurde geändert, um TYPO3 einzufügen und das »Rewrite«-Modul zu aktivieren. Damit diese Änderungen wirksam werden, muss Apache2 neu geladen werden.
";
$elem["typo3-dummy/apache_restart"]["descriptionfr"]="Apache 2 doit-il être redémarré après l'installation ?
 TYPO3 a été intégré à la configuration d'Apache 2, et le module rewrite a été activé. Pour rendre ces modifications effectives, la configuration d'Apache 2 doit être rechargée.
";
$elem["typo3-dummy/apache_restart"]["default"]="";
$elem["typo3-dummy/old_symlink"]["type"]="note";
$elem["typo3-dummy/old_symlink"]["description"]="Old symlink in /etc/apache2/conf.d/
 Older versions (before 4.3.0-3) of typo3-dummy installed the apache2
 configuration symlink as /etc/apache2/conf.d/typo3-dummy.conf.
 .
 This has been changed and newer versions place two new symlinks into
 /etc/apache2/sites-available/. To prevent failures due to
 overlapping configuration directives you should remove the
 symlink typo3-dummy.conf from /etc/apache2/conf.d/ and merge its
 contents into one of the new configuration files.
";
$elem["typo3-dummy/old_symlink"]["descriptionde"]="Alter symbolischer Verweis in /etc/apache2/conf.d/
 Alte Versionen (vor 4.3.0-3) von Typo3-dummy installierten den symbolischen Apache2-Konfigurationsverweis als /etc/apache2/conf.d/typo3-dummy.conf.
 .
 Dies wurde geändert und neuere Versionen platzieren zwei neue symbolische Verweise in /etc/apache2/sites-available/. Um einen Misserfolg infolge des Überschneidens von Konfigurationsdirektiven zu vermeiden, sollten Sie den symbolischen Verweis typo3-dummy.conf aus /etc/apache2/conf.d/ entfernen und dessen Inhalte in einer der neuen Konfigurationsdateien zusammenführen.
";
$elem["typo3-dummy/old_symlink"]["descriptionfr"]="Ancien lien symbolique dans /etc/apache2/conf.d/
 Les anciennes versions (antérieures à 4.3.0-3) de typo3-dummy ajoutaient le lien symbolique /etc/apache2/conf.d/typo3-dummy.conf à la configuration d'Apache 2.
 .
 Ce comportement a été modifié et les dernières versions ajoutent deux liens symboliques à /etc/apache2/sites-available/. Pour éviter les erreurs dues au chevauchement des instructions de configuration, vous devriez enlever le lien symbolique typo3-dummy.conf de /etc/apache2/conf.d/ et fusionner son contenu dans l'un des nouveaux fichiers de configuration.
";
$elem["typo3-dummy/old_symlink"]["default"]="";
PKG_OptionPageTail2($elem);
?>
