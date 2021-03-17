<?php
namespace Haunt\Providers;

use Haunt\Plugin\Manifest;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
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
		// register the core routes
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// register plugin manifest
        $this->app->instance(Manifest::class, new Manifest(
            new Filesystem,
            $this->app->basePath(),
            $this->app->bootstrapPath().'/cache/plugins.php'
        ));

		// autoload
		$loader = require base_path().'/vendor/autoload.php';
		foreach($this->app[Manifest::class]->plugins() as $plugin) {
			$loader->setPsr4($plugin['name'].'\\', $plugin['directory'].'\\'.$plugin['autoload']);
		}
	}
}
