<span class="title"> <?PHP echo($I18N_backupList);?> </span><br><br>

<?
HTML_showFormHeader();
SERVERBACKUP_backupOverviewDialog();
HTML_setPage("serverBackupList");
HTML_showFormEnd();
help_showhelp("serverBackupList");
?>
