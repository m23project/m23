#!/usr/bin/php
<?
	if (!isset($GLOBALS["m23_language"]))
		$GLOBALS['m23_language'] = 'de';

	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/fdisk.php');
	include_once('/m23/inc/html.php');
	include('/m23/inc/remotevar.php');
	include('/m23/inc/client.php');
	include("/m23/inc/backup.php");
	include('/m23/inc/message.php');
	include_once('/m23/inc/CMessageManager.php');
	include('/m23/inc/distr.php');
	include("/m23/inc/preferences.php");
	include('/m23/inc/sourceslist.php');
	include_once('/m23/inc/messageReceive.php');
	include('/m23/inc/packages.php');
	include_once('/m23/inc/capture.php');
	include_once('/m23/inc/helper.php');
	include_once('/m23/inc/update.php');
	include_once('/m23/inc/edit.php');
	include_once('/m23/inc/dhcp.php');
	include_once('/m23/inc/ldap.php');
	include_once('/m23/inc/assimilate.php');
	include_once('/m23/inc/i18n.php');
// 	include_once('/m23/inc/imaging.php');
	include_once('/m23/inc/server.php');
	include_once('/m23/inc/raidlvm.php');
	include_once("/m23/inc/halfSister.php");
	include_once('/m23/inc/vm.php');
	include_once('/m23/inc/groups.php');
	include_once('/m23/inc/CMessageManager.php');
	include_once('/m23/inc/CChecks.php');
	include_once('/m23/inc/CClient.php');
	include_once('/m23/inc/CIPRanges.php');
	include_once('/m23/inc/CClientLister.php');
	include_once('/m23/inc/Cm23Admin.php');
	include_once('/m23/inc/Cm23AdminLister.php');
	include_once('/m23/inc/CFDiskIO.php');
	include_once('/m23/inc/CFDiskBasic.php');
	include_once('/m23/inc/mail.php');
	include_once('/m23/inc/CGPGSign.php');


	dbConnect();

	//Absolute path where to find the modules
	define('MODULE_PATH','/m23/bin/cli-modules/');





	/**
	**name CLI_getModulePath($moduleName)
	**description Checks, if a module exists and builds the full path to the module file.
	**parameter moduleName: Name of the module.
	**returns Full path to the module file or false, if no module file with the given name exists.
	**/
	function CLI_getModulePath($moduleName)
	{
		// Get the name of the module with full path
		$moduleFile = MODULE_PATH.preg_replace('/[^a-z0-9_]/i', '', $moduleName).'.php';

		if (file_exists($moduleFile))
			return($moduleFile);
		else
		{
			echo("\nERROR: Module \"$moduleName\" unknown!\n");
			return(false);
		}
	}





	/**
	**name CLI_getModuleInfo($moduleName, $infoTyp, $glue)
	**description Gets information about a given module.
	**parameter moduleName: Name of the module.
	**parameter infoTyp: The type of info to get from the module.
	**parameter glue: String to glue the given lines with.
	**returns Information about a given module or empty string, if an invalid module name is given.
	**/
	function CLI_getModuleInfo($moduleName, $infoTyp, $glue)
	{
		$moduleFile = CLI_getModulePath($moduleName);

		if ($moduleFile !== false)
		{
			$infoStr = "$infoTyp:";
			//grep only the line with our info
			exec("grep -i '$infoStr' $moduleFile | sed 's/$infoStr//'", $out);

			//Remove unwanted characters from each line
			array_walk($out, 'HELPER_trimValue');

			//Combine the array with the given glue
			return(implode($glue, $out));
		}
		else
			return('');
	};





	/**
	**name CLI_getModuleDescription($moduleName)
	**description Gets the description about a given module.
	**parameter moduleName: Name of the module.
	**returns Description about a given module or empty string, if an invalid module name is given.
	**/
	function CLI_getModuleDescription($moduleName)
	{
		return(CLI_getModuleInfo($moduleName, 'Description',''));
	}





	/**
	**name CLI_getModuleExitcodes($moduleName)
	**description Gets the exit codes about a given module.
	**parameter moduleName: Name of the module.
	**returns Description of the exit codes about a given module or empty string, if an invalid module name is given.
	**/
	function CLI_getModuleExitcodes($moduleName)
	{
		return(CLI_getModuleInfo($moduleName, 'Returns',''));
	}





	/**
	**name CLI_getModuleParameter($moduleName)
	**description Gets the parameter(s) about a given module.
	**parameter moduleName: Name of the module.
	**returns Parameters about a given module or empty string, if an invalid module name is given.
	**/
	function CLI_getModuleDescriptionLine($moduleName)
	{
		return("$moduleName: ".CLI_getModuleDescription($moduleName)."\n");
	}





	/**
	**name CLI_getModuleParameter($moduleName)
	**description Gets the parameter(s) about a given module.
	**parameter moduleName: Name of the module.
	**returns Parameters about a given module or empty string, if an invalid module name is given.
	**/
	function CLI_getModuleParameter($moduleName)
	{
		return('<'.CLI_getModuleInfo($moduleName, 'Parameter', '> <').'>');
	}





	/**
	**name CLI_getModuleParameterLine($m23cliFile, $moduleName)
	**description Gets the information line with module name, parameter(s) and (optionally) exit code(s) about a given module.
	**parameter moduleName: Name of the module.
	**parameter m23cliFile: Name of the m23cli file.
	**returns Information line with module name and parameter(s) about a given module.
	**/
	function CLI_getModuleParameterLine($m23cliFile, $moduleName)
	{
		$exitcodes = CLI_getModuleExitcodes($moduleName);
		if (isset($exitcodes{1}))
			$exitcodes = "\nExit codes: $exitcodes";
	
		return("Usage: $m23cliFile $moduleName ".CLI_getModuleParameter($moduleName)."\nDescription: ".CLI_getModuleDescription($moduleName).$exitcodes);
	}





	/**
	**name CLI_showAllModuleDescription()
	**description Shows a list of all modules with their descriptions.
	**/
	function CLI_showAllModuleDescription()
	{
		$moduleFiles = HELPER_listFilesInDir(MODULE_PATH);
		
		echo("Commands:\n");
		foreach ($moduleFiles as $moduleFile)
		{
			//Get only files that end with '.php', are no backups '~' and no function libraries '_functions'
			if ((strstr($moduleFile, '.php') !== false) && (strstr($moduleFile, '~') === false) && (strstr($moduleFile, '_functions') === false))
			{
				$moduleName = basename($moduleFile, '.php');
				echo(CLI_getModuleDescriptionLine($moduleName));
			}
		}
	}





	/**
	**name CLI_help($argv)
	**description Shows a help text about a given module or 
	**parameter moduleName: Name of the module.
	**returns Information line with module name and parameter(s) about a given module.
	**/
	function CLI_help($argv)
	{
		echo("Description: The m23 CLI can execute some m23 tasks from the command line.
General usage: $argv[0] <Command> <Parameter 1> <Parameter 2> ...
$argv[0] --help <Command>: Show the parameter for a command.

");
		if (isset($argv[2]) && CLI_getModulePath($argv[2]))
			echo(CLI_getModuleParameterLine($argv[0], $argv[2])."\n");
		else
			CLI_showAllModuleDescription();
	}





	//Check, if there is at least one command line argument
	if ($argc > 1)
	{
		switch ($argv[1])
		{
			//Check, if the help function should be called for a given function
			case '--help':
				CLI_help($argv);
			break;


			//Run the function (if it exists)
			default:
				$moduleFile = CLI_getModulePath($argv[1]);
				if ($moduleFile !== false)
				{
					include($moduleFile);
					run($argc, $argv);
				}
		}
	}
	else
		//Call the help function for all functions
		CLI_help($argv);
	
?>