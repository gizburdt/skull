var gulp      = require('gulp');
var gulpif    = require('gulp-if');
var sass      = require('gulp-sass');
var concat    = require('gulp-concat');
var minifyCss = require('gulp-minify-css');
var uglify    = require('gulp-uglify');

// Styles
gulp.task('styles', function() {
    var publicFiles = [
        'assets/public/sass/public.scss'
    ];

    gulp.src(publicFiles)
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('public.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('assets/build/css'));

    var adminFiles = [
        'assets/admin/sass/admin.scss'
    ];

    gulp.src(adminFiles)
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('admin.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('assets/build/css'));
});

// Scripts
gulp.task('scripts', function() {
    var publicFiles = [
        'assets/public/js/public.js'
    ];

    gulp.src(publicFiles)
        .pipe(concat('public.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/build/js'));

    var adminFiles = [
        'assets/admin/js/admin.js'
    ];

    gulp.src(adminFiles)
        .pipe(concat('admin.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/build/js'));
});

// Watch
gulp.task('watch', function() {
    gulp.watch('assets/**/*.scss', ['styles']);
    gulp.watch('assets/**/*.js', ['scripts']);
});

// Default
gulp.task('default', function() {
    gulp.start('styles', 'scripts');
});