<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("checkbox");

$elem["checkbox/plugins/jobs_info/blacklist"]["type"]="string";
$elem["checkbox/plugins/jobs_info/blacklist"]["description"]="Test suite blacklist:
 List of job files to never run when testing with checkbox.
";
$elem["checkbox/plugins/jobs_info/blacklist"]["descriptionde"]="Sperrliste der Testsammlung:
 Liste der Aufträge, die während des Testens mit Checkbox niemals ausgeführt werden.
";
$elem["checkbox/plugins/jobs_info/blacklist"]["descriptionfr"]="Liste noire de la suite de tests :
 Liste des tests à ne jamais lancer avec checkbox.
";
$elem["checkbox/plugins/jobs_info/blacklist"]["default"]="";
$elem["checkbox/plugins/jobs_info/whitelist"]["type"]="string";
$elem["checkbox/plugins/jobs_info/whitelist"]["description"]="Test suite whitelist:
 List of jobs to run when testing with checkbox.
";
$elem["checkbox/plugins/jobs_info/whitelist"]["descriptionde"]="Positivliste der Testsammlung:
 Liste der Aufträge, die während des Testens mit Checkbox ausgeführt werden.
";
$elem["checkbox/plugins/jobs_info/whitelist"]["descriptionfr"]="Liste blanche de la suite de tests :
 Liste des tests à lancer avec checkbox.
";
$elem["checkbox/plugins/jobs_info/whitelist"]["default"]="";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["type"]="string";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["description"]="Transport URL:
 URL where to send submissions.
";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["descriptionde"]="Transport-URL:
 URL, an welche die Ergebnisse gesendet werden.
";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["descriptionfr"]="URL de transport :
 Adresse URL où envoyer les rapports.
";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["default"]="https://launchpad.net/+hwdb/+submit";
$elem["checkbox/plugins/launchpad_prompt/email"]["type"]="string";
$elem["checkbox/plugins/launchpad_prompt/email"]["description"]="Launchpad E-mail:
 E-mail address used to sign in to Launchpad.
";
$elem["checkbox/plugins/launchpad_prompt/email"]["descriptionde"]="Launchpad-E-Mail:
 E-Mail-Adresse, die zum Anmelden bei Launchpad verwendet wird.
";
$elem["checkbox/plugins/launchpad_prompt/email"]["descriptionfr"]="Adresse courriel de Launchpad :
 Adresse courriel utilisée pour se connecter à Launchpad.
";
$elem["checkbox/plugins/launchpad_prompt/email"]["default"]="";
$elem["checkbox/plugins/proxy_info/http_proxy"]["type"]="string";
$elem["checkbox/plugins/proxy_info/http_proxy"]["description"]="HTTP Proxy:
 HTTP proxy to use instead of the one specified in environment.
";
$elem["checkbox/plugins/proxy_info/http_proxy"]["descriptionde"]="HTTP-Proxy:
 HTTP-Proxy, der anstelle des in den Umgebungseinstellungen festgelegten Proxys verwendet wird.
";
$elem["checkbox/plugins/proxy_info/http_proxy"]["descriptionfr"]="Serveur mandataire HTTP :
 Proxy HTTP à utiliser à la place de celui spécifié dans l'environnement.
";
$elem["checkbox/plugins/proxy_info/http_proxy"]["default"]="";
$elem["checkbox/plugins/proxy_info/https_proxy"]["type"]="string";
$elem["checkbox/plugins/proxy_info/https_proxy"]["description"]="HTTPS Proxy:
 HTTPS proxy to use instead of the one specified in environment.
";
$elem["checkbox/plugins/proxy_info/https_proxy"]["descriptionde"]="HTTPS-Proxy:
 HTTPS-Proxy, der anstelle des in den Umgebungseinstellungen festgelegten Proxys verwendet wird.
";
$elem["checkbox/plugins/proxy_info/https_proxy"]["descriptionfr"]="Proxy HTTPS :
 Proxy HTTPS à utiliser à la place de celui spécifié dans l'environnement.
";
$elem["checkbox/plugins/proxy_info/https_proxy"]["default"]="";
$elem["checkbox/plugins/environment_info/routers"]["type"]="select";
$elem["checkbox/plugins/environment_info/routers"]["choices"][1]="single";
$elem["checkbox/plugins/environment_info/routers"]["description"]="Routers:
 Whether there is a single router or multiple routers.
";
$elem["checkbox/plugins/environment_info/routers"]["descriptionde"]="Router:
 Legt fest, ob es einen einzelnen oder mehrere Router gibt.
";
$elem["checkbox/plugins/environment_info/routers"]["descriptionfr"]="Routeurs :
 Indique s'il y a un routeur unique ou plusieurs routeurs.
";
$elem["checkbox/plugins/environment_info/routers"]["default"]="single";
$elem["checkbox/plugins/environment_info/router_ssid"]["type"]="string";
$elem["checkbox/plugins/environment_info/router_ssid"]["description"]="Router SSID:
 The SSID of the single wireless router.
";
$elem["checkbox/plugins/environment_info/router_ssid"]["descriptionde"]="Router-SSID:
 Die SSID des einzelnen Funknetzwerk-Routers.
";
$elem["checkbox/plugins/environment_info/router_ssid"]["descriptionfr"]="SSID du routeur :
 Le SSID de l'unique routeur sans fil.
";
$elem["checkbox/plugins/environment_info/router_ssid"]["default"]="";
$elem["checkbox/plugins/environment_info/router_psk"]["type"]="string";
$elem["checkbox/plugins/environment_info/router_psk"]["description"]="Router PSK:
 The PSK of the single wireless router.
";
$elem["checkbox/plugins/environment_info/router_psk"]["descriptionde"]="Router-PSK:
 Der PSK des einzelnen Funknetzwerk-Routers.
";
$elem["checkbox/plugins/environment_info/router_psk"]["descriptionfr"]="PSK du routeur :
 Le PSK de l'unique routeur sans fil.
";
$elem["checkbox/plugins/environment_info/router_psk"]["default"]="";
$elem["checkbox/plugins/environment_info/wpa_bg_ssid"]["type"]="string";
$elem["checkbox/plugins/environment_info/wpa_bg_ssid"]["description"]="WPA BG SSID:
 The SSID of the 802.11b/g router with WPA security.
";
$elem["checkbox/plugins/environment_info/wpa_bg_ssid"]["descriptionde"]="WPA-BG-SSID:
 Die SSID des 802.11b/g-Routers mit WPA-Sicherheitsmodell.
";
$elem["checkbox/plugins/environment_info/wpa_bg_ssid"]["descriptionfr"]="SSID BG WPA :
 Le SSID du routeur 802.11b/g avec sécurité WPA.
";
$elem["checkbox/plugins/environment_info/wpa_bg_ssid"]["default"]="";
$elem["checkbox/plugins/environment_info/wpa_bg_psk"]["type"]="string";
$elem["checkbox/plugins/environment_info/wpa_bg_psk"]["description"]="WPA BG PSK:
 The PSK of the 802.11b/g router with WPA security.
";
$elem["checkbox/plugins/environment_info/wpa_bg_psk"]["descriptionde"]="WPA-BG-PSK:
 Der PSK des 802.11b/g-Routers mit WPA-Sicherheitsmodell.
";
$elem["checkbox/plugins/environment_info/wpa_bg_psk"]["descriptionfr"]="PSK BG WPA :
 Le PSK du routeur 802.11b/g avec sécurité WPA.
";
$elem["checkbox/plugins/environment_info/wpa_bg_psk"]["default"]="";
$elem["checkbox/plugins/environment_info/wpa_n_ssid"]["type"]="string";
$elem["checkbox/plugins/environment_info/wpa_n_ssid"]["description"]="WPA N SSID:
 The SSID of the 802.11n router with WPA security.
";
$elem["checkbox/plugins/environment_info/wpa_n_ssid"]["descriptionde"]="WPA-N-SSID:
 Die SSID des 802.11n-Routers mit WPA-Sicherheitsmodell.
";
$elem["checkbox/plugins/environment_info/wpa_n_ssid"]["descriptionfr"]="SSID N WPA :
 Le SSID du routeur 802.11n avec sécurité WPA.
";
$elem["checkbox/plugins/environment_info/wpa_n_ssid"]["default"]="";
$elem["checkbox/plugins/environment_info/wpa_n_psk"]["type"]="string";
$elem["checkbox/plugins/environment_info/wpa_n_psk"]["description"]="WPA N PSK:
 The PSK of the 802.11n router with WPA security.
";
$elem["checkbox/plugins/environment_info/wpa_n_psk"]["descriptionde"]="WPA-N-PSK:
 Der PSK des 802.11n-Routers mit WPA-Sicherheitsmodell.
";
$elem["checkbox/plugins/environment_info/wpa_n_psk"]["descriptionfr"]="PSK N WPA :
 Le PSK du routeur 802.11n avec sécurité WPA.
";
$elem["checkbox/plugins/environment_info/wpa_n_psk"]["default"]="";
$elem["checkbox/plugins/environment_info/open_bg_ssid"]["type"]="string";
$elem["checkbox/plugins/environment_info/open_bg_ssid"]["description"]="Open BG SSID:
 The SSID of the 802.11b/g router with open security.
";
$elem["checkbox/plugins/environment_info/open_bg_ssid"]["descriptionde"]="Open-BG-SSID:
 Die SSID des 802.11b/g-Routers mit »Open«-Sicherheitsmodell (unsicher).
";
$elem["checkbox/plugins/environment_info/open_bg_ssid"]["descriptionfr"]="SSID open BG :
 Le SSID du routeur 802.11b/g avec sécurité ouverte.
";
$elem["checkbox/plugins/environment_info/open_bg_ssid"]["default"]="";
$elem["checkbox/plugins/environment_info/open_n_ssid"]["type"]="string";
$elem["checkbox/plugins/environment_info/open_n_ssid"]["description"]="Open N SSID:
 The SSID of the 802.11n router with open security.
";
$elem["checkbox/plugins/environment_info/open_n_ssid"]["descriptionde"]="Open-N-SSID:
 Die SSID des 802.11n-Routers mit »Open«-Sicherheitsmodell (unsicher).
";
$elem["checkbox/plugins/environment_info/open_n_ssid"]["descriptionfr"]="SSID open N(nbsp]:
 Le SSID du routeur 802.11n avec sécurité ouverte.
";
$elem["checkbox/plugins/environment_info/open_n_ssid"]["default"]="";
$elem["checkbox/plugins/environment_info/btdevaddr"]["type"]="string";
$elem["checkbox/plugins/environment_info/btdevaddr"]["description"]="Bluetooth Device Address:
 The Bluetooth Device Address of the Bluetooth target.
";
$elem["checkbox/plugins/environment_info/btdevaddr"]["descriptionde"]="Bluetooth-Geräteadresse:
 Die Bluetooth-Geräteadresse des Bluetooth-Ziels.
";
$elem["checkbox/plugins/environment_info/btdevaddr"]["descriptionfr"]="Adresse du périphérique bluetooth :
 L'adresse de périphérique bluetooth de la cible bluetooth.
";
$elem["checkbox/plugins/environment_info/btdevaddr"]["default"]="";
PKG_OptionPageTail2($elem);
?>
