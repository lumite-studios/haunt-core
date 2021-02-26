<?php
namespace Haunt;

use Jean85\PrettyVersions;

class Haunt
{
	/**
	 * The package name of Haunt.
	 * @var string
	 */
	private $package = 'lumite-studios/haunt-core';

	/**
	 * The root path.
	 * @var string
	 */
    private $root = __DIR__.'/../';

	/**
	 * Get the installed version of Haunt.
	 *
	 * @since 0.1.0
	 *
	 * @param string $package 	The package to get the version of.
	 * @return string
	 */
	public function version(string $package = null): string
	{
		$package = $package ?? $this->package;
		$version = PrettyVersions::getVersion($package);
		return $version->getShortVersion();
	}
}
