const elixir = require('laravel-elixir');
const watch = require("gulp-watch");
//require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
   // mix.sass('app.scss')
    //   .webpack('app.js');
});


gulp.task('css', function() {
    gulp.src('./resources/assets/css/**/*.css').pipe(gulp.dest("./public/css"));
});

gulp.task('js', function() {
    gulp.src('./resources/assets/js/**/*.js').pipe(gulp.dest("./public/js"));
});


gulp.task("watch", function () {
  watch('./resources/assets/**/*.js', function () {
    gulp.start("js");
  });

  watch('./resources/assets/**/*.css', function () {
    gulp.start("css");
  });
});


// gulp.task('watch', function() {
//     gulp.watch('./resources/assets/**/*.js', ['js']);
//     gulp.watch('./resources/assets/**/*.css', ['css']);
// });