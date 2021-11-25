const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');

module.exports = {
	...defaultConfig,
	entry: {
		frontend: ['./assets/js/main.js', './assets/sass/main.scss'],
	},
	output: {
		path: path.resolve(__dirname, './assets/build'),
	},
};
