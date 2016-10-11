var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix

    .sass([
        'public/scss/public.scss'
    ], 'assets/public/css/public.css', 'resources/assets/')

    .sass([
        'admin/scss/admin.scss'
    ], 'assets/admin/css/admin.css', 'resources/assets/')

    .scripts([
        'public/js/public.js'
    ], 'assets/public/js/public.js', 'resources/assets/')

    .scripts([
        'admin/js/admin.js'
    ], 'assets/admin/js/admin.js', 'resources/assets/');
});