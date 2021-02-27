<?php
namespace Tests\Helpers;

use Tests\TestCase;

class PathsTest extends TestCase
{
	/** @test */
	public function it_can_get_plugin_path()
	{
		$plugin = 'PluginName';
		$path = plugin_path($plugin);

		$this->assertIsString($path);
		$this->assertStringContainsString('Plugins', $path);
		$this->assertStringContainsString($plugin, $path);
	}
}
