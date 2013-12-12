<?php namespace Creolab\Vault;

use Illuminate\Support\ServiceProvider;

class VaultServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the vault
	 * @return void
	 */
	public function boot()
	{
		$this->package('creolab/vault');

		// Register bindings
		$this->app->singleton('creolab.vault', function($app)
		{
			return new Environment($app);
		});

		// Shortcut so developers don't need to add an Alias in app/config/app.php
		$alias  = $this->app['config']->get('vault::alias');
		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
		$loader->alias($alias, '\Creolab\Vault\VaultFacade');
	}

	/**
	 * Register the service provider.
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 * @return array
	 */
	public function provides()
	{
		return array('creolab.vault');
	}

}
