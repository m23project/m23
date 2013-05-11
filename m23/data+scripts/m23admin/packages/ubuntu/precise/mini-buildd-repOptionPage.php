<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mini-buildd-rep");

$elem["mini-buildd-rep/mbd_id"]["type"]="string";
$elem["mini-buildd-rep/mbd_id"]["description"]="Mini-buildd's identity:
 Identity of the mini-buildd network.
 .
 The identity is used on several places; most importantly, the
 distributions created will be called \"BASEDIST-ID\". For version
 strings, it plays the same role as \"bpo\" as used by
 backports.org.
 .
 Should be a short mnemonic made with letters only.

";
$elem["mini-buildd-rep/mbd_id"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_id"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_id"]["default"]="";
$elem["mini-buildd-rep/mbd_rephost"]["type"]="string";
$elem["mini-buildd-rep/mbd_rephost"]["description"]="Repository host name:
 Give the repository's host name; this is usually just the
 hostname you get via \"hostname -f\". This will be used to create
 URLs for HTTP access, and for ssh/scp commands.

";
$elem["mini-buildd-rep/mbd_rephost"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_rephost"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_rephost"]["default"]="";
$elem["mini-buildd-rep/mbd_httpport"]["type"]="string";
$elem["mini-buildd-rep/mbd_httpport"]["description"]="HTTP port to use:
 If you use a dedicated HTTP server not using a standard port;
 note that the whole network (i.e., build hosts too) must use
 that port.

";
$elem["mini-buildd-rep/mbd_httpport"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_httpport"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_httpport"]["default"]="80";
$elem["mini-buildd-rep/mbd_sshport"]["type"]="string";
$elem["mini-buildd-rep/mbd_sshport"]["description"]="SSH port to use:
 If you use a dedicated SSH server not using a standard port;
 note that the whole network (i.e., build hosts too) must use
 that port.

";
$elem["mini-buildd-rep/mbd_sshport"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_sshport"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_sshport"]["default"]="22";
$elem["mini-buildd-rep/mbd_mail"]["type"]="string";
$elem["mini-buildd-rep/mbd_mail"]["description"]="Mail address (uploads/builds/failures):
 All install, failure or log mails go here; usually, it's a good
 idea to set up a mailing list for that.

";
$elem["mini-buildd-rep/mbd_mail"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_mail"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_mail"]["default"]="";
$elem["mini-buildd-rep/mbd_extdocurl"]["type"]="string";
$elem["mini-buildd-rep/mbd_extdocurl"]["description"]="External documentation URL:
 URL to external documentation.
 .
 This is just for convenience to provide a link to that URL on
 the overview page; just leave empty if you don't have any.

";
$elem["mini-buildd-rep/mbd_extdocurl"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_extdocurl"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_extdocurl"]["default"]="";
$elem["mini-buildd-rep/mbd_dists"]["type"]="multiselect";
$elem["mini-buildd-rep/mbd_dists"]["description"]="Base distributions to support:
 Space separated list of base distributions to support.

";
$elem["mini-buildd-rep/mbd_dists"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_dists"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_dists"]["default"]="";
$elem["mini-buildd-rep/mbd_archs"]["type"]="multiselect";
$elem["mini-buildd-rep/mbd_archs"]["description"]="Architectures to support:

";
$elem["mini-buildd-rep/mbd_archs"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_archs"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_archs"]["default"]="";
$elem["mini-buildd-rep/mbd_apt_allow_unauthenticated"]["type"]="boolean";
$elem["mini-buildd-rep/mbd_apt_allow_unauthenticated"]["description"]="Allow unauthenticated apt?
 This flag is equivalent to the allow_unauthenticated option in
 APT or sbuild.
 .
 If you set this to false (highly recommended), you will need to
 manually add the keys for extra sources you might have
 configured (see ~/.mini-buildd/README for further instructions).
 .
 The standard Debian Keys should be managed fine by the
 *-keyring packages (the paranoid may manually check the
 fingerprints after initial chroot setups).
 .
 Set this to true only if you really trust your configured
 sources.

";
$elem["mini-buildd-rep/mbd_apt_allow_unauthenticated"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_apt_allow_unauthenticated"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_apt_allow_unauthenticated"]["default"]="false";
$elem["mini-buildd-rep/mbd_archall"]["type"]="select";
$elem["mini-buildd-rep/mbd_archall"]["description"]="Arch of builder to build non-arch binary packages:
 One builder machine must have the role of compiling arch=all
 binary packages; please specify that architecture here.

";
$elem["mini-buildd-rep/mbd_archall"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_archall"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_archall"]["default"]="";
$elem["mini-buildd-rep/mbd_source"]["type"]="string";
$elem["mini-buildd-rep/mbd_source"]["description"]="\"${KIND}\" sources for architecture \"${ARCH}\":
 Apt sources for \"${DIST}\": ${DESC}
 .
 Notes:
  * To specify more than one source, separate them with \",\".
  * With PIN and PRIO you may optionally set an apt-pin; useful
    if an extra source is not in \"not-automatic\" mode.
  * Give arch-specific sources only if needed (\"any\" is
    fallback).
  .
  Syntax: Apt sources line without leading \"deb \"[;PIN;PRIO][,...]
  Example: ${EXAMPLE}

";
$elem["mini-buildd-rep/mbd_source"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_source"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_source"]["default"]="";
$elem["mini-buildd-rep/mbd_bldhost"]["type"]="string";
$elem["mini-buildd-rep/mbd_bldhost"]["description"]="Build host for architecture ${ARCH}:
 Build hosts are installations of mini-buildd-bld for a specific
 architecture; they manage the chroots and building for that
 architecture.
 .
 Please give a full hostname here.
 .
 You may safely give a build host to-be here, and set it up later.

";
$elem["mini-buildd-rep/mbd_bldhost"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_bldhost"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_bldhost"]["default"]="";
$elem["mini-buildd-rep/mbd_deb_build_options"]["type"]="string";
$elem["mini-buildd-rep/mbd_deb_build_options"]["description"]="Debian build options for architecture ${ARCH}:
 Build options as defined for DEB_BUILD_OPTIONS environment
 variable (see policy, chapter 4.9.1).
 .
 The only option that is useful here is \"parallel=n\"; use this
 if you have multiple CPUs/cores for this architecture's build
 host. You will then have fast parallel builds for packages
 that support it.

";
$elem["mini-buildd-rep/mbd_deb_build_options"]["descriptionde"]="";
$elem["mini-buildd-rep/mbd_deb_build_options"]["descriptionfr"]="";
$elem["mini-buildd-rep/mbd_deb_build_options"]["default"]="";
$elem["mini-buildd-rep/overview"]["type"]="note";
$elem["mini-buildd-rep/overview"]["description"]="Repository configuration finished
 After the package installation is complete, visit the new home
 of your build network:
 .
 ${URL}
 .
 (The web server may need to be manually reconfigured to allow the
 \"userdir\" option.)
 .
 Please note:
  * On initial installs, or if you configured new build hosts,
    install the package \"mini-buildd-bld\" on the appropriate hosts.
  * On reconfiguration with changes to supported dists or archs,
    reconfigure the package \"mini-buildd-bld\" on all build hosts.
";
$elem["mini-buildd-rep/overview"]["descriptionde"]="";
$elem["mini-buildd-rep/overview"]["descriptionfr"]="";
$elem["mini-buildd-rep/overview"]["default"]="";
PKG_OptionPageTail2($elem);
?>
