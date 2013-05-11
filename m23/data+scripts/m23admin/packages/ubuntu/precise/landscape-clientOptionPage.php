<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("landscape-client");

$elem["landscape-client/computer_title"]["type"]="string";
$elem["landscape-client/computer_title"]["description"]="Computer Title:
 Descriptive text to identify this computer uniquely in the
 Landscape user interface.

";
$elem["landscape-client/computer_title"]["descriptionde"]="";
$elem["landscape-client/computer_title"]["descriptionfr"]="";
$elem["landscape-client/computer_title"]["default"]="";
$elem["landscape-client/account_name"]["type"]="string";
$elem["landscape-client/account_name"]["description"]="Account Name:
 Short lowercase identifier of the Landscape account this computer
 will be assigned.

";
$elem["landscape-client/account_name"]["descriptionde"]="";
$elem["landscape-client/account_name"]["descriptionfr"]="";
$elem["landscape-client/account_name"]["default"]="";
$elem["landscape-client/registration_password"]["type"]="password";
$elem["landscape-client/registration_password"]["description"]="Registration Password:
 Client registration password for the given Landscape account.  Only
 needed if the given account is requesting a client registration
 password.

";
$elem["landscape-client/registration_password"]["descriptionde"]="";
$elem["landscape-client/registration_password"]["descriptionfr"]="";
$elem["landscape-client/registration_password"]["default"]="";
$elem["landscape-client/url"]["type"]="string";
$elem["landscape-client/url"]["description"]="Landscape Server URL:
 The server URL to connect to.

";
$elem["landscape-client/url"]["descriptionde"]="";
$elem["landscape-client/url"]["descriptionfr"]="";
$elem["landscape-client/url"]["default"]="https://landscape.canonical.com/message-system";
$elem["landscape-client/exchange_interval"]["type"]="string";
$elem["landscape-client/exchange_interval"]["description"]="Message Exchange Interval:
 Interval, in seconds, between normal message exchanges with the Landscape
 server.

";
$elem["landscape-client/exchange_interval"]["descriptionde"]="";
$elem["landscape-client/exchange_interval"]["descriptionfr"]="";
$elem["landscape-client/exchange_interval"]["default"]="900";
$elem["landscape-client/urgent_exchange_interval"]["type"]="string";
$elem["landscape-client/urgent_exchange_interval"]["description"]="Urgent Message Exchange Interval:
 Interval, in seconds, between urgent message exchanges with the Landscape
 server.

";
$elem["landscape-client/urgent_exchange_interval"]["descriptionde"]="";
$elem["landscape-client/urgent_exchange_interval"]["descriptionfr"]="";
$elem["landscape-client/urgent_exchange_interval"]["default"]="60";
$elem["landscape-client/ping_url"]["type"]="string";
$elem["landscape-client/ping_url"]["description"]="Landscape PingServer URL:
 The URL to perform lightweight exchange initiation with.

";
$elem["landscape-client/ping_url"]["descriptionde"]="";
$elem["landscape-client/ping_url"]["descriptionfr"]="";
$elem["landscape-client/ping_url"]["default"]="http://landscape.canonical.com/ping";
$elem["landscape-client/ping_interval"]["type"]="string";
$elem["landscape-client/ping_interval"]["description"]="Ping Interval:
 Interval, in seconds, between client ping exchanges with the Landscape server.

";
$elem["landscape-client/ping_interval"]["descriptionde"]="";
$elem["landscape-client/ping_interval"]["descriptionfr"]="";
$elem["landscape-client/ping_interval"]["default"]="30";
$elem["landscape-client/http_proxy"]["type"]="string";
$elem["landscape-client/http_proxy"]["description"]="HTTP proxy (blank for none):
 The URL of the HTTP proxy, if one is needed.

";
$elem["landscape-client/http_proxy"]["descriptionde"]="";
$elem["landscape-client/http_proxy"]["descriptionfr"]="";
$elem["landscape-client/http_proxy"]["default"]="Default:";
$elem["landscape-client/https_proxy"]["type"]="string";
$elem["landscape-client/https_proxy"]["description"]="HTTPS proxy (blank for none):
 The URL of the HTTPS proxy, if one is needed.

";
$elem["landscape-client/https_proxy"]["descriptionde"]="";
$elem["landscape-client/https_proxy"]["descriptionfr"]="";
$elem["landscape-client/https_proxy"]["default"]="Default:";
$elem["landscape-client/tags"]["type"]="string";
$elem["landscape-client/tags"]["description"]="Initial tags for first registration
 Comma separated list of tags which will be assigned to this computer on its
 first registration.  Once the machine is registered, these tags can only be
 changed using the Landscape server.

";
$elem["landscape-client/tags"]["descriptionde"]="";
$elem["landscape-client/tags"]["descriptionfr"]="";
$elem["landscape-client/tags"]["default"]="Default:";
$elem["landscape-client/register_system"]["type"]="boolean";
$elem["landscape-client/register_system"]["description"]="Register this system with the Landscape server?
 Register this system with a preexisting Landscape account.  Please
 go to http://landscape.canonical.com if you need a Landscape account.
";
$elem["landscape-client/register_system"]["descriptionde"]="";
$elem["landscape-client/register_system"]["descriptionfr"]="";
$elem["landscape-client/register_system"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
