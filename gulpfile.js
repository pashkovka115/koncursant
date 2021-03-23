var syntax = 'sass'; // Syntax: sass or scss;
var app = 'app_html';

/*var gulp          = require('gulp'),
		gutil         = require('gulp-util' ),
		sass          = require('gulp-sass'),
		browserSync   = require('browser-sync'),
		concat        = require('gulp-concat'),
		uglify        = require('gulp-uglify'),
		cleancss      = require('gulp-clean-css'),
		rename        = require('gulp-rename'),
		autoprefixer  = require('gulp-autoprefixer'),
		notify        = require("gulp-notify"),
		rsync         = require('gulp-rsync');*/

const {src, dest, parallel, series, watch} = require('gulp');
const gutil = require('gulp-util');
const sass = require('gulp-sass');
// const browserSync = require('browser-sync').create();
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cleancss = require('gulp-clean-css');
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const notify = require("gulp-notify");
// const rsync = require('gulp-rsync');


function browser_sync () {
    browserSync({
        server: {
            baseDir: app
        },
        notify: false,
        // open: false,
        // online: false, // Work Offline Without Internet Connection
        // tunnel: true, tunnel: "projectname", // Demonstration page: http://projectname.localtunnel.me
    })
}

function styles () {
    return src(app + '/' + syntax + '/**/*.' + syntax + '')
        .pipe(sass({outputStyle: 'expand'}).on("error", notify.onError()))
        .pipe(rename({suffix: '.min', prefix: ''}))
        .pipe(autoprefixer(['last 15 versions']))
        .pipe(cleancss({level: {1: {specialComments: 0}}})) // Opt., comment out when debugging
        .pipe(dest(app + '/css'))
        .pipe(dest('./public/assets/front/css'))
        // .pipe(browserSync.stream())
}

function js () {
    return src([
        app + '/libs/jquery/dist/jquery.min.js',
        app + '/libs/waypoints/waypoints.min.js',
        app + '/libs/animate/animate-css.js',
        // app + '/libs/plugins-scroll/plugins-scroll.js',
        app + '/libs/magnific/jquery.magnific-popup.min.js',
        app + '/libs/slick/slick.js',
        app + '/libs/inputmask/jquery.inputmask.bundle.js',
        app + '/libs/nice-select/jquery.nice-select.min.js',
        app + '/libs/datatables/datatables.min.js',
        app + '/libs/native-select/build/nativejs-select.min.js',
        // app + '/js/common.js', // Always at the end
        './public/assets/front/js/common.js', // Always at the end
    ])
        .pipe(concat('scripts.min.js'))
        //.pipe(uglify()) // Mifify js (opt.)
        .pipe(dest(app + '/js'))
        .pipe(dest('./public/assets/front/js'))
        // .pipe(browserSync.reload({stream: true}))
}

/*gulp.task('rsync', function () {
    return gulp.src(app + '/!**')
        .pipe(rsync({
            root: 'app/',
            hostname: 'username@yousite.com',
            destination: 'yousite/public_html/',
            // include: ['*.htaccess'], // Includes files to deploy
            exclude: ['**!/Thumbs.db', '**!/!*.DS_Store'], // Excludes files from deploy
            recursive: true,
            archive: true,
            silent: false,
            compress: true
        }))
});

gulp.task('watch', ['styles', 'js', 'browser-sync'], function () {
    gulp.watch(app + '/' + syntax + '/!**!/!*.' + syntax + '', ['styles']);
    gulp.watch([app + 'app + /s/!**!/!*.js', 'app/js/common.js'], ['js']);
    gulp.watch(app + '/!*.html', browserSync.reload)
});*/

// gulp.task('default', ['watch']);

exports.js = js
exports.styles  = styles

