<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: function to show an info box
$*/





/**
**name MSG_showMessageBoxPlaceholder()
**description Shows a placeholder for message boxes at the position of execution.
**/
function MSG_showMessageBoxPlaceholder()
{
	echo(H_MESSAGEBOXPLACEHOLDER);
}





/**
**name MSG_placeOrReturnMessageBox($text)
**description Replaces a (maybe) existing message box placeholder with the given text.
**parameter text: Message to embed in the placeholder.
**returns Empty string, if the text could be inserted into the existing placeholder or the message, if no placeholder was found.
**/
function MSG_placeOrReturnMessageBox($text)
{
	if (HTML_manipulateOutputBuffer(H_MESSAGEBOXPLACEHOLDER, $text.H_MESSAGEBOXPLACEHOLDER))
		return('');
	else
		return($text);
}





/**
**name MSG_getm23UpdateFeed($width, $refreshTime)
**description Shows the m23 server update feed.
**parameter width: Width of the box
**parameter refreshTime: The time in minutes the file is downloaded again.
**/
function MSG_getm23UpdateFeed($width, $refreshTime)
{
	global $m23_version, $m23_patchLevel;
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$waitingUpdates = UPDATE_getInfo(UPDATE_getUrl("http://m23.sf.net/m23patch/m23patch.php","info",$m23_version,$m23_patchLevel),$refreshTime);
	return(MSG_showMessageBox($waitingUpdates, "updatetable", $I18N_newm23Updates, $width,true));
}





/**
**name MSG_getm23DevelopmentBlog($width, $refreshTime)
**description Shows the m23 development blog.
**parameter width: Width of the box
**parameter refreshTime: The time in minutes the file is downloaded again.
**/
function MSG_getm23DevelopmentBlog($width, $refreshTime)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$html = UPDATE_getInfo("http://m23.sourceforge.net/docs/changelogNew", $refreshTime);
	return(MSG_showMessageBox($html, "developmentBlogtable", $I18N_developmentBlog, $width,true));
}





/**
**name MSG_getRSSFeed($url, $tableType,$width=700)
**description Shows a RSS feed.
**parameter url: The URL pointing to the RSS XML file.
**parameter tableType: Name of the CSS table type
**parameter width: Width of the box
**parameter storeFile: The file name to store the download in.
**parameter refreshTime: The time in minutes the file is downloaded again.
**/
function MSG_getRSSFeed($url, $tableType, $width=700, $storeFile, $refreshTime)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Fetch the XML file with the RSS feed
	$rssText = utf8_decode(HELPER_getRemoteFileContents($url, $storeFile, $refreshTime, false));

	//Split the text into single lines
	$lines = explode("\n",$rssText);

	//The header is parsed differently
	$isHeaderBlock = true;
	//Store the tags and their values in an associative array
	$values = array();
	//HTML output
	$html = "";
	//Message counter
	$count = 0;
	//Amount of messages to show
	$maxEntries = 3;

	//Run thru the lines
	foreach ($lines as $line)
	{
		//Get the tag
		if (preg_match("/<([a-zA-Z ]+)/", $line, $regs) > 0)
		{
			//Store tag and its value
			$tag = $regs[1];
			$value = trim(strip_tags($line));
			$values[$tag] = $value;

			//All entries are ended by "pubDate". This assumption is made to keep the code simple ;-)
			if ($tag == "pubDate")
			{
				//Remove the time zone from the RSS time stamp
				$rssTime = preg_replace('/[A-Z]*$/', '' , $values['pubDate']);

				//Convert the time/date format to the format used in the country of the language file
				$values['pubDate'] = strftime($I18N_timeFormat,strtotime($rssTime));

				//Check for special handling of the header
				if ($isHeaderBlock)
				{
					$heading = $values['title'];
					//Add the header
					$html .= "<i>$values[description]</i><br><br>
					<table>
						<tr>
							<td>
								<a href=\"$values[link]\" target=\"_blank\"><img src=\"$values[url]\" border=\"0\"></a>
							</td>
							<td>
								<p>$I18N_writtenBy: $values[copyright]</p>
								<p>$values[pubDate]</p>
								<p><a href=\"$url\" target=\"_blank\"><img src=\"/gfx/rss.png\" border=\"0\"> $I18N_subscribeRSSFeed</a></p>
							</td>
						</tr>
					</table>";
					$isHeaderBlock = false;
				}
				else
				{
					//Add an entry
					$html .= "\n<br>$values[pubDate]: <span class=\"subtitle\"><a href=\"$values[link]\" target=\"_blank\">$values[title]</a></span><br><br>
						<i>$values[description]</i><br>
						<div align=\"right\"><a href=\"$values[link]\" target=\"_blank\">$I18N_readMore &gt;&gt;&gt;</a></div>";
				}
				$values = array();

				//Show only N entries
				if (++$count > $maxEntries) break;
			}
		}
	}
	return(MSG_showMessageBox($html,$tableType,$heading,$width,true));
}





/**
**name MSG_showInfo($message,$language,$width=700)
**description Shows the help block for the online help.
**parameter message: the text for the info message
**parameter language: two character language description (e.g. de, en, fr,...)
**parameter width: width of the box
**/
function MSG_showInfo($message,$language="",$width=700)
{
	MSG_show($message, $language, $width, 'infotable', 'I18N_information');
};





/**
**name MSG_showError($message,$language,$width=700)
**description Shows the error block for the error messages.
**parameter message: the text for the info message
**parameter language: two character language description (e.g. de, en, fr,...)
**parameter width: width of the box
**/
function MSG_showError($message,$language="",$width=700)
{
	MSG_show($message, $language, $width, 'errortable', 'I18N_error');
};





/**
**name MSG_showWarning($message,$language,$width=700)
**description Shows the warning block for the warning messages.
**parameter message: the text for the info message
**parameter language: two character language description (e.g. de, en, fr,...)
**parameter width: width of the box
**/
function MSG_showWarning($message,$language="",$width=700)
{
	MSG_show($message, $language, $width, 'warningtable', 'I18N_warning');
};





/**
**name MSG_show($message,$language,$width=700, $urgency)
**description Shows the message block for the messages.
**parameter message: the text for the info message
**parameter language: two character language description (e.g. de, en, fr,...)
**parameter width: width of the box
**parameter urgency: type of message (e.g. errortable, warningtable, infotable)
**/
function MSG_show($message, $language="", $width = 700, $urgency, $I18Ntitle)
{
	if (!isset($language{1}))
		include("/m23/inc/i18n/$GLOBALS[m23_language]/m23base.php");
	elseif ($language != "none")	
		include("/m23/inc/i18n/$language/m23base.php");

	MSG_showMessageBox($message,$urgency,$$I18Ntitle,$width);
};





/**
**name MSG_showMessageBoxHeader($tableType,$type,$width=700)
**description shows the header of the message block for the online help
**parameter tableType: name of the CSS table type
**parameter type: the heading of the box
**parameter width: width of the box
**parameter dontShowButReturn: Set to true if the HTML output should be returned rather than show.
**/
function MSG_showMessageBoxHeader($tableType,$type,$width=700,$dontShowButReturn=false)
{
 	if ($width==0)
		$htmlWidth="";
	else
		$htmlWidth="width=\"$width\"";
 
	$out = "<br><CENTER>
	<table class=\"$tableType\" $htmlWidth align=\"center\" border=\"0\" cellspacing=\"5\">
	<tr><td><span class=\"subhighlight\">$type</span></td></tr>
	<tr><td><br>";

	if ($dontShowButReturn)
		return($out);
	else
		echo($out);
}





/**
**name MSG_showMessageBoxFooter()
**description shows the footer of the message block for the online help
**parameter dontShowButReturn: Set to true if the HTML output should be returned rather than show.
**/
function MSG_showMessageBoxFooter($dontShowButReturn=false)
{
	$out = "<br></td></tr>
	</table></CENTER><br>";

	if ($dontShowButReturn)
		return($out);
	else
		echo($out);
}





/**
**name MSG_showMessageBox($message,$tableType,$type,$width=700)
**description shows the message block for the online help
**parameter message: the text for the info message
**parameter tableType: name of the CSS table type
**parameter type: the heading of the box
**parameter width: width of the box
**parameter dontShowButReturn: Set to true if the HTML output should be returned rather than show.
**/
function MSG_showMessageBox($message,$tableType,$type,$width=700,$dontShowButReturn=false)
{
	$out = MSG_showMessageBoxHeader($tableType,$type,$width,true).$message.MSG_showMessageBoxFooter(true);
	if ($dontShowButReturn)
		return($out);
	else
		echo(MSG_placeOrReturnMessageBox($out));
};





/**
**name MSG_showUpdateInfo($unr,$language)
**description shows a info message about the stored update jobs
**parameter unr: the amount of update jobs and clients
**parameter language: two character language description (e.g. de, en, fr,...)
**/ 
function MSG_showUpdateInfo($unr,$language="")
{
	if (isset($language{1}))
		include("/m23/inc/i18n/$language/m23base.php");
	else
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
	MSG_showInfo($I18N_updateJobHasBeenStoredForNClients,$language);
};





/**
**name MSG_showUpdateInfo($unr,$clNr,$language)
**description shows a info message about stored jobs on N clients
**parameter jobNr: the amount of jobs
**parameter clNr: the amount of clients
**parameter language: two character language description (e.g. de, en, fr,...)
**/ 
function MSG_showAddJobsInfo($jobNr,$clNr,$language="")
{
	if (isset($language{1}))
		include("/m23/inc/i18n/$language/m23base.php");
	else
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	MSG_showInfo($I18N_jobs_addedForNClients,$language);
};





/**
**name MSG_showNewFeature($url,$language="",$width=700)
**description shows the new feature block
**parameter url: the url to the forum for the new feature
**parameter language: two character language description (e.g. de, en, fr,...)
**parameter width: width of the box
**/
function MSG_showNewFeature($url,$language="",$width=700)
{
	if (CAPTURE_isActive() || ($_GET[captureLoad]==1))
		return;

	if (($language != "none") && (isset($language{1})))
		include("/m23/inc/i18n/$language/m23base.php");

	$message="$I18N_thisIsANewFeaturePleaseTest<br><br><center><a href=\"$url\" target=\"_blank\">$url</a></center>";

	MSG_showMessageBox($message,"newfeaturetable",$I18N_newFeature,$width);
	echo("<br><br>");
};





/**
**name MSG_DeActivateBlogDialog($blogVarName,$css,$blogName,$width,&$dialogCode)
**description Creates a dialog to en/disable a blog. The displaying state is written to the DB.
**parameter blogVarName: Variable name of the blog to store in the DB.
**parameter css: Name of the CSS class to color the dialog.
**parameter blogName: Name of the blog als human readle heading.
**parameter width: Width of the box containing the switch dialog.
**parameter dialogCode: The HTML code of the dialog element is written to this variable.
**returns: True if the blog should be shown otherwise false.
**/
function MSG_DeActivateBlogDialog($blogVarName,$css,$blogName,$width,&$dialogCode)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$butName = "BUT_blogToggle$blogVarName";

	//Check if the blog is NOT enabled
	if (RMV_get4IP($blogVarName,"ShowBlog") == "n")
	{
		if (HTML_submit($butName,$I18N_save))
		{
			RMV_rm4IP($blogVarName,"ShowBlog");
			$blogActive = true;
		}
		else
			$blogActive = false;
	}
	else
	{
		if (HTML_submit($butName,$I18N_save))
		{
			RMV_set4IP($blogVarName,"n","ShowBlog");
			$blogActive = false;
		}
		else
			$blogActive = true;
	}

	$actionName = $blogActive ? $I18N_disableBlog : $I18N_enableBlog;
	$dialogCode = MSG_showMessageBox('<center>'.constant($butName).'</center>',$css,"$actionName: $blogName",$width,true);
	return($blogActive);
}
?>