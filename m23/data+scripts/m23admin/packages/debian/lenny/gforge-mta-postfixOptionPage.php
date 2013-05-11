<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-mta-postfix");

$elem["gforge/shared/domain_name"]["type"]="string";
$elem["gforge/shared/domain_name"]["description"]="GForge domain or subdomain name:
 Please enter the domain that will host the GForge installation. Some
 services (scm, lists, etc.) will be given their own subdomain in that
 domain.
";
$elem["gforge/shared/domain_name"]["descriptionde"]="GForge Domain- oder Subdomain-Name:
 Bitte geben Sie die Domain an, die Ihre GForge-Installation beherbergen wird. Einigen Diensten (scm, lists, usw.) wird innerhalb der Domain eine eigene Subdomain zugewiesen.
";
$elem["gforge/shared/domain_name"]["descriptionfr"]="Nom de domaine ou de sous-domaine GForge :
 Veuillez indiquer le nom de domaine qui hébergera le serveur GForge. Certains services auront leur propre sous-domaine à l'intérieur de ce domaine (scm, lists, etc.).
";
$elem["gforge/shared/domain_name"]["default"]="";
$elem["gforge/shared/server_admin"]["type"]="string";
$elem["gforge/shared/server_admin"]["description"]="GForge administrator e-mail address:
 Please enter the e-mail address of the GForge administrator of this site. It
 will be used when problems occur.
";
$elem["gforge/shared/server_admin"]["descriptionde"]="E-Mail-Adresse des GForge-Administrators:
 Bitte geben Sie die E-Mail-Adresse des GForge-Administrators Ihrer Site an. Diese wird beim Auftritt von Problemen benötigt.
";
$elem["gforge/shared/server_admin"]["descriptionfr"]="Adresse électronique de l'administrateur GForge :
 Veuillez indiquer l'adresse de l'administrateur de GForge. Elle est utilisée quand un problème se produit.
";
$elem["gforge/shared/server_admin"]["default"]="";
$elem["gforge/shared/system_name"]["type"]="string";
$elem["gforge/shared/system_name"]["description"]="GForge system name:
 Please enter the name of the GForge system. It is used in various places
 throughout the system.
";
$elem["gforge/shared/system_name"]["descriptionde"]="GForge-Systemname:
 Bitte geben Sie den Namen des GForge-Systems ein. Er wird an verschiedenen Stellen im ganzen System verwendet.
";
$elem["gforge/shared/system_name"]["descriptionfr"]="Nom du système GForge :
 Veuillez indiquer le nom du système GForge. Il est utilisé dans plusieurs parties du serveur.
";
$elem["gforge/shared/system_name"]["default"]="GForge";
$elem["gforge/shared/users_host"]["type"]="string";
$elem["gforge/shared/users_host"]["description"]="User mail redirector server:
 Please enter the host name of the server that will host the GForge user mail
 redirector.
 .
 It should not be the same as the main GForge host.
";
$elem["gforge/shared/users_host"]["descriptionde"]="Benutzer-E-Mail-Umleitungsserver:
 Bitte geben Sie den Rechnernamen des Servers ein, der Ihren GForge-Benutzer-E-Mail-Umleiter beherbergen wird.
 .
 Dieser sollte nicht mit dem Namen des Haupt-GForge-Rechners übereinstimmen.
";
$elem["gforge/shared/users_host"]["descriptionfr"]="Redirecteur des courriers des utilisateurs :
 Veuillez indiquer le nom du serveur qui hébergera le redirecteur du courriel utilisateurs de GForge.
 .
 Ce nom devrait être différent du nom d'hôte principal de GForge.
";
$elem["gforge/shared/users_host"]["default"]="";
$elem["gforge/shared/lists_host"]["type"]="string";
$elem["gforge/shared/lists_host"]["description"]="Mailing lists server:
 Please enter the host name of the server that will host the GForge
 mailing lists.
 .
 It should not be the same as the main GForge host.
";
$elem["gforge/shared/lists_host"]["descriptionde"]="Mailinglisten-Server:
 Bitte geben Sie den Rechnernamen des Servers ein, der Ihre GForge-Mailinglisten beherbergen wird.
 .
 Dieser sollte nicht mit dem Namen des Haupt-GForge-Rechners übereinstimmen.
";
$elem["gforge/shared/lists_host"]["descriptionfr"]="Serveur de listes de diffusion :
 Veuillez indiquer le nom d'hôte du serveur qui hébergera les listes de diffusion de GForge.
 .
 Ce nom devrait être différent du nom d'hôte principal de GForge.
";
$elem["gforge/shared/lists_host"]["default"]="";
$elem["gforge/shared/noreply_to_bitbucket"]["type"]="boolean";
$elem["gforge/shared/noreply_to_bitbucket"]["description"]="Do you want mail to ${noreply} to be discarded?
 GForge sends and receives plenty of e-mail to and from the
 \"${noreply}\" address.
 .
 E-mail to that address should be directed to a
 black hole (/dev/null), unless you have another use for that address.
";
$elem["gforge/shared/noreply_to_bitbucket"]["descriptionde"]="Möchten Sie, dass E-Mail an ${noreply} verworfen wird?
 GForge sendet und empfängt viele E-Mails von und auf der »${noreply}«-Adresse.
 .
 E-Mails an diese Adresse sollten an ein schwarzes Loch (/dev/null) umgeleitet werden, es sei denn, Sie haben für diese Adresse eine andere Verwendung.
";
$elem["gforge/shared/noreply_to_bitbucket"]["descriptionfr"]="Faut-il supprimer les courriers pour ${noreply} ?
 GForge envoie fréquemment des courriers de et vers l'adresse « ${noreply} ».
 .
 Il est conseillé de rediriger les courriers adressés à cette adresse vers un trou noir (/dev/null), sauf si elle est utilisée par ailleurs.
";
$elem["gforge/shared/noreply_to_bitbucket"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
