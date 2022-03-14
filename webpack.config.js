const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserWebPackPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');

module.exports = {
	...defaultConfig,
	entry: {
		frontend: ['./assets/js/main.js', './assets/sass/main.scss'],
	},
	output: {
		path: path.resolve(__dirname, './assets/build'),
	},
	optimization: {
		...defaultConfig.optimization,
		minimize: true,
		minimizer: [
			new CssMinimizerPlugin(),
			new TerserWebPackPlugin(),
		],
		splitChunks: {
			cacheGroups: {
				default: false,
				frontend: {
					chunks: 'all',
					enforce: true,
					name: 'frontend',
					test: /main\.s[ac]ss$/i,
				},
			},
		},
	},
	plugins: [
		...defaultConfig.plugins,
		new MiniCssExtractPlugin(),
	],
	externals: {
		jquery: 'jQuery',
		isotope: 'isotope',
	},
};
