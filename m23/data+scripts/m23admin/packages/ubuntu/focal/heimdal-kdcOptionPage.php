<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("heimdal-kdc");

$elem["heimdal/realm"]["type"]="string";
$elem["heimdal/realm"]["description"]="Local realm name:
 Please enter the name of the local Kerberos realm. 
 .
 Using the uppercase domain name is common. For instance, if the host
 name is host.example.org, then the realm will become EXAMPLE.ORG. The
 default for this host is ${default_realm}.
";
$elem["heimdal/realm"]["descriptionde"]="Ihr lokaler Realm-Name:
 Bitte geben Sie den Namen des lokalen Kerberos-Realms ein.
 .
 Es ist üblich, den großgeschriebenen Domänennamen zu verwenden. Wenn z. B. der Rechnername »host.example.org« lautet, dann ist Ihr Realm-Name »EXAMPLE.ORG«. Die Standardeinstellung für diesen Rechner ist ${default_realm}.
";
$elem["heimdal/realm"]["descriptionfr"]="Nom de l'aire (« realm ») locale :
 Veuillez indiquer le nom de l'aire Kerberos locale.
 .
 Le nom de l'aire (« realm ») est généralement le nom de domaine, en lettres majuscules. Par exemple, si le nom d'hôte est « host.example.com », alors le nom de l'aire sera « EXAMPLE.COM ». La valeur par défaut pour cet hôte est « ${default_realm} ».
";
$elem["heimdal/realm"]["default"]="";
$elem["heimdal-kdc/password"]["type"]="password";
$elem["heimdal-kdc/password"]["description"]="KDC password:
 Heimdal can encrypt the key distribution center (KDC) data with
 a password. A hashed representation of this password will be stored
 in /var/lib/heimdal-kdc/m-key.
";
$elem["heimdal-kdc/password"]["descriptionde"]="KDC-Passwort:
 Heimdal kann die Daten des zentralen Schlüsselverteilers (key distribution center - KDC) mit einem Passwort verschlüsseln. Ein Hash-Wert davon wird in der Datei /var/lib/heimdal-kdc/m-key abgelegt.
";
$elem["heimdal-kdc/password"]["descriptionfr"]="Mot de passe de centre de distribution de clés (KDC) :
 Heimdal peut chiffrer les données du centre de distribution de clés (KDC : « Key Distribution Center ») avec un mot de passe. Une représentation hachée de ce mot de passe sera enregistrée dans « /var/lib/heimdal-kdc/m-key ».
";
$elem["heimdal-kdc/password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
