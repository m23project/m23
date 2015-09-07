<span class="title"><?PHP echo ($I18N_themeChoice.'</span><br><br>');


	HTML_showFormHeader();
 	HTML_setPage("themeChoice");

	echo(H_MESSAGEBOXPLACEHOLDER);

	HTML_showTableHeader();

	echo("<tr>
				<td valign=\"middle\">");
				echo (SEL_cssSelection);
		echo("	</td>
		</tr>
		<tr>
				<td align=\"center\">");
		echo (BUT_cssSelectOK);
		echo ("</td>
		</tr>	
	");

	HTML_showTableEnd();
	HTML_showFormEnd();
	HELP_showHelp("themeChoice");
?>