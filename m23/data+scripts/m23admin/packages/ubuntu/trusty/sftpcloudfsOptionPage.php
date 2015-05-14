<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sftpcloudfs");

$elem["sftpcloudfs/auth-url"]["type"]="string";
$elem["sftpcloudfs/auth-url"]["description"]="Authentication server URL:
 In order to authenticate its users, SFTPCloudFS needs to connect to an
 authentication server (such as RackSpace Cloud Files or OpenStack).
 Please enter the URL of that server.
 .
 URL examples:
  * Rackspace in the US: https://auth.api.rackspacecloud.com/v1.0
  * Rackspace in the UK: https://lon.auth.api.rackspacecloud.com/v1.0
  * Swift: some URL like https://example.com/v1.0 (or an IP address)
";
$elem["sftpcloudfs/auth-url"]["descriptionde"]="URL des Authentifizierungsserver:
 Um seine Benutzer zu authentifizieren, muss SFTPCloudFS eine Verbindung zu einem Authenfizierungs-Server herstellen (wie zum Beispiel »RackSpace Cloud Files« oder OpenStack). Geben Sie bitte die URL dieses Servers an.
 .
 Beispiel-URLs:
  * Rackspace in den USA: https://auth.api.rackspacecloud.com/v1.0
  * Rackspace in GB: https://lon.auth.api.rackspacecloud.com/v1.0
  * Swift: eine URL wie https://example.com/v1.0 (oder eine IP-Adresse)
";
$elem["sftpcloudfs/auth-url"]["descriptionfr"]="URL du serveur d'authentification :
 Pour authentifier ses utilisateurs, SFTPCloudFS a besoin de se connecter à un serveur d'authentification (tel que RackSpace Cloud Files ou OpenStack). Veuillez indiquer l'URL de ce serveur.
 .
 Exemples d'URL :
  * Rackspace aux États-Unis : https://auth.api.rackspacecloud.com/v1.0
  * Rackspace au Royaume-Uni : https://lon.auth.api.rackspacecloud.com/v1.0
  * Swift : une URL telle que https://example.com/v1.0 (ou une adresse IP)
";
$elem["sftpcloudfs/auth-url"]["default"]="https://auth.api.rackspacecloud.com/v1.0";
PKG_OptionPageTail2($elem);
?>
