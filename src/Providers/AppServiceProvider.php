<?php
namespace Haunt\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * The configuration files.	 *
	 * @return array
	 */
	private $config = [
		'admin',
		'plugins',
		'themes',
	];

	/**
	 * The direct path.	 *
	 * @var string
	 */
    private $root = __DIR__.'/../..';

	/**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		// config
		collect($this->config)->each(function($con) {
			$this->mergeConfigFrom($this->root.'/config/'.$con.'.php', 'haunt.'.$con);
			$this->publishes([$this->root.'/config/'.$con.'.php' => config_path('haunt/'.$con.'.php')], 'haunt');
		});

		// themes
		$this->publishes([$this->root.'/resources/themes' => resource_path('themes')], 'haunt');

		// views
		$this->loadViewsFrom($this->root.'/resources/views', 'haunt');
	}
}
