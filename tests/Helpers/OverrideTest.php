<?php
namespace Tests\Helpers;

use Tests\TestCase;

class OverrideTest extends TestCase
{
	/** @test */
	public function it_can_get_config()
	{
		$config = config('livewire.class_namespace');

		$this->assertIsString($config);
		$this->assertStringContainsString('Haunt', $config);
	}
}
