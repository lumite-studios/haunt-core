<?php
/**
 * The main plugin class.
 *
 * @since 0.1.0
 *
 * @method static BasePlugin instance(array $plugin = []) 	Get an instance of a plugin class.
 */
namespace Haunt\Facades;

use Illuminate\Support\Facades\Facade;

class Plugin extends Facade
{
	/**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
	{
		return \Haunt\Plugin\Plugin::class;
	}
}
