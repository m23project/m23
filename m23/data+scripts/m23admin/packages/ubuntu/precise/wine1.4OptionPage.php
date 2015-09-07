<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wine1.4");

$elem["wine/memory"]["type"]="select";
$elem["wine/memory"]["choices"][1]="normal";
$elem["wine/memory"]["description"]="What memory range should be used?
 When Wine runs most applications (Win32), it only needs access to normal
 application memory ranges.  Some applications (Win16) require access to
 the zero-page of memory, which is reserved for administrative purposes.
 .
 Allowing access to the zero-page of memory weakens system security by
 allowing for a class of kernel security exploits that can elevate a
 normal user process to root privileges by using the zero-page of memory.
 Because of this, the \"zeropage\" option is not recommended.  However,
 there are some Wine applications that require this setting.
 .
 For more information, see http://wiki.debian.org/mmap_min_addr
 .
 If unsure, choose \"normal\".
";
$elem["wine/memory"]["descriptionde"]="";
$elem["wine/memory"]["descriptionfr"]="";
$elem["wine/memory"]["default"]="normal";
PKG_OptionPageTail2($elem);
?>
