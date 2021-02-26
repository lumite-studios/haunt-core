<?php
namespace Tests\Console;

use Tests\TestCase;

class CommandTest extends TestCase
{
	/** @test */
	public function it_can_handle_install_command()
	{
		$this->artisan('haunt:install')
			->expectsOutput('Publishing complete.')
			->expectsOutput('Application cache cleared!')
			->assertExitCode(0);
	}
}
