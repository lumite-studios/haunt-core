const mix = require('laravel-mix')
mix.disableNotifications()

mix.postCss('resources/css/app.css', 'resources/dist/', [
	require("tailwindcss"),
])
