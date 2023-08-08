const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const autoprefixer = require("autoprefixer");
const CopyPlugin = require("copy-webpack-plugin");
const ImageminPlugin = require("imagemin-webpack-plugin").default;
const ImageWebpMin = require("imagemin-webp-webpack-plugin");
const ImageAvifMin = require("imagemin-avif-webpack-plugin");

module.exports = {
  mode: "production",
  devtool: "source-map",
  entry: "./app/assets/js/app.js",
  watch: true,
  output: {
    filename: "js/app.bundler.js",
    path: path.resolve(__dirname, "public/assets"),
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              sourceMap: true,
              url: false,
            },
          },
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: {
                plugins: [autoprefixer()],
              },
            },
          },
          {
            loader: "sass-loader",
            options: {
              sourceMap: true,
            },
          },
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "css/app.bundle.css",
    }),
    new CopyPlugin({
      patterns: [
        {
          from: "app/assets/img",
          to: "img",
        },
      ],
    }),
    /*new ImageminPlugin({
      test: /\.(jpe?g|png)$/i,
      pngquant: {
        quality: "60-80",
      },
      jpegtran: {
        progressive: true,
      },
      destination: path.resolve(__dirname, "build", "img"),
    }),
    new ImageAvifMin({
      config: [
        {
          test: /\.(jpe?g|png)/,
          options: {
            quality: 75,
          },
        },
      ],
    }),
    new ImageWebpMin({
      config: [
        {
          test: /\.(jpe?g|png)/,
          options: {
            quality: 75,
          },
        },
      ],
    }),*/
  ],
};
