<?php

use Facades\Haunt\Plugin\Routes;
use Illuminate\Support\Facades\Route;

// admin routes
Route::prefix(config('haunt.admin.route'))->group(function() {
	// core
	require_once(__DIR__.'./admin.php');
	// plugins
	Routes::getAdminRoutes();
});
