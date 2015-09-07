<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tdsodbc");

$elem["freetds/addtoodbc"]["type"]="boolean";
$elem["freetds/addtoodbc"]["description"]="Do you want FreeTDS to be registered as an ODBC driver?
 You appear to have an ODBC manager (unixodbc or iODBC) installed on your
 system.  FreeTDS now provides an Open Database Connectivity driver that
 can be registered with the manager using the /usr/bin/odbcinst utility.
 .
 If you wish, FreeTDS will be automatically added as an ODBC driver now and
 will be automatically deleted from the list when you remove the freetds
 package.
";
$elem["freetds/addtoodbc"]["descriptionde"]="Möchten Sie, dass FreeTDS als ODBC-Treiber registriert wird?
 Es scheint, dass Sie einen ODBC-Verwalter (Unixodbc oder iODBC) auf Ihrem System installiert haben. FreeTDS stellt jetzt einen »Open Database Connectivity«-Treiber bereit, der durch das /usr/bin/odbcinst-Hilfswerkzeug beim Verwalter registriert werden kann.
 .
 Falls Sie möchten, wird FreeTDS jetzt automatisch als ODBC-Treiber installiert und automatisch aus der Liste gelöscht, wenn Sie das FreeTDS-Paket entfernen.
";
$elem["freetds/addtoodbc"]["descriptionfr"]="Faut-il enregistrer FreeTDS comme pilote ODBC ?
 Un gestionnaire ODBC (« Open Database Connectivity ») est installé sur votre système (il s'agit de unixodbc ou iODBC). FreeTDS fournit à présent un pilote ODBC qui peut être enregistré par ce gestionnaire avec l'utilitaire /usr/bin/odbcinst.
 .
 Si vous le désirez, FreeTDS sera maintenant ajouté automatiquement comme pilote ODBC et sera automatiquement supprimé de la liste lors de la suppression du paquet freetds.
";
$elem["freetds/addtoodbc"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
