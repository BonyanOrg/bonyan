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
// Global Datatable Style
//****************************************************
gulp.task('global-datatable-css', function () {
    return gulp.src('./assets/scss/global-datatable.scss')
        .pipe(sourcemaps.init())
        .pipe(autoprefixer())
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(concat('global-datatable.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// Dashboard css
//****************************************************
gulp.task('dashboard-css', function () {
    return gulp.src('./assets/scss/dashboard.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('dashboard.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css'));
});

//****************************************************
// ===================WPB CSS=========================
//****************************************************

//****************************************************
// Quick Donation Style
//****************************************************
gulp.task('wpb-quick-donation-css', function () {
    return gulp.src('./assets/scss/components/wpb/quick-donation.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('quick-donation.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Primary Carousel Style
//****************************************************
gulp.task('wpb-primary-carousel-css', function () {
    return gulp.src('./assets/scss/components/wpb/primary-carousel.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('primary-carousel.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Zakat Style
//****************************************************
gulp.task('wpb-zakat-css', function () {
    return gulp.src('./assets/scss/components/wpb/zakat.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('zakat.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Project Card Style
//****************************************************
gulp.task('wpb-project-card-css', function () {
    return gulp.src('./assets/scss/components/wpb/project-card.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('project-card.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Contact Info Style
//****************************************************
gulp.task('wpb-contact-info-css', function () {
    return gulp.src('./assets/scss/components/wpb/contact-info.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('contact-info.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Vacancies Style
//****************************************************
gulp.task('wpb-vacancies-css', function () {
    return gulp.src('./assets/scss/components/wpb/vacancies.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('vacancies.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Tenders Style
//****************************************************
gulp.task('wpb-tenders-css', function () {
    return gulp.src('./assets/scss/components/wpb/tenders.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('tenders.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Icon Title Description Style
//****************************************************
gulp.task('wpb-icon-title-desc-css', function () {
    return gulp.src('./assets/scss/components/wpb/icon-title-desc.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('icon-title-desc.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Background Title Description Style
//****************************************************
gulp.task('wpb-bg-title-desc-css', function () {
    return gulp.src('./assets/scss/components/wpb/bg-title-desc.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('bg-title-desc.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Locations Style
//****************************************************
gulp.task('wpb-locations-css', function () {
    return gulp.src('./assets/scss/components/wpb/locations.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('locations.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// File Card Style
//****************************************************
gulp.task('wpb-file-card-css', function () {
    return gulp.src('./assets/scss/components/wpb/file-card.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('file-card.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Program Stats Style
//****************************************************
gulp.task('wpb-program-stats-css', function () {
    return gulp.src('./assets/scss/components/wpb/program-stats.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('program-stats.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Banner Style
//****************************************************
gulp.task('wpb-banner-css', function () {
    return gulp.src('./assets/scss/components/wpb/banner.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('banner.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Success story card Style
//****************************************************
gulp.task('wpb-success-story-card-css', function () {
    return gulp.src('./assets/scss/components/wpb/success-story-card.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('success-story-card.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

//****************************************************
// Blog card Style
//****************************************************
gulp.task('blog-card-css', function () {
    return gulp.src('./assets/scss/components/blog-card.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('blog-card.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components'));
});

//****************************************************
// Trustee card Style
//****************************************************
gulp.task('trustee-card-css', function () {
    return gulp.src('./assets/scss/components/wpb/trustee-card.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('trustee-card.min.css'))
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
// dashboard.js
//****************************************************
gulp.task('dashboard-js', function () {
    return gulp.src('./assets/js/dashboard.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('dashboard.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js'))
});

//****************************************************
// ===================WPB JS=========================
//****************************************************

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
// Primary Carousel JS
//****************************************************
gulp.task('wpb-primary-carousel-js', function () {
    return gulp.src('./assets/js/components/wpb/primary-carousel.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('primary-carousel.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js/components/wpb'));
});

//****************************************************
// Zakat JS
//****************************************************
gulp.task('wpb-zakat-js', function () {
    return gulp.src('./assets/js/components/wpb/zakat.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('zakat.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js/components/wpb'));
});

//****************************************************
// Vacancies JS
//****************************************************
gulp.task('wpb-vacancies-js', function () {
    return gulp.src('./assets/js/components/wpb/vacancies.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('vacancies.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js/components/wpb'));
});

//****************************************************
// Tenders JS
//****************************************************
gulp.task('wpb-tenders-js', function () {
    return gulp.src('./assets/js/components/wpb/tenders.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('tenders.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js/components/wpb'));
});

//****************************************************
// Success story carousel
//****************************************************
gulp.task('wpb-success-story-carousel-js', function () {
    return gulp.src('./assets/js/components/wpb/success-story-carousel.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('success-story-carousel.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/js/components/wpb'));
});

//*************************************************************
// ===================TASKS AUTOMATION=========================
//*************************************************************

//****************************************************
//task for automate all styles
//****************************************************
gulp.task('styles', gulp.parallel(['style', 'home', 'global-datatable-css', 'dashboard-css']));
gulp.task('styles-rtl', gulp.parallel(['style-rtl', 'home-rtl']));
gulp.task('components-styles', gulp.parallel(['wpb-quick-donation-css', 'wpb-primary-carousel-css', 'wpb-zakat-css', 'wpb-project-card-css', 'wpb-contact-info-css', 'wpb-vacancies-css', 'wpb-tenders-css', 'wpb-icon-title-desc-css', 'wpb-bg-title-desc-css', 'wpb-locations-css', 'wpb-file-card-css', 'wpb-program-stats-css', 'wpb-banner-css', 'wpb-success-story-card-css', 'blog-card-css', 'trustee-card-css']));

//****************************************************
//task for automate all scripts
//****************************************************
gulp.task('scripts', gulp.parallel(['script-js', 'home-sliders-js', 'dashboard-js']));
gulp.task('components-scripts', gulp.parallel(['wpb-quick-donation-js', 'wpb-primary-carousel-js', 'wpb-zakat-js', 'wpb-vacancies-js', 'wpb-tenders-js', 'wpb-success-story-carousel-js']));

//****************************************************
//task for watching file
//****************************************************
gulp.task('watch', function () {
    gulp.watch(['./assets/scss/**/*.scss', '!./assets/scss/components/**'], gulp.series('styles'));
    gulp.watch(['./assets/js/**/*.js', '!./assets/js/components/**'], gulp.series('scripts'));
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