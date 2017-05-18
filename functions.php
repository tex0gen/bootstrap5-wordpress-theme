<?php

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


// SCRIPTS AND STYLES
// ------------------
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 5 );
function theme_enqueue_styles() {
	// Fonts
	// wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700' );

	// CSS
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.css' );

	// Javascript
	wp_enqueue_script( 'tether', get_stylesheet_directory_uri() . '/assets/js/tether.min.js', array(), null, true );
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/sass/bootstrap/dist/js/bootstrap.min.js', array('jquery', 'tether', 'popper'), null, true );
	wp_enqueue_script( 'mainjs', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), null, true );

}

// Include Theme Options
require_once 'inc/theme-options.php';

// Include Woocommerce Customisations
require_once 'inc/woocommerce.php';

// Include Menus
require_once 'inc/nav-menus.php';
