<span class="title"> <?PHP echo($I18N_makeBootMedia);?> </span><br><br>

<CENTER>

<?php
	HTML_showFormHeader();
	HTML_setPage('makeBootMedia');

	//Do checking for 32 and 64 bit ISOs
	BURN_checkISO();
	BURN_checkISO("amd64");

	//Now get their sizes
	$isoSize = BURN_getISOSize();
	$isoSize64 = BURN_getISOSize("amd64");

	$burner = $_POST['burner'];

	echo('<br><br><center><span class="title">'.$I18N_downloadBootMedia.'</span></center>');
	HTML_showTableHeader();
	echo("<tr>
		<td>
			<ul>
				<li>32 bit: <a href=\"/iso/m23client.iso\">$I18N_download_iso ($isoSize)</a></li>
				<li>64 bit: <a href=\"/iso/m23client-amd64.iso\">$I18N_download_iso ($isoSize64)</a></li>
			</ul>
		</td>
	</tr>");
	HTML_showTableEnd();

	echo('<br><br><span class="title">'.$I18N_make_bootcd.'</span>');

	BURN_showLog();


	HTML_showTableHeader(true, "subtable2");
	//select burner
	echo("
	<tr>
		<td valign=\"top\">
			<span class=\"titlesmal\">$I18N_used_burner</span><br><br>".BURN_listBurners($burner)."<br><br><input type=\"submit\" name=\"BUT_select\" value=\"$I18N_select\"><br>
		</td>
	");

	$dev = BURN_getDevice($burner);
	if($dev == "")
		MSG_showError($I18N_burner_error);


	$blankMethod = $_POST['SEL_method'];

	$burnspeedMethod = $_POST['SEL_burnspeed'];

	if (isset($_POST['BUT_blank']))
		BURN_blank($dev,$blankMethod);

	if (isset($_POST['BUT_burn']))
		BURN_burn($dev,"/mdk/client/m23client-i386.iso",$burnspeedMethod);
	
	$blankList[0] = "fast";
	$blankList[1] = "all";
	
	//CD-RW blanking
	echo("
		<td valign=\"top\">
			<span class=\"titlesmal\">$I18N_blank_cdrw</span><br><br>
			".HTML_listSelection("SEL_method",$blankList,$blankMethod)."<br><br>
			<input type=\"submit\" name=\"BUT_blank\" value=\"$I18N_blank_cdrw\">
		</td>
	");

	// Burn speed (edited by Mikesch BEGINN)
	$burnspeedlist[0]="max";
	$burnspeedlist[1]="4";
	$burnspeedlist[2]="8";
	$burnspeedlist[3]="16";
	$burnspeedlist[3]="32";
	echo("
		<td align=\"center\">
			<span class=\"titlesmal\">$I18N_makeBootMedia</span><br><br>
			$I18N_burn_speed ".HTML_listSelection("SEL_burnspeed",$burnspeedlist,$burnspeedMethod)."<br><br>
			<input type=\"submit\" name=\"BUT_burn\" value=\"$I18N_burn\">
		</td>
	</tr>
	");
	HTML_showTableEnd();
	


echo("
<input type=\"hidden\" name=\"burner\" value=\"$burner\">
</CENTER>
");

HTML_showFormEnd();
?>

<BR><BR>
<?PHP HELP_showHelp("makeBootMedia");?>
