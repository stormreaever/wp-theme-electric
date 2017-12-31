'use strict';
 
const gulp = require('gulp');
const sass = require('gulp-sass');
const imagemin = require('gulp-imagemin');
const sourcemaps = require('gulp-sourcemaps');
 
gulp.task('sass', function () {
  return gulp.src('./assets/sass/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
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
