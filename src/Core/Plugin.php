<?php
namespace Haunt\Core;

use Haunt\Extend\BasePlugin;

class Plugin extends BasePlugin
{
	/**
	 * The routes to register.
	 * @var array
	 */
	public $routes = [
		'admin' => __DIR__.'./admin.php',
	];
}
