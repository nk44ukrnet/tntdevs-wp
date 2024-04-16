const gulp = require('gulp');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
//const imagemin = require('gulp-imagemin');

// Minify CSS
gulp.task('minify-css', function() {
    return gulp.src('css/all.css')
        .pipe(cleanCSS())
        .pipe(concat('all.min.css'))
        .pipe(gulp.dest('css')); // Change destination directory to 'dist/css'
});

// Minify JavaScript
gulp.task('minify-js', function() {
    return gulp.src(['js/swiper_11_0_5.js','js/main.js'])
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('js')); // Change destination directory to 'dist/js'
});

// Compress Images
gulp.task('compress-images', function() {
    // return gulp.src('img/*')
    //     .pipe(imagemin())
    //     .pipe(gulp.dest('img')); // Change destination directory to 'dist/img'
});

// Watch for changes
gulp.task('watch', function() {
    gulp.watch('css/all.css', gulp.series('minify-css'));
    gulp.watch('js/main.js', gulp.series('minify-js'));
    //gulp.watch('img/*', gulp.series('compress-images')); // Watch for changes in 'img' directory
});

// Default task
gulp.task('default',
    gulp.parallel(
        'minify-css',
        'minify-js',
        //'compress-images',
       // 'watch'
    ));
