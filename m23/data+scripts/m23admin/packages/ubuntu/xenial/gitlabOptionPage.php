<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gitlab");

$elem["gitlab/fqdn"]["type"]="string";
$elem["gitlab/fqdn"]["description"]="Fully qualified domain name for this instance of Gitlab:
 Please choose the domain name which should be used to access this
 instance of Gitlab.
 .
 This should be the fully qualified name as seen from the Internet, with
 the domain name that will be used to access the pod.
 .
 If a reverse proxy is used, give the hostname that the proxy server
 responds to.

";
$elem["gitlab/fqdn"]["descriptionde"]="";
$elem["gitlab/fqdn"]["descriptionfr"]="";
$elem["gitlab/fqdn"]["default"]="localhost";
$elem["gitlab/ssl"]["type"]="boolean";
$elem["gitlab/ssl"]["description"]="Enable https?
 Enabling https means that an SSL certificate is required to access this Gitlab
 instance (as Nginx will be configured to respond only to https requests). A
 self-signed certificate is enough for local testing (and can be generated
 using, for instance, the package easy-rsa), but it is not recommended for a
 production instance.
 .
 Some certificate authorities like Let's Encrypt (letsencrypt.org), StartSSL
 (startssl.com) or WoSign (buy.wosign.com/free) offer free SSL certificates.
 .
 Nginx must be reloaded after the certificate and key files are made available
 at /etc/gitlab/ssl. letsencrypt package may be used to automate interaction
 with Let’s Encrypt to obtain a certificate. 

";
$elem["gitlab/ssl"]["descriptionde"]="";
$elem["gitlab/ssl"]["descriptionfr"]="";
$elem["gitlab/ssl"]["default"]="false";
$elem["gitlab/letsencrypt"]["type"]="boolean";
$elem["gitlab/letsencrypt"]["description"]="Use Let's Encrypt?
 Symbolic links to certificate and key created using letsencrypt package
 (/etc/letencrypt/live) will be added to /etc/gitlab/ssl if this option is
 selected.
 .
 Otherwise, certificate and key files have to be placed manually to
 /etc/gitlab/ssl directory as 'gitlab.crt' and 'gitlab.key'.
 .
 Nginx will be stopped, if this option is selected, to allow letsencrypt to use
 ports 80 and 443 during domain ownership validation and certificate retrieval
 step.
 .
 Note: letsencrypt does not have a usable nginx plugin currently, so
 certificates must be renewed manually after 3 months, when current
 letsencrypt certificate expire.
";
$elem["gitlab/letsencrypt"]["descriptionde"]="";
$elem["gitlab/letsencrypt"]["descriptionfr"]="";
$elem["gitlab/letsencrypt"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
