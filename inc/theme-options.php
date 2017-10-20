<?php

// Allows robot indexing after dev database has been pushed
$live_url = ''; // Must match WordPress live URL
if ($live_url != '') {
	if ( function_exists(get_field) ) {
		if ( get_option('blog_public') === 0 ) {
			update_option('blog_public', 1);
		}
	}
} else {
	echo '<pre>Please add the live site URL to themestrap/inc/theme-options (Line 4)</pre>';
}

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