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


// Include Woocommerce Customisations
if ( class_exists( 'WooCommerce' ) ) {
  require_once 'inc/woocommerce/woocommerce.php';
}

add_filter( 'style_loader_tag',  'clean_style_tag'  );
add_filter( 'script_loader_tag', 'clean_script_tag'  );

function clean_style_tag( $input ) {
  preg_match_all( "!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches );
  if ( empty( $matches[2] ) ) {
    return $input;
  }
  // Only display media if it is meaningful
  $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';
  return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}

function clean_script_tag( $input ) {
  $input = str_replace( "type='text/javascript' ", '', $input );
  return str_replace( "'", '"', $input );
}


function remove_head_scripts() { 
	remove_action('wp_head', 'wp_print_scripts'); 
	remove_action('wp_head', 'wp_print_head_scripts', 9); 
	remove_action('wp_head', 'wp_enqueue_scripts', 1);

	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );