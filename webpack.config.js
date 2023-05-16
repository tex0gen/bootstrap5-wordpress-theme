const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');
const glob = require('glob');

var sharedConfig = {
	...defaultConfig,
	externals: {
		jquery: 'jQuery',
	},
};

const allConfig = [];
const entries = {};
const files = glob.sync('./template-parts/flex/**/*.scss');

files.forEach((file) => {
	const blockName = file.split('/').slice(-2, -1)[0];
	entries[blockName] = path.resolve(__dirname, file);

	let entry = Object.assign({}, sharedConfig, {
		name: blockName,
		entry: {
			block: ['./template-parts/flex/' + blockName + '/_' + blockName + '.scss'],
		},
		output: {
			path: path.resolve(
				__dirname,
				'./template-parts/flex/' + blockName + '/build/',
			),
		},
	});

	allConfig.push(entry);
});

const primaryConfig = Object.assign({}, sharedConfig, {
	name: "main",
	entry: {
		frontend: [
			'./assets/js/main.js',
			'./assets/sass/main.scss'
		],
	},
	output: {
		path: path.resolve(__dirname, './assets/build'),
	},
});

const adminConfig = Object.assign({}, sharedConfig, {
	name: "admin",
	entry: {
		admin: [
			'./assets/sass/admin.scss'
		],
	},
	output: {
		path: path.resolve(__dirname, './assets/admin/build'),
	},
});

allConfig.push(primaryConfig);
allConfig.push(adminConfig);

module.exports = allConfig;
