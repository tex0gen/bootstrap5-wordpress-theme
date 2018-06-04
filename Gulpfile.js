const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const rename = require("gulp-rename");
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const clean = require('gulp-clean');
const postcss = require('gulp-postcss');
const uncss = require('postcss-uncss');

// Comile SASS
gulp.task('sass', function() {
  gulp.src('./assets/sass/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./assets/build/css/'));
});

// Removes unused CSS
gulp.task('purify', function() {
  var plugins = [
    uncss({
      html: ['./**/*.php']
    }),
  ];

  return gulp.src('./assets/build/css/main.min.css')
    .pipe(postcss(plugins))
    .pipe(gulp.dest('./assets/build/css/'));
});

// RM old minified CSS
gulp.task('del-min-css', function(){
  return gulp.src('./assets/build/css/main.min.css',{force: true})
  .pipe(clean())
});

// Minify CSS
gulp.task('minify', ['del-min-css'], function() {
  gulp.src('./assets/build/css/main.css')
    .pipe(cleanCSS())
    .pipe(rename('main.min.css'))
    .pipe(gulp.dest('./assets/build/css/'));
});

// Concat & Minify JS
gulp.task('scripts', function() {
    return gulp.src([
      './assets/js/tether.min.js',
      './assets/js/popper.js',
      './assets/sass/bootstrap/dist/js/bootstrap.min.js',
      './assets/js/owl.carousel.min.js',
      './assets/js/main.js',
      './assets/js/cookie-policy.js'
    ])
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('./assets/build/js/'));
});

// Prep for ES6
// gulp.task('js', () =>
//   gulp.src('./assets/js/app.js')
//     .pipe(sourcemaps.init())
//     .pipe(babel({
//         presets: ['env']
//     }))
//     .pipe(rename('app.min.js'))
//     .pipe(sourcemaps.write('.'))
//     .pipe(gulp.dest('./assets/js/'))
// );

// Watch task
gulp.task('default',function() {
  gulp.watch(['assets/sass/**/*.scss', 'assets/js/**/*.js'], ['sass', 'minify', 'scripts']);
});

gulp.task('build',function() {
  gulp.watch(['assets/sass/**/*.scss', 'assets/js/**/*.js'], ['sass', 'minify', 'purify', 'scripts']);
});
