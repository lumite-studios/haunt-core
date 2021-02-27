<?php
namespace Haunt\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
		$this->loadViewsFrom($this->root.'/resources/views', 'haunt');
		$this->loadViewsFrom(plugin_path(), 'plugin');
	}
}
