<?php
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

/*
*     Remove Author Archives
*/
add_action('template_redirect', 'my_custom_disable_author_page');
 
function my_custom_disable_author_page() {
 global $wp_query;
 
 if ( is_author() || is_attachment() ) {
 	$wp_query->set_404();
 	status_header(404);
 }
}
add_action( 'template_redirect', 'remove_author_pages_page' );

