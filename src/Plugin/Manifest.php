<?php
namespace Haunt\Plugin;

use Illuminate\Foundation\PackageManifest;
use Illuminate\Support\Facades\File;

class Manifest extends PackageManifest
{
	 /**
     * Build the manifest and write it to disk.
     *
     * @return void
     */
    public function build()
    {
		$this->manifest = null;

		$this->write(collect(File::directories(plugin_path()))->flatMap(function($directory) {
			$path = $directory.'\\theme.json';
			if(File::exists($path)) {
				$content = json_decode(File::get($path), true);
				$content['directory'] = $directory;
				return [$content];
			}
		})->filter()->all());

		$this->getManifest();
    }

	/**
	 * Fetch the manifest plugins.
	 *
	 * @return array|null
	 */
	public function plugins(): ?array
	{
		return $this->getManifest();
	}
}
