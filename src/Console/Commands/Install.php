<?php
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
			 ->updateDatabaseConfig()
			 ->refreshPlugins()
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
				$this->info('Created the <comment>'.$dir.'</comment> directory.');
			}
		}

		return $this;
	}

	/**
	 * Add the haunt connection to the database config.
	 *
	 * @return Install
	 */
	private function updateDatabaseConfig()
	{
		$connect = "'connections' => [";
		$path = config_path('database.php');
		if(file_exists($path)) {
			$content = file_get_contents($path);
			if(!str_contains($content, 'haunt')) {
				$pos = strpos($content, $connect) + strlen($connect);

				$connection = "
		'haunt' => [
			'driver' => env('HAUNT_DRIVER', 'mysql'),
			'host' => env('HAUNT_HOST', 'localhost'),
			'database' => env('HAUNT_DATABASE', ''),
			'username' => env('HAUNT_USERNAME', ''),
			'password' => env('HAUNT_PASSWORD', ''),
			'prefix' => env('HAUNT_TABLE_PREFIX', 'hnt_'),
		],
		";

				file_put_contents($path, substr_replace($content, $connection, $pos, 0));
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
	 * Refresh the plugins manifest.
	 *
	 * @return Install
	 */
	private function refreshPlugins()
	{
		$this->call('haunt:refresh-plugins');

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
