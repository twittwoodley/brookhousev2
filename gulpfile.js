var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var autoprefixer = require('gulp-autoprefixer');

// Static Server + watching scss/html files
gulp.task('serve', ['autoprefixer'], function() {

    browserSync.init({
        notify: false,
    proxy: "http://localhost:11467/",
    ghostMode: false
    });

    gulp.watch("./wp-content/themes/brookhouse/css/*.css", ['autoprefixer']);
    gulp.watch("./wp-content/themes/brookhouse/*.php").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('autoprefixer', function() {
    return gulp.src("./wp-content/themes/brookhouse/css/*.css")
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
            }))
        .pipe(gulp.dest("./wp-content/themes/brookhouse/build"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);