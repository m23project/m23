<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for test automation.
$*/

class CAutoTest
{

	// Trigger type
	const TRIGGER_OCR = 101;			// Read the VM's screen with OCR
	const TRIGGER_SEL = 102;			// Result of selenium run

	// Execution type
	const EXEC_KEY = 201;				// Emulate keyboard strokes into the VM
	const EXEC_SEL = 202;				// Run selenium
	const EXEC_FKT = 203;				// Run a function
	

	// Environment type
	const ENVIRONMENT_VM = 301;			// Run the tests in VM
	const ENVIRONMENT_HW = 302;			// Run the tests on real hardware

	// Sequence array index descriptor constants
	const SEQIDX_TRIGGERTYPE	= 401;
	const SEQIDX_TRIGGERPARAM	= 402;
	const SEQIDX_GOODA			= 403;
	const SEQIDX_WARNA			= 404;
	const SEQIDX_BADA			= 405;
	const SEQIDX_EXECTYPE		= 406;
	const SEQIDX_EXECPARAM		= 407;
	const SEQIDX_TIMEOUT		= 408;
	const SEQIDX_DESCRIPTION	= 409;
	const SEQIDX_ANSWERS		= 410;

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
			$machine = NULL,
			$environment = NULL,
			$timeout = NULL,
			$triggered = false,
			$VM_ram,
			$VM_hdsize,
			$iso = NULL;






/**
**name CClient::__construct($in, $checkMode = CClient::CHECKMODE_NORMAL)
**description Constructor for new CClient objects. The object holds all information about a single client and loads the values from the DB.
**parameter in: ID of an existing client (to load), name of an existing or nonexisting (to create) client or associative array of parameters.
**parameter checkMode: Check for the input variable.
**/
	public function __construct($xmlFile, $argv)
	{
/*		$this->environment = $environment;
		$this->machine = $machine;*/
		
		$this->parseXML($xmlFile, $argv);
		$this->readSettings();
	}





/**
**name CAutoTest::readAndDefineOrDieXML($constant, $val)
**description Checks, is a given variable has a value that is not NULL (it was read via XML) or let the programm die with an error.
**parameter constant: Name of the constant to define.
**parameter val: Value read from the XML to check.
**/
	private function readAndDefineOrDieXML($constant, $val)
	{
		if ($val == NULL) die('Error: '.$constant.' not set');
		define($constant, $val);
	}





/**
**name CAutoTest::readSettings()
**description Reads basic settings from settings.m23test and sets them as constants.
**/
	private function readSettings()
	{
		$xmlO = new SimpleXMLElement(file_get_contents('settings.m23test'));

		$this->readAndDefineOrDieXML('TEST_VBOX_HOST', $xmlO->vbox->TEST_VBOX_HOST);
		$this->readAndDefineOrDieXML('TEST_VBOX_USER', $xmlO->vbox->TEST_VBOX_USER);
		$this->readAndDefineOrDieXML('TEST_VBOX_NETDEV', $xmlO->vbox->TEST_VBOX_NETDEV);
		$this->readAndDefineOrDieXML('TEST_VBOX_IMAGE_DIR', $xmlO->vbox->TEST_VBOX_IMAGE_DIR);
	}





/**
**name CAutoTest::VMCreate()
**description Creates a new VM with virtual hard drive in VirtualBox and (optionally) inserts a bootable ISO into a VM.
**/
	private function VMCreate()
	{
		if (!$this->isVM())
			return(false);

		// Create the VM
		AUTOTEST_VM_create($this->getMachine(), $this->getVM_hdsize(), $this->getVM_ram(), $VMCreationMessage);

		// Enable capturing
		AUTOTEST_VM_enableCapture($this->getMachine(), $this->getMovieFileName(), $VMenableCaptureMessage);

		// Insert an ISO (if given)
		if (NULL !== $this->getISO())
			AUTOTEST_VM_insertBootISO($this->getMachine(), $this->getISO(), $VMinsertBootISOMessage);
	}





/**
**name CAutoTest::VMStart()
**description Starts a virtual machine in an existing X session.
**/
	private function VMStart()
	{
		if (!$this->isVM())
			return(false);

		AUTOTEST_VM_start($this->getMachine(), $VMStartMessage);
	}





/**
**name CAutoTest::setISO($isoFile)
**description Sets the filename and path of the ISO image for booting.
**parameter isoFile: Filename and path of the ISO image for booting.
**/
	private function setISO($isoFile)
	{
		if (!file_exists($isoFile))
			die("ISO file \"$isoFile\" does not exist!");
		$this->iso = $isoFile;
	}





/**
**name CAutoTest::getISO()
**description Get the filename and path to the ISO image for booting.
**returns Filename and path to the ISO image for booting.
**/
	private function getISO()
	{
		return($this->iso);
	}





/**
**name CAutoTest::isVM()
**description Check, if the the test should be run in a VM.
**returns true, when the test should be run in a VM, otherwise false.
**/
	private function isVM()
	{
		return(CAutoTest::ENVIRONMENT_VM == $this->environment);
	}





/**
**name CAutoTest::getVM_hdsize()
**description Get the hard disk size of the virtual machine (to create).
**returns Hard disk size of the VM.
**/
	private function getVM_hdsize()
	{
		return($this->VM_hdsize);
	}





/**
**name CAutoTest::getVMRam()
**description Get the ram size of the virtual machine (to create).
**returns Ram size of the VM.
**/
	private function getVM_ram()
	{
		return($this->VM_ram);
	}





/**
**name CAutoTest::getMachine()
**description Get the name of the (real or virtual) machine, the test is run on.
**returns Name of the (real or virtual) machine, the test is run on.
**/
	private function getMachine()
	{
		return($this->machine);
	}





/**
**name CAutoTest::getMovieFileName()
**description Get the movie file name for capturing the VM's screen.
**returns Movie file name (with full path) for capturing the VM's screen.
**/
	private function getMovieFileName()
	{
		return(TEST_VBOX_IMAGE_DIR.'/vbox/'.$this->machine.'.webm');
	}





/**
**name CAutoTest::getLogFileName()
**description Get the file name for the log file.
**returns Log file name (with full path).
**/
	private function getLogFileName()
	{
		return(TEST_VBOX_IMAGE_DIR.'/vbox/'.$this->machine.'-autoTest.log');
	}





/**
**name CAutoTest::addToLogFile($lines)
**description Appends lines to the log file.
**parameter lines: The lines to add.
**/
	private function addToLogFile($lines)
	{
		file_put_contents( $this->getLogFileName(), $lines , FILE_APPEND);
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
			$this->elemWarn('Timeout');
		elseif ($this->timeout < -CAutoTest::TIMEOUT_OVER_BAD)
			$this->elemWarn('Timeout');
	}





/**
**name CAutoTest::addToSequence($triggerType, $triggerParam, $answersA, $execType, $execParam, $timeout, $description)
**description Adds an element to the sequence.
**parameter triggerType: Type of the trigger (CAutoTest::TRIGGER_*) or the type event, that should happen to begin with the given element of the sequence.
**parameter triggerParam: Parameter for the trigger (e.g. string that should be read from the screen when in CAutoTest::TRIGGER_OCR mode).
**parameter answersA: Associative array with the answers and parameters.
**parameter execType: Type of action (CAutoTest::EXEC_*), that will be executed when the trigger is hit.
**parameter execParam: Parameter for the action (e.g. keys to press, when in CAutoTest::EXEC_KEY mode).
**parameter timeout: Time to wait (in seconds) until the element of sequence will become a failure.
**parameter description: Description for the test.
**/
	public function addToSequence($triggerType, $triggerParam, $answersA, $execType, $execParam, $timeout, $description)
	{
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_TRIGGERTYPE] = $triggerType;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_TRIGGERPARAM] = $triggerParam;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_ANSWERS] = $answersA;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_EXECTYPE] = $execType;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_EXECPARAM] = $execParam;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_TIMEOUT] = $timeout;
		$this->sequence[$this->sequenceSize][CAutoTest::SEQIDX_DESCRIPTION] = $description;
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
**name CAutoTest::checkTriggerResult()
**description Checks, if the result (e.g. from AUTOTEST_VM_ocrScreen) is found in the good, warn or bad array and executes the matching element finish handler.
**/
	private function checkTriggerResult()
	{
		// Get the answer array
		$answersA = $this->getAnswersA();

		// Cache the OCR result of the captured VM screen
		$ocr = AUTOTEST_VM_ocrScreen($this->getMachine());

		// Run thru the possible answers
		foreach ($answersA as $answer)
		{
			// From where does the input value to compare with the possible answers come?
			switch ($answer['fetchType'])
			{
				case CAutoTest::TRIGGER_OCR:
					$in = $ocr;
				break;
			}

			// Is the answer a good, warning or bad answer and does it match=
			switch ($answer['answerType'])
			{
				case CAutoTest::GWB_GOOD:
					if (strpos($in, $answer['text']) !== FALSE)
						$this->elemOk($answer['text']);
				break;
				case CAutoTest::GWB_WARN:
					if (strpos($in, $answer['text']) !== FALSE)
						$this->elemWarn($answer['text']);
				break;
				case CAutoTest::GWB_BAD:
					if (strpos($in, $answer['text']) !== FALSE)
						$this->elemBad($answer['text']);
				break;
			}
		}
		$this->decTimeout();
	}





/**
**name CAutoTest::executeTriggerAction()
**description Executes the action of the current sequence element.
**/
	private function executeTriggerAction()
	{
		$i = 0;
		$execTypes = $this->getExecTypes();
		$execParams = $this->getExecParams();

		while (isset($execTypes[$i]))
		{
			$execParam = $execParams[$i];
			
			switch ($execTypes[$i])
			{
				case CAutoTest::EXEC_KEY:
					AUTOTEST_VM_keyboardWrite($this->getMachine(), $execParam);
				break;
				case CAutoTest::EXEC_FKT:
					AUTOTEST_executePHPFunction($this->getMachine(), $execParam);
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
		$ocr = AUTOTEST_VM_ocrScreen($this->getMachine());

		while (isset($triggerTypes[$i]))
		{
			$triggerType = $triggerTypes[$i];
			$triggerParam = $triggerParams[$i];

			switch ($triggerType)
			{
				case CAutoTest::TRIGGER_OCR:
					if (substr_count($ocr, $triggerParam) > 0)
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
	}





/**
**name CAutoTest::showAndLogMessage($msg, $prefix = '')
**description Shows a message and logs it to the log file.
**parameter msg: Message to show in the console and the log file.
**parameter prefix: A prefix show before the message to indicate the type of the message.
**/
	private function showAndLogMessage($msg, $prefix = '')
	{
		// Check, if the message is given as array (use 1st element) or as string (use directly).
		$msg = (is_array($msg) ? $msg[0] : $msg);

		// Add the timestamp, a (possibly existing) prefix and the message itself to the output message
		$msg = $this->getTimestampString()."\n".$prefix.$msg."\n";

		// Add the message to the log file
		$this->addToLogFile($msg);

		// Show it in the console
		echo($msg);
	}





/**
**name CAutoTest::elemOk($msg)
**description The current sequence elements was finished sucessfully.
**parameter msg: Message to show in the console and the log file.
**/
	private function elemOk($msg)
	{
		$this->showAndLogMessage($msg, "OK: ");
		$this->nextCurElement();
	}





/**
**name CAutoTest::elemWarn($msg)
**description The current sequence elements was finished with a warning.
**parameter msg: Message to show in the console and the log file.
**/
	private function elemWarn($msg)
	{
		$this->showAndLogMessage($msg, "WARN: ");
		$this->nextCurElement();
	}





/**
**name CAutoTest::elemBad($msg)
**description There was an error in the current sequence element, so the execution must bestopped.
**parameter msg: Message to show in the console and the log file.
**/
	private function elemBad($msg)
	{
		$this->showAndLogMessage($msg, "ERROR: ");
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
			die("Needed parameter \"$descr\" could not read from the test description file!");
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
			case 'selenium':
				return(CAutoTest::TRIGGER_SEL);
			default:
				die('Unknown trigger type: '.$type);
		}
	}





/**
**name CAutoTest::parseTriggerFromXML($xmlO, $testDescription, &$testTrigger, &$testTriggerType)
**description Parses the trigger and its type from the XML.
**parameter xmlO: Prased XML structure pointing to the trigger.
**parameter testDescription: Description of the test.
**parameter testTrigger: Trigger parameter. (Result is written to this pointer)
**parameter testTriggerType: Trigger type. (Result is written to this pointer)
**/
	private function parseTriggerFromXML($xmlO, $testDescription, &$testTrigger, &$testTriggerType)
	{
		$testTrigger = $testTriggerType = array();
		$i = 0;

		$temp = $this->setVariableFromXML($xmlO, "$testDescription: trigger");

		while ($xmlO[$i] !== NULL)
		{
			$curElem = $xmlO[$i];

			$testTrigger[$i] = utf8_decode($this->setVariableFromXML($curElem, "$testDescription: trigger"));
			$testTriggerType[$i] = $this->triggerTypeToConstant($this->setVariableFromXML($curElem['type'], "$testDescription: trigger type"));

			$i++;
		}
	}





/**
**name CAutoTest::parseActionFromXML($xmlO, $testDescription, &$testAction, &$testActionType)
**description Parses the action and its type from the XML.
**parameter xmlO: Prased XML structure pointing to the action.
**parameter testDescription: Description of the test.
**parameter testAction: Action parameter. (Result is written to this pointer)
**parameter testActionType: Action type. (Result is written to this pointer)
**/
	private function parseActionFromXML($xmlO, $testDescription, &$testAction, &$testActionType)
	{
		$testAction = $testActionType = array();
		$i = 0;

		$temp = $this->setVariableFromXML($xmlO, "$testDescription: action");

		while ($xmlO[$i] !== NULL)
		{
			$curElem = $xmlO[$i];

			$testAction[$i] = utf8_decode($this->setVariableFromXML($curElem, "$testDescription: action"));
			$testActionType[$i] = strtolower(utf8_decode($this->setVariableFromXML($curElem['type'], "$testDescription: action type")));

			// Try to convert the action type
			switch ($testActionType[$i])
			{
				case 'key':
					$testActionType[$i] = CAutoTest::EXEC_KEY;
				break;

				case 'selenium':
					$testActionType[$i] = CAutoTest::EXEC_SEL;
				break;

				case 'fkt':
					$testActionType[$i] = CAutoTest::EXEC_FKT;
				break;

				default:
					die('Unknown action type: '.$testActionType[$i]);
			}
			$i++;
		}
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
			$out[$i]['text'] = utf8_decode($xmlO[$i]);									// e.g. Kernel was load sucessfully
			$out[$i]['fetchType'] = $this->triggerTypeToConstant($xmlO[$i]['type']);	// e.g. ocr
			$out[$i]['answerType'] = $goodWarnBad;										// e.g. CAutoTest::GWB_GOOD
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
			die("Test description file \"$xmlFile\" does not exist!");
	
		$xmlO = new SimpleXMLElement(file_get_contents($xmlFile));

		$hasErrors = false;
		$helpText = $argv[0]; //.' <test description file>';

		$i = 0;
		// Check, for CLI parameters that are defined in the XML file.
		while ($xmlO->machine->cliparam[$i] !== NULL)
		{
			$paramName = $xmlO->machine->cliparam[$i];
			$paramDescr = $xmlO->machine->cliparam[$i]['description'];

			// Add the new description to the 
			$helpText .= " <$paramDescr>";

			// Check, if there is given a CLI parameter for the definition in the XML file
			if (isset($argv[$i+1]))
			{
				switch ($paramName)
				{
					case 'vmname':
						$this->machine = $argv[$i+1];
					break;
					case 'iso':
						$this->setISO($argv[$i+1]);
					break;
					default:
						$hasErrors = true;
				}
			}
			else
				$hasErrors = true;

			$i++;
		}

		if ($hasErrors)
			die("$helpText\n");


		// Fill machine based variables
		switch (strtolower($xmlO->machine->type))
		{
			case 'vm':
				$this->environment = CAutoTest::ENVIRONMENT_VM;

				$this->VM_ram = $this->setVariableFromXML($xmlO->machine->ram, 'ram');
				$this->VM_hdsize = $this->setVariableFromXML($xmlO->machine->hdsize, 'hdsize');
			break;
			default:
				die('Unknown machine type!');
		}


		$i = 0;
		// Check, for CLI parameters that are defined in the XML file.
		while ($xmlO->sequence->test[$i] !== NULL)
		{
			$testDescription = $this->setVariableFromXML($xmlO->sequence->test[$i]['description'], "description of test $i");
			$testTimeout = $this->setVariableFromXML($xmlO->sequence->test[$i]['timeout'], "$testDescription: timeout");

			// Trigger
			$this->parseTriggerFromXML($xmlO->sequence->test[$i]->trigger, $testDescription, $testTrigger, $testTriggerType);

			// Action
 			$this->parseActionFromXML($xmlO->sequence->test[$i]->action, $testDescription, $testAction, $testActionType);

			// Result arrays
			$goodA = $this->parseAnswersFromXML($xmlO->sequence->test[$i]->good, CAutoTest::GWB_GOOD);
			$warnA = $this->parseAnswersFromXML($xmlO->sequence->test[$i]->warn, CAutoTest::GWB_WARN);
			$badA = $this->parseAnswersFromXML($xmlO->sequence->test[$i]->bad, CAutoTest::GWB_BAD);
			$answersA = array_merge($goodA, $warnA, $badA);

			// Add the parsed values to the sequence
			$this->addToSequence($testTriggerType, $testTrigger, $answersA, $testActionType, $testAction, $testTimeout, $testDescription);

			$i++;
		}
	}





	public function run()
	{
		$this->VMCreate();
		$this->VMStart();
	
		while ($this->curElementNr < $this->sequenceSize)
		{
			if ($this->isTriggered())
				$this->checkTriggerResult();
			else
				$this->waitForTrigger();

			sleep(CAutoTest::RUN_LOOP_SLEEP);
		}
	}
}


?>