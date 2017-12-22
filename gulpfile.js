'use strict';
 
const gulp = require('gulp');
const sass = require('gulp-sass');
const imagemin = require('gulp-imagemin');
 
gulp.task('sass', function () {
  return gulp.src('./assets/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./assets/css'));
});
 
gulp.task('images', function () {
  return gulp.src('./assets/img/*')
    .pipe(imagemin())
    .pipe(gulp.dest('./assets/img'));
});
 
gulp.task('watch', function () {
  gulp.watch('./assets/sass/**/*.scss', ['sass']);
});
