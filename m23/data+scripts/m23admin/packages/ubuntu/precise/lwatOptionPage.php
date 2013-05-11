<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lwat");

$elem["lwat/domain"]["type"]="string";
$elem["lwat/domain"]["description"]="Server domain name:
 Please enter the domain this server belongs to.
";
$elem["lwat/domain"]["descriptionde"]="Domain-Name des Servers:
 Bitte geben Sie die Domain an, zu der dieser Server gehört.
";
$elem["lwat/domain"]["descriptionfr"]="Nom de domaine du serveur :
 Veuillez indiquer le nom du domaine auquel appartient le serveur.
";
$elem["lwat/domain"]["default"]="example.net";
$elem["shared/ldapns/ldap-server"]["type"]="string";
$elem["shared/ldapns/ldap-server"]["description"]="LDAP server host:
 Please enter the LDAP host which lwat will connect to.
";
$elem["shared/ldapns/ldap-server"]["descriptionde"]="LDAP-Server-Rechner:
 Bitte geben Sie den LDAP-Rechner an, mit dem sich Lwat verbinden wird.
";
$elem["shared/ldapns/ldap-server"]["descriptionfr"]="Nom d'hôte du serveur LDAP :
 Veuillez indiquer le nom d'hôte du serveur LDAP qui sera utilisé par lwat.
";
$elem["shared/ldapns/ldap-server"]["default"]="ldap";
$elem["shared/ldapns/base-dn"]["type"]="string";
$elem["shared/ldapns/base-dn"]["description"]="LDAP base DN:
 Please enter the \"Distinguished Name\" (DN) of the LDAP server where
 all groups, people, machines, etc. are listed.
";
$elem["shared/ldapns/base-dn"]["descriptionde"]="LDAP Basis-DN:
 Bitte geben Sie den »Distinguished Name« (DN) des LDAP-Servers ein, in der alle Gruppen, Personen, Maschinen usw. aufgeführt sind.
";
$elem["shared/ldapns/base-dn"]["descriptionfr"]="DN de base de LDAP :
 Veuillez entrer le nom distinctif (DN : « Distinguished Name ») de base de LDAP où sont stockées toutes les informations sur les groupes, utilisateurs, machines, etc.
";
$elem["shared/ldapns/base-dn"]["default"]="dc=example,dc=org";
$elem["lwat/uselisgroup"]["type"]="boolean";
$elem["lwat/uselisgroup"]["description"]="Should lwat use lisGroup?
 Debian Edu/Skolelinux uses a private schema called lisGroup to
 differentiate between various group types. You should choose this
 option if you are testing lwat on an old Skolelinux server, and still
 want to be able to use the webmin module wlus.
 .
 If you do not choose this option, the AuthGroup setting will be used
 to create a groupOfMembers.
";
$elem["lwat/uselisgroup"]["descriptionde"]="Soll Lwat lisGroup verwenden?
 Debian Edu/Skolelinux verwendet ein privates Schema namens »lisGroup«, um zwischen verschiedenen Gruppentypen zu unterscheiden. Sie sollten diese Option wählen, falls Sie Lwat auf einem alten Skolelinux-Server testen und dennoch das Webmin-Modul Wlus verwenden können möchten.
 .
 Falls Sie diese Option nicht wählen, wird die AuthGroup-Einstellung verwendet, um eine groupOfMembers zu erstellen.
";
$elem["lwat/uselisgroup"]["descriptionfr"]="Faut-il utiliser le schéma « lisGroup » ?
 Debian Edu/Skolelinux utilise un schéma privé appelé « lisGroup » afin de différencier les types de groupes. Vous devriez choisir cette option si vous êtes en train de tester lwat sur un ancien serveur Skolelinux et que vous désirez continuer à utiliser le module webmin wlus.
 .
 Si vous ne choisissez pas cette option, le paramétre « AuthGroup » sera utilisé pour créer un « groupOfMembers ».
";
$elem["lwat/uselisgroup"]["default"]="true";
$elem["lwat/homedirlocation"]["type"]="string";
$elem["lwat/homedirlocation"]["description"]="Location of users' home directories:
 Please enter the path where the personal (home) directories of all
 users are stored.
";
$elem["lwat/homedirlocation"]["descriptionde"]="Ort der Home-Verzeichnisse der Benutzer:
 Bitte geben Sie den Pfad ein, unter dem die persönlichen (Home) Verzeichnissen aller Benutzer gespeichert sind.
";
$elem["lwat/homedirlocation"]["descriptionfr"]="Emplacement du répertoire personnel des utilisateurs :
 Veuillez indiquer le chemin pour les répertoires personnels (« home ») des utilisateurs.
";
$elem["lwat/homedirlocation"]["default"]="/home";
$elem["lwat/groupprefix"]["type"]="string";
$elem["lwat/groupprefix"]["description"]="Prefix for groups on the LDAP server:
 Please enter the prefix under which the groups information is
 stored.
 .
 Do not include the DN prefix in this setting. It will be automatically
 added in the generated configuration file.
";
$elem["lwat/groupprefix"]["descriptionde"]="Präfix für Gruppen auf dem LDAP-Server:
 Bitte geben Sie den Präfix ein, unter dem die Gruppeninformation gespeichert ist.
 .
 Der DN-Präfix darf in dieser Einstellung nicht enthalten sein, da er in der generierten Konfigurationsdatei automatisch hinzugefügt wird.
";
$elem["lwat/groupprefix"]["descriptionfr"]="Préfixe des groupes sur le serveur LDAP :
 Veuillez indiquer le préfixe utilisé pour enregistrer les informations des groupes.
 .
 Vous ne devez pas inclure le préfixe du DN dans ce paramètre. Il sera automatiquement ajouté dans le fichier de configuration créé.
";
$elem["lwat/groupprefix"]["default"]="ou=Group";
$elem["lwat/authprefix"]["type"]="string";
$elem["lwat/authprefix"]["description"]="Prefix for authorization groups on the LDAP server:
 Please enter the prefix under which the authorization groups
 information is stored.
 .
 Do not include the DN prefix in this setting. It will be automatically
 added in the generated configuration file.
";
$elem["lwat/authprefix"]["descriptionde"]="Präfix auf dem LDAP-Server für Authorisierungsgruppen:
 Bitte geben Sie den Präfix ein, unter dem die Authorisierungsgruppeninformation gespeichert ist.
 .
 Der DN-Präfix darf in dieser Einstellung nicht enthalten sein, da er in der generierten Konfigurationsdatei automatisch hinzugefügt wird.
";
$elem["lwat/authprefix"]["descriptionfr"]="Préfixe des autorisations des groupes sur le serveur LDAP :
 Veuillez indiquer le préfixe sous lequel seront enregistrées les informations d'autorisation des groupes.
 .
 Vous ne devez pas inclure le préfixe du DN dans ce paramètre. Il sera automatiquement ajouté dans le fichier de configuration créé.
";
$elem["lwat/authprefix"]["default"]="ou=AuthGroup";
$elem["lwat/hostprefix"]["type"]="string";
$elem["lwat/hostprefix"]["description"]="Prefix for hosts on the LDAP server:
 Please enter the prefix under which the hosts information is
 stored.
 .
 Do not include the DN prefix in this setting. It will be automatically
 added in the generated configuration file.
";
$elem["lwat/hostprefix"]["descriptionde"]="Präfix für Rechner auf dem LDAP-Server:
 Bitte geben Sie den Präfix ein, unter der die Rechner (Host)-Information gespeichert ist.
 .
 Der DN-Präfix darf in dieser Einstellung nicht enthalten sein, da er in der generierten Konfigurationsdatei automatisch hinzugefügt wird.
";
$elem["lwat/hostprefix"]["descriptionfr"]="Préfixe des hôtes sur le serveur LDAP :
 Veuillez entrer le préfixe sous lequel seront enregistrées les informations des hôtes.
 .
 Vous ne devez pas inclure le préfixe du DN dans ce paramètre. Il sera automatiquement ajouté dans le fichier de configuration créé.
";
$elem["lwat/hostprefix"]["default"]="ou=Hosts";
$elem["lwat/netgroupprefix"]["type"]="string";
$elem["lwat/netgroupprefix"]["description"]="Prefix for netgroups on the LDAP server:
 Please enter the prefix under which the netgroups information is
 stored. 
 .
 Do not include the DN prefix in this setting. It will be automatically
 added in the generated configuration file.
";
$elem["lwat/netgroupprefix"]["descriptionde"]="Präfix für Netgroups auf dem LDAP-Server:
 Bitte geben Sie den Präfix ein, unter der die Netgroups-Information gespeichert ist.
 .
 Der DN-Präfix darf in dieser Einstellung nicht enthalten sein, da er in der generierten Konfigurationsdatei automatisch hinzugefügt wird.
";
$elem["lwat/netgroupprefix"]["descriptionfr"]="Préfixe des groupes réseau (« netgroups ») du serveur LDAP :
 Veuillez indiquer le préfixe sous lequel seront enregistrées les informations des groupes réseau.
 .
 Vous ne devez pas inclure le préfixe du DN dans ce paramètre. Il sera automatiquement ajouté dans le fichier de configuration créé.
";
$elem["lwat/netgroupprefix"]["default"]="ou=Netgroup";
$elem["lwat/minPwLength"]["type"]="string";
$elem["lwat/minPwLength"]["description"]="Minimum length of the password for users:
 Please choose the minimum length for users' passwords.
 .
 By default, lwat will autogenerate 8 characters long passwords.
";
$elem["lwat/minPwLength"]["descriptionde"]="Minimallänge der Passwörter der Benutzer:
 Bitte wählen Sie die Minimallänge der Benutzerpasswörter aus.
 .
 Standardmäßig wird Lwat automatisch Passwörter mit 8 Zeichen erstellen.
";
$elem["lwat/minPwLength"]["descriptionfr"]="Longueur minimum du mot de passe des utilisateurs :
 Veuillez indiquer la longueur minimum des mots de passe des utilisateurs.
 .
 Par défaut, lwat créera automatiquement des mots de passe comportant 8 caractères.
";
$elem["lwat/minPwLength"]["default"]="5";
$elem["lwat/minPwNumber"]["type"]="string";
$elem["lwat/minPwNumber"]["description"]="Minimum number of digits (characters 0-9) in passwords:
 Please enter the minimum number of characters in the 0-9 range that
 will be mandatory in users' passwords.
";
$elem["lwat/minPwNumber"]["descriptionde"]="Minimalanzahl an Ziffern (Zeichen 0-9) in Passwörtern:
 Bitte geben Sie die Minimalanzahl an Zeichen im Bereich 0-9 an, die zwingend in den Passwörtern der Benutzer vorkommen müssen.
";
$elem["lwat/minPwNumber"]["descriptionfr"]="Nombre minimum de chiffres dans les mots de passes :
 Veuillez entrer le nombre minimum de chiffres qui seront obligatoires dans les mots de passe des utilisateurs.
";
$elem["lwat/minPwNumber"]["default"]="1";
$elem["lwat/minPwUpper"]["type"]="string";
$elem["lwat/minPwUpper"]["description"]="Minimum number of uppercase letters in passwords:
 Please enter the minimum number of uppercase letters that will be
 mandatory in users' passwords.
";
$elem["lwat/minPwUpper"]["descriptionde"]="Minimalanzahl an Großbuchstaben in Passwörtern:
 Bitte geben Sie die Minimalanzahl an Großbuchstaben an, die zwingend in den Passwörtern der Benutzer vorkommen müssen.
";
$elem["lwat/minPwUpper"]["descriptionfr"]="Nombre minimum de lettres majuscules dans les mots de passe :
 Veuillez entrer le nombre minimum de lettres majuscules qui seront obligatoires dans les mots de passe des utilisateurs.
";
$elem["lwat/minPwUpper"]["default"]="1";
$elem["lwat/minPwLower"]["type"]="string";
$elem["lwat/minPwLower"]["description"]="Minimum number of lowercase letters in passwords:
 Please enter the minimum number of lowercase letters that will be
 mandatory in users' passwords.
";
$elem["lwat/minPwLower"]["descriptionde"]="Minimalanzahl an Kleinbuchstaben in Passwörtern:
 Bitte geben Sie die Minimalanzahl an Kleinbuchstaben an, die zwingend in den Passwörtern der Benutzer vorkommen müssen
";
$elem["lwat/minPwLower"]["descriptionfr"]="Nombre minimum de lettres minuscules dans les mots de passe :
 Veuillez entrer le nombre minimum de lettres minuscules qui seront obligatoires dans les mots de passe des utilisateurs.
";
$elem["lwat/minPwLower"]["default"]="1";
$elem["lwat/allowPwSet"]["type"]="boolean";
$elem["lwat/allowPwSet"]["description"]="Authorize administrators to choose users' passwords?
 When setting a new password, lwat normally generates a reasonably safe
 password. Choosing this option will allow administrators to choose
 the password themselves.
";
$elem["lwat/allowPwSet"]["descriptionde"]="Administratoren autorisieren, die Passwörter der Benutzer auszuwählen?
 Wenn ein neues Passwort gesetzt wird, erstellt Lwat normalerweise ein hinreichend sicheres Passwort. Wird diese Option ausgewählt, können Administratoren das Passwort selbst wählen.
";
$elem["lwat/allowPwSet"]["descriptionfr"]="Autoriser les administrateurs à choisir le mot de passe des utilisateurs ?
 Lors de la mise en place d'un mot de passe, lwat crée un mot de passe raisonnablement sûr. Choisir cette option permettra aux administrateurs de choisir le mot de passe eux-mêmes.
";
$elem["lwat/allowPwSet"]["default"]="false";
$elem["lwat/templates"]["type"]="select";
$elem["lwat/templates"]["choices"][1]="None";
$elem["lwat/templates"]["choices"][2]="user/admin";
$elem["lwat/templates"]["choices"][3]="educational institution";
$elem["lwat/templates"]["choicesde"][1]="Keine";
$elem["lwat/templates"]["choicesde"][2]="user/admin";
$elem["lwat/templates"]["choicesde"][3]="Bildungseinrichtung";
$elem["lwat/templates"]["choicesfr"][1]="Aucun";
$elem["lwat/templates"]["choicesfr"][2]="Utilisateur/administrateur";
$elem["lwat/templates"]["choicesfr"][3]="Institution à caractère éducatif";
$elem["lwat/templates"]["description"]="User account creation template:
 Lwat uses templates for creating user accounts, to make sure that
 home directories are placed in the right locations, users
 are in the correct groups, etc.
";
$elem["lwat/templates"]["descriptionde"]="Benutzerkontenerstellungsvorlage:
 Lwat verwendet Vorlagen zur Erstellung von Benutzerkonten, um sicherzustellen, dass Verzeichnisse an den richtigen Orten angelegt werden, Benutzer Mitglieder der richtigen Gruppen sind usw.
";
$elem["lwat/templates"]["descriptionfr"]="Modèle pour la création des comptes des utilisateurs :
 Lwat utilise des modèles pour créer des comptes utilisateurs afin d'être certain que les répertoires personnels sont placés aux bons emplacements, que les utilisateurs sont les membres de groupes appropriés, etc.
";
$elem["lwat/templates"]["default"]="user/admin";
$elem["lwat/incompatiblesettings"]["type"]="boolean";
$elem["lwat/incompatiblesettings"]["description"]="Fix 'smarty template' and 'compile dir' settings?
 Version 0.17 of lwat is incompatible with some values set in older
 configuration files. These settings must be fixed for lwat to work
 properly.
 .
 Please choose whether these settings should be fixed automatically.
";
$elem["lwat/incompatiblesettings"]["descriptionde"]="Einstellungen »smarty template« und »compile dir« korrigieren?
 Lwat 0.17 ist mit einigen in älteren Konfigurationsdateien gesetzten Werten inkompatibel. Diese Einstellungen müssen korrigiert werden, damit Lwat korrekt funktioniert.
 .
 Bitte wählen Sie aus, ob diese Einstellungen automatisch korrigiert werden sollen.
";
$elem["lwat/incompatiblesettings"]["descriptionfr"]="Faut-il corriger les réglages « smarty template » et « compile dir » ?
 La version 0.17 de lwat introduit des réglages incompatibles avec les fichiers de configuration antérieurs. Ces réglages doivent être corrigés pour que lwat fonctionne correctement.
 .
 Veuillez choisir si ces modifications doivent être effectuées automatiquement.
";
$elem["lwat/incompatiblesettings"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
