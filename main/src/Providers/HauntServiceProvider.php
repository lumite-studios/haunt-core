<?php
namespace Haunt\Providers;

use Haunt\Providers\AppServiceProvider;
use Haunt\Providers\ConsoleServiceProvider;
use Haunt\Providers\ViewServiceProvider;
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
		ViewServiceProvider::class,
	];
}
