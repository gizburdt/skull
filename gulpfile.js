var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix

    // Public
    .sass([
        'public/scss/public.scss'
    ], 'assets/public/css/public.css', 'resources/assets/')

    .scripts([
        'public/js/public.js'
    ], 'assets/public/js/public.js', 'resources/assets/')

    // Admin
    .sass([
        'admin/scss/admin.scss'
    ], 'assets/admin/css/admin.css', 'resources/assets/')

    .scripts([
        'admin/js/admin.js'
    ], 'assets/admin/js/admin.js', 'resources/assets/');
});