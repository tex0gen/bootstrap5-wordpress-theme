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
* Clean style tags
*/
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

/*
* Move scripts to footer
*/
function remove_head_scripts() { 
  remove_action('wp_head', 'wp_print_scripts'); 
  remove_action('wp_head', 'wp_print_head_scripts', 9); 
  remove_action('wp_head', 'wp_enqueue_scripts', 1);

  add_action('wp_footer', 'wp_print_scripts', 5);
  add_action('wp_footer', 'wp_enqueue_scripts', 5);
  add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

/*
* Remove WP version
*/
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

