const mix = require('laravel-mix')
mix.disableNotifications()

mix.js('resources/assets/js/simplemde.js', 'public/js/simplemde.min.js')

mix.copy('node_modules/simplemde/dist/simplemde.min.css', 'public/css/simplemde.min.css')

mix.sass('resources/assets/sass/app.scss', 'public/css', {
  includePaths: [require('vital-css').includePaths]
})

mix.sass('resources/assets/sass/admin-panel.scss', 'public/css', {
  includePaths: [require('vital-css').includePaths]
})
