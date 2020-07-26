const gulp = require('gulp'),
      sass = require('gulp-sass'),
      sourcemaps = require('gulp-sourcemaps'),
      autoprefixer = require('gulp-autoprefixer'),
      cleanCSS = require('gulp-clean-css'),
      rename = require("gulp-rename"),
      babel = require('gulp-babel'),
      concat = require('gulp-concat'),
      uglify = require('gulp-uglify'),
      imageOptim = require('gulp-imageoptim'),
      notify = require('gulp-notify')
      bootstrap = "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js",
      owlcarousel = "node_modules/owl.carousel/dist/owl.carousel.min.js";

// Comile SASS
gulp.task('sass', function() {
  return gulp.src('./assets/sass/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', function(err) {
      sass.logError;
      return notify().write(err);
    }))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./assets/build/css/'))
    .pipe( notify( { message: 'CSS task complete.' } ) );
});

// Minify CSS
gulp.task('minify', function() {
  return gulp.src('./assets/build/css/main.css')
    .pipe(cleanCSS())
    .pipe(rename('main.min.css'))
    .pipe(gulp.dest('./assets/build/css/'));
});

/*
* Required
*/
// Concat & Minify JS
gulp.task('global-scripts', function() {
  return gulp.src([
    bootstrap,
    owlcarousel,
    './assets/js/main.js'
  ])
  .pipe(babel({
    presets: ['@babel/env'],
  }))
  .pipe(concat('scripts.js'))
  .pipe(gulp.dest('./assets/build/js/'));
});

gulp.task('uglify-required', function() {
  return gulp.src('./assets/build/js/scripts.js')
    .pipe(uglify())
    .pipe(gulp.dest('./assets/build/js/'))
    .pipe( notify( { message: 'JS required task complete.' } ) );
});


/*
* Selectable
*/
gulp.task('selectable-scripts', function() {
  return gulp.src([
    './assets/js/selectable/*.js'
  ])
  .pipe(babel({
    presets: ['@babel/env'],
  }))
  .pipe(gulp.dest('./assets/build/js/selectable'));
});

gulp.task('uglify', function() {
  return gulp.src('./assets/build/js/selectable/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('./assets/build/js/selectable/'))
    .pipe( notify( { message: 'JS optional task complete.' } ) );
});

// Watch task
gulp.task('default',function() {
  gulp.watch(['assets/sass/**/*.scss'], gulp.series('sass', 'minify'));
  gulp.watch(['assets/js/required/*.js', 'assets/js/main.js'], gulp.series('global-scripts', 'uglify-required'));
  gulp.watch(['assets/js/selectable/*.js'], gulp.series('selectable-scripts', 'uglify'));
});