const path = require('path');
const glob = require('glob-all');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ESLintPlugin = require('eslint-webpack-plugin');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const PurgecssPlugin = require('purgecss-webpack-plugin');
const purgecssWordpress = require('purgecss-with-wordpress');

module.exports = {
  context: __dirname,
  entry: {
    frontend: ['./assets/js/main.js', './assets/sass/main.scss'],
  },
  output: {
    path: path.resolve(__dirname, 'assets/build'),
    filename: 'js/scripts.js',
    publicPath: '../',
  },
  mode: 'production',
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
      {
        test: /\.s[ca]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'resolve-url-loader',
          'postcss-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.(png|jpe?g|gif)$/i,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: f => {
                let dirNameInsideAssets = path.relative(path.join(__dirname, 'assets'), path.dirname(f));
                return `${dirNameInsideAssets}/[name].[ext]`;
              }
            },
          },
        ],
      },
      {
        test: /\.(svg|eot|woff|woff2|ttf)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: f => {
                let dirNameInsideAssets = path.relative(path.join(__dirname, 'assets'), path.dirname(f));
                return `${dirNameInsideAssets}/[name].[ext]`;
              }
            },
          },
        ],
      },
    ],
  },
  plugins: [
    new ESLintPlugin(),
    new StyleLintPlugin(),
    new BrowserSyncPlugin({
      files: ['**/*.php'],
    }),
		new MiniCssExtractPlugin({
			filename: 'css/main.min.css',
		}),
		// new PurgecssPlugin({
		// 	paths: glob.sync([
		// 		'./**/*.php',
		// 		'./assets/js/**/*.js',
		// 	]),
		// 	safelist: [
		// 		...purgecssWordpress.safelist,
		// 		'sub-menu',
		// 		'textarea',
		// 		'label',
		// 		'input',
		// 		'button',
		// 		/^(input)(.*)?$/,
		// 		/^(button)(.*)?$/,
		// 		/^(menu-item)(.*)?$/,
		// 		/^wpcf7(.*)?$/,
		// 	],
		// 	whitelist: ['pr3', 'pv2', 'ph3', 'mb1', 'input', 'tracked-mega'],
		// 	variables: true,
		// }),
  ],
  optimization: {
    minimize: false,
		minimizer: [
			new TerserPlugin({
				parallel: true,
			}),
			new CssMinimizerPlugin()
		],
	},
	performance: {
		hints: false,
		maxEntrypointSize: 512000,
		maxAssetSize: 512000
	},
};
