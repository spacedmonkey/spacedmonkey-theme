/**
 * WordPress dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
/**
 * External dependencies
 */
const OptimizeCSSAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	entry: {
		theme: [
			'./src/navigation.js',
			'./src/plugins.js',
			'./src/skip-link-focus-fix.js',
		    './src/theme.js',
		    './src/scss/main.scss',
		]
	},
	output: {
		...defaultConfig.output,
		path: path.resolve(process.cwd(), 'assets'),
	},
	optimization: {
		...defaultConfig.optimization,
		minimizer: [
			...defaultConfig.optimization.minimizer,
			new OptimizeCSSAssetsPlugin( {} ),
		],
	},
	plugins: [
		...defaultConfig.plugins,
		new MiniCssExtractPlugin( {
			filename: 'theme.css',
		} ),
	],
};
