<span class="title">autoTestHacks</span><br><br>

<?
	include('/m23/inc/autoTest.php');

	if (HTML_submit('BUT_createLDAPUserAndGroup', 'AUTOTEST_createLDAPUserAndGroup'))
		AUTOTEST_createLDAPUserAndGroup();

	MSG_showMessageBoxPlaceholder();

	HTML_showTableHeader();
	echo('<tr><td>');
	HTML_showFormHeader();

	HTML_setPage('autoTestHacks');
	
	echo(BUT_createLDAPUserAndGroup);

	HTML_showFormEnd();
	echo('</td></tr>');
	HTML_showTableEnd();

	help_showhelp('autoTestHacks');
?>
