<?

/**
**name CRON_genCronEntry($min, $hour, $dayOfMonth, $month, $dayOfWeek, $user, $cmd, $identifier, $runInScreen)
**description Creates a cron line to insert into crontab.
**parameter min: Minute or * for every minute to execute the cron job. (0-59)
**parameter hour: Hour or * for every hour to execute the cron job. (0-23)
**parameter dayOfMonth: The day in the month or * for all days to execute the cron job. (1-31)
**parameter month: The month or * for every months to execute the cron job. (1-12)
**parameter dayOfWeek: The day in the week or * for every week days to execute the cron job. (0-7 (0 or 7 is Sun))
**parameter user: The user the cron job should be run under.
**parameter cmd: The command to exectute.
**parameter identifier: A string to identify the cron entry (for deletion)
**parameter runInScreen: Set to true if the command should be run in a screen.
**returns The crontab line that can be inserted.
**/
function CRON_genCronEntry($min, $hour, $dayOfMonth, $month, $dayOfWeek, $user, $cmd, $identifier, $runInScreen)
{
	$identifierAdd = ";#$identifier";
	
	if ($runInScreen)
	{
		$screenCmd = "screen -dmS $identifier ";
	}
	else
	{
		$screenCmd = " ";
	}

	return("$min $hour $dayOfMonth $month $dayOfWeek $user $screenCmd$cmd$identifierAdd");
}





/**
**name CRON_addJobBasic($min, $hour, $dayOfMonth, $month, $dayOfWeek, $user, $cmd, $identifier, $runInScreen)
**description Adds a command to the crontab.
**parameter min: Minute or * for every minute to execute the cron job. (0-59)
**parameter hour: Hour or * for every hour to execute the cron job. (0-23)
**parameter dayOfMonth: The day in the month or * for all days to execute the cron job. (1-31)
**parameter month: The month or * for every months to execute the cron job. (1-12)
**parameter dayOfWeek: The day in the week or * for every week days to execute the cron job. (0-7 (0 or 7 is Sun))
**parameter user: The user the cron job should be run under.
**parameter cmd: The command to exectute.
**parameter identifier: A string to identify the cron entry (for deletion)
**parameter runInScreen: Set to true if the command should be run in a screen.
**/
function CRON_addJobBasic($min, $hour, $dayOfMonth, $month, $dayOfWeek, $user, $cmd, $identifier, $runInScreen)
{
	$identifier = CRON_getNextIdentifierNr($identifier);
	SERVER_addLineToFile("/etc/crontab",$identifier,CRON_genCronEntry($min, $hour, $dayOfMonth, $month, $dayOfWeek, $user, $cmd, $identifier, $runInScreen));
	CRON_reloadConfig();
}





/**
**name CRON_rmJob($identifier)
**description Removes an entry from the crontab.
**parameter identifier: A string to identify the cron entry (for deletion)
**/
function CRON_rmJob($identifier)
{
	SERVER_delLineFromFile("/etc/crontab",$identifier);
	CRON_reloadConfig();
}





/**
**name CRON_reloadConfig()
**description Reloads cron with new crontab.
**/
function CRON_reloadConfig()
{
	SERVER_runInBackground("cronReload".md5(rand()), "/etc/init.d/cron restart", "root", false);
}





/**
**name CRON_addJobHourly($min, $intervall, $user, $cmd, $identifier, $runInScreen)
**description Runs a command every N hours.
**parameter min: Minute or * for every minute to execute the cron job. (0-59)
**parameter user: The user the cron job should be run under.
**parameter cmd: The command to exectute.
**parameter identifier: A string to identify the cron entry (for deletion)
**parameter runInScreen: Set to true if the command should be run in a screen.
**/
function CRON_addJobHourly($min, $intervall, $user, $cmd, $identifier, $runInScreen)
{
	CRON_addJobBasic($min, "*/$intervall", "*", "*", "*", $user, $cmd, $identifier, $runInScreen);
}





/**
**name CRON_addJobDayly($min, $hour, $user, $cmd, $identifier, $runInScreen)
**description Runs a command every day at a specified time.
**parameter min: Minute or * for every minute to execute the cron job. (0-59)
**parameter hour: Hour or * for every hour to execute the cron job. (0-23)
**parameter user: The user the cron job should be run under.
**parameter cmd: The command to exectute.
**parameter identifier: A string to identify the cron entry (for deletion)
**parameter runInScreen: Set to true if the command should be run in a screen.
**/
function CRON_addJobDayly($min, $hour, $user, $cmd, $identifier, $runInScreen)
{
	CRON_addJobBasic($min, $hour, "*", "*", "*", $user, $cmd, $identifier, $runInScreen);
}





/**
**name CRON_addJobWeekly($min, $hour, $dayOfWeek, $user, $cmd, $identifier, $runInScreen)
**description Runs a command every week on a specified week day at a specified time.
**parameter min: Minute or * for every minute to execute the cron job. (0-59)
**parameter hour: Hour or * for every hour to execute the cron job. (0-23)
**parameter dayOfWeek: The day in the week or * for every week days to execute the cron job. (0-7 (0 or 7 is Sun))
**parameter user: The user the cron job should be run under.
**parameter cmd: The command to exectute.
**parameter identifier: A string to identify the cron entry (for deletion)
**parameter runInScreen: Set to true if the command should be run in a screen.
**/
function CRON_addJobWeekly($min, $hour, $dayOfWeek, $user, $cmd, $identifier, $runInScreen)
{
	CRON_addJobBasic($min, $hour, "*", "*", $dayOfWeek, $user, $cmd, $identifier, $runInScreen);
}





/**
**name CRON_getTimeBaseArray()
**description Returns an associative array that contains the timebases for cron that are supported by m23.
**returns Associative array with the timebases for cron that are supported by m23 with one-character name as key and language specific human readable string as value.
**/
function CRON_getTimeBaseArray()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$timeBaseArray['h'] = $I18N_cronTimeBaseHourly;
	$timeBaseArray['d'] = $I18N_cronTimeBaseDayly;
	$timeBaseArray['w'] = $I18N_cronTimeBaseWeekly;
	return($timeBaseArray);
}





/**
**name CRON_getDayOfWeekArray()
**description Returns an associative array that contains the week day names for cron.
**returns Associative array with the week day names for cron with three letter cron name as key and language specific human readable week day as value.
**/
function CRON_getDayOfWeekArray()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$o['mon'] = $I18N_Monday;
	$o['tue'] = $I18N_Tuesday;
	$o['wed'] = $I18N_Wednesday;
	$o['thu'] = $I18N_Thursday;
	$o['fri'] = $I18N_Friday;
	$o['sat'] = $I18N_Saturday;
	$o['sun'] = $I18N_Sunday;
	$o['*'] = $I18N_every;

	return($o);
}





/**
**name CRON_checkMinute($min)
**description Checks if a minute value is valid.
**parameter min: Minute value to check.
**returns True if it is valid otherwise false.
**/
function CRON_checkMinute($min)
{
	return(is_numeric($min) && ($min >= 0) && ($min <= 59));
}





/**
**name CRON_checkHour($hour)
**description Checks if a hour value is valid.
**parameter hour: Hour value to check.
**returns True if it is valid otherwise false.
**/
function CRON_checkHour($hour)
{
	return(is_numeric($hour) && ($hour >= 0) && ($hour <= 23));
}





/**
**name CRON_getEntriesByIdentifier($identifier)
**description Parses the crontab for all lines matching the identifier.
**parameter identifier: A string to identify the cron entries
**returns Associative array with the crontab lines that match the identifier and named by the parameters.
**/
function CRON_getEntriesByIdentifier($identifier)
{
	$fp = fopen("/etc/crontab","r");
	$nr = 0;

	while ($line = fgets($fp))
	{
		//Check if the identifier could be found in the current line
		if (strpos($line,$identifier) !== false)
		{
			//Split the cron tab line by spaces to get the parameters
			$parts = explode(" ",$line);

			//Get the parts of ...
			$out[$nr]['min'] = $parts[0];
			$out[$nr]['hour'] = $parts[1];
			$out[$nr]['dayOfMonth'] = $parts[2];
			$out[$nr]['month'] = $parts[3];
			$out[$nr]['dayOfWeek'] = $parts[4];
			$out[$nr]['user'] = $parts[5];

			//Cat all remaining parts to get the command line
			$cmd = "";
			for ($i = 6; $i < count($parts); $i++)
				$cmd .= $parts[$i]." ";

			//Cut off the identifier
			$cmd = explode(';#',$cmd);
			$out[$nr]['cmd'] = $cmd[0];
			$out[$nr]['identifier'] = $cmd[1];

			$nr++;
		}
	}

	fclose($fp);
	return($out);
}





/**
**name CRON_getNextIdentifierNr($identifier)
**description Calculates the next higher identifier number from a given identifier.
**parameter identifier: A string to identify the cron entries.
**returns Identifier with next higher number attaced.
**/
function CRON_getNextIdentifierNr($identifier)
{
	$fp = fopen("/etc/crontab","r");
	$nr = 0;
	$found = false;

	//Run thru the crontab lines
	while ($line = fgets($fp))
	{
		//Check if the identifier could be found in the current line
		if (strpos($line,$identifier) !== false)
		{
			//Split the parameters from the identifier
			$paramsIdent = explode(';#',$line);
			//Store the complete identifier (with number)
			$idents[$nr++] = $paramsIdent[1];
			$found = true;
		}
	}

	//Check if there were found identifier lines
	if ($nr > 0)
		{
			//Sort the found identifierts to make the identifier line with the highest number the last
			sort($idents);
			//Get the identifier with the highest number
			$last = end($idents);
			//Split identifiert and number
			$tmp = explode("--",$last);
			$nr = $tmp[1]+1;
			//Create incremented number
			$nr = sprintf("%04.0d",$nr);
		}
	else
	//No line was found so start with 0
		$nr = "0000";

	fclose($fp);

	return("$identifier--$nr");
}





/**
**name CRON_cronManagementDialog($user, $cmd, $identifier, $runInScreen)
**description Shows a dialog for viewing, adding and deleting crontab entries for a given user, command and identifier.
**parameter user: The user the cron job should be run under.
**parameter cmd: The command to exectute.
**parameter identifier: A string to identify the cron entry (for deletion)
**parameter runInScreen: Set to true if the command should be run in a screen.
**/
function CRON_cronManagementDialog($user, $cmd, $identifier, $runInScreen)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	$identifier = "m23CroNIdentiFIER_$identifier";

	HTML_submit("BUT_changeTimeBase",$I18N_change);

	//Choose the timebase for cron
	$timeBase = HTML_selection("SEL_timeBase", CRON_getTimeBaseArray(), SELTYPE_selection);

	//Create all HTML elements
	$min = HTML_input("ED_min", false, 2, 2, INPUT_TYPE_text);
	$hour = HTML_input("ED_hour", false, 2, 2, INPUT_TYPE_text);
	$intervall = HTML_input("ED_intervall", false, 2, 2, INPUT_TYPE_text);
	$dayOfWeek =  HTML_selection("SEL_dayOfWeek", CRON_getDayOfWeekArray(), SELTYPE_selection);

	if (HTML_submit("BUT_add",$I18N_add))
	{
		switch($timeBase)
		{
			case 'h':
				if (CRON_checkMinute($min) && CRON_checkHour($intervall))
					CRON_addJobHourly($min, $intervall, $user, $cmd, $identifier, $runInScreen);
				else
					MSG_showError($I18N_errorCronParametersInvalid);
			break;

			case 'd':
				if (CRON_checkMinute($min) && CRON_checkHour($hour))
					CRON_addJobDayly($min, $hour, $user, $cmd, $identifier, $runInScreen);
				else
					MSG_showError($I18N_errorCronParametersInvalid);
			break;

			case 'w':
				if (CRON_checkMinute($min) && CRON_checkHour($hour) && ($dayOfWeek !== false))
					CRON_addJobWeekly($min, $hour, $dayOfWeek, $user, $cmd, $identifier, $runInScreen);
				else
					MSG_showError($I18N_errorCronParametersInvalid);
			break;
		}
	}

	//Show the dialog elements for choosing the time base
	echo('
		<table>
			<tr>
				<td>');
					HTML_showSmallTitle($I18N_cronTimeBase);
					HTML_showTableHeader(true,"subtable2");
					HTML_showTableHeading($I18N_cronTimeBase,"");
					HTML_showTableRow(SEL_timeBase,BUT_changeTimeBase);
					HTML_showTableEnd(true);
					echo('
				</td>
				<td>');
					HTML_showSmallTitle($I18N_addCronEntry);
	//Show the dialog elements for adding cron entries
					HTML_showTableHeader(true,"subtable2");
					switch($timeBase)
					{
						case 'h':
							HTML_showTableHeading("$I18N_startMinute (0-59)", "$I18N_repeatEveryNHours (1-23)","");
							HTML_showTableRow(ED_min, ED_intervall, BUT_add);
						break;
				
						case 'd':
							HTML_showTableHeading("$I18N_startMinute (0-59)", "$I18N_startHour (0-23)","");
							HTML_showTableRow(ED_min, ED_hour, BUT_add);
						break;
				
						case 'w':
							HTML_showTableHeading("$I18N_startMinute (0-59)", "$I18N_startHour (0-23)", "$I18N_dayOfWeek", "");
							HTML_showTableRow(ED_min, ED_hour, SEL_dayOfWeek, BUT_add);
						break;
					}
					HTML_showTableEnd(true);
					echo('
				</td>
			</tr>
		</table>');
	
	CRON_cronEntryDeletionDialog($identifier);
}





/**
**name CRON_cronEntryDeletionDialog($identifier)
**description Shows a a list of crontab entries matching the identifier with deletion option.
**parameter identifier: A string to identify the cron entry (for deletion)
**/
function CRON_cronEntryDeletionDialog($identifier)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$weekDayArray = CRON_getDayOfWeekArray();

	$entries = CRON_getEntriesByIdentifier($identifier);
	if (count($entries) == 0)
		return(false);

	$firstEntry = true;

	foreach ($entries as $entry)
	{
		$delButton = "BUT_del".md5($entry['identifier']);
		if (HTML_submit($delButton,$I18N_delete))
			CRON_rmJob($entry['identifier']);
		else
		{
			//Open table and show heading, if it is the first entry
			if ($firstEntry)
			{
				HTML_showTitle($I18N_cronEntries);
				HTML_showTableHeader(true,"subtable2");
				HTML_showTableHeading("", $I18N_startMinute, $I18N_startHour, $I18N_dayOfWeek, $I18N_dayOfMonth, $I18N_month, $I18N_user, $I18N_command,"");
				$firstEntry = false;
			}

			HTML_showTableRow(
				SERVER_runningInScreen($entry['identifier'], "root") ? '<img src="/gfx/status/critical.png">' : '<img src="/gfx/status/white.png">',
				CRON_translateEveryIntervallValue($entry['min']),
				CRON_translateEveryIntervallValue($entry['hour']),
				$weekDayArray[$entry['dayOfWeek']],
				CRON_translateEveryIntervallValue($entry['dayOfMonth']),
				CRON_translateEveryIntervallValue($entry['month']),
				$entry['user'],
				$entry['cmd'],
				constant($delButton));
		}
	}

	//Close the table, if there is at least one entry
	if ($firstEntry === false)
		HTML_showTableEnd(true);
}





/**
**name CRON_translateEveryIntervallValue($val)
**description Translates a time value with possible intervall into a human readable string.
**parameter val: Time value (e.g. 2/2)
**returns Human readable string for a given time value.
**/
function CRON_translateEveryIntervallValue($val)
{
	//Check if the value matches every minute, hour, ...
	if ($val === "*")
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return($I18N_every);
	}
	//Check if it contains an intervall
	elseif (strpos($val,"/") !== false)
	{
		//Split the start time form the intervall value
		$timeInt = explode("/",$val);
		
		//Include here to update $I18N_cronRepeatEvery and $I18N_cronRepeatEveryStartFrom with the $timeInt values
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		//Check if time is every
		if ($timeInt[0] === "*")
			return($I18N_cronRepeatEvery);
		//Or has start time
		else
			return($I18N_cronRepeatEveryStartFrom);
	}
	else
		return($val);
}
?>