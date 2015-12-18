'use strict';

var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var sass = require('gulp-ruby-sass');

gulp.task('clean', require('del').bind(null, ['.tmp', 'dist']));

gulp.task('sass', function() {

  var lazypipe = require('lazypipe');
  var cssChannel = lazypipe()
    .pipe($.replace, '../font', 'fonts')
    .pipe($.replace, '../font', 'fonts');

    return sass('sass/style.scss',
        {
	      style: 'expanded',
	      precision: 10
	    })
    	.on('error', function (err) {
      		console.error('Error', err.message);
   		})
      .pipe(cssChannel())
   		.pipe($.autoprefixer({
      		browsers: ['last 1 version']
    	}))
        .pipe(gulp.dest('dist'))
        .pipe(gulp.dest(''));
});

gulp.task('watch', function() {
    gulp.watch('sass/**/*.scss', ['sass']);
});

gulp.task('default', ['clean', 'sass', 'watch']);