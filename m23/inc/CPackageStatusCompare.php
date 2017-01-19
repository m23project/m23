<?php
class CPackageStatusCompare extends CChecks
{
	private $clientOrFile1 = NULL, $clientOrFile2 = NULL, $clientOrFile1Orig = NULL, $clientOrFile2Orig = NULL;





/**
**name CPackageStatusCompare::__construct($mode)
**description Constructor for new CPackageStatusCompare objects.
**/
	public function __construct()
	{
		HTML_showFormHeader();
		HTML_setPage('comparePackageStatus');

		// Get the client names from the URL and the client or file names from a previous POST
		if (isset($_GET['cl1']))
			$this->setClient1($_GET['cl1']);
		else
			$this->clientOrFile1 = $_POST['cl1'];

		if (isset($_GET['cl2']))
			$this->setClient2($_GET['cl2']);
		else
			$this->clientOrFile2 = $_POST['cl2'];

		// Restore the original file names
		if (isset($_POST['orig1'])) $this->clientOrFile1Orig = $_POST['orig1'];
		if (isset($_POST['orig2'])) $this->clientOrFile2Orig = $_POST['orig2'];
	}





/**
**name CPackageStatusCompare::__destruct()
**description Destructor for a CPackageStatusCompare object.
**/
	public function __destruct()
	{
		$this->save();

		// Delete all maybe existing temporary package status files
		foreach (glob("/m23/tmp/getStatusFile*") as $filename)
			unlink($filename);
	}





/**
**name CPackageStatusCompare::save()
**description Saves parameters as hidden POST values.
**/
	private function save()
	{
		echo(HTML_hiddenVar('cl1', $this->clientOrFile1).HTML_hiddenVar('cl2', $this->clientOrFile2));
		echo(HTML_hiddenVar('orig1', $this->clientOrFile1Orig).HTML_hiddenVar('orig2', $this->clientOrFile2Orig));
		HTML_showFormEnd();
	}





/**
**name CPackageStatusCompare::setFile(&$var, $file, &$origVar, $origFile)
**description Sets a file name, if the given parameter is a valid file name.
**parameter var: Variable that stores a client or file name.
**parameter file: Name of the status file.
**parameter origVar: Variable that stores the original file name.
**parameter origFile: Original name of the status file.
**/
	private function setFile(&$var, $file, &$origVar, $origFile)
	{
		if (file_exists($file))
		{
			$var = $file;
			$origVar = $origFile;
		}
	}





/**
**name CPackageStatusCompare::setFile1($file, $origFile)
**description Sets a 1st file name, if the given parameter is a valid file name.
**parameter origFile: Original file name.
**parameter file: Name of the status file.
**/
	private function setFile1($file, $origFile)
	{
		$this->setFile($this->clientOrFile1, $file, $this->clientOrFile1Orig, $origFile);
	}





/**
**name CPackageStatusCompare::setFile2($file, $origFile)
**description Sets a 2nd file name, if the given parameter is a valid file name.
**parameter origFile: Original file name.
**parameter file: Name of the status file.
**/
	private function setFile2($file, $origFile)
	{
		$this->setFile($this->clientOrFile2, $file, $this->clientOrFile2Orig, $origFile);
	}





/**
**name CPackageStatusCompare::setClient(&$var, $cl)
**description Sets a client, if the given parameter is a valid client name.
**parameter var: Variable that stores a client or file name.
**parameter cl: Name of the client
**/
	private function setClient(&$var, $cl)
	{
		if (CLIENT_exists($cl))
			$var = $cl;
		else
			$var = NULL;
	}





/**
**name CPackageStatusCompare::setClient1($cl)
**description Sets a client, if the given parameter is a valid client name.
**parameter cl: Name of the client
**/
	private function setClient1($cl)
	{
		$this->setClient($this->clientOrFile1, $cl);
	}





/**
**name CPackageStatusCompare::setClient2($cl)
**description Sets a client, if the given parameter is a valid client name.
**parameter cl: Name of the client
**/
	private function setClient2($cl)
	{
		$this->setClient($this->clientOrFile2, $cl);
	}





/**
**name CPackageStatusCompare::isClientSet($var)
**description Checks, if the client is set.
**parameter var: Variable that stores a client or file name
**returns true, if client name is set.
**/
	private function isClientSet($var)
	{
		// No client and no file name set
		if (is_null($var)) return(false);
		// File name set
		if (is_file($var)) return(false);
		return(CLIENT_exists($var));
	}




/**
**name CPackageStatusCompare::isClient1Set()
**description Checks, if the 1st client is set.
**returns true, if client name is set.
**/
	private function isClient1Set()
	{
		return($this->isClientSet($this->clientOrFile1));
	}





/**
**name CPackageStatusCompare::isClient2Set()
**description Checks, if the 2nd client is set.
**returns true, if client name is set.
**/
	private function isClient2Set()
	{
		return($this->isClientSet($this->clientOrFile2));
	}





/**
**name CPackageStatusCompare::isFile1Set()
**description Checks, if the 1st combined variable stores a file name.
**returns true, if the variable stores a file name, otherwise false.
**/
	private function isFile1Set()
	{
		return(file_exists($this->clientOrFile1));
	}





/**
**name CPackageStatusCompare::isFile2Set()
**description Checks, if the 2st combined variable stores a file name.
**returns true, if the variable stores a file name, otherwise false.
**/
	private function isFile2Set()
	{
		return(file_exists($this->clientOrFile2));
	}





/**
**name CPackageStatusCompare::getVersionStatus($file, $package)
**description Gets an array with, the package file name, the version and the status.
**parameter file: File that stores the package information.
**parameter package: The package to get the information for.
**returns Array with, the package file name, the version and the status.
**/
	private function getVersionStatus($file, $package)
	{
		// The package file name, the version and the status have to be separated by '°'.
		$line = explode('°', exec("grep '^$package\°' $file"));
		return($line);
	}





/**
**name CPackageStatusCompare::getStatusFile($clientOrFile, $isFile)
**description Gets the file name of a package status file. If a client name is give, a temporary package status file will be written.
**parameter clientOrFile: Client or package status file name.
**parameter isFile: Set to true, if $clientOrFile is a file, otherwise false.
**returns Array with, the package file name, the version and the status.
**/
	private function getStatusFile($clientOrFile, $isFile)
	{
		// Output the file name directly, if it is a package status file
		if ($isFile) return($clientOrFile);

		// Export the current package status of the given client to a temporary file
		$tempStatusFile = uniqid('/m23/tmp/getStatusFile');
		file_put_contents($tempStatusFile, PKG_getPackageStatusCSV($clientOrFile));
		return($tempStatusFile);
	}





/**
**name CPackageStatusCompare::showStatusRow($left, $leftVersion, $leftStatus, $type , $right, $rightVersion, $rightStatus)
**description Gets the file name of a package status file. If a client name is give, a temporary package status file will be written.
**parameter left: Left package name.
**parameter leftVersion: Left version of the package.
**parameter leftStatus: Left status of the package.
**parameter type: diff type.
**parameter right: Right package name.
**parameter rightVersion: Right version of the package.
**parameter rightStatus: Right status of the package.
**returns Array with, the package file name, the version and the status.
**/
	private function showStatusRow($left, $leftVersion, $leftStatus, $type , $right, $rightVersion, $rightStatus)
	{
		// Check for differing version and status
		$ch = 0;

		// Choose the coloring of the lines depending on the diff type
		switch ($type)
		{
			// Package names are equal
			case '=':
				$css = 'style="color: green;"';
			break;

			// Package is only present on the left side
			case '<':
				$css = 'style="color: DarkSlateBlue;"';
			break;

			// Package is only present on the right side
			case '>':
				$css = 'style="color: FireBrick;"';
			break;

			// No common package on the left and right side
			case '|':
				$css = 'style="color: red;"';
			break;
		}

		// Mark differing versions and status' on lines with equal packages
		$cssVersion = $cssStatus = '';
		if ('=' == $type)
		{
			if ($leftVersion != $rightVersion) { $cssVersion = 'style="color: red;"'; $ch++; };
			if ($leftStatus != $rightStatus) { $cssStatus = 'style="color: red;"'; $ch++; };

			// Change the color of the line, if one difference was found
			if ($ch > 0) $css = 'style="color: DarkOrange;"';
		}

		echo("
			<tr $css>
				<td>$left</td>
				<td $cssVersion>$leftVersion</td>
				<td $cssStatus>$leftStatus</td>
				<td>$type</td>
				<td>$right</td>
				<td $cssVersion>$rightVersion</td>
				<td $cssStatus>$rightStatus</td>
			</tr>
			");

		return($ch == 0);
	}





/**
**name CPackageStatusCompare::diff()
**description Compares two package status files.
**/
	private function diff()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$onlyLeft = $onlyRight = $noMatch = $equalFinds = 0;

		HTML_showTableHeader(true);

		// Package status files
		$file1 = $this->getStatusFile($this->clientOrFile1, $this->isFile1Set());
		$file2 = $this->getStatusFile($this->clientOrFile2, $this->isFile2Set());

		// Generate files, that only contain the package names
		$file1Packages = "$file1.packages";
		$file2Packages = "$file2.packages";
		exec("sed 's/°.*//' $file1 | sort > $file1Packages");
		exec("sed 's/°.*//' $file2 | sort > $file2Packages");
	
		// Run diff on the package only index files
		$pin = popen("diff -y $file1Packages $file2Packages", 'r');

		HTML_showTableHeading($I18N_package_name, $I18N_version, $I18N_status, '&lt;=|&gt;' , $I18N_package_name, $I18N_version, $I18N_status);
		
		




		// Get the lines from the side by side diff
		while ($line = fgets($pin))
		{
			$type = '=';
	
			// Left and right column are separated by tabulators and white spaces, in between is the diff type symbol
			$leftTypeRight = preg_split("/[\t ]/", $line);
	
			// Search for the diff type in this line (<,>,|,=)
			for ($i = 1; $i < count($leftTypeRight) -1; $i++)
			{
				if (isset($leftTypeRight[$i]{0}))
				{
					$type = $leftTypeRight[$i];
					break;
				}
			}

			// Get the package name on the left and right panel
			$left = trim($leftTypeRight[0]);
			$right = trim($leftTypeRight[count($leftTypeRight) - 1]);

			// There is no package name on the right side, this is the diff type
			if ('<' == $right)
			{
				$type = '<';
				$right = '-';
			}

			// Show differnt columns by diff type
			switch($type)
			{
				case '=':
					$leftVersionStatus = $this->getVersionStatus($file1, $left);
					$rightVersionStatus = $this->getVersionStatus($file2, $right);
					$reallyEqual = $this->showStatusRow($left, $leftVersionStatus[1], $leftVersionStatus[2], $type , $right, $rightVersionStatus[1], $rightVersionStatus[2]);
					if ($reallyEqual)
						$equalFinds++;
					else
						$noMatch++;
				break;

				case '|':
					$leftVersionStatus = $this->getVersionStatus($file1, $left);
					$rightVersionStatus = $this->getVersionStatus($file2, $right);
					$this->showStatusRow($left, $leftVersionStatus[1], $leftVersionStatus[2], '|' , $right, $rightVersionStatus[1], $rightVersionStatus[2]);
					$noMatch ++;
				break;

				case '<':
					$leftVersionStatus = $this->getVersionStatus($file1, $left);
					$this->showStatusRow($left, $leftVersionStatus[1], $leftVersionStatus[2], '<' , '-', '', '');
					$onlyLeft ++;
				break;

				case '>':
					$rightVersionStatus = $this->getVersionStatus($file2, $right);
					$this->showStatusRow('-', '', '', '>' , $right, $rightVersionStatus[1], $rightVersionStatus[2]);
					$onlyRight ++;
				break;
			}
		
		}
		
		HTML_showTableRow("$I18N_onlyLeft: $onlyLeft", "$I18N_equal: $equalFinds", '', '' , "$I18N_onlyRight: $onlyRight", "$I18N_noMatch $noMatch", '');

		pclose($pin);

		HTML_showTableEnd(true);
	}




/**
**name CPackageStatusCompare::show()
**description Shows the comparing dialog.
**/
	public function show()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		
		$clientNames = CLIENT_getAllClientNames();
		sort($clientNames);
		$clientNames = HELPER_array2AssociativeArray($clientNames);
		$clientNames['-'] = '-';

		// Set client name for left and right panel
		$cl1 = HTML_selection('SEL_client1', $clientNames, SELTYPE_selection, true, $this->isClient1Set() ? $this->clientOrFile1 : '-');
		if (HTML_submit('BUT_useClientName1', $I18N_useClientName))
			$this->setClient1($cl1);
		$cl2 = HTML_selection('SEL_client2', $clientNames, SELTYPE_selection, true, $this->isClient2Set() ? $this->clientOrFile2 : '-');
		if (HTML_submit('BUT_useClientName2', $I18N_useClientName))
			$this->setClient2($cl2);

		// Set status file for left and right panel
		$this->setFile1(HTML_uploadFile('UP_packagesFile1', $I18N_packageStatusFile, 5242880), HTML_getOriginalUploadFilename('UP_packagesFile1'));

		$this->setFile2(HTML_uploadFile('UP_packagesFile2', $I18N_packageStatusFile, 5242880), HTML_getOriginalUploadFilename('UP_packagesFile2'));

		// Get usage information for left and right panel
		if ($this->isFile1Set()) $leftUsage = "$I18N_statusFileUsed: ".$this->clientOrFile1Orig;
		elseif ($this->isClient1Set()) $leftUsage = "$I18N_clientUsed: ".$this->clientOrFile1;
		else $leftUsage = '-';
		
		if ($this->isFile2Set()) $rightUsage = "$I18N_statusFileUsed: ".$this->clientOrFile2Orig;
		elseif ($this->isClient2Set()) $rightUsage = "$I18N_clientUsed: ".$this->clientOrFile2;
		else $rightUsage = '-';



		HTML_submitDefine('BUT_compare', $I18N_comparePackageStatus);

		HTML_showTitle($I18N_comparePackageStatus);
		
		HTML_showTableHeader(true);
		HTML_showTableHeading($I18N_clientOrFileSelection1, $I18N_clientOrFileSelection2);
		HTML_showTableRow($leftUsage, $rightUsage);
		HTML_showTableRow(SEL_client1.BUT_useClientName1, SEL_client2.BUT_useClientName2);
		HTML_showTableRow(UP_packagesFile1, UP_packagesFile2);
		echo('<tr><td colspan="2" align="center">'.BUT_compare.'</td></tr>');
		HTML_showTableEnd(true);
		
		if (HTML_submitCheck('BUT_compare'))
			$this->diff();
		
		HELP_showHelp("comparePackageStatus");
	}
}

?>