let mix = require('laravel-mix')

mix
  .styles(
  [
    'resources/assets/sass/bootstrap.css',
    'resources/assets/sass/redesocial.css',
    'resources/assets/sass/carousel.css',
    'resources/assets/sass/empresa.css',
    'resources/assets/sass/footer-white.css',
    'resources/assets/sass/sb-admin.css'
      // 'resources/assets/sass/login.css'
  ],
    'public/css/all.css'
  )
  .sass('resources/assets/sass/app.scss', 'public/css')
  .scripts(
  [
    'node_modules/jquery/dist/jquery.slim.js',
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/bootbox/dist/bootbox.all.min.js'
      // 'resources/assets/js/app.js'
      // 'node_modules/datatables.net/js/jquery.dataTables.js',
      // 'node_modules/jquery-nestable/jquery.nestable.js',
      // "vendor/fortawesome/font-awesome/js/fontawesome.js"
  ],
    'public/js/app.js'
  )
/*
  .js('resources/assets/js/app.js', 'public/js')
  .copy('node_modules/jquery/dist/jquery.js','public/js/jquery.js')
  .copy('node_modules/bootstrap/dist/css/bootstrap.css.map','public/css/bootstrap.css.map')
  .copy('node_modules/@popperjs/core/lib/popper.js','public/js/popper.js')
  .copy('node_modules/@popperjs/core/dist/umd/popper.min.js','public/js/popper.min.js')
  .copy('node_modules/@popperjs/core/dist/umd/popper.min.js.map','public/js/popper.min.js.map')
  .copy('node_modules/bootstrap/dist/js/bootstrap.js.map','public/js/bootstrap.js.map')
  .copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
  .copy('node_modules/bootstrap/dist/js/bootstrap.min.js.map', 'public/js/bootstrap.min.js.map')
  .copy('node_modules/bootbox/bootbox.js', 'public/js/bootbox.js')
  .copy('node_modules/bootbox/bootbox.locales.js', 'public/js/bootbox.locales.js')
  .copy('node_modules/bootbox/bootbox.all.js', 'public/js/bootbox.all.js')
  */
