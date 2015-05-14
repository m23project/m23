<?php
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Functions for the embedded script editor.
$*/





/**
**name SCREDIT_correctScriptFilename(&$filename)
**description Corrects the given filename to have it a valid prefix and suffix.
**parameter filename: The filename to check and correct.
**/
function SCREDIT_correctScriptFilename(&$filename)
{
	$filename = basename($filename);

	//add the needed "m23" prefix to the file name if it's missing
	if (preg_match("/^m23/",$filename) == 0)
		$filename = "m23$filename";

	//add the needed "Install.php" ending to the file name if it's missing
	if (preg_match("/Install.php$/",$filename) == 0)
		$filename = $filename."Install.php";

}





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

	$description = $_POST['ED_description'];

	$author = HTML_input('ED_author', false, 50);

	$saveAsName = HTML_input('ED_saveAsName');

	//get the text of the editor window
	$text = (isset($_POST['ACE_postContents']{1}) ? urldecode($_POST['ACE_postContents']) : '');

	#uploads the currently loaded script to the m23 source forge site.
	if (HTML_submit("BUT_uploadScriptToSF",$I18N_uploadScriptToSF, ' onClick="document.getElementById(\'ACE_postContents\').value=encodeURI(editor.getValue());"'))
	{
		SERVER_sendScriptToSF($currentFile, $author, $description, $text);
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
		SCREDIT_correctScriptFilename($filename);
	
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
	}

	// Save the script under a different name
	if (HTML_submit('BUT_saveAsName', $I18N_save, ' onClick="document.getElementById(\'ACE_postContents\').value=encodeURI(editor.getValue());"'))
		$currentFile = basename($saveAsName);

	//save script in the editor
	if (HTML_submit("BUT_save", $I18N_save, ' onClick="document.getElementById(\'ACE_postContents\').value=encodeURI(editor.getValue());"') || HTML_submitCheck('BUT_saveAsName'))
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

	echo(HTML_hiddenVar('ACE_postContents', $_POST['ACE_postContents'])."
		<input type=\"hidden\" name=\"currentFile\" value=\"$currentFile\">
		<input type=\"hidden\" id=\"HID_script2\" name=\"HID_script\" value=\"\">
		<tr>".'
			<style type="text/css" media="screen">
				#editor {
					margin: 0;
					width:  80em;
					height: 40em;
				}
			</style>

			<pre id="editor"></pre>
				<script src="/ace/src-min-noconflict/ace.js"></script>
				<script src="/ace/src-min-noconflict/ext-settings_menu.js"></script>
				<script>
					var editor = ace.edit("editor");
					ace.require("ace/ext/settings_menu").init(editor);
					editor.focus();
					editor.setTheme("ace/theme/cobalt");
					editor.setHighlightActiveLine(true);
					editor.session.setMode("ace/mode/php");
					editor.setValue(decodeURI("'.HELPER_URIencode($text).'"), -1);
					editor.session.newLineMode("unix");
					editor.commands.addCommands([{
						name: "showSettingsMenu",
						bindKey: {win: "Ctrl-m", mac: "Command-m"},
						exec: function(editor) {
							editor.showSettingsMenu();
						},
						readOnly: false
					}]);
				</script>'."
			<br>
			</td>
		</tr>
		</tr>
			<td valign=\"top\" width=\"50%\">
				<span class=\"title\">$I18N_uploadCurrentScript</span><br><br>
				".HTML_listSelection("SEL_file",$fileList,$currentFile)." ".BUT_load." ".BUT_save." ".BUT_delete."<br><br>
				<span class=\"titlesmal\">$I18N_saveAs</span><br>
				".ED_saveAsName." ".BUT_saveAsName."<br><br>

				<span class=\"titlesmal\">$I18N_createNewScript</span><br>
				".ED_newFile." ".BUT_create."<br><br>
			</td>
			<td valign=\"top\" width=\"50%\">
				<span class=\"title\">$I18N_uploadCurrentScript</span><br><br>
				<div class=\"errortable\">$I18N_scriptUploadGPLHint</div><br>
				<span class=\"titlesmal\">$I18N_description</span><br>
				<textarea name=\"ED_description\" rows=\"5\" cols=\"50\">$description</textarea><br><br>
				<span class=\"titlesmal\">$I18N_author</span><br>
				".ED_author."<br><br>
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

/*
	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
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