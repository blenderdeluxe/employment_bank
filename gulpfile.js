var gulp = require('gulp');
var rename = require('gulp-rename');
var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;
/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
// gulp.task("testfiles", function() {
//   gulp.src(['public/plugins/**/*']).pipe(gulp.dest('resources/assets/plugins'));
// });
gulp.task("copyfiles", function() {

  gulp.src("public/assets/css/bootstrap.min.css")
      .pipe(gulp.dest("resources/assets/css/"));
  gulp.src("public/assets/css/font-awesome.min.css")
      .pipe(gulp.dest("resources/assets/css/"));
  gulp.src("public/assets/css/ionicons.min.css")
      .pipe(gulp.dest("resources/assets/css/"));
  gulp.src("public/assets/css/AdminLTE.min.css")
      .pipe(gulp.dest("resources/assets/css/"));
  gulp.src("public/assets/css/skin-blue.min.css")
      .pipe(gulp.dest("resources/assets/css/"));
  gulp.src("public/assets/css/custom.css")
      .pipe(gulp.dest("resources/assets/css/"));

  gulp.src("public/assets/js/jQuery-2.1.4.min.js")
      .pipe(gulp.dest("resources/assets/js/"));
  gulp.src("public/assets/js/bootstrap.min.js")
      .pipe(gulp.dest("resources/assets/js/"));
  gulp.src("public/assets/js/fastclick.min.js")
      .pipe(gulp.dest("resources/assets/js/"));
  gulp.src("public/assets/js/app.min.js")
      .pipe(gulp.dest("resources/assets/js/"));
  gulp.src("public/assets/js/jquery.slimscroll.min.js")
      .pipe(gulp.dest("resources/assets/js/"));
  gulp.src("public/assets/js/custom_admin.js")
      .pipe(gulp.dest("resources/assets/js/"));
});
    /**
     * Default gulp is to run this elixir stuff
     */
elixir(function(mix) {

  //mix.scripts(['plugins/**/*'  ],'public/assets/js/admin.js','resources/assets').version('public/assets/js/plugins.js');
      mix.styles([
          'bootstrap.min.css',
          'font-awesome.min.css',
          'ionicons.min.css',
          'AdminLTE.min.css',
          'skin-blue.min.css',
          'custom.css',
          ], 'public/assets/css');
      //], 'public/assets/css').version('public/assets/css/all.css');
      // Combine scripts
      mix.scripts([
          'js/jQuery-2.1.4.min.js',
          'js/bootstrap.min.js',
          //'js/jquery.dataTables.js',
          'js/fastclick.min.js',
          'js/app.min.js',
          'js/jquery.slimscroll.min.js',
          'js/custom_admin.js',
      ],'public/assets/js/admin.js','resources/assets');

      //mix.version(['public/assets/css/all.css', 'public/assets/js/admin.js']);
});
