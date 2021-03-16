<?php
namespace Haunt\Plugin;

use Haunt\Core\Plugin;

class Routes
{
	/**
	 * Require the admin routes files.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public static function getAdminRoutes(): void
	{
		$plugin = new Plugin;
		require_once($plugin->routes['admin']);
	}
}
