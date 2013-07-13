<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-runtime");

$elem["libpam-runtime/title"]["type"]="title";
$elem["libpam-runtime/title"]["description"]="PAM configuration
";
$elem["libpam-runtime/title"]["descriptionde"]="PAM-Konfiguration
";
$elem["libpam-runtime/title"]["descriptionfr"]="Configuration de PAM
";
$elem["libpam-runtime/title"]["default"]="";
$elem["libpam-runtime/profiles"]["type"]="multiselect";
$elem["libpam-runtime/profiles"]["description"]="PAM profiles to enable:
 Pluggable Authentication Modules (PAM) determine how authentication,
 authorization, and password changing are handled on the system, as well
 as allowing configuration of additional actions to take when starting
 user sessions.
 .
 Some PAM module packages provide profiles that can be used to
 automatically adjust the behavior of all PAM-using applications on the
 system.  Please indicate which of these behaviors you wish to enable.
";
$elem["libpam-runtime/profiles"]["descriptionde"]="Zu aktivierende PAM-Profile:
 Pluggable Authentication Modules (PAM) bestimmen, wie Authentifizierung, Berechtigung und Passwort-Änderung auf dem System gehandhabt werden. Ebenso erlauben sie die Konfiguration zusätzlicher Maßnahmen, die beim Start von Benutzersitzungen vorgenommen werden.
 .
 Einige Pakete mit PAM-Modulen stellen Profile bereit, die das Verhalten aller Anwendungen, die PAM verwenden, automatisch anpassen können. Bitte geben Sie an, welche dieser Verhaltensweisen Sie aktivieren möchten.
";
$elem["libpam-runtime/profiles"]["descriptionfr"]="Profils PAM à activer :
 Les modules d'authentification PAM déterminent la façon dont le système gère l'authentification, les autorisations et les changements de mots de passe. PAM permet aussi de configurer des actions supplémentaires à effectuer au démarrage des sessions utilisateur.
 .
 Certains paquets de modules PAM fournissent des profils qui peuvent être utilisés pour ajuster automatiquement le comportement de toutes les applications utilisant PAM qui sont présentes sur le système.
";
$elem["libpam-runtime/profiles"]["default"]="";
$elem["libpam-runtime/conflicts"]["type"]="error";
$elem["libpam-runtime/conflicts"]["description"]="Incompatible PAM profiles selected.
 The following PAM profiles cannot be used together:
 .
 ${conflicts}
 .
 Please select a different set of modules to enable.
";
$elem["libpam-runtime/conflicts"]["descriptionde"]="Inkompatible PAM-Profile ausgewählt.
 Die folgenden PAM-Profile können nicht gemeinsam verwendet werden:
 .
 ${conflicts}
 .
 Bitte wählen Sie eine andere Zusammenstellung zu aktivierender Module aus.
";
$elem["libpam-runtime/conflicts"]["descriptionfr"]="Profils PAM incompatibles
 Les profils PAM suivants sont en conflit :
 .
 ${conflicts}
 .
 Veuillez choisir un autre jeu de modules à activer.
";
$elem["libpam-runtime/conflicts"]["default"]="";
$elem["libpam-runtime/override"]["type"]="boolean";
$elem["libpam-runtime/override"]["description"]="Override local changes to /etc/pam.d/common-*?
 One or more of the files /etc/pam.d/common-{auth,account,password,session}
 have been locally modified.  Please indicate whether these local changes
 should be overridden using the system-provided configuration.  If you
 decline this option, you will need to manage your system's
 authentication configuration by hand.
";
$elem["libpam-runtime/override"]["descriptionde"]="Lokale Änderungen an /etc/pam.d/common-* außer Kraft setzen?
 Eine oder mehrere der Dateien /etc/pam.d/common-{auth,account,password,session} sind lokal verändert worden. Bitte geben Sie an, ob diese Änderungen durch die mitgelieferte Konfiguration außer Kraft gesetzt werden sollen. Falls Sie diese Option ablehnen, müssen Sie die Authentifizierungs-Konfiguration Ihres Systems von Hand verwalten.
";
$elem["libpam-runtime/override"]["descriptionfr"]="Écraser les modifications locales sur /etc/pam.d/common-* ?
 Au moins un des fichiers /etc/pam.d/common-{auth,account,password,session} a été modifié localement. Veuillez indiquer s'il faut abandonner ces changements locaux et revenir à la configuration standard du système. Dans le cas contraire, vous devrez configurer vous-même le système d'authentification.
";
$elem["libpam-runtime/override"]["default"]="false";
$elem["libpam-runtime/no_profiles_chosen"]["type"]="error";
$elem["libpam-runtime/no_profiles_chosen"]["description"]="No PAM profiles have been selected.
 No PAM profiles have been selected for use on this system.  This would grant
 all users access without authenticating, and is not allowed.  Please select
 at least one PAM profile from the available list.
";
$elem["libpam-runtime/no_profiles_chosen"]["descriptionde"]="Es wurden keine PAM-Profile ausgewählt.
 Es wurden keine PAM-Profile für die Verwendung auf diesem System ausgewählt. Dies würde allen Benutzern Zugang ohne Authentifizierung gestatten und ist nicht erlaubt. Bitte wählen Sie mindestens ein PAM-Profil aus der verfügbaren Liste aus.
";
$elem["libpam-runtime/no_profiles_chosen"]["descriptionfr"]="Aucun profil PAM n'a été choisi.
 Aucun profil PAM n'a été mis en place pour ce système. N'en utiliser aucun donnerait à tous les utilisateurs un accès sans authentification, ce qui n'est pas autorisé. Merci de bien vouloir choisir au moins un profil PAM dans la liste proposée.
";
$elem["libpam-runtime/no_profiles_chosen"]["default"]="";
PKG_OptionPageTail2($elem);
?>
