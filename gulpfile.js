var gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
var browserSync = require('browser-sync');

gulp.task('sass', function () {
  var option = {
    outputStyle: 'expanded',
  };

  return gulp.src('./css/scss/**/*.scss')
    .pipe(plumber())
    .pipe(sass({ errLogToConsole: true }))
    .on('error', catchErr)
    .pipe(sass(option))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./css/'))
    .pipe(browserSync.stream());
});


gulp.task('php', function () {
  return gulp.src('**/*.php')
    .pipe(browserSync.stream());
});


function catchErr(e) {
  console.log(e);
  this.emit('end');
}

// gulp.task('pug', function () {
//   var option = {
//     pretty: true,
//   };

//   return gulp.src(['./pug/**/*.pug'])
//     .pipe(plumber())
//     .pipe(pug(option))
//     .pipe(rename({
//       extname: '.php'
//     }))
//     .pipe(gulp.dest('./'));
// });

gulp.task('browser-sync', function () {
  browserSync.init({
    // vccwで設定したipアドレス
    proxy: "http://genomics-unit.local/",
    open: true,
    watchOptions: {
      debounceDelay: 1000
    }
  });
});

gulp.task('reload', () => {
  browserSync.reload();
});

gulp.task('watch', function () {
  gulp.watch('./css/scss/**/*.scss', gulp.series('sass'));
  gulp.watch('**/*.php', gulp.series('php'));
});

gulp.task('default', gulp.parallel('browser-sync', 'sass', 'watch'));

