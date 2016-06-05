<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("smb2www");

$elem["smb2www/security"]["type"]="note";
$elem["smb2www/security"]["description"]="smb2www disabled by default
 If enabled, smb2www will, by default, allow anyone to browse the local SMB
 network.
 .
 As this may have security consequences, it is disabled by default and you
 should modify the web
 server configuration to enable smb2www securely. Please read
 /usr/share/doc/smb2www/index.html for more information (more particularly FAQ 4)
 about such configuration for Apache.
";
$elem["smb2www/security"]["descriptionde"]="Smb2www ist standardmäßig deaktiviert
 Falls aktiviert, wird Smb2www jedem erlauben, das lokale SMB-Netz zu browsen.
 .
 Da dies Auswirkungen auf die Sicherheit hat, ist dies standardmäßig deaktiviert und Sie sollten Ihre Webserver-Konfiguration anpassen, um die sichere Benutzung von Smb2www zu ermöglichen. Lesen Sie dazu bitte /usr/share/doc/smb2www/index.html (speziell FAQ 4) für weitere Informationen zur entsprechenden Apache-Konfigurationen.
";
$elem["smb2www/security"]["descriptionfr"]="smb2www désactivé par défaut
 S'il est activé, smb2www permettra, par défaut, à quiconque de parcourir le réseau SMB local.
 .
 Comme cela peut avoir des implications néfastes sur la sécurité, il est désactivé par défaut et vous devez modifier la configuration du serveur web pour l'activer de manière sécurisée. Veuillez lire /usr/share/doc/smb2www/index.html pour plus d'informations sur la méthode à employer avec Apache (particulièrement la section 4 de la FAQ).
";
$elem["smb2www/security"]["default"]="";
$elem["smb2www/set_link"]["type"]="boolean";
$elem["smb2www/set_link"]["description"]="Do you want to enable smb2www?
";
$elem["smb2www/set_link"]["descriptionde"]="Möchten Sie Smb2www aktivieren?
";
$elem["smb2www/set_link"]["descriptionfr"]="Faut-il activer smb2www ?
";
$elem["smb2www/set_link"]["default"]="false";
$elem["smb2www/master_browser"]["type"]="string";
$elem["smb2www/master_browser"]["description"]="Master browser server:
 Please enter the name of the server which will be used by smb2www as a master
 browser.
";
$elem["smb2www/master_browser"]["descriptionde"]="Master Browser-Server:
 Bitte geben Sie den Namen des Servers ein, den Smb2www als Master-Browser benutzen soll.
";
$elem["smb2www/master_browser"]["descriptionfr"]="Maître explorateur :
 Veuillez indiquer le nom du serveur qui sera utilisé comme maître explorateur par smb2www.
";
$elem["smb2www/master_browser"]["default"]="localhost";
$elem["smb2www/language"]["type"]="select";
$elem["smb2www/language"]["choices"][1]="English";
$elem["smb2www/language"]["choices"][2]="Czech";
$elem["smb2www/language"]["choices"][3]="Dutch";
$elem["smb2www/language"]["choices"][4]="Finnish";
$elem["smb2www/language"]["choices"][5]="French";
$elem["smb2www/language"]["choices"][6]="Polish";
$elem["smb2www/language"]["choices"][7]="Spanish";
$elem["smb2www/language"]["choices"][8]="Swedish";
$elem["smb2www/language"]["choicesde"][1]="Englisch";
$elem["smb2www/language"]["choicesde"][2]="Tschechisch";
$elem["smb2www/language"]["choicesde"][3]="Holländisch";
$elem["smb2www/language"]["choicesde"][4]="Finnisch";
$elem["smb2www/language"]["choicesde"][5]="Französisch";
$elem["smb2www/language"]["choicesde"][6]="Polnisch";
$elem["smb2www/language"]["choicesde"][7]="Spanisch";
$elem["smb2www/language"]["choicesde"][8]="Schwedisch";
$elem["smb2www/language"]["choicesfr"][1]="anglais";
$elem["smb2www/language"]["choicesfr"][2]="tchèque";
$elem["smb2www/language"]["choicesfr"][3]="néerlandais";
$elem["smb2www/language"]["choicesfr"][4]="finnois";
$elem["smb2www/language"]["choicesfr"][5]="français";
$elem["smb2www/language"]["choicesfr"][6]="polonais";
$elem["smb2www/language"]["choicesfr"][7]="espagnol";
$elem["smb2www/language"]["choicesfr"][8]="suédois";
$elem["smb2www/language"]["description"]="Language for smb2www pages:
 Smb2www can generate its HTML pages in several languages.
 .
 Please choose the language you want to use on generated pages.
";
$elem["smb2www/language"]["descriptionde"]="Sprache der Smb2www-Seiten:
 Smb2www kann seine HTML-Seiten in mehreren Sprachen erstellen.
 .
 Bitte wählen Sie die Sprache aus, die Sie auf den generierten Seiten verwenden möchten.
";
$elem["smb2www/language"]["descriptionfr"]="Langue des pages de smb2www :
 Smb2www peut créer ses pages HTML en plusieurs langues.
 .
 Veuillez choisir la langue à utiliser sur les pages créées.
";
$elem["smb2www/language"]["default"]="English";
$elem["smb2www/need_reconfigure"]["type"]="boolean";
$elem["smb2www/need_reconfigure"]["description"]="for internal use
 This is an INTERNAL option. If you see it while configuring the package,
 please file a bug report against smb2www.
";
$elem["smb2www/need_reconfigure"]["descriptionde"]="";
$elem["smb2www/need_reconfigure"]["descriptionfr"]="";
$elem["smb2www/need_reconfigure"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
