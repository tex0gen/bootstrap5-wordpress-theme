<?php
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}


// SCRIPTS AND STYLES
// ------------------
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 5 );
function theme_enqueue_styles() {

  // CSS
  wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/build/css/main.css' );

  // Javascript
  // ADD ANY LOCAL SCRIPTS TO THE GULP FILE SO THAT THEY CAN BE CONCATENATED AND MINIFIED
  wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/build/js/scripts.js', array('jquery'), null, true );
}


// Include Setup
require_once 'inc/settings/theme-options.php';
require_once 'inc/settings/nav-menus.php';
require_once 'inc/settings/widgets.php';
require_once 'inc/settings/image-sizes.php';
require_once 'inc/settings/other/site_opts.php';

// Include Woocommerce Customisations
if ( class_exists( 'WooCommerce' ) ) {
  require_once 'inc/woocommerce/woocommerce.php';
}

// Clean style tags
function clean_style_tag( $input ) {
  preg_match_all( "!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches );
  if ( empty( $matches[2] ) ) {
    return $input;
  }
  // Only display media if it is meaningful
  $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';
  return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}
add_filter( 'style_loader_tag',  'clean_style_tag'  );

// Clean script tags
function clean_script_tag( $input ) {
  $input = str_replace( "type='text/javascript' ", '', $input );
  return str_replace( "'", '"', $input );
}
add_filter( 'script_loader_tag', 'clean_script_tag'  );

// Move scripts to footer
function remove_head_scripts() { 
	remove_action('wp_head', 'wp_print_scripts'); 
	remove_action('wp_head', 'wp_print_head_scripts', 9); 
	remove_action('wp_head', 'wp_enqueue_scripts', 1);

	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

// Remove WP version
function wpbeginner_remove_version() {
	return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) ) {
    $src = remove_query_arg( 'ver', $src );
  }
  return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


function atg_menu_classes($classes, $item, $args) {
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class','atg_menu_classes',1,3);