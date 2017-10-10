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
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.min.css' );

	// Javascript
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/assets/js/tether.min.js', array(), null, true );
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.9.4/umd/popper.js', array(), null, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/sass/bootstrap/dist/js/bootstrap.min.js', array('jquery', 'tether', 'popper'), null, true );
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true );

}

// Include Theme Options
require_once 'inc/theme-options.php';

// Include Woocommerce Customisations
if ( class_exists( 'WooCommerce' ) ) {
	require_once 'inc/woocommerce.php';
}

// Include Menus
require_once 'inc/nav-menus.php';
