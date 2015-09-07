<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cgiemail");

$elem["cgiemail/template_dir"]["type"]="string";
$elem["cgiemail/template_dir"]["description"]="Directory where you want to put the cgiemail's mail templates:
 In old versions of cgiemail, templates that were used for creating e-mails
 to be sent could be placed anywhere that would be served up by the web
 server.  This behaviour is a security vulnerability: an attacker can read
 files that he shouldn't be able to, such as scripts in cgi-bin, if they
 contain certain pieces of text.
 .
 If you enter nothing (that is, erase the default directory, leaving this
 empty), cgiemail will still work. This may be needed if you are, for
 instance, hosting web services, and cannot move all of your clients
 cgiemail templates to one directory.  Remember that this will LEAVE THE
 SECURITY HOLE OPEN, and is only a choice for backwards compatibility.
 .
 To close the hole, enter a directory, which MUST be accessible by
 your web server.  Template files that you want to use should go there.
 For further instructions, please read the README.Debian and README files
 in /usr/share/doc/cgiemail/.
";
$elem["cgiemail/template_dir"]["descriptionde"]="Verzeichnis, in das E-Mail-Vorlagen von Cgiemail abgelegt werden sollen:
 In älteren Versionen von Cgiemail konnten Vorlagen, die zum Erstellen von E-Mails genutzt wurden, überall abgelegt werden, wo sie der Web-Server erreichen konnte. Das ist ein Sicherheitsrisiko: ein Angreifer kann Dateien lesen, die er nicht lesen dürfte, wie z. B. Skripte im Verzeichnis cgi-bin, wenn diese Text enthalten.
 .
 Wenn Sie nichts eingeben (d. h. das Standard-Verzeichnis löschen und das Feld leer lassen), wird Cgiemail dennoch funktionieren. Das könnte nötig sein, wenn Sie z. B. Web-Dienste anbieten und nicht alle Cgiemail-Vorlagen Ihrer Kunden in ein Verzeichnis legen können. Denken Sie aber daran, DIES ÖFFNET EINE SICHERHEITSLÜCKE und sollte nur zur Abwärtskompatibilität ausgewählt werden.
 .
 Geben Sie ein Verzeichnis ein, das für Ihren Web-Server zugänglich sein MUSS, um die Lücke zu schließen. Vorlagen-Dateien, die Sie nutzen möchten, sollten Sie dort ablegen. Weitere Informationen entnehmen Sie bitte den Dateien README.Debian und README im Verzeichnis /usr/share/doc/cgiemail/.
";
$elem["cgiemail/template_dir"]["descriptionfr"]="Répertoire des gabarits de courriel de cgiemail :
 Dans les anciennes versions de cgiemail, les gabarits utilisés pour créer des courriels à envoyer pouvaient être placés à tout endroit de l'arborescence du serveur web. Ce comportement induit une faille de sécurité potentielle : un attaquant peut alors lire des fichiers auxquels il n'est pas supposé pouvoir accéder, comme des scripts du répertoire cgi-bin, si les gabarits contiennent certaines chaînes de texte.
 .
 Si vous laissez ce champ vide (en supprimant la valeur par défaut), cgiemail fonctionnera toujours comme auparavant. Cela peut être nécessaire si vous hébergez des services web et qu'il vous est impossible de déplacer les gabarits cgiemail des clients en un seul répertoire. Veuillez noter que la faille de sécurité existe alors toujours : ce choix n'existe que pour préserver la compatibilité ascendante.
 .
 Pour éviter cette faille de sécurité, veuillez indiquer un répertoire accessible au serveur web. Les gabarits que vous souhaitez utiliser devront être placés à cet endroit. Veuillez consulter les fichiers README.Debian et README dans /usr/share/doc/cgiemail/.
";
$elem["cgiemail/template_dir"]["default"]="/var/www/template/";
PKG_OptionPageTail2($elem);
?>
