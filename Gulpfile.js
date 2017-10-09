const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const rename = require("gulp-rename");

gulp.task('sass', function() {
  gulp.src('./assets/sass/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(autoprefixer())
    .pipe(gulp.dest('./assets/css/'));
});

gulp.task('minify', function() {
  gulp.src('./assets/css/*.css')
    .pipe(cleanCSS())
    .pipe(rename('main.min.css'))
    .pipe(gulp.dest('./assets/css/'));
});

//Watch task
gulp.task('default',function() {
  gulp.watch('assets/sass/*.scss', ['sass', 'minify']);
});