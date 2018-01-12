<span class="title"> <?PHP echo($I18N_xhprof);?> </span><br><br>

<?
	MSG_showMessageBoxPlaceholder();

	HTML_showTableHeader();
	echo('<tr><td>');
	HTML_showFormHeader();

	HTML_setPage('xhprof');
	$OXhprof = new CXhprof();
	$OXhprof->showXhprofDialog();

	HTML_showFormEnd();
	echo('</td></tr>');
	HTML_showTableEnd();

	help_showhelp('xhprof');
?>
