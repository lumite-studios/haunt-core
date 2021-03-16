<?php
/**
 * The main Haunt class.
 *
 * @since 0.1.0
 *
 * @method static string version(string $package = null) 	Return the installed composer version of a package; defaults to the Haunt package.
 */
namespace Haunt\Facades;

use Illuminate\Support\Facades\Facade;

class Haunt extends Facade
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
		return \Haunt\Haunt::class;
	}
}
