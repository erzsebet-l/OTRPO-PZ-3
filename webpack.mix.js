const mix = require('laravel-mix');

mix.setPublicPath('public');

// JS (заменяет entry: './src/index.js')
mix.js('resources/js/index.js', 'public/js/main.js')

// SCSS → CSS (заменяет все style/css/postcss/sass-loaders)
   .sass('resources/scss/style.scss', 'public/css/style.css')
// Source maps для разработки
   .sourceMaps()

// <-- отключаем Desktop уведомления
   .disableNotifications(); 

// Версионирование для production
if (mix.inProduction()) {
    mix.version();
}
