<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libmyodbc");

$elem["libmyodbc/addtoodbc"]["type"]="boolean";
$elem["libmyodbc/addtoodbc"]["description"]="Do you want MyODBC to be registered as an ODBC driver?
 You appear to have an ODBC manager (unixodbc or iODBC) installed on your
 system.
 .
 If you wish, MyODBC will be automatically added as an ODBC driver now and
 will be automatically deleted from the list when you remove the libmyodbc
 package, using the /usr/bin/odbcinst utility from unixodbc.
";
$elem["libmyodbc/addtoodbc"]["descriptionde"]="Soll MyODBC als ODBC-Treiber registriert werden?
 Es scheint ein ODBC-Manager (Unixodbc oder iODBC) auf Ihrem System installiert zu sein.
 .
 Falls Sie möchten, wird MyODBC jetzt automatisch als ODBC-Treiber hinzugefügt und automatisch aus der Liste gelöscht, wenn Sie das libmyodbc-Paket entfernen. Hierzu wird /usr/bin/odbcinst aus Unixodbc verwendet.
";
$elem["libmyodbc/addtoodbc"]["descriptionfr"]="Souhaitez-vous que MyODBC soit enregistré en tant que pilote ODBC ?
 Il semble qu'un gestionnaire ODBC (unixodbc ou iODBC) soit installé sur votre système.
 .
 Si vous le souhaitez, MyODBC sera automatiquement ajouté en tant que pilote ODBC maintenant et sera automatiquement retiré de la liste lorsque vous supprimerez le paquet libmyodbc, grâce à l'utilitaire /usr/bin/odbcinst d'unixodbc.
";
$elem["libmyodbc/addtoodbc"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
