<?php
if( function_exists('acf_add_options_page') ) {
	$args = array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'position' => 2,
	);
	
	acf_add_options_page( $args );
}


add_image_size( 'full-width', 1200, 800, true );