const { src, dest, task, watch, series, parallel } = require('gulp')
const minifyCSS = require('gulp-clean-css'),
	minifyJS = require('gulp-uglify'),
	rename = require('gulp-rename'),
	babel = require('gulp-babel'),
	jshint = require('gulp-jshint'),
	autoprefix = require('gulp-autoprefixer'),
	plumber = require('gulp-plumber'),
	sass = require('gulp-sass')

function compileSass(done){
	src('./src/scss/*.scss')
	.pipe(sass().on('error', sass.logError))
	.pipe(dest('./src/scss'))
	done()
}

function style(done){
	src('src/scss/app.css')
	.pipe(autoprefix('last 4 versions'))
	.pipe(minifyCSS())
	.pipe(rename({suffix: '.min'}))
	.pipe(dest('dist/css'))
	done()
}

function script(done){
	src('src/js/app.js')
	.pipe(plumber())
    .pipe(babel({
        presets: ['@babel/env']
    }))
	.pipe(minifyJS())
	.pipe(jshint())
	.pipe(rename({suffix: '.min'}))
	.pipe(dest('dist/js'))
	done()
}

function watchFiles(){
	watch('src/scss/*.scss', compileSass)
	watch('src/scss/app.css', style)
	watch('src/js/app.js', script)
}

task('default', series(compileSass, style, script, watchFiles))
// task('watch', series(watchFiles))