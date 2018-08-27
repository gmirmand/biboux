var gulp = require('gulp');
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var plumber = require('gulp-plumber');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var browserSync = require('browser-sync').create();

var sassOptions = {
    errLogToConsole: true
};

var autoprefixerOptions = {
    browsers: [
        'not ie <= 9',
        'last 4 versions'
    ],
    cascade: false
};

var paths = {
    sass: {
        src: {
            front: './src/sass/front.scss',
            admin: './src/sass/admin.scss'
        },
        watch: ['./src/**/*.scss', './src/*.scss'],
        dest: './css/'
    },
    php: {
        src: '',
        watch: ['./**/*.php', './*.php'],
        dest: ''
    },
    js: {
        src: {
            vendors: [
                // Libraries
                './src/js/vendor/*.js'
            ],
            app: [
                './src/js/script.js',
                './src/js/front/*.js',
                './src/js/admin/*.js'
            ]
        },
        dest: './js/min/',
        watch: ['./src/**/*.js','./src/*.js']
    }
};


// Static server
gulp.task('browser-sync', function () {
    browserSync.init({
        'port': 8080,
        'proxy': 'biboux.localhost'
    });
});

//sass task
function sassfunc(src){
    gulp.src(src)
        .pipe(sassGlob())
        .pipe(plumber())
        .pipe(sass(sassOptions))
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(minifyCss({
            keepSpecialComments: 0
        }))
        .pipe(gulp.dest(paths.sass.dest))
        .pipe(browserSync.stream())
    ;
}
gulp.task('compile:sass', function () {
    sassfunc(paths.sass.src.admin);
    sassfunc(paths.sass.src.front);
});

// Script task JS
gulp.task(
    'scripts-app', function () {
        // create filter instance inside task function
        return gulp.src(paths.js.src.app)
            .pipe(plumber())
            .pipe(jshint())
            .pipe(jshint.reporter('jshint-stylish'))
            .pipe(concat('app.js'))
            .pipe(rename({suffix: '.min'}))
            .pipe(uglify())
            .pipe(gulp.dest(paths.js.dest));
    });

gulp.task(
    'scripts-vendors', function () {
        // create filter instance inside task function
        return gulp.src(paths.js.src.vendors)
            .pipe(concat('vendors.js'))
            .pipe(rename({suffix: '.min'}))
            .pipe(uglify())
            .pipe(gulp.dest(paths.js.dest));
    });

gulp.task('default', ['watch:all']);


// create a task that ensures the `js` task is complete before
// reloading browsers
gulp.task('compile:js', ['scripts-vendors', 'scripts-app'], function (done) {
    browserSync.reload();
    done();
});

gulp.task('reload', function (done) {
    browserSync.reload();
    done();
});

gulp.task('watch:all', ['browser-sync'], function () {
    gulp.watch(paths.php.watch, ['reload']);
    gulp.watch(paths.sass.watch, ['compile:sass']);
    gulp.watch(paths.js.watch, ['compile:js']);
});