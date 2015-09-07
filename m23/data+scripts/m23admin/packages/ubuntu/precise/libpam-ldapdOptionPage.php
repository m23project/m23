<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-ldapd");

$elem["libpam-ldapd/enable_shadow"]["type"]="boolean";
$elem["libpam-ldapd/enable_shadow"]["description"]="Enable shadow lookups through NSS?
 To allow LDAP users to log in, the NSS module needs to be enabled to
 perform shadow password lookups. The shadow entries themselves may be
 empty - that is, there is no need for password hashes to be exposed. See
 http://bugs.debian.org/583492 for background.
 .
 Please choose whether /etc/nsswitch.conf should have the required entry
 added automatically (in which case it should be reviewed afterwards) or
 whether it should be left for an administrator to edit manually.
";
$elem["libpam-ldapd/enable_shadow"]["descriptionde"]="Shadow-Anfragen durch NSS einschalten?
 Um LDAP-Anwendern die Anmeldung zu erlauben, muss das NSS-Modul aktiviert sein, damit Shadow-Passwort-Anfragen durchgeführt werden können. Die Shadow-Einträge selbst können leer sein - es besteht keine Notwendigkeit, Passwortprüfsummen offenzulegen. Lesen Sie http://bugs.debian.org/583492 bezüglich der Hintergründe.
 .
 Bitte wählen Sie, ob der benötigte Eintrag automatisch zu /etc/nsswitch.conf hinzugefügt werden soll (in diesem Fall sollte dies anschließend nochmals überprüft werden) oder ob das manuelle Bearbeiten dem Administrator überlassen werden soll.
";
$elem["libpam-ldapd/enable_shadow"]["descriptionfr"]="Faut-il activer les recherches de mots de passe cachés avec NSS ?
 Pour permettre aux utilisateurs LDAP de se connecter, le module NSS doit être activé afin de pouvoir faire des recherches de mots de passe cachés (« shadow passwords »). Les entrées cachées elles-mêmes peuvent être vides, ce qui signifie qu'il n'est pas nécessaire de faire apparaître les hachages de mots de passe. Veuillez consulter http://bugs.debian.org/583492 pour plus de détails.
 .
 Veuillez choisir si l'entrée appropriée dans /etc/nsswitch.conf peut être ajoutée automatiquement (ce qui peut nécessiter de la vérifier ensuite). Dans le cas contraire, un administrateur devra l'ajouter plus tard.
";
$elem["libpam-ldapd/enable_shadow"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
