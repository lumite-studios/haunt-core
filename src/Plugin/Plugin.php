<?php
namespace Haunt\Plugin;

use Haunt\Extend\BasePlugin;

class Plugin
{
	/**
	 * Create an instance of a plugin.
	 *
	 * @since 0.1.0
	 *
	 * @param array $plugin
	 * @return BasePlugin
	 */
	public static function instance(array $plugin = []): BasePlugin
	{
		$classname = $plugin['name'].'\\'.$plugin['main'];
		return new $classname;
	}
}
