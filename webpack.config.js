const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const ESLintPlugin = require("eslint-webpack-plugin");
const StyleLintPlugin = require("stylelint-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");

module.exports = {
  context: __dirname,
  entry: {
    frontend: ["./assets/js/main.js", "./assets/sass/main.scss"],
  },
  output: {
    path: path.resolve(__dirname, "assets/build"),
    filename: "js/scripts.js",
  },
  mode: "development",
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.s[ca]ss$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
      },
      {
        test: /\.(png|jpe?g|gif)$/i,
        use: [
          {
            loader: "file-loader",
          },
        ],
      },
    ],
  },
  plugins: [
    new ESLintPlugin(),
    new StyleLintPlugin(),
    new BrowserSyncPlugin({
      files: "**/*.php",
    }),
    new MiniCssExtractPlugin({
      filename: "css/main.min.css",
    }),
  ],
  optimization: {
    minimize: true,
    minimizer: [new TerserPlugin()],
  },
};
