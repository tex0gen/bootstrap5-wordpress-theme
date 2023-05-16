<?php
// SCRIPTS AND STYLES
// ------------------
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 5 );
function theme_enqueue_styles() {
	$deps = require('assets/build/frontend.asset.php');

	// CSS
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/build/frontend.css' );
	// Javascript
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/build/frontend.js', null, $deps['version'] );

	themestrap_enqueue_used_block_styles();
}

// add admin scripts
add_action( 'admin_enqueue_scripts', 'theme_enqueue_admin_styles', 50 );
function theme_enqueue_admin_styles() {
	$deps = require('assets/admin/build/admin.asset.php');
	// CSS
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css' );
	wp_enqueue_style( 'admin-main', get_template_directory_uri() . '/assets/admin/build/admin.css', null, $deps['version'] );
	// Javascript
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/build/frontend.js', null, null, true );
}

function themestrap_enqueue_used_block_styles() {
	$style_array = [];
	if ( have_rows( 'main_content_flex' ) ) {
		while ( have_rows( 'main_content_flex' ) ) { 
			the_row();
			$tmpl_name = str_replace( '_', '-', get_row_layout() );
			if ( !isset($style_array[$tmpl_name])) {
				$stylesheet_path = get_template_directory_uri() . '/template-parts/flex/' . $tmpl_name . '/build/block.css';
				$style_array[$tmpl_name] = get_template_directory_uri() . '/template-parts/flex/' . $tmpl_name . '/build/block.css';
				$deps = require( get_template_directory() . '/template-parts/flex/'.$tmpl_name.'/build/block.asset.php' );
				if ( file_exists( get_template_directory() . '/template-parts/flex/'.$tmpl_name.'/build/block.js' ) ) {
					wp_enqueue_style( 'flex-' . $tmpl_name, $stylesheet_path, null, $deps['version'] );
				}
			}
		}
	}
}

function themestrap_enqueue_used_block_js() {
	$style_array = [];
	if ( have_rows( 'main_content_flex' ) ) {
		while ( have_rows( 'main_content_flex' ) ) { 
			the_row();
			$tmpl_name = str_replace( '_', '-', get_row_layout() );
			if ( !isset($style_array[$tmpl_name])) {
				$js_path = get_template_directory_uri() . '/template-parts/flex/' . $tmpl_name . '/build/block.js';
				$style_array[$tmpl_name] = get_template_directory_uri() . '/template-parts/flex/' . $tmpl_name . '/build/block.js';
				$deps = require(get_template_directory() . '/template-parts/flex/'.$tmpl_name.'/build/block.asset.php');
				wp_enqueue_script( 'flex-' . $tmpl_name, $js_path, null, $deps['version'], true );
			}
		}
	}
}

// Include Setup
require_once 'inc/settings/theme-options.php';
require_once 'inc/settings/social.php';
require_once 'inc/settings/taxonomies.php';
require_once 'inc/settings/post-types.php';
require_once 'inc/settings/nav-menus.php';
require_once 'inc/settings/widgets.php';
require_once 'inc/settings/image-sizes.php';
require_once 'inc/settings/colour-list.php';
require_once 'inc/settings/other/site_opts.php';

// Plugins
// include vendor
require_once 'vendor/autoload.php';

require_once 'inc/plugins/tgm-ip.php';
require_once 'inc/plugins/acfe.php';
require_once 'inc/plugins/field-builder.php';

// Include Woocommerce Customisations
if ( class_exists( 'WooCommerce' ) ) {
	require_once 'inc/woocommerce/woocommerce.php';
}

