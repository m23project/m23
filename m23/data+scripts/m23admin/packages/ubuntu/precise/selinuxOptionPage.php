<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("selinux");

$elem["selinux/install"]["type"]="note";
$elem["selinux/install"]["description"]="SELinux install
 SELinux has been installed on this system, but has not been enabled.
 You will need to update your bootloader (probably by adding
 'apparmor.enabled=0 selinux=1' to the defoptions line in
 /boot/grub/menu.lst, and then running update-grub) and then reboot to
 activate SELinux.

";
$elem["selinux/install"]["descriptionde"]="";
$elem["selinux/install"]["descriptionfr"]="";
$elem["selinux/install"]["default"]="";
$elem["selinux/updategrub"]["type"]="boolean";
$elem["selinux/updategrub"]["description"]="Add SELinux to GRUB configuration?
 To enable SELinux, GRUB must pass the correct options to the kernel.
 Should this script automatically add the proper entries to your bootloader?

";
$elem["selinux/updategrub"]["descriptionde"]="";
$elem["selinux/updategrub"]["descriptionfr"]="";
$elem["selinux/updategrub"]["default"]="true";
$elem["selinux/enforcement"]["type"]="select";
$elem["selinux/enforcement"]["choices"][1]="Use Config File";
$elem["selinux/enforcement"]["choices"][2]="Enforcing";
$elem["selinux/enforcement"]["description"]="Choose SELinux Enforcement.
 By default, SELinux enforcement is specified in /etc/selinux/config.
 This can be overridden by a kernel option.  What enforcement behavior
 should be used?

";
$elem["selinux/enforcement"]["descriptionde"]="";
$elem["selinux/enforcement"]["descriptionfr"]="";
$elem["selinux/enforcement"]["default"]="Use Config File";
$elem["selinux/grub"]["type"]="string";
$elem["selinux/grub"]["description"]="Select GRUB menu file
 Which GRUB menu file should be modified?  This file will be updated with
 the new SELinux settings.

";
$elem["selinux/grub"]["descriptionde"]="";
$elem["selinux/grub"]["descriptionfr"]="";
$elem["selinux/grub"]["default"]="";
$elem["selinux/defopt"]["type"]="string";
$elem["selinux/defopt"]["description"]="Review kernel options.
 The following string will be passed to your kernel by the bootloader.
 Review it and make changes as necessary before it is applied.

";
$elem["selinux/defopt"]["descriptionde"]="";
$elem["selinux/defopt"]["descriptionfr"]="";
$elem["selinux/defopt"]["default"]="";
$elem["selinux/uninstall"]["type"]="note";
$elem["selinux/uninstall"]["description"]="SELinux uninstall
 SELinux has been removed from this system.  Do not forget to remove
 it from your bootloader (probably by modifying the defoptions line in
 /boot/grub/menu.lst, and then running update-grub), and then reboot
 to deactivate SELinux.

";
$elem["selinux/uninstall"]["descriptionde"]="";
$elem["selinux/uninstall"]["descriptionfr"]="";
$elem["selinux/uninstall"]["default"]="";
$elem["selinux/reboot"]["type"]="note";
$elem["selinux/reboot"]["description"]="Reboot needed to finish configuration.
 This system needs to be rebooted so that the changes to SELinux will
 go into effect.

";
$elem["selinux/reboot"]["descriptionde"]="";
$elem["selinux/reboot"]["descriptionfr"]="";
$elem["selinux/reboot"]["default"]="";
PKG_OptionPageTail2($elem);
?>
