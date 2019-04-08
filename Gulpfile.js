const gulp = require('gulp'),
      sass = require('gulp-sass'),
      sourcemaps = require('gulp-sourcemaps'),
      autoprefixer = require('gulp-autoprefixer'),
      cleanCSS = require('gulp-clean-css'),
      rename = require("gulp-rename"),
      babel = require('gulp-babel'),
      concat = require('gulp-concat'),
      uglify = require('gulp-uglify'),
      clean = require('gulp-clean'),
      postcss = require('gulp-postcss'),
      uncss = require('postcss-uncss'),
      imageOptim = require('gulp-imageoptim'),
      notify = require('gulp-notify');
      
// Comile SASS
gulp.task('sass', function() {
  return gulp.src('./assets/sass/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./assets/build/css/'))
    .pipe( notify( { message: 'CSS task complete.' } ) );
});

// Removes unused CSS
// gulp.task('purify', function() {
//   var plugins = [
//     uncss({
//       html: ['./**/*.php']
//     }),
//   ];

//   return gulp.src('./assets/build/css/main.min.css')
//     .pipe(postcss(plugins))
//     .pipe(gulp.dest('./assets/build/css/'));
// });

// RM old minified CSS
// gulp.task('del-min-css', function(done){
//   return gulp.src('./assets/build/css/main.min.css',{force: true})
//   .pipe(clean())
// });

// Minify CSS
gulp.task('minify', function() {
  return gulp.src('./assets/build/css/main.css')
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


gulp.task('uglify', function() {
  return gulp.src('./assets/build/js/scripts.js')
    .pipe(uglify())
    .pipe(gulp.dest('./assets/build/js/'));
});

gulp.task('optimise', function(done) {
  // gulp.src('../../uploads/**/**/*')
  //   .pipe(imageOptim.optimize())
  //   .pipe(gulp.dest('../../uploads'));
  gulp.src('./')
    .pipe(imageOptim.optimize().on('error', console.log('lol')))
    .pipe(gulp.dest('./'));
  done();
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
  gulp.watch(['assets/sass/**/*.scss', 'assets/js/**/*.js'], gulp.series('sass', 'scripts', 'minify', 'uglify'));
});

gulp.task('images', function(done) {
  gulp.parallel('optimise');
  done();
});

// gulp.task('build',function() {
//   gulp.watch(['assets/sass/**/*.scss', 'assets/js/**/*.js'], ['sass', 'purify', 'scripts']);
// });
