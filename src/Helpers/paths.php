<?php

use Illuminate\Support\Str;

/**
 * Get the path to the plugin folder.
 *
 * @param string $path
 * @return string
 */
function plugin_path(string $path = ''): string
{
	return config('haunt.plugins.directory').Str::start($path, '\\');
}
