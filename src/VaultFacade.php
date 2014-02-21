<?php namespace Creolab\Vault;

use Illuminate\Support\Facades\Facade;

class VaultFacade extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'creolab.vault';
	}

}
