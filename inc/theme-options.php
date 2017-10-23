<?php
require_once('settings/image-sizes.php');
require_once('settings/widgets.php');

/*
*	Options Pages for ACF
*/
if( function_exists('acf_add_options_page') ) {
	$args = array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'position' => 2,
	);
	
	acf_add_options_page( $args );
}