<?php

class CMessageManager
{
	private $errorMessagesHTML = '', $errorsFound = false, $infoMessagesHTML = '', $infosFound = false, $warningMessagesHTML = '', $warningsFound = false;





/**
**name CMessageManager::addMessage($msg, &$msgVar, &$foundVar)
**description Generic function for adding a message to a message stack.
**parameter msg: Error message to add.
**parameter msgVar: The reference to the variable where the massages should be stored.
**parameter foundVar: The reference to the variable that should be set to true when there are messages in the given stack.
**/
	private function addMessage($msg, &$msgVar, &$foundVar)
	{
		//Check, if there is a message
		if (isset($msg{1}))
		{
			//Check, if the input message is imported from popErrorMessagesHTML().
			if (0 === strpos ($msg,'&bull;'))
				$msgVar .= "$msg\n";
			else
				$msgVar .= "&bull; $msg</br>\n";
			$foundVar = true;
		}
	}





/**
**name CMessageManager::addInfoMessage
**description Adds an info message to the info message stack and sets the info flag.
**parameter msg: Info message to add.
**/
	public function addInfoMessage($msg)
	{
		$this->addMessage($msg, $this->infoMessagesHTML, $this->infosFound);
	}





/**
**name CMessageManager::addWarningMessage($msg)
**description Adds a warning message to the warning message stack and sets the warning flag.
**parameter msg: Warning message to add.
**/
	public function addWarningMessage($msg)
	{
		$this->addMessage($msg, $this->warningMessagesHTML, $this->warningsFound);
	}





/**
**name CMessageManager::addErrorMessage($msg)
**description Adds an error message to the error message stack and sets the error flag.
**parameter msg: Error message to add.
**/
	public function addErrorMessage($msg)
	{
		$this->addMessage($msg, $this->errorMessagesHTML, $this->errorsFound);
	}





/**
**name CMessageManager::popInfoMessagesHTML()
**description Returns all info messages and deletes the info message stack.
**returns msg: The complete info message stack.
**/
	public function popInfoMessagesHTML()
	{
		$temp = $this->infoMessagesHTML;
		$this->infoMessagesHTML = '';
		$this->infosFound = false;
		return($temp);
	}





/**
**name CMessageManager::popWarningMessagesHTML()
**description Returns all warning messages and deletes the warning message stack.
**returns msg: The complete warning message stack.
**/
	public function popWarningMessagesHTML()
	{
		$temp = $this->warningMessagesHTML;
		$this->warningMessagesHTML = '';
		$this->warningsFound = false;
		return($temp);
	}





/**
**name CMessageManager::popErrorMessagesHTML()
**description Returns all error messages and deletes the error message stack.
**returns msg: The complete error message stack.
**/
	public function popErrorMessagesHTML()
	{
		$temp = $this->errorMessagesHTML;
		$this->errorMessagesHTML = '';
		$this->errorsFound = false;
		return($temp);
	}





/**
**name CMessageManager::deleteAllMessages()
**description Deletes all messages from the message stack.
**/
	public function deleteAllMessages()
	{
		$this->errorMessagesHTML = '';
		$this->errorsFound = false;
		$this->warningMessagesHTML = '';
		$this->warningsFound = false;
		$this->infoMessagesHTML = '';
		$this->infosFound = false;
	}





/**
**name CMessageManager::hasInfos()
**description Returns if there are infos.
**returns true, if there have infos been occurred otherwise false.
**/
	public function hasInfos()
	{
		return($this->infosFound);
	}





/**
**name CMessageManager::hasWarnings()
**description Returns if there are warnings.
**returns true, if there have warnings been occurred otherwise false.
**/
	public function hasWarnings()
	{
		return($this->warningsFound);
	}





/**
**name CMessageManager::hasErrors()
**description Returns if there are errors.
**returns true, if there have errors been occurred otherwise false.
**/
	public function hasErrors()
	{
		return($this->errorsFound);
	}





/**
**name CMessageManager::showInfo()
**description Shows existing info messages in an info box if there are any.
**returns true, if there have info been occurred otherwise false.
**/
	public function showInfo()
	{
		if ($this->infosFound)
			MSG_showInfo($this->infoMessagesHTML);
		return($this->infosFound);
	}





/**
**name CMessageManager::showWarning()
**description Shows (hopefully not) existing warning messages in a warning box if there are any.
**returns true, if there have warnings been occurred otherwise false.
**/
	public function showWarning()
	{
		if ($this->warningsFound)
			MSG_showWarning($this->warningMessagesHTML);
		return($this->warningsFound);
	}





/**
**name CMessageManager::showError()
**description Shows (hopefully not) existing error messages in an error box if there are any.
**returns true, if there have errors been occurred otherwise false.
**/
	public function showError()
	{
		if ($this->errorsFound)
			MSG_showError($this->errorMessagesHTML);
		return($this->errorsFound);
	}





/**
**name CMessageManager::showMessages()
**description Shows all existing messages in the according boxes.
**returns true, if there have errors or warnings been occurred otherwise false.
**/
	public function showMessages()
	{
		$ret = false;
		$ret |= $this->showError();
		$ret |= $this->showWarning();
		$this->showInfo();
		return((bool)$ret);
	}

}

?>