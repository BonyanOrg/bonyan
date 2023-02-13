/* eslint-disable */
let gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass'));
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify-es').default,
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer')


//****************************************************
// style css
//****************************************************
gulp.task('style', function () {
    return gulp.src('./assets/scss/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(concat('style.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// rtl style css
//****************************************************
gulp.task('style-rtl', function () {
    return gulp.src('./assets/scss/rtl/style-rtl.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(concat('style-rtl.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// Minified Bootstrap css (English)
//****************************************************
gulp.task('bootstrap', function () {
    return gulp.src('./assets/scss/bootstrap.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('bootstrap.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// Unminified for Bootstrap css rtl to process it with RTLCSS which lean on comments
//****************************************************
gulp.task('raw-bootstrap', function () {
    return gulp.src('./assets/scss/bootstrap.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('bootstrap.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// Compress the Generated Bootstrap rtl from rtlcss framework
// the command was: rtlcss dist\css\bootstrap.css dist\css\bootstrap-rtl.css
//****************************************************
gulp.task('bootstrap-rtl', function () {
    return gulp.src('./dist/css/bootstrap-rtl.css')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('bootstrap-rtl.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// home css
//****************************************************
gulp.task('home', function () {
    return gulp.src('./assets/scss/home.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(concat('home.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// rtl home css
//****************************************************
gulp.task('home-rtl', function () {
    return gulp.src('./assets/scss/rtl/home-rtl.scss')
        .pipe(sourcemaps.init())
        .pipe(autoprefixer())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('home-rtl.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// script.js
//****************************************************
gulp.task('script-js', function () {
    return gulp.src('./assets/js/script.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('scripts.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js'))
});

//****************************************************
// home.js
//****************************************************
gulp.task('home-sliders-js', function () {
    return gulp.src('./assets/js/home-sliders.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('home-sliders.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js'))
});

//****************************************************
//task for automate all styles
//****************************************************
gulp.task('styles', gulp.parallel(['style', 'home']));

gulp.task('styles-rtl', gulp.parallel(['style-rtl', 'home-rtl']));

//****************************************************
//task for automate all scripts
//****************************************************
gulp.task('scripts', gulp.parallel(['script-js', 'home-sliders-js']));

//****************************************************
//task for watching file
//****************************************************
gulp.task('watch', function () {
    gulp.watch(['./assets/scss/**/*.scss', '!./assets/scss/components/**'], gulp.series('styles'));
    gulp.watch('./assets/js/**/*.js', gulp.series('scripts'));
});

//****************************************************
//task for watching file (RTL)
//****************************************************
gulp.task('watch-rtl', function () {
    gulp.watch(['./assets/scss/rtl/**/*.scss', '!./assets/scss/components/**'], gulp.series('styles-rtl'));
});