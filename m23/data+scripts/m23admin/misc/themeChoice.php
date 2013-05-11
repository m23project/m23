<span class="title"><?PHP echo ($I18N_themeChoice.'</span><br><br>');


	HTML_showFormHeader();
 	HTML_setPage("themeChoice");

	print (H_MESSAGEBOXPLACEHOLDER);
 	
	HTML_showTableHeader();

	print("<tr>
				<td valign=\"middle\">");
				print (SEL_cssSelection);
		print("	</td>
		</tr>
		<tr>
				<td align=\"center\">");
		print (BUT_cssSelectOK);
		print ("</td>
		</tr>	
	");

	HTML_showTableEnd();
	HTML_showFormEnd();
	HELP_showHelp("themeChoice");

?>