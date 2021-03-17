<?php
namespace Haunt\Providers;

use Haunt\Console\Commands\Install;
use Haunt\Console\Commands\RefreshPlugins;
use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
	/**
	 * The commands to register.
	 * @var array
	 */
	private $commands = [
		Install::class,
		RefreshPlugins::class,
	];

	/**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->commands($this->commands);
	}
}
