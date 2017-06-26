<?

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for storing PHP objects in the database.
$*/

class CObjectStorage extends CObjectStorageManager
{
	const COSSTATUS_error = -2;
	const COSSTATUS_unimplemented = -1;
	const COSSTATUS_idle = 0;
	const COSSTATUS_paused = 1;
	const COSSTATUS_running = 2;
	const COSSTATUS_waiting = 4;





/**
**name CObjectStorage::statusCodeToHumanReadable($code)
**description Translates a status code (COSSTATUS_*) into human readable word(s).
**parameter code: The status code (COSSTATUS_*).
**returns Human readable word(s) representing the status code.
**/
	static public function statusCodeToHumanReadable($code)
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		switch ($code)
		{
			case CObjectStorage::COSSTATUS_error: return($I18N_error);
			case CObjectStorage::COSSTATUS_unimplemented: return($I18N_COSSunimplemented);
			case CObjectStorage::COSSTATUS_idle: return($I18N_COSSidle);
			case CObjectStorage::COSSTATUS_paused: return($I18N_COSSpaused);
			case CObjectStorage::COSSTATUS_running: return($I18N_COSSrunning);
			case CObjectStorage::COSSTATUS_waiting: return($I18N_waiting);
			default: return('unknown');
		}
	}





/**
**name CObjectStorage::__construct($ident, $classOrObject)
**description Constructor for new CObjectStorage objects. The object saves/updates or loads an object.
**parameter ident: Identifier for objects belonging to e.g. a client.
**parameter classOrObject: Class name of the object or the object itself.
**parameter readFromDBIfObjectExists: Set to true, if an existing object should read from the DB, even if an object is given.
**/
	public function __construct($ident, $classOrObject, $readFromDBIfObjectExists = false)
	{
		CHECK_FW(CC_COSident, $ident);

		//Check, if an object is given and a it should be tried to read a maybe existing object with the same identifier and class from the DB
		if ($readFromDBIfObjectExists && is_object($classOrObject))
		{
			//Figure out the class of the object
			$class = get_class($classOrObject);

			//Try to get a matching object
			$object = $this->getByIdentClass($ident, $class);
			if (is_object($object))
			{
				$this->object = $object;
				$this->ident = $ident;
				return(true);
			}
		}

		//If the input value is an object => store it
		if (is_object($classOrObject))
		{
			$this->saveObject($ident, $classOrObject);
			$this->object = $classOrObject;
			$this->ident = $ident;
		}
		//If the input value is a string => load the object matching class and identifier
		elseif (is_string($classOrObject))
		{
			$this->object = $this->getByIdentClass($ident, $classOrObject);
			$this->ident = $ident;
		}
	}





/**
**name CObjectStorage::__destruct()
**description Destructor for storing changed values of the object back to the DB.
**/
	function __destruct()
	{
		$this->saveObject($this->ident, $this->object);
	}






/**
**name CObjectStorage::getObject()
**description Gets the object.
**returns object.
**/
	public function getObject()
	{
		return($this->object);
	}





/**
**name CObjectStorage::destroy()
**description Destroys the 
**returns Human readable status.
**/
	public function destroy()
	{
		return($this->deleteObject($this->ident, $this->object));
	}
}
?>