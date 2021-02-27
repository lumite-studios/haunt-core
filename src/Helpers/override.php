<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param  array|string|null  $key
 * @param  mixed  $default
 * @return mixed|\Illuminate\Config\Repository
 */
function config($key = null, $default = null)
{
	return Str::startsWith($key, 'livewire') ? Config::get('haunt.'.$key, $default) : Config::get($key, $default);
}
