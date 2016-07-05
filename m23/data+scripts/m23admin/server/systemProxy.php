<span class="title"> <?PHP echo($I18N_systemProxy);?> </span><br><br>

<?
	HTML_showTableHeader();
	echo('<tr><td>');
	HTML_showFormHeader();

	HTML_setPage('systemProxy');
	$OSystemProxy = new CSystemProxy();
	$OSystemProxy->showProxyDialog();

	HTML_showFormEnd();
	echo('</td></tr>');
	HTML_showTableEnd();

	help_showhelp('systemProxy');
?>