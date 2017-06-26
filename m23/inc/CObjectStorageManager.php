<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for storing PHP objects in the database.
$*/

class CObjectStorageManager extends CChecks
{
	private $searchFilter = '', $foundObjects = array();





/**
**name CObjectStorageManager::saveObject($ident, $object)
**description Saves or updates an object in the DB.
**parameter ident: Identifier for objects belonging to e.g. a client.
**parameter object: The object to store/update for the Identifier.
**/
	protected function saveObject($ident, $object)
	{
		CHECK_FW(CC_COSident, $ident);

		if (!is_object($object))
			die('ERROR: addObject: No object given');

		//Get the class of the object and make the serialised object safe
		$class = get_class($object);
		$sObject = CHECK_text2db(serialize($object));
		
		$last_modified = time();
	
		//Try to insert a new object
		$ret = DB_queryNoDie("INSERT INTO PHPObjectStorage (`ident` , `class` , `object`, `last_modified`) VALUES ( '$ident', '$class', '$sObject', '$last_modified');");
		
		//If it could not be inserted => Try to update the record
		if ($ret === false)
			$ret = DB_query("UPDATE PHPObjectStorage SET `object` = '$sObject', `last_modified` = '$last_modified' WHERE `ident` = '$ident' AND `class` = '$class';");
	}





/**
**name CObjectStorageManager::getAllObjectsByRes($res)
**description Fetches all objects from the DB that can be read via the given MySQL ressource ID.
**parameter res: MySQL ressource ID.
**returns Array with all matching objects.
**/
	private function getAllObjectsByRes($res)
	{
		$i = 0;
		$this->foundObjects = array();
		while ($line = mysqli_fetch_assoc($res))
		{
			$this->foundObjects[$i] = unserialize(CHECK_db2text($line['object']));
			$this->getObjectMethodReturnValue($this->foundObjects[$i], 'runCOSLoop', 0);
			$this->saveObject($line['ident'], $this->foundObjects[$i]);
			$i++;
		}

		return($this->foundObjects);
	}





/**
**name CObjectStorageManager::getByIdent($ident)
**description Fetches all objects from the DB that match an identifier.
**parameter ident: Identifier for objects belonging to e.g. a client.
**returns Array with all matching objects.
**/
	public function getByIdent($ident)
	{
		CHECK_FW(CC_COSident, $ident);
		$res = DB_query("SELECT object, ident FROM `PHPObjectStorage` WHERE `ident` = '$ident'");
		return($this->getAllObjectsByRes($res));
	}





/**
**name CObjectStorageManager::getByClass($class)
**description Fetches all objects from the DB that match a class.
**parameter class: Class name of the objects to find.
**returns Array with all matching objects.
**/
	public function getByClass($class)
	{
		CHECK_FW(CC_COSclass, $class);
		$res = DB_query("SELECT object, ident FROM `PHPObjectStorage` WHERE `class` = '$class'");
		return($this->getAllObjectsByRes($res));
	}





/**
**name CObjectStorageManager::getByIdentClass($ident, $class)
**description Fetches an object from the DB that match an identifier and a class.
**parameter ident: Identifier for objects belonging to e.g. a client.
**parameter class: Class name of the objects to find.
**returns Found object or null, if no matching object could be found.
**/
	public function getByIdentClass($ident, $class)
	{
		CHECK_FW(CC_COSclass, $class, CC_COSident, $ident);
		$res = DB_query("SELECT object, ident FROM `PHPObjectStorage` WHERE `class` = '$class' AND `ident` = '$ident'");
		$objects = $this->getAllObjectsByRes($res);
		
		if (is_object($objects[0]))
			return($objects[0]);
		else
			return(null);
	}





/**
**name CObjectStorageManager::deleteObject($ident, $object)
**description Deletes an object from the DB that match an identifier and a class (given by the object itself).
**parameter ident: Identifier for objects belonging to e.g. a client.
**parameter object: The object to delete.
**returns true, if it could be deleted. Otherwise false.
**/
	protected function deleteObject($ident, $object)
	{
		CHECK_FW(CC_COSident, $ident);

		if (!is_object($object))
			die('ERROR: deleteObject: $object NO valid object.');

		//Get the class of the object and make the serialised object safe
		$class = get_class($object);
		
		$res = DB_queryNoDie("DELETE FROM `PHPObjectStorage` WHERE `ident` = '$ident' AND `class` = '$class'");
		return($res !== false);
	}





/**
**name CObjectStorageManager::getObjectMethodReturnValue($object, $fkt, $error)
**description Checks, if an objects implements a method, calls it and returns the return value. If the method is unimplemented, an error value will be returned.
**parameter object: Object to use.
**parameter fkt: Name of the function (method)
**parameter error: Error value to return, if the method is unimplemented.
**returns Return value of the implemented method or given error value if unimplemented.
**/
	private function getObjectMethodReturnValue($object, $fkt, $error)
	{
		if ($object === null)
			die('ERROR: '.$fkt.': No object loaded!');

		if (method_exists( $object, $fkt))
			return($object->$fkt());
		else
			return($error);
	}





/**
**name CObjectStorageManager::getCOSStatus($object = null)
**description Gets the status code of the object.
**parameter object: Object to use or null, if $this->object should be used.
**returns Status code.
**/
	public function getCOSStatus($object = null)
	{
		if (!is_object($object))
			$object = $this->object;
		return($this->getObjectMethodReturnValue($object, 'getCOSStatus', CObjectStorage::COSSTATUS_unimplemented));
	}





/**
**name CObjectStorageManager::getCOSStatusHumanReadable($object = null)
**description Gets the human readable status of the object.
**parameter object: Object to use or null, if $this->object should be used.
**returns Human readable status.
**/
	public function getCOSStatusHumanReadable($object = null)
	{
		if (!is_object($object))
			$object = $this->object;
		return($this->getObjectMethodReturnValue($object, 'getCOSStatusHumanReadable', 'unknown'));
	}





/**
**name CObjectStorageManager::getCOSI18NVariable($object, $varPostfix, $errMsg)
**description Gets the contents of an I18N variable for the object (if it exists).
**parameter object: Object to use or null, if $this->object should be used.
**parameter varPostfix: String to add to the name of the I18N variable.
**parameter errMsg: Die message to display if the I18N variable is not set.
**returns Contents of the the I18N variable.
**/
	private function getCOSI18NVariable($object, $varPostfix, $errMsg)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		if (!is_object($object))
			$object = $this->object;

		//Build the I18N variable name from the class name with postfix
		$descriptionVariable = 'I18N_'.get_class($object).$varPostfix;

		//Get an array with all defined variables
		$allVars = get_defined_vars();

		//Check, if there is a matching variable for the class
		if (!isset($allVars[$descriptionVariable]))
			die("$errMsg $descriptionVariable");
		else
			return($allVars[$descriptionVariable]);
	}





/**
**name CObjectStorageManager::getCOSDescription($object = null)
**description Gets the description for a given object class.
**parameter object: Object to use or null, if $this->object should be used.
**returns Description of the given object class.
**/
	public function getCOSDescription($object = null)
	{
		return($this->getCOSI18NVariable($object, 'Description', 'ERROR: No description for'));
	}





/**
**name CObjectStorageManager::getCOSName($object = null)
**description Gets the (human readable) name for a given object class.
**parameter object: Object to use or null, if $this->object should be used.
**returns (human readable) name of the given object class.
**/
	public function getCOSName($object = null)
	{
		return($this->getCOSI18NVariable($object, 'Name', 'ERROR: No name for'));
	}





/**
**name CObjectStorageManager::showList()
**description Shows a list of existing objects matching criteria set by getBy* functions.
**/
	public function showList()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		HTML_showTableHeading($I18N_objectStorageObjectName, $I18N_description, $I18N_status/*, $I18N_action*/);
		foreach ($this->foundObjects as $object)
			HTML_showTableRow($this->getCOSName($object), $this->getCOSDescription($object), $this->getCOSStatusHumanReadable($object)/*, $this->getCOSStatus($object)*/);
	}
}
?>