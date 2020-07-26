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
* Options Pages for ACF
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

// Async load JS
function async_parsing_of_js( $url ) {
  if ( is_admin() ) return $url; // Switch off for WP Admin
  // Some plugins have issues if JS is deferred or async loaded. List them here..
  // Should include a part of the url string.
  $plugins = array(
    'jquery.js',
    'contact-form-7',
  );

  foreach ($plugins as $key => $plugin) {
    if ( strpos( $url, $plugin ) ) return $url;
  }

  if ( strpos( $url, '.js' ) === FALSE ) return $url; // If NOT a js file
  return str_replace( ' src', ' async src', $url );
}
add_filter( 'script_loader_tag', 'async_parsing_of_js', 10 );

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

/*
*     Remove Attachment Archives
*/
add_action('template_redirect', 'my_custom_disable_author_page');
function my_custom_disable_author_page() {
  global $wp_query;

  if ( is_attachment() ) {
    $wp_query->set_404();
    status_header(404);
  }
}

function my_mce4_options( $init ) {
  $defaultColours = colour_list();
  if ( $defaultColours ) {
    foreach ( $defaultColours as $key => $val ) {
      $colours .= '"'.$key.'","'.$val.'",';
    }
  }

  $init['textcolor_map'] = '['.str_replace('#', '', $colours).']';
  $init['textcolor_rows'] = 6;
  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

/*
* Recently Viewed
*/
function themestrap_custom_track_product_view() {
  if ( ! is_singular( 'product' ) ) {
    return;
  }

  global $post;

  if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) ) {
    $viewed_products = array();
  } else {
    $viewed_products = (array)explode( '|', $_COOKIE['woocommerce_recently_viewed'] );
  }

  if ( ! in_array( $post->ID, $viewed_products ) ) {
    $viewed_products[] = $post->ID;
  }

  if ( sizeof( $viewed_products ) > 15 ) {
    array_shift( $viewed_products );
  }

  // Store for session only
  wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
}

add_action( 'template_redirect', 'themestrap_custom_track_product_view', 20 );

function for_get_products_most_viewed_category() {
  if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) ) {
    return null;
  } else {
    $viewed_products = (array)explode( '|', $_COOKIE['woocommerce_recently_viewed'] );
    return $viewed_products;
  }
}

function prefix_disable_comment_url($fields) { 
  unset($fields['url']);
  unset($fields['cookies']);
  return $fields;
}
add_filter('comment_form_default_fields','prefix_disable_comment_url');

function themestrap_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}

add_filter( 'comment_form_fields', 'themestrap_move_comment_field_to_bottom' );

/*
* Modify TinyMCE editor to remove H1
*/
function tiny_mce_remove_unused_formats($init) {
  // Add block format elements you want to show in dropdown
  $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Address=address;Pre=pre';
  return $init;
}
add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );

/*
* Move Yoast to bottom
*/
function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/**
 * Disable the emoji's
 */
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
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
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

function for_numeric_posts_nav() {

  if( is_singular() )
      return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
      return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }

  echo '<div class="navigation"><ul>' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
      printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
      echo '<li>…</li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<li>…</li>' . "\n";

      $class = $paged == $max ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
      printf( '<li>%s</li>' . "\n", get_next_posts_link() );

  echo '</ul></div>' . "\n";
}

// Remove empty p tags
function remove_empty_p($content){
  $content = force_balance_tags($content);
  return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}
add_filter('the_content', 'remove_empty_p', 20, 1);

function wps_deregister_styles() {
  wp_deregister_style( 'contact-form-7' );
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
  wp_dequeue_style( 'wc-block-vendors-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );