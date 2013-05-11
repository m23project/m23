<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-image-2.6.26-2-vserver-686");

$elem["linux-image-2.6.26-2-vserver-686/preinst/initrd-2.6.26-2-vserver-686"]["type"]="text";
$elem["linux-image-2.6.26-2-vserver-686/preinst/initrd-2.6.26-2-vserver-686"]["description"]="Initial RAMdisk image generation impossible
 You are attempting to install an initrd kernel image (version
 2.6.26-2-vserver-686) on a machine currently running kernel version
 ${hostversion}.
 .
 No suitable tool for generating initrd images was found in
 ${ramdisk} and therefore no initrd image can be generated.
 This will break the installation, unless such tools are also being installed
 right now. Suitable tools:
 .
 ${initrddep}

";
$elem["linux-image-2.6.26-2-vserver-686/preinst/initrd-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/initrd-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/initrd-2.6.26-2-vserver-686"]["default"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/bootloader-initrd-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/preinst/bootloader-initrd-2.6.26-2-vserver-686"]["description"]="Abort initrd kernel image installation?
 You are attempting to install an initrd kernel image (version 2.6.26-2-vserver-686).
 This will not work unless the boot loader is configured to use an
 initrd.
 .
 An initrd image is a kernel image that expects to use an INITial
 Ram Disk to mount a minimal root file system into RAM and use that for
 booting.
 .
 The boot loader must be configured to use such images and the system will not
 boot until this is done.
 .
 This message will appear for any new kernel installation unless the
 following is added to /etc/kernel-img.conf:
 .
 \"do_initrd = Yes\"

";
$elem["linux-image-2.6.26-2-vserver-686/preinst/bootloader-initrd-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/bootloader-initrd-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/bootloader-initrd-2.6.26-2-vserver-686"]["default"]="true";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-initrd-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-initrd-2.6.26-2-vserver-686"]["description"]="Abort initrd kernel image installation?
 You are attempting to install an initrd kernel image (version 2.6.26-2-vserver-686).
 This will not work unless the boot loader is configured to use an
 initrd.
 .
 In order to configure LILO, you need to add
 'initrd=/initrd.img' to the image=/vmlinuz stanza of /etc/lilo.conf.
 .
 The boot loader must be configured to use such images and the system will not
 boot until this is done.
 .
 This message will appear for any new kernel installation unless the
 following is added to /etc/kernel-img.conf:
 .
 \"do_initrd = Yes\"

";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-initrd-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-initrd-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-initrd-2.6.26-2-vserver-686"]["default"]="true";
$elem["linux-image-2.6.26-2-vserver-686/preinst/elilo-initrd-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/preinst/elilo-initrd-2.6.26-2-vserver-686"]["description"]="Abort initrd kernel image installation?
 You are attempting to install an initrd kernel image (version 2.6.26-2-vserver-686).
 This will not work unless the boot loader is configured to use an
 initrd.
 .
 In order to configure LILO, you need to add
 'initrd=/initrd.img' to the image=/vmlinuz stanza of /etc/elilo.conf.
 .
 The boot loader must be configured to use such images and the system will not
 boot until this is done.
 .
 This message will appear for any new kernel installation unless the
 following is added to /etc/kernel-img.conf:
 .
 \"do_initrd = Yes\"

";
$elem["linux-image-2.6.26-2-vserver-686/preinst/elilo-initrd-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/elilo-initrd-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/elilo-initrd-2.6.26-2-vserver-686"]["default"]="true";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-has-ramdisk"]["type"]="text";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-has-ramdisk"]["description"]="Removal of 'ramdisk' in /etc/lilo.conf
 The following line in /etc/lilo.conf should be removed or commented out,
 since the system uses initrd (or initramfs):
 .
 ${LINE}

";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-has-ramdisk"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-has-ramdisk"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/lilo-has-ramdisk"]["default"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-install-2.6.26-2-vserver-686"]["type"]="note";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-install-2.6.26-2-vserver-686"]["description"]="Aborting install of unsupported initrd kernel image
 You are attempting to install an initrd kernel image (version 2.6.26-2-vserver-686).
 This will not work unless the boot loader is configured to use an
 initrd.
 .
 An initrd image is a kernel image that expects to use an INITial
 Ram Disk to mount a minimal root file system into RAM and use that for
 booting.
 .
 As the question that's relevant for this situation
 was not shown, linux-image-2.6.26-2-vserver-686 installation has been aborted.

";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-install-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-install-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-install-2.6.26-2-vserver-686"]["default"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/failed-to-move-modules-2.6.26-2-vserver-686"]["type"]="note";
$elem["linux-image-2.6.26-2-vserver-686/preinst/failed-to-move-modules-2.6.26-2-vserver-686"]["description"]="Modules removal failure
 You are attempting to install a kernel image (version 2.6.26-2-vserver-686).
 However, the directory ${modules_base}/2.6.26-2-vserver-686/kernel still exists.
 .
 An attempt was made to move the directory. However, that
 action failed and ${modules_base}/2.6.26-2-vserver-686 could not be moved to
 ${modules_base}/${dest}.
 .
 You should move $modules_base/$version manually
 and try re-installing this image.

";
$elem["linux-image-2.6.26-2-vserver-686/preinst/failed-to-move-modules-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/failed-to-move-modules-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/failed-to-move-modules-2.6.26-2-vserver-686"]["default"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/overwriting-modules-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/preinst/overwriting-modules-2.6.26-2-vserver-686"]["description"]="Abort installation since the kernel-image is already installed?
 You are attempting to install a kernel image (version 2.6.26-2-vserver-686).
 However, the directory ${modules_base}/2.6.26-2-vserver-686/kernel still exists.
 .
 If this directory belongs to a previous ${package} package, and if
 you have deselected some modules, or installed standalone modules
 packages, this could have unexpected consequences.
 .
 If ${modules_base}/2.6.26-2-vserver-686/kernel belongs to an old install of
 ${package}, you can now abort the
 installation of this kernel image (nothing has been changed yet).
 .
 It is recommended to abort the installation unless you are
 sure of what you are doing.
 .
 If you abort the installation, you should then move
 ${modules_base}/2.6.26-2-vserver-686/kernel (for instance as
 ${modules_base}/2.6.26-2-vserver-686.kernel.old) and then try
 re-installing this image.

";
$elem["linux-image-2.6.26-2-vserver-686/preinst/overwriting-modules-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/overwriting-modules-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/overwriting-modules-2.6.26-2-vserver-686"]["default"]="true";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-overwrite-2.6.26-2-vserver-686"]["type"]="note";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-overwrite-2.6.26-2-vserver-686"]["description"]="Aborting installation since modules exist
 You are attempting to install an initrd kernel image (version
 2.6.26-2-vserver-686).
 .
 However, the corresponding kernel modules directory exists,
 and there was no permission given to silently delete the modules
 directory.
 .
 As the question that's relevant for this situation
 was not shown, linux-image-2.6.26-2-vserver-686 installation has been aborted.

";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-overwrite-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-overwrite-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/preinst/abort-overwrite-2.6.26-2-vserver-686"]["default"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/create-kimage-link-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/postinst/create-kimage-link-2.6.26-2-vserver-686"]["description"]="Create a symbolic link to the current kernel image?
 There is no ${kimage} symbolic link.
 .
 Such a link can be created now and will be updated by subsequently
 installed image packages. This will be useful with some boot loaders
 such as LILO.

";
$elem["linux-image-2.6.26-2-vserver-686/postinst/create-kimage-link-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/create-kimage-link-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/create-kimage-link-2.6.26-2-vserver-686"]["default"]="true";
$elem["linux-image-2.6.26-2-vserver-686/postinst/kimage-is-a-directory"]["type"]="note";
$elem["linux-image-2.6.26-2-vserver-686/postinst/kimage-is-a-directory"]["description"]="Image symbolic link destination is a directory, aborting
 ${kimage} is a directory, which is unepected. There is no method to
 handle that situation automatically and the kernel image
 installation has been aborted.

";
$elem["linux-image-2.6.26-2-vserver-686/postinst/kimage-is-a-directory"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/kimage-is-a-directory"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/kimage-is-a-directory"]["default"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-2.6.26-2-vserver-686"]["description"]="Abort installation after depmod error?
 The 'depmod' command exited with the exit code ${exit_value}
 (${SIGNAL}${CORE}).
 .
 This may be benign, for instance because of versioned symbol names.
 .
 Please choose whether the installation should be aborted or the error
 just ignored.

";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-2.6.26-2-vserver-686"]["default"]="false";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-initrd-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-initrd-2.6.26-2-vserver-686"]["description"]="Abort installation after depmod error?
 The 'depmod' command exited with the exit code ${exit_value}
 (${SIGNAL}${CORE}).
 .
 Since this image uses initrd, the ${modules_base}/2.6.26-2-vserver-686/modules.dep file
 will not be deleted, even though it may be invalid.
 .
 You should abort the installation and fix the
 errors in depmod, or regenerate the initrd image with a known good
 modules.dep file. If you don't abort the installation, there is
 a danger that the system will fail to boot.

";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-initrd-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-initrd-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/depmod-error-initrd-2.6.26-2-vserver-686"]["default"]="false";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-initrd-link-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-initrd-link-2.6.26-2-vserver-686"]["description"]="Should the old initrd link be deleted now?
 There is an old initrd symbolic link in place. The name of
 the symbolic link is being changed to initrd.img. If the old link is
 deleted, you may have to update the boot loader. If the link is left in
 place, it will point to the wrong image.

";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-initrd-link-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-initrd-link-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-initrd-link-2.6.26-2-vserver-686"]["default"]="true";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-dir-initrd-link-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-dir-initrd-link-2.6.26-2-vserver-686"]["description"]="Should the old initrd link be deleted now?
 There is an old ${image_dir}/initrd symbolic link in
 place. The location of the symbolic link is now the same location as
 the kernel image symbolic links, in ${image_dest}. If the old
 link is deleted, you may have to update the boot loader. If the link
 is left in place, it will point to the wrong image.

";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-dir-initrd-link-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-dir-initrd-link-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-dir-initrd-link-2.6.26-2-vserver-686"]["default"]="true";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-system-map-link-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-system-map-link-2.6.26-2-vserver-686"]["description"]="Should the old /System.map link be deleted now?
 There is a /System.map symbolic link. Such links were installed by ancient
 kernel image packages.
 .
 However, all the programs that look at the
 information in the map files (including top, ps, and klogd)
 will also look at /boot/System.map-2.6.26-2-vserver-686.
 .
 Some programs may however give priority to /System.map and it
 is therefore recommended to delete that link.

";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-system-map-link-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-system-map-link-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/old-system-map-link-2.6.26-2-vserver-686"]["default"]="true";
$elem["shared/kernel-image/really-run-bootloader"]["type"]="boolean";
$elem["shared/kernel-image/really-run-bootloader"]["description"]="Run the default boot loader?
 The default boot loader for this architecture is $loader, which is
 present.
 .
 However, there is no explicit request to run that boot loader in
 /etc/kernel-img.conf while GRUB seems to be installed with
 a postinst hook set.
 .
 It thus seems that this system is using GRUB as
 boot loader instead of $loader.
 .
 Please choose which should run: the default boot loader now, or the
 GRUB update later.

";
$elem["shared/kernel-image/really-run-bootloader"]["descriptionde"]="";
$elem["shared/kernel-image/really-run-bootloader"]["descriptionfr"]="";
$elem["shared/kernel-image/really-run-bootloader"]["default"]="true";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-test-error-2.6.26-2-vserver-686"]["type"]="note";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-test-error-2.6.26-2-vserver-686"]["description"]="Error running the boot loader in test mode
 An error occurred while running the ${loader} boot loader in test mode.
 .
 A log is available in ${temp_file_name}. Please edit /etc/${loader}.conf
 manually and re-run ${loader} to fix that issue and keep this system
 bootable.

";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-test-error-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-test-error-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-test-error-2.6.26-2-vserver-686"]["default"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-error-2.6.26-2-vserver-686"]["type"]="note";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-error-2.6.26-2-vserver-686"]["description"]="Error running the boot loader
 An error occurred while running the ${loader} boot loader.
 .
 A log is available in ${temp_file_name}. Please edit /etc/${loader}.conf
 manually and re-run ${loader} to fix that issue and keep this system
 bootable.

";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-error-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-error-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/postinst/bootloader-error-2.6.26-2-vserver-686"]["default"]="";
$elem["linux-image-2.6.26-2-vserver-686/prerm/removing-running-kernel-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/prerm/removing-running-kernel-2.6.26-2-vserver-686"]["description"]="Abort kernel removal?
 You are running a kernel (version ${running}) and attempting to remove
 the same version.
 .
 This can make the system unbootable as it will remove
 /boot/vmlinuz-${running} and all modules under the directory
 /lib/modules/${running}. This can only be fixed with a copy of the
 kernel image and the corresponding modules.
 .
 It is highly recommended to abort the kernel removal unless you are
 prepared to fix the system after removal.

";
$elem["linux-image-2.6.26-2-vserver-686/prerm/removing-running-kernel-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/prerm/removing-running-kernel-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/prerm/removing-running-kernel-2.6.26-2-vserver-686"]["default"]="true";
$elem["linux-image-2.6.26-2-vserver-686/prerm/would-invalidate-boot-loader-2.6.26-2-vserver-686"]["type"]="boolean";
$elem["linux-image-2.6.26-2-vserver-686/prerm/would-invalidate-boot-loader-2.6.26-2-vserver-686"]["description"]="Abort kernel removal?
 This system uses a valid /etc/${loader}.conf file that mentions
 ${kimage}-2.6.26-2-vserver-686. Removing linux-image-2.6.26-2-vserver-686 will invalidate
 that file.
 .
 You will need to edit /etc/${loader}.conf or re-target
 symbolic links mentioned there (typically, /vmlinuz and /vmlinuz.old)
 to not refer to ${kimage}-2.6.26-2-vserver-686. Then, you will have to re-run ${loader}.
 .
 It is highly recommended to abort the kernel removal unless you are
 prepared to fix the system after removal.
";
$elem["linux-image-2.6.26-2-vserver-686/prerm/would-invalidate-boot-loader-2.6.26-2-vserver-686"]["descriptionde"]="";
$elem["linux-image-2.6.26-2-vserver-686/prerm/would-invalidate-boot-loader-2.6.26-2-vserver-686"]["descriptionfr"]="";
$elem["linux-image-2.6.26-2-vserver-686/prerm/would-invalidate-boot-loader-2.6.26-2-vserver-686"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
