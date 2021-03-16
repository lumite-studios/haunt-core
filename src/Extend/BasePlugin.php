<?php
namespace Haunt\Extend;

class BasePlugin
{
	/**
	 * The full namespace of this plugin.
	 * @var string
	 */
	protected $namespace;

	/**
	 * Get the plugin root directory.
	 * @var string
	 */
	protected $root;

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->namespace = get_called_class();
		$this->root = dirname((new \ReflectionClass(get_class($this)))->getFileName());
	}
}
