<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("docker.io");

$elem["docker.io/restart"]["type"]="boolean";
$elem["docker.io/restart"]["description"]="Automatically restart Docker daemon?
 If Docker is upgraded without restarting the Docker daemon, Docker will often
 have trouble starting new containers, and in some cases even maintaining the
 containers it is currently running. See https://launchpad.net/bugs/1658691 for
 an example of this breakage.
 .
 Normally, upgrading the package would simply restart the associated daemon(s).
 In the case of the Docker daemon, that would also imply stopping all running
 containers (which will only be restarted if they're part of a \"service\", have
 an appropriate restart policy configured, or have some other means of being
 restarted such as an external systemd unit).
";
$elem["docker.io/restart"]["descriptionde"]="";
$elem["docker.io/restart"]["descriptionfr"]="";
$elem["docker.io/restart"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
