<span class="title"> <?PHP echo($I18N_serverStatus);?> </span><br><br>

<?
HTML_showFormHeader();
HTML_setPage('serverStatus');
HTML_showTableHeader(true);

echo("<textarea rows=\"35\" cols=\"80\">[b]Server versions[/b]
[list][*]m23 version and patch level: $m23_version $m23_codename ($m23_patchLevel)
[*]Installation medium: ".SERVER_getInstallationMedium()."
[*]OS: ".SERVER_getOS()."
[*]Virtual machine or native: ".SERVER_checkRunInVM()."
[*]Kernel: ".SERVER_checkKernel()."
[/list]

[b]Network settings[/b]
[list][*]Internet connection check: ".(pingIP("62.75.208.76") ? "ok" : "failed")."
[*]Domain name resolution check: ".(pingIP("m23.sf.net") ? "ok" : "failed")."
[*]Download without proxy: ".SERVER_checkDownload(false)."
[*]Download with proxy: ".SERVER_checkDownload(true)."[/list]

[b]Daemons[/b]
[list][*]Apache: ".SERVER_apacheInfo()."
[*]MySQL: ".SERVER_mysqlInfo()."
[/list]

[b]Free disk space[/b]
[code]".SERVER_checkDiskFree()."[/code]
</textarea>");

HTML_showTableEnd(true);
HTML_showFormEnd();

help_showhelp("serverStatus");
?>
