<?PHP
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for generating often used HTML code
$*/


define('H_SHB','<span class="subhighlight">');
define('H_SHE','</span>');
define('H_MESSAGEBOXPLACEHOLDER', '<!-- MessageBoxPlaceholder -->');
define('H_AJAXAUTOSUBMIT_VALUE','submit');
define('H_JSBACKBUTTON',"<button class=\"linkAsButton\" onclick=\"window.history.back()\">Back/Zurück/Retour</button>");





/**
**name HTML_rowColor(&$lastRow)
**description Toggles the row color between oddrow and evenrow class.
**parameter lastRow: External variable to store the last row state.
**returns Newly set row color.
**/
function HTML_rowColor(&$lastRow)
{
	$oddrow = 'class="oddrow"';
	$evenrow = 'class="evenrow"';

	if ($lastRow == $evenrow)
		$lastRow = $oddrow;
	else
		$lastRow = $evenrow;

	return($lastRow);
}





/**
**name HTML_getInvisiblePasswordsIfFeatureEnabled($pass)
**description Makes a password invisible by setting text color to "transparent", if the "makePasswordsInvisibleEnabled" feature is active, otherwise it will be shown normally.
**parameter pass: The password to make (in)visble.
**returns Visible or invisible password.
**/
function HTML_getInvisiblePasswordsIfFeatureEnabled($pass)
{
	if (SERVER_getMakePasswordsInvisibleEnabled())
		return('<img src="/gfx/eye-mini.png"><span style="color: transparent">'.$pass.'</span><img src="/gfx/eye-mini.png">');
	else
		return($pass);
}





/**
**name HTML_waitAnimation($htmlName, $waitText, $width = -1)
**description Defines HTML code for showing a waiting animation and onClick code for insering into buttons. The JavaScript showing function is given out where the PHP function is called.
**parameter htmlName: Base name for the defines and naming of the JavaScript function and DIVs.
**parameter waitText: Text to show while the animation runs.
**parameter width: Width for the animation image or unscaled if not set.
**/
function HTML_waitAnimation($htmlName, $waitText, $width = -1)
{
	$divName = $htmlName.'div';
	$fktName = $htmlName.'fkt';
	$imgName = $htmlName.'img';

	// Scale the animation image?
	if (-1 != $width)
		$sizeCSS = 'style="width:'.$width.'px;height: auto;"';
	else
		$sizeCSS = '';

	// Function for showing the animation directly
	echo('
	<script>
		function '.$fktName.'()
		{
			document.getElementById("'.$divName.'").style.display = "block";
		}
	</script>
	');

	// onClick code for insering into buttons
	define($htmlName.'OnClick', 'onClick="'.$fktName.'()"');

	// HTML code that will show the animation when the showing function is called
	define($htmlName, "
	<div style=\"display: none\" id=\"$divName\">
		<table class=\"infotable\">
			<tr>
				<td>
					<img id=\"$imgName\" src=\"/gfx/wait-ani.gif\" $sizeCSS>
					$waitText
				</td>
			</tr>
		</table>
	</div>
	");
}





/**
**name HTML_imgSwitch($htmlName, $off_img, $on_img, $off_text, $on_text, $separator, $default, &$outState)
**description Defines an image button with two states and a text next to it.
**parameter htmlName: Name of the html image input element.
**parameter off_img: Name and path of image to be displayed if its state is "off"
**parameter on_img: Name and path of image to be displayed it its state is "on"
**parameter off_text: Text to be displayed if state is "off"
**parameter on_text: Text to be displayed if state is "on"
**parameter separator: Anything which shall be displayed between the picture (clickable) and the text (not clickable)
**parameter default: State of the image input element on first load of page ("on" or "off")
**parameter outState: Current state of element (true for "on" or false for "off").
**returns true, if the button was clicked otherwise false.
**/
function HTML_imgSwitch($htmlName, $off_img, $on_img, $off_text, $on_text, $separator, $default, &$outState)
{
	$stateOld = isset($_POST['state_'.$htmlName]) ? $_POST['state_'.$htmlName] : 'Eej7I';

	if (isset($_POST[$htmlName.'_x']) && $stateOld=="on")
		$state = "off" ;
	elseif (isset($_POST[$htmlName.'_x']) && $stateOld=="off")
		$state = "on" ;
	elseif  (!isset($_POST[$htmlName.'_x']) && $stateOld=="on")
		$state = "on" ;
	elseif  (!isset($_POST[$htmlName.'_x']) && $stateOld=="off")
		$state = "off" ;
	else
		if ($default == true)
			$state = "on";
		elseif ($default == false)
			$state = "off";

	if ($state == 'on')
	{
		$image = $on_img;
		$text = $on_text;
	}
	else
	{
		$image = $off_img;
		$text = $off_text;
	}

	define($htmlName,
		  HTML_hiddenVar('state_'.$htmlName, $state).'<INPUT type="image" src="'.$image.'" name="'.$htmlName.'">'.$separator.$text
	);
	
	$outState = ($state == "on");

	return($stateOld != $state);
}





/**
**name HTML_getOriginalUploadFilename($htmlName)
**description Get the original file name of an uploaded file.
**parameter htmlName: Name of the HTML element
**returns Original file name of an uploaded file or NULL, if none is given.
**/
function HTML_getOriginalUploadFilename($htmlName)
{
	return(isset($_FILES[$htmlName]['name']) ? basename($_FILES[$htmlName]['name']) : NULL);
}





/**
**name HTML_uploadFile($htmlName,$label,$maxFileSize)
**description Shows a dialog for uploading image files.
**parameter htmlName: Name of the HTML element
**parameter label: The visual naming of the HTML element.
**parameter maxFileSize: The maximum allowed filesize in bytes.
**returns The full path to the uploaded file or false in case of an error.
**/
function HTML_uploadFile($htmlName, $label, $maxFileSize)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	clearstatcache();
	$visibleSize=sprintf("%.2f",$maxFileSize / 1048576);

	$htmlBUTName = "BUT_UL_$htmlName";

	HTML_submitDefine($htmlBUTName, $I18N_upload);

	define($htmlName,'
		<table>
			<tr>
				<td valign="top">
					'.$label.' ('.$I18N_maximalAllowedFileSize.': '.$visibleSize.' MB)<br>
					<input type="hidden" name="MAX_FILE_SIZE" value="'.$maxFileSize.'">
					<input name="'.$htmlName.'" type="file" size="" maxlength="'.$maxFileSize.'" accept="text/*">
					'.constant($htmlBUTName).'
				</td>
			</tr>
		</table>
		');

	if (HTML_submitCheck($htmlBUTName))
	{
		//if the element wan't posted before => don't try to check its value.
		if (!isset($_FILES[$htmlName]))
			return(false);

		//If the dialog was called first, there is no tmp_name => don't try to use the file
		if (!isset($_FILES[$htmlName]['tmp_name']{0}))
			return(false);

		//try 5 times to find a random filename that isn't used
		$newFileFound=false;
		for ($i=0; $i < 5; $i ++)
		{
			$fullName="/m23/tmp/".md5(uniqid(mt_rand(), true));
			if (!file_exists($fullName))
			{
				$newFileFound=true;
				break;
			}
		}

		//show an error message or move the uploaded file to the new filename
		if ($newFileFound)
			move_uploaded_file($_FILES[$htmlName]['tmp_name'],$fullName);
		else
		{
			MSG_showError($I18N_errorFileExists);
			return(false);
		};

		//check if the file was uploaded correctly
		if (filesize($fullName) != $_FILES[$htmlName]['size'])
		{
			unlink($fullName);
			MSG_showError($I18N_errorUploadSizeMismatch);
			return(false);
		};

		return($fullName);
	}
	else
		return(false);
};





/**
**name HTML_urlButton($htmlName, $label, $url)
**description Defines a link that appears like a button.
**parameter htmlNames: Name of the constant.
**parameter label: Label of the button.
**parameter url: The URL where the link button should point to.
**/
function HTML_urlButton($htmlName, $label, $url)
{
	define($htmlName,'<a href="'.$url.'" class="linkAsButton">'.$label.'</a>
');
}





/**
**name HTML_weekdayTimeChooser($htmlName)
**description Creates a picker for weekday and hour/minute (with 15 minute steps).
**parameter htmlNames: Name of the weekday and hour/minute picker.
**returns Choosen weekday and hour/minute as DHHMM string.
**/
function HTML_weekdayTimeChooser($htmlName)
{
	// Read a (maybe) previously choosen value for the combined HTML element
	$submitted = HTML_getElementValue($htmlName, $htmlName, '10000');

	// Split the combined value into day and hour/minute
	if (HELPER_splitDayHourMinuteString($submitted, $day, $hour, $minute))
	{
		$submittedDay = $day;
		$submittedHourMinute = $hour.$minute;
	}

	// Create an array with all weekdays and according HTML selection
	$weekDays = I18N_getWeekDayArray();
	$weekDay = HTML_selection("${htmlName}_weekDay", $weekDays, SELTYPE_selection, true, $submittedDay);

	// Create an array with all hours/minutes with 15 minute steps and according HTML selection
	$hoursMinutes = array();
	for ($hour = 0; $hour < 24; $hour++)
		for ($minute = 0; $minute < 60; $minute += 15)
			// Create the array and make sure, minute and hour have all two digits (prefixed with 0, if needed)
			$hoursMinutes[sprintf("%'.02u%'.02u", $hour, $minute)] = sprintf("%'.02u:%'.02u", $hour, $minute);
	$hoursMinute = HTML_selection("${htmlName}_hoursMinutes", $hoursMinutes, SELTYPE_selection, true, $submittedHourMinute);

	// Create a new constant that contains the HTML code of both selections
	define($htmlName, constant("${htmlName}_weekDay").' '.constant("${htmlName}_hoursMinutes"));

	// Return the currently choosen day, hour and minute combination
	return($weekDay.$hoursMinute);
}





/**
**name HTML_sourceViewer($htmlName, $code, $highlighting)
**description Creates a source code viewer area with syntax highlighting.
**parameter htmlNames: Name of the source viewer.
**parameter code: The source code to show.
**parameter highlighting: The GeSHi language of the source code (e.g. bash).
**/
function HTML_sourceViewer($htmlName, $code, $highlighting)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$const = 'BUT_'.$htmlName.'Refresh';

	include_once('/m23/inc/geshi/geshi.php');
	

	$geshi = new GeSHi($code, $highlighting);
	$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS,5);
	$geshi->set_header_type(GESHI_HEADER_DIV);
	$geshi->enable_classes();
	
	echo('<style type="text/css"><!--'.$geshi->get_stylesheet().'--></style>');

	define($htmlName,'
	<p>
	'.$geshi->parse_code().'
	</p>');
}





/**
**name HTML_getOutputBuffer()
**description Gets the complete (previously rendered) HTML output buffer.
**returns The complete contents of the (previously rendered) HTML output buffer.
**/
	function HTML_getOutputBuffer()
	{
		return(ob_get_contents());
	}





/**
**name HTML_setOutputBuffer($HTMLOutputBuffer)
**description Sets (replaces) the complete (previously rendered) HTML output buffer, that will be sent to the webbrowser.
**parameter HTMLOutputBuffer: New HTML codes that should replace the complete current output buffer.
**/
	function HTML_setOutputBuffer($HTMLOutputBuffer)
	{
		ob_clean();
		echo($HTMLOutputBuffer);
	}





/**
**name HTML_AJAXAutoSubmit($htmlName, $url, $timeout = 500)
**description Defines AJAX code that clicks a submit button when the given URL returns 'submit'. The defined constant should be used as LAST part of the $extra parameter in the HTML_submit function.
**parameter htmlNames: Name of the HTML submit element (button).
**parameter url: The HTTP URL to poll.
**parameter timeout: Time in milliseconds to poll the URL for new status.
**returns Constant name to insert into $extra.
**/
	function HTML_AJAXAutoSubmit($htmlName, $url, $timeout = 500)
	{
		// Name of the AJAX constant
		$AJAXName = $htmlName.'AJAX';

		// ID name of the HTML button
		$idName = $AJAXName.'ID';

		// Basic HTML code to add, if the button is clicked
		$html = " id=\"$idName\"";

		// Add JS code, when the button is not clicked
		if (!HTML_submitCheck($htmlName))
			$html .= ">
			<script type='text/javascript'>
	
			function doUpdate$AJAXName()
			{
				$.ajax(
				{
					type: 'POST', url : '$url',
					success: function (data)
					{
						if (data.length > 0)
						{
							if (data == '".H_AJAXAUTOSUBMIT_VALUE."')
								$('#$idName').trigger('click');
						}
						setTimeout('doUpdate$AJAXName()', $timeout);
					}
				});
			}
	
			$(document).ready(function() {
				setTimeout('doUpdate$AJAXName()', $timeout);
			});
			</script";
		
		define($AJAXName, $html);

		return($AJAXName);
	}





/**
**name HTML_liveSpan($htmlName, $url, $staticValue, $timeout = 500)
**description Creates a span that updates itself via AJAX by polling from a given URL.
**parameter htmlNames: Name of the span.
**parameter url: The HTTP URL to poll.
**parameter staticValue: Value that should be shown, when AJAX is not available (e.g. when JavaScript is disabled)
**parameter timeout: Time in milliseconds to poll the URL for new status.
**/
function HTML_liveSpan($htmlName, $url, $staticValue, $timeout = 500)
{
	define($htmlName,"
	<script type='text/javascript'>
	
	function doUpdate$htmlName()
	{
		$.ajax(
		{
			type: 'POST', url : '$url',
			success: function (data)
			{
				if (data.length > 0)
				{
					var elem = $('#id$htmlName');

					elem.text(data);
				}
				setTimeout('doUpdate$htmlName()', $timeout);
			}
		});
	}

	$(document).ready(function() {
		setTimeout('doUpdate$htmlName()', $timeout);
	});
	</script>

	<span id='id$htmlName'>$staticValue</span>
	");
}





/**
**name HTML_manipulateOutputBuffer($search, $replace)
**description Manipulates the output buffer with already generated HTML code and replaces all occurrences the search term with the replace term.
**parameter search: The search term.
**parameter replace: The replace text.
**returns true, if the search term was found.
**/
function HTML_manipulateOutputBuffer($search, $replace)
{
	//Get the current output buffer
	$content = ob_get_contents();

	if (strpos($content, $search) !== false)
	{
		ob_clean();

		//Do the replacements
		$content = str_replace ($search , $replace , $content);

		//Start buffering again
		ob_start();

		//output the manipulated buffer
		echo($content);

		return(true);
	}
	
	return(false);
}





/**
**name HTML_showTitle($title)
**description Shows a title.
**parameter title: Text of the title.
**/
function HTML_showTitle($title)
{
	echo('<span class="title">'.$title.'</span>');
}





/**
**name HTML_showSmallTitle($title)
**description Shows a title of the second tier.
**parameter title: Text of the small title.
**/
function HTML_showSmallTitle($title)
{
	echo('<br><br><span class="titlesmal">'.$title.'</span>');
}




/**
**name HTML_hiddenVar($var, $val, $storeIntoPreferenceSpace = false)
**description Create a hidden HTML variable to store values in an HTML form.
**parameter var: Name of the hidden variable.
**parameter val: Its value.
**parameter storeIntoPreferenceSpace: Set to true, if the value should be stored under the prefKey in the preferenceSpace.
**/
function HTML_hiddenVar($var, $val, $storeIntoPreferenceSpace = false)
{
	if ($storeIntoPreferenceSpace)
		$_SESSION['preferenceSpace'][$var] = $val;

	return("<input type=\"hidden\" id=\"$var\" name=\"$var\" value=\"$val\">");
}




/**
**name HTML_liveLogArea($htmlName, $width, $height, $url, $timeout = 500, $maxLines = 500)
**description Creates a log area that updates itself via AJAX by polling from a given URL.
**parameter htmlNames: Name of the log area.
**parameter width: The width in characters of the log area.
**parameter height: The height in characters of the log area.
**parameter url: The HTTP URL to poll.
**parameter timeout: Time in milliseconds to poll the URL for new status.
**parameter maxLines: Maximum amount of lines to show in the log area (older lines are removed, when there are too many).
**/
function HTML_liveLogArea($htmlName, $width, $height, $url, $timeout = 500, $maxLines = 500)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	define($htmlName,"
	<script type='text/javascript'>
	
	function doUpdate$htmlName()
	{
		var pauseLabel = '$I18N_liveLogPause';
		var but = $('#idBUT_$htmlName');
		
		if (but.attr('value') == pauseLabel)
		{
			$.ajax(
			{
				type: 'POST', url : '$url',
				success: function (data)
				{
					if (data.length > 1)
					{
						var elem = $('#id$htmlName');

						//var total = ((elem.html() ? elem.html() + \"\\n\" : \"\") + data).split(\"\\n\");
						var total = ((elem.text() ? elem.text() + \"\\n\" : \"\") + data).split(\"\\n\");

						if (total.length > $maxLines)
							total = total.slice(total.length - $maxLines);

						elem.text(total.join(\"\\n\"));

						elem.scrollTop(elem[0].scrollHeight - elem.height());

						var div = $('#idDIV_$htmlName');
						var a = data.length;
						var b = parseInt(div.html());

						//div.html(a + b);
						div.text(a + b);
					}
					setTimeout('doUpdate$htmlName()', $timeout);
				}
			});
		}
		else
			setTimeout('doUpdate$htmlName()', $timeout);
	}

	function startStopToggle$htmlName()
	{
		var startLabel = '$I18N_liveLogStart';
		var pauseLabel = '$I18N_liveLogPause';
		var but = $('#idBUT_$htmlName');
		
		if (but.attr('value') == pauseLabel)
			but.attr('value', startLabel);
		else
			but.attr('value', pauseLabel);
	}

	$(document).ready(function() {
		setTimeout('doUpdate$htmlName()', $timeout);
	});
	</script>

	<p>
		<textarea class='consoleLinux' id='id$htmlName' cols='$width' rows='$height' readonly></textarea>
	</p>
	<p align=\"center\">
		$I18N_liveLogShownCharacters: <span id='idDIV_$htmlName'>0</span> <input type='button' value='$I18N_liveLogPause' id='idBUT_$htmlName' onclick='startStopToggle$htmlName();'>
	</p>
	");
}





/**
**name HTML_checkboxChangerButtons($htmlNames)
**description Defines buttons for changing all check boxes.
**parameter htmlNames: Name of the HTML elements.
**/
function HTML_checkboxChangerButtons($htmlNames)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	define($htmlNames,"<img src=\"/gfx/selectall.png\" onclick=\"checkboxChanger(3);\" alt=\"$I18N_selectAll\" title=\"$I18N_selectAll\"> <img src=\"/gfx/deselectall.png\" onclick=\"checkboxChanger(1);\" alt=\"$I18N_deselectAll\" title=\"$I18N_deselectAll\"> <img src=\"/gfx/invert.png\" onclick=\"checkboxChanger(0);\" alt=\"$I18N_invertSelection\" title=\"$I18N_invertSelection\">");
}





/**
**name HTML_jsCheckboxChanger($jsBlockName)
**description Generates JavaScript code for changing all check boxes.
**parameter jsBlockName: Name of the JS block constant.
**/
function HTML_jsCheckboxChanger($jsBlockName)
{
	define($jsBlockName,"
	<script language=JavaScript>
	function checkboxChanger(mode)
	{
		for (f = 0; f < document.forms.length; f++)
			for(i = 0; i < document.forms[f].elements.length; i++)
			{
				var ele = document.forms[f].elements[i];
				if(ele.type == 'checkbox')
				{
					if(mode==0)
						ele.checked = !ele.checked;
					else if(mode==1)
						ele.checked = false;
					else
						ele.checked = true;
				}
			}
	}
	</script>");
}





/**
**name HTML_logArea($htmlName, $cols, $rows, $text)
**description Shows a text area for log information (readonly).
**parameter htmlName: Name of the HTML element.
**parameter cols: Number of columns.
**parameter rows: Number of rows to show.
**parameter text: The log information to show.
**/
function HTML_logArea($htmlName, $cols, $rows, $text)
{
	$fkt = $htmlName.'ScrollEndJS';

	define($htmlName,'
	<textarea name="'.$htmlName.'" id="id'.$htmlName.'" cols="'.$cols.'" rows="'.$rows.'" readonly>'.$text.'</textarea>
	<script>
		function '.$fkt.'()
		{
			var elem=document.getElementsByName(\''.$htmlName.'\');
			elem[0].scrollTop = elem[0].scrollHeight - elem[0].clientHeight;
		}
		
		'.$fkt.'();
	</script>
	');
}





/**
**name HTML_getQuestionnaireURL()
**description Returns the complete URL to the m23 questionnaire in the language of the webinterface.
**returns Complete URL to the m23 questionnaire in the language of the webinterface.
**/
function HTML_getQuestionnaireURL()
{
	//Choose the questionnaire in the correct language
	switch ($GLOBALS["m23_language"])
	{
		case 'de':
			$url = "http://m23.sourceforge.net/fragebogen-de";
			break;
		case 'fr':
			$url = "http://m23.sourceforge.net/questionnaire-fr";
			break;
		default:
			$url = "http://m23.sourceforge.net/questionnaire";
			break;
	}

	return($url);
}





/**
**name HTML_questionnaire($disable = false)
**description Shows the questionnairem window.
**parameter disable: Set to true to disable showing of the window again.
**/
function HTML_questionnaire($disable = false)
{
	//Resets the timer so the window will sho after 5 hours again.
	function resetTimer()
	{
		$nextRemainder = time() + 18000;
		RMV_set4IP('nextRemainder', $nextRemainder, 'quest2');
		return($nextRemainder);
	}

	//Never (or actual on Thu, 23 Nov 2023 23:23:23) show the window again
	function disableTimer()
	{
		//Disable by setting the next remainder to: Thu, 23 Nov 2023 23:23:23
		RMV_set4IP('nextRemainder', 1700778203, 'quest2');
	}

	//The popup should be disabled
	if ($disable)
	{
		disableTimer();
		return(false);
	}

	//After the firs
	if (!RMV_exists4IP('nextRemainder', 'quest2'))
		$nextRemainder = resetTimer();
	else
		$nextRemainder = RMV_get4IP('nextRemainder','quest2');

	//Check. if now is the time to show the window
	if (time() < $nextRemainder)
		//If not: return
		return(false);
	else
		//Reset the timer, to show it again after some time
		resetTimer();

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");


echo('
<div style="background-color: white; width: 95%;">
	<div id="questinhalt" width="90%" height="100%" align="center">
		<div align="right">
			<a onClick="questHide()"><img src="/gfx/button_cancel.png" width=16> <b>'.$I18N_showAgainLater.'</b></a>
			<a onClick="questHide()" href="index.php?disableQuestionnaire=1"><img src="/gfx/button_cancel.png" width=16> <b>'.$I18N_dontShowAgain.'</b></a>
		</div>
		<iframe src="'.HTML_getQuestionnaireURL().'" id="questiframe" style="width: 90%; height: 99%"></iframe>
	</div>
</div>

<script>
	function questHide()
	{
		var elem = document.getElementById(\'questinhalt\');
		elem.style.display=\'none\';
	}
</script>
');

	return(true);
}





/**
**name HTML_esel()
**description Shows an dog-ear that can be opened to show "goos-habermann.de/m23ad".
**/
function HTML_esel()
{
//m23customPatchBegin type=del id=HTML_eselDeactivate
echo('
<div id="esel" onMouseOver="eselShow();">
	<div id="eselinhalt" width="100%" height="100%" align="left" style="display:none" >
		<a onClick="eselHide()"><img src="/gfx/button_cancel.png"> <b>Schließen / Close</b></a>
		<iframe id="eseliframe" style="width: 99%; height: 99%"></iframe>
	</div>
</div>


<script>
	function eselShow()
	{
		var elem = document.getElementById(\'eselinhalt\');
		var eseliframe = document.getElementById(\'eseliframe\');

		eseliframe.src="http://goos-habermann.de/m23ad";

		elem.style.display=\'block\';
		elem.style.position=\'fixed\';
		elem.style.left=\'5px\';
		elem.style.top=\'5px\';
	}
	
	function eselHide()
	{
		var elem = document.getElementById(\'eselinhalt\');
		
		elem.style.display=\'none\';
	}
</script>
');
//m23customPatchEnd id=HTML_eselDeactivate
}





/**
**name HTML_JSMenuCloseAllEntries($menuName)
**description Closes all menu entries for a menu. This should be called at the end of a page to get it executed after loading.
**/
function HTML_JSMenuCloseAllEntries($menuName)
{
	echo('
	<script>
		var i;
		for (i=0; i < document.getElementsByName(\''.$menuName.'\').length; i++)
			document.getElementsByName(\''.$menuName.'\')[i].style.display = \'none\';
	</script>
	');
}





/**
**name HTML_JSMenuOpener($menuName, $entryName, $title, $html)
**description Opens a menu entry when moving the mouse over the title and closes all other entries of the same menu.
**parameter menuName: Name of the complete menu. This name must be the same on all entries belonging to the same menu.
**parameter entryName: Name of the entry. This name must be unique.
**parameter title: Title for the menu entry.
**parameter html: HTML code of the menu entry. Here can stand all that is expressable with HTML. This part is shown and hidden.
**parameter titleCSS: CSS class for marking the title.
**returns The HTML code for displaying the menu entry.
**/
function HTML_JSMenuOpener($menuName, $entryName, $title, $html, $titleCSS = 'title')
{
return('
<span class="'.$titleCSS.'" onMouseOver="var i; for (i=0; i < document.getElementsByName(\''.$menuName.'\').length; i++) document.getElementsByName(\''.$menuName.'\')[i].style.display = \'none\'; document.getElementById(\''.$entryName.'\').style.display = \'block\';">'.$title.'</span>
	<div name="'.$menuName.'" id="'.$entryName.'">
		<br><br>'.$html.'
	</div>
');
}





/**
**name HTML_jQueryMenu($title, $html, $titleCSS = 'title')
**description Creates an entry for the jQuery accordion menu
**parameter title: Title for the menu entry.
**parameter html: HTML code of the menu entry. Here can stand all that is expressable with HTML. This part is shown and hidden.
**parameter titleCSS: CSS class for marking the title.
**returns The jQuery code for the menu entry.
**/
function HTML_jQueryMenu($title, $html, $titleCSS = 'menuhighlight')
{
return('
<a href="#"><span class="'.$titleCSS.'">&nbsp;&nbsp;'.$title.'</span></a>
<div>
	<br><br>'.$html.'
</div>
');
}





/**
**name HTML_jQueryMenuHeader($menuName)
**description Generate code for beginning a the jQuery accordion menu.
**parameter menuName: Name of the menu.
**returns The jQuery code for beginning the menu.
**/
function HTML_jQueryMenuHeader($menuName)
{
	//Name of the hidden form variable to store the number of the last active accordion element
	$hiddenVarName = $menuName.'lastOpen';
	//Try to fetch the active element from a perviously transfered form
	$active = (isset($_POST[$hiddenVarName]) && is_numeric($_POST[$hiddenVarName]) ? $_POST[$hiddenVarName] : 0);


return('
<script>
	$(function()
	{
		//Make the previously opened element open again
		$( "#'.$menuName.'" ).accordion({ active: '.$active.' });

		$( "#'.$menuName.'" ).accordion
		({
			activate: function(event, ui)
			{
				//Get the currently active accordion element number
				var active = $( "#'.$menuName.'" ).accordion( "option", "active" );
				//Store it in the hidden variable
				$( "#'.$hiddenVarName.'" ).val(active);
			}
		});
		
		'.HTML_jQueryReStoreYWindowPosition($menuName, $hiddenPosCode).'
	});
	</script>
	'.$hiddenPosCode.'

<div id="'.$menuName.'">
');
}





/**
**name HTML_jQueryReStoreYWindowPosition($variablePrefix, &$hiddenPosCode, $standalone = false)
**description Generates jQuery code for storing the Y scroll position of the window and to restore the position after a submit.
**parameter variablePrefix: Prefix for the hidden variable with the Y position.
**parameter hiddenPosCode: Variable where the hidden variable HTML code is written to.
**returns The jQuery code for storing the Y scroll position of the window and to restore the position after a submit.
**/
function HTML_jQueryReStoreYWindowPosition($variablePrefix, &$hiddenPosCode, $standalone = false)
{
	//Last Y position of the content the browser window
	$hiddenPosName = $variablePrefix.'lastYPos';
	$lastPos = ((isset($_POST[$hiddenPosName]) && is_numeric($_POST[$hiddenPosName])) ? $_POST[$hiddenPosName] : 0);

	// If it is standalone, the jQuery functions and the script tags must be around
	if ($standalone)
	{
		$begin = '
				<script>
			$(function()
			{';
	
		$end = '
			});
			</script>
			';
	}
	else
		$begin = $end = '';
	
	$hiddenPosCode = HTML_hiddenVar($hiddenPosName,$lastPos);

	return($begin.'
		$("body").scrollTop('.$lastPos.');

		$(window).scroll(function () {
		$( "#'.$hiddenPosName.'" ).val($("body").scrollTop());
		});
	'.$end);
}





/**
**name HTML_jQueryMenuEnd($menuName)
**description Generates code for ending a the jQuery accordion menu.
**parameter menuName: Name of the menu.
**returns The jQuery code for ending the menu.
**/
function HTML_jQueryMenuEnd($menuName)
{
	//Name of the hidden form variable to store the number of the last active accordion element
	$hiddenVarName = $menuName.'lastOpen';
	//Try to fetch the active element from a perviously transfered form
	$active = (isset($_POST[$hiddenVarName]) && is_numeric($_POST[$hiddenVarName]) ? $_POST[$hiddenVarName] : 0);

	//Last Y position of the content the browser window
	$hiddenPosName = $menuName.'lastYPos';
	$lastPos = (isset($_POST[$hiddenPosName]) && is_numeric($_POST[$hiddenPosName]) ? $_POST[$hiddenPosName] : 0);

	return(HTML_hiddenVar($hiddenVarName,$active).'
	</div>
');
}





/**
**name HTML_incStatusBarPercentByName($statusBarName, $client, $percent)
**description Increments the status bar percent by a given amount.
**parameter statusBarName: The name of the status bar.
**parameter client: The name of the client, the status bar belongs to (or other values for identifying the object the status bar belongs to)
changed).
**parameter percent: Percent value of the current job.
**/
function HTML_incStatusBarPercentByName($statusBarName, $client, $percent)
{
	CHECK_FW(CC_clientname, $client, CC_statusBarName, $statusBarName, CC_percent, $percent);

// 	HELPER_debugBacktraceToFile("/tmp/HTML_incStatusBarPercentByName.trace");

	DB_query("UPDATE statusbar SET percent = percent+(percentpoint*$percent) , ts = ".time()." WHERE `client`='$client' AND `name`='$statusBarName'");
}





/**
**name HTML_setStatusBarPercentPointByName($statusBarName, $client, $recalculate = false)
**description Calculates the value of a percent point according to the amount of waiting packages and stores the result in the DB.
**parameter statusBarName: The name of the status bar.
**parameter client: The name of the client, the status bar belongs to (or other values for identifying the object the status bar belongs to)
changed).
**parameter recalculate: true, if the remaining percent value of the status bar should be used to calculate a new (better fitting) percentpoint.
**returns false on errors, otherwise true.
**/
function HTML_setStatusBarPercentPointByName($statusBarName, $client, $recalculate = false)
{
// 	HELPER_debugBacktraceToFile("/tmp/HTML_setStatusBarPercentPointByName.trace");
	$waitingJobs = PKG_countJobs($client,'waiting');

	if (0 == $waitingJobs)
		return(false);

	if (($client!==false) && ($statusBarName!==false))
		CHECK_FW(CC_clientname, $client, CC_statusBarName, $statusBarName);
	else
		return(false);

	if ($recalculate)
	{
		//Get the current percent value of the status bar
		$res = DB_query("SELECT `percent` FROM `statusbar` WHERE `client`='$client' AND `name`='$statusBarName'");
		$line = mysqli_fetch_row($res);

		//Check, if there is a result (the current percent value of the status bar)
		if (mysqli_num_rows($res) > 0)
			$percent = $line[0];
		else
			return(false);

		/*
			remaining percents of the status bar / 100% to finish in each job
			e.g the status bar shows 60% => 40% unfinished, remaining percents for the remaining jobs
		*/
		$basePercent = (float)(((float)100) - ((float)$percent)) / ((float)100);
	}
	else
	{
		$basePercent = 1;
		$percent = 0;
	}

	$percentPoint = (float)((((float)$basePercent)/((float)$waitingJobs)));
	$percentPoint = str_replace(',', '.', $percentPoint);
	$percent = str_replace(',', '.', $percent);

	DB_query("UPDATE `statusbar` SET `percentpoint` = '$percentPoint' , `statustext` = '' , `percent` = '$percent', `ts` = ".time()." WHERE `client`='$client' AND `name`='$statusBarName'");

	return(true);
}





/**
**name HTML_setStatusBarStatusByName($statusBarName, $client, $percent=false, $statustext=false)
**description Sets new percent value and/or new status text by clientname AND status bar name.
**parameter statusBarName: The name of the status bar.
**parameter client: The name of the client, the status bar belongs to (or other values for identifying the object the status bar belongs to)
**parameter percent: Percent value to write into the DB (may be false, if it should not be changed).
**parameter statustext: A text message that should be shown under the status bar and written to the DB (may be false, if it should not be changed).
**returns: false on parameter error.
**/
function HTML_setStatusBarStatusByName($statusBarName, $client, $percent=false, $statustext=false)
{
	return(HTML_setStatusBarStatus(false, $percent, $statustext, $statusBarName, $client));
}





/**
**name HTML_setStatusBarStatusByID($id, $percent=false, $statustext=false)
**description Sets new percent value and/or new status text by status bar ID.
**parameter id: ID of the status bar
**parameter percent: Percent value to write into the DB (may be false, if it should not be changed).
**parameter statustext: A text message that should be shown under the status bar and written to the DB (may be false, if it should not be changed).
**returns: false on parameter error.
**/
function HTML_setStatusBarStatusByID($id, $percent=false, $statustext=false)
{
	return(HTML_setStatusBarStatus($id, $percent, $statustext, false, false));
}





/**
**name HTML_setStatusBarStatus($id=false, $percent=false, $statustext=false, $statusBarName=false, $client=false)
**description Sets new percent value and/or new status text by status bar ID or clientname AND status bar name.
**parameter id: ID of the status bar (Optional parameter to set values of status bar with given ID).
**parameter percent: Percent value to write into the DB (may be false, if it should not be changed).
**parameter statustext: A text message that should be shown under the status bar and written to the DB (may be false, if it should not be changed).
**parameter statusBarName: The name of the status bar.
**parameter client: The name of the client, the status bar belongs to (or other values for identifying the object the status bar belongs to)
**returns: false on parameter error.
**/
function HTML_setStatusBarStatus($id=false, $percent=false, $statustext=false, $statusBarName=false, $client=false)
{
// 	HELPER_debugBacktraceToFile("/tmp/HTML_setStatusBarStatus.trace");

	$pSQL = '';

	//Check if the ID was given to select the status bar
	if ($id !== false)
		{
			CHECK_FW(CC_statusBarID, $id);
			$wSQL="`id` =$id";
		}
	//Check if the client ID AND the name of the status bar were given to select the status bar
	elseif (($client!==false) && ($statusBarName!==false))
	{
		CHECK_FW(CC_clientname, $client, CC_statusBarName, $statusBarName);
		$wSQL="`client`='$client' AND `name`='$statusBarName'";
	}
	else
		return(false);

	if (($percent === false ) && ($statustext) === false)
		return(false);

	//Add a percent change statement, if needed
	if ($percent !== false)
	{
		CHECK_FW(CC_percent, $percent);
		$pSQL = "`percent` =  '$percent'";
	}

	//Add a comma, if both values are changed
	if ( ($percent !== false) && ($statustext !== false) )
		$pSQL .= " , ";

	//Add a statustext change statement, if needed
	if ($statustext !== false)
	{
		CHECK_FW(CC_statusBarText, $statustext);
		$sSQL = "`statustext` =  '$statustext'";
	}

	DB_query("UPDATE `statusbar` SET $pSQL $sSQL , ts = ".time()." WHERE $wSQL");
}





/**
**name HTML_getStatusBarID($name, $client="")
**description Returns the status bar ID of the searched status bar.
**parameter name: The name of the status bar.
**parameter client: The name of the client, the status bar belongs to (or other values for identifying the object the status bar belongs to)
**returns: The status bar ID of the searched status bar or false if none could be found.
**/
function HTML_getStatusBarID($name, $client="")
{
	CHECK_FW(CC_clientname, $client, CC_statusBarName, $name);

	//Check if a client name is given and extend the SQL stament, if yes
	if (isset($client{1}))
		$clSQL = "`client` = '$client' AND";
	else
		$clSQL = "";

	$res = DB_query("SELECT `id` FROM `statusbar` WHERE $clSQL `name` = '$name'");

	//Check, if we got a status bar with the given parameters
	if (mysqli_num_rows($res) > 0)
	{
		$info = mysqli_fetch_array($res);
		return((int)$info['id']);
	}
	else
		return(false);
}





define('STATUSBAR_TYPE_bash','bash'); //The status bar percentage is calculated by executing a BASH script
define('STATUSBAR_TYPE_db','db'); //The status bar percentage is taken from the DB
/**
**name HTML_newStatusBar($name, $client, $type, $cmd="", $refreshtime=5, $statustext="", $percent=0)
**description Shows the iframe for a status bar. This actually displays the status bar.
**parameter name: The name of the status bar.
**parameter client: The name of the client, the status bar belongs to (or other values for identifying the object the status bar belongs to)
**parameter type: The method of calculating/getting the percentage to display in the status bar.
**parameter cmd: BASH command, if type is STATUSBAR_TYPE_bash.
**parameter refreshtime: Time (in seconds) between refreshes of the status bar.
**parameter statustext: A text message that should be shown under the status bar.
**parameter percent: Percent value to write into the DB.
**returns: The status bar ID of the just created status bar or false, if it could not be created.
**/
function HTML_newStatusBar($name, $client, $type, $cmd="", $refreshtime=5, $statustext="", $percent=0)
{
	CHECK_FW(CC_clientname, $client, CC_statusBarType, $type);

	if (isset($client{1}))
		CHECK_FW(CC_clientname, $client);

	$ret = DB_queryNoDie("INSERT INTO statusbar (name, type, refreshtime, cmd, client, statustext, percent, ts) VALUES ('$name', '$type', '$refreshtime', '$cmd', '$client', '$statustext', '$percent', '".time()."')");
	
	if ($ret === false)
		return(false);
	else
		return(mysqli_insert_id(DB_getConnection()));
}





/**
**name HTML_showStatusBar($id, $width = 300, $height = 50)
**description Shows the iframe for a status bar. This actually displays the status bar.
**parameter id: ID of the status bar.
**parameter width: The width of the status bar iframe.
**parameter height: The height of the status bar iframe.
**/
function HTML_showStatusBar($id, $width = 500, $height = 50)
{
	echo("<iframe scrolling=\"no\" allowtransparency=\"true\" src=\"/m23admin/misc/statusBar.php?id=$id&m23_language=".$GLOBALS["m23_language"]."&user=$_SERVER[PHP_AUTH_USER]\" width=\"$width\" height=\"$height\" frameborder=0></iframe>");
}





/**
**name HTML_showStatusBarHTML($id)
**description Shows the status bar, that is drawn in the iframe (this function is only called by statusBar.php).
**parameter id: ID of the status bar.
**/
function HTML_showStatusBarHTML($id)
{
	$lang = $_GET['m23_language'];
	CHECK_FW(CC_language, $lang);
	include("/m23/inc/i18n/$lang/m23base.php");

	$percentL = '';

	//Get some basic informations about the status bar
	$res = DB_query("SELECT `type` , `cmd` , `refreshtime`, `statustext`, `percent` , `ts` FROM `statusbar` WHERE `id` =$id");
	$info = mysqli_fetch_array($res);

	//Calculate the percentage by the status bar type
	switch ($info['type'])
	{
		case STATUSBAR_TYPE_bash:
				$percent = exec($info['cmd'], $useless, $exitCode);

				//Check if the BASH code is executable and update the timestamp if yes
				if ($exitCode == 0)
					{
						$time = time();
						DB_query("UPDATE `statusbar` SET ts = $time WHERE `id` =$id");
					}
				else
					$time = $info['ts'];

				$timeHTML = strftime($I18N_timeFormat,$time);
			break;

		case STATUSBAR_TYPE_db:
				$percent = (float)$info['percent'];
				$timeHTML = strftime($I18N_timeFormat,$info['ts']);
			break;
	}

	//Checks if there is a status text and generates HTML status code if yes
	if (isset($info['statustext']{1}))
		$statusHTML="$info[statustext]";
	else
		$statusHTML="";

	//Make sure the percent value for the row width is a number
	$percentI = (int)$percent;

	//Calculate the percent value to show with one digit after the dot
	$percentS = sprintf("%.1f%%",$percent);

	//Check if the percent number should be shown in the finished (left) or unfinished (right) part
	//So the font width of the procent number will not hinder showing the correct finished length
	if ($percent > 15)
	{
		$percentL = $percentS;
		$percentR = "";
	}
	else
	{
		$percentL = "";
		$percentR = $percentS;
	}

echo("
	<html>
		<head>
			<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/index.css\">
			<meta http-equiv=\"refresh\" content=\"$info[refreshtime]; URL=/m23admin/misc/statusBar.php?id=$id&m23_language=$lang\">
			<script type=\"text/javascript\">
				<!--
					sleep($info[refreshtime]000);
					self.location.href='/m23admin/misc/statusBar.php?id=$id&m23_language=$lang'
				//-->
			</script>
		</head>
		<body>
			<table width=\"100%\" border=0 style=\"border-collapse: collapse;\">
				<tr>
					<td width=\"$percentI%\" style=\"color: #FFFFFF; background-image:url(../../gfx/statusBarGradientGreen.png); background-position : center; background-repeat: repeat-x; text-shadow: #000000 2px 2px 3px;\" align=\"right\" >$percentL</td>
					<td width=\"".(100 - $percentI)."%\" style=\"background-image:url(../../gfx/statusBarGradientGray.png); background-position : center; background-repeat: repeat-x; color: #202020; text-shadow: #000000 1px 1px 2px;\" align=\"left\">$percentR</td>
				</tr>
			</table>
			<center><nobr><span class=\"highlight\">$timeHTML:</span> $statusHTML</nobr></center>
		</body>
	<html>
");
}





/**
**name HTML_multiCheckBox($htmlName, $valuesLabels, $defaultChecked = array(), $forceReload = false)
**description Defines a list of checkboxes, that represent a value each. The values of checked checkboxes are stored in an array and returned.
**parameter htmlName: Name of the HTML element.
**parameter valuesLabels: Array with the values and labels for the checkboxes.
**parameter defaultChecked: Array with values that are checked by default.
**parameter forceReload: Set to true if the check box should be set to the state of $defaultCheck in any case.
**returns: Array with the values of all checked checkboxes.
**/
function HTML_multiCheckBox($htmlName, $valuesLabels, $defaultChecked = array(), $forceReload = false)
{
	$i = 0;
	$html = '';
	$out = array();

	//Run thru all values and labels
	foreach ($valuesLabels as $val => $label)
	{
		//Generate a HTML name
		$CBhtmlName = "CB_".preg_replace('/[^a-zA-Z0-9]/', '_', $label);

		//Check if the checkbox is checked ;-)
		$checked = HTML_checkBox($CBhtmlName, $label, in_array($val,$defaultChecked), "", 1, $forceReload);

		//If yes, add its value to the output array
		if ($checked)
			$out[$i++] = $val;

		//Add the checkbox
		$html .= "<br>\n".constant($CBhtmlName);
	}

	define($htmlName, $html);

	return($out);
}





/**
**name HTML_multiCheckBoxShow($valuesLabels, $defaultChecked = array(), $forceReload = false)
**description Shows a list of checkboxes, that represent a value each. The values of checked checkboxes are stored in an array and returned.
**parameter valuesLabels: Array with the values and labels for the checkboxes.
**parameter defaultChecked: Array with values that are checked by default.
**parameter forceReload: Set to true if the check box should be set to the state of $defaultCheck in any case.
**returns: Array with the values of all checked checkboxes.
**/
function HTML_multiCheckBoxShow($valuesLabels, $defaultChecked = array(), $forceReload = false)
{
	$i = 0;

	//Run thru all values and labels
	foreach ($valuesLabels as $val => $label)
	{
		//Generate a HTML name
		$htmlName = "CB_".preg_replace('/[^a-zA-Z0-9]/', '_', $label);

		//Check if the checkbox is checked ;-)
		$checked = HTML_checkBox($htmlName, $label, in_array($val,$defaultChecked), "", 1, $forceReload);

		//If yes, add its value to the output array
		if ($checked)
			$out[$i++] = $val;

		//Show the checkbox
		echo("<br>\n".constant($htmlName));
	}
	return($out);
}





/**
**name HTML_setPage($page)
**description Sets the m23 page as hidden value.
**parameter page: Name of the page.
**/
function HTML_setPage($page)
{
	echo("<input type=\"hidden\" name=\"page\" value=\"$page\">");
}





/**
**name HTML_storableInput($htmlName, $prefKey, $initValue = false, &$storePointer = false, $size=20, $maxlength=255, $type = INPUT_TYPE_text, $extraHTML = '')
**description HTML text or password edit line with loading and storing the values to and from the session.
**parameter htmlName: Name of the HTML element.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter initValue: The initial value if the element is shown first.
**parameter storePointer: Additional pointer to the variable where to store the entered value.
**parameter size: Size (in characters) of the input line.
**parameter maxlength: The maximum length of the entered text.
**parameter type: Type of the edit line (INPUT_TYPE_text or INPUT_TYPE_password)
**parameter extraHTML: Extra HTML/JavaScript code 
**returns Returns the entered value, the default value or false.
**/
function HTML_storableInput($htmlName, $prefKey, $initValue = false, &$storePointer = false, $size=20, $maxlength=255, $type = INPUT_TYPE_text, $extraHTML = '')
{
	$initValue = HTML_getElementValue($htmlName, $prefKey, $initValue);

	//Define the input element
	define($htmlName,'<INPUT type="'.$type.'" id="'.$htmlName.'" name="'.$htmlName.'" size="'.$size.'" maxlength="'.$maxlength.'" value="'.$initValue.'"'.$extraHTML.'>');

	//Store its value to the session (to make it storable)
	$_SESSION['preferenceSpace'][$prefKey] = $initValue;

	//Check if the storePointer is defined and store the resulting value into it
	if (!($storePointer === false))
		$storePointer = $initValue;

	return($initValue);
}





/**
**name HTML_storable2xPassword($htmlName, $prefKey, $initValue = false, &$storePointer = false, $size=20, $maxlength=255, $type = INPUT_TYPE_password, $extraHTML = '')
**description HTML 2x password edit lines for entering and re-entering a the same password.
**parameter htmlName: Name of the HTML element.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter initValue: The initial value if the element is shown first.
**parameter storePointer: Additional pointer to the variable where to store the entered value.
**parameter size: Size (in characters) of the input line.
**parameter maxlength: The maximum length of the entered text.
**parameter type: unused, but there to be parameter compatible with HTML_storableInput.
**parameter extraHTML: Extra HTML/JavaScript code 
**returns Returns the password, if it's equal in both password edit lines, or false.
**/
function HTML_storable2xPassword($htmlName, $prefKey, $initValue = false, &$storePointer = false, $size=20, $maxlength=255, $type = INPUT_TYPE_password, $extraHTML = '')
{
	// Variables for the 2nd password line
	$prefKeyPw2 = "${prefKey}_pw2";
	$storePointerPw2 = false;

	$pw1 = HTML_storableInput("${htmlName}_pw1", $prefKey, $initValue, $storePointer, $size, $maxlength, INPUT_TYPE_password, $extraHTML);
	$pw2 = HTML_storableInput("${htmlName}_pw2", $prefKeyPw2, $initValue, $storePointerPw2, $size, $maxlength, INPUT_TYPE_password, $extraHTML);

	// Build combined
	define($htmlName,constant("${htmlName}_pw1").'&nbsp;'.constant("${htmlName}_pw2"));

	// Check for equality of entered passwords
	if ($pw1 != $pw2)
	{
		$storePointer = false;
		return(false);
	}

	return($pw1);
}





/**
**name HTML_storableSelection($htmlName, $prefKey, $array, $type, $vertical = true, $defaultSelection = false, &$storePointer = false, $js = "")
**description Shows a list of radio buttons or a selection with loading and storing the checking state to and from the session.
**parameter htmlName: Name of the HTML element.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter array: An array that hold the returned values (array keys) the naming for the elements (array values).
**parameter type: SELTYPE_selection for a selection or SELTYPE_radio for radio buttons.
**parameter vertical: Set to true if the radio buttons should be aligned vertically or to false for horizontal aligning. This parameter is ignored by selections.
**parameter defaultSelection: The value of the item to select by default.
**parameter storePointer: Additional pointer to the variable where to store the entered value.
**parameter js: Here can JavaScript or other parameters be added.
**returns true if the check box is checked.
**/
function HTML_storableSelection($htmlName, $prefKey, $array, $type, $vertical = true, $defaultSelection = false, &$storePointer = false, $js = "")
{
	$val = HTML_selection($htmlName, $array, $type, $vertical, $defaultSelection, $prefKey, $js);

	//Store its value to the session (to make it storable)
	$_SESSION['preferenceSpace'][$prefKey] = $val;

	//Check if the storePointer is defined and store the resulting value into it
	if (!($storePointer === false))
		$storePointer = $val;

	return($val);
}





/**
**name HTML_storableMultiSelection($htmlName, $prefKey, $array, $type, $multipleSize, $vertical = true, $defaultSelection = false, &$storePointer = false, $js = "")
**description Shows a list of radio buttons or a selection with loading and storing the checking state to and from the session.
**parameter htmlName: Name of the HTML element.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter array: An array that hold the returned values (array keys) the naming for the elements (array values).
**parameter type: SELTYPE_selection for a selection or SELTYPE_radio for radio buttons.
**parameter multipleSize: Number of elements to display.
**parameter vertical: Set to true if the radio buttons should be aligned vertically or to false for horizontal aligning. This parameter is ignored by selections.
**parameter defaultSelection: The value of the item to select by default.
**parameter storePointer: Additional pointer to the variable where to store the entered value.
**parameter js: Here can JavaScript or other parameters be added.
**returns true if the check box is checked.
**/
function HTML_storableMultiSelection($htmlName, $prefKey, $array, $type, $multipleSize, $vertical = true, $defaultSelection = false, &$storePointer = false, $js = "")
{
	$val = HTML_selection($htmlName, $array, $type, $vertical, $defaultSelection, $prefKey, $js, $multipleSize);

	//Store its value to the session (to make it storable)
	$_SESSION['preferenceSpace'][$prefKey] = $val;

	//Check if the storePointer is defined and store the resulting value into it
	if (!($storePointer === false))
		$storePointer = $val;

	return($val);
}






/**
**name HTML_storableCheckBox($htmlName, $label, $prefKey, $defaultCheck = false, &$storePointer = false, $checkedValue = "yes", $unCheckedValue = "")
**description Shows a check box with label with loading and storing the checking state to and from the session.
**parameter htmlName: Name of the HTML element.
**parameter label: Label of the element.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter defaultCheck: Set to true if the check box should be checked if no HTML value is given.
**parameter storePointer: Additional pointer to the variable where to store the entered value.
**parameter checkedValue: The value that should be stored into $storePointer if the check box is checked.
**parameter unCheckedValue: The value that should be stored into $storePointer if the check box is NOT checked.
**returns true if the check box is checked.
**/
function HTML_storableCheckBox($htmlName, $label, $prefKey, $defaultCheck = false, &$storePointer = false, $checkedValue = "yes", $unCheckedValue = "")
{

// 	if ('CB_addNewLocalLogin' == $htmlName)		//DEBUG
// 	{
// 		print('<h2>HTML_storableCheckBox</h2>');
// 		print(serialize($defaultCheck));
// 	}

	//Determine if $defaultCheck is a boolean value or if it contains the value of $checkedValue
	if (!is_bool($defaultCheck))
	{
		if ($defaultCheck === $checkedValue)
			$defaultCheck = true;
		else
			$defaultCheck = false;
	}

	$val = HTML_checkBox($htmlName, $label, $defaultCheck, $prefKey, $checkedValue);

// 	if ($htmlName == 'CB_addNewLocalLogin') //DEBUG
// 	{
// 		print("<b>$htmlName: ".serialize($val)." defaultCheck ".serialize($defaultCheck)."</b><br>");
// 	}


	//Store its value to the session (to make it storable)
	$_SESSION['preferenceSpace'][$prefKey] = $val;

	//Check if the storePointer is defined and store the resulting value into it
	if (!($storePointer === false))
		$storePointer = ($val ? $checkedValue : $unCheckedValue);

	return($val);

}





/**
**name HTML_getElementValue($htmlName, $prefKey, $initValue, $checkbox=false)
**description Gets the value for a HTML element by the session data or POST value.
**parameter htmlName: Name of the HTML element.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter initValue: The initial value if the element is shown first.
**returns Returns the default value, the session value or false.
**/
function HTML_getElementValue($htmlName, $prefKey, $initValue, $checkbox=false)
{
	/*
		There are three steps for getting the value for the HTML element ordered by priority:

		1. Check if the preference values should be load from the session by force
		2. Load the value from the POST variable
		3. Load the value from the preference space in the session if it exists
	*/

// 	if ($checkbox) //DEBUG
// 	{
// 		print("START-initValue ($htmlName):".serialize($initValue)."<br>");
// 	}


	$checkboxPostIgnore = 0;
	//Special settings for CLIENT_showAddDialog, when used to add an m23 VM to use default values for the check boxes.
	if (isset($_POST['ED_client'])) $checkboxPostIgnore ++;
	if (isset($_POST['ED_mac'])) $checkboxPostIgnore ++;

	if (isset($_SESSION['preferenceForceHTMLReloadValues']) && $_SESSION['preferenceForceHTMLReloadValues'] && isset($_SESSION['preferenceSpace'][$prefKey]))
		{
			$initValue = $_SESSION['preferenceSpace'][$prefKey];
			$met='preferenceForceHTMLReloadValues';
		}
	elseif (isset($_POST[$htmlName]))
		{
			$initValue = $_POST[$htmlName];
			$met="_POST";
		}
	elseif ((isset($_SESSION['preferenceSpace'][$prefKey])) && !$checkbox)
		{
			$initValue = $_SESSION['preferenceSpace'][$prefKey];
			$met='preferenceSpace';
		}
	elseif ($checkbox && !isset($_POST[$htmlName]) && (count($_POST) > $checkboxPostIgnore))
		{
			$initValue = false;
			$met="CB";
		}
	else
		$met="initValue";

/*	if ($checkbox) //DEBUG
	{
		print("MET($htmlName): $met initValue:".serialize($initValue)."<br>");
		print_r2($_POST);
	}
*/

// 	if ($htmlName == 'RB_partMethod')
// 		print("MET($htmlName): #$met# initValue:".serialize($initValue)."<br>");

	return($initValue);
}





/**
**name HTML_listSelection($selName,$list,&$first,$firstName="")
**description shows a selection with options stored in an array
**parameter selName: name of the selection
**parameter list: array with the entries. The array can be a simple numeric array or an associative array with discrete entries for the shown name and the value. e.g. : $l[name0]="public"; $l[val0]="internal"; $l[name1]="public1"; $l[val1]="internal1"; public and public1 will be shown the user in the webbrowser, while internal and internal1 are the values that are transfered to the server.
**parameter first: entry that should be shown first (this is the internal value and NOT the name shown to the user). the first value from the list will be written to $first. set first to "false" to disable writing the first entry.
**parameter firstName: if you want to use the associative array variant and a first value, you need to set the name that should be shown to the user. This name is stored in firstName
**/
function HTML_listSelection($selName,$list,&$first,$firstName="")
{
	$out="<SELECT name=\"$selName\" size=\"1\">\n";

	if (!isset($list['name0']))
	{
		$normalArray = true;
		$amount = count($list);
	}
	else
	{
		$normalArray = false;
		$amount = count($list) / 2;
	}

	if (strlen($first) > 0)
	{
		if (!empty($firstName))
			$out.="<option value=\"$first\">$firstName</option>\n";
		else
		{
			if ($normalArray)
				$out.="<option value=\"$first\">$first</option>\n";
			else
			{
				for ($i=0; $i < $amount; $i++)
					if ($list["val$i"] == $first)
					{
						$out.="<option value=\"$first\">".$list["name$i"]."</option>\n";
						break;
					}
			}
		}
	}

	if (is_array($list))
	{
		if ($normalArray)
		{
			foreach ($list as $var => $val)
				if ($first != $val)
					$out.="<option value=\"".$val."\">".$val."</option>\n";
		}
		else
		{
			for ($i=0; $i < $amount; $i++)
				if ($first != $list["val$i"])
					$out.="<option value=\"".$list["val$i"]."\">".$list["name$i"]."</option>\n";
		}
	}

	$out.="</SELECT>\n";

	if ((!($first === false)) && empty($first))
		if ($normalArray)
			$first = isset($list[0]) ? $list[0] : '';
		else
			$first = isset($list['val0']) ? $list['val0'] : '';
	
	return($out);
}





/**
**name HTML_showTableHeader($centerTable=false, $tableStyle = "subtable", $width = "")
**description prints the header of a shadowed table
**parameter centerTable: set to true if the table should be centered vertically
**parameter tableStyle: CSS class of the inner table.
**parameter width: Width of the table.
**/
function HTML_showTableHeader($centerTable=false, $tableStyle = "subtable", $width = "", $valign = 'center')
{
if ($centerTable)
echo("<table width=\"100%\" height=\"100%\">
	<tr valign=\"$valign\" height=\"100%\">
		<td>");

	echo("
<table align=\"center\" $width><tr><td><div class=\"subtable_shadow\">
<table class=\"$tableStyle\" align=\"center\" $width>
");
}





/**
**name HTML_showTableEnd($centerTable)
**description prints the end of a shadowed table
**parameter centerTable: set to true if the table should be centered vertically
**/
function HTML_showTableEnd($centerTable=false)
{
echo("
</table></div></td><tr></table>
");
if ($centerTable)
	echo("</td>
	</tr>
	</table>");
};





/**
**name HTML_showFormHeader($addAction="",$method="post")
**description Shows the header of a formular
**parameter addAction: set it, if additional parameters to index.php should be used
**parameter method: default is POST, but you can set it to GET
**/
function HTML_showFormHeader($addAction="",$method="post")
{
// 	$_SESSION = array();

	echo("<form method=\"$method\" action=\"index.php$addAction\" name=\"htmlform\" id=\"htmlformID\" enctype=\"multipart/form-data\">".'
	<script language="javascript">document.write(\'<input type="hidden" name="javaScriptEnabled" value="on">\');</script>');

	if (isset($_POST['MSESS_variables']))
		$sessionFromPost = unserialize(urldecode($_POST['MSESS_variables']));
	else
		$sessionFromPost = false;

	if (is_array($sessionFromPost))
		$_SESSION = array_merge($_SESSION,unserialize(urldecode($_POST['MSESS_variables'])));
	if (isset($_GET['client']))
		$_SESSION['clientName'] = $_GET['client'];
	if (isset($_GET['id']))
		$_SESSION['clientID'] = $_GET['id'];

// 	print_r($_SESSION);
	PREF_preferenceLoadManagerHandler();
}





/**
**name HTML_showFormEnd()
**description Shows the end of a formular
**/
function HTML_showFormEnd()
{
PREF_preferenceSaveManagerHandler();
$_SESSION['preferenceForceHTMLReloadValues'] = NULL;
echo("<input type=\"hidden\" name=\"MSESS_variables\" value=\"".urlencode(serialize($_SESSION))."\">
</form>
	");
}





/**
**name HTML_submit($htmlName, $label, $extra="", $allowDoubleDefinition = true)
**description Defines a submit button.
**parameter htmlName: Name of the HTML element.
**parameter label: Label of the element.
**parameter extra: Extra options for the HTML input tag.
**parameter allowDoubleDefinition: If set to true, HTML element constants will be defined even if there is a previously defined constant with the same name. This will run into an error and helps debugging.
**returns True if it was clicked otherwise false.
**/
function HTML_submit($htmlName, $label, $extra="", $allowDoubleDefinition = true)
{
	if (!defined($htmlName) || $allowDoubleDefinition)
		define($htmlName,'
			<INPUT type="submit" name="'.$htmlName.'" value="'.$label.'"'.$extra.'>
		');

	return(isset($_POST[$htmlName]) && ($label === stripslashes($_POST[$htmlName])));
}





/**
**name HTML_submitImg($htmlName, $img, $alt, $extra="")
**description Defines a graphical submit button.
**parameter htmlName: Name of the HTML element.
**parameter img: Name of the image to show.
**parameter alt: Alternative text to show when no images can be shown.
**parameter extra: Extra options for the HTML input tag.
**returns True if it was clicked otherwise false.
**/
function HTML_submitImg($htmlName, $img, $alt, $extra="")
{
	define($htmlName,'
		<INPUT type="image" src="'.$img.'" name="'.$htmlName.'" value="'.$htmlName.'" alt="'.$alt.'"'.$extra.'>
	');

	return(isset($_POST[$htmlName.'_x']));
}





/**
**name HTML_button($htmlName, $img, $value="", $extra="")
**description Defines a (graphical) button
**parameter htmlName: Name of the HTML element.
**parameter label: Label of the button
**parameter value: value of the button (not label)
**parameter extra: Extra options for the HTML input tag.
**/
function HTML_button($htmlName, $label, $value="", $extra="")
{
	$htmlCode = '<button type="button" id="'.$htmlName.'" name="'.$htmlName.'" value="'.$value.'"'.$extra.'>'.$label.'</button>';
	define($htmlName, $htmlCode);
}





define('INPUT_TYPE_text','text');
define('INPUT_TYPE_password','password');
/**
**name HTML_input($htmlName, $htmlValue = false, $size=20, $maxlength=255, $type = INPUT_TYPE_text, $forceDefaultSelection = false)
**description HTML text or password edit line.
**parameter htmlName: Name of the HTML element.
**parameter htmlValue: The default text to show in the edit line if nothing was submitted.
**parameter size: Size (in characters) of the input line.
**parameter maxlength: The maximum length of the entered text.
**parameter type: Type of the edit line (INPUT_TYPE_text or INPUT_TYPE_password)
**parameter forceDefaultSelection: Don't query $_POST, use what is supplied by htmlValue
**parameter Returns the entered value, the default value or false.
**/
function HTML_input($htmlName, $htmlValue = false, $size=20, $maxlength=255, $type = INPUT_TYPE_text, $forceDefaultSelection = false)
{
	//check if the password/text is valid
	if (!$forceDefaultSelection)
		if (isset($_POST[$htmlName]))
			$htmlValue = $_POST[$htmlName];

	define($htmlName,'<INPUT type="'.$type.'" id="'.$htmlName.'" name="'.$htmlName.'" size="'.$size.'" maxlength="'.$maxlength.'" value="'.$htmlValue.'">');
	return($htmlValue);
}





/**
**name array_makeFirst(&$arr,$first)
**description special sort function that makes a special element the first element and leaves the other elements in its previous order.
**parameter arr: Array to sort
**parameter first: Value of the element that should be put on top
**/
function array_makeFirst(&$arr,$first)
{
	if (!is_null($first))
	{
		if (is_array($first))
			$out = $first;
		else
			$out[array_search($first, $arr)] = $first;

		foreach ($arr as $key => $val)
			$out[$key] = $val;
			
		$arr = $out;
	}
};





/**
**name HTML_getValidSelected($selected, $arrayKeys, $defaultSelection)
**description Checks for a valid selected value from a list of possible values. In case the value could not be found, a default value is taken.
**parameter selected: Array or single value to check, if it is on the list of array keys.
**parameter arrayKeys: An array that holds the possible returned values (array keys).
**parameter defaultSelection: The value of the item to select by default.
**returns A valid value from a list of possible values.
**/
function HTML_getValidSelected($selected, $arrayKeys, $defaultSelection)
{
	if (!in_array($selected,$arrayKeys))
	{
		if (in_array($defaultSelection,$arrayKeys))
			$selected = $defaultSelection;
		else
			$selected = isset($arrayKeys[0]) ? $arrayKeys[0] : false;
	}

	return($selected);
}





define('SELTYPE_selection',0);
define('SELTYPE_radio',1);

/**
**name HTML_selection($htmlName, $array, $type, $vertical = true, $defaultSelection = false, $prefKey = false, $js = "", $multipleSize = false, $forceDefaultSelection = false)
**description Shows a list of radio buttons or a selection.
**parameter htmlName: Name of the HTML element.
**parameter array: An array that hold the returned values (array keys) the naming for the elements (array values).
**parameter type: SELTYPE_selection for a selection or SELTYPE_radio for radio buttons.
**parameter vertical: Set to true if the radio buttons should be aligned vertically or to false for horizontal aligning. This parameter is ignored by selections.
**parameter defaultSelection: The value of the item to select by default.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter js: Here can JavaScript or other parameters be added.
**parameter multipleSize: If set to a number (and not to false) a multi selection is generated, where the user can select multiple entries. The number sets the amount of entries to show the user.
**parameter forceDefaultSelection: Don't query $_POST or prefKey, use what is supplied by defaultSelection
**returns The value of the selected element or false if nothing was selected.
**/
function HTML_selection($htmlName, $array, $type, $vertical = true, $defaultSelection = false, $prefKey = false, $js = "", $multipleSize = false, $forceDefaultSelection = false)
{
	if (($defaultSelection !== false) && $forceDefaultSelection)
		$selected = $defaultSelection;
	else
	$selected = HTML_getElementValue($htmlName, $prefKey, $defaultSelection);



	if (($multipleSize !== false) && (is_numeric($multipleSize)))
	{
		$multipleSelectEnable = ' multiple="multiple"';
		$multipleHtmlNameAdd = '[]';
		$multipleSizeAdd = 'size="'.$multipleSize.'"';
	}
	else
		$multipleSizeAdd = $multipleHtmlNameAdd = $multipleSelectEnable = '';


	/*
		check if the selected value is a valid array key
			and if not
		check if the default value is a valid array key and can be assigned
			and if not
		take the first key from the array
	*/
	$arrayKeys = array_keys($array);
	
	if (is_array($selected))
	{
		foreach ($selected as $key => $val)
			$selected[$key] = HTML_getValidSelected($val,$arrayKeys,$defaultSelection);
	}
	else
	{
		$selected = HTML_getValidSelected($selected,$arrayKeys,$defaultSelection);

		// For selections allowing multiple elements to be chosen, $selected must be an array
		if ($multipleSize !== false)
			$selected = array($selected);
	}

	$htmlCode="";


	if ($type === SELTYPE_selection)
	{
		//check if the selected element should become the first in the array
		if (is_array($selected))
			array_makeFirst($array, array_intersect($array, $selected));
		elseif (!($selected === false))
			array_makeFirst($array, $array[$selected]);

		$htmlCode='<SELECT '.$js.' id="'.$htmlName.$multipleHtmlNameAdd.'" name="'.$htmlName.$multipleHtmlNameAdd.'" '.$multipleSelectEnable.' '.$multipleSizeAdd.'>'."\n";

		foreach ($array as $value => $description)
		{
			$htmlSelected = "";

			if ($selected === false)
				$selected = $value;
			elseif (is_array($selected) && in_array($value, $selected))
				$htmlSelected = " selected";

			$htmlCode.='<option value="'.$value.'"'.$htmlSelected.'>'.$description.'</option>'."\n";
		}

		$htmlCode.='</SELECT>';
	}
	elseif ($type === SELTYPE_radio)
	{
		if ($vertical)
			$htmlBreak="<br>";
		else
			$htmlBreak="";
		
		foreach ($array as $value => $description)
		{
			//if the element is checked, set checked flag
			if ($value == $selected)
				$htmlCode.='<INPUT '.$js.'type="radio" name="'.$htmlName.'" value="'.$value.'" checked> '.$description."$htmlBreak\n";
			else
				$htmlCode.='<INPUT '.$js.'type="radio" name="'.$htmlName.'" value="'.$value.'"> '.$description."$htmlBreak\n";
		}
	}

	define($htmlName,$htmlCode);

	return($selected);
};





/**
**name HTML_datalist($htmlName, $array, $defaultSelection = false, $prefKey = false, $js = "")
**description Shows a datalist with auto-completion. Caution: Not supported by Safari browser 12.0 (or earlier).
**parameter htmlName: Name of the HTML element.
**parameter array: An array that hold the returned values (array keys) the naming for the elements (array values).
**parameter defaultSelection: The value of the item to select by default.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter js: Here can JavaScript or other parameters be added.
**parameter forceDefaultSelection: Don't query $_POST, use what is supplied by defaultSelection
**returns The value of the selected element or false if nothing was selected.
**/
function HTML_datalist($htmlName, $array, $defaultSelection = false, $prefKey = false, $js = "", $forceDefaultSelection = false)
{
	if (($defaultSelection !== false) && $forceDefaultSelection)
		$selected = $defaultSelection;
	else
		$selected = HTML_getElementValue($htmlName, $prefKey, $defaultSelection);

	if (!($selected === false))
		$htmlSelected = 'value="'.$selected.'"';
	else
		$htmlSelected = "";

	$htmlCode="";
	$htmlCode='<input '.$js.' list="DL_'.$htmlName.'" id="'.$htmlName.'" name="'.$htmlName.'" '.$htmlSelected.'>'."\n";
	$htmlCode.='<datalist id="DL_'.$htmlName.'" name="'.$htmlName.'">'."\n";
	foreach ($array as $value => $description)
	{
		$htmlCode.='  <option value="'.$value.'">'.$description.'</option>'."\n";
	}
	$htmlCode.='</datalist>'."\n";

	define($htmlName, $htmlCode);

	return(array_search($selected, $array));
}





/**
**name HTML_imgSelection($htmlName, $array, $imgArray = array(), $defaultSelection = false, $prefKey = false, $js = "", $forceDefaultSelection = false)
**description Shows a jQuery enhanced SELECT
**parameter htmlName: Name of the HTML element.
**parameter array: An array that hold the returned values (array keys) the naming for the elements (array values).
**parameter imgArray: An array containing the images for our options.
**parameter defaultSelection: The value of the item to select by default.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter js: Here can JavaScript or other parameters be added.
**parameter forceDefaultSelection: Don't query $_POST, use what is supplied by defaultSelection
**returns The value of the selected element or false if nothing was selected.
**/
function HTML_imgSelection($htmlName, $array, $imgArray = array(), $defaultSelection = false, $prefKey = false, $js = "", $forceDefaultSelection = false)
{
	if (($defaultSelection !== false) && $forceDefaultSelection)
		$selected = $defaultSelection;
	else
		$selected = HTML_getElementValue($htmlName, $prefKey, $defaultSelection);

	$htmlCode="";
	$htmlCode='<SELECT class="imgselectmenu" '.$js.' id="'.$htmlName.'" name="'.$htmlName.'">'."\n";

	$i=0;
	foreach ($array as $value => $description)
	{
		$htmlSelected = "";

		if ($selected === false)
			$selected = $value;
		elseif ($selected == $value)
			$htmlSelected = " selected";

		if (!empty($imgArray[$i]))
			$img = $imgArray[$i];
		else
			$img = "";

		$htmlCode.='<option img="'.$img.'" value="'.$value.'"'.$htmlSelected.'>'.$description.'</option>'."\n";
		$i++;
	}

	$htmlCode.='</SELECT>';

	define($htmlName, $htmlCode);

	return($selected);
}





/**
**name HTML_checkBox($htmlName, $label, $defaultCheck = false, $prefKey = "", $htmlValue = 1, $forceReload = false, $extraHTML = '')
**description Shows a check box with label.
**parameter htmlName: Name of the HTML element.
**parameter label: Label of the element.
**parameter defaultCheck: Set to true if the check box should be checked if no HTML value is given.
**parameter prefKey: Variable name of the preference the dialog element stands for.
**parameter htmlValue: Value of the checkbox if clicked.
**parameter forceReload: Set to true if the check box should be set to the state of $defaultCheck in any case.
**parameter extraHTML: Extra HTML/JavaScript code 
**returns True if the check box is checked.
**/
function HTML_checkBox($htmlName, $label, $defaultCheck = false, $prefKey = "", $htmlValue = 1, $forceReload = false, $extraHTML = '')
{
	if ($forceReload)
	{
		if ($defaultCheck)
			$value = $htmlValue;
		else
			$value = "not$htmlValue";
	}
	else
		$value = HTML_getElementValue($htmlName, $prefKey, $defaultCheck, true);

	//Check if the checkbox is checked
	if (($value == $htmlValue) || ($value == 1)) /*Needs == and not === because of DB entries that are not from type boolean, but are normal strings with a 0 */
		$htmlChecked = 'checked="checked"';
	else
		$htmlChecked = "";
	
// print("HTML_checkBox($htmlName): ".serialize($value)." IV: $htmlValue $htmlChecked<br>"); //DEBUG

	//Check if the label is not empty
	if (isset($label{0}))
		$labelCode=$label;
	else
		$labelCode='';

	define($htmlName,'<INPUT type="checkbox" id="'.$htmlName.'" name="'.$htmlName.'" value="'.$htmlValue.'" '.$extraHTML.' '.$htmlChecked.'> '.$labelCode);
	
	//Alternate solution, if unchecked boxes return the default value
// 	return($_POST[$htmlName] == $htmlValue);
	return($value == $htmlValue);
};





/**
**name HTML_checkBoxCheckAll()
**description Generates an array with all checked checkboxes. It assumes that value of a checked checkbox is 1.
**parameter filter: Filter to get only the POST elements which begin with the filter string.
**returns Array with all checked checkboxes.
**/
function HTML_checkBoxCheckAll($filter = 'CB_')
{
	$out = array();
	$i = 0;
	foreach ($_POST as $key => $value)
	{
		if (($value == 1) && (strpos($key , $filter) === 0))
			$out[$i++] = $key;
	}
	return($out);
}





/**
**name HTML_submitDefine($htmlName, $label, $extra="", $allowDoubleDefinition = true)
**description Defines but does not show a button.
**parameter htmlName: Name of the HTML element.
**parameter label: Label of the element.
**parameter extra: Extra options for the HTML input tag.
**parameter allowDoubleDefinition: If set to true, HTML element constants will be defined even if there is a previously defined constant with the same name. This will run into an error and helps debugging.
**/
function HTML_submitDefine($htmlName, $label, $extra="", $allowDoubleDefinition = true)
{
	if (!defined($htmlName) || $allowDoubleDefinition)
		define($htmlName,'
			<INPUT type="submit" name="'.$htmlName.'" value="'.$label.'"'.$extra.'>
		');
}





/**
**name HTML_submitCheck($htmlName)
**description Checks if a previously defined button was clicked.
**parameter htmlName: Name of the HTML element.
**returns True if the button was clicked.
**/
function HTML_submitCheck($htmlName)
{
	return(isset($_POST[$htmlName]));
}





/**
**name HTML_showTableRow()
**description Shows a table row with a variable amount of entries. The parameters are shown side by side as rows in a table. If more than one HTML_showTableRow commands are executed in one table it is needed to always use the same amount of paramaters in each call.
**parameter Arbitrary amount of cells to show in a table.
**/
function HTML_showTableRow()
{
	$first = func_get_arg(0);
	$class = $td = '';

	// Check, if there are parameters for the row given as array
	if (is_array($first))
	{
		// Get additional td attributes
		if (isset($first['td']))
			$td = $first['td'];

		// Add vertikal top alignment in the rows
		if (isset($first['tdvtop']) && $first['tdvtop'])
			$td .= ' valign="top" ';

		// Save it for the coloring
		if (isset($first['highlight']) && is_bool($first['highlight']))
			$first = $first['highlight'];
	}

	//Check, if the first parameter (de)activates the coloring of the row
	if (is_bool($first))
	{
		if ($first)
			$class=' class="oddrow"';
		else
			$class=' class="evenrow"';

		//The first parameter with row contents is 1
		$i = 1;
	}
	else
		//The first parameter with row contents is 0
		$i = 0;

	$amount = func_num_args();
	echo("<tr$class>\n");
	for(; $i < $amount; $i++)
		echo("<td $td><p>".func_get_arg($i)."</p></td>\n");
	echo("</tr>\n");
}





/**
**name HTML_showTableHeading()
**description Shows a table heading row with a variable amount of entries. The parameters are shown side by side as rows in a table. If more than one HTML_showTableRow commands are executed in one table it is needed to always use the same amount of paramaters in each call.
**parameter Arbitrary amount of cells to show in a table.
**/
function HTML_showTableHeading()
{
	$amount = func_num_args();
	echo("<tr>\n");
	for($i = 0; $i < $amount; $i++)
		echo("<td class=\"subhighlight\"><p>".func_get_arg($i)."</p></td>\n");
	echo("</tr>\n");
}





/**
**name HTML_textArea($htmlName, $cols, $rows, $default="")
**description Shows a text area to insert text.
**parameter htmlName: Name of the HTML element.
**parameter cols: Number of columns.
**parameter rows: Number of rows to show.
**parameter default: Text to show by default.
**returns: The entered text.
**/
function HTML_textArea($htmlName, $cols, $rows, $default="")
{
	$text = HTML_getElementValue($htmlName, false, $default);
	define($htmlName,'<textarea  name="'.$htmlName.'" cols="'.$cols.'" rows="'.$rows.'">'.$text.'</textarea>');
	return($text);
}





/**
**name HTML_showPagePrintButton()
**description Shows a print button that allows easy printing of the current m23 administration interface.
**/
function HTML_showPagePrintButton()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	echo('
	<div align="right">
		<a href="javascript:window.print()">
			<img src="/gfx/printer-mini.png" border="0" alt="'.$I18N_print.'" title="'.$I18N_print.'">
		</a>
		<a href="#m23helpBox">
			<img src="/gfx/helpRed-mini.png" border="0" alt="'.$I18N_help.'" title="'.$I18N_help.'">
		</a>
	</div>
	');
}

?>
