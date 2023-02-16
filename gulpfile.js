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
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
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
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
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
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
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
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
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
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
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
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(concat('home-rtl.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// Quick Donation
//****************************************************
gulp.task('wpb-urgent-campaigns-carousel-css', function () {
    return gulp.src('./assets/scss/components/wpb/urgent-campaigns-carousel.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('urgent-campaigns-carousel.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

gulp.task('wpb-quick-donation-css', function () {
    return gulp.src('./assets/scss/components/wpb/quick-donation.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('quick-donation.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// ===================SCRIPTS=========================
//****************************************************

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
// Quick Donation JS
//****************************************************
gulp.task('wpb-quick-donation-js', function () {
    return gulp.src('./assets/js/components/wpb/quick-donation.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('quick-donation.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js/components/wpb'));
});

//****************************************************
// Urgent Campaigns Carousel JS
//****************************************************
gulp.task('wpb-urgent-campaigns-carousel-js', function () {
    return gulp.src('./assets/js/components/wpb/urgent-campaigns-carousel.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('urgent-campaigns-carousel.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js/components/wpb'));
});

//****************************************************
//task for automate all styles
//****************************************************
gulp.task('styles', gulp.parallel(['style', 'home']));
gulp.task('styles-rtl', gulp.parallel(['style-rtl', 'home-rtl']));
gulp.task('components-styles', gulp.parallel(['wpb-quick-donation-css', 'wpb-urgent-campaigns-carousel-css']));

//****************************************************
//task for automate all scripts
//****************************************************
gulp.task('scripts', gulp.parallel(['script-js', 'home-sliders-js']));
gulp.task('components-scripts', gulp.parallel(['wpb-quick-donation-js', 'wpb-urgent-campaigns-carousel-js']));

//****************************************************
//task for watching file
//****************************************************
gulp.task('watch', function () {
    gulp.watch(['./assets/scss/**/*.scss', '!./assets/scss/components/**'], gulp.series('styles'));
    gulp.watch('./assets/js/**/*.js', gulp.series('scripts'));
});

//****************************************************
//task for watching components file
//****************************************************
gulp.task('watch-components', function () {
    gulp.watch('./assets/scss/components/**/*.scss', gulp.series('components-styles'));
    gulp.watch('./assets/js/components/**/*.js', gulp.series('components-scripts'));
});

//****************************************************
//task for watching file (RTL)
//****************************************************
gulp.task('watch-rtl', function () {
    gulp.watch(['./assets/scss/rtl/**/*.scss', '!./assets/scss/components/**'], gulp.series('styles-rtl'));
});