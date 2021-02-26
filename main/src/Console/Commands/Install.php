<?php
/**
 *
 */
namespace Haunt\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Install extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'haunt:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install Haunt.';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->createDirectories()
			->publish()
			->clearCache();
	}

	/**
	 * Create the directories.
	 *
	 * @return Install
	 */
	private function createDirectories()
	{
		$directories = [
			config('haunt.plugins.directory'),
			config('haunt.themes.directory'),
		];

		foreach($directories as $dir) {
			if(!File::isDirectory($dir)) {
				File::makeDirectory($dir);
			}
			if(!File::exists($gitkeep = $dir.'\\.gitkeep')) {
				File::put($gitkeep, '');
				$this->info('Created the <comment>'.$dir.'</comment> directory.');
			}
		}

		return $this;
	}

	/**
	 * Publish the Haunt assets.
	 *
	 * @return Install
	 */
	private function publish()
	{
		$this->call('vendor:publish', ['--tag' => 'haunt']);

		return $this;
	}

	/**
	 * Clear the cache.
	 *
	 * @return Install
	 */
	private function clearCache()
	{
		$this->call('cache:clear');

		return $this;
	}
}
