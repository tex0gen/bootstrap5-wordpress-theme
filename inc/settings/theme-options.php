<?php
/*
*	Options Pages for ACF
*/
if ( function_exists('acf_add_options_page') ) {
	$args = array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'position' => 2,
	);
	
	acf_add_options_page( $args );
}

// Remove WP version
add_filter('the_generator', 'wpbeginner_remove_version');
function wpbeginner_remove_version() {
	return '';
}

/*
* Remove Attachment Archives
*/
add_action('template_redirect', 'my_custom_disable_author_page');
function my_custom_disable_author_page() {
	global $wp_query;

	if ( is_attachment() ) {
		$wp_query->set_404();
		status_header(404);
	}
}

// add_filter('tiny_mce_before_init', 'my_mce4_options');
// function my_mce4_options( $init ) {
// 	$colours = [];
// 	$defaultColours = colour_list();
// 	if ( $defaultColours ) {
// 		foreach ( $defaultColours as $key => $val ) {
// 			$colours .= '"'.$key.'","'.$val.'",';
// 		}
// 	}

// 	$init['textcolor_map'] = '['.str_replace('#', '', $colours).']';
// 	$init['textcolor_rows'] = 6;
// 	return $init;
// }

add_filter('comment_form_default_fields','prefix_disable_comment_url');
function prefix_disable_comment_url($fields) { 
	unset($fields['url']);
	unset($fields['cookies']);
	return $fields;
}

add_filter( 'comment_form_fields', 'themestrap_move_comment_field_to_bottom' );
function themestrap_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

/*
* Modify TinyMCE editor to remove H1
*/
add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );
function tiny_mce_remove_unused_formats($init) {
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Address=address;Pre=pre';
	return $init;
}

/*
* Move Yoast to bottom
*/
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
function yoasttobottom() {
	return 'low';
}

/**
 * Disable the emoji's
 */
add_action( 'init', 'disable_emojis' );
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference between the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;
}

// Remove empty p tags
add_filter('the_content', 'remove_empty_p', 20, 1);
function remove_empty_p($content){
	$content = force_balance_tags($content);
	return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

// Update jQuery
add_action( 'wp_enqueue_scripts', 'themestrap_modern_jquery', 5 );
function themestrap_modern_jquery() {
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.7.1.min.js' );
}

add_action( 'wp_enqueue_scripts', 'themestrap_disable_loading_css_js' );
function themestrap_disable_loading_css_js() {
	wp_deregister_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );

	// Check if WooCommerce plugin is active
	if( function_exists( 'is_woocommerce' ) ){
		wp_dequeue_style( 'wc-block-style' );
		wp_dequeue_style( 'wc-block-vendors-style' ); // Remove WooCommerce block CSS

		// Check if it's any of WooCommerce page
		if(! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			## Dequeue WooCommerce styles
			wp_dequeue_style('woocommerce-layout'); 
			wp_dequeue_style('woocommerce-general'); 
			wp_dequeue_style('woocommerce-smallscreen');  
		
			## Dequeue WooCommerce scripts
			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('woocommerce'); 
			wp_dequeue_script('wc-add-to-cart');

			wp_deregister_script( 'js-cookie' );
			wp_dequeue_script( 'js-cookie' );
		}
	} 
}
