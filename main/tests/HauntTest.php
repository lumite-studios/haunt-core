<?php
namespace Tests;

use Haunt\Facades\Haunt;
use Tests\TestCase;

class HauntTest extends TestCase
{
	/** @test */
	public function it_can_get_installed_version()
	{
		$version = Haunt::version();

		$this->assertIsString($version);
	}
}
