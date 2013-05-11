<?php
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Functions for the embedded script editor.
$*/





/**
**name SCREDIT_showEditor()
**description Shows a script editor with syntax highlighting if JavaScript is enabled or a normal textarea input dialog.
**/
function SCREDIT_showEditor()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	define('USER_SCRIPT_DIR','/m23/data+scripts/packages/userPackages');
	$width=70;
	$height=30;

	$currentFile = basename($_POST['currentFile']);

	$description = $_POST[ED_description];

	$author = HTML_input("ED_author");

	//get the text of the editor window via JavaScript or normal POST variable.
	$text=stripslashes($_POST['HID_script']);
	if (empty($text))
		$text = $_POST['ED_script'];

	#uploads the currently loaded script to the m23 source forge site.
	if (HTML_submit("BUT_uploadScriptToSF",$I18N_uploadScriptToSF," onclick=\"HID_script.value=ED_script2.getCode();\""))
	{
		SERVER_sendScriptToSF($currentFile,$author,$description,$text);
	}

	//Delete the current script
	if (HTML_submit("BUT_delete",$I18N_delete))
	{
		unlink(USER_SCRIPT_DIR."/$currentFile");
		$currentFile="";
	}

	$fileList = HELPER_listFilesInDir(USER_SCRIPT_DIR);

	//button for loading the script files.
	if (HTML_submit("BUT_load",$I18N_load," onclick=\"HID_script.value=ED_script2.getCode();\""))
	{
		$text = HELPER_getFileContents(USER_SCRIPT_DIR."/".$_POST["SEL_file"]);
		$currentFile = $_POST["SEL_file"];
	}


	//Create new scripts
	$newFile = HTML_input("ED_newFile");
	if (HTML_submit("BUT_create",$I18N_create))
	{
		//add the needed "m23" prefix to the file name if it's missing
		if (preg_match("/^m23/",$newFile) == 0)
			$newFile = "m23$newFile";

		//add the needed "Install.php" ending to the file name if it's missing
		if (preg_match("/Install.php$/",$newFile) == 0)
			$newFile = $newFile."Install.php";
	
		//check if the file doesn't exists and create a new
		if (!file_exists(USER_SCRIPT_DIR."/$newFile"))
			{
				$text = SCREDIT_newScriptTemplate();
				$currentFile = $newFile;

				if (!touch(USER_SCRIPT_DIR."/$currentFile"))
					MSG_showError($I18N_couldNotWriteScriptFile);
			}
		else
			MSG_showError($I18N_scriptFileCouldNotBeCreatedFileExists);
	};

	//save script in the editor
	if (HTML_submit("BUT_save",$I18N_save," onclick=\"HID_script.value=ED_script2.getCode();\""))
	{
		$fout = fopen(USER_SCRIPT_DIR."/$currentFile","w");
		if (fwrite($fout,$text) === false)
			MSG_showError($I18N_couldNotWriteScriptFile);
		fclose($fout);
	}

	//fake editing for the screenshot
	if ($_GET['screenshot'] == yes)
	{
		$text = SCREDIT_newScriptTemplate();
		$currentFile = "demo";
	}

	echo ("
		<span class=\"title\">$I18N_scriptEditor".((!empty($currentFile)) ? ": $currentFile" : "")."</span><br><br>
	");
	
	HTML_showFormHeader();
	HTML_showTableHeader();

	HTML_setPage('scriptEditor');
	echo("
		<input type=\"hidden\" name=\"currentFile\" value=\"$currentFile\">
		<input type=\"hidden\" id=\"HID_script2\" name=\"HID_script\" value=\"\">
		<tr>
			<td colspan=\"2\">
				<textarea name=\"ED_script\" id=\"ED_script2\" class=\"codepress php linenumbers\" style=\"width:$width"."em;height:$height"."em;\" width=\"$width\" height=\"$height\">
$text</textarea>
			</td>
		</tr>
		</tr>
			<td valign=\"top\">
				<span class=\"titlesmal\">$I18N_openFileForEditing</span><br>
				".HTML_listSelection("SEL_file",$fileList,$currentFile)." ".BUT_load."<br><br>
				<span class=\"titlesmal\">$I18N_createNewScript</span><br>
				".ED_newFile."<br>
				".BUT_create."<br><br>
				<span class=\"titlesmal\">$I18N_saveActionForCurrentScript</span><br>
				".BUT_save." ".BUT_delete."
			</td>
			<td valign=\"top\">
				<span class=\"titlesmal\">$I18N_description</span><br>
				<textarea name=\"ED_description\" rows=\"5\" cols=\"35\">$description</textarea><br>
				<span class=\"titlesmal\">$I18N_author</span><br>
				".ED_author."<br>
				".BUT_uploadScriptToSF."
			</td>
		</tr>
	");
	
	HTML_showTableEnd();
	HTML_showFormEnd();
}





/**
**name SCREDIT_newScriptTemplate()
**description Returns a template for a basic script.
**returns Text of the script template.
**/
function SCREDIT_newScriptTemplate()
{
	return('<?PHP
/*
Description: Enter your description here
Priority: Enter the priority number here (scripts with lower numbers get executed earlier)
*/

include ("/m23/data+scripts/packages/m23CommonInstallRoutines.php");
include ("/m23/inc/distr/debian/clientConfigCommon.php");

function run($id)
{
	/*
		Set variables:
			$id: is the numer of the current job
			
		Usefull funtion calls:
			PKG_getPackageParams($id): Get all parameters of the packages
			$clientParams=CLIENT_getAskingParams(): Get all parameters of the client
			sendClientStatus($id,"done"): Change the status of the current script
			MSR_logCommand($logFile): A text file from the client to the client\'s log in the m23 database
			
		Example (Send last 5 lines of the sources.list to the m23 client\'s log):
		
			echo("cat /etc/apt/sources.list | tail -5 > /tmp/last5Lines
			");
			MSR_logCommand("/tmp/last5Lines");
			
	*/

	sendClientStatus($id,"done");
	executeNextWork();
};
?>');
}

?>