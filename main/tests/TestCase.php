<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
	use WithFaker;

	/**
     * Add the package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
	protected function getPackageProviders($app)
	{
		return ['Haunt\\Providers\\HauntServiceProvider'];
	}

	/**
	 * Add the package aliases.
	 *
	 * @param \Illuminate\Foundation\Application $app
	 * @return array
	 */
    protected function getPackageAliases($app)
    {
        return ['Haunt' => 'Haunt\Facades\Haunt'];
    }
}
