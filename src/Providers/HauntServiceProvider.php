<?php
namespace Haunt\Providers;

use Illuminate\Support\AggregateServiceProvider;

class HauntServiceProvider extends AggregateServiceProvider
{
	/**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
		AppServiceProvider::class,
		ConsoleServiceProvider::class,
		PluginServiceProvider::class,
		ViewServiceProvider::class,
	];
}
