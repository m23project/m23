<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("courier-maildrop");

$elem["courier-maildrop/deprecated"]["type"]="note";
$elem["courier-maildrop/deprecated"]["description"]="courier-maildrop replaced with maildrop
 The courier-maildrop package is now just a dummy package that depends
 on regular maildrop package.
 . 
 The new maildrop configuration is located in the /etc/maildroprc file
 and you'll have to reconfigure it, so your email doesn't get delivered
 to invalid location.
 .
 Any previous configuration has been left in the /etc/courier/maildroprc
 .
 Default mail deliver location in the maildrop package is /var/spool/mail
 and to change it back again to ~/Maildrop you need to uncomment following
 line in the /etc/maildroprc:
 .
 DEFAULT=\"$HOME/Maildir\"
 .
 If you have configured courierd to deliver mail using maildrop,
 you'll need to add '-d \"${RECIPIENT}\"' to your DEFAULTDELIVERY
 configuration in /etc/courier/courierd, f.e.:
 .
 DEFAULTDELIVERY='|/usr/bin/maildrop -w 90 -V 1 -d \"${RECIPIENT}\"'
 .
 If you are unsure you want to continue, please abort the installation
 now using Ctrl-C and prepare for the upgrade by changing the
 configuration before the installation.  To resume the installation, run:
 .
 dpkg --configure --pending
";
$elem["courier-maildrop/deprecated"]["descriptionde"]="";
$elem["courier-maildrop/deprecated"]["descriptionfr"]="";
$elem["courier-maildrop/deprecated"]["default"]="";
PKG_OptionPageTail2($elem);
?>
