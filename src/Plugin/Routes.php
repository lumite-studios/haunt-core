<?php
namespace Haunt\Plugin;

use Haunt\Plugin\Manifest;

class Routes
{
	protected $plugins;

	/**
	 * Routes constructor.
	 *
	 * @param Manifest $manifest
	 * @return void
	 */
	public function __construct(Manifest $manifest)
	{
		$this->plugins = $manifest->plugins();
	}

	/**
	 * Require the admin routes files.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function getAdminRoutes(): void
	{
		foreach($this->plugins as $plugin) {
			$class = Plugin::instance($plugin);
			if(array_key_exists('admin', $class->routes)) {
				require_once($class->routes['admin']);
			}
		}
	}
}
