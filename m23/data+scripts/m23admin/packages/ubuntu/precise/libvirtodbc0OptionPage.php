<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libvirtodbc0");

$elem["libvirtodbc0/register-odbc-driver"]["type"]="boolean";
$elem["libvirtodbc0/register-odbc-driver"]["description"]="Register the Virtuoso ODBC driver?
 An ODBC manager (unixodbc or iODBC)  is already installed on this system.
 .
 The Virtuoso ODBC driver can be automatically added to the list of
 available ODBC drivers (and automatically deleted from the list
 when this package is removed).
";
$elem["libvirtodbc0/register-odbc-driver"]["descriptionde"]="Den Virtuoso-ODBC-Treiber registrieren?
 Auf diesem System ist schon eine ODBC-Verwaltung (unixodbc oder IODBC) installiert.
 .
 Der Standard-ODBC-Treiber von Virtuoso kann automatisch in die Liste verfügbarer ODBC-Treiber eingetragen (und automatisch beim Löschen des Pakets aus der Liste entfernt) werden.
";
$elem["libvirtodbc0/register-odbc-driver"]["descriptionfr"]="Enregistrer le pilote ODBC Virtuoso ?
 Une application ODBC (unixODBC ou iODBC) est déjà installée sur ce système.
 .
 Le pilote ODBC Virtuoso peut être automatiquement ajouté à la liste des pilotes ODBC disponibles (et automatiquement effacé de la liste quand le paquet sera supprimé).
";
$elem["libvirtodbc0/register-odbc-driver"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
