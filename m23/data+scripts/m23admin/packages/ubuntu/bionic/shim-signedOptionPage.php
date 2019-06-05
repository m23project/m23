<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("shim-signed");

$elem["shim/title/secureboot"]["type"]="text";
$elem["shim/title/secureboot"]["description"]="Configuring Secure Boot

";
$elem["shim/title/secureboot"]["descriptionde"]="";
$elem["shim/title/secureboot"]["descriptionfr"]="";
$elem["shim/title/secureboot"]["default"]="";
$elem["shim/error/bad_secureboot_key"]["type"]="error";
$elem["shim/error/bad_secureboot_key"]["description"]="Invalid password
 The Secure Boot key you've entered is not valid. The password used must be
 between 8 and 16 characters.

";
$elem["shim/error/bad_secureboot_key"]["descriptionde"]="";
$elem["shim/error/bad_secureboot_key"]["descriptionfr"]="";
$elem["shim/error/bad_secureboot_key"]["default"]="";
$elem["shim/enable_secureboot"]["type"]="boolean";
$elem["shim/enable_secureboot"]["description"]="Enroll a new Machine-Owner Key?
 A new Machine-Owner key has been generated for this system to use when
 signing third-party drivers. This key now needs to be enrolled in your
 firmware, which will be done at the next reboot.
 .
 If Secure Boot validation was previously disabled on your system, validation
 will also be re-enabled as part of this key enrollment process.

";
$elem["shim/enable_secureboot"]["descriptionde"]="";
$elem["shim/enable_secureboot"]["descriptionfr"]="";
$elem["shim/enable_secureboot"]["default"]="false";
$elem["shim/secureboot_explanation"]["type"]="note";
$elem["shim/secureboot_explanation"]["description"]="Your system has UEFI Secure Boot enabled.
 UEFI Secure Boot requires additional configuration to work with third-party
 drivers.
 .
 The system will assist you in configuring UEFI Secure Boot. To permit the
 use of third-party drivers, a new Machine-Owner Key (MOK) has been generated.
 This key now needs to be enrolled in your system's firmware.
 .
 To ensure that this change is being made by you as an authorized user, and
 not by an attacker, you must choose a password now and then confirm the
 change after reboot using the same password, in both the \"Enroll MOK\" and
 \"Change Secure Boot state\" menus that will be presented to you when this
 system reboots.
 .
 If you proceed but do not confirm the password upon reboot, Ubuntu
 will still be able to boot on your system but any hardware that requires
 third-party drivers to work correctly may not be usable.

";
$elem["shim/secureboot_explanation"]["descriptionde"]="";
$elem["shim/secureboot_explanation"]["descriptionfr"]="";
$elem["shim/secureboot_explanation"]["default"]="";
$elem["shim/secureboot_key"]["type"]="string";
$elem["shim/secureboot_key"]["description"]="Enter a password for Secure Boot. It will be asked again after a reboot.

";
$elem["shim/secureboot_key"]["descriptionde"]="";
$elem["shim/secureboot_key"]["descriptionfr"]="";
$elem["shim/secureboot_key"]["default"]="";
$elem["shim/secureboot_key_again"]["type"]="string";
$elem["shim/secureboot_key_again"]["description"]="Enter the same password again to verify you have typed it correctly.

";
$elem["shim/secureboot_key_again"]["descriptionde"]="";
$elem["shim/secureboot_key_again"]["descriptionfr"]="";
$elem["shim/secureboot_key_again"]["default"]="";
$elem["shim/error/secureboot_key_mismatch"]["type"]="error";
$elem["shim/error/secureboot_key_mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["shim/error/secureboot_key_mismatch"]["descriptionde"]="";
$elem["shim/error/secureboot_key_mismatch"]["descriptionfr"]="";
$elem["shim/error/secureboot_key_mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
