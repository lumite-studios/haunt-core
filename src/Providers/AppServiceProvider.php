<?php
namespace Haunt\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * The configuration files.
	 * @return array
	 */
	private $config = [
		'admin',
		'livewire',
		'plugins',
		'themes',
	];

	/**
	 * The direct path.
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

		// plugin
		$this->publishes([$this->root.'/src/Core' => plugin_path('HauntCore')], 'haunt');

		// routes
		$this->loadRoutesFrom($this->root.'/routes/routes.php');

		// themes
		$this->publishes([$this->root.'/resources/themes' => resource_path('themes')], 'haunt');

		// views
		$this->loadViewsFrom($this->root.'/resources/views', 'haunt');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// helpers
		collect(glob($this->root.'/src/Helpers/*.php'))->filter(function($filename) {
			return !Str::contains($filename, 'override');
		})->each(function($filename) {
			require_once($filename);
		});
	}
}
