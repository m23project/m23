<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gclcvs");

$elem["gclcvs/default_gcl_ansi"]["type"]="boolean";
$elem["gclcvs/default_gcl_ansi"]["description"]="Use the work-in-progress ANSI build by default?
 GCL is in the process of providing an ANSI compliant image in addition to
 its traditional CLtL1 image still in production use.  Please see the
 README.Debian file for a brief description of these terms.  Setting this
 variable will determine which image you will use by default on executing
 'gclcvs'.  You can locally override this choice by setting the GCL_ANSI
 environment variable to any non-empty string for the ANSI build, and to
 the empty string for the CLtL1 build, e.g. GCL_ANSI=t gclcvs.  The
 flavor of the build in force will be reported in the initial startup
 banner.

";
$elem["gclcvs/default_gcl_ansi"]["descriptionde"]="";
$elem["gclcvs/default_gcl_ansi"]["descriptionfr"]="";
$elem["gclcvs/default_gcl_ansi"]["default"]="";
$elem["gclcvs/default_gcl_prof"]["type"]="boolean";
$elem["gclcvs/default_gcl_prof"]["description"]="Use the profiling build by default?
 GCL now has optional support for profiling via gprof.  Please see the
 documentation
 for si::gprof-start and si::gprof-quit for details. As this build is slower
 than builds without gprof support, it is not recommended for final production use.
 You can locally override the default choice made here
 by setting the
 GCL_PROF environment variable to any non-empty string for profiling
 support, and to the empty string for the more optimized builds, e.g.
 GCL_PROF=t gclcvs.  If profiling is enabled, this will be reported in
 the initial startup banner.
";
$elem["gclcvs/default_gcl_prof"]["descriptionde"]="";
$elem["gclcvs/default_gcl_prof"]["descriptionfr"]="";
$elem["gclcvs/default_gcl_prof"]["default"]="";
PKG_OptionPageTail2($elem);
?>
