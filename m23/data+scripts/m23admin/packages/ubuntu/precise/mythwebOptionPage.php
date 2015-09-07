<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythweb");

$elem["mythweb/enable"]["type"]="boolean";
$elem["mythweb/enable"]["description"]="Would you like to password-protect your MythWeb?
 MythWeb is the web interface of MythTV. It is possible to restrict
 access by enabling password protection. It is STRONGLY recommended
 that you set a password if your MythWeb will be exposed to the
 World Wide Web.

";
$elem["mythweb/enable"]["descriptionde"]="";
$elem["mythweb/enable"]["descriptionfr"]="";
$elem["mythweb/enable"]["default"]="false";
$elem["mythweb/only"]["type"]="boolean";
$elem["mythweb/only"]["description"]="Will you be using this webserver exclusively with mythweb?
 If this computer's web service will only be used with mythweb, apache
 can be configured to redirect all requests directly to mythweb.  If you
 choose not to do this, then you can access mythweb from the /mythweb
 subdirectory.

";
$elem["mythweb/only"]["descriptionde"]="";
$elem["mythweb/only"]["descriptionfr"]="";
$elem["mythweb/only"]["default"]="true";
$elem["mythweb/username"]["type"]="string";
$elem["mythweb/username"]["description"]="Please enter a user name:
 You will use this user name to access your MythWeb.

";
$elem["mythweb/username"]["descriptionde"]="";
$elem["mythweb/username"]["descriptionfr"]="";
$elem["mythweb/username"]["default"]="";
$elem["mythweb/password"]["type"]="password";
$elem["mythweb/password"]["description"]="Please enter a password:
 You will use this password to access your MythWeb.
";
$elem["mythweb/password"]["descriptionde"]="";
$elem["mythweb/password"]["descriptionfr"]="";
$elem["mythweb/password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
