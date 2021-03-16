<?php
return [
	/*
	|--------------------------------------------------------------------------
	| Route
	|--------------------------------------------------------------------------
	|
	| Which route the admin area should be located through.
	|
	*/
	'route' => env('ADMIN_ROUTE', 'admin'),

	/*
	|--------------------------------------------------------------------------
	| Connection
	|--------------------------------------------------------------------------
	|
	| The database connection for Haunt to use.
	|
	*/
	'connection' => env('HAUNT_CONNECTION', 'haunt'),
];
