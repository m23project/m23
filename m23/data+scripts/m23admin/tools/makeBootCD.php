<span class="title"> <?PHP echo($I18N_make_bootcd);?> </span><br><br>

<CENTER>

<?php
	HTML_showFormHeader();
	HTML_setPage('makeBootCD');

	//Do checking for 32 and 64 bit ISOs
	BURN_checkISO();
	BURN_checkISO("amd64");

	//Now get their sizes
	$isoSize = BURN_getISOSize();
	$isoSize64 = BURN_getISOSize("amd64");

	$burner=$_POST[burner];

	HTML_showTableHeader();
	//select burner
	echo("
	<tr>
		<td>
			<span class=\"titlesmal\">$I18N_used_burner</span><br><br>".BURN_listBurners(&$burner)."<input type=\"submit\" name=\"BUT_select\" value=\"$I18N_select\"><br>
		</td>
	</tr>");
	HTML_showTableEnd();

	echo("<br><br>");

	$dev = BURN_getDevice($burner);
	if($dev == "") {
	    echo "$I18N_burner_error";
	}

	$blankMethod=$_POST[SEL_method];

	$burnspeedMethod=$_POST[SEL_burnspeed];

	if (isset($_POST[BUT_blank]))
		BURN_blank($dev,$blankMethod);

	if (isset($_POST[BUT_burn]))
		BURN_burn($dev,"/mdk/client/m23client-i386.iso",$burnspeedMethod);
	
	$blankList[0]="fast";
	$blankList[1]="all";
	
	//CD-RW blanking
	HTML_showTableHeader();
	echo("
	<tr>
		<td>
			<span class=\"titlesmal\">$I18N_blank_cdrw</span><br><br>
			$I18N_blanking_method
		</td>
		<td></td>
	</tr>
	<tr>
		<td>
			".HTML_listSelection("SEL_method",$blankList,$blankMethod)."
		</td>
		<td>
			<input type=\"submit\" name=\"BUT_blank\" value=\"$I18N_blank_cdrw\">
		</td>
	</tr>");
	HTML_showTableEnd();

	echo("<br><br>");

	//ISO burning
	HTML_showTableHeader();
	// Burn speed (edited by Mikesch BEGINN)
	$burnspeedlist[0]="max";
	$burnspeedlist[1]="4";
	$burnspeedlist[2]="8";
	$burnspeedlist[3]="16";
	$burnspeedlist[3]="32";
	echo("
		<tr>
			<td><span class=\"titlesmal\">$I18N_make_bootcd</span><br><br></td>
		</tr>
		<tr>
			<td align=\"center\">
				$I18N_burn_speed ".HTML_listSelection("SEL_burnspeed",$burnspeedlist,$burnspeedMethod)."<br>
				<input type=\"submit\" name=\"BUT_burn\" value=\"$I18N_burn\"><br><br>
				<ul>
					<li>32 bit: <a href=\"/iso/m23client.iso\">$I18N_download_iso ($isoSize)</a></li>
					<li>64 bit: <a href=\"/iso/m23client-amd64.iso\">$I18N_download_iso ($isoSize64)</a></li>
				</ul>
			</td>
		</tr>
	");
	HTML_showTableEnd();

	echo("<br><br>");

		BURN_showLog();

echo("
<input type=\"hidden\" name=\"burner\" value=\"$burner\">
</CENTER>
");

HTML_showFormEnd();
?>

<BR><BR>
<?PHP HELP_showHelp("makeBootCD");?>
