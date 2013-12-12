<?php namespace Creolab\Vault;

use Illuminate\Foundation\Application;

class Vault {

	protected $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}

}
