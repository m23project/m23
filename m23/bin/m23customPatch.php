#!/usr/bin/php
<?php

class CmCP
{
	private $patchFileName = NULL, $sourceFileName = NULL, $nameOfThisScript = NULL, $patchID = NULL, $patchContentsArray = NULL, $sourceContentsArray = NULL, $patchType = NULL, $errorMessages = '', $startLine = -1, $endLine = -1, $exitCode = 5;

	// Definition the possible patch types
	const PT_CHANGE = 'change';
	const PT_DEL = 'del';
	
	const EX_WRONG_PARAMETER_COUNT = 1;
	const EX_PATCH_FILE_INVALID = 2;
	const EX_SOURCE_FILE_NOT_FOUND = 3;
	const EX_PATCH_ID_NOT_FOUND_IN_SOURCE_FILE = 4;



	function __construct()
	{
		$this->checkCommandLineParameters();
		$this->loadPatchFile();
		$this->loadSourceFile();
		$this->patchSourceFile();
	}





/**
**name CmCP::setExitCode($code)
**description Sets the exit code.
**parameter code: Exit code number.
**/
	private function setExitCode($code)
	{
		if (in_array($type, array(CmCP::EX_WRONG_PARAMETER_COUNT, CmCP::EX_PATCH_FILE_INVALID, CmCP::EX_SOURCE_FILE_NOT_FOUND, CmCP::EX_PATCH_ID_NOT_FOUND_IN_SOURCE_FILE)))
			$this->exitCode = $code;
		else
			$this->exitCode = 5;
	}





/**
**name CmCP::setPatchType($type)
**description Sets the patch type (change or del).
**parameter type: Patch type to set
**/
	private function setPatchType($type)
	{
		if (in_array($type, array(CmCP::PT_CHANGE, CmCP::PT_DEL)))
			$this->patchType = $type;
		else
		{
			$this->addErrorMessage('Patch type "'.$type.'" unknown.');
			$this->dieOnErrors();
		}
	}





/**
**name CmCP::patchSourceFile()
**description Does the actual patching.
**/
	private function patchSourceFile()
	{
		// Lines before the patch area including the m23customPatchBegin line
		$before = array_slice($this->sourceContentsArray, 0, $this->startLine + 1);

		// Lines after the patch area including the m23customPatchEnd line
		$after = array_slice($this->sourceContentsArray, $this->endLine);

		switch($this->patchType)
		{
			case CmCP::PT_CHANGE:
				$new = array_merge($before, $this->patchContentsArray, $after);
			break;

			case CmCP::PT_DEL:
				$new = array_merge($before, $after);
			break;
		}

		// Create a backup file with unique name
		copy($this->sourceFileName, uniqid($this->sourceFileName.'.m23customPatchBackup-'));

		// Write the changed contents to the source file
		file_put_contents($this->sourceFileName, implode("\n",$new));
	}





/**
**name CmCP::loadSourceFile()
**description Loads the source file (the file to patch) and finds the line numbers with the patch area.
**/
	private function loadSourceFile()
	{
		// Read the patch file and split the lines into an array
		$this->sourceContentsArray = explode("\n", file_get_contents($this->sourceFileName));

		for ($i = 0; $i < count($this->sourceContentsArray); $i++)
		{
			// Search for the beginning of the patch area
			if (1 == preg_match('/m23customPatchBegin\s+type=(\w+)\s+id='.$this->patchID.'/', $this->sourceContentsArray[$i]))
			{
				if (-1 == $this->startLine)
				{
					$this->startLine = $i;

					// Get the patch type
					preg_match_all('/m23customPatchBegin\s+type=(\w+)\s+id=/', $this->sourceContentsArray[$i], $found);
					$this->setPatchType($found[1][0]);
				}
				else
				{
					$this->addErrorMessage('Multiple declarations of m23customPatchBegin for the id "'.$this->patchID.'".');
					$this->dieOnErrors();
				}
			}
			elseif (1 == preg_match('/m23customPatchEnd\s+id='.$this->patchID.'/', $this->sourceContentsArray[$i]))
			{
				if (-1 == $this->endLine)
					$this->endLine = $i;
				else
				{
					$this->addErrorMessage('Multiple declarations of m23customPatchEnd for the id "'.$this->patchID.'".');
					$this->dieOnErrors();
				}
			}
		}

		// Check, if start and end line for the patch range were found
		if (-1 == $this->startLine)
			$this->addErrorMessage('No m23customPatchBegin for the id "'.$this->patchID.'" found.', CmCP::EX_PATCH_ID_NOT_FOUND_IN_SOURCE_FILE);

		if (-1 == $this->endLine)
			$this->addErrorMessage('No m23customPatchEnd for the id "'.$this->patchID.'" found.', CmCP::EX_PATCH_ID_NOT_FOUND_IN_SOURCE_FILE);

		$this->dieOnErrors();
	}





/**
**name CmCP::checkCommandLineParameters()
**description Checks, if the correct amount of command line parameters is given and assigns them to the private variables.
**/
	private function checkCommandLineParameters()
	{
		global $argv;
		if (!isset($argv[1]))
			$this->addErrorMessage("Name of patch file not given as 1st paramter.", CmCP::EX_WRONG_PARAMETER_COUNT);
		else
		{
			if ('--list' == $argv[1])
				$this->showFilesWithPatchableAreasAndExit();

			$this->patchFileName = $argv[1];
		}

		$this->nameOfThisScript = $argv[0];
		$this->dieOnErrors();
	}





/**
**name CmCP::loadPatchFile()
**description Checks and loads the patch file.
**/
	private function loadPatchFile()
	{
		if (!file_exists($this->patchFileName))
			$this->addErrorMessage("Patch file \"".$this->patchFileName."\" not found.");
		$this->dieOnErrors();

		// Read the patch file and split the lines into an array
		$lines = explode("\n", file_get_contents($this->patchFileName));

		// Check the signature of the patch file (the 1st line must contain "!m23customPatch")
		if (strpos($lines[0], '!m23customPatch') !== 0)
			$this->addErrorMessage("Patch file has no valid signature (1st line does not start with \"!m23customPatch\").", CmCP::EX_PATCH_FILE_INVALID);
		$this->dieOnErrors();

		// Check, if the given source file exists
		if (!file_exists($lines[1]))
			$this->addErrorMessage("The source file \"$lines[1]\" written in the patch file does not exist.", CmCP::EX_SOURCE_FILE_NOT_FOUND);
		$this->dieOnErrors();
		$this->sourceFileName = $lines[1];

		// Get the patch ID
		if (!isset($lines[2]))
			$this->addErrorMessage("No patch ID given in the 3rd line of the patch file.", CmCP::EX_PATCH_FILE_INVALID);
		$this->dieOnErrors();
		$this->patchID = $lines[2];

		// All other lines are the lines that may be inserted into the patch area of the source file
		$this->patchContentsArray = array_slice($lines, 3);
	}





/**
**name CmCP::dieOnErrors()
**description Shows the usage info, shows the errors messages and stops the script, if there are error messages.
**/
	private function dieOnErrors()
	{
		if ($this->hasErrors())
		{
			echo("Usage: ".$this->nameOfThisScript." <Patch file or --list>\n* --list: Lists all PHP files with patchable areas\n");
			echo($this->errorMessages);
			exit($this->exitCode);
		}
	}





/**
**name CmCP::showFilesWithPatchableAreasAndExit()
**description Shows the PHP file under /m23 that have patchable areas.
**/
	private function showFilesWithPatchableAreasAndExit()
	{
		$baseDir = '/m23';
		die(system("find $baseDir/inc $baseDir/data+scripts -name '*.php' | xargs grep m23customPatchBegin -l 2> /dev/null | grep -v m23base.php | sort")."\n");
	}





/**
**name CmCP::addErrorMessage($msg)
**description Adds an error message to the error message stack.
**parameter msg: Error message to add.
**/
	private function addErrorMessage($msg, $exitCode = 5)
	{
		$this->setExitCode($exitCode);
		$this->errorMessages .= "ERROR: $msg\n";
	}





/**
**name CmCP::hasErrors()
**description Checks, if there are error messages.
**returns true, if there are error messages, otherwise false.
**/
	private function hasErrors()
	{
		return(isset($this->errorMessages{0}));
	}
}

	$OmCP = new CmCP();

?>