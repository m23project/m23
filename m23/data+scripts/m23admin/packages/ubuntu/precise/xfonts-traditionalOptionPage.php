<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xfonts-traditional");

$elem["xfonts-traditional/generate"]["type"]="boolean";
$elem["xfonts-traditional/generate"]["description"]="Generate traditional versions of fonts?
 xfonts-traditional can automatically generate traditional versions
 (with foundry \"Trad\" instead of \"Misc\" of all fonts for which it has
 an idea about the glyphs.  (Currently this is versions of 6x13, aka
 \"fixed\").
 .
 But you may prefer not to do this automatically, and would rather
 just have the tool installed.

";
$elem["xfonts-traditional/generate"]["descriptionde"]="";
$elem["xfonts-traditional/generate"]["descriptionfr"]="";
$elem["xfonts-traditional/generate"]["default"]="true";
$elem["xfonts-traditional/reconfigure-xterm"]["type"]="boolean";
$elem["xfonts-traditional/reconfigure-xterm"]["description"]="Configure xterm to use traditional font?
 You can have the xterm default UTF-8 font changed to the traditional 
 version.
 .
 If you approve, I will edit /etc/X11/app-default/XTerm for you, and
 save your old file as XTerm.backup.not-trad.  (Note that this is a
 conffile so you may get prompts from dpkg about it in the future.)
 .
 Alternatively, if you do not want me to change the default, I will
 generate XTerm.trad for you to do what you like with.
 .
 To revert the change, simply change the key \"*VT100.utf8Fonts.font\"
 back from \"-trad-...\"  to \"-misc-...\", or rename the old file back
 into place.

";
$elem["xfonts-traditional/reconfigure-xterm"]["descriptionde"]="";
$elem["xfonts-traditional/reconfigure-xterm"]["descriptionfr"]="";
$elem["xfonts-traditional/reconfigure-xterm"]["default"]="false";
$elem["xfonts-traditional/remap-fixed"]["type"]="boolean";
$elem["xfonts-traditional/remap-fixed"]["description"]="Configure system to use traditional \"fixed\"?
 You can have the font alias \"fixed\" remapped to the traditional version.
 .
 If you approve, I will edit /etc/X11/fonts/misc/xfonts-base.alias for
 you, and save your old file as xfonts-base.alias.backup.not-trad.
 (Note that this is a conffile so you may get prompts from dpkg about
 it in the future.)
 .
 Alternatively, if you do not want me to change the default, I will
 generate xfonts-base-alias.trad for you to do what you like with.
 .
 To revert the change to the default, simply change the alias \"fixed\"
 back from \"-trad-...\"  to \"-misc-...\", or rename the old file back
 into place.

";
$elem["xfonts-traditional/remap-fixed"]["descriptionde"]="";
$elem["xfonts-traditional/remap-fixed"]["descriptionfr"]="";
$elem["xfonts-traditional/remap-fixed"]["default"]="false";
$elem["xfonts-traditional/confirm-break-remove"]["type"]="boolean";
$elem["xfonts-traditional/confirm-break-remove"]["description"]="Remove anyway, breaking \"fixed\" and your X server?
 Removing xfonts-traditional would break your X server by removing \"fixed\".
 .
 You should not remove xfonts-traditional while \"fixed\" refers to one
 of its fonts.  You probably want to check the differences between the
 various /etc/X11/fonts/misc/xfonts-base.alias*, reconcile any changes,
 and then run \"update-fonts-alias misc\".  After that you can retry the
 removal.
";
$elem["xfonts-traditional/confirm-break-remove"]["descriptionde"]="";
$elem["xfonts-traditional/confirm-break-remove"]["descriptionfr"]="";
$elem["xfonts-traditional/confirm-break-remove"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
