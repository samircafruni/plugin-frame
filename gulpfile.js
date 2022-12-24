// extesions
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const babel = require('gulp-babel');
const imagemin = require('gulp-imagemin');
const jsmin = require('gulp-jsmin');

function buildSass () {
    return gulp.src([
        'src/resources/assets/styles/*.scss'
    ])
    .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(gulp.dest('dist/resources/assets/styles'));
}

function buildSassMinify () {
    return gulp.src([
        'src/resources/assets/styles/*.scss'
    ])
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('dist/resources/assets/styles'));
}

function babelJS () {
    return gulp.src([
        'src/resources/assets/scripts/**/*.js'
    ])
    .pipe(babel({ presets: ['@babel/env'] }))
    .pipe(gulp.dest('dist/resources/assets/scripts'));
}

function buildImage () {
    return gulp.src([
        'src/resources/assets/images/**'
    ])
    .pipe(imagemin([
        imagemin.mozjpeg({quality: 70, progressive: true}),
        imagemin.optipng({optimizationLevel: 5}),
    ]))
    .pipe(gulp.dest('dist/resources/assets/images'));
}

function moveFileView () {
    return gulp.src([
        'src/resources/views/**/*.php'
    ])
    .pipe(gulp.dest('dist/resources/views'));
}

function moveFileApp () {
    return gulp.src([
        'src/app/**/*.php'
    ])
    .pipe(gulp.dest('dist/app'));
}

function minifyJS () {
    return gulp.src([
        'dist/resources/assets/scripts/**/*.js'
    ])
    .pipe(jsmin())
    .pipe(gulp.dest('dist/resources/assets/scripts'));
}

function watch () {
    gulp.watch('src/resources/assets/styles/**/*.scss', buildSass);
    gulp.watch('src/resources/assets/scripts/**/*.js', babelJS);
    gulp.watch('src/resources/assets/images', buildImage);
    gulp.watch('src/app/**', moveFileApp);
    gulp.watch('src/resources/views/**', moveFileView);
}

exports.build = gulp.series(buildSassMinify, babelJS, minifyJS, moveFileApp, moveFileView, buildImage);
exports.start = gulp.series(buildSass, babelJS, moveFileApp, moveFileView, buildImage, watch);
