<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mini-buildd-bld");

$elem["mini-buildd-bld/mbd_defer"]["type"]="boolean";
$elem["mini-buildd-bld/mbd_defer"]["description"]="Defer builder configuration?
 To configure builder hosts, the repository host must already be
 set up and configured (as all the common configuration is
 pulled from there by builder hosts).
 .
 You should defer the configuration if the mini-buildd repository host is
 not yet set up correctly. The process may be completed later by running
 \"dpkg-reconfigure mini-buildd\".
 .
 ${STATUS}

";
$elem["mini-buildd-bld/mbd_defer"]["descriptionde"]="";
$elem["mini-buildd-bld/mbd_defer"]["descriptionfr"]="";
$elem["mini-buildd-bld/mbd_defer"]["default"]="false";
$elem["mini-buildd-bld/mbd_rephttphost"]["type"]="string";
$elem["mini-buildd-bld/mbd_rephttphost"]["description"]="HTTP repository host name:
 Please enter the fully qualified host name of the repository to be
 used (the machine where mini-buildd-rep is installed). This
 will be used to retrieve the configuration of the mini-buildd network
 automatically via HTTP.
 .
 The syntax needed to specify a port number other than the default (80)
 is \"myhost.example.org:8088\".

";
$elem["mini-buildd-bld/mbd_rephttphost"]["descriptionde"]="";
$elem["mini-buildd-bld/mbd_rephttphost"]["descriptionfr"]="";
$elem["mini-buildd-bld/mbd_rephttphost"]["default"]="";
$elem["mini-buildd-bld/mbd_bldhost"]["type"]="select";
$elem["mini-buildd-bld/mbd_bldhost"]["description"]="ID for this builder:
 Please select the host name for this builder from the list of
 hosts known to mini-buildd-rep. If this host is not listed,
 you need to reconfigure mini-buildd-rep.

";
$elem["mini-buildd-bld/mbd_bldhost"]["descriptionde"]="";
$elem["mini-buildd-bld/mbd_bldhost"]["descriptionfr"]="";
$elem["mini-buildd-bld/mbd_bldhost"]["default"]="";
$elem["mini-buildd-bld/mbd_lvm_vg"]["type"]="string";
$elem["mini-buildd-bld/mbd_lvm_vg"]["description"]="LVM2 volume group to use:
 There will need to be a dedicated LVM volume group for the chroots
 to be maintained on (with schroot).
 .
 In that volume group, mini-buildd will automatically maintain
 chroots named mbd-BASEDIST-ID-ARCH (ID is the identity you
 configured in mini-buildd-rep). These names should not collide
 with existing logical volumes in that group; otherwise any
 reasonably sized volume group should work.
 .
 Possible choices are:
  * auto: an image file will be created in mini-buildd's home,
    and an LVM volume group named \"mini-buildd\" will be built using it;
  * existing or custom volume group: if this volume group doesn't
    exist now, you'll need to reconfigure this package after creating
    it.
";
$elem["mini-buildd-bld/mbd_lvm_vg"]["descriptionde"]="";
$elem["mini-buildd-bld/mbd_lvm_vg"]["descriptionfr"]="";
$elem["mini-buildd-bld/mbd_lvm_vg"]["default"]="auto";
PKG_OptionPageTail2($elem);
?>
