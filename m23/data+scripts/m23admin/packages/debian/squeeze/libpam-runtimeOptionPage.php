<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-runtime");

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
 Certains paquets de modules PAM fournissent des profils, lesquels peuvent être utilisés pour ajuster automatiquement le comportement de toutes les applications utilisant PAM qui sont présentes sur le système.
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
 L'un au moins des fichiers /etc/pam.d/common-{auth,account,password,session} a été modifié localement. Veuillez indiquer s'il faut abandonner ces changements locaux et revenir à la configuration standard du système. Dans le cas contraire, vous devrez configurer vous-même le système d'authentification.
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
$elem["libpam-runtime/you-had-no-auth"]["type"]="error";
$elem["libpam-runtime/you-had-no-auth"]["description"]="Your system allowed access without a password!
 A bug in a previous version of libpam-runtime resulted in no PAM profiles
 being selected for use on this system.  As a result, access was allowed for
 a time to all accounts on your system, with or without a correct password.
 Especially if this system can be accessed from the Internet, it is likely
 that it has been compromised.  Unless you are familiar with recovering from
 security failures, viruses, and malicious software, you should re-install
 this system from scratch or obtain the services of a skilled system
 administrator.  For more information, see:
 .
 http://www.debian.org/security/pam-auth
 .
 The bug that allowed this wrong configuration is fixed in the current
 version of libpam-runtime, and your configuration has now been corrected.
 We apologize that previous versions of libpam-runtime did not detect and
 prevent this situation.
";
$elem["libpam-runtime/you-had-no-auth"]["descriptionde"]="Ihr System gewährte Zugang ohne ein Passwort!
 Ein Fehler in einer früheren Version von libpam-runtime führte dazu, dass keine PAM-Profile für die Verwendung auf diesem System ausgewählt wurden. Als Resultat wurde eine Zeit lang für alle Konten auf Ihrem System Zugang gewährt, mit oder ohne korrektes Passwort. Falls dieses System insbesondere aus dem Internet zugänglich ist, ist es wahrscheinlich, dass es kompromittiert wurde. Falls Sie nicht vertraut mit der Beseitigung von Sicherheitsfehlern, Viren und bösartiger Software sind, sollten Sie dieses System von Grund auf neu installieren oder die Dienste eines fähigen Systemadministrators in Anspruch nehmen. Für weitere Informationen siehe:
 .
 http://www.debian.org/security/pam-auth
 .
 Der Fehler, der diese verkehrte Konfiguration erlaubte, ist in der aktuellen Version von libpam-runtime behoben, und Ihre Konfiguration ist nunmehr korrigiert worden. Wir bitten zu entschuldigen, dass frühere Versionen von libpam-runtime diese Situation nicht erkannt und verhindert hatten.
";
$elem["libpam-runtime/you-had-no-auth"]["descriptionfr"]="Votre système a autorisé un accès sans mot de passe !
 À cause d'un bogue dans une version précédente de libpam-runtime, aucun profil PAM n'a été mis en place sur ce système. Ainsi, pendant un certain temps, l'accès à votre machine a été autorisé pour tous les utilisateurs, avec ou sans mot de passe valide. Tout spécialement si ce système est accessible depuis Internet, il est vraisemblable qu'il aura été l'objet d'une attaque. À moins que vous ne soyez à l'aise avec la récupération d'un système victime d'une faille de sécurité, de virus ou de logiciels malveillants, nous vous recommandons de réinstaller complètement le système ou de recourir aux services d'un administrateur système compétent. Pour plus d'informations, lire :
 .
 http://www.debian.org/security/pam-auth
 .
 Le bogue autorisant cette configuration erronée a été corrigé dans la version actuelle de libpam-runtime, et votre configuration a maintenant été rétablie. Nous tenons à nous excuser pour le fait que les versions précédentes de libpam-runtime n'aient pas détecté et empêché cette situation.
";
$elem["libpam-runtime/you-had-no-auth"]["default"]="";
PKG_OptionPageTail2($elem);
?>
