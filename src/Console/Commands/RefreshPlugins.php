<?php
namespace Haunt\Console\Commands;

use Haunt\Plugin\Manifest;
use Illuminate\Console\Command;

class RefreshPlugins extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'haunt:refresh-plugins';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Refresh the plugins manifest.';

	/**
	 * Execute the console command.
	 *
	 * @param Manifest $manifest
	 * @return mixed
	 */
	public function handle(Manifest $manifest)
	{
		$manifest->build();

		foreach($manifest->plugins() as $plugin) {
			$this->info('Found the <comment>'.$plugin['name'].'</comment> plugin.');
		}
	}
}
