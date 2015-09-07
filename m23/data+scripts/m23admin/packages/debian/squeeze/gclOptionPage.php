<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gcl");

$elem["gcl/default_gcl_ansi"]["type"]="boolean";
$elem["gcl/default_gcl_ansi"]["description"]="Use the work-in-progress ANSI build by default?
 GCL is in the process of providing an ANSI compliant image in addition to
 its traditional CLtL1 image still in production use.
 .
 Please see the README.Debian file for a brief description of these terms.
 Choosing this option will determine which image will be used by default
 when executing 'gcl'.
 .
 This setting may be overridden by setting the GCL_ANSI
 environment variable to any non-empty string for the ANSI build, and to
 the empty string for the CLtL1 build, e.g. GCL_ANSI=t gcl. The
 currently enforced build flavor will be reported in the initial startup
 banner.

";
$elem["gcl/default_gcl_ansi"]["descriptionde"]="";
$elem["gcl/default_gcl_ansi"]["descriptionfr"]="";
$elem["gcl/default_gcl_ansi"]["default"]="";
$elem["gcl/default_gcl_prof"]["type"]="boolean";
$elem["gcl/default_gcl_prof"]["description"]="Use the profiling build by default?
 GCL has optional support for profiling via gprof.
 .
 Please see the documentation for si::gprof-start and si::gprof-quit
 for details. As this build is slower than builds without gprof
 support, it is not recommended for final production use.
 .
 Set the GCL_PROF environment variable to the empty string for more
 optimized builds, or any non-empty string for profiling support; e.g.
 GCL_PROF=t gcl. If profiling is enabled, this will be reported
 in the initial startup banner.
";
$elem["gcl/default_gcl_prof"]["descriptionde"]="";
$elem["gcl/default_gcl_prof"]["descriptionfr"]="";
$elem["gcl/default_gcl_prof"]["default"]="";
PKG_OptionPageTail2($elem);
?>
