<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ntlmaps");

$elem["ntlmaps/listen_port"]["type"]="string";
$elem["ntlmaps/listen_port"]["description"]="Listen port:
 The NTLM Authorization Proxy Server listens to this port.  This is
 the port number you use in your http_proxy or web browser settings.
 .
 Proxy servers are commonly set to listen to port 8080, but in NTLM
 APS the default value is 5865.
";
$elem["ntlmaps/listen_port"]["descriptionde"]="Port:
 Der »NTLM Authorization Proxy Server« wartet auf diesem Port auf Anfragen. Dies ist die Portnummer, die Sie in Ihrer http_proxy oder in den Einstellungen Ihres Webservers verwenden.
 .
 Häufig werden die Proxy-Server auf Port 8080 eingestellt, aber in NTLM APS lautet der Standardwert 5865.
";
$elem["ntlmaps/listen_port"]["descriptionfr"]="Port d'écoute :
 Veuillez indiquer le port où le serveur mandataire (« proxy ») d'autorisation NTLM sera à l'écoute. Il s'agit du numéro de port que vous utilisez dans « http_proxy » ou dans la configuration de votre navigateur.
 .
 Les serveurs mandataires écoutent généralement le port 8080, mais la valeur par défaut du serveur NTLM APS est 5865.
";
$elem["ntlmaps/listen_port"]["default"]="5865";
$elem["ntlmaps/parent_proxy"]["type"]="string";
$elem["ntlmaps/parent_proxy"]["description"]="Parent proxy:
 This is the address of the NTLM proxy server (e.g. the Microsoft ISA
 server) which NTLM APS is authenticating against.
 .
 The address may be given with or without the leading http://,
 for example:
     proxy.myworkplace.com
     http://proxy.myworkplace.com
";
$elem["ntlmaps/parent_proxy"]["descriptionde"]="Eltern-Proxy:
 Dies ist die Adresse des NTLM Proxy-Servers (z.B. des Microsoft ISA-Servers) gegen den sich NTLM APS authentifiziert.
 .
 Die Adresse kann mit oder ohne führendes »http://« angegeben werden, beispielsweise:
     proxy.meinarbeitsplatz.com
     http://proxy.meinarbeitsplatz.com
";
$elem["ntlmaps/parent_proxy"]["descriptionfr"]="Mandataire parent :
 Veuillez indiquez l'adresse du serveur mandataire NTLM (par exemple le serveur Microsoft ISA) utilisé pour authentifier NTLM APS.
 .
 L'adresse peut être donnée avec ou sans « http:// ». Par exemple :
     proxy.myworkplace.com
     http://proxy.myworkplace.com
";
$elem["ntlmaps/parent_proxy"]["default"]="your_parentproxy";
$elem["ntlmaps/parent_proxy_port"]["type"]="string";
$elem["ntlmaps/parent_proxy_port"]["description"]="Parent proxy port:
 This is the port number which the NTLM proxy server (e.g. the Microsoft ISA
 server), that NTLM APS is authenticating against, listens to.
 .
 It is commonly set to 8080.
";
$elem["ntlmaps/parent_proxy_port"]["descriptionde"]="Port des Eltern-Proxys:
 Dies ist die Portnummer, auf der der NTLM Proxy-Server (z.B. der Microsoft ISA-Server), gegen den sich NTLM APS authentifiziert, auf Anfragen wartet.
 .
 Er wird normalerweise auf 8080 gesetzt.
";
$elem["ntlmaps/parent_proxy_port"]["descriptionfr"]="Port du mandataire parent :
 Veuillez indiquez le numéro du port où sera à l'écoute le serveur mandataire NTLM (par exemple le serveur Microsoft ISA) qu'utilisera NTLM APS pour vous authentifier.
 .
 Il s'agit généralement du port 8080.
";
$elem["ntlmaps/parent_proxy_port"]["default"]="8080";
$elem["ntlmaps/username"]["type"]="string";
$elem["ntlmaps/username"]["description"]="NT Windows username:
 This field identifies the NT Windows username that you use for authentication.
";
$elem["ntlmaps/username"]["descriptionde"]="NT Windows-Benutzername:
 Dieses Feld identifiziert den NT Windows-Benutzernamen, den Sie für die Authentifizierung verwenden.
";
$elem["ntlmaps/username"]["descriptionfr"]="Identifiant Windows NT :
 Veuillez indiquez l'identifiant qui sera utilisé pour l'authentification avec Windows NT.
";
$elem["ntlmaps/username"]["default"]="username_to_use";
$elem["ntlmaps/password"]["type"]="password";
$elem["ntlmaps/password"]["description"]="NT Windows password:
 This field identifies the NT Windows password that you use for authentication.
 .
 To help with security, it is not stored permanently in the debconf
 database, but is deleted from there after being written to the
 ntlmaps config file.  Be aware that it is temporarily stored in the
 debconf database while this setup procedure is taking place. It is
 deleted from there at the end of setup.
 .
 If you prefer not to have the password stored, even temporarily, in
 the debconf database, then leave this entry blank, and insert the
 value manually into the config file /etc/ntlmaps/server.cfg.
";
$elem["ntlmaps/password"]["descriptionde"]="NT Windows-Passwort:
 Dieses Feld identifiziert das NT Windows-Passwort, das Sie für die Authentifizierung verwenden.
 .
 Um die Sicherheit zu erhöhen, wird es nicht permanent in der Debconf-Datenbank gespeichert sondern dort gelöscht, nachdem es in die Konfigurationsdatei von Ntlmaps geschrieben wurde. Beachten Sie, das es temporär in der Debconf-Datenbank gespeichert ist, bis diese Einrichtungsroutine durchgeführt wurde. Am Ende der Einrichtungsroutine wird es dort gelöscht.
 .
 Falls Sie bevorzugen, dass das Passwort auch nicht vorübergehend in der Debconf-Datenbank abgespeichert wird, lassen Sie diesen Eintrag leer und fügen den Wert manuell in die Konfigurationsdatei /etc/ntlmaps/server.cfg ein.
";
$elem["ntlmaps/password"]["descriptionfr"]="Mot de passe Windows NT :
 Mot de passe d'authentification avec Windows NT
 .
 Veuillez noter que le mot de passe est temporairement sauvegardé dans la base de données de debconf, durant toute la procédure de configuration. Il est supprimé de la base à la fin de la configuration du paquet.
 .
 Si vous préférez que le mot de passe ne soit pas enregistré, même temporairement, dans la base de données de debconf, laissez cette entrée vide. Vous devrez l'indiquer vous-même dans le fichier de configuration /etc/ntlmaps/server.cfg.
";
$elem["ntlmaps/password"]["default"]="your_nt_password";
$elem["ntlmaps/nt_domain"]["type"]="string";
$elem["ntlmaps/nt_domain"]["description"]="NT Windows domain:
 This field identifies the NT Windows domain that you authenticate against.
";
$elem["ntlmaps/nt_domain"]["descriptionde"]="NT Windows-Domäne:
 Dieses Feld identifiziert die NT Windows-Domäne, gegen die Sie sich authentifizieren.
";
$elem["ntlmaps/nt_domain"]["descriptionfr"]="Domaine Windows NT :
 Veuillez indiquer le domaine Windows NT sur lequel se feront les authentifications.
";
$elem["ntlmaps/nt_domain"]["default"]="your_domain";
PKG_OptionPageTail2($elem);
?>
