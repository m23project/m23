<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nixstatsagent");

$elem["nixstatsagent/user"]["type"]="string";
$elem["nixstatsagent/user"]["description"]="User ID:
 Type your user ID at NixStats.com or at your service provider.
 .
 Without this value set, the agent will be operating in the test mode 
 (no data will be sent to your service provider at all).
";
$elem["nixstatsagent/user"]["descriptionde"]="Benutzerkennung:
 Geben Sie Ihre Benutzerkennung bei NixStats.com oder Ihrem Dienstanbieter an.
 .
 Ohne diesen Wert wird der Agent im Testmodus arbeiten (es werden keinerlei Daten an Ihren Dienstanbieter gesandt).
";
$elem["nixstatsagent/user"]["descriptionfr"]="Nom d'utilisateur :
 Entrez votre nom d'utilisateur sur NixStats.com ou auprès de votre fournisseur de services.
 .
 Sans cette valeur, l'agent fonctionnera en mode test (aucune donnée ne sera envoyée à votre fournisseur de services).
";
$elem["nixstatsagent/user"]["default"]="";
$elem["nixstatsagent/server"]["type"]="string";
$elem["nixstatsagent/server"]["description"]="Server ID:
 Type your server ID at NixStats.com or at your service provider.
 .
 Without this value set, the agent will be operating in the test mode 
 (no data will be sent to your service provider at all).
 .
 This setting will be ignored if you receive a server ID automatically, in 
 which case you may skip setting this value.
";
$elem["nixstatsagent/server"]["descriptionde"]="Serverkennung:
 Geben Sie Ihre Serverkennung bei NixStats.com oder Ihrem Dienstanbieter an.
 .
 Ohne diesen Wert wird der Agent im Testmodus arbeiten (es werden keinerlei Daten an Ihren Dienstanbieter gesandt).
 .
 Diese Einstellung wird ignoriert, falls Sie eine Serverkennung automatisch erhalten. In diesem Fall können Sie das Setzen dieses Wertes überspringen.
";
$elem["nixstatsagent/server"]["descriptionfr"]="Nom du serveur :
 Entrez le nom de votre serveur sur NixStats.com ou auprès de votre fournisseur de services.
 .
 Sans cette valeur, l'agent fonctionnera en mode test (aucune donnée ne sera envoyée à votre fournisseur de services).
 .
 Ce paramètre sera ignoré si vous recevez automatiquement le nom du serveur, dans ce cas vous pouvez ignorer la définition de cette valeur.
";
$elem["nixstatsagent/server"]["default"]="";
$elem["nixstatsagent/api_host"]["type"]="string";
$elem["nixstatsagent/api_host"]["description"]="API host name:
 If you're using NixStats.com service, leave it empty. Otherwise type your 
 service provider's API host name.
";
$elem["nixstatsagent/api_host"]["descriptionde"]="API-Rechnername:
 Falls Sie den Dienst NixStats.com benutzen, lassen Sie dies leer. Andernfalls geben Sie den API-Rechnernamen Ihres Dienstanbieters an.
";
$elem["nixstatsagent/api_host"]["descriptionfr"]="Nom d'hôte de l'API :
 Si vous utilisez le service NixStats.com, laissez ce champ vide. Sinon entrez le nom d'hôte de l'API de votre fournisseur de services.
";
$elem["nixstatsagent/api_host"]["default"]="";
$elem["nixstatsagent/api_path"]["type"]="string";
$elem["nixstatsagent/api_path"]["description"]="API path name:
 If you're using NixStats.com service, leave it empty. Otherwise type your 
 service provider's API path name.
";
$elem["nixstatsagent/api_path"]["descriptionde"]="API-Pfadname:
 Falls Sie den Dienst NixStats.com benutzen, lassen Sie dies leer. Andernfalls geben Sie den API-Pfadnamen Ihres Dienstanbieters an.
";
$elem["nixstatsagent/api_path"]["descriptionfr"]="Chemin d'accès à l'API :
 Si vous utilisez le service NixStats.com, laissez ce champ vide. Sinon entrez le nom du chemin d'accès à l'API de votre fournisseur de services.
";
$elem["nixstatsagent/api_path"]["default"]="";
$elem["nixstatsagent/server_auto"]["type"]="boolean";
$elem["nixstatsagent/server_auto"]["description"]="Obtain the new server ID automatically?
 If you're using NixStats.com service, you can obtain a new server ID 
 automatically via NixStats.com API.
";
$elem["nixstatsagent/server_auto"]["descriptionde"]="Neue Serverkennung automatisch beziehen?
 Falls Sie den Dienst NixStats.com benutzen, können Sie eine neue Serverkennung automatisch über das API von NixStats.com beziehen.
";
$elem["nixstatsagent/server_auto"]["descriptionfr"]="Voulez-vous obtenir automatiquement le nouveau nom du serveur ?
 Si vous utilisez le service NixStats.com, vous pouvez obtenir un nouveau nom de serveur automatiquement par l'API NixStats.com.
";
$elem["nixstatsagent/server_auto"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
