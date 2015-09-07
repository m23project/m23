<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xfonts-traditional");

$elem["xfonts-traditional/generate"]["type"]="boolean";
$elem["xfonts-traditional/generate"]["description"]="Generate traditional versions of fonts?
 xfonts-traditional can automatically generate traditional versions
 (with foundry \"Trad\" instead of \"Misc\") of all fonts for which it has
 an idea about the glyphs.  (Currently this is versions of 6x13, aka
 \"fixed\".)
 .
 But you may prefer not to do this automatically, and would rather
 just have the tool installed.
";
$elem["xfonts-traditional/generate"]["descriptionde"]="Traditionelle Versionen von Schriften erzeugen?
 Mit Xfonts-traditional ist es möglich, automatisch traditionelle Versionen (mit der Einstellung »Trad« anstelle von »Misc«) von allen Schriften zu erzeugen, bei denen klar ist, was getan werden muss. Aktuell bedeutet dies Versionen von 6x13, die auch als »fixed« bekannt sind.
 .
 Aber vielleicht ziehen Sie es vor, das Werkzeug installiert zu haben, ohne dies automatisch zu tun.
";
$elem["xfonts-traditional/generate"]["descriptionfr"]="Faut-il créer des versions traditionnelles des polices ?
 Avec xfonts-traditional, il est possible de créer automatiquement des versions traditionnelles (avec la fonderie « Trad » à la place de « Misc ») de toutes les polices pour lesquelles ce qui doit être fait est clairement défini. Actuellement cela concerne les versions de 6x13, également connues comme « fixed ».
 .
 Vous pourriez préférer que cette création ne soit pas automatique et simplement disposer de l'outil nécessaire.
";
$elem["xfonts-traditional/generate"]["default"]="true";
$elem["xfonts-traditional/reconfigure-xterm"]["type"]="boolean";
$elem["xfonts-traditional/reconfigure-xterm"]["description"]="Configure xterm to use traditional fonts?
 You can have the xterm default UTF-8 font changed to the traditional
 version.
 .
 If you approve, I will edit /etc/X11/app-default/XTerm for you, and
 save your old file as XTerm.backup.not-trad.  (Note that this is a
 conffile so you may get prompts from dpkg about it in the future.)
 .
 Alternatively, if you do not want me to change the default, I will
 generate the file XTerm.trad, but it will not be used.
 .
 To revert the change, simply change the key \"*VT100.utf8Fonts.font\"
 back from \"-trad-...\" to \"-misc-...\", or rename the old file back
 into place.
";
$elem["xfonts-traditional/reconfigure-xterm"]["descriptionde"]="Xterm konfigurieren, um traditionelle Schrift zu verwenden?
 Sie können die Standard-UTF-8-Schrift von Xterm in die traditionelle Version ändern.
 .
 Die Auswahl dieser Option wird /etc/X11/app-defaults/XTerm verändern und die alte Datei als XTerm.backup.not-trad aufheben. Da dies eine Konfigurationsdatei ist, könnte es sein, dass Sie in Zukunft diesbezügliche Fragen von Dpkg erhalten.
 .
 Alternativ, wenn Sie die Vorgabe nicht ändern möchten, wird XTerm.trad erstellt aber nicht benutzt.
 .
 Um die Änderung zurückzunehmen, ändern Sie einfach den Schlüssel »*VT100.utf8Fonts.font« zurück von »-trad-…« in »-misc-…« oder benennen die alte Datei an dieser Stelle wieder um.
";
$elem["xfonts-traditional/reconfigure-xterm"]["descriptionfr"]="Configurer xterm pour utiliser les polices traditionnelles ?
 Il est possible de changer la police UTF-8 par défaut de xterm pour la version traditionnelle.
 .
 Choisir cette option modifiera le fichier /etc/X11/app-defaults/XTerm, tout en préservant les anciens fichiers en tant que XTerm.backup.not-trad. Comme il s'agit d'un fichier de configuration, il se peut que dpkg vous pose des questions à l'avenir.
 .
 Alternativement, si vous ne changez pas la valeur par défaut, XTerm.trad sera créé, mais non utilisé.
 .
 Pour annuler les changements, il suffit de modifier la clé « *VT100.utf8Fonts.font » de « -trad-... » vers « -misc-... », ou redonner son nom d'origine à l'ancien fichier.
";
$elem["xfonts-traditional/reconfigure-xterm"]["default"]="false";
$elem["xfonts-traditional/remap-fixed"]["type"]="boolean";
$elem["xfonts-traditional/remap-fixed"]["description"]="Configure system to use traditional \"fixed\"?
 I can remap the font alias \"fixed\" to the traditional version.
 .
 If you approve, I will edit /etc/X11/fonts/misc/xfonts-base.alias for
 you, and save your old file as xfonts-base.alias.backup.not-trad.
 (Note that this is a conffile, so you may get prompts from dpkg about
 it in the future.)
 .
 Alternatively, if you do not want me to change the default, I will
 generate xfonts-base-alias.trad for you to do what you like with.
 .
 To revert this change, simply change the alias \"fixed\" back from
 \"-trad-...\"  to \"-misc-...\", or rename the old file back into place.
";
$elem["xfonts-traditional/remap-fixed"]["descriptionde"]="System konfigurieren, um traditionelles »fixed« zu verwenden?
 Der Schriftalias »fixed« kann wieder auf die traditionelle Version abgebildet werden.
 .
 Die Auswahl dieser Version wird /etc/X11/fonts/misc/xfonts-base.alias verändern und die alte Datei als xfonts-base.alias.backup.not-trad aufheben. Da dies eine Konfigurationsdatei ist, könnte es sein, dass Sie in Zukunft diesbezügliche Fragen von Dpkg erhalten.
 .
 Alternativ, wenn Sie die Vorgabe ändern nicht möchten, wird xfonts-base-alias.trad erstellt aber nicht benutzt.
 .
 Um die Änderung zurückzunehmen, ändern Sie einfach den Alias »fixed« zurück von »-trad-…« in »-misc-…« oder benennen die alte Datei an dieser Stelle wieder um.
";
$elem["xfonts-traditional/remap-fixed"]["descriptionfr"]="Faut-il configurer le système pour utiliser la police « fixed » traditionnelle ?
 La police « fixed » peut être redirigée vers la version traditionnelle.
 .
 Choisir cette option modifiera le fichier /etc/X11/fonts/misc/xfonts-base.alias, tout en préservant les anciens fichiers en tant que xfonts-base.alias.backup.not-trad. Comme il s'agit d'un fichier de configuration, il se peut que dpkg vous pose des questions à l'avenir.
 .
 Alternativement, si vous ne changez pas la valeur par défaut,  xfonts-base-alias.trad sera créé, mais non utilisé.
 .
 Pour annuler les changements, il suffit de modifier l'alias « fixed » de « -trad-... » vers « -misc-... », ou redonner son nom d'origine à l'ancien fichier.
";
$elem["xfonts-traditional/remap-fixed"]["default"]="false";
$elem["xfonts-traditional/confirm-break-remove"]["type"]="boolean";
$elem["xfonts-traditional/confirm-break-remove"]["description"]="Remove xfonts-traditional, breaking \"fixed\" and your X server?
 Removing xfonts-traditional would break your X server by removing \"fixed\".
 .
 You should not remove xfonts-traditional while \"fixed\" refers to one
 of its fonts.  You probably want to check the differences between the
 various /etc/X11/fonts/misc/xfonts-base.alias*, reconcile any changes,
 and then run \"update-fonts-alias misc\".  After that you can retry the
 removal.
";
$elem["xfonts-traditional/confirm-break-remove"]["descriptionde"]="Xfonts-traditional entfernen, »fixed« und den X-Server beschädigen?
 Xfonts-traditional zu entfernen würde den X-Server durch Entfernen von »fixed« beschädigen.
 .
 Sie sollten Xfonts-traditional nicht entfernen, während sich »fixed« auf eine seiner Schriften bezieht. Zuerst müssen Sie die Unterschiede zwischen den verschiedenen /etc/X11/fonts/misc/xfonts-base.alias* prüfen, alle Änderungen abstimmen und dann »update-fonts-alias misc« ausführen.
";
$elem["xfonts-traditional/confirm-break-remove"]["descriptionfr"]="Faut-il supprimer xfonts-traditional et changer la police « fixed » et le serveur X ?
 La suppression de xfonts-traditional va endommager le serveur X en supprimant la police « fixed ».
 .
 Vous ne devriez pas supprimer xfonts-traditional tant que « fixed » est un lien vers l'une de ses polices. Vous devez d'abord analyser les différences entre les différentes versions de /etc/X11/fonts/misc/xfonts-base.alias*, consolider les éventuels changements, et exécuter « update-fonts-alias misc ».
";
$elem["xfonts-traditional/confirm-break-remove"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
