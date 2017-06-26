<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dkms");

$elem["dkms/title/secureboot"]["type"]="text";
$elem["dkms/title/secureboot"]["description"]="Configuring Secure Boot

";
$elem["dkms/title/secureboot"]["descriptionde"]="";
$elem["dkms/title/secureboot"]["descriptionfr"]="";
$elem["dkms/title/secureboot"]["default"]="";
$elem["dkms/error/bad_secureboot_key"]["type"]="error";
$elem["dkms/error/bad_secureboot_key"]["description"]="Invalid password
 The Secure Boot key you've entered is not valid. The password used must be
 between 8 and 16 characters.

";
$elem["dkms/error/bad_secureboot_key"]["descriptionde"]="";
$elem["dkms/error/bad_secureboot_key"]["descriptionfr"]="";
$elem["dkms/error/bad_secureboot_key"]["default"]="";
$elem["dkms/disable_secureboot"]["type"]="boolean";
$elem["dkms/disable_secureboot"]["description"]="Disable UEFI Secure Boot?
 Your system has UEFI Secure Boot enabled. UEFI Secure Boot is not compatible
 with the use of third-party drivers.
 .
 The system will assist you in disabling UEFI Secure Boot. To ensure that this
 change is being made by you as an authorized user, and not by an attacker,
 you must choose a password now and then use the same password after reboot
 to confirm the change.
 .
 If you choose to proceed but do not confirm the password upon reboot, Ubuntu
 will still be able to boot on your system but these third-party drivers will
 not be available for your hardware.

";
$elem["dkms/disable_secureboot"]["descriptionde"]="";
$elem["dkms/disable_secureboot"]["descriptionfr"]="";
$elem["dkms/disable_secureboot"]["default"]="false";
$elem["dkms/secureboot_key"]["type"]="password";
$elem["dkms/secureboot_key"]["description"]="Password:
 Please enter a password for disabling Secure Boot. It will be asked again
 after a reboot.

";
$elem["dkms/secureboot_key"]["descriptionde"]="";
$elem["dkms/secureboot_key"]["descriptionfr"]="";
$elem["dkms/secureboot_key"]["default"]="";
$elem["dkms/secureboot_key_again"]["type"]="password";
$elem["dkms/secureboot_key_again"]["description"]="Re-enter password to verify:
 Please enter the same password again to verify you have typed it correctly.

";
$elem["dkms/secureboot_key_again"]["descriptionde"]="";
$elem["dkms/secureboot_key_again"]["descriptionfr"]="";
$elem["dkms/secureboot_key_again"]["default"]="";
$elem["dkms/error/secureboot_key_mismatch"]["type"]="error";
$elem["dkms/error/secureboot_key_mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["dkms/error/secureboot_key_mismatch"]["descriptionde"]="";
$elem["dkms/error/secureboot_key_mismatch"]["descriptionfr"]="";
$elem["dkms/error/secureboot_key_mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
