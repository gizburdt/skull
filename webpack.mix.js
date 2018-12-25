const { mix } = require('laravel-mix');

mix

.options({
    publicPath: 'public/'
})

// Admin
.js('resources/assets/admin/js/admin.js', 'js/')
.sass('resources/assets/admin/scss/admin.scss', 'css/');

// Public
.js('resources/assets/public/js/public.js', 'js/')
.sass('resources/assets/public/scss/public.scss', 'css/');