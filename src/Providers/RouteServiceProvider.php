<?php
namespace Haunt\Providers;

use Haunt\Core\Plugin;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
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
}
