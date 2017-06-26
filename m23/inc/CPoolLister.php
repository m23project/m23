<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Class for listing pools.
$*/

class CPoolLister extends CChecks
{
	const POOL_DIR = '/m23/data+scripts/pool';
	const POOL_TYPE_CD = 'cd';
	const POOL_TYPE_DOWNLOAD = 'download';
	const POOL_TYPE_USECLIENTDEBS = 'clientdebs';
	const POOL_ARCH_I386 = 'i386';
	const POOL_ARCH_AMD64 = 'amd64';





	/**
	**name CPoolLister::getPoolNames()
	**description returns an array with all pool names
	**returns Array with the all found pool names or empty array.
	**/
	static function getPoolNames()
	{
		@mkdir(CPoolLister::POOL_DIR);
		
		$pools = array();

		$i=0;
		$pin=popen("cd ".CPoolLister::POOL_DIR."/; find -type d -mindepth 1 -maxdepth 1 | sed 's/^\.\///g'","r");
		while ($pool=fgets($pin))
		{
			$pool = trim($pool);
			$pools[$pool] = $pool;
		}
		pclose($pin);
		return($pools);
	}





	/**
	**name CPoolLister::poolExists($poolName)
	**description Checks, if a pool with agiven name exists.
	**parameter poolName: Name of the pool to check.
	**returns true, is the pool exists.
	**/
	static function poolExists($poolName)
	{
		$pools = CPoolLister::getPoolNames();
		return(in_array($poolName, $pools));
	}


	public function __construct()
	{
		$i = 1 + 1; //nop
// 		print('KONSTRUKT');
	}
}

?>