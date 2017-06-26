<?php
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Functions for the embedded script editor.
$*/


class CScredit extends CChecks
{
	private $currentFile = '';
	private $currentScript = NULL;
	private $onlineScriptInfoArray = NULL;
	private $debugI = 0;
	const USER_SCRIPT_DIR = '/m23/data+scripts/packages/userPackages';
	const ONLINE_SCRIPTS_LIST_ARRAY_URL = 'http://m23.sourceforge.net/scriptUpload/listArray.php';
	const ONLINE_SCRIPT_DOWNLOAD_URL = 'http://m23.sourceforge.net/scriptUpload/script.php?id=';





/**
**name CScredit::__construct()
**description Constructor for new CScredit objects.
**/
	public function __construct()
	{
		$this->setCurrentScriptFilename(isset($_POST['currentFile']) ? $_POST['currentFile'] : '');

		// Try to get a previously loaded script information array
		$temp = unserialize(urldecode(isset($_POST['onlineScriptInfoArray']) ? $_POST['onlineScriptInfoArray'] : ''));
		if (($temp != false) && is_array($temp))
			$this->onlineScriptInfoArray = $temp;

		// Make a copy for getNextOnlineScriptInfo
		$this->onlineScriptInfoArrayForPop = $this->onlineScriptInfoArray;
	}





/**
**name CScredit::setCurrentScriptFilename($filename)
**description Corrects the given filename to have it a valid prefix and suffix and sets it as current file name.
**parameter filename: The filename to check and correct.
**/
	private function setCurrentScriptFilename($filename)
	{
		$filename = basename($filename);

		// Empty file name is allowed too (after deleting a file)
		if (empty($filename))
		{
			$this->currentFile = '';
			return(false);
		}

		//add the needed "m23" prefix to the file name if it's missing
		if (preg_match("/^m23/",$filename) == 0)
			$filename = "m23$filename";

		//add the needed "Install.php" ending to the file name if it's missing
		if (preg_match("/Install.php$/",$filename) == 0)
			$filename = $filename."Install.php";

		$this->currentFile = $filename;
		return(true);
	}





/**
**name CScredit::getCurrentScriptFilename()
**description Gets the current script filename.
**returns Current script filename.
**/
	private function getCurrentScriptFilename()
	{
		return($this->currentFile);
	}





/**
**name CScredit::getCurrentScriptFilenameFullPath()
**description Gets the current script filename with full path.
**returns Current script filename full path.
**/
	private function getCurrentScriptFilenameFullPath()
	{
		return(CScredit::USER_SCRIPT_DIR.'/'.$this->getCurrentScriptFilename());
	}





/**
**name CScredit::getCurrentScriptFilenameWithoutInstallPhp()
**description Gets the current script filename without "Install.php" at its end.
**returns Current script filename without "Install.php" at its end.
**/
	private function getCurrentScriptFilenameWithoutInstallPhp()
	{
		$temp = $this->getCurrentScriptFilename();
		return (preg_replace('/install\.php$/i', '', $temp));
	}





/**
**name CScredit::getLocalScriptFilenames()
**description Gets the filenames of local scripts.
**returns Array with the filenames of local scripts.
**/
	private function getLocalScriptFilenames()
	{
		return(HELPER_listFilesInDir(CScredit::USER_SCRIPT_DIR));
	}





/**
**name CScredit::updateOnlineScriptInfo()
**description Downloads the information about online available scripts.
**returns true, if the information could be fetched, otherwise false.
**/
	private function updateOnlineScriptInfo()
	{
		// Try to fetch the list array
		$this->onlineScriptInfoArrayForPop = $this->onlineScriptInfoArray = unserialize(HELPER_getContentFromURL(CScredit::ONLINE_SCRIPTS_LIST_ARRAY_URL));

		// Check, if a valid list array was received
		if (!is_array($this->onlineScriptInfoArray))
		{
			$this->onlineScriptInfoArray = NULL;
			return(false);
		}
		else
			return(true);
	}





/**
**name CScredit::getNextOnlineScriptInfo(&$ts, &$scriptId, &$scriptName, &$author)
**description Gets an information about all scripts that are available online. Every call of the function fetches the information about one script.
**parameter ts: Timestamp, when the script was uploaded.
**parameter scriptId: Id of the script (needed for download).
**parameter scriptName: Name of the script.
**parameter author: Name of the author.
**parameter description: Description for the script.
**returns true, if an entry could be read otherwise (e.g. if all entries were read) false.
**/
	private function getNextOnlineScriptInfo(&$ts, &$scriptId, &$scriptName, &$author, &$description)
	{
		// Check, if a valid list array was received
		if (!is_array($this->onlineScriptInfoArrayForPop))
			return(false);

		$currentInformation = array_pop($this->onlineScriptInfoArrayForPop);

		// If it is NULL, there is no new element in the information array
		if (is_null($currentInformation))
		{
			$this->onlineScriptInfoArrayForPop = $this->onlineScriptInfoArray;
			return(false);
		}

		// Write the informations to the referenced variables
		$ts = $currentInformation['ts'];
		$scriptId = $currentInformation['id'];
		$scriptName = $currentInformation['name'];
		$author = $currentInformation['author'];
		$description = $currentInformation['description'];

		return(true);
	}





/**
**name CScredit::loadOnlineScript($scriptIdToLoad)
**description Loads an online script into the editor.
**parameter scriptIdToLoad: Id of the script to load.
**/
	private function loadOnlineScript($scriptIdToLoad)
	{
		$text = HELPER_getContentFromURL(CScredit::ONLINE_SCRIPT_DOWNLOAD_URL.$scriptIdToLoad);
		$this->setCurrentScript($text);
		$this->setCurrentScriptFilename('');
	}





/**
**name CScredit::getOnlineScriptDialog()
**description Generates a dialog with JavaScript to get information about online scripts with download option.
**returns Dialog (HTML) with JavaScript to get information about online scripts with download option.
**/
	private function getOnlineScriptDialog()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		$selectionIsEmpty = true;

		// Download/update the list of online available scripts
		if (HTML_submit("BUT_updateOnlineScriptList", $I18N_updateOnlineScriptList))
			$this->updateOnlineScriptInfo();


		// Start for the javaScript part
		$js = '
			<script>
				scriptInfoArray = new Array();
		';


		// Run thru the infos for all script
		$idName = array(); // Array for the selection
		while ($this->getNextOnlineScriptInfo($ts, $scriptId, $scriptName, $author, $description))
		{
			// At least one script info entry was found
			$selectionIsEmpty = false;

			// Array for the selection
			$idName[$scriptId] = $scriptName;

			// Add the entry to the javaScript array
			$js .= "scriptInfoArray[$scriptId] = new Array(\"$ts\", \"$scriptName\", \"$author\", \"$description\");\n";
		}


		// If no entry was read => Show a placeholder in the selection
		if ($selectionIsEmpty)
			$idName[-1] = $I18N_noOnlineScriptListLoaded;


		// Selection of the online scripts with download button
		$scriptIdToLoad = HTML_selection('SEL_scriptIdToLoad', $idName, SELTYPE_selection, true, false, false, 'onChange="changeScriptInfoFields();"');
		if (HTML_submit('BUT_downloadScript', $I18N_load))
			$this->loadOnlineScript($scriptIdToLoad);


		// Add javaScript functions
		$js .= "
				// Changes the texts of the release date, author and description spans by the choosen script name
				function changeScriptInfoFields()
				{
					var sel = document.getElementById('SEL_scriptIdToLoad');
					changeScriptInfoFieldsById(sel.value);
				}

				// Changes the texts of the release date, author and description spans
				function changeScriptInfoFieldsById(id)
				{
					document.getElementById('DIV_scriptReleaseDate').innerHTML = scriptInfoArray[id][0];
					document.getElementById('DIV_author').innerHTML = scriptInfoArray[id][2];
					document.getElementById('DIV_description').innerHTML = scriptInfoArray[id][3];
				}

				// Show the texts of the release date, author and description spans for the script send by POST
				changeScriptInfoFieldsById($scriptIdToLoad);
			</script>\n";


		// Add the dialog
		$out = "<div class=\"errortable\">$I18N_scriptDownloadMalwareWarning</div><br>".SEL_scriptIdToLoad." ".BUT_downloadScript."<br>
			<span class=\"titlesmal\">$I18N_author</span>
			<div style=\"margin-left:10px\" id=\"DIV_author\"></div>
			<span class=\"titlesmal\">$I18N_scriptReleaseDate</span>
			<div style=\"margin-left:10px\" id=\"DIV_scriptReleaseDate\"></div>
			<span class=\"titlesmal\">$I18N_description</span>
			<div style=\"margin-left:10px\" id=\"DIV_description\"></div><br>
			".BUT_updateOnlineScriptList."
			$js";

		return($out);
	}





/**
**name CScredit::isNotSaved()
**description Returns if there is no script in the editor (after submitting).
**returns true, if there is no script in the editor (after submitting), otherwise false.
**/
	private function isNotSaved()
	{
		return(empty($this->currentFile));
	}





/**
**name CScredit::getNewScriptTemplate()
**description Returns a template for a basic script.
**returns Text of the script template.
**/
	private function getNewScriptTemplate()
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





/**
**name CScredit::uploadScript($author, $description)
**description Checks, if all needed information are given before uploading the script.
**parameter author: Name of the script author (or pseudonyme)
**parameter description: Description for the script.
**parameter text: The script code itself.
**/
	private function uploadScript($author, $description)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Check for filled out fields
		if (empty($author)) $this->addErrorMessage($I18N_pleaseInsertAuthorNameForTheScript);
		if (empty($description)) $this->addErrorMessage($I18N_pleaseInsertADescriptionNameForTheScript);

		$currentScript = $this->getCurrentScript();
		if (empty($currentScript)) $this->addErrorMessage($I18N_theScriptIsEmptyPleaseInsertCode);

		if (!$this->hasErrors())
			SERVER_sendScriptToSF($this->getCurrentScriptFilename(), $author, $description, $currentScript);
	}





/**
**name CScredit::getCurrentScript()
**description Get the text of the editor window.
**returns Current text of the editor window.
**/
	private function getCurrentScript()
	{
		if ($this->currentScript === NULL)
			$this->currentScript = (isset($_POST['ACE_postContents']{1}) ? urldecode($_POST['ACE_postContents']) : '');

		return($this->currentScript);
	}





/**
**name CScredit::setCurrentScript($text)
**description Set the text of the editor window.
**parameter text: Current text of the editor window to set.
**/
	private function setCurrentScript($text)
	{
		$this->currentScript = $text;
	}





/**
**name CScredit::deleteCurrentScript()
**description Deletes the current script, if one is loaded.
**returns true, if the script could be deleted, otherwise false.
**/
	private function deleteCurrentScript()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Check, if the script file exists
		$fileName = $this->getCurrentScriptFilenameFullPath();
		if (file_exists($fileName))
		{
			// Try to delete the script
			if (unlink($this->getCurrentScriptFilenameFullPath()))
			{
				$this->setCurrentScriptFilename('');
				return(true);
			}
			else
			{
				$this->addErrorMessage($I18N_theScriptFileCouldNotBeDeleted);
				return(false);
			}
		}
		else
		{
			$this->addErrorMessage($I18N_loadAScriptFileBeforeDeletingIt);
			return(false);
		}
	}





/**
**name CScredit::getViewScriptOutputDialog()
**description Generates a dialog with JavaScript to choose a client and to open the script output viewer for the currentry saved script.
**returns Dialog (HTML) with JavaScript to choose a client and to open the script output viewer for the currentry saved script.
**/
	private function getViewScriptOutputDialog()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		$linkClientnameA = array();

		// Create an object for fetching the client names
		$CClientListerO = new CClientLister();
		$script = $this->getCurrentScriptFilenameWithoutInstallPhp();

		// Build an array with a link to the script output viewer
		foreach ($CClientListerO->getClientNames() as $clientName)
		{
			$id = CLIENT_getId($clientName);
			$linkClientnameA["index.php?page=showCurrentWorkPHP&client=$clientName&id=$id&m23clientID=$id&script=$script"] = $clientName;
		}

		// Create a selection with the client names ans links to the script output viewer
		$clientForScriptOutputView = HTML_selection('SEL_clientForScriptOutputView', $linkClientnameA, SELTYPE_selection, true, false, false, 'onChange="changeScriptOutputViewLink();"');

		// Generate the HTML and JavaScript code
		$html = "
		<table>
			<tr>
				<td>
					<span class=\"titlesmal\">$I18N_client_name</span><br>".SEL_clientForScriptOutputView.'
				</td>
				<td align="center">
					<a href="xxx" target="_blank" id="A_scriptOutputViewLink">
						<img src="/gfx/workPHP.png"><br>
						'.$I18N_openScriptOutputView.'
					</a>
				</td>
			</tr>
		</table>
		<script>
			// Changes the link to the script output viewer
			function changeScriptOutputViewLink()
			{
				document.getElementById("A_scriptOutputViewLink").href = document.getElementById("SEL_clientForScriptOutputView").value;
			}
			
			changeScriptOutputViewLink();
		</script>
		';

		return($html);
	}





/**
**name CScredit::saveScript()
**description Saves the script in the editor to the file.
**/
	private function saveScript()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		$fout = fopen($this->getCurrentScriptFilenameFullPath(),"w");
		if (fwrite($fout,$this->getCurrentScript()) === false)
			$this->addErrorMessage($I18N_couldNotWriteScriptFile);
		fclose($fout);
	}





/**
**name CScredit::show()
**description Shows a script editor with syntax highlighting.
**/
	public function show()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		// Description and author (pseudonyme) for the script to upload
		$description = isset($_POST['TA_description']) ? $_POST['TA_description'] : '';
		$author = HTML_input('ED_author', false, 50);

		// uploads the currently loaded script to the m23 source forge site.
		if (HTML_submit("BUT_uploadScriptToSF",$I18N_uploadScriptToSF, ' onClick="document.getElementById(\'ACE_postContents\').value=encodeURIComponent(editor.getValue());"'))
			$this->uploadScript($author, $description);


		//Delete the current script
		if (HTML_submit("BUT_delete",$I18N_delete))
			$this->deleteCurrentScript();



		//button for loading the script files.
		if (HTML_submit("BUT_load", $I18N_load))
		{
			$this->setCurrentScriptFilename($_POST["SEL_file"]);
			$this->setCurrentScript(HELPER_getFileContents($this->getCurrentScriptFilenameFullPath()));
		}



		//Create new scripts
		$newFile = HTML_input("ED_newFile");
		if (HTML_submit("BUT_create",$I18N_create))
		{
			$this->setCurrentScriptFilename($newFile);

			//check if the file doesn't exists and create a new
			if (!file_exists($this->getCurrentScriptFilenameFullPath()))
			{
				$this->setCurrentScript($this->getNewScriptTemplate());

				if (!touch($this->getCurrentScriptFilenameFullPath()))
					$this->addErrorMessage($I18N_couldNotWriteScriptFile);
				else
					$this->saveScript();
			}
			else
			{
				$this->addErrorMessage($I18N_scriptFileCouldNotBeCreatedFileExists);
			}
		}



		// Save the script under a different name
		$saveAsName = HTML_input('ED_saveAsName');
		if (HTML_submit('BUT_saveAsName', $I18N_save, ' onClick="document.getElementById(\'ACE_postContents\').value=encodeURIComponent(editor.getValue());"'))
			$this->setCurrentScriptFilename($saveAsName);



		//save script in the editor
		if (HTML_submit("BUT_save", $I18N_save, ' onClick="document.getElementById(\'ACE_postContents\').value=encodeURIComponent(editor.getValue());"') || HTML_submitCheck('BUT_saveAsName'))
		{
			$this->saveScript();
		}



		//fake editing for the screenshot
		if (isset($_GET['screenshot']) && ($_GET['screenshot'] == yes))
		{
			$this->setCurrentScript($this->getNewScriptTemplate());
			$this->setCurrentScriptFilename('demo');
		}

		// Generate the HTML/JS code for the script download dialog
		$onlineScriptDialogHTML = $this->getOnlineScriptDialog();

		$heading = $this->isNotSaved() ? "!!!$I18N_unsaved!!!": ': '.$this->getCurrentScriptFilename();
		echo ("
			<span class=\"title\">$I18N_scriptEditor $heading</span><span class=\"warningtable\" style=\"display: none;\" id=\"SP_documentChanged\"></span><br><br>".H_MESSAGEBOXPLACEHOLDER);

		HTML_showFormHeader();
		HTML_showTableHeader();
	
		HTML_setPage('scriptEditor');

		// Save in a variable to make it callable by reference by HTML_listSelection
		$currentFile = $this->getCurrentScriptFilename();

		// Generates the HTML/JS code for choosing a client and to open the script output viewer for the currentry saved script.
		$viewScriptOutputDialogHTML = $this->getViewScriptOutputDialog();

		echo(
			HTML_hiddenVar('ACE_postContents', isset($_POST['ACE_postContents']) ? $_POST['ACE_postContents'] : '').
			HTML_hiddenVar('currentFile', $this->getCurrentScriptFilename())."
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
						var freshLoaded = true;

						ace.require("ace/ext/settings_menu").init(editor);
						editor.focus();
						editor.setTheme("ace/theme/cobalt");
						editor.setHighlightActiveLine(true);
						editor.session.setMode("ace/mode/php");
						editor.setValue(decodeURIComponent("'.HELPER_URIencode($this->getCurrentScript()).'"), -1);
						editor.session.on(\'change\', function() {
							var span = document.getElementById(\'SP_documentChanged\');
							span.innerHTML="'.$I18N_scriptEditorHasUnsavedChanges.'";
							span.style.display="block";
						});
						editor.session.newLineMode("unix");
						editor.commands.addCommands([{
							name: "showSettingsMenu",
							bindKey: {win: "Ctrl-m", mac: "Command-m"},
							exec: function(editor) {
								editor.showSettingsMenu();
							},
							readOnly: false
						}]);

					</script>'.HTML_jQueryReStoreYWindowPosition('scriptEditYPosition', $hiddenPosCode, true)."
					$hiddenPosCode
				<br>
				</td>
			</tr>
			</tr>
				<td valign=\"top\" width=\"50%\">
					<span class=\"title\">$I18N_scriptManagement</span><br><br>
					".HTML_listSelection("SEL_file", $this->getLocalScriptFilenames(), $currentFile)." ".BUT_load." ".BUT_save." ".BUT_delete."<br><br>
					<span class=\"titlesmal\">$I18N_saveAs</span><br>
					".ED_saveAsName." ".BUT_saveAsName."<br><br>
	
					<span class=\"titlesmal\">$I18N_createNewScript</span><br>
					".ED_newFile." ".BUT_create."<br><br>
					<span class=\"title\">$I18N_scriptDownload</span><br><br>
					$onlineScriptDialogHTML
				</td>
				<td valign=\"top\" width=\"50%\">
					<span class=\"title\">$I18N_uploadCurrentScript</span><br><br>
					<div class=\"errortable\">$I18N_scriptUploadGPLHint</div><br>
					<span class=\"titlesmal\">$I18N_description</span><br>
					<textarea name=\"TA_description\" rows=\"5\" cols=\"50\">$description</textarea><br><br>
					<span class=\"titlesmal\">$I18N_author</span><br>
					".ED_author."<br><br>
					".BUT_uploadScriptToSF."<br><br>
					<span class=\"title\">$I18N_viewScriptOutput</span><br><br>
					$viewScriptOutputDialogHTML
				</td>
			</tr>
			<script>
				document.getElementById('ACE_postContents').value=encodeURIComponent(editor.getValue());
			</script>
		");

		HTML_showTableEnd();
		$this->showMessages();
		echo(HTML_hiddenVar('onlineScriptInfoArray', urlencode(serialize($this->onlineScriptInfoArray))));

		HTML_showFormEnd();
	}
}
?>