<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("base-passwd");

$elem["base-passwd/user-move"]["type"]="boolean";
$elem["base-passwd/user-move"]["description"]="Do you want to move the user ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Move user \"${name}\" (${id}) to before the NIS compat \"+\" entry
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/user-move"]["descriptionde"]="Möchten Sie den Benutzer ${name} verschieben?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 Benutzer »${name}« (${id}) vor den NIS-Compat-Eintrag »+« verschieben
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/user-move"]["descriptionfr"]="Faut-il déplacer l'utilisateur ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Déplacement de l'utilisateur « ${name} » (${id}) avant l'entrée NIS « + » du mode compat
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/user-move"]["default"]="true";
$elem["base-passwd/group-move"]["type"]="boolean";
$elem["base-passwd/group-move"]["description"]="Do you want to move the group ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Move group \"${name}\" (${id}) to before the NIS compat \"+\" entry
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/group-move"]["descriptionde"]="Möchten Sie die Gruppe ${name} verschieben?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 Benutzer »${name}« (${id}) vor den NIS-Compat-Eintrag »+« verschieben
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/group-move"]["descriptionfr"]="Faut-il déplacer le groupe ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Déplacement du groupe « ${name} » (${id}) avant l'entrée NIS « + » du mode compat
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/group-move"]["default"]="true";
$elem["base-passwd/user-add"]["type"]="boolean";
$elem["base-passwd/user-add"]["description"]="Do you want to add the user ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Add user \"${name}\" (${id})
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/user-add"]["descriptionde"]="Möchten Sie den Benutzer ${name} hinzufügen?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 Benutzer »${name}« hinzufügen
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/user-add"]["descriptionfr"]="Faut-il ajouter l'utilisateur ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Ajout de l'utilisateur « ${name} » (${id})
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/user-add"]["default"]="true";
$elem["base-passwd/group-add"]["type"]="boolean";
$elem["base-passwd/group-add"]["description"]="Do you want to add the group ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Add group \"${name}\" (${id})
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/group-add"]["descriptionde"]="Möchten Sie die Gruppe ${name} hinzufügen?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 Gruppe »${name}« hinzufügen
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/group-add"]["descriptionfr"]="Faut-il ajouter le groupe ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Ajout du groupe « ${name} » (${id})
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/group-add"]["default"]="true";
$elem["base-passwd/user-remove"]["type"]="boolean";
$elem["base-passwd/user-remove"]["description"]="Do you want to remove the user ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Remove user \"${name}\" (${id})
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/user-remove"]["descriptionde"]="Möchten Sie den Benutzer ${name} entfernen?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 Benutzer »${name}« entfernen
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/user-remove"]["descriptionfr"]="Faut-il supprimer l'utilisateur ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Suppression de l'utilisateur « ${name} » (${id})
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/user-remove"]["default"]="true";
$elem["base-passwd/group-remove"]["type"]="boolean";
$elem["base-passwd/group-remove"]["description"]="Do you want to remove the group ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Remove group \"${name}\" (${id})
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/group-remove"]["descriptionde"]="Möchten Sie die Gruppe ${name} entfernen?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 Gruppe »${name}« entfernen
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/group-remove"]["descriptionfr"]="Faut-il supprimer le groupe ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Suppression du groupe « ${name} » (${id})
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/group-remove"]["default"]="true";
$elem["base-passwd/user-change-uid"]["type"]="boolean";
$elem["base-passwd/user-change-uid"]["description"]="Do you want to change the UID of user ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Change the UID of user \"${name}\" from ${old_uid} to ${new_uid}
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/user-change-uid"]["descriptionde"]="Möchten Sie die UID des Benutzers ${name} ändern?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 UID des Benutzers »${name}« von ${old_uid} in ${new_uid} ändern
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/user-change-uid"]["descriptionfr"]="Faut-il modifier l'UID de l'utilisateur ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Modification de l'UID (identifiant numérique) de l'utilisateur « ${name} » de ${old_uid} à ${new_uid}
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/user-change-uid"]["default"]="true";
$elem["base-passwd/user-change-gid"]["type"]="boolean";
$elem["base-passwd/user-change-gid"]["description"]="Do you want to change the GID of user ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Change the GID of user \"${name}\" from ${old_gid} (${old_group}) to
 ${new_gid} (${new_group})
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/user-change-gid"]["descriptionde"]="Möchten Sie die GID des Benutzers ${name} ändern?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 GID des Benutzers »${name}« von ${old_gid} (${old_group}) in ${new_gid} (${new_group}) ändern
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/user-change-gid"]["descriptionfr"]="Faut-il modifier le GID de l'utilisateur ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Modification de l'identifiant numérique de groupe (GID) de l'utilisateur « ${name} » de ${old_gid} (${old_group}) à ${new_gid} (${new_group})
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/user-change-gid"]["default"]="true";
$elem["base-passwd/user-change-gecos"]["type"]="boolean";
$elem["base-passwd/user-change-gecos"]["description"]="Do you want to change the GECOS of user ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Change the GECOS of user \"${name}\" from \"${old_gecos}\" to \"${new_gecos}\"
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/user-change-gecos"]["descriptionde"]="Wollen Sie das GECOS des Benutzers ${name} ändern?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 GECOS des Benutzers »${name}« von »${old_gecos}« in »${new_gecos}« ändern
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/user-change-gecos"]["descriptionfr"]="Faut-il modifier le champ GECOS de l'utilisateur ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Modification du champ descriptif (GECOS) de l'utilisateur « ${name} » de « ${old_gecos} » à « ${new_gecos} »
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/user-change-gecos"]["default"]="true";
$elem["base-passwd/user-change-home"]["type"]="boolean";
$elem["base-passwd/user-change-home"]["description"]="Do you want to change the home directory of user ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Change the home directory of user \"${name}\" from ${old_home} to
 ${new_home}
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/user-change-home"]["descriptionde"]="Möchten Sie das Home-Verzeichnis des Benutzers ${name} ändern?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 Home-Verzeichnis des Benutzers »${name}« von ${old_home} in ${new_home} ändern
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/user-change-home"]["descriptionfr"]="Faut-il modifier le répertoire personnel de l'utilisateur ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Modification du répertoire personnel de l'utilisateur « ${name} » de ${old_home} à ${new_home}
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/user-change-home"]["default"]="true";
$elem["base-passwd/user-change-shell"]["type"]="boolean";
$elem["base-passwd/user-change-shell"]["description"]="Do you want to change the shell of user ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Change the shell of user \"${name}\" from ${old_shell} to ${new_shell}
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/user-change-shell"]["descriptionde"]="Wollen Sie die Shell des Benutzers ${name} ändern?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 Shell des Benutzers »${name}« von ${old_shell} in ${new_shell} ändern
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/user-change-shell"]["descriptionfr"]="Faut-il modifier le shell de l'utilisateur ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Modification du shell de l'utilisateur « ${name} » de ${old_shell} à ${new_shell}
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/user-change-shell"]["default"]="true";
$elem["base-passwd/group-change-gid"]["type"]="boolean";
$elem["base-passwd/group-change-gid"]["description"]="Do you want to change the GID of group ${name}?
 update-passwd has found a difference between your system accounts and the
 current Debian defaults.  It is advisable to allow update-passwd to
 change your system; without those changes some packages might not work
 correctly.  For more documentation on the Debian account policies, please
 see /usr/share/doc/base-passwd/README.
 .
 The proposed change is:
 .
 Change the GID of group \"${name}\" from ${old_gid} to ${new_gid}
 .
 If you allow this change, a backup of modified files will be made with
 the extension .org, which you can use if necessary to restore the
 current settings.  If you do not make this change now, you can make it
 later with the update-passwd utility.
";
$elem["base-passwd/group-change-gid"]["descriptionde"]="Möchten Sie die GID der Gruppe ${name} ändern?
 Update-passwd hat einen Unterschied zwischen Ihren Systemkonten und den aktuellen Debian-Vorgaben gefunden. Es ist ratsam, Update-passwd das Ändern Ihres Systems zu gestatten. Ohne diese Änderungen funktionieren einige Pakete möglicherweise nicht korrekt. Die Richtlinien für Debian-Konten sind unter /usr/share/doc/base-passwd/README dokumentiert.
 .
 Die geplante Änderung ist:
 .
 GID der Gruppe »${name}« von ${old_gid} in ${new_gid} ändern
 .
 Falls Sie diese Änderung gestatten, wird eine Sicherheitskopie der geänderten Dateien mit der Erweiterung .org erstellt, die Sie falls nötig zum Wiederherstellen der aktuellen Einstellungen benutzen können. Wenn Sie diese Änderung nun nicht vornehmen, können Sie dies später mit dem Hilfswerkzeug Update-passwd erledigen.
";
$elem["base-passwd/group-change-gid"]["descriptionfr"]="Faut-il modifier le GID du groupe ${name} ?
 L'utilitaire « update-passwd » a détecté une différence entre les comptes système et les comptes Debian définis par défaut. Il est recommandé de permettre à « update-passwd » de modifier le système ; sans ces changements, certains paquets risquent de ne pas fonctionner correctement. Davantage d'informations concernant la politique des comptes Debian se trouvent dans le fichier « /usr/share/doc/base-passwd/README ».
 .
 La modification proposée est :
 .
 Modification de l'identifiant numérique de groupe (GID) du groupe « ${name} » de ${old_gid} à ${new_gid}
 .
 En acceptant cette modification, une sauvegarde des fichiers modifiés sera créée avec l'extension .org, qui pourra être utilisée plus tard pour restaurer les réglages actuels. Si la modification n'est pas effectuée maintenant, elle pourra l'être ultérieurement en utilisant « update-passwd ».
";
$elem["base-passwd/group-change-gid"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
