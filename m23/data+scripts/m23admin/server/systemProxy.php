<span class="title"> <?PHP echo($I18N_systemProxy);?> </span><br><br>

<?
	HTML_setPage('systemProxy');

	HTML_showTableHeader();
	echo('<tr><td>');
	HTML_showFormHeader();

	$OSystemProxy = new CSystemProxy();
	$OSystemProxy->showProxyDialog();

	HTML_showFormEnd();
	echo('</td></tr>');
	HTML_showTableEnd();

	help_showhelp('systemProxy');
?>