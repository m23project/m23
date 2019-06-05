<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for test automation.
$*/

declare(ticks = 1);


class CAutoTest
{

	// Trigger type
	const TRIGGER_OCR = 101;					// Read the VM's screen with OCR
	const TRIGGER_SEL_SOURCE_CONTAINS = 102;	// Result of selenium run containing a string
	const TRIGGER_SEL_HOSTREADY = 103;			// The Selenium VM is up and running
	const TRIGGER_TRUE = 104;					// A virtual trigger that is triggered at once
	const TRIGGER_SSH_COMMANDOUTPUT = 105;		// Result of SSH command contains a string
	const TRIGGER_WAIT = 106;					// A virtual trigger that is triggered after a given amount of seconds
	const TRIGGER_SEL_SOURCENOT_CONTAINS = 107;	// Result of selenium run NOT containing a string

	// Execution type
	const EXEC_KEY = 201;						// Emulate keyboard strokes into the VM
	const EXEC_SEL = 202;						// Run selenium
	const EXEC_FKT = 203;						// Run a function
	const EXEC_SEL_OPEN = 204;					// Open URL in Selenium
	const EXEC_SEL_SELECTFROM = 205;			// Select from option list
	const EXEC_SEL_CLICKBUTTON = 206;			// Click a button
	const EXEC_SEL_TYPEINTO = 207;				// Type into a field
	const EXEC_SEL_SETCHECK = 208;				// (Un)tick a checkbox
	const EXEC_SEL_SELECTRADIO = 209;			// Select a radiobutton
	const EXEC_SEL_CLICKURL = 210;				// Click a mathing URL with Selenium
	const EXEC_SSH_COMMAND= 211;				// Runs an SSH command
	const EXEC_WAIT= 212;						// Action that waits a given amount of seconds

	// Environment type
	const ENVIRONMENT_VM = 301;					// Run the tests in VM
	const ENVIRONMENT_HW = 302;					// Run the tests on real hardware
	const ENVIRONMENT_WEBINTERFACE = 303;		// The the webinterface only
	const ENVIRONMENT_XMLTEST = 304;			// The the parsing of the XML files only

	// Sequence array index descriptor constants
	const SEQIDX_TRIGGERTYPE		= 401;
	const SEQIDX_TRIGGERPARAM		= 402;
	const SEQIDX_GOODA				= 403;
	const SEQIDX_WARNA				= 404;
	const SEQIDX_BADA				= 405;
	const SEQIDX_EXECTYPE			= 406;
	const SEQIDX_EXECPARAM			= 407;
	const SEQIDX_TIMEOUT			= 408;
	const SEQIDX_DESCRIPTION		= 409;
	const SEQIDX_ANSWERS			= 410;
	const SEQIDX_EXECATTRIBUTES		= 411;
	const SEQIDX_TRIGGERATTRIBUTES	= 412;
	const SEQIDX_RUNIF				= 413;

	// Good/warn/bad answer
	const GWB_GOOD				= 501;
	const GWB_WARN				= 502;
	const GWB_BAD				= 503;

	// Sleep time (in seconds) between each run of the main loop
	const RUN_LOOP_SLEEP		= 2;

	// Time (in seconds) when an elemant takes to long to reach a defined state
	const TIMEOUT_OVER_WARN		= 120;
	const TIMEOUT_OVER_BAD		= 300;

	private $sequence = array(),
			$sequenceSize = 0,
			$curElementNr = 0,
			$environment = NULL, 	//VM, HW, webinterface, xmltest?
			$timeout = NULL,
			$triggered = false,
			$driverID = NULL,		// ID of the Selenium webdriver instance under HTTP2SeleniumBridge
			$variables = array(),	// Array for storing runtime variables
			$previousMessage = '',
			$consecutiveIdenticalMessageAmount = 0;






/**
**name CAutoTest::__construct($xmlFile, $argv)
**description Constructor for new CAutoTest objects.
**parameter xmlFile: Name of the XML file to open.
**parameter argv: Arguments from the command line (without the script name as 0th element) as array
**/
	public function __construct($xmlFile, $argv)
	{
		// Generate a random MAC for this test run
		$newMAC = HELPER_randomMAC();
		// Store it for AUTOTEST_VM_create (with ":" after each two digits)
		$this->variables['TEST_VBOX_MAC'] = $newMAC;
		// Store it for the m23 webinterface (without ":")
		$this->variables['SEL_VM_MAC'] = str_replace(":","",$newMAC);

		$this->importEnvironmentVariables();

		$this->readSettings();
		$this->internalVariablesToConstants();
		$this->parseXML($xmlFile, $argv);
		$this->internalVariablesToConstants();

		// Check, if an m23 base URL was given
		if (isset($this->variables['TEST_M23_BASE_URL']))
		{
			// Try to extract the IPv4 address
			$foundIPs = preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $this->variables['TEST_M23_BASE_URL'], $ips);

			// If (exactly) one IP was found => make a constant
			if (1 === $foundIPs)
				$this->variables['TEST_M23_IP'] = $ips[0];
			else
				dieWithExitCode('ERROR: No valid IPv4 address found in TEST_M23_BASE_URL!', 1);
		}
		else
			dieWithExitCode('ERROR: TEST_M23_BASE_URL not defined!',2);

		if ($this->isXMLTEST())
		{
			print_r($this->sequence);
			dieWithExitCode('INFO: XML testing finished.', 0);
		}

		// Get and cache the Selenium webdriver ID or quit the script here
		$this->getSeleniumDriverID();

		// Calling the destructor when pressing Ctrl+C
		pcntl_signal(SIGINT, function() {
			$this->__destruct();
			dieWithExitCode("CTRL+C pressed -> QUIT\n",3);
		});

	}





/**
**name CAutoTest::__destruct()
**description Destructor for this CAutoTest object.
**/
	public function __destruct()
	{
		$this->freeSeleniumDriverID();
	}





/**
**name CAutoTest::internalVariablesToConstants()
**description Maps internal variables to constants (for backward compatibility).
**/
	private function internalVariablesToConstants()
	{
		$this->debugPrint($this->variables);

		foreach ($this->variables as $var => $val)
		{
			if (!defined($var))
				define($var, $val);
		}
	}





/**
**name CAutoTest::importEnvironmentVariables()
**description Imports environment variables starting with 'AT_' into the runtime variables array.
**/
	private function importEnvironmentVariables()
	{
		foreach ($_SERVER as $var => $val)
		{
			if (strpos($var, 'AT_') === 0)
				$this->variables[$var] = $val;
		}
	}





/**
**name CAutoTest::loadXMLFile($xmlFile)
**description Loads an XML file, replaces problematic characters and includes other files.
**parameter xmlFile: Name of the XML file to open.
**returns SimpleXMLElement object with the loaded XML file.
**/
	private function loadXMLFile($xmlFile)
	{
		$xmlCode = AUTOTEST_getSeleniumSafeString(file_get_contents($xmlFile));
		// Try to find include tags
		preg_match_all('/<include>([^<]*)<\/include>/i', $xmlCode, $variablesA);

		$i = 0;
		// Run thru the found include tags and according filenames
		while (isset($variablesA[0][$i]) && isset($variablesA[1][$i]))
		{
			$searchTerm = $variablesA[0][$i]; // eg. <include>langDe.m23testinc</include>
			$fileName = $variablesA[1][$i]; // eg. langDe.m23testinc
	
			// If the file is found, the include tag will be replaced with the content of the file
			if (file_exists($fileName))
				$xmlCode = str_replace($searchTerm, AUTOTEST_getSeleniumSafeString(file_get_contents($fileName)), $xmlCode);
	
			$i++;
		}

		$this->debugPrint($xmlCode);

		return(new SimpleXMLElement($xmlCode));
	}





/**
**name CAutoTest::readSettings()
**description Reads basic settings from settings.m23test and sets them as constants.
**/
	private function readSettings()
	{
		$homeFile = "$_SERVER[HOME]/settings.m23test";
		
		if (file_exists($homeFile))
			$confFile = $homeFile;
		else
			$confFile = 'settings.m23test';
	
		$xmlO = $this->loadXMLFile($confFile);
		$this->internalValuesFromXML($xmlO);
	}





/**
**name CAutoTest::internalValuesFromXML($xmlO)
**description Reads the variables section of an XML file and imports the variables into the array with runtime variables.
**parameter xmlO: Prased XML structure pointing to the trigger.
**/
	private function internalValuesFromXML($xmlO)
	{
		// Run thru the constant section
		foreach ($xmlO[0]->variables[0] as $var => $val)
		{
			// Get the constant name and its value
			$var = (string)$var;
			$val = (string)$val[0];

			// Overwrite with environment variables
			if (isset($_SERVER[$var]))
				$val = $_SERVER[$var];

			$this->variables[$var] = $val;
			define($var, $val);
		}
	}





/**
**name CAutoTest::VMCreate()
**description Creates a new VM with virtual hard drive in VirtualBox and (optionally) inserts a bootable ISO into a VM.
**/
	private function VMCreate()
	{
		if (!$this->isVM())
			return(false);

		// Delete a maybe existing VM with the name before
		AUTOTEST_VM_delete(VM_NAME, $messages);
		$this->debugPrint($messages);

		// Create the VM
		AUTOTEST_VM_create(VM_NAME, VM_HDSIZE, VM_RAM, $messages);
		$this->debugPrint($messages);

		// Enable capturing
		AUTOTEST_VM_enableCapture(VM_NAME, $this->getMovieFileName(), $messages);
		$this->debugPrint($messages);

		// Insert an ISO (if given)
		if (NULL !== $this->getISO())
		{
			AUTOTEST_VM_insertBootISO(VM_NAME, $this->getISO(), $messages);
			$this->debugPrint($messages);
		}
	}





/**
**name CAutoTest::VMStop()
**description Stops a virtual machine.
**/
	private function VMStop()
	{
		if (!$this->isVM())
			return(false);

		AUTOTEST_VM_stop(VM_NAME, $VMStopMessage);
		$this->debugPrint($VMStopMessage);
	}





/**
**name CAutoTest::VMStart()
**description Starts a virtual machine in an existing X session.
**/
	private function VMStart()
	{
		if (!$this->isVM()) return(false);

		AUTOTEST_VM_start(VM_NAME, $VMStartMessage);
		$this->debugPrint($VMStartMessage);
	}





/**
**name CAutoTest::VMRestoreSnapshot($snapshotName)
**description Stops a VM and restores a snapshot.
**parameter snapshotName: Name of the snapshot to restore.
**/
	private function VMRestoreSnapshot($snapshotName)
	{
		if (!$this->isVM()) return(false);

		AUTOTEST_VM_restoreSnapshot(VM_NAME, $snapshotName);
	}





/**
**name CAutoTest::VMexportm23ServerISOasOVA()
**description Exports a VM, that was installed via the m23 server installation ISO, to OVA file.
**/
	private function VMexportm23ServerISOasOVA()
	{
		if (!$this->isVM()) return(false);
	
		AUTOTEST_VM_export_m23ServerISO_as_OVA(VM_NAME, $VMExportMessage);
	}





/**
**name CAutoTest::getISO()
**description Get the filename and path to the ISO image for booting.
**returns Filename and path to the ISO image for booting or NULL, if no ISO is used.
**/
	private function getISO()
	{
		return(isset($this->variables['VM_ISO']) ? $this->variables['VM_ISO'] : NULL);
	}





/**
**name CAutoTest::isVM()
**description Check, if the test should be run in a VM.
**returns true, when the test should be run in a VM, otherwise false.
**/
	private function isVM()
	{
		return(CAutoTest::ENVIRONMENT_VM == $this->environment);
	}





/**
**name CAutoTest::isXMLTEST()
**description Check, if the only the XML should be parsed.
**returns true, when the test should be run in a VM, otherwise false.
**/
	private function isXMLTEST()
	{
		return(CAutoTest::ENVIRONMENT_XMLTEST == $this->environment);
	}





/**
**name CAutoTest::getMovieFileName()
**description Get the movie file name for capturing the VM's screen.
**returns Movie file name (with full path) for capturing the VM's screen.
**/
	private function getMovieFileName()
	{
		return(TEST_VBOX_IMAGE_DIR.'/vbox/'.VM_NAME.'.webm');
	}





/**
**name CAutoTest::getLogFileName()
**description Get the file name for the log file.
**returns Log file name.
**/
	private function getLogFileName()
	{
		if (defined('VM_NAME'))
			return(VM_NAME.'-autoTest.log');
		else
			return('autoTest-startup.log');
	}





/**
**name CAutoTest::addToLogFile($lines)
**description Appends lines to the log file.
**parameter lines: The lines to add.
**/
	private function addToLogFile($lines)
	{
		file_put_contents($this->getLogFileName(), $lines , FILE_APPEND);
	}





/**
**name CAutoTest::getTimestampString()
**description Returns the date and time in human readable form.
**returns Date and time in human readable form.
**/
	private function getTimestampString()
	{
		return(strftime('%y-%m-%d %T'));
	}





/**
**name CAutoTest::setTriggered($triggered = true)
**description Sets the trigger state ofthe current sequence event.
**parameter triggered: true, when the current sequence event was triggered, otherwise false.
**returns true, when the current sequence event was triggered.
**/
	private function setTriggered($triggered = true)
	{
		$this->triggered = $triggered;
	}





/**
**name CAutoTest::isTriggered()
**description Checks, if the current sequence event was triggered.
**returns true, when the current sequence event was triggered.
**/
	private function isTriggered()
	{
		return($this->triggered);
	}





/**
**name CAutoTest::setTimeout()
**description Sets the timeout for the current sequence element.
**/
	private function setTimeout()
	{
		$elem = $this->getCurElement();
		$this->timeout = $elem[CAutoTest::SEQIDX_TIMEOUT];
	}





/**
**name CAutoTest::decTimeout()
**description Decrements the remaining time for the timeout.
**/
	private function decTimeout()
	{
		$this->timeout -= CAutoTest::RUN_LOOP_SLEEP;
		
		if ($this->timeout < -CAutoTest::TIMEOUT_OVER_WARN)
			$this->elemWarn('Timeout (TIMEOUT_OVER_WARN)');
		elseif ($this->timeout < -CAutoTest::TIMEOUT_OVER_BAD)
			$this->elemWarn('Timeout (TIMEOUT_OVER_BAD)');
	}





/**
**name CAutoTest::addToSequence($triggerType, $triggerParam, $answersA, $execType, $execParam, $execAttributes, $timeout, $description, $triggerAttributes, $runIf)
**description Adds an element to the sequence.
**parameter triggerType: Type of the trigger (CAutoTest::TRIGGER_*) or the type event, that should happen to begin with the given element of the sequence.
**parameter triggerParam: Parameter for the trigger (e.g. string that should be read from the screen when in CAutoTest::TRIGGER_OCR mode).
**parameter answersA: Associative array with the answers and parameters.
**parameter execType: Type of action (CAutoTest::EXEC_*), that will be executed when the trigger is hit.
**parameter execParam: Parameter for the action (e.g. keys to press, when in CAutoTest::EXEC_KEY mode).
**parameter execAttributes: Additional attributes (parameters) (eg. name/ID for Selenium calls)
**parameter timeout: Time to wait (in seconds) until the element of sequence will become a failure.
**parameter description: Description for the test.
**parameter triggerAttributes: Trigger attribute(s). Can hold additional parameters. (Result is written to this pointer)
**parameter runIf: Value of the runIf attribute.
**/
	public function addToSequence($triggerType, $triggerParam, $answersA, $execType, $execParam, $execAttributes, $timeout, $description, $triggerAttributes, $runIf)
	{
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_TRIGGERTYPE] = $triggerType;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_TRIGGERPARAM] = $triggerParam;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_TRIGGERATTRIBUTES] = $triggerAttributes;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_ANSWERS] = $answersA;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_EXECTYPE] = $execType;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_EXECPARAM] = $execParam;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_EXECATTRIBUTES] = $execAttributes;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_TIMEOUT] = $timeout;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_DESCRIPTION] = $description;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_RUNIF] = $runIf;
		$this->sequenceSize++;
	}





/**
**name CAutoTest::matchArray($search, $array)
**description Checks, if the search text is found in one of the texts contained in the array.
**parameter search: Text to search in the array elements.
**parameter array: Array with texts as element values.
**/
	private function matchArray($search, $array)
	{
		// If no search term is given or the array with the elements is empty => return
		if ((!isset($search{0})) || (count($array) == 0))
			return(false);

		// Run thru the array with the elements to check if the search term is found
		foreach ($array as $toCheck)
			if (substr_count($search,$toCheck) > 0)
				return(true);

		return(false);
	}





/**
**name CAutoTest::getAnswersA()
**description Returns the array with the answers of the current sequence element.
**returns Array with the answers of the current sequence element.
**/
	private function getAnswersA()
	{
		$elem = $this->getCurElement();
		return($elem[CAutoTest::SEQIDX_ANSWERS]);
	}





/**
**name CAutoTest::getTriggerTypes()
**description Returns the trigger type of the current sequence element.
**returns Trigger type of the current sequence element.
**/
	private function getTriggerTypes()
	{
		$elem = $this->getCurElement();
		return($elem[CAutoTest::SEQIDX_TRIGGERTYPE]);
	}





/**
**name CAutoTest::getTriggerAttributes()
**description Returns the attributes (additional parameters) for execution of the current sequence element.
**returns Attributes (additional parameters) for execution of the current sequence element.
**/
	private function getTriggerAttributes()
	{
		$elem = $this->getCurElement();
		return($elem[CAutoTest::SEQIDX_TRIGGERATTRIBUTES]);
	}





/**
**name CAutoTest::getTriggerParams()
**description Returns the trigger parameter of the current sequence element.
**returns Trigger parameter of the current sequence element.
**/
	private function getTriggerParams()
	{
		$elem = $this->getCurElement();
		return($elem[CAutoTest::SEQIDX_TRIGGERPARAM]);
	}





/**
**name CAutoTest::getExecTypes()
**description Returns the type of execution of the current sequence element.
**returns Type of execution of the current sequence element.
**/
	private function getExecTypes()
	{
		$elem = $this->getCurElement();
		return($elem[CAutoTest::SEQIDX_EXECTYPE]);
	}





/**
**name CAutoTest::getExecParams()
**description Returns the parameter for execution of the current sequence element.
**returns Parameter for execution of the current sequence element.
**/
	private function getExecParams()
	{
		$elem = $this->getCurElement();
		return($elem[CAutoTest::SEQIDX_EXECPARAM]);
	}





/**
**name CAutoTest::getExecAttributes()
**description Returns the attributes (additional parameters) for execution of the current sequence element.
**returns Attributes (additional parameters) for execution of the current sequence element.
**/
	private function getExecAttributes()
	{
		$elem = $this->getCurElement();
		return($elem[CAutoTest::SEQIDX_EXECATTRIBUTES]);
	}







/**
**name CAutoTest::checkTriggerResult()
**description Checks, if the result (e.g. from AUTOTEST_VM_ocrScreen) is found in the good, warn or bad array and executes the matching element finish handler.
**/
	private function checkTriggerResult()
	{
		// Get the answer array
		$answersA = $this->getAnswersA();

		// Run thru the possible answers
		foreach ($answersA as $answer)
		{
			$shouldBeFound = true;
		
			// From where does the input value to compare with the possible answers come?
			switch ($answer['fetchType'])
			{
				case CAutoTest::TRIGGER_OCR:
					$in = AUTOTEST_VM_ocrScreen(VM_NAME);
				break;

				case CAutoTest::TRIGGER_SEL_SOURCE_CONTAINS:
					$in = $this->seleniumGetSource();
				break;

				case CAutoTest::TRIGGER_SEL_SOURCENOT_CONTAINS:
					$in = $this->seleniumGetSource();
					$shouldBeFound = false;
				break;

				case CAutoTest::TRIGGER_SSH_COMMANDOUTPUT:
					$in = AUTOTEST_sshTunnelOverServer(
							$this->variables['TEST_M23_IP'],
							isset($this->variables['VM_IP']) ? $this->variables['VM_IP'] : $this->variables['VM_NAME'],
							$answer['cmd'],
							isset($answer['password']{1}) ? $answer['password'] : NULL
						);

					$this->showAndLogMessage("\n".HELPER_indentLines($in), "TRIGGER_SSH_COMMANDOUTPUT (checkTriggerResult)", true);
				break;

				case CAutoTest::TRIGGER_TRUE:
					$in = $answer['text'] = '1';
				break;
			}
			
			$found = $this->isAnswerFoundInTriggerResult($in, AUTOTEST_replaceConstantsInString($answer['text']));
			$this->debugPrint($in);
			$this->debugPrint(serialize($found), "checkTriggerResult");
			$this->debugPrint(serialize($shouldBeFound), "shouldBeFound");
			$this->debugPrint($answer);

			// Is the answer a good, warning or bad answer and does it match=
			switch ($answer['answerType'])
			{
				case CAutoTest::GWB_GOOD:
					if ($found == $shouldBeFound)
					{
						$this->elemGood($answer);
						break 2; // Jump out of the foreach loop
					}
				break;
				case CAutoTest::GWB_WARN:
					if ($found == $shouldBeFound)
						$this->elemWarn($answer);
				break;
				case CAutoTest::GWB_BAD:
					if ($found == $shouldBeFound)
						$this->elemBad($answer);
				break;
			}
		}
		$this->decTimeout();
	}





/**
**name CAutoTest::isAnswerFoundInTriggerResult($triggerResult, $answer)
**description Checks, if a trigger result contains an answer.
**parameter triggerResult: A text (eg. extracted by OCR or from HTML source) that may contain answers.
**parameter answer: A normal string or an $I18N_ variable. In case of a variable all translations will be searched in the trigger result. If it begins with "!", the answer should NOT be found in the result.
**returns true, if the answer (or its translation) was (NOT) found in the trigger result.
**/
	private function isAnswerFoundInTriggerResult($triggerResult, $answer)
	{
		$shouldBeFound = true;
	
		// Check, if the answer should be 
		if ($answer{0} == '!')
		{
			$shouldBeFound = false;
			$answer = substr($answer, 1);
		}
	
		// Check if the answer is an $I18N variable
		if (strpos($answer, '$I18N_') !== FALSE)
		{
			// Run thru the translations
			foreach (I18N_getAllTranslationsForAllVariables($answer) as $lang => $translation)
			{
				$translation = html_entity_decode(str_replace("&apos;", "'", $translation));
			
				$this->debugPrint($translation, 'isAnswerFoundInTriggerResult (translation)');
			
				// Check for a match
				if (HELPER_str_equal_UTF8ISO($triggerResult, $translation))
					return(true == $shouldBeFound);
			}
			return(false == $shouldBeFound);
		}
		// Check, if the answer is an OR list
		elseif (strpos($answer, '|{') === 0)
		{
			// eg. $answer = '|{Warte|minutes}';
		
			// Remove the first two characters and the last: $answer = 'Warte|minutes'
			$answer = substr($answer, 2, -1);

			// Run thru the parts
			foreach (explode('|', $answer) as $a)
			{
				$this->debugPrint($a, 'isAnswerFoundInTriggerResult (OR)');
				if (HELPER_str_equal_UTF8ISO($triggerResult, $a))
					return(true == $shouldBeFound);
			}

			return(false == $shouldBeFound);
		}
		else
		{
			$this->debugPrint($answer, 'isAnswerFoundInTriggerResult (direct)');
			// Try to find the answer directly
			return(HELPER_str_equal_UTF8ISO($triggerResult, $answer) == $shouldBeFound);
		}
	}





/**
**name CAutoTest::executePHPFunction($params)
**description Executes a PHP function with (optional) parameters.
**parameter params: Parameter string with function name as 1st part and its parameters concenated by "°".
**/
	private function executePHPFunction($params)
	{
		// Split the parameters from the XML file (by °)
		$paramsA = explode('°', $params);
	
		// First parameter is the function name
		$fkt = $paramsA[0];

		// Check, if the function name should be handled in a special or generic way
		switch($fkt)
		{
			case 'AUTOTEST_VM_create':
				$this->VMCreate();
			break;

			case 'AUTOTEST_VM_start':
				$this->VMStart();
			break;

			case 'AUTOTEST_VM_stop':
				$this->VMStop();
			break;

			case 'AUTOTEST_VM_restoreSnapshot':
				$this->VMRestoreSnapshot($paramsA[1]);
			break;

			case 'AUTOTEST_VM_exportm23ServerISOasOVA':
				$this->VMexportm23ServerISOasOVA();
			break;

			default:
				// Exchange the first parameter with the name of the VM
				$paramsA[0] = VM_NAME;
			
				call_user_func_array($fkt, $paramsA);
		}
	}





/**
**name CAutoTest::executeTriggerAction()
**description Executes the action of the current sequence element.
**/
	private function executeTriggerAction()
	{
		$i = 0;
		$execTypes = $this->getExecTypes();
		$execAllParam = $this->getExecParams();
		$execAllAttributes = $this->getExecAttributes();

		while (isset($execTypes[$i]))
		{
			$execParam = AUTOTEST_replaceConstantsInString($execAllParam[$i]);
			$execAttributes = $execAllAttributes[$i];
			
			switch ($execTypes[$i])
			{
				case CAutoTest::EXEC_KEY:
					AUTOTEST_VM_keyboardWrite(VM_NAME, $execParam);
				break;

				case CAutoTest::EXEC_FKT:
					$this->executePHPFunction($execParam);
				break;

				// Select a radiobutton with Selenium
				case CAutoTest::EXEC_SEL_SELECTRADIO:
					// Merge the attributes (ID/name) with the value of the radio button to click.
					$this->seleniumExec(array_merge($execAttributes, array('val' => $execParam)));
				break;

				// Open URL with Selenium
				case CAutoTest::EXEC_SEL_OPEN:
					// Merge the attributes (ID/name) with the value of the URL to open.
					$this->seleniumExec(array_merge($execAttributes, array('url' => $execParam)));
				break;
				
				// Wait a given amount of seconds
				case CAutoTest::EXEC_WAIT:
					sleep($execParam);
				break;
				
				

				// Click a mathing URL with Selenium
				case CAutoTest::EXEC_SEL_CLICKURL:
					// Split the search terms (separated by '°') into an array
					$searchA = explode('°', $execParam);
					
					$url = NULL;
					
					while (is_null($url))
					{
						// Get the current page source
						$htmlsource = $this->seleniumGetSource();
	
						// Search for the matching URL
						$url = AUTOTEST_SEL_getURLByMatch($htmlsource, $searchA);

						$this->seleniumReload();
					}

					// Change the type, so seleniumExec will open the newly created URL
					$execAttributes['type'] = 'sel_open';
					// Merge the attributes (ID/name) with the value of the URL to open.
					$this->seleniumExec(array_merge($execAttributes, array('url' => AUTOTEST_getSeleniumSafeString($url))));
				break;

				// Select from option list with Selenium
				case CAutoTest::EXEC_SEL_SELECTFROM:
					// Merge the attributes (ID/name) with the value of the selection to choose.
					$this->seleniumExec(array_merge($execAttributes, array('val' => $execParam)));
				break;

				// Click a button with Selenium
				case CAutoTest::EXEC_SEL_CLICKBUTTON:
					$this->seleniumExec($execAttributes);
				break;

				// Type into a field with Selenium
				case CAutoTest::EXEC_SEL_TYPEINTO:
					// Merge the attributes (ID/name) with the text to type.
					$this->seleniumExec(array_merge($execAttributes, array('text' => $execParam)));
				break;

				// (Un)tick a checkbox with Selenium
				case CAutoTest::EXEC_SEL_SETCHECK:
					// Merge the attributes (ID/name) with the check status.
					$this->seleniumExec(array_merge($execAttributes, array('checked' => $execParam)));
				break;
				
				case CAutoTest::EXEC_SSH_COMMAND:
					$res = AUTOTEST_sshTunnelOverServer(
						$this->variables['TEST_M23_IP'],
						isset($this->variables['VM_IP']) ? $this->variables['VM_IP'] : $this->variables['VM_NAME'],
						$execParam,
						isset($execAttributes['password']{1}) ? $execAttributes['password'] : NULL
					);
					
					$this->showAndLogMessage("\n".HELPER_indentLines($res), "EXEC_SSH_COMMAND (executeTriggerAction)", true);
				break;
			}
			$i++;
		}

		$this->setTriggered();
		$this->setTimeout();
	}





/**
**name CAutoTest::waitForTrigger()
**description Waits for a trigger event, to execute the action.
**/
	private function waitForTrigger()
	{
		$i = 0;
		$triggerTypes = $this->getTriggerTypes();
		$triggerParams = $this->getTriggerParams();
		$triggerAttributes = $this->getTriggerAttributes();
		
		$this->debugPrint($triggerTypes);

		while (isset($triggerTypes[$i]))
		{
			$triggerType = $triggerTypes[$i];
			$triggerParam = AUTOTEST_replaceConstantsInString($triggerParams[$i]);

			switch ($triggerType)
			{
				// Gets triggered by matching text found in OCR
				case CAutoTest::TRIGGER_OCR:
					$ocr = AUTOTEST_VM_ocrScreen(VM_NAME);
					if ($this->isAnswerFoundInTriggerResult($ocr, $triggerParam))
						$this->executeTriggerAction();
				break;

				// Gets triggered by matching text found in the current page source of the selenium browser
				case CAutoTest::TRIGGER_SEL_SOURCE_CONTAINS:
					$in = $this->seleniumGetSource();
					if ($this->isAnswerFoundInTriggerResult($in, $triggerParam))
						$this->executeTriggerAction();
				break;

				// Gets triggered by NOT matching text found in the current page source of the selenium browser
				case CAutoTest::TRIGGER_SEL_SOURCENOT_CONTAINS:
					$in = $this->seleniumGetSource();
					if (!$this->isAnswerFoundInTriggerResult($in, $triggerParam))
						$this->executeTriggerAction();
				break;

				// Gets triggered by matching text found in the output of an SSH command
				case CAutoTest::TRIGGER_SSH_COMMANDOUTPUT:
					$in = AUTOTEST_sshTunnelOverServer(
							$this->variables['TEST_M23_IP'],
							isset($this->variables['VM_IP']) ? $this->variables['VM_IP'] : $this->variables['VM_NAME'],
							$triggerAttributes['cmd'],
							isset($triggerAttributes['password']{1}) ? $triggerAttributes['password'] : NULL
						);

					$this->showAndLogMessage("\n".HELPER_indentLines($in), "TRIGGER_SSH_COMMANDOUTPUT (waitForTrigger): \n", true);

					if ($this->isAnswerFoundInTriggerResult($in, $triggerParam))
						$this->executeTriggerAction();
				break;

				// Gets triggered by a running HTTP2SeleniumBridge
				case CAutoTest::TRIGGER_SEL_HOSTREADY:
					if ($this->seleniumHostRunning())
						$this->executeTriggerAction();
				break;

				// Gets triggered at once
				case CAutoTest::TRIGGER_TRUE:
					$this->executeTriggerAction();
				break;

				// Waits for a given amount of seconds
				case CAutoTest::TRIGGER_WAIT:
					sleep($triggerParam);
					$this->executeTriggerAction();
				break;
			}
			$i++;
		}
	}





/**
**name CAutoTest::getCurElement()
**description Returns the current sequence element.
**returns Trigger type of the current sequence element.
**/
	private function getCurElement()
	{
		return($this->sequence[$this->curElementNr]);
	}





/**
**name CAutoTest::nextCurElement()
**description Increments the current sequence element number.
**/
	private function nextCurElement()
	{
		$this->curElementNr++;
		$this->setTriggered(false);
		
		if ($this->curElementNr < $this->sequenceSize)
		{
			// Show and log a heading for the new test block if it is triggered
			$elem = $this->getCurElement();
			$description = $elem[CAutoTest::SEQIDX_DESCRIPTION];
			$this->showAndLogMessage("$description =====", "\n===== ");
		}
	}





/**
**name CAutoTest::isConsecutiveIdenticalMessage($msg)
**description Checks, if an identical message was assigned in the last call.
**parameter msg: Message to check.
**returns true, if an identical message was assigned in the last call, otherwise false.
**/
	private function isConsecutiveIdenticalMessage($msg)
	{
		$ret = ($msg == $this->previousMessage);
		
		if ($ret)
			$this->consecutiveIdenticalMessageAmount++;
		else
			$this->consecutiveIdenticalMessageAmount = 0;

		$this->previousMessage = $msg;
		return($ret);
	}





/**
**name CAutoTest::showAndLogMessage($msg, $prefix = '', $ignoreRepeatedMessages = false)
**description Shows a message and logs it to the log file.
**parameter msg: Message to show in the console and the log file.
**parameter prefix: A prefix show before the message to indicate the type of the message.
**parameter ignoreConsecutiveIdenticalMessages: If set to true, consecutive identical messages are not given shown or logged, but 
**/
	private function showAndLogMessage($msg, $prefix = '', $ignoreRepeatedMessages = false)
	{
		// Check, if the message is given as array (use 1st element) or as string (use directly).
		$msg = (is_array($msg) ? $msg[0] : $msg);

		$msg = utf8_decode($msg);
		
		if ($this->isConsecutiveIdenticalMessage($msg) && $ignoreRepeatedMessages)
		{
			echo("\rrepeated ".$this->consecutiveIdenticalMessageAmount." times");
// 			$msg = $this->getTimestampString().": again\n";
			return(true);
		}
		else
			// Add the timestamp, a (possibly existing) prefix and the message itself to the output message
			$msg = $prefix.' '.$this->getTimestampString()." ".$msg."\n";

		// Add the message to the log file
		$this->addToLogFile($msg);

		// Show it in the console
		echo($msg);
	}





/**
**name CAutoTest::debugPrint($msg)
**description Shows a message (, array or object in human readable form) and logs it to the log file, if autoTest is in debug mode.
**parameter msg: Message (, array or object in human readable form) to show in the console and the log file.
**parameter prefix: A prefix show before the message to indicate the type of the message.
**/
	private function debugPrint($msg, $prefix = '')
	{
		if ($this->isDebug())
		{
			if (isset($prefix{0}))
				$prefix = " (${prefix})";

			$msg = print_r($msg, true);
			$this->showAndLogMessage("\n$msg", "DEBUG${prefix}");
		}
	}





/**
**name CAutoTest::isDebug()
**description Checks, if autoTest is in debug mode (variable AT_debug is set).
**returns true, if autoTest is in debug mode (variable AT_debug is set), otherwise false.
**/
	private function isDebug()
	{
		return(isset($this->variables['AT_debug']));
	}





/**
**name CAutoTest::getStatusDescriptionInBraces($status, $description)
**description Returns a status string with optional description in braces.
**parameter status: The status.
**parameter description: Optional description.
**returns Status string with optional description in braces.
**/
	private function getStatusDescriptionInBraces($status, $description)
	{
		$description = utf8_decode($description);
		$description = isset($description{1}) ? " ($description)": '';
		return("$status${description}");
	}





/**
**name CAutoTest::evaluateRunIf()
**description Checks, if the condition of the runIf attribute is met.
**returns true, if the condition of the runIf attribute is met, otherwise false.
**/
	private function evaluateRunIf()
	{
		$elem = $this->getCurElement();
		$runIf = $elem[CAutoTest::SEQIDX_RUNIF];
		
		$this->debugPrint(serialize($runIf), 'evaluateRunIf(runIf)');
	
		if (isset($runIf{1}))
		{
			// Split the value of a runIf into variable name, operator and compare value
			preg_match_all('/([^<!=> ]*)([<!=> ]*)(.*)/', $runIf, $variablesA);
			$var	= $variablesA[1][0];
			$op		= trim($variablesA[2][0]);
			$val2	= $variablesA[3][0];
	
			// Check, if a value is stored in the runtime variable array and get its value, if possible
			if (!isset($this->variables[$var]))
			{
				if (('NULL' == $val2) && ('==' == $op))
					return(true);
				else
					return(false);
			}
			$val1 = $this->variables[$var];

			$this->debugPrint("var:$var => $val1 $op $val2");

			switch($op)
			{
				case '>':
					return($val1 > $val2);
				case '==':
					return($val1 == $val2);
				case '<':
					return($val1 < $val2);
				case '<=':
					return($val1 <= $val2);
				case '>=':
					return($val1 >= $val2);
				case '!=':
				{
					if ('NULL' == $val2)
						return(true);
					else
						return($val1 != $val2);
				}
				default:
					die("Unknown operator \"$op\"!");
			}
		}
			return(true);
	}





/**
**name CAutoTest::evaluateSetVar($answer)
**description Parses the value of an "setVar" attribute from an aarray with information about the answer and sets it to the runtime variables array, if it seems to be valid.
**/
	private function evaluateSetVar($answer)
	{
		$this->debugPrint($answer, "evaluateSetVar");

		if (isset($answer['setVar']) && isset($answer['setVar']{1}))
		{
			$varVal = explode('=', $answer['setVar']);
			
			if (isset($varVal[0]) && isset($varVal[1]) && !isset($varVal[2]))
				$this->variables[$varVal[0]] = $varVal[1];
			else
				dieWithExitCode('The value "'.$answer['setVar'].'" of the "setVar" attribute could not be parsed!', 14);
		}
	}





/**
**name CAutoTest::elemGood($answer)
**description The current sequence elements was finished sucessfully.
**parameter answer: Array with information about the answer.
**/
	private function elemGood($answer)
	{
		$this->elemGoodOrWarn($answer, '[GOOD]');
	}





/**
**name CAutoTest::elemWarn($answer)
**description The current sequence elements was finished with a warning.
**parameter answer: Array with information about the answer.
**/
	private function elemWarn($answer)
	{
		$this->elemGoodOrWarn($answer, '[WARN]');
	}





/**
**name CAutoTest::elemGoodOrWarn($msg, $prefix)
**description The current sequence elements was finished sucessfully or with a warning. The result is shown and written to the log file.
**parameter msg: Message to show in the console and the log file.
**parameter prefix: A prefix show before the message to indicate the type of the message.
**/
	private function elemGoodOrWarn($msg, $prefix)
	{
		// If it's an array, generate a message with its elements
		if (is_array($msg))
		{
			$this->evaluateSetVar($msg);
			$this->showAndLogMessage(':= '.$msg['text'], $this->getStatusDescriptionInBraces($prefix, $msg['description']));
		}
		else
		// If it's a string, give out a simple message
			$this->showAndLogMessage($msg, $prefix);

		$this->nextCurElement();
	}





/**
**name CAutoTest::elemBad($answer)
**description There was an error in the current sequence element, so the execution must bestopped.
**parameter answer: Array with information about the answer.
**/
	private function elemBad($answer)
	{
		$this->evaluateSetVar($answer);
		$this->showAndLogMessage(':= '.$answer['text'], $this->getStatusDescriptionInBraces('[BAD]', $answer['description']));
		exit(1);
	}





/**
**name CAutoTest::setVariableFromXML($var, $descr)
**description Returns the input value when it is not NULL or exists the script with an error message.
**parameter val: Input value.
**parameter descr: Description for the value.
**returns Input value when it is not NULL or exists the script with an error message.
**/
	private function setVariableFromXML($val, $descr)
	{
		if ($val === NULL)
			dieWithExitCode("Needed parameter \"$descr\" could not read from the test description file!", 4);
		else
			return($val);
	}





/**
**name CAutoTest::triggerTypeToConstant($type)
**description Tries to convert the trigger type (string) to a trigger type constant.
**parameter type: Trigger type (string).
**returns Trigger type constant.
**/
	private function triggerTypeToConstant($type)
	{
		// Try to convert the trigger type
		switch (strtolower(utf8_decode($type)))
		{
			case 'ocr':
				return(CAutoTest::TRIGGER_OCR);
			case 'sel_sourcecontains':
				return(CAutoTest::TRIGGER_SEL_SOURCE_CONTAINS);
			case 'sel_sourcenotcontains':
				return(CAutoTest::TRIGGER_SEL_SOURCENOT_CONTAINS);
			case 'sel_hostready':
				return(CAutoTest::TRIGGER_SEL_HOSTREADY);
			case 'true':
				return(CAutoTest::TRIGGER_TRUE);
			case 'ssh_commandoutput':
				return(CAutoTest::TRIGGER_SSH_COMMANDOUTPUT);
			case 'wait':
				return(CAutoTest::TRIGGER_WAIT);
			default:
				dieWithExitCode('Unknown trigger type: '.$type, 5);
		}
	}





/**
**name CAutoTest::parseTriggerFromXML($xmlO, $testDescription, &$testTrigger, &$testTriggerType, &$testTriggerAttributes)
**description Parses the trigger and its type from the XML.
**parameter xmlO: Prased XML structure pointing to the trigger.
**parameter testDescription: Description of the test.
**parameter testTrigger: Trigger parameter. (Result is written to this pointer)
**parameter testTriggerType: Trigger type. (Result is written to this pointer)
**parameter testTriggerAttributes: Trigger attribute(s). Can hold additional parameters. (Result is written to this pointer)
**/
	private function parseTriggerFromXML($xmlO, $testDescription, &$testTrigger, &$testTriggerType, &$testTriggerAttributes)
	{
		$testTriggerAttributes = $testTrigger = $testTriggerType = array();
		$i = 0;

		$temp = $this->setVariableFromXML($xmlO, "$testDescription: trigger");

		while ($xmlO[$i] !== NULL)
		{
			$curElem = $xmlO[$i];

			$testTrigger[$i] = utf8_decode($this->setVariableFromXML($curElem, "$testDescription: trigger"));
			$testTriggerType[$i] = $this->triggerTypeToConstant($this->setVariableFromXML($curElem['type'], "$testDescription: trigger type"));

			foreach ($curElem->attributes() as $key => $val)
				$testTriggerAttributes[$key] = urldecode(utf8_decode((string)$val[0]));

			$i++;
		}
	}





/**
**name CAutoTest::parseActionFromXML($xmlO, $testDescription, &$testAction, &$testActionType, &$testActionAttributes)
**description Parses the action and its type from the XML.
**parameter xmlO: Prased XML structure pointing to the action.
**parameter testDescription: Description of the test.
**parameter testAction: Action parameter. (Result is written to this pointer)
**parameter testActionType: Action type(s). (Result is written to this pointer)
**parameter testActionAttributes: Action attribute(s). Can hold additional parameters. (Result is written to this pointer)
**/
	private function parseActionFromXML($xmlO, $testDescription, &$testAction, &$testActionType, &$testActionAttributes)
	{
		$testAction = $testActionType = $testActionAttributes = array();
		$i = 0;

		$temp = $this->setVariableFromXML($xmlO, "$testDescription: action");

		while ($xmlO[$i] !== NULL)
		{
			$curElem = $xmlO[$i];

			// E.g. <action type="sel_typeInto" ID="ED_login">test</action>
			// $testAction[$i] = 'test
			$testAction[$i] = utf8_decode($this->setVariableFromXML($curElem, "$testDescription: action"));

			// $testActionType[$i] = 'sel_typeInto'
			$testActionType[$i] = strtolower(utf8_decode($this->setVariableFromXML($curElem['type'], "$testDescription: action type")));
			/*
				$testActionAttributes[$i] = Array
				(
					[type] => sel_typeInto
					[ID] => ED_login
				)
			*/
			foreach ($curElem->attributes() as $key => $val)
				$testActionAttributes[$i][$key] = (string)$val[0];

			$this->debugPrint($testAction[$i]);
			$this->debugPrint($testActionAttributes[$i]);

			// Try to convert the action type
			switch ($testActionType[$i])
			{
				case 'key':
					$testActionType[$i] = CAutoTest::EXEC_KEY;
				break;

				case 'sel_open':
					$testActionType[$i] = CAutoTest::EXEC_SEL_OPEN;
				break;

				case 'sel_selectfrom':
					$testActionType[$i] = CAutoTest::EXEC_SEL_SELECTFROM;
				break;

				case 'sel_clickbutton':
					$testActionType[$i] = CAutoTest::EXEC_SEL_CLICKBUTTON;
				break;

				case 'sel_typeinto':
					$testActionType[$i] = CAutoTest::EXEC_SEL_TYPEINTO;
				break;

				case 'sel_setcheck':
					$testActionType[$i] = CAutoTest::EXEC_SEL_SETCHECK;
				break;
				
				case 'ssh_command':
					$testActionType[$i] = CAutoTest::EXEC_SSH_COMMAND;
				break;

				case 'wait':
					$testActionType[$i] = CAutoTest::EXEC_WAIT;
				break;

				case 'sel_selectradio':
					$testActionType[$i] = CAutoTest::EXEC_SEL_SELECTRADIO;
				break;

				case 'sel_clickmatchingurl':
					$testActionType[$i] = CAutoTest::EXEC_SEL_CLICKURL;
				break;

				case 'fkt':
					$testActionType[$i] = CAutoTest::EXEC_FKT;
				break;

				default:
					dieWithExitCode('Unknown action type: '.$testActionType[$i], 6);
			}
			$i++;
		}
	}





/**
**name CAutoTest::seleniumReload()
**description Reloads the currently loaded page
**returns Current page source
**/
	private function seleniumReload()
	{
		$this->seleniumExec(array('type' => 'sel_reload'));
	}





/**
**name CAutoTest::seleniumGetSource()
**description Gets the current page source of the selenium browser into the output page.
**returns Current page source
**/
	private function seleniumGetSource()
	{
		return($this->seleniumExec(array('type' =>  'sel_getsource')));
	}





/**
**name CAutoTest::seleniumExec($args)
**description Runs a command on the HTTP2SeleniumBridge.
**parameter args: Array with the arguments.
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
	private function seleniumExec($args)
	{
		if (!isset($args['type']))
			dieWithExitCode('ERROR: CAutoTest::seleniumExec: No type given!', 7);
	
		// Remove 'sel_' from the begin of the type (in this class the types are marked with 'sel_' but HTTP2SeleniumBridge needs them without)
		$args['type'] = str_replace ('sel_', '', $args['type']);

		$url = TEST_SELENIUM_URL."/run?cmd=$args[type]";

		// ID or name have to be given for most commands somewhere in the argument list
		$nameOrIDGiven = (($args['type'] == 'getsource') || ($args['type'] == 'open') || ($args['type'] == 'reload'));

		// Run thru the given arguments and add them
		foreach ($args as $var => $val)
		{
			// Skip it here, because it was handled before
			if ('type' == $var) continue;
			
			$val = urlencode($val);
		
			if (!$nameOrIDGiven)
				$nameOrIDGiven = (($var == 'ID') || ($var == 'name'));
	
			$url .= "&$var=$val";
		}

		// Append the driver id
		$url .= "&driverid=".$this->getSeleniumDriverID();

		// If no
		if (!$nameOrIDGiven)
			dieWithExitCode('ERROR: CAutoTest::seleniumExec: No ID or name given!', 8);

		$this->debugPrint($url, 'seleniumExec(URL)');
		return(HELPER_getContentFromURL($url, '', false));
	}





/**
**name CAutoTest::seleniumExecExtra($action, $args = array())
**description Runs an action on the HTTP2SeleniumBridge.
**parameter action: Name of the action (eg. nextdriverid or free)
**parameter args: Array with the arguments.
**returns HTTP output of the HTTP2SeleniumBridge call.
**/
	private function seleniumExecExtra($action, $args = array())
	{
		$url = TEST_SELENIUM_URL."/$action";

		$glue = '?';

		// Run thru the given arguments and add them
		foreach ($args as $var => $val)
		{
			$val = urlencode($val);

			$url .= "$glue$var=$val";
			$glue = '&';
		}

		$this->debugPrint($url, 'seleniumExecExtra(URL)');

		return(HELPER_getContentFromURL($url, '', false));
	}





/**
**name CAutoTest::gotSeleniumDriverID()
**description Returnes true, if a Selenium webdriver ID was acquired.
**returns true, if a Selenium webdriver ID was acquired, otherwise false.
**/
	private function gotSeleniumDriverID()
	{
		return(!is_null($this->driverID));
	}





/**
**name CAutoTest::getSeleniumDriverID()
**description Gives the Selenium webdriver ID this instance should use or let the programm die, if all are used.
**returns Selenium webdriver ID.
**/
	private function getSeleniumDriverID()
	{
		if (!$this->gotSeleniumDriverID())
		{
			$this->driverID = $this->seleniumExecExtra('nextdriverid');
			if ($this->driverID == '-1')
				dieWithExitCode('ERROR: No free Selenium webdrivers available', 9);
			elseif ($this->driverID === false)
				dieWithExitCode('ERROR: Selenium (VM) does not answer', 10);
		}

		return($this->driverID);
	}





/**
**name CAutoTest::freeSeleniumDriverID()
**description Frees the used Selenium webdriver ID.
**/
	private function freeSeleniumDriverID()
	{
		if ($this->gotSeleniumDriverID())
			echo($this->seleniumExecExtra('free', array('driverid' => $this->getSeleniumDriverID()))."\n");
	}





/**
**name CAutoTest::seleniumGetStatus()
**description Gets the status message(s) of the HTTP2SeleniumBridge.
**returns Status message(s) of the HTTP2SeleniumBridge call.
**/
	private function seleniumGetStatus()
	{
		return(HELPER_getContentFromURL(TEST_SELENIUM_URL."/status", '', false));
	}





/**
**name CAutoTest::seleniumHostRunning()
**description Checks, if the HTTP2SeleniumBridge is running.
**returns true, if the HTTP2SeleniumBridge is running, otherwise false.
**/
	private function seleniumHostRunning()
	{
		return(HELPER_grepCount($this->seleniumGetStatus(), 'commands_executed') > 0);
	}





/**
**name CAutoTest::parseAnswersFromXML($xmlO, $goodWarnBad)
**description Parses an (good, warn, bad) array from the XML.
**parameter xmlO: Prased XML structure pointing to the array.
**parameter goodWarnBad: Answer type (CAutoTest::GWB_GOOD, GWB_WARN or GWB_BAD).
**returns Associative array with the good, warn or bad answers, how to fetch the answer from the client/webbrowser/etc. and the answer type (GWB_GOOD, GWB_WARN or GWB_BAD).
**/
	private function parseAnswersFromXML($xmlO, $goodWarnBad)
	{
		$out = array();

		$i = 0;
		// Check, for parameters that are defined in the XML file.
		while (($xmlO[$i] !== NULL) && ($xmlO[$i]['type'] !== NULL))
		{
			$out[$i]['text'] = utf8_decode($xmlO[$i]);									// eg. Kernel was load sucessfully
			$out[$i]['fetchType'] = $this->triggerTypeToConstant($xmlO[$i]['type']);	// eg. ocr
			$out[$i]['answerType'] = $goodWarnBad;										// eg. CAutoTest::GWB_GOOD
			$out[$i]['setVar'] = (string)$xmlO[$i]['setVar'];							// eg. INT_deleteClient=0
			$out[$i]['description'] = (string)$xmlO[$i]['description'];					// eg. Test for loading kernel
			$out[$i]['password'] = (string)$xmlO[$i]['password'];						// eg. test

			// If the attribute "sshanswer" is set, it will be used as wanted answer instead of the HTML parameter (eg. <bad type="ssh_commandoutput" ...)
			if ($xmlO[$i]['sshanswer'] !== NULL)
			{
				if (strpos($out[$i]['text'], "'") !== false)
					die('ERROR: Answer contains disallowerd "\'": '.$out[$i]['text']."\n");
			
				$out[$i]['cmd'] = $out[$i]['text'];
				$out[$i]['text'] = utf8_decode($xmlO[$i]['sshanswer']);
			}
			elseif ($xmlO[$i]['cmd'] !== NULL)
				die('ERROR: Contains outdated "cmd" attribute: '.urldecode(utf8_decode($xmlO[$i]['cmd']))."\n");
			else
				$out[$i]['cmd'] = '';

			$i++;
		}

		return($out);
	}





/**
**name CAutoTest::parseXML($xmlFile, $argv)
**description Parses the XML test description file.
**parameter xmlFile: File name (with full path) of the XML test description file.
**parameter argv: Array with the command line parameters.
**/
	private function parseXML($xmlFile, $argv)
	{
		if (!file_exists($xmlFile))
			dieWithExitCode("Test description file \"$xmlFile\" does not exist!", 11);

		$xmlO = $this->loadXMLFile($xmlFile);

		$hasErrors = false;
		// The name of the XML test description file is the 1st part of the info string
		$helpText = $argv[0];

		$i = 0;

		// Run thru the CLI parameters defined in the XML file and try to get their according values from the command line
		foreach ($xmlO[0]->cli[0] as $paramName => $val)
		{
			// Get the constant name for the parameter and its description
			$paramName = (string)$paramName;
			$paramDescr = (string)$val[0]['description'];

			// Append the parameter description to the help text
			$helpText .= " <$paramDescr>";

			// Check if there is a value for the current parameter given on the command line
			if (isset($argv[$i+1]))
				$this->variables[$paramName] = $argv[$i+1];
			else
				$hasErrors = true;

			$i++;
		}
		
		if ($hasErrors)
			dieWithExitCode("$helpText\n", 12);

		// Parse the global constants
		$this->internalValuesFromXML($xmlO);

		// Fill machine based variables
		switch (strtolower(TEST_TYPE))
		{
			case 'vm':
				$this->environment = CAutoTest::ENVIRONMENT_VM;
			break;
			case 'webinterface':
				$this->environment = CAutoTest::ENVIRONMENT_WEBINTERFACE;
			break;
			case 'xmltest':
				$this->environment = CAutoTest::ENVIRONMENT_XMLTEST;
			break;
			default:
				dieWithExitCode('Unknown machine type!', 13);
		}


		$i = 0;
		// Check, for CLI parameters that are defined in the XML file.
		while ($xmlO->sequence->test[$i] !== NULL)
		{
			$testDescription = $this->setVariableFromXML($xmlO->sequence->test[$i]['description'], "description of test $i");
			$testTimeout = $this->setVariableFromXML($xmlO->sequence->test[$i]['timeout'], "$testDescription: timeout");
			$runIf = (string)$xmlO->sequence->test[$i]['runIf'];

			// Trigger
			$this->parseTriggerFromXML($xmlO->sequence->test[$i]->trigger, $testDescription, $testTrigger, $testTriggerType, $testTriggerAttributes);

			// Action
 			$this->parseActionFromXML($xmlO->sequence->test[$i]->action, $testDescription, $testAction, $testActionType, $testActionAttributes);

			// Result arrays
			$goodA = $this->parseAnswersFromXML($xmlO->sequence->test[$i]->good, CAutoTest::GWB_GOOD);
			$warnA = $this->parseAnswersFromXML($xmlO->sequence->test[$i]->warn, CAutoTest::GWB_WARN);
			$badA = $this->parseAnswersFromXML($xmlO->sequence->test[$i]->bad, CAutoTest::GWB_BAD);
			$answersA = array_merge($badA, $goodA, $warnA);

			// Add the parsed values to the sequence
			$this->addToSequence($testTriggerType, $testTrigger, $answersA, $testActionType, $testAction, $testActionAttributes, $testTimeout, $testDescription, $testTriggerAttributes, $runIf);

			$i++;
		}
	}





	public function run()
	{
		AUTOTEST_VM_hostSanityCheck();

		while ($this->curElementNr < $this->sequenceSize)
		{
			// Skip the element, if the runIf condition is not met
			if (!$this->evaluateRunIf())
				$this->nextCurElement();
			else
			{
				if ($this->isTriggered())
					$this->checkTriggerResult();
				else
					$this->waitForTrigger();
	
				sleep(CAutoTest::RUN_LOOP_SLEEP);
			}
		}
	}
}


?>