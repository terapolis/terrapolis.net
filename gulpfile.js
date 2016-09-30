var gulp = require('gulp'),
    browserSync = require('browser-sync'),
    sass = require('gulp-sass'),
    prefix = require('gulp-autoprefixer'),
    gutil = require('gulp-util'),
    plumber = require('gulp-plumber');

// gulp upd-html
gulp.task('upd-html', function () {
  browserSync.notify('gulp upd-html');
  browserSync.reload();
});

// browser-sync
gulp.task('browser-sync', ['sass'], function () {
  browserSync({
    proxy: "teslar-wp:8888"
  });
});

// sass
gulp.task('sass', function () {
  return gulp.src([
    'wp-content/themes/teslar-theme/sass/style.scss'
  ])
      .pipe(plumber(function (error) {
        gutil.log(gutil.colors.red(error.message));
        this.emit('end');
      }))
      .pipe(sass({
        includePaths: ['scss'],
        outputStyle: 'compressed'
      }))
      .pipe(prefix(['last 2 version', '> 0%', 'ie > 7', 'safari 5', 'ios 6', 'android 4'], {cascade: true}))
      .pipe(browserSync.reload({stream: true}))
      .pipe(gulp.dest('wp-content/themes/teslar-theme/'));
});


// gulp watch
gulp.task('watch', ['browser-sync'], function () {
  gulp.watch([
    'wp-content/themes/teslar-theme/sass/**/*.scss'
  ], ['sass']);
  gulp.watch([
    'wp-content/themes/teslar-theme/sass/**/*.php'
  ], ['upd-html']);
});

// gulp
gulp.task('default', ['sass']);
