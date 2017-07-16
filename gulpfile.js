var gulp = require("gulp"),
    sass = require("gulp-sass"),
    sourcemaps = require("gulp-sourcemaps"),
    autoprefixer = require("gulp-autoprefixer"),
    rename = require("gulp-rename"),
    concat = require("gulp-concat"),
    uglify = require('gulp-uglify'),
    paths = require('./gulp.paths');

gulp.task('scss', function () {
    return gulp.src(paths.templates.css.src)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(autoprefixer({
            browsers: [
                'Android >= 2.3',
                'BlackBerry >= 7',
                'Chrome >= 9',
                'Firefox >= 4',
                'Explorer >= 9',
                'iOS >= 5',
                'Opera >= 11',
                'Safari >= 5',
                'OperaMobile >= 11',
                'OperaMini >= 6',
                'ChromeAndroid >= 9',
                'FirefoxAndroid >= 4',
                'ExplorerMobile >= 9'
            ]
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.templates.css.dest));
});

gulp.task('scripts', function () {
    console.log(paths.templates.js.src);
    return gulp.src(paths.templates.js.src)
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest(paths.templates.js.dest))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.templates.js.dest));
});

gulp.task('watch', function () {
    gulp.watch(paths.templates.css.src, ['scss']);
    gulp.watch(paths.templates.js.src, ['scripts']);
});