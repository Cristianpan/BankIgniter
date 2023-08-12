const { src, dest, watch, parallel } = require("gulp");

//Css
const sass = require("gulp-sass")(require("sass"));
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const postcss = require("gulp-postcss");
const sourcemaps = require("gulp-sourcemaps");

// Imagenes
const cache = require("gulp-cache");
const imagemin = require("gulp-imagemin");
const webp = require("gulp-webp");
const avif = require("gulp-avif");

//Js
const terser = require("gulp-terser-js");
const rename = require("gulp-rename");

//Webpack
const webpack = require("webpack-stream");

const paths = {
  scss: "./app/assets/sass/**/*.scss",
  js: "./app/assets/js/**/*.js",
  img: "./app/assets/img/**/**",
  dest: "./public/assets",
};

function css() {
  return src(paths.scss)
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename('app.bundler.css'))
    .pipe(sourcemaps.write("."))
    .pipe(dest(`${paths.dest}/css`));
}

function imagenes() {
  return src(paths.img)
    .pipe(cache(imagemin({ optimizationLevel: 3 })))
    .pipe(dest(`${paths.dest}/img`));
}

function javascript() {
  return src(paths.js)
    .pipe(
      webpack({
        watch: true,
        mode: "production",
        entry: "./app/assets/js/app.js",
        output: {
          filename: "app.bundler.js",
        },
      })
    )
    .pipe(sourcemaps.init())
    .pipe(terser())
    .pipe(sourcemaps.write("."))
    .pipe(dest(`${paths.dest}/js`));
}

function imageWebp() {
  return src(paths.img)
    .pipe(cache(webp()))
    .pipe(dest(`${paths.dest}/img`));
}

function imageAvif() {
  return src(paths.img)
    .pipe(cache(avif()))
    .pipe(dest(`${paths.dest}/avif`));
}

function watchFiles() {
  watch(paths.scss, css);
  watch(paths.js, javascript);
  watch(paths.img, imagenes);
  watch(paths.img, imageAvif);
  watch(paths.img, imageWebp);
}

exports.css = css;
exports.javascript = javascript;
exports.watchFiles = watchFiles;
exports.default = parallel(css, javascript, watchFiles);
