<?php
// SCRIPTS AND STYLES
// ------------------
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 5 );
function theme_enqueue_styles() {
	// CSS
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/build/frontend.css' );
	// Javascript
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/build/frontend.js', null, null, true );
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
require_once 'inc/plugins/tgm-ip.php';
require_once 'inc/plugins/acfe.php';


// Include Woocommerce Customisations
if ( class_exists( 'WooCommerce' ) ) {
	require_once 'inc/woocommerce/woocommerce.php';
}

