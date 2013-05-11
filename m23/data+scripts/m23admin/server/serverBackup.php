<span class="title"> <?PHP echo($I18N_serverBackup);?> </span><br><br>

<?
HTML_showFormHeader();
SERVERBACKUP_showConfigurationDialog();
HTML_setPage("serverBackup");
HTML_showFormEnd();
echo("<img src=\"/gfx/info.png\"><a href=\"/m23admin/misc/helpViewer.php?helpPage=serverRestore&lang=$GLOBALS[m23_language]\">$I18N_viewAndPrintServerRestoreHelp</a><img src=\"/gfx/info.png\">");
help_showhelp("serverBackup");
?>
