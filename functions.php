<?php
// SCRIPTS AND STYLES
// ------------------
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 5 );
function theme_enqueue_styles() {
  // CSS
  $url = get_bloginfo('siteurl');
  if (strpos($url, 'localhost') || strpos($url, 'dev.')) {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/build/css/main.css' );
  } else {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/build/css/main.min.css' );
  }

  // Javascript
  // ADD ANY LOCAL SCRIPTS TO THE GULP FILE SO THAT THEY CAN BE CONCATENATED AND MINIFIED
  wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/build/js/scripts.js', array('jquery'), null, true );
}

// Include Setup
require_once 'inc/settings/theme-options.php';
require_once 'inc/settings/social.php';
require_once 'inc/settings/taxonomies.php';
require_once 'inc/settings/post-types.php';
require_once 'inc/settings/nav-menus.php';
require_once 'inc/settings/widgets.php';
require_once 'inc/settings/image-sizes.php';
require_once 'inc/settings/other/site_opts.php';
require_once 'inc/plugins/tgm-ip.php';

// Include Woocommerce Customisations
if ( class_exists( 'WooCommerce' ) ) {
  require_once 'inc/woocommerce/woocommerce.php';
}