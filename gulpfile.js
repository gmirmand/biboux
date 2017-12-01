/**
 * Created by epoyard.
 */

var gulp = require('gulp');
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var plumber = require('gulp-plumber');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var browserSync = require('browser-sync').create();

// Static server
gulp.task('browser-sync', function () {
    browserSync.init({
        'port': 8080,
        'proxy': 'biboux.dev'
    });
});

var sassOptions = {
    errLogToConsole: true,
    outputStyle: 'expanded'
};


var autoprefixerOptions = {
    browsers: [
        'not ie <= 9',
        'last 4 versions'
    ],
    cascade: false
};

var paths = {
    sass: ["src/sass/**/*.scss"],
    php: ['**/*.php', '*.php'],
    js: {
        src: {
            vendors: [
                // Libraries
                'src/js/vendor/modernizr-2.8.3.min.js',
                'src/js/vendor/jquery.min.js'
            ],
            app: [
                'src/js/scripts.js'
            ]
        },
        dest: 'src/js/min/',
        watch: [
            // Custom
            'src/js/scripts.js'
        ]
    }
};


function swallowError(error) {

    // If you want details of the error in the console
    console.log(error.toString());
    this.emit('end')
}
gulp.task('default', ['sass', 'scripts-app', 'scripts-vendors']);

//sass task
gulp.task('sass', function () {
    gulp.src('src/sass/main.scss')
        .pipe(plumber())
        .pipe(sass())
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(gulp.dest('css/'))
        .pipe(minifyCss({
            keepSpecialComments: 0
        }))
        .pipe(gulp.dest('css/'))
        .pipe(browserSync.stream())
    ;
});

/**
 * Script task JS
 */
gulp.task(
    'scripts-app', function () {
        // create filter instance inside task function
        return gulp.src(paths.js.src.app)
            .pipe(plumber())
            .pipe(jshint())
            .pipe(jshint.reporter('jshint-stylish'))
            .pipe(concat('app.js'))
            .pipe(rename({suffix: '.min'}))
            // .pipe(ngAnnotate())
            .pipe(uglify())
            .pipe(gulp.dest(paths.js.dest));
    });

gulp.task(
    'scripts-vendors', function () {
        // create filter instance inside task function
        return gulp.src(paths.js.src.vendors)
        // // .pipe(sourcemaps.init())
            .pipe(concat('vendors.js'))
            .pipe(rename({suffix: '.min'}))
            // .pipe(ngAnnotate())
            .pipe(uglify())
            .pipe(gulp.dest(paths.js.dest));
    });


// create a task that ensures the `js` task is complete before
// reloading browsers
gulp.task('js-watch', ['scripts-app'], function (done) {
    browserSync.reload();
    done();
});
gulp.task('reload', function (done) {
    browserSync.reload();
    done();
});

gulp.task('watch', ['browser-sync'], function () {
    gulp.watch(paths.php, ['reload']);
    gulp.watch(paths.sass, ['sass']);
    gulp.watch(paths.js.watch, ['js-watch']);
});