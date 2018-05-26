var gulp        = require('gulp');
var cleanCSS      = require('gulp-clean-css');
var sass        = require('gulp-sass');
var uglify 		= require("gulp-uglify");
var rename      = require('gulp-rename');


// Minify js files
gulp.task('minify-js', function () {
	return gulp.src(['assets/js/custom-scripts/*.js'])
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest("assets/min/js/"))
        //.pipe(browserSync.stream());
});

// Move the bootstrap min.css file into our assets/min/css folder
gulp.task('send', function() {
    return gulp.src(['node_modules/bootstrap/dist/css/bootstrap.min.css'])
        .pipe(gulp.dest("assets/min/css"))

});

// Compile sass 
gulp.task('sass', function() {
    return gulp.src(['assets/sass/*.scss'])
        .pipe(sass())
        .pipe(gulp.dest("assets/css"));
});

// Minify css
gulp.task('minify', function () {
    gulp.src('assets/css/*.css')
        .pipe(cleanCSS({keepBreaks: true, compatibility: 'ie8'}))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest("assets/min/css"))
    ;
});

// Move the javascript files into our /src/js folder
gulp.task('js', function() {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/popper.js/dist/umd/popper.min.js'])
        .pipe(gulp.dest("assets/min/js/"))

});

// Static Server + watching scss/html files
gulp.task('serve', ['minify-js', 'js', 'sass', 'minify', 'send'], function() {

    gulp.watch(['assets/js/custom-scripts/*.js'],['minify-js']);
    gulp.watch(['assets/sass/*.scss'], ['sass']);
    gulp.watch(['assets/css/*.css'], ['minify']);

});

gulp.task('default', ['serve']);