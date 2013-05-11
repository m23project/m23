<span class="title"> <?PHP echo($I18N_manageGPGKeys);?> </span><br><br>

<?
HTML_showFormHeader();
HTML_setPage("manageGPGKeys");
MAIL_manageGPGKeysDialog();
HTML_showFormEnd();
help_showhelp("manageGPGKeysDialog");
?>
