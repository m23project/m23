<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ubiquity");

$elem["debian-installer/dummy"]["type"]="string";
$elem["debian-installer/dummy"]["description"]="dummy template for preseeding unavailable questions
 The answer to this question has been preseeded (${ID}).
 If you see this template, you've found a bug in the installer;
 please file a report.

";
$elem["debian-installer/dummy"]["descriptionde"]="";
$elem["debian-installer/dummy"]["descriptionfr"]="";
$elem["debian-installer/dummy"]["default"]="";
$elem["debian-installer/framebuffer"]["type"]="boolean";
$elem["debian-installer/framebuffer"]["description"]="enable frame buffer console on boot

";
$elem["debian-installer/framebuffer"]["descriptionde"]="";
$elem["debian-installer/framebuffer"]["descriptionfr"]="";
$elem["debian-installer/framebuffer"]["default"]="true";
$elem["ubiquity/text/connecting_label"]["type"]="text";
$elem["ubiquity/text/connecting_label"]["description"]="Connecting...
";
$elem["ubiquity/text/connecting_label"]["descriptionde"]="Verbindungsaufbau …
";
$elem["ubiquity/text/connecting_label"]["descriptionfr"]="Connexion en cours...
";
$elem["ubiquity/text/connecting_label"]["default"]="";
$elem["ubiquity/text/connection_failed_label"]["type"]="text";
$elem["ubiquity/text/connection_failed_label"]["description"]="Connection failed.
";
$elem["ubiquity/text/connection_failed_label"]["descriptionde"]="Verbindung fehlgeschlagen.
";
$elem["ubiquity/text/connection_failed_label"]["descriptionfr"]="La connexion a échoué.
";
$elem["ubiquity/text/connection_failed_label"]["default"]="";
$elem["ubiquity/text/connected_label"]["type"]="text";
$elem["ubiquity/text/connected_label"]["description"]="Connected.
";
$elem["ubiquity/text/connected_label"]["descriptionde"]="Verbunden.
";
$elem["ubiquity/text/connected_label"]["descriptionfr"]="Connecté.
";
$elem["ubiquity/text/connected_label"]["default"]="";
$elem["ubiquity/text/restart_to_continue"]["type"]="text";
$elem["ubiquity/text/restart_to_continue"]["description"]="Restart to Continue
";
$elem["ubiquity/text/restart_to_continue"]["descriptionde"]="Neustarten, um fortzufahren
";
$elem["ubiquity/text/restart_to_continue"]["descriptionfr"]="Redémarrer pour continuer
";
$elem["ubiquity/text/restart_to_continue"]["default"]="";
$elem["ubiquity/text/live_installer"]["type"]="text";
$elem["ubiquity/text/live_installer"]["description"]="Install
";
$elem["ubiquity/text/live_installer"]["descriptionde"]="Installation
";
$elem["ubiquity/text/live_installer"]["descriptionfr"]="Installation
";
$elem["ubiquity/text/live_installer"]["default"]="";
$elem["ubiquity/text/oem_config_title"]["type"]="text";
$elem["ubiquity/text/oem_config_title"]["description"]="Install (OEM mode, for manufacturers only)
";
$elem["ubiquity/text/oem_config_title"]["descriptionde"]="Installieren (OEM-Modus, nur für Hersteller)
";
$elem["ubiquity/text/oem_config_title"]["descriptionfr"]="Installer (mode OEM, uniquement pour les intégrateurs)
";
$elem["ubiquity/text/oem_config_title"]["default"]="";
$elem["ubiquity/text/oem_id_label"]["type"]="text";
$elem["ubiquity/text/oem_id_label"]["description"]="Description:
 You are installing in system manufacturer mode. Please enter a unique name
 for this batch of systems. This name will be saved on the installed system
 and can be used to help with bug reports.
";
$elem["ubiquity/text/oem_id_label"]["descriptionde"]="Description-de.UTF-8:
 Sie installieren im OEM-Modus (Herstellermodus). Bitte geben Sie einen eindeutigen Namen für diese Serie von Rechnern ein. Dieser Name wird auf den installierten Systemen gespeichert und kann bei Fehlerberichten nützlich sein.
";
$elem["ubiquity/text/oem_id_label"]["descriptionfr"]="Description-fr.UTF-8:
 Vous êtes en train d’effectuer l’installation en mode constructeur. Merci de renseigner un nom unique pour ce lot de systèmes. Ce nom sera sauvegardé sur le système installé pour aider aux rapports de bogues.
";
$elem["ubiquity/text/oem_id_label"]["default"]="";
$elem["ubiquity/text/try_install_text_label"]["type"]="text";
$elem["ubiquity/text/try_install_text_label"]["description"]="Description:
 You can try ${RELEASE} without making any changes to your computer,
 directly from this ${MEDIUM}.
 .
 Or if you're ready, you can install ${RELEASE} alongside (or instead of)
 your current operating system.  This shouldn't take too long.
";
$elem["ubiquity/text/try_install_text_label"]["descriptionde"]="Description-de.UTF-8:
 Sie können ${RELEASE} direkt von diesem Speichermedium (${MEDIUM}) ausprobieren, ohne dass etwas an Ihrem Rechner verändert wird.
 .
 Wenn Sie möchten, können Sie ${RELEASE} auch neben Ihrem bisherigen Betriebssystem (oder stattdessen) installieren. Dies dauert nur einige Minuten.
";
$elem["ubiquity/text/try_install_text_label"]["descriptionfr"]="Description-fr.UTF-8:
 Vous pouvez essayer ${RELEASE} sans rien changer à votre ordinateur, directement depuis ce ${MEDIUM}.
 .
 Ou si vous êtes prêt, vous pouvez installer ${RELEASE} à côté (ou à la place) de votre système d'exploitation actuel. Cela ne devrait pas prendre beaucoup de temps.
";
$elem["ubiquity/text/try_install_text_label"]["default"]="";
$elem["ubiquity/text/try_ubuntu"]["type"]="text";
$elem["ubiquity/text/try_ubuntu"]["description"]="Try ${RELEASE}
";
$elem["ubiquity/text/try_ubuntu"]["descriptionde"]="${RELEASE} ausprobieren
";
$elem["ubiquity/text/try_ubuntu"]["descriptionfr"]="Essayer ${RELEASE}
";
$elem["ubiquity/text/try_ubuntu"]["default"]="";
$elem["ubiquity/text/install_ubuntu"]["type"]="text";
$elem["ubiquity/text/install_ubuntu"]["description"]="Install ${RELEASE}
";
$elem["ubiquity/text/install_ubuntu"]["descriptionde"]="${RELEASE} installieren
";
$elem["ubiquity/text/install_ubuntu"]["descriptionfr"]="Installer ${RELEASE}
";
$elem["ubiquity/text/install_ubuntu"]["default"]="";
$elem["ubiquity/text/release_notes_label"]["type"]="text";
$elem["ubiquity/text/release_notes_label"]["description"]="Description:
 You may wish to read the <a href=\"release-notes\">release notes</a> or <a
 href=\"update\">update this installer</a>.
";
$elem["ubiquity/text/release_notes_label"]["descriptionde"]="Description-de.UTF-8:
 Sie können auch die <a href=\"release-notes\">Veröffentlichungshinweise</a> lesen oder <a href=\"update\">dieses Installationsprogramm aktualisieren</a>.
";
$elem["ubiquity/text/release_notes_label"]["descriptionfr"]="Description-fr.UTF-8:
 Vous pouvez éventuellement lire les <a href=\"release-notes\">notes de publication</a> ou  <a href=\"update\">mettre à jour cet installateur</a>.
";
$elem["ubiquity/text/release_notes_label"]["default"]="";
$elem["ubiquity/text/release_notes_only"]["type"]="text";
$elem["ubiquity/text/release_notes_only"]["description"]="Description:
 You may wish to read the <a href=\"release-notes\">release notes</a>.
";
$elem["ubiquity/text/release_notes_only"]["descriptionde"]="Description-de.UTF-8:
 Sie können die <a href=\"release-notes\">Veröffentlichungshinweise</a> lesen.
";
$elem["ubiquity/text/release_notes_only"]["descriptionfr"]="Description-fr.UTF-8:
 Vous pouvez éventuellement lire les <a href=\"release-notes\">notes de publication</a>.
";
$elem["ubiquity/text/release_notes_only"]["default"]="";
$elem["ubiquity/text/update_installer_only"]["type"]="text";
$elem["ubiquity/text/update_installer_only"]["description"]="Description:
 You may wish to <a href=\"update\">update this installer</a>.
";
$elem["ubiquity/text/update_installer_only"]["descriptionde"]="Description-de.UTF-8:
 Sie können <a href=\"update\">dieses Installationsprogramm aktualisieren</a>.
";
$elem["ubiquity/text/update_installer_only"]["descriptionfr"]="Description-fr.UTF-8:
 Vous pouvez éventuellement <a href=\"update\">mettre à jour cet installateur</a>.
";
$elem["ubiquity/text/update_installer_only"]["default"]="";
$elem["ubiquity/text/timezone_heading_label"]["type"]="text";
$elem["ubiquity/text/timezone_heading_label"]["description"]="Where are you?
";
$elem["ubiquity/text/timezone_heading_label"]["descriptionde"]="Wo befinden Sie sich?
";
$elem["ubiquity/text/timezone_heading_label"]["descriptionfr"]="Où êtes vous ?
";
$elem["ubiquity/text/timezone_heading_label"]["default"]="";
$elem["ubiquity/text/keyboard_heading_label"]["type"]="text";
$elem["ubiquity/text/keyboard_heading_label"]["description"]="Keyboard layout
";
$elem["ubiquity/text/keyboard_heading_label"]["descriptionde"]="Tastaturbelegung
";
$elem["ubiquity/text/keyboard_heading_label"]["descriptionfr"]="Disposition du clavier
";
$elem["ubiquity/text/keyboard_heading_label"]["default"]="";
$elem["ubiquity/text/keyboard_comment_label"]["type"]="text";
$elem["ubiquity/text/keyboard_comment_label"]["description"]="Choose your keyboard layout:
";
$elem["ubiquity/text/keyboard_comment_label"]["descriptionde"]="Wählen Sie Ihre Tastaturbelegung:
";
$elem["ubiquity/text/keyboard_comment_label"]["descriptionfr"]="Indiquez la disposition de votre clavier :
";
$elem["ubiquity/text/keyboard_comment_label"]["default"]="";
$elem["ubiquity/text/keyboard_test_label"]["type"]="text";
$elem["ubiquity/text/keyboard_test_label"]["description"]="Type here to test your keyboard
";
$elem["ubiquity/text/keyboard_test_label"]["descriptionde"]="Geben Sie hier etwas ein, um Ihre Tastaturbelegung zu überprüfen
";
$elem["ubiquity/text/keyboard_test_label"]["descriptionfr"]="Saisissez du texte ici pour tester votre clavier
";
$elem["ubiquity/text/keyboard_test_label"]["default"]="";
$elem["ubiquity/text/deduce_layout"]["type"]="text";
$elem["ubiquity/text/deduce_layout"]["description"]="Detect Keyboard Layout
";
$elem["ubiquity/text/deduce_layout"]["descriptionde"]="Tastaturbelegung automatisch erkennen
";
$elem["ubiquity/text/deduce_layout"]["descriptionfr"]="Détecter la disposition du clavier
";
$elem["ubiquity/text/deduce_layout"]["default"]="";
$elem["ubiquity/text/keyboard_query_title"]["type"]="text";
$elem["ubiquity/text/keyboard_query_title"]["description"]="Detect Keyboard Layout...
";
$elem["ubiquity/text/keyboard_query_title"]["descriptionde"]="Tastaturbelegung automatisch erkennen …
";
$elem["ubiquity/text/keyboard_query_title"]["descriptionfr"]="Détection de la disposition du clavier…
";
$elem["ubiquity/text/keyboard_query_title"]["default"]="";
$elem["ubiquity/text/keyboard_query_press"]["type"]="text";
$elem["ubiquity/text/keyboard_query_press"]["description"]="Please press one of the following keys:
";
$elem["ubiquity/text/keyboard_query_press"]["descriptionde"]="Bitte drücken Sie eine der folgenden Tasten:
";
$elem["ubiquity/text/keyboard_query_press"]["descriptionfr"]="Veuillez appuyer sur l'une des touches suivantes :
";
$elem["ubiquity/text/keyboard_query_press"]["default"]="";
$elem["ubiquity/text/keyboard_query_present"]["type"]="text";
$elem["ubiquity/text/keyboard_query_present"]["description"]="Is the following key present on your keyboard?
";
$elem["ubiquity/text/keyboard_query_present"]["descriptionde"]="Ist die folgende Taste auf Ihrer Tastatur vorhanden?
";
$elem["ubiquity/text/keyboard_query_present"]["descriptionfr"]="Cette touche est-elle présente sur votre clavier ?
";
$elem["ubiquity/text/keyboard_query_present"]["default"]="";
$elem["ubiquity/text/userinfo_heading_label"]["type"]="text";
$elem["ubiquity/text/userinfo_heading_label"]["description"]="Who are you?
";
$elem["ubiquity/text/userinfo_heading_label"]["descriptionde"]="Wer sind Sie?
";
$elem["ubiquity/text/userinfo_heading_label"]["descriptionfr"]="Qui êtes-vous ?
";
$elem["ubiquity/text/userinfo_heading_label"]["default"]="";
$elem["ubiquity/text/fullname_label"]["type"]="text";
$elem["ubiquity/text/fullname_label"]["description"]="Your name:
";
$elem["ubiquity/text/fullname_label"]["descriptionde"]="Ihr Name:
";
$elem["ubiquity/text/fullname_label"]["descriptionfr"]="Votre nom :
";
$elem["ubiquity/text/fullname_label"]["default"]="";
$elem["ubiquity/text/username_label"]["type"]="text";
$elem["ubiquity/text/username_label"]["description"]="Pick a username:
";
$elem["ubiquity/text/username_label"]["descriptionde"]="Wählen Sie einen Benutzernamen:
";
$elem["ubiquity/text/username_label"]["descriptionfr"]="Choisir un nom d’utilisateur :
";
$elem["ubiquity/text/username_label"]["default"]="";
$elem["ubiquity/text/username_extra_label"]["type"]="text";
$elem["ubiquity/text/username_extra_label"]["description"]="&lt;small&gt;If more than one person will use this computer, you can set up multiple accounts after installation.&lt;/small&gt;
";
$elem["ubiquity/text/username_extra_label"]["descriptionde"]="&lt;small&gt;Falls mehr als eine Person diesen Rechner verwendet, können Sie nach der Installation zusätzliche Benutzer einrichten.&lt;/small&gt;
";
$elem["ubiquity/text/username_extra_label"]["descriptionfr"]="&lt;small&gt;Si plusieurs personnes sont susceptibles d'utiliser cet ordinateur, vous pouvez configurer plusieurs comptes après l'installation.&lt;/small&gt;
";
$elem["ubiquity/text/username_extra_label"]["default"]="";
$elem["ubiquity/text/username_error_badfirstchar"]["type"]="text";
$elem["ubiquity/text/username_error_badfirstchar"]["description"]="Must start with a lower-case letter.
";
$elem["ubiquity/text/username_error_badfirstchar"]["descriptionde"]="Es muss mit einem Kleinbuchstaben beginnen.
";
$elem["ubiquity/text/username_error_badfirstchar"]["descriptionfr"]="Doit commencer par une lettre minuscule.
";
$elem["ubiquity/text/username_error_badfirstchar"]["default"]="";
$elem["ubiquity/text/username_error_badchar"]["type"]="text";
$elem["ubiquity/text/username_error_badchar"]["description"]="May only contain lower-case letters, digits, hyphens, and underscores.
";
$elem["ubiquity/text/username_error_badchar"]["descriptionde"]="Es darf nur Kleinbuchstaben, Zahlen, Bindestriche und Unterstriche enthalten.
";
$elem["ubiquity/text/username_error_badchar"]["descriptionfr"]="Ne peut contenir que des lettres minuscules, des chiffres, des tirets et des traits de soulignement.
";
$elem["ubiquity/text/username_error_badchar"]["default"]="";
$elem["ubiquity/text/skip"]["type"]="text";
$elem["ubiquity/text/skip"]["description"]="Skip
";
$elem["ubiquity/text/skip"]["descriptionde"]="Überspringen
";
$elem["ubiquity/text/skip"]["descriptionfr"]="Ignorer
";
$elem["ubiquity/text/skip"]["default"]="";
$elem["ubiquity/text/password_label"]["type"]="text";
$elem["ubiquity/text/password_label"]["description"]="Choose a password:
";
$elem["ubiquity/text/password_label"]["descriptionde"]="Wählen Sie ein Passwort:
";
$elem["ubiquity/text/password_label"]["descriptionfr"]="Choisir un mot de passe :
";
$elem["ubiquity/text/password_label"]["default"]="";
$elem["ubiquity/text/password_extra_label"]["type"]="text";
$elem["ubiquity/text/password_extra_label"]["description"]="&lt;small&gt;Enter the same password twice, so that it can be checked for typing errors.&lt;/small&gt;
";
$elem["ubiquity/text/password_extra_label"]["descriptionde"]="&lt;small&gt;Geben Sie das gleiche Kennwort zweimal ein , sodass es auf Tippfehler überprüft werden kann.&lt;/small&gt;
";
$elem["ubiquity/text/password_extra_label"]["descriptionfr"]="&lt;small&gt;Saisissez deux fois le même mot de passe, pour vérifier qu'il ne contient pas de faute de frappe.&lt;/small&gt;
";
$elem["ubiquity/text/password_extra_label"]["default"]="";
$elem["ubiquity/text/password_inactive_label"]["type"]="text";
$elem["ubiquity/text/password_inactive_label"]["description"]="Password
";
$elem["ubiquity/text/password_inactive_label"]["descriptionde"]="Passwort
";
$elem["ubiquity/text/password_inactive_label"]["descriptionfr"]="Mot de passe
";
$elem["ubiquity/text/password_inactive_label"]["default"]="";
$elem["ubiquity/text/password_again_inactive_label"]["type"]="text";
$elem["ubiquity/text/password_again_inactive_label"]["description"]="Confirm password
";
$elem["ubiquity/text/password_again_inactive_label"]["descriptionde"]="Passwort bestätigen
";
$elem["ubiquity/text/password_again_inactive_label"]["descriptionfr"]="Confirmer le mot de passe
";
$elem["ubiquity/text/password_again_inactive_label"]["default"]="";
$elem["ubiquity/text/verified_password_label"]["type"]="text";
$elem["ubiquity/text/verified_password_label"]["description"]="Confirm your password:
";
$elem["ubiquity/text/verified_password_label"]["descriptionde"]="Passwort wiederholen:
";
$elem["ubiquity/text/verified_password_label"]["descriptionfr"]="Confirmez votre mot de passe :
";
$elem["ubiquity/text/verified_password_label"]["default"]="";
$elem["ubiquity/text/hostname_label"]["type"]="text";
$elem["ubiquity/text/hostname_label"]["description"]="Your computer's name:
";
$elem["ubiquity/text/hostname_label"]["descriptionde"]="Name Ihres Rechners:
";
$elem["ubiquity/text/hostname_label"]["descriptionfr"]="Le nom de votre ordinateur :
";
$elem["ubiquity/text/hostname_label"]["default"]="";
$elem["ubiquity/text/hostname_extra_label"]["type"]="text";
$elem["ubiquity/text/hostname_extra_label"]["description"]="The name it uses when it talks to other computers.
";
$elem["ubiquity/text/hostname_extra_label"]["descriptionde"]="Der Name, der bei der Kommunikation mit anderen Rechnern verwendet wird.
";
$elem["ubiquity/text/hostname_extra_label"]["descriptionfr"]="Le nom qu’il utilise pour communiquer avec d’autres ordinateurs.
";
$elem["ubiquity/text/hostname_extra_label"]["default"]="";
$elem["ubiquity/text/hostname_error_length"]["type"]="text";
$elem["ubiquity/text/hostname_error_length"]["description"]="Must be between 1 and 63 characters long.
";
$elem["ubiquity/text/hostname_error_length"]["descriptionde"]="Es muss 1 bis 63 Zeichen lang sein.
";
$elem["ubiquity/text/hostname_error_length"]["descriptionfr"]="La longueur doit être comprise entre 1 et 63 caractères.
";
$elem["ubiquity/text/hostname_error_length"]["default"]="";
$elem["ubiquity/text/hostname_error_badchar"]["type"]="text";
$elem["ubiquity/text/hostname_error_badchar"]["description"]="May only contain letters, digits, hyphens, and dots.
";
$elem["ubiquity/text/hostname_error_badchar"]["descriptionde"]="Es darf nur Buchstaben, Zahlen, Bindestriche und Punkte enthalten.
";
$elem["ubiquity/text/hostname_error_badchar"]["descriptionfr"]="Ne peut contenir que des lettres, des chiffres, des tirets et des points.
";
$elem["ubiquity/text/hostname_error_badchar"]["default"]="";
$elem["ubiquity/text/hostname_error_badhyphen"]["type"]="text";
$elem["ubiquity/text/hostname_error_badhyphen"]["description"]="May not start or end with a hyphen.
";
$elem["ubiquity/text/hostname_error_badhyphen"]["descriptionde"]="Darf nicht mit einem Bindestrich beginnen oder aufhören.
";
$elem["ubiquity/text/hostname_error_badhyphen"]["descriptionfr"]="Ne peut pas commencer ou finir par un tiret.
";
$elem["ubiquity/text/hostname_error_badhyphen"]["default"]="";
$elem["ubiquity/text/hostname_error_baddots"]["type"]="text";
$elem["ubiquity/text/hostname_error_baddots"]["description"]="May not start or end with a dot, or contain the sequence \"..\".
";
$elem["ubiquity/text/hostname_error_baddots"]["descriptionde"]="Darf nicht mit einem Punkt beginnen oder aufhören oder die Abfolge »..« enthalten.
";
$elem["ubiquity/text/hostname_error_baddots"]["descriptionfr"]="Ne peut pas commencer ou finir par un point, ni contenir la séquence « .. ».
";
$elem["ubiquity/text/hostname_error_baddots"]["default"]="";
$elem["ubiquity/text/password_debug_warning_label"]["type"]="text";
$elem["ubiquity/text/password_debug_warning_label"]["description"]="You are running in debugging mode. Do not use a valuable password!
";
$elem["ubiquity/text/password_debug_warning_label"]["descriptionde"]="Sie befinden sich im Debug-Modus. Verwenden Sie kein für Sie wichtiges Passwort!
";
$elem["ubiquity/text/password_debug_warning_label"]["descriptionfr"]="Vous êtes en mode de débogage. N’utilisez pas de mot de passe sensible !
";
$elem["ubiquity/text/password_debug_warning_label"]["default"]="";
$elem["ubiquity/text/password_mismatch"]["type"]="text";
$elem["ubiquity/text/password_mismatch"]["description"]="Passwords do not match
";
$elem["ubiquity/text/password_mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
";
$elem["ubiquity/text/password_mismatch"]["descriptionfr"]="Les mots de passe ne correspondent pas
";
$elem["ubiquity/text/password_mismatch"]["default"]="";
$elem["ubiquity/text/password/too_short"]["type"]="text";
$elem["ubiquity/text/password/too_short"]["description"]="Short password
";
$elem["ubiquity/text/password/too_short"]["descriptionde"]="Passwort zu kurz
";
$elem["ubiquity/text/password/too_short"]["descriptionfr"]="Mot de passe trop court
";
$elem["ubiquity/text/password/too_short"]["default"]="";
$elem["ubiquity/text/password/weak"]["type"]="text";
$elem["ubiquity/text/password/weak"]["description"]="Weak password
";
$elem["ubiquity/text/password/weak"]["descriptionde"]="Schwaches Passwort
";
$elem["ubiquity/text/password/weak"]["descriptionfr"]="Mot de passe trop faible
";
$elem["ubiquity/text/password/weak"]["default"]="";
$elem["ubiquity/text/password/fair"]["type"]="text";
$elem["ubiquity/text/password/fair"]["description"]="Fair password
";
$elem["ubiquity/text/password/fair"]["descriptionde"]="Ausreichendes Passwort
";
$elem["ubiquity/text/password/fair"]["descriptionfr"]="Mot de passe acceptable
";
$elem["ubiquity/text/password/fair"]["default"]="";
$elem["ubiquity/text/password/good"]["type"]="text";
$elem["ubiquity/text/password/good"]["description"]="Good password
";
$elem["ubiquity/text/password/good"]["descriptionde"]="Gutes Passwort
";
$elem["ubiquity/text/password/good"]["descriptionfr"]="Mot de passe sûr
";
$elem["ubiquity/text/password/good"]["default"]="";
$elem["ubiquity/text/password/strong"]["type"]="text";
$elem["ubiquity/text/password/strong"]["description"]="Strong password
";
$elem["ubiquity/text/password/strong"]["descriptionde"]="Starkes Passwort
";
$elem["ubiquity/text/password/strong"]["descriptionfr"]="Mot de passe sûr
";
$elem["ubiquity/text/password/strong"]["default"]="";
$elem["ubiquity/text/login_auto"]["type"]="text";
$elem["ubiquity/text/login_auto"]["description"]="Log in automatically
";
$elem["ubiquity/text/login_auto"]["descriptionde"]="Automatische Anmeldung
";
$elem["ubiquity/text/login_auto"]["descriptionfr"]="Ouvrir la session automatiquement
";
$elem["ubiquity/text/login_auto"]["default"]="";
$elem["ubiquity/text/login_pass"]["type"]="text";
$elem["ubiquity/text/login_pass"]["description"]="Require my password to log in
";
$elem["ubiquity/text/login_pass"]["descriptionde"]="Passwort zum Anmelden abfragen
";
$elem["ubiquity/text/login_pass"]["descriptionfr"]="Demander mon mot de passe pour ouvrir une session
";
$elem["ubiquity/text/login_pass"]["default"]="";
$elem["ubiquity/text/login_encrypt"]["type"]="text";
$elem["ubiquity/text/login_encrypt"]["description"]="Encrypt my home folder
";
$elem["ubiquity/text/login_encrypt"]["descriptionde"]="Meine persönlichen Dateien verschlüsseln
";
$elem["ubiquity/text/login_encrypt"]["descriptionfr"]="Chiffrer mon dossier personnel
";
$elem["ubiquity/text/login_encrypt"]["default"]="";
$elem["ubiquity/text/part_auto_heading_label"]["type"]="text";
$elem["ubiquity/text/part_auto_heading_label"]["description"]="Installation type
";
$elem["ubiquity/text/part_auto_heading_label"]["descriptionde"]="Installationsart
";
$elem["ubiquity/text/part_auto_heading_label"]["descriptionfr"]="Type d’installation
";
$elem["ubiquity/text/part_auto_heading_label"]["default"]="";
$elem["ubiquity/text/part_auto_files"]["type"]="text";
$elem["ubiquity/text/part_auto_files"]["description"]="Files (${SIZE})
";
$elem["ubiquity/text/part_auto_files"]["descriptionde"]="Dateien (${SIZE})
";
$elem["ubiquity/text/part_auto_files"]["descriptionfr"]="Fichiers (${SIZE})
";
$elem["ubiquity/text/part_auto_files"]["default"]="";
$elem["ubiquity/text/part_auto_comment_label"]["type"]="text";
$elem["ubiquity/text/part_auto_comment_label"]["description"]="Where would you like to install Kubuntu?
";
$elem["ubiquity/text/part_auto_comment_label"]["descriptionde"]="Wo möchten Sie Kubuntu instalieren?
";
$elem["ubiquity/text/part_auto_comment_label"]["descriptionfr"]="Où aimeriez-vous installer Kubuntu ?
";
$elem["ubiquity/text/part_auto_comment_label"]["default"]="";
$elem["ubiquity/text/part_advanced_heading_label"]["type"]="text";
$elem["ubiquity/text/part_advanced_heading_label"]["description"]="Prepare partitions
";
$elem["ubiquity/text/part_advanced_heading_label"]["descriptionde"]="Die Partitionen vorbereiten
";
$elem["ubiquity/text/part_advanced_heading_label"]["descriptionfr"]="Préparer les partitions
";
$elem["ubiquity/text/part_advanced_heading_label"]["default"]="";
$elem["ubiquity/text/install_button"]["type"]="text";
$elem["ubiquity/text/install_button"]["description"]="_Install Now
";
$elem["ubiquity/text/install_button"]["descriptionde"]="Jetzt _installieren
";
$elem["ubiquity/text/install_button"]["descriptionfr"]="_Installer maintenant
";
$elem["ubiquity/text/install_button"]["default"]="";
$elem["ubiquity/text/warning_dialog"]["type"]="title";
$elem["ubiquity/text/warning_dialog"]["description"]="Quit the installation?
";
$elem["ubiquity/text/warning_dialog"]["descriptionde"]="Die Installation beenden?
";
$elem["ubiquity/text/warning_dialog"]["descriptionfr"]="Quitter l’installation ?
";
$elem["ubiquity/text/warning_dialog"]["default"]="";
$elem["ubiquity/text/warning_dialog_label"]["type"]="text";
$elem["ubiquity/text/warning_dialog_label"]["description"]="Do you really want to quit the installation now?
";
$elem["ubiquity/text/warning_dialog_label"]["descriptionde"]="Möchten Sie die Installation jetzt wirklich beenden?
";
$elem["ubiquity/text/warning_dialog_label"]["descriptionfr"]="Voulez-vous vraiment quitter l’installation maintenant ?
";
$elem["ubiquity/text/warning_dialog_label"]["default"]="";
$elem["ubiquity/text/bootloader_fail_dialog"]["type"]="text";
$elem["ubiquity/text/bootloader_fail_dialog"]["description"]="Bootloader install failed
";
$elem["ubiquity/text/bootloader_fail_dialog"]["descriptionde"]="Die Installation des Boot-Loaders ist gescheitert
";
$elem["ubiquity/text/bootloader_fail_dialog"]["descriptionfr"]="Échec de l’installation du chargeur d’amorçage
";
$elem["ubiquity/text/bootloader_fail_dialog"]["default"]="";
$elem["ubiquity/text/bootloader_fail_title"]["type"]="text";
$elem["ubiquity/text/bootloader_fail_title"]["description"]="Description:
 Sorry, an error occurred and it was not possible to install the bootloader at
 the specified location.
";
$elem["ubiquity/text/bootloader_fail_title"]["descriptionde"]="Description-de.UTF-8:
 Entschuldigung, ein Fehler ist aufgetreten und es war nicht möglich, den Boot-Loader an dem gewünschten Ort zu installieren.
";
$elem["ubiquity/text/bootloader_fail_title"]["descriptionfr"]="Description-fr.UTF-8:
 Désolé, une erreur s’est produite. Il n’a pas été possible d’installer le chargeur d’amorçage à l’emplacement indiqué.
";
$elem["ubiquity/text/bootloader_fail_title"]["default"]="";
$elem["ubiquity/text/grub_new_device"]["type"]="text";
$elem["ubiquity/text/grub_new_device"]["description"]="Choose a different device to install the bootloader on:
";
$elem["ubiquity/text/grub_new_device"]["descriptionde"]="Bitte wählen Sie ein anderes Gerät, auf dem der Boot-Loader installiert werden soll:
";
$elem["ubiquity/text/grub_new_device"]["descriptionfr"]="Choisir un autre périphérique sur lequel installer le chargeur d’amorçage :
";
$elem["ubiquity/text/grub_new_device"]["default"]="";
$elem["ubiquity/text/grub_no_new_device"]["type"]="text";
$elem["ubiquity/text/grub_no_new_device"]["description"]="Continue without a bootloader.
";
$elem["ubiquity/text/grub_no_new_device"]["descriptionde"]="Fortsetzen ohne Installation eines Boot-Loaders.
";
$elem["ubiquity/text/grub_no_new_device"]["descriptionfr"]="Continuer sans chargeur d’amorçage.
";
$elem["ubiquity/text/grub_no_new_device"]["default"]="";
$elem["ubiquity/text/skip_label"]["type"]="text";
$elem["ubiquity/text/skip_label"]["description"]="Description:
 You will need to manually install a bootloader in order to start ${RELEASE}.
";
$elem["ubiquity/text/skip_label"]["descriptionde"]="Description-de.UTF-8:
 Sie werden einen Boot-Loader manuell installieren müssen, um ${RELEASE} zu starten.
";
$elem["ubiquity/text/skip_label"]["descriptionfr"]="Description-fr.UTF-8:
 Vous devrez installer manuellement un chargeur d’amorçage pour pouvoir démarrer  ${RELEASE}.
";
$elem["ubiquity/text/skip_label"]["default"]="";
$elem["ubiquity/text/grub_fail_option"]["type"]="text";
$elem["ubiquity/text/grub_fail_option"]["description"]="Cancel the installation.
";
$elem["ubiquity/text/grub_fail_option"]["descriptionde"]="Installation abbrechen.
";
$elem["ubiquity/text/grub_fail_option"]["descriptionfr"]="Annuler l’installation.
";
$elem["ubiquity/text/grub_fail_option"]["default"]="";
$elem["ubiquity/text/abort_label"]["type"]="text";
$elem["ubiquity/text/abort_label"]["description"]="This may leave your computer unable to boot.
";
$elem["ubiquity/text/abort_label"]["descriptionde"]="Dies könnte den Rechner so verändern, dass ein Neustart nicht möglich ist.
";
$elem["ubiquity/text/abort_label"]["descriptionfr"]="Ceci pourrait empêcher votre ordinateur de démarrer.
";
$elem["ubiquity/text/abort_label"]["default"]="";
$elem["ubiquity/text/bootloader_fail_proceed"]["type"]="text";
$elem["ubiquity/text/bootloader_fail_proceed"]["description"]="How would you like to proceed?
";
$elem["ubiquity/text/bootloader_fail_proceed"]["descriptionde"]="Wie möchten Sie fortfahren?
";
$elem["ubiquity/text/bootloader_fail_proceed"]["descriptionfr"]="Comment souhaiteriez-vous procéder ?
";
$elem["ubiquity/text/bootloader_fail_proceed"]["default"]="";
$elem["ubiquity/text/progress_cancel_button"]["type"]="text";
$elem["ubiquity/text/progress_cancel_button"]["description"]="Skip
";
$elem["ubiquity/text/progress_cancel_button"]["descriptionde"]="Überspringen
";
$elem["ubiquity/text/progress_cancel_button"]["descriptionfr"]="Ignorer
";
$elem["ubiquity/text/progress_cancel_button"]["default"]="";
$elem["ubiquity/text/finished_dialog"]["type"]="title";
$elem["ubiquity/text/finished_dialog"]["description"]="Installation Complete
";
$elem["ubiquity/text/finished_dialog"]["descriptionde"]="Installation abgeschlossen
";
$elem["ubiquity/text/finished_dialog"]["descriptionfr"]="Installation terminée
";
$elem["ubiquity/text/finished_dialog"]["default"]="";
$elem["ubiquity/text/quit_button"]["type"]="text";
$elem["ubiquity/text/quit_button"]["description"]="Continue Testing
";
$elem["ubiquity/text/quit_button"]["descriptionde"]="Ausprobieren fortsetzen
";
$elem["ubiquity/text/quit_button"]["descriptionfr"]="Continuer à tester
";
$elem["ubiquity/text/quit_button"]["default"]="";
$elem["ubiquity/text/reboot_button"]["type"]="text";
$elem["ubiquity/text/reboot_button"]["description"]="Restart Now
";
$elem["ubiquity/text/reboot_button"]["descriptionde"]="Jetzt neu starten
";
$elem["ubiquity/text/reboot_button"]["descriptionfr"]="Redémarrer maintenant
";
$elem["ubiquity/text/reboot_button"]["default"]="";
$elem["ubiquity/text/shutdown_button"]["type"]="text";
$elem["ubiquity/text/shutdown_button"]["description"]="Shutdown Now
";
$elem["ubiquity/text/shutdown_button"]["descriptionde"]="Jetzt herunterfahren
";
$elem["ubiquity/text/shutdown_button"]["descriptionfr"]="Éteindre maintenant
";
$elem["ubiquity/text/shutdown_button"]["default"]="";
$elem["ubiquity/show_shutdown_button"]["type"]="boolean";
$elem["ubiquity/show_shutdown_button"]["description"]="for internal use; can be preseeded
 Show the Shutdown Now button at the end of installation

";
$elem["ubiquity/show_shutdown_button"]["descriptionde"]="";
$elem["ubiquity/show_shutdown_button"]["descriptionfr"]="";
$elem["ubiquity/show_shutdown_button"]["default"]="false";
$elem["ubiquity/text/crash_dialog"]["type"]="text";
$elem["ubiquity/text/crash_dialog"]["description"]="Installer crashed
";
$elem["ubiquity/text/crash_dialog"]["descriptionde"]="Installationsprogramm abgestürzt
";
$elem["ubiquity/text/crash_dialog"]["descriptionfr"]="L’installateur a planté
";
$elem["ubiquity/text/crash_dialog"]["default"]="";
$elem["ubiquity/text/crash_heading_label"]["type"]="text";
$elem["ubiquity/text/crash_heading_label"]["description"]="Installer crashed
";
$elem["ubiquity/text/crash_heading_label"]["descriptionde"]="Installationsprogramm abgestürzt
";
$elem["ubiquity/text/crash_heading_label"]["descriptionfr"]="L’installateur a planté
";
$elem["ubiquity/text/crash_heading_label"]["default"]="";
$elem["ubiquity/text/crash_text_label"]["type"]="text";
$elem["ubiquity/text/crash_text_label"]["description"]="Description:
 We're sorry; the installer crashed. After you close this window, we'll
 allow you to file a bug report using the integrated bug reporting tool.
 This will gather information about your system and your installation
 process. The details will be sent to our bug tracker and a developer
 will attend to the problem as soon as possible.
";
$elem["ubiquity/text/crash_text_label"]["descriptionde"]="Description-de.UTF-8:
 Entschuldigung, der Installer ist abgestürzt. Nach dem Schließen dieses Fensters können Sie einen Fehlerbericht erstellen. Dadurch werden Informationen über Ihr System und den Installationsvorgang gesammelt. Die Einzelheiten werden an die Fehlerverwaltung gesendet und ein Entwickler wird sich schnellstmöglich des Problems annehmen.
";
$elem["ubiquity/text/crash_text_label"]["descriptionfr"]="Description-fr.UTF-8:
 Nous sommes désolés ; l'installateur a planté. Lorsque vous fermerez cette fenêtre, nous vous permettrons de remplir un rapport de bogue à l'aide de l'outil de rapport de bogue intégré. Cet outil rassemblera des informations sur votre système et sur votre processus d'installation. Les détails seront envoyés sur notre outil de suivi de bogues et un développeur prendra ce problème en charge le plus tôt possible.
";
$elem["ubiquity/text/crash_text_label"]["default"]="";
$elem["ubiquity/text/a11y_high_contrast"]["type"]="text";
$elem["ubiquity/text/a11y_high_contrast"]["description"]="_High Contrast
";
$elem["ubiquity/text/a11y_high_contrast"]["descriptionde"]="_Hoher Kontrast
";
$elem["ubiquity/text/a11y_high_contrast"]["descriptionfr"]="_Contraste élevé
";
$elem["ubiquity/text/a11y_high_contrast"]["default"]="";
$elem["ubiquity/text/a11y_screen_reader"]["type"]="text";
$elem["ubiquity/text/a11y_screen_reader"]["description"]="_Screen Reader
";
$elem["ubiquity/text/a11y_screen_reader"]["descriptionde"]="_Bildschirmleser
";
$elem["ubiquity/text/a11y_screen_reader"]["descriptionfr"]="_Lecteur d'écran
";
$elem["ubiquity/text/a11y_screen_reader"]["default"]="";
$elem["ubiquity/text/a11y_keyboard_modifiers"]["type"]="text";
$elem["ubiquity/text/a11y_keyboard_modifiers"]["description"]="_Keyboard Modifiers
";
$elem["ubiquity/text/a11y_keyboard_modifiers"]["descriptionde"]="_Tastenbelegung ändern
";
$elem["ubiquity/text/a11y_keyboard_modifiers"]["descriptionfr"]="Touches de _modification du clavier
";
$elem["ubiquity/text/a11y_keyboard_modifiers"]["default"]="";
$elem["ubiquity/text/a11y_onscreen_keyboard"]["type"]="text";
$elem["ubiquity/text/a11y_onscreen_keyboard"]["description"]="_On-screen Keyboard
";
$elem["ubiquity/text/a11y_onscreen_keyboard"]["descriptionde"]="_Bildschirmtastatur
";
$elem["ubiquity/text/a11y_onscreen_keyboard"]["descriptionfr"]="Clavier _virtuel
";
$elem["ubiquity/text/a11y_onscreen_keyboard"]["default"]="";
$elem["ubiquity/text/partition_button_new_label"]["type"]="text";
$elem["ubiquity/text/partition_button_new_label"]["description"]="New Partition Table...
";
$elem["ubiquity/text/partition_button_new_label"]["descriptionde"]="Neue Partitionstabelle …
";
$elem["ubiquity/text/partition_button_new_label"]["descriptionfr"]="Nouvelle table de partition…
";
$elem["ubiquity/text/partition_button_new_label"]["default"]="";
$elem["ubiquity/text/partition_button_new"]["type"]="text";
$elem["ubiquity/text/partition_button_new"]["description"]="Add...
";
$elem["ubiquity/text/partition_button_new"]["descriptionde"]="Hinzufügen …
";
$elem["ubiquity/text/partition_button_new"]["descriptionfr"]="Ajouter…
";
$elem["ubiquity/text/partition_button_new"]["default"]="";
$elem["ubiquity/text/partition_button_edit"]["type"]="text";
$elem["ubiquity/text/partition_button_edit"]["description"]="Change...
";
$elem["ubiquity/text/partition_button_edit"]["descriptionde"]="Ändern …
";
$elem["ubiquity/text/partition_button_edit"]["descriptionfr"]="Modifier…
";
$elem["ubiquity/text/partition_button_edit"]["default"]="";
$elem["ubiquity/text/partition_button_delete"]["type"]="text";
$elem["ubiquity/text/partition_button_delete"]["description"]="Delete
";
$elem["ubiquity/text/partition_button_delete"]["descriptionde"]="Löschen
";
$elem["ubiquity/text/partition_button_delete"]["descriptionfr"]="Supprimer
";
$elem["ubiquity/text/partition_button_delete"]["default"]="";
$elem["ubiquity/text/partition_button_undo"]["type"]="text";
$elem["ubiquity/text/partition_button_undo"]["description"]="Revert
";
$elem["ubiquity/text/partition_button_undo"]["descriptionde"]="Zurücksetzen
";
$elem["ubiquity/text/partition_button_undo"]["descriptionfr"]="Rétablir
";
$elem["ubiquity/text/partition_button_undo"]["default"]="";
$elem["ubiquity/text/part_advanced_recalculating_label"]["type"]="text";
$elem["ubiquity/text/part_advanced_recalculating_label"]["description"]="Recalculating partitions...
";
$elem["ubiquity/text/part_advanced_recalculating_label"]["descriptionde"]="Partitionen werden neu berechnet …
";
$elem["ubiquity/text/part_advanced_recalculating_label"]["descriptionfr"]="Nouveau calcul des partitions…
";
$elem["ubiquity/text/part_advanced_recalculating_label"]["default"]="";
$elem["ubiquity/text/partition_column_device"]["type"]="text";
$elem["ubiquity/text/partition_column_device"]["description"]="Device
";
$elem["ubiquity/text/partition_column_device"]["descriptionde"]="Laufwerk
";
$elem["ubiquity/text/partition_column_device"]["descriptionfr"]="Périphérique
";
$elem["ubiquity/text/partition_column_device"]["default"]="";
$elem["ubiquity/text/partition_column_type"]["type"]="text";
$elem["ubiquity/text/partition_column_type"]["description"]="Type
";
$elem["ubiquity/text/partition_column_type"]["descriptionde"]="Verwendung
";
$elem["ubiquity/text/partition_column_type"]["descriptionfr"]="Type
";
$elem["ubiquity/text/partition_column_type"]["default"]="";
$elem["ubiquity/text/partition_column_mountpoint"]["type"]="text";
$elem["ubiquity/text/partition_column_mountpoint"]["description"]="Mount point
";
$elem["ubiquity/text/partition_column_mountpoint"]["descriptionde"]="Einhängepunkt
";
$elem["ubiquity/text/partition_column_mountpoint"]["descriptionfr"]="Point de montage
";
$elem["ubiquity/text/partition_column_mountpoint"]["default"]="";
$elem["ubiquity/text/partition_column_format"]["type"]="text";
$elem["ubiquity/text/partition_column_format"]["description"]="Format?
";
$elem["ubiquity/text/partition_column_format"]["descriptionde"]="Formatieren?
";
$elem["ubiquity/text/partition_column_format"]["descriptionfr"]="Formater ?
";
$elem["ubiquity/text/partition_column_format"]["default"]="";
$elem["ubiquity/text/partition_column_size"]["type"]="text";
$elem["ubiquity/text/partition_column_size"]["description"]="Size
";
$elem["ubiquity/text/partition_column_size"]["descriptionde"]="Größe
";
$elem["ubiquity/text/partition_column_size"]["descriptionfr"]="Taille
";
$elem["ubiquity/text/partition_column_size"]["default"]="";
$elem["ubiquity/text/partition_column_used"]["type"]="text";
$elem["ubiquity/text/partition_column_used"]["description"]="Used
";
$elem["ubiquity/text/partition_column_used"]["descriptionde"]="Belegt
";
$elem["ubiquity/text/partition_column_used"]["descriptionfr"]="Utilisé
";
$elem["ubiquity/text/partition_column_used"]["default"]="";
$elem["ubiquity/text/partition_column_syst"]["type"]="text";
$elem["ubiquity/text/partition_column_syst"]["description"]="System
";
$elem["ubiquity/text/partition_column_syst"]["descriptionde"]="System
";
$elem["ubiquity/text/partition_column_syst"]["descriptionfr"]="Système
";
$elem["ubiquity/text/partition_column_syst"]["default"]="";
$elem["ubiquity/text/partition_free_space"]["type"]="text";
$elem["ubiquity/text/partition_free_space"]["description"]="free space
";
$elem["ubiquity/text/partition_free_space"]["descriptionde"]="Freier Speicherplatz
";
$elem["ubiquity/text/partition_free_space"]["descriptionfr"]="espace libre
";
$elem["ubiquity/text/partition_free_space"]["default"]="";
$elem["ubiquity/text/partition_used_unknown"]["type"]="text";
$elem["ubiquity/text/partition_used_unknown"]["description"]="unknown
";
$elem["ubiquity/text/partition_used_unknown"]["descriptionde"]="Unbekannt
";
$elem["ubiquity/text/partition_used_unknown"]["descriptionfr"]="inconnu
";
$elem["ubiquity/text/partition_used_unknown"]["default"]="";
$elem["ubiquity/text/partition_dialog"]["type"]="text";
$elem["ubiquity/text/partition_dialog"]["description"]="Create partition
";
$elem["ubiquity/text/partition_dialog"]["descriptionde"]="Partition erstellen
";
$elem["ubiquity/text/partition_dialog"]["descriptionfr"]="Créer une partition
";
$elem["ubiquity/text/partition_dialog"]["default"]="";
$elem["ubiquity/text/partition_size_label"]["type"]="text";
$elem["ubiquity/text/partition_size_label"]["description"]="Size:
";
$elem["ubiquity/text/partition_size_label"]["descriptionde"]="Größe:
";
$elem["ubiquity/text/partition_size_label"]["descriptionfr"]="Taille :
";
$elem["ubiquity/text/partition_size_label"]["default"]="";
$elem["ubiquity/text/partition_create_place_beginning"]["type"]="text";
$elem["ubiquity/text/partition_create_place_beginning"]["description"]="Beginning of this space
";
$elem["ubiquity/text/partition_create_place_beginning"]["descriptionde"]="Anfang dieses Bereichs
";
$elem["ubiquity/text/partition_create_place_beginning"]["descriptionfr"]="Début de cet espace
";
$elem["ubiquity/text/partition_create_place_beginning"]["default"]="";
$elem["ubiquity/text/partition_create_place_end"]["type"]="text";
$elem["ubiquity/text/partition_create_place_end"]["description"]="End of this space
";
$elem["ubiquity/text/partition_create_place_end"]["descriptionde"]="Ende dieses Bereichs
";
$elem["ubiquity/text/partition_create_place_end"]["descriptionfr"]="Fin de cet espace
";
$elem["ubiquity/text/partition_create_place_end"]["default"]="";
$elem["ubiquity/text/partition_create_type_primary"]["type"]="text";
$elem["ubiquity/text/partition_create_type_primary"]["description"]="Primary
";
$elem["ubiquity/text/partition_create_type_primary"]["descriptionde"]="Primär
";
$elem["ubiquity/text/partition_create_type_primary"]["descriptionfr"]="Primaire
";
$elem["ubiquity/text/partition_create_type_primary"]["default"]="";
$elem["ubiquity/text/partition_create_type_logical"]["type"]="text";
$elem["ubiquity/text/partition_create_type_logical"]["description"]="Logical
";
$elem["ubiquity/text/partition_create_type_logical"]["descriptionde"]="Logisch
";
$elem["ubiquity/text/partition_create_type_logical"]["descriptionfr"]="Logique
";
$elem["ubiquity/text/partition_create_type_logical"]["default"]="";
$elem["ubiquity/text/partition_edit_dialog"]["type"]="text";
$elem["ubiquity/text/partition_edit_dialog"]["description"]="Edit partition
";
$elem["ubiquity/text/partition_edit_dialog"]["descriptionde"]="Partition bearbeiten
";
$elem["ubiquity/text/partition_edit_dialog"]["descriptionfr"]="Modifier la partition
";
$elem["ubiquity/text/partition_edit_dialog"]["default"]="";
$elem["ubiquity/text/partition_edit_heading_label"]["type"]="text";
$elem["ubiquity/text/partition_edit_heading_label"]["description"]="Edit a partition
";
$elem["ubiquity/text/partition_edit_heading_label"]["descriptionde"]="Eine Partition bearbeiten
";
$elem["ubiquity/text/partition_edit_heading_label"]["descriptionfr"]="Modifier une partition
";
$elem["ubiquity/text/partition_edit_heading_label"]["default"]="";
$elem["ubiquity/text/bootloader_group_label"]["type"]="text";
$elem["ubiquity/text/bootloader_group_label"]["description"]="Boot loader
";
$elem["ubiquity/text/bootloader_group_label"]["descriptionde"]="Boot-Loader
";
$elem["ubiquity/text/bootloader_group_label"]["descriptionfr"]="Chargeur d’amorçage
";
$elem["ubiquity/text/bootloader_group_label"]["default"]="";
$elem["ubiquity/text/finished_label"]["type"]="text";
$elem["ubiquity/text/finished_label"]["description"]="Description:
 Installation has finished.  You can continue testing ${RELEASE} now, but until
 you restart the computer, any changes you make or documents you save will
 not be preserved.
";
$elem["ubiquity/text/finished_label"]["descriptionde"]="Description-de.UTF-8:
 Die Installation ist abgeschlossen. Sie können ${RELEASE} jetzt weiter ausprobieren, aber alle Änderungen, die Sie bis zu einem Neustart des Systems durchführen, werden nicht gespeichert.
";
$elem["ubiquity/text/finished_label"]["descriptionfr"]="Description-fr.UTF-8:
 L’installation est terminée. Vous pouvez maintenant continuer à tester ${RELEASE}, mais tant que vous n’aurez pas redémarré votre ordinateur, les changements effectués ou les documents créés ne seront pas préservés.
";
$elem["ubiquity/text/finished_label"]["default"]="";
$elem["ubiquity/text/go_back"]["type"]="text";
$elem["ubiquity/text/go_back"]["description"]="Go Back
";
$elem["ubiquity/text/go_back"]["descriptionde"]="Zurück
";
$elem["ubiquity/text/go_back"]["descriptionfr"]="Revenir en arrière
";
$elem["ubiquity/text/go_back"]["default"]="";
$elem["ubiquity/text/continue"]["type"]="text";
$elem["ubiquity/text/continue"]["description"]="Continue
";
$elem["ubiquity/text/continue"]["descriptionde"]="Weiter
";
$elem["ubiquity/text/continue"]["descriptionfr"]="Continuer
";
$elem["ubiquity/text/continue"]["default"]="";
$elem["ubiquity/text/connect"]["type"]="text";
$elem["ubiquity/text/connect"]["description"]="Connect
";
$elem["ubiquity/text/connect"]["descriptionde"]="Verbinden
";
$elem["ubiquity/text/connect"]["descriptionfr"]="Se connecter
";
$elem["ubiquity/text/connect"]["default"]="";
$elem["ubiquity/text/stop"]["type"]="text";
$elem["ubiquity/text/stop"]["description"]="Stop
";
$elem["ubiquity/text/stop"]["descriptionde"]="Anhalten
";
$elem["ubiquity/text/stop"]["descriptionfr"]="Arrêter
";
$elem["ubiquity/text/stop"]["default"]="";
$elem["ubiquity/text/next"]["type"]="text";
$elem["ubiquity/text/next"]["description"]="Continue
";
$elem["ubiquity/text/next"]["descriptionde"]="Weiter
";
$elem["ubiquity/text/next"]["descriptionfr"]="Continuer
";
$elem["ubiquity/text/next"]["default"]="";
$elem["ubiquity/text/in_uefi_mode"]["type"]="text";
$elem["ubiquity/text/in_uefi_mode"]["description"]="Continue in UEFI mode

";
$elem["ubiquity/text/in_uefi_mode"]["descriptionde"]="";
$elem["ubiquity/text/in_uefi_mode"]["descriptionfr"]="";
$elem["ubiquity/text/in_uefi_mode"]["default"]="";
$elem["ubiquity/finished_restart_only"]["type"]="text";
$elem["ubiquity/finished_restart_only"]["description"]="Description:
 Installation is complete. You need to restart the computer in order to use
 the new installation.
";
$elem["ubiquity/finished_restart_only"]["descriptionde"]="Description-de.UTF-8:
 Die Installation ist abgeschlossen. Sie müssen jetzt den Rechner neu starten, um das System zu benutzen.
";
$elem["ubiquity/finished_restart_only"]["descriptionfr"]="Description-fr.UTF-8:
 Installation terminée. Vous devez redémarrer votre machine afin d'utiliser votre nouvelle installation.
";
$elem["ubiquity/finished_restart_only"]["default"]="";
$elem["ubiquity/install/checking"]["type"]="text";
$elem["ubiquity/install/checking"]["description"]="Verifying the installation configuration...
";
$elem["ubiquity/install/checking"]["descriptionde"]="Konfiguration der Installation wird überprüft …
";
$elem["ubiquity/install/checking"]["descriptionfr"]="Vérification de la configuration de l’installation…
";
$elem["ubiquity/install/checking"]["default"]="";
$elem["ubiquity/install/title"]["type"]="title";
$elem["ubiquity/install/title"]["description"]="Installing system
";
$elem["ubiquity/install/title"]["descriptionde"]="Installation des Grundsystems
";
$elem["ubiquity/install/title"]["descriptionfr"]="Installation du système
";
$elem["ubiquity/install/title"]["default"]="";
$elem["ubiquity/install/mounting_source"]["type"]="text";
$elem["ubiquity/install/mounting_source"]["description"]="Finding the distribution to copy...
";
$elem["ubiquity/install/mounting_source"]["descriptionde"]="Zu kopierende Distribution wird gesucht …
";
$elem["ubiquity/install/mounting_source"]["descriptionfr"]="Recherche de la distribution à copier…
";
$elem["ubiquity/install/mounting_source"]["default"]="";
$elem["ubiquity/install/filesystem-images"]["type"]="string";
$elem["ubiquity/install/filesystem-images"]["description"]="Only for preseeding; not translated.
 This may be preseeded to a space-separated list of paths to the filesystem
 image to copy to the hard disk. (Normally, these paths would begin with
 /cdrom.) If more than one filesystem image is given, they will be overlaid
 using unionfs.

";
$elem["ubiquity/install/filesystem-images"]["descriptionde"]="";
$elem["ubiquity/install/filesystem-images"]["descriptionfr"]="";
$elem["ubiquity/install/filesystem-images"]["default"]="";
$elem["ubiquity/install/copying"]["type"]="text";
$elem["ubiquity/install/copying"]["description"]="Copying files...
";
$elem["ubiquity/install/copying"]["descriptionde"]="Dateien werden kopiert …
";
$elem["ubiquity/install/copying"]["descriptionfr"]="Copie des fichiers…
";
$elem["ubiquity/install/copying"]["default"]="";
$elem["ubiquity/install/copying_minute"]["type"]="text";
$elem["ubiquity/install/copying_minute"]["description"]="Almost finished copying files...
";
$elem["ubiquity/install/copying_minute"]["descriptionde"]="Kopieren der Dateien fast abgeschlossen …
";
$elem["ubiquity/install/copying_minute"]["descriptionfr"]="Copie des fichiers presque terminée…
";
$elem["ubiquity/install/copying_minute"]["default"]="";
$elem["ubiquity/install/copying_error/no_space"]["type"]="error";
$elem["ubiquity/install/copying_error/no_space"]["description"]="Installation Failed
 The installer encountered an error copying files to the hard disk:
 .
 ${ERROR}
 .
 This is due to there being insufficient disk space for the install to
 complete on the target partition.  Please run the installer again and
 select a larger partition to install into.
";
$elem["ubiquity/install/copying_error/no_space"]["descriptionde"]="Installation fehlgeschlagen
 Beim Kopieren der Dateien auf die Festplatte ist ein Fehler aufgetreten:
 .
 ${ERROR}
 .
 Dies wurde dadurch verursacht, dass der Festplattenspeicher auf der Zielpartition nicht ausreicht, um die Installation abzuschließen. Bitte starten Sie die Installation erneut und wählen Sie eine größere Partition, auf der installiert werden soll.
";
$elem["ubiquity/install/copying_error/no_space"]["descriptionfr"]="L’installation a échoué
 Le programme d’installation a rencontré une erreur lors de la copie des fichiers sur le disque dur :
 .
 ${ERROR}
 .
 L’installation ne peut pas se terminer sur la partition cible car l’espace disque y est insuffisant. Veuillez relancer l’installateur et sélectionner une partition d’installation plus grande.
";
$elem["ubiquity/install/copying_error/no_space"]["default"]="";
$elem["ubiquity/install/copying_error/cd_fault"]["type"]="error";
$elem["ubiquity/install/copying_error/cd_fault"]["description"]="Installation Failed
 The installer encountered an error copying files to the hard disk:
 .
 ${ERROR}
 .
 This is often due to a faulty CD/DVD disk or drive. It may help to clean
 the CD/DVD, to burn the CD/DVD at a lower speed, or to clean the CD/DVD
 drive lens (cleaning kits are often available from electronics suppliers).
";
$elem["ubiquity/install/copying_error/cd_fault"]["descriptionde"]="Installation fehlgeschlagen
 Beim Kopieren der Dateien auf die Festplatte ist ein Fehler aufgetreten:
 .
 ${ERROR}
 .
 Dies wird oft durch fehlerhafte CD/DVD-Laufwerke oder -Medien verursacht. Es kann helfen, die CD/DVD zu reinigen, die CD/DVD mit einer niedrigeren Geschwindigkeit zu brennen oder die Linse des CD/DVD-Laufwerks zu reinigen (Zubehör für solche Reinigungen ist häufig im Elektronikhandel verfügbar).
";
$elem["ubiquity/install/copying_error/cd_fault"]["descriptionfr"]="L’installation a échoué
 Le programme d’installation a rencontré une erreur lors de la copie des fichiers sur le disque dur :
 .
 ${ERROR}
 .
 Ceci est souvent causé par un disque ou un lecteur CD/DVD défectueux. Vous pouvez essayer de nettoyer le CD/DVD, de le graver à vitesse réduite ou de nettoyer la lentille du lecteur CD/DVD (des trousses de nettoyage sont souvent disponibles dans des magasins d'électronique).
";
$elem["ubiquity/install/copying_error/cd_fault"]["default"]="";
$elem["ubiquity/install/copying_error/hd_fault"]["type"]="error";
$elem["ubiquity/install/copying_error/hd_fault"]["description"]="Installation Failed
 The installer encountered an error copying files to the hard disk:
 .
 ${ERROR}
 .
 This is often due to a faulty hard disk. It may help to check whether the
 hard disk is old and in need of replacement, or to move the system to a
 cooler environment.
";
$elem["ubiquity/install/copying_error/hd_fault"]["descriptionde"]="Installation fehlgeschlagen
 Beim Kopieren der Dateien auf die Festplatte ist ein Fehler aufgetreten:
 .
 ${ERROR}
 .
 Dies wird oft durch eine fehlerhafte Festplatte verursacht. Es kann helfen, zu überprüfen, ob die Festplatte alt ist und ausgetauscht werden muss, oder das System in eine kühlere Umgebung zu verlagern.
";
$elem["ubiquity/install/copying_error/hd_fault"]["descriptionfr"]="L’installation a échoué
 Le programme d’installation a rencontré une erreur lors de la copie des fichiers sur le disque dur :
 .
 ${ERROR}
 .
 Ceci est souvent provoqué par un disque dur défectueux. Il peut être utile de vérifier l’âge du disque dur et d’envisager un éventuel remplacement, ou d’assurer une meilleure ventilation du système pour abaisser sa température.
";
$elem["ubiquity/install/copying_error/hd_fault"]["default"]="";
$elem["ubiquity/install/copying_error/cd_hd_fault"]["type"]="error";
$elem["ubiquity/install/copying_error/cd_hd_fault"]["description"]="Installation Failed
 The installer encountered an error copying files to the hard disk:
 .
 ${ERROR}
 .
 This is often due to a faulty CD/DVD disk or drive, or a faulty hard disk.
 It may help to clean the CD/DVD, to burn the CD/DVD at a lower speed, to
 clean the CD/DVD drive lens (cleaning kits are often available from
 electronics suppliers), to check whether the hard disk is old and in need
 of replacement, or to move the system to a cooler environment.
";
$elem["ubiquity/install/copying_error/cd_hd_fault"]["descriptionde"]="Installation fehlgeschlagen
 Beim Kopieren der Dateien auf die Festplatte ist ein Fehler aufgetreten:
 .
 ${ERROR}
 .
 Dies wird oft durch fehlerhafte CD/DVD-Laufwerke, -Medien oder eine fehlerhafte Festplatte verursacht. Es kann helfen, die CD/DVD zu reinigen, die CD/DVD mit einer niedrigeren Geschwindigkeit zu brennen, die Linse des CD/DVD-Laufwerks zu reinigen (Zubehör für solche Reinigungen ist häufig im Elektronikhandel verfügbar), zu prüfen, ob die Festplatte alt ist und ausgetauscht werden muss oder das System in eine kühlere Umgebung zu verlagern.
";
$elem["ubiquity/install/copying_error/cd_hd_fault"]["descriptionfr"]="L’installation a échoué
 Le programme d’installation a rencontré une erreur lors de la copie des fichiers sur le disque dur :
 .
 ${ERROR}
 .
 Ceci est souvent causé par un disque ou un lecteur CD/DVD défectueux ou un disque dur défectueux. Vous pouvez essayer de nettoyer le CD/DVD, de le graver à vitesse réduite ou de nettoyer la lentille du lecteur CD/DVD (des trousses de nettoyage sont souvent disponibles dans des magasins d'électronique). Il peut aussi être utile de vérifier l'âge du disque dur et d'envisager un éventuel remplacement, ou de déplacer votre système dans un environnement plus frais.
";
$elem["ubiquity/install/copying_error/cd_hd_fault"]["default"]="";
$elem["ubiquity/install/copying_error/md5"]["type"]="select";
$elem["ubiquity/install/copying_error/md5"]["choices"][1]="abort";
$elem["ubiquity/install/copying_error/md5"]["choices"][2]="retry";
$elem["ubiquity/install/copying_error/md5"]["description"]="Installation Failed
 The following file did not match its source copy on the CD/DVD:
 .
 ${FILE}
 .
 This is often due to a faulty CD/DVD disk or drive, or a faulty hard disk.
 It may help to clean the CD/DVD, to burn the CD/DVD at a lower speed, to
 clean the CD/DVD drive lens (cleaning kits are often available from
 electronics suppliers), to check whether the hard disk is old and in need
 of replacement, or to move the system to a cooler environment.
";
$elem["ubiquity/install/copying_error/md5"]["descriptionde"]="Installation fehlgeschlagen
 Folgende Datei entsprach nach dem Kopieren nicht der Originaldatei auf der CD/DVD:
 .
 ${FILE}
 .
 Dies wird oft durch fehlerhafte CD/DVD-Laufwerke, -Medien oder eine fehlerhafte Festplatte verursacht. Es kann helfen, die CD/DVD zu reinigen, die CD/DVD mit einer niedrigeren Geschwindigkeit zu brennen, die Linse des CD/DVD-Laufwerks zu reinigen (Zubehör für solche Reinigungen ist häufig im Elektronikhandel verfügbar), zu prüfen, ob die Festplatte alt ist und ausgetauscht werden muss oder das System in eine kühlere Umgebung zu verlagern.
";
$elem["ubiquity/install/copying_error/md5"]["descriptionfr"]="L’installation a échoué
 Le fichier suivant ne correspond pas à sa copie originale présente sur le CD/DVD :
 .
 ${FILE}
 .
 Ceci est souvent causé par un disque ou un lecteur CD/DVD défectueux ou un disque dur défectueux. Vous pouvez essayer de nettoyer le CD/DVD, de le graver à vitesse réduite ou de nettoyer la lentille du lecteur CD/DVD (des trousses de nettoyage sont souvent disponibles dans des magasins d'électronique). Il peut aussi être utile de vérifier l'âge du disque dur et d'envisager un éventuel remplacement, ou de déplacer votre système dans un environnement plus frais.
";
$elem["ubiquity/install/copying_error/md5"]["default"]="";
$elem["ubiquity/install/log_files"]["type"]="text";
$elem["ubiquity/install/log_files"]["description"]="Copying installation logs...
";
$elem["ubiquity/install/log_files"]["descriptionde"]="Installationsprotokolle werden kopiert …
";
$elem["ubiquity/install/log_files"]["descriptionfr"]="Copie des journaux d’installation…
";
$elem["ubiquity/install/log_files"]["default"]="";
$elem["ubiquity/install/target_hooks"]["type"]="text";
$elem["ubiquity/install/target_hooks"]["description"]="Configuring target system...
";
$elem["ubiquity/install/target_hooks"]["descriptionde"]="Zielsystem wird eingerichtet …
";
$elem["ubiquity/install/target_hooks"]["descriptionfr"]="Configuration du système de destination…
";
$elem["ubiquity/install/target_hooks"]["default"]="";
$elem["ubiquity/install/locales"]["type"]="text";
$elem["ubiquity/install/locales"]["description"]="Configuring system locales...
";
$elem["ubiquity/install/locales"]["descriptionde"]="System-Gebietsschema wird eingerichtet …
";
$elem["ubiquity/install/locales"]["descriptionfr"]="Configuration des variables linguistiques et régionales…
";
$elem["ubiquity/install/locales"]["default"]="";
$elem["ubiquity/install/apt"]["type"]="text";
$elem["ubiquity/install/apt"]["description"]="Configuring apt...
";
$elem["ubiquity/install/apt"]["descriptionde"]="APT wird eingerichtet …
";
$elem["ubiquity/install/apt"]["descriptionfr"]="Configuration de apt…
";
$elem["ubiquity/install/apt"]["default"]="";
$elem["ubiquity/install/timezone"]["type"]="text";
$elem["ubiquity/install/timezone"]["description"]="Configuring time zone...
";
$elem["ubiquity/install/timezone"]["descriptionde"]="Zeitzone wird eingerichtet …
";
$elem["ubiquity/install/timezone"]["descriptionfr"]="Configuration du fuseau horaire…
";
$elem["ubiquity/install/timezone"]["default"]="";
$elem["ubiquity/install/keyboard"]["type"]="text";
$elem["ubiquity/install/keyboard"]["description"]="Configuring keyboard...
";
$elem["ubiquity/install/keyboard"]["descriptionde"]="Tastatur wird eingerichtet …
";
$elem["ubiquity/install/keyboard"]["descriptionfr"]="Configuration du clavier…
";
$elem["ubiquity/install/keyboard"]["default"]="";
$elem["ubiquity/install/user"]["type"]="text";
$elem["ubiquity/install/user"]["description"]="Creating user...
";
$elem["ubiquity/install/user"]["descriptionde"]="Benutzer wird hinzugefügt …
";
$elem["ubiquity/install/user"]["descriptionfr"]="Création de l’utilisateur…
";
$elem["ubiquity/install/user"]["default"]="";
$elem["ubiquity/install/hardware"]["type"]="text";
$elem["ubiquity/install/hardware"]["description"]="Configuring hardware...
";
$elem["ubiquity/install/hardware"]["descriptionde"]="Hardware wird eingerichtet …
";
$elem["ubiquity/install/hardware"]["descriptionfr"]="Configuration du matériel…
";
$elem["ubiquity/install/hardware"]["default"]="";
$elem["ubiquity/install/nonfree"]["type"]="text";
$elem["ubiquity/install/nonfree"]["description"]="Installing third-party software...
";
$elem["ubiquity/install/nonfree"]["descriptionde"]="Drittanbieter-Software wird installiert …
";
$elem["ubiquity/install/nonfree"]["descriptionfr"]="Installation de logiciels tiers…
";
$elem["ubiquity/install/nonfree"]["default"]="";
$elem["ubiquity/install/network"]["type"]="text";
$elem["ubiquity/install/network"]["description"]="Configuring network...
";
$elem["ubiquity/install/network"]["descriptionde"]="Netzwerk wird eingerichtet …
";
$elem["ubiquity/install/network"]["descriptionfr"]="Configuration du réseau…
";
$elem["ubiquity/install/network"]["default"]="";
$elem["ubiquity/install/bootloader"]["type"]="text";
$elem["ubiquity/install/bootloader"]["description"]="Configuring boot loader...
";
$elem["ubiquity/install/bootloader"]["descriptionde"]="Boot-Loader wird eingerichtet …
";
$elem["ubiquity/install/bootloader"]["descriptionfr"]="Configuration du chargeur d’amorçage…
";
$elem["ubiquity/install/bootloader"]["default"]="";
$elem["ubiquity/install/apt_clone_save"]["type"]="text";
$elem["ubiquity/install/apt_clone_save"]["description"]="Saving installed packages...
";
$elem["ubiquity/install/apt_clone_save"]["descriptionde"]="Installierte Pakete werden gesichert …
";
$elem["ubiquity/install/apt_clone_save"]["descriptionfr"]="Enregistrement des paquets installés…
";
$elem["ubiquity/install/apt_clone_save"]["default"]="";
$elem["ubiquity/install/apt_clone_restore"]["type"]="text";
$elem["ubiquity/install/apt_clone_restore"]["description"]="Restoring previously installed packages...
";
$elem["ubiquity/install/apt_clone_restore"]["descriptionde"]="Vorher installierte Pakete werden wiederhergestellt …
";
$elem["ubiquity/install/apt_clone_restore"]["descriptionfr"]="Restauration des paquets précédemment installés…
";
$elem["ubiquity/install/apt_clone_restore"]["default"]="";
$elem["ubiquity/install/installing"]["type"]="text";
$elem["ubiquity/install/installing"]["description"]="Installing additional packages...
";
$elem["ubiquity/install/installing"]["descriptionde"]="Zusätzliche Pakete werden installiert …
";
$elem["ubiquity/install/installing"]["descriptionfr"]="Installation de paquets supplémentaires…
";
$elem["ubiquity/install/installing"]["default"]="";
$elem["ubiquity/install/find_installables"]["type"]="text";
$elem["ubiquity/install/find_installables"]["description"]="Checking for packages to install...
";
$elem["ubiquity/install/find_installables"]["descriptionde"]="Zu installierende Pakete werden ermittelt …
";
$elem["ubiquity/install/find_installables"]["descriptionfr"]="Vérification des paquets à installer…
";
$elem["ubiquity/install/find_installables"]["default"]="";
$elem["ubiquity/install/removing"]["type"]="text";
$elem["ubiquity/install/removing"]["description"]="Removing extra packages...
";
$elem["ubiquity/install/removing"]["descriptionde"]="Zusatzpakete werden entfernt …
";
$elem["ubiquity/install/removing"]["descriptionfr"]="Suppression des paquets supplémentaires…
";
$elem["ubiquity/install/removing"]["default"]="";
$elem["ubiquity/install/find_removables"]["type"]="text";
$elem["ubiquity/install/find_removables"]["description"]="Checking for packages to remove...
";
$elem["ubiquity/install/find_removables"]["descriptionde"]="Zu entfernende Pakete werden ermittelt …
";
$elem["ubiquity/install/find_removables"]["descriptionfr"]="Vérification des paquets à supprimer…
";
$elem["ubiquity/install/find_removables"]["default"]="";
$elem["ubiquity/install/fetch_remove"]["type"]="text";
$elem["ubiquity/install/fetch_remove"]["description"]="Downloading packages (${TIME} remaining)...
";
$elem["ubiquity/install/fetch_remove"]["descriptionde"]="Pakete werden heruntergeladen (${TIME} verbleibend) …
";
$elem["ubiquity/install/fetch_remove"]["descriptionfr"]="Téléchargement des paquets (fin dans ${TIME})…
";
$elem["ubiquity/install/fetch_remove"]["default"]="";
$elem["ubiquity/install/apt_indices_starting"]["type"]="text";
$elem["ubiquity/install/apt_indices_starting"]["description"]="Downloading package lists...
";
$elem["ubiquity/install/apt_indices_starting"]["descriptionde"]="Paketlisten werden heruntergeladen …
";
$elem["ubiquity/install/apt_indices_starting"]["descriptionfr"]="Téléchargement des listes de paquets…
";
$elem["ubiquity/install/apt_indices_starting"]["default"]="";
$elem["ubiquity/install/apt_indices"]["type"]="text";
$elem["ubiquity/install/apt_indices"]["description"]="Downloading package lists (${TIME} remaining)...
";
$elem["ubiquity/install/apt_indices"]["descriptionde"]="Paketlisten werden heruntergeladen (${TIME} verbleibend) …
";
$elem["ubiquity/install/apt_indices"]["descriptionfr"]="Téléchargement des listes des paquets (fin dans ${TIME})…
";
$elem["ubiquity/install/apt_indices"]["default"]="";
$elem["ubiquity/install/apt_info"]["type"]="text";
$elem["ubiquity/install/apt_info"]["description"]="${DESCRIPTION}

";
$elem["ubiquity/install/apt_info"]["descriptionde"]="";
$elem["ubiquity/install/apt_info"]["descriptionfr"]="";
$elem["ubiquity/install/apt_info"]["default"]="";
$elem["ubiquity/install/apt_error_install"]["type"]="error";
$elem["ubiquity/install/apt_error_install"]["description"]="Error installing ${PACKAGE}
 ${MESSAGE}
";
$elem["ubiquity/install/apt_error_install"]["descriptionde"]="Fehler beim Installieren von ${PACKAGE}
 ${MESSAGE}
";
$elem["ubiquity/install/apt_error_install"]["descriptionfr"]="Erreur lors de l’installation de ${PACKAGE}
 ${MESSAGE}
";
$elem["ubiquity/install/apt_error_install"]["default"]="";
$elem["ubiquity/install/apt_error_remove"]["type"]="error";
$elem["ubiquity/install/apt_error_remove"]["description"]="Error removing ${PACKAGE}
 ${MESSAGE}
";
$elem["ubiquity/install/apt_error_remove"]["descriptionde"]="Fehler beim Entfernen von ${PACKAGE}
 ${MESSAGE}
";
$elem["ubiquity/install/apt_error_remove"]["descriptionfr"]="Erreur lors de la suppression de ${PACKAGE}
 ${MESSAGE}
";
$elem["ubiquity/install/apt_error_remove"]["default"]="";
$elem["ubiquity/install/broken_install"]["type"]="error";
$elem["ubiquity/install/broken_install"]["description"]="Error while installing packages
 An error occurred while installing packages:
 .
 ${ERROR}
 .
 The following packages are in a broken state:
 .
 ${PACKAGES}
 .
 This may be due to using an old installer image, or it may be due to a bug
 in some of the packages listed above. More details may be found in
 /var/log/syslog. The installer will try to continue anyway, but may fail at
 a later point, and will not be able to install or remove other packages
 (possibly including itself) from the installed system. You should first
 look for newer versions of your installer image, or failing that report the
 problem to your distributor.
";
$elem["ubiquity/install/broken_install"]["descriptionde"]="Fehler beim Installieren der Pakete
 Ein Fehler ist beim Installieren der Pakete aufgetreten:
 .
 ${ERROR}
 .
 Die folgenden Pakete sind defekt:
 .
 ${PACKAGES}
 .
 Der Fehler könnte durch die Verwendung eines veralteten Installationsprogramms verursacht worden sein oder aufgrund eines Fehlers in den obigen Paketen. In der Protokolldatei »/var/log/syslog« könnte Näheres dazu stehen. Es wird versucht, die Installation fortzusetzen, sie könnte aber zu einem späteren Zeitpunkt fehlschlagen. Möglicherweise können dann nicht alle erforderlichen Pakete installiert oder entfernt werden (inklusive des Installationsprogramms selbst). Sie sollten zuerst überprüfen, ob eine neuere Version des Installationsprogramms bzw. -mediums verfügbar ist oder den Fehler dem Herausgeber der Veröffentlichung melden.
";
$elem["ubiquity/install/broken_install"]["descriptionfr"]="Erreur lors de l’installation des paquets
 Une erreur est survenue lors de l’installation des paquets :
 .
 ${ERROR}
 .
 Les paquets suivants sont cassés :
 .
 ${PACKAGES}
 .
 Ceci peut être dû à l’utilisation d’une ancienne image de l’installateur, ou bien à un bogue dans certains paquets listés ci-dessus. De plus amples renseignements se trouvent dans /var/log/syslog. L’installateur va essayer de poursuivre malgré tout, mais il peut échouer à une étape ultérieure et il ne pourra pas installer ou supprimer d’autres paquets (y compris lui-même probablement) du système installé. Vous devriez d’abord chercher une version plus récente de l’image de l’installateur, ou le cas échéant, signaler ce problème à votre revendeur.
";
$elem["ubiquity/install/broken_install"]["default"]="";
$elem["ubiquity/install/broken_remove"]["type"]="error";
$elem["ubiquity/install/broken_remove"]["description"]="Error while removing packages
 An error occurred while removing packages:
 .
 ${ERROR}
 .
 The following packages are in a broken state:
 .
 ${PACKAGES}
 .
 This may be due to using an old installer image, or it may be due to a bug
 in some of the packages listed above. More details may be found in
 /var/log/syslog. The installer will try to continue anyway, but may fail at
 a later point, and will not be able to install or remove other packages
 (possibly including itself) from the installed system. You should first
 look for newer versions of your installer image, or failing that report the
 problem to your distributor.
";
$elem["ubiquity/install/broken_remove"]["descriptionde"]="Fehler beim Entfernen der Pakete
 Ein Fehler ist beim Entfernen von Paketen aufgetreten:
 .
 ${ERROR}
 .
 Die folgenden Pakete sind defekt:
 .
 ${PACKAGES}
 .
 Der Fehler könnte durch die Verwendung eines veralteten Installationsprogramms verursacht worden sein oder aufgrund eines Fehlers in den obigen Paketen. In der Protokolldatei »/var/log/syslog« könnte Näheres dazu stehen. Es wird versucht, die Installation fortzusetzen, sie könnte aber zu einem späteren Zeitpunkt fehlschlagen. Möglicherweise können dann nicht alle erforderlichen Pakete installiert oder entfernt werden (inklusive des Installationsprogramms selbst). Sie sollten zuerst überprüfen, ob eine neuere Version des Installationsprogramms bzw. -mediums verfügbar ist oder den Fehler dem Herausgeber der Veröffentlichung melden.
";
$elem["ubiquity/install/broken_remove"]["descriptionfr"]="Erreur lors de la suppression des paquets
 Une erreur est survenue lors de la suppression des paquets :
 .
 ${ERROR}
 .
 Les paquets suivants sont cassés :
 .
 ${PACKAGES}
 .
 Ceci peut être dû à l’utilisation d’une ancienne image de l’installateur, ou bien à un bogue dans certains paquets listés ci-dessus. De plus amples renseignements se trouvent dans /var/log/syslog. L’installateur va essayer de poursuivre malgré tout, mais il peut échouer à une étape ultérieure et il ne pourra pas installer ou supprimer d’autres paquets (y compris lui-même probablement) du système installé. Vous devriez d’abord chercher une version plus récente de l’image de l’installateur, ou le cas échéant, signaler ce problème à votre revendeur.
";
$elem["ubiquity/install/broken_remove"]["default"]="";
$elem["ubiquity/install/broken_network_copy"]["type"]="error";
$elem["ubiquity/install/broken_network_copy"]["description"]="Error copying network configuration
 An error occurred while copying the network settings.  The installation will
 continue, but the network configuration will have to be set up again in the
 installed system.
";
$elem["ubiquity/install/broken_network_copy"]["descriptionde"]="Fehler beim Kopieren der Netzwerkeinstellungen
 Beim Kopieren der Netzwerkeinstellungen ist ein Fehler aufgetreten. Die Installation wird fortgesetzt, aber die Netzwerkeinstellungen müssen im neu installierten System neu eingerichtet werden.
";
$elem["ubiquity/install/broken_network_copy"]["descriptionfr"]="Erreur lors de la copie de la configuration du réseau
 Une erreur est survenue lors de la copie de la configuration du réseau. L’installation va continuer, mais le réseau devra être reconfiguré sur le système installé.
";
$elem["ubiquity/install/broken_network_copy"]["default"]="";
$elem["ubiquity/install/broken_bluetooth_copy"]["type"]="error";
$elem["ubiquity/install/broken_bluetooth_copy"]["description"]="Error copying bluetooth configuration
 An error occurred while copying the bluetooth settings.  The installation will
 continue, but the bluetooth configuration will have to be set up again in the
 installed system.
";
$elem["ubiquity/install/broken_bluetooth_copy"]["descriptionde"]="Fehler beim Kopieren der Bluetooth-Konfiguration
 Während des Kopierens der Bluetooth-Einstellungen ist ein Fehler aufgetreten. Die Installation wird fortgesetzt, aber die Bluetooth-Konfiguration muss später im installierten System erneut eingerichtet werden.
";
$elem["ubiquity/install/broken_bluetooth_copy"]["descriptionfr"]="Erreur lors de la copie de la configuration bluetooth
 Une erreur est survenue lors de la copie des paramètres bluetooth. L’installation va continuer, mais le bluetooth devra être reconfiguré sur le système installé.
";
$elem["ubiquity/install/broken_bluetooth_copy"]["default"]="";
$elem["ubiquity/install/broken_apt_clone"]["type"]="error";
$elem["ubiquity/install/broken_apt_clone"]["description"]="Error restoring installed applications
 An error occurred while restoring previously-installed applications.  The
 installation will continue, but you may have to manually reinstall some
 applications after the computer reboots.
";
$elem["ubiquity/install/broken_apt_clone"]["descriptionde"]="Fehler beim Wiederherstellen der installierten Anwendungen
 Es ist ein Fehler beim Wiederherstellen der zuvor installierten Anwendungen aufgetreten. Die Installation wird fortgesetzt, Sie werden jedoch einige Anwendungen manuell nach-installieren müssen, nachdem der Rechner neu gestartet wurde.
";
$elem["ubiquity/install/broken_apt_clone"]["descriptionfr"]="Erreur lors de la restauration des applications installées
 Une erreur s’est produite lors de la restauration des applications précédemment installées. L’installation va continuer mais vous aurez peut-être besoin de réinstaller certains logiciels après le redémarrage de l’ordinateur.
";
$elem["ubiquity/install/broken_apt_clone"]["default"]="";
$elem["ubiquity/install/md5_check"]["type"]="boolean";
$elem["ubiquity/install/md5_check"]["description"]="for internal use; set true to check for matching md5 hashes.

";
$elem["ubiquity/install/md5_check"]["descriptionde"]="";
$elem["ubiquity/install/md5_check"]["descriptionfr"]="";
$elem["ubiquity/install/md5_check"]["default"]="true";
$elem["ubiquity/install/generate-blacklist"]["type"]="boolean";
$elem["ubiquity/install/generate-blacklist"]["description"]="set true to generate a list of files to skip copying.

";
$elem["ubiquity/install/generate-blacklist"]["descriptionde"]="";
$elem["ubiquity/install/generate-blacklist"]["descriptionfr"]="";
$elem["ubiquity/install/generate-blacklist"]["default"]="true";
$elem["ubiquity/install/new-bootdev"]["type"]="string";
$elem["ubiquity/install/new-bootdev"]["description"]="for internal use; new boot device to try.

";
$elem["ubiquity/install/new-bootdev"]["descriptionde"]="";
$elem["ubiquity/install/new-bootdev"]["descriptionfr"]="";
$elem["ubiquity/install/new-bootdev"]["default"]="";
$elem["ubiquity/install/blacklist"]["type"]="text";
$elem["ubiquity/install/blacklist"]["description"]="Calculating files to skip copying...
";
$elem["ubiquity/install/blacklist"]["descriptionde"]="Beim Kopieren auszulassende Dateien werden ermittelt …
";
$elem["ubiquity/install/blacklist"]["descriptionfr"]="Détermination des fichiers à ne pas copier…
";
$elem["ubiquity/install/blacklist"]["default"]="";
$elem["ubiquity/langpacks/title"]["type"]="title";
$elem["ubiquity/langpacks/title"]["description"]="Installing language packs
";
$elem["ubiquity/langpacks/title"]["descriptionde"]="Sprachpakete werden installiert
";
$elem["ubiquity/langpacks/title"]["descriptionfr"]="Installation des paquets linguistiques
";
$elem["ubiquity/langpacks/title"]["default"]="";
$elem["ubiquity/langpacks/packages"]["type"]="text";
$elem["ubiquity/langpacks/packages"]["description"]="Downloading language packs (${TIME} remaining)...
";
$elem["ubiquity/langpacks/packages"]["descriptionde"]="Sprachpakete werden heruntergeladen (${TIME} verbleibend) …
";
$elem["ubiquity/langpacks/packages"]["descriptionfr"]="Téléchargement des paquets linguistiques (${TIME} restant)…
";
$elem["ubiquity/langpacks/packages"]["default"]="";
$elem["pkgsel/language-pack-patterns"]["type"]="text";
$elem["pkgsel/language-pack-patterns"]["description"]="Patterns for language packs to install
 This template may be preseeded to modify the packages that will be
 installed to provide translations for a given language. The selected
 language will be substituted in place of $LL; multiple patterns may be
 given, separated by spaces.
 .
 language-pack-$LL is required, and is always installed (by localechooser).
 You do not need to list it here.

";
$elem["pkgsel/language-pack-patterns"]["descriptionde"]="";
$elem["pkgsel/language-pack-patterns"]["descriptionfr"]="";
$elem["pkgsel/language-pack-patterns"]["default"]="language-pack-gnome-$LL";
$elem["pkgsel/ignore-incomplete-language-support"]["type"]="boolean";
$elem["pkgsel/ignore-incomplete-language-support"]["description"]="for internal use; can be preseeded
 Do not warn the end user if the language packs could not be installed.

";
$elem["pkgsel/ignore-incomplete-language-support"]["descriptionde"]="";
$elem["pkgsel/ignore-incomplete-language-support"]["descriptionfr"]="";
$elem["pkgsel/ignore-incomplete-language-support"]["default"]="false";
$elem["ubiquity/keep-installed"]["type"]="string";
$elem["ubiquity/keep-installed"]["description"]="for internal use; can be preseeded
 Packages listed here will not be removed when installing to the target
 system, even if they are not in the desktop manifest and are not among the
 language packs that are staying installed. Listing packages here that are
 not in the live filesystem has no effect.

";
$elem["ubiquity/keep-installed"]["descriptionde"]="";
$elem["ubiquity/keep-installed"]["descriptionfr"]="";
$elem["ubiquity/keep-installed"]["default"]="";
$elem["ubiquity/only-show-installable-languages"]["type"]="boolean";
$elem["ubiquity/only-show-installable-languages"]["description"]="for internal use; can be preseeded
 If the environment that you are running ubiquity or oem-config in doesn't
 have internet access, then packages that are not currently available in
 the apt cache (or livefs) won't be offered if this key is set true.

";
$elem["ubiquity/only-show-installable-languages"]["descriptionde"]="";
$elem["ubiquity/only-show-installable-languages"]["descriptionfr"]="";
$elem["ubiquity/only-show-installable-languages"]["default"]="false";
$elem["ubiquity/partman-confirm"]["type"]="select";
$elem["ubiquity/partman-confirm"]["choices"][1]="confirm";
$elem["ubiquity/partman-confirm"]["choices"][2]="confirm_nochanges";
$elem["ubiquity/partman-confirm"]["description"]="for internal use; record partman's confirmation question

";
$elem["ubiquity/partman-confirm"]["descriptionde"]="";
$elem["ubiquity/partman-confirm"]["descriptionfr"]="";
$elem["ubiquity/partman-confirm"]["default"]="confirm";
$elem["ubiquity/partman-rebuild-cache"]["type"]="boolean";
$elem["ubiquity/partman-rebuild-cache"]["description"]="for internal use; set when the partman cache needs to be rebuilt

";
$elem["ubiquity/partman-rebuild-cache"]["descriptionde"]="";
$elem["ubiquity/partman-rebuild-cache"]["descriptionfr"]="";
$elem["ubiquity/partman-rebuild-cache"]["default"]="true";
$elem["ubiquity/install_bootloader"]["type"]="boolean";
$elem["ubiquity/install_bootloader"]["description"]="for internal use; determines whether a bootloader will be installed

";
$elem["ubiquity/install_bootloader"]["descriptionde"]="";
$elem["ubiquity/install_bootloader"]["descriptionfr"]="";
$elem["ubiquity/install_bootloader"]["default"]="true";
$elem["ubiquity/partman-skip-unmount"]["type"]="boolean";
$elem["ubiquity/partman-skip-unmount"]["description"]="for internal use; prevent ubiquity from unmounting partitions before committing partition table changes (may cause problems)

";
$elem["ubiquity/partman-skip-unmount"]["descriptionde"]="";
$elem["ubiquity/partman-skip-unmount"]["descriptionfr"]="";
$elem["ubiquity/partman-skip-unmount"]["default"]="false";
$elem["ubiquity/partman-failed-unmount"]["type"]="boolean";
$elem["ubiquity/partman-failed-unmount"]["description"]="Failed to unmount partitions
 The installer needs to commit changes to partition tables, but cannot do so
 because partitions on the following mount points could not be unmounted:
 .
 ${MOUNTED}
 .
 Please close any applications using these mount points.
 .
 Would you like the installer to try to unmount these partitions again?
";
$elem["ubiquity/partman-failed-unmount"]["descriptionde"]="Das Aushängen der Partitionen ist gescheitert
 Das Installationsprogramm muss Änderungen an den Partitionstabellen durchführen, kann dies aber nicht tun, weil Partitionen an den folgenden Einhängepunkten nicht ausgehängt werden konnten:
 .
 ${MOUNTED}
 .
 Bitte schließen Sie alle Anwendungen, die diese Einhängepunkte verwenden.
 .
 Möchten Sie, dass das Installationsprogramm erneut versucht, die Partitionen auszuhängen?
";
$elem["ubiquity/partman-failed-unmount"]["descriptionfr"]="Échec du démontage des partitions
 Le programme d’installation a besoin de modifier les tables de partition, mais c’est impossible car les points de montage suivants ne peuvent être démontés :
 .
 ${MOUNTED}
 .
 Veuillez fermer toutes les applications utilisant ces points de montage.
 .
 Voulez-vous que le programme d’installation essaye à nouveau de démonter ces partitions ?
";
$elem["ubiquity/partman-failed-unmount"]["default"]="true";
$elem["ubiquity/reboot"]["type"]="boolean";
$elem["ubiquity/reboot"]["description"]="for internal use; automatically reboot when the install completes.

";
$elem["ubiquity/reboot"]["descriptionde"]="";
$elem["ubiquity/reboot"]["descriptionfr"]="";
$elem["ubiquity/reboot"]["default"]="false";
$elem["ubiquity/poweroff"]["type"]="boolean";
$elem["ubiquity/poweroff"]["description"]="for internal use; automatically shutdown when the install completes.

";
$elem["ubiquity/poweroff"]["descriptionde"]="";
$elem["ubiquity/poweroff"]["descriptionfr"]="";
$elem["ubiquity/poweroff"]["default"]="false";
$elem["ubiquity/success_command"]["type"]="string";
$elem["ubiquity/success_command"]["description"]="for internal use; specify a command to be run on install success.

";
$elem["ubiquity/success_command"]["descriptionde"]="";
$elem["ubiquity/success_command"]["descriptionfr"]="";
$elem["ubiquity/success_command"]["default"]="";
$elem["ubiquity/automation_failure_command"]["type"]="string";
$elem["ubiquity/automation_failure_command"]["description"]="for internal use; specify a command to be run when user interaction is needed.

";
$elem["ubiquity/automation_failure_command"]["descriptionde"]="";
$elem["ubiquity/automation_failure_command"]["descriptionfr"]="";
$elem["ubiquity/automation_failure_command"]["default"]="";
$elem["ubiquity/failure_command"]["type"]="string";
$elem["ubiquity/failure_command"]["description"]="for internal use; specify a command to be run on unrecoverable install failure.

";
$elem["ubiquity/failure_command"]["descriptionde"]="";
$elem["ubiquity/failure_command"]["descriptionfr"]="";
$elem["ubiquity/failure_command"]["default"]="";
$elem["ubiquity/partition-too-small"]["type"]="boolean";
$elem["ubiquity/partition-too-small"]["description"]="Do you want to return to the partitioner?
 Some of the partitions you created are too small.  Please make the following
 partitions at least this large:
 .
 ${PARTITIONS}
 .
 If you do not go back to the partitioner and increase the size of these
 partitions, the installation may fail.
";
$elem["ubiquity/partition-too-small"]["descriptionde"]="Möchten Sie zum Partitionsmenü zurückkehren?
 Einige der von Ihnen angelegten Partitionen sind zu klein. Bitte vergrößern Sie die folgenden Partitionen mindestens auf diese Größe:
 .
 ${PARTITIONS}
 .
 Wenn Sie nicht zum Partitionsmenü zurückkehren und die Größe dieser Partitionen ändern, könnte die Installation fehlschlagen.
";
$elem["ubiquity/partition-too-small"]["descriptionfr"]="Voulez-vous revenir à l’outil de partitionnement ?
 Certaines des partitions que vous avez créées sont trop petites. Veuillez faire en sorte que les partitions suivantes aient au moins cette taille :
 .
 ${PARTITIONS}
 .
 Si vous ne revenez pas à l’outil de partitionnement pour augmenter la taille de ces partitions, l’installation pourra échouer.
";
$elem["ubiquity/partition-too-small"]["default"]="";
$elem["ubiquity/hide_slideshow"]["type"]="boolean";
$elem["ubiquity/hide_slideshow"]["description"]="for internal use; can be preseeded
 Hide the slideshow while installing.

";
$elem["ubiquity/hide_slideshow"]["descriptionde"]="";
$elem["ubiquity/hide_slideshow"]["descriptionfr"]="";
$elem["ubiquity/hide_slideshow"]["default"]="false";
$elem["ubiquity/text/oem_user_config_title"]["type"]="text";
$elem["ubiquity/text/oem_user_config_title"]["description"]="System Configuration
";
$elem["ubiquity/text/oem_user_config_title"]["descriptionde"]="Systemeinstellungen
";
$elem["ubiquity/text/oem_user_config_title"]["descriptionfr"]="Configuration du système
";
$elem["ubiquity/text/oem_user_config_title"]["default"]="";
$elem["ubiquity/text/language_heading_label"]["type"]="text";
$elem["ubiquity/text/language_heading_label"]["description"]="Welcome
";
$elem["ubiquity/text/language_heading_label"]["descriptionde"]="Willkommen
";
$elem["ubiquity/text/language_heading_label"]["descriptionfr"]="Bienvenue
";
$elem["ubiquity/text/language_heading_label"]["default"]="";
$elem["ubiquity/text/network_heading_label"]["type"]="text";
$elem["ubiquity/text/network_heading_label"]["description"]="Network configuration
";
$elem["ubiquity/text/network_heading_label"]["descriptionde"]="Netzwerkeinstellungen
";
$elem["ubiquity/text/network_heading_label"]["descriptionfr"]="Configuration du réseau
";
$elem["ubiquity/text/network_heading_label"]["default"]="";
$elem["ubiquity/text/tasks_heading_label"]["type"]="text";
$elem["ubiquity/text/tasks_heading_label"]["description"]="Software selection
";
$elem["ubiquity/text/tasks_heading_label"]["descriptionde"]="Software-Auswahl
";
$elem["ubiquity/text/tasks_heading_label"]["descriptionfr"]="Sélection de logiciels
";
$elem["ubiquity/text/tasks_heading_label"]["default"]="";
$elem["ubiquity/text/breadcrumb_language"]["type"]="text";
$elem["ubiquity/text/breadcrumb_language"]["description"]="Language
";
$elem["ubiquity/text/breadcrumb_language"]["descriptionde"]="Sprache
";
$elem["ubiquity/text/breadcrumb_language"]["descriptionfr"]="Langue
";
$elem["ubiquity/text/breadcrumb_language"]["default"]="";
$elem["ubiquity/text/breadcrumb_wireless"]["type"]="text";
$elem["ubiquity/text/breadcrumb_wireless"]["description"]="Wireless
";
$elem["ubiquity/text/breadcrumb_wireless"]["descriptionde"]="Funknetzwerk
";
$elem["ubiquity/text/breadcrumb_wireless"]["descriptionfr"]="Réseau sans fil
";
$elem["ubiquity/text/breadcrumb_wireless"]["default"]="";
$elem["ubiquity/text/breadcrumb_prepare"]["type"]="text";
$elem["ubiquity/text/breadcrumb_prepare"]["description"]="Prepare
";
$elem["ubiquity/text/breadcrumb_prepare"]["descriptionde"]="Vorbereiten
";
$elem["ubiquity/text/breadcrumb_prepare"]["descriptionfr"]="Préparer
";
$elem["ubiquity/text/breadcrumb_prepare"]["default"]="";
$elem["ubiquity/text/breadcrumb_timezone"]["type"]="text";
$elem["ubiquity/text/breadcrumb_timezone"]["description"]="Timezone
";
$elem["ubiquity/text/breadcrumb_timezone"]["descriptionde"]="Zeitzone
";
$elem["ubiquity/text/breadcrumb_timezone"]["descriptionfr"]="Fuseau horaire
";
$elem["ubiquity/text/breadcrumb_timezone"]["default"]="";
$elem["ubiquity/text/breadcrumb_keyboard"]["type"]="text";
$elem["ubiquity/text/breadcrumb_keyboard"]["description"]="Keyboard
";
$elem["ubiquity/text/breadcrumb_keyboard"]["descriptionde"]="Tastatur
";
$elem["ubiquity/text/breadcrumb_keyboard"]["descriptionfr"]="Clavier
";
$elem["ubiquity/text/breadcrumb_keyboard"]["default"]="";
$elem["ubiquity/text/breadcrumb_partition"]["type"]="text";
$elem["ubiquity/text/breadcrumb_partition"]["description"]="Disk Setup
";
$elem["ubiquity/text/breadcrumb_partition"]["descriptionde"]="Einrichtung der Festplatten
";
$elem["ubiquity/text/breadcrumb_partition"]["descriptionfr"]="Configuration du disque
";
$elem["ubiquity/text/breadcrumb_partition"]["default"]="";
$elem["ubiquity/text/breadcrumb_user"]["type"]="text";
$elem["ubiquity/text/breadcrumb_user"]["description"]="User Info
";
$elem["ubiquity/text/breadcrumb_user"]["descriptionde"]="Benutzerinformation
";
$elem["ubiquity/text/breadcrumb_user"]["descriptionfr"]="Informations sur l’utilisateur
";
$elem["ubiquity/text/breadcrumb_user"]["default"]="";
$elem["ubiquity/text/breadcrumb_install"]["type"]="text";
$elem["ubiquity/text/breadcrumb_install"]["description"]="Install
";
$elem["ubiquity/text/breadcrumb_install"]["descriptionde"]="Installation
";
$elem["ubiquity/text/breadcrumb_install"]["descriptionfr"]="Installation
";
$elem["ubiquity/text/breadcrumb_install"]["default"]="";
$elem["ubiquity/text/install_process_label"]["type"]="text";
$elem["ubiquity/text/install_process_label"]["description"]="installation process
";
$elem["ubiquity/text/install_process_label"]["descriptionde"]="Installationsvorgang
";
$elem["ubiquity/text/install_process_label"]["descriptionfr"]="processus d’installation
";
$elem["ubiquity/text/install_process_label"]["default"]="";
$elem["ubiquity/install/success_command"]["type"]="text";
$elem["ubiquity/install/success_command"]["description"]="Reticulating splines...

";
$elem["ubiquity/install/success_command"]["descriptionde"]="";
$elem["ubiquity/install/success_command"]["descriptionfr"]="";
$elem["ubiquity/install/success_command"]["default"]="";
$elem["ubiquity/text/checking_for_installer_updates"]["type"]="text";
$elem["ubiquity/text/checking_for_installer_updates"]["description"]="Checking for installer updates
";
$elem["ubiquity/text/checking_for_installer_updates"]["descriptionde"]="Aktualisierungen für das Installationsprogramm werden gesucht
";
$elem["ubiquity/text/checking_for_installer_updates"]["descriptionfr"]="Recherche de mises à jour pour l’installateur
";
$elem["ubiquity/text/checking_for_installer_updates"]["default"]="";
$elem["ubiquity/text/reading_package_information"]["type"]="text";
$elem["ubiquity/text/reading_package_information"]["description"]="Reading package information
";
$elem["ubiquity/text/reading_package_information"]["descriptionde"]="Paketinformationen werden gelesen
";
$elem["ubiquity/text/reading_package_information"]["descriptionfr"]="Lecture des informations du paquet
";
$elem["ubiquity/text/reading_package_information"]["default"]="";
$elem["ubiquity/text/updating_package_information"]["type"]="text";
$elem["ubiquity/text/updating_package_information"]["description"]="Updating package information
";
$elem["ubiquity/text/updating_package_information"]["descriptionde"]="Paketinformationen werden aktualisiert
";
$elem["ubiquity/text/updating_package_information"]["descriptionfr"]="Mise à jour des informations du paquet
";
$elem["ubiquity/text/updating_package_information"]["default"]="";
$elem["ubiquity/text/apt_progress_cps"]["type"]="text";
$elem["ubiquity/text/apt_progress_cps"]["description"]="File ${INDEX} of ${TOTAL} at ${SPEED}/s
";
$elem["ubiquity/text/apt_progress_cps"]["descriptionde"]="Datei ${INDEX} von ${TOTAL} mit ${SPEED}/s
";
$elem["ubiquity/text/apt_progress_cps"]["descriptionfr"]="Fichier  ${INDEX} sur  ${TOTAL} à ${SPEED}/s
";
$elem["ubiquity/text/apt_progress_cps"]["default"]="";
$elem["ubiquity/text/apt_progress"]["type"]="text";
$elem["ubiquity/text/apt_progress"]["description"]="File ${INDEX} of ${TOTAL}
";
$elem["ubiquity/text/apt_progress"]["descriptionde"]="Datei ${INDEX} von ${TOTAL}
";
$elem["ubiquity/text/apt_progress"]["descriptionfr"]="Fichier  ${INDEX} sur  ${TOTAL}
";
$elem["ubiquity/text/apt_progress"]["default"]="";
$elem["ubiquity/text/installing_update"]["type"]="text";
$elem["ubiquity/text/installing_update"]["description"]="Installing update
";
$elem["ubiquity/text/installing_update"]["descriptionde"]="Aktualisierung wird installiert
";
$elem["ubiquity/text/installing_update"]["descriptionfr"]="Installation de la mise à jour
";
$elem["ubiquity/text/installing_update"]["default"]="";
$elem["ubiquity/text/error_updating_installer"]["type"]="text";
$elem["ubiquity/text/error_updating_installer"]["description"]="Error updating installer
 The installer encountered an error while trying to update itself:
 .
 ${ERROR}
";
$elem["ubiquity/text/error_updating_installer"]["descriptionde"]="Fehler beim Aktualisieren des Installationsprogramms
 Bei der Aktualisierung des Installationsprogramms selbst ist ein Fehler aufgetreten:
 .
 ${ERROR}
";
$elem["ubiquity/text/error_updating_installer"]["descriptionfr"]="Erreur lors de la mise à jour de l’installateur
 L’installateur a rencontré une erreur durant sa mise à jour :
 .
 ${ERROR}
";
$elem["ubiquity/text/error_updating_installer"]["default"]="";
$elem["ubiquity/text/USB"]["type"]="text";
$elem["ubiquity/text/USB"]["description"]="USB disk
";
$elem["ubiquity/text/USB"]["descriptionde"]="USB-Medium
";
$elem["ubiquity/text/USB"]["descriptionfr"]="disque USB
";
$elem["ubiquity/text/USB"]["default"]="";
$elem["ubiquity/text/CD"]["type"]="text";
$elem["ubiquity/text/CD"]["description"]="CD
";
$elem["ubiquity/text/CD"]["descriptionde"]="CD
";
$elem["ubiquity/text/CD"]["descriptionfr"]="CD
";
$elem["ubiquity/text/CD"]["default"]="";
$elem["ubiquity/text/select_language_label"]["type"]="text";
$elem["ubiquity/text/select_language_label"]["description"]="Description:
 Please choose the language to use for the install process. This
 language will be the default language for this computer.
";
$elem["ubiquity/text/select_language_label"]["descriptionde"]="Description-de.UTF-8:
 Bitte wählen Sie die Sprache, die Sie für die Installation verwenden möchten. Diese Sprache wird zur Vorgabe auf diesem Rechner.
";
$elem["ubiquity/text/select_language_label"]["descriptionfr"]="Description-fr.UTF-8:
 Veuillez choisir la langue à utiliser lors de l’installation. Cette langue sera également la langue par défaut de cet ordinateur.
";
$elem["ubiquity/text/select_language_label"]["default"]="";
$elem["ubiquity/text/select_language_oem_user_label"]["type"]="text";
$elem["ubiquity/text/select_language_oem_user_label"]["description"]="Description:
 Please choose the language used for the configuration process. This
 language will be the default language for this computer.
";
$elem["ubiquity/text/select_language_oem_user_label"]["descriptionde"]="Description-de.UTF-8:
 Bitte wählen Sie die Sprache für den Konfigurationsvorgang. Diese Sprache wird zur Vorgabe auf diesem Rechner.
";
$elem["ubiquity/text/select_language_oem_user_label"]["descriptionfr"]="Description-fr.UTF-8:
 Veuillez choisir la langue utilisée pendant le processus de configuration. Ce choix déterminera la langue par défaut pour cet ordinateur.
";
$elem["ubiquity/text/select_language_oem_user_label"]["default"]="";
$elem["ubiquity/install_failed"]["type"]="text";
$elem["ubiquity/install_failed"]["description"]="Installation failed
 The installer encountered an unrecoverable error.  A desktop session will
 now be run so that you may investigate the problem or try installing again.
";
$elem["ubiquity/install_failed"]["descriptionde"]="Die Installation ist gescheitert
 Bei der Installation ist ein nicht behebbarer Fehler aufgetreten. Es wird nun eine Sitzung in der Arbeitsumgebung gestartet, sodass Sie das Problem untersuchen oder eine erneute Installation versuchen können.
";
$elem["ubiquity/install_failed"]["descriptionfr"]="L’installation a échoué
 Le programme d’installation a rencontré une erreur irrécupérable. Une session graphique va maintenant être lancée afin que vous puissiez étudier le problème ou réessayer l’installation.
";
$elem["ubiquity/install_failed"]["default"]="";
$elem["ubiquity/install_failed_reboot"]["type"]="text";
$elem["ubiquity/install_failed_reboot"]["description"]="Installation failed
 The installer encountered an unrecoverable error and will now reboot.
";
$elem["ubiquity/install_failed_reboot"]["descriptionde"]="Die Installation ist gescheitert
 Bei der Installation ist ein nicht behebbarer Fehler aufgetreten. Der Rechner wird nun neu gestartet.
";
$elem["ubiquity/install_failed_reboot"]["descriptionfr"]="L’installation a échoué
 Le programme d’installation a rencontré une erreur irrécupérable et va maintenant redémarrer.
";
$elem["ubiquity/install_failed_reboot"]["default"]="";
$elem["ubiquity/reboot_on_failure"]["type"]="boolean";
$elem["ubiquity/reboot_on_failure"]["description"]="for internal use; automatically reboot when the install fails.

";
$elem["ubiquity/reboot_on_failure"]["descriptionde"]="";
$elem["ubiquity/reboot_on_failure"]["descriptionfr"]="";
$elem["ubiquity/reboot_on_failure"]["default"]="true";
$elem["ubiquity/text/prepare_heading_label"]["type"]="text";
$elem["ubiquity/text/prepare_heading_label"]["description"]="Preparing to install ${RELEASE}
";
$elem["ubiquity/text/prepare_heading_label"]["descriptionde"]="Installation von ${RELEASE} wird vorbereitet
";
$elem["ubiquity/text/prepare_heading_label"]["descriptionfr"]="Préparation de l’installation d’${RELEASE}
";
$elem["ubiquity/text/prepare_heading_label"]["default"]="";
$elem["ubiquity/text/wireless_heading_label"]["type"]="text";
$elem["ubiquity/text/wireless_heading_label"]["description"]="Wireless
";
$elem["ubiquity/text/wireless_heading_label"]["descriptionde"]="Funknetzwerk
";
$elem["ubiquity/text/wireless_heading_label"]["descriptionfr"]="Réseau sans fil
";
$elem["ubiquity/text/wireless_heading_label"]["default"]="";
$elem["ubiquity/text/wireless_section_label"]["type"]="text";
$elem["ubiquity/text/wireless_section_label"]["description"]="Description:
 Connecting this computer to a wi-fi network allows you to install
 third-party software, download updates, automatically detect your timezone,
 and install full support for your language.
";
$elem["ubiquity/text/wireless_section_label"]["descriptionde"]="Description-de.UTF-8:
 Das Verbinden dieses Rechners mit einem Funknetzwerk erlaubt es Ihnen, Anwendungen von Drittanbietern zu installieren, Aktualisierungen herunterzuladen, Ihre Zeitzone automatisch zu ermitteln und eine vollständige Sprachunterstützung zu installieren.
";
$elem["ubiquity/text/wireless_section_label"]["descriptionfr"]="Description-fr.UTF-8:
 La connexion de cet ordinateur à un réseau Wi-Fi vous permet d’installer des logiciels tiers, de télécharger des mises à jour, de détecter automatiquement votre fuseau horaire, et d’installer la prise en charge complète pour votre langue.
";
$elem["ubiquity/text/wireless_section_label"]["default"]="";
$elem["ubiquity/text/wireless_password_label"]["type"]="text";
$elem["ubiquity/text/wireless_password_label"]["description"]="Password:
";
$elem["ubiquity/text/wireless_password_label"]["descriptionde"]="Kennwort:
";
$elem["ubiquity/text/wireless_password_label"]["descriptionfr"]="Mot de passe :
";
$elem["ubiquity/text/wireless_password_label"]["default"]="";
$elem["ubiquity/text/wireless_display_password"]["type"]="text";
$elem["ubiquity/text/wireless_display_password"]["description"]="Display password
";
$elem["ubiquity/text/wireless_display_password"]["descriptionde"]="Kennwort anzeigen
";
$elem["ubiquity/text/wireless_display_password"]["descriptionfr"]="Afficher le mot de passe
";
$elem["ubiquity/text/wireless_display_password"]["default"]="";
$elem["ubiquity/text/no_wireless"]["type"]="text";
$elem["ubiquity/text/no_wireless"]["description"]="Description:
 I don't want to connect to a wi-fi network right now
";
$elem["ubiquity/text/no_wireless"]["descriptionde"]="Description-de.UTF-8:
 Ich möchte mich jetzt nicht mit einem Funknetzwerk verbinden
";
$elem["ubiquity/text/no_wireless"]["descriptionfr"]="Description-fr.UTF-8:
 Je ne souhaite pas me connecter à un réseau Wi-Fi pour le moment
";
$elem["ubiquity/text/no_wireless"]["default"]="";
$elem["ubiquity/text/use_wireless"]["type"]="text";
$elem["ubiquity/text/use_wireless"]["description"]="Connect to this network
";
$elem["ubiquity/text/use_wireless"]["descriptionde"]="Mit diesem Netzwerk verbinden
";
$elem["ubiquity/text/use_wireless"]["descriptionfr"]="Se connecter à ce réseau
";
$elem["ubiquity/text/use_wireless"]["default"]="";
$elem["ubiquity/use_nonfree"]["type"]="boolean";
$elem["ubiquity/use_nonfree"]["description"]="for internal use; use non-free software.

";
$elem["ubiquity/use_nonfree"]["descriptionde"]="";
$elem["ubiquity/use_nonfree"]["descriptionfr"]="";
$elem["ubiquity/use_nonfree"]["default"]="false";
$elem["ubiquity/nonfree_package"]["type"]="text";
$elem["ubiquity/nonfree_package"]["description"]="for internal use; can be preseeded
 The package(s) that will be installed when the proprietary extras checkbox
 is selected.

";
$elem["ubiquity/nonfree_package"]["descriptionde"]="";
$elem["ubiquity/nonfree_package"]["descriptionfr"]="";
$elem["ubiquity/nonfree_package"]["default"]="ubuntu-restricted-addons";
$elem["ubiquity/download_updates"]["type"]="boolean";
$elem["ubiquity/download_updates"]["description"]="for internal use; download updates while installing.

";
$elem["ubiquity/download_updates"]["descriptionde"]="";
$elem["ubiquity/download_updates"]["descriptionfr"]="";
$elem["ubiquity/download_updates"]["default"]="false";
$elem["ubiquity/text/part_auto_select_drive_label"]["type"]="text";
$elem["ubiquity/text/part_auto_select_drive_label"]["description"]="Select drive:
";
$elem["ubiquity/text/part_auto_select_drive_label"]["descriptionde"]="Laufwerk wählen:
";
$elem["ubiquity/text/part_auto_select_drive_label"]["descriptionfr"]="Sélectionnez le disque :
";
$elem["ubiquity/text/part_auto_select_drive_label"]["default"]="";
$elem["ubiquity/text/part_auto_allocate_label"]["type"]="text";
$elem["ubiquity/text/part_auto_allocate_label"]["description"]="Allocate drive space by dragging the divider below:
";
$elem["ubiquity/text/part_auto_allocate_label"]["descriptionde"]="Weisen Sie Festplattenspeicher zu, indem Sie die unten stehende Aufteilungsmarkierung verschieben
";
$elem["ubiquity/text/part_auto_allocate_label"]["descriptionfr"]="Allouez de l’espace disque en déplaçant le séparateur ci-dessous :
";
$elem["ubiquity/text/part_auto_allocate_label"]["default"]="";
$elem["ubiquity/text/part_auto_allocate_entire_label"]["type"]="text";
$elem["ubiquity/text/part_auto_allocate_entire_label"]["description"]="The entire disk will be used:
";
$elem["ubiquity/text/part_auto_allocate_entire_label"]["descriptionde"]="Die gesamte Festplatte wird verwendet:
";
$elem["ubiquity/text/part_auto_allocate_entire_label"]["descriptionfr"]="La totalité du disque sera utilisée :
";
$elem["ubiquity/text/part_auto_allocate_entire_label"]["default"]="";
$elem["ubiquity/text/part_auto_hidden_label"]["type"]="text";
$elem["ubiquity/text/part_auto_hidden_label"]["description"]="Description:
 <small>%d smaller partitions are hidden, use the <a href=\"\">advanced
 partitioning tool</a> for more control</small>
";
$elem["ubiquity/text/part_auto_hidden_label"]["descriptionde"]="Description-de.UTF-8:
 <small>%d kleinere Partitionen werden versteckt, verwenden Sie das <a href=\"\">erweiterte Partitionierungswerkzeug</a> für weitere Optionen</small>
";
$elem["ubiquity/text/part_auto_hidden_label"]["descriptionfr"]="Description-fr.UTF-8:
 <small>%d partitions plus petites sont masquées, utilisez <a href=\"\">l’outil de partitionnement avancé</a>  pour plus de contrôle</small>
";
$elem["ubiquity/text/part_auto_hidden_label"]["default"]="";
$elem["ubiquity/text/part_auto_hidden_label_one"]["type"]="text";
$elem["ubiquity/text/part_auto_hidden_label_one"]["description"]="Description:
 <small>1 smaller partition is hidden, use the <a href=\"\">advanced
 partitioning tool</a> for more control</small>
";
$elem["ubiquity/text/part_auto_hidden_label_one"]["descriptionde"]="Description-de.UTF-8:
 <small>1 kleinere Partition wird versteckt, verwenden Sie das <a href=\"\">erweiterte Partitionierungswerkzeug</a> für weitere Optionen</small>
";
$elem["ubiquity/text/part_auto_hidden_label_one"]["descriptionfr"]="Description-fr.UTF-8:
 <small>Une plus petite partition est masquée, utilisez <a href=\"\">l’outil de partitionnement avancé</a>  pour plus de contrôle</small>
";
$elem["ubiquity/text/part_auto_hidden_label_one"]["default"]="";
$elem["ubiquity/text/part_auto_deleted_label"]["type"]="text";
$elem["ubiquity/text/part_auto_deleted_label"]["description"]="Description:
 %d partitions will be deleted, use the <a href=\"\">advanced
 partitioning tool</a> for more control
";
$elem["ubiquity/text/part_auto_deleted_label"]["descriptionde"]="Description-de.UTF-8:
 %d Partitionen werden gelöscht. Verwenden Sie das <a href=\"\">erweiterte Partitionierungswerkzeug</a> für weitere Einstellungsmöglichkeiten
";
$elem["ubiquity/text/part_auto_deleted_label"]["descriptionfr"]="Description-fr.UTF-8:
 %d partitions seront supprimées. Utilisez <a href=\"\">l’outil de partitionnement avancé</a> pour plus d’options
";
$elem["ubiquity/text/part_auto_deleted_label"]["default"]="";
$elem["ubiquity/text/part_auto_deleted_label_one"]["type"]="text";
$elem["ubiquity/text/part_auto_deleted_label_one"]["description"]="Description:
 1 partition will be deleted, use the <a href=\"\">advanced
 partitioning tool</a> for more control
";
$elem["ubiquity/text/part_auto_deleted_label_one"]["descriptionde"]="Description-de.UTF-8:
 1 Partition wird gelöscht. Verwenden Sie das <a href=\"\">erweiterte Partitionierungswerkzeug</a> für weitere Einstellungsmöglichkeiten
";
$elem["ubiquity/text/part_auto_deleted_label_one"]["descriptionfr"]="Description-fr.UTF-8:
 Une partition sera supprimée. Utilisez <a href=\"\">l’outil de partitionnement avancé</a> pour plus d’options
";
$elem["ubiquity/text/part_auto_deleted_label_one"]["default"]="";
$elem["ubiquity/text/part_auto_split_largest_partition"]["type"]="text";
$elem["ubiquity/text/part_auto_split_largest_partition"]["description"]="Split Largest Partition
";
$elem["ubiquity/text/part_auto_split_largest_partition"]["descriptionde"]="Die größte Partition aufteilen
";
$elem["ubiquity/text/part_auto_split_largest_partition"]["descriptionfr"]="Scinder la plus grande partition
";
$elem["ubiquity/text/part_auto_split_largest_partition"]["default"]="";
$elem["ubiquity/online"]["type"]="boolean";
$elem["ubiquity/online"]["description"]="for internal use

";
$elem["ubiquity/online"]["descriptionde"]="";
$elem["ubiquity/online"]["descriptionfr"]="";
$elem["ubiquity/online"]["default"]="";
$elem["ubiquity/text/prepare_best_results"]["type"]="text";
$elem["ubiquity/text/prepare_best_results"]["description"]="For best results, please ensure that this computer:
";
$elem["ubiquity/text/prepare_best_results"]["descriptionde"]="Für eine optimale Installation sollten Sie sicherstellen, dass Ihr Rechner:
";
$elem["ubiquity/text/prepare_best_results"]["descriptionfr"]="Pour de meilleurs résultats, veuillez vous assurer que cet ordinateur :
";
$elem["ubiquity/text/prepare_best_results"]["default"]="";
$elem["ubiquity/text/sorry"]["type"]="text";
$elem["ubiquity/text/sorry"]["description"]="Description:
 Sorry

";
$elem["ubiquity/text/sorry"]["descriptionde"]="";
$elem["ubiquity/text/sorry"]["descriptionfr"]="";
$elem["ubiquity/text/sorry"]["default"]="";
$elem["ubiquity/text/required_space"]["type"]="text";
$elem["ubiquity/text/required_space"]["description"]="You need at least ${SIZE} disk space to install ${RELEASE}.

";
$elem["ubiquity/text/required_space"]["descriptionde"]="";
$elem["ubiquity/text/required_space"]["descriptionfr"]="";
$elem["ubiquity/text/required_space"]["default"]="";
$elem["ubiquity/text/free_space"]["type"]="text";
$elem["ubiquity/text/free_space"]["description"]="This computer has only ${SIZE}.

";
$elem["ubiquity/text/free_space"]["descriptionde"]="";
$elem["ubiquity/text/free_space"]["descriptionfr"]="";
$elem["ubiquity/text/free_space"]["default"]="";
$elem["ubiquity/text/prepare_power_source"]["type"]="text";
$elem["ubiquity/text/prepare_power_source"]["description"]="is plugged in to a power source
";
$elem["ubiquity/text/prepare_power_source"]["descriptionde"]="an die Steckdose angeschlossen ist
";
$elem["ubiquity/text/prepare_power_source"]["descriptionfr"]="est relié au secteur
";
$elem["ubiquity/text/prepare_power_source"]["default"]="";
$elem["ubiquity/text/prepare_network_connection"]["type"]="text";
$elem["ubiquity/text/prepare_network_connection"]["description"]="is connected to the Internet
";
$elem["ubiquity/text/prepare_network_connection"]["descriptionde"]="mit dem Internet verbunden ist
";
$elem["ubiquity/text/prepare_network_connection"]["descriptionfr"]="est connecté à l’Internet
";
$elem["ubiquity/text/prepare_network_connection"]["default"]="";
$elem["ubiquity/text/prepare_foss_disclaimer"]["type"]="text";
$elem["ubiquity/text/prepare_foss_disclaimer"]["description"]="Description:
 This software is subject to license terms included with its documentation. Some is proprietary. 

";
$elem["ubiquity/text/prepare_foss_disclaimer"]["descriptionde"]="";
$elem["ubiquity/text/prepare_foss_disclaimer"]["descriptionfr"]="";
$elem["ubiquity/text/prepare_foss_disclaimer"]["default"]="";
$elem["ubiquity/text/prepare_foss_disclaimer_extra_label"]["type"]="text";
$elem["ubiquity/text/prepare_foss_disclaimer_extra_label"]["description"]="Description:
 Fluendo MP3 plugin includes MPEG Layer-3 audio decoding technology licensed
 from Fraunhofer IIS and Technicolor SA.
";
$elem["ubiquity/text/prepare_foss_disclaimer_extra_label"]["descriptionde"]="Description-de.UTF-8:
 Die MP3-Erweiterung von Fluendo enthält »MPEG Layer-3«-Audio-Dekodierungstechnologien, die vom Fraunhofer IIS und von Technicolor SA lizenziert sind.
";
$elem["ubiquity/text/prepare_foss_disclaimer_extra_label"]["descriptionfr"]="Description-fr.UTF-8:
 Le greffon Fluendo MP3 intègre la technologie de décodage audio MPEG Layer-3 sous licence de Fraunhofer IIS et de Technicolor SA.
";
$elem["ubiquity/text/prepare_foss_disclaimer_extra_label"]["default"]="";
$elem["ubiquity/text/prepare_nonfree_software"]["type"]="text";
$elem["ubiquity/text/prepare_nonfree_software"]["description"]="Description:
 Install third-party software for graphics and Wi-Fi hardware, Flash, MP3 and other media

";
$elem["ubiquity/text/prepare_nonfree_software"]["descriptionde"]="";
$elem["ubiquity/text/prepare_nonfree_software"]["descriptionfr"]="";
$elem["ubiquity/text/prepare_nonfree_software"]["default"]="";
$elem["ubiquity/text/prepare_download_updates"]["type"]="text";
$elem["ubiquity/text/prepare_download_updates"]["description"]="Description:
 Download updates while installing ${RELEASE}

";
$elem["ubiquity/text/prepare_download_updates"]["descriptionde"]="";
$elem["ubiquity/text/prepare_download_updates"]["descriptionfr"]="";
$elem["ubiquity/text/prepare_download_updates"]["default"]="";
$elem["ubiquity/text/label_download_updates"]["type"]="text";
$elem["ubiquity/text/label_download_updates"]["description"]="Description:
 This saves time after installation.

";
$elem["ubiquity/text/label_download_updates"]["descriptionde"]="";
$elem["ubiquity/text/label_download_updates"]["descriptionfr"]="";
$elem["ubiquity/text/label_download_updates"]["default"]="";
$elem["ubiquity/text/label_download_updates_na"]["type"]="text";
$elem["ubiquity/text/label_download_updates_na"]["description"]="Description:
 Not available because there is no Internet connection.

";
$elem["ubiquity/text/label_download_updates_na"]["descriptionde"]="";
$elem["ubiquity/text/label_download_updates_na"]["descriptionfr"]="";
$elem["ubiquity/text/label_download_updates_na"]["default"]="";
$elem["ubiquity/text/secureboot_label"]["type"]="text";
$elem["ubiquity/text/secureboot_label"]["description"]="Description:
 Installing third-party drivers requires turning off Secure Boot. To do this, you need to choose a security key now, and enter it when the system restarts.

";
$elem["ubiquity/text/secureboot_label"]["descriptionde"]="";
$elem["ubiquity/text/secureboot_label"]["descriptionfr"]="";
$elem["ubiquity/text/secureboot_label"]["default"]="";
$elem["ubiquity/force_failsafe_graphics"]["type"]="boolean";
$elem["ubiquity/force_failsafe_graphics"]["description"]="for internal use; forces the installation to use vesa or fbdev.

";
$elem["ubiquity/force_failsafe_graphics"]["descriptionde"]="";
$elem["ubiquity/force_failsafe_graphics"]["descriptionfr"]="";
$elem["ubiquity/force_failsafe_graphics"]["default"]="false";
$elem["ubiquity/custom_title_text"]["type"]="string";
$elem["ubiquity/custom_title_text"]["description"]="for internal use; sets a custom title on installation windows.


";
$elem["ubiquity/custom_title_text"]["descriptionde"]="";
$elem["ubiquity/custom_title_text"]["descriptionfr"]="";
$elem["ubiquity/custom_title_text"]["default"]="";
$elem["ubiquity/text/keyboard_layout_label"]["type"]="text";
$elem["ubiquity/text/keyboard_layout_label"]["description"]="Layout:
";
$elem["ubiquity/text/keyboard_layout_label"]["descriptionde"]="Tastaturbelegung:
";
$elem["ubiquity/text/keyboard_layout_label"]["descriptionfr"]="Disposition :
";
$elem["ubiquity/text/keyboard_layout_label"]["default"]="";
$elem["ubiquity/text/keyboard_variant_label"]["type"]="text";
$elem["ubiquity/text/keyboard_variant_label"]["description"]="Variant:
";
$elem["ubiquity/text/keyboard_variant_label"]["descriptionde"]="Variante:
";
$elem["ubiquity/text/keyboard_variant_label"]["descriptionfr"]="Variante :
";
$elem["ubiquity/text/keyboard_variant_label"]["default"]="";
$elem["ubiquity/text/keyboard_image_label"]["type"]="text";
$elem["ubiquity/text/keyboard_image_label"]["description"]="Below is an image of your current layout:
";
$elem["ubiquity/text/keyboard_image_label"]["descriptionde"]="Unten sehen Sie ein Bild der aktuellen Tastaturbelegung:
";
$elem["ubiquity/text/keyboard_image_label"]["descriptionfr"]="Ci-dessous, un aperçu de la disposition actuelle :
";
$elem["ubiquity/text/keyboard_image_label"]["default"]="";
$elem["ubiquity/text/timezone_comment_label"]["type"]="text";
$elem["ubiquity/text/timezone_comment_label"]["description"]="Description:
 Select your location, so that the system can use appropriate display
 conventions for your country, fetch updates from sites close to you,
 and set the clock to the correct local time.
";
$elem["ubiquity/text/timezone_comment_label"]["descriptionde"]="Description-de.UTF-8:
 Wählen Sie Ihren Standort, so dass das System die passenden Darstellungskonventionen für Ihr Land verwenden, Aktualisierungen von einem in der Nähe befindlichen Server holen und die Uhr korrekt einstellen kann.
";
$elem["ubiquity/text/timezone_comment_label"]["descriptionfr"]="Description-fr.UTF-8:
 Choisissez votre emplacement géographique afin que le système utilise les conventions d'affichage adéquates pour votre pays, récupère les mises à jour sur les miroirs locaux et règle correctement l'horloge sur l'heure locale.
";
$elem["ubiquity/text/timezone_comment_label"]["default"]="";
$elem["ubiquity/text/timezone_city_label"]["type"]="text";
$elem["ubiquity/text/timezone_city_label"]["description"]="Time Zone:
";
$elem["ubiquity/text/timezone_city_label"]["descriptionde"]="Zeitzone:
";
$elem["ubiquity/text/timezone_city_label"]["descriptionfr"]="Fuseau horaire :
";
$elem["ubiquity/text/timezone_city_label"]["default"]="";
$elem["ubiquity/text/timezone_zone_label"]["type"]="text";
$elem["ubiquity/text/timezone_zone_label"]["description"]="Region:
";
$elem["ubiquity/text/timezone_zone_label"]["descriptionde"]="Region:
";
$elem["ubiquity/text/timezone_zone_label"]["descriptionfr"]="Région :
";
$elem["ubiquity/text/timezone_zone_label"]["default"]="";
$elem["ubiquity/text/timezone_city_entry_inactive_label"]["type"]="text";
$elem["ubiquity/text/timezone_city_entry_inactive_label"]["description"]="[type here to change]
";
$elem["ubiquity/text/timezone_city_entry_inactive_label"]["descriptionde"]="[für Änderung hier eingeben]
";
$elem["ubiquity/text/timezone_city_entry_inactive_label"]["descriptionfr"]="[tapez ici pour le changer]
";
$elem["ubiquity/text/timezone_city_entry_inactive_label"]["default"]="";
$elem["ubiquity/text/welcome_heading_label"]["type"]="text";
$elem["ubiquity/text/welcome_heading_label"]["description"]="Welcome
";
$elem["ubiquity/text/welcome_heading_label"]["descriptionde"]="Willkommen
";
$elem["ubiquity/text/welcome_heading_label"]["descriptionfr"]="Bienvenue
";
$elem["ubiquity/text/welcome_heading_label"]["default"]="";
$elem["ubiquity/partitioner/single_os_replace"]["type"]="text";
$elem["ubiquity/partitioner/single_os_replace"]["description"]="Replace ${OS} with ${DISTRO}
 <span foreground=\"darkred\">Warning:</span> This will delete all of your ${OS}
 programs, documents, photos, music, and any other files.
";
$elem["ubiquity/partitioner/single_os_replace"]["descriptionde"]="${OS} mit ${DISTRO} ersetzen
 <span foreground=\"darkred\">Warnung:</span> Dies wird alle Ihre Anwendungen, Dokumente, Fotos, Musik und alle anderen Dateien von ${OS} löschen.
";
$elem["ubiquity/partitioner/single_os_replace"]["descriptionfr"]="Remplacer ${OS} par ${DISTRO}
 <span foreground=\"darkred\">Avertissement ]:</span> Ceci supprimera tous vos programmes, documents, photos, musique et tout autre fichier ${OS}.
";
$elem["ubiquity/partitioner/single_os_replace"]["default"]="";
$elem["ubiquity/partitioner/single_os_resize"]["type"]="text";
$elem["ubiquity/partitioner/single_os_resize"]["description"]="Install ${DISTRO} alongside ${OS}
 Documents, music, and other personal files will be kept. You can choose which
 operating system you want each time the computer starts up.
";
$elem["ubiquity/partitioner/single_os_resize"]["descriptionde"]="${DISTRO} neben ${OS} installieren
 Dokumente, Musik und andere persönliche Dateien bleiben bestehen. Sie können bei jedem Start des Rechners auswählen, welches Betriebssystem Sie benutzen möchten.
";
$elem["ubiquity/partitioner/single_os_resize"]["descriptionfr"]="Installer ${DISTRO} à côté de ${OS}
 Les documents, musiques et autres fichiers personnels seront conservés. Vous pouvez choisir le système d’exploitation à lancer au moment du démarrage de l’ordinateur.
";
$elem["ubiquity/partitioner/single_os_resize"]["default"]="";
$elem["ubiquity/partitioner/ubuntu_inside"]["type"]="text";
$elem["ubiquity/partitioner/ubuntu_inside"]["description"]="Install ${DISTRO} inside ${OS}
 Documents, music, and other personal files will be kept. You can choose which
 operating system you want each time the computer starts up.
";
$elem["ubiquity/partitioner/ubuntu_inside"]["descriptionde"]="${DISTRO} innerhalb von ${OS} installieren
 Dokumente, Musik und andere persönliche Dateien bleiben bestehen. Sie können bei jedem Start des Rechners auswählen, welches Betriebssystem Sie benutzen möchten.
";
$elem["ubiquity/partitioner/ubuntu_inside"]["descriptionfr"]="Installer ${DISTRO} dans ${OS}
 Les documents, musiques et autres fichiers personnels seront conservés. Vous pouvez choisir le système d’exploitation à lancer au moment du démarrage de l’ordinateur.
";
$elem["ubiquity/partitioner/ubuntu_inside"]["default"]="";
$elem["ubiquity/partitioner/advanced"]["type"]="text";
$elem["ubiquity/partitioner/advanced"]["description"]="Something else
 You can create or resize partitions yourself, or choose multiple partitions
 for ${DISTRO}.
";
$elem["ubiquity/partitioner/advanced"]["descriptionde"]="Etwas Anderes
 Sie können selbst Partitionen anlegen, deren Größe ändern oder mehrere Partitionen für ${DISTRO} auswählen.
";
$elem["ubiquity/partitioner/advanced"]["descriptionfr"]="Autre chose
 Vous pouvez créer ou redimensionner les partitions vous-même, ou choisir plusieurs partitions pour ${DISTRO}.
";
$elem["ubiquity/partitioner/advanced"]["default"]="";
$elem["ubiquity/partitioner/ubuntu_format"]["type"]="text";
$elem["ubiquity/partitioner/ubuntu_format"]["description"]="Erase ${CURDISTRO} and reinstall
 <span foreground=\"darkred\">Warning:</span> This will delete all your
 ${CURDISTRO} programs, documents, photos, music, and any other files.
";
$elem["ubiquity/partitioner/ubuntu_format"]["descriptionde"]="${CURDISTRO} löschen und neu installieren
 <span foreground=\"darkred\">Warnung:</span> Dies wird alle Ihre Anwendungen, Dokumente, Fotos, Musik sowie alle anderen Dateien von ${CURDISTRO} unwiderruflich löschen.
";
$elem["ubiquity/partitioner/ubuntu_format"]["descriptionfr"]="Supprimer ${CURDISTRO} et réinstaller
 <span foreground=\"darkred\">Avertissement :</span> Ceci supprimera tous vos programmes, documents, photos, musique et tout autre fichier ${CURDISTRO}.
";
$elem["ubiquity/partitioner/ubuntu_format"]["default"]="";
$elem["ubiquity/partitioner/ubuntu_upgrade"]["type"]="text";
$elem["ubiquity/partitioner/ubuntu_upgrade"]["description"]="Upgrade ${CURDISTRO} to ${VER}
 Documents, music, and other personal files will be kept. Installed software
 will be kept where possible. System-wide settings will be cleared.
";
$elem["ubiquity/partitioner/ubuntu_upgrade"]["descriptionde"]="${CURDISTRO} auf die Version ${VER} aktualisieren
 Dokumente, Musik und andere persönliche Dateien bleiben bestehen. Installierte Anwendungen bleiben – sofern dies möglich ist – ebenfalls bestehen. System-weite Einstellungen werden zurückgesetzt.
";
$elem["ubiquity/partitioner/ubuntu_upgrade"]["descriptionfr"]="Mettre ${CURDISTRO} à niveau vers ${VER}
 Les documents, musiques et autres fichiers personnels seront conservés. Les logiciels installés seront conservés dans la mesure du possible. Les réglages effectués au niveau du système seront perdus.
";
$elem["ubiquity/partitioner/ubuntu_upgrade"]["default"]="";
$elem["ubiquity/partitioner/ubuntu_resize"]["type"]="text";
$elem["ubiquity/partitioner/ubuntu_resize"]["description"]="Install ${DISTRO} ${VER} alongside ${CURDISTRO}
 Documents, music, and other personal files will be kept. You can choose which
 operating system you want each time the computer starts up.
";
$elem["ubiquity/partitioner/ubuntu_resize"]["descriptionde"]="${DISTRO} ${VER} neben ${CURDISTRO} installieren
 Dokumente, Musik und andere persönliche Dateien bleiben bestehen. Sie können bei jedem Start des Rechners auswählen, welches Betriebssystem Sie benutzen möchten.
";
$elem["ubiquity/partitioner/ubuntu_resize"]["descriptionfr"]="Installer ${DISTRO} ${VER} à côté de ${CURDISTRO}
 Les documents, musiques et autres fichiers personnels seront conservés. Vous pouvez choisir le système d’exploitation à lancer au moment du démarrage de l’ordinateur.
";
$elem["ubiquity/partitioner/ubuntu_resize"]["default"]="";
$elem["ubiquity/partitioner/no_systems_format"]["type"]="text";
$elem["ubiquity/partitioner/no_systems_format"]["description"]="Erase disk and install ${DISTRO}
 <span foreground=\"darkred\">Warning:</span> This will delete any files on the
 disk.
";
$elem["ubiquity/partitioner/no_systems_format"]["descriptionde"]="Festplatte löschen und ${DISTRO} installieren
 <span foreground=\"darkred\">Warnung:</span> Dies wird alle Dateien auf der Festplatte unwiderruflich löschen.
";
$elem["ubiquity/partitioner/no_systems_format"]["descriptionfr"]="Effacer le disque et installer ${DISTRO}
 <span foreground=\"darkred\">Avertissement :</span> Ceci supprimera tous les fichiers présents sur le disque.
";
$elem["ubiquity/partitioner/no_systems_format"]["default"]="";
$elem["ubiquity/partitioner/ubuntu_and_os_format"]["type"]="text";
$elem["ubiquity/partitioner/ubuntu_and_os_format"]["description"]="Erase everything and reinstall
 <span foreground=\"darkred\">Warning:</span> This will delete all your
 programs, documents, photos, music, and other files in both ${OS} and
 ${CURDISTRO}.
";
$elem["ubiquity/partitioner/ubuntu_and_os_format"]["descriptionde"]="Alles löschen und neu installieren
 <span foreground=\"darkred\">Warnung:</span> Dies wird alle Ihre Anwendungen, Dokumente, Fotos, Musik sowie alle anderen Dateien sowohl in ${OS} als auch ${CURDISTRO} unwiderruflich löschen.
";
$elem["ubiquity/partitioner/ubuntu_and_os_format"]["descriptionfr"]="Tout effacer et réinstaller
 <span foreground=\"darkred\">Avertissement :</span> Ceci supprimera tous vos logiciels, vos documents, photos, musiques et tout autre fichier, aussi bien pour ${OS} que ${CURDISTRO}.
";
$elem["ubiquity/partitioner/ubuntu_and_os_format"]["default"]="";
$elem["ubiquity/partitioner/ubuntu_reinstall"]["type"]="text";
$elem["ubiquity/partitioner/ubuntu_reinstall"]["description"]="Reinstall ${CURDISTRO}
 Documents, music, and other personal files will be kept. Installed software
 will be kept where possible. System-wide settings will be cleared.
";
$elem["ubiquity/partitioner/ubuntu_reinstall"]["descriptionde"]="${CURDISTRO} neu installieren
 Dokumente, Musik und andere persönliche Dateien bleiben bestehen. Installierte Anwendungen bleiben – sofern dies möglich ist – ebenfalls bestehen. System-weite Einstellungen werden zurückgesetzt.
";
$elem["ubiquity/partitioner/ubuntu_reinstall"]["descriptionfr"]="Réinstaller ${CURDISTRO}
 Les documents, musiques et autres fichiers personnels seront conservés. Les logiciels installés seront conservés dans la mesure du possible. Les réglages effectués au niveau du système seront perdus.
";
$elem["ubiquity/partitioner/ubuntu_reinstall"]["default"]="";
$elem["ubiquity/partitioner/multiple_os_format"]["type"]="text";
$elem["ubiquity/partitioner/multiple_os_format"]["description"]="Erase disk and install ${DISTRO}
 <span foreground=\"darkred\">Warning:</span> This will delete all your programs,
 documents, photos, music, and any other files in all operating systems.
";
$elem["ubiquity/partitioner/multiple_os_format"]["descriptionde"]="Festplatte löschen und ${DISTRO} installieren
 <span foreground=\"darkred\">Warnung:</span> Dies wird alle Ihre Anwendungen, Dokumente, Fotos, Musik und alle anderen Dateien von allen Betriebssystemen löschen.
";
$elem["ubiquity/partitioner/multiple_os_format"]["descriptionfr"]="Effacer le disque et installer ${DISTRO}
 <span foreground=\"darkred\">Avertissement :</span> Ceci supprimera tous vos logiciels, documents, photos, musiques et autres fichiers de tous les systèmes d’exploitation.
";
$elem["ubiquity/partitioner/multiple_os_format"]["default"]="";
$elem["ubiquity/partitioner/multiple_os_resize"]["type"]="text";
$elem["ubiquity/partitioner/multiple_os_resize"]["description"]="Install ${DISTRO} alongside them
 Documents, music, and other personal files will be kept. You can choose which
 operating system you want each time the computer starts up.
";
$elem["ubiquity/partitioner/multiple_os_resize"]["descriptionde"]="${DISTRO} daneben installieren
 Dokumente, Musik und andere persönliche Dateien bleiben bestehen. Sie können bei jedem Start des Rechners auswählen, welches Betriebssystem Sie benutzen möchten.
";
$elem["ubiquity/partitioner/multiple_os_resize"]["descriptionfr"]="Installer ${DISTRO} à côté des autres
 Les documents, musiques et autres fichiers personnels seront conservés. Vous pouvez choisir le système d’exploitation à lancer au moment du démarrage de l’ordinateur.
";
$elem["ubiquity/partitioner/multiple_os_resize"]["default"]="";
$elem["ubiquity/partitioner/heading_one"]["type"]="text";
$elem["ubiquity/partitioner/heading_one"]["description"]="Description:
 This computer currently has ${OS} on it. What would you like to do?
";
$elem["ubiquity/partitioner/heading_one"]["descriptionde"]="Description-de.UTF-8:
 Auf diesem Rechner befindet sich momentan ${OS}. Wie möchten Sie vorgehen?
";
$elem["ubiquity/partitioner/heading_one"]["descriptionfr"]="Description-fr.UTF-8:
 ${OS} est actuellement installé sur cet ordinateur. Que voulez-vous faire ?
";
$elem["ubiquity/partitioner/heading_one"]["default"]="";
$elem["ubiquity/partitioner/heading_dual"]["type"]="text";
$elem["ubiquity/partitioner/heading_dual"]["description"]="Description:
 This computer currently has ${OS1} and ${OS2} on it. What would you like
 to do?
";
$elem["ubiquity/partitioner/heading_dual"]["descriptionde"]="Description-de.UTF-8:
 Auf diesem Rechner befinden sich momentan ${OS1} und ${OS2}. Wie möchten Sie vorgehen?
";
$elem["ubiquity/partitioner/heading_dual"]["descriptionfr"]="Description-fr.UTF-8:
 ${OS1} et ${OS2} sont actuellement installés sur cet ordinateur. Que voulez-vous faire ?
";
$elem["ubiquity/partitioner/heading_dual"]["default"]="";
$elem["ubiquity/partitioner/heading_multiple"]["type"]="text";
$elem["ubiquity/partitioner/heading_multiple"]["description"]="Description:
 This computer currently has multiple operating systems on it. What would you
 like to do?
";
$elem["ubiquity/partitioner/heading_multiple"]["descriptionde"]="Description-de.UTF-8:
 Auf diesem Rechner befinden sich momentan mehrere Betriebssysteme. Wie möchten Sie vorgehen?
";
$elem["ubiquity/partitioner/heading_multiple"]["descriptionfr"]="Description-fr.UTF-8:
 Plusieurs systèmes d’exploitation sont actuellement installés sur cet ordinateur. Que voulez-vous faire ?
";
$elem["ubiquity/partitioner/heading_multiple"]["default"]="";
$elem["ubiquity/partitioner/heading_no_detected"]["type"]="text";
$elem["ubiquity/partitioner/heading_no_detected"]["description"]="Description:
 This computer currently has no detected operating systems. What would you
 like to do?
";
$elem["ubiquity/partitioner/heading_no_detected"]["descriptionde"]="Description-de.UTF-8:
 Auf diesem Rechner befinden sich momentan keine erkannten Betriebssysteme. Wie möchten Sie vorgehen?
";
$elem["ubiquity/partitioner/heading_no_detected"]["descriptionfr"]="Description-fr.UTF-8:
 Aucun système d’exploitation n’a été détecté sur cet ordinateur. Que voulez-vous faire ?
";
$elem["ubiquity/partitioner/heading_no_detected"]["default"]="";
$elem["ubiquity/text/partition_layout_before"]["type"]="text";
$elem["ubiquity/text/partition_layout_before"]["description"]="Description:
 Before:
";
$elem["ubiquity/text/partition_layout_before"]["descriptionde"]="Description-de.UTF-8:
 Vorher:
";
$elem["ubiquity/text/partition_layout_before"]["descriptionfr"]="Description-fr.UTF-8:
 Avant :
";
$elem["ubiquity/text/partition_layout_before"]["default"]="";
$elem["ubiquity/text/partition_layout_after"]["type"]="text";
$elem["ubiquity/text/partition_layout_after"]["description"]="Description:
 After:
";
$elem["ubiquity/text/partition_layout_after"]["descriptionde"]="Description-de.UTF-8:
 Nachher:
";
$elem["ubiquity/text/partition_layout_after"]["descriptionfr"]="Description-fr.UTF-8:
 Après :
";
$elem["ubiquity/text/partition_layout_after"]["default"]="";
$elem["ubiquity/text/use_crypto"]["type"]="text";
$elem["ubiquity/text/use_crypto"]["description"]="Description:
 Encrypt the new ${RELEASE} installation for security
";
$elem["ubiquity/text/use_crypto"]["descriptionde"]="Description-de.UTF-8:
 Die neue ${RELEASE}-Installation zur Sicherheit verschlüsseln
";
$elem["ubiquity/text/use_crypto"]["descriptionfr"]="Description-fr.UTF-8:
 Chiffrer la nouvelle installation de ${RELEASE} pour la sécurité
";
$elem["ubiquity/text/use_crypto"]["default"]="";
$elem["ubiquity/text/use_crypto_desc"]["type"]="text";
$elem["ubiquity/text/use_crypto_desc"]["description"]="Description:
 You will choose a security key in the next step.
";
$elem["ubiquity/text/use_crypto_desc"]["descriptionde"]="Description-de.UTF-8:
 Im nächsten Schritt wählen Sie einen Sicherheitsschlüssel aus.
";
$elem["ubiquity/text/use_crypto_desc"]["descriptionfr"]="Description-fr.UTF-8:
 Vous allez choisir une clé de sécurité à l'étape suivante.
";
$elem["ubiquity/text/use_crypto_desc"]["default"]="";
$elem["ubiquity/text/use_lvm"]["type"]="text";
$elem["ubiquity/text/use_lvm"]["description"]="Description:
 Use LVM with the new ${RELEASE} installation
";
$elem["ubiquity/text/use_lvm"]["descriptionde"]="Description-de.UTF-8:
 LVM bei der neuen ${RELEASE}-Installation verwenden
";
$elem["ubiquity/text/use_lvm"]["descriptionfr"]="Description-fr.UTF-8:
 Utiliser LVM pour la nouvelle installation de ${RELEASE}
";
$elem["ubiquity/text/use_lvm"]["default"]="";
$elem["ubiquity/text/use_lvm_desc"]["type"]="text";
$elem["ubiquity/text/use_lvm_desc"]["description"]="Description:
 This will set up Logical Volume Management. It allows taking snapshots and easier partition resizing.
";
$elem["ubiquity/text/use_lvm_desc"]["descriptionde"]="Description-de.UTF-8:
 LVM wird eingerichtet. Es erlaubt die Erstellung von Abbildern und eine erleichterte Größenänderung von Partitionen.
";
$elem["ubiquity/text/use_lvm_desc"]["descriptionfr"]="Description-fr.UTF-8:
 Ceci va configurer le gestionnaire de volumes logiques. Il permet de prendre des instantanés et de redimensionner plus facilement les partitions.
";
$elem["ubiquity/text/use_lvm_desc"]["default"]="";
$elem["ubiquity/text/verified_crypto_label"]["type"]="text";
$elem["ubiquity/text/verified_crypto_label"]["description"]="Description:
 Confirm the security key:
";
$elem["ubiquity/text/verified_crypto_label"]["descriptionde"]="Description-de.UTF-8:
 Bestätigen Sie den Sicherheitsschlüssel:
";
$elem["ubiquity/text/verified_crypto_label"]["descriptionfr"]="Description-fr.UTF-8:
 Confirmer la clé de sécurité :
";
$elem["ubiquity/text/verified_crypto_label"]["default"]="";
$elem["ubiquity/text/efi_secureboot"]["type"]="text";
$elem["ubiquity/text/efi_secureboot"]["description"]="Description:
 Choose a security key:
Description:
 Disk encryption protects your files in case you lose your computer. It requires you to enter a security key each time the computer starts up.
Description:
 Any files outside of ${RELEASE} will not be encrypted.
Description:
 <span foreground=\"darkred\">Warning:</span> If you lose this security key, all data will be lost. If you need to, write down your key and keep it in a safe place elsewhere.
Description:
 For more security:
Description:
 Overwrite empty disk space
Description:
 The installation may take much longer.
Description:
 Volume groups:
Description:
 Encryption Options
Description:
 Physical volumes:
Description:
 Revert
Description:
 Encrypt this partition (LUKS)
Description:
 MB
Description:
 Logical Volume Management (LVM) lets ${RELEASE} treat multiple physical volumes as a single volume.
Description:
 Logical Volume Management
Description:
 Encryption options...
Description:
 UEFI Secure Boot

";
$elem["ubiquity/text/efi_secureboot"]["descriptionde"]="Description-de.UTF-8:
 Wählen Sie einen Sicherheitsschlüssel:
Description-de.UTF-8:
 Die Festplattenverschlüsselung schützt Ihre Daten, falls Sie Ihren Rechner verlieren. Es wird ein Sicherheitsschlüssel benötigt, den Sie bei jedem Systemstart eingeben müssen.
Description-de.UTF-8:
 Jede Datei außerhalb von ${RELEASE} wird nicht verschlüsselt.
Description-de.UTF-8:
 <span foreground=\"darkred\">Warnung:</span> Falls Sie diesen Sicherheitsschlüssel verlieren, sind Ihre Daten unwiederbringlich verloren. Sie können Ihren Sicherheitsschlüssel jedoch aufschreiben und ihn an einem sicheren Ort verwahren.
Description-de.UTF-8:
 Für mehr Sicherheit:
Description-de.UTF-8:
 Freien Speicherplatz überschreiben
Description-de.UTF-8:
 Die Installation kann um einiges länger dauern.
Description-de.UTF-8:
 Laufwerksgruppen:
Description-de.UTF-8:
 Verschlüsselungseinstellungen
Description-de.UTF-8:
 Physikalische Laufwerke
Description-de.UTF-8:
 Zurücksetzen
Description-de.UTF-8:
 Diese Partition verschlüsseln (LUKS)
Description-de.UTF-8:
 MB
Description-de.UTF-8:
 Mit LVM (»Logical Volume Management«) kann ${RELEASE} mehrere physikalische Laufwerke als ein Laufwerk behandeln.
Description-de.UTF-8:
 Logische Laufwerksverwaltung
Description-de.UTF-8:
 Verschlüsselungseinstellungen …
";
$elem["ubiquity/text/efi_secureboot"]["descriptionfr"]="Description-fr.UTF-8:
 Choisir une clé de sécurité :
Description-fr.UTF-8:
 Le chiffrement du disque protège vos fichiers au cas où vous perdriez votre ordinateur. Il exige que vous saisissiez une clef de sécurité à chaque fois que l'ordinateur démarre.
Description-fr.UTF-8:
 Aucun autre fichier en dehors de ${RELEASE} ne sera chiffré.
Description-fr.UTF-8:
 <span foreground=\"darkred\">Attention :</span> Si vous oubliez la clé de sécurité, toutes les données seront perdues. Si vous en avez besoin, notez votre clé et conservez-la dans un endroit sûr.
Description-fr.UTF-8:
 Pour plus de sécurité :
Description-fr.UTF-8:
 Écraser l'espace disque vide
Description-fr.UTF-8:
 L'installation peut durer beaucoup plus longtemps.
Description-fr.UTF-8:
 Groupes de volumes :
Description-fr.UTF-8:
 Options de chiffrement
Description-fr.UTF-8:
 Volumes physiques :
Description-fr.UTF-8:
 Rétablir
Description-fr.UTF-8:
 Chiffrer cette partition (LUKS)
Description-fr.UTF-8:
 Mo
Description-fr.UTF-8:
 LVM (Logical Volume Management) permet à ${RELEASE} de traiter plusieurs volumes physiques comme un seul volume.
Description-fr.UTF-8:
 Gestion de volumes logiques (LVM)
Description-fr.UTF-8:
 Options de chiffrement…
";
$elem["ubiquity/text/efi_secureboot"]["default"]="";
$elem["ubiquity/text/efi_secureboot_info"]["type"]="text";
$elem["ubiquity/text/efi_secureboot_info"]["description"]="Description:
 You have chosen to enable third-party software as part of your install,
 which for this system includes hardware drivers for graphics and/or wi-fi
 hardware. Your system also has UEFI Secure Boot enabled. UEFI Secure Boot
 is not compatible with the use of these third-party drivers.
 .
 After installation completes, Ubuntu will assist you in disabling UEFI
 Secure Boot. To ensure that this change is being made by you as an authorized
 user, and not by an attacker, you must choose a password now and then use
 the same password after reboot to confirm the change.
 .
 <span foreground=\"darkred\">Warning</span>: If you choose not to install
 these drivers, or if you proceed but do not confirm the password upon reboot,
 Ubuntu will still be able to boot on your system but these third-party
 drivers will not be available for your hardware.

";
$elem["ubiquity/text/efi_secureboot_info"]["descriptionde"]="";
$elem["ubiquity/text/efi_secureboot_info"]["descriptionfr"]="";
$elem["ubiquity/text/efi_secureboot_info"]["default"]="";
$elem["ubiquity/secureboot_key"]["type"]="password";
$elem["ubiquity/secureboot_key"]["description"]="SecureBoot key for MokPW

";
$elem["ubiquity/secureboot_key"]["descriptionde"]="";
$elem["ubiquity/secureboot_key"]["descriptionfr"]="";
$elem["ubiquity/secureboot_key"]["default"]="";
$elem["ubiquity/imported/cancel"]["type"]="text";
$elem["ubiquity/imported/cancel"]["description"]="_Cancel
";
$elem["ubiquity/imported/cancel"]["descriptionde"]="_Abbrechen
";
$elem["ubiquity/imported/cancel"]["descriptionfr"]="A_nnuler
";
$elem["ubiquity/imported/cancel"]["default"]="";
$elem["ubiquity/imported/close"]["type"]="text";
$elem["ubiquity/imported/close"]["description"]="_Close
";
$elem["ubiquity/imported/close"]["descriptionde"]="S_chließen
";
$elem["ubiquity/imported/close"]["descriptionfr"]="_Fermer
";
$elem["ubiquity/imported/close"]["default"]="";
$elem["ubiquity/imported/go-back"]["type"]="text";
$elem["ubiquity/imported/go-back"]["description"]="_Back
";
$elem["ubiquity/imported/go-back"]["descriptionde"]="_Zurück
";
$elem["ubiquity/imported/go-back"]["descriptionfr"]="_Précédent
";
$elem["ubiquity/imported/go-back"]["default"]="";
$elem["ubiquity/imported/ok"]["type"]="text";
$elem["ubiquity/imported/ok"]["description"]="_OK
";
$elem["ubiquity/imported/ok"]["descriptionde"]="_OK
";
$elem["ubiquity/imported/ok"]["descriptionfr"]="_Valider
";
$elem["ubiquity/imported/ok"]["default"]="";
$elem["ubiquity/imported/quit"]["type"]="text";
$elem["ubiquity/imported/quit"]["description"]="_Quit
";
$elem["ubiquity/imported/quit"]["descriptionde"]="_Beenden
";
$elem["ubiquity/imported/quit"]["descriptionfr"]="_Quitter
";
$elem["ubiquity/imported/quit"]["default"]="";
$elem["ubiquity/imported/yes"]["type"]="text";
$elem["ubiquity/imported/yes"]["description"]="_Yes
";
$elem["ubiquity/imported/yes"]["descriptionde"]="_Ja
";
$elem["ubiquity/imported/yes"]["descriptionfr"]="_Oui
";
$elem["ubiquity/imported/yes"]["default"]="";
$elem["ubiquity/imported/no"]["type"]="text";
$elem["ubiquity/imported/no"]["description"]="_No
";
$elem["ubiquity/imported/no"]["descriptionde"]="_Nein
";
$elem["ubiquity/imported/no"]["descriptionfr"]="_Non
";
$elem["ubiquity/imported/no"]["default"]="";
$elem["ubiquity/imported/default-ltr"]["type"]="text";
$elem["ubiquity/imported/default-ltr"]["description"]="default:LTR
";
$elem["ubiquity/imported/default-ltr"]["descriptionde"]="default:LTR
";
$elem["ubiquity/imported/default-ltr"]["descriptionfr"]="default:LTR
";
$elem["ubiquity/imported/default-ltr"]["default"]="";
$elem["ubiquity/imported/12-hour"]["type"]="text";
$elem["ubiquity/imported/12-hour"]["description"]="%l:%M %p
";
$elem["ubiquity/imported/12-hour"]["descriptionde"]="%I:%M %p
";
$elem["ubiquity/imported/12-hour"]["descriptionfr"]="%l:%M %p
";
$elem["ubiquity/imported/12-hour"]["default"]="";
$elem["ubiquity/imported/24-hour"]["type"]="text";
$elem["ubiquity/imported/24-hour"]["description"]="%H:%M
";
$elem["ubiquity/imported/24-hour"]["descriptionde"]="%H:%M
";
$elem["ubiquity/imported/24-hour"]["descriptionfr"]="%H:%M
";
$elem["ubiquity/imported/24-hour"]["default"]="";
$elem["ubiquity/imported/time-format"]["type"]="text";
$elem["ubiquity/imported/time-format"]["description"]="24-hour
";
$elem["ubiquity/imported/time-format"]["descriptionde"]="24-hour
";
$elem["ubiquity/imported/time-format"]["descriptionfr"]="24-hour
";
$elem["ubiquity/imported/time-format"]["default"]="";
$elem["base-installer/kernel/linux/link_in_boot"]["type"]="boolean";
$elem["base-installer/kernel/linux/link_in_boot"]["description"]="for internal use only
 Kernel needs a link in /boot/ (linux only)

";
$elem["base-installer/kernel/linux/link_in_boot"]["descriptionde"]="";
$elem["base-installer/kernel/linux/link_in_boot"]["descriptionfr"]="";
$elem["base-installer/kernel/linux/link_in_boot"]["default"]="false";
$elem["apt-setup/progress/cdrom"]["type"]="text";
$elem["apt-setup/progress/cdrom"]["description"]="Scanning the CD-ROM...
";
$elem["apt-setup/progress/cdrom"]["descriptionde"]="Durchsuchen der CD-ROM ...
";
$elem["apt-setup/progress/cdrom"]["descriptionfr"]="Analyse du CD...
";
$elem["apt-setup/progress/cdrom"]["default"]="";
$elem["apt-setup/cdrom/failed"]["type"]="error";
$elem["apt-setup/cdrom/failed"]["description"]="apt configuration problem
 An attempt to configure apt to install additional packages from the CD
 failed.
";
$elem["apt-setup/cdrom/failed"]["descriptionde"]="Apt-Konfigurationsproblem
 Ein Versuch, apt zu konfigurieren, um weitere Pakete von der CD zu installieren, ist fehlgeschlagen.
";
$elem["apt-setup/cdrom/failed"]["descriptionfr"]="Échec de la configuration de l'outil de gestion des paquets (APT)
 Une tentative de configuration d'APT pour installer de nouveaux paquets depuis le CD a échoué.
";
$elem["apt-setup/cdrom/failed"]["default"]="";
$elem["apt-setup/cdrom/set-first"]["type"]="boolean";
$elem["apt-setup/cdrom/set-first"]["description"]="Scan another CD or DVD?
 Your installation CD or DVD has been scanned; its label is:
 .
 ${LABEL}
 .
 You now have the option to scan additional CDs or DVDs for use by the
 package manager (apt). Normally these should be from the same set as the
 installation CD/DVD. If you do not have any additional CDs or DVDs
 available, this step can just be skipped.
 .
 If you wish to scan another CD or DVD, please insert it now.
";
$elem["apt-setup/cdrom/set-first"]["descriptionde"]="Eine andere CD oder DVD einlesen?
 Ihre Installations-CD oder -DVD wurde eingelesen; die Bezeichnung lautet:
 .
 ${LABEL}
 .
 Sie haben nun die Möglichkeit, zusätzliche CDs oder DVDs für die Verwendung durch die Paketverwaltung (apt) einzulesen. Normalerweise sollten diese aus demselben Satz wie die Installations-CD/DVD stammen. Falls Sie keine weiteren CDs oder DVDs haben, kann dieser Schritt übersprungen werden.
 .
 Falls Sie eine andere CD oder DVD einlesen möchten, legen Sie sie jetzt ein.
";
$elem["apt-setup/cdrom/set-first"]["descriptionfr"]="Faut-il analyser un autre CD ou DVD ?
 Le support d'installation (CD ou DVD) a été analysé. Son étiquette est :
 .
 ${LABEL}
 .
 Vous pouvez maintenant analyser des CD ou DVD supplémentaires qui seront utilisés par l'outil de gestion des paquets (APT). En principe, ils devraient appartenir au même ensemble de supports que le CD ou le DVD d'installation. Si vous n'avez pas d'autres CD ou DVD disponibles, vous pouvez passer cette étape.
 .
 Si vous souhaitez analyser un autre CD ou DVD, veuillez le mettre en place maintenant.
";
$elem["apt-setup/cdrom/set-first"]["default"]="false";
$elem["apt-setup/cdrom/set-next"]["type"]="boolean";
$elem["apt-setup/cdrom/set-next"]["description"]="Scan another CD or DVD?
 The CD or DVD with the following label has been scanned:
 .
 ${LABEL}
 .
 If you wish to scan another CD or DVD, please insert it now.
";
$elem["apt-setup/cdrom/set-next"]["descriptionde"]="Eine andere CD oder DVD einlesen?
 Die CD oder DVD mit der folgenden Bezeichnung wurde eingelesen:
 .
 ${LABEL}
 .
 Falls Sie eine andere CD oder DVD einlesen möchten, legen Sie sie jetzt ein.
";
$elem["apt-setup/cdrom/set-next"]["descriptionfr"]="Faut-il analyser un autre CD ou DVD ?
 Le CD ou DVD avec l'étiquette suivante a été analysé :
 .
 ${LABEL}
 .
 Si vous souhaitez analyser un autre CD ou DVD, veuillez le mettre en place maintenant.
";
$elem["apt-setup/cdrom/set-next"]["default"]="false";
$elem["apt-setup/cdrom/set-double"]["type"]="boolean";
$elem["apt-setup/cdrom/set-double"]["description"]="Scan another CD or DVD?
 The CD or DVD with the following label has already been scanned:
 .
 ${LABEL}
 .
 Please replace it now if you wish to scan another CD or DVD.
";
$elem["apt-setup/cdrom/set-double"]["descriptionde"]="Eine andere CD oder DVD einlesen?
 Die CD oder DVD mit der folgenden Bezeichnung wurde bereits eingelesen:
 .
 ${LABEL}
 .
 Bitte ersetzen Sie sie jetzt, falls Sie eine andere CD oder DVD einlesen möchten.
";
$elem["apt-setup/cdrom/set-double"]["descriptionfr"]="Faut-il analyser un autre CD ou DVD ?
 Le CD ou le DVD avec l'étiquette suivante a déjà été analysé :
 .
 ${LABEL}
 .
 Veuillez le remplacer maintenant si vous souhaitez analyser un autre CD ou DVD.
";
$elem["apt-setup/cdrom/set-double"]["default"]="true";
$elem["apt-setup/cdrom/set-failed"]["type"]="boolean";
$elem["apt-setup/cdrom/set-failed"]["description"]="Scan another CD or DVD?
 An attempt to configure apt to install additional packages from the
 CD/DVD failed.
 .
 Please check that the CD/DVD has been inserted correctly.
";
$elem["apt-setup/cdrom/set-failed"]["descriptionde"]="Eine andere CD oder DVD einlesen?
 Ein Versuch apt zu konfigurieren, um weitere Pakete von der CD/DVD zu installieren, ist fehlgeschlagen.
 .
 Bitte vergewissern Sie sich, dass die CD/DVD richtig eingelegt wurde.
";
$elem["apt-setup/cdrom/set-failed"]["descriptionfr"]="Faut-il analyser un autre CD ou DVD ?
 Une tentative de configuration d'APT pour installer de nouveaux paquets depuis le CD ou le DVD a échoué.
 .
 Veuillez vérifier que le CD ou le DVD a été placé correctement.
";
$elem["apt-setup/cdrom/set-failed"]["default"]="true";
$elem["apt-setup/cdrom/media-change"]["type"]="text";
$elem["apt-setup/cdrom/media-change"]["description"]="Media change
 /cdrom/:Please insert the disc labeled: '${LABEL}' in the drive '/cdrom/'
 and press enter.
";
$elem["apt-setup/cdrom/media-change"]["descriptionde"]="Medienwechsel
 /cdrom/: Bitte legen Sie das Medium mit der Bezeichnung »${LABEL}« in das Laufwerk »/cdrom/« und drücken Sie die Eingabetaste.
";
$elem["apt-setup/cdrom/media-change"]["descriptionfr"]="Changement de support
 /cdrom/ : veuillez placer le disque portant l'étiquette « ${LABEL} » dans le lecteur puis appuyez sur la touche Entrée.
";
$elem["apt-setup/cdrom/media-change"]["default"]="";
$elem["finish-install/progress/apt-cdrom-setup"]["type"]="text";
$elem["finish-install/progress/apt-cdrom-setup"]["description"]="Disabling netinst CD in sources.list...
";
$elem["finish-install/progress/apt-cdrom-setup"]["descriptionde"]="Netinst-CD wird in sources.list deaktiviert ...
";
$elem["finish-install/progress/apt-cdrom-setup"]["descriptionfr"]="Désactivation du CD « netinst » dans le fichier sources.list...
";
$elem["finish-install/progress/apt-cdrom-setup"]["default"]="";
$elem["apt-setup/use/netinst_old"]["type"]="text";
$elem["apt-setup/use/netinst_old"]["description"]="If you are installing from a netinst CD and choose not to use a mirror, you will end up with only a very minimal base system.
";
$elem["apt-setup/use/netinst_old"]["descriptionde"]="Falls Sie von einer Netinst-CD installieren und keinen Spiegel auswählen, wird dies zu einem sehr minimalen Basissystem führen.
";
$elem["apt-setup/use/netinst_old"]["descriptionfr"]="Si vous effectuez l'installation depuis un CD « netinst » et que vous choisissez de ne pas utiliser de miroir sur le réseau, l'installation se limitera à un système de base très minimal.
";
$elem["apt-setup/use/netinst_old"]["default"]="";
$elem["apt-setup/use/netinst"]["type"]="text";
$elem["apt-setup/use/netinst"]["description"]="You are installing from a netinst CD, which by itself only allows installation of a very minimal base system. Use a mirror to install a more complete system.
";
$elem["apt-setup/use/netinst"]["descriptionde"]="Sie installieren von einer Netinst-CD, die nur die Installation eines sehr minimalen Basissystems ermöglicht. Verwenden Sie einen Spiegel, um ein vollständiges System installieren zu können.
";
$elem["apt-setup/use/netinst"]["descriptionfr"]="Vous effectuez une installation depuis un CD « netinst » qui, seul, ne permet que l'installation d'un système très minimal. Vous devriez utiliser un miroir réseau de la distribution pour installer un système complet.
";
$elem["apt-setup/use/netinst"]["default"]="";
$elem["apt-setup/use/cd"]["type"]="text";
$elem["apt-setup/use/cd"]["description"]="You are installing from a CD, which contains a limited selection of packages.
";
$elem["apt-setup/use/cd"]["descriptionde"]="Sie installieren von einer CD, die eine beschränkte Auswahl an Paketen enthält.
";
$elem["apt-setup/use/cd"]["descriptionfr"]="Vous effectuez actuellement une installation depuis un CD qui offre un choix limité de paquets.
";
$elem["apt-setup/use/cd"]["default"]="";
$elem["apt-setup/use/cd-set1"]["type"]="text";
$elem["apt-setup/use/cd-set1"]["description"]="You have scanned %i CDs. Even though these contain a fair selection of packages, some may be missing (notably some packages needed to support languages other than English).
";
$elem["apt-setup/use/cd-set1"]["descriptionde"]="%i. Obwohl sie eine große Auswahl an Paketen enthalten, könnten einige fehlen (insbesondere einige Pakete zur Unterstützung von anderen Sprachen als Englisch).
";
$elem["apt-setup/use/cd-set1"]["descriptionfr"]="Vous avez analysé %i CD. Bien que de nombreux paquets soient présents, certains peuvent manquer (particulièrement certains paquets permettant la gestion de langues autres que l'anglais).
";
$elem["apt-setup/use/cd-set1"]["default"]="";
$elem["apt-setup/use/cd-set2"]["type"]="text";
$elem["apt-setup/use/cd-set2"]["description"]="You have scanned %i CDs. Even though these contain a large selection of packages, some may be missing.
";
$elem["apt-setup/use/cd-set2"]["descriptionde"]="%i. Obwohl sie eine große Auswahl an Paketen enthalten, könnten einige fehlen.
";
$elem["apt-setup/use/cd-set2"]["descriptionfr"]="Vous avez analysé %i CD. Bien que de nombreux paquets soient présents, certains peuvent manquer.
";
$elem["apt-setup/use/cd-set2"]["default"]="";
$elem["apt-setup/use/cd-note"]["type"]="text";
$elem["apt-setup/use/cd-note"]["description"]="Note that using a mirror can result in a large amount of data being downloaded during the next step of the installation.
";
$elem["apt-setup/use/cd-note"]["descriptionde"]="Beachten Sie, dass die Verwendung eines Spiegels dazu führen kann, dass große Datenmengen während des nächsten Schritts der Installation heruntergeladen werden.
";
$elem["apt-setup/use/cd-note"]["descriptionfr"]="Veuillez noter que l'utilisation d'un miroir peut provoquer le téléchargement d'une grande quantité de données durant la prochaine étape de l'installation.
";
$elem["apt-setup/use/cd-note"]["default"]="";
$elem["apt-setup/use/dvd"]["type"]="text";
$elem["apt-setup/use/dvd"]["description"]="You are installing from a DVD. Even though the DVD contains a large selection of packages, some may be missing.
";
$elem["apt-setup/use/dvd"]["descriptionde"]="Sie installieren von einer DVD. Obwohl die DVD eine große Auswahl an Paketen enthält, könnten einige fehlen.
";
$elem["apt-setup/use/dvd"]["descriptionfr"]="Vous effectuez actuellement une installation depuis un DVD. Bien que de nombreux paquets soient présents, certains peuvent manquer.
";
$elem["apt-setup/use/dvd"]["default"]="";
$elem["apt-setup/use/inet1"]["type"]="text";
$elem["apt-setup/use/inet1"]["description"]="Unless you don't have a good Internet connection, use of a mirror is recommended, especially if you plan to install a graphical desktop environment.
";
$elem["apt-setup/use/inet1"]["descriptionde"]="Wenn Sie keine allzu schlechte Internetverbindung haben, wird die Verwendung eines Spiegels empfohlen, insbesondere wenn Sie vorhaben, eine grafische Desktop-Umgebung zu installieren.
";
$elem["apt-setup/use/inet1"]["descriptionfr"]="Si vous disposez d'une connexion de bonne qualité à Internet, vous devriez utiliser un miroir réseau de la distribution, particulièrement si vous souhaitez installer un environnement graphique de bureau.
";
$elem["apt-setup/use/inet1"]["default"]="";
$elem["apt-setup/use/inet2"]["type"]="text";
$elem["apt-setup/use/inet2"]["description"]="If you have a reasonably good Internet connection, use of a mirror is suggested if you plan to install a graphical desktop environment.
";
$elem["apt-setup/use/inet2"]["descriptionde"]="Falls Sie eine gute Internetverbindung haben, wird die Verwendung eines Spiegels empfohlen, wenn Sie vorhaben, eine grafische Desktop-Umgebung zu installieren.
";
$elem["apt-setup/use/inet2"]["descriptionfr"]="Si vous disposez d'une connexion de bonne qualité à Internet, vous devriez utiliser un miroir réseau de la distribution si vous souhaitez installer un environnement graphique de bureau, .
";
$elem["apt-setup/use/inet2"]["default"]="";
$elem["apt-setup/disable-cdrom-entries"]["type"]="boolean";
$elem["apt-setup/disable-cdrom-entries"]["description"]="for internal use; can be preseeded
 When set to true, apt-setup always disables cdrom entries from APT's
 configuration. Otherwise, it disables them only when a netinst image
 has been used.
 .
 This option can be preseeded for automated installations that should
 not reference the installation media in the target system.

";
$elem["apt-setup/disable-cdrom-entries"]["descriptionde"]="";
$elem["apt-setup/disable-cdrom-entries"]["descriptionfr"]="";
$elem["apt-setup/disable-cdrom-entries"]["default"]="false";
$elem["apt-setup/progress/mirror"]["type"]="text";
$elem["apt-setup/progress/mirror"]["description"]="Scanning the mirror...
";
$elem["apt-setup/progress/mirror"]["descriptionde"]="Durchsuchen des Spiegelservers ...
";
$elem["apt-setup/progress/mirror"]["descriptionfr"]="Analyse du miroir...
";
$elem["apt-setup/progress/mirror"]["default"]="";
$elem["apt-setup/non-free"]["type"]="boolean";
$elem["apt-setup/non-free"]["description"]="Use non-free software?
 Some non-free software has been made to work with Debian. Though this
 software is not at all a part of Debian, standard Debian tools can be used
 to install it. This software has varying licenses which may prevent you
 from using, modifying, or sharing it.
 .
 Please choose whether you want to have it available anyway.
";
$elem["apt-setup/non-free"]["descriptionde"]="»Non-free«-Software verwenden?
 Einige non-free-Programme wurden für den Einsatz mit Debian vorbereitet. Obwohl diese Art von Software NICHT Teil von Debian ist, kann man sie dennoch mit den Standard-Debian-Hilfsmitteln installieren. Diese Programme haben verschiedene Lizenzen, welche Sie an der Benutzung, Modifikation oder der Verbreitung der Programme hindern könnten.
 .
 Bitte wählen Sie, ob Sie sie dennoch verfügbar haben möchten.
";
$elem["apt-setup/non-free"]["descriptionfr"]="Souhaitez-vous utiliser des logiciels non libres ?
 Certains logiciels non libres peuvent fonctionner avec Debian. Bien qu'ils ne fassent pas partie de Debian, les outils habituels peuvent être utilisés pour les installer. Ces logiciels comportent des restrictions en ce qui concerne leur distribution, leur modification ou leur utilisation.
 .
 Veuillez indiquer si vous souhaitez y avoir accès malgré tout.
";
$elem["apt-setup/non-free"]["default"]="false";
$elem["apt-setup/contrib"]["type"]="boolean";
$elem["apt-setup/contrib"]["description"]="Use contrib software?
 Some additional software has been made to work with Debian. Though this
 software is free, it depends on non-free software for its operation. This
 software is not a part of Debian, but standard Debian tools can be
 used to install it.
 .
 Please choose whether you want this software to be made available to you.
";
$elem["apt-setup/contrib"]["descriptionde"]="»Contrib«-Software verwenden?
 Einige Zusatzprogramme wurden für die Benutzung mit Debian bereitgestellt. Auch wenn diese Software frei ist, kann sie aber von non-free-Programmen abhängen. Diese Software ist NICHT Teil von Debian, kann aber mit den Standard-Debian-Hilfsmitteln installiert werden.
 .
 Bitte wählen Sie, ob diese Programme für Sie verfügbar gemacht werden sollen.
";
$elem["apt-setup/contrib"]["descriptionfr"]="Souhaitez-vous utiliser les logiciels de la section « contrib » ?
 Certains logiciels supplémentaires sont prévus pour fonctionner avec Debian. Bien que libres, ils ne fonctionnent pas sans certains logiciels non libres. Ces programmes ne font pas partie de Debian, mais les outils habituels peuvent être utilisés pour les installer.
 .
 Veuillez indiquer si vous souhaitez avoir accès à ces logiciels.
";
$elem["apt-setup/contrib"]["default"]="false";
$elem["apt-setup/mirror/error"]["type"]="select";
$elem["apt-setup/mirror/error"]["choices"][1]="Retry";
$elem["apt-setup/mirror/error"]["choices"][2]="Change mirror";
$elem["apt-setup/mirror/error"]["choicesde"][1]="Wiederholen";
$elem["apt-setup/mirror/error"]["choicesde"][2]="Spiegelserver wechseln";
$elem["apt-setup/mirror/error"]["choicesfr"][1]="Réessayer";
$elem["apt-setup/mirror/error"]["choicesfr"][2]="Changer de miroir";
$elem["apt-setup/mirror/error"]["description"]="Downloading a file failed:
 The installer failed to access the mirror. This may be a problem with your
 network, or with the mirror. You can choose to retry the download, select
 a different mirror, or ignore the problem and continue without all the
 packages from this mirror.
";
$elem["apt-setup/mirror/error"]["descriptionde"]="Datei-Download fehlgeschlagen:
 Der Installer konnte nicht auf den Spiegelserver zugreifen. Dies könnte ein Problem in Ihrem Netzwerk oder auch ein Problem des Spiegels sein. Sie können den Download wiederholen, einen anderen Spiegelserver wählen oder das Problem ignorieren und ohne die Pakete von diesem Server fortfahren.
";
$elem["apt-setup/mirror/error"]["descriptionfr"]="Échec du téléchargement d'un fichier :
 Le programme d'installation n'a pas pu accéder au  miroir. Cela peut être dû à un problème lié au réseau ou à un problème sur le miroir. Vous pouvez réessayer le téléchargement, changer de miroir ou ignorer le problème et continuer avec les paquets récupérés sur ce miroir.
";
$elem["apt-setup/mirror/error"]["default"]="Retry";
$elem["apt-setup/use_mirror"]["type"]="boolean";
$elem["apt-setup/use_mirror"]["description"]="Use a network mirror?
 A network mirror can be used to supplement the software that is included
 on the CD-ROM. This may also make newer versions of software available.
 .
 ${EXPLANATION}
";
$elem["apt-setup/use_mirror"]["descriptionde"]="Einen Netzwerkspiegel verwenden?
 Ein Netzwerkspiegel kann verwendet werden, um die Software zu ergänzen, die mit der CD-ROM ausgeliefert wird. Er kann auch neuere Software-Versionen verfügbar machen.
 .
 ${EXPLANATION}
";
$elem["apt-setup/use_mirror"]["descriptionfr"]="Faut-il utiliser un miroir sur le réseau ?
 L'utilisation d'un miroir sur le réseau peut permettre de compléter les logiciels présents sur le CD. Il peut également donner accès à des versions plus récentes.
 .
 ${EXPLANATION}
";
$elem["apt-setup/use_mirror"]["default"]="";
$elem["apt-setup/no_mirror"]["type"]="boolean";
$elem["apt-setup/no_mirror"]["description"]="Continue without a network mirror?
 No network mirror was selected.
 .
 If you are installing from a netinst CD and choose not to use a mirror,
 you will end up with only a very minimal base system.
";
$elem["apt-setup/no_mirror"]["descriptionde"]="Ohne Netzwerk-Spiegel fortsetzen?
 Es wurde kein Netzwerk-Spiegel gefunden.
 .
 Falls Sie von einer Netinst-CD installieren und keinen Spiegel auswählen, wird dies zu einem sehr minimalen Basissystem führen.
";
$elem["apt-setup/no_mirror"]["descriptionfr"]="Faut-il continuer sans miroir sur le réseau ?
 Aucun miroir réseau n'a été détecté.
 .
 Si vous effectuez l'installation depuis un CD « netinst » et que vous choisissez de ne pas utiliser de miroir sur le réseau, l'installation se limitera à un système de base très minimal.
";
$elem["apt-setup/no_mirror"]["default"]="false";
$elem["apt-setup/restricted"]["type"]="boolean";
$elem["apt-setup/restricted"]["description"]="Use restricted software?
 Some non-free software is available in packaged form. Though this software
 is not a part of the main distribution, standard package management tools
 can be used to install it. This software has varying licenses which may
 prevent you from using, modifying, or sharing it.
 .
 Please choose whether you want to have it available anyway.
";
$elem["apt-setup/restricted"]["descriptionde"]="Eingeschränkte Software verwenden?
 Einige non-free-Software ist paketiert verfügbar. Obwohl diese Software nicht Teil der Hauptdistribution ist, können Standard-Paketverwaltungsprogramme zu ihrer Installation verwendet werden. Diese Software hat verschiedene Lizenzen, welche Sie an der Benutzung, Modifikation oder Verbreitung der Programme hindern könnten.
 .
 Bitte wählen Sie, ob Sie sie dennoch verfügbar haben möchten.
";
$elem["apt-setup/restricted"]["descriptionfr"]="Faut-il utiliser les logiciels à diffusion restreinte ?
 Certains logiciels non libres sont disponibles sous forme de paquets. Bien que ces logiciels ne fassent pas partie de la distribution principale, il est possible d'utiliser les outils standards de gestion des paquets pour les installer. Veuillez noter que ces logiciels peuvent être soumis à des licences qui vous interdisent de les modifier, partager ou même de les utiliser.
 .
 Veuillez indiquer si vous souhaitez y avoir accès malgré tout.
";
$elem["apt-setup/restricted"]["default"]="true";
$elem["apt-setup/universe"]["type"]="boolean";
$elem["apt-setup/universe"]["description"]="Use software from the \"universe\" component?
 Some additional software is available in packaged form. This software is
 free and, though it is not a part of the main distribution, standard
 package management tools can be used to install it.
 .
 Please choose whether you want this software to be made available to you.
";
$elem["apt-setup/universe"]["descriptionde"]="Software von der »universe«-Komponente verwenden?
 Einige zusätzliche Software ist paketiert verfügbar. Diese Software ist frei und kann, obwohl sie nicht Teil der Hauptdistribution ist, von Standard-Paketverwaltungsprogrammen installiert werden.
 .
 Bitte wählen Sie, ob diese Programme für Sie verfügbar gemacht werden sollen.
";
$elem["apt-setup/universe"]["descriptionfr"]="Faut-il utiliser les logiciels de la composante « universe » ?
 Certains logiciels supplémentaires sont disponibles sous forme de paquets. Ces logiciels sont libres et, bien qu'ils ne fassent pas partie de la distribution principale, les outils standards de gestion des paquets peuvent être utilisés pour les installer.
 .
 Veuillez indiquer si vous souhaitez avoir accès à ces logiciels.
";
$elem["apt-setup/universe"]["default"]="true";
$elem["apt-setup/multiverse"]["type"]="boolean";
$elem["apt-setup/multiverse"]["description"]="Use software from the \"multiverse\" component?
 Some non-free software is available in packaged form. Though this software
 is not a part of the main distribution, standard package management tools
 can be used to install it. This software has varying licenses and (in some
 cases) patent restrictions which may prevent you from using, modifying, or
 sharing it.
 .
 Please choose whether you want this software to be made available to you.
";
$elem["apt-setup/multiverse"]["descriptionde"]="Software von der »multiverse«-Komponente verwenden?
 Einige non-free-Software ist paketiert verfügbar. Obwohl diese Software nicht Teil der Hauptdistribution ist, können Standard-Paketverwaltungsprogramme zu ihrer Installation verwendet werden. Diese Software hat verschiedene Lizenzen und (in einigen Fällen) Patenteinschränkungen, welche Sie an der Benutzung, Modifikation oder Verbreitung der Programme hindern könnten.
 .
 Bitte wählen Sie, ob diese Programme für Sie verfügbar gemacht werden sollen.
";
$elem["apt-setup/multiverse"]["descriptionfr"]="Faut-il utiliser les logiciels de la composante « multiverse » ?
 Certains logiciels non libres sont disponibles sous forme de paquets. Bien que ces logiciels ne fassent pas partie de la distribution principale, il est possible d'utiliser les outils standards de gestion des paquets pour les installer. Veuillez noter que ces logiciels peuvent être soumis à des licences diverses et parfois à des brevets qui peuvent vous interdire de les modifier, partager ou même de les utiliser.
 .
 Veuillez indiquer si vous souhaitez avoir accès à ces logiciels.
";
$elem["apt-setup/multiverse"]["default"]="true";
$elem["apt-setup/partner"]["type"]="boolean";
$elem["apt-setup/partner"]["description"]="Use software from the \"partner\" repository?
 Some additional software is available from Canonical's \"partner\"
 repository. This software is not part of Ubuntu, but is offered by
 Canonical and the respective vendors as a service to Ubuntu users.
 .
 Please choose whether you want this software to be made available to you.
";
$elem["apt-setup/partner"]["descriptionde"]="Software von der »partner«-Komponente verwenden?
 Einige zusätzliche Software ist über Canonical's »partner«-Archiv verfügbar. Diese Software ist nicht Teil von Ubuntu, wird jedoch von Canonical und den jeweiligen Herstellern als Service für die Ubuntu-Benutzer angeboten.
 .
 Bitte wählen Sie, ob diese Programme für Sie verfügbar gemacht werden sollen.
";
$elem["apt-setup/partner"]["descriptionfr"]="Faut-il utiliser les logiciels du dépôt « partner » ?
 Certains logiciels supplémentaires sont disponibles depuis le dépôt « partner » de Canonical. Ces logiciels ne font pas partie d'Ubuntu mais sont mis à disposition par Canonical et les distributeurs concernés pour les utilisateurs d'Ubuntu.
 .
 Veuillez indiquer si vous souhaitez avoir accès à ces logiciels.
";
$elem["apt-setup/partner"]["default"]="false";
$elem["apt-setup/backports"]["type"]="boolean";
$elem["apt-setup/backports"]["description"]="Use backported software?
 Some software has been backported from the development tree to work with
 this release. Although this software has not gone through such complete
 testing as that contained in the release, it includes newer versions of
 some applications which may provide useful features.
 .
 Please choose whether you want this software to be made available to you.
";
$elem["apt-setup/backports"]["descriptionde"]="Zurückportierte Software verwenden?
 Einige Software wurde von der Entwicklungsversion zurückportiert, um mit dieser Veröffentlichung zu funktionieren. Obwohl diese Software nicht einen solch ausführlichen Testdurchlauf wie die in der Veröffentlichung absolviert hat, enthält sie neuere Versionen bestimmter Anwendungen, die sinnvolle Eigenschaften bieten könnten.
 .
 Bitte wählen Sie, ob diese Programme für Sie verfügbar gemacht werden sollen.
";
$elem["apt-setup/backports"]["descriptionfr"]="Faut-il utiliser les logiciels rétroportés ?
 Certains logiciels ont été portés depuis les branches de développement pour pouvoir fonctionner avec cette version de la distribution. Bien que ces logiciels n'aient pas été essayés aussi soigneusement que ceux de la distribution, ils peuvent inclure de nouvelles versions de certaines applications comportant des fonctionnalités utiles.
 .
 Veuillez indiquer si vous souhaitez avoir accès à ces logiciels.
";
$elem["apt-setup/backports"]["default"]="true";
$elem["apt-setup/proposed"]["type"]="boolean";
$elem["apt-setup/proposed"]["description"]="Use proposed updates?
 Preseed this question to 'true' to test proposed updates during
 installation. Most users should leave this at 'false' unless otherwise
 recommended by a developer.

";
$elem["apt-setup/proposed"]["descriptionde"]="";
$elem["apt-setup/proposed"]["descriptionfr"]="";
$elem["apt-setup/proposed"]["default"]="false";
$elem["apt-setup/overlay"]["type"]="boolean";
$elem["apt-setup/overlay"]["description"]="Use an overlay archive?
 This adds an overlay archive for pulling udebs from a third-party source, and
 is normally only used for post-release hardware support. Do not enable this
 option unless instructed to by a developer.

";
$elem["apt-setup/overlay"]["descriptionde"]="";
$elem["apt-setup/overlay"]["descriptionfr"]="";
$elem["apt-setup/overlay"]["default"]="false";
$elem["apt-setup/overlay_host"]["type"]="string";
$elem["apt-setup/overlay_host"]["description"]="for internal use; can be preseeded
 Overlay archive location

";
$elem["apt-setup/overlay_host"]["descriptionde"]="";
$elem["apt-setup/overlay_host"]["descriptionfr"]="";
$elem["apt-setup/overlay_host"]["default"]="ppa.launchpad.net";
$elem["apt-setup/overlay_directory"]["type"]="string";
$elem["apt-setup/overlay_directory"]["description"]="for internal use; can be preseeded
 Overlay archive path

";
$elem["apt-setup/overlay_directory"]["descriptionde"]="";
$elem["apt-setup/overlay_directory"]["descriptionfr"]="";
$elem["apt-setup/overlay_directory"]["default"]="/";
$elem["apt-setup/overlay_components"]["type"]="string";
$elem["apt-setup/overlay_components"]["description"]="for internal use; can be preseeded
 Overlay archive components

";
$elem["apt-setup/overlay_components"]["descriptionde"]="";
$elem["apt-setup/overlay_components"]["descriptionfr"]="";
$elem["apt-setup/overlay_components"]["default"]="main";
$elem["debian-installer/apt-setup-udeb/title"]["type"]="text";
$elem["debian-installer/apt-setup-udeb/title"]["description"]="Configure the package manager
";
$elem["debian-installer/apt-setup-udeb/title"]["descriptionde"]="Paketmanager konfigurieren
";
$elem["debian-installer/apt-setup-udeb/title"]["descriptionfr"]="Configurer l'outil de gestion des paquets
";
$elem["debian-installer/apt-setup-udeb/title"]["default"]="";
$elem["apt-setup/progress/title"]["type"]="text";
$elem["apt-setup/progress/title"]["description"]="Configuring apt
";
$elem["apt-setup/progress/title"]["descriptionde"]="Konfigurieren von apt
";
$elem["apt-setup/progress/title"]["descriptionfr"]="Configuration de l'outil de gestion des paquets (APT)
";
$elem["apt-setup/progress/title"]["default"]="";
$elem["apt-setup/progress/fallback"]["type"]="text";
$elem["apt-setup/progress/fallback"]["description"]="Running ${SCRIPT}...
";
$elem["apt-setup/progress/fallback"]["descriptionde"]="Ausführen von ${SCRIPT} ...
";
$elem["apt-setup/progress/fallback"]["descriptionfr"]="Exécution du script ${SCRIPT}...
";
$elem["apt-setup/progress/fallback"]["default"]="";
$elem["apt-setup/progress/local"]["type"]="text";
$elem["apt-setup/progress/local"]["description"]="Scanning local repositories...
";
$elem["apt-setup/progress/local"]["descriptionde"]="Durchsuchen lokaler Archive ...
";
$elem["apt-setup/progress/local"]["descriptionfr"]="Analyse des dépôts locaux...
";
$elem["apt-setup/progress/local"]["default"]="";
$elem["apt-setup/progress/security"]["type"]="text";
$elem["apt-setup/progress/security"]["description"]="Scanning the security updates repository...
";
$elem["apt-setup/progress/security"]["descriptionde"]="Durchsuchen des Security-Archivs (für Sicherheitsaktualisierungen) ...
";
$elem["apt-setup/progress/security"]["descriptionfr"]="Analyse du dépôt des mises à jour de sécurité...
";
$elem["apt-setup/progress/security"]["default"]="";
$elem["apt-setup/progress/updates"]["type"]="text";
$elem["apt-setup/progress/updates"]["description"]="Scanning the release updates repository...
";
$elem["apt-setup/progress/updates"]["descriptionde"]="Durchsuchen des Archivs für Release-Updates ...
";
$elem["apt-setup/progress/updates"]["descriptionfr"]="Analyse du dépôt des mises à jour de la publication...
";
$elem["apt-setup/progress/updates"]["default"]="";
$elem["apt-setup/progress/backports"]["type"]="text";
$elem["apt-setup/progress/backports"]["description"]="Scanning the backports repository...
";
$elem["apt-setup/progress/backports"]["descriptionde"]="";
$elem["apt-setup/progress/backports"]["descriptionfr"]="";
$elem["apt-setup/progress/backports"]["default"]="";
$elem["apt-setup/local/key-error"]["type"]="select";
$elem["apt-setup/local/key-error"]["choices"][1]="Retry";
$elem["apt-setup/local/key-error"]["choicesde"][1]="Wiederholen";
$elem["apt-setup/local/key-error"]["choicesfr"][1]="Réessayer";
$elem["apt-setup/local/key-error"]["description"]="Downloading local repository key failed:
 The installer failed to download the public key used to sign the local
 repository at ${MIRROR}:
 .
 ${URL}
 .
 This may be a problem with your network, or with the server hosting this
 key. You can choose to retry the download, or ignore the problem and
 continue without all the packages from this repository.
";
$elem["apt-setup/local/key-error"]["descriptionde"]="Herunterladen des Schlüssels für lokales Depot fehlgeschlagen:
 Der Installer konnte den öffentlichen Schlüssel, der zur Signierung des lokalen Depots auf ${MIRROR} verwendet wurde, nicht herunterladen:
 .
 ${URL}
 .
 Dies könnte ein Problem mit Ihrem Netzwerk sein oder mit dem Server, der diesen Schlüssel beherbergt. Sie können das Herunterladen wiederholen oder das Problem ignorieren und ohne all die Pakete von diesem Server fortfahren.
";
$elem["apt-setup/local/key-error"]["descriptionfr"]="Échec du téléchargement de la clé d'authentification du dépôt local :
 Le programme d'installation n'a pas pu télécharger la clé publique utilisée pour l'authentification du dépôt local à l'adresse ${MIRROR} :
 .
 ${URL}
 .
 Cela peut être dû à un problème lié au réseau ou à un problème sur le serveur qui héberge cette clé. Vous pouvez réessayer le téléchargement ou ignorer le problème et continuer avec les paquets récupérés sur ce dépôt.
";
$elem["apt-setup/local/key-error"]["default"]="Retry";
$elem["apt-setup/security_host"]["type"]="string";
$elem["apt-setup/security_host"]["description"]="for internal use; can be preseeded
 Host to use for security updates

";
$elem["apt-setup/security_host"]["descriptionde"]="";
$elem["apt-setup/security_host"]["descriptionfr"]="";
$elem["apt-setup/security_host"]["default"]="security.ubuntu.com";
$elem["apt-setup/security_path"]["type"]="string";
$elem["apt-setup/security_path"]["description"]="for internal use; can be preseeded
 Path to use for security updates

";
$elem["apt-setup/security_path"]["descriptionde"]="";
$elem["apt-setup/security_path"]["descriptionfr"]="";
$elem["apt-setup/security_path"]["default"]="/ubuntu";
$elem["apt-setup/service-failed"]["type"]="error";
$elem["apt-setup/service-failed"]["description"]="Cannot access repository
 The repository on ${HOST} couldn't be accessed, so its
 updates will not be made available to you at this time. You should
 investigate this later.
 .
 Commented out entries for ${HOST} have been added to the
 /etc/apt/sources.list file.
";
$elem["apt-setup/service-failed"]["descriptionde"]="Es konnte nicht auf das Archiv zugegriffen werden
 Auf das Archiv auf ${HOST} konnte nicht zugegriffen werden. Diese Aktualisierungen werden jetzt nicht verwendet. Sie sollten dies später analysieren.
 .
 Auskommentierte Einträge für ${HOST} wurden zur Datei /etc/apt/sources.list hinzugefügt.
";
$elem["apt-setup/service-failed"]["descriptionfr"]="Impossible d'accéder au dépôt
 Le dépôt sur le site ${HOST} est inaccessible ; ses mises à jour ne seront pas disponibles pour cette fois. Vous pourrez chercher plus tard la raison de cette erreur.
 .
 Des entrées désactivées pour le serveur ${HOST} ont été ajoutées à la fin du fichier de configuration de l'outil de gestion des paquets APT (/etc/apt/sources.list).
";
$elem["apt-setup/service-failed"]["default"]="";
$elem["apt-setup/services-select"]["type"]="multiselect";
$elem["apt-setup/services-select"]["choices"][1]="security updates (from ${SEC_HOST})";
$elem["apt-setup/services-select"]["choices"][2]="release updates";
$elem["apt-setup/services-select"]["description"]="Services to use:
 Debian has two services that provide updates to releases: security and
 release updates.
 .
 Security updates help to keep your system secured against attacks. Enabling
 this service is strongly recommended.
 .
 Release updates provide more current versions for software that changes
 relatively frequently and where not having the latest version could reduce
 the usability of the software. It also provides regression fixes.
 This service is only available for stable and oldstable releases.
 .
 Backported software are adapted from the development version to work with
 this release. Although this software has not gone through such complete
 testing as that contained in the release, it includes newer versions of
 some applications which may provide useful features. Enabling backports
 here does not cause any of them to be installed by default; it only
 allows you to manually select backports to use.
";
$elem["apt-setup/services-select"]["descriptionde"]="";
$elem["apt-setup/services-select"]["descriptionfr"]="";
$elem["apt-setup/services-select"]["default"]="security, updates";
$elem["apt-setup/enable-source-repositories"]["type"]="boolean";
$elem["apt-setup/enable-source-repositories"]["description"]="Enable source repositories in APT?
 By default source repositories are listed in /etc/apt/sources.list (with
 appropriate \"deb-src\" lines) so that \"apt-get source\" works. However, if
 you don't need this feature, you can disable those entries and save some
 bandwidth during \"apt-get update\" operations.

";
$elem["apt-setup/enable-source-repositories"]["descriptionde"]="";
$elem["apt-setup/enable-source-repositories"]["descriptionfr"]="";
$elem["apt-setup/enable-source-repositories"]["default"]="false";
$elem["apt-setup/services-select-ubuntu"]["type"]="multiselect";
$elem["apt-setup/services-select-ubuntu"]["choices"][1]="security updates (from ${SEC_HOST})";
$elem["apt-setup/services-select-ubuntu"]["description"]="Services to use:
 Ubuntu has some additional services that provide updates to releases and
 add-on packages.
 .
 Security updates help to keep your system secured against attacks. Enabling
 this service is strongly recommended.
 .
 The partner archive contains software provided by Canonical's partners as a
 service to Ubuntu users.

";
$elem["apt-setup/services-select-ubuntu"]["descriptionde"]="";
$elem["apt-setup/services-select-ubuntu"]["descriptionfr"]="";
$elem["apt-setup/services-select-ubuntu"]["default"]="security";
$elem["apt-setup/multiarch"]["type"]="string";
$elem["apt-setup/multiarch"]["description"]="for internal use; can be preseeded
 Set to the list of architectures for which packages can be installed
 without using 'dpkg --force-architecture', in addition to the native
 architecture. If empty, only allow installing packages from the native
 architecture.

";
$elem["apt-setup/multiarch"]["descriptionde"]="";
$elem["apt-setup/multiarch"]["descriptionfr"]="";
$elem["apt-setup/multiarch"]["default"]="";
$elem["debian-installer/bootstrap-base/title"]["type"]="text";
$elem["debian-installer/bootstrap-base/title"]["description"]="Install the base system
";
$elem["debian-installer/bootstrap-base/title"]["descriptionde"]="Grundsystem installieren
";
$elem["debian-installer/bootstrap-base/title"]["descriptionfr"]="Installer le système de base
";
$elem["debian-installer/bootstrap-base/title"]["default"]="";
$elem["mirror/country"]["type"]="string";
$elem["mirror/country"]["description"]="country code or \"manual\" (for internal use)

";
$elem["mirror/country"]["descriptionde"]="";
$elem["mirror/country"]["descriptionfr"]="";
$elem["mirror/country"]["default"]="";
$elem["mirror/suite"]["type"]="select";
$elem["mirror/suite"]["description"]="Ubuntu version to install:
 In Ubuntu, this question is never asked, and is only for preseeding.
 Caveat emptor.

";
$elem["mirror/suite"]["descriptionde"]="";
$elem["mirror/suite"]["descriptionfr"]="";
$elem["mirror/suite"]["default"]="xenial";
$elem["mirror/codename"]["type"]="string";
$elem["mirror/codename"]["description"]="for internal use only

";
$elem["mirror/codename"]["descriptionde"]="";
$elem["mirror/codename"]["descriptionfr"]="";
$elem["mirror/codename"]["default"]="";
$elem["mirror/checking_title"]["type"]="text";
$elem["mirror/checking_title"]["description"]="Checking the Ubuntu archive mirror
";
$elem["mirror/checking_title"]["descriptionde"]="Prüfen des Ubuntu-Archiv-Spiegelservers
";
$elem["mirror/checking_title"]["descriptionfr"]="Vérification du miroir de l'archive Ubuntu
";
$elem["mirror/checking_title"]["default"]="";
$elem["mirror/checking_download"]["type"]="text";
$elem["mirror/checking_download"]["description"]="Downloading Release files...
";
$elem["mirror/checking_download"]["descriptionde"]="Herunterladen der Release-Dateien ...
";
$elem["mirror/checking_download"]["descriptionfr"]="Téléchargement des fichiers « Release »...
";
$elem["mirror/checking_download"]["default"]="";
$elem["mirror/no-default"]["type"]="boolean";
$elem["mirror/no-default"]["description"]="Go back and try a different mirror?
 The specified (default) Ubuntu version (${RELEASE}) is not available from
 the selected mirror. It is possible to continue and select a different
 release for your installation, but normally you should go back and select
 a different mirror that does support the correct version.
";
$elem["mirror/no-default"]["descriptionde"]="Zurückgehen und einen anderen Spiegel ausprobieren?
 Die festgelegte (standardmäßige) Ubuntu-Version (${RELEASE}) ist auf dem
 ausgewählten Spiegel nicht verfügbar. Es ist möglich, fortzufahren und
 eine andere Version für die Installation zu wählen, aber normalerweise
 sollten Sie zurückgehen und einen anderen Spiegelserver auswählen, der
 die korrekte Version unterstützt.
";
$elem["mirror/no-default"]["descriptionfr"]="Revenir en arrière et choisir un autre miroir ?
 La version d'Ubuntu indiquée (${RELEASE}) n'est pas disponible sur le
 miroir que vous avez choisi. Vous pouvez continuer et choisir une autre
 version à installer ou revenir en arrière et choisir un autre miroir qui
 offre la version recherché.
";
$elem["mirror/no-default"]["default"]="true";
$elem["mirror/bad"]["type"]="error";
$elem["mirror/bad"]["description"]="Bad archive mirror
 An error has been detected while trying to use the specified Ubuntu archive
 mirror.
 .
 Possible reasons for the error are: incorrect mirror specified; mirror is
 not available (possibly due to an unreliable network connection); mirror is
 broken (for example because an invalid Release file was found); mirror does
 not support the correct Ubuntu version.
 .
 Additional details may be available in /var/log/syslog or on virtual console 4.
 .
 Please check the specified mirror or try a different one.
";
$elem["mirror/bad"]["descriptionde"]="Ungültiger Archiv-Spiegel
 Beim Versuch, den angegebenen Ubuntu-Archiv-Spiegelserver zu verwenden,
 wurde ein Fehler erkannt.
 .
 Mögliche Ursachen für den Fehler sind: falscher Spiegelserver wurde
 angegeben; Spiegel ist nicht erreichbar (möglicherweise aufgrund einer
 unzuverlässigen Netzwerkverbindung); Spiegel ist beschädigt (zum
 Beispiel weil eine ungültige Release-Datei gefunden wurde); Spiegel
 unterstützt die korrekte Ubuntu-Version nicht.
 .
 Zusätzliche Details finden Sie möglicherweise in /var/log/syslog oder
 auf der vierten virtuellen Konsole.
 .
 Bitte überprüfen Sie den angegebenen Spiegelserver oder versuchen Sie
 einen anderen.
";
$elem["mirror/bad"]["descriptionfr"]="Miroir de l'archive Ubuntu corrompu
 Une erreur s'est produite à l'utilisation du miroir indiqué pour
 l'archive Ubuntu.
 .
 Les raisons possibles pour cette erreur sont : un miroir incorrect a
 été indiqué (par exemple à cause d'une connexion réseau
 défaillante), le miroir est incomplet (par exemple si un fichier Release
 non valable y a été trouvé) ou le miroir ne comporte pas la version
 d'Ubuntu indiquée.
 .
 Des informations supplémentaires sont disponibles dans le fichier
 /var/log/syslog ou sur la quatrième console virtuelle.
 .
 Veuillez vérifier le miroir indiqué ou en essayer un autre.
";
$elem["mirror/bad"]["default"]="";
$elem["mirror/noarch"]["type"]="error";
$elem["mirror/noarch"]["description"]="Architecture not supported
 The specified Ubuntu archive mirror does not seem to support your
 architecture. Please try a different mirror.
";
$elem["mirror/noarch"]["descriptionde"]="Architektur nicht unterstützt
 Der angegebene Ubuntu-Archiv-Spiegel scheint Ihre Architektur nicht zu
 unterstützen. Bitte wählen Sie einen anderen Spiegelserver.
";
$elem["mirror/noarch"]["descriptionfr"]="Architecture non prise en charge
 Le miroir de l'archive Ubuntu indiqué ne propose pas l'architecture
 matérielle que vous utilisez. Veuillez essayer d'utiliser un autre miroir
 de l'archive.
";
$elem["mirror/noarch"]["default"]="";
$elem["mirror/suites/oldstable"]["type"]="text";
$elem["mirror/suites/oldstable"]["description"]="oldstable
";
$elem["mirror/suites/oldstable"]["descriptionde"]="Oldstable
";
$elem["mirror/suites/oldstable"]["descriptionfr"]="Ancienne version stable
";
$elem["mirror/suites/oldstable"]["default"]="";
$elem["mirror/suites/stable"]["type"]="text";
$elem["mirror/suites/stable"]["description"]="stable
";
$elem["mirror/suites/stable"]["descriptionde"]="Stable
";
$elem["mirror/suites/stable"]["descriptionfr"]="Stable
";
$elem["mirror/suites/stable"]["default"]="";
$elem["mirror/suites/testing"]["type"]="text";
$elem["mirror/suites/testing"]["description"]="testing
";
$elem["mirror/suites/testing"]["descriptionde"]="Testing
";
$elem["mirror/suites/testing"]["descriptionfr"]="Testing
";
$elem["mirror/suites/testing"]["default"]="";
$elem["mirror/suites/unstable"]["type"]="text";
$elem["mirror/suites/unstable"]["description"]="unstable
";
$elem["mirror/suites/unstable"]["descriptionde"]="Unstable
";
$elem["mirror/suites/unstable"]["descriptionfr"]="Unstable
";
$elem["mirror/suites/unstable"]["default"]="";
$elem["debian-installer/choose-mirror/title"]["type"]="text";
$elem["debian-installer/choose-mirror/title"]["description"]="Choose a mirror of the Ubuntu archive
";
$elem["debian-installer/choose-mirror/title"]["descriptionde"]="Spiegelserver für das Ubuntu-Archiv wählen
";
$elem["debian-installer/choose-mirror/title"]["descriptionfr"]="Choisir un miroir de l'archive Ubuntu
";
$elem["debian-installer/choose-mirror/title"]["default"]="";
$elem["mirror/http/countries"]["type"]="select";
$elem["mirror/http/countries"]["choices"][1]="enter information manually";
$elem["mirror/http/countries"]["choices"][2]="Afghanistan";
$elem["mirror/http/countries"]["choices"][3]="Albania";
$elem["mirror/http/countries"]["choices"][4]="Algeria";
$elem["mirror/http/countries"]["choices"][5]="American Samoa";
$elem["mirror/http/countries"]["choices"][6]="Andorra";
$elem["mirror/http/countries"]["choices"][7]="Angola";
$elem["mirror/http/countries"]["choices"][8]="Anguilla";
$elem["mirror/http/countries"]["choices"][9]="Antarctica";
$elem["mirror/http/countries"]["choices"][10]="Antigua and Barbuda";
$elem["mirror/http/countries"]["choices"][11]="Argentina";
$elem["mirror/http/countries"]["choices"][12]="Armenia";
$elem["mirror/http/countries"]["choices"][13]="Aruba";
$elem["mirror/http/countries"]["choices"][14]="Australia";
$elem["mirror/http/countries"]["choices"][15]="Austria";
$elem["mirror/http/countries"]["choices"][16]="Azerbaijan";
$elem["mirror/http/countries"]["choices"][17]="Bahamas";
$elem["mirror/http/countries"]["choices"][18]="Bahrain";
$elem["mirror/http/countries"]["choices"][19]="Bangladesh";
$elem["mirror/http/countries"]["choices"][20]="Barbados";
$elem["mirror/http/countries"]["choices"][21]="Belarus";
$elem["mirror/http/countries"]["choices"][22]="Belgium";
$elem["mirror/http/countries"]["choices"][23]="Belize";
$elem["mirror/http/countries"]["choices"][24]="Benin";
$elem["mirror/http/countries"]["choices"][25]="Bermuda";
$elem["mirror/http/countries"]["choices"][26]="Bhutan";
$elem["mirror/http/countries"]["choices"][27]="Bolivia";
$elem["mirror/http/countries"]["choices"][28]="Bonaire\";
$elem["mirror/http/countries"]["choices"][29]="Sint Eustatius and Saba";
$elem["mirror/http/countries"]["choices"][30]="Bosnia and Herzegovina";
$elem["mirror/http/countries"]["choices"][31]="Botswana";
$elem["mirror/http/countries"]["choices"][32]="Bouvet Island";
$elem["mirror/http/countries"]["choices"][33]="Brazil";
$elem["mirror/http/countries"]["choices"][34]="British Indian Ocean Territory";
$elem["mirror/http/countries"]["choices"][35]="Brunei Darussalam";
$elem["mirror/http/countries"]["choices"][36]="Bulgaria";
$elem["mirror/http/countries"]["choices"][37]="Burkina Faso";
$elem["mirror/http/countries"]["choices"][38]="Burundi";
$elem["mirror/http/countries"]["choices"][39]="Cambodia";
$elem["mirror/http/countries"]["choices"][40]="Cameroon";
$elem["mirror/http/countries"]["choices"][41]="Canada";
$elem["mirror/http/countries"]["choices"][42]="Cape Verde";
$elem["mirror/http/countries"]["choices"][43]="Cayman Islands";
$elem["mirror/http/countries"]["choices"][44]="Central African Republic";
$elem["mirror/http/countries"]["choices"][45]="Chad";
$elem["mirror/http/countries"]["choices"][46]="Chile";
$elem["mirror/http/countries"]["choices"][47]="China";
$elem["mirror/http/countries"]["choices"][48]="Christmas Island";
$elem["mirror/http/countries"]["choices"][49]="Cocos (Keeling) Islands";
$elem["mirror/http/countries"]["choices"][50]="Colombia";
$elem["mirror/http/countries"]["choices"][51]="Comoros";
$elem["mirror/http/countries"]["choices"][52]="Congo";
$elem["mirror/http/countries"]["choices"][53]="Congo\";
$elem["mirror/http/countries"]["choices"][54]="The Democratic Republic of the";
$elem["mirror/http/countries"]["choices"][55]="Cook Islands";
$elem["mirror/http/countries"]["choices"][56]="Costa Rica";
$elem["mirror/http/countries"]["choices"][57]="Croatia";
$elem["mirror/http/countries"]["choices"][58]="Cuba";
$elem["mirror/http/countries"]["choices"][59]="Curaçao";
$elem["mirror/http/countries"]["choices"][60]="Cyprus";
$elem["mirror/http/countries"]["choices"][61]="Czech Republic";
$elem["mirror/http/countries"]["choices"][62]="Côte d'Ivoire";
$elem["mirror/http/countries"]["choices"][63]="Denmark";
$elem["mirror/http/countries"]["choices"][64]="Djibouti";
$elem["mirror/http/countries"]["choices"][65]="Dominica";
$elem["mirror/http/countries"]["choices"][66]="Dominican Republic";
$elem["mirror/http/countries"]["choices"][67]="Ecuador";
$elem["mirror/http/countries"]["choices"][68]="Egypt";
$elem["mirror/http/countries"]["choices"][69]="El Salvador";
$elem["mirror/http/countries"]["choices"][70]="Equatorial Guinea";
$elem["mirror/http/countries"]["choices"][71]="Eritrea";
$elem["mirror/http/countries"]["choices"][72]="Estonia";
$elem["mirror/http/countries"]["choices"][73]="Ethiopia";
$elem["mirror/http/countries"]["choices"][74]="Falkland Islands (Malvinas)";
$elem["mirror/http/countries"]["choices"][75]="Faroe Islands";
$elem["mirror/http/countries"]["choices"][76]="Fiji";
$elem["mirror/http/countries"]["choices"][77]="Finland";
$elem["mirror/http/countries"]["choices"][78]="France";
$elem["mirror/http/countries"]["choices"][79]="French Guiana";
$elem["mirror/http/countries"]["choices"][80]="French Polynesia";
$elem["mirror/http/countries"]["choices"][81]="French Southern Territories";
$elem["mirror/http/countries"]["choices"][82]="Gabon";
$elem["mirror/http/countries"]["choices"][83]="Gambia";
$elem["mirror/http/countries"]["choices"][84]="Georgia";
$elem["mirror/http/countries"]["choices"][85]="Germany";
$elem["mirror/http/countries"]["choices"][86]="Ghana";
$elem["mirror/http/countries"]["choices"][87]="Gibraltar";
$elem["mirror/http/countries"]["choices"][88]="Greece";
$elem["mirror/http/countries"]["choices"][89]="Greenland";
$elem["mirror/http/countries"]["choices"][90]="Grenada";
$elem["mirror/http/countries"]["choices"][91]="Guadeloupe";
$elem["mirror/http/countries"]["choices"][92]="Guam";
$elem["mirror/http/countries"]["choices"][93]="Guatemala";
$elem["mirror/http/countries"]["choices"][94]="Guernsey";
$elem["mirror/http/countries"]["choices"][95]="Guinea";
$elem["mirror/http/countries"]["choices"][96]="Guinea-Bissau";
$elem["mirror/http/countries"]["choices"][97]="Guyana";
$elem["mirror/http/countries"]["choices"][98]="Haiti";
$elem["mirror/http/countries"]["choices"][99]="Heard Island and McDonald Islands";
$elem["mirror/http/countries"]["choices"][100]="Holy See (Vatican City State)";
$elem["mirror/http/countries"]["choices"][101]="Honduras";
$elem["mirror/http/countries"]["choices"][102]="Hong Kong";
$elem["mirror/http/countries"]["choices"][103]="Hungary";
$elem["mirror/http/countries"]["choices"][104]="Iceland";
$elem["mirror/http/countries"]["choices"][105]="India";
$elem["mirror/http/countries"]["choices"][106]="Indonesia";
$elem["mirror/http/countries"]["choices"][107]="Iran\";
$elem["mirror/http/countries"]["choices"][108]="Islamic Republic of";
$elem["mirror/http/countries"]["choices"][109]="Iraq";
$elem["mirror/http/countries"]["choices"][110]="Ireland";
$elem["mirror/http/countries"]["choices"][111]="Isle of Man";
$elem["mirror/http/countries"]["choices"][112]="Israel";
$elem["mirror/http/countries"]["choices"][113]="Italy";
$elem["mirror/http/countries"]["choices"][114]="Jamaica";
$elem["mirror/http/countries"]["choices"][115]="Japan";
$elem["mirror/http/countries"]["choices"][116]="Jersey";
$elem["mirror/http/countries"]["choices"][117]="Jordan";
$elem["mirror/http/countries"]["choices"][118]="Kazakhstan";
$elem["mirror/http/countries"]["choices"][119]="Kenya";
$elem["mirror/http/countries"]["choices"][120]="Kiribati";
$elem["mirror/http/countries"]["choices"][121]="Korea\";
$elem["mirror/http/countries"]["choices"][122]="Democratic People's Republic of";
$elem["mirror/http/countries"]["choices"][123]="Korea\";
$elem["mirror/http/countries"]["choices"][124]="Republic of";
$elem["mirror/http/countries"]["choices"][125]="Kuwait";
$elem["mirror/http/countries"]["choices"][126]="Kyrgyzstan";
$elem["mirror/http/countries"]["choices"][127]="Lao People's Democratic Republic";
$elem["mirror/http/countries"]["choices"][128]="Latvia";
$elem["mirror/http/countries"]["choices"][129]="Lebanon";
$elem["mirror/http/countries"]["choices"][130]="Lesotho";
$elem["mirror/http/countries"]["choices"][131]="Liberia";
$elem["mirror/http/countries"]["choices"][132]="Libya";
$elem["mirror/http/countries"]["choices"][133]="Liechtenstein";
$elem["mirror/http/countries"]["choices"][134]="Lithuania";
$elem["mirror/http/countries"]["choices"][135]="Luxembourg";
$elem["mirror/http/countries"]["choices"][136]="Macao";
$elem["mirror/http/countries"]["choices"][137]="Macedonia\";
$elem["mirror/http/countries"]["choices"][138]="Republic of";
$elem["mirror/http/countries"]["choices"][139]="Madagascar";
$elem["mirror/http/countries"]["choices"][140]="Malawi";
$elem["mirror/http/countries"]["choices"][141]="Malaysia";
$elem["mirror/http/countries"]["choices"][142]="Maldives";
$elem["mirror/http/countries"]["choices"][143]="Mali";
$elem["mirror/http/countries"]["choices"][144]="Malta";
$elem["mirror/http/countries"]["choices"][145]="Marshall Islands";
$elem["mirror/http/countries"]["choices"][146]="Martinique";
$elem["mirror/http/countries"]["choices"][147]="Mauritania";
$elem["mirror/http/countries"]["choices"][148]="Mauritius";
$elem["mirror/http/countries"]["choices"][149]="Mayotte";
$elem["mirror/http/countries"]["choices"][150]="Mexico";
$elem["mirror/http/countries"]["choices"][151]="Micronesia\";
$elem["mirror/http/countries"]["choices"][152]="Federated States of";
$elem["mirror/http/countries"]["choices"][153]="Moldova";
$elem["mirror/http/countries"]["choices"][154]="Monaco";
$elem["mirror/http/countries"]["choices"][155]="Mongolia";
$elem["mirror/http/countries"]["choices"][156]="Montenegro";
$elem["mirror/http/countries"]["choices"][157]="Montserrat";
$elem["mirror/http/countries"]["choices"][158]="Morocco";
$elem["mirror/http/countries"]["choices"][159]="Mozambique";
$elem["mirror/http/countries"]["choices"][160]="Myanmar";
$elem["mirror/http/countries"]["choices"][161]="Namibia";
$elem["mirror/http/countries"]["choices"][162]="Nauru";
$elem["mirror/http/countries"]["choices"][163]="Nepal";
$elem["mirror/http/countries"]["choices"][164]="Netherlands";
$elem["mirror/http/countries"]["choices"][165]="New Caledonia";
$elem["mirror/http/countries"]["choices"][166]="New Zealand";
$elem["mirror/http/countries"]["choices"][167]="Nicaragua";
$elem["mirror/http/countries"]["choices"][168]="Niger";
$elem["mirror/http/countries"]["choices"][169]="Nigeria";
$elem["mirror/http/countries"]["choices"][170]="Niue";
$elem["mirror/http/countries"]["choices"][171]="Norfolk Island";
$elem["mirror/http/countries"]["choices"][172]="Northern Mariana Islands";
$elem["mirror/http/countries"]["choices"][173]="Norway";
$elem["mirror/http/countries"]["choices"][174]="Oman";
$elem["mirror/http/countries"]["choices"][175]="Pakistan";
$elem["mirror/http/countries"]["choices"][176]="Palau";
$elem["mirror/http/countries"]["choices"][177]="Palestine\";
$elem["mirror/http/countries"]["choices"][178]="State of";
$elem["mirror/http/countries"]["choices"][179]="Panama";
$elem["mirror/http/countries"]["choices"][180]="Papua New Guinea";
$elem["mirror/http/countries"]["choices"][181]="Paraguay";
$elem["mirror/http/countries"]["choices"][182]="Peru";
$elem["mirror/http/countries"]["choices"][183]="Philippines";
$elem["mirror/http/countries"]["choices"][184]="Pitcairn";
$elem["mirror/http/countries"]["choices"][185]="Poland";
$elem["mirror/http/countries"]["choices"][186]="Portugal";
$elem["mirror/http/countries"]["choices"][187]="Puerto Rico";
$elem["mirror/http/countries"]["choices"][188]="Qatar";
$elem["mirror/http/countries"]["choices"][189]="Romania";
$elem["mirror/http/countries"]["choices"][190]="Russian Federation";
$elem["mirror/http/countries"]["choices"][191]="Rwanda";
$elem["mirror/http/countries"]["choices"][192]="Réunion";
$elem["mirror/http/countries"]["choices"][193]="Saint Barthélemy";
$elem["mirror/http/countries"]["choices"][194]="Saint Helena\";
$elem["mirror/http/countries"]["choices"][195]="Ascension and Tristan da Cunha";
$elem["mirror/http/countries"]["choices"][196]="Saint Kitts and Nevis";
$elem["mirror/http/countries"]["choices"][197]="Saint Lucia";
$elem["mirror/http/countries"]["choices"][198]="Saint Martin (French part)";
$elem["mirror/http/countries"]["choices"][199]="Saint Pierre and Miquelon";
$elem["mirror/http/countries"]["choices"][200]="Saint Vincent and the Grenadines";
$elem["mirror/http/countries"]["choices"][201]="Samoa";
$elem["mirror/http/countries"]["choices"][202]="San Marino";
$elem["mirror/http/countries"]["choices"][203]="Sao Tome and Principe";
$elem["mirror/http/countries"]["choices"][204]="Saudi Arabia";
$elem["mirror/http/countries"]["choices"][205]="Senegal";
$elem["mirror/http/countries"]["choices"][206]="Serbia";
$elem["mirror/http/countries"]["choices"][207]="Seychelles";
$elem["mirror/http/countries"]["choices"][208]="Sierra Leone";
$elem["mirror/http/countries"]["choices"][209]="Singapore";
$elem["mirror/http/countries"]["choices"][210]="Sint Maarten (Dutch part)";
$elem["mirror/http/countries"]["choices"][211]="Slovakia";
$elem["mirror/http/countries"]["choices"][212]="Slovenia";
$elem["mirror/http/countries"]["choices"][213]="Solomon Islands";
$elem["mirror/http/countries"]["choices"][214]="Somalia";
$elem["mirror/http/countries"]["choices"][215]="South Africa";
$elem["mirror/http/countries"]["choices"][216]="South Georgia and the South Sandwich Islands";
$elem["mirror/http/countries"]["choices"][217]="South Sudan";
$elem["mirror/http/countries"]["choices"][218]="Spain";
$elem["mirror/http/countries"]["choices"][219]="Sri Lanka";
$elem["mirror/http/countries"]["choices"][220]="Sudan";
$elem["mirror/http/countries"]["choices"][221]="Suriname";
$elem["mirror/http/countries"]["choices"][222]="Svalbard and Jan Mayen";
$elem["mirror/http/countries"]["choices"][223]="Swaziland";
$elem["mirror/http/countries"]["choices"][224]="Sweden";
$elem["mirror/http/countries"]["choices"][225]="Switzerland";
$elem["mirror/http/countries"]["choices"][226]="Syrian Arab Republic";
$elem["mirror/http/countries"]["choices"][227]="Taiwan";
$elem["mirror/http/countries"]["choices"][228]="Tajikistan";
$elem["mirror/http/countries"]["choices"][229]="Tanzania";
$elem["mirror/http/countries"]["choices"][230]="Thailand";
$elem["mirror/http/countries"]["choices"][231]="Timor-Leste";
$elem["mirror/http/countries"]["choices"][232]="Togo";
$elem["mirror/http/countries"]["choices"][233]="Tokelau";
$elem["mirror/http/countries"]["choices"][234]="Tonga";
$elem["mirror/http/countries"]["choices"][235]="Trinidad and Tobago";
$elem["mirror/http/countries"]["choices"][236]="Tunisia";
$elem["mirror/http/countries"]["choices"][237]="Turkey";
$elem["mirror/http/countries"]["choices"][238]="Turkmenistan";
$elem["mirror/http/countries"]["choices"][239]="Turks and Caicos Islands";
$elem["mirror/http/countries"]["choices"][240]="Tuvalu";
$elem["mirror/http/countries"]["choices"][241]="Uganda";
$elem["mirror/http/countries"]["choices"][242]="Ukraine";
$elem["mirror/http/countries"]["choices"][243]="United Arab Emirates";
$elem["mirror/http/countries"]["choices"][244]="United Kingdom";
$elem["mirror/http/countries"]["choices"][245]="United States";
$elem["mirror/http/countries"]["choices"][246]="United States Minor Outlying Islands";
$elem["mirror/http/countries"]["choices"][247]="Uruguay";
$elem["mirror/http/countries"]["choices"][248]="Uzbekistan";
$elem["mirror/http/countries"]["choices"][249]="Vanuatu";
$elem["mirror/http/countries"]["choices"][250]="Venezuela";
$elem["mirror/http/countries"]["choices"][251]="Viet Nam";
$elem["mirror/http/countries"]["choices"][252]="Virgin Islands\";
$elem["mirror/http/countries"]["choices"][253]="British";
$elem["mirror/http/countries"]["choices"][254]="Virgin Islands\";
$elem["mirror/http/countries"]["choices"][255]="U.S.";
$elem["mirror/http/countries"]["choices"][256]="Wallis and Futuna";
$elem["mirror/http/countries"]["choices"][257]="Western Sahara";
$elem["mirror/http/countries"]["choices"][258]="Yemen";
$elem["mirror/http/countries"]["choices"][259]="Zambia";
$elem["mirror/http/countries"]["choices"][260]="Zimbabwe";
$elem["mirror/http/countries"]["choicesde"][1]="Daten von Hand eingeben";
$elem["mirror/http/countries"]["choicesde"][2]="Afghanistan";
$elem["mirror/http/countries"]["choicesde"][3]="Albanien";
$elem["mirror/http/countries"]["choicesde"][4]="Algerien";
$elem["mirror/http/countries"]["choicesde"][5]="Amerikanisch-Samoa";
$elem["mirror/http/countries"]["choicesde"][6]="Andorra";
$elem["mirror/http/countries"]["choicesde"][7]="Angola";
$elem["mirror/http/countries"]["choicesde"][8]="Anguilla";
$elem["mirror/http/countries"]["choicesde"][9]="Antarktis";
$elem["mirror/http/countries"]["choicesde"][10]="Antigua und Barbuda";
$elem["mirror/http/countries"]["choicesde"][11]="Argentinien";
$elem["mirror/http/countries"]["choicesde"][12]="Armenien";
$elem["mirror/http/countries"]["choicesde"][13]="Aruba";
$elem["mirror/http/countries"]["choicesde"][14]="Australien";
$elem["mirror/http/countries"]["choicesde"][15]="Österreich";
$elem["mirror/http/countries"]["choicesde"][16]="Aserbaidschan";
$elem["mirror/http/countries"]["choicesde"][17]="Bahamas";
$elem["mirror/http/countries"]["choicesde"][18]="Bahrain";
$elem["mirror/http/countries"]["choicesde"][19]="Bangladesch";
$elem["mirror/http/countries"]["choicesde"][20]="Barbados";
$elem["mirror/http/countries"]["choicesde"][21]="Weißrussland";
$elem["mirror/http/countries"]["choicesde"][22]="Belgien";
$elem["mirror/http/countries"]["choicesde"][23]="Belize";
$elem["mirror/http/countries"]["choicesde"][24]="Benin";
$elem["mirror/http/countries"]["choicesde"][25]="Bermuda";
$elem["mirror/http/countries"]["choicesde"][26]="Bhutan";
$elem["mirror/http/countries"]["choicesde"][27]="Bolivien";
$elem["mirror/http/countries"]["choicesde"][28]="Bonaire\";
$elem["mirror/http/countries"]["choicesde"][29]="Sint Eustatius und Saba";
$elem["mirror/http/countries"]["choicesde"][30]="Bosnien und Herzegowina";
$elem["mirror/http/countries"]["choicesde"][31]="Botsuana";
$elem["mirror/http/countries"]["choicesde"][32]="Bouvet-Insel";
$elem["mirror/http/countries"]["choicesde"][33]="Brasilien";
$elem["mirror/http/countries"]["choicesde"][34]="Britisches Territorium im Indischen Ozean";
$elem["mirror/http/countries"]["choicesde"][35]="Brunei Darussalam";
$elem["mirror/http/countries"]["choicesde"][36]="Bulgarien";
$elem["mirror/http/countries"]["choicesde"][37]="Burkina Faso";
$elem["mirror/http/countries"]["choicesde"][38]="Burundi";
$elem["mirror/http/countries"]["choicesde"][39]="Kambodscha";
$elem["mirror/http/countries"]["choicesde"][40]="Kamerun";
$elem["mirror/http/countries"]["choicesde"][41]="Kanada";
$elem["mirror/http/countries"]["choicesde"][42]="Cabo Verde";
$elem["mirror/http/countries"]["choicesde"][43]="Cayman-Inseln";
$elem["mirror/http/countries"]["choicesde"][44]="Zentralafrikanische Republik";
$elem["mirror/http/countries"]["choicesde"][45]="Tschad";
$elem["mirror/http/countries"]["choicesde"][46]="Chile";
$elem["mirror/http/countries"]["choicesde"][47]="China";
$elem["mirror/http/countries"]["choicesde"][48]="Weihnachtsinseln";
$elem["mirror/http/countries"]["choicesde"][49]="Kokos-(Keeling-)Inseln";
$elem["mirror/http/countries"]["choicesde"][50]="Kolumbien";
$elem["mirror/http/countries"]["choicesde"][51]="Komoren";
$elem["mirror/http/countries"]["choicesde"][52]="Kongo";
$elem["mirror/http/countries"]["choicesde"][53]="Demokratische Republik Kongo";
$elem["mirror/http/countries"]["choicesde"][54]="Cookinseln";
$elem["mirror/http/countries"]["choicesde"][55]="Costa Rica";
$elem["mirror/http/countries"]["choicesde"][56]="Kroatien";
$elem["mirror/http/countries"]["choicesde"][57]="Kuba";
$elem["mirror/http/countries"]["choicesde"][58]="Curaçao";
$elem["mirror/http/countries"]["choicesde"][59]="Zypern";
$elem["mirror/http/countries"]["choicesde"][60]="Tschechische Republik";
$elem["mirror/http/countries"]["choicesde"][61]="Côte d'Ivoire";
$elem["mirror/http/countries"]["choicesde"][62]="Dänemark";
$elem["mirror/http/countries"]["choicesde"][63]="Dschibuti";
$elem["mirror/http/countries"]["choicesde"][64]="Dominica";
$elem["mirror/http/countries"]["choicesde"][65]="Dominikanische Republik";
$elem["mirror/http/countries"]["choicesde"][66]="Ecuador";
$elem["mirror/http/countries"]["choicesde"][67]="Ägypten";
$elem["mirror/http/countries"]["choicesde"][68]="El Salvador";
$elem["mirror/http/countries"]["choicesde"][69]="Äquatorialguinea";
$elem["mirror/http/countries"]["choicesde"][70]="Eritrea";
$elem["mirror/http/countries"]["choicesde"][71]="Estland";
$elem["mirror/http/countries"]["choicesde"][72]="Äthiopien";
$elem["mirror/http/countries"]["choicesde"][73]="Falklandinseln (Malwinen)";
$elem["mirror/http/countries"]["choicesde"][74]="Färöer-Inseln";
$elem["mirror/http/countries"]["choicesde"][75]="Fidschi";
$elem["mirror/http/countries"]["choicesde"][76]="Finnland";
$elem["mirror/http/countries"]["choicesde"][77]="Frankreich";
$elem["mirror/http/countries"]["choicesde"][78]="Französisch-Guyana";
$elem["mirror/http/countries"]["choicesde"][79]="Französisch-Polynesien";
$elem["mirror/http/countries"]["choicesde"][80]="Französische Süd- und Antarktisgebiete";
$elem["mirror/http/countries"]["choicesde"][81]="Gabun";
$elem["mirror/http/countries"]["choicesde"][82]="Gambia";
$elem["mirror/http/countries"]["choicesde"][83]="Georgien";
$elem["mirror/http/countries"]["choicesde"][84]="Deutschland";
$elem["mirror/http/countries"]["choicesde"][85]="Ghana";
$elem["mirror/http/countries"]["choicesde"][86]="Gibraltar";
$elem["mirror/http/countries"]["choicesde"][87]="Griechenland";
$elem["mirror/http/countries"]["choicesde"][88]="Grönland";
$elem["mirror/http/countries"]["choicesde"][89]="Grenada";
$elem["mirror/http/countries"]["choicesde"][90]="Guadeloupe";
$elem["mirror/http/countries"]["choicesde"][91]="Guam";
$elem["mirror/http/countries"]["choicesde"][92]="Guatemala";
$elem["mirror/http/countries"]["choicesde"][93]="Guernsey";
$elem["mirror/http/countries"]["choicesde"][94]="Guinea";
$elem["mirror/http/countries"]["choicesde"][95]="Guinea-Bissau";
$elem["mirror/http/countries"]["choicesde"][96]="Guyana";
$elem["mirror/http/countries"]["choicesde"][97]="Haiti";
$elem["mirror/http/countries"]["choicesde"][98]="Heard und McDonaldinseln";
$elem["mirror/http/countries"]["choicesde"][99]="Heiliger Stuhl (Staat Vatikanstadt)";
$elem["mirror/http/countries"]["choicesde"][100]="Honduras";
$elem["mirror/http/countries"]["choicesde"][101]="Hongkong";
$elem["mirror/http/countries"]["choicesde"][102]="Ungarn";
$elem["mirror/http/countries"]["choicesde"][103]="Island";
$elem["mirror/http/countries"]["choicesde"][104]="Indien";
$elem["mirror/http/countries"]["choicesde"][105]="Indonesien";
$elem["mirror/http/countries"]["choicesde"][106]="Iran\";
$elem["mirror/http/countries"]["choicesde"][107]="Islamische Republik";
$elem["mirror/http/countries"]["choicesde"][108]="Irak";
$elem["mirror/http/countries"]["choicesde"][109]="Irland";
$elem["mirror/http/countries"]["choicesde"][110]="Insel Man";
$elem["mirror/http/countries"]["choicesde"][111]="Israel";
$elem["mirror/http/countries"]["choicesde"][112]="Italien";
$elem["mirror/http/countries"]["choicesde"][113]="Jamaika";
$elem["mirror/http/countries"]["choicesde"][114]="Japan";
$elem["mirror/http/countries"]["choicesde"][115]="Jersey";
$elem["mirror/http/countries"]["choicesde"][116]="Jordanien";
$elem["mirror/http/countries"]["choicesde"][117]="Kasachstan";
$elem["mirror/http/countries"]["choicesde"][118]="Kenia";
$elem["mirror/http/countries"]["choicesde"][119]="Kiribati";
$elem["mirror/http/countries"]["choicesde"][120]="Korea\";
$elem["mirror/http/countries"]["choicesde"][121]="Demokratische Volksrepublik";
$elem["mirror/http/countries"]["choicesde"][122]="Korea\";
$elem["mirror/http/countries"]["choicesde"][123]="Republik";
$elem["mirror/http/countries"]["choicesde"][124]="Kuwait";
$elem["mirror/http/countries"]["choicesde"][125]="Kirgisistan";
$elem["mirror/http/countries"]["choicesde"][126]="Laos\";
$elem["mirror/http/countries"]["choicesde"][127]="Demokratische Volksrepublik";
$elem["mirror/http/countries"]["choicesde"][128]="Lettland";
$elem["mirror/http/countries"]["choicesde"][129]="Libanon";
$elem["mirror/http/countries"]["choicesde"][130]="Lesotho";
$elem["mirror/http/countries"]["choicesde"][131]="Liberia";
$elem["mirror/http/countries"]["choicesde"][132]="Libyen";
$elem["mirror/http/countries"]["choicesde"][133]="Liechtenstein";
$elem["mirror/http/countries"]["choicesde"][134]="Litauen";
$elem["mirror/http/countries"]["choicesde"][135]="Luxemburg";
$elem["mirror/http/countries"]["choicesde"][136]="Macao";
$elem["mirror/http/countries"]["choicesde"][137]="Mazedonien\";
$elem["mirror/http/countries"]["choicesde"][138]="ehemalige jugoslawische Republik";
$elem["mirror/http/countries"]["choicesde"][139]="Madagaskar";
$elem["mirror/http/countries"]["choicesde"][140]="Malawi";
$elem["mirror/http/countries"]["choicesde"][141]="Malaysia";
$elem["mirror/http/countries"]["choicesde"][142]="Malediven";
$elem["mirror/http/countries"]["choicesde"][143]="Mali";
$elem["mirror/http/countries"]["choicesde"][144]="Malta";
$elem["mirror/http/countries"]["choicesde"][145]="Marshallinseln";
$elem["mirror/http/countries"]["choicesde"][146]="Martinique";
$elem["mirror/http/countries"]["choicesde"][147]="Mauretanien";
$elem["mirror/http/countries"]["choicesde"][148]="Mauritius";
$elem["mirror/http/countries"]["choicesde"][149]="Mayotte";
$elem["mirror/http/countries"]["choicesde"][150]="Mexiko";
$elem["mirror/http/countries"]["choicesde"][151]="Mikronesien\";
$elem["mirror/http/countries"]["choicesde"][152]="Föderierte Staaten von";
$elem["mirror/http/countries"]["choicesde"][153]="Moldau";
$elem["mirror/http/countries"]["choicesde"][154]="Monaco";
$elem["mirror/http/countries"]["choicesde"][155]="Mongolei";
$elem["mirror/http/countries"]["choicesde"][156]="Montenegro";
$elem["mirror/http/countries"]["choicesde"][157]="Montserrat";
$elem["mirror/http/countries"]["choicesde"][158]="Marokko";
$elem["mirror/http/countries"]["choicesde"][159]="Mosambik";
$elem["mirror/http/countries"]["choicesde"][160]="Myanmar";
$elem["mirror/http/countries"]["choicesde"][161]="Namibia";
$elem["mirror/http/countries"]["choicesde"][162]="Nauru";
$elem["mirror/http/countries"]["choicesde"][163]="Nepal";
$elem["mirror/http/countries"]["choicesde"][164]="Niederlande";
$elem["mirror/http/countries"]["choicesde"][165]="Neukaledonien";
$elem["mirror/http/countries"]["choicesde"][166]="Neuseeland";
$elem["mirror/http/countries"]["choicesde"][167]="Nicaragua";
$elem["mirror/http/countries"]["choicesde"][168]="Niger";
$elem["mirror/http/countries"]["choicesde"][169]="Nigeria";
$elem["mirror/http/countries"]["choicesde"][170]="Niue";
$elem["mirror/http/countries"]["choicesde"][171]="Norfolkinsel";
$elem["mirror/http/countries"]["choicesde"][172]="Nördliche Mariana-Inseln";
$elem["mirror/http/countries"]["choicesde"][173]="Norwegen";
$elem["mirror/http/countries"]["choicesde"][174]="Oman";
$elem["mirror/http/countries"]["choicesde"][175]="Pakistan";
$elem["mirror/http/countries"]["choicesde"][176]="Palau";
$elem["mirror/http/countries"]["choicesde"][177]="Palästina\";
$elem["mirror/http/countries"]["choicesde"][178]="Staat";
$elem["mirror/http/countries"]["choicesde"][179]="Panama";
$elem["mirror/http/countries"]["choicesde"][180]="Papua-Neuguinea";
$elem["mirror/http/countries"]["choicesde"][181]="Paraguay";
$elem["mirror/http/countries"]["choicesde"][182]="Peru";
$elem["mirror/http/countries"]["choicesde"][183]="Philippinen";
$elem["mirror/http/countries"]["choicesde"][184]="Pitcairn";
$elem["mirror/http/countries"]["choicesde"][185]="Polen";
$elem["mirror/http/countries"]["choicesde"][186]="Portugal";
$elem["mirror/http/countries"]["choicesde"][187]="Puerto Rico";
$elem["mirror/http/countries"]["choicesde"][188]="Katar";
$elem["mirror/http/countries"]["choicesde"][189]="Rumänien";
$elem["mirror/http/countries"]["choicesde"][190]="Russische Föderation";
$elem["mirror/http/countries"]["choicesde"][191]="Ruanda";
$elem["mirror/http/countries"]["choicesde"][192]="Réunion";
$elem["mirror/http/countries"]["choicesde"][193]="Saint-Barthélemy";
$elem["mirror/http/countries"]["choicesde"][194]="St. Helena\";
$elem["mirror/http/countries"]["choicesde"][195]="Ascension und Tristan da Cunha";
$elem["mirror/http/countries"]["choicesde"][196]="St. Kitts und Nevis";
$elem["mirror/http/countries"]["choicesde"][197]="St. Lucia";
$elem["mirror/http/countries"]["choicesde"][198]="Saint Martin (Französischer Teil)";
$elem["mirror/http/countries"]["choicesde"][199]="St. Pierre und Miquelon";
$elem["mirror/http/countries"]["choicesde"][200]="St. Vincent und die Grenadinen";
$elem["mirror/http/countries"]["choicesde"][201]="Samoa";
$elem["mirror/http/countries"]["choicesde"][202]="San Marino";
$elem["mirror/http/countries"]["choicesde"][203]="São Tomé und Príncipe";
$elem["mirror/http/countries"]["choicesde"][204]="Saudi-Arabien";
$elem["mirror/http/countries"]["choicesde"][205]="Senegal";
$elem["mirror/http/countries"]["choicesde"][206]="Serbien";
$elem["mirror/http/countries"]["choicesde"][207]="Seychellen";
$elem["mirror/http/countries"]["choicesde"][208]="Sierra Leone";
$elem["mirror/http/countries"]["choicesde"][209]="Singapur";
$elem["mirror/http/countries"]["choicesde"][210]="Saint-Martin (Niederländischer Teil)";
$elem["mirror/http/countries"]["choicesde"][211]="Slowakei";
$elem["mirror/http/countries"]["choicesde"][212]="Slowenien";
$elem["mirror/http/countries"]["choicesde"][213]="Salomoninseln";
$elem["mirror/http/countries"]["choicesde"][214]="Somalia";
$elem["mirror/http/countries"]["choicesde"][215]="Südafrika";
$elem["mirror/http/countries"]["choicesde"][216]="South Georgia und die Südlichen Sandwichinseln";
$elem["mirror/http/countries"]["choicesde"][217]="Südsudan";
$elem["mirror/http/countries"]["choicesde"][218]="Spanien";
$elem["mirror/http/countries"]["choicesde"][219]="Sri Lanka";
$elem["mirror/http/countries"]["choicesde"][220]="Sudan";
$elem["mirror/http/countries"]["choicesde"][221]="Suriname";
$elem["mirror/http/countries"]["choicesde"][222]="Svalbard und Jan Mayen";
$elem["mirror/http/countries"]["choicesde"][223]="Swasiland";
$elem["mirror/http/countries"]["choicesde"][224]="Schweden";
$elem["mirror/http/countries"]["choicesde"][225]="Schweiz";
$elem["mirror/http/countries"]["choicesde"][226]="Syrien\";
$elem["mirror/http/countries"]["choicesde"][227]="Arabische Republik";
$elem["mirror/http/countries"]["choicesde"][228]="Taiwan";
$elem["mirror/http/countries"]["choicesde"][229]="Tadschikistan";
$elem["mirror/http/countries"]["choicesde"][230]="Tansania";
$elem["mirror/http/countries"]["choicesde"][231]="Thailand";
$elem["mirror/http/countries"]["choicesde"][232]="Timor-Leste";
$elem["mirror/http/countries"]["choicesde"][233]="Togo";
$elem["mirror/http/countries"]["choicesde"][234]="Tokelau";
$elem["mirror/http/countries"]["choicesde"][235]="Tonga";
$elem["mirror/http/countries"]["choicesde"][236]="Trinidad und Tobago";
$elem["mirror/http/countries"]["choicesde"][237]="Tunesien";
$elem["mirror/http/countries"]["choicesde"][238]="Türkei";
$elem["mirror/http/countries"]["choicesde"][239]="Turkmenistan";
$elem["mirror/http/countries"]["choicesde"][240]="Turks- und Caicosinseln";
$elem["mirror/http/countries"]["choicesde"][241]="Tuvalu";
$elem["mirror/http/countries"]["choicesde"][242]="Uganda";
$elem["mirror/http/countries"]["choicesde"][243]="Ukraine";
$elem["mirror/http/countries"]["choicesde"][244]="Vereinigte Arabische Emirate";
$elem["mirror/http/countries"]["choicesde"][245]="Vereinigtes Königreich";
$elem["mirror/http/countries"]["choicesde"][246]="Vereinigte Staaten";
$elem["mirror/http/countries"]["choicesde"][247]="United States Minor Outlying Islands";
$elem["mirror/http/countries"]["choicesde"][248]="Uruguay";
$elem["mirror/http/countries"]["choicesde"][249]="Usbekistan";
$elem["mirror/http/countries"]["choicesde"][250]="Vanuatu";
$elem["mirror/http/countries"]["choicesde"][251]="Venezuela";
$elem["mirror/http/countries"]["choicesde"][252]="Vietnam";
$elem["mirror/http/countries"]["choicesde"][253]="Britische Jungferninseln";
$elem["mirror/http/countries"]["choicesde"][254]="Amerikanische Jungferninseln";
$elem["mirror/http/countries"]["choicesde"][255]="Wallis und Futuna";
$elem["mirror/http/countries"]["choicesde"][256]="Westsahara";
$elem["mirror/http/countries"]["choicesde"][257]="Jemen";
$elem["mirror/http/countries"]["choicesde"][258]="Sambia";
$elem["mirror/http/countries"]["choicesde"][259]="Simbabwe";
$elem["mirror/http/countries"]["choicesfr"][1]="Saisie manuelle";
$elem["mirror/http/countries"]["choicesfr"][2]="Afghanistan";
$elem["mirror/http/countries"]["choicesfr"][3]="Albanie";
$elem["mirror/http/countries"]["choicesfr"][4]="Algérie";
$elem["mirror/http/countries"]["choicesfr"][5]="Samoa américaines";
$elem["mirror/http/countries"]["choicesfr"][6]="Andorre";
$elem["mirror/http/countries"]["choicesfr"][7]="Angola";
$elem["mirror/http/countries"]["choicesfr"][8]="Anguilla";
$elem["mirror/http/countries"]["choicesfr"][9]="Antarctique";
$elem["mirror/http/countries"]["choicesfr"][10]="Antigua-et-Barbuda";
$elem["mirror/http/countries"]["choicesfr"][11]="Argentine";
$elem["mirror/http/countries"]["choicesfr"][12]="Arménie";
$elem["mirror/http/countries"]["choicesfr"][13]="Aruba";
$elem["mirror/http/countries"]["choicesfr"][14]="Australie";
$elem["mirror/http/countries"]["choicesfr"][15]="Autriche";
$elem["mirror/http/countries"]["choicesfr"][16]="Azerbaïdjan";
$elem["mirror/http/countries"]["choicesfr"][17]="Bahamas";
$elem["mirror/http/countries"]["choicesfr"][18]="Bahreïn";
$elem["mirror/http/countries"]["choicesfr"][19]="Bangladesh";
$elem["mirror/http/countries"]["choicesfr"][20]="Barbade";
$elem["mirror/http/countries"]["choicesfr"][21]="Bélarus";
$elem["mirror/http/countries"]["choicesfr"][22]="Belgique";
$elem["mirror/http/countries"]["choicesfr"][23]="Belize";
$elem["mirror/http/countries"]["choicesfr"][24]="Bénin";
$elem["mirror/http/countries"]["choicesfr"][25]="Bermudes";
$elem["mirror/http/countries"]["choicesfr"][26]="Bhoutan";
$elem["mirror/http/countries"]["choicesfr"][27]="Bolivie";
$elem["mirror/http/countries"]["choicesfr"][28]="Bonaire\";
$elem["mirror/http/countries"]["choicesfr"][29]="Saint-Eustache et Saba";
$elem["mirror/http/countries"]["choicesfr"][30]="Bosnie-Herzégovine";
$elem["mirror/http/countries"]["choicesfr"][31]="Botswana";
$elem["mirror/http/countries"]["choicesfr"][32]="Bouvet\";
$elem["mirror/http/countries"]["choicesfr"][33]="Île";
$elem["mirror/http/countries"]["choicesfr"][34]="Brésil";
$elem["mirror/http/countries"]["choicesfr"][35]="Océan Indien\";
$elem["mirror/http/countries"]["choicesfr"][36]="Territoire britannique de l'";
$elem["mirror/http/countries"]["choicesfr"][37]="Brunéi Darussalam";
$elem["mirror/http/countries"]["choicesfr"][38]="Bulgarie";
$elem["mirror/http/countries"]["choicesfr"][39]="Burkina Faso";
$elem["mirror/http/countries"]["choicesfr"][40]="Burundi";
$elem["mirror/http/countries"]["choicesfr"][41]="Cambodge";
$elem["mirror/http/countries"]["choicesfr"][42]="Cameroun";
$elem["mirror/http/countries"]["choicesfr"][43]="Canada";
$elem["mirror/http/countries"]["choicesfr"][44]="Cap-Vert";
$elem["mirror/http/countries"]["choicesfr"][45]="Caïman\";
$elem["mirror/http/countries"]["choicesfr"][46]="Îles";
$elem["mirror/http/countries"]["choicesfr"][47]="Centrafricaine\";
$elem["mirror/http/countries"]["choicesfr"][48]="République";
$elem["mirror/http/countries"]["choicesfr"][49]="Tchad";
$elem["mirror/http/countries"]["choicesfr"][50]="Chili";
$elem["mirror/http/countries"]["choicesfr"][51]="Chine";
$elem["mirror/http/countries"]["choicesfr"][52]="Christmas\";
$elem["mirror/http/countries"]["choicesfr"][53]="Île";
$elem["mirror/http/countries"]["choicesfr"][54]="Cocos (Keeling)\";
$elem["mirror/http/countries"]["choicesfr"][55]="Îles";
$elem["mirror/http/countries"]["choicesfr"][56]="Colombie";
$elem["mirror/http/countries"]["choicesfr"][57]="Comores";
$elem["mirror/http/countries"]["choicesfr"][58]="Congo";
$elem["mirror/http/countries"]["choicesfr"][59]="République démocratique du Congo";
$elem["mirror/http/countries"]["choicesfr"][60]="Cook\";
$elem["mirror/http/countries"]["choicesfr"][61]="Îles";
$elem["mirror/http/countries"]["choicesfr"][62]="Costa Rica";
$elem["mirror/http/countries"]["choicesfr"][63]="Croatie";
$elem["mirror/http/countries"]["choicesfr"][64]="Cuba";
$elem["mirror/http/countries"]["choicesfr"][65]="Curaçao";
$elem["mirror/http/countries"]["choicesfr"][66]="Chypre";
$elem["mirror/http/countries"]["choicesfr"][67]="Tchèque\";
$elem["mirror/http/countries"]["choicesfr"][68]="République";
$elem["mirror/http/countries"]["choicesfr"][69]="Côte d'Ivoire";
$elem["mirror/http/countries"]["choicesfr"][70]="Danemark";
$elem["mirror/http/countries"]["choicesfr"][71]="Djibouti";
$elem["mirror/http/countries"]["choicesfr"][72]="Dominique";
$elem["mirror/http/countries"]["choicesfr"][73]="Dominicaine\";
$elem["mirror/http/countries"]["choicesfr"][74]="République";
$elem["mirror/http/countries"]["choicesfr"][75]="Équateur";
$elem["mirror/http/countries"]["choicesfr"][76]="Égypte";
$elem["mirror/http/countries"]["choicesfr"][77]="El Salvador";
$elem["mirror/http/countries"]["choicesfr"][78]="Guinée Équatoriale";
$elem["mirror/http/countries"]["choicesfr"][79]="Érythrée";
$elem["mirror/http/countries"]["choicesfr"][80]="Estonie";
$elem["mirror/http/countries"]["choicesfr"][81]="Éthiopie";
$elem["mirror/http/countries"]["choicesfr"][82]="Falkland\";
$elem["mirror/http/countries"]["choicesfr"][83]="Îles (Malvinas)";
$elem["mirror/http/countries"]["choicesfr"][84]="Féroé\";
$elem["mirror/http/countries"]["choicesfr"][85]="Îles";
$elem["mirror/http/countries"]["choicesfr"][86]="Fidji";
$elem["mirror/http/countries"]["choicesfr"][87]="Finlande";
$elem["mirror/http/countries"]["choicesfr"][88]="France";
$elem["mirror/http/countries"]["choicesfr"][89]="Guyane française";
$elem["mirror/http/countries"]["choicesfr"][90]="Polynésie française";
$elem["mirror/http/countries"]["choicesfr"][91]="Terres australes françaises";
$elem["mirror/http/countries"]["choicesfr"][92]="Gabon";
$elem["mirror/http/countries"]["choicesfr"][93]="Gambie";
$elem["mirror/http/countries"]["choicesfr"][94]="Géorgie";
$elem["mirror/http/countries"]["choicesfr"][95]="Allemagne";
$elem["mirror/http/countries"]["choicesfr"][96]="Ghana";
$elem["mirror/http/countries"]["choicesfr"][97]="Gibraltar";
$elem["mirror/http/countries"]["choicesfr"][98]="Grèce";
$elem["mirror/http/countries"]["choicesfr"][99]="Groënland";
$elem["mirror/http/countries"]["choicesfr"][100]="Grenade";
$elem["mirror/http/countries"]["choicesfr"][101]="Guadeloupe";
$elem["mirror/http/countries"]["choicesfr"][102]="Guam";
$elem["mirror/http/countries"]["choicesfr"][103]="Guatemala";
$elem["mirror/http/countries"]["choicesfr"][104]="Guernesey";
$elem["mirror/http/countries"]["choicesfr"][105]="Guinée";
$elem["mirror/http/countries"]["choicesfr"][106]="Guinée-Bissau";
$elem["mirror/http/countries"]["choicesfr"][107]="Guyana";
$elem["mirror/http/countries"]["choicesfr"][108]="Haïti";
$elem["mirror/http/countries"]["choicesfr"][109]="Heard\";
$elem["mirror/http/countries"]["choicesfr"][110]="Île et McDonald\";
$elem["mirror/http/countries"]["choicesfr"][111]="Îles";
$elem["mirror/http/countries"]["choicesfr"][112]="Saint-Siège (état de la cité du Vatican)";
$elem["mirror/http/countries"]["choicesfr"][113]="Honduras";
$elem["mirror/http/countries"]["choicesfr"][114]="Hong-Kong";
$elem["mirror/http/countries"]["choicesfr"][115]="Hongrie";
$elem["mirror/http/countries"]["choicesfr"][116]="Islande";
$elem["mirror/http/countries"]["choicesfr"][117]="Inde";
$elem["mirror/http/countries"]["choicesfr"][118]="Indonésie";
$elem["mirror/http/countries"]["choicesfr"][119]="Iran\";
$elem["mirror/http/countries"]["choicesfr"][120]="République islamique d'";
$elem["mirror/http/countries"]["choicesfr"][121]="Irak";
$elem["mirror/http/countries"]["choicesfr"][122]="Irlande";
$elem["mirror/http/countries"]["choicesfr"][123]="Île de Man";
$elem["mirror/http/countries"]["choicesfr"][124]="Israël";
$elem["mirror/http/countries"]["choicesfr"][125]="Italie";
$elem["mirror/http/countries"]["choicesfr"][126]="Jamaïque";
$elem["mirror/http/countries"]["choicesfr"][127]="Japon";
$elem["mirror/http/countries"]["choicesfr"][128]="Jersey";
$elem["mirror/http/countries"]["choicesfr"][129]="Jordanie";
$elem["mirror/http/countries"]["choicesfr"][130]="Kazakhstan";
$elem["mirror/http/countries"]["choicesfr"][131]="Kenya";
$elem["mirror/http/countries"]["choicesfr"][132]="Kiribati";
$elem["mirror/http/countries"]["choicesfr"][133]="Corée\";
$elem["mirror/http/countries"]["choicesfr"][134]="République populaire démocratique de";
$elem["mirror/http/countries"]["choicesfr"][135]="Corée\";
$elem["mirror/http/countries"]["choicesfr"][136]="République de";
$elem["mirror/http/countries"]["choicesfr"][137]="Koweït";
$elem["mirror/http/countries"]["choicesfr"][138]="Kirghizistan";
$elem["mirror/http/countries"]["choicesfr"][139]="Lao\";
$elem["mirror/http/countries"]["choicesfr"][140]="République démocratique populaire";
$elem["mirror/http/countries"]["choicesfr"][141]="Lettonie";
$elem["mirror/http/countries"]["choicesfr"][142]="Liban";
$elem["mirror/http/countries"]["choicesfr"][143]="Lesotho";
$elem["mirror/http/countries"]["choicesfr"][144]="Libéria";
$elem["mirror/http/countries"]["choicesfr"][145]="Libye";
$elem["mirror/http/countries"]["choicesfr"][146]="Liechtenstein";
$elem["mirror/http/countries"]["choicesfr"][147]="Lituanie";
$elem["mirror/http/countries"]["choicesfr"][148]="Luxembourg";
$elem["mirror/http/countries"]["choicesfr"][149]="Macau";
$elem["mirror/http/countries"]["choicesfr"][150]="Macédoine\";
$elem["mirror/http/countries"]["choicesfr"][151]="République de";
$elem["mirror/http/countries"]["choicesfr"][152]="Madagascar";
$elem["mirror/http/countries"]["choicesfr"][153]="Malawi";
$elem["mirror/http/countries"]["choicesfr"][154]="Malaisie";
$elem["mirror/http/countries"]["choicesfr"][155]="Maldives";
$elem["mirror/http/countries"]["choicesfr"][156]="Mali";
$elem["mirror/http/countries"]["choicesfr"][157]="Malte";
$elem["mirror/http/countries"]["choicesfr"][158]="Îles Marshall";
$elem["mirror/http/countries"]["choicesfr"][159]="Martinique";
$elem["mirror/http/countries"]["choicesfr"][160]="Mauritanie";
$elem["mirror/http/countries"]["choicesfr"][161]="Maurice";
$elem["mirror/http/countries"]["choicesfr"][162]="Mayotte";
$elem["mirror/http/countries"]["choicesfr"][163]="Mexique";
$elem["mirror/http/countries"]["choicesfr"][164]="Micronésie\";
$elem["mirror/http/countries"]["choicesfr"][165]="États fédérés de";
$elem["mirror/http/countries"]["choicesfr"][166]="Moldavie";
$elem["mirror/http/countries"]["choicesfr"][167]="Monaco";
$elem["mirror/http/countries"]["choicesfr"][168]="Mongolie";
$elem["mirror/http/countries"]["choicesfr"][169]="Monténégro";
$elem["mirror/http/countries"]["choicesfr"][170]="Montserrat";
$elem["mirror/http/countries"]["choicesfr"][171]="Maroc";
$elem["mirror/http/countries"]["choicesfr"][172]="Mozambique";
$elem["mirror/http/countries"]["choicesfr"][173]="Myanmar";
$elem["mirror/http/countries"]["choicesfr"][174]="Namibie";
$elem["mirror/http/countries"]["choicesfr"][175]="Nauru";
$elem["mirror/http/countries"]["choicesfr"][176]="Népal";
$elem["mirror/http/countries"]["choicesfr"][177]="Pays-Bas";
$elem["mirror/http/countries"]["choicesfr"][178]="Nouvelle-Calédonie";
$elem["mirror/http/countries"]["choicesfr"][179]="Nouvelle-Zélande";
$elem["mirror/http/countries"]["choicesfr"][180]="Nicaragua";
$elem["mirror/http/countries"]["choicesfr"][181]="Niger";
$elem["mirror/http/countries"]["choicesfr"][182]="Nigeria";
$elem["mirror/http/countries"]["choicesfr"][183]="Nioue";
$elem["mirror/http/countries"]["choicesfr"][184]="Norfolk\";
$elem["mirror/http/countries"]["choicesfr"][185]="Île";
$elem["mirror/http/countries"]["choicesfr"][186]="Mariannes du Nord\";
$elem["mirror/http/countries"]["choicesfr"][187]="Îles";
$elem["mirror/http/countries"]["choicesfr"][188]="Norvège";
$elem["mirror/http/countries"]["choicesfr"][189]="Oman";
$elem["mirror/http/countries"]["choicesfr"][190]="Pakistan";
$elem["mirror/http/countries"]["choicesfr"][191]="Palaos";
$elem["mirror/http/countries"]["choicesfr"][192]="Palestine\";
$elem["mirror/http/countries"]["choicesfr"][193]="État de";
$elem["mirror/http/countries"]["choicesfr"][194]="Panama";
$elem["mirror/http/countries"]["choicesfr"][195]="Papouasie-Nouvelle-Guinée";
$elem["mirror/http/countries"]["choicesfr"][196]="Paraguay";
$elem["mirror/http/countries"]["choicesfr"][197]="Pérou";
$elem["mirror/http/countries"]["choicesfr"][198]="Philippines";
$elem["mirror/http/countries"]["choicesfr"][199]="Pitcairn";
$elem["mirror/http/countries"]["choicesfr"][200]="Pologne";
$elem["mirror/http/countries"]["choicesfr"][201]="Portugal";
$elem["mirror/http/countries"]["choicesfr"][202]="Porto Rico";
$elem["mirror/http/countries"]["choicesfr"][203]="Qatar";
$elem["mirror/http/countries"]["choicesfr"][204]="Roumanie";
$elem["mirror/http/countries"]["choicesfr"][205]="Russie\";
$elem["mirror/http/countries"]["choicesfr"][206]="Fédération de";
$elem["mirror/http/countries"]["choicesfr"][207]="Rwanda";
$elem["mirror/http/countries"]["choicesfr"][208]="Réunion\";
$elem["mirror/http/countries"]["choicesfr"][209]="Île de la";
$elem["mirror/http/countries"]["choicesfr"][210]="Saint-Barthélemy";
$elem["mirror/http/countries"]["choicesfr"][211]="Sainte-Hélène\";
$elem["mirror/http/countries"]["choicesfr"][212]="Ascension et Tristan da Cunha";
$elem["mirror/http/countries"]["choicesfr"][213]="Saint-Kitts-et-Nevis";
$elem["mirror/http/countries"]["choicesfr"][214]="Sainte-Lucie";
$elem["mirror/http/countries"]["choicesfr"][215]="Saint-Martin (partie française)";
$elem["mirror/http/countries"]["choicesfr"][216]="Saint-Pierre-et-Miquelon";
$elem["mirror/http/countries"]["choicesfr"][217]="Saint-Vincent-et-les Grenadines";
$elem["mirror/http/countries"]["choicesfr"][218]="Samoa";
$elem["mirror/http/countries"]["choicesfr"][219]="San Marin";
$elem["mirror/http/countries"]["choicesfr"][220]="Sao Tomé-et-Principe";
$elem["mirror/http/countries"]["choicesfr"][221]="Arabie saoudite";
$elem["mirror/http/countries"]["choicesfr"][222]="Sénégal";
$elem["mirror/http/countries"]["choicesfr"][223]="Serbie";
$elem["mirror/http/countries"]["choicesfr"][224]="Seychelles";
$elem["mirror/http/countries"]["choicesfr"][225]="Sierra Leone";
$elem["mirror/http/countries"]["choicesfr"][226]="Singapour";
$elem["mirror/http/countries"]["choicesfr"][227]="Saint-Martin (partie néerlandaise)";
$elem["mirror/http/countries"]["choicesfr"][228]="Slovaquie";
$elem["mirror/http/countries"]["choicesfr"][229]="Slovénie";
$elem["mirror/http/countries"]["choicesfr"][230]="Salomon\";
$elem["mirror/http/countries"]["choicesfr"][231]="Îles";
$elem["mirror/http/countries"]["choicesfr"][232]="Somalie";
$elem["mirror/http/countries"]["choicesfr"][233]="Afrique du Sud";
$elem["mirror/http/countries"]["choicesfr"][234]="Géorgie du Sud et les îles Sandwich du Sud";
$elem["mirror/http/countries"]["choicesfr"][235]="Soudan du Sud";
$elem["mirror/http/countries"]["choicesfr"][236]="Espagne";
$elem["mirror/http/countries"]["choicesfr"][237]="Sri Lanka";
$elem["mirror/http/countries"]["choicesfr"][238]="Soudan";
$elem["mirror/http/countries"]["choicesfr"][239]="Surinam";
$elem["mirror/http/countries"]["choicesfr"][240]="Svalbard et île Jan Mayen";
$elem["mirror/http/countries"]["choicesfr"][241]="Swaziland";
$elem["mirror/http/countries"]["choicesfr"][242]="Suède";
$elem["mirror/http/countries"]["choicesfr"][243]="Suisse";
$elem["mirror/http/countries"]["choicesfr"][244]="Syrienne\";
$elem["mirror/http/countries"]["choicesfr"][245]="République arabe";
$elem["mirror/http/countries"]["choicesfr"][246]="Taïwan";
$elem["mirror/http/countries"]["choicesfr"][247]="Tadjikistan";
$elem["mirror/http/countries"]["choicesfr"][248]="Tanzanie";
$elem["mirror/http/countries"]["choicesfr"][249]="Thaïlande";
$elem["mirror/http/countries"]["choicesfr"][250]="Timor-Leste";
$elem["mirror/http/countries"]["choicesfr"][251]="Togo";
$elem["mirror/http/countries"]["choicesfr"][252]="Tokelau";
$elem["mirror/http/countries"]["choicesfr"][253]="Tonga";
$elem["mirror/http/countries"]["choicesfr"][254]="Trinité-et-Tobago";
$elem["mirror/http/countries"]["choicesfr"][255]="Tunisie";
$elem["mirror/http/countries"]["choicesfr"][256]="Turquie";
$elem["mirror/http/countries"]["choicesfr"][257]="Turkménistan";
$elem["mirror/http/countries"]["choicesfr"][258]="Turks et Caïques\";
$elem["mirror/http/countries"]["choicesfr"][259]="Îles";
$elem["mirror/http/countries"]["choicesfr"][260]="Tuvalu";
$elem["mirror/http/countries"]["choicesfr"][261]="Ouganda";
$elem["mirror/http/countries"]["choicesfr"][262]="Ukraine";
$elem["mirror/http/countries"]["choicesfr"][263]="Émirats arabes unis";
$elem["mirror/http/countries"]["choicesfr"][264]="Royaume-Uni";
$elem["mirror/http/countries"]["choicesfr"][265]="États-Unis";
$elem["mirror/http/countries"]["choicesfr"][266]="Îles mineures éloignées des États-Unis d'Amérique";
$elem["mirror/http/countries"]["choicesfr"][267]="Uruguay";
$elem["mirror/http/countries"]["choicesfr"][268]="Ouzbékistan";
$elem["mirror/http/countries"]["choicesfr"][269]="Vanuatu";
$elem["mirror/http/countries"]["choicesfr"][270]="Vénézuela";
$elem["mirror/http/countries"]["choicesfr"][271]="Viet Nam";
$elem["mirror/http/countries"]["choicesfr"][272]="Îles Vierges britanniques";
$elem["mirror/http/countries"]["choicesfr"][273]="Îles Vierges des États-Unis";
$elem["mirror/http/countries"]["choicesfr"][274]="Wallis et Futuna";
$elem["mirror/http/countries"]["choicesfr"][275]="Sahara Occidental";
$elem["mirror/http/countries"]["choicesfr"][276]="Yémen";
$elem["mirror/http/countries"]["choicesfr"][277]="Zambie";
$elem["mirror/http/countries"]["choicesfr"][278]="Zimbabwe";
$elem["mirror/http/countries"]["choicesfr"][279]="Åland\";
$elem["mirror/http/countries"]["description"]="Ubuntu archive mirror country:
 The goal is to find a mirror of the Ubuntu archive that is close to you on the network -- be
 aware that nearby countries, or even your own, may not be the best choice.
";
$elem["mirror/http/countries"]["descriptionde"]="Land des Ubuntu-Archiv-Spiegelservers:
 Sie sollten einen Spiegelserver aussuchen, der netztopologisch in Ihrer
 Nähe liegt -- beachten Sie aber, dass nahegelegene Länder, oder sogar
 Ihr eigenes Land, nicht unbedingt die beste Wahl sein müssen.
";
$elem["mirror/http/countries"]["descriptionfr"]="Pays du miroir de l'archive Ubuntu :
 L'objectif est de trouver un miroir de l'archive Ubuntu qui soit proche de
 vous du point de vue du réseau. Gardez à l'esprit que le fait de choisir
 un pays proche, voire même votre pays, n'est peut-être pas le meilleur
 choix.
";
$elem["mirror/http/countries"]["default"]="GB";
$elem["mirror/http/mirror"]["type"]="select";
$elem["mirror/http/mirror"]["description"]="Ubuntu archive mirror:
 Please select an Ubuntu archive mirror. You should use a mirror in
 your country or region if you do not know which mirror has the best
 Internet connection to you.
 .
 Usually, <your country code>.archive.ubuntu.com is a good choice.
";
$elem["mirror/http/mirror"]["descriptionde"]="Ubuntu-Archiv-Spiegelserver:
 Bitte wählen Sie einen Spiegelserver für das Ubuntu-Archiv. Falls Sie
 nicht wissen, welcher die beste Internetverbindung zu Ihnen hat, sollten
 Sie einen Spiegel in Ihrem Land oder in Ihrer Nähe wählen.
 .
 Meist ist <Ihr-Ländercode>.archive.ubuntu.com eine gute Wahl.
";
$elem["mirror/http/mirror"]["descriptionfr"]="Miroir de l'archive Ubuntu :
 Veuillez choisir un miroir de l'archive Ubuntu. Vous devriez utiliser un
 miroir situé dans votre pays ou votre région si vous ne savez pas quel
 miroir possède la meilleure connexion Internet avec vous.
 .
 Généralement, <le_code_de_votre pays>.archive.ubuntu.com est un choix
 pertinent.
";
$elem["mirror/http/mirror"]["default"]="CC.archive.ubuntu.com";
$elem["mirror/http/hostname"]["type"]="string";
$elem["mirror/http/hostname"]["description"]="Ubuntu archive mirror hostname:
 Please enter the hostname of the mirror from which Ubuntu will be downloaded.
 .
 An alternate port can be specified using the standard [hostname]:[port]
 format.
";
$elem["mirror/http/hostname"]["descriptionde"]="Rechnername des Ubuntu-Archiv-Spiegelservers:
 Geben Sie den Namen des Spiegelservers ein, von dem Ubuntu heruntergeladen
 werden soll.
 .
 Ein anderer Port kann mit [Rechnername]:[Port] angegeben werden.
";
$elem["mirror/http/hostname"]["descriptionfr"]="Nom d'hôte du miroir de l'archive Ubuntu :
 Veuillez indiquer le nom du miroir Ubuntu à partir duquel se fera le
 téléchargement.
 .
 Un port différent peut être indiqué en utilisant le format normalisé
 [nom_d'hôte]:[port].
";
$elem["mirror/http/hostname"]["default"]="mirror";
$elem["mirror/http/directory"]["type"]="string";
$elem["mirror/http/directory"]["description"]="Ubuntu archive mirror directory:
 Please enter the directory in which the mirror of the Ubuntu archive is
 located.
";
$elem["mirror/http/directory"]["descriptionde"]="Ubuntu-Archiv Spiegel-Verzeichnis:
 Bitte geben Sie das Verzeichnis an, in dem sich der Ubuntu-Archiv-Spiegel
 befindet.
";
$elem["mirror/http/directory"]["descriptionfr"]="Répertoire du miroir de l'archive Ubuntu :
 Veuillez indiquer le répertoire dans lequel se situe le miroir de
 l'archive Ubuntu.
";
$elem["mirror/http/directory"]["default"]="/ubuntu/";
$elem["mirror/http/proxy"]["type"]="string";
$elem["mirror/http/proxy"]["description"]="HTTP proxy information (blank for none):
 If you need to use a HTTP proxy to access the outside world, enter the
 proxy information here. Otherwise, leave this blank.
 .
 The proxy information should be given in the standard form of
 \"http://[[user][:pass]@]host[:port]/\".
";
$elem["mirror/http/proxy"]["descriptionde"]="HTTP-Proxy-Daten (leer lassen für keinen Proxy):
 Falls Sie einen HTTP-Proxy benötigen, um das Internet zu erreichen, geben
 Sie hier bitte Ihre Daten an. Falls nicht, lassen Sie dieses Feld leer.
 .
 Die Proxy-Daten sollten im Standardformat
 »http://[[user][:pass]@]host[:port]/« angegeben werden.
";
$elem["mirror/http/proxy"]["descriptionfr"]="Mandataire HTTP (laisser vide si aucun) :
 Si vous avez besoin d'utiliser un mandataire HTTP (souvent appelé
 « proxy ») pour accéder au monde extérieur, indiquez ses paramètres
 ici. Sinon, laissez ce champ vide.
 .
 Les paramètres du mandataire doivent être indiqués avec la forme
 normalisée « http://[[utilisateur][:mot-de-passe]@]hôte[:port]/ ».
";
$elem["mirror/http/proxy"]["default"]="";
$elem["mirror/https/countries"]["type"]="select";
$elem["mirror/https/countries"]["description"]="Debian archive mirror country:
 The goal is to find a mirror of the Debian archive that is close to you on the network -- be
 aware that nearby countries, or even your own, may not be the best choice.
";
$elem["mirror/https/countries"]["descriptionde"]="Debian archive mirror country:
 The goal is to find a mirror of the Debian archive that is close to you on
 the network -- be aware that nearby countries, or even your own, may not
 be the best choice.
";
$elem["mirror/https/countries"]["descriptionfr"]="Debian archive mirror country:
 The goal is to find a mirror of the Debian archive that is close to you on
 the network -- be aware that nearby countries, or even your own, may not
 be the best choice.
";
$elem["mirror/https/countries"]["default"]="GB";
$elem["mirror/ftp/hostname"]["type"]="string";
$elem["mirror/ftp/hostname"]["description"]="Ubuntu archive mirror hostname:
 Please enter the hostname of the mirror from which Ubuntu will be downloaded.
 .
 An alternate port can be specified using the standard [hostname]:[port]
 format.
";
$elem["mirror/ftp/hostname"]["descriptionde"]="Rechnername des Ubuntu-Archiv-Spiegelservers:
 Geben Sie den Namen des Spiegelservers ein, von dem Ubuntu heruntergeladen
 werden soll.
 .
 Ein anderer Port kann mit [Rechnername]:[Port] angegeben werden.
";
$elem["mirror/ftp/hostname"]["descriptionfr"]="Nom d'hôte du miroir de l'archive Ubuntu :
 Veuillez indiquer le nom du miroir Ubuntu à partir duquel se fera le
 téléchargement.
 .
 Un port différent peut être indiqué en utilisant le format normalisé
 [nom_d'hôte]:[port].
";
$elem["mirror/ftp/hostname"]["default"]="mirror";
$elem["mirror/ftp/directory"]["type"]="string";
$elem["mirror/ftp/directory"]["description"]="Ubuntu archive mirror directory:
 Please enter the directory in which the mirror of the Ubuntu archive is
 located.
";
$elem["mirror/ftp/directory"]["descriptionde"]="Ubuntu-Archiv Spiegel-Verzeichnis:
 Bitte geben Sie das Verzeichnis an, in dem sich der Ubuntu-Archiv-Spiegel
 befindet.
";
$elem["mirror/ftp/directory"]["descriptionfr"]="Répertoire du miroir de l'archive Ubuntu :
 Veuillez indiquer le répertoire dans lequel se situe le miroir de
 l'archive Ubuntu.
";
$elem["mirror/ftp/directory"]["default"]="/ubuntu/";
$elem["mirror/ftp/proxy"]["type"]="string";
$elem["mirror/ftp/proxy"]["description"]="FTP proxy information (blank for none):
 If you need to use a FTP proxy to access the outside world, enter the
 proxy information here. Otherwise, leave this blank.
 .
 The proxy information should be given in the standard form of
 \"http://[[user][:pass]@]host[:port]/\".
";
$elem["mirror/ftp/proxy"]["descriptionde"]="FTP Proxy-Daten (leer lassen für keinen Proxy):
 Falls Sie einen FTP-Proxy benötigen, um nach außen zugreifen zu können,
 geben Sie hier bitte Ihre Daten an. Falls nicht, lassen Sie dieses Feld
 leer.
 .
 Die Proxy-Daten sollten im Standardformat
 »http://[[user][:pass]@]host[:port]/« angegeben werden.
";
$elem["mirror/ftp/proxy"]["descriptionfr"]="Mandataire FTP (laisser vide si aucun) :
 Si vous avez besoin d'utiliser un mandataire FTP (souvent appelé
 « proxy ») pour accéder au monde extérieur, indiquez ses paramètres
 ici. Sinon, laissez ce champ vide.
 .
 Les paramètres du mandataire doivent être indiqués avec la forme
 normalisée « http://[[utilisateur][:mot-de-passe]@]hôte[:port]/ ».
";
$elem["mirror/ftp/proxy"]["default"]="";
$elem["mirror/protocol"]["type"]="select";
$elem["mirror/protocol"]["description"]="Protocol for file downloads:
 Please select the protocol to be used for downloading files. If unsure,
 select \"http\"; it is less prone to problems involving firewalls.
";
$elem["mirror/protocol"]["descriptionde"]="Protokoll für Datei-Downloads:
 Bitte wählen Sie das Protokoll, das zum Herunterladen der Dateien
 verwendet werden soll. Falls Sie sich nicht sicher sind, wählen Sie
 »http«. Es verursacht weniger Probleme mit Firewalls.
";
$elem["mirror/protocol"]["descriptionfr"]="Protocole de téléchargement des fichiers :
 Veuillez choisir le protocole à utiliser pour le téléchargement des
 fichiers. Si vous êtes indécis, choisissez « http », étant donné
 qu'il s'agit du protocole qui pose le moins de problème de filtrage par
 des pare-feux.
";
$elem["mirror/protocol"]["default"]="http";
$elem["debian-installer/clock-setup/title"]["type"]="text";
$elem["debian-installer/clock-setup/title"]["description"]="Configure the clock
";
$elem["debian-installer/clock-setup/title"]["descriptionde"]="Uhr einstellen
";
$elem["debian-installer/clock-setup/title"]["descriptionfr"]="Configurer l'horloge
";
$elem["debian-installer/clock-setup/title"]["default"]="";
$elem["clock-setup/utc"]["type"]="boolean";
$elem["clock-setup/utc"]["description"]="Is the system clock set to UTC?
 System clocks are generally set to Coordinated Universal Time (UTC).
 The operating system uses your time zone to convert system time into
 local time. This is recommended unless you also use another operating
 system that expects the clock to be set to local time.
";
$elem["clock-setup/utc"]["descriptionde"]="Ist die Systemzeit auf UTC gesetzt?
 Systemuhren sind normalerweise auf UTC (koordinierte Weltzeit, Universal Coordinated Time) gestellt. Das Betriebssystem benutzt Ihre Zeitzone, um die Systemzeit in die lokale Zeit umzurechnen. Sofern kein anderes Betriebssystem die Systemzeit auf die lokale Zeit eingestellt erwartet, sollten Sie die Systemzeit auf UTC einstellen.
";
$elem["clock-setup/utc"]["descriptionfr"]="L'horloge système est-elle à l'heure universelle (UTC) ?
 Les horloges systèmes sont souvent calées sur le temps universel coordonné (UTC : « Universal Coordinated Time »). Le système d'exploitation se sert de votre fuseau horaire pour convertir cette heure système en heure locale. Il est recommandé de choisir cette option à moins d'utiliser un autre système d'exploitation qui s'attend à ce que l'horloge système soit réglée sur l'heure locale.
";
$elem["clock-setup/utc"]["default"]="true";
$elem["clock-setup/utc-auto"]["type"]="boolean";
$elem["clock-setup/utc-auto"]["description"]="for internal use; can be preseeded
 If true and we are the only OS on the disk, don't ask clock-setup/utc.

";
$elem["clock-setup/utc-auto"]["descriptionde"]="";
$elem["clock-setup/utc-auto"]["descriptionfr"]="";
$elem["clock-setup/utc-auto"]["default"]="false";
$elem["finish-install/progress/clock-setup"]["type"]="text";
$elem["finish-install/progress/clock-setup"]["description"]="Configuring clock settings...
";
$elem["finish-install/progress/clock-setup"]["descriptionde"]="Konfigurieren der Uhreinstellungen ...
";
$elem["finish-install/progress/clock-setup"]["descriptionfr"]="Configuration des paramètres de l'horloge...
";
$elem["finish-install/progress/clock-setup"]["default"]="";
$elem["clock-setup/progress/title"]["type"]="text";
$elem["clock-setup/progress/title"]["description"]="Setting up the clock
";
$elem["clock-setup/progress/title"]["descriptionde"]="Einstellen der Uhr
";
$elem["clock-setup/progress/title"]["descriptionfr"]="Configuration de l'horloge
";
$elem["clock-setup/progress/title"]["default"]="";
$elem["clock-setup/ntp"]["type"]="boolean";
$elem["clock-setup/ntp"]["description"]="Set the clock using NTP?
 The Network Time Protocol (NTP) can be used to set the system's clock.
 The installation process works best with a correctly set clock.
";
$elem["clock-setup/ntp"]["descriptionde"]="Die Uhr mittels NTP einstellen?
 Das Network Time Protocol (NTP) kann verwendet werden, um die Systemuhr einzustellen. Der Installationsprozess funktioniert mit einer korrekt eingestellten Uhr am besten.
";
$elem["clock-setup/ntp"]["descriptionfr"]="Faut-il utiliser NTP pour régler l'horloge ?
 Le protocole de temps en réseau (NTP : « Network Time Protocol ») peut être utilisé pour  régler l'horloge du système. La procédure d'installation fonctionne mieux si l'horloge est correctement réglée.
";
$elem["clock-setup/ntp"]["default"]="true";
$elem["clock-setup/ntp-server"]["type"]="string";
$elem["clock-setup/ntp-server"]["description"]="NTP server to use:
 The default NTP server is almost always a good choice, but if
 you prefer to use another NTP server, you can enter it here.
";
$elem["clock-setup/ntp-server"]["descriptionde"]="Zu verwendender NTP-Server:
 Der Standard-NTP-Server ist nahezu immer eine gute Wahl. Falls Sie aber einen anderen NTP-Server bevorzugen, können Sie ihn hier eingeben.
";
$elem["clock-setup/ntp-server"]["descriptionfr"]="Serveur NTP à utiliser :
 Le serveur NTP proposé par défaut est en général un choix approprié. Vous pouvez cependant indiquer un autre serveur à utiliser pour le réglage de l'horloge.
";
$elem["clock-setup/ntp-server"]["default"]="ntp.ubuntu.com";
$elem["clock-setup/progress/ntp"]["type"]="text";
$elem["clock-setup/progress/ntp"]["description"]="Getting the time from a network time server...
";
$elem["clock-setup/progress/ntp"]["descriptionde"]="Holen der Zeit von einem Netzwerk-Zeit-Server ...
";
$elem["clock-setup/progress/ntp"]["descriptionfr"]="Récupération de l'heure depuis un serveur de temps...
";
$elem["clock-setup/progress/ntp"]["default"]="";
$elem["clock-setup/progress/hwclock"]["type"]="text";
$elem["clock-setup/progress/hwclock"]["description"]="Setting the hardware clock...
";
$elem["clock-setup/progress/hwclock"]["descriptionde"]="Einstellen der Hardware-(CMOS-)Uhr ...
";
$elem["clock-setup/progress/hwclock"]["descriptionfr"]="Configuration de l'horloge matérielle...
";
$elem["clock-setup/progress/hwclock"]["default"]="";
$elem["clock-setup/hwclock-wait"]["type"]="boolean";
$elem["clock-setup/hwclock-wait"]["description"]="Wait another 30 seconds for hwclock to set the clock?
 Setting the hardware clock is taking longer than expected. The 'hwclock'
 program used to set the clock may have problems talking to the hardware clock.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
 .
 If you choose to not wait for hwclock to finish setting the clock, this
 system's clock may not be set correctly.
";
$elem["clock-setup/hwclock-wait"]["descriptionde"]="Weitere 30 Sekunden auf hwclock zur Einstellung der Uhr warten?
 Das Setzen der Hardware-Uhr dauert länger als erwartet. Das Programm »hwclock«, das zum Einstellen der Uhr verwendet wird, könnte Probleme bei der Verbindung mit der Hardware-Uhr haben.
 .
 Schauen Sie in /var/log/syslog oder auf die vierte virtuelle Konsole bezüglich detaillierter Informationen.
 .
 Falls Sie sich entscheiden, nicht auf hwclock zur Einstellung der Uhr zu warten, könnte die Uhr dieses Systems nicht korrekt eingestellt sein.
";
$elem["clock-setup/hwclock-wait"]["descriptionfr"]="Attendre un délai supplémentaire (30s) pour terminer le réglage de l'horloge ?
 Le réglage de l'horloge est plus long que prévu. Le programme (« hwclock ») qui est utilisé pour cette opération rencontre peut-être des difficultés pour communiquer avec l'horloge matérielle.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
 .
 Si vous choisissez de ne pas attendre, l'horloge système pourrait être incorrectement réglée.
";
$elem["clock-setup/hwclock-wait"]["default"]="false";
$elem["clock-setup/system-time-changed"]["type"]="boolean";
$elem["clock-setup/system-time-changed"]["description"]="for internal use only
 Set to true when rdate actually updates the system clock.

";
$elem["clock-setup/system-time-changed"]["descriptionde"]="";
$elem["clock-setup/system-time-changed"]["descriptionfr"]="";
$elem["clock-setup/system-time-changed"]["default"]="false";
$elem["debian-installer/di-utils-exit-installer/title"]["type"]="text";
$elem["debian-installer/di-utils-exit-installer/title"]["description"]="Exit installer
";
$elem["debian-installer/di-utils-exit-installer/title"]["descriptionde"]="Installer beenden
";
$elem["debian-installer/di-utils-exit-installer/title"]["descriptionfr"]="Quitter le programme d'installation
";
$elem["debian-installer/di-utils-exit-installer/title"]["default"]="";
$elem["di-utils-reboot/really_reboot"]["type"]="boolean";
$elem["di-utils-reboot/really_reboot"]["description"]="Are you sure you want to exit now?
 If you have not finished the install, your system may be left in an
 unusable state.
";
$elem["di-utils-reboot/really_reboot"]["descriptionde"]="Sind Sie sicher, dass Sie die Installation beenden möchten?
 Wenn Sie Ihre Installation nicht abgeschlossen haben, könnte Ihr System nicht boot-fähig sein.
";
$elem["di-utils-reboot/really_reboot"]["descriptionfr"]="Voulez-vous vraiment quitter maintenant ?
 Si l'installation n'est pas terminée, le système peut être inutilisable.
";
$elem["di-utils-reboot/really_reboot"]["default"]="false";
$elem["debian-installer/di-utils-reboot/title"]["type"]="text";
$elem["debian-installer/di-utils-reboot/title"]["description"]="Abort the installation
";
$elem["debian-installer/di-utils-reboot/title"]["descriptionde"]="Installation abbrechen
";
$elem["debian-installer/di-utils-reboot/title"]["descriptionfr"]="Interrompre l'installation
";
$elem["debian-installer/di-utils-reboot/title"]["default"]="";
$elem["di-utils-shell/do-shell"]["type"]="note";
$elem["di-utils-shell/do-shell"]["description"]="Interactive shell
 After this message, you will be running \"ash\", a Bourne-shell clone. 
 .
 The root file system is a RAM disk. The hard disk file systems are
 mounted on \"/target\". The editor available to you is nano. It's very
 small and easy to figure out. To get an idea of what Unix utilities
 are available to you, use the \"help\" command.
 .
 Use the \"exit\" command to return to the installation menu.
";
$elem["di-utils-shell/do-shell"]["descriptionde"]="Interaktive Shell
 Nach dieser Nachricht wird »ash«, ein Bourne-Shell-Klon ausgeführt.
 .
 Das Root-Dateisystem ist eine RAM-Disk. Die Festplatten-Dateisysteme sind unter »/target« eingebunden. Der zur Verfügung stehende Editor ist »nano«. Er ist sehr klein und sehr einfach zu verwenden. Um herauszufinden, welche UNIX-Werkzeuge zur Verfügung stehen, können Sie das Kommando »help« verwenden.
 .
 Benutzen Sie das »exit«-Kommando, um zum Installationsmenü zurückzugelangen.
";
$elem["di-utils-shell/do-shell"]["descriptionfr"]="Ligne de commande interactive
 Après ce message, vous utiliserez « ash », un clone du Bourne-shell.
 .
 Le système de fichiers racine est un disque mémoire. Les systèmes de fichiers qui se trouvent sur le disque dur sont montés sur « /target ». L'éditeur de texte disponible est nano, un petit éditeur facile à utiliser. Pour vous faire une idée des utilitaires Unix dont vous disposez, utilisez la commande « help ». 
 .
 Vous pouvez utiliser la commande « exit » pour revenir au menu d'installation.
";
$elem["di-utils-shell/do-shell"]["default"]="";
$elem["debian-installer/di-utils-shell/title"]["type"]="text";
$elem["debian-installer/di-utils-shell/title"]["description"]="Execute a shell
";
$elem["debian-installer/di-utils-shell/title"]["descriptionde"]="Eine Shell ausführen
";
$elem["debian-installer/di-utils-shell/title"]["descriptionfr"]="Exécuter un shell (ligne de commande)
";
$elem["debian-installer/di-utils-shell/title"]["default"]="";
$elem["debian-installer/add-kernel-opts"]["type"]="string";
$elem["debian-installer/add-kernel-opts"]["description"]="for internal use; can be preseeded
 Extra (custom) boot options to add for target system.

";
$elem["debian-installer/add-kernel-opts"]["descriptionde"]="";
$elem["debian-installer/add-kernel-opts"]["descriptionfr"]="";
$elem["debian-installer/add-kernel-opts"]["default"]="";
$elem["debian-installer/dummy"]["type"]="string";
$elem["debian-installer/dummy"]["description"]="Dummy template for preseeding unavailable questions
 The answer to this question has been preseeded (${ID}).
 If you see this template, you've found a bug in the installer;
 please file a report.

";
$elem["debian-installer/dummy"]["descriptionde"]="";
$elem["debian-installer/dummy"]["descriptionfr"]="";
$elem["debian-installer/dummy"]["default"]="";
$elem["debian-installer/shell-plugin"]["type"]="terminal";
$elem["debian-installer/shell-plugin"]["description"]="${TITLE}

";
$elem["debian-installer/shell-plugin"]["descriptionde"]="";
$elem["debian-installer/shell-plugin"]["descriptionfr"]="";
$elem["debian-installer/shell-plugin"]["default"]="";
$elem["debian-installer/shell-plugin-default-title"]["type"]="text";
$elem["debian-installer/shell-plugin-default-title"]["description"]="Interactive shell
";
$elem["debian-installer/shell-plugin-default-title"]["descriptionde"]="Interaktive Shell
";
$elem["debian-installer/shell-plugin-default-title"]["descriptionfr"]="Ligne de commande interactive
";
$elem["debian-installer/shell-plugin-default-title"]["default"]="";
$elem["debian-installer/terminal-plugin-unavailable"]["type"]="error";
$elem["debian-installer/terminal-plugin-unavailable"]["description"]="Terminal plugin not available
 This build of the debian-installer requires the terminal plugin in
 order to display a shell. Unfortunately, this plugin is currently
 unavailable.
 .
 It should be available after reaching the \"Loading additional components\"
 installation step.
 .
 ${WORKAROUND}
";
$elem["debian-installer/terminal-plugin-unavailable"]["descriptionde"]="Konsolen-Plugin nicht verfügbar
 Dieser Bau des Debian-Installers benötigt das Konsolen-Plugin, um eine Shell anzuzeigen. Unglücklicherweise ist dieses Plugin derzeit nicht verfügbar.
 .
 Es sollte nach dem Erreichen des Installationsschritts »Zusätzliche Komponenten laden« verfügbar sein.
 .
 ${WORKAROUND}
";
$elem["debian-installer/terminal-plugin-unavailable"]["descriptionfr"]="Module d'émulation de terminal indisponible
 Cette version de l'installateur a besoin du module d'émulation de terminal pour donner accès à la ligne de commande. Ce module n'est toutefois pas disponible.
 .
 Il devrait devenir disponible après l'étape « charger des composants supplémentaires ».
 .
 ${WORKAROUND}
";
$elem["debian-installer/terminal-plugin-unavailable"]["default"]="";
$elem["debian-installer/workaround-gtk"]["type"]="text";
$elem["debian-installer/workaround-gtk"]["description"]="Alternatively, you can open a shell by pressing Ctrl+Alt+F2. Use Alt+F5 to get back to the installer.
";
$elem["debian-installer/workaround-gtk"]["descriptionde"]="Alternativ können Sie eine Shell durch Drücken von Strg+Alt+F2 öffnen. Verwenden Sie Alt+F5, um zum Installer zurückzukehren.
";
$elem["debian-installer/workaround-gtk"]["descriptionfr"]="Dans l'intervalle, vous pouvez accéder à la ligne de commande avec la combinaison de touches Ctrl+Alt+F2. Vous pourrez ensuite retourner dans l'installateur avec Alt+F5.
";
$elem["debian-installer/workaround-gtk"]["default"]="";
$elem["debian-installer/disk-detect/title"]["type"]="text";
$elem["debian-installer/disk-detect/title"]["description"]="Detect disks
";
$elem["debian-installer/disk-detect/title"]["descriptionde"]="Festplatten erkennen
";
$elem["debian-installer/disk-detect/title"]["descriptionfr"]="Détecter les disques
";
$elem["debian-installer/disk-detect/title"]["default"]="";
$elem["disk-detect/detect_progress_title"]["type"]="text";
$elem["disk-detect/detect_progress_title"]["description"]="Detecting disks and all other hardware
";
$elem["disk-detect/detect_progress_title"]["descriptionde"]="Erkennen von Festplatten und anderen Hardware-Geräten
";
$elem["disk-detect/detect_progress_title"]["descriptionfr"]="Détection des disques et des autres périphériques
";
$elem["disk-detect/detect_progress_title"]["default"]="";
$elem["disk-detect/module_select"]["type"]="select";
$elem["disk-detect/module_select"]["choices"][1]="continue with no disk drive";
$elem["disk-detect/module_select"]["choices"][2]="${CHOICES}";
$elem["disk-detect/module_select"]["choicesde"][1]="ohne Laufwerk fortfahren";
$elem["disk-detect/module_select"]["choicesde"][2]="${CHOICES}";
$elem["disk-detect/module_select"]["choicesfr"][1]="Continuer sans disque dur";
$elem["disk-detect/module_select"]["choicesfr"][2]="${CHOICES}";
$elem["disk-detect/module_select"]["description"]="Driver needed for your disk drive:
 No disk drive was detected. If you know the name of the driver
 needed by your disk drive, you can select it from the list.
";
$elem["disk-detect/module_select"]["descriptionde"]="Treiber werden für Ihr Laufwerk benötigt:
 Es wurde kein Laufwerk erkannt. Falls Sie den Namen des Treibers für Ihr Laufwerk kennen, können Sie ihn aus der Liste wählen.
";
$elem["disk-detect/module_select"]["descriptionfr"]="Module nécessaire pour le disque dur :
 Aucun disque dur n'a été trouvé. Si vous connaissez le nom du pilote nécessaire pour le fonctionnement du disque dur, veuillez le choisir dans la liste.
";
$elem["disk-detect/module_select"]["default"]="continue with no disk drive";
$elem["disk-detect/cannot_find"]["type"]="error";
$elem["disk-detect/cannot_find"]["description"]="No partitionable media
 No partitionable media were found.
 .
 Please check that a hard disk is attached to this machine.
";
$elem["disk-detect/cannot_find"]["descriptionde"]="Kein partitionierbares Medium
 Es wurde kein Medium gefunden, das partitioniert werden kann.
 .
 Bitte prüfen Sie, ob eine Festplatte angeschlossen ist.
";
$elem["disk-detect/cannot_find"]["descriptionfr"]="Aucun périphérique disponible pour le partitionnement
 Aucun périphérique pouvant être partitionné n'a été trouvé.
 .
 Veuillez vérifier qu'un disque dur est bien présent sur cette machine.
";
$elem["disk-detect/cannot_find"]["default"]="";
$elem["disk-detect/multipath/enable"]["type"]="boolean";
$elem["disk-detect/multipath/enable"]["description"]="for internal use; can be preseeded
 Check for the presence of multipath devices?

";
$elem["disk-detect/multipath/enable"]["descriptionde"]="";
$elem["disk-detect/multipath/enable"]["descriptionfr"]="";
$elem["disk-detect/multipath/enable"]["default"]="false";
$elem["disk-detect/activate_mdadm"]["type"]="boolean";
$elem["disk-detect/activate_mdadm"]["description"]="Activate MDADM containers (Intel/DDF RAID)?
 One or more drives containing MDADM containers (Intel/DDF RAID) have
 been found.  Do you wish to activate these RAID devices?

";
$elem["disk-detect/activate_mdadm"]["descriptionde"]="";
$elem["disk-detect/activate_mdadm"]["descriptionfr"]="";
$elem["disk-detect/activate_mdadm"]["default"]="true";
$elem["disk-detect/activate_dmraid"]["type"]="boolean";
$elem["disk-detect/activate_dmraid"]["description"]="Activate Serial ATA RAID devices?
 One or more drives containing Serial ATA RAID configurations have been found.
 Do you wish to activate these RAID devices?
";
$elem["disk-detect/activate_dmraid"]["descriptionde"]="Serielle ATA-RAID-Geräte aktivieren?
 Ein oder mehrere Laufwerke, die serielle ATA-RAID-Konfigurationen beinhalten, wurden gefunden. Möchten Sie diese RAID-Geräte aktivieren?
";
$elem["disk-detect/activate_dmraid"]["descriptionfr"]="Activer les périphériques RAID SATA ?
 Un ou plusieurs lecteurs ayant des configurations RAID SATA ont été trouvés. Souhaitez-vous activer ces périphériques RAID ?
";
$elem["disk-detect/activate_dmraid"]["default"]="true";
$elem["disk-detect/iscsi_choice"]["type"]="text";
$elem["disk-detect/iscsi_choice"]["description"]="login to iSCSI targets
";
$elem["disk-detect/iscsi_choice"]["descriptionde"]="Bei iSCSI-Zielen anmelden
";
$elem["disk-detect/iscsi_choice"]["descriptionfr"]="s'identifier sur des cibles iSCSI
";
$elem["disk-detect/iscsi_choice"]["default"]="";
$elem["debian-installer/driver-injection-disk-detect/title"]["type"]="text";
$elem["debian-installer/driver-injection-disk-detect/title"]["description"]="Detect virtual driver disks from hardware manufacturer
";
$elem["debian-installer/driver-injection-disk-detect/title"]["descriptionde"]="Virtuelle Treiber-Disks des Hardware-Herstellers detektieren
";
$elem["debian-installer/driver-injection-disk-detect/title"]["descriptionfr"]="Détecter les supports virtuels de pilotes du constructeur
";
$elem["debian-installer/driver-injection-disk-detect/title"]["default"]="";
$elem["driver-injection-disk/load"]["type"]="boolean";
$elem["driver-injection-disk/load"]["description"]="Load drivers from internal virtual driver disk?
 Installing on this hardware may require some drivers provided by the
 manufacturer to be loaded from the built-in driver injection disk.
";
$elem["driver-injection-disk/load"]["descriptionde"]="Treiber von interner virtueller Treiber-Disk laden?
 Eine Installation auf dieser Hardware macht es unter Umständen erforderlich, dass einige Treiber, die vom Hersteller bereitgestellt werden, von der eingebauten Treiber-Injection-Disk geladen werden.
";
$elem["driver-injection-disk/load"]["descriptionfr"]="Faut-il charger les pilotes depuis disque virtuel interne ?
 L'installation sur ce type de matériel peut nécessiter des pilotes fournis par son constructeur. Ces pilotes seront chargés depuis un disque virtuel inclus sur le périphérique matériel.
";
$elem["driver-injection-disk/load"]["default"]="true";
$elem["ethdetect/module_select"]["type"]="select";
$elem["ethdetect/module_select"]["choices"][1]="no ethernet card";
$elem["ethdetect/module_select"]["choices"][2]="${CHOICES}";
$elem["ethdetect/module_select"]["choicesde"][1]="keine Ethernet-Karte";
$elem["ethdetect/module_select"]["choicesde"][2]="${CHOICES}";
$elem["ethdetect/module_select"]["choicesfr"][1]="Aucune carte Ethernet";
$elem["ethdetect/module_select"]["choicesfr"][2]="${CHOICES}";
$elem["ethdetect/module_select"]["description"]="Driver needed by your Ethernet card:
 No Ethernet card was detected. If you know the name of the driver
 needed by your Ethernet card, you can select it from the list.
";
$elem["ethdetect/module_select"]["descriptionde"]="Von Ihrer Ethernet-Karte benötigter Treiber:
 Es wurde keine Ethernet-Karte gefunden. Wenn Sie den Namen des Treibers Ihrer Ethernet-Karte kennen, können Sie ihn in der Liste auswählen.
";
$elem["ethdetect/module_select"]["descriptionfr"]="Module nécessaire pour la carte Ethernet :
 Aucune carte réseau Ethernet n'a été trouvée. Si vous connaissez le nom du pilote nécessaire pour le fonctionnement de la carte réseau, veuillez le choisir dans la liste.
";
$elem["ethdetect/module_select"]["default"]="no ethernet card";
$elem["ethdetect/use_firewire_ethernet"]["type"]="boolean";
$elem["ethdetect/use_firewire_ethernet"]["description"]="Do you intend to use FireWire Ethernet?
 No Ethernet card was detected, but a FireWire interface is present.
 It's possible, though unlikely, that with the right FireWire hardware
 connected to it, this could be your primary Ethernet interface.
";
$elem["ethdetect/use_firewire_ethernet"]["descriptionde"]="Beabsichtigen Sie, Fire-Wire-Ethernet zu benutzen?
 Es wurde keine Netzwerkkarte gefunden, jedoch ist eine FireWire-Schnittstelle vorhanden. Es ist möglich, wenn auch unwahrscheinlich, dass die entsprechende Hardware, die mit diesem Gerät verbunden ist, als primäre Netzwerkschnittstelle dient.
";
$elem["ethdetect/use_firewire_ethernet"]["descriptionfr"]="Voulez-vous utiliser l'Ethernet FireWire ?
 Aucune carte Ethernet n'a été détectée mais une interface FireWire existe. Il est possible, quoiqu'improbable, qu'elle puisse devenir l'interface Ethernet principale si un périphérique Ethernet y est connecté.
";
$elem["ethdetect/use_firewire_ethernet"]["default"]="false";
$elem["ethdetect/cannot_find"]["type"]="error";
$elem["ethdetect/cannot_find"]["description"]="Ethernet card not found
 No Ethernet card was found on the system.
";
$elem["ethdetect/cannot_find"]["descriptionde"]="Es wurde keine Ethernet-Karte erkannt.
 In Ihrem Computer wurde keine Ethernet-Karte gefunden.
";
$elem["ethdetect/cannot_find"]["descriptionfr"]="Aucune carte Ethernet détectée
 Aucune carte Ethernet n'a été détectée sur le système.
";
$elem["ethdetect/cannot_find"]["default"]="";
$elem["ethdetect/detect_progress_title"]["type"]="text";
$elem["ethdetect/detect_progress_title"]["description"]="Detecting network hardware
";
$elem["ethdetect/detect_progress_title"]["descriptionde"]="Erkennen der Netzwerk-Hardware
";
$elem["ethdetect/detect_progress_title"]["descriptionfr"]="Détection du matériel réseau
";
$elem["ethdetect/detect_progress_title"]["default"]="";
$elem["ethdetect/prompt_missing_firmware"]["type"]="boolean";
$elem["ethdetect/prompt_missing_firmware"]["description"]="for internal use; can be preseeded
 Prompt for missing firmware to be provided before the network is up?

";
$elem["ethdetect/prompt_missing_firmware"]["descriptionde"]="";
$elem["ethdetect/prompt_missing_firmware"]["descriptionfr"]="";
$elem["ethdetect/prompt_missing_firmware"]["default"]="true";
$elem["debian-installer/ethdetect/title"]["type"]="text";
$elem["debian-installer/ethdetect/title"]["description"]="Detect network hardware
";
$elem["debian-installer/ethdetect/title"]["descriptionde"]="Netzwerk-Hardware erkennen
";
$elem["debian-installer/ethdetect/title"]["descriptionfr"]="Détecter le matériel réseau
";
$elem["debian-installer/ethdetect/title"]["default"]="";
$elem["debian-installer/file-preseed/title"]["type"]="text";
$elem["debian-installer/file-preseed/title"]["description"]="Load debconf preconfiguration file
";
$elem["debian-installer/file-preseed/title"]["descriptionde"]="Debconf-Vorkonfigurationsdatei laden
";
$elem["debian-installer/file-preseed/title"]["descriptionfr"]="Charger un fichier de préconfiguration
";
$elem["debian-installer/file-preseed/title"]["default"]="";
$elem["preseed/file"]["type"]="string";
$elem["preseed/file"]["description"]="for internal use; can be preseeded
 Path to debconf preconfiguration file (or files) to load

";
$elem["preseed/file"]["descriptionde"]="";
$elem["preseed/file"]["descriptionfr"]="";
$elem["preseed/file"]["default"]="";
$elem["preseed/file/checksum"]["type"]="string";
$elem["preseed/file/checksum"]["description"]="for internal use; can be preseeded
 Optional md5sum (or sums) for the preconfiguration files

";
$elem["preseed/file/checksum"]["descriptionde"]="";
$elem["preseed/file/checksum"]["descriptionfr"]="";
$elem["preseed/file/checksum"]["default"]="";
$elem["grub-installer/with_other_os"]["type"]="boolean";
$elem["grub-installer/with_other_os"]["description"]="Install the GRUB boot loader to the master boot record?
 The following other operating systems have been detected on this
 computer: ${OS_LIST}
 .
 If all of your operating systems are listed above, then it should be safe to
 install the boot loader to the master boot record of your first hard
 drive. When your computer boots, you will be able to choose to load one of
 these operating systems or your new system.
";
$elem["grub-installer/with_other_os"]["descriptionde"]="Den GRUB-Bootloader in den Master Boot Record installieren?
 Es wurden folgende zusätzliche Betriebssysteme auf diesem Computer gefunden: ${OS_LIST}
 .
 Sind alle installierten Betriebssysteme oben aufgelistet, sollte es kein Problem sein, den Bootloader in den Master Boot Record Ihrer ersten Festplatte zu installieren. Wenn Ihr Computer startet, werden Sie die Möglichkeit haben, eines dieser Betriebssysteme zu wählen und zu starten.
";
$elem["grub-installer/with_other_os"]["descriptionfr"]="Installer le programme de démarrage GRUB sur le secteur d'amorçage ?
 Les systèmes d'exploitation suivants ont été détectés sur cet ordinateur : ${OS_LIST}
 .
 Si tous les systèmes d'exploitation de l'ordinateur sont mentionnés, il est possible d'installer le programme de démarrage sur le secteur d'amorçage de votre premier disque dur. Au démarrage de l'ordinateur, vous pourrez choisir de lancer un de ces systèmes ou le nouveau système.
";
$elem["grub-installer/with_other_os"]["default"]="true";
$elem["grub-installer/only_debian"]["type"]="boolean";
$elem["grub-installer/only_debian"]["description"]="Install the GRUB boot loader to the master boot record?
 It seems that this new installation is the only operating system
 on this computer. If so, it should be safe to install the GRUB boot loader
 to the master boot record of your first hard drive.
 .
 Warning: If the installer failed to detect another operating system that
 is present on your computer, modifying the master boot record will make
 that operating system temporarily unbootable, though GRUB can be manually
 configured later to boot it.
";
$elem["grub-installer/only_debian"]["descriptionde"]="Den GRUB-Bootloader in den Master Boot Record installieren?
 Es scheint, als ob diese Installation von Debian das einzige Betriebssystem auf diesem Computer ist. Wenn dies der Fall ist, sollte es kein Problem sein, den Bootloader in den Master Boot Record Ihrer ersten Festplatte zu installieren.
 .
 Warnung: Wenn der Installer ein anderes Betriebssystem auf Ihrem Computer nicht richtig erkennt, Sie aber den Master Boot Record verändern, werden Sie dieses andere Betriebssystem vorläufig nicht mehr starten können. Allerdings kann GRUB im Nachhinein manuell konfiguriert werden, so dass das andere Betriebssystem wieder startet.
";
$elem["grub-installer/only_debian"]["descriptionfr"]="Installer le programme de démarrage GRUB sur le secteur d'amorçage ?
 Il semble que cette nouvelle installation soit le seul système d'exploitation existant sur cet ordinateur. Si c'est bien le cas, il est possible d'installer le programme de démarrage GRUB sur le secteur d'amorçage du premier disque dur.
 .
 Attention : si le programme d'installation ne détecte pas un système d'exploitation installé sur l'ordinateur, la modification du secteur principal d'amorçage empêchera temporairement ce système de démarrer. Toutefois, le programme de démarrage GRUB pourra être manuellement reconfiguré plus tard pour permettre ce démarrage.
";
$elem["grub-installer/only_debian"]["default"]="true";
$elem["grub-installer/sataraid"]["type"]="boolean";
$elem["grub-installer/sataraid"]["description"]="Install the GRUB boot loader to the Serial ATA RAID disk?
 Installation of GRUB on Serial ATA RAID is experimental.
 .
 GRUB is always installed to the master boot record (MBR) of the
 Serial ATA RAID disk. It is also assumed that disk is listed as the
 first hard disk in the boot order defined in the system's BIOS setup.
 .
 The GRUB root device is: ${GRUBROOT}.
";
$elem["grub-installer/sataraid"]["descriptionde"]="Den GRUB-Bootloader auf die Serial-ATA-RAID-Platte installieren?
 Die Installation von GRUB auf Serial-ATA-RAID ist experimentell.
 .
 GRUB wird immer in den Master Boot Record (MBR) der Serial-ATA-RAID-Platte installiert. Es wird auch angenommen, dass diese Platte als erste Festplatte in der Boot-Reihenfolge im BIOS aufgeführt ist.
 .
 Das GRUB-Root-Gerät ist: ${GRUBROOT}.
";
$elem["grub-installer/sataraid"]["descriptionfr"]="Installer le programme de démarrage GRUB sur un disque Serial ATA RAID ?
 L'installation de GRUB sur un disque Serial ATA RAID est expérimentale.
 .
 GRUB est toujours installé sur le secteur d'amorçage principal (MBR : « Master Boot Record ») du disque Serial ATA RAID. IL est également supposé que ce disque apparaît comme le premier disque dur dans l'ordre de démarrage défini par les réglages BIOS du système.
 .
 Le disque racine pour GRUB est : ${GRUBROOT}.
";
$elem["grub-installer/sataraid"]["default"]="true";
$elem["grub-installer/sataraid-error"]["type"]="error";
$elem["grub-installer/sataraid-error"]["description"]="Unable to configure GRUB
 An error occurred while setting up GRUB for your Serial ATA RAID disk.
 .
 The GRUB installation has been aborted.
";
$elem["grub-installer/sataraid-error"]["descriptionde"]="GRUB konnte nicht konfiguriert werden.
 Es trat ein Fehler auf, als GRUB für Ihre Serial-ATA-RAID-Platte eingerichtet wurde.
 .
 Die GRUB-Konfiguration wurde abgebrochen.
";
$elem["grub-installer/sataraid-error"]["descriptionfr"]="Impossible de configurer GRUB
 Une erreur s'est produite lors de l'installation de GRUB sur le disque Serial ATA RAID.
 .
 L'installation de GRUB a été interrompue.
";
$elem["grub-installer/sataraid-error"]["default"]="";
$elem["grub-installer/multipath"]["type"]="boolean";
$elem["grub-installer/multipath"]["description"]="Install the GRUB boot loader to the multipath device?
 Installation of GRUB on multipath is experimental.
 .
 GRUB is always installed to the master boot record (MBR) of the multipath
 device. It is also assumed that the WWID of this device is selected as boot
 device in the system's FibreChannel adapter BIOS.
 .
 The GRUB root device is: ${GRUBROOT}.
";
$elem["grub-installer/multipath"]["descriptionde"]="Den GRUB-Bootloader auf das Multipath-Gerät installieren?
 Die Installation von GRUB auf Multipath ist experimentell.
 .
 GRUB wird immer in den Master Boot Record (MBR) des Multipath-Geräts installiert. Es wird auch angenommen, dass die entsprechende WWID als Boot-Gerät im BIOS des FibreChannel-Adapters ausgewählt ist.
 .
 Das GRUB-Root-Gerät ist: ${GRUBROOT}.
";
$elem["grub-installer/multipath"]["descriptionfr"]="Installer le programme de démarrage GRUB sur le périphérique multichemin ?
 L'installation de GRUB sur un périphérique multichemin est expérimentale.
 .
 GRUB est toujours installé sur le secteur d'amorçage principal (MBR : « Master Boot Record ») du périphérique multichemin. IL est également supposé que l'identifiant universel (WWID : « Worldwide Identifier ») est défini comme périphérique de démarrage dans les réglages BIOS FibreChannel du système.
 .
 Le disque racine pour GRUB est : ${GRUBROOT}.
";
$elem["grub-installer/multipath"]["default"]="true";
$elem["grub-installer/multipath-error"]["type"]="error";
$elem["grub-installer/multipath-error"]["description"]="Unable to configure GRUB
 An error occurred while setting up GRUB for the multipath device.
 .
 The GRUB installation has been aborted.
";
$elem["grub-installer/multipath-error"]["descriptionde"]="GRUB konnte nicht konfiguriert werden.
 Es trat ein Fehler auf, als GRUB für das Multipath-Gerät eingerichtet wurde.
 .
 Die GRUB-Konfiguration wurde abgebrochen.
";
$elem["grub-installer/multipath-error"]["descriptionfr"]="Impossible de configurer GRUB
 Une erreur s'est produite lors de l'installation de GRUB sur le périphérique multichemin.
 .
 L'installation de GRUB a été interrompue.
";
$elem["grub-installer/multipath-error"]["default"]="";
$elem["grub-installer/bootdev"]["type"]="string";
$elem["grub-installer/bootdev"]["description"]="Device for boot loader installation:
 You need to make the newly installed system bootable, by installing
 the GRUB boot loader on a bootable device. The usual way to do this is to
 install GRUB on the master boot record of your first hard drive. If you
 prefer, you can install GRUB elsewhere on the drive, or to another drive,
 or even to a floppy.
 .
 The device should be specified as a device in /dev. Below are some
 examples:
  - \"/dev/sda\" will install GRUB to the master boot record of your first
    hard drive;
  - \"/dev/sda2\" will use the second partition of your first hard drive;
  - \"/dev/sdc5\" will use the first extended partition of your third hard
    drive;
  - \"/dev/fd0\" will install GRUB to a floppy.
";
$elem["grub-installer/bootdev"]["descriptionde"]="Gerät für die Bootloader-Installation:
 Das neu installierte System muss boot-fähig gemacht werden, indem der GRUB-Bootloader auf einem boot-fähigen Medium installiert wird. Gewöhnlich wird dazu GRUB im Master Boot Record Ihrer ersten Festplatte installiert. Wenn Sie möchten, können Sie GRUB auch auf einer anderen Partition, einem anderen Laufwerk oder auch auf einer Diskette installieren.
 .
 Das Gerät sollte als Gerätedatei in /dev angegeben werden. Im Folgenden einige Beispiele:
  - »/dev/sda« installiert GRUB in den Master Boot Record
    Ihrer ersten Festplatte;
  - »/dev/sda2« installiert GRUB in die zweite Partition
    Ihrer ersten Festplatte;
  - »/dev/sdc5« installiert GRUB in die erste erweiterte
    Partition Ihrer dritten Festplatte;
  - »/dev/fd0« installiert GRUB auf eine Diskette.
";
$elem["grub-installer/bootdev"]["descriptionfr"]="Périphérique où sera installé le programme de démarrage :
 Le système nouvellement installé doit pouvoir être démarré. Cette opération consiste à installer le programme de démarrage GRUB sur un périphérique de démarrage. La méthode habituelle pour cela est de l'installer sur le secteur d'amorçage principal du premier disque dur. Vous pouvez, si vous le souhaitez, l'installer ailleurs sur le disque, sur un autre disque ou même sur une disquette.
 .
 Le périphérique doit être indiqué avec un nom d'un périphérique dans /dev. Quelques exemples :
  - « /dev/sda » utilisera le secteur principal d'amorçage du
    premier disque dur ;
  - « /dev/sda2 » utilisera la deuxième partition du premier
    disque dur ;
  - « /dev/sdc5 » utilisera la première partition étendue
    du troisième disque ;
  - « /dev/fd0 » installera GRUB sur une disquette.
";
$elem["grub-installer/bootdev"]["default"]="";
$elem["grub-installer/choose_bootdev"]["type"]="select";
$elem["grub-installer/choose_bootdev"]["choices"][1]="Enter device manually";
$elem["grub-installer/choose_bootdev"]["choicesde"][1]="Gerät von Hand eingeben";
$elem["grub-installer/choose_bootdev"]["choicesfr"][1]="Choix manuel du périphérique";
$elem["grub-installer/choose_bootdev"]["description"]="Device for boot loader installation:
 You need to make the newly installed system bootable, by installing
 the GRUB boot loader on a bootable device. The usual way to do this is to
 install GRUB on the master boot record of your first hard drive. If you
 prefer, you can install GRUB elsewhere on the drive, or to another drive,
 or even to a floppy.
";
$elem["grub-installer/choose_bootdev"]["descriptionde"]="Gerät für die Bootloader-Installation:
 Das neu installierte System muss boot-fähig gemacht werden, indem der GRUB-Bootloader auf einem boot-fähigen Medium installiert wird. Gewöhnlich wird dazu GRUB im Master Boot Record Ihrer ersten Festplatte installiert. Wenn Sie möchten, können Sie GRUB auch auf einer anderen Partition, einem anderen Laufwerk oder auch auf einer Diskette installieren.
";
$elem["grub-installer/choose_bootdev"]["descriptionfr"]="Périphérique où sera installé le programme de démarrage :
 Le système nouvellement installé doit pouvoir être démarré. Cette opération consiste à installer le programme de démarrage GRUB sur un périphérique de démarrage. La méthode habituelle pour cela est de l'installer sur le secteur d'amorçage principal du premier disque dur. Vous pouvez, si vous le souhaitez, l'installer ailleurs sur le disque, sur un autre disque ou même sur une disquette.
";
$elem["grub-installer/choose_bootdev"]["default"]="";
$elem["grub-installer/password"]["type"]="password";
$elem["grub-installer/password"]["description"]="GRUB password:
 The GRUB boot loader offers many powerful interactive features, which could
 be used to compromise your system if unauthorized users have access to the
 machine when it is starting up. To defend against this, you may choose a
 password which will be required before editing menu entries or entering the
 GRUB command-line interface. By default, any user will still be able to
 start any menu entry without entering the password.
 .
 If you do not wish to set a GRUB password, leave this field blank.
";
$elem["grub-installer/password"]["descriptionde"]="GRUB-Passwort:
 Der GRUB-Bootloader bietet einige mächtige Funktionen an, die aber dazu genutzt werden könnten, in das System einzudringen, wenn nicht-autorisierte Personen während des Startvorgangs Zugang zum Computer haben. Um das zu verhindern, können Sie ein Passwort wählen, welches eingegeben werden muss, bevor GRUB-Menüeinträge bearbeitet werden können oder Zugriff auf die GRUB-Kommandozeile gewährt wird. Standardmäßig ist es für jeden möglich, einen der Menüeinträge ohne Passwort zu starten.
 .
 Wenn Sie kein GRUB-Passwort einrichten möchten, lassen Sie dieses Feld leer.
";
$elem["grub-installer/password"]["descriptionfr"]="Mot de passe de GRUB :
 Le programme de démarrage GRUB offre des fonctionnalités interactives très puissantes qui peuvent permettre de compromettre la sécurité du système si des utilisateurs non autorisés ont accès à la machine pendant son démarrage. Pour éviter cela, il est possible de choisir un mot de passe qui sera demandé avant toute modification des entrées du menu ou tout accès à la ligne de commande de GRUB. Par défaut, ces opérations sont possibles sans avoir à fournir un mot de passe.
 .
 Si vous ne souhaitez pas établir de mot de passe pour GRUB, laissez ce champ vide.
";
$elem["grub-installer/password"]["default"]="";
$elem["grub-installer/password-again"]["type"]="password";
$elem["grub-installer/password-again"]["description"]="Re-enter password to verify:
 Please enter the same GRUB password again to verify that you have typed it
 correctly.
";
$elem["grub-installer/password-again"]["descriptionde"]="Bitte geben Sie das Passwort zur Bestätigung nochmals ein:
 Bitte geben Sie dasselbe GRUB-Passwort nochmal ein, um sicherzustellen, dass Sie sich nicht vertippt haben.
";
$elem["grub-installer/password-again"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe de GRUB afin de vérifier qu'il a été saisi correctement.
";
$elem["grub-installer/password-again"]["default"]="";
$elem["grub-installer/password-mismatch"]["type"]="error";
$elem["grub-installer/password-mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["grub-installer/password-mismatch"]["descriptionde"]="Passworteingabefehler
 Die beiden Passwörter, die Sie eingegeben haben, sind nicht identisch. Bitte versuchen Sie es noch einmal.
";
$elem["grub-installer/password-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["grub-installer/password-mismatch"]["default"]="";
$elem["grub-installer/password-crypted"]["type"]="password";
$elem["grub-installer/password-crypted"]["description"]="for internal use; can be preseeded

";
$elem["grub-installer/password-crypted"]["descriptionde"]="";
$elem["grub-installer/password-crypted"]["descriptionfr"]="";
$elem["grub-installer/password-crypted"]["default"]="";
$elem["grub-installer/apt-install-failed"]["type"]="error";
$elem["grub-installer/apt-install-failed"]["description"]="GRUB installation failed
 The '${GRUB}' package failed to install into /target/. Without the GRUB
 boot loader, the installed system will not boot.
";
$elem["grub-installer/apt-install-failed"]["descriptionde"]="Die Installation von GRUB ist fehlgeschlagen
 Das Paket »${GRUB}« konnte nicht in /target/ installiert werden. Ohne den GRUB-Bootloader wird das installierte System nicht booten.
";
$elem["grub-installer/apt-install-failed"]["descriptionfr"]="Échec de l'installation de GRUB
 Le paquet ${GRUB} n'a pas pu être installé dans /target/. En l'absence du programme de démarrage GRUB, le système installé ne pourra pas démarrer.
";
$elem["grub-installer/apt-install-failed"]["default"]="";
$elem["grub-installer/grub-install-failed"]["type"]="error";
$elem["grub-installer/grub-install-failed"]["description"]="Unable to install GRUB in ${BOOTDEV}
 Executing 'grub-install ${BOOTDEV}' failed.
 .
 This is a fatal error.
";
$elem["grub-installer/grub-install-failed"]["descriptionde"]="GRUB konnte nicht auf ${BOOTDEV} installiert werden.
 Die Ausführung von »grub install ${BOOTDEV}« ist fehlgeschlagen.
 .
 Dies ist ein schwerwiegender Fehler.
";
$elem["grub-installer/grub-install-failed"]["descriptionfr"]="Impossible d'installer GRUB dans ${BOOTDEV}
 L'exécution de « grub-install ${BOOTDEV} » a échoué.
 .
 Cette erreur est fatale.
";
$elem["grub-installer/grub-install-failed"]["default"]="";
$elem["grub-installer/update-grub-failed"]["type"]="error";
$elem["grub-installer/update-grub-failed"]["description"]="Unable to configure GRUB
 Executing 'update-grub' failed.
 .
 This is a fatal error.
";
$elem["grub-installer/update-grub-failed"]["descriptionde"]="GRUB konnte nicht konfiguriert werden.
 Ausführung von »update-grub« fehlgeschlagen
 .
 Dies ist ein schwerwiegender Fehler.
";
$elem["grub-installer/update-grub-failed"]["descriptionfr"]="Impossible de configurer GRUB
 L'exécution de « update-grub » a échoué.
 .
 Cette erreur est fatale.
";
$elem["grub-installer/update-grub-failed"]["default"]="";
$elem["grub-installer/grub2_instead_of_grub_legacy"]["type"]="boolean";
$elem["grub-installer/grub2_instead_of_grub_legacy"]["description"]="for internal use; can be preseeded
 Set this to false to install GRUB Legacy rather than GRUB 2, if possible.

";
$elem["grub-installer/grub2_instead_of_grub_legacy"]["descriptionde"]="";
$elem["grub-installer/grub2_instead_of_grub_legacy"]["descriptionfr"]="";
$elem["grub-installer/grub2_instead_of_grub_legacy"]["default"]="true";
$elem["grub-installer/grub_not_mature_on_this_platform"]["type"]="boolean";
$elem["grub-installer/grub_not_mature_on_this_platform"]["description"]="Install GRUB?
 GRUB 2 is the next generation of GNU GRUB, the boot loader that is commonly
 used on i386/amd64 PCs. It is now also available for ${ARCH}.
 .
 It has interesting new features but is still experimental software
 for this architecture. If you choose to install it, you should be prepared
 for breakage, and have an idea on how to recover your system if it
 becomes unbootable. You're advised not to try this in production
 environments.
";
$elem["grub-installer/grub_not_mature_on_this_platform"]["descriptionde"]="GRUB installieren?
 GRUB2 ist die nächste Generation von GNU GRUB, dem Bootloader, der allgemein auf i386-/amd64-PCs verwendet wird. Er ist jetzt auch für ${ARCH} verfügbar.
 .
 Er bietet interessante neue Funktionalitäten, ist jedoch für diese Architektur immer noch experimentell. Falls Sie sich entscheiden, ihn zu installieren, sollten Sie darauf vorbereitet sein, dass das System beschädigt werden könnte und wissen, wie Sie es reparieren können, falls es nicht mehr bootet. Sie tun gut daran, dies nicht in Produktionsumgebungen auszuprobieren.
";
$elem["grub-installer/grub_not_mature_on_this_platform"]["descriptionfr"]="Faut-il installer GRUB ?
 GRUB 2 est la version la plus récente de GNU GRUB, le programme de démarrage généralement utilisé avec les architectures i386 et amd64. Il est désormais également disponible pour ${ARCH}.
 .
 Il possède de nouvelles fonctionnalités intéressantes mais reste expérimental pour cette architecture. Si vous choisissez de l'installer, vous devez vous préparer à des erreurs et être capable de réparer le système s'il n'est plus amorçable. Il est déconseillé de faire ce choix sur des environnements de production.
";
$elem["grub-installer/grub_not_mature_on_this_platform"]["default"]="false";
$elem["grub-installer/progress/title"]["type"]="text";
$elem["grub-installer/progress/title"]["description"]="Installing GRUB boot loader
";
$elem["grub-installer/progress/title"]["descriptionde"]="Installieren des GRUB-Bootloaders
";
$elem["grub-installer/progress/title"]["descriptionfr"]="Installation du programme de démarrage GRUB
";
$elem["grub-installer/progress/title"]["default"]="";
$elem["grub-installer/progress/step_os-probe"]["type"]="text";
$elem["grub-installer/progress/step_os-probe"]["description"]="Looking for other operating systems...
";
$elem["grub-installer/progress/step_os-probe"]["descriptionde"]="Suchen nach weiteren Betriebssystemen ...
";
$elem["grub-installer/progress/step_os-probe"]["descriptionfr"]="Recherche d'autres systèmes d'exploitation...
";
$elem["grub-installer/progress/step_os-probe"]["default"]="";
$elem["grub-installer/progress/step_install"]["type"]="text";
$elem["grub-installer/progress/step_install"]["description"]="Installing the '${GRUB}' package...
";
$elem["grub-installer/progress/step_install"]["descriptionde"]="Installieren des Pakets »${GRUB}« ...
";
$elem["grub-installer/progress/step_install"]["descriptionfr"]="Installation du paquet de ${GRUB}...
";
$elem["grub-installer/progress/step_install"]["default"]="";
$elem["grub-installer/progress/step_bootdev"]["type"]="text";
$elem["grub-installer/progress/step_bootdev"]["description"]="Determining GRUB boot device...
";
$elem["grub-installer/progress/step_bootdev"]["descriptionde"]="Feststellen des Boot-Geräts für GRUB ...
";
$elem["grub-installer/progress/step_bootdev"]["descriptionfr"]="Recherche du périphérique d'amorce de GRUB...
";
$elem["grub-installer/progress/step_bootdev"]["default"]="";
$elem["grub-installer/progress/step_install_loader"]["type"]="text";
$elem["grub-installer/progress/step_install_loader"]["description"]="Running \"grub-install ${BOOTDEV}\"...
";
$elem["grub-installer/progress/step_install_loader"]["descriptionde"]="Ausführen von »grub-install ${BOOTDEV}« ...
";
$elem["grub-installer/progress/step_install_loader"]["descriptionfr"]="Exécution de « grub-install ${BOOTDEV} »...
";
$elem["grub-installer/progress/step_install_loader"]["default"]="";
$elem["grub-installer/progress/step_config_loader"]["type"]="text";
$elem["grub-installer/progress/step_config_loader"]["description"]="Running \"update-grub\"...
";
$elem["grub-installer/progress/step_config_loader"]["descriptionde"]="Ausführen von »update-grub« ...
";
$elem["grub-installer/progress/step_config_loader"]["descriptionfr"]="Exécution de « update-grub »...
";
$elem["grub-installer/progress/step_config_loader"]["default"]="";
$elem["grub-installer/progress/step_update_etc"]["type"]="text";
$elem["grub-installer/progress/step_update_etc"]["description"]="Updating /etc/kernel-img.conf...
";
$elem["grub-installer/progress/step_update_etc"]["descriptionde"]="Aktualisieren von /etc/kernel-img.conf ...
";
$elem["grub-installer/progress/step_update_etc"]["descriptionfr"]="Mise à jour de « /etc/kernel-img.conf »...
";
$elem["grub-installer/progress/step_update_etc"]["default"]="";
$elem["grub-installer/progress/step_force_efi_removable"]["type"]="text";
$elem["grub-installer/progress/step_force_efi_removable"]["description"]="Checking whether to force usage of the removable media path
";
$elem["grub-installer/progress/step_force_efi_removable"]["descriptionde"]="Prüfen, ob die Installation in den Wechseldatenträgerpfad erzwungen werden soll
";
$elem["grub-installer/progress/step_force_efi_removable"]["descriptionfr"]="Contrôle de la nécessité de forcer l'installation sur le chemin des supports amovibles
";
$elem["grub-installer/progress/step_force_efi_removable"]["default"]="";
$elem["grub-installer/progress/step_mount_filesystems"]["type"]="text";
$elem["grub-installer/progress/step_mount_filesystems"]["description"]="Mounting filesystems
";
$elem["grub-installer/progress/step_mount_filesystems"]["descriptionde"]="Einbinden der Dateisysteme
";
$elem["grub-installer/progress/step_mount_filesystems"]["descriptionfr"]="Montage des systèmes de fichiers
";
$elem["grub-installer/progress/step_mount_filesystems"]["default"]="";
$elem["grub-installer/progress/step_update_debconf_efi_removable"]["type"]="text";
$elem["grub-installer/progress/step_update_debconf_efi_removable"]["description"]="Configuring grub-efi for future usage of the removable media path
";
$elem["grub-installer/progress/step_update_debconf_efi_removable"]["descriptionde"]="Konfigurieren von grub-efi für die zukünftige Verwendung des Wechseldatenträgerpfads
";
$elem["grub-installer/progress/step_update_debconf_efi_removable"]["descriptionfr"]="Configuration de grub-efi pour l'utilisation future du chemin des supports amovibles
";
$elem["grub-installer/progress/step_update_debconf_efi_removable"]["default"]="";
$elem["debian-installer/grub-installer/title"]["type"]="text";
$elem["debian-installer/grub-installer/title"]["description"]="Install the GRUB boot loader on a hard disk
";
$elem["debian-installer/grub-installer/title"]["descriptionde"]="GRUB-Bootloader auf einer Festplatte installieren
";
$elem["debian-installer/grub-installer/title"]["descriptionfr"]="Installer le programme de démarrage GRUB sur un disque dur
";
$elem["debian-installer/grub-installer/title"]["default"]="";
$elem["rescue/menu/grub-reinstall"]["type"]="text";
$elem["rescue/menu/grub-reinstall"]["description"]="Reinstall GRUB boot loader
";
$elem["rescue/menu/grub-reinstall"]["descriptionde"]="Den GRUB-Bootloader neu installieren
";
$elem["rescue/menu/grub-reinstall"]["descriptionfr"]="Réinstallation du programme de démarrage GRUB
";
$elem["rescue/menu/grub-reinstall"]["default"]="";
$elem["grub-installer/skip"]["type"]="boolean";
$elem["grub-installer/skip"]["description"]="for internal use; can be preseeded
 Skip installing grub?

";
$elem["grub-installer/skip"]["descriptionde"]="";
$elem["grub-installer/skip"]["descriptionfr"]="";
$elem["grub-installer/skip"]["default"]="false";
$elem["grub-installer/make_active"]["type"]="boolean";
$elem["grub-installer/make_active"]["description"]="for internal use; can be preseeded
 Make sure that at least one partition is marked as active (bootable).

";
$elem["grub-installer/make_active"]["descriptionde"]="";
$elem["grub-installer/make_active"]["descriptionfr"]="";
$elem["grub-installer/make_active"]["default"]="true";
$elem["grub-installer/mounterr"]["type"]="error";
$elem["grub-installer/mounterr"]["description"]="Failed to mount /target/proc
 Mounting the proc file system on /target/proc failed.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
 .
 Warning: Your system may be unbootable!
";
$elem["grub-installer/mounterr"]["descriptionde"]="Einbinden von /target/proc fehlgeschlagen
 Das proc-Dateisystem konnte nicht als /target/proc eingebunden werden.
 .
 Schauen Sie in /var/log/syslog oder auf die vierte virtuelle Konsole bezüglich detaillierter Informationen.
 .
 Warnung: Ihr Computer wird möglicherweise nicht starten können!
";
$elem["grub-installer/mounterr"]["descriptionfr"]="Échec du montage de /target/proc
 Le montage du système de fichiers « proc » sur /target/proc a échoué.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
 .
 Attention : le système pourrait ne pas démarrer !
";
$elem["grub-installer/mounterr"]["default"]="";
$elem["rescue/menu/grub-efi-force-removable"]["type"]="text";
$elem["rescue/menu/grub-efi-force-removable"]["description"]="Force GRUB installation to the EFI removable media path
";
$elem["rescue/menu/grub-efi-force-removable"]["descriptionde"]="GRUB-Installation in den EFI-Wechseldatenträgerpfad erzwingen
";
$elem["rescue/menu/grub-efi-force-removable"]["descriptionfr"]="Faut-il forcer l'installation de GRUB sur le chemin EFI amovible ?
";
$elem["rescue/menu/grub-efi-force-removable"]["default"]="";
$elem["grub-installer/timeout"]["type"]="text";
$elem["grub-installer/timeout"]["description"]="for internal use; can be preseeded
 Wait for the given number of seconds before proceeding with the boot process.
 This makes it possible to leave time for invoking grub's menu in VMs where
 it might take a little bit before you get access to the console.

";
$elem["grub-installer/timeout"]["descriptionde"]="";
$elem["grub-installer/timeout"]["descriptionfr"]="";
$elem["grub-installer/timeout"]["default"]="";
$elem["grub-installer/force-efi-extra-removable"]["type"]="boolean";
$elem["grub-installer/force-efi-extra-removable"]["description"]="Force GRUB installation to the EFI removable media path?
 It seems that this computer is configured to boot via EFI, but maybe
 that configuration will not work for booting from the hard
 drive. Some EFI firmware implementations do not meet the EFI
 specification (i.e. they are buggy!) and do not support proper
 configuration of boot options from system hard drives.
 .
 A workaround for this problem is to install an extra copy of the EFI
 version of the GRUB boot loader to a fallback location, the
 \"removable media path\". Almost all EFI systems, no matter how buggy,
 will boot GRUB that way.
 .
 Warning: If the installer failed to detect another operating system
 that is present on your computer that also depends on this fallback,
 installing GRUB there will make that operating system temporarily
 unbootable. GRUB can be manually configured later to boot it if
 necessary.
";
$elem["grub-installer/force-efi-extra-removable"]["descriptionde"]="GRUB-Installation in den EFI-Wechseldatenträgerpfad erzwingen?
 Scheinbar ist dieser Computer konfiguriert, via EFI zu booten, allerdings könnte diese Konfiguration möglicherweise für das Booten von Festplatte nicht funktionieren. Einige EFI-Firmware-Implementationen entsprechen nicht den EFI-Spezifikationen, d.h. sie sind »buggy« (fehlerhaft), und unterstützen nicht die korrekte Konfiguration von Boot-Optionen für Festplatten.
 .
 Dieses Problem läßt sich umgehen, indem eine zusätzliche Kopie der EFI-Version des GRUB-Bootloaders an einen Ausweichort (den »Wechseldatenträgerpfad«) installiert wird. Nahezu alle EFI-Systeme - egal wie fehlerhaft - werden GRUB auf diesem Wege starten können.
 .
 Warnung: Wenn der Installer ein anderes Betriebssystem auf Ihrem Computer, das auch diese Ausweichlösung zum Booten benötigt, nicht richtig erkennt, könnte die Installation von GRUB in den Wechseldatenträgerpfad verhindern, dass das andere Betriebssystem startet. GRUB kann später aber händisch so konfiguriert werden, dass das andere Betriebssystem wieder bootet.
";
$elem["grub-installer/force-efi-extra-removable"]["descriptionfr"]="Faut-il forcer l'installation sur le chemin des supports amovibles EFI ?
 Il semble que cette machine soit configurée pour démarrer avec EFI mais il est possible que cette configuration ne fonctionne pas pour démarrer depuis le disque dur. Certaines micro-codes qui gèrent EFI ne respectent pas le standard EFI (en d'autres termes, ils sont bogués) et ne gèrent pas correctement la configuration des options de démarrage pour les disques durs système.
 .
 Une façon de contourner ce problème consiste à installer une copie supplémentation de la version EFI du chargeur d'amorçage GRUB à un emplacement de secours, le « chemin des supports amovibles » (« removable media path »). Cela permet à tous les systèmes EFI, même bogués, de pouvoir lancer GRUB.
 .
 Attention : si le programme d'installation ne détecte pas un système d'exploitation installé sur l'ordinateur qui dépende aussi de ce contournement, l'installation de GRUB à cet emplacement rendra empêchera temporairement ce système de démarrer. Toutefois, le programme de démarrage GRUB pourra être manuellement reconfiguré plus tard pour permettre ce démarrage.
";
$elem["grub-installer/force-efi-extra-removable"]["default"]="false";
$elem["hw-detect/detect_progress_step"]["type"]="text";
$elem["hw-detect/detect_progress_step"]["description"]="Detecting hardware, please wait...
";
$elem["hw-detect/detect_progress_step"]["descriptionde"]="Ausführen der Hardware-Erkennung, bitte warten ...
";
$elem["hw-detect/detect_progress_step"]["descriptionfr"]="Détection du matériel. Veuillez patienter...
";
$elem["hw-detect/detect_progress_step"]["default"]="";
$elem["hw-detect/load_progress_step"]["type"]="text";
$elem["hw-detect/load_progress_step"]["description"]="Loading module '${MODULE}' for '${CARDNAME}'...
";
$elem["hw-detect/load_progress_step"]["descriptionde"]="Laden des Moduls »${MODULE}« für »${CARDNAME}« ...
";
$elem["hw-detect/load_progress_step"]["descriptionfr"]="Chargement du module « ${MODULE} » pour « ${CARDNAME} »...
";
$elem["hw-detect/load_progress_step"]["default"]="";
$elem["hw-detect/pcmcia_step"]["type"]="text";
$elem["hw-detect/pcmcia_step"]["description"]="Starting PC card services...
";
$elem["hw-detect/pcmcia_step"]["descriptionde"]="Starten der PC-Card-Dienste ...
";
$elem["hw-detect/pcmcia_step"]["descriptionfr"]="Démarrage des services de cartes PC...
";
$elem["hw-detect/pcmcia_step"]["default"]="";
$elem["hw-detect/hardware_init_step"]["type"]="text";
$elem["hw-detect/hardware_init_step"]["description"]="Waiting for hardware initialization...
";
$elem["hw-detect/hardware_init_step"]["descriptionde"]="Warten auf Initialisierung der Hardware ...
";
$elem["hw-detect/hardware_init_step"]["descriptionfr"]="Attente de l'initialisation du matériel...
";
$elem["hw-detect/hardware_init_step"]["default"]="";
$elem["hw-detect/select_modules"]["type"]="multiselect";
$elem["hw-detect/select_modules"]["description"]="Modules to load:
 The following Linux kernel modules were detected as matching your
 hardware. If you know some are unnecessary, or cause problems, you can
 choose not to load them. If you're unsure, you should leave them all
 selected.
";
$elem["hw-detect/select_modules"]["descriptionde"]="Diese Module laden:
 Für Ihre Hardware wurden die folgenden Linux-Kernel-Module gefunden. Wenn Sie wissen, dass einige nicht benötigt werden oder Probleme verursachen, können Sie diese hier abwählen. Wenn Sie sich nicht sicher sind, sollten Sie die Auswahl belassen.
";
$elem["hw-detect/select_modules"]["descriptionfr"]="Modules à charger :
 Voici la liste des modules du noyau Linux qui correspondent au matériel. Si vous savez que certains sont inutiles ou peuvent provoquer des difficultés, vous pouvez choisir de ne pas les charger. Dans le doute, vous devriez les laisser tous sélectionnés.
";
$elem["hw-detect/select_modules"]["default"]="";
$elem["hw-detect/start_pcmcia"]["type"]="boolean";
$elem["hw-detect/start_pcmcia"]["description"]="Start PC card services?
 Please choose whether PC card services should be started in order to allow
 the use of PCMCIA cards.
";
$elem["hw-detect/start_pcmcia"]["descriptionde"]="PC-Card-Dienste starten?
 Bitte wählen Sie, ob die PC-Card-Dienste gestartet werden sollen, um die Verwendung von PCMCIA-Karten zu ermöglichen.
";
$elem["hw-detect/start_pcmcia"]["descriptionfr"]="Faut-il démarrer les services de cartes PC ?
 Veuillez choisir si les services de cartes PC doivent être démarrés afin de pouvoir utiliser les cartes PCMCIA.
";
$elem["hw-detect/start_pcmcia"]["default"]="true";
$elem["hw-detect/pcmcia_resources"]["type"]="string";
$elem["hw-detect/pcmcia_resources"]["description"]="PCMCIA resource range options:
 Some PCMCIA hardware needs special resource configuration options in
 order to work, and can cause the computer to freeze otherwise. For
 example, some Dell laptops need \"exclude port 0x800-0x8ff\" to be
 specified here. These options will be added to /etc/pcmcia/config.opts.
 See the installation manual or the PCMCIA HOWTO for more information.
 .
 For most hardware, you do not need to specify anything here.
";
$elem["hw-detect/pcmcia_resources"]["descriptionde"]="Optionen für den Ressourcenbereich von PCMCIA:
 Bei einiger PCMCIA-Hardware müssen spezielle Einstellungen für den Betrieb angegeben werden, da ansonsten der Computer einfrieren könnte. Beispielsweise benötigen einige Dell-Laptops hier die Angabe von »exclude port 0x800-0x8ff«. Diese Einstellungen werden zu /etc/pcmcia/config.opts hinzugefügt. Für weitere Informationen sehen Sie sich bitte das PCMCIA-HOWTO an.
 .
 Meist muss hier nichts angegeben werden.
";
$elem["hw-detect/pcmcia_resources"]["descriptionfr"]="Options de plage de ressources pour PCMCIA :
 Certains matériels PCMCIA ont besoin, pour fonctionner correctement, d'options spécifiques pour la plage de ressources utilisée. Si ces options ne sont pas définies, un gel de l'ordinateur est possible. Par exemple, certains ordinateurs portables Dell ont besoin de l'option « exclude port 0x800-Ox8ff ». Ces options seront placées dans le fichier /etc/pcmcia/config.opts. Veuillez consulter le manuel d'installation ou le document « PCMCIA HOWTO » pour plus d'informations.
 .
 Dans la plupart des cas, vous n'avez rien à indiquer.
";
$elem["hw-detect/pcmcia_resources"]["default"]="";
$elem["hw-detect/retry_params"]["type"]="string";
$elem["hw-detect/retry_params"]["description"]="Additional parameters for module ${MODULE}:
 The module ${MODULE} failed to load. You may need to pass parameters
 to the module to make it work; this is common with older hardware.
 These parameters are often I/O port and IRQ numbers that vary from machine
 to machine and cannot be determined from the hardware. An example string
 looks something like \"irq=7 io=0x220\"
 .
 If you don't know what to enter, consult your documentation, or leave it
 blank to not load the module.
";
$elem["hw-detect/retry_params"]["descriptionde"]="Bitte geben Sie zusätzliche Parameter für das Modul ${MODULE} an:
 Das Modul ${MODULE} ließ sich nicht laden. Es könnte sein, dass Sie Parameter an das Modul übergeben müssen, damit es funktioniert; dies ist häufig bei älterer Hardware der Fall. Diese Parameter sind oft der I/O-Port und die IRQ-Nummer, die sich von Maschine zu Maschine unterscheiden und nicht von der Hardware festgestellt werden können. Ein Beispiel-String sieht so aus: »irq=7 io=0x220«.
 .
 Wenn Sie nicht wissen, was Sie eingeben sollen, ziehen Sie die Dokumentation zu Rate oder lassen Sie dieses Feld frei, um das Modul nicht zu laden.
";
$elem["hw-detect/retry_params"]["descriptionfr"]="Paramètres supplémentaires pour le module ${MODULE} :
 Le module ${MODULE} n'a pas pu être chargé. Des paramètres de démarrage peuvent être nécessaires pour cela, ce qui est fréquent avec les matériels anciens. Ces paramètres précisent généralement les ports d'entrée/sortie et les numéros d'interruption, qui diffèrent d'une machine à l'autre et ne peuvent être déterminés à partir du matériel. Exemple : « IRQ=7 IO=0x220 »
 .
 Si vous ne savez pas quoi indiquer, veuillez consulter la documentation du matériel ou laissez ce champ vide pour ne pas charger le module.
";
$elem["hw-detect/retry_params"]["default"]="";
$elem["hw-detect/modprobe_error"]["type"]="error";
$elem["hw-detect/modprobe_error"]["description"]="Error while running '${CMD_LINE_PARAM}'
";
$elem["hw-detect/modprobe_error"]["descriptionde"]="Fehler beim Ausführen von »${CMD_LINE_PARAM}«
";
$elem["hw-detect/modprobe_error"]["descriptionfr"]="Erreur pendant l'exécution de « ${CMD_LINE_PARAM} »
";
$elem["hw-detect/modprobe_error"]["default"]="";
$elem["hw-detect/load_media"]["type"]="boolean";
$elem["hw-detect/load_media"]["description"]="Load missing drivers from removable media?
 A driver for your hardware is not available. You may need
 to load drivers from removable media, such as a USB stick, or driver floppy.
 .
 If you have such media available now, insert it, and continue.
";
$elem["hw-detect/load_media"]["descriptionde"]="Fehlende Treiber von einem Wechseldatenträger laden?
 Ein Treiber für Ihre Hardware ist nicht verfügbar. Sie müssen die Treiber eventuell von einem Wechseldatenträger, wie einem USB-Stick oder einer Treiberdiskette, laden.
 .
 Falls Sie ein solches Medium nun vorliegen haben, legen/stecken Sie es ein und fahren Sie fort.
";
$elem["hw-detect/load_media"]["descriptionfr"]="Faut-il charger les pilotes manquants depuis un support amovible ?
 Aucun pilote n'est disponible pour certains matériels. Des pilotes supplémentaires présents sur un support amovible, comme une clé USB ou une disquette, sont peut-être nécessaires.
 .
 Si vous possédez un tel support, veuillez le mettre en place maintenant et continuer.
";
$elem["hw-detect/load_media"]["default"]="false";
$elem["hw-detect/load_firmware"]["type"]="boolean";
$elem["hw-detect/load_firmware"]["description"]="Load missing firmware from removable media?
 Some of your hardware needs non-free firmware files to operate. The
 firmware can be loaded from removable media, such as a USB stick or
 floppy.
 .
 The missing firmware files are: ${FILES}
 .
 If you have such media available now, insert it, and continue.
";
$elem["hw-detect/load_firmware"]["descriptionde"]="Fehlende Firmware von Wechseldatenträger laden?
 Teile Ihrer Hardware benötigen nicht-freie Firmware-Dateien, um zu funktionieren. Die Firmware kann von einem Wechseldatenträger, wie einem USB-Stick oder einer Diskette, geladen werden.
 .
 Die fehlenden Firmware-Dateien sind: ${FILES}
 .
 Falls Sie ein solches Medium nun vorliegen haben, legen/stecken Sie es ein und fahren Sie fort.
";
$elem["hw-detect/load_firmware"]["descriptionfr"]="Faut-il charger le microcode manquant depuis un support amovible ?
 Certains matériels ont besoin d'un microcode (« firmware ») non libre pour fonctionner. Ce microcode peut être chargé depuis un support amovible, comme une clé USB ou une disquette.
 .
 Les fichiers de microcode manquants sont : ${FILES}
 .
 Si vous possédez un tel support, veuillez le mettre en place maintenant et continuer.
";
$elem["hw-detect/load_firmware"]["default"]="true";
$elem["hw-detect/load-ide"]["type"]="boolean";
$elem["hw-detect/load-ide"]["description"]="for internal use; can be preseeded

";
$elem["hw-detect/load-ide"]["descriptionde"]="";
$elem["hw-detect/load-ide"]["descriptionfr"]="";
$elem["hw-detect/load-ide"]["default"]="false";
$elem["debian-installer/localechooser/title"]["type"]="text";
$elem["debian-installer/localechooser/title"]["description"]="Choose language
";
$elem["debian-installer/localechooser/title"]["descriptionde"]="Sprache wählen/Choose language
";
$elem["debian-installer/localechooser/title"]["descriptionfr"]="Choisir la langue/Choose language
";
$elem["debian-installer/localechooser/title"]["default"]="";
$elem["debian-installer/language"]["type"]="string";
$elem["debian-installer/language"]["description"]="for internal use only

";
$elem["debian-installer/language"]["descriptionde"]="";
$elem["debian-installer/language"]["descriptionfr"]="";
$elem["debian-installer/language"]["default"]="";
$elem["debian-installer/country"]["type"]="string";
$elem["debian-installer/country"]["description"]="for internal use; can be preseeded

";
$elem["debian-installer/country"]["descriptionde"]="";
$elem["debian-installer/country"]["descriptionfr"]="";
$elem["debian-installer/country"]["default"]="";
$elem["debian-installer/locale"]["type"]="select";
$elem["debian-installer/locale"]["description"]="System locale:
 Select the default locale for the installed system.
";
$elem["debian-installer/locale"]["descriptionde"]="System-Gebietsschema:
 Wählen Sie das Standard-Gebietsschema für das installierte System.
";
$elem["debian-installer/locale"]["descriptionfr"]="Paramètres régionaux (« locale ») du système :
 Veuillez choisir les paramètres régionaux par défaut du système à installer.
";
$elem["debian-installer/locale"]["default"]="";
$elem["debian-installer/consoledisplay"]["type"]="string";
$elem["debian-installer/consoledisplay"]["description"]="for internal use only

";
$elem["debian-installer/consoledisplay"]["descriptionde"]="";
$elem["debian-installer/consoledisplay"]["descriptionfr"]="";
$elem["debian-installer/consoledisplay"]["default"]="";
$elem["finish-install/progress/localechooser"]["type"]="text";
$elem["finish-install/progress/localechooser"]["description"]="Storing language...
";
$elem["finish-install/progress/localechooser"]["descriptionde"]="Speichern der Sprache ...
";
$elem["finish-install/progress/localechooser"]["descriptionfr"]="Enregistrement de la langue...
";
$elem["finish-install/progress/localechooser"]["default"]="";
$elem["localechooser/title/language"]["type"]="title";
$elem["localechooser/title/language"]["description"]="Select a language
";
$elem["localechooser/title/language"]["descriptionde"]="Auswählen der Sprache
";
$elem["localechooser/title/language"]["descriptionfr"]="Choix de la langue
";
$elem["localechooser/title/language"]["default"]="";
$elem["localechooser/title/location"]["type"]="title";
$elem["localechooser/title/location"]["description"]="Select your location
";
$elem["localechooser/title/location"]["descriptionde"]="Auswählen des Standorts
";
$elem["localechooser/title/location"]["descriptionfr"]="Choix de votre situation géographique
";
$elem["localechooser/title/location"]["default"]="";
$elem["localechooser/title/locale"]["type"]="title";
$elem["localechooser/title/locale"]["description"]="Configure locales
";
$elem["localechooser/title/locale"]["descriptionde"]="Konfigurieren des Gebietsschemas (locale)
";
$elem["localechooser/title/locale"]["descriptionfr"]="Choix des paramètres régionaux (« locales »)
";
$elem["localechooser/title/locale"]["default"]="";
$elem["localechooser/languagelist"]["type"]="select";
$elem["localechooser/languagelist"]["description"]="Language:
 Choose the language to be used for the installation process. The selected
 language will also be the default language for the installed system.

";
$elem["localechooser/languagelist"]["descriptionde"]="";
$elem["localechooser/languagelist"]["descriptionfr"]="";
$elem["localechooser/languagelist"]["default"]="en";
$elem["localechooser/translation/none-yet"]["type"]="note";
$elem["localechooser/translation/none-yet"]["description"]="Translations temporarily not available
 Because of the low available space on the installation media, translations
 will not be available immediately.
 .
 The installation will continue in English until the installer
 loads packages that include translations from a CD or the network.

";
$elem["localechooser/translation/none-yet"]["descriptionde"]="";
$elem["localechooser/translation/none-yet"]["descriptionfr"]="";
$elem["localechooser/translation/none-yet"]["default"]="";
$elem["localechooser/translation/no-select"]["type"]="note";
$elem["localechooser/translation/no-select"]["description"]="Language selection no longer possible
 At this point it is no longer possible to change the language for the
 installation, but you can still change the country or locale.
 .
 To select a different language you will need to abort this installation
 and reboot the installer.
";
$elem["localechooser/translation/no-select"]["descriptionde"]="Sprachauswahl nicht mehr möglich
 Zu diesem Zeitpunkt ist es nicht mehr möglich, die Sprache für die Installation zu ändern, aber Sie können immer noch das Land oder das Gebietsschema ändern.
 .
 Um eine andere Sprache zu wählen, müssen Sie diese Installation nun abbrechen und den Installer neu starten.
";
$elem["localechooser/translation/no-select"]["descriptionfr"]="Changement de langue désormais impossible
 À partir de ce point, il ne sera plus possible de changer de langue pour l'installation. Il restera possible de changer le pays ou les paramètres régionaux (« locale »).
 .
 Pour pouvoir choisir une autre langue, la seule possibilité est d'abandonner l'installation et redémarrer l'installateur.
";
$elem["localechooser/translation/no-select"]["default"]="";
$elem["localechooser/translation/warn-severe"]["type"]="boolean";
$elem["localechooser/translation/warn-severe"]["description"]="Continue the installation in the selected language?
 The translation of the installer is incomplete for the selected language.
 .
 ${TXT-WARN}
 .
 ${TXT-ABORT}
";
$elem["localechooser/translation/warn-severe"]["descriptionde"]="Die Installation in der gewählten Sprache fortsetzen?
 Die Übersetzung des Installers ist für die gewählte Sprache unvollständig.
 .
 ${TXT-WARN}
 .
 ${TXT-ABORT}
";
$elem["localechooser/translation/warn-severe"]["descriptionfr"]="Faut-il poursuivre l'installation dans la langue choisie ?
 La traduction de l'installateur est incomplète dans la langue choisie.
 .
 ${TXT-WARN}
 .
 ${TXT-ABORT}
";
$elem["localechooser/translation/warn-severe"]["default"]="false";
$elem["localechooser/translation/warn-light"]["type"]="boolean";
$elem["localechooser/translation/warn-light"]["description"]="Continue the installation in the selected language?
 The translation of the installer is not fully complete for the selected
 language.
 .
 ${TXT-WARN}
";
$elem["localechooser/translation/warn-light"]["descriptionde"]="Die Installation in der gewählten Sprache fortsetzen?
 Die Übersetzung des Installers ist für die gewählte Sprache nicht ganz vollständig.
 .
 ${TXT-WARN}
";
$elem["localechooser/translation/warn-light"]["descriptionfr"]="Faut-il poursuivre l'installation dans la langue choisie ?
 La traduction de l'installateur n'est pas complète dans la langue choisie.
 .
 ${TXT-WARN}
";
$elem["localechooser/translation/warn-light"]["default"]="true";
$elem["localechooser/translation/text/warn_incomplete"]["type"]="text";
$elem["localechooser/translation/text/warn_incomplete"]["description"]="This means that there is a significant chance that some dialogs will be displayed in English instead.
";
$elem["localechooser/translation/text/warn_incomplete"]["descriptionde"]="Das bedeutet, dass es eine signifikante Möglichkeit gibt, dass einige Dialoge stattdessen in Englisch angezeigt werden.
";
$elem["localechooser/translation/text/warn_incomplete"]["descriptionfr"]="En conséquence, il est probable que certaines boîtes de dialogue seront affichées en anglais.
";
$elem["localechooser/translation/text/warn_incomplete"]["default"]="";
$elem["localechooser/translation/text/warn_normal-ok"]["type"]="text";
$elem["localechooser/translation/text/warn_normal-ok"]["description"]="If you do anything other than a purely default installation, there is a real chance that some dialogs will be displayed in English instead.
";
$elem["localechooser/translation/text/warn_normal-ok"]["descriptionde"]="Falls Sie keine einfache Standard-Installation durchführen werden, ist die Wahrscheinlichkeit recht hoch, dass einige Dialoge stattdessen in Englisch angezeigt werden.
";
$elem["localechooser/translation/text/warn_normal-ok"]["descriptionfr"]="À moins d'effectuer une installation totalement standard, il est très probable que certaines boîtes de dialogue soient affichées en anglais.
";
$elem["localechooser/translation/text/warn_normal-ok"]["default"]="";
$elem["localechooser/translation/text/warn_partial"]["type"]="text";
$elem["localechooser/translation/text/warn_partial"]["description"]="If you continue the installation in the selected language, most dialogs should be displayed correctly but - especially if you use the more advanced options of the installer - some may be displayed in English instead.
";
$elem["localechooser/translation/text/warn_partial"]["descriptionde"]="Falls Sie die Installation in der gewählten Sprache fortsetzen, sollten die meisten Dialoge korrekt dargestellt werden, aber es könnten einige in Englisch angezeigt werden - insbesondere falls Sie die erweiterten Optionen des Installers verwenden.
";
$elem["localechooser/translation/text/warn_partial"]["descriptionfr"]="Si vous poursuivez l'installation dans la langue choisie, la plupart des boîtes de dialogues s'afficheront correctement, mais certains pourraient être affichées en anglais, particulièrement si vous utilisez des options avancées.
";
$elem["localechooser/translation/text/warn_partial"]["default"]="";
$elem["localechooser/translation/text/warn_mostly-ok"]["type"]="text";
$elem["localechooser/translation/text/warn_mostly-ok"]["description"]="If you continue the installation in the selected language, dialogs should normally be displayed correctly but - especially if you use the more advanced options of the installer - there is a slight chance some may be displayed in English instead.
";
$elem["localechooser/translation/text/warn_mostly-ok"]["descriptionde"]="Falls Sie die Installation in der gewählten Sprache fortsetzen, sollten die Dialoge korrekt dargestellt werden, aber es besteht eine gewisse Möglichkeit, dass einige in Englisch angezeigt werden - insbesondere falls Sie die erweiterten Optionen des Installers verwenden.
";
$elem["localechooser/translation/text/warn_mostly-ok"]["descriptionfr"]="Si vous poursuivez l'installation dans la langue choisie, les boîtes de dialogues s'afficheront correctement, mais il n'est pas impossible que certaines s'affichent en anglais, particulièrement si vous utilisez des options avancées.
";
$elem["localechooser/translation/text/warn_mostly-ok"]["default"]="";
$elem["localechooser/translation/text/warn_exceptions"]["type"]="text";
$elem["localechooser/translation/text/warn_exceptions"]["description"]="The chance that you will actually encounter a dialog that is not translated into the selected language is extremely small, but it cannot be ruled out completely.
";
$elem["localechooser/translation/text/warn_exceptions"]["descriptionde"]="Die Wahrscheinlichkeit, dass Sie auf einen Dialog treffen, der nicht in die ausgewählte Sprache übersetzt ist, ist sehr klein, kann aber nicht komplett ausgeschlossen werden.
";
$elem["localechooser/translation/text/warn_exceptions"]["descriptionfr"]="La probabilité de rencontrer une boîte de dialogue non traduite dans la langue choisie est extrêmement faible, mais ne peut être entièrement éliminée.
";
$elem["localechooser/translation/text/warn_exceptions"]["default"]="";
$elem["localechooser/translation/text/abort"]["type"]="text";
$elem["localechooser/translation/text/abort"]["description"]="Unless you have a good understanding of the alternative language, it is recommended to either select a different language or abort the installation.
";
$elem["localechooser/translation/text/abort"]["descriptionde"]="Falls Sie die alternative Sprache nicht gut verstehen, wird empfohlen, entweder eine andere Sprache auszuwählen oder die Installation abzubrechen.
";
$elem["localechooser/translation/text/abort"]["descriptionfr"]="À moins d'avoir une bonne compréhension de la langue alternative, il est recommandé de choisir une autre langue ou d'abandonner l'installation.
";
$elem["localechooser/translation/text/abort"]["default"]="";
$elem["localechooser/translation/text/maybe-abort"]["type"]="text";
$elem["localechooser/translation/text/maybe-abort"]["description"]="If you choose not to continue, you will be given the option of selecting a different language, or you can abort the installation.
";
$elem["localechooser/translation/text/maybe-abort"]["descriptionde"]="Falls Sie sich entscheiden nicht fortzufahren, wird Ihnen die Möglichkeit geboten, eine andere Sprache auszuwählen oder die Installation abzubrechen.
";
$elem["localechooser/translation/text/maybe-abort"]["descriptionfr"]="Si vous choisissez de ne pas continuer, vous aurez la possibilité de choisir une autre langue ou d'abandonner l'installation.
";
$elem["localechooser/translation/text/maybe-abort"]["default"]="";
$elem["localechooser/text/country/1/country"]["type"]="text";
$elem["localechooser/text/country/1/country"]["description"]="Country, territory or area:
";
$elem["localechooser/text/country/1/country"]["descriptionde"]="Land oder Gebiet:
";
$elem["localechooser/text/country/1/country"]["descriptionfr"]="Pays (territoire ou région) :
";
$elem["localechooser/text/country/1/country"]["default"]="";
$elem["localechooser/text/country/1/continent"]["type"]="text";
$elem["localechooser/text/country/1/continent"]["description"]="Continent or region:
";
$elem["localechooser/text/country/1/continent"]["descriptionde"]="Kontinent oder Gebiet:
";
$elem["localechooser/text/country/1/continent"]["descriptionfr"]="Continent ou zone géographique :
";
$elem["localechooser/text/country/1/continent"]["default"]="";
$elem["localechooser/text/country/2"]["type"]="text";
$elem["localechooser/text/country/2"]["description"]="The selected location will be used to set your time zone and also for example to help select the system locale. Normally this should be the country where you live.
";
$elem["localechooser/text/country/2"]["descriptionde"]="Der hier ausgewählte Standort wird verwendet, um die Zeitzone zu setzen und auch, um zum Beispiel das System-Gebietsschema (system locale) zu bestimmen. Normalerweise sollte dies das Land sein, in dem Sie leben.
";
$elem["localechooser/text/country/2"]["descriptionfr"]="Le pays choisi permet de définir le fuseau horaire et de déterminer les paramètres régionaux du système (« locale »). C'est le plus souvent le pays où vous vivez.
";
$elem["localechooser/text/country/2"]["default"]="";
$elem["localechooser/text/country/3/shortlist"]["type"]="text";
$elem["localechooser/text/country/3/shortlist"]["description"]="This is a shortlist of locations based on the language you selected. Choose \"other\" if your location is not listed.
";
$elem["localechooser/text/country/3/shortlist"]["descriptionde"]="Diese Liste enthält nur eine kleine Auswahl von Standorten, basierend auf der Sprache, die Sie ausgewählt haben. Wählen Sie »weitere«, falls Ihr Standort nicht aufgeführt ist.
";
$elem["localechooser/text/country/3/shortlist"]["descriptionfr"]="La courte liste affichée dépend de la langue précédemment choisie. Choisissez « Autre » si votre pays n'est pas affiché.
";
$elem["localechooser/text/country/3/shortlist"]["default"]="";
$elem["localechooser/text/country/3/continent"]["type"]="text";
$elem["localechooser/text/country/3/continent"]["description"]="Select the continent or region to which your location belongs.
";
$elem["localechooser/text/country/3/continent"]["descriptionde"]="Wählen Sie den Kontinent oder das Gebiet, in dem Ihr Standort liegt.
";
$elem["localechooser/text/country/3/continent"]["descriptionfr"]="Veuillez choisir le continent ou la région où est situé votre emplacement géographique.
";
$elem["localechooser/text/country/3/continent"]["default"]="";
$elem["localechooser/text/country/3/country"]["type"]="text";
$elem["localechooser/text/country/3/country"]["description"]="Listed are locations for: %s. Use the <Go Back> option to select a different continent or region if your location is not listed.
";
$elem["localechooser/text/country/3/country"]["descriptionde"]="Aufgelistet sind Standorte für %s. Nutzen Sie »Zurück«, um einen anderen Kontinent oder eine andere Gegend auszuwählen, falls Ihr Standort nicht aufgeführt ist.
";
$elem["localechooser/text/country/3/country"]["descriptionfr"]="La liste affichée correspond au choix de « %s » comme continent ou zone. Veuillez utiliser l'option <Revenir en arrière> pour choisir un autre continent si votre pays n'est pas affiché.
";
$elem["localechooser/text/country/3/country"]["default"]="";
$elem["localechooser/preferred-locale"]["type"]="select";
$elem["localechooser/preferred-locale"]["description"]="Country to base default locale settings on:
 ${TXT}
";
$elem["localechooser/preferred-locale"]["descriptionde"]="Land, das zur Bestimmung des Standard-Gebietsschemas verwendet wird:
 ${TXT}
";
$elem["localechooser/preferred-locale"]["descriptionfr"]="Pays qui servira de base aux paramètres régionaux par défaut :
 ${TXT}
";
$elem["localechooser/preferred-locale"]["default"]="";
$elem["localechooser/text/preferred-locale/none"]["type"]="text";
$elem["localechooser/text/preferred-locale/none"]["description"]="There is no locale defined for the combination of language and country you have selected. You can now select your preference from the locales available for the selected language. The locale that will be used is listed in the second column.
";
$elem["localechooser/text/preferred-locale/none"]["descriptionde"]="Für die Kombination aus Sprache und Land, die Sie gewählt haben, ist kein Gebietsschema (locale) definiert. Sie können jetzt Ihr bevorzugtes Gebietsschema aus der Liste der Gebietsschemata auswählen, die für die ausgewählte Sprache verfügbar sind. Das Gebietsschema, das genutzt wird, ist in der zweiten Spalte aufgelistet.
";
$elem["localechooser/text/preferred-locale/none"]["descriptionfr"]="Il n'existe pas de jeu de paramètres régionaux (« locale ») pour la combinaison de langue et de pays choisis. Vous pouvez ici choisir le pays sur lequel baser les paramètres régionaux, pour la langue choisie. La « locale » qui sera alors utilisée apparaît dans la deuxième colonne.
";
$elem["localechooser/text/preferred-locale/none"]["default"]="";
$elem["localechooser/text/preferred-locale/multi"]["type"]="text";
$elem["localechooser/text/preferred-locale/multi"]["description"]="There are multiple locales defined for the language you have selected. You can now select your preference from those locales. The locale that will be used is listed in the second column.
";
$elem["localechooser/text/preferred-locale/multi"]["descriptionde"]="Für die Sprache, die Sie gewählt haben, sind mehrere Gebietsschemata (locales) definiert. Sie können jetzt das von Ihnen bevorzugte Gebietsschema auswählen. Das Gebietsschema, das genutzt wird, ist in der zweiten Spalte aufgelistet.
";
$elem["localechooser/text/preferred-locale/multi"]["descriptionfr"]="Il existe plusieurs jeux de paramètres régionaux (« locale ») pour la langue choisie. Vous pouvez ici choisir, parmi ces possibilités, la « locale » qui sera utilisée (elle apparaît dans la deuxième colonne).
";
$elem["localechooser/text/preferred-locale/multi"]["default"]="";
$elem["localechooser/supported-locales"]["type"]="multiselect";
$elem["localechooser/supported-locales"]["description"]="Additional locales:
 Based on your previous choices, the default locale currently selected for the
 installed system is '${LOCALE}'.
 .
 If you wish to use a different default or to also have other locales available,
 you may choose additional locales to be installed. If you are unsure it is
 best to just use the selected default.
";
$elem["localechooser/supported-locales"]["descriptionde"]="Zusätzliche Gebietsschemata:
 Basierend auf den von Ihnen gewählten Angaben lautet das derzeit für das installierte System festgelegte Standard-Gebietsschema: »${LOCALE}«.
 .
 Falls Sie ein anderes Standard-Gebietsschema verwenden möchten oder noch weitere Gebietsschemata benötigen, können Sie zusätzliche zur Installation auswählen. Wenn Sie nicht sicher sind, sollten Sie am besten einfach das angegebene Standard-Gebietsschema benutzen.
";
$elem["localechooser/supported-locales"]["descriptionfr"]="Paramètres régionaux supplémentaires :
 Suite au choix précédents, les paramètres régionaux (« locale ») par défaut du système installé seront « ${LOCALE} ».
 .
 Si vous souhaitez choisir une autre valeur par défaut ou disposer d'autres jeux de paramètres régionaux, vous pouvez en choisir des supplémentaires à installer. Dans le doute, il est conseillé de laisser les réglages par défaut.
";
$elem["localechooser/supported-locales"]["default"]="";
$elem["babelbox/info"]["type"]="title";
$elem["babelbox/info"]["description"]="Demo - ${LANGNAME}

";
$elem["babelbox/info"]["descriptionde"]="";
$elem["babelbox/info"]["descriptionfr"]="";
$elem["babelbox/info"]["default"]="";
$elem["localechooser/help/locale"]["type"]="note";
$elem["localechooser/help/locale"]["description"]="locale
 A locale determines character encoding and contains information on for example
 currency, date format and alphabetical sort order.
";
$elem["localechooser/help/locale"]["descriptionde"]="Gebietsschema
 Ein Gebietsschema (locale) bestimmt die Zeichenkodierung und enthält Informationen zum Beispiel über Währung, Datumsformat und alphabetische Sortierreihenfolge.
";
$elem["localechooser/help/locale"]["descriptionfr"]="Paramètres régionaux (« locale »)
 Les paramètres régionaux déterminent le codage des caractères et permettent par exemple de définir les informations relatives à la monnaie, le format de date ou l'ordre de tri alphabétique.
";
$elem["localechooser/help/locale"]["default"]="";
$elem["localechooser/countrylist/Africa"]["type"]="select";
$elem["localechooser/countrylist/Africa"]["choices"][1]="Algeria";
$elem["localechooser/countrylist/Africa"]["choices"][2]="Angola";
$elem["localechooser/countrylist/Africa"]["choices"][3]="Benin";
$elem["localechooser/countrylist/Africa"]["choices"][4]="Botswana";
$elem["localechooser/countrylist/Africa"]["choices"][5]="Burkina Faso";
$elem["localechooser/countrylist/Africa"]["choices"][6]="Burundi";
$elem["localechooser/countrylist/Africa"]["choices"][7]="Cameroon";
$elem["localechooser/countrylist/Africa"]["choices"][8]="Cape Verde";
$elem["localechooser/countrylist/Africa"]["choices"][9]="Central African Republic";
$elem["localechooser/countrylist/Africa"]["choices"][10]="Chad";
$elem["localechooser/countrylist/Africa"]["choices"][11]="Congo";
$elem["localechooser/countrylist/Africa"]["choices"][12]="Congo\";
$elem["localechooser/countrylist/Africa"]["choices"][13]="The Democratic Republic of the";
$elem["localechooser/countrylist/Africa"]["choices"][14]="Côte d'Ivoire";
$elem["localechooser/countrylist/Africa"]["choices"][15]="Djibouti";
$elem["localechooser/countrylist/Africa"]["choices"][16]="Egypt";
$elem["localechooser/countrylist/Africa"]["choices"][17]="Equatorial Guinea";
$elem["localechooser/countrylist/Africa"]["choices"][18]="Eritrea";
$elem["localechooser/countrylist/Africa"]["choices"][19]="Ethiopia";
$elem["localechooser/countrylist/Africa"]["choices"][20]="Gabon";
$elem["localechooser/countrylist/Africa"]["choices"][21]="Gambia";
$elem["localechooser/countrylist/Africa"]["choices"][22]="Ghana";
$elem["localechooser/countrylist/Africa"]["choices"][23]="Guinea";
$elem["localechooser/countrylist/Africa"]["choices"][24]="Guinea-Bissau";
$elem["localechooser/countrylist/Africa"]["choices"][25]="Kenya";
$elem["localechooser/countrylist/Africa"]["choices"][26]="Lesotho";
$elem["localechooser/countrylist/Africa"]["choices"][27]="Liberia";
$elem["localechooser/countrylist/Africa"]["choices"][28]="Libya";
$elem["localechooser/countrylist/Africa"]["choices"][29]="Malawi";
$elem["localechooser/countrylist/Africa"]["choices"][30]="Mali";
$elem["localechooser/countrylist/Africa"]["choices"][31]="Mauritania";
$elem["localechooser/countrylist/Africa"]["choices"][32]="Morocco";
$elem["localechooser/countrylist/Africa"]["choices"][33]="Mozambique";
$elem["localechooser/countrylist/Africa"]["choices"][34]="Namibia";
$elem["localechooser/countrylist/Africa"]["choices"][35]="Niger";
$elem["localechooser/countrylist/Africa"]["choices"][36]="Nigeria";
$elem["localechooser/countrylist/Africa"]["choices"][37]="Rwanda";
$elem["localechooser/countrylist/Africa"]["choices"][38]="Sao Tome and Principe";
$elem["localechooser/countrylist/Africa"]["choices"][39]="Senegal";
$elem["localechooser/countrylist/Africa"]["choices"][40]="Sierra Leone";
$elem["localechooser/countrylist/Africa"]["choices"][41]="Somalia";
$elem["localechooser/countrylist/Africa"]["choices"][42]="South Africa";
$elem["localechooser/countrylist/Africa"]["choices"][43]="South Sudan";
$elem["localechooser/countrylist/Africa"]["choices"][44]="Sudan";
$elem["localechooser/countrylist/Africa"]["choices"][45]="Swaziland";
$elem["localechooser/countrylist/Africa"]["choices"][46]="Tanzania";
$elem["localechooser/countrylist/Africa"]["choices"][47]="Togo";
$elem["localechooser/countrylist/Africa"]["choices"][48]="Tunisia";
$elem["localechooser/countrylist/Africa"]["choices"][49]="Uganda";
$elem["localechooser/countrylist/Africa"]["choices"][50]="Western Sahara";
$elem["localechooser/countrylist/Africa"]["choices"][51]="Zambia";
$elem["localechooser/countrylist/Africa"]["choicesde"][1]="Algerien";
$elem["localechooser/countrylist/Africa"]["choicesde"][2]="Angola";
$elem["localechooser/countrylist/Africa"]["choicesde"][3]="Benin";
$elem["localechooser/countrylist/Africa"]["choicesde"][4]="Botsuana";
$elem["localechooser/countrylist/Africa"]["choicesde"][5]="Burkina Faso";
$elem["localechooser/countrylist/Africa"]["choicesde"][6]="Burundi";
$elem["localechooser/countrylist/Africa"]["choicesde"][7]="Kamerun";
$elem["localechooser/countrylist/Africa"]["choicesde"][8]="Cabo Verde";
$elem["localechooser/countrylist/Africa"]["choicesde"][9]="Zentralafrikanische Republik";
$elem["localechooser/countrylist/Africa"]["choicesde"][10]="Tschad";
$elem["localechooser/countrylist/Africa"]["choicesde"][11]="Kongo";
$elem["localechooser/countrylist/Africa"]["choicesde"][12]="Demokratische Republik Kongo";
$elem["localechooser/countrylist/Africa"]["choicesde"][13]="Côte d'Ivoire";
$elem["localechooser/countrylist/Africa"]["choicesde"][14]="Dschibuti";
$elem["localechooser/countrylist/Africa"]["choicesde"][15]="Ägypten";
$elem["localechooser/countrylist/Africa"]["choicesde"][16]="Äquatorialguinea";
$elem["localechooser/countrylist/Africa"]["choicesde"][17]="Eritrea";
$elem["localechooser/countrylist/Africa"]["choicesde"][18]="Äthiopien";
$elem["localechooser/countrylist/Africa"]["choicesde"][19]="Gabun";
$elem["localechooser/countrylist/Africa"]["choicesde"][20]="Gambia";
$elem["localechooser/countrylist/Africa"]["choicesde"][21]="Ghana";
$elem["localechooser/countrylist/Africa"]["choicesde"][22]="Guinea";
$elem["localechooser/countrylist/Africa"]["choicesde"][23]="Guinea-Bissau";
$elem["localechooser/countrylist/Africa"]["choicesde"][24]="Kenia";
$elem["localechooser/countrylist/Africa"]["choicesde"][25]="Lesotho";
$elem["localechooser/countrylist/Africa"]["choicesde"][26]="Liberia";
$elem["localechooser/countrylist/Africa"]["choicesde"][27]="Libyen";
$elem["localechooser/countrylist/Africa"]["choicesde"][28]="Malawi";
$elem["localechooser/countrylist/Africa"]["choicesde"][29]="Mali";
$elem["localechooser/countrylist/Africa"]["choicesde"][30]="Mauretanien";
$elem["localechooser/countrylist/Africa"]["choicesde"][31]="Marokko";
$elem["localechooser/countrylist/Africa"]["choicesde"][32]="Mosambik";
$elem["localechooser/countrylist/Africa"]["choicesde"][33]="Namibia";
$elem["localechooser/countrylist/Africa"]["choicesde"][34]="Niger";
$elem["localechooser/countrylist/Africa"]["choicesde"][35]="Nigeria";
$elem["localechooser/countrylist/Africa"]["choicesde"][36]="Ruanda";
$elem["localechooser/countrylist/Africa"]["choicesde"][37]="São Tomé und Príncipe";
$elem["localechooser/countrylist/Africa"]["choicesde"][38]="Senegal";
$elem["localechooser/countrylist/Africa"]["choicesde"][39]="Sierra Leone";
$elem["localechooser/countrylist/Africa"]["choicesde"][40]="Somalia";
$elem["localechooser/countrylist/Africa"]["choicesde"][41]="Südafrika";
$elem["localechooser/countrylist/Africa"]["choicesde"][42]="Südsudan";
$elem["localechooser/countrylist/Africa"]["choicesde"][43]="Sudan";
$elem["localechooser/countrylist/Africa"]["choicesde"][44]="Swasiland";
$elem["localechooser/countrylist/Africa"]["choicesde"][45]="Tansania";
$elem["localechooser/countrylist/Africa"]["choicesde"][46]="Togo";
$elem["localechooser/countrylist/Africa"]["choicesde"][47]="Tunesien";
$elem["localechooser/countrylist/Africa"]["choicesde"][48]="Uganda";
$elem["localechooser/countrylist/Africa"]["choicesde"][49]="Westsahara";
$elem["localechooser/countrylist/Africa"]["choicesde"][50]="Sambia";
$elem["localechooser/countrylist/Africa"]["choicesfr"][1]="Algérie";
$elem["localechooser/countrylist/Africa"]["choicesfr"][2]="Angola";
$elem["localechooser/countrylist/Africa"]["choicesfr"][3]="Bénin";
$elem["localechooser/countrylist/Africa"]["choicesfr"][4]="Botswana";
$elem["localechooser/countrylist/Africa"]["choicesfr"][5]="Burkina Faso";
$elem["localechooser/countrylist/Africa"]["choicesfr"][6]="Burundi";
$elem["localechooser/countrylist/Africa"]["choicesfr"][7]="Cameroun";
$elem["localechooser/countrylist/Africa"]["choicesfr"][8]="Cap-Vert";
$elem["localechooser/countrylist/Africa"]["choicesfr"][9]="Centrafricaine\";
$elem["localechooser/countrylist/Africa"]["choicesfr"][10]="République";
$elem["localechooser/countrylist/Africa"]["choicesfr"][11]="Tchad";
$elem["localechooser/countrylist/Africa"]["choicesfr"][12]="Congo";
$elem["localechooser/countrylist/Africa"]["choicesfr"][13]="République démocratique du Congo";
$elem["localechooser/countrylist/Africa"]["choicesfr"][14]="Côte d'Ivoire";
$elem["localechooser/countrylist/Africa"]["choicesfr"][15]="Djibouti";
$elem["localechooser/countrylist/Africa"]["choicesfr"][16]="Égypte";
$elem["localechooser/countrylist/Africa"]["choicesfr"][17]="Guinée Équatoriale";
$elem["localechooser/countrylist/Africa"]["choicesfr"][18]="Érythrée";
$elem["localechooser/countrylist/Africa"]["choicesfr"][19]="Éthiopie";
$elem["localechooser/countrylist/Africa"]["choicesfr"][20]="Gabon";
$elem["localechooser/countrylist/Africa"]["choicesfr"][21]="Gambie";
$elem["localechooser/countrylist/Africa"]["choicesfr"][22]="Ghana";
$elem["localechooser/countrylist/Africa"]["choicesfr"][23]="Guinée";
$elem["localechooser/countrylist/Africa"]["choicesfr"][24]="Guinée-Bissau";
$elem["localechooser/countrylist/Africa"]["choicesfr"][25]="Kenya";
$elem["localechooser/countrylist/Africa"]["choicesfr"][26]="Lesotho";
$elem["localechooser/countrylist/Africa"]["choicesfr"][27]="Libéria";
$elem["localechooser/countrylist/Africa"]["choicesfr"][28]="Libye";
$elem["localechooser/countrylist/Africa"]["choicesfr"][29]="Malawi";
$elem["localechooser/countrylist/Africa"]["choicesfr"][30]="Mali";
$elem["localechooser/countrylist/Africa"]["choicesfr"][31]="Mauritanie";
$elem["localechooser/countrylist/Africa"]["choicesfr"][32]="Maroc";
$elem["localechooser/countrylist/Africa"]["choicesfr"][33]="Mozambique";
$elem["localechooser/countrylist/Africa"]["choicesfr"][34]="Namibie";
$elem["localechooser/countrylist/Africa"]["choicesfr"][35]="Niger";
$elem["localechooser/countrylist/Africa"]["choicesfr"][36]="Nigeria";
$elem["localechooser/countrylist/Africa"]["choicesfr"][37]="Rwanda";
$elem["localechooser/countrylist/Africa"]["choicesfr"][38]="Sao Tomé-et-Principe";
$elem["localechooser/countrylist/Africa"]["choicesfr"][39]="Sénégal";
$elem["localechooser/countrylist/Africa"]["choicesfr"][40]="Sierra Leone";
$elem["localechooser/countrylist/Africa"]["choicesfr"][41]="Somalie";
$elem["localechooser/countrylist/Africa"]["choicesfr"][42]="Afrique du Sud";
$elem["localechooser/countrylist/Africa"]["choicesfr"][43]="Soudan du Sud";
$elem["localechooser/countrylist/Africa"]["choicesfr"][44]="Soudan";
$elem["localechooser/countrylist/Africa"]["choicesfr"][45]="Swaziland";
$elem["localechooser/countrylist/Africa"]["choicesfr"][46]="Tanzanie";
$elem["localechooser/countrylist/Africa"]["choicesfr"][47]="Togo";
$elem["localechooser/countrylist/Africa"]["choicesfr"][48]="Tunisie";
$elem["localechooser/countrylist/Africa"]["choicesfr"][49]="Ouganda";
$elem["localechooser/countrylist/Africa"]["choicesfr"][50]="Sahara Occidental";
$elem["localechooser/countrylist/Africa"]["choicesfr"][51]="Zambie";
$elem["localechooser/countrylist/Africa"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/Africa"]["descriptionde"]="";
$elem["localechooser/countrylist/Africa"]["descriptionfr"]="";
$elem["localechooser/countrylist/Africa"]["default"]="";
$elem["localechooser/countrylist/Antarctica"]["type"]="select";
$elem["localechooser/countrylist/Antarctica"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/Antarctica"]["descriptionde"]="";
$elem["localechooser/countrylist/Antarctica"]["descriptionfr"]="";
$elem["localechooser/countrylist/Antarctica"]["default"]="";
$elem["localechooser/countrylist/Asia"]["type"]="select";
$elem["localechooser/countrylist/Asia"]["choices"][1]="Afghanistan";
$elem["localechooser/countrylist/Asia"]["choices"][2]="Bahrain";
$elem["localechooser/countrylist/Asia"]["choices"][3]="Bangladesh";
$elem["localechooser/countrylist/Asia"]["choices"][4]="Bhutan";
$elem["localechooser/countrylist/Asia"]["choices"][5]="Brunei Darussalam";
$elem["localechooser/countrylist/Asia"]["choices"][6]="Cambodia";
$elem["localechooser/countrylist/Asia"]["choices"][7]="China";
$elem["localechooser/countrylist/Asia"]["choices"][8]="Hong Kong";
$elem["localechooser/countrylist/Asia"]["choices"][9]="India";
$elem["localechooser/countrylist/Asia"]["choices"][10]="Indonesia";
$elem["localechooser/countrylist/Asia"]["choices"][11]="Iran\";
$elem["localechooser/countrylist/Asia"]["choices"][12]="Islamic Republic of";
$elem["localechooser/countrylist/Asia"]["choices"][13]="Iraq";
$elem["localechooser/countrylist/Asia"]["choices"][14]="Israel";
$elem["localechooser/countrylist/Asia"]["choices"][15]="Japan";
$elem["localechooser/countrylist/Asia"]["choices"][16]="Jordan";
$elem["localechooser/countrylist/Asia"]["choices"][17]="Kazakhstan";
$elem["localechooser/countrylist/Asia"]["choices"][18]="Korea\";
$elem["localechooser/countrylist/Asia"]["choices"][19]="Democratic People's Republic of";
$elem["localechooser/countrylist/Asia"]["choices"][20]="Korea\";
$elem["localechooser/countrylist/Asia"]["choices"][21]="Republic of";
$elem["localechooser/countrylist/Asia"]["choices"][22]="Kuwait";
$elem["localechooser/countrylist/Asia"]["choices"][23]="Kyrgyzstan";
$elem["localechooser/countrylist/Asia"]["choices"][24]="Lao People's Democratic Republic";
$elem["localechooser/countrylist/Asia"]["choices"][25]="Lebanon";
$elem["localechooser/countrylist/Asia"]["choices"][26]="Macao";
$elem["localechooser/countrylist/Asia"]["choices"][27]="Malaysia";
$elem["localechooser/countrylist/Asia"]["choices"][28]="Mongolia";
$elem["localechooser/countrylist/Asia"]["choices"][29]="Myanmar";
$elem["localechooser/countrylist/Asia"]["choices"][30]="Nepal";
$elem["localechooser/countrylist/Asia"]["choices"][31]="Oman";
$elem["localechooser/countrylist/Asia"]["choices"][32]="Pakistan";
$elem["localechooser/countrylist/Asia"]["choices"][33]="Palestine\";
$elem["localechooser/countrylist/Asia"]["choices"][34]="State of";
$elem["localechooser/countrylist/Asia"]["choices"][35]="Philippines";
$elem["localechooser/countrylist/Asia"]["choices"][36]="Qatar";
$elem["localechooser/countrylist/Asia"]["choices"][37]="Saudi Arabia";
$elem["localechooser/countrylist/Asia"]["choices"][38]="Singapore";
$elem["localechooser/countrylist/Asia"]["choices"][39]="Sri Lanka";
$elem["localechooser/countrylist/Asia"]["choices"][40]="Syrian Arab Republic";
$elem["localechooser/countrylist/Asia"]["choices"][41]="Taiwan";
$elem["localechooser/countrylist/Asia"]["choices"][42]="Tajikistan";
$elem["localechooser/countrylist/Asia"]["choices"][43]="Thailand";
$elem["localechooser/countrylist/Asia"]["choices"][44]="Timor-Leste";
$elem["localechooser/countrylist/Asia"]["choices"][45]="Turkey";
$elem["localechooser/countrylist/Asia"]["choices"][46]="Turkmenistan";
$elem["localechooser/countrylist/Asia"]["choices"][47]="United Arab Emirates";
$elem["localechooser/countrylist/Asia"]["choices"][48]="Uzbekistan";
$elem["localechooser/countrylist/Asia"]["choices"][49]="Viet Nam";
$elem["localechooser/countrylist/Asia"]["choicesde"][1]="Afghanistan";
$elem["localechooser/countrylist/Asia"]["choicesde"][2]="Bahrain";
$elem["localechooser/countrylist/Asia"]["choicesde"][3]="Bangladesch";
$elem["localechooser/countrylist/Asia"]["choicesde"][4]="Bhutan";
$elem["localechooser/countrylist/Asia"]["choicesde"][5]="Brunei Darussalam";
$elem["localechooser/countrylist/Asia"]["choicesde"][6]="Kambodscha";
$elem["localechooser/countrylist/Asia"]["choicesde"][7]="China";
$elem["localechooser/countrylist/Asia"]["choicesde"][8]="Hongkong";
$elem["localechooser/countrylist/Asia"]["choicesde"][9]="Indien";
$elem["localechooser/countrylist/Asia"]["choicesde"][10]="Indonesien";
$elem["localechooser/countrylist/Asia"]["choicesde"][11]="Iran\";
$elem["localechooser/countrylist/Asia"]["choicesde"][12]="Islamische Republik";
$elem["localechooser/countrylist/Asia"]["choicesde"][13]="Irak";
$elem["localechooser/countrylist/Asia"]["choicesde"][14]="Israel";
$elem["localechooser/countrylist/Asia"]["choicesde"][15]="Japan";
$elem["localechooser/countrylist/Asia"]["choicesde"][16]="Jordanien";
$elem["localechooser/countrylist/Asia"]["choicesde"][17]="Kasachstan";
$elem["localechooser/countrylist/Asia"]["choicesde"][18]="Korea\";
$elem["localechooser/countrylist/Asia"]["choicesde"][19]="Demokratische Volksrepublik";
$elem["localechooser/countrylist/Asia"]["choicesde"][20]="Korea\";
$elem["localechooser/countrylist/Asia"]["choicesde"][21]="Republik";
$elem["localechooser/countrylist/Asia"]["choicesde"][22]="Kuwait";
$elem["localechooser/countrylist/Asia"]["choicesde"][23]="Kirgisistan";
$elem["localechooser/countrylist/Asia"]["choicesde"][24]="Laos\";
$elem["localechooser/countrylist/Asia"]["choicesde"][25]="Demokratische Volksrepublik";
$elem["localechooser/countrylist/Asia"]["choicesde"][26]="Libanon";
$elem["localechooser/countrylist/Asia"]["choicesde"][27]="Macao";
$elem["localechooser/countrylist/Asia"]["choicesde"][28]="Malaysia";
$elem["localechooser/countrylist/Asia"]["choicesde"][29]="Mongolei";
$elem["localechooser/countrylist/Asia"]["choicesde"][30]="Myanmar";
$elem["localechooser/countrylist/Asia"]["choicesde"][31]="Nepal";
$elem["localechooser/countrylist/Asia"]["choicesde"][32]="Oman";
$elem["localechooser/countrylist/Asia"]["choicesde"][33]="Pakistan";
$elem["localechooser/countrylist/Asia"]["choicesde"][34]="Palästina\";
$elem["localechooser/countrylist/Asia"]["choicesde"][35]="Staat";
$elem["localechooser/countrylist/Asia"]["choicesde"][36]="Philippinen";
$elem["localechooser/countrylist/Asia"]["choicesde"][37]="Katar";
$elem["localechooser/countrylist/Asia"]["choicesde"][38]="Saudi-Arabien";
$elem["localechooser/countrylist/Asia"]["choicesde"][39]="Singapur";
$elem["localechooser/countrylist/Asia"]["choicesde"][40]="Sri Lanka";
$elem["localechooser/countrylist/Asia"]["choicesde"][41]="Syrien\";
$elem["localechooser/countrylist/Asia"]["choicesde"][42]="Arabische Republik";
$elem["localechooser/countrylist/Asia"]["choicesde"][43]="Taiwan";
$elem["localechooser/countrylist/Asia"]["choicesde"][44]="Tadschikistan";
$elem["localechooser/countrylist/Asia"]["choicesde"][45]="Thailand";
$elem["localechooser/countrylist/Asia"]["choicesde"][46]="Timor-Leste";
$elem["localechooser/countrylist/Asia"]["choicesde"][47]="Türkei";
$elem["localechooser/countrylist/Asia"]["choicesde"][48]="Turkmenistan";
$elem["localechooser/countrylist/Asia"]["choicesde"][49]="Vereinigte Arabische Emirate";
$elem["localechooser/countrylist/Asia"]["choicesde"][50]="Usbekistan";
$elem["localechooser/countrylist/Asia"]["choicesde"][51]="Vietnam";
$elem["localechooser/countrylist/Asia"]["choicesfr"][1]="Afghanistan";
$elem["localechooser/countrylist/Asia"]["choicesfr"][2]="Bahreïn";
$elem["localechooser/countrylist/Asia"]["choicesfr"][3]="Bangladesh";
$elem["localechooser/countrylist/Asia"]["choicesfr"][4]="Bhoutan";
$elem["localechooser/countrylist/Asia"]["choicesfr"][5]="Brunéi Darussalam";
$elem["localechooser/countrylist/Asia"]["choicesfr"][6]="Cambodge";
$elem["localechooser/countrylist/Asia"]["choicesfr"][7]="Chine";
$elem["localechooser/countrylist/Asia"]["choicesfr"][8]="Hong-Kong";
$elem["localechooser/countrylist/Asia"]["choicesfr"][9]="Inde";
$elem["localechooser/countrylist/Asia"]["choicesfr"][10]="Indonésie";
$elem["localechooser/countrylist/Asia"]["choicesfr"][11]="Iran\";
$elem["localechooser/countrylist/Asia"]["choicesfr"][12]="République islamique d'";
$elem["localechooser/countrylist/Asia"]["choicesfr"][13]="Irak";
$elem["localechooser/countrylist/Asia"]["choicesfr"][14]="Israël";
$elem["localechooser/countrylist/Asia"]["choicesfr"][15]="Japon";
$elem["localechooser/countrylist/Asia"]["choicesfr"][16]="Jordanie";
$elem["localechooser/countrylist/Asia"]["choicesfr"][17]="Kazakhstan";
$elem["localechooser/countrylist/Asia"]["choicesfr"][18]="Corée\";
$elem["localechooser/countrylist/Asia"]["choicesfr"][19]="République populaire démocratique de";
$elem["localechooser/countrylist/Asia"]["choicesfr"][20]="Corée\";
$elem["localechooser/countrylist/Asia"]["choicesfr"][21]="République de";
$elem["localechooser/countrylist/Asia"]["choicesfr"][22]="Koweït";
$elem["localechooser/countrylist/Asia"]["choicesfr"][23]="Kirghizistan";
$elem["localechooser/countrylist/Asia"]["choicesfr"][24]="Lao\";
$elem["localechooser/countrylist/Asia"]["choicesfr"][25]="République démocratique populaire";
$elem["localechooser/countrylist/Asia"]["choicesfr"][26]="Liban";
$elem["localechooser/countrylist/Asia"]["choicesfr"][27]="Macau";
$elem["localechooser/countrylist/Asia"]["choicesfr"][28]="Malaisie";
$elem["localechooser/countrylist/Asia"]["choicesfr"][29]="Mongolie";
$elem["localechooser/countrylist/Asia"]["choicesfr"][30]="Myanmar";
$elem["localechooser/countrylist/Asia"]["choicesfr"][31]="Népal";
$elem["localechooser/countrylist/Asia"]["choicesfr"][32]="Oman";
$elem["localechooser/countrylist/Asia"]["choicesfr"][33]="Pakistan";
$elem["localechooser/countrylist/Asia"]["choicesfr"][34]="Palestine\";
$elem["localechooser/countrylist/Asia"]["choicesfr"][35]="État de";
$elem["localechooser/countrylist/Asia"]["choicesfr"][36]="Philippines";
$elem["localechooser/countrylist/Asia"]["choicesfr"][37]="Qatar";
$elem["localechooser/countrylist/Asia"]["choicesfr"][38]="Arabie saoudite";
$elem["localechooser/countrylist/Asia"]["choicesfr"][39]="Singapour";
$elem["localechooser/countrylist/Asia"]["choicesfr"][40]="Sri Lanka";
$elem["localechooser/countrylist/Asia"]["choicesfr"][41]="Syrienne\";
$elem["localechooser/countrylist/Asia"]["choicesfr"][42]="République arabe";
$elem["localechooser/countrylist/Asia"]["choicesfr"][43]="Taïwan";
$elem["localechooser/countrylist/Asia"]["choicesfr"][44]="Tadjikistan";
$elem["localechooser/countrylist/Asia"]["choicesfr"][45]="Thaïlande";
$elem["localechooser/countrylist/Asia"]["choicesfr"][46]="Timor-Leste";
$elem["localechooser/countrylist/Asia"]["choicesfr"][47]="Turquie";
$elem["localechooser/countrylist/Asia"]["choicesfr"][48]="Turkménistan";
$elem["localechooser/countrylist/Asia"]["choicesfr"][49]="Émirats arabes unis";
$elem["localechooser/countrylist/Asia"]["choicesfr"][50]="Ouzbékistan";
$elem["localechooser/countrylist/Asia"]["choicesfr"][51]="Viet Nam";
$elem["localechooser/countrylist/Asia"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/Asia"]["descriptionde"]="";
$elem["localechooser/countrylist/Asia"]["descriptionfr"]="";
$elem["localechooser/countrylist/Asia"]["default"]="";
$elem["localechooser/countrylist/Atlantic_Ocean"]["type"]="select";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choices"][1]="Bouvet Island";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choices"][2]="Falkland Islands (Malvinas)";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choices"][3]="Saint Helena\";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choices"][4]="Ascension and Tristan da Cunha";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesde"][1]="Bouvet-Insel";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesde"][2]="Falklandinseln (Malwinen)";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesde"][3]="St. Helena\";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesde"][4]="Ascension und Tristan da Cunha";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesfr"][1]="Bouvet\";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesfr"][2]="Île";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesfr"][3]="Falkland\";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesfr"][4]="Îles (Malvinas)";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesfr"][5]="Sainte-Hélène\";
$elem["localechooser/countrylist/Atlantic_Ocean"]["choicesfr"][6]="Ascension et Tristan da Cunha";
$elem["localechooser/countrylist/Atlantic_Ocean"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/Atlantic_Ocean"]["descriptionde"]="";
$elem["localechooser/countrylist/Atlantic_Ocean"]["descriptionfr"]="";
$elem["localechooser/countrylist/Atlantic_Ocean"]["default"]="";
$elem["localechooser/countrylist/Caribbean"]["type"]="select";
$elem["localechooser/countrylist/Caribbean"]["choices"][1]="Anguilla";
$elem["localechooser/countrylist/Caribbean"]["choices"][2]="Antigua and Barbuda";
$elem["localechooser/countrylist/Caribbean"]["choices"][3]="Aruba";
$elem["localechooser/countrylist/Caribbean"]["choices"][4]="Bahamas";
$elem["localechooser/countrylist/Caribbean"]["choices"][5]="Barbados";
$elem["localechooser/countrylist/Caribbean"]["choices"][6]="Bermuda";
$elem["localechooser/countrylist/Caribbean"]["choices"][7]="Bonaire\";
$elem["localechooser/countrylist/Caribbean"]["choices"][8]="Sint Eustatius and Saba";
$elem["localechooser/countrylist/Caribbean"]["choices"][9]="Cayman Islands";
$elem["localechooser/countrylist/Caribbean"]["choices"][10]="Cuba";
$elem["localechooser/countrylist/Caribbean"]["choices"][11]="Dominica";
$elem["localechooser/countrylist/Caribbean"]["choices"][12]="Dominican Republic";
$elem["localechooser/countrylist/Caribbean"]["choices"][13]="Grenada";
$elem["localechooser/countrylist/Caribbean"]["choices"][14]="Guadeloupe";
$elem["localechooser/countrylist/Caribbean"]["choices"][15]="Haiti";
$elem["localechooser/countrylist/Caribbean"]["choices"][16]="Jamaica";
$elem["localechooser/countrylist/Caribbean"]["choices"][17]="Martinique";
$elem["localechooser/countrylist/Caribbean"]["choices"][18]="Montserrat";
$elem["localechooser/countrylist/Caribbean"]["choices"][19]="Puerto Rico";
$elem["localechooser/countrylist/Caribbean"]["choices"][20]="Saint Barthélemy";
$elem["localechooser/countrylist/Caribbean"]["choices"][21]="Saint Kitts and Nevis";
$elem["localechooser/countrylist/Caribbean"]["choices"][22]="Saint Lucia";
$elem["localechooser/countrylist/Caribbean"]["choices"][23]="Saint Martin (French part)";
$elem["localechooser/countrylist/Caribbean"]["choices"][24]="Saint Vincent and the Grenadines";
$elem["localechooser/countrylist/Caribbean"]["choices"][25]="Sint Maarten (Dutch part)";
$elem["localechooser/countrylist/Caribbean"]["choices"][26]="Trinidad and Tobago";
$elem["localechooser/countrylist/Caribbean"]["choices"][27]="Turks and Caicos Islands";
$elem["localechooser/countrylist/Caribbean"]["choices"][28]="Virgin Islands\";
$elem["localechooser/countrylist/Caribbean"]["choices"][29]="British";
$elem["localechooser/countrylist/Caribbean"]["choices"][30]="Virgin Islands\";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][1]="Anguilla";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][2]="Antigua und Barbuda";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][3]="Aruba";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][4]="Bahamas";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][5]="Barbados";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][6]="Bermuda";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][7]="Bonaire\";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][8]="Sint Eustatius und Saba";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][9]="Cayman-Inseln";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][10]="Kuba";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][11]="Dominica";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][12]="Dominikanische Republik";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][13]="Grenada";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][14]="Guadeloupe";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][15]="Haiti";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][16]="Jamaika";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][17]="Martinique";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][18]="Montserrat";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][19]="Puerto Rico";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][20]="Saint-Barthélemy";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][21]="St. Kitts und Nevis";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][22]="St. Lucia";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][23]="Saint Martin (Französischer Teil)";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][24]="St. Vincent und die Grenadinen";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][25]="Saint-Martin (Niederländischer Teil)";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][26]="Trinidad und Tobago";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][27]="Turks- und Caicosinseln";
$elem["localechooser/countrylist/Caribbean"]["choicesde"][28]="Britische Jungferninseln";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][1]="Anguilla";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][2]="Antigua-et-Barbuda";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][3]="Aruba";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][4]="Bahamas";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][5]="Barbade";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][6]="Bermudes";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][7]="Bonaire\";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][8]="Saint-Eustache et Saba";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][9]="Caïman\";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][10]="Îles";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][11]="Cuba";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][12]="Dominique";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][13]="Dominicaine\";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][14]="République";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][15]="Grenade";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][16]="Guadeloupe";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][17]="Haïti";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][18]="Jamaïque";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][19]="Martinique";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][20]="Montserrat";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][21]="Porto Rico";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][22]="Saint-Barthélemy";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][23]="Saint-Kitts-et-Nevis";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][24]="Sainte-Lucie";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][25]="Saint-Martin (partie française)";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][26]="Saint-Vincent-et-les Grenadines";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][27]="Saint-Martin (partie néerlandaise)";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][28]="Trinité-et-Tobago";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][29]="Turks et Caïques\";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][30]="Îles";
$elem["localechooser/countrylist/Caribbean"]["choicesfr"][31]="Îles Vierges britanniques";
$elem["localechooser/countrylist/Caribbean"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/Caribbean"]["descriptionde"]="";
$elem["localechooser/countrylist/Caribbean"]["descriptionfr"]="";
$elem["localechooser/countrylist/Caribbean"]["default"]="";
$elem["localechooser/countrylist/Central_America"]["type"]="select";
$elem["localechooser/countrylist/Central_America"]["choices"][1]="Belize";
$elem["localechooser/countrylist/Central_America"]["choices"][2]="Costa Rica";
$elem["localechooser/countrylist/Central_America"]["choices"][3]="El Salvador";
$elem["localechooser/countrylist/Central_America"]["choices"][4]="Guatemala";
$elem["localechooser/countrylist/Central_America"]["choices"][5]="Honduras";
$elem["localechooser/countrylist/Central_America"]["choices"][6]="Nicaragua";
$elem["localechooser/countrylist/Central_America"]["choicesde"][1]="Belize";
$elem["localechooser/countrylist/Central_America"]["choicesde"][2]="Costa Rica";
$elem["localechooser/countrylist/Central_America"]["choicesde"][3]="El Salvador";
$elem["localechooser/countrylist/Central_America"]["choicesde"][4]="Guatemala";
$elem["localechooser/countrylist/Central_America"]["choicesde"][5]="Honduras";
$elem["localechooser/countrylist/Central_America"]["choicesde"][6]="Nicaragua";
$elem["localechooser/countrylist/Central_America"]["choicesfr"][1]="Belize";
$elem["localechooser/countrylist/Central_America"]["choicesfr"][2]="Costa Rica";
$elem["localechooser/countrylist/Central_America"]["choicesfr"][3]="El Salvador";
$elem["localechooser/countrylist/Central_America"]["choicesfr"][4]="Guatemala";
$elem["localechooser/countrylist/Central_America"]["choicesfr"][5]="Honduras";
$elem["localechooser/countrylist/Central_America"]["choicesfr"][6]="Nicaragua";
$elem["localechooser/countrylist/Central_America"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/Central_America"]["descriptionde"]="";
$elem["localechooser/countrylist/Central_America"]["descriptionfr"]="";
$elem["localechooser/countrylist/Central_America"]["default"]="";
$elem["localechooser/countrylist/Europe"]["type"]="select";
$elem["localechooser/countrylist/Europe"]["choices"][1]="Albania";
$elem["localechooser/countrylist/Europe"]["choices"][2]="Andorra";
$elem["localechooser/countrylist/Europe"]["choices"][3]="Armenia";
$elem["localechooser/countrylist/Europe"]["choices"][4]="Austria";
$elem["localechooser/countrylist/Europe"]["choices"][5]="Azerbaijan";
$elem["localechooser/countrylist/Europe"]["choices"][6]="Belarus";
$elem["localechooser/countrylist/Europe"]["choices"][7]="Belgium";
$elem["localechooser/countrylist/Europe"]["choices"][8]="Bosnia and Herzegovina";
$elem["localechooser/countrylist/Europe"]["choices"][9]="Bulgaria";
$elem["localechooser/countrylist/Europe"]["choices"][10]="Croatia";
$elem["localechooser/countrylist/Europe"]["choices"][11]="Cyprus";
$elem["localechooser/countrylist/Europe"]["choices"][12]="Czech Republic";
$elem["localechooser/countrylist/Europe"]["choices"][13]="Denmark";
$elem["localechooser/countrylist/Europe"]["choices"][14]="Estonia";
$elem["localechooser/countrylist/Europe"]["choices"][15]="Faroe Islands";
$elem["localechooser/countrylist/Europe"]["choices"][16]="Finland";
$elem["localechooser/countrylist/Europe"]["choices"][17]="France";
$elem["localechooser/countrylist/Europe"]["choices"][18]="Georgia";
$elem["localechooser/countrylist/Europe"]["choices"][19]="Germany";
$elem["localechooser/countrylist/Europe"]["choices"][20]="Gibraltar";
$elem["localechooser/countrylist/Europe"]["choices"][21]="Greece";
$elem["localechooser/countrylist/Europe"]["choices"][22]="Greenland";
$elem["localechooser/countrylist/Europe"]["choices"][23]="Guernsey";
$elem["localechooser/countrylist/Europe"]["choices"][24]="Holy See (Vatican City State)";
$elem["localechooser/countrylist/Europe"]["choices"][25]="Hungary";
$elem["localechooser/countrylist/Europe"]["choices"][26]="Iceland";
$elem["localechooser/countrylist/Europe"]["choices"][27]="Ireland";
$elem["localechooser/countrylist/Europe"]["choices"][28]="Isle of Man";
$elem["localechooser/countrylist/Europe"]["choices"][29]="Italy";
$elem["localechooser/countrylist/Europe"]["choices"][30]="Jersey";
$elem["localechooser/countrylist/Europe"]["choices"][31]="Latvia";
$elem["localechooser/countrylist/Europe"]["choices"][32]="Liechtenstein";
$elem["localechooser/countrylist/Europe"]["choices"][33]="Lithuania";
$elem["localechooser/countrylist/Europe"]["choices"][34]="Luxembourg";
$elem["localechooser/countrylist/Europe"]["choices"][35]="Macedonia\";
$elem["localechooser/countrylist/Europe"]["choices"][36]="Republic of";
$elem["localechooser/countrylist/Europe"]["choices"][37]="Malta";
$elem["localechooser/countrylist/Europe"]["choices"][38]="Moldova";
$elem["localechooser/countrylist/Europe"]["choices"][39]="Monaco";
$elem["localechooser/countrylist/Europe"]["choices"][40]="Montenegro";
$elem["localechooser/countrylist/Europe"]["choices"][41]="Netherlands";
$elem["localechooser/countrylist/Europe"]["choices"][42]="Norway";
$elem["localechooser/countrylist/Europe"]["choices"][43]="Poland";
$elem["localechooser/countrylist/Europe"]["choices"][44]="Portugal";
$elem["localechooser/countrylist/Europe"]["choices"][45]="Romania";
$elem["localechooser/countrylist/Europe"]["choices"][46]="Russian Federation";
$elem["localechooser/countrylist/Europe"]["choices"][47]="San Marino";
$elem["localechooser/countrylist/Europe"]["choices"][48]="Serbia";
$elem["localechooser/countrylist/Europe"]["choices"][49]="Slovakia";
$elem["localechooser/countrylist/Europe"]["choices"][50]="Slovenia";
$elem["localechooser/countrylist/Europe"]["choices"][51]="Spain";
$elem["localechooser/countrylist/Europe"]["choices"][52]="Svalbard and Jan Mayen";
$elem["localechooser/countrylist/Europe"]["choices"][53]="Sweden";
$elem["localechooser/countrylist/Europe"]["choices"][54]="Switzerland";
$elem["localechooser/countrylist/Europe"]["choices"][55]="Ukraine";
$elem["localechooser/countrylist/Europe"]["choices"][56]="United Kingdom";
$elem["localechooser/countrylist/Europe"]["choicesde"][1]="Albanien";
$elem["localechooser/countrylist/Europe"]["choicesde"][2]="Andorra";
$elem["localechooser/countrylist/Europe"]["choicesde"][3]="Armenien";
$elem["localechooser/countrylist/Europe"]["choicesde"][4]="Österreich";
$elem["localechooser/countrylist/Europe"]["choicesde"][5]="Aserbaidschan";
$elem["localechooser/countrylist/Europe"]["choicesde"][6]="Weißrussland";
$elem["localechooser/countrylist/Europe"]["choicesde"][7]="Belgien";
$elem["localechooser/countrylist/Europe"]["choicesde"][8]="Bosnien und Herzegowina";
$elem["localechooser/countrylist/Europe"]["choicesde"][9]="Bulgarien";
$elem["localechooser/countrylist/Europe"]["choicesde"][10]="Kroatien";
$elem["localechooser/countrylist/Europe"]["choicesde"][11]="Zypern";
$elem["localechooser/countrylist/Europe"]["choicesde"][12]="Tschechische Republik";
$elem["localechooser/countrylist/Europe"]["choicesde"][13]="Dänemark";
$elem["localechooser/countrylist/Europe"]["choicesde"][14]="Estland";
$elem["localechooser/countrylist/Europe"]["choicesde"][15]="Färöer-Inseln";
$elem["localechooser/countrylist/Europe"]["choicesde"][16]="Finnland";
$elem["localechooser/countrylist/Europe"]["choicesde"][17]="Frankreich";
$elem["localechooser/countrylist/Europe"]["choicesde"][18]="Georgien";
$elem["localechooser/countrylist/Europe"]["choicesde"][19]="Deutschland";
$elem["localechooser/countrylist/Europe"]["choicesde"][20]="Gibraltar";
$elem["localechooser/countrylist/Europe"]["choicesde"][21]="Griechenland";
$elem["localechooser/countrylist/Europe"]["choicesde"][22]="Grönland";
$elem["localechooser/countrylist/Europe"]["choicesde"][23]="Guernsey";
$elem["localechooser/countrylist/Europe"]["choicesde"][24]="Heiliger Stuhl (Staat Vatikanstadt)";
$elem["localechooser/countrylist/Europe"]["choicesde"][25]="Ungarn";
$elem["localechooser/countrylist/Europe"]["choicesde"][26]="Island";
$elem["localechooser/countrylist/Europe"]["choicesde"][27]="Irland";
$elem["localechooser/countrylist/Europe"]["choicesde"][28]="Insel Man";
$elem["localechooser/countrylist/Europe"]["choicesde"][29]="Italien";
$elem["localechooser/countrylist/Europe"]["choicesde"][30]="Jersey";
$elem["localechooser/countrylist/Europe"]["choicesde"][31]="Lettland";
$elem["localechooser/countrylist/Europe"]["choicesde"][32]="Liechtenstein";
$elem["localechooser/countrylist/Europe"]["choicesde"][33]="Litauen";
$elem["localechooser/countrylist/Europe"]["choicesde"][34]="Luxemburg";
$elem["localechooser/countrylist/Europe"]["choicesde"][35]="Mazedonien\";
$elem["localechooser/countrylist/Europe"]["choicesde"][36]="ehemalige jugoslawische Republik";
$elem["localechooser/countrylist/Europe"]["choicesde"][37]="Malta";
$elem["localechooser/countrylist/Europe"]["choicesde"][38]="Moldau";
$elem["localechooser/countrylist/Europe"]["choicesde"][39]="Monaco";
$elem["localechooser/countrylist/Europe"]["choicesde"][40]="Montenegro";
$elem["localechooser/countrylist/Europe"]["choicesde"][41]="Niederlande";
$elem["localechooser/countrylist/Europe"]["choicesde"][42]="Norwegen";
$elem["localechooser/countrylist/Europe"]["choicesde"][43]="Polen";
$elem["localechooser/countrylist/Europe"]["choicesde"][44]="Portugal";
$elem["localechooser/countrylist/Europe"]["choicesde"][45]="Rumänien";
$elem["localechooser/countrylist/Europe"]["choicesde"][46]="Russische Föderation";
$elem["localechooser/countrylist/Europe"]["choicesde"][47]="San Marino";
$elem["localechooser/countrylist/Europe"]["choicesde"][48]="Serbien";
$elem["localechooser/countrylist/Europe"]["choicesde"][49]="Slowakei";
$elem["localechooser/countrylist/Europe"]["choicesde"][50]="Slowenien";
$elem["localechooser/countrylist/Europe"]["choicesde"][51]="Spanien";
$elem["localechooser/countrylist/Europe"]["choicesde"][52]="Svalbard und Jan Mayen";
$elem["localechooser/countrylist/Europe"]["choicesde"][53]="Schweden";
$elem["localechooser/countrylist/Europe"]["choicesde"][54]="Schweiz";
$elem["localechooser/countrylist/Europe"]["choicesde"][55]="Ukraine";
$elem["localechooser/countrylist/Europe"]["choicesde"][56]="Vereinigtes Königreich";
$elem["localechooser/countrylist/Europe"]["choicesfr"][1]="Albanie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][2]="Andorre";
$elem["localechooser/countrylist/Europe"]["choicesfr"][3]="Arménie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][4]="Autriche";
$elem["localechooser/countrylist/Europe"]["choicesfr"][5]="Azerbaïdjan";
$elem["localechooser/countrylist/Europe"]["choicesfr"][6]="Bélarus";
$elem["localechooser/countrylist/Europe"]["choicesfr"][7]="Belgique";
$elem["localechooser/countrylist/Europe"]["choicesfr"][8]="Bosnie-Herzégovine";
$elem["localechooser/countrylist/Europe"]["choicesfr"][9]="Bulgarie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][10]="Croatie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][11]="Chypre";
$elem["localechooser/countrylist/Europe"]["choicesfr"][12]="Tchèque\";
$elem["localechooser/countrylist/Europe"]["choicesfr"][13]="République";
$elem["localechooser/countrylist/Europe"]["choicesfr"][14]="Danemark";
$elem["localechooser/countrylist/Europe"]["choicesfr"][15]="Estonie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][16]="Féroé\";
$elem["localechooser/countrylist/Europe"]["choicesfr"][17]="Îles";
$elem["localechooser/countrylist/Europe"]["choicesfr"][18]="Finlande";
$elem["localechooser/countrylist/Europe"]["choicesfr"][19]="France";
$elem["localechooser/countrylist/Europe"]["choicesfr"][20]="Géorgie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][21]="Allemagne";
$elem["localechooser/countrylist/Europe"]["choicesfr"][22]="Gibraltar";
$elem["localechooser/countrylist/Europe"]["choicesfr"][23]="Grèce";
$elem["localechooser/countrylist/Europe"]["choicesfr"][24]="Groënland";
$elem["localechooser/countrylist/Europe"]["choicesfr"][25]="Guernesey";
$elem["localechooser/countrylist/Europe"]["choicesfr"][26]="Saint-Siège (état de la cité du Vatican)";
$elem["localechooser/countrylist/Europe"]["choicesfr"][27]="Hongrie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][28]="Islande";
$elem["localechooser/countrylist/Europe"]["choicesfr"][29]="Irlande";
$elem["localechooser/countrylist/Europe"]["choicesfr"][30]="Île de Man";
$elem["localechooser/countrylist/Europe"]["choicesfr"][31]="Italie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][32]="Jersey";
$elem["localechooser/countrylist/Europe"]["choicesfr"][33]="Lettonie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][34]="Liechtenstein";
$elem["localechooser/countrylist/Europe"]["choicesfr"][35]="Lituanie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][36]="Luxembourg";
$elem["localechooser/countrylist/Europe"]["choicesfr"][37]="Macédoine\";
$elem["localechooser/countrylist/Europe"]["choicesfr"][38]="République de";
$elem["localechooser/countrylist/Europe"]["choicesfr"][39]="Malte";
$elem["localechooser/countrylist/Europe"]["choicesfr"][40]="Moldavie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][41]="Monaco";
$elem["localechooser/countrylist/Europe"]["choicesfr"][42]="Monténégro";
$elem["localechooser/countrylist/Europe"]["choicesfr"][43]="Pays-Bas";
$elem["localechooser/countrylist/Europe"]["choicesfr"][44]="Norvège";
$elem["localechooser/countrylist/Europe"]["choicesfr"][45]="Pologne";
$elem["localechooser/countrylist/Europe"]["choicesfr"][46]="Portugal";
$elem["localechooser/countrylist/Europe"]["choicesfr"][47]="Roumanie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][48]="Russie\";
$elem["localechooser/countrylist/Europe"]["choicesfr"][49]="Fédération de";
$elem["localechooser/countrylist/Europe"]["choicesfr"][50]="San Marin";
$elem["localechooser/countrylist/Europe"]["choicesfr"][51]="Serbie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][52]="Slovaquie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][53]="Slovénie";
$elem["localechooser/countrylist/Europe"]["choicesfr"][54]="Espagne";
$elem["localechooser/countrylist/Europe"]["choicesfr"][55]="Svalbard et île Jan Mayen";
$elem["localechooser/countrylist/Europe"]["choicesfr"][56]="Suède";
$elem["localechooser/countrylist/Europe"]["choicesfr"][57]="Suisse";
$elem["localechooser/countrylist/Europe"]["choicesfr"][58]="Ukraine";
$elem["localechooser/countrylist/Europe"]["choicesfr"][59]="Royaume-Uni";
$elem["localechooser/countrylist/Europe"]["choicesfr"][60]="Åland\";
$elem["localechooser/countrylist/Europe"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/Europe"]["descriptionde"]="";
$elem["localechooser/countrylist/Europe"]["descriptionfr"]="";
$elem["localechooser/countrylist/Europe"]["default"]="";
$elem["localechooser/countrylist/Indian_Ocean"]["type"]="select";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][1]="British Indian Ocean Territory";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][2]="Christmas Island";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][3]="Cocos (Keeling) Islands";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][4]="Comoros";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][5]="French Southern Territories";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][6]="Heard Island and McDonald Islands";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][7]="Madagascar";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][8]="Maldives";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][9]="Mauritius";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][10]="Mayotte";
$elem["localechooser/countrylist/Indian_Ocean"]["choices"][11]="Réunion";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][1]="Britisches Territorium im Indischen Ozean";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][2]="Weihnachtsinseln";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][3]="Kokos-(Keeling-)Inseln";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][4]="Komoren";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][5]="Französische Süd- und Antarktisgebiete";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][6]="Heard und McDonaldinseln";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][7]="Madagaskar";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][8]="Malediven";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][9]="Mauritius";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][10]="Mayotte";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesde"][11]="Réunion";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][1]="Océan Indien\";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][2]="Territoire britannique de l'";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][3]="Christmas\";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][4]="Île";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][5]="Cocos (Keeling)\";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][6]="Îles";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][7]="Comores";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][8]="Terres australes françaises";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][9]="Heard\";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][10]="Île et McDonald\";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][11]="Îles";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][12]="Madagascar";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][13]="Maldives";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][14]="Maurice";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][15]="Mayotte";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][16]="Réunion\";
$elem["localechooser/countrylist/Indian_Ocean"]["choicesfr"][17]="Île de la";
$elem["localechooser/countrylist/Indian_Ocean"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/Indian_Ocean"]["descriptionde"]="";
$elem["localechooser/countrylist/Indian_Ocean"]["descriptionfr"]="";
$elem["localechooser/countrylist/Indian_Ocean"]["default"]="";
$elem["localechooser/countrylist/North_America"]["type"]="select";
$elem["localechooser/countrylist/North_America"]["choices"][1]="Canada";
$elem["localechooser/countrylist/North_America"]["choices"][2]="Mexico";
$elem["localechooser/countrylist/North_America"]["choices"][3]="Saint Pierre and Miquelon";
$elem["localechooser/countrylist/North_America"]["choicesde"][1]="Kanada";
$elem["localechooser/countrylist/North_America"]["choicesde"][2]="Mexiko";
$elem["localechooser/countrylist/North_America"]["choicesde"][3]="St. Pierre und Miquelon";
$elem["localechooser/countrylist/North_America"]["choicesfr"][1]="Canada";
$elem["localechooser/countrylist/North_America"]["choicesfr"][2]="Mexique";
$elem["localechooser/countrylist/North_America"]["choicesfr"][3]="Saint-Pierre-et-Miquelon";
$elem["localechooser/countrylist/North_America"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/North_America"]["descriptionde"]="";
$elem["localechooser/countrylist/North_America"]["descriptionfr"]="";
$elem["localechooser/countrylist/North_America"]["default"]="";
$elem["localechooser/countrylist/Oceania"]["type"]="select";
$elem["localechooser/countrylist/Oceania"]["choices"][1]="American Samoa";
$elem["localechooser/countrylist/Oceania"]["choices"][2]="Australia";
$elem["localechooser/countrylist/Oceania"]["choices"][3]="Cook Islands";
$elem["localechooser/countrylist/Oceania"]["choices"][4]="Fiji";
$elem["localechooser/countrylist/Oceania"]["choices"][5]="French Polynesia";
$elem["localechooser/countrylist/Oceania"]["choices"][6]="Guam";
$elem["localechooser/countrylist/Oceania"]["choices"][7]="Kiribati";
$elem["localechooser/countrylist/Oceania"]["choices"][8]="Marshall Islands";
$elem["localechooser/countrylist/Oceania"]["choices"][9]="Micronesia\";
$elem["localechooser/countrylist/Oceania"]["choices"][10]="Federated States of";
$elem["localechooser/countrylist/Oceania"]["choices"][11]="Nauru";
$elem["localechooser/countrylist/Oceania"]["choices"][12]="New Caledonia";
$elem["localechooser/countrylist/Oceania"]["choices"][13]="New Zealand";
$elem["localechooser/countrylist/Oceania"]["choices"][14]="Niue";
$elem["localechooser/countrylist/Oceania"]["choices"][15]="Norfolk Island";
$elem["localechooser/countrylist/Oceania"]["choices"][16]="Northern Mariana Islands";
$elem["localechooser/countrylist/Oceania"]["choices"][17]="Palau";
$elem["localechooser/countrylist/Oceania"]["choices"][18]="Papua New Guinea";
$elem["localechooser/countrylist/Oceania"]["choices"][19]="Pitcairn";
$elem["localechooser/countrylist/Oceania"]["choices"][20]="Samoa";
$elem["localechooser/countrylist/Oceania"]["choices"][21]="Solomon Islands";
$elem["localechooser/countrylist/Oceania"]["choices"][22]="Tokelau";
$elem["localechooser/countrylist/Oceania"]["choices"][23]="Tonga";
$elem["localechooser/countrylist/Oceania"]["choices"][24]="Tuvalu";
$elem["localechooser/countrylist/Oceania"]["choices"][25]="United States Minor Outlying Islands";
$elem["localechooser/countrylist/Oceania"]["choices"][26]="Vanuatu";
$elem["localechooser/countrylist/Oceania"]["choicesde"][1]="Amerikanisch-Samoa";
$elem["localechooser/countrylist/Oceania"]["choicesde"][2]="Australien";
$elem["localechooser/countrylist/Oceania"]["choicesde"][3]="Cookinseln";
$elem["localechooser/countrylist/Oceania"]["choicesde"][4]="Fidschi";
$elem["localechooser/countrylist/Oceania"]["choicesde"][5]="Französisch-Polynesien";
$elem["localechooser/countrylist/Oceania"]["choicesde"][6]="Guam";
$elem["localechooser/countrylist/Oceania"]["choicesde"][7]="Kiribati";
$elem["localechooser/countrylist/Oceania"]["choicesde"][8]="Marshallinseln";
$elem["localechooser/countrylist/Oceania"]["choicesde"][9]="Mikronesien\";
$elem["localechooser/countrylist/Oceania"]["choicesde"][10]="Föderierte Staaten von";
$elem["localechooser/countrylist/Oceania"]["choicesde"][11]="Nauru";
$elem["localechooser/countrylist/Oceania"]["choicesde"][12]="Neukaledonien";
$elem["localechooser/countrylist/Oceania"]["choicesde"][13]="Neuseeland";
$elem["localechooser/countrylist/Oceania"]["choicesde"][14]="Niue";
$elem["localechooser/countrylist/Oceania"]["choicesde"][15]="Norfolkinsel";
$elem["localechooser/countrylist/Oceania"]["choicesde"][16]="Nördliche Mariana-Inseln";
$elem["localechooser/countrylist/Oceania"]["choicesde"][17]="Palau";
$elem["localechooser/countrylist/Oceania"]["choicesde"][18]="Papua-Neuguinea";
$elem["localechooser/countrylist/Oceania"]["choicesde"][19]="Pitcairn";
$elem["localechooser/countrylist/Oceania"]["choicesde"][20]="Samoa";
$elem["localechooser/countrylist/Oceania"]["choicesde"][21]="Salomoninseln";
$elem["localechooser/countrylist/Oceania"]["choicesde"][22]="Tokelau";
$elem["localechooser/countrylist/Oceania"]["choicesde"][23]="Tonga";
$elem["localechooser/countrylist/Oceania"]["choicesde"][24]="Tuvalu";
$elem["localechooser/countrylist/Oceania"]["choicesde"][25]="United States Minor Outlying Islands";
$elem["localechooser/countrylist/Oceania"]["choicesde"][26]="Vanuatu";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][1]="Samoa américaines";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][2]="Australie";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][3]="Cook\";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][4]="Îles";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][5]="Fidji";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][6]="Polynésie française";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][7]="Guam";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][8]="Kiribati";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][9]="Îles Marshall";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][10]="Micronésie\";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][11]="États fédérés de";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][12]="Nauru";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][13]="Nouvelle-Calédonie";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][14]="Nouvelle-Zélande";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][15]="Nioue";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][16]="Norfolk\";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][17]="Île";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][18]="Mariannes du Nord\";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][19]="Îles";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][20]="Palaos";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][21]="Papouasie-Nouvelle-Guinée";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][22]="Pitcairn";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][23]="Samoa";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][24]="Salomon\";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][25]="Îles";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][26]="Tokelau";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][27]="Tonga";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][28]="Tuvalu";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][29]="Îles mineures éloignées des États-Unis d'Amérique";
$elem["localechooser/countrylist/Oceania"]["choicesfr"][30]="Vanuatu";
$elem["localechooser/countrylist/Oceania"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/Oceania"]["descriptionde"]="";
$elem["localechooser/countrylist/Oceania"]["descriptionfr"]="";
$elem["localechooser/countrylist/Oceania"]["default"]="";
$elem["localechooser/countrylist/South_America"]["type"]="select";
$elem["localechooser/countrylist/South_America"]["choices"][1]="Argentina";
$elem["localechooser/countrylist/South_America"]["choices"][2]="Bolivia";
$elem["localechooser/countrylist/South_America"]["choices"][3]="Brazil";
$elem["localechooser/countrylist/South_America"]["choices"][4]="Chile";
$elem["localechooser/countrylist/South_America"]["choices"][5]="Colombia";
$elem["localechooser/countrylist/South_America"]["choices"][6]="Ecuador";
$elem["localechooser/countrylist/South_America"]["choices"][7]="French Guiana";
$elem["localechooser/countrylist/South_America"]["choices"][8]="Guyana";
$elem["localechooser/countrylist/South_America"]["choices"][9]="Paraguay";
$elem["localechooser/countrylist/South_America"]["choices"][10]="Peru";
$elem["localechooser/countrylist/South_America"]["choices"][11]="Suriname";
$elem["localechooser/countrylist/South_America"]["choices"][12]="Uruguay";
$elem["localechooser/countrylist/South_America"]["choicesde"][1]="Argentinien";
$elem["localechooser/countrylist/South_America"]["choicesde"][2]="Bolivien";
$elem["localechooser/countrylist/South_America"]["choicesde"][3]="Brasilien";
$elem["localechooser/countrylist/South_America"]["choicesde"][4]="Chile";
$elem["localechooser/countrylist/South_America"]["choicesde"][5]="Kolumbien";
$elem["localechooser/countrylist/South_America"]["choicesde"][6]="Ecuador";
$elem["localechooser/countrylist/South_America"]["choicesde"][7]="Französisch-Guyana";
$elem["localechooser/countrylist/South_America"]["choicesde"][8]="Guyana";
$elem["localechooser/countrylist/South_America"]["choicesde"][9]="Paraguay";
$elem["localechooser/countrylist/South_America"]["choicesde"][10]="Peru";
$elem["localechooser/countrylist/South_America"]["choicesde"][11]="Suriname";
$elem["localechooser/countrylist/South_America"]["choicesde"][12]="Uruguay";
$elem["localechooser/countrylist/South_America"]["choicesfr"][1]="Argentine";
$elem["localechooser/countrylist/South_America"]["choicesfr"][2]="Bolivie";
$elem["localechooser/countrylist/South_America"]["choicesfr"][3]="Brésil";
$elem["localechooser/countrylist/South_America"]["choicesfr"][4]="Chili";
$elem["localechooser/countrylist/South_America"]["choicesfr"][5]="Colombie";
$elem["localechooser/countrylist/South_America"]["choicesfr"][6]="Équateur";
$elem["localechooser/countrylist/South_America"]["choicesfr"][7]="Guyane française";
$elem["localechooser/countrylist/South_America"]["choicesfr"][8]="Guyana";
$elem["localechooser/countrylist/South_America"]["choicesfr"][9]="Paraguay";
$elem["localechooser/countrylist/South_America"]["choicesfr"][10]="Pérou";
$elem["localechooser/countrylist/South_America"]["choicesfr"][11]="Surinam";
$elem["localechooser/countrylist/South_America"]["choicesfr"][12]="Uruguay";
$elem["localechooser/countrylist/South_America"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/South_America"]["descriptionde"]="";
$elem["localechooser/countrylist/South_America"]["descriptionfr"]="";
$elem["localechooser/countrylist/South_America"]["default"]="";
$elem["localechooser/countrylist/other"]["type"]="select";
$elem["localechooser/countrylist/other"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/countrylist/other"]["descriptionde"]="";
$elem["localechooser/countrylist/other"]["descriptionfr"]="";
$elem["localechooser/countrylist/other"]["default"]="";
$elem["localechooser/continentlist"]["type"]="select";
$elem["localechooser/continentlist"]["choices"][1]="Africa";
$elem["localechooser/continentlist"]["choices"][2]="Antarctica";
$elem["localechooser/continentlist"]["choices"][3]="Asia";
$elem["localechooser/continentlist"]["choices"][4]="Atlantic Ocean";
$elem["localechooser/continentlist"]["choices"][5]="Caribbean";
$elem["localechooser/continentlist"]["choices"][6]="Central America";
$elem["localechooser/continentlist"]["choices"][7]="Europe";
$elem["localechooser/continentlist"]["choices"][8]="Indian Ocean";
$elem["localechooser/continentlist"]["choices"][9]="North America";
$elem["localechooser/continentlist"]["choices"][10]="Oceania";
$elem["localechooser/continentlist"]["choices"][11]="South America";
$elem["localechooser/continentlist"]["choicesde"][1]="Afrika";
$elem["localechooser/continentlist"]["choicesde"][2]="Antarktis";
$elem["localechooser/continentlist"]["choicesde"][3]="Asien";
$elem["localechooser/continentlist"]["choicesde"][4]="Atlantischer Ozean";
$elem["localechooser/continentlist"]["choicesde"][5]="Karibik";
$elem["localechooser/continentlist"]["choicesde"][6]="Mittelamerika";
$elem["localechooser/continentlist"]["choicesde"][7]="Europa";
$elem["localechooser/continentlist"]["choicesde"][8]="Indischer Ozean";
$elem["localechooser/continentlist"]["choicesde"][9]="Nordamerika";
$elem["localechooser/continentlist"]["choicesde"][10]="Ozeanien";
$elem["localechooser/continentlist"]["choicesde"][11]="Südamerika";
$elem["localechooser/continentlist"]["choicesfr"][1]="Afrique";
$elem["localechooser/continentlist"]["choicesfr"][2]="Antarctique";
$elem["localechooser/continentlist"]["choicesfr"][3]="Asie";
$elem["localechooser/continentlist"]["choicesfr"][4]="Océan Atlantique";
$elem["localechooser/continentlist"]["choicesfr"][5]="Caraïbes";
$elem["localechooser/continentlist"]["choicesfr"][6]="Amérique Centrale";
$elem["localechooser/continentlist"]["choicesfr"][7]="Europe";
$elem["localechooser/continentlist"]["choicesfr"][8]="Océan Indien";
$elem["localechooser/continentlist"]["choicesfr"][9]="Amérique du Nord";
$elem["localechooser/continentlist"]["choicesfr"][10]="Océanie";
$elem["localechooser/continentlist"]["choicesfr"][11]="Amérique du Sud";
$elem["localechooser/continentlist"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/continentlist"]["descriptionde"]="";
$elem["localechooser/continentlist"]["descriptionfr"]="";
$elem["localechooser/continentlist"]["default"]="";
$elem["localechooser/shortlist/ar"]["type"]="select";
$elem["localechooser/shortlist/ar"]["choices"][1]="South Sudan";
$elem["localechooser/shortlist/ar"]["choices"][2]="Jordan";
$elem["localechooser/shortlist/ar"]["choices"][3]="United Arab Emirates";
$elem["localechooser/shortlist/ar"]["choices"][4]="Bahrain";
$elem["localechooser/shortlist/ar"]["choices"][5]="Algeria";
$elem["localechooser/shortlist/ar"]["choices"][6]="Syrian Arab Republic";
$elem["localechooser/shortlist/ar"]["choices"][7]="Saudi Arabia";
$elem["localechooser/shortlist/ar"]["choices"][8]="Sudan";
$elem["localechooser/shortlist/ar"]["choices"][9]="Iraq";
$elem["localechooser/shortlist/ar"]["choices"][10]="Kuwait";
$elem["localechooser/shortlist/ar"]["choices"][11]="Morocco";
$elem["localechooser/shortlist/ar"]["choices"][12]="India";
$elem["localechooser/shortlist/ar"]["choices"][13]="Yemen";
$elem["localechooser/shortlist/ar"]["choices"][14]="Tunisia";
$elem["localechooser/shortlist/ar"]["choices"][15]="Oman";
$elem["localechooser/shortlist/ar"]["choices"][16]="Qatar";
$elem["localechooser/shortlist/ar"]["choices"][17]="Lebanon";
$elem["localechooser/shortlist/ar"]["choices"][18]="Libya";
$elem["localechooser/shortlist/ar"]["choices"][19]="Egypt";
$elem["localechooser/shortlist/ar"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/ar"]["descriptionde"]="";
$elem["localechooser/shortlist/ar"]["descriptionfr"]="";
$elem["localechooser/shortlist/ar"]["default"]="";
$elem["localechooser/shortlist/bn"]["type"]="select";
$elem["localechooser/shortlist/bn"]["choices"][1]="Bangladesh";
$elem["localechooser/shortlist/bn"]["choices"][2]="India";
$elem["localechooser/shortlist/bn"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/bn"]["descriptionde"]="";
$elem["localechooser/shortlist/bn"]["descriptionfr"]="";
$elem["localechooser/shortlist/bn"]["default"]="";
$elem["localechooser/shortlist/bo"]["type"]="select";
$elem["localechooser/shortlist/bo"]["choices"][1]="China";
$elem["localechooser/shortlist/bo"]["choices"][2]="India";
$elem["localechooser/shortlist/bo"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/bo"]["descriptionde"]="";
$elem["localechooser/shortlist/bo"]["descriptionfr"]="";
$elem["localechooser/shortlist/bo"]["default"]="";
$elem["localechooser/shortlist/ca"]["type"]="select";
$elem["localechooser/shortlist/ca"]["choices"][1]="Andorra";
$elem["localechooser/shortlist/ca"]["choices"][2]="Spain";
$elem["localechooser/shortlist/ca"]["choices"][3]="France";
$elem["localechooser/shortlist/ca"]["choices"][4]="Italy";
$elem["localechooser/shortlist/ca"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/ca"]["descriptionde"]="";
$elem["localechooser/shortlist/ca"]["descriptionfr"]="";
$elem["localechooser/shortlist/ca"]["default"]="";
$elem["localechooser/shortlist/de"]["type"]="select";
$elem["localechooser/shortlist/de"]["choices"][1]="Belgium";
$elem["localechooser/shortlist/de"]["choices"][2]="Germany";
$elem["localechooser/shortlist/de"]["choices"][3]="Liechtenstein";
$elem["localechooser/shortlist/de"]["choices"][4]="Luxembourg";
$elem["localechooser/shortlist/de"]["choices"][5]="Switzerland";
$elem["localechooser/shortlist/de"]["choices"][6]="Austria";
$elem["localechooser/shortlist/de"]["choicesde"][1]="Belgien";
$elem["localechooser/shortlist/de"]["choicesde"][2]="Deutschland";
$elem["localechooser/shortlist/de"]["choicesde"][3]="Liechtenstein";
$elem["localechooser/shortlist/de"]["choicesde"][4]="Luxemburg";
$elem["localechooser/shortlist/de"]["choicesde"][5]="Schweiz";
$elem["localechooser/shortlist/de"]["choicesde"][6]="Österreich";
$elem["localechooser/shortlist/de"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/de"]["descriptionde"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/shortlist/de"]["descriptionfr"]="";
$elem["localechooser/shortlist/de"]["default"]="";
$elem["localechooser/shortlist/el"]["type"]="select";
$elem["localechooser/shortlist/el"]["choices"][1]="Greece";
$elem["localechooser/shortlist/el"]["choices"][2]="Cyprus";
$elem["localechooser/shortlist/el"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/el"]["descriptionde"]="";
$elem["localechooser/shortlist/el"]["descriptionfr"]="";
$elem["localechooser/shortlist/el"]["default"]="";
$elem["localechooser/shortlist/en"]["type"]="select";
$elem["localechooser/shortlist/en"]["choices"][1]="Antigua and Barbuda";
$elem["localechooser/shortlist/en"]["choices"][2]="Australia";
$elem["localechooser/shortlist/en"]["choices"][3]="Botswana";
$elem["localechooser/shortlist/en"]["choices"][4]="Canada";
$elem["localechooser/shortlist/en"]["choices"][5]="Hong Kong";
$elem["localechooser/shortlist/en"]["choices"][6]="India";
$elem["localechooser/shortlist/en"]["choices"][7]="Ireland";
$elem["localechooser/shortlist/en"]["choices"][8]="New Zealand";
$elem["localechooser/shortlist/en"]["choices"][9]="Nigeria";
$elem["localechooser/shortlist/en"]["choices"][10]="Philippines";
$elem["localechooser/shortlist/en"]["choices"][11]="Singapore";
$elem["localechooser/shortlist/en"]["choices"][12]="South Africa";
$elem["localechooser/shortlist/en"]["choices"][13]="United Kingdom";
$elem["localechooser/shortlist/en"]["choices"][14]="United States";
$elem["localechooser/shortlist/en"]["choices"][15]="Zambia";
$elem["localechooser/shortlist/en"]["choices"][16]="Zimbabwe";
$elem["localechooser/shortlist/en"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/shortlist/en"]["descriptionde"]="";
$elem["localechooser/shortlist/en"]["descriptionfr"]="";
$elem["localechooser/shortlist/en"]["default"]="";
$elem["localechooser/shortlist/es"]["type"]="select";
$elem["localechooser/shortlist/es"]["choices"][1]="Argentina";
$elem["localechooser/shortlist/es"]["choices"][2]="Bolivia";
$elem["localechooser/shortlist/es"]["choices"][3]="Chile";
$elem["localechooser/shortlist/es"]["choices"][4]="Colombia";
$elem["localechooser/shortlist/es"]["choices"][5]="Costa Rica";
$elem["localechooser/shortlist/es"]["choices"][6]="Cuba";
$elem["localechooser/shortlist/es"]["choices"][7]="Ecuador";
$elem["localechooser/shortlist/es"]["choices"][8]="El Salvador";
$elem["localechooser/shortlist/es"]["choices"][9]="Spain";
$elem["localechooser/shortlist/es"]["choices"][10]="United States";
$elem["localechooser/shortlist/es"]["choices"][11]="Guatemala";
$elem["localechooser/shortlist/es"]["choices"][12]="Honduras";
$elem["localechooser/shortlist/es"]["choices"][13]="Mexico";
$elem["localechooser/shortlist/es"]["choices"][14]="Nicaragua";
$elem["localechooser/shortlist/es"]["choices"][15]="Panama";
$elem["localechooser/shortlist/es"]["choices"][16]="Paraguay";
$elem["localechooser/shortlist/es"]["choices"][17]="Peru";
$elem["localechooser/shortlist/es"]["choices"][18]="Puerto Rico";
$elem["localechooser/shortlist/es"]["choices"][19]="Dominican Republic";
$elem["localechooser/shortlist/es"]["choices"][20]="Uruguay";
$elem["localechooser/shortlist/es"]["choices"][21]="Venezuela";
$elem["localechooser/shortlist/es"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/es"]["descriptionde"]="";
$elem["localechooser/shortlist/es"]["descriptionfr"]="";
$elem["localechooser/shortlist/es"]["default"]="";
$elem["localechooser/shortlist/eu"]["type"]="select";
$elem["localechooser/shortlist/eu"]["choices"][1]="Spain";
$elem["localechooser/shortlist/eu"]["choices"][2]="France";
$elem["localechooser/shortlist/eu"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/eu"]["descriptionde"]="";
$elem["localechooser/shortlist/eu"]["descriptionfr"]="";
$elem["localechooser/shortlist/eu"]["default"]="";
$elem["localechooser/shortlist/fr"]["type"]="select";
$elem["localechooser/shortlist/fr"]["choices"][1]="Belgium";
$elem["localechooser/shortlist/fr"]["choices"][2]="Canada";
$elem["localechooser/shortlist/fr"]["choices"][3]="France";
$elem["localechooser/shortlist/fr"]["choices"][4]="Luxembourg";
$elem["localechooser/shortlist/fr"]["choices"][5]="Switzerland";
$elem["localechooser/shortlist/fr"]["choicesfr"][1]="Belgique";
$elem["localechooser/shortlist/fr"]["choicesfr"][2]="Canada";
$elem["localechooser/shortlist/fr"]["choicesfr"][3]="France";
$elem["localechooser/shortlist/fr"]["choicesfr"][4]="Luxembourg";
$elem["localechooser/shortlist/fr"]["choicesfr"][5]="Suisse";
$elem["localechooser/shortlist/fr"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/fr"]["descriptionde"]="";
$elem["localechooser/shortlist/fr"]["descriptionfr"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}

";
$elem["localechooser/shortlist/fr"]["default"]="";
$elem["localechooser/shortlist/it"]["type"]="select";
$elem["localechooser/shortlist/it"]["choices"][1]="Italy";
$elem["localechooser/shortlist/it"]["choices"][2]="Switzerland";
$elem["localechooser/shortlist/it"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/it"]["descriptionde"]="";
$elem["localechooser/shortlist/it"]["descriptionfr"]="";
$elem["localechooser/shortlist/it"]["default"]="";
$elem["localechooser/shortlist/nl"]["type"]="select";
$elem["localechooser/shortlist/nl"]["choices"][1]="Aruba";
$elem["localechooser/shortlist/nl"]["choices"][2]="Belgium";
$elem["localechooser/shortlist/nl"]["choices"][3]="Netherlands";
$elem["localechooser/shortlist/nl"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/nl"]["descriptionde"]="";
$elem["localechooser/shortlist/nl"]["descriptionfr"]="";
$elem["localechooser/shortlist/nl"]["default"]="";
$elem["localechooser/shortlist/pa"]["type"]="select";
$elem["localechooser/shortlist/pa"]["choices"][1]="Pakistan";
$elem["localechooser/shortlist/pa"]["choices"][2]="India";
$elem["localechooser/shortlist/pa"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/pa"]["descriptionde"]="";
$elem["localechooser/shortlist/pa"]["descriptionfr"]="";
$elem["localechooser/shortlist/pa"]["default"]="";
$elem["localechooser/shortlist/pt"]["type"]="select";
$elem["localechooser/shortlist/pt"]["choices"][1]="Brazil";
$elem["localechooser/shortlist/pt"]["choices"][2]="Portugal";
$elem["localechooser/shortlist/pt"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/pt"]["descriptionde"]="";
$elem["localechooser/shortlist/pt"]["descriptionfr"]="";
$elem["localechooser/shortlist/pt"]["default"]="";
$elem["localechooser/shortlist/pt_BR"]["type"]="select";
$elem["localechooser/shortlist/pt_BR"]["choices"][1]="Brazil";
$elem["localechooser/shortlist/pt_BR"]["choices"][2]="Portugal";
$elem["localechooser/shortlist/pt_BR"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/pt_BR"]["descriptionde"]="";
$elem["localechooser/shortlist/pt_BR"]["descriptionfr"]="";
$elem["localechooser/shortlist/pt_BR"]["default"]="";
$elem["localechooser/shortlist/ru"]["type"]="select";
$elem["localechooser/shortlist/ru"]["choices"][1]="Russian Federation";
$elem["localechooser/shortlist/ru"]["choices"][2]="Ukraine";
$elem["localechooser/shortlist/ru"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/ru"]["descriptionde"]="";
$elem["localechooser/shortlist/ru"]["descriptionfr"]="";
$elem["localechooser/shortlist/ru"]["default"]="";
$elem["localechooser/shortlist/sq"]["type"]="select";
$elem["localechooser/shortlist/sq"]["choices"][1]="Macedonia\";
$elem["localechooser/shortlist/sq"]["choices"][2]="Republic of";
$elem["localechooser/shortlist/sq"]["choices"][3]="Albania";
$elem["localechooser/shortlist/sq"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/sq"]["descriptionde"]="";
$elem["localechooser/shortlist/sq"]["descriptionfr"]="";
$elem["localechooser/shortlist/sq"]["default"]="";
$elem["localechooser/shortlist/sr"]["type"]="select";
$elem["localechooser/shortlist/sr"]["choices"][1]="Serbia";
$elem["localechooser/shortlist/sr"]["choices"][2]="Montenegro";
$elem["localechooser/shortlist/sr"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/sr"]["descriptionde"]="";
$elem["localechooser/shortlist/sr"]["descriptionfr"]="";
$elem["localechooser/shortlist/sr"]["default"]="";
$elem["localechooser/shortlist/sv"]["type"]="select";
$elem["localechooser/shortlist/sv"]["choices"][1]="Finland";
$elem["localechooser/shortlist/sv"]["choices"][2]="Sweden";
$elem["localechooser/shortlist/sv"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/sv"]["descriptionde"]="";
$elem["localechooser/shortlist/sv"]["descriptionfr"]="";
$elem["localechooser/shortlist/sv"]["default"]="";
$elem["localechooser/shortlist/ta"]["type"]="select";
$elem["localechooser/shortlist/ta"]["choices"][1]="India";
$elem["localechooser/shortlist/ta"]["choices"][2]="Sri Lanka";
$elem["localechooser/shortlist/ta"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/ta"]["descriptionde"]="";
$elem["localechooser/shortlist/ta"]["descriptionfr"]="";
$elem["localechooser/shortlist/ta"]["default"]="";
$elem["localechooser/shortlist/tr"]["type"]="select";
$elem["localechooser/shortlist/tr"]["choices"][1]="Cyprus";
$elem["localechooser/shortlist/tr"]["choices"][2]="Turkey";
$elem["localechooser/shortlist/tr"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/tr"]["descriptionde"]="";
$elem["localechooser/shortlist/tr"]["descriptionfr"]="";
$elem["localechooser/shortlist/tr"]["default"]="";
$elem["localechooser/shortlist/zh_CN"]["type"]="select";
$elem["localechooser/shortlist/zh_CN"]["choices"][1]="China";
$elem["localechooser/shortlist/zh_CN"]["choices"][2]="Taiwan";
$elem["localechooser/shortlist/zh_CN"]["choices"][3]="Singapore";
$elem["localechooser/shortlist/zh_CN"]["choices"][4]="Hong Kong";
$elem["localechooser/shortlist/zh_CN"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/zh_CN"]["descriptionde"]="";
$elem["localechooser/shortlist/zh_CN"]["descriptionfr"]="";
$elem["localechooser/shortlist/zh_CN"]["default"]="";
$elem["localechooser/shortlist/zh_TW"]["type"]="select";
$elem["localechooser/shortlist/zh_TW"]["choices"][1]="China";
$elem["localechooser/shortlist/zh_TW"]["choices"][2]="Singapore";
$elem["localechooser/shortlist/zh_TW"]["choices"][3]="Taiwan";
$elem["localechooser/shortlist/zh_TW"]["choices"][4]="Hong Kong";
$elem["localechooser/shortlist/zh_TW"]["description"]="${TXT1}
 ${TXT2}
 .
 ${TXT3}
";
$elem["localechooser/shortlist/zh_TW"]["descriptionde"]="";
$elem["localechooser/shortlist/zh_TW"]["descriptionfr"]="";
$elem["localechooser/shortlist/zh_TW"]["default"]="";
$elem["localechooser/translation/text/warn_incomplete/zh_CN"]["type"]="text";
$elem["localechooser/translation/text/warn_incomplete/zh_CN"]["description"]="这说明很可能某些对话框将会以繁体中文来显示，或者，如果那也不可用，则会以英文显示。

";
$elem["localechooser/translation/text/warn_incomplete/zh_CN"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_incomplete/zh_CN"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_incomplete/zh_CN"]["default"]="";
$elem["localechooser/translation/text/warn_normal-ok/zh_CN"]["type"]="text";
$elem["localechooser/translation/text/warn_normal-ok/zh_CN"]["description"]="如果您执行纯粹的默认安装以外的操作，有很大可能性某些对话框会以繁体中文显示，或者，如果那也不可用，则会以英文显示。

";
$elem["localechooser/translation/text/warn_normal-ok/zh_CN"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_normal-ok/zh_CN"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_normal-ok/zh_CN"]["default"]="";
$elem["localechooser/translation/text/warn_partial/zh_CN"]["type"]="text";
$elem["localechooser/translation/text/warn_partial/zh_CN"]["description"]="如果您继续使用所选语言安装，大部分对话框应该会正常显示，但是 - 特别是如果您使用安装程序中更高级的选项 - 部分内容可能会以繁体中文显示，或者，如果那也不可用，则会以英文显示。

";
$elem["localechooser/translation/text/warn_partial/zh_CN"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_partial/zh_CN"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_partial/zh_CN"]["default"]="";
$elem["localechooser/translation/text/warn_mostly-ok/zh_CN"]["type"]="text";
$elem["localechooser/translation/text/warn_mostly-ok/zh_CN"]["description"]="如果您继续以所选语言安装，对话框应该会正确显示，但是 - 特别是如果您使用安装程序中更高级的选项 - 有很小的可能性部分内容会以繁体中文显示，或者，如果那也不可用，则会以英文显示。

";
$elem["localechooser/translation/text/warn_mostly-ok/zh_CN"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_mostly-ok/zh_CN"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_mostly-ok/zh_CN"]["default"]="";
$elem["localechooser/translation/text/warn_incomplete/se_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_incomplete/se_NO"]["description"]="Dát máksá ahte muhton dialogat čájehuvvojit árvideames čájehuvvot eará gielain. Liigegielat leat: Girjedárogiella, ođđadárogiella, dánskkagiella, ruoŧŧagiella ja eŋgelasgiella.

";
$elem["localechooser/translation/text/warn_incomplete/se_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_incomplete/se_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_incomplete/se_NO"]["default"]="";
$elem["localechooser/translation/text/warn_normal-ok/se_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_normal-ok/se_NO"]["description"]="Jus dagat earágo standárdsajáiduhttima, de árvideames muhton dialogain čájehuvvot eará gillii go sámegiella. Liigegielat leat: Girjedárogiella, ođđadárogiella, dánskkagiella, ruoŧŧagiella ja eŋgelasgiella.

";
$elem["localechooser/translation/text/warn_normal-ok/se_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_normal-ok/se_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_normal-ok/se_NO"]["default"]="";
$elem["localechooser/translation/text/warn_partial/se_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_partial/se_NO"]["description"]="Jus joatkkát sajáiduhttima válljejuvvon gielain, eanáš dialogat čájehuvvot válljejuvvon gillii muhto - erenoamážit jus geavahat sajáiduhtti erenoamáš molssaeavttuid - de oainnát eará gielaid. Liigegielat leat: Girjedárogiella, ođđadárogiella, dánskkagiella, ruoŧŧagiella ja eŋgelasgiella.

";
$elem["localechooser/translation/text/warn_partial/se_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_partial/se_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_partial/se_NO"]["default"]="";
$elem["localechooser/translation/text/warn_mostly-ok/se_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_mostly-ok/se_NO"]["description"]="Jus joatkkát sajáiduhttima válljejuvvon gielain, eanáš dialogat čájehuvvot válljejuvvon gillii muhto - erenoamážit jus geavahat sajáiduhtti erenoamáš molssaeavttuid - de dáiddát oaidnit eará gielaid. Liigegielat leat: Girjedárogiella, ođđadárogiella, dánskkagiella, ruoŧŧagiella ja eŋgelasgiella.

";
$elem["localechooser/translation/text/warn_mostly-ok/se_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_mostly-ok/se_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_mostly-ok/se_NO"]["default"]="";
$elem["localechooser/translation/text/warn_incomplete/nb_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_incomplete/nb_NO"]["description"]="Dette betyr at det er en signifikant sjanse for at noen dialoger vil bli vist på et annet språk. Alternative språk (i prioritert rekkefølge): Nynorsk, dansk, svensk og engelsk.

";
$elem["localechooser/translation/text/warn_incomplete/nb_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_incomplete/nb_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_incomplete/nb_NO"]["default"]="";
$elem["localechooser/translation/text/warn_normal-ok/nb_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_normal-ok/nb_NO"]["description"]="Hvis du gjør noe som helst annet enn en standardinstallasjon, er det en reell sjanse for at noen dialoger vil bli vist på et annet språk. Alternative språk (i prioritert rekkefølge): Nynorsk, dansk, svensk og engelsk.

";
$elem["localechooser/translation/text/warn_normal-ok/nb_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_normal-ok/nb_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_normal-ok/nb_NO"]["default"]="";
$elem["localechooser/translation/text/warn_partial/nb_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_partial/nb_NO"]["description"]="Hvis du fortsetter installasjonen på det valgte språket, vil de fleste dialogene bli vist korrekt men noen kan bli vist på et annet språk (særlig hvis du bruker de mer avanserte valgene i installasjonsprogrammet). Alternative språk (i prioritert rekkefølge): Nynorsk, dansk, svensk og engelsk.

";
$elem["localechooser/translation/text/warn_partial/nb_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_partial/nb_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_partial/nb_NO"]["default"]="";
$elem["localechooser/translation/text/warn_mostly-ok/nb_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_mostly-ok/nb_NO"]["description"]="Hvis du fortsetter installasjonen på det valgte språket, vil de fleste dialogene bli vist korrekt men det er en liten sjanse for at noen kan bli vist på et annet språk (særlig hvis du bruker de mer avanserte valgene i installasjonsprogrammet). Alternative språk (i prioritert rekkefølge): Nynorsk, dansk, svensk og engelsk.

";
$elem["localechooser/translation/text/warn_mostly-ok/nb_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_mostly-ok/nb_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_mostly-ok/nb_NO"]["default"]="";
$elem["localechooser/translation/text/warn_incomplete/nn_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_incomplete/nn_NO"]["description"]="Dette betyr at det er stor sjangse for at nokre dialogtekstar vil bli synt på eit anna språk. Språk som tekstane kan falle tilbake på er (i prioritert rekkefølgje): Bokmål, Dansk, Svensk og Engelsk.

";
$elem["localechooser/translation/text/warn_incomplete/nn_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_incomplete/nn_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_incomplete/nn_NO"]["default"]="";
$elem["localechooser/translation/text/warn_normal-ok/nn_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_normal-ok/nn_NO"]["description"]="Viss du gjer andre ting enn berre ein standard installasjon, så er det ein god sjangse for at nokre dialogtekstar kan bli vist i eit anna språk. Språk som tekstane kan falle tilbake på er (i prioritert rekkefølgje): Bokmål, Dansk, Svensk og Engelsk.

";
$elem["localechooser/translation/text/warn_normal-ok/nn_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_normal-ok/nn_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_normal-ok/nn_NO"]["default"]="";
$elem["localechooser/translation/text/warn_partial/nn_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_partial/nn_NO"]["description"]="Viss du held fram med installasjonen i det valde språket, vil dei fleste dialogtekstar bli vist rett. Men nokre kan bli synt på eit anna språk, særleg viss du brukar avanserte funksjonar i installasjonsprogrammet. Språk som tekstane kan falle tilbake på er (i prioritert rekkefølgje): Bokmål, Dansk, Svensk og Engelsk.

";
$elem["localechooser/translation/text/warn_partial/nn_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_partial/nn_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_partial/nn_NO"]["default"]="";
$elem["localechooser/translation/text/warn_mostly-ok/nn_NO"]["type"]="text";
$elem["localechooser/translation/text/warn_mostly-ok/nn_NO"]["description"]="Viss du held fram med installasjonen på det valde språket, skal dialogtekstane vanlegvis bli synt rett. Men det er ein liten sjangse for at nokre kan bli synt i eit anna språk. Språk som tekstane kan falle tilbake på er (i prioritert rekkefølgje): Bokmål, Dansk, Svensk og Engelsk.

";
$elem["localechooser/translation/text/warn_mostly-ok/nn_NO"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_mostly-ok/nn_NO"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_mostly-ok/nn_NO"]["default"]="";
$elem["localechooser/translation/text/warn_incomplete/pt"]["type"]="text";
$elem["localechooser/translation/text/warn_incomplete/pt"]["description"]="Isto significa que há a hipótese que algumas das questões colocadas sejam mostradas em Português do Brasil ou, se também essa língua não estiver disponível, em Inglês.

";
$elem["localechooser/translation/text/warn_incomplete/pt"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_incomplete/pt"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_incomplete/pt"]["default"]="";
$elem["localechooser/translation/text/warn_normal-ok/pt"]["type"]="text";
$elem["localechooser/translation/text/warn_normal-ok/pt"]["description"]="Se fizer algo que não seja a simples instalação pré-definida, há a hipótese real de algumas das questões colocadas sejam mostradas em Português do Brasil ou, se esse idioma também não estiver disponível, em Inglês.

";
$elem["localechooser/translation/text/warn_normal-ok/pt"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_normal-ok/pt"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_normal-ok/pt"]["default"]="";
$elem["localechooser/translation/text/warn_partial/pt"]["type"]="text";
$elem["localechooser/translation/text/warn_partial/pt"]["description"]="Se continuar a instalação no idioma que escolheu, a maioria das questões colocadas deve ser mostrada correctamente mas - especialmente se usar as opções mais avançadas do instalador - algumas poderão ser mostradas em Português do Brasil ou, se esse idioma também não estiver disponível, em Inglês.

";
$elem["localechooser/translation/text/warn_partial/pt"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_partial/pt"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_partial/pt"]["default"]="";
$elem["localechooser/translation/text/warn_mostly-ok/pt"]["type"]="text";
$elem["localechooser/translation/text/warn_mostly-ok/pt"]["description"]="Se continuar a instalação no idioma que escolheu, as questões colocadas devem ser mostradas normalmente mas - especialmente se usar as opções mais avançadas do instalador - há a pequena hipótese que algumas possam ser mostradas em Português do Brasil ou, se esse idioma também não estiver disponível, em Inglês.

";
$elem["localechooser/translation/text/warn_mostly-ok/pt"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_mostly-ok/pt"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_mostly-ok/pt"]["default"]="";
$elem["localechooser/translation/text/warn_incomplete/pt_BR"]["type"]="text";
$elem["localechooser/translation/text/warn_incomplete/pt_BR"]["description"]="Isto significa que há uma chance expressiva de que alguns diálogos sejam exibidos em português ou, se este também não estiver disponível, em inglês.

";
$elem["localechooser/translation/text/warn_incomplete/pt_BR"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_incomplete/pt_BR"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_incomplete/pt_BR"]["default"]="";
$elem["localechooser/translation/text/warn_normal-ok/pt_BR"]["type"]="text";
$elem["localechooser/translation/text/warn_normal-ok/pt_BR"]["description"]="Se você faz qualquer coisa além de uma instalação padrão pura e simples, há uma chance real de que alguns diálogos sejam exibidos em português ou, se este também não estiver disponível, em inglês.

";
$elem["localechooser/translation/text/warn_normal-ok/pt_BR"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_normal-ok/pt_BR"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_normal-ok/pt_BR"]["default"]="";
$elem["localechooser/translation/text/warn_partial/pt_BR"]["type"]="text";
$elem["localechooser/translation/text/warn_partial/pt_BR"]["description"]="Se você continuar a instalação no idioma selecionado, a maioria dos diálogos deverá ser exibida corretamente mas - especialmente se você usa ao opções mais avançadas do instalador - alguns podem ser exibidos em português ou, se este também não estiver disponível, em inglês.

";
$elem["localechooser/translation/text/warn_partial/pt_BR"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_partial/pt_BR"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_partial/pt_BR"]["default"]="";
$elem["localechooser/translation/text/warn_mostly-ok/pt_BR"]["type"]="text";
$elem["localechooser/translation/text/warn_mostly-ok/pt_BR"]["description"]="Se você continuar a instalação no idioma selecionado, os diálogos deverão, normalmente, serem exibidos de forma correta mas - especialmente se você usa as opções mais avançadas do instalador - há uma pequena chance de que alguns sejam exibidos em português ou, se este também não estiver disponível, em inglês.

";
$elem["localechooser/translation/text/warn_mostly-ok/pt_BR"]["descriptionde"]="";
$elem["localechooser/translation/text/warn_mostly-ok/pt_BR"]["descriptionfr"]="";
$elem["localechooser/translation/text/warn_mostly-ok/pt_BR"]["default"]="";
$elem["netcfg/get_ipaddress"]["type"]="string";
$elem["netcfg/get_ipaddress"]["description"]="IP address:
 The IP address is unique to your computer and may be:
 .
  * four numbers separated by periods (IPv4);
  * blocks of hexadecimal characters separated by colons (IPv6).
 .
 You can also optionally append a CIDR netmask (such as \"/24\").
 .
 If you don't know what to use here, consult your network administrator.
";
$elem["netcfg/get_ipaddress"]["descriptionde"]="IP-Adresse:
 Die IP-Adresse ist für Ihren Rechner eindeutig und kann zwei verschiedene Formate haben:
 .
  * vier Zahlen, getrennt durch Punkte (IPv4);
  * Blöcke von hexadezimalen Zeichen, getrennt durch Doppelpunkte (IPv6).
 .
 Sie können auch optional eine CIDR-Netzmaske (wie z.B. »/24«) anfügen.
 .
 Wenn Sie nicht wissen, was Sie eingeben sollen, fragen Sie Ihren Netzwerk-Administrator.
";
$elem["netcfg/get_ipaddress"]["descriptionfr"]="Adresse IP :
 L'adresse IP est propre à une machine et peut être constituée de :
 .
  * quatre nombres séparés par des points (IPv4);
  * des blocs de caractères hexadécimaux séparés par le caractère
    « deux-points » (IPv6).
 .
 Il est également possible d'ajouter un masque de sous-réseau au format CIDR (par exemple « /24 »).
 .
 Si vous ne savez pas quoi indiquer, veuillez consulter l'administrateur de votre réseau.
";
$elem["netcfg/get_ipaddress"]["default"]="";
$elem["netcfg/bad_ipaddress"]["type"]="error";
$elem["netcfg/bad_ipaddress"]["description"]="Malformed IP address
 The IP address you provided is malformed. It should be in the form
 x.x.x.x where each 'x' is no larger than 255 (an IPv4 address), or a
 sequence of blocks of hexadecimal digits separated by colons (an IPv6
 address). Please try again.
";
$elem["netcfg/bad_ipaddress"]["descriptionde"]="Ungültige IP-Adresse
 Die von Ihnen angegebene IP-Adresse ist ungültig. Sie sollte entweder die Form x.x.x.x haben, wobei jedes »x« kleiner als 255 sein muss (als IPv4-Adresse), oder eine Folge von hexadezimalen Ziffern sein, getrennt durch Doppelpunkte (als IPv6-Adresse). Bitte versuchen Sie es noch einmal.
";
$elem["netcfg/bad_ipaddress"]["descriptionfr"]="Adresse IP mal formée
 L'adresse IP que vous avez donnée est mal formée. Son format doit être x.x.x.x où chaque x est inférieur ou égal à 255 (adresse IPv4) ou une séquence de blocs de caractères hexadécimaux séparés par des caractères « deux-points » (adresse IPv6). Veuillez réessayer.
";
$elem["netcfg/bad_ipaddress"]["default"]="";
$elem["netcfg/get_pointopoint"]["type"]="string";
$elem["netcfg/get_pointopoint"]["description"]="Point-to-point address:
 The point-to-point address is used to determine the other endpoint of the
 point to point network.  Consult your network administrator if you do not
 know the value.  The point-to-point address should be entered as four numbers
 separated by periods.
";
$elem["netcfg/get_pointopoint"]["descriptionde"]="Punkt-zu-Punkt-Adresse:
 Die Punkt-zu-Punkt-Adresse dient zur Festlegung des anderen Endpunkts des Punkt-zu-Punkt-Netzwerks. Wenn Sie die Adresse nicht kennen, fragen Sie Ihren Netzwerkadministrator. Die Punkt-zu-Punkt-Adresse sollte als Gruppe aus vier Zahlen, getrennt durch Punkte, eingegeben werden.
";
$elem["netcfg/get_pointopoint"]["descriptionfr"]="Adresse point-à-point :
 L'adresse point-à-point sert à déterminer le point terminal d'un réseau point-à-point. Si vous ne connaissez pas cette valeur, consultez votre administrateur. L'adresse point-à-point est une série de quatre nombres séparés par des points.
";
$elem["netcfg/get_pointopoint"]["default"]="";
$elem["netcfg/get_netmask"]["type"]="string";
$elem["netcfg/get_netmask"]["description"]="Netmask:
 The netmask is used to determine which machines are local to your
 network.  Consult your network administrator if you do not know the
 value.  The netmask should be entered as four numbers separated by
 periods.
";
$elem["netcfg/get_netmask"]["descriptionde"]="Netzmaske:
 Durch die Netzmaske kann bestimmt werden, welche Rechner im lokalen Netzwerk direkt angesprochen werden können. Wenn Sie diesen Wert nicht kennen, fragen Sie Ihren Netzwerkadministrator. Die Netzmaske besteht aus vier durch Punkte getrennte Zahlen.
";
$elem["netcfg/get_netmask"]["descriptionfr"]="Valeur du masque-réseau :
 Le masque-réseau sert à déterminer les machines locales du réseau. Si vous ne connaissez pas cette valeur, consultez votre administrateur. Le masque-réseau est une série de quatre nombres séparés par des points.
";
$elem["netcfg/get_netmask"]["default"]="";
$elem["netcfg/get_gateway"]["type"]="string";
$elem["netcfg/get_gateway"]["description"]="Gateway:
 The gateway is an IP address (four numbers separated by periods) that
 indicates the gateway router, also known as the default router.  All
 traffic that goes outside your LAN (for instance, to the Internet) is
 sent through this router.  In rare circumstances, you may have no
 router; in that case, you can leave this blank.  If you don't know
 the proper answer to this question, consult your network
 administrator.
";
$elem["netcfg/get_gateway"]["descriptionde"]="Gateway:
 Geben Sie hier die IP-Adresse (vier durch Punkte getrennte Zahlen) des Gateways ein, auch als Default-Router bekannt. Alle Daten zu Rechnern außerhalb Ihres LAN (zum Beispiel zum Internet) werden über diesen Router gesendet. In seltenen Fällen haben Sie keinen Router, in diesem Fall geben Sie hier einfach nichts ein. Wenn Sie die richtige Antwort hier nicht kennen, fragen Sie Ihren Netzwerkadministrator.
";
$elem["netcfg/get_gateway"]["descriptionfr"]="Passerelle :
 La passerelle est une adresse IP (quatre nombres séparés par des points) qui indique la machine qui joue le rôle de routeur ; cette machine est aussi appelée le routeur par défaut. Tout le trafic qui sort du réseau (p. ex. vers Internet) passe par ce routeur. Dans quelques rares circonstances, vous n'avez pas besoin de routeur. Si c'est le cas, vous pouvez laisser ce champ vide. Consultez votre administrateur si vous ne connaissez pas la réponse correcte à cette question.
";
$elem["netcfg/get_gateway"]["default"]="";
$elem["netcfg/gateway_unreachable"]["type"]="error";
$elem["netcfg/gateway_unreachable"]["description"]="Unreachable gateway
 The gateway address you entered is unreachable.
 .
 You may have made an error entering your IP address, netmask and/or
 gateway.
";
$elem["netcfg/gateway_unreachable"]["descriptionde"]="Gateway nicht erreichbar
 Das angegebene Gateway ist nicht erreichbar.
 .
 Sie haben vielleicht bei der Eingabe Ihrer IP-Adresse, der Netzmaske und/oder des Gateways einen Fehler gemacht.
";
$elem["netcfg/gateway_unreachable"]["descriptionfr"]="Passerelle inaccessible
 La passerelle indiquée n'est pas accessible.
 .
 Il se peut que vous ayez mal indiqué l'adresse IP, le masque-réseau ou la passerelle.
";
$elem["netcfg/gateway_unreachable"]["default"]="";
$elem["netcfg/no_ipv6_pointopoint"]["type"]="error";
$elem["netcfg/no_ipv6_pointopoint"]["description"]="IPv6 unsupported on point-to-point links
 IPv6 addresses cannot be configured on point-to-point links.  Please use an
 IPv4 address, or go back and select a different network interface.
";
$elem["netcfg/no_ipv6_pointopoint"]["descriptionde"]="IPv6 für Punkt-zu-Punkt-Verbindungen nicht unterstützt
 IPv6-Adressen können für Punkt-zu-Punkt-Verbindungen nicht konfiguriert werden. Bitte verwenden Sie eine IPv4-Adresse oder gehen Sie zurück und wählen Sie eine andere Netzwerk-Schnittstelle.
";
$elem["netcfg/no_ipv6_pointopoint"]["descriptionfr"]="Pas de gestion IPv6 sur les liaisons point à point
 Les adresses IPv6 ne peuvent pas être configurées sur les liaisons point à point. Veuillez utiliser une adresse IPv4 ou revenir en arrière et choisir une autre interface réseau.
";
$elem["netcfg/no_ipv6_pointopoint"]["default"]="";
$elem["netcfg/confirm_static"]["type"]="boolean";
$elem["netcfg/confirm_static"]["description"]="Is this information correct?
 Currently configured network parameters:
 .
  interface     = ${interface}
  ipaddress     = ${ipaddress}
  netmask       = ${netmask}
  gateway       = ${gateway}
  pointopoint   = ${pointopoint}
  nameservers   = ${nameservers}
";
$elem["netcfg/confirm_static"]["descriptionde"]="Sind diese Informationen richtig?
 Gegenwärtig konfigurierte Netzwerk-Parameter:
 .
  Schnittstelle  = ${interface}
  IP-Adresse     = ${ipaddress}
  Netzmaske      = ${netmask}
  Gateway        = ${gateway}
  pointopoint    = ${pointopoint}
  Nameserver     = ${nameservers}
";
$elem["netcfg/confirm_static"]["descriptionfr"]="Les informations suivantes sont-elles correctes ?
 Paramètres réseau actuels :
 .
   interface         = ${interface}
   adresse IP        = ${ipaddress}
   masque-réseau     = ${netmask}
   passerelle        = ${gateway}
   point-à-point     = ${pointopoint}
   serveurs de noms  = ${nameservers}
";
$elem["netcfg/confirm_static"]["default"]="true";
$elem["debian-installer/netcfg-static/title"]["type"]="text";
$elem["debian-installer/netcfg-static/title"]["description"]="Configure a network using static addressing
";
$elem["debian-installer/netcfg-static/title"]["descriptionde"]="Netzwerk unter Verwendung statischer Adressierung konfigurieren
";
$elem["debian-installer/netcfg-static/title"]["descriptionfr"]="Configurer manuellement le réseau
";
$elem["debian-installer/netcfg-static/title"]["default"]="";
$elem["netcfg/enable"]["type"]="boolean";
$elem["netcfg/enable"]["description"]="for internal use; can be preseeded
 Set to false to disable netcfg entirely via preseed.

";
$elem["netcfg/enable"]["descriptionde"]="";
$elem["netcfg/enable"]["descriptionfr"]="";
$elem["netcfg/enable"]["default"]="true";
$elem["netcfg/use_autoconfig"]["type"]="boolean";
$elem["netcfg/use_autoconfig"]["description"]="Auto-configure networking?
 Networking can be configured either by entering all the information
 manually, or by using DHCP (or a variety of IPv6-specific methods) to
 detect network settings automatically. If you choose to use
 autoconfiguration and the installer is unable to get a working
 configuration from the network, you will be given the opportunity to
 configure the network manually.
";
$elem["netcfg/use_autoconfig"]["descriptionde"]="Netzwerk automatisch einrichten?
 Das Netzwerk kann entweder durch manuelle Eingabe aller Informationen konfiguriert werden oder durch die Verwendung von DHCP (bzw. eine Variation IPv6-spezifischer Methoden), um die Netzwerkeinstellungen automatisch zu erfassen. Wenn Sie die automatische Konfiguration wählen und der Installer keine funktionierende Konfiguration vom Netzwerk empfangen kann, erhalten Sie die Möglichkeit, Ihr Netzwerk manuell zu konfigurieren.
";
$elem["netcfg/use_autoconfig"]["descriptionfr"]="Faut-il configurer le réseau automatiquement ?
 Pour configurer le réseau, on peut fournir soi-même toutes les informations ou utiliser DHCP (ou différentes méthodes propres à IPv6) pour déterminer automatiquement les réglages réseau. Si vous choisissez la configuration automatique et que le programme d'installation ne réussit pas à configurer correctement le réseau, vous aurez la possibilité d'effectuer une configuration manuelle.
";
$elem["netcfg/use_autoconfig"]["default"]="true";
$elem["netcfg/get_domain"]["type"]="string";
$elem["netcfg/get_domain"]["description"]="Domain name:
 The domain name is the part of your Internet address to the right of your
 host name.  It is often something that ends in .com, .net, .edu, or .org. 
 If you are setting up a home network, you can make something up, but make
 sure you use the same domain name on all your computers.
";
$elem["netcfg/get_domain"]["descriptionde"]="Domain-Name:
 Der Domain-Name ist der rechte Teil Ihrer Internetadresse nach Ihrem Rechnernamen. Er endet oft mit .de, .com, .net oder .org. Wenn Sie ein lokales Heimnetz aufbauen, ist es egal, was Sie angeben. Diese Information sollte dann aber auf allen Rechnern gleich sein.
";
$elem["netcfg/get_domain"]["descriptionfr"]="Domaine :
 Le domaine est la partie de l'adresse Internet qui est à la droite du nom de machine. Il se termine souvent par .com, .net, .edu, ou .org. Si vous paramétrez votre propre réseau, vous pouvez mettre ce que vous voulez mais assurez-vous d'employer le même nom sur toutes les machines.
";
$elem["netcfg/get_domain"]["default"]="";
$elem["netcfg/get_nameservers"]["type"]="string";
$elem["netcfg/get_nameservers"]["description"]="Name server addresses:
 The name servers are used to look up host names on the network.
 Please enter the IP addresses (not host names) of up to 3 name servers,
 separated by spaces. Do not use commas. The first name server in the list
 will be the first to be queried. If you don't want to use any name server,
 just leave this field blank.
";
$elem["netcfg/get_nameservers"]["descriptionde"]="Adresse des DNS-Servers:
 Nameserver (DNS-Server) werden benutzt, um Rechnernamen im Internet aufzulösen. Bitte geben Sie die IP-Adressen (nicht die Rechnernamen) von bis zu drei Nameservern getrennt durch Leerzeichen an. Benutzen Sie keine Kommata. Der erste Server in der Liste wird als erstes abgefragt. Wenn Sie keine Nameserver benutzen möchten, lassen Sie dieses Feld bitte einfach leer.
";
$elem["netcfg/get_nameservers"]["descriptionfr"]="Adresses des serveurs de noms :
 Les serveurs de noms servent à la recherche des noms d'hôtes sur le réseau. Veuillez donner leurs adresses IP (pas les noms des machines) ; vous pouvez inscrire au plus trois adresses, séparées par des espaces. N'utilisez pas de virgule. Le premier serveur indiqué sera interrogé en premier. Si vous ne voulez pas utiliser de serveur de noms, laissez ce champ vide.
";
$elem["netcfg/get_nameservers"]["default"]="";
$elem["netcfg/choose_interface"]["type"]="select";
$elem["netcfg/choose_interface"]["description"]="Primary network interface:
 Your system has multiple network interfaces. Choose the one to use as
 the primary network interface during the installation. If possible, the
 first connected network interface found has been selected.
";
$elem["netcfg/choose_interface"]["descriptionde"]="Primäre Netzwerk-Schnittstelle:
 Ihr System besitzt mehrere Netzwerk-Schnittstellen. Bitte wählen Sie die Schnittstelle (Netzwerkkarte), die für die Installation genutzt werden soll. Falls möglich, wurde die erste angeschlossene Schnittstelle ausgewählt.
";
$elem["netcfg/choose_interface"]["descriptionfr"]="Interface réseau principale :
 Le système possède plusieurs interfaces réseau. Choisissez celle que vous voulez utiliser comme interface principale pour l'installation. Si possible, la première interface réseau connectée a déjà été choisie.
";
$elem["netcfg/choose_interface"]["default"]="";
$elem["netcfg/wireless_essid"]["type"]="string";
$elem["netcfg/wireless_essid"]["description"]="Wireless ESSID for ${iface}:
 ${iface} is a wireless network interface. Please enter the name (the ESSID)
 of the wireless network you would like ${iface} to use. If you would like
 to use any available network, leave this field blank.
";
$elem["netcfg/wireless_essid"]["descriptionde"]="ESSID für ${iface}:
 ${iface} ist eine drahtlose Netzwerk-Schnittstelle. Bitte geben Sie den Namen (die ESSID) des drahtlosen Netzwerks an, das ${iface} verwenden soll. Möchten Sie sich nicht festlegen, so lassen Sie dieses Feld leer.
";
$elem["netcfg/wireless_essid"]["descriptionfr"]="Nom (ESSID) du réseau sans fil pour ${iface} :
 ${iface} est l'interface d'un réseau sans fil. Veuillez indiquer le nom (ESSID) de ce réseau sans fil pour pouvoir utiliser ${iface}. Si vous voulez utiliser un autre réseau, laissez ce champ vide.
";
$elem["netcfg/wireless_essid"]["default"]="";
$elem["netcfg/wireless_essid_again"]["type"]="string";
$elem["netcfg/wireless_essid_again"]["description"]="Wireless ESSID for ${iface}:
 Attempting to find an available wireless network failed.
 .
 ${iface} is a wireless network interface. Please enter the name (the ESSID)
 of the wireless network you would like ${iface} to use. To connect to any
 available network, leave this field blank.
";
$elem["netcfg/wireless_essid_again"]["descriptionde"]="ESSID für ${iface}:
 Der Versuch, ein verfügbares drahtloses Netzwerk zu finden, ist fehlgeschlagen.
 .
 ${iface} ist eine Schnittstelle für drahtloses Netzwerk (WLAN). Bitte geben Sie den Namen (die ESSID) des drahtlosen Netzwerks an, das ${iface} verwenden soll. Um sich mit irgendeinem der derzeit bei Ihnen verfügbaren Netzwerke zu verbinden, lassen Sie dieses Feld leer.
";
$elem["netcfg/wireless_essid_again"]["descriptionfr"]="Nom (ESSID) du réseau sans fil pour ${iface} :
 La recherche d'un réseau sans fil disponible a échoué.
 .
 ${iface} est l'interface d'un réseau sans fil. Veuillez indiquer le nom (ESSID) de ce réseau sans fil pour pouvoir utiliser ${iface}. Si vous voulez utiliser n'importe quel réseau disponible, laissez ce champ vide.
";
$elem["netcfg/wireless_essid_again"]["default"]="";
$elem["netcfg/wireless_security_type"]["type"]="select";
$elem["netcfg/wireless_security_type"]["choices"][1]="WEP/Open Network";
$elem["netcfg/wireless_security_type"]["choicesde"][1]="WEP/Offenes Netzwerk";
$elem["netcfg/wireless_security_type"]["choicesfr"][1]="Réseau ouvert ou WEP";
$elem["netcfg/wireless_security_type"]["description"]="Wireless network type for ${iface}:
 Choose WEP/Open if the network is open or secured with WEP.
 Choose WPA/WPA2 if the network is protected with WPA/WPA2 PSK
 (Pre-Shared Key).
";
$elem["netcfg/wireless_security_type"]["descriptionde"]="Typ des drahtlosen Netzwerks (WLAN) für ${iface}:
 Wählen Sie »WEP/Offenes Netzwerk«, wenn das Netzwerk unverschlüsselt oder mit WEP gesichert ist. Wählen Sie »WPA/WPA2 PSK«, wenn das Netzwerk mit WPA/WPA2 Pre-Shared Key geschützt ist.
";
$elem["netcfg/wireless_security_type"]["descriptionfr"]="Type du réseau sans fil pour ${iface} :
 Veuillez choisir « Réseau ouvert ou WEP » si le réseau n'est pas protégé par une clé de chiffrement ou s'il est chiffré avec la méthode WEP. Choisissez « WPA/WPA2 » s'il est chiffré avec la méthode « WPA/WPA2 PSK » (« Pre-Shared Key » ou clé partagée).
";
$elem["netcfg/wireless_security_type"]["default"]="wpa";
$elem["netcfg/wireless_wep"]["type"]="string";
$elem["netcfg/wireless_wep"]["description"]="WEP key for wireless device ${iface}:
 If applicable, please enter the WEP security key for the wireless
 device ${iface}. There are two ways to do this:
 .
 If your WEP key is in the format 'nnnn-nnnn-nn', 'nn:nn:nn:nn:nn:nn:nn:nn',
 or 'nnnnnnnn', where n is a number, just enter it as it is into this field.
 .
 If your WEP key is in the format of a passphrase, prefix it with 's:'
 (without quotes).
 .
 Of course, if there is no WEP key for your wireless network, leave this
 field blank.
";
$elem["netcfg/wireless_wep"]["descriptionde"]="WEP-Schlüssel für drahtloses Netzwerkgerät ${iface}:
 Falls notwendig geben Sie den WEP-Schlüssel für das Gerät ${iface} ein. Dazu gibt es zwei Möglichkeiten:
 .
 Wenn Ihr WEP-Schlüssel das Format »nnnn-nnnn-nn«, »nn:nn:nn:nn:nn:nn:nn:nn « oder »nnnnnnnn« hat, wobei n eine Ziffer ist, geben Sie ihn einfach - wie er ist - in dieses Feld ein.
 .
 Wenn Ihr WEP-Schlüssel eine Passphrase ist, stellen Sie dieser ein »s:« (ohne die Anführungszeichen) voran.
 .
 Falls es für Ihr drahtloses Netzwerk keinen WEP-Schlüssel gibt, lassen Sie dieses Feld leer.
";
$elem["netcfg/wireless_wep"]["descriptionfr"]="Clé WEP pour le périphérique sans fil ${iface} :
 Si nécessaire, veuillez indiquer la clé de sécurité WEP pour le périphérique sans fil ${iface}. Il y a deux façons de le faire :
 .
 Si le format de la clé WEP est « nnnn-nnnn-nn », « nn:nn:nn:nn:nn:nn:nn:nn » ou « nnnnnnnn », avec n égal à un nombre, il suffit de l'indiquer tel quel dans le champ.
 .
 Si le format de la clé est une phrase secrète, préfixez-la avec « s: ».
 .
 Bien sûr, si le réseau sans fil ne possède pas de clé WEP, laissez ce champ vide.
";
$elem["netcfg/wireless_wep"]["default"]="";
$elem["netcfg/invalid_wep"]["type"]="error";
$elem["netcfg/invalid_wep"]["description"]="Invalid WEP key
 The WEP key '${wepkey}' is invalid. Please refer to the instructions on
 the next screen carefully on how to enter your WEP key correctly, and try
 again.
";
$elem["netcfg/invalid_wep"]["descriptionde"]="Ungültiger WEP-Schlüssel
 Der WEP-Schlüssel »${wepkey}« ist ungültig. Bitte beachten Sie die Anweisungen auf dem nächsten Bildschirm über die korrekte Eingabe des WEP-Schlüssels und versuchen Sie es noch einmal.
";
$elem["netcfg/invalid_wep"]["descriptionfr"]="Clé WEP non valable
 La clé WEP ${wepkey} n'est pas valable. Veuillez consulter attentivement les instructions contenues dans le prochain écran sur la manière d'indiquer correctement une clé WEP et réessayez.
";
$elem["netcfg/invalid_wep"]["default"]="";
$elem["netcfg/invalid_pass"]["type"]="error";
$elem["netcfg/invalid_pass"]["description"]="Invalid passphrase
 The WPA/WPA2 PSK passphrase was either too long (more than 64 characters)
 or too short (less than 8 characters).
";
$elem["netcfg/invalid_pass"]["descriptionde"]="Ungültige Passphrase
 Die WPA/WPA2 PSK-Passphrase war entweder zu lang (mehr als 64 Zeichen) oder zu kurz (weniger als 8 Zeichen).
";
$elem["netcfg/invalid_pass"]["descriptionfr"]="Phrase secrète non valable
 La phrase secrète WPA/WPA2 PSK est soit trop longue (plus de 64 caractères), soit trop courte (moins de 8 caractères).
";
$elem["netcfg/invalid_pass"]["default"]="";
$elem["netcfg/wireless_wpa"]["type"]="string";
$elem["netcfg/wireless_wpa"]["description"]="WPA/WPA2 passphrase for wireless device ${iface}:
 Enter the passphrase for WPA/WPA2 PSK authentication. This should be the
 passphrase defined for the wireless network you are trying to use.
";
$elem["netcfg/wireless_wpa"]["descriptionde"]="WPA-Passphrase für drahtloses Netzwerkgerät ${iface}:
 Geben Sie die Passphrase für die WPA/WPA2 PSK-Authentifizierung ein. Dies sollte die Passphrase für das Drahtlos-Netz sein, das Sie versuchen zu verwenden.
";
$elem["netcfg/wireless_wpa"]["descriptionfr"]="Phrase secrète WPA/WPA2 pour le périphérique sans fil ${iface} :
 Veuillez indiquer la phrase secrète pour l'authentification WPA/WPA2 PSK. Cela doit être la phrase secrète établie pour le réseau sans fil que vous souhaitez utiliser.
";
$elem["netcfg/wireless_wpa"]["default"]="";
$elem["netcfg/invalid_essid"]["type"]="error";
$elem["netcfg/invalid_essid"]["description"]="Invalid ESSID
 The ESSID \"${essid}\" is invalid. ESSIDs may only be up to ${max_essid_len}
 characters, but may contain all kinds of characters.
";
$elem["netcfg/invalid_essid"]["descriptionde"]="Ungültige ESSID
 Die ESSID »${essid}« ist ungültig. ESSIDs dürfen bis zu ${max_essid_len} Zeichen lang sein, können aber alle Arten von Zeichen enthalten.
";
$elem["netcfg/invalid_essid"]["descriptionfr"]="Nom (ESSID) non valable
 Le nom « ${essid} » n'est pas valable. Les ESSID ne doivent pas dépasser ${max_essid_len} caractères, mais ils peuvent contenir toutes sortes de caractères.
";
$elem["netcfg/invalid_essid"]["default"]="";
$elem["netcfg/wpa_progress"]["type"]="text";
$elem["netcfg/wpa_progress"]["description"]="Attempting to exchange keys with the access point...
";
$elem["netcfg/wpa_progress"]["descriptionde"]="Versuch des Schlüsselaustauschs mit dem Access-Point ...
";
$elem["netcfg/wpa_progress"]["descriptionfr"]="Tentative d'échange des clés avec le point d'accès sans fil...
";
$elem["netcfg/wpa_progress"]["default"]="";
$elem["netcfg/wpa_progress_note"]["type"]="text";
$elem["netcfg/wpa_progress_note"]["description"]="This may take some time.
";
$elem["netcfg/wpa_progress_note"]["descriptionde"]="Dies kann einige Zeit dauern.
";
$elem["netcfg/wpa_progress_note"]["descriptionfr"]="Cette opération peut prendre du temps.
";
$elem["netcfg/wpa_progress_note"]["default"]="";
$elem["netcfg/wpa_success_note"]["type"]="text";
$elem["netcfg/wpa_success_note"]["description"]="WPA/WPA2 connection succeeded
";
$elem["netcfg/wpa_success_note"]["descriptionde"]="WPA-Verbindung erfolgreich hergestellt
";
$elem["netcfg/wpa_success_note"]["descriptionfr"]="Connexion WPA/WPA2 réussie
";
$elem["netcfg/wpa_success_note"]["default"]="";
$elem["netcfg/wpa_supplicant_failed"]["type"]="note";
$elem["netcfg/wpa_supplicant_failed"]["description"]="Failure of key exchange and association
 The exchange of keys and association with the access point failed.
 Please check the WPA/WPA2 parameters you provided.
";
$elem["netcfg/wpa_supplicant_failed"]["descriptionde"]="Schlüsselaustausch und Verbindung fehlgeschlagen
 Der Schlüsselaustausch und die Verbindung mit dem Access-Point ist fehlgeschlagen. Bitte überprüfen Sie die WPA-Parameter, die Sie eingegeben haben.
";
$elem["netcfg/wpa_supplicant_failed"]["descriptionfr"]="Échec de l'échange des clés et de l'association
 L'échange de clés et l'association avec le point d'accès sans fil ont échoué. Veuillez vérifier les paramètres WPA/WPA2 que vous avez fournis.
";
$elem["netcfg/wpa_supplicant_failed"]["default"]="";
$elem["netcfg/get_hostname"]["type"]="string";
$elem["netcfg/get_hostname"]["description"]="Hostname:
 Please enter the hostname for this system.
 .
 The hostname is a single word that identifies your system to the network.
 If you don't know what your hostname should be, consult your network
 administrator. If you are setting up your own home network, you can make
 something up here.
";
$elem["netcfg/get_hostname"]["descriptionde"]="Rechnername:
 Bitte geben Sie den Namen dieses Rechners ein.
 .
 Der Rechnername ist ein einzelnes Wort, das Ihren Rechner im Netzwerk identifiziert. Wenn Sie Ihren Rechnernamen nicht kennen, fragen Sie den Netzwerkadministrator. Wenn Sie ein lokales Heimnetz aufbauen, ist es egal, was Sie angeben.
";
$elem["netcfg/get_hostname"]["descriptionfr"]="Nom de machine :
 Veuillez indiquer le nom de ce système.
 .
 Le nom de machine est un mot unique qui identifie le système sur le réseau. Si vous ne connaissez pas ce nom, demandez-le à votre administrateur réseau. Si vous installez votre propre réseau, vous pouvez mettre ce que vous voulez.
";
$elem["netcfg/get_hostname"]["default"]="ubuntu";
$elem["netcfg/hostname"]["type"]="string";
$elem["netcfg/hostname"]["description"]="for internal use; can be preseeded
 Hostname to set for the system; ignores names provided by DHCP or DNS.

";
$elem["netcfg/hostname"]["descriptionde"]="";
$elem["netcfg/hostname"]["descriptionfr"]="";
$elem["netcfg/hostname"]["default"]="";
$elem["netcfg/invalid_hostname"]["type"]="error";
$elem["netcfg/invalid_hostname"]["description"]="Invalid hostname
 The name \"${hostname}\" is invalid.
 .
 A valid hostname may contain only the numbers 0-9, upper and lowercase
 letters (A-Z and a-z), and the minus sign. It must be at most
 ${maxhostnamelen} characters long, and may not begin or end with a minus
 sign.
";
$elem["netcfg/invalid_hostname"]["descriptionde"]="Ungültiger Rechnername
 Der Rechnername »${hostname}« ist ungültig.
 .
 Ein gültiger Rechnername darf nur Groß- oder Kleinbuchstaben (A - Z, a - z), Zahlen (0 - 9) sowie Minuszeichen enthalten. Er darf maximal ${maxhostnamelen} Zeichen lang sein und nicht mit einem Minus beginnen oder enden.
";
$elem["netcfg/invalid_hostname"]["descriptionfr"]="Nom de machine non valable
 Le nom « ${hostname} » n'est pas valable.
 .
 Un nom valable ne peut contenir que les chiffres 0-9, des lettres minuscules ou majuscules (A-Z et a-z) et le signe moins ; sa longueur ne doit pas être supérieure à ${maxhostnamelen} caractères et il ne peut ni commencer ni finir par un signe moins.
";
$elem["netcfg/invalid_hostname"]["default"]="";
$elem["netcfg/error"]["type"]="error";
$elem["netcfg/error"]["description"]="Error
 An error occurred and the network configuration process has been aborted.
 You may retry it from the installation main menu.
";
$elem["netcfg/error"]["descriptionde"]="Fehler
 Es ist ein Fehler aufgetreten und der Netzwerk-Konfigurationsprozess wurde abgebrochen. Sie können es vom Installationshauptmenü aus noch einmal versuchen.
";
$elem["netcfg/error"]["descriptionfr"]="Erreur
 Une erreur s'est produite et le processus de configuration du réseau a été abandonné. Vous pouvez le reprendre à partir du menu principal du programme d'installation.
";
$elem["netcfg/error"]["default"]="";
$elem["netcfg/no_interfaces"]["type"]="error";
$elem["netcfg/no_interfaces"]["description"]="No network interfaces detected
 No network interfaces were found. The installation
 system was unable to find a network device.
 .
 You may need to load a specific module for your network card, if you have
 one. For this, go back to the network hardware detection step.
";
$elem["netcfg/no_interfaces"]["descriptionde"]="Es wurde keine Netzwerk-Schnittstelle gefunden
 Es wurde keine Netzwerk-Schnittstelle gefunden. Vom Installationssystem konnte keine Netzwerkkarte erkannt werden.
 .
 Es ist möglich, dass zunächst ein Kernel-Modul für Ihre Netzwerkkarte geladen werden muss. Gehen Sie dazu zum Schritt »Netzwerk-Hardware erkennen« zurück.
";
$elem["netcfg/no_interfaces"]["descriptionfr"]="Aucune interface réseau n'a été détectée
 Aucune interface réseau n'a été détectée. Le système d'installation n'a pu trouver aucun périphérique réseau.
 .
 Vous devez sans doute charger un module spécifique à la carte réseau - si vous en avez une. Pour cela, revenez à l'étape de détection du matériel réseau.
";
$elem["netcfg/no_interfaces"]["default"]="";
$elem["netcfg/kill_switch_enabled"]["type"]="note";
$elem["netcfg/kill_switch_enabled"]["description"]="Kill switch enabled on ${iface}
 ${iface} appears to have been disabled by means of a physical \"kill
 switch\". If you intend to use this interface, please switch it on before
 continuing.
";
$elem["netcfg/kill_switch_enabled"]["descriptionde"]="${iface} durch Hardware-Schalter deaktiviert
 ${iface} scheint abgeschaltet worden zu sein. Beabsichtigen Sie diese Schnittstelle zu verwenden, dann schalten Sie sie bitte ein, bevor sie fortfahren.
";
$elem["netcfg/kill_switch_enabled"]["descriptionfr"]="« kill switch » activé sur ${iface}
 ${iface} semble avoir été désactivée par un paramètre matériel « kill switch ». Si vous voulez utiliser cette interface, veuillez changer ce paramètre avant de continuer.
";
$elem["netcfg/kill_switch_enabled"]["default"]="";
$elem["netcfg/wireless_adhoc_managed"]["type"]="select";
$elem["netcfg/wireless_adhoc_managed"]["choices"][1]="Infrastructure (Managed) network";
$elem["netcfg/wireless_adhoc_managed"]["choicesde"][1]="Infrastruktur-Netzwerk (Managed)";
$elem["netcfg/wireless_adhoc_managed"]["choicesfr"][1]="Réseau en mode Infrastructure";
$elem["netcfg/wireless_adhoc_managed"]["description"]="Type of wireless network:
 Wireless networks are either managed or ad-hoc. If you use a real access
 point of some sort, your network is Managed. If another computer is your
 'access point', then your network may be Ad-hoc.
";
$elem["netcfg/wireless_adhoc_managed"]["descriptionde"]="Typ des drahtlosen Netzwerks (WLAN):
 Drahtlose Netzwerke (WLAN) sind entweder vom Typ »managed« oder »ad-hoc«. Wenn Sie in irgendeiner Form einen echten Access Point benutzen (z.B. einen WLAN-Router), ist Ihr Netzwerk »managed«. Wenn bei Ihnen ein anderer Computer als Access Point fungiert, ist Ihr Netzwerk wahrscheinlich »ad-hoc«.
";
$elem["netcfg/wireless_adhoc_managed"]["descriptionfr"]="Type de réseau sans fil :
 Les réseaux sans fil fonctionnent en mode « infrastructure » (« managed ») ou en mode « ad-hoc ». Si vous utilisez un point d'accès matériel, le réseau est de type « infrastructure ». Si un autre ordinateur fait office de point d'accès, le réseau est de type « ad-hoc ».
";
$elem["netcfg/wireless_adhoc_managed"]["default"]="Infrastructure (Managed) network";
$elem["netcfg/wifi_progress_title"]["type"]="text";
$elem["netcfg/wifi_progress_title"]["description"]="Wireless network configuration
";
$elem["netcfg/wifi_progress_title"]["descriptionde"]="Konfiguration von drahtlosen Netzwerken
";
$elem["netcfg/wifi_progress_title"]["descriptionfr"]="Configuration du réseau sans fil
";
$elem["netcfg/wifi_progress_title"]["default"]="";
$elem["netcfg/wifi_progress_info"]["type"]="text";
$elem["netcfg/wifi_progress_info"]["description"]="Searching for wireless access points...
";
$elem["netcfg/wifi_progress_info"]["descriptionde"]="Suchen nach drahtlosen Access Points ...
";
$elem["netcfg/wifi_progress_info"]["descriptionfr"]="Recherche de points d'accès...
";
$elem["netcfg/wifi_progress_info"]["default"]="";
$elem["netcfg/disable_autoconfig"]["type"]="boolean";
$elem["netcfg/disable_autoconfig"]["description"]="for internal use; can be preseeded
 Set to true to force static network configuration

";
$elem["netcfg/disable_autoconfig"]["descriptionde"]="";
$elem["netcfg/disable_autoconfig"]["descriptionfr"]="";
$elem["netcfg/disable_autoconfig"]["default"]="false";
$elem["netcfg/disable_dhcp"]["type"]="boolean";
$elem["netcfg/disable_dhcp"]["description"]="for internal use; can be preseeded (deprecated)
 Set to true to force static network configuration (deprecated)

";
$elem["netcfg/disable_dhcp"]["descriptionde"]="";
$elem["netcfg/disable_dhcp"]["descriptionfr"]="";
$elem["netcfg/disable_dhcp"]["default"]="false";
$elem["netcfg/link_detect_progress"]["type"]="text";
$elem["netcfg/link_detect_progress"]["description"]="Detecting link on ${interface}; please wait...
";
$elem["netcfg/link_detect_progress"]["descriptionde"]="Erkennen der Verbindung an ${interface}; bitte warten ...
";
$elem["netcfg/link_detect_progress"]["descriptionfr"]="Détection de la connexion réseau sur ${interface}. Veuillez patienter...
";
$elem["netcfg/link_detect_progress"]["default"]="";
$elem["netcfg/internal-none"]["type"]="text";
$elem["netcfg/internal-none"]["description"]="<none>
";
$elem["netcfg/internal-none"]["descriptionde"]="<nichts>
";
$elem["netcfg/internal-none"]["descriptionfr"]="<aucune>
";
$elem["netcfg/internal-none"]["default"]="";
$elem["netcfg/internal-wifi"]["type"]="text";
$elem["netcfg/internal-wifi"]["description"]="Wireless ethernet (802.11x)
";
$elem["netcfg/internal-wifi"]["descriptionde"]="Drahtloses Ethernet (802.11x)
";
$elem["netcfg/internal-wifi"]["descriptionfr"]="Ethernet sans fil (802.11x)
";
$elem["netcfg/internal-wifi"]["default"]="";
$elem["netcfg/internal-wireless"]["type"]="text";
$elem["netcfg/internal-wireless"]["description"]="wireless
";
$elem["netcfg/internal-wireless"]["descriptionde"]="drahtlos
";
$elem["netcfg/internal-wireless"]["descriptionfr"]="sans fil
";
$elem["netcfg/internal-wireless"]["default"]="";
$elem["netcfg/internal-eth"]["type"]="text";
$elem["netcfg/internal-eth"]["description"]="Ethernet
";
$elem["netcfg/internal-eth"]["descriptionde"]="Ethernet
";
$elem["netcfg/internal-eth"]["descriptionfr"]="Ethernet
";
$elem["netcfg/internal-eth"]["default"]="";
$elem["netcfg/internal-tr"]["type"]="text";
$elem["netcfg/internal-tr"]["description"]="Token Ring
";
$elem["netcfg/internal-tr"]["descriptionde"]="Token Ring
";
$elem["netcfg/internal-tr"]["descriptionfr"]="Token Ring
";
$elem["netcfg/internal-tr"]["default"]="";
$elem["netcfg/internal-usb"]["type"]="text";
$elem["netcfg/internal-usb"]["description"]="USB net
";
$elem["netcfg/internal-usb"]["descriptionde"]="USB-Netzwerk
";
$elem["netcfg/internal-usb"]["descriptionfr"]="Réseau USB
";
$elem["netcfg/internal-usb"]["default"]="";
$elem["netcfg/internal-arc"]["type"]="text";
$elem["netcfg/internal-arc"]["description"]="Arcnet

";
$elem["netcfg/internal-arc"]["descriptionde"]="";
$elem["netcfg/internal-arc"]["descriptionfr"]="";
$elem["netcfg/internal-arc"]["default"]="";
$elem["netcfg/internal-slip"]["type"]="text";
$elem["netcfg/internal-slip"]["description"]="Serial-line IP
";
$elem["netcfg/internal-slip"]["descriptionde"]="IP über serielle Schnittstelle
";
$elem["netcfg/internal-slip"]["descriptionfr"]="IP sur ligne série
";
$elem["netcfg/internal-slip"]["default"]="";
$elem["netcfg/internal-plip"]["type"]="text";
$elem["netcfg/internal-plip"]["description"]="Parallel-port IP
";
$elem["netcfg/internal-plip"]["descriptionde"]="IP über parallele Schnittstelle
";
$elem["netcfg/internal-plip"]["descriptionfr"]="IP sur port parallèle
";
$elem["netcfg/internal-plip"]["default"]="";
$elem["netcfg/internal-ppp"]["type"]="text";
$elem["netcfg/internal-ppp"]["description"]="Point-to-Point Protocol
";
$elem["netcfg/internal-ppp"]["descriptionde"]="Punkt-zu-Punkt-Protokoll
";
$elem["netcfg/internal-ppp"]["descriptionfr"]="Protocole point à point
";
$elem["netcfg/internal-ppp"]["default"]="";
$elem["netcfg/internal-sit"]["type"]="text";
$elem["netcfg/internal-sit"]["description"]="IPv6-in-IPv4
";
$elem["netcfg/internal-sit"]["descriptionde"]="IPv6-in-IPv4
";
$elem["netcfg/internal-sit"]["descriptionfr"]="IPv6 dans IPv4
";
$elem["netcfg/internal-sit"]["default"]="";
$elem["netcfg/internal-ippp"]["type"]="text";
$elem["netcfg/internal-ippp"]["description"]="ISDN Point-to-Point Protocol
";
$elem["netcfg/internal-ippp"]["descriptionde"]="ISDN Punkt-zu-Punkt-Protokoll
";
$elem["netcfg/internal-ippp"]["descriptionfr"]="Protocole point à point RNIS
";
$elem["netcfg/internal-ippp"]["default"]="";
$elem["netcfg/internal-ctc"]["type"]="text";
$elem["netcfg/internal-ctc"]["description"]="Channel-to-channel
";
$elem["netcfg/internal-ctc"]["descriptionde"]="Channel-to-channel
";
$elem["netcfg/internal-ctc"]["descriptionfr"]="Canal vers canal
";
$elem["netcfg/internal-ctc"]["default"]="";
$elem["netcfg/internal-escon"]["type"]="text";
$elem["netcfg/internal-escon"]["description"]="Real channel-to-channel
";
$elem["netcfg/internal-escon"]["descriptionde"]="Real channel-to-channel
";
$elem["netcfg/internal-escon"]["descriptionfr"]="Canal vers canal réel
";
$elem["netcfg/internal-escon"]["default"]="";
$elem["netcfg/internal-hsi"]["type"]="text";
$elem["netcfg/internal-hsi"]["description"]="Hipersocket

";
$elem["netcfg/internal-hsi"]["descriptionde"]="";
$elem["netcfg/internal-hsi"]["descriptionfr"]="";
$elem["netcfg/internal-hsi"]["default"]="";
$elem["netcfg/internal-iucv"]["type"]="text";
$elem["netcfg/internal-iucv"]["description"]="Inter-user communication vehicle
";
$elem["netcfg/internal-iucv"]["descriptionde"]="Inter-user communication vehicle
";
$elem["netcfg/internal-iucv"]["descriptionfr"]="Moyen de communication d'usager à usager
";
$elem["netcfg/internal-iucv"]["default"]="";
$elem["netcfg/internal-unknown-iface"]["type"]="text";
$elem["netcfg/internal-unknown-iface"]["description"]="Unknown interface
";
$elem["netcfg/internal-unknown-iface"]["descriptionde"]="Unbekannte Schnittstelle
";
$elem["netcfg/internal-unknown-iface"]["descriptionfr"]="Interface inconnue
";
$elem["netcfg/internal-unknown-iface"]["default"]="";
$elem["debian-installer/netcfg/title"]["type"]="text";
$elem["debian-installer/netcfg/title"]["description"]="Configure the network
";
$elem["debian-installer/netcfg/title"]["descriptionde"]="Netzwerk einrichten
";
$elem["debian-installer/netcfg/title"]["descriptionfr"]="Configurer le réseau
";
$elem["debian-installer/netcfg/title"]["default"]="";
$elem["netcfg/target_network_config"]["type"]="select";
$elem["netcfg/target_network_config"]["choices"][1]="Network Manager";
$elem["netcfg/target_network_config"]["choices"][2]="ifupdown (/etc/network/interfaces)";
$elem["netcfg/target_network_config"]["description"]="for internal use; can be preseeded
 Specifies what kind of network connection management tool should be
 configured post-installation if multiple are available. Automatic
 selection is used in this order when not specified: network-manager if
 available (on Linux only), ethernet configuration through ifupdown on wired
 installation and loopback configuration through ifupdown on wireless
 installations.

";
$elem["netcfg/target_network_config"]["descriptionde"]="";
$elem["netcfg/target_network_config"]["descriptionfr"]="";
$elem["netcfg/target_network_config"]["default"]="";
$elem["netcfg/link_wait_timeout"]["type"]="string";
$elem["netcfg/link_wait_timeout"]["description"]="Waiting time (in seconds) for link detection:
 Please enter the maximum time you would like to wait for network link
 detection.
";
$elem["netcfg/link_wait_timeout"]["descriptionde"]="Wartezeit (in Sekunden) für Erkennung einer Verbindung:
 Bitte geben Sie die Zeit ein, die Sie maximal zwecks Erkennung einer Netzwerkverbindung warten möchten.
";
$elem["netcfg/link_wait_timeout"]["descriptionfr"]="Délai d'attente (en secondes) pour la détection du réseau :
 Veuillez indiquer le délai maximum pour la détection de la présence du réseau.
";
$elem["netcfg/link_wait_timeout"]["default"]="3";
$elem["netcfg/bad_link_wait_timeout"]["type"]="error";
$elem["netcfg/bad_link_wait_timeout"]["description"]="Invalid network link detection waiting time
 The value you have provided is not valid. The maximum waiting time (in
 seconds) for network link detection must be a positive integer.
";
$elem["netcfg/bad_link_wait_timeout"]["descriptionde"]="Wartezeit für Erkennung einer Verbindung ungültig
 Der Wert, den Sie eingegeben haben, ist ungültig. Die maximale Wartezeit für die Erkennung einer Netzwerkverbindung (in Sekunden) muss eine positive Ganzzahl sein.
";
$elem["netcfg/bad_link_wait_timeout"]["descriptionfr"]="Délai d'attente de détection du réseau non valable
 La valeur indiquée n'est pas valable. Le délai d'attente maximum pour la détection du réseau doit être un entier positif.
";
$elem["netcfg/bad_link_wait_timeout"]["default"]="";
$elem["netcfg/wireless_show_essids"]["type"]="select";
$elem["netcfg/wireless_show_essids"]["description"]="Wireless network:
 Select the wireless network to use during the installation process.
";
$elem["netcfg/wireless_show_essids"]["descriptionde"]="Drahtloses Netzwerk (WLAN):
 Wählen Sie das während der Installation zu verwendende drahtlose Netzwerk.
";
$elem["netcfg/wireless_show_essids"]["descriptionfr"]="Réseau sans fil :
 Veuillez choisir le réseau sans fil à utiliser pendant l'installation.
";
$elem["netcfg/wireless_show_essids"]["default"]="";
$elem["netcfg/enable"]["type"]="boolean";
$elem["netcfg/enable"]["description"]="for internal use; can be preseeded
 Set to false to disable netcfg entirely via preseed.

";
$elem["netcfg/enable"]["descriptionde"]="";
$elem["netcfg/enable"]["descriptionfr"]="";
$elem["netcfg/enable"]["default"]="true";
$elem["netcfg/use_autoconfig"]["type"]="boolean";
$elem["netcfg/use_autoconfig"]["description"]="Auto-configure networking?
 Networking can be configured either by entering all the information
 manually, or by using DHCP (or a variety of IPv6-specific methods) to
 detect network settings automatically. If you choose to use
 autoconfiguration and the installer is unable to get a working
 configuration from the network, you will be given the opportunity to
 configure the network manually.
";
$elem["netcfg/use_autoconfig"]["descriptionde"]="Netzwerk automatisch einrichten?
 Das Netzwerk kann entweder durch manuelle Eingabe aller Informationen konfiguriert werden oder durch die Verwendung von DHCP (bzw. eine Variation IPv6-spezifischer Methoden), um die Netzwerkeinstellungen automatisch zu erfassen. Wenn Sie die automatische Konfiguration wählen und der Installer keine funktionierende Konfiguration vom Netzwerk empfangen kann, erhalten Sie die Möglichkeit, Ihr Netzwerk manuell zu konfigurieren.
";
$elem["netcfg/use_autoconfig"]["descriptionfr"]="Faut-il configurer le réseau automatiquement ?
 Pour configurer le réseau, on peut fournir soi-même toutes les informations ou utiliser DHCP (ou différentes méthodes propres à IPv6) pour déterminer automatiquement les réglages réseau. Si vous choisissez la configuration automatique et que le programme d'installation ne réussit pas à configurer correctement le réseau, vous aurez la possibilité d'effectuer une configuration manuelle.
";
$elem["netcfg/use_autoconfig"]["default"]="true";
$elem["netcfg/get_domain"]["type"]="string";
$elem["netcfg/get_domain"]["description"]="Domain name:
 The domain name is the part of your Internet address to the right of your
 host name.  It is often something that ends in .com, .net, .edu, or .org. 
 If you are setting up a home network, you can make something up, but make
 sure you use the same domain name on all your computers.
";
$elem["netcfg/get_domain"]["descriptionde"]="Domain-Name:
 Der Domain-Name ist der rechte Teil Ihrer Internetadresse nach Ihrem Rechnernamen. Er endet oft mit .de, .com, .net oder .org. Wenn Sie ein lokales Heimnetz aufbauen, ist es egal, was Sie angeben. Diese Information sollte dann aber auf allen Rechnern gleich sein.
";
$elem["netcfg/get_domain"]["descriptionfr"]="Domaine :
 Le domaine est la partie de l'adresse Internet qui est à la droite du nom de machine. Il se termine souvent par .com, .net, .edu, ou .org. Si vous paramétrez votre propre réseau, vous pouvez mettre ce que vous voulez mais assurez-vous d'employer le même nom sur toutes les machines.
";
$elem["netcfg/get_domain"]["default"]="";
$elem["netcfg/get_nameservers"]["type"]="string";
$elem["netcfg/get_nameservers"]["description"]="Name server addresses:
 The name servers are used to look up host names on the network.
 Please enter the IP addresses (not host names) of up to 3 name servers,
 separated by spaces. Do not use commas. The first name server in the list
 will be the first to be queried. If you don't want to use any name server,
 just leave this field blank.
";
$elem["netcfg/get_nameservers"]["descriptionde"]="Adresse des DNS-Servers:
 Nameserver (DNS-Server) werden benutzt, um Rechnernamen im Internet aufzulösen. Bitte geben Sie die IP-Adressen (nicht die Rechnernamen) von bis zu drei Nameservern getrennt durch Leerzeichen an. Benutzen Sie keine Kommata. Der erste Server in der Liste wird als erstes abgefragt. Wenn Sie keine Nameserver benutzen möchten, lassen Sie dieses Feld bitte einfach leer.
";
$elem["netcfg/get_nameservers"]["descriptionfr"]="Adresses des serveurs de noms :
 Les serveurs de noms servent à la recherche des noms d'hôtes sur le réseau. Veuillez donner leurs adresses IP (pas les noms des machines) ; vous pouvez inscrire au plus trois adresses, séparées par des espaces. N'utilisez pas de virgule. Le premier serveur indiqué sera interrogé en premier. Si vous ne voulez pas utiliser de serveur de noms, laissez ce champ vide.
";
$elem["netcfg/get_nameservers"]["default"]="";
$elem["netcfg/choose_interface"]["type"]="select";
$elem["netcfg/choose_interface"]["description"]="Primary network interface:
 Your system has multiple network interfaces. Choose the one to use as
 the primary network interface during the installation. If possible, the
 first connected network interface found has been selected.
";
$elem["netcfg/choose_interface"]["descriptionde"]="Primäre Netzwerk-Schnittstelle:
 Ihr System besitzt mehrere Netzwerk-Schnittstellen. Bitte wählen Sie die Schnittstelle (Netzwerkkarte), die für die Installation genutzt werden soll. Falls möglich, wurde die erste angeschlossene Schnittstelle ausgewählt.
";
$elem["netcfg/choose_interface"]["descriptionfr"]="Interface réseau principale :
 Le système possède plusieurs interfaces réseau. Choisissez celle que vous voulez utiliser comme interface principale pour l'installation. Si possible, la première interface réseau connectée a déjà été choisie.
";
$elem["netcfg/choose_interface"]["default"]="";
$elem["netcfg/wireless_essid"]["type"]="string";
$elem["netcfg/wireless_essid"]["description"]="Wireless ESSID for ${iface}:
 ${iface} is a wireless network interface. Please enter the name (the ESSID)
 of the wireless network you would like ${iface} to use. If you would like
 to use any available network, leave this field blank.
";
$elem["netcfg/wireless_essid"]["descriptionde"]="ESSID für ${iface}:
 ${iface} ist eine drahtlose Netzwerk-Schnittstelle. Bitte geben Sie den Namen (die ESSID) des drahtlosen Netzwerks an, das ${iface} verwenden soll. Möchten Sie sich nicht festlegen, so lassen Sie dieses Feld leer.
";
$elem["netcfg/wireless_essid"]["descriptionfr"]="Nom (ESSID) du réseau sans fil pour ${iface} :
 ${iface} est l'interface d'un réseau sans fil. Veuillez indiquer le nom (ESSID) de ce réseau sans fil pour pouvoir utiliser ${iface}. Si vous voulez utiliser un autre réseau, laissez ce champ vide.
";
$elem["netcfg/wireless_essid"]["default"]="";
$elem["netcfg/wireless_essid_again"]["type"]="string";
$elem["netcfg/wireless_essid_again"]["description"]="Wireless ESSID for ${iface}:
 Attempting to find an available wireless network failed.
 .
 ${iface} is a wireless network interface. Please enter the name (the ESSID)
 of the wireless network you would like ${iface} to use. To connect to any
 available network, leave this field blank.
";
$elem["netcfg/wireless_essid_again"]["descriptionde"]="ESSID für ${iface}:
 Der Versuch, ein verfügbares drahtloses Netzwerk zu finden, ist fehlgeschlagen.
 .
 ${iface} ist eine Schnittstelle für drahtloses Netzwerk (WLAN). Bitte geben Sie den Namen (die ESSID) des drahtlosen Netzwerks an, das ${iface} verwenden soll. Um sich mit irgendeinem der derzeit bei Ihnen verfügbaren Netzwerke zu verbinden, lassen Sie dieses Feld leer.
";
$elem["netcfg/wireless_essid_again"]["descriptionfr"]="Nom (ESSID) du réseau sans fil pour ${iface} :
 La recherche d'un réseau sans fil disponible a échoué.
 .
 ${iface} est l'interface d'un réseau sans fil. Veuillez indiquer le nom (ESSID) de ce réseau sans fil pour pouvoir utiliser ${iface}. Si vous voulez utiliser n'importe quel réseau disponible, laissez ce champ vide.
";
$elem["netcfg/wireless_essid_again"]["default"]="";
$elem["netcfg/wireless_security_type"]["type"]="select";
$elem["netcfg/wireless_security_type"]["choices"][1]="WEP/Open Network";
$elem["netcfg/wireless_security_type"]["choicesde"][1]="WEP/Offenes Netzwerk";
$elem["netcfg/wireless_security_type"]["choicesfr"][1]="Réseau ouvert ou WEP";
$elem["netcfg/wireless_security_type"]["description"]="Wireless network type for ${iface}:
 Choose WEP/Open if the network is open or secured with WEP.
 Choose WPA/WPA2 if the network is protected with WPA/WPA2 PSK
 (Pre-Shared Key).
";
$elem["netcfg/wireless_security_type"]["descriptionde"]="Typ des drahtlosen Netzwerks (WLAN) für ${iface}:
 Wählen Sie »WEP/Offenes Netzwerk«, wenn das Netzwerk unverschlüsselt oder mit WEP gesichert ist. Wählen Sie »WPA/WPA2 PSK«, wenn das Netzwerk mit WPA/WPA2 Pre-Shared Key geschützt ist.
";
$elem["netcfg/wireless_security_type"]["descriptionfr"]="Type du réseau sans fil pour ${iface} :
 Veuillez choisir « Réseau ouvert ou WEP » si le réseau n'est pas protégé par une clé de chiffrement ou s'il est chiffré avec la méthode WEP. Choisissez « WPA/WPA2 » s'il est chiffré avec la méthode « WPA/WPA2 PSK » (« Pre-Shared Key » ou clé partagée).
";
$elem["netcfg/wireless_security_type"]["default"]="wpa";
$elem["netcfg/wireless_wep"]["type"]="string";
$elem["netcfg/wireless_wep"]["description"]="WEP key for wireless device ${iface}:
 If applicable, please enter the WEP security key for the wireless
 device ${iface}. There are two ways to do this:
 .
 If your WEP key is in the format 'nnnn-nnnn-nn', 'nn:nn:nn:nn:nn:nn:nn:nn',
 or 'nnnnnnnn', where n is a number, just enter it as it is into this field.
 .
 If your WEP key is in the format of a passphrase, prefix it with 's:'
 (without quotes).
 .
 Of course, if there is no WEP key for your wireless network, leave this
 field blank.
";
$elem["netcfg/wireless_wep"]["descriptionde"]="WEP-Schlüssel für drahtloses Netzwerkgerät ${iface}:
 Falls notwendig geben Sie den WEP-Schlüssel für das Gerät ${iface} ein. Dazu gibt es zwei Möglichkeiten:
 .
 Wenn Ihr WEP-Schlüssel das Format »nnnn-nnnn-nn«, »nn:nn:nn:nn:nn:nn:nn:nn « oder »nnnnnnnn« hat, wobei n eine Ziffer ist, geben Sie ihn einfach - wie er ist - in dieses Feld ein.
 .
 Wenn Ihr WEP-Schlüssel eine Passphrase ist, stellen Sie dieser ein »s:« (ohne die Anführungszeichen) voran.
 .
 Falls es für Ihr drahtloses Netzwerk keinen WEP-Schlüssel gibt, lassen Sie dieses Feld leer.
";
$elem["netcfg/wireless_wep"]["descriptionfr"]="Clé WEP pour le périphérique sans fil ${iface} :
 Si nécessaire, veuillez indiquer la clé de sécurité WEP pour le périphérique sans fil ${iface}. Il y a deux façons de le faire :
 .
 Si le format de la clé WEP est « nnnn-nnnn-nn », « nn:nn:nn:nn:nn:nn:nn:nn » ou « nnnnnnnn », avec n égal à un nombre, il suffit de l'indiquer tel quel dans le champ.
 .
 Si le format de la clé est une phrase secrète, préfixez-la avec « s: ».
 .
 Bien sûr, si le réseau sans fil ne possède pas de clé WEP, laissez ce champ vide.
";
$elem["netcfg/wireless_wep"]["default"]="";
$elem["netcfg/invalid_wep"]["type"]="error";
$elem["netcfg/invalid_wep"]["description"]="Invalid WEP key
 The WEP key '${wepkey}' is invalid. Please refer to the instructions on
 the next screen carefully on how to enter your WEP key correctly, and try
 again.
";
$elem["netcfg/invalid_wep"]["descriptionde"]="Ungültiger WEP-Schlüssel
 Der WEP-Schlüssel »${wepkey}« ist ungültig. Bitte beachten Sie die Anweisungen auf dem nächsten Bildschirm über die korrekte Eingabe des WEP-Schlüssels und versuchen Sie es noch einmal.
";
$elem["netcfg/invalid_wep"]["descriptionfr"]="Clé WEP non valable
 La clé WEP ${wepkey} n'est pas valable. Veuillez consulter attentivement les instructions contenues dans le prochain écran sur la manière d'indiquer correctement une clé WEP et réessayez.
";
$elem["netcfg/invalid_wep"]["default"]="";
$elem["netcfg/invalid_pass"]["type"]="error";
$elem["netcfg/invalid_pass"]["description"]="Invalid passphrase
 The WPA/WPA2 PSK passphrase was either too long (more than 64 characters)
 or too short (less than 8 characters).
";
$elem["netcfg/invalid_pass"]["descriptionde"]="Ungültige Passphrase
 Die WPA/WPA2 PSK-Passphrase war entweder zu lang (mehr als 64 Zeichen) oder zu kurz (weniger als 8 Zeichen).
";
$elem["netcfg/invalid_pass"]["descriptionfr"]="Phrase secrète non valable
 La phrase secrète WPA/WPA2 PSK est soit trop longue (plus de 64 caractères), soit trop courte (moins de 8 caractères).
";
$elem["netcfg/invalid_pass"]["default"]="";
$elem["netcfg/wireless_wpa"]["type"]="string";
$elem["netcfg/wireless_wpa"]["description"]="WPA/WPA2 passphrase for wireless device ${iface}:
 Enter the passphrase for WPA/WPA2 PSK authentication. This should be the
 passphrase defined for the wireless network you are trying to use.
";
$elem["netcfg/wireless_wpa"]["descriptionde"]="WPA-Passphrase für drahtloses Netzwerkgerät ${iface}:
 Geben Sie die Passphrase für die WPA/WPA2 PSK-Authentifizierung ein. Dies sollte die Passphrase für das Drahtlos-Netz sein, das Sie versuchen zu verwenden.
";
$elem["netcfg/wireless_wpa"]["descriptionfr"]="Phrase secrète WPA/WPA2 pour le périphérique sans fil ${iface} :
 Veuillez indiquer la phrase secrète pour l'authentification WPA/WPA2 PSK. Cela doit être la phrase secrète établie pour le réseau sans fil que vous souhaitez utiliser.
";
$elem["netcfg/wireless_wpa"]["default"]="";
$elem["netcfg/invalid_essid"]["type"]="error";
$elem["netcfg/invalid_essid"]["description"]="Invalid ESSID
 The ESSID \"${essid}\" is invalid. ESSIDs may only be up to ${max_essid_len}
 characters, but may contain all kinds of characters.
";
$elem["netcfg/invalid_essid"]["descriptionde"]="Ungültige ESSID
 Die ESSID »${essid}« ist ungültig. ESSIDs dürfen bis zu ${max_essid_len} Zeichen lang sein, können aber alle Arten von Zeichen enthalten.
";
$elem["netcfg/invalid_essid"]["descriptionfr"]="Nom (ESSID) non valable
 Le nom « ${essid} » n'est pas valable. Les ESSID ne doivent pas dépasser ${max_essid_len} caractères, mais ils peuvent contenir toutes sortes de caractères.
";
$elem["netcfg/invalid_essid"]["default"]="";
$elem["netcfg/wpa_progress"]["type"]="text";
$elem["netcfg/wpa_progress"]["description"]="Attempting to exchange keys with the access point...
";
$elem["netcfg/wpa_progress"]["descriptionde"]="Versuch des Schlüsselaustauschs mit dem Access-Point ...
";
$elem["netcfg/wpa_progress"]["descriptionfr"]="Tentative d'échange des clés avec le point d'accès sans fil...
";
$elem["netcfg/wpa_progress"]["default"]="";
$elem["netcfg/wpa_progress_note"]["type"]="text";
$elem["netcfg/wpa_progress_note"]["description"]="This may take some time.
";
$elem["netcfg/wpa_progress_note"]["descriptionde"]="Dies kann einige Zeit dauern.
";
$elem["netcfg/wpa_progress_note"]["descriptionfr"]="Cette opération peut prendre du temps.
";
$elem["netcfg/wpa_progress_note"]["default"]="";
$elem["netcfg/wpa_success_note"]["type"]="text";
$elem["netcfg/wpa_success_note"]["description"]="WPA/WPA2 connection succeeded
";
$elem["netcfg/wpa_success_note"]["descriptionde"]="WPA-Verbindung erfolgreich hergestellt
";
$elem["netcfg/wpa_success_note"]["descriptionfr"]="Connexion WPA/WPA2 réussie
";
$elem["netcfg/wpa_success_note"]["default"]="";
$elem["netcfg/wpa_supplicant_failed"]["type"]="note";
$elem["netcfg/wpa_supplicant_failed"]["description"]="Failure of key exchange and association
 The exchange of keys and association with the access point failed.
 Please check the WPA/WPA2 parameters you provided.
";
$elem["netcfg/wpa_supplicant_failed"]["descriptionde"]="Schlüsselaustausch und Verbindung fehlgeschlagen
 Der Schlüsselaustausch und die Verbindung mit dem Access-Point ist fehlgeschlagen. Bitte überprüfen Sie die WPA-Parameter, die Sie eingegeben haben.
";
$elem["netcfg/wpa_supplicant_failed"]["descriptionfr"]="Échec de l'échange des clés et de l'association
 L'échange de clés et l'association avec le point d'accès sans fil ont échoué. Veuillez vérifier les paramètres WPA/WPA2 que vous avez fournis.
";
$elem["netcfg/wpa_supplicant_failed"]["default"]="";
$elem["netcfg/get_hostname"]["type"]="string";
$elem["netcfg/get_hostname"]["description"]="Hostname:
 Please enter the hostname for this system.
 .
 The hostname is a single word that identifies your system to the network.
 If you don't know what your hostname should be, consult your network
 administrator. If you are setting up your own home network, you can make
 something up here.
";
$elem["netcfg/get_hostname"]["descriptionde"]="Rechnername:
 Bitte geben Sie den Namen dieses Rechners ein.
 .
 Der Rechnername ist ein einzelnes Wort, das Ihren Rechner im Netzwerk identifiziert. Wenn Sie Ihren Rechnernamen nicht kennen, fragen Sie den Netzwerkadministrator. Wenn Sie ein lokales Heimnetz aufbauen, ist es egal, was Sie angeben.
";
$elem["netcfg/get_hostname"]["descriptionfr"]="Nom de machine :
 Veuillez indiquer le nom de ce système.
 .
 Le nom de machine est un mot unique qui identifie le système sur le réseau. Si vous ne connaissez pas ce nom, demandez-le à votre administrateur réseau. Si vous installez votre propre réseau, vous pouvez mettre ce que vous voulez.
";
$elem["netcfg/get_hostname"]["default"]="ubuntu";
$elem["netcfg/hostname"]["type"]="string";
$elem["netcfg/hostname"]["description"]="for internal use; can be preseeded
 Hostname to set for the system; ignores names provided by DHCP or DNS.

";
$elem["netcfg/hostname"]["descriptionde"]="";
$elem["netcfg/hostname"]["descriptionfr"]="";
$elem["netcfg/hostname"]["default"]="";
$elem["netcfg/invalid_hostname"]["type"]="error";
$elem["netcfg/invalid_hostname"]["description"]="Invalid hostname
 The name \"${hostname}\" is invalid.
 .
 A valid hostname may contain only the numbers 0-9, upper and lowercase
 letters (A-Z and a-z), and the minus sign. It must be at most
 ${maxhostnamelen} characters long, and may not begin or end with a minus
 sign.
";
$elem["netcfg/invalid_hostname"]["descriptionde"]="Ungültiger Rechnername
 Der Rechnername »${hostname}« ist ungültig.
 .
 Ein gültiger Rechnername darf nur Groß- oder Kleinbuchstaben (A - Z, a - z), Zahlen (0 - 9) sowie Minuszeichen enthalten. Er darf maximal ${maxhostnamelen} Zeichen lang sein und nicht mit einem Minus beginnen oder enden.
";
$elem["netcfg/invalid_hostname"]["descriptionfr"]="Nom de machine non valable
 Le nom « ${hostname} » n'est pas valable.
 .
 Un nom valable ne peut contenir que les chiffres 0-9, des lettres minuscules ou majuscules (A-Z et a-z) et le signe moins ; sa longueur ne doit pas être supérieure à ${maxhostnamelen} caractères et il ne peut ni commencer ni finir par un signe moins.
";
$elem["netcfg/invalid_hostname"]["default"]="";
$elem["netcfg/error"]["type"]="error";
$elem["netcfg/error"]["description"]="Error
 An error occurred and the network configuration process has been aborted.
 You may retry it from the installation main menu.
";
$elem["netcfg/error"]["descriptionde"]="Fehler
 Es ist ein Fehler aufgetreten und der Netzwerk-Konfigurationsprozess wurde abgebrochen. Sie können es vom Installationshauptmenü aus noch einmal versuchen.
";
$elem["netcfg/error"]["descriptionfr"]="Erreur
 Une erreur s'est produite et le processus de configuration du réseau a été abandonné. Vous pouvez le reprendre à partir du menu principal du programme d'installation.
";
$elem["netcfg/error"]["default"]="";
$elem["netcfg/no_interfaces"]["type"]="error";
$elem["netcfg/no_interfaces"]["description"]="No network interfaces detected
 No network interfaces were found. The installation
 system was unable to find a network device.
 .
 You may need to load a specific module for your network card, if you have
 one. For this, go back to the network hardware detection step.
";
$elem["netcfg/no_interfaces"]["descriptionde"]="Es wurde keine Netzwerk-Schnittstelle gefunden
 Es wurde keine Netzwerk-Schnittstelle gefunden. Vom Installationssystem konnte keine Netzwerkkarte erkannt werden.
 .
 Es ist möglich, dass zunächst ein Kernel-Modul für Ihre Netzwerkkarte geladen werden muss. Gehen Sie dazu zum Schritt »Netzwerk-Hardware erkennen« zurück.
";
$elem["netcfg/no_interfaces"]["descriptionfr"]="Aucune interface réseau n'a été détectée
 Aucune interface réseau n'a été détectée. Le système d'installation n'a pu trouver aucun périphérique réseau.
 .
 Vous devez sans doute charger un module spécifique à la carte réseau - si vous en avez une. Pour cela, revenez à l'étape de détection du matériel réseau.
";
$elem["netcfg/no_interfaces"]["default"]="";
$elem["netcfg/kill_switch_enabled"]["type"]="note";
$elem["netcfg/kill_switch_enabled"]["description"]="Kill switch enabled on ${iface}
 ${iface} appears to have been disabled by means of a physical \"kill
 switch\". If you intend to use this interface, please switch it on before
 continuing.
";
$elem["netcfg/kill_switch_enabled"]["descriptionde"]="${iface} durch Hardware-Schalter deaktiviert
 ${iface} scheint abgeschaltet worden zu sein. Beabsichtigen Sie diese Schnittstelle zu verwenden, dann schalten Sie sie bitte ein, bevor sie fortfahren.
";
$elem["netcfg/kill_switch_enabled"]["descriptionfr"]="« kill switch » activé sur ${iface}
 ${iface} semble avoir été désactivée par un paramètre matériel « kill switch ». Si vous voulez utiliser cette interface, veuillez changer ce paramètre avant de continuer.
";
$elem["netcfg/kill_switch_enabled"]["default"]="";
$elem["netcfg/wireless_adhoc_managed"]["type"]="select";
$elem["netcfg/wireless_adhoc_managed"]["choices"][1]="Infrastructure (Managed) network";
$elem["netcfg/wireless_adhoc_managed"]["choicesde"][1]="Infrastruktur-Netzwerk (Managed)";
$elem["netcfg/wireless_adhoc_managed"]["choicesfr"][1]="Réseau en mode Infrastructure";
$elem["netcfg/wireless_adhoc_managed"]["description"]="Type of wireless network:
 Wireless networks are either managed or ad-hoc. If you use a real access
 point of some sort, your network is Managed. If another computer is your
 'access point', then your network may be Ad-hoc.
";
$elem["netcfg/wireless_adhoc_managed"]["descriptionde"]="Typ des drahtlosen Netzwerks (WLAN):
 Drahtlose Netzwerke (WLAN) sind entweder vom Typ »managed« oder »ad-hoc«. Wenn Sie in irgendeiner Form einen echten Access Point benutzen (z.B. einen WLAN-Router), ist Ihr Netzwerk »managed«. Wenn bei Ihnen ein anderer Computer als Access Point fungiert, ist Ihr Netzwerk wahrscheinlich »ad-hoc«.
";
$elem["netcfg/wireless_adhoc_managed"]["descriptionfr"]="Type de réseau sans fil :
 Les réseaux sans fil fonctionnent en mode « infrastructure » (« managed ») ou en mode « ad-hoc ». Si vous utilisez un point d'accès matériel, le réseau est de type « infrastructure ». Si un autre ordinateur fait office de point d'accès, le réseau est de type « ad-hoc ».
";
$elem["netcfg/wireless_adhoc_managed"]["default"]="Infrastructure (Managed) network";
$elem["netcfg/wifi_progress_title"]["type"]="text";
$elem["netcfg/wifi_progress_title"]["description"]="Wireless network configuration
";
$elem["netcfg/wifi_progress_title"]["descriptionde"]="Konfiguration von drahtlosen Netzwerken
";
$elem["netcfg/wifi_progress_title"]["descriptionfr"]="Configuration du réseau sans fil
";
$elem["netcfg/wifi_progress_title"]["default"]="";
$elem["netcfg/wifi_progress_info"]["type"]="text";
$elem["netcfg/wifi_progress_info"]["description"]="Searching for wireless access points...
";
$elem["netcfg/wifi_progress_info"]["descriptionde"]="Suchen nach drahtlosen Access Points ...
";
$elem["netcfg/wifi_progress_info"]["descriptionfr"]="Recherche de points d'accès...
";
$elem["netcfg/wifi_progress_info"]["default"]="";
$elem["netcfg/disable_autoconfig"]["type"]="boolean";
$elem["netcfg/disable_autoconfig"]["description"]="for internal use; can be preseeded
 Set to true to force static network configuration

";
$elem["netcfg/disable_autoconfig"]["descriptionde"]="";
$elem["netcfg/disable_autoconfig"]["descriptionfr"]="";
$elem["netcfg/disable_autoconfig"]["default"]="false";
$elem["netcfg/disable_dhcp"]["type"]="boolean";
$elem["netcfg/disable_dhcp"]["description"]="for internal use; can be preseeded (deprecated)
 Set to true to force static network configuration (deprecated)

";
$elem["netcfg/disable_dhcp"]["descriptionde"]="";
$elem["netcfg/disable_dhcp"]["descriptionfr"]="";
$elem["netcfg/disable_dhcp"]["default"]="false";
$elem["netcfg/link_detect_progress"]["type"]="text";
$elem["netcfg/link_detect_progress"]["description"]="Detecting link on ${interface}; please wait...
";
$elem["netcfg/link_detect_progress"]["descriptionde"]="Erkennen der Verbindung an ${interface}; bitte warten ...
";
$elem["netcfg/link_detect_progress"]["descriptionfr"]="Détection de la connexion réseau sur ${interface}. Veuillez patienter...
";
$elem["netcfg/link_detect_progress"]["default"]="";
$elem["netcfg/internal-none"]["type"]="text";
$elem["netcfg/internal-none"]["description"]="<none>
";
$elem["netcfg/internal-none"]["descriptionde"]="<nichts>
";
$elem["netcfg/internal-none"]["descriptionfr"]="<aucune>
";
$elem["netcfg/internal-none"]["default"]="";
$elem["netcfg/internal-wifi"]["type"]="text";
$elem["netcfg/internal-wifi"]["description"]="Wireless ethernet (802.11x)
";
$elem["netcfg/internal-wifi"]["descriptionde"]="Drahtloses Ethernet (802.11x)
";
$elem["netcfg/internal-wifi"]["descriptionfr"]="Ethernet sans fil (802.11x)
";
$elem["netcfg/internal-wifi"]["default"]="";
$elem["netcfg/internal-wireless"]["type"]="text";
$elem["netcfg/internal-wireless"]["description"]="wireless
";
$elem["netcfg/internal-wireless"]["descriptionde"]="drahtlos
";
$elem["netcfg/internal-wireless"]["descriptionfr"]="sans fil
";
$elem["netcfg/internal-wireless"]["default"]="";
$elem["netcfg/internal-eth"]["type"]="text";
$elem["netcfg/internal-eth"]["description"]="Ethernet
";
$elem["netcfg/internal-eth"]["descriptionde"]="Ethernet
";
$elem["netcfg/internal-eth"]["descriptionfr"]="Ethernet
";
$elem["netcfg/internal-eth"]["default"]="";
$elem["netcfg/internal-tr"]["type"]="text";
$elem["netcfg/internal-tr"]["description"]="Token Ring
";
$elem["netcfg/internal-tr"]["descriptionde"]="Token Ring
";
$elem["netcfg/internal-tr"]["descriptionfr"]="Token Ring
";
$elem["netcfg/internal-tr"]["default"]="";
$elem["netcfg/internal-usb"]["type"]="text";
$elem["netcfg/internal-usb"]["description"]="USB net
";
$elem["netcfg/internal-usb"]["descriptionde"]="USB-Netzwerk
";
$elem["netcfg/internal-usb"]["descriptionfr"]="Réseau USB
";
$elem["netcfg/internal-usb"]["default"]="";
$elem["netcfg/internal-arc"]["type"]="text";
$elem["netcfg/internal-arc"]["description"]="Arcnet

";
$elem["netcfg/internal-arc"]["descriptionde"]="";
$elem["netcfg/internal-arc"]["descriptionfr"]="";
$elem["netcfg/internal-arc"]["default"]="";
$elem["netcfg/internal-slip"]["type"]="text";
$elem["netcfg/internal-slip"]["description"]="Serial-line IP
";
$elem["netcfg/internal-slip"]["descriptionde"]="IP über serielle Schnittstelle
";
$elem["netcfg/internal-slip"]["descriptionfr"]="IP sur ligne série
";
$elem["netcfg/internal-slip"]["default"]="";
$elem["netcfg/internal-plip"]["type"]="text";
$elem["netcfg/internal-plip"]["description"]="Parallel-port IP
";
$elem["netcfg/internal-plip"]["descriptionde"]="IP über parallele Schnittstelle
";
$elem["netcfg/internal-plip"]["descriptionfr"]="IP sur port parallèle
";
$elem["netcfg/internal-plip"]["default"]="";
$elem["netcfg/internal-ppp"]["type"]="text";
$elem["netcfg/internal-ppp"]["description"]="Point-to-Point Protocol
";
$elem["netcfg/internal-ppp"]["descriptionde"]="Punkt-zu-Punkt-Protokoll
";
$elem["netcfg/internal-ppp"]["descriptionfr"]="Protocole point à point
";
$elem["netcfg/internal-ppp"]["default"]="";
$elem["netcfg/internal-sit"]["type"]="text";
$elem["netcfg/internal-sit"]["description"]="IPv6-in-IPv4
";
$elem["netcfg/internal-sit"]["descriptionde"]="IPv6-in-IPv4
";
$elem["netcfg/internal-sit"]["descriptionfr"]="IPv6 dans IPv4
";
$elem["netcfg/internal-sit"]["default"]="";
$elem["netcfg/internal-ippp"]["type"]="text";
$elem["netcfg/internal-ippp"]["description"]="ISDN Point-to-Point Protocol
";
$elem["netcfg/internal-ippp"]["descriptionde"]="ISDN Punkt-zu-Punkt-Protokoll
";
$elem["netcfg/internal-ippp"]["descriptionfr"]="Protocole point à point RNIS
";
$elem["netcfg/internal-ippp"]["default"]="";
$elem["netcfg/internal-ctc"]["type"]="text";
$elem["netcfg/internal-ctc"]["description"]="Channel-to-channel
";
$elem["netcfg/internal-ctc"]["descriptionde"]="Channel-to-channel
";
$elem["netcfg/internal-ctc"]["descriptionfr"]="Canal vers canal
";
$elem["netcfg/internal-ctc"]["default"]="";
$elem["netcfg/internal-escon"]["type"]="text";
$elem["netcfg/internal-escon"]["description"]="Real channel-to-channel
";
$elem["netcfg/internal-escon"]["descriptionde"]="Real channel-to-channel
";
$elem["netcfg/internal-escon"]["descriptionfr"]="Canal vers canal réel
";
$elem["netcfg/internal-escon"]["default"]="";
$elem["netcfg/internal-hsi"]["type"]="text";
$elem["netcfg/internal-hsi"]["description"]="Hipersocket

";
$elem["netcfg/internal-hsi"]["descriptionde"]="";
$elem["netcfg/internal-hsi"]["descriptionfr"]="";
$elem["netcfg/internal-hsi"]["default"]="";
$elem["netcfg/internal-iucv"]["type"]="text";
$elem["netcfg/internal-iucv"]["description"]="Inter-user communication vehicle
";
$elem["netcfg/internal-iucv"]["descriptionde"]="Inter-user communication vehicle
";
$elem["netcfg/internal-iucv"]["descriptionfr"]="Moyen de communication d'usager à usager
";
$elem["netcfg/internal-iucv"]["default"]="";
$elem["netcfg/internal-unknown-iface"]["type"]="text";
$elem["netcfg/internal-unknown-iface"]["description"]="Unknown interface
";
$elem["netcfg/internal-unknown-iface"]["descriptionde"]="Unbekannte Schnittstelle
";
$elem["netcfg/internal-unknown-iface"]["descriptionfr"]="Interface inconnue
";
$elem["netcfg/internal-unknown-iface"]["default"]="";
$elem["debian-installer/netcfg/title"]["type"]="text";
$elem["debian-installer/netcfg/title"]["description"]="Configure the network
";
$elem["debian-installer/netcfg/title"]["descriptionde"]="Netzwerk einrichten
";
$elem["debian-installer/netcfg/title"]["descriptionfr"]="Configurer le réseau
";
$elem["debian-installer/netcfg/title"]["default"]="";
$elem["netcfg/target_network_config"]["type"]="select";
$elem["netcfg/target_network_config"]["choices"][1]="Network Manager";
$elem["netcfg/target_network_config"]["choices"][2]="ifupdown (/etc/network/interfaces)";
$elem["netcfg/target_network_config"]["description"]="for internal use; can be preseeded
 Specifies what kind of network connection management tool should be
 configured post-installation if multiple are available. Automatic
 selection is used in this order when not specified: network-manager if
 available (on Linux only), ethernet configuration through ifupdown on wired
 installation and loopback configuration through ifupdown on wireless
 installations.

";
$elem["netcfg/target_network_config"]["descriptionde"]="";
$elem["netcfg/target_network_config"]["descriptionfr"]="";
$elem["netcfg/target_network_config"]["default"]="";
$elem["netcfg/link_wait_timeout"]["type"]="string";
$elem["netcfg/link_wait_timeout"]["description"]="Waiting time (in seconds) for link detection:
 Please enter the maximum time you would like to wait for network link
 detection.
";
$elem["netcfg/link_wait_timeout"]["descriptionde"]="Wartezeit (in Sekunden) für Erkennung einer Verbindung:
 Bitte geben Sie die Zeit ein, die Sie maximal zwecks Erkennung einer Netzwerkverbindung warten möchten.
";
$elem["netcfg/link_wait_timeout"]["descriptionfr"]="Délai d'attente (en secondes) pour la détection du réseau :
 Veuillez indiquer le délai maximum pour la détection de la présence du réseau.
";
$elem["netcfg/link_wait_timeout"]["default"]="3";
$elem["netcfg/bad_link_wait_timeout"]["type"]="error";
$elem["netcfg/bad_link_wait_timeout"]["description"]="Invalid network link detection waiting time
 The value you have provided is not valid. The maximum waiting time (in
 seconds) for network link detection must be a positive integer.
";
$elem["netcfg/bad_link_wait_timeout"]["descriptionde"]="Wartezeit für Erkennung einer Verbindung ungültig
 Der Wert, den Sie eingegeben haben, ist ungültig. Die maximale Wartezeit für die Erkennung einer Netzwerkverbindung (in Sekunden) muss eine positive Ganzzahl sein.
";
$elem["netcfg/bad_link_wait_timeout"]["descriptionfr"]="Délai d'attente de détection du réseau non valable
 La valeur indiquée n'est pas valable. Le délai d'attente maximum pour la détection du réseau doit être un entier positif.
";
$elem["netcfg/bad_link_wait_timeout"]["default"]="";
$elem["netcfg/wireless_show_essids"]["type"]="select";
$elem["netcfg/wireless_show_essids"]["description"]="Wireless network:
 Select the wireless network to use during the installation process.
";
$elem["netcfg/wireless_show_essids"]["descriptionde"]="Drahtloses Netzwerk (WLAN):
 Wählen Sie das während der Installation zu verwendende drahtlose Netzwerk.
";
$elem["netcfg/wireless_show_essids"]["descriptionfr"]="Réseau sans fil :
 Veuillez choisir le réseau sans fil à utiliser pendant l'installation.
";
$elem["netcfg/wireless_show_essids"]["default"]="";
$elem["netcfg/dhcp_hostname"]["type"]="string";
$elem["netcfg/dhcp_hostname"]["description"]="DHCP hostname:
 You may need to supply a DHCP host name. If you are using
 a cable modem, you might need to specify an account number here.
 .
 Most other users can just leave this blank.
";
$elem["netcfg/dhcp_hostname"]["descriptionde"]="DHCP-Rechnername:
 In einigen Situationen muss man einen DHCP-Rechnername angeben. Wenn Sie ein Kabelmodem besitzen, muss hier oft eine Benutzerkennung angegeben werden.
 .
 Die meisten Benutzer können dieses Feld einfach leer lassen.
";
$elem["netcfg/dhcp_hostname"]["descriptionfr"]="Nom de machine DHCP :
 Parfois, vous devez donner un nom de machine DHCP. Si vous utilisez un modem câble, vous avez peut-être besoin d'indiquer un numéro de compte.
 .
 La plupart des autres utilisateurs peuvent laisser ce champ vide.
";
$elem["netcfg/dhcp_hostname"]["default"]="";
$elem["netcfg/dhcp_progress"]["type"]="text";
$elem["netcfg/dhcp_progress"]["description"]="Configuring the network with DHCP
";
$elem["netcfg/dhcp_progress"]["descriptionde"]="Konfigurieren des Netzwerks mit DHCP
";
$elem["netcfg/dhcp_progress"]["descriptionfr"]="Configuration du réseau avec DHCP
";
$elem["netcfg/dhcp_progress"]["default"]="";
$elem["netcfg/dhcp_progress_note"]["type"]="text";
$elem["netcfg/dhcp_progress_note"]["description"]="This may take some time.
";
$elem["netcfg/dhcp_progress_note"]["descriptionde"]="Dies kann einige Zeit dauern.
";
$elem["netcfg/dhcp_progress_note"]["descriptionfr"]="Cette opération peut prendre du temps.
";
$elem["netcfg/dhcp_progress_note"]["default"]="";
$elem["netcfg/dhcp_success_note"]["type"]="text";
$elem["netcfg/dhcp_success_note"]["description"]="Network autoconfiguration has succeeded
";
$elem["netcfg/dhcp_success_note"]["descriptionde"]="Die automatische Netzwerkkonfiguration war erfolgreich.
";
$elem["netcfg/dhcp_success_note"]["descriptionfr"]="La configuration automatique a réussi.
";
$elem["netcfg/dhcp_success_note"]["default"]="";
$elem["netcfg/no_dhcp_client"]["type"]="error";
$elem["netcfg/no_dhcp_client"]["description"]="No DHCP client found
 No DHCP client was found. This package requires pump or dhcp-client.
 .
 The DHCP configuration process has been aborted.
";
$elem["netcfg/no_dhcp_client"]["descriptionde"]="Kein DHCP-Client gefunden
 Kein DHCP-Client gefunden. Dieses Paket benötigt pump oder dhcp-client.
 .
 Der DHCP-Konfigurationsprozess wurde abgebrochen.
";
$elem["netcfg/no_dhcp_client"]["descriptionfr"]="Aucun client DHCP trouvé
 Aucun client DHCP trouvé. Ce paquet demande pump ou dhcp-client.
 .
 Le processus de configuration DHCP a été interrompu.
";
$elem["netcfg/no_dhcp_client"]["default"]="";
$elem["netcfg/dhcp_options"]["type"]="select";
$elem["netcfg/dhcp_options"]["choices"][1]="Retry network autoconfiguration";
$elem["netcfg/dhcp_options"]["choices"][2]="Retry network autoconfiguration with a DHCP hostname";
$elem["netcfg/dhcp_options"]["choices"][3]="Configure network manually";
$elem["netcfg/dhcp_options"]["choices"][4]="${wifireconf}";
$elem["netcfg/dhcp_options"]["choicesde"][1]="Autom. Konfiguration erneut versuchen";
$elem["netcfg/dhcp_options"]["choicesde"][2]="Autom. Konfiguration erneut versuchen mit einem DHCP-Rechnernamen";
$elem["netcfg/dhcp_options"]["choicesde"][3]="Netzwerk manuell einrichten";
$elem["netcfg/dhcp_options"]["choicesde"][4]="${wifireconf}";
$elem["netcfg/dhcp_options"]["choicesfr"][1]="Réessayer la configuration automatique du réseau";
$elem["netcfg/dhcp_options"]["choicesfr"][2]="Réessayer la configuration automatique avec un nom d'hôte DHCP";
$elem["netcfg/dhcp_options"]["choicesfr"][3]="Configurer vous-même le réseau";
$elem["netcfg/dhcp_options"]["choicesfr"][4]="${wifireconf}";
$elem["netcfg/dhcp_options"]["description"]="Network configuration method:
 From here you can choose to retry DHCP network autoconfiguration
 (which may succeed if your DHCP server takes a long time to respond)
 or to configure the network manually. Some DHCP servers require
 a DHCP hostname to be sent by the client, so you can also choose
 to retry DHCP network autoconfiguration with a hostname that you
 provide.
";
$elem["netcfg/dhcp_options"]["descriptionde"]="Netzwerk-Konfigurationsmethode:
 Hier können Sie wählen, die automatische DHCP-Netzwerkkonfiguration erneut zu versuchen (was funktionieren könnte, wenn Ihr DHCP-Server sehr langsam reagiert) oder das Netzwerk manuell zu konfigurieren. Manche DHCP-Server erfordern, dass der Client einen speziellen DHCP-Rechnernamen sendet, daher können Sie auch wählen, die automatische DHCP-Netzwerkkonfiguration mit Angabe eines Rechnernamens erneut zu versuchen.
";
$elem["netcfg/dhcp_options"]["descriptionfr"]="Méthode pour la configuration du réseau :
 Vous pouvez maintenant réessayer la configuration automatique du réseau, - cela peut réussir si le serveur DHCP met du temps à répondre -, ou bien vous pouvez configurer vous-même le réseau. Certains serveurs DHCP demandent qu'un hôte DHCP soit donné par le client, vous pouvez l'indiquer avant de réessayer la configuration automatique.
";
$elem["netcfg/dhcp_options"]["default"]="Configure network manually";
$elem["netcfg/dhcp_failed"]["type"]="note";
$elem["netcfg/dhcp_failed"]["description"]="Network autoconfiguration failed
 Your network is probably not using the DHCP protocol. Alternatively, the
 DHCP server may be slow or some network hardware is not working properly.
";
$elem["netcfg/dhcp_failed"]["descriptionde"]="Die automatische Netzwerkkonfiguration ist fehlgeschlagen
 Ihr Netzwerk benutzt möglicherweise nicht das DHCP-Protokoll. Des Weiteren könnte der DHCP-Server sehr langsam sein oder die Netzwerk-Hardware arbeitet nicht korrekt.
";
$elem["netcfg/dhcp_failed"]["descriptionfr"]="La configuration automatique a échoué
 Le protocole DHCP n'est probablement pas utilisé sur le réseau. Il est également possible que le serveur DHCP soit lent ou que certains équipements réseau ne fonctionnent pas correctement.
";
$elem["netcfg/dhcp_failed"]["default"]="";
$elem["netcfg/no_default_route"]["type"]="boolean";
$elem["netcfg/no_default_route"]["description"]="Continue without a default route?
 The network autoconfiguration was successful. However, no default route
 was set: the system does not know how to communicate with hosts on the
 Internet. This will make it impossible to continue with the installation
 unless you have the first installation CD-ROM, a 'Netinst' CD-ROM, or
 packages available on the local network.
 .
 If you are unsure, you should not continue without a default route:
 contact your local network administrator about this problem.
";
$elem["netcfg/no_default_route"]["descriptionde"]="Ohne Default-Route fortsetzen?
 Die automatische Netzwerkkonfiguration war erfolgreich. Es wurde allerdings keine Default-Route gesetzt: Das System hat keine Informationen darüber, wie es mit Rechnern im Internet kommunizieren kann. Dies macht ein Fortsetzen der Installation unmöglich, falls Sie nicht die erste Installations-CD-ROM, eine »Netinst«-CD-ROM oder Pakete im lokalen Netzwerk haben.
 .
 Wenn Sie nicht sicher sind, sollten Sie die Installation nicht ohne Default-Route fortsetzen: Informieren Sie Ihren Netzwerk-Administrator über das Problem.
";
$elem["netcfg/no_default_route"]["descriptionfr"]="Faut-il continuer sans route par défaut ?
 La configuration automatique du réseau a réussi. Cependant aucune route par défaut n'a été déclarée : le système ne sait pas comment communiquer avec des machines sur Internet. Cela rendra l'installation impossible, sauf si vous utilisez le premier CD d'installation, un CD « netinst » ou des paquets disponibles sur le réseau local.
 .
 Dans le doute, vous devriez éviter de continuer l'installation sans route par défaut et contacter votre administrateur réseau à propos de ce problème.
";
$elem["netcfg/no_default_route"]["default"]="";
$elem["netcfg/internal-wifireconf"]["type"]="text";
$elem["netcfg/internal-wifireconf"]["description"]="Reconfigure the wireless network
";
$elem["netcfg/internal-wifireconf"]["descriptionde"]="Das drahtlose Netzwerk erneut konfigurieren
";
$elem["netcfg/internal-wifireconf"]["descriptionfr"]="Reconfigurer le réseau sans fil
";
$elem["netcfg/internal-wifireconf"]["default"]="";
$elem["netcfg/dhcp_timeout"]["type"]="string";
$elem["netcfg/dhcp_timeout"]["description"]="for internal use; can be preseeded
 Timeout for trying DHCP
";
$elem["netcfg/dhcp_timeout"]["descriptionde"]="";
$elem["netcfg/dhcp_timeout"]["descriptionfr"]="";
$elem["netcfg/dhcp_timeout"]["default"]="30";
$elem["netcfg/dhcp_ntp_servers"]["type"]="text";
$elem["netcfg/dhcp_ntp_servers"]["description"]="for internal use
 NTP servers provided by DHCP

";
$elem["netcfg/dhcp_ntp_servers"]["descriptionde"]="";
$elem["netcfg/dhcp_ntp_servers"]["descriptionfr"]="";
$elem["netcfg/dhcp_ntp_servers"]["default"]="";
$elem["netcfg/slaac_wait_title"]["type"]="text";
$elem["netcfg/slaac_wait_title"]["description"]="Attempting IPv6 autoconfiguration...
";
$elem["netcfg/slaac_wait_title"]["descriptionde"]="Versuch der automatischen IPv6-Konfiguration ...
";
$elem["netcfg/slaac_wait_title"]["descriptionfr"]="Tentative de configuration automatique d'IPv6...
";
$elem["netcfg/slaac_wait_title"]["default"]="";
$elem["netcfg/ipv6_link_local_wait_title"]["type"]="text";
$elem["netcfg/ipv6_link_local_wait_title"]["description"]="Waiting for link-local address...
";
$elem["netcfg/ipv6_link_local_wait_title"]["descriptionde"]="Warten auf verknüpfungslokale (link-lokale) Adresse ...
";
$elem["netcfg/ipv6_link_local_wait_title"]["descriptionfr"]="Attente de l'adresse du lien local (« link-local »)...
";
$elem["netcfg/ipv6_link_local_wait_title"]["default"]="";
$elem["netcfg/ipv6_config_flags_wait_title"]["type"]="text";
$elem["netcfg/ipv6_config_flags_wait_title"]["description"]="Attempting IPv6 autoconfiguration...
";
$elem["netcfg/ipv6_config_flags_wait_title"]["descriptionde"]="Versuch der automatischen IPv6-Konfiguration ...
";
$elem["netcfg/ipv6_config_flags_wait_title"]["descriptionfr"]="Tentative de configuration automatique d'IPv6...
";
$elem["netcfg/ipv6_config_flags_wait_title"]["default"]="";
$elem["netcfg/dhcpv6_timeout"]["type"]="string";
$elem["netcfg/dhcpv6_timeout"]["description"]="for internal use; can be preseeded
 Timeout for trying DHCPv6
";
$elem["netcfg/dhcpv6_timeout"]["descriptionde"]="";
$elem["netcfg/dhcpv6_timeout"]["descriptionfr"]="";
$elem["netcfg/dhcpv6_timeout"]["default"]="30";
$elem["netcfg/dhcpv6_progress"]["type"]="text";
$elem["netcfg/dhcpv6_progress"]["description"]="Configuring the network with DHCPv6
";
$elem["netcfg/dhcpv6_progress"]["descriptionde"]="Konfigurieren des Netzwerks mit DHCPv6
";
$elem["netcfg/dhcpv6_progress"]["descriptionfr"]="Configuration du réseau avec DHCPv6
";
$elem["netcfg/dhcpv6_progress"]["default"]="";
$elem["netcfg/get_ipaddress"]["type"]="string";
$elem["netcfg/get_ipaddress"]["description"]="IP address:
 The IP address is unique to your computer and may be:
 .
  * four numbers separated by periods (IPv4);
  * blocks of hexadecimal characters separated by colons (IPv6).
 .
 You can also optionally append a CIDR netmask (such as \"/24\").
 .
 If you don't know what to use here, consult your network administrator.
";
$elem["netcfg/get_ipaddress"]["descriptionde"]="IP-Adresse:
 Die IP-Adresse ist für Ihren Rechner eindeutig und kann zwei verschiedene Formate haben:
 .
  * vier Zahlen, getrennt durch Punkte (IPv4);
  * Blöcke von hexadezimalen Zeichen, getrennt durch Doppelpunkte (IPv6).
 .
 Sie können auch optional eine CIDR-Netzmaske (wie z.B. »/24«) anfügen.
 .
 Wenn Sie nicht wissen, was Sie eingeben sollen, fragen Sie Ihren Netzwerk-Administrator.
";
$elem["netcfg/get_ipaddress"]["descriptionfr"]="Adresse IP :
 L'adresse IP est propre à une machine et peut être constituée de :
 .
  * quatre nombres séparés par des points (IPv4);
  * des blocs de caractères hexadécimaux séparés par le caractère
    « deux-points » (IPv6).
 .
 Il est également possible d'ajouter un masque de sous-réseau au format CIDR (par exemple « /24 »).
 .
 Si vous ne savez pas quoi indiquer, veuillez consulter l'administrateur de votre réseau.
";
$elem["netcfg/get_ipaddress"]["default"]="";
$elem["netcfg/bad_ipaddress"]["type"]="error";
$elem["netcfg/bad_ipaddress"]["description"]="Malformed IP address
 The IP address you provided is malformed. It should be in the form
 x.x.x.x where each 'x' is no larger than 255 (an IPv4 address), or a
 sequence of blocks of hexadecimal digits separated by colons (an IPv6
 address). Please try again.
";
$elem["netcfg/bad_ipaddress"]["descriptionde"]="Ungültige IP-Adresse
 Die von Ihnen angegebene IP-Adresse ist ungültig. Sie sollte entweder die Form x.x.x.x haben, wobei jedes »x« kleiner als 255 sein muss (als IPv4-Adresse), oder eine Folge von hexadezimalen Ziffern sein, getrennt durch Doppelpunkte (als IPv6-Adresse). Bitte versuchen Sie es noch einmal.
";
$elem["netcfg/bad_ipaddress"]["descriptionfr"]="Adresse IP mal formée
 L'adresse IP que vous avez donnée est mal formée. Son format doit être x.x.x.x où chaque x est inférieur ou égal à 255 (adresse IPv4) ou une séquence de blocs de caractères hexadécimaux séparés par des caractères « deux-points » (adresse IPv6). Veuillez réessayer.
";
$elem["netcfg/bad_ipaddress"]["default"]="";
$elem["netcfg/get_pointopoint"]["type"]="string";
$elem["netcfg/get_pointopoint"]["description"]="Point-to-point address:
 The point-to-point address is used to determine the other endpoint of the
 point to point network.  Consult your network administrator if you do not
 know the value.  The point-to-point address should be entered as four numbers
 separated by periods.
";
$elem["netcfg/get_pointopoint"]["descriptionde"]="Punkt-zu-Punkt-Adresse:
 Die Punkt-zu-Punkt-Adresse dient zur Festlegung des anderen Endpunkts des Punkt-zu-Punkt-Netzwerks. Wenn Sie die Adresse nicht kennen, fragen Sie Ihren Netzwerkadministrator. Die Punkt-zu-Punkt-Adresse sollte als Gruppe aus vier Zahlen, getrennt durch Punkte, eingegeben werden.
";
$elem["netcfg/get_pointopoint"]["descriptionfr"]="Adresse point-à-point :
 L'adresse point-à-point sert à déterminer le point terminal d'un réseau point-à-point. Si vous ne connaissez pas cette valeur, consultez votre administrateur. L'adresse point-à-point est une série de quatre nombres séparés par des points.
";
$elem["netcfg/get_pointopoint"]["default"]="";
$elem["netcfg/get_netmask"]["type"]="string";
$elem["netcfg/get_netmask"]["description"]="Netmask:
 The netmask is used to determine which machines are local to your
 network.  Consult your network administrator if you do not know the
 value.  The netmask should be entered as four numbers separated by
 periods.
";
$elem["netcfg/get_netmask"]["descriptionde"]="Netzmaske:
 Durch die Netzmaske kann bestimmt werden, welche Rechner im lokalen Netzwerk direkt angesprochen werden können. Wenn Sie diesen Wert nicht kennen, fragen Sie Ihren Netzwerkadministrator. Die Netzmaske besteht aus vier durch Punkte getrennte Zahlen.
";
$elem["netcfg/get_netmask"]["descriptionfr"]="Valeur du masque-réseau :
 Le masque-réseau sert à déterminer les machines locales du réseau. Si vous ne connaissez pas cette valeur, consultez votre administrateur. Le masque-réseau est une série de quatre nombres séparés par des points.
";
$elem["netcfg/get_netmask"]["default"]="";
$elem["netcfg/get_gateway"]["type"]="string";
$elem["netcfg/get_gateway"]["description"]="Gateway:
 The gateway is an IP address (four numbers separated by periods) that
 indicates the gateway router, also known as the default router.  All
 traffic that goes outside your LAN (for instance, to the Internet) is
 sent through this router.  In rare circumstances, you may have no
 router; in that case, you can leave this blank.  If you don't know
 the proper answer to this question, consult your network
 administrator.
";
$elem["netcfg/get_gateway"]["descriptionde"]="Gateway:
 Geben Sie hier die IP-Adresse (vier durch Punkte getrennte Zahlen) des Gateways ein, auch als Default-Router bekannt. Alle Daten zu Rechnern außerhalb Ihres LAN (zum Beispiel zum Internet) werden über diesen Router gesendet. In seltenen Fällen haben Sie keinen Router, in diesem Fall geben Sie hier einfach nichts ein. Wenn Sie die richtige Antwort hier nicht kennen, fragen Sie Ihren Netzwerkadministrator.
";
$elem["netcfg/get_gateway"]["descriptionfr"]="Passerelle :
 La passerelle est une adresse IP (quatre nombres séparés par des points) qui indique la machine qui joue le rôle de routeur ; cette machine est aussi appelée le routeur par défaut. Tout le trafic qui sort du réseau (p. ex. vers Internet) passe par ce routeur. Dans quelques rares circonstances, vous n'avez pas besoin de routeur. Si c'est le cas, vous pouvez laisser ce champ vide. Consultez votre administrateur si vous ne connaissez pas la réponse correcte à cette question.
";
$elem["netcfg/get_gateway"]["default"]="";
$elem["netcfg/gateway_unreachable"]["type"]="error";
$elem["netcfg/gateway_unreachable"]["description"]="Unreachable gateway
 The gateway address you entered is unreachable.
 .
 You may have made an error entering your IP address, netmask and/or
 gateway.
";
$elem["netcfg/gateway_unreachable"]["descriptionde"]="Gateway nicht erreichbar
 Das angegebene Gateway ist nicht erreichbar.
 .
 Sie haben vielleicht bei der Eingabe Ihrer IP-Adresse, der Netzmaske und/oder des Gateways einen Fehler gemacht.
";
$elem["netcfg/gateway_unreachable"]["descriptionfr"]="Passerelle inaccessible
 La passerelle indiquée n'est pas accessible.
 .
 Il se peut que vous ayez mal indiqué l'adresse IP, le masque-réseau ou la passerelle.
";
$elem["netcfg/gateway_unreachable"]["default"]="";
$elem["netcfg/no_ipv6_pointopoint"]["type"]="error";
$elem["netcfg/no_ipv6_pointopoint"]["description"]="IPv6 unsupported on point-to-point links
 IPv6 addresses cannot be configured on point-to-point links.  Please use an
 IPv4 address, or go back and select a different network interface.
";
$elem["netcfg/no_ipv6_pointopoint"]["descriptionde"]="IPv6 für Punkt-zu-Punkt-Verbindungen nicht unterstützt
 IPv6-Adressen können für Punkt-zu-Punkt-Verbindungen nicht konfiguriert werden. Bitte verwenden Sie eine IPv4-Adresse oder gehen Sie zurück und wählen Sie eine andere Netzwerk-Schnittstelle.
";
$elem["netcfg/no_ipv6_pointopoint"]["descriptionfr"]="Pas de gestion IPv6 sur les liaisons point à point
 Les adresses IPv6 ne peuvent pas être configurées sur les liaisons point à point. Veuillez utiliser une adresse IPv4 ou revenir en arrière et choisir une autre interface réseau.
";
$elem["netcfg/no_ipv6_pointopoint"]["default"]="";
$elem["netcfg/confirm_static"]["type"]="boolean";
$elem["netcfg/confirm_static"]["description"]="Is this information correct?
 Currently configured network parameters:
 .
  interface     = ${interface}
  ipaddress     = ${ipaddress}
  netmask       = ${netmask}
  gateway       = ${gateway}
  pointopoint   = ${pointopoint}
  nameservers   = ${nameservers}
";
$elem["netcfg/confirm_static"]["descriptionde"]="Sind diese Informationen richtig?
 Gegenwärtig konfigurierte Netzwerk-Parameter:
 .
  Schnittstelle  = ${interface}
  IP-Adresse     = ${ipaddress}
  Netzmaske      = ${netmask}
  Gateway        = ${gateway}
  pointopoint    = ${pointopoint}
  Nameserver     = ${nameservers}
";
$elem["netcfg/confirm_static"]["descriptionfr"]="Les informations suivantes sont-elles correctes ?
 Paramètres réseau actuels :
 .
   interface         = ${interface}
   adresse IP        = ${ipaddress}
   masque-réseau     = ${netmask}
   passerelle        = ${gateway}
   point-à-point     = ${pointopoint}
   serveurs de noms  = ${nameservers}
";
$elem["netcfg/confirm_static"]["default"]="true";
$elem["debian-installer/netcfg-static/title"]["type"]="text";
$elem["debian-installer/netcfg-static/title"]["description"]="Configure a network using static addressing
";
$elem["debian-installer/netcfg-static/title"]["descriptionde"]="Netzwerk unter Verwendung statischer Adressierung konfigurieren
";
$elem["debian-installer/netcfg-static/title"]["descriptionfr"]="Configurer manuellement le réseau
";
$elem["debian-installer/netcfg-static/title"]["default"]="";
$elem["debian-installer/network-preseed/title"]["type"]="text";
$elem["debian-installer/network-preseed/title"]["description"]="Download debconf preconfiguration file
";
$elem["debian-installer/network-preseed/title"]["descriptionde"]="Debconf-Vorkonfigurationsdatei herunterladen
";
$elem["debian-installer/network-preseed/title"]["descriptionfr"]="Télécharger un fichier de préconfiguration
";
$elem["debian-installer/network-preseed/title"]["default"]="";
$elem["preseed/url"]["type"]="string";
$elem["preseed/url"]["description"]="Location of initial preconfiguration file:
 In order to perform an automated install, you need to supply a
 preconfiguration file (which can in turn pull in other files).
 To do that, you need to provide a (perhaps partial) URL.
 .
 This can be as simple as the machine name where your preseed
 files reside up to a full URL. Any of these could be made to work:
   intra		[for example.com, these three are equivalent]
   intra.example.com
   http://intra.example.com/d-i/./lenny/preseed.cfg
   http://192.168.0.1/~phil/test47.txt
   floppy://preseed.cfg
   file:///hd-media/kiosk/./preseed.cfg
 .
 For fully automated installs, preseed/url should itself be preseeded
 (via kernel command line, DHCP, or syslinux.cfg on customised media)
 .
 See http://wiki.debian.org/DebianInstaller/Preseed for inspiration.
";
$elem["preseed/url"]["descriptionde"]="Speicherort der ersten Vorkonfigurationsdatei:
 Um eine automatisierte Installation durchzuführen, müssen Sie eine Vorkonfigurationsdatei bereitstellen (die dann wiederum weitere Dateien integrieren kann). Dazu müssen Sie eine (nicht zwingend vollständige) URL angeben.
 .
 Dies kann einfach nur der Rechnername sein, auf dem Ihre Vorkonfigurationsdatei liegt, oder eine vollständige URL. Jede der folgenden Varianten könnte funktionieren:
   intra		[für example.com, diese ersten drei sind gleichbedeutend]
   intra.example.com
   http://intra.example.com/d-i/./squeeze/preseed.cfg
   http://192.168.0.1/~phil/test47.txt
   floppy://preseed.cfg
   file:///hd-media/kiosk/./preseed.cfg
 .
 Für vollständig automatisierte Installationen sollte auch preseed/url vorkonfiguriert sein (über Kernel-Parameter, DHCP oder, bei selbst angepasstem Installationsmedium, syslinux.cfg).
 .
 Auf http://wiki.debian.org/DebianInstaller/Preseed können Sie sich weitere Ideen holen.
";
$elem["preseed/url"]["descriptionfr"]="Emplacement du fichier initial de préconfiguration :
 Afin d'effectuer une installation automatisée, il est nécessaire d'indiquer un fichier de préconfiguration (qui peut lui-même faire référence à d'autres fichiers). Pour cela, veuillez indiquer une URL (éventuellement partielle).
 .
 Cela peut aller du simple nom d'une machine qui héberge les fichiers de préconfiguration jusqu'à une URL complète. Par exemple :
   intra		[pour example.com, les trois sont équivalents]
   intra.example.com
   http://intra.example.com/d-i/./lenny/preseed.cfg
   http://192.168.0.1/~phil/test47.txt
   floppy://preseed.cfg
   file:///hd-media/kiosk/./preseed.cfg
 .
 Pour une installation totalement automatisée, la valeur preseed/url peut elle-même être préconfigurée (à la ligne de commande du noyau, par le DHCP ou syslinux.cfg sur un support personnalisé).
 .
 Vous pouvez consulter http://wiki.debian.org/DebianInstaller/Preseed pour vous inspirer d'exemples.
";
$elem["preseed/url"]["default"]="";
$elem["preseed/url/checksum"]["type"]="string";
$elem["preseed/url/checksum"]["description"]="for internal use; can be preseeded
 Optional md5sum (or sums) for the preconfiguration files

";
$elem["preseed/url/checksum"]["descriptionde"]="";
$elem["preseed/url/checksum"]["descriptionfr"]="";
$elem["preseed/url/checksum"]["default"]="";
$elem["auto-install/enable"]["type"]="boolean";
$elem["auto-install/enable"]["description"]="for internal use; can be preseeded
 If true, attempt a fully automatic install

";
$elem["auto-install/enable"]["descriptionde"]="";
$elem["auto-install/enable"]["descriptionfr"]="";
$elem["auto-install/enable"]["default"]="false";
$elem["auto-install/defaultroot"]["type"]="string";
$elem["auto-install/defaultroot"]["description"]="for internal use; can be preseeded
 Path added to local server to give the preseed root

";
$elem["auto-install/defaultroot"]["descriptionde"]="";
$elem["auto-install/defaultroot"]["descriptionfr"]="";
$elem["auto-install/defaultroot"]["default"]="d-i/xenial/./preseed.cfg";
$elem["partman-auto-crypto/text/choice"]["type"]="text";
$elem["partman-auto-crypto/text/choice"]["description"]="Guided - use entire disk and set up encrypted LVM
";
$elem["partman-auto-crypto/text/choice"]["descriptionde"]="Geführt - gesamte Platte mit verschlüsseltem LVM
";
$elem["partman-auto-crypto/text/choice"]["descriptionfr"]="Assisté - utiliser tout un disque avec LVM chiffré
";
$elem["partman-auto-crypto/text/choice"]["default"]="";
$elem["partman-auto-loop/unclean_ntfs"]["type"]="error";
$elem["partman-auto-loop/unclean_ntfs"]["description"]="NTFS partition not cleanly unmounted
 The NTFS partition was not cleanly unmounted.  This probably indicates that
 the system was not shut down properly.  Please run \"chkdsk /r\" from
 Windows; once that is fixed you should be able to resume the installation.
 Press OK to reboot.

";
$elem["partman-auto-loop/unclean_ntfs"]["descriptionde"]="";
$elem["partman-auto-loop/unclean_ntfs"]["descriptionfr"]="";
$elem["partman-auto-loop/unclean_ntfs"]["default"]="";
$elem["partman-auto-loop/unclean_host"]["type"]="error";
$elem["partman-auto-loop/unclean_host"]["description"]="Loop-mounted file systems already present
 The selected partition (partition ${PARTITION} of ${DISK}) already contains
 the following file system images:
 .
 ${IMAGES}
 .
 Please uninstall these before trying again.

";
$elem["partman-auto-loop/unclean_host"]["descriptionde"]="";
$elem["partman-auto-loop/unclean_host"]["descriptionfr"]="";
$elem["partman-auto-loop/unclean_host"]["default"]="";
$elem["partman-auto-lvm/text/choice"]["type"]="text";
$elem["partman-auto-lvm/text/choice"]["description"]="Guided - use entire disk and set up LVM
";
$elem["partman-auto-lvm/text/choice"]["descriptionde"]="Geführt - gesamte Platte verwenden und LVM einrichten
";
$elem["partman-auto-lvm/text/choice"]["descriptionfr"]="Assisté - utiliser tout un disque avec LVM
";
$elem["partman-auto-lvm/text/choice"]["default"]="";
$elem["partman-auto-lvm/new_vg_name"]["type"]="string";
$elem["partman-auto-lvm/new_vg_name"]["description"]="Name of the volume group for the new system:
";
$elem["partman-auto-lvm/new_vg_name"]["descriptionde"]="Name der Volume-Gruppe für das neue System:
";
$elem["partman-auto-lvm/new_vg_name"]["descriptionfr"]="Nom du groupe de volumes pour le nouveau système :
";
$elem["partman-auto-lvm/new_vg_name"]["default"]="";
$elem["partman-auto-lvm/new_vg_name_exists"]["type"]="string";
$elem["partman-auto-lvm/new_vg_name_exists"]["description"]="Name of the volume group for the new system:
 The selected volume group name is already in use. Please choose
 another name.
";
$elem["partman-auto-lvm/new_vg_name_exists"]["descriptionde"]="Name der Volume-Gruppe für das neue System:
 Der angegebene Name der Volume-Gruppe wird bereits verwendet. Bitte wählen Sie einen anderen Namen.
";
$elem["partman-auto-lvm/new_vg_name_exists"]["descriptionfr"]="Nom du groupe de volumes pour le nouveau système :
 Le nom choisi pour ce groupe de volumes existe déjà. Veuillez choisir un autre nom.
";
$elem["partman-auto-lvm/new_vg_name_exists"]["default"]="";
$elem["partman-auto-lvm/unusable_recipe"]["type"]="error";
$elem["partman-auto-lvm/unusable_recipe"]["description"]="Failed to partition the selected disk
 This happened because the selected recipe does not contain any partition
 that can be created on LVM volumes.
";
$elem["partman-auto-lvm/unusable_recipe"]["descriptionde"]="Die gewählte Festplatte konnte nicht partitioniert werden.
 Dies geschah, da das gewählte Rezept keine Partition enthält, die auf LVM-Volumes erzeugt werden kann.
";
$elem["partman-auto-lvm/unusable_recipe"]["descriptionfr"]="Échec du partitionnement du disque choisi
 Cet échec est probablement dû à un schéma de partitionnement sans partition à créer sur les volumes LVM.
";
$elem["partman-auto-lvm/unusable_recipe"]["default"]="";
$elem["partman-auto-lvm/no_boot"]["type"]="boolean";
$elem["partman-auto-lvm/no_boot"]["description"]="Continue installation without /boot partition?
 The recipe you selected does not contain a separate partition for /boot.
 This is normally needed to allow you to boot the system when using LVM.
 .
 You can choose to ignore this warning, but that may result in a failure to
 reboot the system after the installation is completed.
";
$elem["partman-auto-lvm/no_boot"]["descriptionde"]="Mit der Installation ohne /boot-Partition fortfahren?
 Das von Ihnen gewählte Rezept enthält keine separate Partition für /boot. Diese wird normalerweise benötigt, um Ihnen das Booten des Systems zu ermöglichen, wenn LVM verwendet wird.
 .
 Sie können diese Warnung ignorieren, aber dies kann zu einem Fehler beim Neustarten des Systems, nachdem die Installation abgeschlossen wurde, führen.
";
$elem["partman-auto-lvm/no_boot"]["descriptionfr"]="Voulez-vous continuer sans partition /boot ?
 Le schéma de partitionnement choisi ne comporte pas de partition distincte pour /boot, normalement indispensable au démarrage d'un système qui utilise LVM.
 .
 Vous pouvez ignorer cet avertissement mais cela peut rendre le système incapable de démarrer après l'installation.
";
$elem["partman-auto-lvm/no_boot"]["default"]="";
$elem["partman-auto-lvm/vg_exists"]["type"]="error";
$elem["partman-auto-lvm/vg_exists"]["description"]="Volume group name already in use
 The volume group name used to automatically partition using LVM is already
 in use. Lowering the priority for configuration questions will allow you
 to specify an alternative name.
";
$elem["partman-auto-lvm/vg_exists"]["descriptionde"]="Der Name der Volume-Gruppe wird bereits verwendet
 Der Name der Volume-Gruppe für die automatische Partitionierung mit LVM wird bereits verwendet. Eine Verringerung der Priorität der Konfigurationsfragen wird es Ihnen erlauben, einen anderen Namen anzugeben.
";
$elem["partman-auto-lvm/vg_exists"]["descriptionfr"]="Nom de groupe de volumes déjà utilisé
 Le nom de groupes de volumes utilisé pour le partitionnement automatique avec LVM est déjà utilisé. Vous pouvez choisir vous-même un autre nom en diminuant la priorité des questions de configuration.
";
$elem["partman-auto-lvm/vg_exists"]["default"]="";
$elem["partman-auto-lvm/vg_create_error"]["type"]="error";
$elem["partman-auto-lvm/vg_create_error"]["description"]="Unexpected error while creating volume group
 Autopartitioning using LVM failed because an error occurred while creating
 the volume group.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
";
$elem["partman-auto-lvm/vg_create_error"]["descriptionde"]="Unerwarteter Fehler beim Erstellen einer Volume-Gruppe
 Die automatische Partitionierung mit LVM ist fehlgeschlagen, da ein Fehler beim Erzeugen der Volume-Gruppe auftrat.
 .
 Schauen Sie in /var/log/syslog oder auf die vierte virtuelle Konsole bezüglich detaillierter Informationen.
";
$elem["partman-auto-lvm/vg_create_error"]["descriptionfr"]="Erreur inattendue lors de la création du groupe de volumes
 Le partitionnement automatique avec LVM a échoué car une erreur s'est produite lors de la création du groupe de volumes.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
";
$elem["partman-auto-lvm/vg_create_error"]["default"]="";
$elem["partman-auto-lvm/text/multiple_disks"]["type"]="text";
$elem["partman-auto-lvm/text/multiple_disks"]["description"]="Multiple disks (%s)
";
$elem["partman-auto-lvm/text/multiple_disks"]["descriptionde"]="Mehrere Platten (%s)
";
$elem["partman-auto-lvm/text/multiple_disks"]["descriptionfr"]="Disques multiples (%s)
";
$elem["partman-auto-lvm/text/multiple_disks"]["default"]="";
$elem["partman-auto-lvm/no_such_pv"]["type"]="error";
$elem["partman-auto-lvm/no_such_pv"]["description"]="Non-existing physical volume
 A volume group definition contains a reference to a non-existing
 physical volume.
 .
 Please check that all devices are properly connected.
 Alternatively, please check the automatic partitioning recipe.
";
$elem["partman-auto-lvm/no_such_pv"]["descriptionde"]="Nicht-existierendes physikalisches Volume
 Eine Volume-Gruppen-Definition enthält eine Referenz auf ein nicht-existierendes physikalisches Volume.
 .
 Bitte überprüfen Sie, ob alle Geräte korrekt angeschlossen sind. Alternativ überprüfen Sie bitte das automatische Partitionierungsrezept.
";
$elem["partman-auto-lvm/no_such_pv"]["descriptionfr"]="Volume physique inexistant
 La définition d'un groupe de volume contient une référence à un volume physique inexistant.
 .
 Veuillez contrôler que tous les périphériques sont correctement connectés. Vous devriez également vérifier le schéma de partitionnement automatique.
";
$elem["partman-auto-lvm/no_such_pv"]["default"]="";
$elem["partman-auto-lvm/no_pv_in_vg"]["type"]="error";
$elem["partman-auto-lvm/no_pv_in_vg"]["description"]="No physical volume defined in volume group
 The automatic partitioning recipe contains the definition of a
 volume group that does not contain any physical volume.
 .
 Please check the automatic partitioning recipe.
";
$elem["partman-auto-lvm/no_pv_in_vg"]["descriptionde"]="Kein physikalisches Volume in der Volume-Gruppe definiert
 Das automatische Partitionierungsrezept enthält die Definition einer Volume-Gruppe, die kein einziges physikalisches Volume enthält.
 .
 Überprüfen Sie das automatische Partitionierungsrezept.
";
$elem["partman-auto-lvm/no_pv_in_vg"]["descriptionfr"]="Pas de volume physique défini dans le groupe de volumes
 Le schéma de partitionnement automatique comporte une définition de groupe de volumes qui ne contient aucun volume physique.
 .
 Veuillez vérifier le schéma de partitionnement automatique.
";
$elem["partman-auto-lvm/no_pv_in_vg"]["default"]="";
$elem["partman-auto-lvm/guided_size"]["type"]="string";
$elem["partman-auto-lvm/guided_size"]["description"]="Amount of volume group to use for guided partitioning:
 You may use the whole volume group for guided partitioning, or part of it.
 If you use only part of it, or if you add more disks later, then you will
 be able to grow logical volumes later using the LVM tools, so using a
 smaller part of the volume group at installation time may offer more
 flexibility.
 .
 The minimum size of the selected partitioning recipe is ${MINSIZE} (or
 ${PERCENT}); please note that the packages you choose to install may
 require more space than this. The maximum available size is ${MAXSIZE}.
 .
 Hint: \"max\" can be used as a shortcut to specify the maximum size, or
 enter a percentage (e.g. \"20%\") to use that percentage of the maximum size.
";
$elem["partman-auto-lvm/guided_size"]["descriptionde"]="Zu nutzender Anteil der Volume Group für die geführte Partitionierung:
 Sie können die gesamte Volume Group oder einen Teil für die geführte Partitionierung verwenden. Wenn Sie nur einen Teil verwenden oder später neue Platten hinzufügen, können sie die virtuellen Partitionen mit den LVM-Tools vergrößern, also kann die Benutzung eines kleineren Teils der Volume Group zur Zeit der Installation zu mehr Flexibilität führen.
 .
 Die minimale Größe des gewählten Partitionierungsrezeptes ist ${MINSIZE} (oder ${PERCENT}). Bitte beachten Sie, dass die Pakete, die Sie installieren, mehr Platz als diesen in Anspruch nehmen können. Die maximal verfügbare Größe ist ${MAXSIZE}.
 .
 Tipp: »max« kann als Kürzel verwendet werden, um die maximale Größe anzugeben. Alternativ kann eine prozentuale Angabe (z.B. »20%«) erfolgen, um die Größe relativ zum Maximum anzugeben.
";
$elem["partman-auto-lvm/guided_size"]["descriptionfr"]="Quantité d'espace sur le groupe de volumes pour le partionnement assisté :
 Vous pouvez utiliser la totalité ou une partie de l'espace du groupe de volumes pour le partitionnement assisté. Si vous en utilisez seulement une partie ou si vous ajoutez des disques ultérieurement, vous pourrez alors agrandir les volumes logiques grâce aux outils de LVM. L'utilisation partielle de l'espace du groupe de volume lors de l'installation vous apportera donc plus de flexibilité par la suite.
 .
 La taille minimale de la partition sélectionnée est ${MINSIZE} (ou ${PERCENT}) ; notez bien que les paquets choisis pour installation peuvent occuper plus de place que cela. La taille maximale disponible est ${MAXSIZE}.
 .
 Il est possible d'utiliser « max » comme méthode simplifiée pour choisir la taille maximale ou d'indiquer un pourcentage (p. ex. « 20% ») pour utiliser ce pourcentage de la taille maximale.
";
$elem["partman-auto-lvm/guided_size"]["default"]="some number";
$elem["partman-auto-lvm/bad_guided_size"]["type"]="error";
$elem["partman-auto-lvm/bad_guided_size"]["description"]="Invalid input
 You entered \"${INPUT}\", which was not recognized as a valid size.
";
$elem["partman-auto-lvm/bad_guided_size"]["descriptionde"]="Ungültige Eingabe
 \"${INPUT}\" wurde eingegeben, was nicht als gültige Größe erkannt wurde.
";
$elem["partman-auto-lvm/bad_guided_size"]["descriptionfr"]="Saisie incorrecte
 Vous avez saisi « ${INPUT} », ce qui n'est pas une taille valable.
";
$elem["partman-auto-lvm/bad_guided_size"]["default"]="";
$elem["partman-auto-lvm/big_guided_size"]["type"]="error";
$elem["partman-auto-lvm/big_guided_size"]["description"]="${SIZE} is too big
 You asked for ${SIZE} to be used for guided partitioning, but the available
 space is only ${MAXSIZE}.
";
$elem["partman-auto-lvm/big_guided_size"]["descriptionde"]="${SIZE} ist zu groß
 Sie haben angegeben, ${SIZE} für die geführte Partitionierung zu verwenden, es verbleiben aber nur ${MAXSIZE}.
";
$elem["partman-auto-lvm/big_guided_size"]["descriptionfr"]="${SIZE} est trop grand.
 Vous avez demandé à ce que ${SIZE} soient utilisés pour le partitionnement assisté, mais l'espace disponible n'est que de ${MAXSIZE}.
";
$elem["partman-auto-lvm/big_guided_size"]["default"]="";
$elem["partman-auto-lvm/small_guided_size"]["type"]="error";
$elem["partman-auto-lvm/small_guided_size"]["description"]="${SIZE} is too small
 You asked for ${SIZE} to be used for guided partitioning, but the selected
 partitioning recipe requires at least ${MINSIZE}.
";
$elem["partman-auto-lvm/small_guided_size"]["descriptionde"]="${SIZE} ist zu klein
 Sie haben angegeben, ${SIZE} für die geführte Partitionierung zu verwenden, aber das gewählte Partitionierungsrezept erfordert mindestens ${MINSIZE}.
";
$elem["partman-auto-lvm/small_guided_size"]["descriptionfr"]="${SIZE} est trop petit
 Vous avez demandé que ${SIZE} soient utilisés pour le partitionnement assisté, mais la partition sélectionnée nécessite au moins ${MINSIZE}.
";
$elem["partman-auto-lvm/small_guided_size"]["default"]="";
$elem["partman-auto/progress/title"]["type"]="text";
$elem["partman-auto/progress/title"]["description"]="Please wait...
";
$elem["partman-auto/progress/title"]["descriptionde"]="Bitte warten ...
";
$elem["partman-auto/progress/title"]["descriptionfr"]="Veuillez patienter...
";
$elem["partman-auto/progress/title"]["default"]="";
$elem["partman-auto/progress/info"]["type"]="text";
$elem["partman-auto/progress/info"]["description"]="Computing the new partitions...
";
$elem["partman-auto/progress/info"]["descriptionde"]="Berechnen der neuen Partitionen ...
";
$elem["partman-auto/progress/info"]["descriptionfr"]="Calcul des nouvelles partitions...
";
$elem["partman-auto/progress/info"]["default"]="";
$elem["partman-auto/no_recipe"]["type"]="error";
$elem["partman-auto/no_recipe"]["description"]="Failed to partition the selected disk
 This probably happened because the selected disk or free space is too
 small to be automatically partitioned.
";
$elem["partman-auto/no_recipe"]["descriptionde"]="Die gewählte Festplatte konnte nicht partitioniert werden.
 Vermutlich ist die ausgewählte Festplatte oder der ausgewählte freie Speicher nicht groß genug, um automatisch partitioniert zu werden.
";
$elem["partman-auto/no_recipe"]["descriptionfr"]="Échec du partitionnement du disque choisi
 Le disque ou l'espace disponible sont probablement trop petits pour que le partitionnement automatique puisse fonctionner.
";
$elem["partman-auto/no_recipe"]["default"]="";
$elem["partman-auto/autopartitioning_failed"]["type"]="error";
$elem["partman-auto/autopartitioning_failed"]["description"]="Failed to partition the selected disk
 This probably happened because there are too many (primary) partitions in
 the partition table.
";
$elem["partman-auto/autopartitioning_failed"]["descriptionde"]="Die gewählte Festplatte konnte nicht partitioniert werden.
 Vermutlich haben Sie zu viele (primäre) Partitionen in Ihrer Partitionstabelle.
";
$elem["partman-auto/autopartitioning_failed"]["descriptionfr"]="Échec du partitionnement du disque choisi
 Cet échec est probablement dû à un nombre trop important de partitions primaires dans la table des partitions.
";
$elem["partman-auto/autopartitioning_failed"]["default"]="";
$elem["partman-auto/init_automatically_partition"]["type"]="select";
$elem["partman-auto/init_automatically_partition"]["description"]="Partitioning method:
 The installer can guide you through partitioning a disk (using different
 standard schemes) or, if you prefer, you can do it manually. With guided
 partitioning you will still have a chance later to review and customise
 the results.
 .
 If you choose guided partitioning for an entire disk, you will next be
 asked which disk should be used.
";
$elem["partman-auto/init_automatically_partition"]["descriptionde"]="Partitionierungsmethode:
 Der Installer kann Sie durch die Partitionierung einer Festplatte (mit verschiedenen Standardschemata) führen. Wenn Sie möchten, können Sie dies auch von Hand tun. Bei Auswahl der geführten Partitionierung können Sie die Einteilung später noch einsehen und anpassen.
 .
 Falls Sie eine geführte Partitionierung für eine vollständige Platte wählen, werden Sie gleich danach gefragt, welche Platte verwendet werden soll.
";
$elem["partman-auto/init_automatically_partition"]["descriptionfr"]="Méthode de partitionnement :
 Le programme d'installation peut vous assister pour le partitionnement d'un disque (avec plusieurs choix d'organisation). Vous pouvez également effectuer ce partitionnement vous-même. Si vous choisissez le partitionnement assisté, vous aurez la possibilité de vérifier et personnaliser les choix effectués.
 .
 Si vous choisissez le partitionnement assisté pour un disque complet, vous devrez ensuite choisir le disque à partitionner.
";
$elem["partman-auto/init_automatically_partition"]["default"]="";
$elem["partman-auto/disk"]["type"]="string";
$elem["partman-auto/disk"]["description"]="for internal use; can be preseeded
 Device to partition, in either devfs or non format

";
$elem["partman-auto/disk"]["descriptionde"]="";
$elem["partman-auto/disk"]["descriptionfr"]="";
$elem["partman-auto/disk"]["default"]="";
$elem["partman-auto/method"]["type"]="string";
$elem["partman-auto/method"]["description"]="for internal use; can be preseeded
 Method to use for partitioning

";
$elem["partman-auto/method"]["descriptionde"]="";
$elem["partman-auto/method"]["descriptionfr"]="";
$elem["partman-auto/method"]["default"]="";
$elem["partman-auto/automatically_partition"]["type"]="select";
$elem["partman-auto/automatically_partition"]["description"]="Partitioning method:
 If you choose guided partitioning for an entire disk, you will next be
 asked which disk should be used.
";
$elem["partman-auto/automatically_partition"]["descriptionde"]="Partitionierungsmethode:
 Falls Sie eine geführte Partitionierung für eine vollständige Platte wählen, werden Sie gleich danach gefragt, welche Platte verwendet werden soll.
";
$elem["partman-auto/automatically_partition"]["descriptionfr"]="Méthode de partitionnement :
 Si vous choisissez le partitionnement assisté pour un disque complet, vous devrez ensuite choisir le disque à partitionner.
";
$elem["partman-auto/automatically_partition"]["default"]="";
$elem["partman-auto/choose_recipe"]["type"]="select";
$elem["partman-auto/choose_recipe"]["description"]="Partitioning scheme:
 Selected for partitioning:
 .
 ${TARGET}
 .
 The disk can be partitioned using one of several different schemes.
 If you are unsure, choose the first one.
";
$elem["partman-auto/choose_recipe"]["descriptionde"]="Partitionierungsschema:
 Für Partitionierung gewählt:
 .
 ${TARGET}
 .
 Es gibt verschiedene Möglichkeiten, ein Laufwerk zu partitionieren. Wenn Sie sich nicht sicher sind, wählen Sie den ersten Eintrag.
";
$elem["partman-auto/choose_recipe"]["descriptionfr"]="Schéma de partitionnement :
 Disque partitionné :
 .
 ${TARGET}
 .
 Le disque peut être partitionné selon plusieurs schémas. Dans le doute, choisissez le premier.
";
$elem["partman-auto/choose_recipe"]["default"]="";
$elem["partman-auto/unusable_space"]["type"]="error";
$elem["partman-auto/unusable_space"]["description"]="Unusable free space
 Partitioning failed because the chosen free space may not be used.
 There are probably too many (primary) partitions in the partition table.
";
$elem["partman-auto/unusable_space"]["descriptionde"]="Unbrauchbarer, freier Speicher
 Die Partitionierung schlug fehl, da der ausgewählte freie Speicher nicht genutzt werden kann. Vermutlich befinden sich zu viele (primäre) Partitionen in der Partitionstabelle.
";
$elem["partman-auto/unusable_space"]["descriptionfr"]="Espace libre inutilisable
 Le partitionnement a échoué car l'espace libre choisi ne peut pas être utilisé. Il existe probablement trop de partitions primaires dans la table de partitions.
";
$elem["partman-auto/unusable_space"]["default"]="";
$elem["partman-auto/expert_recipe_file"]["type"]="string";
$elem["partman-auto/expert_recipe_file"]["description"]="for internal use; can be preseeded
 File to load for expert recipe

";
$elem["partman-auto/expert_recipe_file"]["descriptionde"]="";
$elem["partman-auto/expert_recipe_file"]["descriptionfr"]="";
$elem["partman-auto/expert_recipe_file"]["default"]="";
$elem["partman-auto/expert_recipe"]["type"]="string";
$elem["partman-auto/expert_recipe"]["description"]="for internal use; can be preseeded
 Expert recipe content

";
$elem["partman-auto/expert_recipe"]["descriptionde"]="";
$elem["partman-auto/expert_recipe"]["descriptionfr"]="";
$elem["partman-auto/expert_recipe"]["default"]="";
$elem["partman-auto/text/automatically_partition"]["type"]="text";
$elem["partman-auto/text/automatically_partition"]["description"]="Guided partitioning
";
$elem["partman-auto/text/automatically_partition"]["descriptionde"]="Geführte Partitionierung
";
$elem["partman-auto/text/automatically_partition"]["descriptionfr"]="Partitionnement assisté
";
$elem["partman-auto/text/automatically_partition"]["default"]="";
$elem["partman-auto/text/use_biggest_free"]["type"]="text";
$elem["partman-auto/text/use_biggest_free"]["description"]="Guided - use the largest continuous free space
";
$elem["partman-auto/text/use_biggest_free"]["descriptionde"]="Geführt - den größten freien Speicherbereich verwenden
";
$elem["partman-auto/text/use_biggest_free"]["descriptionfr"]="Assisté - utiliser le plus grand espace disponible
";
$elem["partman-auto/text/use_biggest_free"]["default"]="";
$elem["partman-auto/text/use_device"]["type"]="text";
$elem["partman-auto/text/use_device"]["description"]="Guided - use entire disk
";
$elem["partman-auto/text/use_device"]["descriptionde"]="Geführt - vollständige Festplatte verwenden
";
$elem["partman-auto/text/use_device"]["descriptionfr"]="Assisté - utiliser un disque entier
";
$elem["partman-auto/text/use_device"]["default"]="";
$elem["partman-auto/select_disk"]["type"]="select";
$elem["partman-auto/select_disk"]["description"]="Select disk to partition:
 Note that all data on the disk you select will be erased, but not before
 you have confirmed that you really want to make the changes.
";
$elem["partman-auto/select_disk"]["descriptionde"]="Wählen Sie die zu partitionierende Festplatte:
 Beachten Sie, dass alle Daten auf der Festplatte, die Sie wählen, gelöscht werden, jedoch nicht, bevor Sie bestätigt haben, dass Sie die Änderungen wirklich durchführen möchten.
";
$elem["partman-auto/select_disk"]["descriptionfr"]="Disque à partitionner :
 Veuillez noter que toutes les données du disque choisi seront effacées mais pas avant d'avoir confirmé que vous souhaitez réellement effectuer les modifications.
";
$elem["partman-auto/select_disk"]["default"]="";
$elem["partman-auto/text/custom_partitioning"]["type"]="text";
$elem["partman-auto/text/custom_partitioning"]["description"]="Manual
";
$elem["partman-auto/text/custom_partitioning"]["descriptionde"]="Manuell
";
$elem["partman-auto/text/custom_partitioning"]["descriptionfr"]="Manuel
";
$elem["partman-auto/text/custom_partitioning"]["default"]="";
$elem["partman-auto/text/auto_free_space"]["type"]="text";
$elem["partman-auto/text/auto_free_space"]["description"]="Automatically partition the free space
";
$elem["partman-auto/text/auto_free_space"]["descriptionde"]="Freien Speicher automatisch partitionieren
";
$elem["partman-auto/text/auto_free_space"]["descriptionfr"]="Partitionner automatiquement l'espace disponible
";
$elem["partman-auto/text/auto_free_space"]["default"]="";
$elem["partman-auto/text/atomic_scheme"]["type"]="text";
$elem["partman-auto/text/atomic_scheme"]["description"]="All files in one partition (recommended for new users)
";
$elem["partman-auto/text/atomic_scheme"]["descriptionde"]="Alle Dateien auf eine Partition, für Anfänger empfohlen
";
$elem["partman-auto/text/atomic_scheme"]["descriptionfr"]="Tout dans une seule partition (recommandé pour les débutants)
";
$elem["partman-auto/text/atomic_scheme"]["default"]="";
$elem["partman-auto/text/home_scheme"]["type"]="text";
$elem["partman-auto/text/home_scheme"]["description"]="Separate /home partition
";
$elem["partman-auto/text/home_scheme"]["descriptionde"]="Separate /home-Partition
";
$elem["partman-auto/text/home_scheme"]["descriptionfr"]="Partition /home séparée
";
$elem["partman-auto/text/home_scheme"]["default"]="";
$elem["partman-auto/text/multi_scheme"]["type"]="text";
$elem["partman-auto/text/multi_scheme"]["description"]="Separate /home, /var, and /tmp partitions
";
$elem["partman-auto/text/multi_scheme"]["descriptionde"]="";
$elem["partman-auto/text/multi_scheme"]["descriptionfr"]="";
$elem["partman-auto/text/multi_scheme"]["default"]="";
$elem["partman-auto/text/small_disk"]["type"]="text";
$elem["partman-auto/text/small_disk"]["description"]="Small-disk (< 1GB) partitioning scheme
";
$elem["partman-auto/text/small_disk"]["descriptionde"]="Partitionsschema für kleine Platten (< 1GB):
";
$elem["partman-auto/text/small_disk"]["descriptionfr"]="Schéma de partitionnement des petits disques (<1 Go)
";
$elem["partman-auto/text/small_disk"]["default"]="";
$elem["partman-auto/text/resize_use_free"]["type"]="text";
$elem["partman-auto/text/resize_use_free"]["description"]="Guided - resize ${PARTITION} and use freed space
";
$elem["partman-auto/text/resize_use_free"]["descriptionde"]="${PARTITION} verkleinern und den freigewordenen Platz zur Installation nutzen
";
$elem["partman-auto/text/resize_use_free"]["descriptionfr"]="Guidé - redimensionner ${PARTITION} et utiliser l'espace libéré
";
$elem["partman-auto/text/resize_use_free"]["default"]="";
$elem["partman-auto/text/reuse"]["type"]="text";
$elem["partman-auto/text/reuse"]["description"]="Guided - reuse partition, ${PARTITION}

";
$elem["partman-auto/text/reuse"]["descriptionde"]="";
$elem["partman-auto/text/reuse"]["descriptionfr"]="";
$elem["partman-auto/text/reuse"]["default"]="";
$elem["partman-auto/resize_insufficient_space"]["type"]="error";
$elem["partman-auto/resize_insufficient_space"]["description"]="Failed to create enough space for installation
 The resize operation did not create enough free space for the installation.
 Resizing may have failed. You will have to set up partitions manually.
";
$elem["partman-auto/resize_insufficient_space"]["descriptionde"]="Es konnte nicht ausreichend Platz für die Installation erzeugt werden
 Durch die Verkleinerung der Partition konnte nicht ausreichend Platz für eine Installation verfügbar gemacht werden. Möglicherweise ist die Verkleinerung ganz gescheitert. Sie müssen die Festplatte manuell partitionieren.
";
$elem["partman-auto/resize_insufficient_space"]["descriptionfr"]="Pas assez d'espace pour l'installation
 L'opération de redimensionnement n'a pas libéré assez d'espace pour l'installation. Il se peut que le redimensionnement ait échoué. Vous allez devoir configurer vos partitions manuellement.
";
$elem["partman-auto/resize_insufficient_space"]["default"]="";
$elem["partman-auto/text/replace"]["type"]="text";
$elem["partman-auto/text/replace"]["description"]="Guided - use entire partition, ${PARTITION}
";
$elem["partman-auto/text/replace"]["descriptionde"]="Geführt – gesamte Partition verwenden, ${PARTITION}
";
$elem["partman-auto/text/replace"]["descriptionfr"]="Guidé - utiliser toute la partition ${PARTITION}
";
$elem["partman-auto/text/replace"]["default"]="";
$elem["partman/progress/init/title"]["type"]="text";
$elem["partman/progress/init/title"]["description"]="Starting up the partitioner
";
$elem["partman/progress/init/title"]["descriptionde"]="Programm für die Partitionierung wird geladen
";
$elem["partman/progress/init/title"]["descriptionfr"]="Démarrage de l'outil de partitionnement
";
$elem["partman/progress/init/title"]["default"]="";
$elem["partman/progress/init/fallback"]["type"]="text";
$elem["partman/progress/init/fallback"]["description"]="Please wait...
";
$elem["partman/progress/init/fallback"]["descriptionde"]="Bitte warten ...
";
$elem["partman/progress/init/fallback"]["descriptionfr"]="Veuillez patienter...
";
$elem["partman/progress/init/fallback"]["default"]="";
$elem["partman/progress/init/parted"]["type"]="text";
$elem["partman/progress/init/parted"]["description"]="Scanning disks...
";
$elem["partman/progress/init/parted"]["descriptionde"]="Durchsuchen der Festplatten ...
";
$elem["partman/progress/init/parted"]["descriptionfr"]="Analyse des disques...
";
$elem["partman/progress/init/parted"]["default"]="";
$elem["partman/progress/init/update_partitions"]["type"]="text";
$elem["partman/progress/init/update_partitions"]["description"]="Detecting file systems...
";
$elem["partman/progress/init/update_partitions"]["descriptionde"]="Ermitteln der Dateisysteme ...
";
$elem["partman/progress/init/update_partitions"]["descriptionfr"]="Détection des systèmes de fichiers...
";
$elem["partman/progress/init/update_partitions"]["default"]="";
$elem["partman-base/devicelocked"]["type"]="error";
$elem["partman-base/devicelocked"]["description"]="Device in use
 No modifications can be made to the device ${DEVICE} for the
 following reasons:
 .
 ${MESSAGE}
";
$elem["partman-base/devicelocked"]["descriptionde"]="Gerät wird verwendet
 Das Gerät ${DEVICE} kann aus folgenden Gründen nicht modifiziert werden:
 .
 ${MESSAGE}
";
$elem["partman-base/devicelocked"]["descriptionfr"]="Périphérique  occupé
 Aucune modification ne peut avoir lieu sur le périphérique ${DEVICE} pour les raisons suivantes :
 .
 ${MESSAGE}
";
$elem["partman-base/devicelocked"]["default"]="";
$elem["partman-base/partlocked"]["type"]="error";
$elem["partman-base/partlocked"]["description"]="Partition in use
 No modifications can be made to the partition #${PARTITION} of
 device ${DEVICE} for the following reasons:
 .
 ${MESSAGE}
";
$elem["partman-base/partlocked"]["descriptionde"]="Partition wird verwendet
 Die Partition ${PARTITION} des Geräts ${DEVICE} kann aus folgenden Gründen nicht modifiziert werden:
 .
 ${MESSAGE}
";
$elem["partman-base/partlocked"]["descriptionfr"]="Partition occupée
 Aucune modification ne peut être effectuée sur la partition n° ${PARTITION} de ${DEVICE} pour les raisons suivantes :
 .
 ${MESSAGE}
";
$elem["partman-base/partlocked"]["default"]="";
$elem["partman/exception_handler"]["type"]="select";
$elem["partman/exception_handler"]["description"]="${TYPE}
 ${DESCRIPTION}

";
$elem["partman/exception_handler"]["descriptionde"]="";
$elem["partman/exception_handler"]["descriptionfr"]="";
$elem["partman/exception_handler"]["default"]="";
$elem["partman/exception_handler_note"]["type"]="note";
$elem["partman/exception_handler_note"]["description"]="${TYPE}
 ${DESCRIPTION}

";
$elem["partman/exception_handler_note"]["descriptionde"]="";
$elem["partman/exception_handler_note"]["descriptionfr"]="";
$elem["partman/exception_handler_note"]["default"]="";
$elem["partman/choose_partition"]["type"]="select";
$elem["partman/choose_partition"]["description"]="This is an overview of your currently configured partitions and mount points. Select a partition to modify its settings (file system, mount point, etc.), a free space to create partitions, or a device to initialize its partition table.
";
$elem["partman/choose_partition"]["descriptionde"]="Dies ist eine Übersicht über Ihre konfigurierten Partitionen und Einbindungspunkte. Wählen Sie eine Partition, um Änderungen vorzunehmen (Dateisystem, Einbindungspunkt, usw.), freien Speicher, um Partitionen anzulegen oder ein Gerät, um eine Partitionstabelle zu erstellen.
";
$elem["partman/choose_partition"]["descriptionfr"]="Voici la table des partitions et les points de montage actuellement configurés. Vous pouvez choisir une partition et modifier ses caractéristiques (système de fichiers, point de montage, etc.), un espace libre pour créer une nouvelle partition ou un périphérique pour créer sa table des partitions.
";
$elem["partman/choose_partition"]["default"]="";
$elem["partman/confirm_nochanges"]["type"]="boolean";
$elem["partman/confirm_nochanges"]["description"]="Continue with the installation?
 No partition table changes and no creation of file systems have been planned.
 .
 If you plan on using already created file systems, be aware that existing
 files may prevent the successful installation of the base system.
";
$elem["partman/confirm_nochanges"]["descriptionde"]="Mit der Installation fortfahren?
 Es wurden keine Änderungen der Partitionstabelle oder Dateisysteme festgelegt.
 .
 Wenn Sie ein bereits vorhandenes Dateisystem zur Installation benutzen möchten, beachten Sie bitte, dass die darauf vorhandenen Daten eventuell die Installation behindern.
";
$elem["partman/confirm_nochanges"]["descriptionfr"]="Voulez-vous poursuivre l'installation ?
 Aucune modification des tables de partitions et aucune création de systèmes de fichiers n'ont été planifiées.
 .
 Si vous prévoyez d'utiliser des systèmes de fichiers existants, il est possible que la présence de certains fichiers puisse perturber l'installation du système de base.
";
$elem["partman/confirm_nochanges"]["default"]="false";
$elem["partman/confirm"]["type"]="boolean";
$elem["partman/confirm"]["description"]="Write the changes to disks?
 If you continue, the changes listed below will be written to the disks.
 Otherwise, you will be able to make further changes manually.
 .
 WARNING: This will destroy all data on any partitions you have
 removed as well as on the partitions that are going to be formatted.
 .
 ${ITEMS}
";
$elem["partman/confirm"]["descriptionde"]="Änderungen auf die Festplatten schreiben?
 Wenn Sie fortfahren, werden alle unten aufgeführten Änderungen auf die Festplatte(n) geschrieben. Andernfalls können Sie weitere Änderungen manuell durchführen.
 .
 WARNUNG: Dies zerstört alle Daten auf Partitionen, die Sie entfernt haben sowie auf Partitionen, die formatiert werden sollen.
 .
 ${ITEMS}
";
$elem["partman/confirm"]["descriptionfr"]="Faut-il appliquer les changements sur les disques ?
 Si vous continuez, les modifications affichées seront écrites sur les disques. Dans le cas contraire, vous pourrez faire d'autres modifications.
 .
 ATTENTION : cela détruira toutes les données présentes sur les partitions que vous avez supprimées et sur celles qui seront formatées.
 .
 ${ITEMS}
";
$elem["partman/confirm"]["default"]="false";
$elem["partman/confirm_nooverwrite"]["type"]="boolean";
$elem["partman/confirm_nooverwrite"]["description"]="Write the changes to disks?
 If you continue, the changes listed below will be written to the disks.
 Otherwise, you will be able to make further changes manually.
 .
 ${ITEMS}
";
$elem["partman/confirm_nooverwrite"]["descriptionde"]="Änderungen auf die Festplatten schreiben?
 Wenn Sie fortfahren, werden alle unten aufgeführten Änderungen auf die Festplatte(n) geschrieben. Andernfalls können Sie weitere Änderungen manuell durchführen.
 .
 ${ITEMS}
";
$elem["partman/confirm_nooverwrite"]["descriptionfr"]="Faut-il appliquer les changements sur les disques ?
 Si vous continuez, les modifications affichées seront écrites sur les disques. Dans le cas contraire, vous pourrez faire d'autres modifications.
 .
 ${ITEMS}
";
$elem["partman/confirm_nooverwrite"]["default"]="false";
$elem["partman/text/confirm_item_header"]["type"]="text";
$elem["partman/text/confirm_item_header"]["description"]="The following partitions are going to be formatted:
";
$elem["partman/text/confirm_item_header"]["descriptionde"]="Die folgenden Partitionen werden formatiert:
";
$elem["partman/text/confirm_item_header"]["descriptionfr"]="Les partitions suivantes seront formatées :
";
$elem["partman/text/confirm_item_header"]["default"]="";
$elem["partman/text/confirm_item"]["type"]="text";
$elem["partman/text/confirm_item"]["description"]="partition #${PARTITION} of ${DEVICE} as ${TYPE}
";
$elem["partman/text/confirm_item"]["descriptionde"]="Partition ${PARTITION} auf ${DEVICE} als ${TYPE}
";
$elem["partman/text/confirm_item"]["descriptionfr"]="partition n° ${PARTITION} sur ${DEVICE} de type ${TYPE}
";
$elem["partman/text/confirm_item"]["default"]="";
$elem["partman/text/confirm_unpartitioned_item"]["type"]="text";
$elem["partman/text/confirm_unpartitioned_item"]["description"]="${DEVICE} as ${TYPE}
";
$elem["partman/text/confirm_unpartitioned_item"]["descriptionde"]="${DEVICE} als ${TYPE}
";
$elem["partman/text/confirm_unpartitioned_item"]["descriptionfr"]="${DEVICE} de type ${TYPE}
";
$elem["partman/text/confirm_unpartitioned_item"]["default"]="";
$elem["partman/text/confirm_partitem_header"]["type"]="text";
$elem["partman/text/confirm_partitem_header"]["description"]="The partition tables of the following devices are changed:
";
$elem["partman/text/confirm_partitem_header"]["descriptionde"]="Die Partitionstabellen folgender Geräte wurden geändert:
";
$elem["partman/text/confirm_partitem_header"]["descriptionfr"]="Les tables de partitions des périphériques suivants seront modifiées :
";
$elem["partman/text/confirm_partitem_header"]["default"]="";
$elem["partman/storage_device"]["type"]="select";
$elem["partman/storage_device"]["description"]="What to do with this device:
";
$elem["partman/storage_device"]["descriptionde"]="Wie mit diesem Gerät verfahren:
";
$elem["partman/storage_device"]["descriptionfr"]="Action sur ce périphérique :
";
$elem["partman/storage_device"]["default"]="";
$elem["partman/free_space"]["type"]="select";
$elem["partman/free_space"]["description"]="How to use this free space:
";
$elem["partman/free_space"]["descriptionde"]="Wie mit freiem Speicher verfahren:
";
$elem["partman/free_space"]["descriptionfr"]="Action sur cet espace disponible :
";
$elem["partman/free_space"]["default"]="";
$elem["partman/active_partition"]["type"]="select";
$elem["partman/active_partition"]["description"]="Partition settings:
 You are editing partition #${PARTITION} of ${DEVICE}. ${OTHERINFO} ${DESTROYED}
";
$elem["partman/active_partition"]["descriptionde"]="Partitionseinstellungen:
 Sie bearbeiten Partition ${PARTITION} auf ${DEVICE}. ${OTHERINFO} ${DESTROYED}
";
$elem["partman/active_partition"]["descriptionfr"]="Caractéristiques de la partition :
 Vous modifiez la partition n° ${PARTITION} sur ${DEVICE}. ${OTHERINFO} ${DESTROYED}
";
$elem["partman/active_partition"]["default"]="";
$elem["partman/text/there_is_detected"]["type"]="text";
$elem["partman/text/there_is_detected"]["description"]="This partition is formatted with the ${FILESYSTEM}.
";
$elem["partman/text/there_is_detected"]["descriptionde"]="Die Partition ist als ${FILESYSTEM} formatiert.
";
$elem["partman/text/there_is_detected"]["descriptionfr"]="Cette partition utilise le système de fichiers « ${FILESYSTEM} ».
";
$elem["partman/text/there_is_detected"]["default"]="";
$elem["partman/text/none_detected"]["type"]="text";
$elem["partman/text/none_detected"]["description"]="No existing file system was detected in this partition.
";
$elem["partman/text/none_detected"]["descriptionde"]="Auf dieser Partition wurde kein vorhandenes Dateisystem gefunden.
";
$elem["partman/text/none_detected"]["descriptionfr"]="Aucun système de fichiers n'a été détecté sur cette partition.
";
$elem["partman/text/none_detected"]["default"]="";
$elem["partman/text/destroyed"]["type"]="text";
$elem["partman/text/destroyed"]["description"]="All data in it WILL BE DESTROYED!
";
$elem["partman/text/destroyed"]["descriptionde"]="Alle Daten darauf WERDEN ZERSTÖRT!
";
$elem["partman/text/destroyed"]["descriptionfr"]="Toutes les données qu'elle contient seront EFFACÉES.
";
$elem["partman/text/destroyed"]["default"]="";
$elem["partman/show_partition_chs"]["type"]="note";
$elem["partman/show_partition_chs"]["description"]="The partition starts from ${FROMCHS} and ends at ${TOCHS}.
";
$elem["partman/show_partition_chs"]["descriptionde"]="Die Partition beginnt bei ${FROMCHS} und endet bei ${TOCHS}.
";
$elem["partman/show_partition_chs"]["descriptionfr"]="La partition commence à ${FROMCHS} et se termine à ${TOCHS}.
";
$elem["partman/show_partition_chs"]["default"]="";
$elem["partman/show_free_chs"]["type"]="note";
$elem["partman/show_free_chs"]["description"]="The free space starts from ${FROMCHS} and ends at ${TOCHS}.
";
$elem["partman/show_free_chs"]["descriptionde"]="Der freie Speicher beginnt bei ${FROMCHS} und endet bei ${TOCHS}.
";
$elem["partman/show_free_chs"]["descriptionfr"]="L'espace libre commence à ${FROMCHS} et se termine à ${TOCHS}.
";
$elem["partman/show_free_chs"]["default"]="";
$elem["partman/text/please_wait"]["type"]="text";
$elem["partman/text/please_wait"]["description"]="Please wait...
";
$elem["partman/text/please_wait"]["descriptionde"]="Bitte warten ...
";
$elem["partman/text/please_wait"]["descriptionfr"]="Veuillez patienter...
";
$elem["partman/text/please_wait"]["default"]="";
$elem["partman/text/formatting"]["type"]="text";
$elem["partman/text/formatting"]["description"]="Partitions formatting
";
$elem["partman/text/formatting"]["descriptionde"]="Partitionen formatieren
";
$elem["partman/text/formatting"]["descriptionfr"]="Formatage des partitions
";
$elem["partman/text/formatting"]["default"]="";
$elem["partman/text/processing"]["type"]="text";
$elem["partman/text/processing"]["description"]="Processing...
";
$elem["partman/text/processing"]["descriptionde"]="Verarbeitung ...
";
$elem["partman/text/processing"]["descriptionfr"]="Traitement en cours...
";
$elem["partman/text/processing"]["default"]="";
$elem["partman/text/text_template"]["type"]="text";
$elem["partman/text/text_template"]["description"]="${DESCRIPTION}

";
$elem["partman/text/text_template"]["descriptionde"]="";
$elem["partman/text/text_template"]["descriptionfr"]="";
$elem["partman/text/text_template"]["default"]="";
$elem["partman/text/show_chs"]["type"]="text";
$elem["partman/text/show_chs"]["description"]="Show Cylinder/Head/Sector information
";
$elem["partman/text/show_chs"]["descriptionde"]="Anzeigen der Zylinder-/Kopf-/Sektor-Informationen
";
$elem["partman/text/show_chs"]["descriptionfr"]="Afficher les informations sur les cylindres, têtes et secteurs
";
$elem["partman/text/show_chs"]["default"]="";
$elem["partman/text/finished_with_partition"]["type"]="text";
$elem["partman/text/finished_with_partition"]["description"]="Done setting up the partition
";
$elem["partman/text/finished_with_partition"]["descriptionde"]="Anlegen der Partition beenden
";
$elem["partman/text/finished_with_partition"]["descriptionfr"]="Fin du paramétrage de cette partition
";
$elem["partman/text/finished_with_partition"]["default"]="";
$elem["partman/text/end_the_partitioning"]["type"]="text";
$elem["partman/text/end_the_partitioning"]["description"]="Finish partitioning and write changes to disk
";
$elem["partman/text/end_the_partitioning"]["descriptionde"]="Partitionierung beenden und Änderungen übernehmen
";
$elem["partman/text/end_the_partitioning"]["descriptionfr"]="Terminer le partitionnement et appliquer les changements
";
$elem["partman/text/end_the_partitioning"]["default"]="";
$elem["partman/text/undo_everything"]["type"]="text";
$elem["partman/text/undo_everything"]["description"]="Undo changes to partitions
";
$elem["partman/text/undo_everything"]["descriptionde"]="Änderungen an den Partitionen rückgängig machen
";
$elem["partman/text/undo_everything"]["descriptionfr"]="Annuler les modifications des partitions
";
$elem["partman/text/undo_everything"]["default"]="";
$elem["partman/text/show_chs_free"]["type"]="text";
$elem["partman/text/show_chs_free"]["description"]="Show Cylinder/Head/Sector information
";
$elem["partman/text/show_chs_free"]["descriptionde"]="Anzeigen der Zylinder-/Kopf-/Sektor-Informationen
";
$elem["partman/text/show_chs_free"]["descriptionfr"]="Afficher les informations sur les cylindres, têtes et secteurs
";
$elem["partman/text/show_chs_free"]["default"]="";
$elem["partman/text/dump_partition_info"]["type"]="text";
$elem["partman/text/dump_partition_info"]["description"]="Dump partition info in %s
";
$elem["partman/text/dump_partition_info"]["descriptionde"]="Anzeige der Partitionsinformationen in %s
";
$elem["partman/text/dump_partition_info"]["descriptionfr"]="Exporter les informations de partitionnement sur %s
";
$elem["partman/text/dump_partition_info"]["default"]="";
$elem["partman/text/free_space"]["type"]="text";
$elem["partman/text/free_space"]["description"]="FREE SPACE
";
$elem["partman/text/free_space"]["descriptionde"]="FREIER SPEICHER
";
$elem["partman/text/free_space"]["descriptionfr"]="Espace libre
";
$elem["partman/text/free_space"]["default"]="";
$elem["partman/text/unusable"]["type"]="text";
$elem["partman/text/unusable"]["description"]="unusable
";
$elem["partman/text/unusable"]["descriptionde"]="unben.
";
$elem["partman/text/unusable"]["descriptionfr"]="inutil.
";
$elem["partman/text/unusable"]["default"]="";
$elem["partman/text/primary"]["type"]="text";
$elem["partman/text/primary"]["description"]="primary
";
$elem["partman/text/primary"]["descriptionde"]="primär
";
$elem["partman/text/primary"]["descriptionfr"]="primaire
";
$elem["partman/text/primary"]["default"]="";
$elem["partman/text/logical"]["type"]="text";
$elem["partman/text/logical"]["description"]="logical
";
$elem["partman/text/logical"]["descriptionde"]="logisch
";
$elem["partman/text/logical"]["descriptionfr"]="logique
";
$elem["partman/text/logical"]["default"]="";
$elem["partman/text/pri/log"]["type"]="text";
$elem["partman/text/pri/log"]["description"]="pri/log
";
$elem["partman/text/pri/log"]["descriptionde"]="pri/log
";
$elem["partman/text/pri/log"]["descriptionfr"]="pri/log
";
$elem["partman/text/pri/log"]["default"]="";
$elem["partman/text/number"]["type"]="text";
$elem["partman/text/number"]["description"]="#%s
";
$elem["partman/text/number"]["descriptionde"]="Nr. %s
";
$elem["partman/text/number"]["descriptionfr"]="n° %s
";
$elem["partman/text/number"]["default"]="";
$elem["partman/text/ata_disk"]["type"]="text";
$elem["partman/text/ata_disk"]["description"]="ATA%s (%s)
";
$elem["partman/text/ata_disk"]["descriptionde"]="ATA%s (%s)
";
$elem["partman/text/ata_disk"]["descriptionfr"]="ATA%s (%s)
";
$elem["partman/text/ata_disk"]["default"]="";
$elem["partman/text/ata_partition"]["type"]="text";
$elem["partman/text/ata_partition"]["description"]="ATA%s, partition #%s (%s)
";
$elem["partman/text/ata_partition"]["descriptionde"]="ATA%s, Partition #%s (%s)
";
$elem["partman/text/ata_partition"]["descriptionfr"]="ATA%s, partition n° %s (%s)
";
$elem["partman/text/ata_partition"]["default"]="";
$elem["partman/text/ide_master_disk"]["type"]="text";
$elem["partman/text/ide_master_disk"]["description"]="IDE%s master (%s)
";
$elem["partman/text/ide_master_disk"]["descriptionde"]="IDE%s Master (%s)
";
$elem["partman/text/ide_master_disk"]["descriptionfr"]="IDE%s maître (%s)
";
$elem["partman/text/ide_master_disk"]["default"]="";
$elem["partman/text/ide_slave_disk"]["type"]="text";
$elem["partman/text/ide_slave_disk"]["description"]="IDE%s slave (%s)
";
$elem["partman/text/ide_slave_disk"]["descriptionde"]="IDE%s Slave (%s)
";
$elem["partman/text/ide_slave_disk"]["descriptionfr"]="IDE%s esclave (%s)
";
$elem["partman/text/ide_slave_disk"]["default"]="";
$elem["partman/text/ide_master_partition"]["type"]="text";
$elem["partman/text/ide_master_partition"]["description"]="IDE%s master, partition #%s (%s)
";
$elem["partman/text/ide_master_partition"]["descriptionde"]="IDE%s Master, Partition #%s (%s)
";
$elem["partman/text/ide_master_partition"]["descriptionfr"]="IDE%s maître, partition n° %s (%s)
";
$elem["partman/text/ide_master_partition"]["default"]="";
$elem["partman/text/ide_slave_partition"]["type"]="text";
$elem["partman/text/ide_slave_partition"]["description"]="IDE%s slave, partition #%s (%s)
";
$elem["partman/text/ide_slave_partition"]["descriptionde"]="IDE%s Slave, Partition #%s (%s)
";
$elem["partman/text/ide_slave_partition"]["descriptionfr"]="IDE%s esclave, partition n° %s (%s)
";
$elem["partman/text/ide_slave_partition"]["default"]="";
$elem["partman/text/scsi_disk"]["type"]="text";
$elem["partman/text/scsi_disk"]["description"]="SCSI%s (%s,%s,%s) (%s)
";
$elem["partman/text/scsi_disk"]["descriptionde"]="SCSI%s (%s,%s,%s) (%s)
";
$elem["partman/text/scsi_disk"]["descriptionfr"]="SCSI%s (%s,%s,%s) (%s)
";
$elem["partman/text/scsi_disk"]["default"]="";
$elem["partman/text/scsi_partition"]["type"]="text";
$elem["partman/text/scsi_partition"]["description"]="SCSI%s (%s,%s,%s), partition #%s (%s)
";
$elem["partman/text/scsi_partition"]["descriptionde"]="SCSI%s (%s,%s,%s), Partition #%s (%s)
";
$elem["partman/text/scsi_partition"]["descriptionfr"]="SCSI%s (%s,%s,%s), partition n° %s (%s)
";
$elem["partman/text/scsi_partition"]["default"]="";
$elem["partman/text/scsi_simple_disk"]["type"]="text";
$elem["partman/text/scsi_simple_disk"]["description"]="SCSI%s (%s)
";
$elem["partman/text/scsi_simple_disk"]["descriptionde"]="SCSI%s (%s)
";
$elem["partman/text/scsi_simple_disk"]["descriptionfr"]="SCSI%s (%s)
";
$elem["partman/text/scsi_simple_disk"]["default"]="";
$elem["partman/text/scsi_simple_partition"]["type"]="text";
$elem["partman/text/scsi_simple_partition"]["description"]="SCSI%s, partition #%s (%s)
";
$elem["partman/text/scsi_simple_partition"]["descriptionde"]="SCSI%s, Partition #%s (%s)
";
$elem["partman/text/scsi_simple_partition"]["descriptionfr"]="SCSI%s, partition n° %s (%s)
";
$elem["partman/text/scsi_simple_partition"]["default"]="";
$elem["partman/text/mmc_disk"]["type"]="text";
$elem["partman/text/mmc_disk"]["description"]="MMC/SD card #%s (%s)
";
$elem["partman/text/mmc_disk"]["descriptionde"]="MMC-/SD-Karte #%s (%s)
";
$elem["partman/text/mmc_disk"]["descriptionfr"]="Carte MMC/SD n° %s (%s)
";
$elem["partman/text/mmc_disk"]["default"]="";
$elem["partman/text/mmc_partition"]["type"]="text";
$elem["partman/text/mmc_partition"]["description"]="MMC/SD card #%s, partition #%s (%s)
";
$elem["partman/text/mmc_partition"]["descriptionde"]="MMC-/SD-Karte #%s, Partition #%s (%s)
";
$elem["partman/text/mmc_partition"]["descriptionfr"]="carte MMC/SD n° %s, partition n° %s (%s)
";
$elem["partman/text/mmc_partition"]["default"]="";
$elem["partman/text/raid_device"]["type"]="text";
$elem["partman/text/raid_device"]["description"]="RAID%s device #%s
";
$elem["partman/text/raid_device"]["descriptionde"]="RAID%s Gerät #%s
";
$elem["partman/text/raid_device"]["descriptionfr"]="Périphérique RAID%s n° %s
";
$elem["partman/text/raid_device"]["default"]="";
$elem["partman/text/dmcrypt_volume"]["type"]="text";
$elem["partman/text/dmcrypt_volume"]["description"]="Encrypted volume (%s)
";
$elem["partman/text/dmcrypt_volume"]["descriptionde"]="Verschlüsseltes Volume (%s)
";
$elem["partman/text/dmcrypt_volume"]["descriptionfr"]="Volume chiffré (%s)
";
$elem["partman/text/dmcrypt_volume"]["default"]="";
$elem["partman/text/dmraid_volume"]["type"]="text";
$elem["partman/text/dmraid_volume"]["description"]="Serial ATA RAID %s (%s)
";
$elem["partman/text/dmraid_volume"]["descriptionde"]="Serial ATA RAID %s (%s)
";
$elem["partman/text/dmraid_volume"]["descriptionfr"]="SATA RAID %s (%s)
";
$elem["partman/text/dmraid_volume"]["default"]="";
$elem["partman/text/dmraid_part"]["type"]="text";
$elem["partman/text/dmraid_part"]["description"]="Serial ATA RAID %s (partition #%s)
";
$elem["partman/text/dmraid_part"]["descriptionde"]="Serial ATA RAID %s (Partition %s)
";
$elem["partman/text/dmraid_part"]["descriptionfr"]="SATA RAID %s (partition n° %s)
";
$elem["partman/text/dmraid_part"]["default"]="";
$elem["partman/text/multipath"]["type"]="text";
$elem["partman/text/multipath"]["description"]="Multipath %s (WWID %s)
";
$elem["partman/text/multipath"]["descriptionde"]="Multipath %s (WWID %s)
";
$elem["partman/text/multipath"]["descriptionfr"]="Multichemin %s (WWID %s)
";
$elem["partman/text/multipath"]["default"]="";
$elem["partman/text/multipath_partition"]["type"]="text";
$elem["partman/text/multipath_partition"]["description"]="Multipath %s (partition #%s)
";
$elem["partman/text/multipath_partition"]["descriptionde"]="Multipath %s (Partition %s)
";
$elem["partman/text/multipath_partition"]["descriptionfr"]="Multichemin %s (partition n° %s)
";
$elem["partman/text/multipath_partition"]["default"]="";
$elem["partman/text/lvm_lv"]["type"]="text";
$elem["partman/text/lvm_lv"]["description"]="LVM VG %s, LV %s
";
$elem["partman/text/lvm_lv"]["descriptionde"]="LVM VG %s, LV %s
";
$elem["partman/text/lvm_lv"]["descriptionfr"]="Groupe de volumes LVM %s, volume logique %s
";
$elem["partman/text/lvm_lv"]["default"]="";
$elem["partman/text/zfs_volume"]["type"]="text";
$elem["partman/text/zfs_volume"]["description"]="ZFS pool %s, volume %s
";
$elem["partman/text/zfs_volume"]["descriptionde"]="ZFS-Pool %s, Volume %s
";
$elem["partman/text/zfs_volume"]["descriptionfr"]="pool ZFS %s, volume %s
";
$elem["partman/text/zfs_volume"]["default"]="";
$elem["partman/text/loopback"]["type"]="text";
$elem["partman/text/loopback"]["description"]="Loopback (loop%s)
";
$elem["partman/text/loopback"]["descriptionde"]="Loopback (loop%s)
";
$elem["partman/text/loopback"]["descriptionfr"]="Bouclage (« loopback », loop%s)
";
$elem["partman/text/loopback"]["default"]="";
$elem["partman/text/dasd_disk"]["type"]="text";
$elem["partman/text/dasd_disk"]["description"]="DASD %s (%s)
";
$elem["partman/text/dasd_disk"]["descriptionde"]="DASD %s (%s)
";
$elem["partman/text/dasd_disk"]["descriptionfr"]="DASD %s (%s)
";
$elem["partman/text/dasd_disk"]["default"]="";
$elem["partman/text/dasd_partition"]["type"]="text";
$elem["partman/text/dasd_partition"]["description"]="DASD %s (%s), partition #%s
";
$elem["partman/text/dasd_partition"]["descriptionde"]="DASD %s (%s), Partition #%s
";
$elem["partman/text/dasd_partition"]["descriptionfr"]="DASD %s (%s), partition n° %s
";
$elem["partman/text/dasd_partition"]["default"]="";
$elem["partman/text/virtual_disk"]["type"]="text";
$elem["partman/text/virtual_disk"]["description"]="Virtual disk %s (%s)
";
$elem["partman/text/virtual_disk"]["descriptionde"]="Virtuelle Festplatte %s (%s)
";
$elem["partman/text/virtual_disk"]["descriptionfr"]="Disque virtuel n° %s (%s)
";
$elem["partman/text/virtual_disk"]["default"]="";
$elem["partman/text/virtual_partition"]["type"]="text";
$elem["partman/text/virtual_partition"]["description"]="Virtual disk %s, partition #%s (%s)
";
$elem["partman/text/virtual_partition"]["descriptionde"]="Virtuelle Festplatte %s, Partition %s (%s)
";
$elem["partman/text/virtual_partition"]["descriptionfr"]="Disque virtuel n° %s, partition n° %s (%s)
";
$elem["partman/text/virtual_partition"]["default"]="";
$elem["partman/text/cancel_menu"]["type"]="text";
$elem["partman/text/cancel_menu"]["description"]="Cancel this menu
";
$elem["partman/text/cancel_menu"]["descriptionde"]="Dieses Menü verlassen
";
$elem["partman/text/cancel_menu"]["descriptionfr"]="Annuler ce menu
";
$elem["partman/text/cancel_menu"]["default"]="";
$elem["debian-installer/partman-base/title"]["type"]="text";
$elem["debian-installer/partman-base/title"]["description"]="Partition disks
";
$elem["debian-installer/partman-base/title"]["descriptionde"]="Festplatten partitionieren
";
$elem["debian-installer/partman-base/title"]["descriptionfr"]="Partitionner les disques
";
$elem["debian-installer/partman-base/title"]["default"]="";
$elem["partman/early_command"]["type"]="string";
$elem["partman/early_command"]["description"]="for internal use; can be preseeded
 Shell command or commands to run immediately before partitioning

";
$elem["partman/early_command"]["descriptionde"]="";
$elem["partman/early_command"]["descriptionfr"]="";
$elem["partman/early_command"]["default"]="";
$elem["partman/default_filesystem"]["type"]="string";
$elem["partman/default_filesystem"]["description"]="for internal use; can be preseeded
 Default filesystem used for new partitions

";
$elem["partman/default_filesystem"]["descriptionde"]="";
$elem["partman/default_filesystem"]["descriptionfr"]="";
$elem["partman/default_filesystem"]["default"]="ext4";
$elem["partman/filter_mounted"]["type"]="boolean";
$elem["partman/filter_mounted"]["description"]="for internal use; can be preseeded
 Filter out disks with mounted partitions.

";
$elem["partman/filter_mounted"]["descriptionde"]="";
$elem["partman/filter_mounted"]["descriptionfr"]="";
$elem["partman/filter_mounted"]["default"]="true";
$elem["partman/unmount_active"]["type"]="boolean";
$elem["partman/unmount_active"]["description"]="Unmount partitions that are in use?
 The installer has detected that the following disks have mounted partitions:
 .
 ${DISKS}
 .
 Do you want the installer to try to unmount the partitions on these disks
 before continuing?  If you leave them mounted, you will not be able to
 create, delete, or resize partitions on these disks, but you may be able to
 install to existing partitions there.
";
$elem["partman/unmount_active"]["descriptionde"]="Aktive Partitionen aushängen?
 Das Installationsprogramm hat erkannt, dass folgende Laufwerke eingehängte Partitionen besitzen:
 .
 ${DISKS}
 .
 Möchten Sie, dass das Installationsprogramm versucht, die Partitionen auf diesen Festplatten auszuhängen, bevor Sie fortfahren? Wenn Sie sie eingehängt lassen, werden Sie nicht in der Lage sein, Partitionen auf diesen Festplatten zu erstellen, diese zu löschen oder deren Größe zu ändern, Sie können jedoch auf dort bestehenden Partitionen installieren.
";
$elem["partman/unmount_active"]["descriptionfr"]="Démonter les partitions en cours d'utilisation ?
 L'installateur a détecté que des partitions sur les disques suivants sont montées :
 .
 ${DISKS}
 .
 Voulez-vous que le processus d'installation essaye de démonter les partitions sur ce disque avant de continuer ? Si vous les laissez montées, vous ne pourrez pas créer, supprimer ni redimensionner de partitions sur ce disque, mais vous pourrez peut-être installer le système sur les partitions existantes.
";
$elem["partman/unmount_active"]["default"]="";
$elem["partman/installation_medium_mounted"]["type"]="note";
$elem["partman/installation_medium_mounted"]["description"]="Installation medium on ${PARTITION}
 Your installation medium is on ${PARTITION}. You will not be able to
 create, delete, or resize partitions on this disk, but you may be able to
 install to existing partitions there.

";
$elem["partman/installation_medium_mounted"]["descriptionde"]="";
$elem["partman/installation_medium_mounted"]["descriptionfr"]="";
$elem["partman/installation_medium_mounted"]["default"]="";
$elem["partman/alignment"]["type"]="select";
$elem["partman/alignment"]["choices"][1]="cylinder";
$elem["partman/alignment"]["choices"][2]="minimal";
$elem["partman/alignment"]["description"]="for internal use; can be preseeded
 Adjust the policy for starting and ending alignment of new partitions.  You
 can generally leave this alone unless optimal alignment causes some kind of
 problem.
 .
 Cylinder alignment was required by very old DOS-era systems, and is not
 usually needed nowadays.  However, a few buggy BIOSes may try to calculate
 cylinder/head/sector addresses for partitions and get confused if
 partitions aren't cylinder-aligned.
 .
 Minimal alignment ensures that new partitions are aligned to physical
 blocks on the disk, avoiding performance degradation that may occur with
 cylinder alignment particularly on modern disks.
 .
 Optimal alignment ensures that new partitions are aligned to a suitable
 multiple of the physical block size, guaranteeing optimal performance.

";
$elem["partman/alignment"]["descriptionde"]="";
$elem["partman/alignment"]["descriptionfr"]="";
$elem["partman/alignment"]["default"]="optimal";
$elem["partman-basicfilesystems/progress_checking"]["type"]="text";
$elem["partman-basicfilesystems/progress_checking"]["description"]="Checking the ${TYPE} file system in partition #${PARTITION} of ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_checking"]["descriptionde"]="Prüfen des ${TYPE}-Dateisystems der Partition ${PARTITION} auf ${DEVICE} ...
";
$elem["partman-basicfilesystems/progress_checking"]["descriptionfr"]="Contrôle du système de fichiers ${TYPE} sur la partition n° ${PARTITION} de ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_checking"]["default"]="";
$elem["partman-basicfilesystems/progress_swap_checking"]["type"]="text";
$elem["partman-basicfilesystems/progress_swap_checking"]["description"]="Checking the swap space in partition #${PARTITION} of ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_swap_checking"]["descriptionde"]="Prüfen des Swap-Speichers der Partition ${PARTITION} auf ${DEVICE} ...
";
$elem["partman-basicfilesystems/progress_swap_checking"]["descriptionfr"]="Contrôle de l'espace d'échange sur la partition n° ${PARTITION} de ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_swap_checking"]["default"]="";
$elem["partman-basicfilesystems/progress_formatting"]["type"]="text";
$elem["partman-basicfilesystems/progress_formatting"]["description"]="Creating ${TYPE} file system in partition #${PARTITION} of ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_formatting"]["descriptionde"]="Erzeugen des ${TYPE}-Dateisystems der Partition ${PARTITION} auf ${DEVICE} ...
";
$elem["partman-basicfilesystems/progress_formatting"]["descriptionfr"]="Création du système de fichiers ${TYPE} sur la partition n° ${PARTITION} de ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_formatting"]["default"]="";
$elem["partman-basicfilesystems/progress_formatting_mountable"]["type"]="text";
$elem["partman-basicfilesystems/progress_formatting_mountable"]["description"]="Creating ${TYPE} file system for ${MOUNT_POINT} in partition #${PARTITION} of ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_formatting_mountable"]["descriptionde"]="Erzeugen des ${TYPE}-Dateisystems für ${MOUNT_POINT} in Partition ${PARTITION} auf ${DEVICE} ...
";
$elem["partman-basicfilesystems/progress_formatting_mountable"]["descriptionfr"]="Création du système de fichiers ${TYPE} pour le point de montage ${MOUNT_POINT} sur la partition n° ${PARTITION} de ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_formatting_mountable"]["default"]="";
$elem["partman-basicfilesystems/progress_swap_formatting"]["type"]="text";
$elem["partman-basicfilesystems/progress_swap_formatting"]["description"]="Formatting swap space in partition #${PARTITION} of ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_swap_formatting"]["descriptionde"]="Formatieren des Swap-Speichers in Partition ${PARTITION} auf ${DEVICE} ...
";
$elem["partman-basicfilesystems/progress_swap_formatting"]["descriptionfr"]="Création de l'espace d'échange sur la partition n° ${PARTITION} de ${DEVICE}...
";
$elem["partman-basicfilesystems/progress_swap_formatting"]["default"]="";
$elem["partman-basicfilesystems/check_failed"]["type"]="boolean";
$elem["partman-basicfilesystems/check_failed"]["description"]="Go back to the menu and correct errors?
 The test of the file system with type ${TYPE} in partition #${PARTITION}
 of ${DEVICE} found uncorrected errors.
 .
 If you do not go back to the partitioning menu and correct these errors,
 the partition will be used as is.
";
$elem["partman-basicfilesystems/check_failed"]["descriptionde"]="Zurück zum Hauptmenü und Fehler beheben?
 Bei der Überprüfung des Dateisystems vom Typ ${TYPE} der Partition ${PARTITION} auf ${DEVICE} wurden unkorrigierte Fehler gefunden.
 .
 Wenn Sie nicht zum Partitionierungsmenü zurückkehren und die aufgetretenen Fehler beheben, wird die Partition in ihrem aktuellen Zustand benutzt.
";
$elem["partman-basicfilesystems/check_failed"]["descriptionfr"]="Revenir au menu et corriger les erreurs ?
 Le contrôle du système de fichiers ${TYPE} sur la partition n° ${PARTITION} de ${DEVICE} a mis en évidence des erreurs non corrigées.
 .
 Si vous ne revenez pas au menu de partitionnement pour corriger ces erreurs, cette partition sera utilisée telle quelle.
";
$elem["partman-basicfilesystems/check_failed"]["default"]="";
$elem["partman-basicfilesystems/swap_check_failed"]["type"]="boolean";
$elem["partman-basicfilesystems/swap_check_failed"]["description"]="Go back to the menu and correct errors?
 The test of the swap space in partition #${PARTITION} of ${DEVICE} found
 uncorrected errors.
 .
 If you do not go back to the partitioning menu and correct these errors,
 the partition will be used as is.
";
$elem["partman-basicfilesystems/swap_check_failed"]["descriptionde"]="Zurück zum Hauptmenü und Fehler beheben?
 Bei der Überprüfung des Swap-Speichers der Partition ${PARTITION} auf ${DEVICE} wurden unkorrigierte Fehler gefunden.
 .
 Wenn Sie nicht zum Partitionierungsmenü zurückkehren und die aufgetretenen Fehler beheben, wird die Partition in ihrem aktuellen Zustand benutzt.
";
$elem["partman-basicfilesystems/swap_check_failed"]["descriptionfr"]="Revenir au menu et corriger les erreurs ?
 Le contrôle de l'espace d'échange sur la partition n° ${PARTITION} de ${DEVICE} a mis en évidence des erreurs non corrigées.
 .
 Si vous ne revenez pas au menu de partitionnement pour corriger ces erreurs, cette partition sera utilisée telle quelle.
";
$elem["partman-basicfilesystems/swap_check_failed"]["default"]="";
$elem["partman-basicfilesystems/no_swap"]["type"]="boolean";
$elem["partman-basicfilesystems/no_swap"]["description"]="Do you want to return to the partitioning menu?
 You have not selected any partitions for use as swap space. Enabling swap
 space is recommended so that the system can make better use of the
 available physical memory, and so that it behaves better when physical
 memory is scarce. You may experience installation problems if you do not
 have enough physical memory.
 .
 If you do not go back to the partitioning menu and assign a swap partition,
 the installation will continue without swap space.
";
$elem["partman-basicfilesystems/no_swap"]["descriptionde"]="Möchten Sie zum Partitionierungsmenü zurückkehren?
 Sie haben keine Partition zur Verwendung als Swap-Speicher ausgewählt. Dies wird aber empfohlen, damit der Computer den vorhandenen Arbeitsspeicher effektiver nutzen kann, besonders wenn er knapp ist. Sie könnten Probleme bei der Installation bekommen, wenn Sie nicht genügend physikalischen Speicher haben.
 .
 Wenn Sie nicht zum Partitionierungsmenü zurückkehren und eine Swap-Partition anlegen, wird die Installation ohne Swap-Speicher fortgesetzt.
";
$elem["partman-basicfilesystems/no_swap"]["descriptionfr"]="Souhaitez-vous revenir au menu de partitionnement ?
 Aucune partition n'a été choisie comme espace d'échange. L'activation d'un espace d'échange (« swap ») est recommandée pour que le système utilise au mieux la mémoire physique disponible et se comporte mieux quand elle est limitée. Vous pourriez rencontrer des difficultés lors de l'installation si vous ne disposez pas d'assez de mémoire physique.
 .
 Si vous ne revenez pas au menu de partitionnement pour choisir une partition pour l'espace d'échange, l'installation continuera sans celui-ci.
";
$elem["partman-basicfilesystems/no_swap"]["default"]="true";
$elem["partman-basicfilesystems/create_failed"]["type"]="error";
$elem["partman-basicfilesystems/create_failed"]["description"]="Failed to create a file system
 The ${TYPE} file system creation in partition
 #${PARTITION} of ${DEVICE} failed.
";
$elem["partman-basicfilesystems/create_failed"]["descriptionde"]="Erzeugen eines Dateisystems fehlgeschlagen
 Das Erstellen des Dateisystems ${TYPE} der Partition ${PARTITION} auf ${DEVICE} ist fehlgeschlagen.
";
$elem["partman-basicfilesystems/create_failed"]["descriptionfr"]="Impossible de créer un système de fichiers
 La création du système de fichiers ${TYPE} sur la partition n° ${PARTITION} de ${DEVICE} a échoué.
";
$elem["partman-basicfilesystems/create_failed"]["default"]="";
$elem["partman-basicfilesystems/create_swap_failed"]["type"]="error";
$elem["partman-basicfilesystems/create_swap_failed"]["description"]="Failed to create a swap space
 The creation of swap space in partition #${PARTITION} of ${DEVICE} failed.
";
$elem["partman-basicfilesystems/create_swap_failed"]["descriptionde"]="Erzeugen des Swap-Speichers fehlgeschlagen
 Der Swap-Speicher in Partition ${PARTITION} auf ${DEVICE} konnte nicht erzeugt werden.
";
$elem["partman-basicfilesystems/create_swap_failed"]["descriptionfr"]="Échec de la création de l'espace d'échange
 La création de l'espace d'échange sur la partition n° ${PARTITION} de ${DEVICE} a échoué.
";
$elem["partman-basicfilesystems/create_swap_failed"]["default"]="";
$elem["partman-basicfilesystems/no_mount_point"]["type"]="boolean";
$elem["partman-basicfilesystems/no_mount_point"]["description"]="Do you want to return to the partitioning menu?
 No mount point is assigned for the ${FILESYSTEM} file system in partition
 #${PARTITION} of ${DEVICE}.
 .
 If you do not go back to the partitioning menu and assign a mount point
 from there, this partition will not be used at all.
";
$elem["partman-basicfilesystems/no_mount_point"]["descriptionde"]="Möchten Sie zum Partitionierungsmenü zurückkehren?
 Dem Dateisystem ${FILESYSTEM} der Partition #${PARTITION} auf ${DEVICE} ist kein Einbindungspunkt zugewiesen.
 .
 Wenn Sie nicht zum Partitionierungsmenü zurückkehren und dort einen Einbindungspunkt zuweisen, können Sie die Partition nicht benutzen.
";
$elem["partman-basicfilesystems/no_mount_point"]["descriptionfr"]="Souhaitez-vous revenir au menu de partitionnement ?
 Aucun point de montage n'est affecté au système de fichiers ${FILESYSTEM} de la partition n° ${PARTITION} de ${DEVICE}.
 .
 Si vous ne revenez pas au menu de partitionnement pour affecter un point de montage à cette partition, elle ne sera pas utilisée du tout.
";
$elem["partman-basicfilesystems/no_mount_point"]["default"]="";
$elem["partman-basicfilesystems/posix_filesystem_required"]["type"]="error";
$elem["partman-basicfilesystems/posix_filesystem_required"]["description"]="Invalid file system for this mount point
 The file system type ${FILESYSTEM} cannot be mounted on ${MOUNTPOINT},
 because it is not a fully-functional Unix file system. Please choose a
 different file system, such as ${EXT2}.
";
$elem["partman-basicfilesystems/posix_filesystem_required"]["descriptionde"]="Ungültiges Dateisystem für diesen Einbindungspunkt
 Der Dateisystemtyp ${FILESYSTEM} kann nicht als ${MOUNTPOINT} eingebunden werden, da dies kein voll funktionsfähiges Unix-Dateisystem ist. Bitte wählen Sie ein anderes Dateisystem wie ${EXT2}.
";
$elem["partman-basicfilesystems/posix_filesystem_required"]["descriptionfr"]="Système de fichiers non valable pour ce point de montage
 Un système de fichiers ${FILESYSTEM} ne peut pas être monté sur ${MOUNTPOINT} car il n'offre pas toutes les fonctionnalités d'un système de fichiers Unix. Vous devriez choisir un autre type de système de fichiers comme ${EXT2}.
";
$elem["partman-basicfilesystems/posix_filesystem_required"]["default"]="";
$elem["partman-basicfilesystems/mountpoint"]["type"]="select";
$elem["partman-basicfilesystems/mountpoint"]["choices"][1]="/ - the root file system";
$elem["partman-basicfilesystems/mountpoint"]["choices"][2]="/boot - static files of the boot loader";
$elem["partman-basicfilesystems/mountpoint"]["choices"][3]="/home - user home directories";
$elem["partman-basicfilesystems/mountpoint"]["choices"][4]="/tmp - temporary files";
$elem["partman-basicfilesystems/mountpoint"]["choices"][5]="/usr - static data";
$elem["partman-basicfilesystems/mountpoint"]["choices"][6]="/var - variable data";
$elem["partman-basicfilesystems/mountpoint"]["choices"][7]="/srv - data for services provided by this system";
$elem["partman-basicfilesystems/mountpoint"]["choices"][8]="/opt - add-on application software packages";
$elem["partman-basicfilesystems/mountpoint"]["choices"][9]="/usr/local - local hierarchy";
$elem["partman-basicfilesystems/mountpoint"]["choices"][10]="Enter manually";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][1]="/ - Das Wurzeldateisystem";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][2]="/boot - Statische Dateien des Bootloaders";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][3]="/home - Home-Verzeichnisse der Benutzer";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][4]="/tmp - Temporäre Dateien";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][5]="/usr - Statische Daten";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][6]="/var - Sich ändernde Daten";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][7]="/srv - Daten für Server-Dienste\";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][8]="die bereitgestellt werden";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][9]="/opt - Zusätzliche Anwendungen";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][10]="/usr/local - Lokale Hierarchie";
$elem["partman-basicfilesystems/mountpoint"]["choicesde"][11]="Von Hand angeben";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][1]="/ - système de fichiers racine";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][2]="/boot - fichiers statiques du programme de démarrage";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][3]="/home - répertoires personnels des utilisateurs";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][4]="/tmp - fichiers temporaires";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][5]="/usr - données statiques";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][6]="/var - données variables";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][7]="/srv - données des services fournis par le système";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][8]="/opt - ensembles logiciels additionnels";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][9]="/usr/local - hiérarchie locale";
$elem["partman-basicfilesystems/mountpoint"]["choicesfr"][10]="Autre choix";
$elem["partman-basicfilesystems/mountpoint"]["description"]="Mount point for this partition:
";
$elem["partman-basicfilesystems/mountpoint"]["descriptionde"]="Einbindungspunkt für diese Partition:
";
$elem["partman-basicfilesystems/mountpoint"]["descriptionfr"]="Point de montage pour cette partition :
";
$elem["partman-basicfilesystems/mountpoint"]["default"]="";
$elem["partman-basicfilesystems/fat_mountpoint"]["type"]="select";
$elem["partman-basicfilesystems/fat_mountpoint"]["choices"][1]="/dos";
$elem["partman-basicfilesystems/fat_mountpoint"]["choices"][2]="/windows";
$elem["partman-basicfilesystems/fat_mountpoint"]["choices"][3]="Enter manually";
$elem["partman-basicfilesystems/fat_mountpoint"]["choicesde"][1]="/dos";
$elem["partman-basicfilesystems/fat_mountpoint"]["choicesde"][2]="/windows";
$elem["partman-basicfilesystems/fat_mountpoint"]["choicesde"][3]="Von Hand angeben";
$elem["partman-basicfilesystems/fat_mountpoint"]["choicesfr"][1]="/dos";
$elem["partman-basicfilesystems/fat_mountpoint"]["choicesfr"][2]="/windows";
$elem["partman-basicfilesystems/fat_mountpoint"]["choicesfr"][3]="Autre choix";
$elem["partman-basicfilesystems/fat_mountpoint"]["description"]="Mount point for this partition:
";
$elem["partman-basicfilesystems/fat_mountpoint"]["descriptionde"]="Einbindungspunkt für diese Partition:
";
$elem["partman-basicfilesystems/fat_mountpoint"]["descriptionfr"]="Point de montage pour cette partition :
";
$elem["partman-basicfilesystems/fat_mountpoint"]["default"]="";
$elem["partman-basicfilesystems/mountpoint_manual"]["type"]="string";
$elem["partman-basicfilesystems/mountpoint_manual"]["description"]="Mount point for this partition:
";
$elem["partman-basicfilesystems/mountpoint_manual"]["descriptionde"]="Einbindungspunkt für diese Partition:
";
$elem["partman-basicfilesystems/mountpoint_manual"]["descriptionfr"]="Point de montage pour cette partition :
";
$elem["partman-basicfilesystems/mountpoint_manual"]["default"]="";
$elem["partman-basicfilesystems/bad_mountpoint"]["type"]="error";
$elem["partman-basicfilesystems/bad_mountpoint"]["description"]="Invalid mount point
 The mount point you entered is invalid.
 .
 Mount points must start with \"/\". They cannot contain spaces.
";
$elem["partman-basicfilesystems/bad_mountpoint"]["descriptionde"]="Ungültiger Einbindungspunkt
 Der von Ihnen angegebene Einbindungspunkt ist ungültig.
 .
 Ein Einbindungspunkt muss mit »/« beginnen. Es dürfen keine Leerzeichen verwendet werden.
";
$elem["partman-basicfilesystems/bad_mountpoint"]["descriptionfr"]="Point de montage incorrect
 Le point de montage que vous avez indiqué n'est pas correct.
 .
 Les points de montage doivent commencer par « / » et ne doivent pas contenir d'espaces.
";
$elem["partman-basicfilesystems/bad_mountpoint"]["default"]="";
$elem["partman-basicfilesystems/choose_label"]["type"]="string";
$elem["partman-basicfilesystems/choose_label"]["description"]="Label for the file system in this partition:
";
$elem["partman-basicfilesystems/choose_label"]["descriptionde"]="Name für das Dateisystem auf dieser Partition:
";
$elem["partman-basicfilesystems/choose_label"]["descriptionfr"]="Étiquette (« label ») pour cette partition :
";
$elem["partman-basicfilesystems/choose_label"]["default"]="";
$elem["partman-basicfilesystems/text/format_swap"]["type"]="text";
$elem["partman-basicfilesystems/text/format_swap"]["description"]="Format the swap area:
";
$elem["partman-basicfilesystems/text/format_swap"]["descriptionde"]="Swap-Speicher formatieren:
";
$elem["partman-basicfilesystems/text/format_swap"]["descriptionfr"]="Formater le « swap » :
";
$elem["partman-basicfilesystems/text/format_swap"]["default"]="";
$elem["partman-basicfilesystems/text/yes"]["type"]="text";
$elem["partman-basicfilesystems/text/yes"]["description"]="yes
";
$elem["partman-basicfilesystems/text/yes"]["descriptionde"]="Ja
";
$elem["partman-basicfilesystems/text/yes"]["descriptionfr"]="oui
";
$elem["partman-basicfilesystems/text/yes"]["default"]="";
$elem["partman-basicfilesystems/text/no"]["type"]="text";
$elem["partman-basicfilesystems/text/no"]["description"]="no
";
$elem["partman-basicfilesystems/text/no"]["descriptionde"]="Nein
";
$elem["partman-basicfilesystems/text/no"]["descriptionfr"]="non
";
$elem["partman-basicfilesystems/text/no"]["default"]="";
$elem["partman-basicfilesystems/text/specify_label"]["type"]="text";
$elem["partman-basicfilesystems/text/specify_label"]["description"]="Label:
";
$elem["partman-basicfilesystems/text/specify_label"]["descriptionde"]="Name:
";
$elem["partman-basicfilesystems/text/specify_label"]["descriptionfr"]="Étiquette :
";
$elem["partman-basicfilesystems/text/specify_label"]["default"]="";
$elem["partman-basicfilesystems/text/none"]["type"]="text";
$elem["partman-basicfilesystems/text/none"]["description"]="none
";
$elem["partman-basicfilesystems/text/none"]["descriptionde"]="Keiner
";
$elem["partman-basicfilesystems/text/none"]["descriptionfr"]="aucune
";
$elem["partman-basicfilesystems/text/none"]["default"]="";
$elem["partman-basicfilesystems/text/reserved_for_root"]["type"]="text";
$elem["partman-basicfilesystems/text/reserved_for_root"]["description"]="Reserved blocks:
";
$elem["partman-basicfilesystems/text/reserved_for_root"]["descriptionde"]="Reservierte Blöcke:
";
$elem["partman-basicfilesystems/text/reserved_for_root"]["descriptionfr"]="Blocs réservés :
";
$elem["partman-basicfilesystems/text/reserved_for_root"]["default"]="";
$elem["partman-basicfilesystems/specify_reserved"]["type"]="string";
$elem["partman-basicfilesystems/specify_reserved"]["description"]="Percentage of the file system blocks reserved for the super-user:
";
$elem["partman-basicfilesystems/specify_reserved"]["descriptionde"]="Prozentsatz der für den Super-User (root) reservierten Dateisystemblöcke:
";
$elem["partman-basicfilesystems/specify_reserved"]["descriptionfr"]="Pourcentage des blocs réservés pour le superutilisateur :
";
$elem["partman-basicfilesystems/specify_reserved"]["default"]="";
$elem["partman-basicfilesystems/text/usage"]["type"]="text";
$elem["partman-basicfilesystems/text/usage"]["description"]="Typical usage:
";
$elem["partman-basicfilesystems/text/usage"]["descriptionde"]="Typische Nutzung:
";
$elem["partman-basicfilesystems/text/usage"]["descriptionfr"]="Utilisation habituelle :
";
$elem["partman-basicfilesystems/text/usage"]["default"]="";
$elem["partman-basicfilesystems/text/typical_usage"]["type"]="text";
$elem["partman-basicfilesystems/text/typical_usage"]["description"]="standard
";
$elem["partman-basicfilesystems/text/typical_usage"]["descriptionde"]="standard
";
$elem["partman-basicfilesystems/text/typical_usage"]["descriptionfr"]="standard
";
$elem["partman-basicfilesystems/text/typical_usage"]["default"]="";
$elem["partman-basicfilesystems/specify_usage"]["type"]="select";
$elem["partman-basicfilesystems/specify_usage"]["description"]="Typical usage of this partition:
 Please specify how the file system is going to be used, so that
 optimal file system parameters can be chosen for that use.
 .
 standard = standard parameters,
 news = one inode per 4KB block,
 largefile = one inode per megabyte,
 largefile4 = one inode per 4 megabytes.
";
$elem["partman-basicfilesystems/specify_usage"]["descriptionde"]="Typische Nutzung für diese Partition:
 Bitte legen Sie fest, wie das Dateisystem genutzt werden soll, damit die optimalen Parameter gewählt werden können.
 .
 standard = Standardparameter, news = Eine Inode je 4KB Block, largefile = Eine Inode je Megabyte, largefile4 = Eine Inode je 4 Megabytes.
";
$elem["partman-basicfilesystems/specify_usage"]["descriptionfr"]="Utilisation habituelle de cette partition :
 Veuillez indiquer la méthode d'utilisation de ce système de fichiers, afin que des paramètres adaptés à cette utilisation soient choisis.
 .
 standard : paramètres classiques, news : un inode par bloc de 4 kilo-octets, largefile : un inode par mégaoctet, largefile4 : un inode pour 4 mégaoctets.
";
$elem["partman-basicfilesystems/specify_usage"]["default"]="";
$elem["partman-basicfilesystems/text/specify_mountpoint"]["type"]="text";
$elem["partman-basicfilesystems/text/specify_mountpoint"]["description"]="Mount point:
";
$elem["partman-basicfilesystems/text/specify_mountpoint"]["descriptionde"]="Einbindungspunkt:
";
$elem["partman-basicfilesystems/text/specify_mountpoint"]["descriptionfr"]="Point de montage :
";
$elem["partman-basicfilesystems/text/specify_mountpoint"]["default"]="";
$elem["partman-basicfilesystems/text/no_mountpoint"]["type"]="text";
$elem["partman-basicfilesystems/text/no_mountpoint"]["description"]="none
";
$elem["partman-basicfilesystems/text/no_mountpoint"]["descriptionde"]="Keiner
";
$elem["partman-basicfilesystems/text/no_mountpoint"]["descriptionfr"]="aucun
";
$elem["partman-basicfilesystems/text/no_mountpoint"]["default"]="";
$elem["partman/filesystem_long/ext2"]["type"]="text";
$elem["partman/filesystem_long/ext2"]["description"]="Ext2 file system
";
$elem["partman/filesystem_long/ext2"]["descriptionde"]="Ext2-Dateisystem
";
$elem["partman/filesystem_long/ext2"]["descriptionfr"]="système de fichiers ext2
";
$elem["partman/filesystem_long/ext2"]["default"]="";
$elem["partman/filesystem_short/ext2"]["type"]="text";
$elem["partman/filesystem_short/ext2"]["description"]="ext2
";
$elem["partman/filesystem_short/ext2"]["descriptionde"]="ext2
";
$elem["partman/filesystem_short/ext2"]["descriptionfr"]="ext2
";
$elem["partman/filesystem_short/ext2"]["default"]="";
$elem["partman/filesystem_long/fat16"]["type"]="text";
$elem["partman/filesystem_long/fat16"]["description"]="FAT16 file system
";
$elem["partman/filesystem_long/fat16"]["descriptionde"]="FAT16-Dateisystem
";
$elem["partman/filesystem_long/fat16"]["descriptionfr"]="système de fichiers FAT16
";
$elem["partman/filesystem_long/fat16"]["default"]="";
$elem["partman/filesystem_short/fat16"]["type"]="text";
$elem["partman/filesystem_short/fat16"]["description"]="fat16
";
$elem["partman/filesystem_short/fat16"]["descriptionde"]="fat16
";
$elem["partman/filesystem_short/fat16"]["descriptionfr"]="fat16
";
$elem["partman/filesystem_short/fat16"]["default"]="";
$elem["partman/filesystem_long/fat32"]["type"]="text";
$elem["partman/filesystem_long/fat32"]["description"]="FAT32 file system
";
$elem["partman/filesystem_long/fat32"]["descriptionde"]="FAT32-Dateisystem
";
$elem["partman/filesystem_long/fat32"]["descriptionfr"]="système de fichiers FAT32
";
$elem["partman/filesystem_long/fat32"]["default"]="";
$elem["partman/filesystem_short/fat32"]["type"]="text";
$elem["partman/filesystem_short/fat32"]["description"]="fat32
";
$elem["partman/filesystem_short/fat32"]["descriptionde"]="fat32
";
$elem["partman/filesystem_short/fat32"]["descriptionfr"]="fat32
";
$elem["partman/filesystem_short/fat32"]["default"]="";
$elem["partman/filesystem_long/ntfs"]["type"]="text";
$elem["partman/filesystem_long/ntfs"]["description"]="NTFS journaling file system
";
$elem["partman/filesystem_long/ntfs"]["descriptionde"]="NTFS-Journaling-Dateisystem
";
$elem["partman/filesystem_long/ntfs"]["descriptionfr"]="système de fichiers journalisé NTFS
";
$elem["partman/filesystem_long/ntfs"]["default"]="";
$elem["partman/filesystem_short/ntfs"]["type"]="text";
$elem["partman/filesystem_short/ntfs"]["description"]="ntfs
";
$elem["partman/filesystem_short/ntfs"]["descriptionde"]="ntfs
";
$elem["partman/filesystem_short/ntfs"]["descriptionfr"]="ntfs
";
$elem["partman/filesystem_short/ntfs"]["default"]="";
$elem["partman/method_long/swap"]["type"]="text";
$elem["partman/method_long/swap"]["description"]="swap area
";
$elem["partman/method_long/swap"]["descriptionde"]="Auslagerungsspeicher (Swap)
";
$elem["partman/method_long/swap"]["descriptionfr"]="espace d'échange (« swap »)
";
$elem["partman/method_long/swap"]["default"]="";
$elem["partman/method_short/swap"]["type"]="text";
$elem["partman/method_short/swap"]["description"]="swap
";
$elem["partman/method_short/swap"]["descriptionde"]="Swap
";
$elem["partman/method_short/swap"]["descriptionfr"]="swap
";
$elem["partman/method_short/swap"]["default"]="";
$elem["partman/filesystem_long/linux-swap"]["type"]="text";
$elem["partman/filesystem_long/linux-swap"]["description"]="swap area
";
$elem["partman/filesystem_long/linux-swap"]["descriptionde"]="Auslagerungsspeicher (Swap)
";
$elem["partman/filesystem_long/linux-swap"]["descriptionfr"]="espace d'échange (« swap »)
";
$elem["partman/filesystem_long/linux-swap"]["default"]="";
$elem["partman/filesystem_short/linux-swap"]["type"]="text";
$elem["partman/filesystem_short/linux-swap"]["description"]="swap
";
$elem["partman/filesystem_short/linux-swap"]["descriptionde"]="Swap
";
$elem["partman/filesystem_short/linux-swap"]["descriptionfr"]="swap
";
$elem["partman/filesystem_short/linux-swap"]["default"]="";
$elem["partman-basicfilesystems/text/options"]["type"]="text";
$elem["partman-basicfilesystems/text/options"]["description"]="Mount options:
";
$elem["partman-basicfilesystems/text/options"]["descriptionde"]="Einbindungsoptionen:
";
$elem["partman-basicfilesystems/text/options"]["descriptionfr"]="Options de montage :
";
$elem["partman-basicfilesystems/text/options"]["default"]="";
$elem["partman-basicfilesystems/mountoptions"]["type"]="multiselect";
$elem["partman-basicfilesystems/mountoptions"]["description"]="Mount options:
 Mount options can tune the behavior of the file system.
";
$elem["partman-basicfilesystems/mountoptions"]["descriptionde"]="Einbindungsoptionen:
 Einbindungsoptionen können das Verhalten des Dateisystems optimieren.
";
$elem["partman-basicfilesystems/mountoptions"]["descriptionfr"]="Options de montage :
 Les options de montage permettent de régler le système de fichiers.
";
$elem["partman-basicfilesystems/mountoptions"]["default"]="";
$elem["partman-basicfilesystems/text/noatime"]["type"]="text";
$elem["partman-basicfilesystems/text/noatime"]["description"]="noatime - do not update inode access times at each access
";
$elem["partman-basicfilesystems/text/noatime"]["descriptionde"]="noatime - Inode-Zugriffszeit nicht bei jedem Zugriff aktual.
";
$elem["partman-basicfilesystems/text/noatime"]["descriptionfr"]="noatime - pas de MAJ des heures d'accès des inodes
";
$elem["partman-basicfilesystems/text/noatime"]["default"]="";
$elem["partman-basicfilesystems/text/nodiratime"]["type"]="text";
$elem["partman-basicfilesystems/text/nodiratime"]["description"]="nodiratime - do not update directory inode access times
";
$elem["partman-basicfilesystems/text/nodiratime"]["descriptionde"]="nodiratime - Inode-Zugriffszeit von Verzeichnissen nicht aktual.
";
$elem["partman-basicfilesystems/text/nodiratime"]["descriptionfr"]="nodiratime - pas de MAJ des heures d'accès des inodes de répertoires
";
$elem["partman-basicfilesystems/text/nodiratime"]["default"]="";
$elem["partman-basicfilesystems/text/relatime"]["type"]="text";
$elem["partman-basicfilesystems/text/relatime"]["description"]="relatime - update inode access times relative to modify time
";
$elem["partman-basicfilesystems/text/relatime"]["descriptionde"]="relatime - Inode-Zugriffszeit relativ zur Modifizierungszeit
";
$elem["partman-basicfilesystems/text/relatime"]["descriptionfr"]="relatime - màj relative des date et heure d'accès des inodes
";
$elem["partman-basicfilesystems/text/relatime"]["default"]="";
$elem["partman-basicfilesystems/text/nodev"]["type"]="text";
$elem["partman-basicfilesystems/text/nodev"]["description"]="nodev - do not support character or block special devices
";
$elem["partman-basicfilesystems/text/nodev"]["descriptionde"]="nodev - Keine Unterstütz. für zeichen- oder blockorient. Geräte
";
$elem["partman-basicfilesystems/text/nodev"]["descriptionfr"]="nodev - pas de gestion des périphériques bloc ou caractère
";
$elem["partman-basicfilesystems/text/nodev"]["default"]="";
$elem["partman-basicfilesystems/text/nosuid"]["type"]="text";
$elem["partman-basicfilesystems/text/nosuid"]["description"]="nosuid - ignore set-user-identifier or set-group-identifier bits
";
$elem["partman-basicfilesystems/text/nosuid"]["descriptionde"]="nosuid - SUID- und SGID-Bits ignorieren
";
$elem["partman-basicfilesystems/text/nosuid"]["descriptionfr"]="nosuid - pas de gestion des bits setuid ou setgid
";
$elem["partman-basicfilesystems/text/nosuid"]["default"]="";
$elem["partman-basicfilesystems/text/noexec"]["type"]="text";
$elem["partman-basicfilesystems/text/noexec"]["description"]="noexec - do not allow execution of any binaries
";
$elem["partman-basicfilesystems/text/noexec"]["descriptionde"]="noexec - Ausführen von Binär-Dateien nicht erlauben
";
$elem["partman-basicfilesystems/text/noexec"]["descriptionfr"]="noexec - interdiction de l'exécution des programmes
";
$elem["partman-basicfilesystems/text/noexec"]["default"]="";
$elem["partman-basicfilesystems/text/ro"]["type"]="text";
$elem["partman-basicfilesystems/text/ro"]["description"]="ro - mount the file system read-only
";
$elem["partman-basicfilesystems/text/ro"]["descriptionde"]="ro - Das Dateisystem schreibgeschützt einbinden
";
$elem["partman-basicfilesystems/text/ro"]["descriptionfr"]="ro - montage en lecture seule
";
$elem["partman-basicfilesystems/text/ro"]["default"]="";
$elem["partman-basicfilesystems/text/sync"]["type"]="text";
$elem["partman-basicfilesystems/text/sync"]["description"]="sync - all input/output activities occur synchronously
";
$elem["partman-basicfilesystems/text/sync"]["descriptionde"]="sync - Alle Eingabe-/Ausgabe-Zugriffe erfolgen synchron
";
$elem["partman-basicfilesystems/text/sync"]["descriptionfr"]="sync - toutes les entrées/sorties sont synchrones
";
$elem["partman-basicfilesystems/text/sync"]["default"]="";
$elem["partman-basicfilesystems/text/usrquota"]["type"]="text";
$elem["partman-basicfilesystems/text/usrquota"]["description"]="usrquota - user disk quota accounting enabled
";
$elem["partman-basicfilesystems/text/usrquota"]["descriptionde"]="usrquota - Benutzer-Quota für Festplattenspeicher aktivieren
";
$elem["partman-basicfilesystems/text/usrquota"]["descriptionfr"]="usrquota - gestion des quota des utilisateurs
";
$elem["partman-basicfilesystems/text/usrquota"]["default"]="";
$elem["partman-basicfilesystems/text/grpquota"]["type"]="text";
$elem["partman-basicfilesystems/text/grpquota"]["description"]="grpquota - group disk quota accounting enabled
";
$elem["partman-basicfilesystems/text/grpquota"]["descriptionde"]="grpquota - Gruppen-Quota für Festplattenspeicher aktivieren
";
$elem["partman-basicfilesystems/text/grpquota"]["descriptionfr"]="grpquota - gestion des quota des groupes
";
$elem["partman-basicfilesystems/text/grpquota"]["default"]="";
$elem["partman-basicfilesystems/text/user_xattr"]["type"]="text";
$elem["partman-basicfilesystems/text/user_xattr"]["description"]="user_xattr - support user extended attributes
";
$elem["partman-basicfilesystems/text/user_xattr"]["descriptionde"]="user_xattr - Benutzer-Erweiterungen unterstützen
";
$elem["partman-basicfilesystems/text/user_xattr"]["descriptionfr"]="user_xattr - gestion des attributs étendus pour les utilisateurs
";
$elem["partman-basicfilesystems/text/user_xattr"]["default"]="";
$elem["partman-basicfilesystems/text/quiet"]["type"]="text";
$elem["partman-basicfilesystems/text/quiet"]["description"]="quiet - changing owner and permissions does not return errors
";
$elem["partman-basicfilesystems/text/quiet"]["descriptionde"]="quiet - Ändern von Benutzer oder Rechten gibt keine Fehler aus
";
$elem["partman-basicfilesystems/text/quiet"]["descriptionfr"]="quiet - pas d'erreur en changeant le propriétaire ou les droits
";
$elem["partman-basicfilesystems/text/quiet"]["default"]="";
$elem["partman-basicfilesystems/text/notail"]["type"]="text";
$elem["partman-basicfilesystems/text/notail"]["description"]="notail - disable packing of files into the file system tree
";
$elem["partman-basicfilesystems/text/notail"]["descriptionde"]="notail - Keine Dateien im Dateisystembaum anlegen
";
$elem["partman-basicfilesystems/text/notail"]["descriptionfr"]="notail - pas de regroupement des fichiers dans l'arborescence
";
$elem["partman-basicfilesystems/text/notail"]["default"]="";
$elem["partman-basicfilesystems/text/discard"]["type"]="text";
$elem["partman-basicfilesystems/text/discard"]["description"]="discard - trim freed blocks from underlying block device
";
$elem["partman-basicfilesystems/text/discard"]["descriptionde"]="discard - freigegeb. Blöcke des blockorient. Geräts markieren
";
$elem["partman-basicfilesystems/text/discard"]["descriptionfr"]="discard - réduit les blocs libérés du périphérique support
";
$elem["partman-basicfilesystems/text/discard"]["default"]="";
$elem["partman-basicfilesystems/text/acls"]["type"]="text";
$elem["partman-basicfilesystems/text/acls"]["description"]="acls - support POSIX.1e Access Control List
";
$elem["partman-basicfilesystems/text/acls"]["descriptionde"]="acls - Unterstützung für POSIX.1e Access-Control-Lists
";
$elem["partman-basicfilesystems/text/acls"]["descriptionfr"]="acls - gestion des listes de contrôle d'accès POSIX.1e
";
$elem["partman-basicfilesystems/text/acls"]["default"]="";
$elem["partman-basicfilesystems/text/shortnames"]["type"]="text";
$elem["partman-basicfilesystems/text/shortnames"]["description"]="shortnames - only use the old MS-DOS 8.3 style filenames
";
$elem["partman-basicfilesystems/text/shortnames"]["descriptionde"]="shortnames - nur alte Dateinamen im MS-DOS-Stil (8.3) verwenden
";
$elem["partman-basicfilesystems/text/shortnames"]["descriptionfr"]="shortnames - n'utiliser que des noms de fichiers 8.3 type MS-DOS
";
$elem["partman-basicfilesystems/text/shortnames"]["default"]="";
$elem["partman-basicfilesystems/boot_not_ext2"]["type"]="boolean";
$elem["partman-basicfilesystems/boot_not_ext2"]["description"]="Go back to the menu and correct this problem?
 Your boot partition has not been configured with the ext2
 file system. This is needed by your machine in order to boot. Please go
 back and use the ext2 file system.
 .
 If you do not go back to the partitioning menu and correct this error,
 the partition will be used as is. This means that you may not be able
 to boot from your hard disk.
";
$elem["partman-basicfilesystems/boot_not_ext2"]["descriptionde"]="Möchten Sie zum Hauptmenü zurückkehren, um die Fehler zu beheben?
 Ihre Boot-Partition wurde nicht mit dem Ext2-Dateisystem konfiguriert. Dies ist allerdings nötig, damit der Computer starten kann. Bitte gehen Sie zurück und wählen Sie ext2 als Dateisystem aus.
 .
 Wenn Sie nicht zum Partitionierungsmenü zurückkehren und diesen Fehler beheben, wird die Partition genutzt, wie sie jetzt ist. Das bedeutet, dass Sie eventuell nicht von Ihrer Festplatte starten können.
";
$elem["partman-basicfilesystems/boot_not_ext2"]["descriptionfr"]="Revenir au menu et corriger ce défaut ?
 La partition de démarrage n'a pas été configurée avec un système de fichiers ext2. Ce système de fichiers est indispensable pour le démarrage de la machine. Veuillez recommencer et utiliser un système de fichiers ext2.
 .
 Si vous ne revenez pas au menu de partitionnement pour corriger ce défaut, la partition sera utilisée telle quelle. Cela signifie que vous ne pourrez probablement pas démarrer à partir du disque dur.
";
$elem["partman-basicfilesystems/boot_not_ext2"]["default"]="";
$elem["partman-basicfilesystems/boot_not_first_partition"]["type"]="boolean";
$elem["partman-basicfilesystems/boot_not_first_partition"]["description"]="Go back to the menu and correct this problem?
 Your boot partition is not located on the first partition of your
 hard disk. This is needed by your machine in order to boot.  Please go
 back and use your first partition as a boot partition.
 .
 If you do not go back to the partitioning menu and correct this error,
 the partition will be used as is. This means that you may not be able
 to boot from your hard disk.
";
$elem["partman-basicfilesystems/boot_not_first_partition"]["descriptionde"]="Möchten Sie zum Hauptmenü zurückkehren, um die Fehler zu beheben?
 Ihre Boot-Partition befindet sich nicht auf der ersten Partition Ihrer Festplatte. Dies ist aber nötig, damit der Computer starten kann. Bitte gehen Sie zurück und wählen Sie die erste Partition als Boot-Partition aus.
 .
 Wenn Sie nicht zum Partitionierungsmenü zurückkehren und diesen Fehler beheben, wird die Partition genutzt, wie sie jetzt ist. Das bedeutet, dass Sie eventuell nicht von Ihrer Festplatte starten können.
";
$elem["partman-basicfilesystems/boot_not_first_partition"]["descriptionfr"]="Revenir au menu et corriger ce défaut ?
 La partition de démarrage n'est pas la première partition du disque. Cela est indispensable pour le démarrage de la machine. Veuillez recommencer et utiliser la première partition comme partition de démarrage.
 .
 Si vous ne revenez pas au menu de partitionnement pour corriger ce défaut, la partition sera utilisée telle quelle. Cela signifie que vous ne pourrez probablement pas démarrer à partir du disque dur.
";
$elem["partman-basicfilesystems/boot_not_first_partition"]["default"]="";
$elem["partman/automount"]["type"]="boolean";
$elem["partman/automount"]["description"]="for internal use; can be preseeded
 Set to true to automount interesting-looking partitions under /media.

";
$elem["partman/automount"]["descriptionde"]="";
$elem["partman/automount"]["descriptionfr"]="";
$elem["partman/automount"]["default"]="false";
$elem["partman-basicmethods/method_only"]["type"]="boolean";
$elem["partman-basicmethods/method_only"]["description"]="Go back to the menu?
 No file system is specified for partition #${PARTITION} of ${DEVICE}.
 .
 If you do not go back to the partitioning menu and assign a file system
 to this partition, it won't be used at all.
";
$elem["partman-basicmethods/method_only"]["descriptionde"]="Zurück zum Menü?
 Es wurde kein Dateisystem für Partition ${PARTITION} auf ${DEVICE} angegeben.
 .
 Wenn Sie nicht zum Partitionierungsmenü zurückkehren und dieser Partition ein Dateisystem zuweisen, kann sie nicht genutzt werden.
";
$elem["partman-basicmethods/method_only"]["descriptionfr"]="Faut-il revenir au menu ?
 Aucun système de fichiers n'a été indiqué pour la partition n° ${PARTITION} de ${DEVICE}.
 .
 Si vous ne revenez pas au menu de partitionnement pour associer un système de fichiers à cette partition, elle ne sera pas du tout utilisée.
";
$elem["partman-basicmethods/method_only"]["default"]="";
$elem["partman-basicmethods/text/dont_use"]["type"]="text";
$elem["partman-basicmethods/text/dont_use"]["description"]="do not use the partition
";
$elem["partman-basicmethods/text/dont_use"]["descriptionde"]="Partition nicht benutzen
";
$elem["partman-basicmethods/text/dont_use"]["descriptionfr"]="Ne pas utiliser la partition
";
$elem["partman-basicmethods/text/dont_use"]["default"]="";
$elem["partman-basicmethods/text/format"]["type"]="text";
$elem["partman-basicmethods/text/format"]["description"]="Format the partition:
";
$elem["partman-basicmethods/text/format"]["descriptionde"]="Partition formatieren:
";
$elem["partman-basicmethods/text/format"]["descriptionfr"]="Formater la partition :
";
$elem["partman-basicmethods/text/format"]["default"]="";
$elem["partman-basicmethods/text/yes_format"]["type"]="text";
$elem["partman-basicmethods/text/yes_format"]["description"]="yes, format it
";
$elem["partman-basicmethods/text/yes_format"]["descriptionde"]="ja, formatieren
";
$elem["partman-basicmethods/text/yes_format"]["descriptionfr"]="oui, formater
";
$elem["partman-basicmethods/text/yes_format"]["default"]="";
$elem["partman-basicmethods/text/no_dont_format"]["type"]="text";
$elem["partman-basicmethods/text/no_dont_format"]["description"]="no, keep existing data
";
$elem["partman-basicmethods/text/no_dont_format"]["descriptionde"]="nein, vorhandene Daten erhalten
";
$elem["partman-basicmethods/text/no_dont_format"]["descriptionfr"]="non, conserver les données
";
$elem["partman-basicmethods/text/no_dont_format"]["default"]="";
$elem["partman/method_long/dont_use"]["type"]="text";
$elem["partman/method_long/dont_use"]["description"]="do not use
";
$elem["partman/method_long/dont_use"]["descriptionde"]="Nicht benutzen
";
$elem["partman/method_long/dont_use"]["descriptionfr"]="ne pas utiliser
";
$elem["partman/method_long/dont_use"]["default"]="";
$elem["partman/method_short/dont_use"]["type"]="text";
$elem["partman/method_short/dont_use"]["description"]="unused
";
$elem["partman/method_short/dont_use"]["descriptionde"]="Unbenutzt
";
$elem["partman/method_short/dont_use"]["descriptionfr"]="inutilisé
";
$elem["partman/method_short/dont_use"]["default"]="";
$elem["partman/method_long/format"]["type"]="text";
$elem["partman/method_long/format"]["description"]="format the partition
";
$elem["partman/method_long/format"]["descriptionde"]="Partition formatieren
";
$elem["partman/method_long/format"]["descriptionfr"]="Formater la partition
";
$elem["partman/method_long/format"]["default"]="";
$elem["partman/method_short/format"]["type"]="text";
$elem["partman/method_short/format"]["description"]="format
";
$elem["partman/method_short/format"]["descriptionde"]="Formatieren
";
$elem["partman/method_short/format"]["descriptionfr"]="formater
";
$elem["partman/method_short/format"]["default"]="";
$elem["partman/method_long/keep"]["type"]="text";
$elem["partman/method_long/keep"]["description"]="keep and use the existing data
";
$elem["partman/method_long/keep"]["descriptionde"]="Vorhandene Daten erhalten und benutzen
";
$elem["partman/method_long/keep"]["descriptionfr"]="conserver et utiliser les données existantes
";
$elem["partman/method_long/keep"]["default"]="";
$elem["partman/method_short/keep"]["type"]="text";
$elem["partman/method_short/keep"]["description"]="keep
";
$elem["partman/method_short/keep"]["descriptionde"]="Beibehalten
";
$elem["partman/method_short/keep"]["descriptionfr"]="conserver
";
$elem["partman/method_short/keep"]["default"]="";
$elem["partman-btrfs/text/btrfs"]["type"]="text";
$elem["partman-btrfs/text/btrfs"]["description"]="btrfs
";
$elem["partman-btrfs/text/btrfs"]["descriptionde"]="btrfs
";
$elem["partman-btrfs/text/btrfs"]["descriptionfr"]="btrfs
";
$elem["partman-btrfs/text/btrfs"]["default"]="";
$elem["partman/filesystem_long/btrfs"]["type"]="text";
$elem["partman/filesystem_long/btrfs"]["description"]="btrfs journaling file system
";
$elem["partman/filesystem_long/btrfs"]["descriptionde"]="Btrfs-Journaling-Dateisystem
";
$elem["partman/filesystem_long/btrfs"]["descriptionfr"]="système de fichiers journalisé btrfs
";
$elem["partman/filesystem_long/btrfs"]["default"]="";
$elem["partman/filesystem_short/btrfs"]["type"]="text";
$elem["partman/filesystem_short/btrfs"]["description"]="btrfs
";
$elem["partman/filesystem_short/btrfs"]["descriptionde"]="btrfs
";
$elem["partman/filesystem_short/btrfs"]["descriptionfr"]="btrfs
";
$elem["partman/filesystem_short/btrfs"]["default"]="";
$elem["partman/method_long/crypto"]["type"]="text";
$elem["partman/method_long/crypto"]["description"]="physical volume for encryption
";
$elem["partman/method_long/crypto"]["descriptionde"]="physikalisches Volume für Verschlüsselung
";
$elem["partman/method_long/crypto"]["descriptionfr"]="volume physique pour chiffrement
";
$elem["partman/method_long/crypto"]["default"]="";
$elem["partman/method_short/crypto"]["type"]="text";
$elem["partman/method_short/crypto"]["description"]="crypto
";
$elem["partman/method_short/crypto"]["descriptionde"]="crypto
";
$elem["partman/method_short/crypto"]["descriptionfr"]="chiffré
";
$elem["partman/method_short/crypto"]["default"]="";
$elem["partman-crypto/crypto_type/dm-crypt"]["type"]="text";
$elem["partman-crypto/crypto_type/dm-crypt"]["description"]="Device-mapper (dm-crypt)
";
$elem["partman-crypto/crypto_type/dm-crypt"]["descriptionde"]="Device-mapper (dm-crypt)
";
$elem["partman-crypto/crypto_type/dm-crypt"]["descriptionfr"]="« Device-mapper » (dm-crypt)
";
$elem["partman-crypto/crypto_type/dm-crypt"]["default"]="";
$elem["partman-crypto/text/cryptdev_description"]["type"]="text";
$elem["partman-crypto/text/cryptdev_description"]["description"]="${CIPHER} ${KEYTYPE}

";
$elem["partman-crypto/text/cryptdev_description"]["descriptionde"]="";
$elem["partman-crypto/text/cryptdev_description"]["descriptionfr"]="";
$elem["partman-crypto/text/cryptdev_description"]["default"]="";
$elem["partman-crypto/text/not_active"]["type"]="text";
$elem["partman-crypto/text/not_active"]["description"]="not active
";
$elem["partman-crypto/text/not_active"]["descriptionde"]="nicht aktiv
";
$elem["partman-crypto/text/not_active"]["descriptionfr"]="inactive
";
$elem["partman-crypto/text/not_active"]["default"]="";
$elem["partman-crypto/text/specify_crypto_type"]["type"]="text";
$elem["partman-crypto/text/specify_crypto_type"]["description"]="Encryption method:
";
$elem["partman-crypto/text/specify_crypto_type"]["descriptionde"]="Verschlüsselungsmethode:
";
$elem["partman-crypto/text/specify_crypto_type"]["descriptionfr"]="Méthode de chiffrement :
";
$elem["partman-crypto/text/specify_crypto_type"]["default"]="";
$elem["partman-crypto/crypto_type"]["type"]="select";
$elem["partman-crypto/crypto_type"]["description"]="Encryption method for this partition:
 Changing the encryption method will set other encryption-related fields
 to their default values for the new encryption method.
";
$elem["partman-crypto/crypto_type"]["descriptionde"]="Verschlüsselungsmethode für diese Partition:
 Das Ändern der Verschlüsselungsmethode wird andere verschlüsselungsbezogene Felder auf zur neuen Verschlüsselungsmethode passende Standardwerte setzen.
";
$elem["partman-crypto/crypto_type"]["descriptionfr"]="Méthode de chiffrement pour cette partition :
 Si vous modifiez la méthode de chiffrement, les autres réglages de chiffrement reprendront leur valeur par défaut pour la nouvelle méthode de chiffrement.
";
$elem["partman-crypto/crypto_type"]["default"]="";
$elem["partman-crypto/text/specify_cipher"]["type"]="text";
$elem["partman-crypto/text/specify_cipher"]["description"]="Encryption:
";
$elem["partman-crypto/text/specify_cipher"]["descriptionde"]="Verschlüsselung:
";
$elem["partman-crypto/text/specify_cipher"]["descriptionfr"]="Chiffrement :
";
$elem["partman-crypto/text/specify_cipher"]["default"]="";
$elem["partman-crypto/cipher"]["type"]="select";
$elem["partman-crypto/cipher"]["description"]="Encryption for this partition:
";
$elem["partman-crypto/cipher"]["descriptionde"]="Verschlüsselung für diese Partition:
";
$elem["partman-crypto/cipher"]["descriptionfr"]="Chiffrement pour cette partition :
";
$elem["partman-crypto/cipher"]["default"]="";
$elem["partman-crypto/text/specify_keysize"]["type"]="text";
$elem["partman-crypto/text/specify_keysize"]["description"]="Key size:
";
$elem["partman-crypto/text/specify_keysize"]["descriptionde"]="Schlüssellänge:
";
$elem["partman-crypto/text/specify_keysize"]["descriptionfr"]="Taille de la clé :
";
$elem["partman-crypto/text/specify_keysize"]["default"]="";
$elem["partman-crypto/keysize"]["type"]="select";
$elem["partman-crypto/keysize"]["description"]="Key size for this partition:
";
$elem["partman-crypto/keysize"]["descriptionde"]="Schlüssellänge für diese Partition:
";
$elem["partman-crypto/keysize"]["descriptionfr"]="Taille de la clé pour cette partition :
";
$elem["partman-crypto/keysize"]["default"]="";
$elem["partman-crypto/text/specify_ivalgorithm"]["type"]="text";
$elem["partman-crypto/text/specify_ivalgorithm"]["description"]="IV algorithm:
";
$elem["partman-crypto/text/specify_ivalgorithm"]["descriptionde"]="IV-Algorithmus:
";
$elem["partman-crypto/text/specify_ivalgorithm"]["descriptionfr"]="Algorithme IV :
";
$elem["partman-crypto/text/specify_ivalgorithm"]["default"]="";
$elem["partman-crypto/ivalgorithm"]["type"]="select";
$elem["partman-crypto/ivalgorithm"]["description"]="Initialization vector generation algorithm for this partition:
 Different algorithms exist to derive the initialization vector
 for each sector. This choice influences the encryption security.
 Normally, there is no reason to change this from the
 recommended default, except for compatibility with older systems.
";
$elem["partman-crypto/ivalgorithm"]["descriptionde"]="Algorithmus zur Erzeugung des Initialisierungsvektors für diese Partition:
 Verschiedene Algorithmen zur Bestimmung des Initialisierungsvektors für jeden Sektor existieren. Diese Wahl beeinflusst die Sicherheit der Verschlüsselung. Normalerweise gibt es keinen Grund, die empfohlenen Standardwerte zu ändern, es sei denn zwecks Kompatibilität mit älteren Systemen.
";
$elem["partman-crypto/ivalgorithm"]["descriptionfr"]="Algorithme de création du vecteur d'initialisation pour cette partition :
 Plusieurs algorithmes peuvent être utilisés pour établir le vecteur d'initialisation de chaque secteur. Ce choix influence directement la sécurité du chiffrement. Il n'est généralement pas utile de modifier la valeur recommandée par défaut, sauf pour conserver la compatibilité avec des systèmes de chiffrement existants.
";
$elem["partman-crypto/ivalgorithm"]["default"]="";
$elem["partman-crypto/text/specify_keytype"]["type"]="text";
$elem["partman-crypto/text/specify_keytype"]["description"]="Encryption key:
";
$elem["partman-crypto/text/specify_keytype"]["descriptionde"]="Schlüssel:
";
$elem["partman-crypto/text/specify_keytype"]["descriptionfr"]="Clé de chiffrement :
";
$elem["partman-crypto/text/specify_keytype"]["default"]="";
$elem["partman-crypto/keytype"]["type"]="select";
$elem["partman-crypto/keytype"]["description"]="Type of encryption key for this partition:
";
$elem["partman-crypto/keytype"]["descriptionde"]="Typ des Schlüssels für diese Partition:
";
$elem["partman-crypto/keytype"]["descriptionfr"]="Type de la clé de chiffrement pour cette partition :
";
$elem["partman-crypto/keytype"]["default"]="";
$elem["partman-crypto/text/specify_keyhash"]["type"]="text";
$elem["partman-crypto/text/specify_keyhash"]["description"]="Encryption key hash:
";
$elem["partman-crypto/text/specify_keyhash"]["descriptionde"]="Hash des Schlüssels:
";
$elem["partman-crypto/text/specify_keyhash"]["descriptionfr"]="Hachage (« hash ») de la clé de chiffrement :
";
$elem["partman-crypto/text/specify_keyhash"]["default"]="";
$elem["partman-crypto/keyhash"]["type"]="select";
$elem["partman-crypto/keyhash"]["description"]="Type of encryption key hash for this partition:
 The encryption key is derived from the passphrase by applying a
 one-way hash function to it. Normally, there is no reason to change
 this from the recommended default and doing so in the wrong way
 can reduce the encryption strength.
";
$elem["partman-crypto/keyhash"]["descriptionde"]="Typ des Hash-Schlüssels für diese Partition:
 Der Schlüssel wird aus einer Passphrase durch Anwendung einer Ein-Wege-Hash-Funktion bestimmt. Normalerweise gibt es keinen Grund, den empfohlenen Standardwert zu ändern. Eine falsche Wahl kann die Verschlüsselungsstärke reduzieren.
";
$elem["partman-crypto/keyhash"]["descriptionfr"]="Type de hachage de la clé de chiffrement pour cette partition :
 La clé de chiffrement est construite par hachage à sens unique de la phrase secrète. Il n'est généralement pas utile de modifier la valeur recommandée par défaut. Une modification incorrecte est susceptible de diminuer la sécurité du chiffrement.
";
$elem["partman-crypto/keyhash"]["default"]="";
$elem["partman-crypto/text/erase_data"]["type"]="text";
$elem["partman-crypto/text/erase_data"]["description"]="Erase data:
";
$elem["partman-crypto/text/erase_data"]["descriptionde"]="Daten löschen:
";
$elem["partman-crypto/text/erase_data"]["descriptionfr"]="Effacer les données :
";
$elem["partman-crypto/text/erase_data"]["default"]="";
$elem["partman-crypto/text/no_erase_data"]["type"]="text";
$elem["partman-crypto/text/no_erase_data"]["description"]="no
";
$elem["partman-crypto/text/no_erase_data"]["descriptionde"]="Nein
";
$elem["partman-crypto/text/no_erase_data"]["descriptionfr"]="non
";
$elem["partman-crypto/text/no_erase_data"]["default"]="";
$elem["partman-crypto/text/yes_erase_data"]["type"]="text";
$elem["partman-crypto/text/yes_erase_data"]["description"]="yes
";
$elem["partman-crypto/text/yes_erase_data"]["descriptionde"]="Ja
";
$elem["partman-crypto/text/yes_erase_data"]["descriptionfr"]="oui
";
$elem["partman-crypto/text/yes_erase_data"]["default"]="";
$elem["partman-crypto/text/erase_data_partition"]["type"]="text";
$elem["partman-crypto/text/erase_data_partition"]["description"]="Erase data on this partition
";
$elem["partman-crypto/text/erase_data_partition"]["descriptionde"]="Löschen von Daten auf dieser Partition
";
$elem["partman-crypto/text/erase_data_partition"]["descriptionfr"]="Effacer les données de cette partition
";
$elem["partman-crypto/text/erase_data_partition"]["default"]="";
$elem["partman-crypto/plain_warn_erase"]["type"]="boolean";
$elem["partman-crypto/plain_warn_erase"]["description"]="Really erase the data on ${DEVICE}?
 The data on ${DEVICE} will be overwritten with zeroes. It can no longer be
 recovered after this step has completed. This is the last opportunity to
 abort the erase.
";
$elem["partman-crypto/plain_warn_erase"]["descriptionde"]="Wirklich die Daten auf ${DEVICE} löschen?
 Die Daten auf ${DEVICE} werden mit Nullen überschrieben. Sie können nach diesem Schritt nicht mehr wiederhergestellt werden. Dies ist die letzte Gelegenheit, die Löschung abzubrechen.
";
$elem["partman-crypto/plain_warn_erase"]["descriptionfr"]="Faut-il vraiment effacer les données sur ${DEVICE} ?
 Les données présentes sur ${DEVICE} seront écrasées avec des zéros. Cette opération est irréversible. Ceci est la dernière opportunité pour refuser cette action.
";
$elem["partman-crypto/plain_warn_erase"]["default"]="false";
$elem["partman-crypto/progress/plain_erase_title"]["type"]="text";
$elem["partman-crypto/progress/plain_erase_title"]["description"]="Erasing data on ${DEVICE}
";
$elem["partman-crypto/progress/plain_erase_title"]["descriptionde"]="Daten auf ${DEVICE} werden gelöscht
";
$elem["partman-crypto/progress/plain_erase_title"]["descriptionfr"]="Effacement des données de ${DEVICE}
";
$elem["partman-crypto/progress/plain_erase_title"]["default"]="";
$elem["partman-crypto/progress/plain_erase_text"]["type"]="text";
$elem["partman-crypto/progress/plain_erase_text"]["description"]="The installer is now overwriting ${DEVICE} with zeroes to delete its previous contents. This step may be skipped by cancelling this action.
";
$elem["partman-crypto/progress/plain_erase_text"]["descriptionde"]="Der Installer überschreibt nun ${DEVICE} mit Nullen, um den vorhandenen Inhalt zu löschen. Der Schritt kann durch Abbrechen dieser Aktion übersprungen werden.
";
$elem["partman-crypto/progress/plain_erase_text"]["descriptionfr"]="Le programme d'installation écrit actuellement des zéros sur ${DEVICE} pour en effacer le contenu précédent. Cette étape peut être interrompue en abandonnant cette action.
";
$elem["partman-crypto/progress/plain_erase_text"]["default"]="";
$elem["partman-crypto/plain_erase_failed"]["type"]="error";
$elem["partman-crypto/plain_erase_failed"]["description"]="Erasing data on ${DEVICE} failed
 An error occurred while trying to overwrite the data on ${DEVICE} with
 zeroes. The data has not been erased.
";
$elem["partman-crypto/plain_erase_failed"]["descriptionde"]="Löschen von Daten auf ${DEVICE} fehlgeschlagen
 Bei dem Versuch, die Daten auf ${DEVICE} mit Nullen zu überschreiben, ist ein Fehler aufgetreten. Die Daten wurden nicht gelöscht.
";
$elem["partman-crypto/plain_erase_failed"]["descriptionfr"]="Échec de l'effacement des données sur ${DEVICE}
 Une erreur s'est produite lors de la tentative d'écriture de zéros sur ${DEVICE}. Les données n'ont pas été effacées.
";
$elem["partman-crypto/plain_erase_failed"]["default"]="";
$elem["partman-crypto/crypto_warn_erase"]["type"]="boolean";
$elem["partman-crypto/crypto_warn_erase"]["description"]="Really erase the data on ${DEVICE}?
 The data on ${DEVICE} will be overwritten with random data. It can no
 longer be recovered after this step has completed. This is the last
 opportunity to abort the erase.
";
$elem["partman-crypto/crypto_warn_erase"]["descriptionde"]="Wirklich die Daten auf ${DEVICE} löschen?
 Die Daten auf ${DEVICE} werden mit zufälligen Daten überschrieben. Sie können nach diesem Schritt nicht mehr wiederhergestellt werden. Dies ist die letzte Gelegenheit, die Löschung abzubrechen.
";
$elem["partman-crypto/crypto_warn_erase"]["descriptionfr"]="Faut-il vraiment effacer les données sur ${DEVICE} ?
 Les données présentes sur ${DEVICE} seront écrasées avec des données aléatoires. Cette opération est irréversible. Ceci est la dernière opportunité pour refuser cette action.
";
$elem["partman-crypto/crypto_warn_erase"]["default"]="false";
$elem["partman-crypto/progress/crypto_erase_title"]["type"]="text";
$elem["partman-crypto/progress/crypto_erase_title"]["description"]="Erasing data on ${DEVICE}
";
$elem["partman-crypto/progress/crypto_erase_title"]["descriptionde"]="Daten auf ${DEVICE} werden gelöscht
";
$elem["partman-crypto/progress/crypto_erase_title"]["descriptionfr"]="Effacement des données de ${DEVICE}
";
$elem["partman-crypto/progress/crypto_erase_title"]["default"]="";
$elem["partman-crypto/progress/crypto_erase_text"]["type"]="text";
$elem["partman-crypto/progress/crypto_erase_text"]["description"]="The installer is now overwriting ${DEVICE} with random data to prevent meta-information leaks from the encrypted volume. This step may be skipped by cancelling this action, albeit at the expense of a slight reduction of the quality of the encryption.
";
$elem["partman-crypto/progress/crypto_erase_text"]["descriptionde"]="Der Installer überschreibt nun ${DEVICE} mit zufälligen Daten, um zu verhindern, dass Metainformationen des verschlüsselten Volumes zugänglich werden. Der Schritt kann durch Abbrechen dieser Aktion übersprungen werden, allerdings zum Preis einer leicht geringeren Verschlüsselungsqualität.
";
$elem["partman-crypto/progress/crypto_erase_text"]["descriptionfr"]="Le programme d'installation écrit actuellement des données aléatoires sur ${DEVICE} pour éviter la fuite de méta-informations sur le volume chiffré. Cette étape peut être interrompue en abandonnant cette action, au prix d'une légère réduction de la qualité du chiffrement.
";
$elem["partman-crypto/progress/crypto_erase_text"]["default"]="";
$elem["partman-crypto/crypto_erase_failed"]["type"]="error";
$elem["partman-crypto/crypto_erase_failed"]["description"]="Erasing data on ${DEVICE} failed
 An error occurred while trying to overwrite ${DEVICE} with random
 data. Recovery of the device's previous contents is possible and
 meta-information of its new contents may be leaked.
";
$elem["partman-crypto/crypto_erase_failed"]["descriptionde"]="Löschen von Daten auf ${DEVICE} fehlgeschlagen
 Bei dem Versuch, die Daten auf ${DEVICE} mit zufälligen Daten zu überschreiben, ist ein Fehler aufgetreten. Die Wiederherstellung der vorherigen Inhalte des Gerätes könnte möglich sein; Metainformationen der neuen Inhalte könnten möglicherweise zugänglich werden.
";
$elem["partman-crypto/crypto_erase_failed"]["descriptionfr"]="Échec de l'effacement des données sur ${DEVICE}
 Une erreur s'est produite lors de la tentative d'écriture de données aléatoires sur ${DEVICE}. La récupération des données antérieures du volume est possible, ainsi que des fuites de méta-informations du nouveau contenu.
";
$elem["partman-crypto/crypto_erase_failed"]["default"]="";
$elem["partman/progress/init/crypto"]["type"]="text";
$elem["partman/progress/init/crypto"]["description"]="Setting up encryption...
";
$elem["partman/progress/init/crypto"]["descriptionde"]="Einrichten der Verschlüsselung ...
";
$elem["partman/progress/init/crypto"]["descriptionfr"]="Configuration du chiffrement...
";
$elem["partman/progress/init/crypto"]["default"]="";
$elem["partman-crypto/text/configure_crypto"]["type"]="text";
$elem["partman-crypto/text/configure_crypto"]["description"]="Configure encrypted volumes
";
$elem["partman-crypto/text/configure_crypto"]["descriptionde"]="Verschlüsselte Datenträger konfigurieren
";
$elem["partman-crypto/text/configure_crypto"]["descriptionfr"]="Configurer les volumes chiffrés
";
$elem["partman-crypto/text/configure_crypto"]["default"]="";
$elem["partman-crypto/nothing_to_setup"]["type"]="note";
$elem["partman-crypto/nothing_to_setup"]["description"]="No partitions to encrypt
 No partitions have been selected for encryption.
";
$elem["partman-crypto/nothing_to_setup"]["descriptionde"]="Keine Partitionen zu verschlüsseln
 Es wurden keine Partitionen zur Verschlüsselung ausgewählt.
";
$elem["partman-crypto/nothing_to_setup"]["descriptionfr"]="Aucune partition à chiffrer
 Aucune partition n'a été choisie pour être chiffrée.
";
$elem["partman-crypto/nothing_to_setup"]["default"]="";
$elem["partman-crypto/tools_missing"]["type"]="note";
$elem["partman-crypto/tools_missing"]["description"]="Required programs missing
 This build of debian-installer does not include one or more programs
 that are required for partman-crypto to function correctly.
";
$elem["partman-crypto/tools_missing"]["descriptionde"]="Benötigte Programme fehlen
 Diese Version des debian-installers enthält ein oder mehrere Programme nicht, die von partman-crypto benötigt werden, um korrekt zu funktionieren.
";
$elem["partman-crypto/tools_missing"]["descriptionfr"]="Programmes nécessaires manquants
 Il manque à cette version de l'installateur certains programmes indispensables au bon fonctionnement de partman-crypto.
";
$elem["partman-crypto/tools_missing"]["default"]="";
$elem["partman-crypto/options_missing"]["type"]="error";
$elem["partman-crypto/options_missing"]["description"]="Required encryption options missing
 The encryption options for ${DEVICE} are incomplete. Please return to
 the partition menu and select all required options.
 .
 ${ITEMS}
";
$elem["partman-crypto/options_missing"]["descriptionde"]="Benötigte Verschlüsselungsoptionen fehlen
 Die Verschlüsselungsoptionen für ${DEVICE} sind unvollständig. Bitte gehen Sie zum Partitionsmenü zurück und wählen Sie alle benötigten Optionen.
 .
 ${ITEMS}
";
$elem["partman-crypto/options_missing"]["descriptionfr"]="Options requises de chiffrement manquantes
 Les options de chiffrement de ${DEVICE} ne sont pas complètes. Veuillez revenir au menu de partitionnement et sélectionner toutes les options requises.
 .
 ${ITEMS}
";
$elem["partman-crypto/options_missing"]["default"]="";
$elem["partman-crypto/text/missing"]["type"]="text";
$elem["partman-crypto/text/missing"]["description"]="missing
";
$elem["partman-crypto/text/missing"]["descriptionde"]="fehlt
";
$elem["partman-crypto/text/missing"]["descriptionfr"]="manquantes
";
$elem["partman-crypto/text/missing"]["default"]="";
$elem["partman-crypto/text/in_use"]["type"]="text";
$elem["partman-crypto/text/in_use"]["description"]="In use as physical volume for encrypted volume ${DEV}
";
$elem["partman-crypto/text/in_use"]["descriptionde"]="Wird als physikalisches Volume für verschlüsselten Datenträger ${DEV} verwendet
";
$elem["partman-crypto/text/in_use"]["descriptionfr"]="Utilisée comme volume physique pour le volume chiffré ${DEV}
";
$elem["partman-crypto/text/in_use"]["default"]="";
$elem["partman-crypto/module_package_missing"]["type"]="error";
$elem["partman-crypto/module_package_missing"]["description"]="Encryption package installation failure
 The kernel module package ${PACKAGE} could not be found or an error
 occurred during its installation.
 .
 It is likely that there will be problems setting up encrypted
 partitions when the system is rebooted. You may be able to correct
 this by installing the required package(s) later on.
";
$elem["partman-crypto/module_package_missing"]["descriptionde"]="Installation des Verschlüsselungspakets fehlgeschlagen
 Das Kernel-Modulpaket ${PACKAGE} konnte nicht gefunden werden oder es trat während der Installation ein Fehler auf.
 .
 Es wird wahrscheinlich nach dem Neustart Probleme mit der Einrichtung verschlüsselter Partitionen geben. Sie können dies später eventuell durch Installation der benötigten Pakete korrigieren.
";
$elem["partman-crypto/module_package_missing"]["descriptionfr"]="L'installation du paquet de chiffrement a échoué
 Le paquet ${PACKAGE} de modules du noyau n'a pas été trouvé ou une erreur s'est produite pendant son installation.
 .
 Il est probable que des problèmes auront lieu au démarrage lorsque le système tentera d'utiliser les partitions chiffrées. Vous pourrez cependant les corriger plus tard en installant le(s) paquet(s) requis.
";
$elem["partman-crypto/module_package_missing"]["default"]="";
$elem["partman-crypto/confirm"]["type"]="boolean";
$elem["partman-crypto/confirm"]["description"]="Write the changes to disk and configure encrypted volumes?
 Before encrypted volumes can be configured, the current
 partitioning scheme has to be written to disk.  These changes
 cannot be undone.
 .
 After the encrypted volumes have been configured, no additional
 changes to the partitions on the disks containing encrypted volumes
 are allowed. Please decide if you are satisfied with the current
 partitioning scheme for these disks before continuing.
 .
 ${ITEMS}
";
$elem["partman-crypto/confirm"]["descriptionde"]="Änderungen auf die Platte schreiben und verschlüsselte Datenträger konfigurieren?
 Bevor verschlüsselte Datenträger konfiguriert werden können, muss die aktuelle Aufteilung der Partitionen auf die Festplatte geschrieben werden. Diese Änderungen können nicht rückgängig gemacht werden.
 .
 Nachdem die verschlüsselten Datenträger konfiguriert wurden, sind weitere Änderungen an Partitionen auf den Festplatten, die verschlüsselte Datenträger enthalten, nicht mehr erlaubt. Bitte überzeugen Sie sich, ob die aktuelle Einteilung der Partitionen auf diesen Festplatten richtig ist, bevor Sie fortfahren.
 .
 ${ITEMS}
";
$elem["partman-crypto/confirm"]["descriptionfr"]="Écrire les modifications sur le disque et configurer les volumes chiffrés ?
 Avant que les volumes chiffrés puissent être configurés, le schéma actuel de partitionnement doit être appliqué aux disques. Ces changements seront irréversibles.
 .
 Une fois les volumes chiffrés configurés, aucune modification ne peut être apportée aux tables de partitions des disques qui les contiennent. Avant de continuer, veuillez vous assurer que le schéma de partitionnement actuel de ces disques vous convient.
 .
 ${ITEMS}
";
$elem["partman-crypto/confirm"]["default"]="false";
$elem["partman-crypto/confirm_nochanges"]["type"]="boolean";
$elem["partman-crypto/confirm_nochanges"]["description"]="Keep current partition layout and configure encrypted volumes?
 After the encrypted volumes have been configured, no additional changes
 to the partitions on the disks containing encrypted volumes are
 allowed. Please decide if you are satisfied with the current
 partitioning scheme for these disks before continuing.
";
$elem["partman-crypto/confirm_nochanges"]["descriptionde"]="Aktuelle Einteilung der Partitionen beibehalten und verschlüsselte Datenträger konfigurieren?
 Nachdem die verschlüsselten Datenträger konfiguriert wurden, sind weitere Änderungen an Partitionen auf den Festplatten, die verschlüsselte Datenträger enthalten, nicht mehr erlaubt. Bitte überzeugen Sie sich, ob die aktuelle Einteilung der Partitionen auf diesen Festplatten richtig ist, bevor Sie fortfahren.
";
$elem["partman-crypto/confirm_nochanges"]["descriptionfr"]="Conserver cette organisation des partitions et configurer les volumes chiffrés ?
 Une fois les volumes chiffrés configurés, aucune modification ne peut être apportée aux tables de partitions des disques qui les contiennent. Avant de continuer, veuillez vous assurer que le schéma de partitionnement actuel de ces disques vous convient.
";
$elem["partman-crypto/confirm_nochanges"]["default"]="false";
$elem["partman-crypto/commit_failed"]["type"]="error";
$elem["partman-crypto/commit_failed"]["description"]="Configuration of encrypted volumes failed
 An error occurred while configuring encrypted volumes.
 .
 The configuration has been aborted.
";
$elem["partman-crypto/commit_failed"]["descriptionde"]="Konfiguration der verschlüsselten Datenträger fehlgeschlagen
 Es trat ein Fehler auf, als die verschlüsselten Datenträger konfiguriert wurden.
 .
 Die Konfiguration wurde abgebrochen.
";
$elem["partman-crypto/commit_failed"]["descriptionfr"]="Échec de la configuration des volumes chiffrés
 Une erreur s'est produite lors de la configuration des volumes chiffrés.
 .
 La configuration a été interrompue.
";
$elem["partman-crypto/commit_failed"]["default"]="";
$elem["partman-crypto/init_failed"]["type"]="error";
$elem["partman-crypto/init_failed"]["description"]="Initialisation of encrypted volume failed
 An error occurred while setting up encrypted volumes.
";
$elem["partman-crypto/init_failed"]["descriptionde"]="Initialisierung eines verschlüsselten Datenträgers fehlgeschlagen
 Es trat ein Fehler auf, als die verschlüsselten Datenträger eingerichtet wurden.
";
$elem["partman-crypto/init_failed"]["descriptionfr"]="Échec de l'initialisation du volume chiffré
 Une erreur s'est produite lors de la création des volumes chiffrés.
";
$elem["partman-crypto/init_failed"]["default"]="";
$elem["partman-crypto/text/keytype/passphrase"]["type"]="text";
$elem["partman-crypto/text/keytype/passphrase"]["description"]="Passphrase
";
$elem["partman-crypto/text/keytype/passphrase"]["descriptionde"]="Passphrase
";
$elem["partman-crypto/text/keytype/passphrase"]["descriptionfr"]="Phrase secrète
";
$elem["partman-crypto/text/keytype/passphrase"]["default"]="";
$elem["partman-crypto/text/keytype/keyfile"]["type"]="text";
$elem["partman-crypto/text/keytype/keyfile"]["description"]="Keyfile (GnuPG)
";
$elem["partman-crypto/text/keytype/keyfile"]["descriptionde"]="Schlüsseldatei (GnuPG)
";
$elem["partman-crypto/text/keytype/keyfile"]["descriptionfr"]="Fichier de clé (GnuPG)
";
$elem["partman-crypto/text/keytype/keyfile"]["default"]="";
$elem["partman-crypto/text/keytype/random"]["type"]="text";
$elem["partman-crypto/text/keytype/random"]["description"]="Random key
";
$elem["partman-crypto/text/keytype/random"]["descriptionde"]="Zufälliger Schlüssel
";
$elem["partman-crypto/text/keytype/random"]["descriptionfr"]="Clé aléatoire
";
$elem["partman-crypto/text/keytype/random"]["default"]="";
$elem["partman-crypto/unsafe_swap"]["type"]="error";
$elem["partman-crypto/unsafe_swap"]["description"]="Unsafe swap space detected
 An unsafe swap space has been detected.
 .
 This is a fatal error since sensitive data could be written out to
 disk unencrypted. This would allow someone with access to the disk to
 recover parts of the encryption key or passphrase.
 .
 Please disable the swap space (e.g. by running swapoff) or configure
 an encrypted swap space and then run setup of encrypted volumes again.
 This program will now abort.
";
$elem["partman-crypto/unsafe_swap"]["descriptionde"]="Unsicherer Swap-Speicher entdeckt
 Ein unsicherer Swap-Speicher wurde entdeckt.
 .
 Dies ist ein schwerwiegender Fehler, da sensible Daten unverschlüsselt auf die Platte geschrieben werden könnten. Das würde es jemandem mit Zugriff auf die Platte erlauben, Teile des Schlüssels oder der Passphrase auszulesen.
 .
 Bitte deaktivieren Sie den Swap-Speicher (z.B. mit swapoff) oder konfigurieren Sie einen verschlüsselten Swap-Speicher und starten Sie die Einrichtung verschlüsselter Datenträger danach erneut. Dieses Programm wird nun abgebrochen.
";
$elem["partman-crypto/unsafe_swap"]["descriptionfr"]="Espace d'échange non chiffré détecté
 Un espace d'échange non chiffré a été détecté.
 .
 Cette erreur est fatale car des données sensibles peuvent avoir été écrites en clair sur le disque. Cela pourrait permettre à une personne disposant de l'accès physique au disque de pouvoir récupérer tout ou partie de la clé de chiffrement ou de la phrase secrète.
 .
 Veuillez désactiver l'espace d'échange (p. ex. avec la commande « swapoff ») ou configurer un espace d'échange chiffré, puis recommencer la configuration des volumes chiffrés. Ce programme va maintenant être interrompu.
";
$elem["partman-crypto/unsafe_swap"]["default"]="";
$elem["partman-crypto/passphrase"]["type"]="password";
$elem["partman-crypto/passphrase"]["description"]="Encryption passphrase:
 You need to choose a passphrase to encrypt ${DEVICE}.
 .
 The overall strength of the encryption depends strongly on this
 passphrase, so you should take care to choose a passphrase that is
 not easy to guess. It should not be a word or sentence found in
 dictionaries, or a phrase that could be easily associated with you.
 .
 A good passphrase will contain a mixture of letters, numbers and
 punctuation. Passphrases are recommended to have a length of 20 or
 more characters.
 .
 There is no way to recover this passphrase if you lose it. To avoid
 losing data, you should normally write down the passphrase and keep it
 in a safe place separate from this computer.
";
$elem["partman-crypto/passphrase"]["descriptionde"]="Verschlüsselungspassphrase:
 Sie müssen eine Passphrase wählen, um ${DEVICE} zu verschlüsseln.
 .
 Die Gesamtstärke der Verschlüsselung hängt stark von dieser Passphrase ab. Sie sollten deshalb eine Passphrase wählen, die nicht einfach zu erraten ist. Es sollte kein Wort oder Satz aus einem Wörterbuch und keine Phrase sein, die leicht mit Ihnen in Verbindung gebracht werden kann.
 .
 Eine gute Passphrase enthält eine Mischung aus Buchstaben, Zahlen und Satzzeichen. Passphrasen sollten empfohlenerweise eine Länge von 20 oder mehr Zeichen haben.
 .
 Es ist nicht möglich, die Passphrase wiederherzustellen, falls Sie sie verloren haben. Um Datenverlust zu vermeiden sollten Sie die Passphrase notieren und an einem sicheren Ort aufbewahren.
";
$elem["partman-crypto/passphrase"]["descriptionfr"]="Phrase secrète de chiffrement :
 Vous devez choisir une phrase secrète pour le chiffrement de ${DEVICE}.
 .
 La robustesse du chiffrement dépend fortement de cette phrase secrète. Vous devez donc en choisir une qui ne doit pas être facile à deviner. Elle ne devrait pas correspondre à un mot ou une phrase provenant d'un dictionnaire, ou une phrase pouvant vous être facilement associée.
 .
 Une bonne phrase secrète doit être une combinaison de lettres, chiffres et signes de ponctuation. Elle doit comporter au minimum 20 caractères.
 .
 Il n'y a aucun moyen de récupérer ce mot de passe si vous le perdez. Pour éviter la perte de données, vous devriez le noter et le garder en lieu sûr, loin de votre ordinateur.
";
$elem["partman-crypto/passphrase"]["default"]="";
$elem["partman-crypto/passphrase-again"]["type"]="password";
$elem["partman-crypto/passphrase-again"]["description"]="Re-enter passphrase to verify:
 Please enter the same passphrase again to verify that you have typed it
 correctly.
";
$elem["partman-crypto/passphrase-again"]["descriptionde"]="Erneute Eingabe der Passphrase zur Überprüfung:
 Bitte geben Sie dieselbe Passphrase noch einmal ein, um sicherzustellen, dass Sie sich nicht vertippt haben.
";
$elem["partman-crypto/passphrase-again"]["descriptionfr"]="Confirmation de la phrase secrète :
 Veuillez entrer à nouveau la phrase secrète, afin de vérifier que votre saisie est correcte.
";
$elem["partman-crypto/passphrase-again"]["default"]="";
$elem["partman-crypto/passphrase-mismatch"]["type"]="error";
$elem["partman-crypto/passphrase-mismatch"]["description"]="Passphrase input error
 The two passphrases you entered were not the same. Please try again.
";
$elem["partman-crypto/passphrase-mismatch"]["descriptionde"]="Passphrasen-Eingabefehler
 Die zwei von Ihnen eingegebenen Passphrasen sind nicht identisch. Bitte versuchen Sie es erneut.
";
$elem["partman-crypto/passphrase-mismatch"]["descriptionfr"]="Erreur de saisie de la phrase secrète
 Les deux phrases secrètes indiquées ne correspondent pas. Veuillez choisir à nouveau une phrase secrète.
";
$elem["partman-crypto/passphrase-mismatch"]["default"]="";
$elem["partman-crypto/passphrase-empty"]["type"]="error";
$elem["partman-crypto/passphrase-empty"]["description"]="Empty passphrase
 You entered an empty passphrase, which is not allowed.
 Please choose a non-empty passphrase.
";
$elem["partman-crypto/passphrase-empty"]["descriptionde"]="Leere Passphrasen
 Sie haben eine leere Passphrase eingegeben. Dies ist nicht erlaubt. Bitte wählen Sie eine nicht-leere Passphrase.
";
$elem["partman-crypto/passphrase-empty"]["descriptionfr"]="Phrase secrète vide
 Vous avez entré une phrase secrète vide, ce qui n'est pas autorisé. Veuillez choisir une phrase secrète qui ne soit pas vide.
";
$elem["partman-crypto/passphrase-empty"]["default"]="";
$elem["partman-crypto/weak_passphrase"]["type"]="boolean";
$elem["partman-crypto/weak_passphrase"]["description"]="Use weak passphrase?
 You entered a passphrase that consists of less than ${MINIMUM} characters,
 which is considered too weak. You should choose a stronger passphrase.
";
$elem["partman-crypto/weak_passphrase"]["descriptionde"]="Schwache Passphrasen verwenden?
 Sie haben eine Passphrase eingegeben, die aus weniger als ${MINIMUM} Buchstaben besteht und als zu schwach eingestuft wird. Sie sollten eine stärkere Passphrase wählen.
";
$elem["partman-crypto/weak_passphrase"]["descriptionfr"]="Faut-il vraiment utiliser une phrase secrète si faible ?
 Vous avez entré une phrase secrète de moins de ${MINIMUM} caractères, ce qui n'est pas assez robuste. Vous devriez choisir une phrase secrète plus robuste.
";
$elem["partman-crypto/weak_passphrase"]["default"]="false";
$elem["partman-crypto/entropy"]["type"]="entropy";
$elem["partman-crypto/entropy"]["description"]="The encryption key for ${DEVICE} is now being created.
";
$elem["partman-crypto/entropy"]["descriptionde"]="Der Schlüssel für ${DEVICE} wird jetzt erzeugt.
";
$elem["partman-crypto/entropy"]["descriptionfr"]="La clé de chiffrement pour ${DEVICE} est en cours de création.
";
$elem["partman-crypto/entropy"]["default"]="";
$elem["partman-crypto/entropy-success"]["type"]="text";
$elem["partman-crypto/entropy-success"]["description"]="Key data has been created successfully.
";
$elem["partman-crypto/entropy-success"]["descriptionde"]="Schlüsseldaten wurden erfolgreich erstellt.
";
$elem["partman-crypto/entropy-success"]["descriptionfr"]="La clé de chiffrement a été créée avec succès.
";
$elem["partman-crypto/entropy-success"]["default"]="";
$elem["partman-crypto/keyfile-problem"]["type"]="error";
$elem["partman-crypto/keyfile-problem"]["description"]="Keyfile creation failure
 An error occurred while creating the keyfile.
";
$elem["partman-crypto/keyfile-problem"]["descriptionde"]="Schlüsseldateierstellung fehlgeschlagen
 Es trat ein Fehler beim Erzeugen der Schlüsseldatei auf.
";
$elem["partman-crypto/keyfile-problem"]["descriptionfr"]="Échec de la création du fichier de clé
 Une erreur s'est produite lors de la création du fichier de clé.
";
$elem["partman-crypto/keyfile-problem"]["default"]="";
$elem["partman-crypto/crypto_root_needs_boot"]["type"]="error";
$elem["partman-crypto/crypto_root_needs_boot"]["description"]="Encryption configuration failure
 You have selected the root file system to be stored on an encrypted
 partition. This feature requires a separate /boot partition on which
 the kernel and initrd can be stored.
 .
 You should go back and setup a /boot partition.
";
$elem["partman-crypto/crypto_root_needs_boot"]["descriptionde"]="Verschlüsselungskonfiguration fehlgeschlagen
 Sie haben gewählt, dass das Root-Dateisystem auf einer verschlüsselten Partition abgelegt werden soll. Dieses Merkmal erfordert eine separate /boot-Partition, auf die der Kernel und die initrd gespeichert werden können.
 .
 Sie sollten zurückgehen und eine /boot-Partition einrichten.
";
$elem["partman-crypto/crypto_root_needs_boot"]["descriptionfr"]="Échec de la configuration du chiffrement
 Vous avez choisi de placer le système de fichiers racine sur une partition chiffrée. Cette fonctionnalité impose d'utiliser une partition /boot dédiée sur laquelle le noyau et l'image disque en mémoire (« initrd ») seront stockés.
 .
 Vous devriez revenir en arrière et configurer une partition /boot.
";
$elem["partman-crypto/crypto_root_needs_boot"]["default"]="";
$elem["partman-crypto/crypto_boot_not_possible"]["type"]="error";
$elem["partman-crypto/crypto_boot_not_possible"]["description"]="Encryption configuration failure
 You have selected the /boot file system to be stored on an encrypted
 partition. This is not possible because the boot loader would be unable to
 load the kernel and initrd. Continuing now would result
 in an installation that cannot be used.
 .
 You should go back and choose a non-encrypted partition for the /boot
 file system.
";
$elem["partman-crypto/crypto_boot_not_possible"]["descriptionde"]="Verschlüsselungskonfiguration fehlgeschlagen
 Sie haben gewählt, dass das /boot-Dateisystem auf einer verschlüsselten Partition abgelegt werden soll. Dies ist nicht möglich, da der Bootloader nicht in der Lage wäre, den Kernel und die initrd zu laden. Ein Fortfahren würde in einer Installation enden, die nicht benutzt werden kann.
 .
 Sie sollten zurückgehen und eine nicht verschlüsselte Partition für das /boot-Dateisystem wählen.
";
$elem["partman-crypto/crypto_boot_not_possible"]["descriptionfr"]="Échec de la configuration du chiffrement
 Vous avez choisi de placer le système de fichiers /boot sur une partition chiffrée. Ce choix n'est pas possible car le gestionnaire d'amorçage ne pourra pas charger le noyau et l'image disque en mémoire (« initrd »). Si vous continuez, le système installé sera inutilisable.
 .
 Vous devriez revenir en arrière et choisir une partition non chiffrée pour le système de fichiers /boot.
";
$elem["partman-crypto/crypto_boot_not_possible"]["default"]="";
$elem["partman-crypto/use_random_for_nonswap"]["type"]="boolean";
$elem["partman-crypto/use_random_for_nonswap"]["description"]="Are you sure you want to use a random key?
 You have chosen a random key type for ${DEVICE} but requested the
 partitioner to create a file system on it.
 .
 Using a random key type means that the partition data is going to
 be destroyed upon each reboot. This should only be used for
 swap partitions.
";
$elem["partman-crypto/use_random_for_nonswap"]["descriptionde"]="Sind Sie sicher, dass Sie einen zufälligen Schlüssel verwenden möchten?
 Sie haben einen zufälligen Schlüsseltyp für ${DEVICE} ausgewählt, aber den Partitionierer angewiesen, ein Dateisystem darauf zu erzeugen.
 .
 Die Verwendung eines zufälligen Schlüsseltyps bedeutet, dass die Partitionsdaten bei jedem Neustart zerstört werden. Dies sollte nur für Swap-Partitionen verwendet werden.
";
$elem["partman-crypto/use_random_for_nonswap"]["descriptionfr"]="Voulez-vous vraiment utiliser une clé aléatoire ?
 Vous avez choisi d'utiliser une clé aléatoire pour ${DEVICE} mais vous avez demandé à l'outil de partitionnement d'y créer un système de fichiers.
 .
 L'utilisation d'une clé de chiffrement aléatoire implique que les données de la partition seront détruites à chaque redémarrage. Cette fonctionnalité doit être réservée aux espaces d'échange (« swap »).
";
$elem["partman-crypto/use_random_for_nonswap"]["default"]="false";
$elem["partman-crypto/install_udebs_failure"]["type"]="error";
$elem["partman-crypto/install_udebs_failure"]["description"]="Failed to download crypto components
 An error occurred trying to download additional crypto components.
";
$elem["partman-crypto/install_udebs_failure"]["descriptionde"]="Herunterladen der Verschlüsselungskomponenten fehlgeschlagen
 Es trat ein Fehler beim Versuch auf, zusätzliche Verschlüsselungskomponenten herunterzuladen.
";
$elem["partman-crypto/install_udebs_failure"]["descriptionfr"]="Échec de la récupération de composants de chiffrement
 Une erreur s'est produite lors de la récupération de composants supplémentaires pour la gestion des partitions chiffrées.
";
$elem["partman-crypto/install_udebs_failure"]["default"]="";
$elem["partman-crypto/install_udebs_low_mem"]["type"]="boolean";
$elem["partman-crypto/install_udebs_low_mem"]["description"]="Proceed to install crypto components despite insufficient memory?
 There does not seem to be sufficient memory available to install
 additional crypto components. If you choose to go ahead and continue
 anyway, the installation process could fail.
";
$elem["partman-crypto/install_udebs_low_mem"]["descriptionde"]="Trotz unzureichendem Speicher mit der Installation der Verschlüsselungskomponenten fortfahren?
 Es scheint nicht ausreichend Speicher vorhanden zu sein, um zusätzliche Verschlüsselungskomponenten zu installieren. Der Installationsvorgang kann fehlschlagen, falls Sie sich entscheiden, dennoch fortzufahren.
";
$elem["partman-crypto/install_udebs_low_mem"]["descriptionfr"]="Continuer l'installation des composants de chiffrement malgré le manque de mémoire ?
 La mémoire disponible semble être insuffisante pour installer des composants de gestion du chiffrement des partitions. Si vous choisissez de continuer malgré tout, le processus d'installation pourrait échouer.
";
$elem["partman-crypto/install_udebs_low_mem"]["default"]="";
$elem["partman-crypto/mainmenu"]["type"]="select";
$elem["partman-crypto/mainmenu"]["choices"][1]="Activate existing encrypted volumes";
$elem["partman-crypto/mainmenu"]["choices"][2]="Create encrypted volumes";
$elem["partman-crypto/mainmenu"]["description"]="Encryption configuration actions
 This menu allows you to configure encrypted volumes.
";
$elem["partman-crypto/mainmenu"]["descriptionde"]="Aktionen zur Verschlüsselungskonfiguration
 Dieses Menü erlaubt die Konfiguration verschlüsselter Datenträger.
";
$elem["partman-crypto/mainmenu"]["descriptionfr"]="Action de configuration du chiffrement
 Ce menu permet la configuration des volumes chiffrés.
";
$elem["partman-crypto/mainmenu"]["default"]="";
$elem["partman-crypto/create/partitions"]["type"]="multiselect";
$elem["partman-crypto/create/partitions"]["description"]="Devices to encrypt:
 Please select the devices to be encrypted.
 .
 You can select one or more devices.
";
$elem["partman-crypto/create/partitions"]["descriptionde"]="Zu verschlüsselnde Geräte:
 Bitte wählen Sie die Geräte aus, die verschlüsselt werden sollen.
 .
 Sie können ein oder mehrere Geräte auswählen.
";
$elem["partman-crypto/create/partitions"]["descriptionfr"]="Périphériques à chiffrer :
 Veuillez choisir les périphériques qui doivent être chiffrés.
 .
 Vous pouvez sélectionner un ou plusieurs périphériques.
";
$elem["partman-crypto/create/partitions"]["default"]="";
$elem["partman-crypto/create/nosel"]["type"]="error";
$elem["partman-crypto/create/nosel"]["description"]="No devices selected
 No devices were selected for encryption.
";
$elem["partman-crypto/create/nosel"]["descriptionde"]="Keine Geräte ausgewählt
 Es wurden keine Geräte zur Verschlüsselung ausgewählt.
";
$elem["partman-crypto/create/nosel"]["descriptionfr"]="Pas de périphérique choisi
 Aucun périphérique n'a été choisi pour être chiffré.
";
$elem["partman-crypto/create/nosel"]["default"]="";
$elem["partman-crypto/activate/no_luks"]["type"]="error";
$elem["partman-crypto/activate/no_luks"]["description"]="No LUKS devices found
 This partitioning program can only activate existing encrypted volumes that
 use the LUKS format (dm-crypt with a passphrase). No such volumes were
 found. If you have encrypted volumes using other formats, you may need to
 back up your data before continuing with installation.

";
$elem["partman-crypto/activate/no_luks"]["descriptionde"]="";
$elem["partman-crypto/activate/no_luks"]["descriptionfr"]="";
$elem["partman-crypto/activate/no_luks"]["default"]="";
$elem["partman-crypto/activate/passphrase-existing"]["type"]="password";
$elem["partman-crypto/activate/passphrase-existing"]["description"]="Passphrase for ${DEVICE}:
 Please enter the passphrase for the encrypted volume ${DEVICE}.
 .
 If you don't enter anything, the volume will not be activated.

";
$elem["partman-crypto/activate/passphrase-existing"]["descriptionde"]="";
$elem["partman-crypto/activate/passphrase-existing"]["descriptionfr"]="";
$elem["partman-crypto/activate/passphrase-existing"]["default"]="";
$elem["partman-target/arch_help/ia64"]["type"]="text";
$elem["partman-target/arch_help/ia64"]["description"]="In order to start your new system, the firmware on your Itanium system loads the boot loader from its private EFI partition on the hard disk.  The boot loader then loads the operating system from that same partition.  An EFI partition has a FAT16 file system formatted on it and the bootable flag set. Most installations place the EFI partition on the first primary partition of the same hard disk that holds the root file system.
";
$elem["partman-target/arch_help/ia64"]["descriptionde"]="Damit Ihr Computer Debian starten kann, lädt die Firmware Ihres Itanium-Systems den Bootloader aus der EFI-Partition der Festplatte. Der Bootloader lädt dann das Betriebssystem von derselben Partition. Eine EFI-Partition ist ein FAT16-Dateisystem mit gesetztem »Boot«-Flag. Die meisten Installationen haben die EFI-Partition in der ersten primären Partition der Festplatte, auf der sich auch das Wurzeldateisystem befindet.
";
$elem["partman-target/arch_help/ia64"]["descriptionfr"]="Afin de démarrer le nouveau système, le microcode (« firmware ») du système Itanium charge le gestionnaire de démarrage depuis la partition spéciale EFI du disque dur. Le gestionnaire de démarrage charge ensuite le système d'exploitation depuis cette partition. Une partition EFI utilise le système de fichiers FAT16 et doit être marquée comme amorçable. Dans la plupart des installations, cette partition est la première partition primaire du disque qui comporte le système de fichiers racine.
";
$elem["partman-target/arch_help/ia64"]["default"]="";
$elem["partman-efi/text/efi"]["type"]="text";
$elem["partman-efi/text/efi"]["description"]="EFI System Partition
";
$elem["partman-efi/text/efi"]["descriptionde"]="EFI-System-Partition
";
$elem["partman-efi/text/efi"]["descriptionfr"]="Partition système EFI
";
$elem["partman-efi/text/efi"]["default"]="";
$elem["partman-efi/no_efi"]["type"]="boolean";
$elem["partman-efi/no_efi"]["description"]="Go back to the menu and resume partitioning?
 No EFI partition was found.
";
$elem["partman-efi/no_efi"]["descriptionde"]="Zurück zum Hauptmenü und Partitionierung fortsetzen?
 Es wurde keine EFI-Partition gefunden.
";
$elem["partman-efi/no_efi"]["descriptionfr"]="Revenir au menu et reprendre le partitionnement ?
 Aucune partition EFI n'a été trouvée.
";
$elem["partman-efi/no_efi"]["default"]="";
$elem["partman/method_long/efi"]["type"]="text";
$elem["partman/method_long/efi"]["description"]="EFI System Partition
";
$elem["partman/method_long/efi"]["descriptionde"]="EFI-System-Partition
";
$elem["partman/method_long/efi"]["descriptionfr"]="Partition système EFI
";
$elem["partman/method_long/efi"]["default"]="";
$elem["partman/method_short/efi"]["type"]="text";
$elem["partman/method_short/efi"]["description"]="ESP
";
$elem["partman/method_short/efi"]["descriptionde"]="ESP
";
$elem["partman/method_short/efi"]["descriptionfr"]="ESP
";
$elem["partman/method_short/efi"]["default"]="";
$elem["partman/filesystem_short/efi"]["type"]="text";
$elem["partman/filesystem_short/efi"]["description"]="EFI-fat16
";
$elem["partman/filesystem_short/efi"]["descriptionde"]="EFI-fat16
";
$elem["partman/filesystem_short/efi"]["descriptionfr"]="EFI-fat16
";
$elem["partman/filesystem_short/efi"]["default"]="";
$elem["partman-efi/too_small_efi"]["type"]="error";
$elem["partman-efi/too_small_efi"]["description"]="EFI partition too small
 EFI System Partitions on this architecture cannot be created with a size
 less than 35 MB. Please make the EFI System Partition larger.
";
$elem["partman-efi/too_small_efi"]["descriptionde"]="EFI-Partition zu klein
 EFI-System-Partitionen auf dieser Architektur können nicht in einer Größe unter 35 MB erstellt werden. Bitte vergrößern Sie die EFI-System-Partition.
";
$elem["partman-efi/too_small_efi"]["descriptionfr"]="Partition EFI trop petite
 Les partitions système EFI, pour cette architecture, ne peuvent pas être créées avec une taille inférieure à 35 Mo. Veuillez augmenter la taille de la partition système EFI.
";
$elem["partman-efi/too_small_efi"]["default"]="";
$elem["partman-efi/non_efi_system"]["type"]="boolean";
$elem["partman-efi/non_efi_system"]["description"]="Force UEFI installation?
 This machine's firmware has started the installer in UEFI mode but
 it looks like there may be existing operating systems already
 installed using \"BIOS compatibility mode\". If you
 continue to install Debian in UEFI mode, it might be difficult to
 reboot the machine into any BIOS-mode operating systems later.
 .
 If you wish to install in UEFI mode and don't care about
 keeping the ability to boot one of the existing systems, you have the
 option to force that here. If you wish to keep the option to boot an
 existing operating system, you should choose NOT to force UEFI
 installation here.
";
$elem["partman-efi/non_efi_system"]["descriptionde"]="UEFI-Installation erzwingen?
 Die Firmware dieses Rechners hat den Installer im UEFI-Modus gestartet, aber scheinbar existieren weitere Betriebssysteme auf dem Rechner, die im »BIOS-Kompatibilitätsmodus« installiert wurden. Wenn Sie mit der Debian-Installation im UEFI-Modus fortfahren, könnte es später problematisch werden, eines der anderen Betriebssysteme im BIOS-Modus zu starten.
 .
 Falls Sie im UEFI-Modus installieren möchten und die Möglichkeit zum Starten der anderen Betriebssysteme nicht benötigen, können Sie dies hiermit erzwingen. Möchten Sie die anderen Betriebssysteme weiterhin startfähig halten, sollten Sie die UEFI-Installation NICHT fortsetzen.
";
$elem["partman-efi/non_efi_system"]["descriptionfr"]="Forcer l'installation UEFI ?
 Le microcode de ce système a démarré l'installateur en mode UEFI mais il semble exister d'autres systèmes d'exploitation installés qui utilisent le mode de compatibilité BIOS. Si vous poursuivez l'installation en mode UEFI, il peut être difficile de redémarrer ces systèmes d'exploitation ultérieurement.
 .
 Vous pouvez forcer l'installation en mode UEFI si vous souhaitez poursuivre malgré tout et risquer de ne pas pouvoir démarrer les autres systèmes installés. Si vous souhaitez conserver la possibilité de démarrer les autres systèmes installés, vous ne devriez PAS forcer l'installation en mode UEFI.
";
$elem["partman-efi/non_efi_system"]["default"]="";
$elem["partman-ext3/text/ext3"]["type"]="text";
$elem["partman-ext3/text/ext3"]["description"]="ext3
";
$elem["partman-ext3/text/ext3"]["descriptionde"]="ext3
";
$elem["partman-ext3/text/ext3"]["descriptionfr"]="ext3
";
$elem["partman-ext3/text/ext3"]["default"]="";
$elem["partman/filesystem_long/ext3"]["type"]="text";
$elem["partman/filesystem_long/ext3"]["description"]="Ext3 journaling file system
";
$elem["partman/filesystem_long/ext3"]["descriptionde"]="Ext3-Journaling-Dateisystem
";
$elem["partman/filesystem_long/ext3"]["descriptionfr"]="système de fichiers journalisé ext3
";
$elem["partman/filesystem_long/ext3"]["default"]="";
$elem["partman/filesystem_short/ext3"]["type"]="text";
$elem["partman/filesystem_short/ext3"]["description"]="ext3
";
$elem["partman/filesystem_short/ext3"]["descriptionde"]="ext3
";
$elem["partman/filesystem_short/ext3"]["descriptionfr"]="ext3
";
$elem["partman/filesystem_short/ext3"]["default"]="";
$elem["partman-ext3/text/ext4"]["type"]="text";
$elem["partman-ext3/text/ext4"]["description"]="ext4
";
$elem["partman-ext3/text/ext4"]["descriptionde"]="ext4
";
$elem["partman-ext3/text/ext4"]["descriptionfr"]="ext4
";
$elem["partman-ext3/text/ext4"]["default"]="";
$elem["partman/filesystem_long/ext4"]["type"]="text";
$elem["partman/filesystem_long/ext4"]["description"]="Ext4 journaling file system
";
$elem["partman/filesystem_long/ext4"]["descriptionde"]="Ext4-Journaling-Dateisystem
";
$elem["partman/filesystem_long/ext4"]["descriptionfr"]="système de fichiers journalisé ext4
";
$elem["partman/filesystem_long/ext4"]["default"]="";
$elem["partman/filesystem_short/ext4"]["type"]="text";
$elem["partman/filesystem_short/ext4"]["description"]="ext4
";
$elem["partman/filesystem_short/ext4"]["descriptionde"]="ext4
";
$elem["partman/filesystem_short/ext4"]["descriptionfr"]="ext4
";
$elem["partman/filesystem_short/ext4"]["default"]="";
$elem["partman-ext3/boot_not_ext2_or_ext3"]["type"]="boolean";
$elem["partman-ext3/boot_not_ext2_or_ext3"]["description"]="Go back to the menu and correct this problem?
 Your boot partition has not been configured with the ext2 or ext3
 file system. This is needed by your machine in order to boot. Please go
 back and use either the ext2 or ext3 file system.
 .
 If you do not go back to the partitioning menu and correct this error,
 the partition will be used as is. This means that you may not be able
 to boot from your hard disk.
";
$elem["partman-ext3/boot_not_ext2_or_ext3"]["descriptionde"]="Möchten Sie zum Hauptmenü zurückkehren, um die Fehler zu beheben?
 Ihre Boot-Partition wurde nicht mit dem Ext2- oder Ext3-Dateisystem konfiguriert. Dies ist allerdings nötig, damit der Computer starten kann. Bitte gehen Sie zurück und wählen Sie entweder ext2 oder ext3 als Dateisystem aus.
 .
 Wenn Sie nicht zum Partitionierungsmenü zurückkehren und diesen Fehler beheben, wird die Partition genutzt, wie sie jetzt ist. Das bedeutet, dass Sie eventuell nicht von Ihrer Festplatte starten können.
";
$elem["partman-ext3/boot_not_ext2_or_ext3"]["descriptionfr"]="Revenir au menu et corriger ce défaut ?
 La partition de démarrage n'a pas été configurée avec un système de fichiers ext2 ou ext3. Ce système de fichiers est indispensable pour le démarrage de la machine. Veuillez recommencer et utiliser un système de fichiers ext2 ou ext3.
 .
 Si vous ne revenez pas au menu de partitionnement pour corriger ce défaut, la partition sera utilisée telle quelle. Cela signifie que vous ne pourrez probablement pas démarrer à partir du disque dur.
";
$elem["partman-ext3/boot_not_ext2_or_ext3"]["default"]="";
$elem["partman/boot_not_first_partition"]["type"]="boolean";
$elem["partman/boot_not_first_partition"]["description"]="Go back to the menu and correct this problem?
 Your boot partition is not located on the first primary partition of your
 hard disk. This is needed by your machine in order to boot.  Please go
 back and use your first primary partition as a boot partition.
 .
 If you do not go back to the partitioning menu and correct this error,
 the partition will be used as is. This means that you may not be able
 to boot from your hard disk.
";
$elem["partman/boot_not_first_partition"]["descriptionde"]="Möchten Sie zum Hauptmenü zurückkehren, um die Fehler zu beheben?
 Ihre Boot-Partition befindet sich nicht auf der ersten primären Partition Ihrer Festplatte. Dies ist aber nötig, damit der Computer starten kann. Bitte gehen Sie zurück und wählen Sie die erste primäre Partition als Boot-Partition aus.
 .
 Wenn Sie nicht zum Partitionierungsmenü zurückkehren und diesen Fehler beheben, wird die Partition genutzt, wie sie jetzt ist. Das bedeutet, dass Sie eventuell nicht von Ihrer Festplatte starten können.
";
$elem["partman/boot_not_first_partition"]["descriptionfr"]="Revenir au menu et corriger ce défaut ?
 La partition de démarrage n'est pas la première partition primaire du disque. Cela est indispensable pour le démarrage de la machine. Veuillez recommencer et utiliser la première partition primaire comme partition de démarrage.
 .
 Si vous ne revenez pas au menu de partitionnement pour corriger ce défaut, la partition sera utilisée telle quelle. Cela signifie que vous ne pourrez probablement pas démarrer à partir du disque dur.
";
$elem["partman/boot_not_first_partition"]["default"]="";
$elem["partman-ext3/boot_not_bootable"]["type"]="boolean";
$elem["partman-ext3/boot_not_bootable"]["description"]="Return to the menu to set the bootable flag?
 The boot partition has not been marked as a bootable partition, even
 though this is required by your machine in order to boot. You should go
 back and set the bootable flag for the boot partition.
 .
 If you don't correct this, the partition will be used as is and it is
 likely that the machine cannot boot from its hard disk.
";
$elem["partman-ext3/boot_not_bootable"]["descriptionde"]="Zum Menü zurückkehren, um die boot-fähig-Markierung zu setzen?
 Die boot-Partition wurde nicht als boot-fähig markiert; dies ist jedoch nötig, damit Ihr Computer starten kann. Sie sollten zurückgehen und die boot-fähig-Markierung für die boot-Partition setzen.
 .
 Wenn Sie dies nicht korrigieren, wird die Partition so verwendet, wie sie jetzt ist und es ist wahrscheinlich, dass Sie Ihren Computer dann nicht von der Festplatte starten können.
";
$elem["partman-ext3/boot_not_bootable"]["descriptionfr"]="Revenir au menu pour placer l'indicateur d'amorçage ?
 La partition de démarrage n'est pas marquée comme étant amorçable. Cela est indispensable pour le démarrage de la machine. Veuillez revenir au menu et placer l'indicateur d'amorçage à cette partition.
 .
 Si vous ne corrigez pas cela, la partition sera utilisée telle quelle et la machine ne pourra probablement pas démarrer à partir du disque dur.
";
$elem["partman-ext3/boot_not_bootable"]["default"]="";
$elem["partman-ext3/bad_alignment"]["type"]="boolean";
$elem["partman-ext3/bad_alignment"]["description"]="Do you want to return to the partitioning menu?
 The partition ${PARTITION} assigned to ${MOUNTPOINT} starts at an offset of
 ${OFFSET} bytes from the minimum alignment for this disk, which may lead to
 very poor performance.
 .
 Since you are formatting this partition, you should correct this problem
 now by realigning the partition, as it will be difficult to change later.
 To do this, go back to the main partitioning menu, delete the partition,
 and recreate it in the same position with the same settings. This will
 cause the partition to start at a point best suited for this disk.
";
$elem["partman-ext3/bad_alignment"]["descriptionde"]="Möchten Sie zum Partitionierungsmenü zurückkehren?
 Die Partition ${PARTITION}, die ${MOUNTPOINT} zugewiesen ist, beginnt bei einem Offset von ${OFFSET} Bytes ab der Minimum-Grenze für diese Platte, was zu einer sehr schlechten Performance führen könnte.
 .
 Da Sie diese Partition formatieren möchten, sollten Sie dieses Problem jetzt korrigieren, indem Sie die Partition neu ausrichten, da es schwierig sein wird, dies später zu ändern. Gehen Sie dazu zum Haupt-Partitionierungsmenü zurück, löschen Sie die Partition und erzeugen Sie sie an der gleichen Position mit den gleichen Einstellungen neu. Dies führt dazu, dass die Partition an dem für diese Platte optimalen Punkt beginnt.
";
$elem["partman-ext3/bad_alignment"]["descriptionfr"]="Souhaitez-vous revenir au menu de partitionnement ?
 La partition ${PARTITION} affectée à ${MOUNTPOINT} commence avec un décalage de ${OFFSET} octets de l'alignement minimum pour ce disque, ce qui peut avoir des conséquences importantes sur les performances.
 .
 Comme vous êtes en train de formater cette partition, vous devriez corriger ce problème maintenant en réalignant la partition car cela sera difficile à modifier plus tard. Pour cela, il est nécessaire de revenir au menu de partitionnement, supprimer la partition et la recréer au même endroit avec les mêmes réglages. Cela permettra qu'elle commence à un endroit adapté pour ce disque.
";
$elem["partman-ext3/bad_alignment"]["default"]="";
$elem["partman-ext3/lazy_itable_init"]["type"]="boolean";
$elem["partman-ext3/lazy_itable_init"]["description"]="for internal use; can be preseeded
 Pass '-E lazy_itable_init' to mkfs.  This is currently unsafe when used on
 previously-used areas of disk, since e2fsck can then get confused with
 inodes from previous filesystems, so it's off by default; but it can make
 filesystem initialisation much faster on large disks.

";
$elem["partman-ext3/lazy_itable_init"]["descriptionde"]="";
$elem["partman-ext3/lazy_itable_init"]["descriptionfr"]="";
$elem["partman-ext3/lazy_itable_init"]["default"]="false";
$elem["partman-jfs/text/jfs"]["type"]="text";
$elem["partman-jfs/text/jfs"]["description"]="jfs
";
$elem["partman-jfs/text/jfs"]["descriptionde"]="jfs
";
$elem["partman-jfs/text/jfs"]["descriptionfr"]="jfs
";
$elem["partman-jfs/text/jfs"]["default"]="";
$elem["partman/filesystem_long/jfs"]["type"]="text";
$elem["partman/filesystem_long/jfs"]["description"]="JFS journaling file system
";
$elem["partman/filesystem_long/jfs"]["descriptionde"]="JFS-Journaling-Dateisystem
";
$elem["partman/filesystem_long/jfs"]["descriptionfr"]="système de fichiers journalisé JFS
";
$elem["partman/filesystem_long/jfs"]["default"]="";
$elem["partman/filesystem_short/jfs"]["type"]="text";
$elem["partman/filesystem_short/jfs"]["description"]="jfs
";
$elem["partman/filesystem_short/jfs"]["descriptionde"]="jfs
";
$elem["partman/filesystem_short/jfs"]["descriptionfr"]="jfs
";
$elem["partman/filesystem_short/jfs"]["default"]="";
$elem["partman-jfs/jfs_root"]["type"]="boolean";
$elem["partman-jfs/jfs_root"]["description"]="Use unrecommended JFS root file system?
 Your root file system is a JFS file system. This can cause problems
 with the boot loader used by default by this installer.
 .
 You should use a small /boot partition with another file system, such as ext3.
";
$elem["partman-jfs/jfs_root"]["descriptionde"]="JFS-Root-Dateisystem benutzen, obwohl es nicht empfohlen wird?
 Ihr Root-Dateisystem ist ein JFS-Dateisystem. Dies kann zu Problemen mit dem Standard-Bootloader dieses Installers führen.
 .
 Sie sollten eine kleine /boot-Partition mit einem anderen Dateisystem, wie etwa ext3, verwenden.
";
$elem["partman-jfs/jfs_root"]["descriptionfr"]="Faut-il utiliser un système de fichiers JFS pour la racine (déconseillé) ?
 Le système de fichiers pour la partition racine est un système JFS. Ce choix risque de provoquer des difficultés avec le programme de démarrage qui est utilisé par défaut par le programme d'installation.
 .
 Vous devriez utiliser une petite partition /boot avec un autre système de fichiers, par exemple ext3.
";
$elem["partman-jfs/jfs_root"]["default"]="false";
$elem["partman-jfs/jfs_boot"]["type"]="boolean";
$elem["partman-jfs/jfs_boot"]["description"]="Use unrecommended JFS /boot file system?
 You have mounted a JFS file system as /boot. This is likely to cause
 problems with the boot loader used by default by this installer.
 .
 You should use another file system, such as ext3, for the /boot partition.
";
$elem["partman-jfs/jfs_boot"]["descriptionde"]="Nicht empfohlenes JFS-Dateisystem für /boot benutzen?
 Sie haben ein JFS-Dateisystem als /boot eingebunden. Dies wird vermutlich zu Problemen mit dem Bootloader dieses Installers führen.
 .
 Sie sollten ein anderes Dateisystem für die /boot-Partition benutzen, ext3 etwa.
";
$elem["partman-jfs/jfs_boot"]["descriptionfr"]="Faut-il utiliser un système de fichiers JFS pour /boot (déconseillé) ?
 Le système de fichiers pour la partition /boot est un système JFS. Ce choix risque de provoquer des difficultés avec le programme de démarrage qui est utilisé par défaut par le programme d'installation.
 .
 Vous devriez utiliser un autre système de fichiers, par exemple ext3, pour la partition /boot.
";
$elem["partman-jfs/jfs_boot"]["default"]="false";
$elem["partman-lvm/text/configuration_freepvs"]["type"]="text";
$elem["partman-lvm/text/configuration_freepvs"]["description"]="Unallocated physical volumes:
";
$elem["partman-lvm/text/configuration_freepvs"]["descriptionde"]="Nichtzugewiesene physikalische Volumes:
";
$elem["partman-lvm/text/configuration_freepvs"]["descriptionfr"]="Volumes physiques non alloués :
";
$elem["partman-lvm/text/configuration_freepvs"]["default"]="";
$elem["partman-lvm/text/configuration_vgs"]["type"]="text";
$elem["partman-lvm/text/configuration_vgs"]["description"]="Volume groups:
";
$elem["partman-lvm/text/configuration_vgs"]["descriptionde"]="Volume-Gruppen:
";
$elem["partman-lvm/text/configuration_vgs"]["descriptionfr"]="Groupe de volumes :
";
$elem["partman-lvm/text/configuration_vgs"]["default"]="";
$elem["partman-lvm/text/configuration_pv"]["type"]="text";
$elem["partman-lvm/text/configuration_pv"]["description"]="Uses physical volume:
";
$elem["partman-lvm/text/configuration_pv"]["descriptionde"]="Verwendet physikalisches Volume:
";
$elem["partman-lvm/text/configuration_pv"]["descriptionfr"]="Utilise le volume physique :
";
$elem["partman-lvm/text/configuration_pv"]["default"]="";
$elem["partman-lvm/text/configuration_lv"]["type"]="text";
$elem["partman-lvm/text/configuration_lv"]["description"]="Provides logical volume:
";
$elem["partman-lvm/text/configuration_lv"]["descriptionde"]="Enthält logisches Volume:
";
$elem["partman-lvm/text/configuration_lv"]["descriptionfr"]="Fournit le volume logique :
";
$elem["partman-lvm/text/configuration_lv"]["default"]="";
$elem["partman-lvm/text/configuration_none_pvs"]["type"]="text";
$elem["partman-lvm/text/configuration_none_pvs"]["description"]="none
";
$elem["partman-lvm/text/configuration_none_pvs"]["descriptionde"]="Keine
";
$elem["partman-lvm/text/configuration_none_pvs"]["descriptionfr"]="aucun
";
$elem["partman-lvm/text/configuration_none_pvs"]["default"]="";
$elem["partman-lvm/text/configuration_none_vgs"]["type"]="text";
$elem["partman-lvm/text/configuration_none_vgs"]["description"]="none
";
$elem["partman-lvm/text/configuration_none_vgs"]["descriptionde"]="Keine
";
$elem["partman-lvm/text/configuration_none_vgs"]["descriptionfr"]="aucun
";
$elem["partman-lvm/text/configuration_none_vgs"]["default"]="";
$elem["partman-lvm/text/configure_lvm"]["type"]="text";
$elem["partman-lvm/text/configure_lvm"]["description"]="Configure the Logical Volume Manager
";
$elem["partman-lvm/text/configure_lvm"]["descriptionde"]="Logical Volume Manager konfigurieren
";
$elem["partman-lvm/text/configure_lvm"]["descriptionfr"]="Configurer le gestionnaire de volumes logiques (LVM)
";
$elem["partman-lvm/text/configure_lvm"]["default"]="";
$elem["partman-lvm/text/pvs"]["type"]="text";
$elem["partman-lvm/text/pvs"]["description"]="PV
";
$elem["partman-lvm/text/pvs"]["descriptionde"]="PV
";
$elem["partman-lvm/text/pvs"]["descriptionfr"]="VP
";
$elem["partman-lvm/text/pvs"]["default"]="";
$elem["partman-lvm/text/in_use"]["type"]="text";
$elem["partman-lvm/text/in_use"]["description"]="In use by LVM volume group ${VG}
";
$elem["partman-lvm/text/in_use"]["descriptionde"]="Wird von LVM-Volume-Gruppe ${VG} verwendet
";
$elem["partman-lvm/text/in_use"]["descriptionfr"]="Utilisée par le groupe de volume LVM ${VG}
";
$elem["partman-lvm/text/in_use"]["default"]="";
$elem["partman-lvm/menu/display"]["type"]="text";
$elem["partman-lvm/menu/display"]["description"]="Display configuration details
";
$elem["partman-lvm/menu/display"]["descriptionde"]="Konfigurationsdetails anzeigen
";
$elem["partman-lvm/menu/display"]["descriptionfr"]="Afficher les détails de configuration
";
$elem["partman-lvm/menu/display"]["default"]="";
$elem["partman-lvm/menu/createvg"]["type"]="text";
$elem["partman-lvm/menu/createvg"]["description"]="Create volume group
";
$elem["partman-lvm/menu/createvg"]["descriptionde"]="Volume-Gruppe erstellen
";
$elem["partman-lvm/menu/createvg"]["descriptionfr"]="Créer un groupe de volumes
";
$elem["partman-lvm/menu/createvg"]["default"]="";
$elem["partman-lvm/menu/deletevg"]["type"]="text";
$elem["partman-lvm/menu/deletevg"]["description"]="Delete volume group
";
$elem["partman-lvm/menu/deletevg"]["descriptionde"]="Volume-Gruppe löschen
";
$elem["partman-lvm/menu/deletevg"]["descriptionfr"]="Supprimer un groupe de volumes
";
$elem["partman-lvm/menu/deletevg"]["default"]="";
$elem["partman-lvm/menu/extendvg"]["type"]="text";
$elem["partman-lvm/menu/extendvg"]["description"]="Extend volume group
";
$elem["partman-lvm/menu/extendvg"]["descriptionde"]="Volume-Gruppe erweitern
";
$elem["partman-lvm/menu/extendvg"]["descriptionfr"]="Étendre un groupe de volumes
";
$elem["partman-lvm/menu/extendvg"]["default"]="";
$elem["partman-lvm/menu/reducevg"]["type"]="text";
$elem["partman-lvm/menu/reducevg"]["description"]="Reduce volume group
";
$elem["partman-lvm/menu/reducevg"]["descriptionde"]="Volume-Gruppe reduzieren
";
$elem["partman-lvm/menu/reducevg"]["descriptionfr"]="Réduire un groupe de volumes
";
$elem["partman-lvm/menu/reducevg"]["default"]="";
$elem["partman-lvm/menu/createlv"]["type"]="text";
$elem["partman-lvm/menu/createlv"]["description"]="Create logical volume
";
$elem["partman-lvm/menu/createlv"]["descriptionde"]="Logisches Volume erstellen
";
$elem["partman-lvm/menu/createlv"]["descriptionfr"]="Créer un volume logique
";
$elem["partman-lvm/menu/createlv"]["default"]="";
$elem["partman-lvm/menu/deletelv"]["type"]="text";
$elem["partman-lvm/menu/deletelv"]["description"]="Delete logical volume
";
$elem["partman-lvm/menu/deletelv"]["descriptionde"]="Logisches Volume löschen
";
$elem["partman-lvm/menu/deletelv"]["descriptionfr"]="Supprimer un volume logique
";
$elem["partman-lvm/menu/deletelv"]["default"]="";
$elem["partman-lvm/menu/finish"]["type"]="text";
$elem["partman-lvm/menu/finish"]["description"]="Finish
";
$elem["partman-lvm/menu/finish"]["descriptionde"]="Fertigstellen
";
$elem["partman-lvm/menu/finish"]["descriptionfr"]="Terminer
";
$elem["partman-lvm/menu/finish"]["default"]="";
$elem["partman-lvm/confirm"]["type"]="boolean";
$elem["partman-lvm/confirm"]["description"]="Write the changes to disks and configure LVM?
 Before the Logical Volume Manager can be configured, the current
 partitioning scheme has to be written to disk. These changes cannot
 be undone.
 .
 After the Logical Volume Manager is configured, no additional changes
 to the partitioning scheme of disks containing physical volumes are
 allowed during the installation. Please decide if you are satisfied
 with the current partitioning scheme before continuing.
 .
 ${ITEMS}
";
$elem["partman-lvm/confirm"]["descriptionde"]="Änderungen auf die Speichergeräte schreiben und LVM einrichten?
 Bevor der Logical Volume Manager konfiguriert werden kann, muss die Aufteilung der Partitionen auf die Festplatte geschrieben werden. Diese Änderungen können nicht rückgängig gemacht werden.
 .
 Nachdem der Logical Volume Manager konfiguriert ist, sind während der Installation keine weiteren Änderungen an der Partitionierung der Festplatten, die physikalische Volumes enthalten, erlaubt. Bitte überzeugen Sie sich, dass die Einteilung der Partitionen auf diesen Festplatten richtig ist, bevor Sie fortfahren.
 .
 ${ITEMS}
";
$elem["partman-lvm/confirm"]["descriptionfr"]="Écrire les modifications sur les disques et configurer LVM ?
 Avant que le gestionnaire de volumes logiques (LVM : « Logical Volume Manager ») puisse être configuré, le schéma actuel de partitionnement doit être appliqué au disque. Ces changements seront irréversibles.
 .
 Une fois le gestionnaire de volumes logiques configuré, aucune modification ne peut être apportée, pendant l'installation, aux tables de partitions des disques qui contiennent des volumes physiques. Avant de continuer, veuillez vous assurer que le schéma de partitionnement actuel de ces disques vous convient.
 .
 ${ITEMS}
";
$elem["partman-lvm/confirm"]["default"]="false";
$elem["partman-lvm/confirm_nochanges"]["type"]="boolean";
$elem["partman-lvm/confirm_nochanges"]["description"]="Keep current partition layout and configure LVM?
 After the Logical Volume Manager is configured, no additional changes
 to the partitions in the disks containing physical volumes are
 allowed. Please decide if you are satisfied with the current
 partitioning scheme in these disks before continuing.
";
$elem["partman-lvm/confirm_nochanges"]["descriptionde"]="Aktuelle Einteilung der Partitionen beibehalten und LVM konfigurieren?
 Ist der Logical Volume Manager konfiguriert, sind keine weiteren Änderungen an den Partitionen, die sich auf derselben Festplatte wie die physikalischen Volumes befinden, erlaubt. Bitte überzeugen Sie sich, ob die Einteilung der Partitionen auf diesen Festplatten richtig ist.
";
$elem["partman-lvm/confirm_nochanges"]["descriptionfr"]="Conserver cette organisation des partitions et configurer LVM ?
 Une fois le gestionnaire de volumes logiques configuré, aucune modification ne peut être apportée aux tables de partitions des disques qui contiennent des volumes physiques. Avant de continuer, veuillez vous assurer que le schéma de partitionnement actuel de ces disques vous convient.
";
$elem["partman-lvm/confirm_nochanges"]["default"]="false";
$elem["partman-lvm/commit_failed"]["type"]="error";
$elem["partman-lvm/commit_failed"]["description"]="LVM configuration failure
 An error occurred while writing the changes to the disks.
 .
 Logical Volume Manager configuration has been aborted.
";
$elem["partman-lvm/commit_failed"]["descriptionde"]="LVM-Konfiguration fehlgeschlagen
 Es trat ein Fehler auf, während die Änderungen auf die Festplatten geschrieben wurden.
 .
 Die Konfiguration des Logical Volume Managers wurde abgebrochen.
";
$elem["partman-lvm/commit_failed"]["descriptionfr"]="Échec de la configuration de LVM
 Une erreur s'est produite lors de l'écriture des modifications sur les disques.
 .
 La configuration du gestionnaire de volumes logiques a été interrompue.
";
$elem["partman-lvm/commit_failed"]["default"]="";
$elem["partman/method_long/lvm"]["type"]="text";
$elem["partman/method_long/lvm"]["description"]="physical volume for LVM
";
$elem["partman/method_long/lvm"]["descriptionde"]="physikalisches Volume für LVM
";
$elem["partman/method_long/lvm"]["descriptionfr"]="volume physique pour LVM
";
$elem["partman/method_long/lvm"]["default"]="";
$elem["partman/method_short/lvm"]["type"]="text";
$elem["partman/method_short/lvm"]["description"]="lvm
";
$elem["partman/method_short/lvm"]["descriptionde"]="lvm
";
$elem["partman/method_short/lvm"]["descriptionfr"]="lvm
";
$elem["partman/method_short/lvm"]["default"]="";
$elem["debian-installer/partman-lvm/title"]["type"]="text";
$elem["debian-installer/partman-lvm/title"]["description"]="Configure the Logical Volume Manager
";
$elem["debian-installer/partman-lvm/title"]["descriptionde"]="Logical Volume Manager konfigurieren
";
$elem["debian-installer/partman-lvm/title"]["descriptionfr"]="Configurer le gestionnaire de volumes logiques (LVM)
";
$elem["debian-installer/partman-lvm/title"]["default"]="";
$elem["partman-lvm/mainmenu"]["type"]="select";
$elem["partman-lvm/mainmenu"]["description"]="LVM configuration action:
 Summary of current LVM configuration:
 .
  Free Physical Volumes:  ${FREE_PVS}
  Used Physical Volumes:  ${USED_PVS}
  Volume Groups:          ${VGS}
  Logical Volumes:        ${LVS}
";
$elem["partman-lvm/mainmenu"]["descriptionde"]="LVM-Konfigurationsaktion:
 Übersicht der aktuellen LVM-Konfiguration:
 .
  Freie physikalische Volumes:      ${FREE_PVS}
  Verwendete physikalische Volumes: ${USED_PVS}
  Volume-Gruppen:                   ${VGS}
  Logische Volumes:                 ${LVS}
";
$elem["partman-lvm/mainmenu"]["descriptionfr"]="Action de configuration de LVM :
 Synthèse de la configuration du gestionnaire de volumes logiques :
 .
  Volumes physiques libres :   ${FREE_PVS}
  Volumes physiques utilisés : ${USED_PVS}
  Groupes de volumes :         ${VGS}
  Volumes logiques :           ${LVS}
";
$elem["partman-lvm/mainmenu"]["default"]="";
$elem["partman-lvm/displayall"]["type"]="note";
$elem["partman-lvm/displayall"]["description"]="Current LVM configuration:
 ${CURRENT_CONFIG}
";
$elem["partman-lvm/displayall"]["descriptionde"]="Aktuelle LVM-Konfiguration:
 ${CURRENT_CONFIG}
";
$elem["partman-lvm/displayall"]["descriptionfr"]="Configuration actuelle du gestionnaire de volumes logiques :
 ${CURRENT_CONFIG}
";
$elem["partman-lvm/displayall"]["default"]="";
$elem["partman-lvm/vgcreate_parts"]["type"]="multiselect";
$elem["partman-lvm/vgcreate_parts"]["description"]="Devices for the new volume group:
 Please select the devices for the new volume group.
 .
 You can select one or more devices.
";
$elem["partman-lvm/vgcreate_parts"]["descriptionde"]="Geräte für die neue Volume-Gruppe:
 Bitte wählen Sie die Geräte aus, die die neue Volume-Gruppe bilden sollen.
 .
 Sie können ein oder mehrere Geräte auswählen.
";
$elem["partman-lvm/vgcreate_parts"]["descriptionfr"]="Périphériques pour le nouveau groupe de volumes :
 Veuillez choisir les périphériques pour le nouveau groupe de volumes.
 .
 Vous pouvez sélectionner un ou plusieurs périphériques.
";
$elem["partman-lvm/vgcreate_parts"]["default"]="";
$elem["partman-lvm/vgcreate_name"]["type"]="string";
$elem["partman-lvm/vgcreate_name"]["description"]="Volume group name:
 Please enter the name you would like to use for the new volume group.
";
$elem["partman-lvm/vgcreate_name"]["descriptionde"]="Name der Volume-Gruppe:
 Bitte geben Sie einen Namen für die neue Volume-Gruppe ein.
";
$elem["partman-lvm/vgcreate_name"]["descriptionfr"]="Nom du groupe de volumes :
 Veuillez indiquer le nom que vous souhaitez utiliser pour le nouveau groupe de volumes.
";
$elem["partman-lvm/vgcreate_name"]["default"]="";
$elem["partman-lvm/vgcreate_nosel"]["type"]="error";
$elem["partman-lvm/vgcreate_nosel"]["description"]="No physical volumes selected
 No physical volumes were selected. The creation of a new
 volume group has been aborted.
";
$elem["partman-lvm/vgcreate_nosel"]["descriptionde"]="Keine physikalischen Volumes ausgewählt
 Es wurden keine physikalischen Volumes ausgewählt. Die Erstellung einer neuen Volume-Gruppe wurde abgebrochen.
";
$elem["partman-lvm/vgcreate_nosel"]["descriptionfr"]="Pas de volume physique choisi
 Aucun volume physique n'a été choisi. La création d'un nouveau groupe de volumes a été interrompue.
";
$elem["partman-lvm/vgcreate_nosel"]["default"]="";
$elem["partman-lvm/vgcreate_nonamegiven"]["type"]="error";
$elem["partman-lvm/vgcreate_nonamegiven"]["description"]="No volume group name entered
 No name for the volume group has been entered. Please enter a name.
";
$elem["partman-lvm/vgcreate_nonamegiven"]["descriptionde"]="Kein Volume-Gruppen-Name angegeben
 Es wurde kein Name für die Volume-Gruppe angegeben. Bitte geben Sie einen Namen ein.
";
$elem["partman-lvm/vgcreate_nonamegiven"]["descriptionfr"]="Groupe de volumes sans nom
 Aucun nom n'a été choisi pour ce groupe de volumes. Veuillez choisir un nom.
";
$elem["partman-lvm/vgcreate_nonamegiven"]["default"]="";
$elem["partman-lvm/vgcreate_nameused"]["type"]="error";
$elem["partman-lvm/vgcreate_nameused"]["description"]="Volume group name already in use
 The selected volume group name is already in use. Please choose
 a different name.
";
$elem["partman-lvm/vgcreate_nameused"]["descriptionde"]="Der Name der Volume-Gruppe wird bereits verwendet
 Der angegebene Name der Volume-Gruppe wird bereits verwendet. Bitte wählen Sie einen anderen Namen.
";
$elem["partman-lvm/vgcreate_nameused"]["descriptionfr"]="Nom de groupe de volumes déjà utilisé
 Le nom choisi pour ce groupe de volumes existe déjà. Veuillez choisir un autre nom.
";
$elem["partman-lvm/vgcreate_nameused"]["default"]="";
$elem["partman-lvm/vgcreate_devnameused"]["type"]="error";
$elem["partman-lvm/vgcreate_devnameused"]["description"]="Volume group name overlaps with device name
 The selected volume group name overlaps with an existing device name.
 Please choose a different name.
";
$elem["partman-lvm/vgcreate_devnameused"]["descriptionde"]="Der Name der Volume-Gruppe überlappt mit einem Gerätenamen
 Der ausgewählte Name der Volume-Gruppe überschneidet sich mit einem existierenden Gerätenamen. Bitte wählen Sie einen anderen Namen.
";
$elem["partman-lvm/vgcreate_devnameused"]["descriptionfr"]="Conflit entre le nom de groupe de volumes et celui du périphérique
 Le nom choisi pour ce groupe de volumes entre en conflit avec le nom d'un périphérique existant. Veuillez choisir un autre nom.
";
$elem["partman-lvm/vgcreate_devnameused"]["default"]="";
$elem["partman-lvm/vgcreate_error"]["type"]="error";
$elem["partman-lvm/vgcreate_error"]["description"]="Error while creating volume group
 The volume group ${VG} could not be created.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
";
$elem["partman-lvm/vgcreate_error"]["descriptionde"]="Fehler beim Erstellen einer Volume-Gruppe
 Die Volume-Gruppe ${VG} konnte nicht erstellt werden.
 .
 Schauen Sie in /var/log/syslog oder auf die vierte virtuelle Konsole bezüglich detaillierter Informationen.
";
$elem["partman-lvm/vgcreate_error"]["descriptionfr"]="Erreur lors de la création du groupe de volumes
 Le groupe de volumes ${VG} n'a pas pu être créé.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
";
$elem["partman-lvm/vgcreate_error"]["default"]="";
$elem["partman-lvm/vgdelete_names"]["type"]="select";
$elem["partman-lvm/vgdelete_names"]["description"]="Volume group to delete:
 Please select the volume group you wish to delete.
";
$elem["partman-lvm/vgdelete_names"]["descriptionde"]="Zu löschende Volume-Gruppe:
 Bitte wählen Sie die Volume-Gruppe aus, die Sie löschen möchten.
";
$elem["partman-lvm/vgdelete_names"]["descriptionfr"]="Groupe de volumes à supprimer :
 Veuillez indiquer le groupe de volumes que vous souhaitez supprimer.
";
$elem["partman-lvm/vgdelete_names"]["default"]="";
$elem["partman-lvm/vgdelete_novg"]["type"]="error";
$elem["partman-lvm/vgdelete_novg"]["description"]="No volume group found
 No volume group has been found.
 .
 The volume group may have already been deleted.
";
$elem["partman-lvm/vgdelete_novg"]["descriptionde"]="Keine Volume-Gruppe gefunden
 Es wurde keine Volume-Gruppe gefunden.
 .
 Die Volume-Gruppe könnte bereits gelöscht sein.
";
$elem["partman-lvm/vgdelete_novg"]["descriptionfr"]="Aucun groupe de volumes trouvé
 Aucun groupe de volumes n'a été trouvé.
 .
 Le groupe de volumes a peut-être déjà été supprimé.
";
$elem["partman-lvm/vgdelete_novg"]["default"]="";
$elem["partman-lvm/vgdelete_confirm"]["type"]="boolean";
$elem["partman-lvm/vgdelete_confirm"]["description"]="Really delete the volume group?
 Please confirm the ${VG} volume group removal.
";
$elem["partman-lvm/vgdelete_confirm"]["descriptionde"]="Möchten Sie die angegebene Volume-Gruppe wirklich löschen?
 Bitte bestätigen Sie, dass die Volume-Gruppe ${VG} entfernt werden soll.
";
$elem["partman-lvm/vgdelete_confirm"]["descriptionfr"]="Faut-il vraiment supprimer le groupe de volumes ?
 Veuillez confirmer la suppression du groupe de volumes ${VG}.
";
$elem["partman-lvm/vgdelete_confirm"]["default"]="true";
$elem["partman-lvm/vgdelete_error"]["type"]="error";
$elem["partman-lvm/vgdelete_error"]["description"]="Error while deleting volume group
 The selected volume group could not be deleted. One or more logical
 volumes may currently be in use.
";
$elem["partman-lvm/vgdelete_error"]["descriptionde"]="Fehler beim Löschen einer Volume-Gruppe
 Die ausgewählte Volume-Gruppe konnte nicht gelöscht werden. Ein oder mehrere logische Volumes könnten noch in Gebrauch sein.
";
$elem["partman-lvm/vgdelete_error"]["descriptionfr"]="Erreur lors de la suppression du groupe de volumes
 Le groupe de volumes choisi ne peut pas être supprimé. Un ou plusieurs volumes logiques sont peut-être en cours d'utilisation.
";
$elem["partman-lvm/vgdelete_error"]["default"]="";
$elem["partman-lvm/vgextend_novg"]["type"]="error";
$elem["partman-lvm/vgextend_novg"]["description"]="No volume group found
 No volume group has been found.
 .
 No volume group can be deleted.
";
$elem["partman-lvm/vgextend_novg"]["descriptionde"]="Keine Volume-Gruppe gefunden
 Es wurde keine Volume-Gruppe gefunden.
 .
 Es kann keine Volume-Gruppe gelöscht werden.
";
$elem["partman-lvm/vgextend_novg"]["descriptionfr"]="Aucun groupe de volumes trouvé
 Aucun groupe de volumes n'a été trouvé.
 .
 Aucun groupe de volumes ne peut être supprimé.
";
$elem["partman-lvm/vgextend_novg"]["default"]="";
$elem["partman-lvm/vgextend_names"]["type"]="select";
$elem["partman-lvm/vgextend_names"]["description"]="Volume group to extend:
 Please select the volume group you wish to extend.
";
$elem["partman-lvm/vgextend_names"]["descriptionde"]="Zu erweiternde Volume-Gruppe:
 Bitte wählen Sie die Volume-Gruppe, die erweitert werden soll.
";
$elem["partman-lvm/vgextend_names"]["descriptionfr"]="Groupe de volumes à étendre :
 Veuillez choisir le groupe de volumes que vous souhaitez étendre.
";
$elem["partman-lvm/vgextend_names"]["default"]="";
$elem["partman-lvm/vgextend_parts"]["type"]="multiselect";
$elem["partman-lvm/vgextend_parts"]["description"]="Devices to add to the volume group:
 Please select the devices you wish to add to the volume group.
 .
 You can select one or more devices.
";
$elem["partman-lvm/vgextend_parts"]["descriptionde"]="Der Volume-Gruppe hinzuzufügende Geräte:
 Bitte wählen Sie die Geräte, die der Volume-Gruppe hinzugefügt werden sollen.
 .
 Sie können ein oder mehrere Geräte auswählen.
";
$elem["partman-lvm/vgextend_parts"]["descriptionfr"]="Périphériques à ajouter au groupe de volumes :
 Veuillez choisir les périphériques que vous souhaitez ajouter au groupe de volumes.
 .
 Vous pouvez sélectionner un ou plusieurs périphériques.
";
$elem["partman-lvm/vgextend_parts"]["default"]="";
$elem["partman-lvm/vgextend_nosel"]["type"]="error";
$elem["partman-lvm/vgextend_nosel"]["description"]="No physical volumes selected
 No physical volumes were selected. Extension of the volume group
 has been aborted.
";
$elem["partman-lvm/vgextend_nosel"]["descriptionde"]="Keine physikalischen Volumes ausgewählt
 Es wurden keine physikalischen Volumes ausgewählt. Die Erweiterung der Volume-Gruppe wurde abgebrochen.
";
$elem["partman-lvm/vgextend_nosel"]["descriptionfr"]="Pas de volume physique choisi
 Aucun volume physique n'a été choisi. L'extension du groupe de volumes a été interrompue.
";
$elem["partman-lvm/vgextend_nosel"]["default"]="";
$elem["partman-lvm/vgextend_error"]["type"]="error";
$elem["partman-lvm/vgextend_error"]["description"]="Error while extending volume group
 The physical volume ${PARTITION} could not be added to the selected
 volume group.
";
$elem["partman-lvm/vgextend_error"]["descriptionde"]="Fehler beim Erweitern einer Volume-Gruppe
 Das physikalische Volume ${PARTITION} konnte der ausgewählten Volume-Gruppe nicht hinzugefügt werden.
";
$elem["partman-lvm/vgextend_error"]["descriptionfr"]="Erreur lors de l'extension du groupe de volumes
 Le volume physique ${PARTITION} ne peut pas être ajouté au groupe de volumes sélectionné.
";
$elem["partman-lvm/vgextend_error"]["default"]="";
$elem["partman-lvm/vgreduce_novg"]["type"]="error";
$elem["partman-lvm/vgreduce_novg"]["description"]="No volume group found
 No volume group has been found.
 .
 No volume group can be reduced.
";
$elem["partman-lvm/vgreduce_novg"]["descriptionde"]="Keine Volume-Gruppe gefunden
 Es wurde keine Volume-Gruppe gefunden.
 .
 Es kann keine Volume-Gruppe verkleinert werden.
";
$elem["partman-lvm/vgreduce_novg"]["descriptionfr"]="Aucun groupe de volumes trouvé
 Aucun groupe de volumes n'a été trouvé.
 .
 Aucun groupe de volumes ne peut être réduit.
";
$elem["partman-lvm/vgreduce_novg"]["default"]="";
$elem["partman-lvm/vgreduce_names"]["type"]="select";
$elem["partman-lvm/vgreduce_names"]["description"]="Volume group to reduce:
 Please select the volume group you wish to reduce.
";
$elem["partman-lvm/vgreduce_names"]["descriptionde"]="Zu verkleinernde Volume-Gruppe:
 Bitte wählen Sie die Volume-Gruppe, die Sie verkleinern möchten.
";
$elem["partman-lvm/vgreduce_names"]["descriptionfr"]="Groupe de volumes à réduire :
 Veuillez choisir le groupe de volumes que vous souhaitez réduire.
";
$elem["partman-lvm/vgreduce_names"]["default"]="";
$elem["partman-lvm/vgreduce_parts"]["type"]="multiselect";
$elem["partman-lvm/vgreduce_parts"]["description"]="Devices to remove from the volume group:
 Please select the devices you wish to remove from the volume group.
 .
 You can select one or more devices.
";
$elem["partman-lvm/vgreduce_parts"]["descriptionde"]="Dieses Gerät aus der Volume-Gruppe entfernen:
 Bitte wählen Sie die Geräte, die Sie aus der Volume-Gruppe entfernen möchten.
 .
 Sie können ein oder mehrere Geräte auswählen.
";
$elem["partman-lvm/vgreduce_parts"]["descriptionfr"]="Périphériques à supprimer du groupe de volumes :
 Veuillez choisir les périphériques que vous souhaitez supprimer du groupe de volumes.
 .
 Vous pouvez sélectionner un ou plusieurs périphériques.
";
$elem["partman-lvm/vgreduce_parts"]["default"]="";
$elem["partman-lvm/vgreduce_nosel"]["type"]="error";
$elem["partman-lvm/vgreduce_nosel"]["description"]="No physical volumes selected
 No physical volumes were selected. Reduction of the volume group was
 aborted.
";
$elem["partman-lvm/vgreduce_nosel"]["descriptionde"]="Keine physikalischen Volumes ausgewählt
 Es wurden keine physikalischen Volumes ausgewählt. Die Reduzierung der Volume-Gruppe wurde abgebrochen.
";
$elem["partman-lvm/vgreduce_nosel"]["descriptionfr"]="Pas de volume physique choisi
 Aucun volume physique n'a été choisi. La réduction du groupe de volumes a été abandonnée.
";
$elem["partman-lvm/vgreduce_nosel"]["default"]="";
$elem["partman-lvm/vgreduce_error"]["type"]="error";
$elem["partman-lvm/vgreduce_error"]["description"]="Error while reducing volume group
 The physical volume ${PARTITION} could not be removed from the selected
 volume group.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
";
$elem["partman-lvm/vgreduce_error"]["descriptionde"]="Fehler beim Verkleinern einer Volume-Gruppe
 Das physikalische Volume ${PARTITION} konnte der ausgewählten Volume-Gruppe nicht hinzugefügt werden.
 .
 Schauen Sie in /var/log/syslog oder auf die vierte virtuelle Konsole bezüglich detaillierter Informationen.
";
$elem["partman-lvm/vgreduce_error"]["descriptionfr"]="Erreur lors de la réduction du groupe de volumes
 Le volume physique ${PARTITION} ne peut pas être ajouté au groupe de volumes sélectionné.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
";
$elem["partman-lvm/vgreduce_error"]["default"]="";
$elem["partman-lvm/lvcreate_nofreevg"]["type"]="error";
$elem["partman-lvm/lvcreate_nofreevg"]["description"]="No volume group found
 No free volume groups were found for creating a new logical volume.
 Please create more physical volumes and volume groups, or reduce an
 existing volume group.
";
$elem["partman-lvm/lvcreate_nofreevg"]["descriptionde"]="Keine Volume-Gruppe gefunden
 Es wurden keine freien Volume-Gruppen gefunden, auf denen ein neues logisches Volume erstellt werden kann. Bitte erstellen Sie mehr physikalische Volumes und Volume-Gruppen oder verkleinern Sie eine existierende Volume-Gruppe.
";
$elem["partman-lvm/lvcreate_nofreevg"]["descriptionfr"]="Aucun groupe de volumes trouvé
 Aucun groupe de volume libre n'a été trouvé pour la création d'un nouveau volume logique. Veuillez créer des volumes physiques et des groupes de volumes supplémentaires ou réduire un groupe de volumes existant.
";
$elem["partman-lvm/lvcreate_nofreevg"]["default"]="";
$elem["partman-lvm/lvcreate_name"]["type"]="string";
$elem["partman-lvm/lvcreate_name"]["description"]="Logical volume name:
 Please enter the name you would like to use for the new logical volume.
";
$elem["partman-lvm/lvcreate_name"]["descriptionde"]="Name des logischen Volumes:
 Bitte geben Sie einen Namen für das neue logische Volume ein.
";
$elem["partman-lvm/lvcreate_name"]["descriptionfr"]="Nom du volume logique :
 Veuillez indiquer le nom que vous souhaitez employer pour le nouveau volume logique.
";
$elem["partman-lvm/lvcreate_name"]["default"]="";
$elem["partman-lvm/lvcreate_vgnames"]["type"]="select";
$elem["partman-lvm/lvcreate_vgnames"]["description"]="Volume group:
 Please select the volume group where the new logical volume
 should be created.
";
$elem["partman-lvm/lvcreate_vgnames"]["descriptionde"]="Volume-Gruppe:
 Bitte wählen Sie die Volume-Gruppe aus, in der das neue logische Volume erstellt werden soll.
";
$elem["partman-lvm/lvcreate_vgnames"]["descriptionfr"]="Groupe de volumes :
 Veuillez choisir un groupe de volumes sur lequel le nouveau volume logique doit être créé.
";
$elem["partman-lvm/lvcreate_vgnames"]["default"]="";
$elem["partman-lvm/lvcreate_nonamegiven"]["type"]="error";
$elem["partman-lvm/lvcreate_nonamegiven"]["description"]="No logical volume name entered
 No name for the logical volume has been entered. Please enter a
 name.
";
$elem["partman-lvm/lvcreate_nonamegiven"]["descriptionde"]="Kein Name für das logische Volume angegeben
 Es wurde kein Name für das logische Volume angegeben. Bitte geben Sie einen Namen ein.
";
$elem["partman-lvm/lvcreate_nonamegiven"]["descriptionfr"]="Volume logique sans nom
 Aucun nom n'a été choisi pour le volume logique. Veuillez choisir un nom.
";
$elem["partman-lvm/lvcreate_nonamegiven"]["default"]="";
$elem["partman-lvm/lvcreate_exists"]["type"]="error";
$elem["partman-lvm/lvcreate_exists"]["description"]="Error while creating a new logical volume
 The name ${LV} is already in use by another logical volume on the
 same volume group (${VG}).
";
$elem["partman-lvm/lvcreate_exists"]["descriptionde"]="Fehler beim Erstellen eines neuen logischen Volumes
 Der Name ${LV} wird bereits von einem anderen logischen Volume in derselben Volume-Gruppe (${VG}) verwendet.
";
$elem["partman-lvm/lvcreate_exists"]["descriptionfr"]="Erreur lors de la création du nouveau volume logique
 Le nom ${LV} est déjà utilisé par un autre volume logique sur le même groupe de volumes (${VG}).
";
$elem["partman-lvm/lvcreate_exists"]["default"]="";
$elem["partman-lvm/lvcreate_size"]["type"]="string";
$elem["partman-lvm/lvcreate_size"]["description"]="Logical volume size:
 Please enter the size of the new logical volume. The size may be
 entered in the following formats: 10K (Kilobytes), 10M (Megabytes),
 10G (Gigabytes), 10T (Terabytes). The default unit is Megabytes.
";
$elem["partman-lvm/lvcreate_size"]["descriptionde"]="Größe des logischen Volumes:
 Bitte geben Sie die Größe des neuen logischen Volumes an. Die Größe kann in folgenden Formaten angegeben werden: 10K (Kilobyte), 10M (Megabyte), 10G (Gigabyte), 10T (Terabyte). Die Standardeinheit ist Megabyte.
";
$elem["partman-lvm/lvcreate_size"]["descriptionfr"]="Taille du volume logique :
 Veuillez indiquer la taille du nouveau volume logique. Les tailles peuvent être indiquées aux formats suivants : 10K (kilo-octets), 10M (mégaoctets), 10G (gigaoctets), 10T (téraoctets). L'unité par défaut est le mégaoctet.
";
$elem["partman-lvm/lvcreate_size"]["default"]="";
$elem["partman-lvm/lvcreate_error"]["type"]="error";
$elem["partman-lvm/lvcreate_error"]["description"]="Error while creating a new logical volume
 Unable to create a new logical volume (${LV}) on ${VG} with the new
 size ${SIZE}.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
";
$elem["partman-lvm/lvcreate_error"]["descriptionde"]="Fehler beim Erstellen eines neuen logischen Volumes
 Es konnte kein neues logisches Volume (${LV}) auf ${VG} mit der neuen Größe ${SIZE} erstellt werden.
 .
 Schauen Sie in /var/log/syslog oder auf die vierte virtuelle Konsole bezüglich detaillierter Informationen.
";
$elem["partman-lvm/lvcreate_error"]["descriptionfr"]="Erreur lors de la création du nouveau volume logique
 Impossible de créer un nouveau volume logique (${LV}) sur ${VG} avec la nouvelle taille ${SIZE}.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
";
$elem["partman-lvm/lvcreate_error"]["default"]="";
$elem["partman-lvm/lvdelete_nolv"]["type"]="error";
$elem["partman-lvm/lvdelete_nolv"]["description"]="No logical volume found
 No logical volume has been found. Please create a logical volume first.
";
$elem["partman-lvm/lvdelete_nolv"]["descriptionde"]="Kein logisches Volume gefunden
 Es wurde kein logisches Volume gefunden. Bitte erstellen Sie zuerst ein logisches Volume.
";
$elem["partman-lvm/lvdelete_nolv"]["descriptionfr"]="Aucun volume logique trouvé
 Aucun volume logique n'a été trouvé. Veuillez d'abord en créer un.
";
$elem["partman-lvm/lvdelete_nolv"]["default"]="";
$elem["partman-lvm/lvdelete_lvnames"]["type"]="select";
$elem["partman-lvm/lvdelete_lvnames"]["description"]="Logical volume:
 Please select the logical volume to delete.
";
$elem["partman-lvm/lvdelete_lvnames"]["descriptionde"]="Logisches Volume:
 Bitte wählen Sie das zu löschende logische Volume.
";
$elem["partman-lvm/lvdelete_lvnames"]["descriptionfr"]="Volume logique :
 Veuillez choisir le volume logique à supprimer.
";
$elem["partman-lvm/lvdelete_lvnames"]["default"]="";
$elem["partman-lvm/text/lvdelete_invg"]["type"]="text";
$elem["partman-lvm/text/lvdelete_invg"]["description"]="in VG ${VG}
";
$elem["partman-lvm/text/lvdelete_invg"]["descriptionde"]="in VG ${VG}
";
$elem["partman-lvm/text/lvdelete_invg"]["descriptionfr"]="dans ${VG}
";
$elem["partman-lvm/text/lvdelete_invg"]["default"]="";
$elem["partman-lvm/lvdelete_error"]["type"]="error";
$elem["partman-lvm/lvdelete_error"]["description"]="Error while deleting the logical volume
 The logical volume ${LV} on ${VG} could not be deleted.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
";
$elem["partman-lvm/lvdelete_error"]["descriptionde"]="Fehler beim Löschen eines logischen Volumes
 Das logische Volume ${LV} auf ${VG} konnte nicht gelöscht werden.
 .
 Schauen Sie in /var/log/syslog oder auf die vierte virtuelle Konsole bezüglich detaillierter Informationen.
";
$elem["partman-lvm/lvdelete_error"]["descriptionfr"]="Erreur lors de la suppression du volume logique
 Le volume logique ${LV} sur ${VG} ne peut pas être supprimé.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
";
$elem["partman-lvm/lvdelete_error"]["default"]="";
$elem["partman-lvm/nopartitions"]["type"]="error";
$elem["partman-lvm/nopartitions"]["description"]="No usable physical volumes found
 No physical volumes (i.e. partitions) were found in your system. All
 physical volumes may already be in use. You may also need to load
 some required kernel modules or re-partition the hard drives.
";
$elem["partman-lvm/nopartitions"]["descriptionde"]="Es wurden keine nutzbaren physikalischen Volumes gefunden
 Auf Ihrem System wurden keine physikalischen Volumes (Partitionen) gefunden. Möglicherweise sind bereits alle physikalischen Volumes in Gebrauch. Es könnte außerdem notwendig sein, zunächst einige Kernel-Module zu laden oder die Festplatten neu zu partitionieren.
";
$elem["partman-lvm/nopartitions"]["descriptionfr"]="Aucun volume physique utilisable trouvé
 Aucun volume physique (c'est-à-dire aucune partition) n'a été trouvé sur le système. Tous les volumes physiques sont peut-être déjà utilisés. Il est également possible que vous ayez à charger des modules du noyau ou à repartitionner les disques durs.
";
$elem["partman-lvm/nopartitions"]["default"]="";
$elem["partman-lvm/nolvm"]["type"]="error";
$elem["partman-lvm/nolvm"]["description"]="Logical Volume Manager not available
 The current kernel doesn't support the Logical Volume Manager. You may
 need to load the lvm-mod module.
";
$elem["partman-lvm/nolvm"]["descriptionde"]="Logical Volume Manager ist nicht verfügbar
 Der gegenwärtig laufende Kernel unterstützt den Logical Volume Manager nicht. Möglicherweise müssen Sie erst das Modul lvm-mod laden.
";
$elem["partman-lvm/nolvm"]["descriptionfr"]="Le gestionnaire de volumes logiques n'est pas disponible
 Le noyau actuel ne gère pas les volumes logiques (il s'agit du « Logical Volume Manager »). Vous devez peut-être charger le module lvm-mod.
";
$elem["partman-lvm/nolvm"]["default"]="";
$elem["partman-lvm/pvcreate_error"]["type"]="error";
$elem["partman-lvm/pvcreate_error"]["description"]="Error while initializing physical volume
 The physical volume ${PV} could not be initialized.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
";
$elem["partman-lvm/pvcreate_error"]["descriptionde"]="Fehler bei Initialisierung eines physikalischen Volumes
 Das physikalische Volume ${PV} konnte nicht initialisiert werden.
 .
 Schauen Sie in /var/log/syslog oder auf die vierte virtuelle Konsole bezüglich detaillierter Informationen.
";
$elem["partman-lvm/pvcreate_error"]["descriptionfr"]="Erreur lors de l'initialisation du volume physique
 Le volume physique ${PV} n'a pas pu être initialisé.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
";
$elem["partman-lvm/pvcreate_error"]["default"]="";
$elem["partman-lvm/badnamegiven"]["type"]="error";
$elem["partman-lvm/badnamegiven"]["description"]="Invalid logical volume or volume group name
 Logical volume or volume group names may only contain alphanumeric
 characters, hyphen, plus, period, and underscore. They must be 128
 characters or less and may not begin with a hyphen. The names \".\" and
 \"..\" are not allowed. In addition, logical volume names cannot begin
 with \"snapshot\".
 .
 Please choose a different name.
";
$elem["partman-lvm/badnamegiven"]["descriptionde"]="Ungültiger logischer Volume-Name oder Volume-Gruppen-Name
 Logische Volume-Namen oder Volume-Gruppen-Namen dürfen nur alphanumerische Zeichen, Bindestriche, Plus-, Punkt- und Unterstrich-Zeichen enthalten. Sie dürfen nicht mehr als 128 Zeichen enthalten und nicht mit einem Bindestrich beginnen. Die Namen ».« und »..« sind nicht erlaubt. Zusätzlich dürfen logische Volume-Namen nicht mit »snapshot« beginnen.
 .
 Bitte wählen Sie einen anderen Namen.
";
$elem["partman-lvm/badnamegiven"]["descriptionfr"]="Nom de volume logique ou de groupe de volumes non valable
 Les noms de volumes logiques ou de groupes de volumes ne peuvent contenir que les caractères suivants : caractères alphanumériques, tiret, signe « plus », point et caractère de soulignement (« underscore »). Ils ne doivent ni comporter plus de 128 caractères, ni commencer par un tiret. Les noms « . » et « .. » ne sont pas autorisés et, enfin, les noms de volumes logiques ne peuvent pas commencer par « snapshot ».
 .
 Veuillez choisir un autre nom.
";
$elem["partman-lvm/badnamegiven"]["default"]="";
$elem["partman-lvm/device_remove_lvm"]["type"]="boolean";
$elem["partman-lvm/device_remove_lvm"]["description"]="Remove existing logical volume data?
 The selected device already contains the following LVM logical volumes,
 volume groups and physical volumes which are about to be removed:
 .
 Logical volume(s) to be removed: ${LVTARGETS}
 .
 Volume group(s) to be removed: ${VGTARGETS}
 .
 Physical volume(s) to be removed: ${PVTARGETS}
 .
 Note that this will also permanently erase any data currently on the
 logical volumes.
";
$elem["partman-lvm/device_remove_lvm"]["descriptionde"]="Existierende logische Volume-Daten entfernen?
 Das gewählte Gerät enthält bereits die folgenden logischen LVM-Volumes, Volume-Gruppen und physikalischen Volumes, die entfernt werden sollen:
 .
 Zu entfernende logische Volume(s): ${LVTARGETS}
 .
 Zu entfernende Volume-Gruppe(n): ${VGTARGETS}
 .
 Zu entfernende physikalische Volume-Gruppe(n): ${PVTARGETS}
 .
 Beachten Sie, dass durch diese Aktion auch alle Daten auf den logischen Volumes permanent gelöscht werden.
";
$elem["partman-lvm/device_remove_lvm"]["descriptionfr"]="Faut-il supprimer les données des volumes logiques existants ?
 Le périphérique choisi contient déjà les volumes logiques LVM, groupes de volumes ou volumes physiques suivants, qui vont être supprimés :
 .
 Volume(s) logiques : ${LVTARGETS}
 .
 Groupe(s) de volume(s) : ${VGTARGETS}
 .
 Volume(s) physique(s) : ${PVTARGETS}
 .
 Veuillez noter que cette action effacera également définitivement les données présentes sur les volumes logiques.
";
$elem["partman-lvm/device_remove_lvm"]["default"]="false";
$elem["partman-lvm/device_remove_lvm_span"]["type"]="error";
$elem["partman-lvm/device_remove_lvm_span"]["description"]="Unable to automatically remove LVM data
 Because the volume group(s) on the selected device also consist of
 physical volumes on other devices, it is not considered safe to remove
 its LVM data automatically. If you wish to use this device for
 partitioning, please remove its LVM data first.
";
$elem["partman-lvm/device_remove_lvm_span"]["descriptionde"]="LVM-Daten können nicht automatisch entfernt werden
 Weil die Volume-Gruppe(n) auf dem gewählten Gerät auch aus physikalischen Volumes auf anderen Geräten besteht, wird es nicht als sicher angesehen, dessen LVM-Daten automatisch zu entfernen. Falls Sie dieses Gerät zum Partitionieren verwenden möchten, entfernen Sie zuerst dessen LVM-Daten.
";
$elem["partman-lvm/device_remove_lvm_span"]["descriptionfr"]="Impossible de supprimer automatiquement les données LVM
 Le(s) groupe(s) de volumes du périphérique sélectionné comportent également des volumes physiques sur d'autres périphériques et il serait risqué d'en supprimer les données LVM automatiquement. Si vous souhaitez partitionner ce périphérique, vous devez d'abord en supprimer les données LVM.
";
$elem["partman-lvm/device_remove_lvm_span"]["default"]="";
$elem["partman-lvm/help"]["type"]="note";
$elem["partman-lvm/help"]["description"]="Logical Volume Management
 A common situation for system administrators is to find that some disk
 partition (usually the most important one) is short on space, while some
 other partition is underused. The Logical Volume Manager (LVM) can help
 with this.
 .
 LVM allows combining disk or partition devices (\"physical volumes\") to form
 a virtual disk (\"volume group\"), which can then be divided into virtual
 partitions (\"logical volumes\"). Volume groups and logical volumes may span
 several physical disks. New physical volumes may be added to a volume group
 at any time, and logical volumes can be resized up to the amount of
 unallocated space in the volume group.
 .
 The items on the LVM configuration menu can be used to edit volume groups
 and logical volumes. After you return to the main partition manager screen,
 logical volumes will be displayed in the same way as ordinary partitions,
 and should be treated as such.
";
$elem["partman-lvm/help"]["descriptionde"]="Logical Volume Management
 Eine typische Situation für Systemadministratoren ist festzustellen, dass auf einer Festplattenpartition (gewöhnlich auf der wichtigsten) der freie Platz knapp wird, während eine andere Partition wenig genutzt ist (noch viel Platz frei). Der Logical Volume Manager (LVM) kann hier helfen.
 .
 LVM erlaubt es, Festplatten oder Partitionen (»physikalische Volumes« genannt) zu einer virtuellen Platte (»Volume-Group«) zu kombinieren, die dann in virtuelle Partitionen (»logische Volumes«) unterteilt werden können. Volume-Groups und logische Volumes können sich über mehrere physikalische Festplatten erstrecken. Es können jederzeit neue physikalische Volumes zu einer Volume-Group hinzugefügt werden, und logische Volumes können in Ihrer Größe verändert werden (maximal um den verfügbaren freien Speicherplatz in der Volume-Group).
 .
 Die Einträge im LVM-Konfigurationsmenü können verwendet werden, um Volume-Groups und logische Volumes zu verändern. Wenn Sie zum Hauptbildschirm des Partitionsmanagers zurückkehren, werden diese dort wie gewöhnliche Partitionen dargestellt und sollten auch wie solche behandelt werden.
";
$elem["partman-lvm/help"]["descriptionfr"]="Gestion de volumes logiques
 Une situation que rencontrent fréquemment les administrateurs système est le manque d'espace libre sur une partition (souvent la plus importante du système) alors qu'une autre est sous-utilisée. Le gestionnaire de volumes logiques (LVM : « Logical Volume Manager ») permet de résoudre ce type de problème.
 .
 LVM permet de combiner vos les disques ou les partitions (« volumes physiques ») en disques virtuels (« groupe de volumes ») qui peut être divisé en partitions virtuelles (« volumes logiques »). Les groupes de volumes et les volumes logiques peuvent s'étendre sur plusieurs disques physiques. Des volumes physiques peuvent être ajoutés à tout moment à un groupe de volumes et les volumes logiques peuvent être retaillés dans les limites de l'espace non alloué du groupe de volume.
 .
 Les entrées du menu de configuration du gestionnaire de volumes logiques permettent de modifier les groupes de volumes et les volumes logiques. Une fois de retour au menu principal du gestionnaire de partitions, les volumes logiques seront visibles de manière analogue aux partitions ordinaires et seront gérés de la même manière.
";
$elem["partman-lvm/help"]["default"]="";
$elem["partman-partitioning/progress_resizing"]["type"]="text";
$elem["partman-partitioning/progress_resizing"]["description"]="Resizing partition...
";
$elem["partman-partitioning/progress_resizing"]["descriptionde"]="Größe der Partition wird verändert ...
";
$elem["partman-partitioning/progress_resizing"]["descriptionfr"]="Redimensionnement de la partition...
";
$elem["partman-partitioning/progress_resizing"]["default"]="";
$elem["partman-partitioning/new_state"]["type"]="text";
$elem["partman-partitioning/new_state"]["description"]="Computing the new state of the partition table...
";
$elem["partman-partitioning/new_state"]["descriptionde"]="Berechnen der neuen Partitionstabelle ...
";
$elem["partman-partitioning/new_state"]["descriptionfr"]="Calcul de l'état de la table des partitions...
";
$elem["partman-partitioning/new_state"]["default"]="";
$elem["partman-partitioning/impossible_resize"]["type"]="error";
$elem["partman-partitioning/impossible_resize"]["description"]="The resize operation is impossible
 Because of an unknown reason it is impossible to resize this partition.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
";
$elem["partman-partitioning/impossible_resize"]["descriptionde"]="Ändern der Größe nicht möglich
 Aus einem unbekannten Grund ist es nicht möglich, die Größe der Partition zu ändern.
 .
 Schauen Sie in /var/log/syslog oder auf die vierte virtuelle Konsole bezüglich detaillierter Informationen.
";
$elem["partman-partitioning/impossible_resize"]["descriptionfr"]="Le redimensionnement est impossible
 Pour une raison non identifiée, il n'est pas possible de redimensionner cette partition.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
";
$elem["partman-partitioning/impossible_resize"]["default"]="";
$elem["partman-partitioning/confirm_resize"]["type"]="boolean";
$elem["partman-partitioning/confirm_resize"]["description"]="Write previous changes to disk and continue?
 Before you can select a new partition size, any previous changes have to be
 written to disk.
 .
 You cannot undo this operation.
 .
 Please note that the resize operation may take a long time.
";
$elem["partman-partitioning/confirm_resize"]["descriptionde"]="Vorherige Änderungen auf das Speichergerät schreiben und fortfahren?
 Bevor Sie eine neue Partitionsgröße wählen können, müssen alle vorherigen Änderungen auf das Speichergerät geschrieben werden.
 .
 Dieser Vorgang kann nicht rückgängig gemacht werden.
 .
 Bitte beachten Sie, dass die Änderung der Größe viel Zeit in Anspruch nehmen kann.
";
$elem["partman-partitioning/confirm_resize"]["descriptionfr"]="Écrire les modifications sur les disques et continuer ?
 Avant de choisir la nouvelle taille de partition, les autres modifications doivent être appliquées au disque.
 .
 Il n'est pas possible d'annuler cette opération.
 .
 Veuillez noter que le redimensionnement peut durer longtemps.
";
$elem["partman-partitioning/confirm_resize"]["default"]="";
$elem["partman-partitioning/new_size"]["type"]="string";
$elem["partman-partitioning/new_size"]["description"]="New partition size:
 The minimum size for this partition is ${MINSIZE} (or ${PERCENT}) and its
 maximum size is ${MAXSIZE}.
 .
 Hint: \"max\" can be used as a shortcut to specify the maximum size, or
 enter a percentage (e.g. \"20%\") to use that percentage of the maximum size.
";
$elem["partman-partitioning/new_size"]["descriptionde"]="Neue Größe der Partition:
 Die minimale Größe für diese Partition beträgt ${MINSIZE} (oder ${PERCENT}) und die maximale Größe ${MAXSIZE}.
 .
 Tipp: »max« kann als Kürzel verwendet werden, um die maximale Größe anzugeben. Alternativ kann eine prozentuale Angabe (z.B. »20%«) erfolgen, um die Größe relativ zum Maximum anzugeben.
";
$elem["partman-partitioning/new_size"]["descriptionfr"]="Nouvelle taille de la partition :
 La taille minimale possible pour cette partition est ${MINSIZE} (ou ${PERCENT}) et la taille maximale est ${MAXSIZE}.
 .
 Il est possible d'utiliser « max » comme méthode simplifiée pour choisir la taille maximale ou d'indiquer un pourcentage (p. ex. « 20% ») pour utiliser ce pourcentage de la taille maximale.
";
$elem["partman-partitioning/new_size"]["default"]="some number";
$elem["partman-partitioning/bad_new_size"]["type"]="error";
$elem["partman-partitioning/bad_new_size"]["description"]="The size entered is invalid
 The size you entered was not understood.
 Please enter a positive integer size followed by an optional unit of measure
 (e.g. \"200 GB\"). The default unit of measure is the megabyte.
";
$elem["partman-partitioning/bad_new_size"]["descriptionde"]="Die angegebene Größe ist ungültig
 Die von Ihnen angegebene Größe konnte nicht interpretiert werden. Bitte geben Sie für die Größe einen positiven Integer-Wert (Ganzzahl) ein, optional gefolgt von einer Einheit (z.B. »200 GB«). Die Standardeinheit ist Megabyte (MB).
";
$elem["partman-partitioning/bad_new_size"]["descriptionfr"]="Taille indiquée non valable
 La taille que vous avez indiquée ne peut pas être analysée. Vous devez utiliser un nombre entier positif éventuellement suivi d'une unité de mesure (p. ex. « 200 GB »). L'unité de mesure par défaut est le mégaoctet. Les unités doivent être exprimées en forme anglophone : « GB » et non « Go », etc.
";
$elem["partman-partitioning/bad_new_size"]["default"]="";
$elem["partman-partitioning/big_new_size"]["type"]="error";
$elem["partman-partitioning/big_new_size"]["description"]="The size entered is too large
 The size you entered is larger than the maximum size of the partition.
 Please enter a smaller size to continue.
";
$elem["partman-partitioning/big_new_size"]["descriptionde"]="Die angegebene Größe ist zu groß
 Die von Ihnen angegebene Größe ist größer als die maximale Größe für diese Partition. Bitte geben Sie einen kleineren Wert ein, um fortzufahren.
";
$elem["partman-partitioning/big_new_size"]["descriptionfr"]="Taille indiquée trop élevée
 La taille indiquée est supérieure à celle de la partition. Veuillez indiquer une taille inférieure pour continuer.
";
$elem["partman-partitioning/big_new_size"]["default"]="";
$elem["partman-partitioning/small_new_size"]["type"]="error";
$elem["partman-partitioning/small_new_size"]["description"]="The size entered is too small
 The size you entered is smaller than the minimum size of the partition.
 Please enter a larger size to continue.
";
$elem["partman-partitioning/small_new_size"]["descriptionde"]="Die angegebene Größe ist zu klein
 Die von Ihnen angegebene Größe ist kleiner als die minimale Größe für diese Partition. Bitte geben Sie einen größeren Wert ein, um fortzufahren.
";
$elem["partman-partitioning/small_new_size"]["descriptionfr"]="Taille indiquée trop petite
 La taille indiquée est inférieure à la taille minimale de la partition. Veuillez indiquer une taille supérieure pour continuer.
";
$elem["partman-partitioning/small_new_size"]["default"]="";
$elem["partman-partitioning/new_size_commit_failed"]["type"]="error";
$elem["partman-partitioning/new_size_commit_failed"]["description"]="Resize operation failure
 An error occurred while writing the changes to the storage devices.
 .
 The resize operation has been aborted.
";
$elem["partman-partitioning/new_size_commit_failed"]["descriptionde"]="Ändern der Größe fehlgeschlagen
 Es trat ein Fehler auf, als die Änderungen auf das Speichergerät geschrieben wurden.
 .
 Der Vorgang für die Änderung der Größe wurde abgebrochen.
";
$elem["partman-partitioning/new_size_commit_failed"]["descriptionfr"]="Échec du redimensionnement
 Une erreur s'est produite lors de l'écriture des modifications sur les disques.
 .
 Le redimensionnement a été abandonné.
";
$elem["partman-partitioning/new_size_commit_failed"]["default"]="";
$elem["partman-partitioning/new_partition_size"]["type"]="string";
$elem["partman-partitioning/new_partition_size"]["description"]="New partition size:
 The maximum size for this partition is ${MAXSIZE}.
 .
 Hint: \"max\" can be used as a shortcut to specify the maximum size, or
 enter a percentage (e.g. \"20%\") to use that percentage of the maximum size.
";
$elem["partman-partitioning/new_partition_size"]["descriptionde"]="Neue Größe der Partition:
 Die maximale Größe für diese Partition beträgt ${MAXSIZE}.
 .
 Tipp: »max« kann als Kürzel verwendet werden, um die maximale Größe anzugeben. Alternativ kann eine prozentuale Angabe (z.B. »20%«) erfolgen, um die Größe relativ zum Maximum anzugeben.
";
$elem["partman-partitioning/new_partition_size"]["descriptionfr"]="Nouvelle taille de la partition :
 La taille maximale possible pour cette partition est ${MAXSIZE}.
 .
 Il est possible d'utiliser « max » comme méthode simplifiée pour choisir la taille maximale ou d'indiquer un pourcentage (p. ex. « 20% ») pour utiliser ce pourcentage de la taille maximale.
";
$elem["partman-partitioning/new_partition_size"]["default"]="some number";
$elem["partman-partitioning/bad_new_partition_size"]["type"]="error";
$elem["partman-partitioning/bad_new_partition_size"]["description"]="Invalid size
";
$elem["partman-partitioning/bad_new_partition_size"]["descriptionde"]="Ungültige Größenangabe
";
$elem["partman-partitioning/bad_new_partition_size"]["descriptionfr"]="Taille non valable
";
$elem["partman-partitioning/bad_new_partition_size"]["default"]="";
$elem["partman-partitioning/new_partition_place"]["type"]="select";
$elem["partman-partitioning/new_partition_place"]["choices"][1]="Beginning";
$elem["partman-partitioning/new_partition_place"]["choicesde"][1]="Anfang";
$elem["partman-partitioning/new_partition_place"]["choicesfr"][1]="Début";
$elem["partman-partitioning/new_partition_place"]["description"]="Location for the new partition:
 Please choose whether you want the new partition to be created at the
 beginning or at the end of the available space.
";
$elem["partman-partitioning/new_partition_place"]["descriptionde"]="Position der neuen Partition:
 Bitte wählen Sie, ob die neue Partition am Anfang oder am Ende des verfügbaren Speichers erstellt werden soll.
";
$elem["partman-partitioning/new_partition_place"]["descriptionfr"]="Emplacement de la nouvelle partition :
 Veuillez indiquer si vous souhaitez placer la nouvelle partition au début ou à la fin de l'espace disponible.
";
$elem["partman-partitioning/new_partition_place"]["default"]="";
$elem["partman-partitioning/new_partition_type"]["type"]="select";
$elem["partman-partitioning/new_partition_type"]["choices"][1]="Primary";
$elem["partman-partitioning/new_partition_type"]["choicesde"][1]="Primär";
$elem["partman-partitioning/new_partition_type"]["choicesfr"][1]="Primaire";
$elem["partman-partitioning/new_partition_type"]["description"]="Type for the new partition:
";
$elem["partman-partitioning/new_partition_type"]["descriptionde"]="Typ der neuen Partition:
";
$elem["partman-partitioning/new_partition_type"]["descriptionfr"]="Type de la nouvelle partition :
";
$elem["partman-partitioning/new_partition_type"]["default"]="";
$elem["partman-partitioning/set_flags"]["type"]="multiselect";
$elem["partman-partitioning/set_flags"]["description"]="Flags for the new partition:
";
$elem["partman-partitioning/set_flags"]["descriptionde"]="Flags (Markierungen) der neuen Partition:
";
$elem["partman-partitioning/set_flags"]["descriptionfr"]="Indicateurs de la nouvelle partition :
";
$elem["partman-partitioning/set_flags"]["default"]="";
$elem["partman-partitioning/set_name"]["type"]="string";
$elem["partman-partitioning/set_name"]["description"]="Partition name:
";
$elem["partman-partitioning/set_name"]["descriptionde"]="Name der Partition:
";
$elem["partman-partitioning/set_name"]["descriptionfr"]="Nom de la partition :
";
$elem["partman-partitioning/set_name"]["default"]="";
$elem["partman-partitioning/unknown_label"]["type"]="boolean";
$elem["partman-partitioning/unknown_label"]["description"]="Continue with partitioning?
 This partitioner doesn't have information about the default type of
 the partition tables on your architecture.  Please send an e-mail
 message to debian-boot@lists.debian.org with information.
 .
 Please note that if the type of the partition table is unsupported by
 libparted, then this partitioner will not work properly.
";
$elem["partman-partitioning/unknown_label"]["descriptionde"]="Mit der Partitionierung fortfahren?
 Das Partitionierungsprogramm hat nicht genug Informationen über den Standard-Typ der Partitionstabelle Ihrer Architektur. Bitte senden Sie eine E-Mail mit weiteren Informationen an debian-boot@lists.debian.org.
 .
 Bitte beachten Sie, dass dieses Programm für die Partitionierung nicht wie gewünscht funktionieren wird, wenn der Partitionstabellen-Typ von libparted nicht unterstützt wird.
";
$elem["partman-partitioning/unknown_label"]["descriptionfr"]="Voulez-vous utiliser quand même l'outil de partitionnement ?
 Cet outil de partitionnement ne possède pas d'information sur la table des partitions par défaut de cette architecture. Veuillez envoyer un courriel à debian-boot@lists.debian.org avec des informations complémentaires.
 .
 Veuillez noter que si la table des partitions n'est pas gérée par libparted, l'outil de partitionnement ne pourra pas fonctionner correctement.
";
$elem["partman-partitioning/unknown_label"]["default"]="true";
$elem["partman-partitioning/unsupported_label"]["type"]="boolean";
$elem["partman-partitioning/unsupported_label"]["description"]="Continue with partitioning?
 This partitioner is based on the library libparted which doesn't have
 support for the partition tables used on your architecture.  It is
 strongly recommended that you exit this partitioner.
 .
 If you can, please help to add support for your partition table type
 to libparted.
";
$elem["partman-partitioning/unsupported_label"]["descriptionde"]="Mit der Partitionierung fortfahren?
 Dieses Programm für die Partitionierung basiert auf der libparted-Bibliothek. Allerdings wird die Partitionstabelle Ihrer Architektur nicht unterstützt. Ihnen wird ausdrücklich dazu geraten, diesen Schritt abzubrechen.
 .
 Sofern Sie können, helfen Sie uns bitte, Ihren Partitionstabellen-Typ zu unterstützen.
";
$elem["partman-partitioning/unsupported_label"]["descriptionfr"]="Voulez-vous utiliser quand même l'outil de partitionnement ?
 Cet outil de partitionnement s'appuie sur la bibliothèque libparted qui ne gère pas les tables de partitions de cette architecture. Il vous est fortement conseillé de ne pas poursuivre son utilisation.
 .
 Essayez, si vous le pouvez, d'aider à la mise en place de la gestion de ce type de table des partitions par libparted.
";
$elem["partman-partitioning/unsupported_label"]["default"]="false";
$elem["partman-partitioning/default_label"]["type"]="string";
$elem["partman-partitioning/default_label"]["description"]="for internal use; can be preseeded
 You may preseed this template to override the partitioner's
 platform-specific default choice of disk label.  For example, on x86
 architectures it may be useful to set this to \"gpt\" to cause new partition
 tables to be created using GPT.

";
$elem["partman-partitioning/default_label"]["descriptionde"]="";
$elem["partman-partitioning/default_label"]["descriptionfr"]="";
$elem["partman-partitioning/default_label"]["default"]="";
$elem["partman-partitioning/choose_label"]["type"]="select";
$elem["partman-partitioning/choose_label"]["description"]="Partition table type:
 Select the type of partition table to use.
";
$elem["partman-partitioning/choose_label"]["descriptionde"]="Partitionstabellen-Typ:
 Wählen Sie den Partitionstabellen-Typ, der benutzt werden soll.
";
$elem["partman-partitioning/choose_label"]["descriptionfr"]="Type de la table des partitions :
 Veuillez choisir le type de la table des partitions à utiliser.
";
$elem["partman-partitioning/choose_label"]["default"]="";
$elem["partman-partitioning/confirm_new_label"]["type"]="boolean";
$elem["partman-partitioning/confirm_new_label"]["description"]="Create new empty partition table on this device?
 You have selected an entire device to partition. If you proceed with
 creating a new partition table on the device, then all current partitions
 will be removed.
 .
 Note that you will be able to undo this operation later if you wish.
";
$elem["partman-partitioning/confirm_new_label"]["descriptionde"]="Neue, leere Partitionstabelle auf diesem Gerät erstellen?
 Sie haben ein komplettes Laufwerk zur Partitionierung angegeben. Wenn Sie fortfahren und eine neue Partitionstabelle anlegen, werden alle darauf vorhandenen Partitionen gelöscht.
 .
 Beachten Sie, dass Sie diese Änderung später rückgängig machen können.
";
$elem["partman-partitioning/confirm_new_label"]["descriptionfr"]="Faut-il créer une nouvelle table des partitions sur ce disque ?
 Vous avez choisi de partitionner un disque entier. Si vous créez une nouvelle table des partitions, toutes les partitions actuelles seront supprimées.
 .
 Veuillez noter que vous pourrez ultérieurement annuler ces modifications pour récupérer l'ancienne table des partitions.
";
$elem["partman-partitioning/confirm_new_label"]["default"]="false";
$elem["partman-partitioning/confirm_write_new_label"]["type"]="boolean";
$elem["partman-partitioning/confirm_write_new_label"]["description"]="Write a new empty partition table?
 Because of limitations in the current implementation of the Sun
 partition tables in libparted, the newly created partition table has
 to be written to the disk immediately.
 .
 You will NOT be able to undo this operation later and all existing
 data on the disk will be irreversibly removed.
 .
 Confirm whether you actually want to create a new partition table and
 write it to disk.
";
$elem["partman-partitioning/confirm_write_new_label"]["descriptionde"]="Neue, leere Partitionstabelle erstellen?
 Durch Einschränkungen der Implementierung der Sun-Partitionstabellen in libparted müssen die neu erstellten Partitionstabellen sofort auf die Festplatte geschrieben werden.
 .
 Sie haben NICHT die Möglichkeit, diesen Vorgang später rückgängig zu machen. Alle auf der Festplatte vorhandenen Daten werden unwiderruflich gelöscht!
 .
 Bitte bestätigen Sie, ob Sie die neue Partitionstabelle tatsächlich erstellen und auf die Festplatte schreiben möchten.
";
$elem["partman-partitioning/confirm_write_new_label"]["descriptionfr"]="Faut-il créer une nouvelle table des partitions ?
 La gestion des tables de partitions Sun par la bibliothèque libparted impose que la nouvelle table des partitions soit écrite immédiatement sur le disque.
 .
 Vous ne pourrez PAS revenir en arrière : toutes les données du disque seront définitivement effacées.
 .
 Veuillez confirmer que vous souhaitez vraiment créer la nouvelle table de partitions et l'écrire sur le disque.
";
$elem["partman-partitioning/confirm_write_new_label"]["default"]="false";
$elem["partman-partitioning/bootable_logical"]["type"]="boolean";
$elem["partman-partitioning/bootable_logical"]["description"]="Are you sure you want a bootable logical partition?
 You are trying to set the bootable flag on a logical partition. The
 bootable flag is generally only useful on primary partitions, so setting it
 on logical partitions is normally discouraged. Some BIOS versions are known
 to fail to boot if there is no bootable primary partition.
 .
 However, if you are sure that your BIOS does not have this problem, or if
 you are using a custom boot manager that pays attention to bootable logical
 partitions, then setting this flag may make sense.
";
$elem["partman-partitioning/bootable_logical"]["descriptionde"]="Sind Sie sicher, dass Sie eine boot-fähige logische Partition haben möchten?
 Sie versuchen, das Boot-Flag für eine logische Partition zu setzen. Dieses Flag ist im Allgemeinen nur bei primären Partitionen sinnvoll, so dass das Setzen für logische Partitionen normalerweise nicht empfohlen wird. Es sind einige BIOS-Versionen bekannt, die nicht starten, falls es keine boot-fähige primäre Partition gibt.
 .
 Falls Sie jedoch sicher sind, dass Ihr BIOS dieses Problem nicht hat oder Sie einen angepassten Boot-Manager verwenden, der als boot-fähig markierte logische Partitionen berücksichtigt, dann könnte das Setzen dieses Flags sinnvoll sein.
";
$elem["partman-partitioning/bootable_logical"]["descriptionfr"]="Voulez-vous vraiment une partition logique amorçable ?
 Vous avez choisi d'indiquer qu'une partition logique est amorçable. Cet indicateur n'est le plus souvent utile que pour les partitions primaires et il est donc en général déconseillé de le placer sur des partitions logiques. Certaines versions de BIOS peuvent refuser de démarrer si aucune partition primaire n'est marquée comme amorçable.
 .
 Cependant, si le BIOS ne pose pas ce problème ou si vous utilisez un gestionnaire d'amorçage spécifique qui tient compte de l'état amorçable des partitions logiques, ce choix peut être approprié.
";
$elem["partman-partitioning/bootable_logical"]["default"]="false";
$elem["partman-partitioning/text/set_flags"]["type"]="text";
$elem["partman-partitioning/text/set_flags"]["description"]="Set the partition flags
";
$elem["partman-partitioning/text/set_flags"]["descriptionde"]="Partitions-Flags (Markierungen) setzen
";
$elem["partman-partitioning/text/set_flags"]["descriptionfr"]="Choisir les indicateurs de la partition
";
$elem["partman-partitioning/text/set_flags"]["default"]="";
$elem["partman-partitioning/text/set_name"]["type"]="text";
$elem["partman-partitioning/text/set_name"]["description"]="Name:
";
$elem["partman-partitioning/text/set_name"]["descriptionde"]="Name:
";
$elem["partman-partitioning/text/set_name"]["descriptionfr"]="Nom :
";
$elem["partman-partitioning/text/set_name"]["default"]="";
$elem["partman-partitioning/text/bootable"]["type"]="text";
$elem["partman-partitioning/text/bootable"]["description"]="Bootable flag:
";
$elem["partman-partitioning/text/bootable"]["descriptionde"]="Boot-Flag (Boot-fähig-Markierung):
";
$elem["partman-partitioning/text/bootable"]["descriptionfr"]="Indicateur d'amorçage :
";
$elem["partman-partitioning/text/bootable"]["default"]="";
$elem["partman-partitioning/text/on"]["type"]="text";
$elem["partman-partitioning/text/on"]["description"]="on
";
$elem["partman-partitioning/text/on"]["descriptionde"]="Ein
";
$elem["partman-partitioning/text/on"]["descriptionfr"]="présent
";
$elem["partman-partitioning/text/on"]["default"]="";
$elem["partman-partitioning/text/off"]["type"]="text";
$elem["partman-partitioning/text/off"]["description"]="off
";
$elem["partman-partitioning/text/off"]["descriptionde"]="Aus
";
$elem["partman-partitioning/text/off"]["descriptionfr"]="absent
";
$elem["partman-partitioning/text/off"]["default"]="";
$elem["partman-partitioning/text/resize"]["type"]="text";
$elem["partman-partitioning/text/resize"]["description"]="Resize the partition (currently ${SIZE})
";
$elem["partman-partitioning/text/resize"]["descriptionde"]="Partitionsgröße ändern (derzeit ${SIZE})
";
$elem["partman-partitioning/text/resize"]["descriptionfr"]="Redimensionner la partition (actuellement ${SIZE})
";
$elem["partman-partitioning/text/resize"]["default"]="";
$elem["partman-partitioning/text/delete"]["type"]="text";
$elem["partman-partitioning/text/delete"]["description"]="Delete the partition
";
$elem["partman-partitioning/text/delete"]["descriptionde"]="Die Partition löschen
";
$elem["partman-partitioning/text/delete"]["descriptionfr"]="Supprimer la partition
";
$elem["partman-partitioning/text/delete"]["default"]="";
$elem["partman-partitioning/text/new"]["type"]="text";
$elem["partman-partitioning/text/new"]["description"]="Create a new partition
";
$elem["partman-partitioning/text/new"]["descriptionde"]="Eine neue Partition erstellen
";
$elem["partman-partitioning/text/new"]["descriptionfr"]="Créer une nouvelle partition
";
$elem["partman-partitioning/text/new"]["default"]="";
$elem["partman-partitioning/text/label"]["type"]="text";
$elem["partman-partitioning/text/label"]["description"]="Create a new empty partition table on this device
";
$elem["partman-partitioning/text/label"]["descriptionde"]="Eine neue, leere Partitionstabelle auf diesem Gerät erstellen
";
$elem["partman-partitioning/text/label"]["descriptionfr"]="Créer une nouvelle table des partitions sur ce périphérique
";
$elem["partman-partitioning/text/label"]["default"]="";
$elem["partman/method_long/biosgrub"]["type"]="text";
$elem["partman/method_long/biosgrub"]["description"]="Reserved BIOS boot area
";
$elem["partman/method_long/biosgrub"]["descriptionde"]="Reservierter BIOS Boot-Bereich
";
$elem["partman/method_long/biosgrub"]["descriptionfr"]="Zone réservée pour le chargeur d'amorçage BIOS
";
$elem["partman/method_long/biosgrub"]["default"]="";
$elem["partman/method_short/biosgrub"]["type"]="text";
$elem["partman/method_short/biosgrub"]["description"]="biosgrub
";
$elem["partman/method_short/biosgrub"]["descriptionde"]="biosgrub
";
$elem["partman/method_short/biosgrub"]["descriptionfr"]="biosgrub
";
$elem["partman/method_short/biosgrub"]["default"]="";
$elem["partman-partitioning/no_bootable_gpt_efi"]["type"]="boolean";
$elem["partman-partitioning/no_bootable_gpt_efi"]["description"]="Go back to the menu and correct this problem?
 The partition table format in use on your disks normally requires you to
 create a separate partition for boot loader code. This partition should be
 marked for use as an \"EFI boot partition\" and should be at least 35 MB in
 size. Note that this is not the same as a partition mounted on /boot.
 .
 If you do not go back to the partitioning menu and correct this error, boot
 loader installation may fail later, although it may still be possible to
 install the boot loader to a partition.

";
$elem["partman-partitioning/no_bootable_gpt_efi"]["descriptionde"]="";
$elem["partman-partitioning/no_bootable_gpt_efi"]["descriptionfr"]="";
$elem["partman-partitioning/no_bootable_gpt_efi"]["default"]="";
$elem["partman-partitioning/no_bootable_gpt_biosgrub"]["type"]="boolean";
$elem["partman-partitioning/no_bootable_gpt_biosgrub"]["description"]="Go back to the menu and correct this problem?
 The partition table format in use on your disks normally requires you to
 create a separate partition for boot loader code. This partition should be
 marked for use as a \"Reserved BIOS boot area\" and should be at least 1 MB
 in size. Note that this is not the same as a partition mounted on /boot.
 .
 If you do not go back to the partitioning menu and correct this error, boot
 loader installation may fail later, although it may still be possible to
 install the boot loader to a partition.

";
$elem["partman-partitioning/no_bootable_gpt_biosgrub"]["descriptionde"]="";
$elem["partman-partitioning/no_bootable_gpt_biosgrub"]["descriptionfr"]="";
$elem["partman-partitioning/no_bootable_gpt_biosgrub"]["default"]="";
$elem["partman-target/help"]["type"]="note";
$elem["partman-target/help"]["description"]="Help on partitioning
 Partitioning a hard drive consists of dividing it to create the space
 needed to install your new system.  You need to choose which
 partition(s) will be used for the installation.
 .
 Select a free space to create partitions in it.
 .
 Select a device to remove all partitions in it and create a new empty
 partition table.
 .
 Select a partition to remove it or to specify how it should be used.
 At a bare minimum, you need one partition to contain the root of the
 file system (whose mount point is /).  Most people also feel that a
 separate swap partition is a necessity.  \"Swap\" is scratch space for an
 operating system, which allows the system to use disk storage as
 \"virtual memory\".
 .
 When the partition is already formatted you may choose to keep and
 use the existing data in the partition.  Partitions that will be used
 in this way are marked with \"${KEEP}\" in the main partitioning menu.
 .
 In general you will want to format the partition with a newly created
 file system.  NOTE: all data in the partition will be irreversibly
 deleted.  If you decide to format a partition that is already
 formatted, it will be marked with \"${DESTROY}\" in the main
 partitioning menu.  Otherwise it will be marked with \"${FORMAT}\".
 .
 ${ARCHITECTURE_HELP}
";
$elem["partman-target/help"]["descriptionde"]="Hilfe zur Partitionierung
 Eine Festplatte zu partitionieren bedeutet, den Platz aufzuteilen, damit das neue System installiert werden kann. Sie müssen wählen, welche Partitionen für die Installation genutzt werden sollen.
 .
 Wählen Sie freien Platz, um Partitionen zu erstellen.
 .
 Wählen Sie ein Gerät, um alle darauf befindlichen Partitionen zu löschen und eine neue, leere Partitionstabelle darauf zu erstellen.
 .
 Wählen Sie eine Partition, um sie zu entfernen oder um festzulegen, wie damit verfahren werden soll. Sie benötigen mindestens eine Partition, die das Root- Dateisystem (Einbindungspunkt »/«) beinhaltet. Viele Leute wünschen ebenfalls eine Swap-Partition, die es dem Betriebssystem ermöglicht, Festplattenplatz als virtuellen Arbeitsspeicher zu nutzen.
 .
 Ist die Partition schon formatiert, möchten Sie evtl. die vorhandenen Daten auf der Partition erhalten und weiter nutzen. Solche Partitionen sind im Hauptmenü mit »${KEEP}« gekennzeichnet.
 .
 Wahrscheinlich möchten Sie eine Partition, auf der ein Dateisystem erstellt wurde, formatieren. ACHTUNG: Alle Daten auf dieser Partition werden unwiderruflich gelöscht. Möchten Sie eine bereits formatierte Partition neu formatieren, erhält diese im Hauptmenü ein »${DESTROY}«, andernfalls ein »${FORMAT}«.
 .
 ${ARCHITECTURE_HELP}
";
$elem["partman-target/help"]["descriptionfr"]="Aide pour le partitionnement
 Le partitionnement d'un disque dur est une opération qui permet de le découper logiquement pour créer l'espace nécessaire à l'installation du nouveau système. Vous devez choisir quelle(s) partition(s) seront utilisées pour l'installation.
 .
 Vous pouvez choisir l'espace disponible pour y créer des partitions.
 .
 Vous pouvez également choisir un périphérique dont toutes les partitions seront supprimées pour la création d'une nouvelle table des partitions.
 .
 Vous pouvez enfin choisir une partition à supprimer ou indiquer comment une partition existante sera utilisée. Au minimum, une partition est indispensable pour la racine du système, dont le point de montage est « / ». La plupart des administrateurs préféreront également utiliser un espace d'échange distinct. L'espace d'échange (« swap ») permet au système de se servir d'une partie du disque comme mémoire virtuelle.
 .
 Si la partition est déjà formatée, vous pouvez choisir de la conserver et d'utiliser les données qui s'y trouvent. Ces partitions seront indiquées avec « ${KEEP} » dans le menu principal de l'outil de partitionnement.
 .
 En général, vous aurez à formater la partition avec un nouveau système de fichiers, ce qui détruira irréversiblement les données qui s'y trouvent. Une partition existante que vous souhaitez reformater sera marquée avec « ${DESTROY} ». Sinon, elle sera marquée avec « ${FORMAT} ».
 .
 ${ARCHITECTURE_HELP}
";
$elem["partman-target/help"]["default"]="";
$elem["partman-target/arch_help/i386/generic"]["type"]="text";
$elem["partman-target/arch_help/i386/generic"]["description"]="In order to start your new system, a so called boot loader is used.  It can be installed either in the master boot record of the first hard disk, or in a partition.  When the boot loader is installed in a partition, you must set the bootable flag for it. Such a partition will be marked with \"${BOOTABLE}\" in the main partitioning menu.
";
$elem["partman-target/arch_help/i386/generic"]["descriptionde"]="Damit das neue System starten kann, wird ein Boot- loader benötigt. Er kann im Master Boot Record der ersten Festplatte oder in einer Partition installiert werden. Wird er in einer Partition installiert, muss diese Partition das bootable-Flag gesetzt haben. Eine solche Partition wird im Hauptpartitionsmenü mit \"${BOOTABLE}\" markiert.
";
$elem["partman-target/arch_help/i386/generic"]["descriptionfr"]="Pour pouvoir démarrer le nouveau système, un programme de démarrage est utilisé. Il peut être installé dans le secteur principal d'amorçage du premier disque dur ou sur une partition. Dans ce dernier cas, cette partition doit être « amorçable », ce qui sera indiqué par « ${BOOTABLE} » dans le menu de partitionnement.
";
$elem["partman-target/arch_help/i386/generic"]["default"]="";
$elem["partman-target/arch_help/powerpc/powermac_newworld"]["type"]="text";
$elem["partman-target/arch_help/powerpc/powermac_newworld"]["description"]="In order to start your new system, a so called boot loader is used.  It is installed in a boot partition.  You must set the bootable flag for the partition.  Such a partition will be marked with \"${BOOTABLE}\" in the main partitioning menu.
";
$elem["partman-target/arch_help/powerpc/powermac_newworld"]["descriptionde"]="Damit Ihr Computer Ihr neues System starten kann, wird ein so genannter Bootloader benötigt. Er wird in einer boot-fähigen Partition installiert. Sie müssen das »bootable«-Flag für die Partition aktivieren. Eine solche Partition wird im Hauptpartitionsmenü mit »${BOOTABLE}« gekennzeichnet.
";
$elem["partman-target/arch_help/powerpc/powermac_newworld"]["descriptionfr"]="Pour pouvoir démarrer le nouveau système, un programme de démarrage est utilisé. Il sera installé sur une partition d'amorçage. Cette partition doit être marquée comme « amorçable », ce qui sera indiqué par « ${BOOTABLE} » dans le menu de partitionnement.
";
$elem["partman-target/arch_help/powerpc/powermac_newworld"]["default"]="";
$elem["partman-target/same_label"]["type"]="error";
$elem["partman-target/same_label"]["description"]="Identical labels for two file systems
 Two file systems are assigned the same label (${LABEL}): ${PART1} and
 ${PART2}. Since file system labels are usually used as unique identifiers,
 this is likely to cause reliability problems later.
 .
 Please correct this by changing labels.
";
$elem["partman-target/same_label"]["descriptionde"]="Identische Namen für zwei Dateisysteme
 Zwei Dateisystemen wurde der gleiche Name zugewiesen ([${LABEL}]: ${PART1} und ${PART2}). Da Dateisystemnamen gewöhnlich als eindeutige Kennungen verwendet werden, wird dies wahrscheinlich später Probleme bei der Funktionssicherheit verursachen.
 .
 Bitte beheben Sie dies, indem Sie die Namen ändern.
";
$elem["partman-target/same_label"]["descriptionfr"]="Étiquettes identiques pour deux systèmes de fichiers
 Deux systèmes de fichiers utilisent la même étiquette (${LABEL}) : ${PART1} et ${PART2}. Comme les étiquettes de systèmes de fichiers servent généralement d'identifiants uniques, il est très probable que cela puisse être la source de problèmes par la suite.
 .
 Veuillez corriger cela en modifiant les étiquettes.
";
$elem["partman-target/same_label"]["default"]="";
$elem["partman-target/same_mountpoint"]["type"]="error";
$elem["partman-target/same_mountpoint"]["description"]="Identical mount points for two file systems
 Two file systems are assigned the same mount point (${MOUNTPOINT}):
 ${PART1} and ${PART2}.
 .
 Please correct this by changing mount points.
";
$elem["partman-target/same_mountpoint"]["descriptionde"]="Identischer Einbindungspunkt für zwei Dateisysteme
 Zwei Dateisystemen wurde derselbe Einbindungspunkt ${MOUNTPOINT} zugewiesen: ${PART1} und ${PART2}.
 .
 Bitte beheben Sie dies, indem Sie die Einbindungspunkte ändern.
";
$elem["partman-target/same_mountpoint"]["descriptionfr"]="Points de montage identiques pour deux systèmes de fichiers
 Deux systèmes de fichiers (${PART1} et ${PART2}) partagent le point de montage ${MOUNTPOINT}.
 .
 Veuillez corriger cela en modifiant les points de montage.
";
$elem["partman-target/same_mountpoint"]["default"]="";
$elem["partman-target/no_root"]["type"]="error";
$elem["partman-target/no_root"]["description"]="No root file system
 No root file system is defined.
 .
 Please correct this from the partitioning menu.
";
$elem["partman-target/no_root"]["descriptionde"]="Kein Root-Dateisystem
 Es wurde kein Root-Dateisystem festgelegt.
 .
 Bitte beheben Sie dies im Partitionierungsmenü.
";
$elem["partman-target/no_root"]["descriptionfr"]="Pas de système de fichiers racine
 Aucun système de fichiers n'a été choisi comme racine.
 .
 Veuillez corriger cela à partir du menu de partitionnement.
";
$elem["partman-target/no_root"]["default"]="";
$elem["partman-target/must_be_on_root"]["type"]="error";
$elem["partman-target/must_be_on_root"]["description"]="Separate file system not allowed here
 You assigned a separate file system to ${MOUNTPOINT}, but in order for
 the system to start correctly this directory must be on the root file
 system.
 .
 Please correct this from the partitioning menu.
";
$elem["partman-target/must_be_on_root"]["descriptionde"]="Separates Dateisystem ist hier nicht erlaubt
 Sie haben ${MOUNTPOINT} ein separates Dateisystem zugewiesen. Damit das System korrekt starten kann, muss sich dieses Verzeichnis im Root-Dateisystem befinden.
 .
 Bitte beheben Sie dies im Partitionierungsmenü.
";
$elem["partman-target/must_be_on_root"]["descriptionfr"]="Pas de système de fichiers séparé possible pour ce répertoire
 Vous avez affecté un système de fichiers séparé pour ${MOUNTPOINT}. Cependant, pour que le système puisse démarrer normalement, ce répertoire doit sur trouver sur le système de fichiers racine.
 .
 Veuillez corriger cela à partir du menu de partitionnement.
";
$elem["partman-target/must_be_on_root"]["default"]="";
$elem["partman-target/mount_failed"]["type"]="boolean";
$elem["partman-target/mount_failed"]["description"]="Do you want to resume partitioning?
 The attempt to mount a file system with type ${TYPE} in ${DEVICE} at
 ${MOUNTPOINT} failed.
 .
 You may resume partitioning from the partitioning menu.
";
$elem["partman-target/mount_failed"]["descriptionde"]="Möchten Sie die Partitionierung fortsetzen?
 Der Versuch, ein Dateisystem vom Typ ${TYPE} auf ${DEVICE} als ${MOUNTPOINT} einzubinden, ist fehlgeschlagen.
 .
 Sie sollten die Partitionierung im Partitionierungsmenü fortsetzen.
";
$elem["partman-target/mount_failed"]["descriptionfr"]="Souhaitez-vous recommencer le partitionnement ?
 La tentative de montage d'un système de fichiers ${TYPE} de ${DEVICE} sur ${MOUNTPOINT} a échoué.
 .
 Vous pouvez recommencer le partitionnement à partir du menu.
";
$elem["partman-target/mount_failed"]["default"]="true";
$elem["partman-target/choose_method"]["type"]="select";
$elem["partman-target/choose_method"]["description"]="How to use this partition:
";
$elem["partman-target/choose_method"]["descriptionde"]="Zweck der Partition:
";
$elem["partman-target/choose_method"]["descriptionfr"]="Méthode d'utilisation de cette partition :
";
$elem["partman-target/choose_method"]["default"]="";
$elem["partman-target/text/method"]["type"]="text";
$elem["partman-target/text/method"]["description"]="Use as:
";
$elem["partman-target/text/method"]["descriptionde"]="Benutzen als:
";
$elem["partman-target/text/method"]["descriptionfr"]="Utiliser comme :
";
$elem["partman-target/text/method"]["default"]="";
$elem["partman-target/text/get_help"]["type"]="text";
$elem["partman-target/text/get_help"]["description"]="Help on partitioning
";
$elem["partman-target/text/get_help"]["descriptionde"]="Hilfe zur Partitionierung
";
$elem["partman-target/text/get_help"]["descriptionfr"]="Aide pour le partitionnement
";
$elem["partman-target/text/get_help"]["default"]="";
$elem["partman/mount_style"]["type"]="select";
$elem["partman/mount_style"]["choices"][1]="traditional";
$elem["partman/mount_style"]["choices"][2]="label";
$elem["partman/mount_style"]["description"]="for internal use; can be preseeded
 Normally, filesystems are mounted using a universally unique identifier
 (UUID) as a key; this allows them to be mounted properly even if their
 device name changes. UUIDs are long and difficult to read, so, if you
 prefer, the installer can mount filesystems based on the traditional device
 names, or based on a label you assign. However, note that traditional
 device names may change based on the order in which the kernel discovers
 devices at boot, which may cause the wrong filesystem to be mounted;
 similarly, labels are likely to clash if you plug in a new disk or a USB
 drive, and if that happens your system's behaviour when started will be
 random.
 .
 If you set \"label\" here, any filesystems without a label will be mounted
 using a UUID instead.
 .
 Devices with stable names, such as LVM logical volumes, will continue to
 use their traditional names rather than UUIDs.

";
$elem["partman/mount_style"]["descriptionde"]="";
$elem["partman/mount_style"]["descriptionfr"]="";
$elem["partman/mount_style"]["default"]="uuid";
$elem["partman-target/clear_partitions_failed"]["type"]="error";
$elem["partman-target/clear_partitions_failed"]["description"]="Failed to remove conflicting files
 The installer needs to remove operating system files from the install target,
 but was unable to do so.  The install cannot continue.
";
$elem["partman-target/clear_partitions_failed"]["descriptionde"]="Löschen der Konfliktdateien fehlgeschlagen
 Das Installationsprogramm muss Betriebssystemdateien vom Ziellaufwerk löschen. Der Versuch, diese zu löschen, ist fehlgeschlagen. Der Installationsvorgang kann nicht fortgesetzt werden.
";
$elem["partman-target/clear_partitions_failed"]["descriptionfr"]="La suppression des fichiers en conflit a échoué
 L'installation nécessite la suppression de fichiers système, mais cette opération est impossible. L'installation ne peut pas continuer.
";
$elem["partman-target/clear_partitions_failed"]["default"]="";
$elem["partman-target/clear_partitions_progress"]["type"]="text";
$elem["partman-target/clear_partitions_progress"]["description"]="Removing conflicting operating system files...
";
$elem["partman-target/clear_partitions_progress"]["descriptionde"]="Kollidierende Systemdateien werden gelöscht ...
";
$elem["partman-target/clear_partitions_progress"]["descriptionfr"]="Suppression des fichiers système en conflit...
";
$elem["partman-target/clear_partitions_progress"]["default"]="";
$elem["ubiquity/partman-system-unformatted"]["type"]="boolean";
$elem["ubiquity/partman-system-unformatted"]["description"]="Do you want to return to the partitioner?
 The file system on ${PARTITION} assigned to ${MOUNTPOINT} has not been marked
 for formatting.  Directories containing system files (/etc, /lib, /usr, /var,
 ...) that already exist under any defined mountpoint will be deleted during the
 install.
 .
 Please ensure that you have backed up any critical data before installing.
";
$elem["ubiquity/partman-system-unformatted"]["descriptionde"]="Möchten Sie zum Partitionsmenü zurückkehren?
 Das Dateisystem auf ${PARTITION}, das ${MOUNTPOINT} zugeordnet ist, wurde nicht für eine Formatierung gekennzeichnet. Verzeichnisse, die Systemdateien beinhalten (/etc, /lib, /usr, /var, ...), werden während der Installation gelöscht, wenn diese unter einem beliebigen Einhängepunkt bereits existieren.
 .
 Bitte stellen Sie sich, dass alle wichtigen Daten gesichert wurden, bevor Sie mit der Installation beginnen.
";
$elem["ubiquity/partman-system-unformatted"]["descriptionfr"]="Voulez-vous revenir à l'outil de partitionnement ?
 Le système de fichier sur ${PARTITION} assigné à ${MOUNTPOINT} n'a pas été marqué pour être formaté. Les dossiers contenant les fichiers systèmes (/etc, /lib, /usr, /var, ...) qui existent déjà sous tous les points de montages seront supprimés durant l'installation.
 .
 Veuillez vous assurer que vos données importantes ont été sauvegardées avant l'installation.
";
$elem["ubiquity/partman-system-unformatted"]["default"]="";
$elem["partman-xfs/text/xfs"]["type"]="text";
$elem["partman-xfs/text/xfs"]["description"]="xfs
";
$elem["partman-xfs/text/xfs"]["descriptionde"]="xfs
";
$elem["partman-xfs/text/xfs"]["descriptionfr"]="xfs
";
$elem["partman-xfs/text/xfs"]["default"]="";
$elem["partman/filesystem_long/xfs"]["type"]="text";
$elem["partman/filesystem_long/xfs"]["description"]="XFS journaling file system
";
$elem["partman/filesystem_long/xfs"]["descriptionde"]="XFS-Journaling-Dateisystem
";
$elem["partman/filesystem_long/xfs"]["descriptionfr"]="système de fichiers journalisé XFS
";
$elem["partman/filesystem_long/xfs"]["default"]="";
$elem["partman/filesystem_short/xfs"]["type"]="text";
$elem["partman/filesystem_short/xfs"]["description"]="xfs
";
$elem["partman/filesystem_short/xfs"]["descriptionde"]="xfs
";
$elem["partman/filesystem_short/xfs"]["descriptionfr"]="xfs
";
$elem["partman/filesystem_short/xfs"]["default"]="";
$elem["preseed/retrieve_error"]["type"]="error";
$elem["preseed/retrieve_error"]["description"]="Failed to retrieve the preconfiguration file
 The file needed for preconfiguration could not be retrieved from
 ${LOCATION}. The installation will proceed in non-automated mode.
";
$elem["preseed/retrieve_error"]["descriptionde"]="Vorkonfigurationsdatei konnte nicht geladen werden
 Die Datei für eine vorkonfigurierte Installation konnte nicht von ${LOCATION} geladen werden. Sie können die Installation manuell fortsetzen.
";
$elem["preseed/retrieve_error"]["descriptionfr"]="Échec de la récupération du fichier de préconfiguration
 Le fichier nécessaire à la préconfiguration n'a pas pu être téléchargé à l'adresse ${LOCATION}. L'installation va se dérouler sans automatisation.
";
$elem["preseed/retrieve_error"]["default"]="";
$elem["preseed/load_error"]["type"]="error";
$elem["preseed/load_error"]["description"]="Failed to process the preconfiguration file
 The installer failed to process the preconfiguration file from
 ${LOCATION}. The file may be corrupt.
";
$elem["preseed/load_error"]["descriptionde"]="Die Vorkonfigurationsdatei konnte nicht verarbeitet werden
 Der Installer konnte die Vorkonfigurationsdatei von ${LOCATION} nicht auswerten. Die Datei ist möglicherweise beschädigt.
";
$elem["preseed/load_error"]["descriptionfr"]="Échec du traitement du fichier de préconfiguration
 L'outil d'installation n'a pas pu traiter le fichier de préconfiguration depuis ${LOCATION}. Le fichier est peut-être corrompu.
";
$elem["preseed/load_error"]["default"]="";
$elem["preseed/boot_command"]["type"]="string";
$elem["preseed/boot_command"]["description"]="for internal use; can be preseeded
 Shell command or commands to run in the d-i environment during boot

";
$elem["preseed/boot_command"]["descriptionde"]="";
$elem["preseed/boot_command"]["descriptionfr"]="";
$elem["preseed/boot_command"]["default"]="";
$elem["preseed/early_command"]["type"]="string";
$elem["preseed/early_command"]["description"]="for internal use; can be preseeded
 Shell command or commands to run in the d-i environment as early as possible

";
$elem["preseed/early_command"]["descriptionde"]="";
$elem["preseed/early_command"]["descriptionfr"]="";
$elem["preseed/early_command"]["default"]="";
$elem["preseed/late_command"]["type"]="string";
$elem["preseed/late_command"]["description"]="for internal use; can be preseeded
 Shell command or commands to run in the d-i environment as late as possible

";
$elem["preseed/late_command"]["descriptionde"]="";
$elem["preseed/late_command"]["descriptionfr"]="";
$elem["preseed/late_command"]["default"]="";
$elem["preseed/run"]["type"]="string";
$elem["preseed/run"]["description"]="for internal use; can be preseeded
 Programs to be obtained & run

";
$elem["preseed/run"]["descriptionde"]="";
$elem["preseed/run"]["descriptionfr"]="";
$elem["preseed/run"]["default"]="";
$elem["preseed/include"]["type"]="string";
$elem["preseed/include"]["description"]="for internal use; can be preseeded
 Additional preseed files to load

";
$elem["preseed/include"]["descriptionde"]="";
$elem["preseed/include"]["descriptionfr"]="";
$elem["preseed/include"]["default"]="";
$elem["preseed/include/checksum"]["type"]="string";
$elem["preseed/include/checksum"]["description"]="for internal use; can be preseeded
 md5sums of additional preseed files to load

";
$elem["preseed/include/checksum"]["descriptionde"]="";
$elem["preseed/include/checksum"]["descriptionfr"]="";
$elem["preseed/include/checksum"]["default"]="";
$elem["preseed/include_command"]["type"]="string";
$elem["preseed/include_command"]["description"]="for internal use; can be preseeded
 Shell command to run that may output a list of preseed files to load

";
$elem["preseed/include_command"]["descriptionde"]="";
$elem["preseed/include_command"]["descriptionfr"]="";
$elem["preseed/include_command"]["default"]="";
$elem["preseed/command_failed"]["type"]="error";
$elem["preseed/command_failed"]["description"]="Failed to run preseeded command
 Execution of preseeded command \"${COMMAND}\" failed with exit code ${CODE}.
";
$elem["preseed/command_failed"]["descriptionde"]="Vorkonfigurationsbefehl konnte nicht ausgeführt werden
 Die Ausführung des Vorkonfigurationsbefehls (»${COMMAND}«) ist fehlgeschlagen: Fehlercode ${CODE}
";
$elem["preseed/command_failed"]["descriptionfr"]="Échec de l'exécution de la commande préconfigurée
 L'exécution de la commande préconfigurée (« ${COMMAND} ») a échoué avec le code d'erreur ${CODE}.
";
$elem["preseed/command_failed"]["default"]="";
$elem["preseed/interactive"]["type"]="boolean";
$elem["preseed/interactive"]["description"]="for internal use; can be preseeded
 If true, preseed questions but don't mark them as seen

";
$elem["preseed/interactive"]["descriptionde"]="";
$elem["preseed/interactive"]["descriptionfr"]="";
$elem["preseed/interactive"]["default"]="false";
$elem["finish-install/progress/tzsetup"]["type"]="text";
$elem["finish-install/progress/tzsetup"]["description"]="Saving the time zone...
";
$elem["finish-install/progress/tzsetup"]["descriptionde"]="Speichern der Zeitzone ...
";
$elem["finish-install/progress/tzsetup"]["descriptionfr"]="Sauvegarde du fuseau horaire...
";
$elem["finish-install/progress/tzsetup"]["default"]="";
$elem["tzsetup/geoip_server"]["type"]="string";
$elem["tzsetup/geoip_server"]["description"]="for internal use; can be preseeded
 Address of a server that will perform a geoip lookup.  Preseed to an empty
 string to disable.

";
$elem["tzsetup/geoip_server"]["descriptionde"]="";
$elem["tzsetup/geoip_server"]["descriptionfr"]="";
$elem["tzsetup/geoip_server"]["default"]="http://geoip.ubuntu.com/lookup";
$elem["tzsetup/detected"]["type"]="boolean";
$elem["tzsetup/detected"]["description"]="Is this time zone correct?
 Based on your present physical location, your time zone is ${ZONE}.
 .
 If this is not correct, you may select from a full list of time zones
 instead.

";
$elem["tzsetup/detected"]["descriptionde"]="";
$elem["tzsetup/detected"]["descriptionfr"]="";
$elem["tzsetup/detected"]["default"]="true";
$elem["time/zone"]["type"]="select";
$elem["time/zone"]["description"]="${DESCRIPTION}
 If the desired time zone is not listed, then please go back to the step
 \"Choose language\" and select a country that uses the desired time zone
 (the country where you live or are located).
";
$elem["time/zone"]["descriptionde"]="${DESCRIPTION}
 Falls die gewünschte Zeitzone nicht aufgeführt ist, gehen Sie bitte zurück zum Schritt »Sprache wählen« und wählen Sie ein Land, das die gewünschte Zeitzone benutzt (das Land, in dem Sie leben oder in dem Sie sich befinden).
";
$elem["time/zone"]["descriptionfr"]="${DESCRIPTION}
 Si le fuseau horaire souhaité n'est pas affiché, veuillez retourner à l'étape de choix de la langue d'installation et choisir un pays qui inclut ce fuseau horaire (votre pays de résidence, par exemple).
";
$elem["time/zone"]["default"]="";
$elem["tzsetup/text/UTC"]["type"]="text";
$elem["tzsetup/text/UTC"]["description"]="Coordinated Universal Time (UTC)
";
$elem["tzsetup/text/UTC"]["descriptionde"]="Koordinierte Weltzeit (Coordinated Universal Time, UTC)
";
$elem["tzsetup/text/UTC"]["descriptionfr"]="Temps universel coordonné (UTC)
";
$elem["tzsetup/text/UTC"]["default"]="";
$elem["tzsetup/descriptions/zone"]["type"]="text";
$elem["tzsetup/descriptions/zone"]["description"]="Select your time zone:
";
$elem["tzsetup/descriptions/zone"]["descriptionde"]="Wählen Sie Ihre Zeitzone:
";
$elem["tzsetup/descriptions/zone"]["descriptionfr"]="Fuseau horaire :
";
$elem["tzsetup/descriptions/zone"]["default"]="";
$elem["tzsetup/descriptions/location"]["type"]="text";
$elem["tzsetup/descriptions/location"]["description"]="Select a location in your time zone:
";
$elem["tzsetup/descriptions/location"]["descriptionde"]="Wählen Sie einen Ort in Ihrer Zeitzone:
";
$elem["tzsetup/descriptions/location"]["descriptionfr"]="Lieu géographique dans votre fuseau horaire :
";
$elem["tzsetup/descriptions/location"]["default"]="";
$elem["tzsetup/descriptions/city"]["type"]="text";
$elem["tzsetup/descriptions/city"]["description"]="Select a city in your time zone:
";
$elem["tzsetup/descriptions/city"]["descriptionde"]="Wählen Sie eine Stadt in Ihrer Zeitzone:
";
$elem["tzsetup/descriptions/city"]["descriptionfr"]="Ville dans votre fuseau horaire :
";
$elem["tzsetup/descriptions/city"]["default"]="";
$elem["tzsetup/descriptions/state"]["type"]="text";
$elem["tzsetup/descriptions/state"]["description"]="Select the state or province to set your time zone:
";
$elem["tzsetup/descriptions/state"]["descriptionde"]="Wählen Sie den Staat oder die Provinz, um Ihre Zeitzone zu setzen:
";
$elem["tzsetup/descriptions/state"]["descriptionfr"]="État ou province pour le choix du fuseau horaire :
";
$elem["tzsetup/descriptions/state"]["default"]="";
$elem["tzsetup/country/AQ"]["type"]="select";
$elem["tzsetup/country/AQ"]["choices"][1]="McMurdo";
$elem["tzsetup/country/AQ"]["choices"][2]="Rothera";
$elem["tzsetup/country/AQ"]["choices"][3]="Palmer";
$elem["tzsetup/country/AQ"]["choices"][4]="Mawson";
$elem["tzsetup/country/AQ"]["choices"][5]="Davis";
$elem["tzsetup/country/AQ"]["choices"][6]="Casey";
$elem["tzsetup/country/AQ"]["choices"][7]="Vostok";
$elem["tzsetup/country/AQ"]["choices"][8]="Dumont-d'Urville";
$elem["tzsetup/country/AQ"]["choicesde"][1]="McMurdo";
$elem["tzsetup/country/AQ"]["choicesde"][2]="Rothera";
$elem["tzsetup/country/AQ"]["choicesde"][3]="Palmer";
$elem["tzsetup/country/AQ"]["choicesde"][4]="Mawson";
$elem["tzsetup/country/AQ"]["choicesde"][5]="Davis";
$elem["tzsetup/country/AQ"]["choicesde"][6]="Casey";
$elem["tzsetup/country/AQ"]["choicesde"][7]="Vostok";
$elem["tzsetup/country/AQ"]["choicesde"][8]="Dumont-d'Urville";
$elem["tzsetup/country/AQ"]["choicesfr"][1]="Base McMurdo";
$elem["tzsetup/country/AQ"]["choicesfr"][2]="Base Rothera";
$elem["tzsetup/country/AQ"]["choicesfr"][3]="Base Palmer";
$elem["tzsetup/country/AQ"]["choicesfr"][4]="Base Mawson";
$elem["tzsetup/country/AQ"]["choicesfr"][5]="Base Davis";
$elem["tzsetup/country/AQ"]["choicesfr"][6]="Base Casey";
$elem["tzsetup/country/AQ"]["choicesfr"][7]="Base Vostok";
$elem["tzsetup/country/AQ"]["choicesfr"][8]="Base Dumont-d'Urville";
$elem["tzsetup/country/AQ"]["description"]="location

";
$elem["tzsetup/country/AQ"]["descriptionde"]="";
$elem["tzsetup/country/AQ"]["descriptionfr"]="";
$elem["tzsetup/country/AQ"]["default"]="";
$elem["tzsetup/country/AU"]["type"]="select";
$elem["tzsetup/country/AU"]["choices"][1]="Australian Capital Territory";
$elem["tzsetup/country/AU"]["choices"][2]="New South Wales";
$elem["tzsetup/country/AU"]["choices"][3]="Victoria";
$elem["tzsetup/country/AU"]["choices"][4]="Northern Territory";
$elem["tzsetup/country/AU"]["choices"][5]="Queensland";
$elem["tzsetup/country/AU"]["choices"][6]="South Australia";
$elem["tzsetup/country/AU"]["choices"][7]="Tasmania";
$elem["tzsetup/country/AU"]["choices"][8]="Western Australia";
$elem["tzsetup/country/AU"]["choices"][9]="Eyre Highway";
$elem["tzsetup/country/AU"]["choices"][10]="Yancowinna County";
$elem["tzsetup/country/AU"]["choicesde"][1]="Australisches Hauptstadtterritorium (ACT)";
$elem["tzsetup/country/AU"]["choicesde"][2]="New South Wales";
$elem["tzsetup/country/AU"]["choicesde"][3]="Victoria";
$elem["tzsetup/country/AU"]["choicesde"][4]="Nordterritorium";
$elem["tzsetup/country/AU"]["choicesde"][5]="Queensland";
$elem["tzsetup/country/AU"]["choicesde"][6]="Südaustralien";
$elem["tzsetup/country/AU"]["choicesde"][7]="Tasmanien";
$elem["tzsetup/country/AU"]["choicesde"][8]="Westaustralien";
$elem["tzsetup/country/AU"]["choicesde"][9]="Eyre-Highway";
$elem["tzsetup/country/AU"]["choicesde"][10]="Yancowinna County";
$elem["tzsetup/country/AU"]["choicesfr"][1]="Territoire de la capitale australienne";
$elem["tzsetup/country/AU"]["choicesfr"][2]="Nouvelle-Galles-du-Sud";
$elem["tzsetup/country/AU"]["choicesfr"][3]="Victoria";
$elem["tzsetup/country/AU"]["choicesfr"][4]="Territoire du Nord";
$elem["tzsetup/country/AU"]["choicesfr"][5]="Queensland";
$elem["tzsetup/country/AU"]["choicesfr"][6]="Australie-Méridionale";
$elem["tzsetup/country/AU"]["choicesfr"][7]="Tasmanie";
$elem["tzsetup/country/AU"]["choicesfr"][8]="Australie-Occidentale";
$elem["tzsetup/country/AU"]["choicesfr"][9]="Route d'Eyre";
$elem["tzsetup/country/AU"]["choicesfr"][10]="Comté de Yancowinna";
$elem["tzsetup/country/AU"]["description"]="state

";
$elem["tzsetup/country/AU"]["descriptionde"]="";
$elem["tzsetup/country/AU"]["descriptionfr"]="";
$elem["tzsetup/country/AU"]["default"]="Australia/Canberra";
$elem["tzsetup/country/BR"]["type"]="select";
$elem["tzsetup/country/BR"]["choices"][1]="Acre";
$elem["tzsetup/country/BR"]["choices"][2]="Alagoas";
$elem["tzsetup/country/BR"]["choices"][3]="Amazonas";
$elem["tzsetup/country/BR"]["choices"][4]="Amapá";
$elem["tzsetup/country/BR"]["choices"][5]="Bahia";
$elem["tzsetup/country/BR"]["choices"][6]="Ceará";
$elem["tzsetup/country/BR"]["choices"][7]="Distrito Federal";
$elem["tzsetup/country/BR"]["choices"][8]="Espírito Santo";
$elem["tzsetup/country/BR"]["choices"][9]="Fernando de Noronha";
$elem["tzsetup/country/BR"]["choices"][10]="Goiás";
$elem["tzsetup/country/BR"]["choices"][11]="Maranhão";
$elem["tzsetup/country/BR"]["choices"][12]="Minas Gerais";
$elem["tzsetup/country/BR"]["choices"][13]="Mato Grosso do Sul";
$elem["tzsetup/country/BR"]["choices"][14]="Mato Grosso";
$elem["tzsetup/country/BR"]["choices"][15]="Pará";
$elem["tzsetup/country/BR"]["choices"][16]="Paraíba";
$elem["tzsetup/country/BR"]["choices"][17]="Pernambuco";
$elem["tzsetup/country/BR"]["choices"][18]="Piauí";
$elem["tzsetup/country/BR"]["choices"][19]="Paraná";
$elem["tzsetup/country/BR"]["choices"][20]="Rio de Janeiro";
$elem["tzsetup/country/BR"]["choices"][21]="Rio Grande do Norte";
$elem["tzsetup/country/BR"]["choices"][22]="Rondônia";
$elem["tzsetup/country/BR"]["choices"][23]="Roraima";
$elem["tzsetup/country/BR"]["choices"][24]="Rio Grande do Sul";
$elem["tzsetup/country/BR"]["choices"][25]="Santa Catarina";
$elem["tzsetup/country/BR"]["choices"][26]="Sergipe";
$elem["tzsetup/country/BR"]["choices"][27]="São Paulo";
$elem["tzsetup/country/BR"]["choicesde"][1]="Acre";
$elem["tzsetup/country/BR"]["choicesde"][2]="Alagoas";
$elem["tzsetup/country/BR"]["choicesde"][3]="Amazonas";
$elem["tzsetup/country/BR"]["choicesde"][4]="Amapá";
$elem["tzsetup/country/BR"]["choicesde"][5]="Bahia";
$elem["tzsetup/country/BR"]["choicesde"][6]="Ceará";
$elem["tzsetup/country/BR"]["choicesde"][7]="Distrito Federal (Bundesdistrikt)";
$elem["tzsetup/country/BR"]["choicesde"][8]="Espírito Santo";
$elem["tzsetup/country/BR"]["choicesde"][9]="Fernando de Noronha";
$elem["tzsetup/country/BR"]["choicesde"][10]="Goiás";
$elem["tzsetup/country/BR"]["choicesde"][11]="Maranhão";
$elem["tzsetup/country/BR"]["choicesde"][12]="Minas Gerais";
$elem["tzsetup/country/BR"]["choicesde"][13]="Mato Grosso do Sul";
$elem["tzsetup/country/BR"]["choicesde"][14]="Mato Grosso";
$elem["tzsetup/country/BR"]["choicesde"][15]="Pará";
$elem["tzsetup/country/BR"]["choicesde"][16]="Paraíba";
$elem["tzsetup/country/BR"]["choicesde"][17]="Pernambuco";
$elem["tzsetup/country/BR"]["choicesde"][18]="Piauí";
$elem["tzsetup/country/BR"]["choicesde"][19]="Paraná";
$elem["tzsetup/country/BR"]["choicesde"][20]="Rio de Janeiro";
$elem["tzsetup/country/BR"]["choicesde"][21]="Rio Grande do Norte";
$elem["tzsetup/country/BR"]["choicesde"][22]="Rondônia";
$elem["tzsetup/country/BR"]["choicesde"][23]="Roraima";
$elem["tzsetup/country/BR"]["choicesde"][24]="Rio Grande do Sul";
$elem["tzsetup/country/BR"]["choicesde"][25]="Santa Catarina";
$elem["tzsetup/country/BR"]["choicesde"][26]="Sergipe";
$elem["tzsetup/country/BR"]["choicesde"][27]="São Paulo";
$elem["tzsetup/country/BR"]["choicesfr"][1]="Acre";
$elem["tzsetup/country/BR"]["choicesfr"][2]="Alagoas";
$elem["tzsetup/country/BR"]["choicesfr"][3]="Amazone";
$elem["tzsetup/country/BR"]["choicesfr"][4]="Amapa";
$elem["tzsetup/country/BR"]["choicesfr"][5]="Bahia";
$elem["tzsetup/country/BR"]["choicesfr"][6]="Ceara";
$elem["tzsetup/country/BR"]["choicesfr"][7]="District fédéral";
$elem["tzsetup/country/BR"]["choicesfr"][8]="Espirito Santo";
$elem["tzsetup/country/BR"]["choicesfr"][9]="Fernando de Noronha";
$elem["tzsetup/country/BR"]["choicesfr"][10]="Goias";
$elem["tzsetup/country/BR"]["choicesfr"][11]="Maranhao";
$elem["tzsetup/country/BR"]["choicesfr"][12]="Minas Gerais";
$elem["tzsetup/country/BR"]["choicesfr"][13]="Mato Grosso do Sul";
$elem["tzsetup/country/BR"]["choicesfr"][14]="Mato Grosso";
$elem["tzsetup/country/BR"]["choicesfr"][15]="Para";
$elem["tzsetup/country/BR"]["choicesfr"][16]="Paraiba";
$elem["tzsetup/country/BR"]["choicesfr"][17]="Pernambouc";
$elem["tzsetup/country/BR"]["choicesfr"][18]="Piaui";
$elem["tzsetup/country/BR"]["choicesfr"][19]="Parana";
$elem["tzsetup/country/BR"]["choicesfr"][20]="Rio de Janeiro";
$elem["tzsetup/country/BR"]["choicesfr"][21]="Rio Grande do Norte";
$elem["tzsetup/country/BR"]["choicesfr"][22]="Rondonia";
$elem["tzsetup/country/BR"]["choicesfr"][23]="Roraima";
$elem["tzsetup/country/BR"]["choicesfr"][24]="Rio Grande do Sul";
$elem["tzsetup/country/BR"]["choicesfr"][25]="Santa-Catarina";
$elem["tzsetup/country/BR"]["choicesfr"][26]="Sergipe";
$elem["tzsetup/country/BR"]["choicesfr"][27]="São Paulo";
$elem["tzsetup/country/BR"]["description"]="state

";
$elem["tzsetup/country/BR"]["descriptionde"]="";
$elem["tzsetup/country/BR"]["descriptionfr"]="";
$elem["tzsetup/country/BR"]["default"]="America/Sao_Paulo";
$elem["tzsetup/country/CA"]["type"]="select";
$elem["tzsetup/country/CA"]["choices"][1]="Newfoundland";
$elem["tzsetup/country/CA"]["choices"][2]="Atlantic";
$elem["tzsetup/country/CA"]["choices"][3]="Eastern";
$elem["tzsetup/country/CA"]["choices"][4]="Central";
$elem["tzsetup/country/CA"]["choices"][5]="East Saskatchewan";
$elem["tzsetup/country/CA"]["choices"][6]="Saskatchewan";
$elem["tzsetup/country/CA"]["choices"][7]="Mountain";
$elem["tzsetup/country/CA"]["choicesde"][1]="Neufundland";
$elem["tzsetup/country/CA"]["choicesde"][2]="Atlantik";
$elem["tzsetup/country/CA"]["choicesde"][3]="Osten (Eastern)";
$elem["tzsetup/country/CA"]["choicesde"][4]="Zentral";
$elem["tzsetup/country/CA"]["choicesde"][5]="Ost-Saskatchewan";
$elem["tzsetup/country/CA"]["choicesde"][6]="Saskatchewan";
$elem["tzsetup/country/CA"]["choicesde"][7]="Gebirge (Mountain)";
$elem["tzsetup/country/CA"]["choicesfr"][1]="Terre-Neuve";
$elem["tzsetup/country/CA"]["choicesfr"][2]="Atlantique";
$elem["tzsetup/country/CA"]["choicesfr"][3]="Est (Eastern)";
$elem["tzsetup/country/CA"]["choicesfr"][4]="Centre (Central)";
$elem["tzsetup/country/CA"]["choicesfr"][5]="Saskatchewan de l'Est";
$elem["tzsetup/country/CA"]["choicesfr"][6]="Saskatchewan";
$elem["tzsetup/country/CA"]["choicesfr"][7]="Rocheuses (Mountain)";
$elem["tzsetup/country/CA"]["description"]="zone

";
$elem["tzsetup/country/CA"]["descriptionde"]="";
$elem["tzsetup/country/CA"]["descriptionfr"]="";
$elem["tzsetup/country/CA"]["default"]="Canada/Eastern";
$elem["tzsetup/country/CD"]["type"]="select";
$elem["tzsetup/country/CD"]["choices"][1]="Kinshasa";
$elem["tzsetup/country/CD"]["choicesde"][1]="Kinshasa";
$elem["tzsetup/country/CD"]["choicesfr"][1]="Kinshasa (Ouest)";
$elem["tzsetup/country/CD"]["description"]="city

";
$elem["tzsetup/country/CD"]["descriptionde"]="";
$elem["tzsetup/country/CD"]["descriptionfr"]="";
$elem["tzsetup/country/CD"]["default"]="Africa/Kinshasa";
$elem["tzsetup/country/CL"]["type"]="select";
$elem["tzsetup/country/CL"]["choices"][1]="Santiago";
$elem["tzsetup/country/CL"]["choicesde"][1]="Santiago";
$elem["tzsetup/country/CL"]["choicesfr"][1]="Santiago";
$elem["tzsetup/country/CL"]["description"]="zone

";
$elem["tzsetup/country/CL"]["descriptionde"]="";
$elem["tzsetup/country/CL"]["descriptionfr"]="";
$elem["tzsetup/country/CL"]["default"]="America/Santiago";
$elem["tzsetup/country/EC"]["type"]="select";
$elem["tzsetup/country/EC"]["choices"][1]="Guayaquil";
$elem["tzsetup/country/EC"]["choicesde"][1]="Guayaquil";
$elem["tzsetup/country/EC"]["choicesfr"][1]="Guayaquil";
$elem["tzsetup/country/EC"]["description"]="location

";
$elem["tzsetup/country/EC"]["descriptionde"]="";
$elem["tzsetup/country/EC"]["descriptionfr"]="";
$elem["tzsetup/country/EC"]["default"]="America/Guayaquil";
$elem["tzsetup/country/ES"]["type"]="select";
$elem["tzsetup/country/ES"]["choices"][1]="Madrid";
$elem["tzsetup/country/ES"]["choices"][2]="Ceuta";
$elem["tzsetup/country/ES"]["choicesde"][1]="Madrid";
$elem["tzsetup/country/ES"]["choicesde"][2]="Ceuta";
$elem["tzsetup/country/ES"]["choicesfr"][1]="Madrid";
$elem["tzsetup/country/ES"]["choicesfr"][2]="Ceuta et Melilla";
$elem["tzsetup/country/ES"]["description"]="location

";
$elem["tzsetup/country/ES"]["descriptionde"]="";
$elem["tzsetup/country/ES"]["descriptionfr"]="";
$elem["tzsetup/country/ES"]["default"]="Europe/Madrid";
$elem["tzsetup/country/FM"]["type"]="select";
$elem["tzsetup/country/FM"]["choices"][1]="Yap";
$elem["tzsetup/country/FM"]["choices"][2]="Truk";
$elem["tzsetup/country/FM"]["choices"][3]="Pohnpei";
$elem["tzsetup/country/FM"]["choicesde"][1]="Yap";
$elem["tzsetup/country/FM"]["choicesde"][2]="Truk-Inseln";
$elem["tzsetup/country/FM"]["choicesde"][3]="Pohnpei";
$elem["tzsetup/country/FM"]["choicesfr"][1]="Yap";
$elem["tzsetup/country/FM"]["choicesfr"][2]="Truk";
$elem["tzsetup/country/FM"]["choicesfr"][3]="Pohnpei";
$elem["tzsetup/country/FM"]["description"]="location

";
$elem["tzsetup/country/FM"]["descriptionde"]="";
$elem["tzsetup/country/FM"]["descriptionfr"]="";
$elem["tzsetup/country/FM"]["default"]="Pacific/Ponape";
$elem["tzsetup/country/GL"]["type"]="select";
$elem["tzsetup/country/GL"]["choices"][1]="Godthab";
$elem["tzsetup/country/GL"]["choices"][2]="Danmarkshavn";
$elem["tzsetup/country/GL"]["choices"][3]="Scoresbysund";
$elem["tzsetup/country/GL"]["choicesde"][1]="Nuuk (Godthåb)";
$elem["tzsetup/country/GL"]["choicesde"][2]="Danmarkshavn";
$elem["tzsetup/country/GL"]["choicesde"][3]="Scoresbysund";
$elem["tzsetup/country/GL"]["choicesfr"][1]="Godthab";
$elem["tzsetup/country/GL"]["choicesfr"][2]="Danmarkshavn (côte Est - Nord de Scoresbysund)";
$elem["tzsetup/country/GL"]["choicesfr"][3]="Scoresbysund - Ittoqqortoormiit";
$elem["tzsetup/country/GL"]["description"]="location

";
$elem["tzsetup/country/GL"]["descriptionde"]="";
$elem["tzsetup/country/GL"]["descriptionfr"]="";
$elem["tzsetup/country/GL"]["default"]="America/Godthab";
$elem["tzsetup/country/ID"]["type"]="select";
$elem["tzsetup/country/ID"]["choices"][1]="Western (Sumatra\";
$elem["tzsetup/country/ID"]["choices"][2]="Jakarta\";
$elem["tzsetup/country/ID"]["choices"][3]="Java\";
$elem["tzsetup/country/ID"]["choices"][4]="West and Central Kalimantan)";
$elem["tzsetup/country/ID"]["choices"][5]="Central (Sulawesi\";
$elem["tzsetup/country/ID"]["choices"][6]="Bali\";
$elem["tzsetup/country/ID"]["choices"][7]="Nusa Tenggara\";
$elem["tzsetup/country/ID"]["choices"][8]="East and South Kalimantan)";
$elem["tzsetup/country/ID"]["choices"][9]="Eastern (Maluku\";
$elem["tzsetup/country/ID"]["choicesde"][1]="Westen (Sumatra\";
$elem["tzsetup/country/ID"]["choicesde"][2]="Jakarta\";
$elem["tzsetup/country/ID"]["choicesde"][3]="Java\";
$elem["tzsetup/country/ID"]["choicesde"][4]="West- und Zentralkalimantan)";
$elem["tzsetup/country/ID"]["choicesde"][5]="Zentral (Sulawesi\";
$elem["tzsetup/country/ID"]["choicesde"][6]="Bali\";
$elem["tzsetup/country/ID"]["choicesde"][7]="Nusa Tenggara\";
$elem["tzsetup/country/ID"]["choicesde"][8]="Ost- und Südkalimantan)";
$elem["tzsetup/country/ID"]["choicesde"][9]="Osten (Maluku\";
$elem["tzsetup/country/ID"]["choicesfr"][1]="Ouest (Sumatra\";
$elem["tzsetup/country/ID"]["choicesfr"][2]="Djakarta\";
$elem["tzsetup/country/ID"]["choicesfr"][3]="Java\";
$elem["tzsetup/country/ID"]["choicesfr"][4]="Kalimantan occidental et central)";
$elem["tzsetup/country/ID"]["choicesfr"][5]="Centre (Sulawesi\";
$elem["tzsetup/country/ID"]["choicesfr"][6]="Bali\";
$elem["tzsetup/country/ID"]["choicesfr"][7]="Nusa Tenggara\";
$elem["tzsetup/country/ID"]["choicesfr"][8]="Kalimantan oriental et méridional)";
$elem["tzsetup/country/ID"]["choicesfr"][9]="Est (Maluku\";
$elem["tzsetup/country/ID"]["description"]="city

";
$elem["tzsetup/country/ID"]["descriptionde"]="";
$elem["tzsetup/country/ID"]["descriptionfr"]="";
$elem["tzsetup/country/ID"]["default"]="Asia/Jakarta";
$elem["tzsetup/country/KI"]["type"]="select";
$elem["tzsetup/country/KI"]["choices"][1]="Tarawa (Gilbert Islands)";
$elem["tzsetup/country/KI"]["choices"][2]="Enderbury (Phoenix Islands)";
$elem["tzsetup/country/KI"]["choicesde"][1]="Tarawa (Gilbert-Inseln)";
$elem["tzsetup/country/KI"]["choicesde"][2]="Enderbury (Phönix-Inseln)";
$elem["tzsetup/country/KI"]["choicesfr"][1]="Tarawa (îles Gilbert)";
$elem["tzsetup/country/KI"]["choicesfr"][2]="Enderbury (îles Phoenix)";
$elem["tzsetup/country/KI"]["description"]="zone

";
$elem["tzsetup/country/KI"]["descriptionde"]="";
$elem["tzsetup/country/KI"]["descriptionfr"]="";
$elem["tzsetup/country/KI"]["default"]="Pacific/Tarawa";
$elem["tzsetup/country/KZ"]["type"]="select";
$elem["tzsetup/country/KZ"]["choices"][1]="Almaty";
$elem["tzsetup/country/KZ"]["choices"][2]="Qyzylorda";
$elem["tzsetup/country/KZ"]["choices"][3]="Aqtobe";
$elem["tzsetup/country/KZ"]["choices"][4]="Atyrau";
$elem["tzsetup/country/KZ"]["choicesde"][1]="Almaty";
$elem["tzsetup/country/KZ"]["choicesde"][2]="Ksyl-Orda";
$elem["tzsetup/country/KZ"]["choicesde"][3]="Aqtöbe";
$elem["tzsetup/country/KZ"]["choicesde"][4]="Atyrau";
$elem["tzsetup/country/KZ"]["choicesfr"][1]="Almaty";
$elem["tzsetup/country/KZ"]["choicesfr"][2]="Qyzylorda (Kyzylorda - Kzyl-Orda)";
$elem["tzsetup/country/KZ"]["choicesfr"][3]="Aqtobe";
$elem["tzsetup/country/KZ"]["choicesfr"][4]="Aqtau";
$elem["tzsetup/country/KZ"]["description"]="city

";
$elem["tzsetup/country/KZ"]["descriptionde"]="";
$elem["tzsetup/country/KZ"]["descriptionfr"]="";
$elem["tzsetup/country/KZ"]["default"]="Asia/Almaty";
$elem["tzsetup/country/MN"]["type"]="select";
$elem["tzsetup/country/MN"]["choices"][1]="Ulaanbaatar";
$elem["tzsetup/country/MN"]["choices"][2]="Hovd";
$elem["tzsetup/country/MN"]["choicesde"][1]="Ulan-Bator (Ulaanbaatar)";
$elem["tzsetup/country/MN"]["choicesde"][2]="Chowd";
$elem["tzsetup/country/MN"]["choicesfr"][1]="Oulan-Bator";
$elem["tzsetup/country/MN"]["choicesfr"][2]="Hovd";
$elem["tzsetup/country/MN"]["description"]="city

";
$elem["tzsetup/country/MN"]["descriptionde"]="";
$elem["tzsetup/country/MN"]["descriptionfr"]="";
$elem["tzsetup/country/MN"]["default"]="Asia/Ulaanbaatar";
$elem["tzsetup/country/MX"]["type"]="select";
$elem["tzsetup/country/MX"]["choices"][1]="North-West";
$elem["tzsetup/country/MX"]["choices"][2]="Pacific";
$elem["tzsetup/country/MX"]["choices"][3]="Sonora";
$elem["tzsetup/country/MX"]["choices"][4]="Central";
$elem["tzsetup/country/MX"]["description"]="zone

";
$elem["tzsetup/country/MX"]["descriptionde"]="";
$elem["tzsetup/country/MX"]["descriptionfr"]="";
$elem["tzsetup/country/MX"]["default"]="Mexico/General";
$elem["tzsetup/country/NZ"]["type"]="select";
$elem["tzsetup/country/NZ"]["choices"][1]="Auckland";
$elem["tzsetup/country/NZ"]["choicesde"][1]="Auckland";
$elem["tzsetup/country/NZ"]["choicesfr"][1]="Auckland";
$elem["tzsetup/country/NZ"]["description"]="location

";
$elem["tzsetup/country/NZ"]["descriptionde"]="";
$elem["tzsetup/country/NZ"]["descriptionfr"]="";
$elem["tzsetup/country/NZ"]["default"]="Pacific/Auckland";
$elem["tzsetup/country/PF"]["type"]="select";
$elem["tzsetup/country/PF"]["choices"][1]="Tahiti (Society Islands)";
$elem["tzsetup/country/PF"]["choices"][2]="Marquesas Islands";
$elem["tzsetup/country/PF"]["choicesde"][1]="Tahiti (Gesellschaftsinseln)";
$elem["tzsetup/country/PF"]["choicesde"][2]="Marquesas-Inseln";
$elem["tzsetup/country/PF"]["choicesfr"][1]="Tahiti (îles de la Société)";
$elem["tzsetup/country/PF"]["choicesfr"][2]="Îles Marquises";
$elem["tzsetup/country/PF"]["description"]="location

";
$elem["tzsetup/country/PF"]["descriptionde"]="";
$elem["tzsetup/country/PF"]["descriptionfr"]="";
$elem["tzsetup/country/PF"]["default"]="Pacific/Tahiti";
$elem["tzsetup/country/PT"]["type"]="select";
$elem["tzsetup/country/PT"]["choices"][1]="Lisbon";
$elem["tzsetup/country/PT"]["choices"][2]="Madeira Islands";
$elem["tzsetup/country/PT"]["choicesde"][1]="Lissabon";
$elem["tzsetup/country/PT"]["choicesde"][2]="Madeira-Archipel";
$elem["tzsetup/country/PT"]["choicesfr"][1]="Lisbonne";
$elem["tzsetup/country/PT"]["choicesfr"][2]="Madère";
$elem["tzsetup/country/PT"]["description"]="location

";
$elem["tzsetup/country/PT"]["descriptionde"]="";
$elem["tzsetup/country/PT"]["descriptionfr"]="";
$elem["tzsetup/country/PT"]["default"]="Europe/Lisbon";
$elem["tzsetup/country/RU"]["type"]="select";
$elem["tzsetup/country/RU"]["choices"][1]="Moscow-01 - Kaliningrad";
$elem["tzsetup/country/RU"]["choices"][2]="Moscow+00 - Moscow";
$elem["tzsetup/country/RU"]["choices"][3]="Moscow+01 - Samara";
$elem["tzsetup/country/RU"]["choices"][4]="Moscow+02 - Yekaterinburg";
$elem["tzsetup/country/RU"]["choices"][5]="Moscow+03 - Omsk";
$elem["tzsetup/country/RU"]["choices"][6]="Moscow+04 - Krasnoyarsk";
$elem["tzsetup/country/RU"]["choices"][7]="Moscow+05 - Irkutsk";
$elem["tzsetup/country/RU"]["choices"][8]="Moscow+06 - Yakutsk";
$elem["tzsetup/country/RU"]["choices"][9]="Moscow+07 - Vladivostok";
$elem["tzsetup/country/RU"]["description"]="zone

";
$elem["tzsetup/country/RU"]["descriptionde"]="";
$elem["tzsetup/country/RU"]["descriptionfr"]="";
$elem["tzsetup/country/RU"]["default"]="Europe/Moscow";
$elem["tzsetup/country/UM"]["type"]="select";
$elem["tzsetup/country/UM"]["choices"][1]="Johnston Atoll";
$elem["tzsetup/country/UM"]["choices"][2]="Midway Islands";
$elem["tzsetup/country/UM"]["choicesde"][1]="Johnston-Atoll";
$elem["tzsetup/country/UM"]["choicesde"][2]="Midwayinseln";
$elem["tzsetup/country/UM"]["choicesfr"][1]="Atoll Johnston";
$elem["tzsetup/country/UM"]["choicesfr"][2]="îles Midway";
$elem["tzsetup/country/UM"]["description"]="location

";
$elem["tzsetup/country/UM"]["descriptionde"]="";
$elem["tzsetup/country/UM"]["descriptionfr"]="";
$elem["tzsetup/country/UM"]["default"]="Pacific/Midway";
$elem["tzsetup/country/US"]["type"]="select";
$elem["tzsetup/country/US"]["choices"][1]="Eastern";
$elem["tzsetup/country/US"]["choices"][2]="Central";
$elem["tzsetup/country/US"]["choices"][3]="Mountain";
$elem["tzsetup/country/US"]["choices"][4]="Pacific";
$elem["tzsetup/country/US"]["choices"][5]="Alaska";
$elem["tzsetup/country/US"]["choices"][6]="Hawaii";
$elem["tzsetup/country/US"]["choices"][7]="Arizona";
$elem["tzsetup/country/US"]["choices"][8]="East Indiana";
$elem["tzsetup/country/US"]["choicesde"][1]="Osten (Eastern)";
$elem["tzsetup/country/US"]["choicesde"][2]="Zentral";
$elem["tzsetup/country/US"]["choicesde"][3]="Gebirge (Mountain)";
$elem["tzsetup/country/US"]["choicesde"][4]="Pazifik";
$elem["tzsetup/country/US"]["choicesde"][5]="Alaska";
$elem["tzsetup/country/US"]["choicesde"][6]="Hawaii";
$elem["tzsetup/country/US"]["choicesde"][7]="Arizona";
$elem["tzsetup/country/US"]["choicesde"][8]="Ost-Indiana";
$elem["tzsetup/country/US"]["choicesfr"][1]="Est (Eastern)";
$elem["tzsetup/country/US"]["choicesfr"][2]="Centre (Central)";
$elem["tzsetup/country/US"]["choicesfr"][3]="Rocheuses (Mountain)";
$elem["tzsetup/country/US"]["choicesfr"][4]="Pacifique";
$elem["tzsetup/country/US"]["choicesfr"][5]="Alaska";
$elem["tzsetup/country/US"]["choicesfr"][6]="Hawaii";
$elem["tzsetup/country/US"]["choicesfr"][7]="Arizona";
$elem["tzsetup/country/US"]["choicesfr"][8]="Indiana de l'Est";
$elem["tzsetup/country/US"]["description"]="zone

";
$elem["tzsetup/country/US"]["descriptionde"]="";
$elem["tzsetup/country/US"]["descriptionfr"]="";
$elem["tzsetup/country/US"]["default"]="US/Eastern";
$elem["tzsetup/country/PG"]["type"]="select";
$elem["tzsetup/country/PG"]["choices"][1]="Port Moresby";
$elem["tzsetup/country/PG"]["description"]="zone

";
$elem["tzsetup/country/PG"]["descriptionde"]="";
$elem["tzsetup/country/PG"]["descriptionfr"]="";
$elem["tzsetup/country/PG"]["default"]="";
$elem["passwd/root-password-crypted"]["type"]="password";
$elem["passwd/root-password-crypted"]["description"]="for internal use only

";
$elem["passwd/root-password-crypted"]["descriptionde"]="";
$elem["passwd/root-password-crypted"]["descriptionfr"]="";
$elem["passwd/root-password-crypted"]["default"]="";
$elem["passwd/user-password-crypted"]["type"]="password";
$elem["passwd/user-password-crypted"]["description"]="for internal use only

";
$elem["passwd/user-password-crypted"]["descriptionde"]="";
$elem["passwd/user-password-crypted"]["descriptionfr"]="";
$elem["passwd/user-password-crypted"]["default"]="";
$elem["passwd/user-uid"]["type"]="string";
$elem["passwd/user-uid"]["description"]="for internal use only

";
$elem["passwd/user-uid"]["descriptionde"]="";
$elem["passwd/user-uid"]["descriptionfr"]="";
$elem["passwd/user-uid"]["default"]="";
$elem["passwd/user-default-groups"]["type"]="string";
$elem["passwd/user-default-groups"]["description"]="for internal use only

";
$elem["passwd/user-default-groups"]["descriptionde"]="";
$elem["passwd/user-default-groups"]["descriptionfr"]="";
$elem["passwd/user-default-groups"]["default"]="adm cdrom dip lpadmin plugdev sambashare debian-tor libvirtd lxd";
$elem["passwd/root-login"]["type"]="boolean";
$elem["passwd/root-login"]["description"]="Allow login as root?
 If you choose not to allow root to log in, then a user account will be
 created and given the power to become root using the 'sudo' command.
";
$elem["passwd/root-login"]["descriptionde"]="root das Anmelden erlauben?
 Wenn Sie auswählen, dass root das Anmelden verwehrt werden soll, wird ein Benutzerkonto angelegt und mit dem Recht versehen, root mittels des »sudo«-Kommandos zu werden.
";
$elem["passwd/root-login"]["descriptionfr"]="Faut-il autoriser les connexions du superutilisateur ?
 Si vous choisissez de désactiver les connexions du superutilisateur (« root »), le premier compte qui sera créé pourra obtenir les privilèges du superutilisateur avec la commande « sudo ».
";
$elem["passwd/root-login"]["default"]="false";
$elem["passwd/root-password"]["type"]="password";
$elem["passwd/root-password"]["description"]="Root password:
 You need to set a password for 'root', the system administrative
 account. A malicious or unqualified user with root access can have
 disastrous results, so you should take care to choose a root password
 that is not easy to guess. It should not be a word found in dictionaries,
 or a word that could be easily associated with you.
 .
 A good password will contain a mixture of letters, numbers and punctuation
 and should be changed at regular intervals.
 .
 The root user should not have an empty password. If you leave this
 empty, the root account will be disabled and the system's initial user
 account will be given the power to become root using the \"sudo\"
 command.
 .
 Note that you will not be able to see the password as you type it.
";
$elem["passwd/root-password"]["descriptionde"]="Root-Passwort:
 Sie müssen ein Passwort für »root«, das Systemadministrator-Konto, angeben. Ein bösartiger Benutzer oder jemand, der sich nicht auskennt und Root-Rechte besitzt, kann verheerende Schäden anrichten. Deswegen sollten Sie darauf achten, ein Passwort zu wählen, das nicht einfach zu erraten ist. Es sollte nicht in einem Wörterbuch vorkommen oder leicht mit Ihnen in Verbindung gebracht werden können.
 .
 Ein gutes Passwort enthält eine Mischung aus Buchstaben, Zahlen und Sonderzeichen und wird in regelmäßigen Abständen geändert.
 .
 Das Passwort für den Superuser root sollte nicht leer sein. Wenn Sie es leer lassen, wird der root-Zugang deaktiviert und der als erstes eingerichtete Benutzer in diesem System erhält die nötigen Rechte, mittels »sudo«-Befehl zu root zu wechseln.
 .
 Hinweis: Sie werden das Passwort während der Eingabe nicht sehen.
";
$elem["passwd/root-password"]["descriptionfr"]="Mot de passe du superutilisateur (« root ») :
 Vous devez choisir un mot de passe pour le superutilisateur, le compte d'administration du système. Un utilisateur malintentionné ou peu expérimenté qui aurait accès à ce compte peut provoquer des désastres. En conséquence, ce mot de passe ne doit pas être facile à deviner, ni correspondre à un mot d'un dictionnaire ou vous être facilement associé.
 .
 Un bon mot de passe est composé de lettres, chiffres et signes de ponctuation. Il devra en outre être changé régulièrement.
 .
 Le superutilisateur (« root ») ne doit pas avoir de mot de passe vide. Si vous laissez ce champ vide, le compte du superutilisateur sera désactivé et le premier compte qui sera créé aura la possibilité d'obtenir les privilèges du superutilisateur avec la commande « sudo ».
 .
 Par sécurité, rien n'est affiché pendant la saisie.
";
$elem["passwd/root-password"]["default"]="";
$elem["passwd/root-password-again"]["type"]="password";
$elem["passwd/root-password-again"]["description"]="Re-enter password to verify:
 Please enter the same root password again to verify that you have typed it
 correctly.
";
$elem["passwd/root-password-again"]["descriptionde"]="Bitte geben Sie das Passwort zur Bestätigung nochmals ein:
 Bitte geben Sie dasselbe root-Passwort nochmals ein, um sicherzustellen, dass Sie sich nicht vertippt haben.
";
$elem["passwd/root-password-again"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe du superutilisateur afin de vérifier qu'il a été saisi correctement.
";
$elem["passwd/root-password-again"]["default"]="";
$elem["passwd/make-user"]["type"]="boolean";
$elem["passwd/make-user"]["description"]="Create a normal user account now?
 It's a bad idea to use the root account for normal day-to-day activities,
 such as the reading of electronic mail, because even a small mistake can
 result in disaster. You should create a normal user account to use for
 those day-to-day tasks.
 .
 Note that you may create it later (as well as any additional account) by
 typing 'adduser <username>' as root, where <username> is an username,
 like 'imurdock' or 'rms'.
";
$elem["passwd/make-user"]["descriptionde"]="Soll jetzt ein normales Benutzerkonto erstellt werden?
 Es ist keine gute Idee, das root-Konto für die alltägliche Arbeit einzusetzen, wie z.B. Lesen der E-Mails, denn selbst ein kleiner Fehler kann in einer Katastrophe enden. Sie sollten nun ein normales Benutzerkonto erstellen.
 .
 Beachten Sie, dass Sie das Benutzerkonto auch später durch Eingabe von »adduser <Benutzername>« als root (genauso wie weitere Benutzerkonten) erstellen können, wobei <Benutzername> ein Benutzername ist, wie z.B. »imurdock« oder »rms«.
";
$elem["passwd/make-user"]["descriptionfr"]="Faut-il créer un compte d'utilisateur ordinaire maintenant ?
 Il est préférable d'éviter de se servir du compte du superutilisateur (« root ») lors de l'utilisation normale du système, par exemple la lecture du courrier. En effet, même une petite erreur pourrait alors avoir des conséquences catastrophiques. Il est conseillé de créer un compte non privilégié pour ces activités ordinaires.
 .
 Veuillez noter que vous pourrez le créer plus tard (de même que tout autre compte supplémentaire) en utilisant la commande « adduser <utilisateur> » en tant que « root », où <utilisateur> représente le compte à créer, par exemple « imurdock » ou « rms ».
";
$elem["passwd/make-user"]["default"]="true";
$elem["passwd/user-fullname"]["type"]="string";
$elem["passwd/user-fullname"]["description"]="Full name for the new user:
 A user account will be created for you to use instead of the root
 account for non-administrative activities.
 .
 Please enter the real name of this user. This information will be used
 for instance as default origin for emails sent by this user as well as
 any program which displays or uses the user's real name. Your full
 name is a reasonable choice.
";
$elem["passwd/user-fullname"]["descriptionde"]="Vollständiger Name des neuen Benutzers:
 Für Sie wird ein Konto angelegt, das Sie statt dem root-Konto für die alltägliche Arbeit verwenden können.
 .
 Bitte geben Sie den vollständigen Namen des Benutzers an. Diese Information wird z.B. im Absender von E-Mails, die er verschickt, oder in Programmen, die den Namen des Benutzers anzeigen, verwendet. Ihr kompletter Name wäre sinnvoll.
";
$elem["passwd/user-fullname"]["descriptionfr"]="Nom complet du nouvel utilisateur :
 Un compte d'utilisateur va être créé afin que vous puissiez disposer d'un compte différent de celui du superutilisateur (« root »), pour l'utilisation courante du système.
 .
 Veuillez indiquer le nom complet du nouvel utilisateur. Cette information servira par exemple dans l'adresse origine des courriels émis ainsi que dans tout programme qui affiche ou se sert du nom complet. Votre propre nom est un bon choix.
";
$elem["passwd/user-fullname"]["default"]="";
$elem["passwd/username"]["type"]="string";
$elem["passwd/username"]["description"]="Username for your account:
 Select a username for the new account. Your first name is a reasonable choice.
 The username should start with a lower-case letter, which can be
 followed by any combination of numbers and more lower-case letters.
";
$elem["passwd/username"]["descriptionde"]="Benutzername für Ihr Konto:
 Wählen Sie einen Benutzernamen für das neue Benutzerkonto. Der Vorname ist meist eine gute Wahl. Der Benutzername sollte mit einem kleinen Buchstaben beginnen, gefolgt von weiteren kleinen Buchstaben oder auch Zahlen.
";
$elem["passwd/username"]["descriptionfr"]="Identifiant pour le compte utilisateur :
 Veuillez choisir un identifiant (« login ») pour le nouveau compte. Votre prénom est un choix possible. Les identifiants doivent commencer par une lettre minuscule, suivie d'un nombre quelconque de chiffres et de lettres minuscules.
";
$elem["passwd/username"]["default"]="";
$elem["passwd/username-bad"]["type"]="error";
$elem["passwd/username-bad"]["description"]="Invalid username
 The username you entered is invalid. Note that usernames must start with
 a lower-case letter, which can be followed by any combination of numbers
 and more lower-case letters, and must be no more than 32 characters long.
";
$elem["passwd/username-bad"]["descriptionde"]="Ungültiger Benutzername
 Der Benutzername, den Sie eingegeben haben, ist ungültig. Hinweis: Der Benutzername sollte mit einem kleinen Buchstaben beginnen, gefolgt von einer Kombination aus Zahlen oder weiteren klein geschriebenen Buchstaben und darf nicht mehr als 32 Zeichen lang sein.
";
$elem["passwd/username-bad"]["descriptionfr"]="Identifiant non valable
 L'identifiant que vous avez indiqué n'est pas valable. Les identifiants doivent commencer par une lettre minuscule, suivie d'un nombre quelconque de chiffres et de lettres minuscules. Sa longueur ne doit pas excéder 32 caractères.
";
$elem["passwd/username-bad"]["default"]="";
$elem["passwd/username-reserved"]["type"]="error";
$elem["passwd/username-reserved"]["description"]="Reserved username
 The username you entered (${USERNAME}) is reserved for use by the system.
 Please select a different one.
";
$elem["passwd/username-reserved"]["descriptionde"]="Reservierter Benutzername
 Der von Ihnen eingegebene Benutzername (${USERNAME}) ist für das System reserviert. Bitte wählen Sie einen anderen.
";
$elem["passwd/username-reserved"]["descriptionfr"]="Identifiant réservé
 L'identifiant que vous avez choisi (${USERNAME}) est réservé pour le système. Veuillez en choisir un autre.
";
$elem["passwd/username-reserved"]["default"]="";
$elem["passwd/user-password"]["type"]="password";
$elem["passwd/user-password"]["description"]="Choose a password for the new user:
 A good password will contain a mixture of letters, numbers and punctuation
 and should be changed at regular intervals.
";
$elem["passwd/user-password"]["descriptionde"]="Wählen Sie ein Passwort für den neuen Benutzer:
 Ein gutes Passwort enthält eine Mischung aus Buchstaben, Zahlen und Sonderzeichen und wird in regelmäßigen Abständen geändert.
";
$elem["passwd/user-password"]["descriptionfr"]="Mot de passe pour le nouvel utilisateur :
 Un bon mot de passe est composé de lettres, chiffres et signes de ponctuation. Il devra en outre être changé régulièrement.
";
$elem["passwd/user-password"]["default"]="";
$elem["passwd/user-password-again"]["type"]="password";
$elem["passwd/user-password-again"]["description"]="Re-enter password to verify:
 Please enter the same user password again to verify you have typed it
 correctly.
";
$elem["passwd/user-password-again"]["descriptionde"]="Bitte geben Sie das Passwort zur Bestätigung nochmals ein:
 Bitte geben Sie das gleiche Benutzerpasswort nochmals ein, um sicherzustellen, dass Sie sich nicht vertippt haben.
";
$elem["passwd/user-password-again"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe pour l'utilisateur, afin de vérifier que votre saisie est correcte.
";
$elem["passwd/user-password-again"]["default"]="";
$elem["user-setup/password-mismatch"]["type"]="error";
$elem["user-setup/password-mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["user-setup/password-mismatch"]["descriptionde"]="Passworteingabefehler
 Die beiden Passwörter, die Sie eingegeben haben, sind nicht identisch. Bitte versuchen Sie es noch einmal.
";
$elem["user-setup/password-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["user-setup/password-mismatch"]["default"]="";
$elem["user-setup/password-empty"]["type"]="error";
$elem["user-setup/password-empty"]["description"]="Empty password
 You entered an empty password, which is not allowed.
 Please choose a non-empty password.
";
$elem["user-setup/password-empty"]["descriptionde"]="Leeres Passwort
 Sie haben ein leeres Passwort bzw. kein Passwort eingegeben, was nicht erlaubt ist. Bitte geben Sie ein Passwort ein.
";
$elem["user-setup/password-empty"]["descriptionfr"]="Mot de passe vide
 Vous avez choisi un mot de passe vide, ce qui n'est pas autorisé. Veuillez choisir un mot de passe non vide.
";
$elem["user-setup/password-empty"]["default"]="";
$elem["passwd/shadow"]["type"]="boolean";
$elem["passwd/shadow"]["description"]="Enable shadow passwords?
 Shadow passwords make your system more secure because nobody is able to
 view even encrypted passwords. The passwords are stored in a separate file
 that can only be read by special programs. The use of shadow passwords
 is strongly recommended, except in a few cases such as NIS environments.
";
$elem["passwd/shadow"]["descriptionde"]="Shadow-Passwörter benutzen?
 Shadow-Passwörter machen Ihr System sicherer, weil niemand die Passwörter auslesen kann, nicht einmal die verschlüsselten. Passwörter werden in einer separaten Datei gespeichert, welche nur von speziellen Programmen gelesen werden kann. Shadow-Passwörter werden ausdrücklich empfohlen, außer in wenigen Fällen, wie z.B. in NIS-Umgebungen.
";
$elem["passwd/shadow"]["descriptionfr"]="Faut-il activer les mots de passe cachés (« shadow passwords ») ?
 Les mots de passe cachés rendent le système plus sûr car personne n'aura accès aux mots de passe chiffrés. Les mots de passe seront conservés dans un fichier à part et ne pourront être lus que par des programmes spéciaux. L'utilisation des mots de passe cachés est fortement recommandée sauf dans de rares cas comme lors de l'utilisation de NIS.
";
$elem["passwd/shadow"]["default"]="true";
$elem["debian-installer/user-setup-udeb/title"]["type"]="title";
$elem["debian-installer/user-setup-udeb/title"]["description"]="Set up users and passwords
";
$elem["debian-installer/user-setup-udeb/title"]["descriptionde"]="Benutzer und Passwörter einrichten
";
$elem["debian-installer/user-setup-udeb/title"]["descriptionfr"]="Créer les utilisateurs et choisir les mots de passe
";
$elem["debian-installer/user-setup-udeb/title"]["default"]="";
$elem["finish-install/progress/user-setup"]["type"]="text";
$elem["finish-install/progress/user-setup"]["description"]="Setting users and passwords...
";
$elem["finish-install/progress/user-setup"]["descriptionde"]="Einrichten von Benutzern und Passwörtern ...
";
$elem["finish-install/progress/user-setup"]["descriptionfr"]="Création des utilisateurs et mise en place des mots de passe...
";
$elem["finish-install/progress/user-setup"]["default"]="";
$elem["user-setup/password-weak"]["type"]="boolean";
$elem["user-setup/password-weak"]["description"]="Use weak password?
 You entered a password that consists of less than eight characters, which
 is considered too weak. You should choose a stronger password.
";
$elem["user-setup/password-weak"]["descriptionde"]="Schwaches Passwort verwenden?
 Sie haben ein Passwort eingegeben, das weniger als 8 Zeichen beinhaltet und somit zu schwach ist. Sie sollten ein stärkeres Passwort wählen.
";
$elem["user-setup/password-weak"]["descriptionfr"]="Utiliser ce mot de passe faible ?
 Vous avez saisi un mot de passe de moins de huit caractères qui est considéré comme trop faible. Vous devriez choisir un mot de passe plus complexe.
";
$elem["user-setup/password-weak"]["default"]="";
$elem["user-setup/encrypt-home"]["type"]="boolean";
$elem["user-setup/encrypt-home"]["description"]="Encrypt your home directory?
 You may configure your home directory for encryption, such that any files
 stored there remain private even if your computer is stolen.
 .
 The system will seamlessly mount your encrypted home directory each time
 you login and automatically unmount when you log out of all active sessions.
";
$elem["user-setup/encrypt-home"]["descriptionde"]="Ihren persönlichen Ordner verschlüsseln?
 Sie können Ihren persönlichen Ordner verschlüsseln, sodass alle darin gespeicherten Dateien privat bleiben, selbst wenn Ihr Rechner gestohlen wird.
 .
 Das System wird Ihren verschlüsselten Ordner bei jedem Anmelden nahtlos einbinden und diesen automatisch aushängen, sobald Sie sich aus allen aktiven Sitzungen abmelden.
";
$elem["user-setup/encrypt-home"]["descriptionfr"]="Chiffrer votre dossier personnel ?
 Vous pouvez chiffrer votre dossier personnel, ainsi tous les fichiers qu'il contient restent inaccessibles même en cas de vol de votre ordinateur.
 .
 Le système montera de manière transparente votre dossier personnel chiffré à chaque connexion et le démontera automatiquement lorsque vous fermerez votre session.
";
$elem["user-setup/encrypt-home"]["default"]="false";
$elem["user-setup/encrypt-home-failed"]["type"]="error";
$elem["user-setup/encrypt-home-failed"]["description"]="Home directory encryption failed
 The installer failed to set up home directory encryption. Your home
 directory will be unencrypted after installation. This is probably a bug,
 and you may wish to investigate and reinstall.
 .
 Check /var/log/syslog or see virtual console 4 for the details.
";
$elem["user-setup/encrypt-home-failed"]["descriptionde"]="Verschlüsselung des persönlichen Ordners gescheitert
 Die Verschlüsselung des persönlichen Ordners ist gescheitert. Ihr persönlicher Ordner wird nach der Installation nicht verschlüsselt sein. Dies ist sehr wahrscheinlich ein Programmierfehler.
 .
 Prüfen Sie /var/log/syslog oder die virtuelle Konsole 4 für genauere Informationen.
";
$elem["user-setup/encrypt-home-failed"]["descriptionfr"]="Le chiffrement du dossier personnel a échoué
 L'installateur n'a pas pu activer le chiffrement du dossier personnel. Votre dossier personnel ne sera pas chiffré après l'installation. C'est probablement un bogue, il vous faudra peut-être vérifier et réinstaller.
 .
 Veuillez consulter le fichier /var/log/syslog ou la quatrième console virtuelle pour obtenir des précisions.
";
$elem["user-setup/encrypt-home-failed"]["default"]="";
$elem["passwd/auto-login"]["type"]="boolean";
$elem["passwd/auto-login"]["description"]="for internal use only

";
$elem["passwd/auto-login"]["descriptionde"]="";
$elem["passwd/auto-login"]["descriptionfr"]="";
$elem["passwd/auto-login"]["default"]="false";
$elem["passwd/auto-login-backup"]["type"]="string";
$elem["passwd/auto-login-backup"]["description"]="for internal use only

";
$elem["passwd/auto-login-backup"]["descriptionde"]="";
$elem["passwd/auto-login-backup"]["descriptionfr"]="";
$elem["passwd/auto-login-backup"]["default"]="";
$elem["user-setup/allow-password-empty"]["type"]="boolean";
$elem["user-setup/allow-password-empty"]["description"]="for internal use only

";
$elem["user-setup/allow-password-empty"]["descriptionde"]="";
$elem["user-setup/allow-password-empty"]["descriptionfr"]="";
$elem["user-setup/allow-password-empty"]["default"]="false";
$elem["user-setup/allow-password-weak"]["type"]="boolean";
$elem["user-setup/allow-password-weak"]["description"]="for internal use only

";
$elem["user-setup/allow-password-weak"]["descriptionde"]="";
$elem["user-setup/allow-password-weak"]["descriptionfr"]="";
$elem["user-setup/allow-password-weak"]["default"]="false";
$elem["user-setup/progress/wipe-swap"]["type"]="text";
$elem["user-setup/progress/wipe-swap"]["description"]="Wiping swap space for security (this may take a while)...

";
$elem["user-setup/progress/wipe-swap"]["descriptionde"]="";
$elem["user-setup/progress/wipe-swap"]["descriptionfr"]="";
$elem["user-setup/progress/wipe-swap"]["default"]="";
$elem["user-setup/force-encrypt-home"]["type"]="boolean";
$elem["user-setup/force-encrypt-home"]["description"]="for internal use only

";
$elem["user-setup/force-encrypt-home"]["descriptionde"]="";
$elem["user-setup/force-encrypt-home"]["descriptionfr"]="";
$elem["user-setup/force-encrypt-home"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
